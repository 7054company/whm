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
if (!$limitstart) {
    $limitstart = 0;
}
if (!$limitnum) {
    $limitnum = 25;
}
$status = App::getFromRequest("status");
$where = array();
if ($status == "Incomplete") {
    $where["status"] = array("sqltype" => "NEQ", "value" => "Completed");
} else {
    if ($status) {
        $where["status"] = $status;
    }
}
$result = select_query("tbltodolist", "COUNT(id)", $where);
$data = mysql_fetch_array($result);
$totalresults = $data[0];
$result = select_query("tbltodolist", "", $where, "duedate", "DESC", (string) $limitstart . "," . $limitnum);
$apiresults = array("result" => "success", "totalresults" => $totalresults, "startnumber" => $limitstart, "numreturned" => mysql_num_rows($result));
while ($data = mysql_fetch_assoc($result)) {
    $data["title"] = $data["title"];
    $data["description"] = strip_tags($data["description"]);
    $apiresults["items"]["item"][] = $data;
}
$responsetype = "xml";

?>