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

class CurrencyUpdateProductPricing extends \WHMCS\Scheduling\Task\AbstractTask
{
    protected $defaultPriority = 1510;
    protected $defaultFrequency = 1440;
    protected $defaultDescription = "Update Product Prices for Current Rates";
    protected $defaultName = "Product Pricing Updates";
    protected $systemName = "CurrencyUpdateProductPricing";
    protected $outputs = array("updated" => array("defaultValue" => 0, "identifier" => "updated", "name" => "Pricing Updated for Exchange Rates"));
    protected $icon = "far fa-money-bill-alt";
    protected $isBooleanStatus = true;
    protected $successCountIdentifier = "updated";
    protected $successKeyword = "Completed";
    public function __invoke()
    {
        if (!function_exists("currencyUpdatePricing")) {
            include_once ROOTDIR . "/includes/currencyfunctions.php";
        }
        if (\WHMCS\Config\Setting::getValue("CurrencyAutoUpdateProductPrices")) {
            currencyUpdatePricing();
            $this->output("updated")->write(1);
            logActivity("Cron Job: Products Updated for Current Rates");
        }
        return $this;
    }
}

?>