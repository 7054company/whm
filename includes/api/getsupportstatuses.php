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
$statuses = array();
$result = select_query("tblticketstatuses", "", "", "sortorder", "ASC");
while ($data = mysql_fetch_array($result)) {
    $statuses[$data["title"]] = 0;
}
$apiresults = array("result" => "success", "totalresults" => count($statuses), "statuses" => array("status" => array()));
$where = "";
$deptid = (int) App::get_req_var("deptid");
$statusesCountQuery = WHMCS\Database\Capsule::table("tbltickets");
if ($deptid) {
    $statusesCountQuery = $statusesCountQuery->where("did", "=", $deptid);
}
$statusesCountResults = $statusesCountQuery->where("merged_ticket_id", "=", 0)->groupBy("status")->pluck(WHMCS\Database\Capsule::raw("count(id)"), "status");
foreach ($statuses as $status => $count) {
    $apiresults["statuses"]["status"][] = array("title" => $status, "count" => $statusesCountResults[$status] ? $statusesCountResults[$status] : 0);
}
$responsetype = "xml";

?>