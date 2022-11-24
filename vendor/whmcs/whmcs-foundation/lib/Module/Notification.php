<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 5.6
 * @ Decoder version: 1.0.4
 * @ Release: 02/06/2020
 *
 * @ ZendGuard Decoder PHP 5.6
 */

namespace WHMCS\Module;

class Notification extends AbstractModule
{
    protected $type = self::TYPE_NOTIFICATION;
    public function getActiveModules()
    {
        return \WHMCS\Database\Capsule::table("tblnotificationproviders")->where("active", "1")->distinct("name")->pluck("name");
    }
    public function getClassPath()
    {
        $module = $this->getLoadedModule();
        return "WHMCS\\Module\\Notification\\" . $module . "\\" . $module;
    }
    public function getAdminActivationForms($moduleName)
    {
        return array((new \WHMCS\View\Form())->setUriByRoutePath("admin-setup-notifications-overview")->setMethod(\WHMCS\View\Form::METHOD_GET)->setParameters(array("rp" => "/admin/setup/notifications/overview", "activate" => $moduleName))->setSubmitLabel(\AdminLang::trans("global.activate")));
    }
    public function getAdminManagementForms($moduleName)
    {
        return array((new \WHMCS\View\Form())->setUriByRoutePath("admin-setup-notifications-overview")->setMethod(\WHMCS\View\Form::METHOD_GET)->setParameters(array("rp" => "/admin/setup/notifications/overview"))->setSubmitLabel(\AdminLang::trans("global.manage")));
    }
}

?>