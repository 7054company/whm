<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 5.6
 * @ Decoder version: 1.0.4
 * @ Release: 02/06/2020
 *
 * @ ZendGuard Decoder PHP 5.6
 */

namespace WHMCS\Admin\ApplicationSupport\View\Html\Helper;

class ContactSelectedDropDown extends ClientSelectedDropDown
{
    protected $includeClientAsOption = false;
    protected $selectorClass = "selectize-contact-search";
    protected $client = NULL;
    public function __construct(\WHMCS\User\Client $client, $includeClientAsOption = false, $nameAttribute = "userid", $selected = 0)
    {
        $this->client = $client;
        if ($includeClientAsOption) {
            $this->includeClientAsOption = true;
        }
        parent::__construct($nameAttribute, $selected);
    }
    public function setSelectedClientId($selectedClientId)
    {
        $this->selectedClientId = $selectedClientId;
        return $this;
    }
    protected function getSelectOptionsForClientId($clientId = 0)
    {
        $selectOptions = array();
        $contacts = $this->client->contacts;
        if ($this->includeClientAsOption) {
            $contacts->prepend($this->client);
        }
        foreach ($contacts as $contact) {
            $id = "";
            if ($contact instanceof \WHMCS\User\Client) {
                $id = "client-";
            }
            $id .= $contact->id;
            $selectOptions[$id] = sprintf("%s %s", $contact->fullName, $contact->companyname ? " (" . $contact->companyname . ")" : "");
        }
        return $selectOptions;
    }
}

?>