<?php

//Absolute Path To Web Server Root Directory
$WebRoot = '/var/www/';

//Absolute Path To AWS Auto Load File
//See http://docs.aws.amazon.com/aws-sdk-php/guide/latest/installation.html
$AwsAutoloadPath = $WebRoot . 'vendor/autoload.php';

//AWS Credentials
$AwsKey = '123456789';
$AwsSecret = 'abcdefghijklmnopqrstuvwxyz';
$AwsRegion = 'us-east-1';

//Bootstrap
require $AwsAutoloadPath;

?>