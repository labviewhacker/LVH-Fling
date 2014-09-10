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

function PeekSqsMessage(queueUrl, searchToken, waitTime) 
{	
	return HttpGet( SQS_WS_ROOT  + "PeekMessage.php?queueUrl=" + encodeURIComponent(queueUrl) + "&searchToken=" + encodeURIComponent(searchToken) + "&waitTime=" + encodeURIComponent(waitTime));
}

function GetSqsMessage(queueUrl, searchToken, waitTime) 
{	
	return HttpGet( SQS_WS_ROOT + "GetMessage.php?queueUrl=" + encodeURIComponent(queueUrl) + "&searchToken=" + encodeURIComponent(searchToken) + "&waitTime=" + encodeURIComponent(waitTime));	
}



