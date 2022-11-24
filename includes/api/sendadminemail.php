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
if ($custommessage) {
    WHMCS\Mail\Template::where("name", "=", "Mass Mail Template")->delete();
    $template = new WHMCS\Mail\Template();
    $template->type = "admin";
    $template->name = "Custom Admin Temp";
    $template->subject = WHMCS\Input\Sanitize::decode($customsubject);
    $template->message = WHMCS\Input\Sanitize::decode($custommessage);
    $template->disabled = false;
    $template->plaintext = false;
} else {
    try {
        $template = WHMCS\Mail\Template::where("name", "=", $messagename)->where("type", "=", "admin")->firstOrFail();
    } catch (Exception $e) {
        $apiresults = array("result" => "error", "message" => "Email Template not found");
        return NULL;
    }
}
if (!in_array($type, array("system", "account", "support"))) {
    $type = "system";
}
sendAdminMessage($template, $mergefields, $type, $deptid);
$apiresults = array("result" => "success");

?>