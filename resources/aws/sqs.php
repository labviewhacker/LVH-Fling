<?php
	
	/********************************************************************************************************************
	*  AWS SQS Functions For Use In Web Services  
	*  See https://github.com/samkristoff/LVH-Fling
	*
	*  Written By: Sam Kristoff
	********************************************************************************************************************/
	
	require_once  dirname(__FILE__) . '/../config.php';

	use Aws\Sqs\SqsClient;

	$AwsSqsClient = SqsClient::factory(array(
		'key'    => $AwsKey,
		'secret' => $AwsSecret,
		'region' => $AwsRegion
	));

	//Send an SQS message to the specified queue with the specified message body.  The user must have permission to write to the queue
	function SendSqsMessage($queueUrl, $message)
	{
		global $AwsSqsClient;
		$AwsSqsClient->sendMessage(array(
			'QueueUrl'    => $queueUrl,
			'MessageBody' => $message
		));
	}

?>   