<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 5.6
 * @ Decoder version: 1.0.4
 * @ Release: 02/06/2020
 *
 * @ ZendGuard Decoder PHP 5.6
 */

namespace WHMCS\Admin\ApplicationSupport\View\Html\Php;

class TemplatePage extends \WHMCS\Admin\ApplicationSupport\View\Html\ContentWrapper
{
    use \WHMCS\Admin\ApplicationSupport\View\Traits\AdminHtmlViewTrait;
    use \WHMCS\Admin\ApplicationSupport\View\Traits\VersionTrait;
    public function __construct($templateName, array $data = array(), $status = 200, array $headers = array())
    {
        $this->setTemplateName($templateName)->setTemplateVariables($data);
        parent::__construct("", $status, $headers);
    }
    public function getTemplateDirectory()
    {
        return "admin";
    }
    protected function factoryEngine()
    {
        $templateEngine = \DI::make("View\\Engine\\Php\\Admin");
        $baseDir = $templateEngine->getDirectory();
        $spaceDir = $baseDir . DIRECTORY_SEPARATOR . $this->getTemplateDirectory();
        $templateEngine->setDirectory($spaceDir);
        return $templateEngine;
    }
    public function getBodyContent()
    {
        $this->prepareVariableContent();
        if (!$this->bodyContent) {
            $this->bodyContent = "";
            if ($this->getTemplateName()) {
                $this->bodyContent = view($this->getTemplateName(), $this->getTemplateVariables(), $this->factoryEngine());
            }
        }
        return $this->bodyContent;
    }
}

?>