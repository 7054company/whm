<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 5.6
 * @ Decoder version: 1.0.4
 * @ Release: 02/06/2020
 *
 * @ ZendGuard Decoder PHP 5.6
 */

namespace WHMCS\View;

class ViewServiceProvider extends \WHMCS\Application\Support\ServiceProvider\AbstractServiceProvider
{
    public function register()
    {
        $this->app->singleton("asset", function () {
            return new Asset(\WHMCS\Utility\Environment\WebHelper::getBaseUrl(ROOTDIR, $_SERVER["SCRIPT_NAME"]));
        });
        $this->app->bind("View\\Engine\\Php\\Admin", function () {
            return new Engine\Php\Admin();
        });
        $this->app->bind("View\\Engine\\Smarty\\Admin", function () {
            return new Engine\Smarty\Admin();
        });
    }
}

?>