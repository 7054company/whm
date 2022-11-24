<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 5.6
 * @ Decoder version: 1.0.4
 * @ Release: 02/06/2020
 *
 * @ ZendGuard Decoder PHP 5.6
 */

namespace WHMCS;

class TableQuery
{
    protected $recordOffset = 0;
    protected $recordLimit = 25;
    protected $data = array();
    public function getData()
    {
        return $this->data;
    }
    public function getOne()
    {
        return isset($this->data[0]) ? $this->data[0] : null;
    }
    public function setRecordLimit($limit)
    {
        $this->recordLimit = $limit;
        return $this;
    }
    public function getRecordLimit()
    {
        return $this->recordLimit;
    }
    public function getRecordOffset()
    {
        $page = $this->getPageObj()->getPage();
        $offset = ($page - 1) * $this->getRecordLimit();
        return $offset;
    }
    public function getQueryLimit()
    {
        return $this->getRecordOffset() . "," . $this->getRecordLimit();
    }
    public function setData($data = array())
    {
        if (!is_array($data)) {
            throw new \InvalidArgumentException("Dataset must be an array");
        }
        $this->data = $data;
        return $this;
    }
}

?>