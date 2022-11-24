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

class ClaimFactory extends AbstractClaim
{
    protected $claimMap = array("profile" => "\\WHMCS\\ApplicationLink\\OpenID\\Claim\\Profile", "email" => "\\WHMCS\\ApplicationLink\\OpenID\\Claim\\Email");
    protected $userClaims = array();
    protected $requestedClaims = array();
    public function __construct(\WHMCS\User\UserInterface $user, $claims)
    {
        $this->requestedClaims = $claims;
        parent::__construct($user);
    }
    protected function hydrate()
    {
        foreach ($this->requestedClaims as $claim) {
            $this->userClaims[$claim] = $this->getClaim($claim);
        }
        return $this;
    }
    public function getClaim($claim)
    {
        if (!isset($this->claimMap[$claim])) {
            return null;
        }
        if (isset($this->userClaims[$claim])) {
            return $this->userClaims[$claim];
        }
        $class = $this->claimMap[$claim];
        return new $class($this->getUser());
    }
    public function toArray()
    {
        $data = array();
        foreach ($this->userClaims as $userClaim) {
            if ($userClaim) {
                $data += $userClaim->toArray();
            }
        }
        return $data;
    }
}

?>