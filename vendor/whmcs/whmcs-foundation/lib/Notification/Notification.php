<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 5.6
 * @ Decoder version: 1.0.4
 * @ Release: 02/06/2020
 *
 * @ ZendGuard Decoder PHP 5.6
 */

namespace WHMCS\Notification;

class Notification implements Contracts\NotificationInterface
{
    protected $title = "";
    protected $message = "";
    protected $url = "";
    protected $attributes = array();
    public function getTitle()
    {
        return $this->title;
    }
    public function getMessage()
    {
        return $this->message;
    }
    public function getUrl()
    {
        return $this->url;
    }
    public function getAttributes()
    {
        return $this->attributes;
    }
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
        return $this;
    }
    public function setTitle($title)
    {
        $this->title = trim($title);
        return $this;
    }
    public function setMessage($message)
    {
        $this->message = trim($message);
        return $this;
    }
    public function setUrl($url)
    {
        $this->url = trim($url);
        return $this;
    }
    public function addAttribute(Contracts\NotificationAttributeInterface $attribute)
    {
        $this->attributes[] = $attribute;
        return $this;
    }
}

?>