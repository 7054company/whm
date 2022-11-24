<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 5.6
 * @ Decoder version: 1.0.4
 * @ Release: 02/06/2020
 *
 * @ ZendGuard Decoder PHP 5.6
 */

echo "\n<form id=\"frmTaxSettings\" class=\"form-horizontal frm-tax-config\" name=\"frmTaxSettings\" method=\"post\" action=\"";
echo routePath("admin-setup-payments-tax-settings");
echo "\">\n\n    <div class=\"admin-tabs-v2\">\n\n        <ul class=\"nav nav-tabs admin-tabs\" role=\"tablist\">\n            <li class=\"active\" role=\"presentation\">\n                <a id=\"tabTaxGeneral\" data-toggle=\"tab\" href=\"#contentTaxGeneral\" role=\"tab\">\n                    ";
echo AdminLang::trans("taxconfig.generalSettings");
echo "                </a>\n            </li>\n            <li role=\"presentation\">\n                <a id=\"tabTaxVat\" data-toggle=\"tab\" href=\"#contentTaxVat\" role=\"tab\">\n                    ";
echo AdminLang::trans("taxconfig.vatSettings");
echo "                </a>\n            </li>\n            <li role=\"presentation\">\n                <a id=\"tabTaxRules\" data-toggle=\"tab\" href=\"#contentTaxRules\" role=\"tab\">\n                    ";
echo AdminLang::trans("taxconfig.taxrulestitle");
echo "                </a>\n            </li>\n            <li role=\"presentation\">\n                <a id=\"tabTaxAdvanced\" data-toggle=\"tab\" href=\"#contentTaxAdvanced\" role=\"tab\">\n                    ";
echo AdminLang::trans("taxconfig.advancedSettings");
echo "                </a>\n            </li>\n        </ul>\n        <div class=\"tab-content tax-configuration\">\n            <div class=\"tab-pane active\" id=\"contentTaxGeneral\">\n\n                <div class=\"form-group do-not-disable\">\n                    <label for=\"taxenabled\" class=\"col-md-4 col-sm-6 control-label\">\n                        ";
echo AdminLang::trans("taxconfig.taxsupportenabled");
echo "<br>\n                        <small>";
echo AdminLang::trans("taxconfig.taxsupportenableddesc");
echo "</small>\n                    </label>\n                    <div class=\"col-md-8 col-sm-6\">\n                        <input type=\"checkbox\" class=\"tax-toggle-switch do-not-disable\" name=\"taxenabled\" id=\"taxenabled\" ";
echo $taxEnabled;
echo ">\n                    </div>\n                </div>\n\n                <div class=\"form-group\">\n                    <label for=\"taxCode\" class=\"col-md-4 col-sm-6 control-label\">\n                        ";
echo AdminLang::trans("taxconfig.taxCode");
echo "<br>\n                        <small>";
echo AdminLang::trans("taxconfig.taxCodeDescription");
echo "</small>\n                    </label>\n                    <div class=\"col-md-8 col-sm-6\">\n                        <input type=\"text\" id=\"taxCode\" name=\"tax_code\" class=\"form-control input-200 input-inline\" value=\"";
echo $taxCode;
echo "\">\n                    </div>\n                </div>\n\n                <div class=\"form-group\">\n                    <label for=\"taxCode\" class=\"col-md-4 col-sm-6 control-label\">\n                        ";
echo AdminLang::trans("taxconfig.enableTaxIdField");
echo "<br>\n                        <small>";
echo AdminLang::trans("taxconfig.taxIdFieldDescription");
echo "</small>\n                    </label>\n                    <div class=\"col-md-8 col-sm-6\">\n                        <input type=\"checkbox\" class=\"tax-toggle-switch\" name=\"tax_id_enabled\" id=\"taxIdEnabled\" value=\"1\" ";
echo $taxIdEnabled;
echo ">\n                    </div>\n                </div>\n\n                <div class=\"form-group\">\n                    <label for=\"taxtype\" class=\"col-md-4 col-sm-6 control-label\">\n                        ";
echo AdminLang::trans("taxconfig.taxtype");
echo "<br>\n                        <small>";
echo AdminLang::trans("taxconfig.chooseTaxType");
echo "</small>\n                    </label>\n                    <div class=\"col-md-8 col-sm-6\">\n                        <label class=\"radio-inline\">\n                            <input type=\"radio\" name=\"taxtype\" value=\"Exclusive\"";
echo $exclusiveTaxAttribute;
echo ">\n                            ";
echo AdminLang::trans("taxconfig.taxtypeexclusive");
echo "                        </label>\n                        <br>\n                        <label class=\"radio-inline\">\n                            <input type=\"radio\" name=\"taxtype\" value=\"Inclusive\"";
echo $inclusiveTaxAttribute;
echo ">\n                            ";
echo AdminLang::trans("taxconfig.taxtypeinclusive");
echo "                        </label>\n                    </div>\n                </div>\n\n                <hr>\n\n                <div class=\"form-group\">\n                    <label for=\"customNumbering\" class=\"col-md-4 col-sm-6 control-label\">\n                        ";
echo AdminLang::trans("taxconfig.customInvoiceNumbering");
echo "<br>\n                        <small>";
echo AdminLang::trans("taxconfig.customInvoiceNumberingDescription");
echo "</small>\n                    </label>\n                    <div class=\"col-md-8 col-sm-6\">\n                        <input type=\"hidden\" name=\"custom_invoice_numbering\" value=\"0\">\n                        <input type=\"checkbox\" class=\"tax-toggle-switch\" name=\"custom_invoice_numbering\" id=\"customNumbering\" value=\"1\"";
echo $taxCustomInvoiceNumbering;
echo ">\n                    </div>\n                </div>\n\n                <div class=\"form-group\">\n                    <label for=\"inputCustomFormat\" class=\"col-md-4 col-sm-6 control-label\">\n                        ";
echo AdminLang::trans("taxconfig.customInvoiceNumberFormat");
echo "<br>\n                        <small>\n                            ";
echo AdminLang::trans("taxconfig.customInvoiceNumberFormatDescription");
echo "                        </small>\n                    </label>\n                    <div class=\"col-md-8 col-sm-6\">\n                        <input type=\"text\" name=\"custom_invoice_number_format\" id=\"inputCustomFormat\" value=\"";
echo $taxCustomInvoiceNumberFormat;
echo "\" class=\"form-control input-300\" />\n                        <small>";
echo AdminLang::trans("taxconfig.availableFormatTags");
echo ":\n                            {YEAR} {MONTH} {DAY} {NUMBER}\n                        </small>\n                    </div>\n                </div>\n\n                <div class=\"form-group\">\n                    <label for=\"inputCustomNumber\" class=\"col-md-4 col-sm-6 control-label\">\n                        ";
echo AdminLang::trans("taxconfig.nextCustomInvoiceNumber");
echo "<br>\n                        <small>";
echo AdminLang::trans("general.nextpaidnumberinfo");
echo "</small>\n                    </label>\n                    <div class=\"col-md-8 col-sm-6\">\n                        <input type=\"number\" name=\"next_custom_invoice_number\" id=\"inputCustomNumber\" placeholder=\"";
echo $nextCustomInvoiceNumber;
echo "\" class=\"form-control input-125 input-inline\" />\n                    </div>\n                </div>\n\n                <div class=\"form-group\">\n                    <label for=\"custom_invoice_number_reset_frequency\" class=\"col-md-4 col-sm-6 control-label\">\n                        ";
echo AdminLang::trans("taxconfig.autoResetNumbering");
echo "<br>\n                        <small>\n                            ";
echo AdminLang::trans("taxconfig.autoResetNumberingDescription");
echo "                        </small>\n                    </label>\n                    <div class=\"col-md-8 col-sm-6\">\n                        <label class=\"radio-inline\">\n                            <input type=\"radio\" name=\"custom_invoice_number_reset_frequency\" value=\"\" ";
echo $autoResetNumberingNever;
echo " />\n                            ";
echo AdminLang::trans("taxconfig.resetNever");
echo "                        </label>\n                        <label class=\"radio-inline\">\n                            <input type=\"radio\" name=\"custom_invoice_number_reset_frequency\" value=\"monthly\" ";
echo $autoResetNumberingMonthly;
echo " />\n                            ";
echo AdminLang::trans("taxconfig.resetMonthly");
echo "                        </label>\n                        <label class=\"radio-inline\">\n                            <input type=\"radio\" name=\"custom_invoice_number_reset_frequency\" value=\"annually\" ";
echo $autoResetNumberingAnnually;
echo " />\n                            ";
echo AdminLang::trans("taxconfig.resetAnnually");
echo "                        </label>\n                    </div>\n                </div>\n\n                <hr>\n\n                <div class=\"row\">\n                    <div class=\"col-md-8 col-md-offset-4 col-sm-6 col-sm-offset-6\">\n                        <button type=\"submit\" class=\"btn btn-primary\" id=\"btnSaveConfig1\">\n                            ";
echo AdminLang::trans("global.save");
echo "                        </button>\n                        <button type=\"reset\" class=\"btn btn-default\">\n                            ";
echo AdminLang::trans("global.cancel");
echo "                        </button>\n                    </div>\n                </div>\n            </div>\n\n            <div class=\"tab-pane\" id=\"contentTaxVat\">\n\n                <div class=\"form-group\">\n                    <label for=\"vatenabled\" class=\"col-md-4 col-sm-6 control-label\">\n                        ";
echo AdminLang::trans("taxconfig.vatSupport");
echo "<br>\n                        <small>";
echo AdminLang::trans("taxconfig.vatSupportDescription");
echo "</small>\n                    </label>\n                    <div class=\"col-md-8 col-sm-6\">\n                        <input type=\"hidden\" name=\"vatenabled\" value=\"0\">\n                        <input type=\"checkbox\" class=\"tax-toggle-switch\" name=\"vatenabled\" id=\"vatenabled\" value=\"1\"";
echo $taxVatSupport;
echo ">\n                        <a href=\"#\" class=\"btn btn-link\" data-toggle=\"modal\" data-target=\"#modalAutoSetupEuVatRules\">\n                            ";
echo AdminLang::trans("taxconfig.autoVatRulesSetup");
echo "                        </a>\n                    </div>\n                </div>\n\n                <hr>\n\n                <div class=\"form-group\">\n                    <label for=\"checkEUTaxValidation\" class=\"col-md-4 col-sm-6 control-label\">\n                        ";
echo AdminLang::trans("taxconfig.euTaxValidation");
echo "<br>\n                        <small>";
echo AdminLang::trans("taxconfig.euTaxValidationDescription");
echo "</small>\n                    </label>\n                    <div class=\"col-md-8 col-sm-6\">\n                        <input type=\"hidden\" name=\"eu_tax_validation\" value=\"0\">\n                        <input type=\"checkbox\" class=\"tax-toggle-switch\" name=\"eu_tax_validation\" id=\"checkEUTaxValidation\" value=\"1\"";
echo $taxEUTaxValidation;
echo ">\n                    </div>\n                </div>\n\n                ";
if ($customFieldOutput) {
    echo "                    <div class=\"form-group custom-field-row\">\n                        <label for=\"inputVatCustomField\" class=\"col-md-4 col-sm-6 control-label\">\n                            ";
    echo AdminLang::trans("taxconfig.vatCustomField");
    echo "<br>\n                            <small>";
    echo AdminLang::trans("taxconfig.euTaxValidationDescription");
    echo "</small>\n                        </label>\n                        <div class=\"col-md-8 col-sm-6\">\n                            <select name=\"vat_custom_field\" id=\"inputVatCustomField\" class=\"form-control select-inline do-not-disable\" readonly=\"readonly\">\n                                ";
    echo $customFieldOutput;
    echo "                            </select>\n                        </div>\n                    </div>\n\n                    <div class=\"form-group custom-field-row\">\n                        <label for=\"btnMigrate\" class=\"col-md-4 col-sm-6 control-label\">\n                            Migrate Custom Field Data<br>\n                            <small>Perform a one-time migration to transfer custom field data to the native field</small>\n                        </label>\n                        <div class=\"col-md-8 col-sm-6\">\n                            <button type=\"button\" class=\"btn btn-primary\" id=\"btnMigrate\" data-href=\"";
    echo routePath("admin-setup-payments-tax-migrate");
    echo "\">\n                                Run Migration\n                            </button>\n                        </div>\n                    </div>\n                ";
}
echo "\n                <div class=\"form-group\">\n                    <label for=\"taxExempt\" class=\"col-md-4 col-sm-6 control-label\">\n                        ";
echo AdminLang::trans("taxconfig.euTaxExempt");
echo "<br>\n                        <small>";
echo AdminLang::trans("taxconfig.euTaxExemptDescription");
echo "</small>\n                    </label>\n                    <div class=\"col-md-8 col-sm-6\">\n                        <input type=\"hidden\" name=\"eu_tax_exempt\" value=\"0\">\n                        <input type=\"checkbox\" name=\"eu_tax_exempt\" id=\"taxExempt\" value=\"1\" ";
echo $taxEUTaxExempt;
echo ">\n                    </div>\n                </div>\n\n                <div class=\"form-group\">\n                    <label for=\"homeCountry\" class=\"col-md-4 col-sm-6 control-label\">\n                        ";
echo AdminLang::trans("taxconfig.homeCountry");
echo "<br>\n                        <small>";
echo AdminLang::trans("taxconfig.homeCountryDescription");
echo "</small>\n                    </label>\n                    <div class=\"col-md-8 col-sm-6\">\n                        <select id=\"homeCountry\" name=\"home_country\" class=\"form-control select-inline\">\n                            ";
echo $homeCountryOutput;
echo "                        </select>\n                    </div>\n                </div>\n\n                <div class=\"form-group\">\n                    <label for=\"homeCountryExclusion\" class=\"col-md-4 col-sm-6 control-label\">\n                        ";
echo AdminLang::trans("taxconfig.homeCountryExclusion");
echo "<br>\n                        <small>";
echo AdminLang::trans("taxconfig.homeCountryExclusionDescription");
echo "</small>\n                    </label>\n                    <div class=\"col-md-8 col-sm-6\">\n                        <input type=\"hidden\" name=\"home_country_exempt\" value=\"0\">\n                        <input type=\"checkbox\" name=\"home_country_exempt\" id=\"homeCountryExclusion\" value=\"1\" ";
echo $taxEUHomeCountryNoExempt;
echo ">\n                    </div>\n                </div>\n\n                <hr>\n\n                <div class=\"form-group\">\n                    <label for=\"sequentialPaidNumbering\" class=\"col-md-4 col-sm-6 control-label\">\n                        ";
echo AdminLang::trans("taxconfig.sequentialPaidHeading");
echo "<br>\n                        <small>";
echo AdminLang::trans("taxconfig.sequentialPaidNumberDescription");
echo "</small>\n                    </label>\n                    <div class=\"col-md-8 col-sm-6\">\n                        <input type=\"hidden\" name=\"sequential_paid_numbering\" value=\"0\">\n                        <input type=\"checkbox\" class=\"tax-toggle-switch\" name=\"sequential_paid_numbering\" id=\"sequentialPaidNumbering\" value=\"1\"";
echo $sequentialInvoiceNumbering;
echo ">\n                    </div>\n                </div>\n\n                <div class=\"form-group\">\n                    <label for=\"sequentialPaidFormat\" class=\"col-md-4 col-sm-6 control-label\">\n                        ";
echo AdminLang::trans("taxconfig.sequentialPaid");
echo "<br>\n                        <small>\n                            ";
echo AdminLang::trans("taxconfig.sequentialPaidNumberDescription");
echo "                        </small>\n                    </label>\n                    <div class=\"col-md-8 col-sm-6\">\n                        <input type=\"text\" name=\"sequential_paid_format\" id=\"sequentialPaidFormat\" value=\"";
echo $sequentialInvoiceNumberFormat;
echo "\" class=\"form-control input-300\" />\n                        <small>\n                            ";
echo AdminLang::trans("taxconfig.availableFormatTags");
echo ":\n                            {YEAR} {MONTH} {DAY} {NUMBER}\n                        </small>\n                    </div>\n                </div>\n\n                <div class=\"form-group\">\n                    <label for=\"nextPaidNumber\" class=\"col-md-4 col-sm-6 control-label\">\n                        ";
echo AdminLang::trans("taxconfig.sequentialNextPaidNumber");
echo "<br>\n                        <small>";
echo AdminLang::trans("general.nextpaidnumberinfo");
echo "</small>\n                    </label>\n                    <div class=\"col-md-8 col-sm-6\">\n                        <input type=\"number\" name=\"next_paid_invoice_number\" id=\"nextPaidNumber\" placeholder=\"";
echo $sequentialInvoiceNumberValue;
echo "\" class=\"form-control input-125 input-inline\" />\n                    </div>\n                </div>\n\n                <div class=\"form-group\">\n                    <label for=\"paid_invoice_number_reset_frequency\" class=\"col-md-4 col-sm-6 control-label\">\n                        ";
echo AdminLang::trans("taxconfig.autoResetNumbering");
echo "<br>\n                        <small>\n                            ";
echo AdminLang::trans("taxconfig.autoResetNumberingDescription");
echo "                        </small>\n                    </label>\n                    <div class=\"col-md-8 col-sm-6\">\n                        <label class=\"radio-inline\">\n                            <input type=\"radio\" name=\"paid_invoice_number_reset_frequency\" value=\"\" ";
echo $paidResetNumberingNever;
echo " />\n                            ";
echo AdminLang::trans("taxconfig.resetNever");
echo "                        </label>\n                        <label class=\"radio-inline\">\n                            <input type=\"radio\" name=\"paid_invoice_number_reset_frequency\" value=\"monthly\" ";
echo $paidResetNumberingMonthly;
echo " />\n                            ";
echo AdminLang::trans("taxconfig.resetMonthly");
echo "                        </label>\n                        <label class=\"radio-inline\">\n                            <input type=\"radio\" name=\"paid_invoice_number_reset_frequency\" value=\"annually\" ";
echo $paidResetNumberingAnnually;
echo " />\n                            ";
echo AdminLang::trans("taxconfig.resetAnnually");
echo "                        </label>\n                    </div>\n                </div>\n\n                <div class=\"form-group\">\n                    <label for=\"setInvoiceDate\" class=\"col-md-4 col-sm-6 control-label\">\n                        ";
echo AdminLang::trans("taxconfig.setInvoiceDateOnPayment");
echo "<br>\n                        <small>";
echo AdminLang::trans("taxconfig.setInvoiceDateOnPaymentDescription");
echo "</small>\n                    </label>\n                    <div class=\"col-md-8 col-sm-6\">\n                        <input type=\"hidden\" name=\"set_invoice_date\" value=\"0\">\n                        <input type=\"checkbox\" name=\"set_invoice_date\" id=\"setInvoiceDate\" value=\"1\" ";
echo $taxSetInvoiceDateOnPayment;
echo " />\n                    </div>\n                </div>\n\n                <hr>\n\n                <div class=\"row\">\n                    <div class=\"col-md-8 col-md-offset-4 col-sm-6 col-sm-offset-6\">\n                        <button type=\"submit\" class=\"btn btn-primary\" id=\"btnSaveConfig2\">\n                            ";
echo AdminLang::trans("global.save");
echo "                        </button>\n                        <button type=\"reset\" class=\"btn btn-default\">\n                            ";
echo AdminLang::trans("global.cancel");
echo "                        </button>\n                    </div>\n                </div>\n\n            </div>\n            <div class=\"tab-pane\" id=\"contentTaxRules\">\n\n                <div class=\"panel panel-default\">\n                    <div class=\"panel-heading\">\n                        <h3 class=\"panel-title\">";
echo AdminLang::trans("taxconfig.quickAdd");
echo "</h3>\n                    </div>\n                    <div id=\"addTaxRule\" class=\"panel-body\" data-action=\"";
echo routePath("admin-setup-payments-tax-create");
echo "\">\n\n                        <div class=\"form-group\">\n                            <label for=\"ruleName\" class=\"col-lg-1 col-md-4 col-sm-6 control-label\">\n                                ";
echo AdminLang::trans("fields.name");
echo "                            </label>\n                            <div class=\"col-lg-3 col-sm-6\">\n                                <input type=\"text\" id=\"ruleName\" name=\"name\" class=\"form-control input-200 add-rule-field\" placeholder=\"";
echo AdminLang::trans("fields.tax");
echo "\"/>\n                            </div>\n                            <label for=\"taxRate\" class=\"col-lg-1 col-md-4 col-sm-6 control-label\">\n                                ";
echo AdminLang::trans("fields.taxrate");
echo "                            </label>\n                            <div class=\"col-lg-2 col-sm-6\">\n                                <div class=\"input-group\">\n                                    <input type=\"number\" id=\"taxRate\" name=\"taxrate\" class=\"form-control add-rule-field\" value=\"0.00\"/>\n                                    <div class=\"input-group-addon\">%</div>\n                                </div>\n                            </div>\n                            <label for=\"taxLevel\" class=\"col-lg-2 col-md-4 col-sm-6 control-label\">\n                                ";
echo AdminLang::trans("taxconfig.level");
echo "                            </label>\n                            <div class=\"col-lg-3 col-sm-6\">\n                                <select id=\"taxLevel\" name=\"level\" class=\"form-control add-rule-field\">\n                                    <option value=\"1\">\n                                        ";
echo AdminLang::trans("taxconfig.levelOne");
echo "                                    </option>\n                                    <option value=\"2\">\n                                        ";
echo AdminLang::trans("taxconfig.levelTwo");
echo "                                    </option>\n                                </select>\n                            </div>\n                        </div>\n\n                        <div class=\"form-group\">\n                            <label for=\"country\" class=\"col-md-4 col-sm-6 control-label\">\n                                ";
echo AdminLang::trans("fields.country");
echo "<br>\n                                <small>";
echo AdminLang::trans("taxconfig.countryFieldDescription");
echo "</small>\n                            </label>\n                            <div class=\"col-md-8 col-sm-6\">\n                                <label class=\"radio-inline\">\n                                    <input type=\"radio\" name=\"countrytype\" value=\"any\" checked>\n                                    ";
echo AdminLang::trans("taxconfig.taxappliesallcountry");
echo "                                </label>\n                                <br/>\n                                <label class=\"radio-inline\">\n                                    <input type=\"radio\" name=\"countrytype\" value=\"specific\">\n                                    ";
echo AdminLang::trans("taxconfig.taxappliesspecificcountry");
echo ":\n                                </label>\n                                &nbsp;&nbsp;&nbsp;\n                                <select id=\"country\" name=\"country\" class=\"form-control select-inline\">\n                                    ";
foreach ($countries as $code => $country) {
    echo "                                        <option value=\"";
    echo $code;
    echo "\">\n                                            ";
    echo $country;
    echo "                                        </option>\n                                    ";
}
echo "                                </select>\n                            </div>\n                        </div>\n\n                        <div class=\"form-group\">\n                            <label for=\"statetype\" class=\"col-md-4 col-sm-6 control-label\">\n                                ";
echo AdminLang::trans("fields.state");
echo "<br>\n                                <small>";
echo AdminLang::trans("taxconfig.stateFieldDescription");
echo "</small>\n                            </label>\n                            <div class=\"col-md-8 col-sm-6\">\n                                <label class=\"radio-inline\">\n                                    <input type=\"radio\" name=\"statetype\" value=\"any\" checked>\n                                    ";
echo AdminLang::trans("taxconfig.taxappliesallstate");
echo "                                </label>\n                                <br/>\n                                <label class=\"radio-inline\">\n                                    <input type=\"radio\" name=\"statetype\" value=\"specific\">\n                                    ";
echo AdminLang::trans("taxconfig.taxappliesspecificstate");
echo ":\n                                </label>\n                                &nbsp;&nbsp;&nbsp;\n                                <input type=\"text\" name=\"state\" data-selectinlinedropdown=\"1\" class=\"form-control input-200 input-inline\"/>\n                            </div>\n                        </div>\n\n                        <div class=\"btn-container\">\n                            <button id=\"btnAddRule\" type=\"button\" class=\"button btn btn-primary allow-disable\">\n                                ";
echo AdminLang::trans("taxconfig.addrule");
echo "                            </button>\n                        </div>\n                    </div>\n                </div>\n\n                <ul class=\"nav nav-tabs\" role=\"tablist\">\n                    <li class=\"active\" role=\"presentation\">\n                        <a id=\"tabLevelOneControl\" aria-controls=\"tax-rules-1\" data-toggle=\"tab\" href=\"#tabLevelOne\" role=\"tab\">\n                            ";
echo AdminLang::trans("taxconfig.level1rules");
echo "                        </a>\n                    </li>\n                    <li role=\"presentation\">\n                        <a id=\"tabLevelTwoControl\" aria-controls=\"tax-rules-2\" data-toggle=\"tab\" href=\"#tabLevelTwo\" role=\"tab\">\n                            ";
echo AdminLang::trans("taxconfig.level2rules");
echo "                        </a>\n                    </li>\n                </ul>\n                <div class=\"tab-content\">\n                    <!-- Level One Rules -->\n                    <div class=\"tab-pane active\" id=\"tabLevelOne\">\n                        <table class=\"table table-hover\" id=\"tableLevelOne\" data-level-id=\"1\">\n                            <tr>\n                                <th>";
echo AdminLang::trans("fields.name");
echo "</th>\n                                <th>";
echo AdminLang::trans("fields.country");
echo "</th>\n                                <th>";
echo AdminLang::trans("fields.state");
echo "</th>\n                                <th>";
echo AdminLang::trans("fields.taxrate");
echo "</th>\n                                <th></th>\n                            </tr>\n                            ";
foreach ($levelOneRules as $levelOneRule) {
    if (array_key_exists($levelOneRule->country, $countries)) {
        $country = $countries[$levelOneRule->country];
    } else {
        $country = $levelOneRule->country;
    }
    $state = $levelOneRule->state;
    if ($state == "") {
        $state = AdminLang::trans("taxconfig.taxappliesanystate");
    }
    if ($country == "") {
        $country = AdminLang::trans("taxconfig.taxappliesanycountry");
    }
    echo "                            <tr>\n                                <td>";
    echo (string) $levelOneRule->name;
    echo "</td>\n                                <td>";
    echo $country;
    echo "</td>\n                                <td>";
    echo $state;
    echo "</td>\n                                <td>";
    echo (string) $levelOneRule->taxrate;
    echo "%</td>\n                                <td>\n                                    <a class=\"deleteRule\" href=\"#\" data-href=\"";
    echo routePath("admin-setup-payments-tax-delete");
    echo "\" data-id=\"";
    echo (string) $levelOneRule->id;
    echo "\">\n                                        <img src=\"images/delete.gif\" border=\"0\">\n                                    </a>\n                                </td>\n                            </tr>\n                            ";
}
echo "                        </table>\n                    </div>\n                    <div class=\"tab-pane\" id=\"tabLevelTwo\">\n                        <table class=\"table table-hover\" id=\"tableLevelTwo\" data-level-id=\"2\">\n                            <tr>\n                                <th>";
echo AdminLang::trans("fields.name");
echo "</th>\n                                <th>";
echo AdminLang::trans("fields.country");
echo "</th>\n                                <th>";
echo AdminLang::trans("fields.state");
echo "</th>\n                                <th>";
echo AdminLang::trans("fields.taxrate");
echo "</th>\n                                <th></th>\n                            </tr>\n                            ";
foreach ($levelTwoRules as $levelTwoRule) {
    if (array_key_exists($levelTwoRule->country, $countries)) {
        $country = $countries[$levelTwoRule->country];
    } else {
        $country = $levelTwoRule->country;
    }
    $state = $levelTwoRule->state;
    if ($state == "") {
        $state = AdminLang::trans("taxconfig.taxappliesanystate");
    }
    if ($country == "") {
        $country = AdminLang::trans("taxconfig.taxappliesanycountry");
    }
    echo "                            <tr>\n                                <td>";
    echo (string) $levelTwoRule->name;
    echo "</td>\n                                <td>";
    echo $country;
    echo "</td>\n                                <td>";
    echo $state;
    echo "</td>\n                                <td>";
    echo (string) $levelTwoRule->taxrate;
    echo "%</td>\n                                <td>\n                                    <a class=\"deleteRule\" href=\"#\" data-href=\"";
    echo routePath("admin-setup-payments-tax-delete");
    echo "\" data-id=\"";
    echo (string) $levelTwoRule->id;
    echo "\">\n                                        <img src=\"images/delete.gif\" border=\"0\">\n                                    </a>\n                                </td>\n                            </tr>\n                            ";
}
echo "                            <tr id=\"emptyRow\" class=\"hidden\">\n                                <td class=\"ruleName\"></td>\n                                <td class=\"ruleCountry\"></td>\n                                <td class=\"ruleState\"></td>\n                                <td class=\"ruleRate\"></td>\n                                <td>\n                                    <a class=\"deleteRule\" href=\"#\" data-href=\"";
echo routePath("admin-setup-payments-tax-delete");
echo "\" data-id=\"\">\n                                        <img src=\"images/delete.gif\" border=\"0\">\n                                    </a>\n                                </td>\n                            </tr>\n                        </table>\n                    </div>\n                </div>\n\n            </div>\n            <div class=\"tab-pane\" id=\"contentTaxAdvanced\">\n\n                <div class=\"form-group\">\n                    <label class=\"col-md-4 col-sm-6 control-label\">\n                        ";
echo AdminLang::trans("taxconfig.taxappliesto");
echo "<br>\n                        <small>\n                            ";
echo AdminLang::trans("taxconfig.taxChooseProducts");
echo "<br>\n                            ";
echo AdminLang::trans("taxconfig.taxproducts");
echo "                        </small>\n                    </label>\n                    <div class=\"col-md-8 col-sm-6\">\n                        <label class=\"checkbox-inline\">\n                            <input type=\"checkbox\" name=\"taxdomains\" ";
echo $taxDomainsAttribute;
echo ">\n                            ";
echo AdminLang::trans("taxconfig.taxdomains");
echo "                        </label>\n                        <br>\n                        <label class=\"checkbox-inline\">\n                            <input type=\"checkbox\" name=\"taxbillableitems\" ";
echo $taxBillableItems;
echo ">\n                            ";
echo AdminLang::trans("taxconfig.taxbillableitems");
echo "                        </label>\n                        <br>\n                        <label class=\"checkbox-inline\">\n                            <input type=\"checkbox\" name=\"taxlatefee\" ";
echo $taxLateFees;
echo ">\n                            ";
echo AdminLang::trans("taxconfig.taxlatefee");
echo "                        </label>\n                        <br>\n                        <label class=\"checkbox-inline\">\n                            <input type=\"checkbox\" name=\"taxcustominvoices\" ";
echo $taxCustomInvoices;
echo ">\n                            ";
echo AdminLang::trans("taxconfig.taxcustominvoices");
echo "                        </label>\n                    </div>\n                </div>\n                <div class=\"form-group\">\n                    <label for=\"taxperlineitem\" class=\"col-md-4 col-sm-6 control-label\">\n                        ";
echo AdminLang::trans("taxconfig.taxcalculationstrategy");
echo "<br>\n                        <small>\n                            ";
echo AdminLang::trans("taxconfig.taxCalcStrategyDescription");
echo "                        </small>\n                    </label>\n                    <div class=\"col-md-8 col-sm-6\">\n                        <label class=\"radio-inline\">\n                            <input type=\"radio\" name=\"taxperlineitem\" ";
echo $taxIndividuallyPerLineItem;
echo " value=\"1\">\n                            ";
echo AdminLang::trans("taxconfig.taxperlineitemdesc");
echo "                        </label><br>\n                        <label class=\"radio-inline\">\n                            <input type=\"radio\" name=\"taxperlineitem\" ";
echo $taxCombinedLines;
echo " value=\"0\">\n                            ";
echo AdminLang::trans("taxconfig.taxpersubtotaldesc");
echo "                        </label>\n                    </div>\n                </div>\n\n                <hr>\n\n                <div class=\"form-group\">\n                    <label for=\"compoundTax\" class=\"col-md-4 col-sm-6 control-label\">\n                        ";
echo AdminLang::trans("taxconfig.compoundtax");
echo "<br>\n                        <small>";
echo AdminLang::trans("taxconfig.compoundtaxdesc");
echo "</small>\n                    </label>\n                    <div class=\"col-md-8 col-sm-6\">\n                        <input type=\"checkbox\" class=\"tax-toggle-switch\" name=\"taxl2compound\" id=\"compoundTax\"";
echo $taxL2Compound;
echo ">\n                    </div>\n                </div>\n                <div class=\"form-group\">\n                    <label for=\"inclusiveDeduct\" class=\"col-md-4 col-sm-6 control-label\">\n                        ";
echo AdminLang::trans("taxconfig.deducttaxamount");
echo "<br>\n                        <small>";
echo AdminLang::trans("taxconfig.deducttaxamountdesc");
echo "</small>\n                    </label>\n                    <div class=\"col-md-8 col-sm-6\">\n                        <input type=\"checkbox\" class=\"tax-toggle-switch\" name=\"taxinclusivededuct\" id=\"inclusiveDeduct\"";
echo $taxInclusiveDeduct;
echo ">\n                    </div>\n                </div>\n\n                <hr>\n\n                <div class=\"row\">\n                    <div class=\"col-md-8 col-md-offset-4 col-sm-6 col-sm-offset-6\">\n                        <button type=\"submit\" class=\"btn btn-primary\" id=\"btnSaveConfig3\">\n                            ";
echo AdminLang::trans("global.save");
echo "                        </button>\n                        <button type=\"reset\" class=\"btn btn-default\">\n                            ";
echo AdminLang::trans("global.cancel");
echo "                        </button>\n                    </div>\n                </div>\n            </div>\n        </div>\n    </div>\n</form>\n\n<form id=\"frmEUTax\" action=\"";
echo routePath("admin-setup-payments-tax-eu-rates");
echo "\">\n    <div class=\"modal whmcs-modal fade\" tabindex=\"-1\" role=\"dialog\" id=\"modalAutoSetupEuVatRules\">\n        <div class=\"modal-dialog\" role=\"document\">\n            <div class=\"modal-content panel panel-primary\">\n                <div class=\"modal-header panel-heading\">\n                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">\n                        <span aria-hidden=\"true\">&times;</span>\n                    </button>\n                    <h4 class=\"modal-title\">\n                        ";
echo AdminLang::trans("taxconfig.autoVatRulesSetup");
echo "                    </h4>\n                </div>\n                <div class=\"modal-body panel-body\">\n                    <p>";
echo AdminLang::trans("taxconfig.autoVatRulesSetupDescription");
echo "</p>\n\n                    <div class=\"form-group\">\n                        <label for=\"inputVatLabel\">\n                            ";
echo AdminLang::trans("fields.name");
echo "                        </label>\n                        <input type=\"text\" name=\"vat_label\" id=\"inputVatLabel\" value=\"VAT\" class=\"form-control\" />\n                    </div>\n\n                </div>\n                <div class=\"modal-footer panel-footer\">\n                    <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">\n                        ";
echo AdminLang::trans("global.dismiss");
echo "                    </button>\n                    <button type=\"submit\" class=\"btn btn-primary\">\n                        ";
echo AdminLang::trans("taxconfig.createRules");
echo "                    </button>\n                </div>\n            </div>\n        </div>\n    </div>\n</form>\n\n<script>\n    \$(document).ready(function() {\n        \$('#taxenabled').on('switchChange.bootstrapSwitch', function(event, state) {\n            if (state) {\n                \$('#frmTaxSettings .form-group').not('.do-not-disable').removeClass('disabled');\n                \$('#frmTaxSettings .form-group input, #frmTaxSettings .form-group select, #frmTaxSettings button.allow-disable')\n                    .not('.do-not-disable')\n                    .prop('disabled', false);\n            } else {\n                \$('#frmTaxSettings .form-group').not('.do-not-disable').addClass('disabled');\n                \$('#frmTaxSettings .form-group input, #frmTaxSettings .form-group select')\n                    .not('.do-not-disable')\n                    .prop('disabled', true);\n            }\n        });\n        ";
if (!$taxEnabled) {
    echo "            \$('#frmTaxSettings .form-group').not('.do-not-disable').addClass('disabled');\n            \$('#frmTaxSettings .form-group input, #frmTaxSettings .form-group select, #frmTaxSettings button.allow-disable')\n                .not('.do-not-disable')\n                .prop('disabled', true);\n        ";
}
echo "    });\n</script>\n";

?>