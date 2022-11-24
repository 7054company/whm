<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 5.6
 * @ Decoder version: 1.0.4
 * @ Release: 02/06/2020
 *
 * @ ZendGuard Decoder PHP 5.6
 */

namespace WHMCS\Admin\Utilities\System\PhpCompat\View\AccordionByCompat\Style;

class ThreeAssessmentGroup
{
    protected $assessmentGroups = array();
    public function __construct()
    {
        $this->assessmentGroups = $this->defaultAssessmentGroups();
    }
    public function defaultAssessmentGroups($phpVersionId = NULL)
    {
        if (in_array($phpVersionId, array("0506", "0700"))) {
            $unlikelyCompatText = \AdminLang::trans("phpCompatUtil.compatUnknownDesc1");
        } else {
            $unlikelyCompatText = \AdminLang::trans("phpCompatUtil.compatUnknownDesc2");
        }
        return array(\WHMCS\Environment\Ioncube\Contracts\EncodedFileInterface::ASSESSMENT_COMPAT_NO => array("type" => "Incompat", "desc" => \AdminLang::trans("phpCompatUtil.compatNoDesc"), "title" => \AdminLang::trans("phpCompatUtil.compatNoTitle"), "titleCssClass" => "default", "data" => array()), \WHMCS\Environment\Ioncube\Contracts\EncodedFileInterface::ASSESSMENT_COMPAT_UNLIKELY => array("type" => "Unknown", "desc" => $unlikelyCompatText, "title" => \AdminLang::trans("phpCompatUtil.compatUnknownTitle"), "titleCssClass" => "default", "data" => array()), \WHMCS\Environment\Ioncube\Contracts\EncodedFileInterface::ASSESSMENT_COMPAT_YES => array("type" => "Compat", "desc" => \AdminLang::trans("phpCompatUtil.compatYesDesc"), "title" => \AdminLang::trans("phpCompatUtil.compatYesTitle"), "titleCssClass" => "success", "data" => array()));
    }
}

?>