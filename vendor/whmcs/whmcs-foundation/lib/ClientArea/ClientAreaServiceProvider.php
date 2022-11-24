<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 5.6
 * @ Decoder version: 1.0.4
 * @ Release: 02/06/2020
 *
 * @ ZendGuard Decoder PHP 5.6
 */

namespace WHMCS\ClientArea;

class ClientAreaServiceProvider extends \WHMCS\Application\Support\ServiceProvider\AbstractServiceProvider implements \WHMCS\Route\Contracts\ProviderInterface
{
    use \WHMCS\Route\ProviderTrait;
    protected function getRoutes()
    {
        $routes = array("/clientarea" => array(array("method" => array("GET", "POST"), "path" => "/module/{module}", "handle" => array("\\WHMCS\\Module\\ClientAreaController", "index"))), "/account" => new Account\AccountRouteProvider(), "/download" => array(array("name" => "download-index", "method" => "GET", "path" => "", "handle" => array("\\WHMCS\\Download\\Controller\\DownloadController", "index")), array("name" => "download-by-cat", "method" => "GET", "path" => "/category/{catid:\\d+}[/{slug}.html]", "handle" => array("\\WHMCS\\Download\\Controller\\DownloadController", "viewCategory")), array("name" => "download-search", "method" => array("GET", "POST"), "path" => "/search[/{search:.*}]", "handle" => array("\\WHMCS\\Download\\Controller\\DownloadController", "search"))), "/downloads" => array(array("name" => "download-by-cat-legacy", "method" => "GET", "path" => "/{catid:\\d+}[/{slug}.html]", "handle" => array("\\WHMCS\\Download\\Controller\\DownloadController", "viewCategory"))), "/knowledgebase" => new \WHMCS\Knowledgebase\KnowledgebaseServiceProvider(), "/announcements" => array(array("name" => "announcement-index", "method" => "GET", "path" => "[/view/{view:[^/]+}]", "handle" => array("\\WHMCS\\Announcement\\Controller\\AnnouncementController", "index")), array("name" => "announcement-index-paged", "method" => "GET", "path" => "/page/{page:\\d+}[/view/{view:[^/]+}]", "handle" => array("\\WHMCS\\Announcement\\Controller\\AnnouncementController", "index")), array("name" => "announcement-twitterfeed", "method" => "POST", "path" => "/twitterfeed", "handle" => array("\\WHMCS\\Announcement\\Controller\\AnnouncementController", "twitterFeed")), array("name" => "announcement-view", "method" => "GET", "path" => "/{id:\\d+}[/{slug}.html]", "handle" => array("\\WHMCS\\Announcement\\Controller\\AnnouncementController", "view")), array("name" => "announcement-rss", "method" => "GET", "path" => "/rss", "handle" => array("\\WHMCS\\Announcement\\Rss", "toXml"))), "/domain" => array(array("name" => "domain-check", "method" => "POST", "path" => "/check", "handle" => array("\\WHMCS\\Domain\\Checker", "ajaxCheck")), array("name" => "domain-pricing", "method" => array("GET", "POST"), "path" => "/pricing", "handle" => array("WHMCS\\Domains\\Controller\\DomainController", "pricing")), array("name" => "domain-renewal", "method" => array("GET"), "path" => "/{domain}/renew", "handle" => array("WHMCS\\Cart\\Controller\\DomainController", "singleRenew")), array("name" => "domain-ssl-check", "method" => array("POST"), "path" => "/ssl-check", "handle" => array("WHMCS\\Domains\\Controller\\DomainController", "sslCheck"))), "/ssl-purchase" => array(array("name" => "ssl-purchase", "method" => array("GET"), "path" => "", "handle" => array("WHMCS\\ClientArea\\ClientAreaController", "sslPurchase"))), "/upgrade" => array(array("name" => "upgrade", "method" => array("POST"), "path" => "", "handle" => array("WHMCS\\ClientArea\\UpgradeController", "index")), array("name" => "upgrade-add-to-cart", "method" => "POST", "path" => "/validate", "handle" => array("WHMCS\\ClientArea\\UpgradeController", "addToCart"))), "/subscription" => array(array("name" => "subscription-manage", "method" => "GET", "path" => "", "handle" => array("\\WHMCS\\Marketing\\SubscriptionController", "manage"))), "/password/reset" => array(array("name" => "password-reset-begin", "method" => "GET", "path" => "/begin", "handle" => array("WHMCS\\ClientArea\\PasswordResetController", "emailPrompt")), array("name" => "password-reset-validate-email", "method" => "POST", "path" => "/email/validate", "handle" => array("WHMCS\\ClientArea\\PasswordResetController", "validateEmail")), array("name" => "password-reset-use-key", "method" => "GET", "path" => "/use/key/{key:[a-z\\d]+}", "handle" => array("WHMCS\\ClientArea\\PasswordResetController", "useKey")), array("name" => "password-reset-security-prompt", "method" => array("GET"), "path" => "/security/prompt", "handle" => array("WHMCS\\ClientArea\\PasswordResetController", "securityPrompt")), array("name" => "password-reset-security-verify", "method" => array("POST"), "path" => "/security/verify", "handle" => array("WHMCS\\ClientArea\\PasswordResetController", "securityValidate")), array("name" => "password-reset-change-prompt", "method" => array("GET"), "path" => "/change/prompt", "handle" => array("WHMCS\\ClientArea\\PasswordResetController", "changePrompt")), array("name" => "password-reset-change-perform", "method" => array("POST"), "path" => "/change/perform", "handle" => array("WHMCS\\ClientArea\\PasswordResetController", "changePerform"))), "/payment" => new \WHMCS\Payment\PaymentRouteProvider(), "/invoice" => new Invoice\InvoiceRouteProvider(), "/images" => array(array("name" => "image-display", "method" => array("GET"), "path" => "/{type:\\w+}/{id:\\d+}_{file}", "handle" => array("WHMCS\\ClientArea\\ClientAreaController", "displayImage"))), "" => array(array("name" => "announcement-rss-legacy", "method" => "GET", "path" => "/announcementsrss.php", "handle" => array("\\WHMCS\\Announcement\\Rss", "toXml"))));
        if (class_exists("\\WHMCS\\Module\\Gateway\\Stripe\\StripeRouteProvider")) {
            $class = "WHMCS\\Module\\Gateway\\Stripe\\StripeRouteProvider";
            $routes["/stripe"] = new $class();
        }
        if (class_exists("\\WHMCS\\Module\\Gateway\\StripeAch\\StripeAchRouteProvider")) {
            $class = "WHMCS\\Module\\Gateway\\StripeAch\\StripeAchRouteProvider";
            $routes["/stripe_ach"] = new $class();
        }
        if (class_exists("\\WHMCS\\Module\\Gateway\\Paypalcheckout\\PaypalRouteProvider")) {
            $class = "WHMCS\\Module\\Gateway\\Paypalcheckout\\PaypalRouteProvider";
            $routes["/paypal"] = new $class();
        }
        return $routes;
    }
    public function registerRoutes(\FastRoute\RouteCollector $routeCollector)
    {
        $this->addRouteGroups($routeCollector, $this->getRoutes());
    }
    public function register()
    {
    }
}

?>