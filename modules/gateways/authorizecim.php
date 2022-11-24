<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 5.6
 * @ Decoder version: 1.0.4
 * @ Release: 02/06/2020
 *
 * @ ZendGuard Decoder PHP 5.6
 */

if (!defined("WHMCS")) {
    exit("This file cannot be accessed directly");
}
function authorizecim_config()
{
    return array("FriendlyName" => array("Type" => "System", "Value" => "Authorize.net CIM"), "loginid" => array("FriendlyName" => "Login ID", "Type" => "text", "Size" => "25"), "transkey" => array("FriendlyName" => "Transaction Key", "Type" => "password", "Size" => "25"), "validationmode" => array("FriendlyName" => "Validation Mode", "Type" => "dropdown", "Options" => "none,live"), "testmode" => array("FriendlyName" => "Test Mode", "Type" => "yesno"));
}
function authorizecim_config_validate(array $params = array())
{
    $apiUrl = net\authorize\api\constants\ANetEnvironment::PRODUCTION;
    if ($params["testmode"]) {
        $apiUrl = net\authorize\api\constants\ANetEnvironment::SANDBOX;
    }
    $merchantAuthentication = new net\authorize\api\contract\v1\MerchantAuthenticationType();
    $merchantAuthentication->setName($params["loginid"]);
    $merchantAuthentication->setTransactionKey($params["transkey"]);
    $test = new net\authorize\api\contract\v1\AuthenticateTestRequest();
    $test->setMerchantAuthentication($merchantAuthentication);
    $controller = new WHMCS\Module\Gateway\AcceptJs\AcceptJsAuthenticateTestController($test);
    if ($params["testmode"]) {
        $controller->httpClient->setVerifyHost(0);
        $controller->httpClient->setVerifyPeer(false);
    }
    $response = $controller->executeWithApiResponse($apiUrl);
    if ($response->getMessages()->getResultCode() != "Ok") {
        $errorMessages = $response->getMessages()->getMessage();
        if (!$errorMessages) {
            $errorMessage = "An unknown error occurred with the configuration check.";
        } else {
            $errorMessage = $errorMessages[0]->getCode() . ": " . $errorMessages[0]->getText();
        }
        throw new WHMCS\Exception\Module\InvalidConfiguration($errorMessage);
    }
}
function authorizecim_capture($params)
{
    if ($params["testmode"]) {
        $url = "https://apitest.authorize.net/xml/v1/request.api";
    } else {
        $url = "https://api2.authorize.net/xml/v1/request.api";
    }
    $gatewayids = explode(",", $params["gatewayid"]);
    if (!$gatewayids[0]) {
        return array("status" => "error", "rawdata" => "No Client Profile ID Found");
    }
    if (!$gatewayids[1]) {
        return array("status" => "error", "rawdata" => "No Client Payment Profile ID Found");
    }
    $storednameaddresshash = $gatewayids[2];
    $nameaddresshash = md5($params["clientdetails"]["firstname"] . $params["clientdetails"]["lastname"] . $params["clientdetails"]["address1"] . $params["clientdetails"]["city"] . $params["clientdetails"]["state"] . $params["clientdetails"]["postcode"] . $params["clientdetails"]["country"]);
    $address = authorizecim_addressFix($params["clientdetails"]["address1"]);
    if ($nameaddresshash != $storednameaddresshash) {
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<getCustomerPaymentProfileRequest xmlns=\"AnetApi/xml/v1/schema/AnetApiSchema.xsd\">\n<merchantAuthentication>\n<name>" . $params["loginid"] . "</name>\n<transactionKey>" . $params["transkey"] . "</transactionKey>\n</merchantAuthentication>\n<customerProfileId>" . $gatewayids[0] . "</customerProfileId>\n<customerPaymentProfileId>" . $gatewayids[1] . "</customerPaymentProfileId>\n</getCustomerPaymentProfileRequest>";
        $data = curlCall($url, $xml, array("HEADER" => array("Content-Type: text/xml")));
        $xmldata = XMLtoArray($data);
        $cardnum = $xmldata["GETCUSTOMERPAYMENTPROFILERESPONSE"]["PAYMENTPROFILE"]["PAYMENT"]["CREDITCARD"]["CARDNUMBER"];
        $expdate = $xmldata["GETCUSTOMERPAYMENTPROFILERESPONSE"]["PAYMENTPROFILE"]["PAYMENT"]["CREDITCARD"]["EXPIRATIONDATE"];
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<updateCustomerPaymentProfileRequest xmlns=\"AnetApi/xml/v1/schema/AnetApiSchema.xsd\">\n<merchantAuthentication>\n<name>" . $params["loginid"] . "</name>\n<transactionKey>" . $params["transkey"] . "</transactionKey>\n</merchantAuthentication>\n<customerProfileId>" . $gatewayids[0] . "</customerProfileId>\n<paymentProfile>\n<billTo>\n<firstName><![CDATA[" . $params["clientdetails"]["firstname"] . "]]></firstName>\n<lastName><![CDATA[" . $params["clientdetails"]["lastname"] . "]]></lastName>\n<company><![CDATA[" . $params["clientdetails"]["companyname"] . "]]></company>\n<address><![CDATA[" . $address . "]]></address>\n<city><![CDATA[" . $params["clientdetails"]["city"] . "]]></city>\n<state><![CDATA[" . $params["clientdetails"]["state"] . "]]></state>\n<zip><![CDATA[" . $params["clientdetails"]["postcode"] . "]]></zip>\n<country><![CDATA[" . $params["clientdetails"]["country"] . "]]></country>\n<phoneNumber>" . $params["clientdetails"]["phonenumber"] . "</phoneNumber>\n<faxNumber></faxNumber>\n</billTo>\n<payment>\n<creditCard>\n<cardNumber>" . $cardnum . "</cardNumber>\n<expirationDate>" . $expdate . "</expirationDate>\n</creditCard>\n</payment>\n<customerPaymentProfileId>" . $gatewayids[1] . "</customerPaymentProfileId>\n</paymentProfile>\n</updateCustomerPaymentProfileRequest>";
        $data = curlCall($url, $xml, array("HEADER" => array("Content-Type: text/xml")));
        logTransaction($params["paymentmethod"], $data, "Remote Storage Address Update");
        $gatewayids[2] = $nameaddresshash;
        invoiceSetPayMethodRemoteToken($params["invoiceid"], implode(",", $gatewayids));
    }
    if ($params["testmode"]) {
        $extraOptions = "x_solution_id=AAA100302&x_customer_ip=" . $remote_ip;
    } else {
        $extraOptions = "x_solution_id=AAA172606&x_customer_ip=" . $remote_ip;
    }
    $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<createCustomerProfileTransactionRequest xmlns=\"AnetApi/xml/v1/schema/AnetApiSchema.xsd\">\n<merchantAuthentication>\n<name>" . $params["loginid"] . "</name>\n<transactionKey>" . $params["transkey"] . "</transactionKey>\n</merchantAuthentication>\n<transaction>\n<profileTransAuthCapture>\n<amount>" . $params["amount"] . "</amount>\n<customerProfileId>" . $gatewayids[0] . "</customerProfileId>\n<customerPaymentProfileId>" . $gatewayids[1] . "</customerPaymentProfileId>\n<order>\n<invoiceNumber>" . $params["invoiceid"] . "</invoiceNumber>\n</order>\n<recurringBilling>false</recurringBilling>\n";
    if ($params["cccvv"]) {
        $xml .= "<cardCode>" . $params["cccvv"] . "</cardCode>\n";
    }
    $xml .= "</profileTransAuthCapture>\n</transaction>\n<extraOptions><![CDATA[" . $extraOptions . "]]></extraOptions>\n</createCustomerProfileTransactionRequest>";
    $data = curlCall($url, $xml, array("HEADER" => array("Content-Type: text/xml")));
    $xmldata = XMLtoArray($data);
    if ($xmldata["CREATECUSTOMERPROFILETRANSACTIONRESPONSE"]["MESSAGES"]["RESULTCODE"] == "Ok") {
        $transid = $xmldata["CREATECUSTOMERPROFILETRANSACTIONRESPONSE"]["DIRECTRESPONSE"];
        $transid = explode(",", $transid);
        $transid = $transid[6];
        return array("status" => "success", "transid" => $transid, "rawdata" => $data);
    }
    $response = $xmldata["CREATECUSTOMERPROFILETRANSACTIONRESPONSE"]["TRANSACTIONRESPONSE"];
    return array("status" => "error", "rawdata" => $data, "declinereason" => $response["ERRORS"]["ERROR"]["ERRORTEXT"]);
}
function authorizecim_storeremote($params)
{
    $url = $params["testmode"] ? "https://apitest.authorize.net/xml/v1/request.api" : "https://api2.authorize.net/xml/v1/request.api";
    $gatewayids = explode(",", $params["gatewayid"]);
    if ($params["action"] == "delete") {
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<deleteCustomerProfileRequest xmlns=\"AnetApi/xml/v1/schema/AnetApiSchema.xsd\">\n<merchantAuthentication>\n<name>" . $params["loginid"] . "</name>\n<transactionKey>" . $params["transkey"] . "</transactionKey>\n</merchantAuthentication>\n<customerProfileId>" . $gatewayids[0] . "</customerProfileId>\n</deleteCustomerProfileRequest>";
        $data = curlCall($url, $xml, array("HEADER" => array("Content-Type: text/xml")));
        $xmldata = XMLtoArray($data);
        $result = $xmldata["DELETECUSTOMERPROFILERESPONSE"]["MESSAGES"]["RESULTCODE"];
        $status = "success";
        if ($result == "Error") {
            $status = "Error";
        }
        $debugdata = array("Action" => "DeleteCard", "XMLData" => $data);
        return array("status" => $status, "rawdata" => $debugdata);
    }
    $address = authorizecim_addressFix($params["clientdetails"]["address1"]);
    if ($params["action"] == "update") {
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<updateCustomerPaymentProfileRequest xmlns=\"AnetApi/xml/v1/schema/AnetApiSchema.xsd\">\n<merchantAuthentication>\n<name>" . $params["loginid"] . "</name>\n<transactionKey>" . $params["transkey"] . "</transactionKey>\n</merchantAuthentication>\n<customerProfileId>" . $gatewayids[0] . "</customerProfileId>\n<paymentProfile>\n<billTo>\n<firstName><![CDATA[" . $params["clientdetails"]["firstname"] . "]]></firstName>\n<lastName><![CDATA[" . $params["clientdetails"]["lastname"] . "]]></lastName>\n<company><![CDATA[" . $params["clientdetails"]["companyname"] . "]]></company>\n<address><![CDATA[" . $address . "]]></address>\n<city><![CDATA[" . $params["clientdetails"]["city"] . "]]></city>\n<state><![CDATA[" . $params["clientdetails"]["state"] . "]]></state>\n<zip><![CDATA[" . $params["clientdetails"]["postcode"] . "]]></zip>\n<country><![CDATA[" . $params["clientdetails"]["country"] . "]]></country>\n<phoneNumber>" . $params["clientdetails"]["phonenumber"] . "</phoneNumber>\n<faxNumber></faxNumber>\n</billTo>\n<payment>\n<creditCard>\n";
        if (isset($params["cardlastfour"]) && $params["cardlastfour"] !== "") {
            $xml .= "<cardNumber>" . str_pad($params["cardlastfour"], 16, "X", STR_PAD_LEFT) . "</cardNumber>\n";
        }
        $xml .= "<expirationDate>20" . substr($params["cardexp"], 2, 2) . "-" . substr($params["cardexp"], 0, 2) . "</expirationDate>\n";
        if ($params["cccvv"]) {
            $xml .= "<cardCode>" . $params["cccvv"] . "</cardCode>\n";
        }
        $xml .= "</creditCard>\n</payment>\n<customerPaymentProfileId>" . $gatewayids[1] . "</customerPaymentProfileId>\n</paymentProfile>\n</updateCustomerPaymentProfileRequest>";
        $data = curlCall($url, $xml, array("HEADER" => array("Content-Type: text/xml")));
        $xmldata = XMLtoArray($data);
        $debugdata = array("Action" => "UpdateCustomer", "XMLData" => $data);
        if ($xmldata["UPDATECUSTOMERPAYMENTPROFILERESPONSE"]["MESSAGES"]["RESULTCODE"] == "Ok") {
            $nameaddresshash = md5($params["clientdetails"]["firstname"] . $params["clientdetails"]["lastname"] . $params["clientdetails"]["address1"] . $params["clientdetails"]["city"] . $params["clientdetails"]["state"] . $params["clientdetails"]["postcode"] . $params["clientdetails"]["country"]);
            $gatewayid = $gatewayids[0] . "," . $gatewayids[1] . "," . $nameaddresshash;
            return array("status" => "success", "gatewayid" => $gatewayid, "cardexpiry" => $params["cardexp"], "rawdata" => $debugdata);
        }
        if ($xmldata["UPDATECUSTOMERPAYMENTPROFILERESPONSE"]["MESSAGES"]["MESSAGE"]["TEXT"] == "The record cannot be found.") {
            $params["gatewayid"] = "";
        } else {
            return array("status" => "failed", "rawdata" => $debugdata);
        }
    }
    if ($params["action"] == "create") {
        $validationmode = $params["validationmode"] == "none" ? "none" : "liveMode";
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<createCustomerProfileRequest xmlns=\"AnetApi/xml/v1/schema/AnetApiSchema.xsd\">\n<merchantAuthentication>\n<name>" . $params["loginid"] . "</name>\n<transactionKey>" . $params["transkey"] . "</transactionKey>\n</merchantAuthentication>\n<profile>\n<merchantCustomerId>" . $params["clientdetails"]["userid"] . rand(100000, 999999) . "</merchantCustomerId>\n<email>" . $params["clientdetails"]["email"] . "</email>\n<paymentProfiles>\n<customerType>individual</customerType>\n<billTo>\n<firstName><![CDATA[" . $params["clientdetails"]["firstname"] . "]]></firstName>\n<lastName><![CDATA[" . $params["clientdetails"]["lastname"] . "]]></lastName>\n<company><![CDATA[" . $params["clientdetails"]["companyname"] . "]]></company>\n<address><![CDATA[" . $address . "]]></address>\n<city><![CDATA[" . $params["clientdetails"]["city"] . "]]></city>\n<state><![CDATA[" . $params["clientdetails"]["state"] . "]]></state>\n<zip><![CDATA[" . $params["clientdetails"]["postcode"] . "]]></zip>\n<country><![CDATA[" . $params["clientdetails"]["country"] . "]]></country>\n<phoneNumber>" . $params["clientdetails"]["phonenumber"] . "</phoneNumber>\n<faxNumber></faxNumber>\n</billTo>\n<payment>\n<creditCard>\n<cardNumber>" . $params["cardnum"] . "</cardNumber>\n<expirationDate>20" . substr($params["cardexp"], 2, 2) . "-" . substr($params["cardexp"], 0, 2) . "</expirationDate>\n";
        if ($params["cccvv"]) {
            $xml .= "<cardCode>" . $params["cccvv"] . "</cardCode>\n";
        }
        $xml .= "</creditCard>\n</payment>\n</paymentProfiles>\n</profile>\n<validationMode>" . $validationmode . "</validationMode>\n</createCustomerProfileRequest>";
        $data = curlCall($url, $xml, array("HEADER" => array("Content-Type: text/xml")));
        $xmldata = XMLtoArray($data);
        $debugdata = array("Action" => "CreateCustomer", "XMLData" => $data);
        if ($xmldata["CREATECUSTOMERPROFILERESPONSE"]["MESSAGES"]["RESULTCODE"] == "Ok") {
            $customerprofileid = $xmldata["CREATECUSTOMERPROFILERESPONSE"]["CUSTOMERPROFILEID"];
            $customerpaymentprofileid = $xmldata["CREATECUSTOMERPROFILERESPONSE"]["CUSTOMERPAYMENTPROFILEIDLIST"]["NUMERICSTRING"];
            $nameaddresshash = md5($params["clientdetails"]["firstname"] . $params["clientdetails"]["lastname"] . $params["clientdetails"]["address1"] . $params["clientdetails"]["city"] . $params["clientdetails"]["state"] . $params["clientdetails"]["postcode"] . $params["clientdetails"]["country"]);
            $gatewayid = $customerprofileid . "," . $customerpaymentprofileid . "," . $nameaddresshash;
            return array("status" => "success", "gatewayid" => $gatewayid, "rawdata" => $debugdata);
        }
        if ($xmldata["CREATECUSTOMERPROFILERESPONSE"]["MESSAGES"]["MESSAGE"]["CODE"] == "E00039") {
        }
        return array("status" => "failed", "rawdata" => $debugdata);
    }
    return array("status" => "skipped", "rawdata" => array("Error" => "No Action Found"));
}
function authorizecim_refund($params)
{
    global $CONFIG;
    if ($params["testmode"]) {
        $url = "https://apitest.authorize.net/xml/v1/request.api";
    } else {
        $url = "https://api2.authorize.net/xml/v1/request.api";
    }
    $gatewayids = explode(",", $params["gatewayid"]);
    $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<createCustomerProfileTransactionRequest xmlns=\"AnetApi/xml/v1/schema/AnetApiSchema.xsd\">\n<merchantAuthentication>\n<name>" . $params["loginid"] . "</name>\n<transactionKey>" . $params["transkey"] . "</transactionKey>\n</merchantAuthentication>\n<transaction>\n<profileTransRefund>\n<amount>" . $params["amount"] . "</amount>\n<customerProfileId>" . $gatewayids[0] . "</customerProfileId>\n<customerPaymentProfileId>" . $gatewayids[1] . "</customerPaymentProfileId>\n<order>\n<invoiceNumber>" . $params["invoiceid"] . "</invoiceNumber>\n</order>\n<transId>" . $params["transid"] . "</transId>\n</profileTransRefund>\n</transaction>\n<extraOptions><![CDATA[x_customer_ip=" . $remote_ip . "]]></extraOptions>\n</createCustomerProfileTransactionRequest>";
    $data = curlCall($url, $xml, array("HEADER" => array("Content-Type: text/xml")));
    $xmldata = XMLtoArray($data);
    if ($xmldata["CREATECUSTOMERPROFILETRANSACTIONRESPONSE"]["MESSAGES"]["RESULTCODE"] == "Ok") {
        $transid = $xmldata["CREATECUSTOMERPROFILETRANSACTIONRESPONSE"]["DIRECTRESPONSE"];
        $transid = explode(",", $transid);
        $transid = $transid[6];
        return array("status" => "success", "transid" => $transid, "rawdata" => $data);
    }
    return array("status" => "error", "rawdata" => $data);
}
function authorizecim_adminstatusmsg($vars)
{
    $gatewayids = $vars["gatewayid"];
    if ($gatewayids) {
        $gatewayids = explode(",", $gatewayids);
        return array("type" => "info", "title" => "Authorize.net CIM Profile", "msg" => "This customer has a remote Authorize.net CIM Profile " . "storing their card details for automated recurring billing with ID " . $gatewayids[0]);
    }
}
function authorizecim_addressFix($address)
{
    $address = preg_replace("/[^a-zA-Z0-9 ]+/", "", $address);
    if (60 < strlen($address)) {
        $address = substr($address, 0, 60);
    }
    return $address;
}

?>