<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 5.6
 * @ Decoder version: 1.0.4
 * @ Release: 02/06/2020
 *
 * @ ZendGuard Decoder PHP 5.6
 */

echo "<div class=\"text-center\" id=\"syncLoader\">\n    <img src=\"../modules/addons/mailchimp/loader.svg\">\n    <br><br>\n    <p>Establishing E-commerce Connection with Mailchimp<br>Please wait... </p>\n</div>\n\n<div class=\"text-center hidden\" id=\"syncComplete\">\n    <h3>E-commerce Connection Complete</h3>\n    <p>All future customer signups and e-commerce transactions will now be synchronized with Mailchimp.</p>\n    <p>To add your existing customers to your Mailchimp mailing list, see the <a href=\"https://docs.whmcs.com/Mailchimp#Importing_Existing_Customers\" target=\"_blank\">importing existing customers guide</a>.\n    <p>To setup automations or start a new campaign, visit <a href=\"https://login.mailchimp.com/\" target=\"_blank\">www.mailchimp.com</a>.</p>\n    <p><a href=\"addonmodules.php?module=mailchimp\" class=\"btn btn-default\">Continue</a></p>\n</div>\n\n<div class=\"text-center hidden\" id=\"syncError\">\n    <h3>E-commerce Connection Failed</h3>\n    <p>An error occurred while attempting to establish the E-commerce Connection with Mailchimp and sync data.</p>\n    <div class=\"alert alert-danger\"></div>\n    <p>Please contact support with the above error message for assistance.</p>\n</div>\n\n<input type=\"hidden\" name=\"action\" value=\"runsync\">\n\n<script>\n\$(document).ready(function(e) {\n    WHMCS.http.jqClient.post(\$('#frmMailchimp').attr('action'), \$('#frmMailchimp').serialize(),\n        function (data) {\n            if (data.success) {\n                \$('#syncLoader').fadeOut('slow', function() {\n                    \$('#syncComplete').hide().removeClass('hidden').fadeIn();\n                });\n            } else {\n                \$('#syncLoader').fadeOut('slow', function() {\n                    \$('#syncError').find('.alert').html(data.error);\n                    \$('#syncError').hide().removeClass('hidden').fadeIn();\n                });\n            }\n        }, 'json');\n});\n</script>\n";

?>