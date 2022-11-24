<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 5.6
 * @ Decoder version: 1.0.4
 * @ Release: 02/06/2020
 *
 * @ ZendGuard Decoder PHP 5.6
 */

namespace WHMCS\Cron\Task;

class InvoiceReminders extends \WHMCS\Scheduling\Task\AbstractTask
{
    protected $defaultPriority = 1550;
    protected $defaultFrequency = 1440;
    protected $defaultDescription = "Generate daily reminders for unpaid and overdue invoice";
    protected $defaultName = "Invoice & Overdue Reminders";
    protected $systemName = "InvoiceReminders";
    protected $outputs = array("unpaid" => array("defaultValue" => 0, "identifier" => "unpaid", "name" => "Unpaid Reminders"), "overdue.first" => array("defaultValue" => 0, "identifier" => "overdue.first", "name" => "First Overdue Notices"), "overdue.second" => array("defaultValue" => 0, "identifier" => "overdue.second", "name" => "Second Overdue Notices"), "overdue.third" => array("defaultValue" => 0, "identifier" => "overdue.third", "name" => "Third Overdue Notices"), "action.detail" => array("defaultValue" => "", "identifier" => "action.detail", "name" => "Action Detail"));
    protected $icon = "far fa-envelope";
    protected $successCountIdentifier = array("unpaid", "overdue.first", "overdue.second", "overdue.third");
    protected $successKeyword = "Sent";
    protected $hasDetail = true;
    public function __invoke()
    {
        $this->setDetails(array("unpaid" => array(), "first" => array(), "second" => array(), "third" => array(), "fourth" => array()));
        if (\WHMCS\Config\Setting::getValue("SendReminder") == "on" && \WHMCS\Config\Setting::getValue("SendInvoiceReminderDays")) {
            $this->sendUnpaidInvoiceReminders();
        }
        $this->sendOverdueInvoiceReminders();
        return true;
    }
    public function sendUnpaidInvoiceReminders()
    {
        $invoicedateyear = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") + \WHMCS\Config\Setting::getValue("SendInvoiceReminderDays"), date("Y")));
        $query = "SELECT id FROM tblinvoices" . " WHERE duedate='" . $invoicedateyear . "'" . " AND `status`='Unpaid'";
        $result = full_query($query);
        while ($data = mysql_fetch_array($result)) {
            $id = $data["id"];
            sendMessage("Invoice Payment Reminder", $id);
            run_hook("InvoicePaymentReminder", array("invoiceid" => $id, "type" => "reminder"));
            $this->addCustom("unpaid", array("invoice", $id));
        }
        $this->output("unpaid")->write(count($this->getCustom("unpaid")));
        return $this;
    }
    public function sendOverdueInvoiceReminders()
    {
        $types = array("First", "Second", "Third");
        foreach ($types as $type) {
            if (\WHMCS\Config\Setting::getValue("Send" . $type . "OverdueInvoiceReminder") != "0") {
                $adddate = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") - (int) \WHMCS\Config\Setting::getValue("Send" . $type . "OverdueInvoiceReminder"), date("Y")));
                $result = select_query("tblinvoices,tblclients", "tblinvoices.id,tblinvoices.userid,tblclients.firstname,tblclients.lastname", array("tblinvoices.duedate" => $adddate, "tblinvoices.status" => "Unpaid", "tblclients.overideduenotices" => "0", "tblclients.id" => array("sqltype" => "TABLEJOIN", "value" => "tblinvoices.userid")));
                while ($data = mysql_fetch_array($result)) {
                    $invoiceid = $data["id"];
                    $firstname = $data["firstname"];
                    $lastname = $data["lastname"];
                    $result2 = full_query("SELECT COUNT(tblinvoiceitems.id) FROM tblinvoiceitems" . " INNER JOIN tblhosting ON tblhosting.id = tblinvoiceitems.relid" . " WHERE tblinvoiceitems.type = 'Hosting' " . " AND tblhosting.overideautosuspend = '1'" . " AND tblhosting.overidesuspenduntil > '" . date("Y-m-d") . "'" . " AND tblhosting.overidesuspenduntil != '0000-00-00' " . " AND tblinvoiceitems.invoiceid = " . (int) $invoiceid);
                    $data2 = mysql_fetch_array($result2);
                    $numoverideautosuspend = $data2[0];
                    $typeKey = strtolower($type);
                    if ($numoverideautosuspend == "0") {
                        sendMessage($type . " Invoice Overdue Notice", $invoiceid);
                        run_hook("InvoicePaymentReminder", array("invoiceid" => $invoiceid, "type" => $typeKey . "overdue"));
                        $this->addCustom($typeKey, array("invoice", $invoiceid));
                    }
                }
            }
        }
        foreach ($types as $type) {
            $typeKey = strtolower($type);
            $this->output("overdue." . $typeKey)->write(count($this->getCustom($typeKey)));
        }
        $this->output("action.detail")->write(json_encode($this->getDetail()));
        return $this;
    }
}

?>