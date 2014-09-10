<?php 
	/********************************************************************************************************************
	*  Generate A Unique ID.  By default ID is 13 characters.  If long=True 23 characters are returned.
	*  This is usefulef or generating job IDs to help workers and front ends stay in sync.
	*
	*  Written By: Sam Kristoff
	*  See https://github.com/samkristoff/LVH-Fling
	********************************************************************************************************************/
	
	//Default Values
	$moreEntropy = false;
	
	if($_GET["longId"] == 'true')
	{
		$moreEntropy = true;
	}
	echo uniqid('', $moreEntropy); 
?>