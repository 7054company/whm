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
$payMethodId = (int) App::getFromRequest("paymethodid");
$clientId = (int) App::getFromRequest("clientid");
$failOnRemoteFailure = (bool) App::getFromRequest("failonremotefailure");
if (!$clientId) {
    $apiresults = array("result" => "error", "message" => "Client ID is Required");
} else {
    if (!$payMethodId) {
        $apiresults = array("result" => "error", "message" => "Pay Method ID is Required");
    } else {
        try {
            $payMethod = WHMCS\Payment\PayMethod\Model::findOrFail($payMethodId);
        } catch (Exception $e) {
            $apiresults = array("result" => "error", "message" => "Invalid Pay Method ID");
            return NULL;
        }
        if ($payMethod->userid != $clientId) {
            $apiresults = array("result" => "error", "message" => "Pay Method does not belong to passed Client ID");
        } else {
            $payment = $payMethod->payment;
            try {
                try {
                    if ($payment instanceof WHMCS\Payment\Contracts\RemoteTokenDetailsInterface) {
                        $payment->deleteRemote();
                    }
                } catch (Exception $e) {
                    logActivity("Remote deletion failed for pay method " . $payMethod->id . ", User ID: " . $payMethod->client->id);
                    if ($failOnRemoteFailure) {
                        throw $e;
                    }
                }
                $payMethod->delete();
            } catch (Exception $e) {
                $apiresults = array("result" => "error", "message" => "Error Deleting Remote Pay Method: " . $e->getMessage());
                return NULL;
            }
            $apiresults = array("result" => "success", "paymethodid" => $payMethodId);
        }
    }
}

?>