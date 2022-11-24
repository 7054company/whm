<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 5.6
 * @ Decoder version: 1.0.4
 * @ Release: 02/06/2020
 *
 * @ ZendGuard Decoder PHP 5.6
 */

namespace WHMCS\Billing\Invoice\Tax;

class Vat
{
    protected $invoice = NULL;
    public function __construct(\WHMCS\Billing\Invoice $invoice)
    {
        $this->invoice = $invoice;
    }
    public function setCustomInvoiceNumberFormat()
    {
        if ($this->invoice->invoiceNumber) {
            return false;
        }
        $format = \WHMCS\Config\Setting::getValue("TaxCustomInvoiceNumberFormat");
        $customNumber = \WHMCS\Config\Setting::getValue("TaxNextCustomInvoiceNumber");
        if (!$customNumber) {
            $customNumber = 1;
        }
        $date = \WHMCS\Carbon::today();
        $format = str_replace(array("{YEAR}", "{MONTH}", "{DAY}", "{NUMBER}"), array($date->format("Y"), $date->format("m"), $date->format("d"), $customNumber), $format);
        $this->invoice->invoiceNumber = $format;
        $this->incrementNextCustomInvoiceNumber($customNumber);
        return true;
    }
    public function setInvoiceDateOnPayment()
    {
        if (\WHMCS\Config\Setting::getValue("TaxSetInvoiceDateOnPayment")) {
            $this->invoice->dateCreated = \WHMCS\Carbon::now()->toDateString();
        }
    }
    protected function incrementNextCustomInvoiceNumber($lastNumber)
    {
        $newNumber = \WHMCS\Invoices::padAndIncrement($lastNumber);
        \WHMCS\Config\Setting::setValue("TaxNextCustomInvoiceNumber", $newNumber);
        return $newNumber;
    }
}

?>