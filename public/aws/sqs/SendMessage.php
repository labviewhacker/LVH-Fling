<?php

	/********************************************************************************************************************
	*   Send a message to an SQS queue.
	*
	*  <BASE_URL>?queueUrl=<QUEUEURL>&message=<MESSAGE>
	*
	*  <BASE_URL>  - URL to this file.
	*  <QUEUEURL>  - AWS SQS Queue URL
	*  <MESSAGE>   - SQS Message Body
	*
	*  Example Usage: https://www.labviewhacker.com/LVH-Fling/public/aws/sqs/SendMessage.php?queueUrl=https%3A%2F%2Fsqs.us-east-1.amazonaws.com%2F293388242627%2Ftestqueue&message=helloworld
	*
	*  Written By: Sam Kristoff
	********************************************************************************************************************/
	require_once '/var/www/wordpress/LVH-Fling/resources/aws/sqs.php';

	//Get POST Parameters
	$queueUrl = $_GET["queueUrl"];
	$message = $_GET["message"];
	
	//Send Message
	SendSqsMessage($queueUrl, $message);

?>