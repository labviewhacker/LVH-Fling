<?php

/********************************************************************************************************************
*   Create A New SQS Queue
*
*  <BASE_URL>?name=<QUEUENAME>&deliveryDelaySec=<DELIVERYDELAYSEC>&maxSizeBytes=<MAXSIZEBYTES>&retentionPeriodSec=<RETENTIONPERIODSEC&recWaitTimeSec=<RECWAITTIMESEC>&visTimeoutSec=<VISTIMEOUTSEC>
*
*  Returns Queue URL On Success
*
*  <BASE_URL>  			- URL to this file.
*  <QUEUENAME>  		- Queue Name, Must Be Unique (To all of SQS).  This is the only required parameter

*  Example Usage: https://www.labviewhacker.com/LVH-Fling/public/aws/sqs/CreateQueue?name=LVH_testQueue
*  See Also http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.Sqs.SqsClient.html#_createQueue
*
*  Written By: Sam Kristoff
*  See https://github.com/samkristoff/LVH-Fling
********************************************************************************************************************/
require_once  dirname(__FILE__) . '/../../../resources/php/aws/sqs.php';

//Default Values
$name = '';
$deliveryDelaySec = '0';
$maxSizeBytes = '262144';			//Max!
$retentionPeriodSec = '345600';		//4 Days
$recWaitTimeSec = '0';
$visTimeoutSec = '30';


if($_GET["name"] == '')
{
	echo "Error: Please Provide A Valid Queue Name.";
}
else
{
	$name = $_GET["name"];
	echo CreateSqsQueue($name, $deliveryDelaySec, $maxSizeBytes, $retentionPeriodSec, $recWaitTimeSec, $visTimeoutSec);
}
	
?>