<?php

/********************************************************************************************************************
*   Create A New SQS Queue
*
*  <BASE_URL>?queueUrl=<QUEUEURL>
*
*  <BASE_URL>  			- URL to this file.
*  <QUEUEURL>  				- Queue URL

*  Example Usage: https://www.labviewhacker.com/LVH-Fling/public/aws/sqs/CreateQueue?name=LVH_testQueue
*  See Also http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.Sqs.SqsClient.html#_deleteQueue
*
*  Written By: Sam Kristoff
*  See https://github.com/samkristoff/LVH-Fling
********************************************************************************************************************/
require_once  dirname(__FILE__) . '/../../../resources/php/aws/sqs.php';

if($_GET["queueUrl"] == '')
{
	echo "Error: Please Provide A Valid Queue URL.";
}
else
{
	$queueUrl = $_GET["queueUrl"];
	echo DeleteSqsQueue($queueUrl);
}
?>