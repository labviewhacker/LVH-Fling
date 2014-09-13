/********************************************************************************************************************
*  Javascript Functions For Calling LVH-Fling AWS SQS Web Services  
*
*  When including this file in an HTML doc always also include resources/config.js
*
*  Written By: Sam Kristoff
*  See https://github.com/samkristoff/LVH-Fling
********************************************************************************************************************/

function SendSqsMessage(queueUrl, message) 
{
	HttpGet( SQS_WS_ROOT + "SendMessage.php?queueUrl=" + encodeURIComponent(queueUrl) + "&message=" + encodeURIComponent(message) );
}

function PeekSqsMessage(queueUrl, waitTime, searchToken) 
{	
	return HttpGet( SQS_WS_ROOT  + "PeekMessage.php?queueUrl=" + encodeURIComponent(queueUrl) + "&searchToken=" + encodeURIComponent(searchToken) + "&waitTime=" + encodeURIComponent(waitTime));
}

function GetSqsMessage(queueUrl, waitTime, searchToken) 
{	
	return HttpGet( SQS_WS_ROOT + "GetMessage.php?queueUrl=" + encodeURIComponent(queueUrl) + "&waitTime=" + encodeURIComponent(waitTime) + "&searchToken=" + encodeURIComponent(searchToken) );	
}

//Create An SQS Queue.  Returns The New Queue URL
function CreateSqsQueue(name, deliveryDelaySec, maxSizeBytes, retentionPeriodSec, recWaitTimeSec, visTimeoutSec) 
{	
	
	var output = HttpGet(SQS_WS_ROOT  + "CreateQueue.php?name=" + encodeURIComponent(name) 
													+ "&deliveryDelaySec=" + encodeURIComponent(deliveryDelaySec) 
													+ "&maxSizeBytes=" + encodeURIComponent(maxSizeBytes)
													+ "&retentionPeriodSec=" + encodeURIComponent(retentionPeriodSec)
													+ "&recWaitTimeSec=" + encodeURIComponent(recWaitTimeSec)
													+ "&visTimeoutSec=" + encodeURIComponent(visTimeoutSec)
							);
							
	return output.trim();
							
}

function DeleteSqsQueue(queueUrl) 
{	
	return HttpGet( SQS_WS_ROOT + "DeleteQueue.php?queueUrl=" + encodeURIComponent(queueUrl));
}
