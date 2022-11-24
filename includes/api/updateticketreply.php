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
$replyId = (int) App::getFromRequest("replyid");
$message = App::getFromRequest("message");
if (!$replyId) {
    $apiresults = array("result" => "error", "message" => "Reply ID Required");
} else {
    if (!$message) {
        $apiresults = array("result" => "error", "message" => "Message is Required");
    } else {
        if ($replyId) {
            try {
                $reply = WHMCS\Support\Ticket\Reply::findOrFail($replyId);
            } catch (Exception $e) {
                $apiresults = array("result" => "error", "message" => "Reply ID Not Found");
                return NULL;
            }
        }
        $reply->message = $message;
        if (App::isInRequest("markdown")) {
            $useMarkdown = (bool) App::getFromRequest("markdown");
            $editor = "plain";
            if ($useMarkdown) {
                $editor = "markdown";
            }
            $reply->editor = $editor;
        }
        $reply->save();
        $apiresults = array("result" => "success", "replyid" => $replyId);
    }
}

?>