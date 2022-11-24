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
$statuses = array("Pending" => 0, "Active" => 0, "Fraud" => 0, "Cancelled" => 0);
$result = full_query("SELECT status, COUNT(*) AS count FROM tblorders GROUP BY status");
$apiresults = array("result" => "success", "totalresults" => 4);
while ($data = mysql_fetch_array($result)) {
    $statuses[$data["status"]] = $data["count"];
}
foreach ($statuses as $status => $ordercount) {
    $apiresults["statuses"]["status"][] = array("title" => $status, "count" => $ordercount);
}
$responsetype = "xml";

?>