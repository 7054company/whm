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
if (!function_exists("getAdminName")) {
    require ROOTDIR . DIRECTORY_SEPARATOR . "includes" . DIRECTORY_SEPARATOR . "adminfunctions.php";
}
if (!function_exists("AddNote")) {
    require ROOTDIR . DIRECTORY_SEPARATOR . "includes" . DIRECTORY_SEPARATOR . "ticketfunctions.php";
}
$ticketnum = App::get_req_var("ticketnum");
$ticketid = (int) App::get_req_var("ticketid");
$message = App::getFromRequest("message");
$useMarkdown = stringLiteralToBool(App::get_req_var("markdown"));
if ($ticketnum) {
    $result = select_query("tbltickets", "id", array("tid" => $ticketnum));
} else {
    $result = select_query("tbltickets", "id", array("id" => $ticketid));
}
$data = mysql_fetch_array($result);
$ticketid = $data["id"];
if (!$ticketid) {
    $apiresults = array("result" => "error", "message" => "Ticket ID not found");
} else {
    if (!$message) {
        $apiresults = array("result" => "error", "message" => "Message is required");
    } else {
        AddNote($ticketid, $message, $useMarkdown);
        $apiresults = array("result" => "success");
    }
}

?>