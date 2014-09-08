<?php

require '../config.php';

$queueUrl = 'https://sqs.us-east-1.amazonaws.com/293388242627/LVH-Revert-Jobs';

$lvVersion = $_GET["version"];
$fileName = $_GET["fileName"];

use Aws\Sqs\SqsClient;

$AwsSqsClient = SqsClient::factory(array(
    'key'    => $AwsKey,
    'secret' => $AwsSecret,
    'region' => $AwsRegion
));

$AwsSqsClient->sendMessage(array(
											'QueueUrl'    => $queueUrl,
											'MessageBody' => $lvVersion . "_" . $fileName,
											)
								);
 
 echo 'end';
 
?>   