<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 5.6
 * @ Decoder version: 1.0.4
 * @ Release: 02/06/2020
 *
 * @ ZendGuard Decoder PHP 5.6
 */

namespace WHMCS\ApplicationLink\OpenID\Claim;

class Profile extends AbstractClaim
{
    public $name = NULL;
    public $family_name = NULL;
    public $given_name = NULL;
    public $preferred_username = NULL;
    public $locale = NULL;
    public $update_at = NULL;
    public function hydrate()
    {
        $user = $this->getUser();
        $this->name = $user->fullName;
        $this->family_name = $user->lastName;
        $this->given_name = $user->firstName;
        $this->preferred_username = $user->username;
        $this->update_at = $user->updatedAt->toDateTimeString();
        $lang = new \WHMCS\Language\ClientLanguage($user->language);
        $this->locale = str_replace("_", "-", $lang->getLanguageLocale());
        if (strpos($this->update_at, "0000") === 0 || strpos($this->update_at, "-0001") === 0) {
            $this->update_at = null;
        }
        return $this;
    }
}

?>