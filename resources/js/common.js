/********************************************************************************************************************
*  Common Javascript Functions For Use With LVH-Fling
*
*  When including this file in an HTML doc always also include resources/config.js and resources/common.js
*
*  Written By: Sam Kristoff
*  See https://github.com/samkristoff/LVH-Fling
********************************************************************************************************************/

//Perform HTTP GET
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
			var txt="Error description: " + err.message + "\n\n";
			txt+="Click OK to continue.\n\n";
			alert(txt);
		}		
}

//Get a unique id.  if longID=true 23 ID is 23 characters.  If false 13 characters.
function UniqueId(longId)
{
	var getLongId = 'false';		
	if(longId == true || longId == 'true')
	{
		getLongId = 'true';		
	}
	return HttpGet( WS_ROOT + "misc/UniqueId?longId=" + getLongId);
}