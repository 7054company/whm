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

class CurrencyUpdateExchangeRates extends \WHMCS\Scheduling\Task\AbstractTask
{
    protected $defaultPriority = 1500;
    protected $defaultFrequency = 1440;
    protected $defaultDescription = "Update Currency Exchange Rates";
    protected $defaultName = "Currency Exchange Rates";
    protected $systemName = "CurrencyUpdateExchangeRates";
    protected $outputs = array("updated" => array("defaultValue" => 0, "identifier" => "updated", "name" => "Exchange Rates Updated"));
    protected $icon = "fas fa-chart-line";
    protected $isBooleanStatus = true;
    protected $successCountIdentifier = "updated";
    public function __invoke()
    {
        if (!function_exists("currencyUpdateRates")) {
            include_once ROOTDIR . "/includes/currencyfunctions.php";
        }
        if (\WHMCS\Config\Setting::getValue("CurrencyAutoUpdateExchangeRates")) {
            currencyUpdateRates($this);
        }
        return $this;
    }
}

?>