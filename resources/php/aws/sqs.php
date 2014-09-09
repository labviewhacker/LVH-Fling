<?php
	
/********************************************************************************************************************
*  AWS SQS Functions For Use In Web Services  
*
*  Written By: Sam Kristoff
*  See https://github.com/samkristoff/LVH-Fling
********************************************************************************************************************/

require_once  dirname(__FILE__) . '/../../config.php';

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

//Peek at (ie get but don't delete) an SQS message from the specified queue that contains the specified search token.
function PeekSqsMessage($queueUrl, $waitTime, $searchToken)
{
	$msgObj = PeekSqsMessageObject($queueUrl, $waitTime, $searchToken);
	return $msgObj[Body];
}

//Get (and delete) an SQS message from the specified queue that contains the specified search token.
function GetSqsMessage($queueUrl, $waitTime, $searchToken)
{
	//Get The Message (Without Deleting)
	$msgObj = PeekSqsMessageObject($queueUrl, $waitTime, $searchToken);
	
	//If A Valid Message Is Returned Delete It From The Queue
	if( strlen($msgObj[Body]) > 0)
	{
		DeleteSqsMessage($queueUrl, $msgObj[ReceiptHandle]);
	}
	return $msgObj[Body];
}

/********************************************************************************************************************
*  Helpers
********************************************************************************************************************/
//Get Message Object (Without Deleting It)
function PeekSqsMessageObject($queueUrl, $waitTime, $searchToken)
{

	global $AwsSqsClient;
	$result = $AwsSqsClient->receiveMessage(array(
		'QueueUrl' => $queueUrl,
		'MaxNumberOfMessages' => 10,
		'WaitTimeSeconds' => $waitTime
	));
	
	//If no search token is given return first message
	if( strlen($searchToken) == 0 ) 
	{	
		$messages = $result->getPath('Messages');		
		return $messages[0];		
	}	
	
	//If seachToken provided search messages for token
	$match = 'false';
	$needle = '/.*' . $searchToken . '.*/';
	$count = 0;
	foreach ($result->getPath('Messages/*/Body') as $messageBody) 
	{			
		$searchResult = preg_match($needle, $messageBody);
				
		//If Match Is Found Return Message
		if($searchResult > 0)
		{
			$messages = $result->getPath('Messages');
			return $messages[$count];	
		}			
		$count++;
	}		
	//If all messages have been searched and no matches found return NULL
	return NULL;		
}

//Delete the sqs message with the specified receiptHandle from the sqs queue specified by $queueUrl
function DeleteSqsMessage($queueUrl, $receiptHandle)
{
	global $AwsSqsClient;
	$result = $AwsSqsClient->deleteMessage(array(
		'QueueUrl' => $queueUrl,
		'ReceiptHandle' => $receiptHandle
	));
}

?>   