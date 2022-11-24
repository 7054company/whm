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
if (!function_exists("ServerUnsuspendAccount")) {
    require ROOTDIR . "/includes/modulefunctions.php";
}
$serviceId = (int) App::getFromRequest("serviceid");
if (!$serviceId && App::isInRequest("accountid")) {
    $serviceId = (int) App::getFromRequest("accountid");
}
if (!$serviceId) {
    $apiresults = array("result" => "error", "message" => "Service ID is required");
} else {
    $data = WHMCS\Database\Capsule::table("tblhosting")->leftJoin("tblproducts", "tblhosting.packageid", "=", "tblproducts.id")->where("tblhosting.id", $serviceId)->first(array("tblhosting.id as service_id", "tblproducts.servertype as module"));
    if (!$data) {
        $apiresults = array("result" => "error", "message" => "Service ID not found");
    } else {
        if (!$data->module) {
            $apiresults = array("result" => "error", "message" => "Service not assigned to a module");
        } else {
            $serviceId = $data->service_id;
            $result = ServerUnsuspendAccount($serviceId);
            if ($result == "success") {
                $apiresults = array("result" => "success");
            } else {
                $apiresults = array("result" => "error", "message" => $result);
            }
        }
    }
}

?>