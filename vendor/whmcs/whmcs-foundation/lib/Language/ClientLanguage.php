<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 5.6
 * @ Decoder version: 1.0.4
 * @ Release: 02/06/2020
 *
 * @ ZendGuard Decoder PHP 5.6
 */

namespace WHMCS\Language;

class ClientLanguage extends AbstractLanguage
{
    protected $globalVariable = "_LANG";
    public static function getDirectory()
    {
        return ROOTDIR . DIRECTORY_SEPARATOR . "lang";
    }
    public static function factory($systemLanguage = "", $sessionLanguage = "", $requestLanguage = "", $inClientArea = false)
    {
        $languageName = $systemLanguage;
        $fallback = $languageName;
        if ($sessionLanguage != "") {
            $languageName = $sessionLanguage;
        }
        $updateClientProfile = false;
        if ($inClientArea && $requestLanguage != "") {
            $updateClientProfile = true;
            $languageName = $requestLanguage;
        }
        $requestedLanguage = trim(strtolower($languageName));
        $languageName = self::getValidLanguageName($languageName, $fallback);
        if ($requestedLanguage != $languageName) {
            $updateClientProfile = false;
        }
        $language = static::findOrCreate($languageName);
        if ($updateClientProfile) {
            \WHMCS\Session::set("Language", $languageName);
            $client = \WHMCS\User\Client::find(\WHMCS\Session::get("uid"));
            if (!is_null($client)) {
                $client->language = $languageName;
                $client->save();
            }
        }
        return $language;
    }
    public function getLanguageFileFooter()
    {
        return "////////// End of " . $this->getName() . " language file.  Do not place any translation strings below this line!\n";
    }
}

?>