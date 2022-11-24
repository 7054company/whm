<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 5.6
 * @ Decoder version: 1.0.4
 * @ Release: 02/06/2020
 *
 * @ ZendGuard Decoder PHP 5.6
 */

define("ADMINAREA", true);
require_once dirname(__DIR__) . "/init.php";
$request = WHMCS\Http\Message\ServerRequest::fromGlobals();
$response = DI::make("Frontend\\Dispatcher")->dispatch($request);
$statusCode = $response->getStatusCode();
$statusFamily = substr($statusCode, 0, 1);
if (!in_array($statusFamily, array(2, 3)) && !($response instanceof WHMCS\Http\Message\JsonResponse || $response instanceof Zend\Diactoros\Response\JsonResponse || $response instanceof WHMCS\Admin\ApplicationSupport\View\Html\Smarty\ErrorPage)) {
    $viewFactory = new WHMCS\Admin\ApplicationSupport\Http\Message\ResponseFactory();
    $response = $viewFactory->genericError($request, $statusCode);
}
(new Zend\Diactoros\Response\SapiEmitter())->emit($response);
exit;

?>