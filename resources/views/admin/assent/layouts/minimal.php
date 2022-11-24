<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 5.6
 * @ Decoder version: 1.0.4
 * @ Release: 02/06/2020
 *
 * @ ZendGuard Decoder PHP 5.6
 */

echo "<!DOCTYPE html>\n<html lang=\"en\">\n<head>\n    <meta charset=\"";
echo $charset;
echo "\" >\n    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\n\n    <title>WHMCS - ";
echo $pagetitle;
echo "</title>\n\n    <link href=\"https://fonts.googleapis.com/css?family=Open+Sans:300,400,600\" rel=\"stylesheet\">\n    <link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.0.13/css/all.css\"\n      integrity=\"sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp\"\n      crossorigin=\"anonymous\">\n    <script\n      src=\"https://code.jquery.com/jquery-3.3.1.min.js\"\n      integrity=\"sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=\"\n      crossorigin=\"anonymous\"></script>\n    <style>\n        body {\n            margin: 0;\n            padding: 30px;\n            background-color: #eee;\n            font-family: 'Open Sans', sans-serif;\n        }\n        .content-wrapper {\n            margin: 0 auto;\n            padding: 40px;\n            background-color: #fff;\n            max-width: 760px;\n        }\n        a {\n            color: #337ab7;\n            text-decoration: none;\n        }\n        a:hover {\n            color: #23527c;\n            text-decoration: underline;\n        }\n        h1 {\n            margin: 10px 0;\n            padding: 10px 0;\n            border-bottom: 1px solid #ccc;\n        }\n        .form-control {\n            height: 34px;\n            padding: 6px 12px;\n            font-size: 16px;\n            line-height: 1.42857143;\n            color: #555;\n            background-color: #fff;\n            border: 1px solid #ccc;\n            border-radius: 4px;\n            box-shadow: inset 0 1px 1px rgba(0,0,0,.075);\n            transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;\n        }\n        .license-key {\n            position: relative;\n            margin: 0 auto;\n            width: 364px;\n        }\n        .license-key input {\n            padding-left: 50px;\n            width: 300px;\n        }\n        .license-key .fas {\n            position: absolute;\n            top: 12px;\n            left: 15px;\n            font-size: 24px;\n            color: #ccc;\n            z-index: 1000;\n        }\n        .license-key.error {\n            border-color: #c53636;\n        }\n        .license-key.error .fas {\n            color: #c53636;\n        }\n        .license-key-error {\n            margin: 0 auto 2px;\n            width: 364px;\n            color: #c53736;\n            display: none;\n        }\n        textarea {\n            width: 100%;\n            height: 400px;\n            overflow-x: hidden;\n        }\n        textarea.eula {\n            font-family: Tahoma, sans-serif;\n            font-size: 13px;\n            color: #666666;\n            resize: none;\n        }\n        .btn-container {\n            margin: 15px 0;\n            padding: 0;\n            text-align: center;\n        }\n        .btn {\n            display: inline-block;\n            padding: 6px 12px;\n            font-size: 14px;\n            font-weight: 400;\n            line-height: 1.42857143;\n            text-align: center;\n            white-space: nowrap;\n            vertical-align: middle;\n            cursor: pointer;\n            user-select: none;\n            background-image: none;\n            border: 1px solid transparent;\n            border-radius: 4px;\n        }\n        .btn-default {\n            color: #333;\n            background-color: #fff;\n            border-color: #ccc;\n        }\n        .btn-success {\n            color: #fff;\n            background-color: #5cb85c;\n            border-color: #4cae4c;\n        }\n        .btn-lg {\n            font-size: 1.4em;\n            font-weight: 300;\n            padding: 5px 25px;\n        }\n        .buy-promo {\n            margin: 20px 0;\n            padding: 20px;\n            background-color: #f9f1d9;\n            text-align: center;\n        }\n        .copyright {\n            margin: 20px 0;\n            text-align: center;\n            font-size: 0.8em;\n        }\n    </style>\n</head>\n<body>\n    <div class=\"content-wrapper\">\n        <a href=\"https://www.whmcs.com/\" target=\"_blank\"><img\n            src=\"https://www.whmcs.com/images/logo.png\"\n            alt=\"WHMCS - The Complete Client Management, Billing & Support Solution\"\n            border=\"0\">\n        </a>\n        <h1>";
echo $pagetitle;
echo "</h1>\n        ";
if (!$isFullAdmin) {
    $this->insert("partials/full-admin-required");
} else {
    echo $this->section("body");
    echo $this->section("actionButtons");
}
echo "    </div>\n    <div class=\"copyright\">\n        Copyright &copy; WHMCS Limited ";
echo date("Y");
echo ". All rights reserved.<br>\n        <a href=\"https://www.whmcs.com/\" target=\"_blank\">https://www.whmcs.com/</a>\n    </div>\n</body>\n</html>\n";

?>