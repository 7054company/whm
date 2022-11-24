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
if (!function_exists("getRegistrarConfigOptions")) {
    require ROOTDIR . "/includes/registrarfunctions.php";
}
if (!function_exists("ModuleBuildParams")) {
    require ROOTDIR . "/includes/modulefunctions.php";
}
if (!function_exists("changeOrderStatus")) {
    require ROOTDIR . "/includes/orderfunctions.php";
}
$whmcs = App::self();
$result = select_query("tblorders", "", array("id" => $orderid, "status" => "Pending"));
$data = mysql_fetch_array($result);
$orderid = $data["id"];
if (!$orderid) {
    $apiresults = array("result" => "error", "message" => "Order ID not found or Status not Pending");
} else {
    if ($cancelSubscription = (bool) $whmcs->get_req_var("cancelsub")) {
        require_once ROOTDIR . "/includes/gatewayfunctions.php";
    }
    $msg = changeOrderStatus($orderid, "Cancelled", $cancelSubscription);
    if ($msg == "subcancelfailed") {
        $apiresults = array("result" => "error", "message" => "Subscription Cancellation Failed - Please check the gateway log for further information");
    } else {
        $apiresults = array("result" => "success");
    }
}

?>