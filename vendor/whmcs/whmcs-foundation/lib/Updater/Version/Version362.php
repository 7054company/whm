<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 5.6
 * @ Decoder version: 1.0.4
 * @ Release: 02/06/2020
 *
 * @ ZendGuard Decoder PHP 5.6
 */

namespace WHMCS\Updater\Version;

class Version362 extends IncrementalVersion
{
    protected function runUpdateCode()
    {
        mysql_query("ALTER TABLE `tblaffiliateswithdrawals` CHANGE `id` `id` INT( 10 ) NOT NULL AUTO_INCREMENT , CHANGE `affiliateid` `affiliateid` INT( 10 ) NOT NULL");
        mysql_query("CREATE INDEX affiliateid ON tblaffiliateswithdrawals (affiliateid)");
        $query = "SELECT * FROM tbladmins";
        $result = mysql_query($query);
        while ($data = mysql_fetch_array($result)) {
            $adminid = $data["id"];
            $supportdepts = $data["supportdepts"];
            $supportdepts = explode(",", $supportdepts);
            $newsupportdepts = ",";
            foreach ($supportdepts as $supportdept) {
                if ($supportdept) {
                    $newsupportdepts .= ltrim($supportdept, 0) . ",";
                }
            }
            $query2 = "UPDATE tbladmins SET supportdepts='" . $newsupportdepts . "' WHERE id='" . $adminid . "'";
            $result2 = mysql_query($query2);
        }
        return $this;
    }
}

?>