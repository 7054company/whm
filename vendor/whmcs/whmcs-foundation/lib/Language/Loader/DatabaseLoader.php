<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 5.6
 * @ Decoder version: 1.0.4
 * @ Release: 02/06/2020
 *
 * @ ZendGuard Decoder PHP 5.6
 */

namespace WHMCS\Language\Loader;

class DatabaseLoader extends \Symfony\Component\Translation\Loader\ArrayLoader implements \Symfony\Component\Translation\Loader\LoaderInterface
{
    public function load($resource, $locale, $domain = "dynamicMessages")
    {
        $dynamicMessages = array();
        \WHMCS\Language\DynamicTranslation::where("language", "=", $locale)->get(array("related_type", "related_id", "translation"))->map(function (\WHMCS\Language\DynamicTranslation $translation) use(&$dynamicMessages) {
            $keyChunks = explode(".", $translation->relatedType);
            $thisTranslation = \WHMCS\Input\Sanitize::decode($translation->translation);
            if (end($keyChunks) !== "description") {
                $thisTranslation = strip_tags($thisTranslation);
            }
            $dynamicMessages[str_replace("{id}", $translation->relatedId, $translation->relatedType)] = $thisTranslation;
        });
        return parent::load($dynamicMessages, $locale, $domain);
    }
}

?>