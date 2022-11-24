<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 5.6
 * @ Decoder version: 1.0.4
 * @ Release: 02/06/2020
 *
 * @ ZendGuard Decoder PHP 5.6
 */

namespace WHMCS\Smarty\Security\Settings;

class MailPolicy extends SystemPolicy
{
    protected function getDefaultPolicySettings()
    {
        $defaults = parent::getDefaultPolicySettings();
        $defaults["php_modifiers"] = array("escape", "count", "urlencode", "ucfirst", "date_format", "nl2br");
        $defaults["php_functions"] = array("isset", "empty", "count", "sizeof", "in_array", "is_array", "time", "nl2br");
        $defaults["static_classes"] = null;
        $defaults["trusted_static_methods"] = null;
        $defaults["trusted_static_properties"] = null;
        $defaults["streams"] = null;
        $defaults["allow_super_globals"] = false;
        $defaults["disabled_tags"] = array_merge($defaults["disabled_tags"] ?: array(), array("include", "block", "function"));
        return $defaults;
    }
}

?>