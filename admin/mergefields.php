<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 5.6
 * @ Decoder version: 1.0.4
 * @ Release: 02/06/2020
 *
 * @ ZendGuard Decoder PHP 5.6
 */

if (!defined("WHMCS")) {
    exit("This file cannot be accessed directly");
}
echo "\n<h2 id=\"mergefieldstoggle\">";
echo $aInt->lang("mergefields", "title");
echo "</h2>\n\n<div id=\"mergefields\" style=\"border:1px solid #8FBCE9;background:#ffffff;color:#000000;padding:5px;height:300px;overflow:auto;font-size:0.95em;z-index:10;\">\n\n<table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\"><tr><td width=\"50%\" valign=\"top\">\n\n";
$customfields = run_hook("EmailTplMergeFields", array("type" => $type));
if (count($customfields)) {
    echo "<b>Custom Defined Merge Fields</b><br /><table>";
    foreach ($customfields as $fields) {
        foreach ($fields as $k => $v) {
            echo "<tr><td width=\"150\"><a href=\"#\" onclick=\"insertMergeField('" . $k . "');return false\">" . $v . "</a></td><td>{\$" . $k . "}</td></tr>";
        }
    }
    echo "</table><br />";
}
if ($type == "support") {
    echo "<b>";
    echo $aInt->lang("mergefields", "support");
    echo "</b><br />\n<table>\n<tr><td width=\"150\"><a href=\"#\" onclick=\"insertMergeField('ticket_id');return false\">";
    echo $aInt->lang("fields", "id");
    echo "</a></td><td>{\$ticket_id}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('ticket_department');return false\">";
    echo $aInt->lang("support", "department");
    echo "</a></td><td>{\$ticket_department}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('ticket_date_opened');return false\">";
    echo $aInt->lang("mergefields", "dateopened");
    echo "</a></td><td>{\$ticket_date_opened}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('ticket_subject');return false\">";
    echo $aInt->lang("fields", "subject");
    echo "</a></td><td>{\$ticket_subject}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('ticket_message');return false\">";
    echo $aInt->lang("mergefields", "message");
    echo "</a></td><td>{\$ticket_message}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('ticket_status');return false\">";
    echo $aInt->lang("fields", "status");
    echo "</a></td><td>{\$ticket_status}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('ticket_priority');return false\">";
    echo $aInt->lang("support", "priority");
    echo "</a></td><td>{\$ticket_priority}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('ticket_url');return false\">";
    echo $aInt->lang("mergefields", "ticketurl");
    echo "</a></td><td>{\$ticket_url}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('ticket_link');return false\">";
    echo $aInt->lang("mergefields", "ticketlink");
    echo "</a></td><td>{\$ticket_link}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('ticket_auto_close_time');return false\">";
    echo $aInt->lang("mergefields", "autoclosetime");
    echo "</a></td><td>{\$ticket_auto_close_time}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('ticket_kb_auto_suggestions');return false\">";
    echo $aInt->lang("mergefields", "kbautosuggestions");
    echo "</a></td><td>{\$ticket_kb_auto_suggestions}</td></tr>\n</table><br />\n";
} else {
    if ($type == "affiliate") {
        echo "<b>";
        echo $aInt->lang("mergefields", "affiliate");
        echo "</b><br />\n<table>\n<tr><td width=\"150\"><a href=\"#\" onclick=\"insertMergeField('affiliate_total_visits');return false\">";
        echo $aInt->lang("mergefields", "noreferrals");
        echo "</a></td><td>{\$affiliate_total_visits}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('affiliate_balance');return false\">";
        echo $aInt->lang("mergefields", "earnbalance");
        echo "</a></td><td>{\$affiliate_balance}</td></tr>\n<tr><td nowrap><a href=\"#\" onclick=\"insertMergeField('affiliate_withdrawn');return false\">";
        echo $aInt->lang("mergefields", "withdrawnamount");
        echo "</a></td><td>{\$affiliate_withdrawn}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('affiliate_referrals_table');return false\">";
        echo $aInt->lang("mergefields", "refdetails");
        echo "</a></td><td>{\$affiliate_referrals_table}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('affiliate_referral_url');return false\">";
        echo $aInt->lang("mergefields", "refurl");
        echo "</a></td><td>{\$affiliate_referral_url}</td></tr>\n</table><br />\n";
    } else {
        if ($type == "addon") {
            echo "<b>";
            echo $aInt->lang("mergefields", "addon");
            echo "</b><br />\n<table>\n<tr><td width=\"150\"><a href=\"#\" onclick=\"insertMergeField('addon_reg_date');return false\">";
            echo $aInt->lang("fields", "signupdate");
            echo "</a></td><td>{\$addon_reg_date}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('addon_product');return false\">";
            echo $aInt->lang("mergefields", "parentproduct");
            echo "</a></td><td>{\$addon_product}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('addon_domain');return false\">";
            echo $aInt->lang("mergefields", "parentdomain");
            echo "</a></td><td>{\$addon_domain}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('addon_name');return false\">";
            echo $aInt->lang("fields", "name");
            echo "</a></td><td>{\$addon_name}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('addon_setup_fee');return false\">";
            echo $aInt->lang("fields", "setupfee");
            echo "</a></td><td>{\$addon_setup_fee}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('addon_recurring_amount');return false\">";
            echo $aInt->lang("fields", "recurringamount");
            echo "</a></td><td>{\$addon_recurring_amount}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('addon_billing_cycle');return false\">";
            echo $aInt->lang("fields", "billingcycle");
            echo "</a></td><td>{\$addon_billing_cycle}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('addon_payment_method');return false\">";
            echo $aInt->lang("fields", "paymentmethod");
            echo "</a></td><td>{\$addon_payment_method}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('addon_next_due_date');return false\">";
            echo $aInt->lang("fields", "nextduedate");
            echo "</a></td><td>{\$addon_next_due_date}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('addon_status');return false\">";
            echo $aInt->lang("fields", "status");
            echo "</a></td><td>{\$addon_status}</td></tr>\n</table><br />\n";
        } else {
            if ($type == "domain") {
                echo "<b>";
                echo $aInt->lang("mergefields", "domain");
                echo "</b><br />\n<table>\n<tr><td width=\"150\"><a href=\"#\" onclick=\"insertMergeField('domain_order_id');return false\">";
                echo $aInt->lang("fields", "orderid");
                echo "</a></td><td>{\$domain_order_id}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('domain_reg_date');return false\">";
                echo $aInt->lang("fields", "signupdate");
                echo "</a></td><td>{\$domain_reg_date}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('domain_name');return false\">";
                echo $aInt->lang("fields", "domain");
                echo "</a></td><td>{\$domain_name}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('domain_sld');return false\">";
                echo $aInt->lang("mergefields", "sld");
                echo "</a></td><td>{\$domain_sld}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('domain_tld');return false\">";
                echo $aInt->lang("mergefields", "tld");
                echo "</a></td><td>{\$domain_tld}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('domain_reg_period');return false\">";
                echo $aInt->lang("fields", "regperiod");
                echo "</a></td><td>{\$domain_reg_period}</td></tr>\n<tr><td nowrap><a href=\"#\" onclick=\"insertMergeField('domain_first_payment_amount');return false\">";
                echo $aInt->lang("fields", "firstpaymentamount");
                echo "</a></td><td>{\$domain_first_payment_amount}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('domain_recurring_amount');return false\">";
                echo $aInt->lang("fields", "recurringamount");
                echo "</a></td><td>{\$domain_recurring_amount}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('domain_next_due_date');return false\">";
                echo $aInt->lang("fields", "nextduedate");
                echo "</a></td><td>{\$domain_next_due_date}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('domain_subscription_id');return false\">";
                echo $aInt->lang("mergefields", "domainSubscriptionId");
                echo "</td><td>{\$domain_subscription_id}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('domain_expiry_date');return false\">";
                echo $aInt->lang("fields", "expirydate");
                echo "</a></td><td>{\$domain_expiry_date}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('domain_registrar');return false\">";
                echo $aInt->lang("fields", "registrar");
                echo "</a></td><td>{\$domain_registrar}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('domain_renewal_url');return false\">";
                echo $aInt->lang("fields", "renewalLink");
                echo "</a></td><td>{\$domain_renewal_url}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('domains_manage_url');return false\">";
                echo $aInt->lang("fields", "domainsList");
                echo "</a></td><td>{\$domains_manage_url}</td></tr>\n<tr>\n    <td colspan=\"2\">\n        <strong>";
                echo $aInt->lang("mergefields", "daysUntilInformation");
                echo "</strong><br />\n        ";
                echo $aInt->lang("mergefields", "daysUntilInformation2");
                echo "    </td>\n</tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('domain_days_until_expiry');return false\">";
                echo $aInt->lang("mergefields", "daysexpiry");
                echo "</a></td><td>{\$domain_days_until_expiry}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('domain_days_until_nextdue');return false\">";
                echo $aInt->lang("mergefields", "daysnextdue");
                echo "</a></td><td>{\$domain_days_until_nextdue}</td></tr>\n<tr>\n    <td colspan=\"2\">\n        <strong>";
                echo $aInt->lang("mergefields", "daysAfterInformation");
                echo "</strong>\n    </td>\n</tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('domain_days_after_expiry');return false\">";
                echo $aInt->lang("mergefields", "daysAfterExpiry");
                echo "</a></td><td>{\$domain_days_after_expiry}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('domain_days_after_nextdue');return false\">";
                echo $aInt->lang("mergefields", "daysAfterNextDue");
                echo "</a></td><td>{\$domain_days_after_nextdue}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('domain_status');return false\">";
                echo $aInt->lang("fields", "status");
                echo "</a></td><td>{\$domain_status}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('domain_dns_management');return false\">";
                echo $aInt->lang("domains", "dnsmanagement");
                echo "</a></td><td>{\$domain_dns_management}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('domain_email_forwarding');return false\">";
                echo $aInt->lang("domains", "emailforwarding");
                echo "</a></td><td>{\$domain_email_forwarding}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('domain_id_protection');return false\">";
                echo $aInt->lang("domains", "idprotection");
                echo "</a></td><td>{\$domain_id_protection}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('domain_do_not_renew');return false\">";
                echo $aInt->lang("mergefields", "donotrenew");
                echo "</a></td><td>{\$domain_do_not_renew}</td></tr>\n</table><br />\n";
            } else {
                if ($type == "invoice") {
                    echo "<b>";
                    echo $aInt->lang("mergefields", "invoice");
                    echo "</b><br />\n<table>\n<tr><td width=\"150\"><a href=\"#\" onclick=\"insertMergeField('invoice_id');return false\">";
                    echo $aInt->lang("fields", "invoiceid");
                    echo "</a></td><td>{\$invoice_id}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('invoice_num');return false\">";
                    echo $aInt->lang("fields", "invoicenum");
                    echo "</a></td><td>{\$invoice_num}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('invoice_date_created');return false\">";
                    echo $aInt->lang("mergefields", "datecreated");
                    echo "</a></td><td>{\$invoice_date_created}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('invoice_date_due');return false\">";
                    echo $aInt->lang("fields", "duedate");
                    echo "</a></td><td>{\$invoice_date_due}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('invoice_date_paid');return false\">";
                    echo $aInt->lang("fields", "datepaid");
                    echo "</a></td><td>{\$invoice_date_paid}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('invoice_items');return false\">";
                    echo $aInt->lang("mergefields", "invoiceitems");
                    echo "</a></td><td>{\$invoice_items}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('invoice_html_contents');return false\">";
                    echo $aInt->lang("mergefields", "invoiceitemshtml");
                    echo "</a></td><td>{\$invoice_html_contents}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('invoice_subtotal');return false\">";
                    echo $aInt->lang("fields", "subtotal");
                    echo "</a></td><td>{\$invoice_subtotal}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('invoice_tax');return false\">";
                    echo $aInt->lang("fields", "tax");
                    echo "</a></td><td>{\$invoice_tax}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('invoice_tax_rate');return false\">";
                    echo $aInt->lang("fields", "taxrate");
                    echo "</a></td><td>{\$invoice_tax_rate}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('invoice_credit');return false\">";
                    echo $aInt->lang("fields", "credit");
                    echo "</a></td><td>{\$invoice_credit}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('invoice_total');return false\">";
                    echo $aInt->lang("fields", "total");
                    echo "</a></td><td>{\$invoice_total}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('invoice_amount_paid');return false\">";
                    echo $aInt->lang("mergefields", "amountpaid");
                    echo "</a></td><td>{\$invoice_amount_paid}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('invoice_balance');return false\">";
                    echo $aInt->lang("fields", "balance");
                    echo "</a></td><td>{\$invoice_balance}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('invoice_last_payment_amount');return false\">";
                    echo $aInt->lang("mergefields", "lastpaymentamount");
                    echo "</a></td><td>{\$invoice_last_payment_amount}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('invoice_last_payment_transid');return false\">";
                    echo $aInt->lang("mergefields", "lastpaymenttransid");
                    echo "</a></td><td>{\$invoice_last_payment_transid}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('invoice_payment_method');return false\">";
                    echo $aInt->lang("fields", "paymentmethod");
                    echo "</a></td><td>{\$invoice_payment_method}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('invoice_pay_method_type');return false\">";
                    echo $aInt->lang("fields", "payMethodType");
                    echo "</a></td><td>{\$invoice_pay_method_type}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('invoice_pay_method_description');return false\">";
                    echo $aInt->lang("fields", "payMethodDescription");
                    echo "</a></td><td>{\$invoice_pay_method_description}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('invoice_pay_method_display_name');return false\">";
                    echo $aInt->lang("fields", "payMethodDisplayName");
                    echo "</a></td><td>{\$invoice_pay_method_display_name}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('invoice_pay_method_expiry');return false\">";
                    echo $aInt->lang("fields", "expdate");
                    echo "</a></td><td>{\$invoice_pay_method_expiry}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('invoice_auto_capture_available');return false\">";
                    echo $aInt->lang("fields", "payMethod");
                    echo "</a></td><td>{\$invoice_auto_capture_available}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('invoice_payment_link');return false\">";
                    echo $aInt->lang("mergefields", "paymentlink");
                    echo "</a></td><td>{\$invoice_payment_link}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('invoice_next_payment_attempt_date');return false\">";
                    echo $aInt->lang("mergefields", "nextPaymentAttempt");
                    echo "</a></td><td>{\$invoice_next_payment_attempt_date}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('invoice_subscription_id');return false\">";
                    echo $aInt->lang("fields", "subscriptionid");
                    echo "</a></td><td>{\$invoice_subscription_id}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('invoice_status');return false\">";
                    echo $aInt->lang("fields", "status");
                    echo "</a></td><td>{\$invoice_status}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('invoice_link');return false\">";
                    echo $aInt->lang("mergefields", "invoicelink");
                    echo "</a></td><td>{\$invoice_link}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('invoice_previous_balance');return false\">";
                    echo $aInt->lang("mergefields", "prevbalance");
                    echo "</a></td><td>{\$invoice_previous_balance}</td></tr>\n<tr><td nowrap><a href=\"#\" onclick=\"insertMergeField('invoice_total_balance_due');return false\">";
                    echo $aInt->lang("mergefields", "invoicesbalance");
                    echo "</a></td><td>{\$invoice_total_balance_due}</td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('invoice_notes');return false\">";
                    echo $aInt->lang("fields", "notes");
                    echo "</a></td><td>{\$invoice_notes}</td></tr>\n</table><br />\n";
                } else {
                    if ($type == "product") {
                        echo "<b>";
                        echo $aInt->lang("mergefields", "product");
                        echo "</b><br />\n<table>\n<tr><td width=\"150\"><a href=\"#\" onclick=\"insertMergeField('service_order_id');return false\">";
                        echo $aInt->lang("fields", "orderid");
                        echo "</td><td>{\$service_order_id}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('service_id');return false\">";
                        echo $aInt->lang("fields", "id");
                        echo "</td><td>{\$service_id}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('service_reg_date');return false\">";
                        echo $aInt->lang("fields", "signupdate");
                        echo "</td><td>{\$service_reg_date}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('service_product_name');return false\">";
                        echo $aInt->lang("mergefields", "prodname");
                        echo "</td><td>{\$service_product_name}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('service_product_description');return false\">";
                        echo $aInt->lang("mergefields", "proddesc");
                        echo "</td><td>{\$service_product_description}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('service_domain');return false\">";
                        echo $aInt->lang("fields", "domain");
                        echo "</td><td>{\$service_domain}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('service_config_options');return false\">";
                        echo $aInt->lang("mergefields", "configoptions");
                        echo "</td><td>{\$service_config_options}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('service_server_name');return false\">";
                        echo $aInt->lang("mergefields", "servername");
                        echo "</td><td>{\$service_server_name}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('service_server_hostname');return false\">";
                        echo $aInt->lang("mergefields", "serverhostname");
                        echo "</td><td>{\$service_server_hostname}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('service_server_ip');return false\">";
                        echo $aInt->lang("mergefields", "serverip");
                        echo "</td><td>{\$service_server_ip}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('service_dedicated_ip');return false\">";
                        echo $aInt->lang("mergefields", "dedicatedip");
                        echo "</td><td>{\$service_dedicated_ip}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('service_assigned_ips');return false\">";
                        echo $aInt->lang("mergefields", "assignedips");
                        echo "</td><td>{\$service_assigned_ips}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('service_ns1');return false\">";
                        echo $aInt->lang("mergefields", "nameserver");
                        echo " 1</td><td>{\$service_ns1}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('service_ns2');return false\">";
                        echo $aInt->lang("mergefields", "nameserver");
                        echo " 2</td><td>{\$service_ns2}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('service_ns3');return false\">";
                        echo $aInt->lang("mergefields", "nameserver");
                        echo " 3</td><td>{\$service_ns3}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('service_ns4');return false\">";
                        echo $aInt->lang("mergefields", "nameserver");
                        echo " 4</td><td>{\$service_ns4}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('service_ns5');return false\">";
                        echo $aInt->lang("mergefields", "nameserver");
                        echo " 5</td><td>{\$service_ns5}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('service_ns1_ip');return false\">";
                        echo $aInt->lang("mergefields", "nameserver");
                        echo " 1 ";
                        echo $aInt->lang("mergefields", "ip");
                        echo "</td><td>{\$service_ns1_ip}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('service_ns2_ip');return false\">";
                        echo $aInt->lang("mergefields", "nameserver");
                        echo " 2 ";
                        echo $aInt->lang("mergefields", "ip");
                        echo "</td><td>{\$service_ns2_ip}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('service_ns3_ip');return false\">";
                        echo $aInt->lang("mergefields", "nameserver");
                        echo " 3 ";
                        echo $aInt->lang("mergefields", "ip");
                        echo "</td><td>{\$service_ns3_ip}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('service_ns4_ip');return false\">";
                        echo $aInt->lang("mergefields", "nameserver");
                        echo " 4 ";
                        echo $aInt->lang("mergefields", "ip");
                        echo "</td><td>{\$service_ns4_ip}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('service_ns5_ip');return false\">";
                        echo $aInt->lang("mergefields", "nameserver");
                        echo " 5 ";
                        echo $aInt->lang("mergefields", "ip");
                        echo "</td><td>{\$service_ns5_ip}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('service_payment_method');return false\">";
                        echo $aInt->lang("fields", "paymentmethod");
                        echo "</td><td>{\$service_payment_method}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('service_first_payment_amount');return false\">";
                        echo $aInt->lang("fields", "firstpaymentamount");
                        echo "</td><td>{\$service_first_payment_amount}</a></td></tr>\n<tr><td nowrap><a href=\"#\" onclick=\"insertMergeField('service_recurring_amount');return false\">";
                        echo $aInt->lang("mergefields", "recurringpayment");
                        echo "</td><td>{\$service_recurring_amount}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('service_billing_cycle');return false\">";
                        echo $aInt->lang("fields", "billingcycle");
                        echo "</td><td>{\$service_billing_cycle}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('service_next_due_date');return false\">";
                        echo $aInt->lang("fields", "nextduedate");
                        echo "</td><td>{\$service_next_due_date}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('service_subscription_id');return false\">";
                        echo $aInt->lang("mergefields", "serviceSubscriptionId");
                        echo "</td><td>{\$service_subscription_id}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('addon_subscription_id');return false\">";
                        echo $aInt->lang("mergefields", "addonSubscriptionId");
                        echo "</td><td>{\$addon_subscription_id}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('service_status');return false\">";
                        echo $aInt->lang("fields", "status");
                        echo "</td><td>{\$service_status}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('service_suspension_reason');return false\">";
                        echo $aInt->lang("mergefields", "suspreason");
                        echo "</td><td>{\$service_suspension_reason}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('service_cancellation_type');return false\">";
                        echo $aInt->lang("mergefields", "canceltype");
                        echo "</td><td>{\$service_cancellation_type}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('service_username');return false\">";
                        echo $aInt->lang("fields", "username");
                        echo "</td><td>{\$service_username}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('service_password');return false\">";
                        echo $aInt->lang("fields", "password");
                        echo "</td><td>{\$service_password}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('service_custom_fields');return false\">";
                        echo $aInt->lang("mergefields", "customfieldsarray");
                        echo "</td><td>{\$service_custom_fields.1}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('service_custom_fields_by_name');return false\">";
                        echo $aInt->lang("mergefields", "customfieldsarray");
                        echo "</td><td>{\$service_custom_fields_by_name.0.name}: {\$service_custom_fields_by_name.0.value}}</a></td></tr>\n</table><br />\n";
                    } else {
                        if ($type == "notification") {
                            echo "<b>";
                            echo AdminLang::trans("mergefields.notification");
                            echo "</b><br />\n<table>\n    <tr>\n        <td width=\"150\">\n            <a href=\"#\" onclick=\"insertMergeField('notification_title');return false\">";
                            echo AdminLang::trans("mergefields.notificationTitle");
                            echo "</a>\n        </td>\n        <td>\n            {\$notification_title}\n        </td>\n    </tr>\n    <tr>\n        <td>\n            <a href=\"#\" onclick=\"insertMergeField('notification_url');return false\">";
                            echo AdminLang::trans("mergefields.notificationUrl");
                            echo "</a>\n        </td>\n        <td>\n            {\$notification_url}\n        </td>\n    </tr>\n    <tr>\n        <td>\n            <a href=\"#\" onclick=\"insertMergeField('notification_message');return false\">";
                            echo AdminLang::trans("mergefields.notificationMessage");
                            echo "</a>\n        </td>\n        <td>\n            {\$notification_message}\n        </td>\n    </tr>\n    <tr>\n        <td>\n            <a href=\"#\" onclick=\"insertMergeField('notification_attributes');return false\">";
                            echo AdminLang::trans("mergefields.notificationAttributes");
                            echo "</a>\n        </td>\n        <td>\n            {\$notification_attributes}\n        </td>\n    </tr>\n    <tr>\n        <td colspan=\"2\">\n            {foreach \$notification_attributes as \$attribute}<br />\n                &nbsp;&nbsp;&nbsp;&nbsp;{\$attribute.label} {*";
                            echo AdminLang::trans("mergefields.notificationAttributesLabel");
                            echo "*}<br />\n                &nbsp;&nbsp;&nbsp;&nbsp;{\$attribute.value} {*";
                            echo AdminLang::trans("mergefields.notificationAttributesValue");
                            echo "*}<br />\n                &nbsp;&nbsp;&nbsp;&nbsp;{\$attribute.url} {*";
                            echo AdminLang::trans("mergefields.notificationAttributesUrl");
                            echo "*}<br />\n                &nbsp;&nbsp;&nbsp;&nbsp;{\$attribute.style} {*";
                            echo AdminLang::trans("mergefields.notificationAttributesStyle");
                            echo "*}<br />\n                &nbsp;&nbsp;&nbsp;&nbsp;{\$attribute.icon} {*";
                            echo AdminLang::trans("mergefields.notificationAttributesIcon");
                            echo "*}<br />\n            {/foreach}\n        </td>\n    </tr>\n</table><br />\n";
                        } else {
                            if ($type == "admin") {
                                if ($name == "New Order Notification") {
                                    echo "<b>";
                                    echo $aInt->lang("mergefields", "order");
                                    echo "</b><br />\n<table>\n<tr><td width=\"150\"><a href=\"#\" onclick=\"insertMergeField('client_id');return false\">";
                                    echo $aInt->lang("fields", "orderid");
                                    echo "</td><td>{\$order_id}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('order_number');return false\">";
                                    echo $aInt->lang("fields", "ordernum");
                                    echo "</td><td>{\$order_number}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('order_date');return false\">";
                                    echo $aInt->lang("mergefields", "orderdate");
                                    echo "</td><td>{\$order_date}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('order_items');return false\">";
                                    echo $aInt->lang("orders", "items");
                                    echo "</td><td>{\$order_items}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('order_total');return false\">";
                                    echo $aInt->lang("mergefields", "duetoday");
                                    echo "</td><td>{\$order_total}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('order_payment_method');return false\">";
                                    echo $aInt->lang("fields", "paymentmethod");
                                    echo "</td><td>{\$order_payment_method}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('invoice_id');return false\">";
                                    echo $aInt->lang("fields", "invoiceid");
                                    echo "</td><td>{\$invoice_id}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('order_notes');return false\">";
                                    echo $aInt->lang("mergefields", "ordernotes");
                                    echo "</td><td>{\$order_notes}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('client_ip');return false\">";
                                    echo $aInt->lang("mergefields", "clientip");
                                    echo "</td><td>{\$client_ip}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('client_hostname');return false\">";
                                    echo $aInt->lang("mergefields", "clienthostname");
                                    echo "</td><td>{\$client_hostname}</a></td></tr>\n</table><br />\n<b>";
                                    echo $aInt->lang("mergefields", "client");
                                    echo "</b><br />\n<table>\n<tr><td width=\"150\"><a href=\"#\" onclick=\"insertMergeField('client_id');return false\">";
                                    echo $aInt->lang("fields", "id");
                                    echo "</td><td>{\$client_id}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('client_first_name');return false\">";
                                    echo $aInt->lang("fields", "firstname");
                                    echo "</td><td>{\$client_first_name}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('client_last_name');return false\">";
                                    echo $aInt->lang("fields", "lastname");
                                    echo "</td><td>{\$client_last_name}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('client_company_name');return false\">";
                                    echo $aInt->lang("fields", "companyname");
                                    echo "</td><td>{\$client_company_name}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('client_email');return false\">";
                                    echo $aInt->lang("fields", "email");
                                    echo "</td><td>{\$client_email}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('client_address1');return false\">";
                                    echo $aInt->lang("fields", "address1");
                                    echo "</td><td>{\$client_address1}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('client_address2');return false\">";
                                    echo $aInt->lang("fields", "address2");
                                    echo "</td><td>{\$client_address2}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('client_city');return false\">";
                                    echo $aInt->lang("fields", "city");
                                    echo "</td><td>{\$client_city}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('client_state');return false\">";
                                    echo $aInt->lang("fields", "state");
                                    echo "</td><td>{\$client_state}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('client_postcode');return false\">";
                                    echo $aInt->lang("fields", "postcode");
                                    echo "</td><td>{\$client_postcode}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('client_country');return false\">";
                                    echo $aInt->lang("fields", "country");
                                    echo "</td><td>{\$client_country}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('client_phonenumber');return false\">";
                                    echo $aInt->lang("fields", "phonenumber");
                                    echo "</td><td>{\$client_phonenumber}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('client_customfields');return false\">";
                                    echo $aInt->lang("customfields", "clienttitle");
                                    echo "</td><td>{\$client_customfields}</a></td></tr>\n</table><br />\n";
                                } else {
                                    if ($name == "Automatic Setup Successful" || $name == "Automatic Setup Failed" || $name == "Service Unsuspension Failed" || $name == "Service Unsuspension Successful") {
                                        echo "<b>";
                                        echo $aInt->lang("mergefields", "service");
                                        echo "</b><br />\n<table>\n<tr><td width=\"150\"><a href=\"#\" onclick=\"insertMergeField('client_id');return false\">";
                                        echo $aInt->lang("fields", "clientid");
                                        echo "</td><td>{\$client_id}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('service_id');return false\">";
                                        echo $aInt->lang("mergefields", "serviceid");
                                        echo "</td><td>{\$service_id}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('service_product');return false\">";
                                        echo $aInt->lang("fields", "product");
                                        echo "</td><td>{\$service_product}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('service_domain');return false\">";
                                        echo $aInt->lang("fields", "domain");
                                        echo "</td><td>{\$service_domain}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('error_msg');return false\">";
                                        echo $aInt->lang("mergefields", "errormsg");
                                        echo "</td><td>{\$error_msg}</a></td></tr>\n</table><br />\n<b>";
                                        echo $aInt->lang("mergefields", "domain");
                                        echo "</b><br />\n<table>\n<tr><td width=\"150\"><a href=\"#\" onclick=\"insertMergeField('client_id');return false\">";
                                        echo $aInt->lang("fields", "clientid");
                                        echo "</td><td>{\$client_id}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('domain_id');return false\">";
                                        echo $aInt->lang("mergefields", "domainid");
                                        echo "</td><td>{\$domain_id}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('domain_type');return false\">";
                                        echo $aInt->lang("domains", "regtype");
                                        echo "</td><td>{\$domain_type}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('domain_name');return false\">";
                                        echo $aInt->lang("mergefields", "domainname");
                                        echo "</td><td>{\$domain_name}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('error_msg');return false\">";
                                        echo $aInt->lang("mergefields", "errormsg");
                                        echo "</td><td>{\$error_msg}</a></td></tr>\n</table><br />\n";
                                    } else {
                                        if ($name == "Support Ticket Change Notification") {
                                            echo "<b>";
                                            echo $aInt->lang("mergefields", "support");
                                            echo "</b><br />\n<table>\n<tr><td width=\"150\"><a href=\"#\" onclick=\"insertMergeField('ticket_id');return false\">";
                                            echo $aInt->lang("fields", "id");
                                            echo "</td><td>{\$ticket_id}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('ticket_tid');return false\">";
                                            echo $aInt->lang("support", "ticketid");
                                            echo "</td><td>{\$ticket_tid}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('client_id');return false\">";
                                            echo $aInt->lang("fields", "clientid");
                                            echo "</td><td>{\$client_id}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('client_name');return false\">";
                                            echo $aInt->lang("fields", "clientname");
                                            echo "</td><td>{\$client_name}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('ticket_department');return false\">";
                                            echo $aInt->lang("support", "department");
                                            echo "</td><td>{\$ticket_department}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('ticket_subject');return false\">";
                                            echo $aInt->lang("fields", "subject");
                                            echo "</td><td>{\$ticket_subject}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('ticket_priority');return false\">";
                                            echo $aInt->lang("support", "priority");
                                            echo "</td><td>{\$ticket_priority}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('changer');return false\">";
                                            echo $aInt->lang("mergefields", "changer");
                                            echo "</td><td>{\$changer}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('changes');return false\">";
                                            echo $aInt->lang("mergefields", "ticketChanges");
                                            echo "</td><td>{\$changes} (array)</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('newTicket');return false\">";
                                            echo $aInt->lang("mergefields", "newTicket");
                                            echo "</td><td>{\$newTicket}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('newReply');return false\">";
                                            echo $aInt->lang("mergefields", "newReply");
                                            echo "</td><td>{\$newReply}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('newNote');return false\">";
                                            echo $aInt->lang("mergefields", "newNote");
                                            echo "</td><td>{\$newNote}</a></td></tr>\n</table><br />\n";
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
if (!in_array($type, array("support", "admin", "notification"))) {
    echo "<b>";
    echo $aInt->lang("mergefields", "client");
    echo "</b><br />\n<table>\n<tr><td width=\"150\"><a href=\"#\" onclick=\"insertMergeField('client_id');return false\">";
    echo $aInt->lang("fields", "id");
    echo "</td><td>{\$client_id}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('client_name');return false\">";
    echo $aInt->lang("fields", "clientname");
    echo "</td><td>{\$client_name}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('client_first_name');return false\">";
    echo $aInt->lang("fields", "firstname");
    echo "</td><td>{\$client_first_name}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('client_last_name');return false\">";
    echo $aInt->lang("fields", "lastname");
    echo "</td><td>{\$client_last_name}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('client_company_name');return false\">";
    echo $aInt->lang("fields", "companyname");
    echo "</td><td>{\$client_company_name}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('client_email');return false\">";
    echo $aInt->lang("fields", "email");
    echo "</td><td>{\$client_email}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('client_address1');return false\">";
    echo $aInt->lang("fields", "address1");
    echo "</td><td>{\$client_address1}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('client_address2');return false\">";
    echo $aInt->lang("fields", "address2");
    echo "</td><td>{\$client_address2}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('client_city');return false\">";
    echo $aInt->lang("fields", "city");
    echo "</td><td>{\$client_city}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('client_state');return false\">";
    echo $aInt->lang("fields", "state");
    echo "</td><td>{\$client_state}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('client_postcode');return false\">";
    echo $aInt->lang("fields", "postcode");
    echo "</td><td>{\$client_postcode}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('client_country');return false\">";
    echo $aInt->lang("fields", "country");
    echo "</td><td>{\$client_country}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('client_phonenumber');return false\">";
    echo $aInt->lang("fields", "phonenumber");
    echo "</td><td>{\$client_phonenumber}</a></td></tr>\n<tr>\n    <td>\n        <a href=\"#\" onclick=\"insertMergeField('client_tax_id');return false\">\n            ";
    echo AdminLang::trans(WHMCS\Billing\Tax\Vat::getLabel("fields"));
    echo "        </a>\n    </td>\n    <td>{\$client_tax_id}</td>\n</tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('client_password');return false\">";
    echo $aInt->lang("fields", "password");
    echo "</td><td>{\$client_password}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('client_signup_date');return false\">";
    echo $aInt->lang("fields", "signupdate");
    echo " </td><td>{\$client_signup_date}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('client_credit');return false\">";
    echo $aInt->lang("clients", "creditbalance");
    echo "</td><td>{\$client_credit}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('client_cc_description');return false\">";
    echo $aInt->lang("fields", "payMethodDescription");
    echo "</td><td>{\$client_cc_description}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('client_cc_type');return false\">";
    echo $aInt->lang("fields", "cardtype");
    echo "</td><td>{\$client_cc_type}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('client_cc_number');return false\">";
    echo $aInt->lang("fields", "cardlast4");
    echo "</td><td>{\$client_cc_number}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('client_cc_expiry');return false\">";
    echo $aInt->lang("fields", "expdate");
    echo "</td><td>{\$client_cc_expiry}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('client_gateway_id');return false\">";
    echo $aInt->lang("fields", "gatewayid");
    echo "</td><td>{\$client_gateway_id}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('client_group_id');return false\">";
    echo $aInt->lang("mergefields", "clientgroupid");
    echo "</td><td>{\$client_group_id}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('client_group_name');return false\">";
    echo $aInt->lang("mergefields", "clientgroupname");
    echo " </td><td>{\$client_group_name}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('client_due_invoices_balance');return false\">";
    echo $aInt->lang("mergefields", "invoicesbalance");
    echo " </td><td>{\$client_due_invoices_balance}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('client_custom_fields');return false\">";
    echo $aInt->lang("mergefields", "customfieldsarray");
    echo "</td><td>{\$client_custom_fields.1}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('client_custom_fields_by_name');return false\">";
    echo $aInt->lang("mergefields", "customfieldsarray");
    echo "</td><td>{\$client_custom_fields_by_name.0.name}: {\$client_custom_fields_by_name.0.value}}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('client_status');return false\">";
    echo $aInt->lang("fields", "status");
    echo "</td><td>{\$client_status}</a></td></tr>\n</table><br />\n";
}
echo "<b>";
echo $aInt->lang("mergefields", "other");
echo "</b><br />\n<table>\n\n<tr><td width=\"150\"><a href=\"#\" onclick=\"insertMergeField('company_name');return false\">";
echo $aInt->lang("fields", "companyname");
echo "</td><td>{\$company_name}</a></td></tr>\n<tr><td width=\"150\"><a href=\"#\" onclick=\"insertMergeField('company_domain');return false\">";
echo $aInt->lang("fields", "domain");
echo "</td><td>{\$company_domain}</a></td></tr>\n<tr><td width=\"150\"><a href=\"#\" onclick=\"insertMergeField('company_logo_url');return false\">";
echo $aInt->lang("general", "logourl");
echo "</td><td>{\$company_logo_url}</a></td></tr>\n<tr>\n    <td width=\"150\">\n        <a href=\"#\" onclick=\"insertMergeField('company_tax_code');return false\">\n            ";
echo AdminLang::trans("taxconfig.taxCode");
echo "        </a>\n    </td>\n    <td>{\$company_tax_code}</td>\n</tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('whmcs_url');return false\">";
echo $aInt->lang("mergefields", "whmcsurl");
echo "</td><td>{\$whmcs_url}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('whmcs_link');return false\">";
echo $aInt->lang("mergefields", "whmcslink");
echo "</td><td>{\$whmcs_link}</a></td></tr>\n";
if ($type == "admin") {
    echo "<tr><td><a href=\"#\" onclick=\"insertMergeField('whmcs_admin_url');return false\">";
    echo $aInt->lang("mergefields", "whmcsadminurl");
    echo "</td><td>{\$whmcs_admin_url}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('whmcs_admin_link');return false\">";
    echo $aInt->lang("mergefields", "whmcsadminlink");
    echo "</td><td>{\$whmcs_admin_link}</a></td></tr>\n";
}
echo "<tr><td><a href=\"#\" onclick=\"insertMergeField('email_marketing_optin_url');return false\">";
echo $aInt->lang("mergefields", "emailMarketingOptInUrl");
echo "</td><td>{\$email_marketing_optin_url}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('email_marketing_optout_url');return false\">";
echo $aInt->lang("mergefields", "emailMarketingOptOutUrl");
echo "</td><td>{\$email_marketing_optout_url}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('signature');return false\">";
echo $aInt->lang("mergefields", "signature");
echo "</td><td>{\$signature}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('date');return false\">";
echo $aInt->lang("mergefields", "date");
echo "</td><td>{\$date}</a></td></tr>\n<tr><td><a href=\"#\" onclick=\"insertMergeField('time');return false\">";
echo $aInt->lang("mergefields", "time");
echo "</td><td>{\$time}</a></td></tr>\n</table><br />\n\n</td><td width=\"50%\" valign=\"top\">\n\n<b>";
echo $aInt->lang("mergefields", "condisplay");
echo "</b><br />\n";
echo $aInt->lang("mergefields", "condisplay1");
echo ":<br /><br />\n{if \$ticket_department eq \"";
echo $aInt->lang("supportreq", "sales");
echo "\"}<br />\n";
echo $aInt->lang("mergefields", "condisplay2");
echo "<br />\n{else}<br />\n";
echo $aInt->lang("mergefields", "condisplay3");
echo "<br />\n{/if}<br /><br />\n\n<b>";
echo $aInt->lang("mergefields", "looping");
echo "</b><br />\n";
echo $aInt->lang("mergefields", "looping1");
echo ":<br /><br />\n{foreach from=\$array_data item=data}<br />\n{\$data.option}: {\$data.value}<br />\n{/foreach}\n\n</td></tr></table>\n\n</div>\n\n<br />\n";

?>