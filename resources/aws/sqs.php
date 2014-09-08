<?php

require_once  dirname(__FILE__) . '/../config.php';

$url = 'https://sqs.us-east-1.amazonaws.com/293388242627/LVH-Revert-Jobs';

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

SendSqsMessage($url, "Test Mes");

function report()
{
	echo "Reporting...!";
}

?>   