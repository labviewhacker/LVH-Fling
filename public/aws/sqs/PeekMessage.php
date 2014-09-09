<?php

/********************************************************************************************************************
*   Get up to 1 message containing the searchToken from an the specified SQS Queue.  The message is NOT deleted from the queue
*
*  <BASE_URL>?queueUrl=<QUEUEURL>&searchToken=<SEARCH_TOKEN>&waitTime=<WAIT_TIME>
*
*  <BASE_URL>  			- URL to this file.
*  <QUEUEURL>  			- AWS SQS Queue URL
*  <SEARCH_TOKEN>	- String to search message body for.   Mesage is only returned if body contains Search Token.
*  <WAIT_TIME>			- Seconds to poll for message.  Default is 2.
*  Example Usage: https://www.labviewhacker.com/LVH-Fling/public/aws/sqs/GetMessage.php?queueUrl=https%3A%2F%2Fsqs.us-east-1.amazonaws.com%2F293388242627%2Ftestqueue&searchToken=hello
*
*  Written By: Sam Kristoff
*  See https://github.com/samkristoff/LVH-Fling
********************************************************************************************************************/
require_once  dirname(__FILE__) . '/../../../resources/php/aws/sqs.php';
//Default Values
$waitTime = 2;
$searchToken = '';

//Get POST Parameters
$queueUrl = $_GET["queueUrl"];

if($_GET["searchToken"] != '')
{
	$searchToken = $_GET["searchToken"];	
}
	
if($_GET["waitTime"] > 0)
{
	$waitTime = $_GET["waitTime"];
}

//Peek At Message
echo PeekSqsMessage($queueUrl, $waitTime, $searchToken);
	
?>