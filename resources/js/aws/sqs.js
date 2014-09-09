/********************************************************************************************************************
*  Javascript Functions For Calling LVH-Fling AWS SQS Web Services  
*
*  When including this file in an HTML doc always also include resources/config.js
*
*  Written By: Sam Kristoff
*  See https://github.com/samkristoff/LVH-Fling
********************************************************************************************************************/

function SqsSendMessage(queueUrl, message) 
{
	HttpGet( SQS_WS_ROOT + "SendMessage.php?queueUrl=" + encodeURIComponent(queueUrl) + "&message=" + encodeURIComponent(message) );
}

function SqsPeekMessage(queueUrl, searchToken, waitTime) 
{	
	return HttpGet( SQS_WS_ROOT + "PeekMessage.php?queueUrl=" + encodeURIComponent(queueUrl) + "&searchToken=" + encodeURIComponent(searchToken) + "&waitTime=" + encodeURIComponent(waitTime));
}

function SqsGetMessage(queueUrl, searchToken, waitTime) 
{	
	return HttpGet( SQS_WS_ROOT + "GetMessage.php?queueUrl=" + encodeURIComponent(queueUrl) + "&searchToken=" + encodeURIComponent(searchToken) + "&waitTime=" + encodeURIComponent(waitTime));	
}

function HttpGet(url)
{
	try
		{
			var xmlHttp = null;			
			xmlHttp = new XMLHttpRequest();
			xmlHttp.open( "GET", url, false );
			xmlHttp.send( null );			
			return xmlHttp.responseText;
		}
		catch(err)
		{
			txt+="Error description: " + err.message + "\n\n";
			txt+="Click OK to continue.\n\n";
			alert(txt);
		}		
}


