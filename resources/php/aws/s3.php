<?php
	
/********************************************************************************************************************
*  AWS S3 Functions For Use In HTML Pages
*
*  Written By: Sam Kristoff
*  See https://github.com/samkristoff/LVH-Fling
********************************************************************************************************************/

require_once  dirname(__FILE__) . '/../../config.php';


//Generate HTML Form To Upload File To Specified S3 Bucket
function S3UploadForm($bucket)
{
	global $AwsKey;			//From config.php
	global $AwsSecret;		//From config.php
	
	//Calculate Expiration Time
	$now = strtotime(date("Y-m-dTG:i:s"));
	$expire = date("Y-m-d",  strtotime('+6 hours', $now)) . "T" . date("G:i:s.Z",  strtotime('+6 hours', $now)) . "Z";

	//Generate Policy And Signature
	$policy = "{
						'expiration': '" . $expire . "',
						'conditions': [
					{
						'bucket': '" . $bucket . "'
					},
					{
						'acl': 'private'
					},
					[
						'starts-with',
						'\$key',
						''
					],
					{
						'success_action_status': '201'
					}
				]
			}";				
	$base64Policy = base64_encode($policy);
	$signature = base64_encode(hash_hmac("sha1", $base64Policy, $AwsSecret, $raw_output = true));
	
	//Generate HTML Form
	echo "
			<form action='https://s3.amazonaws.com/" . $bucket . "/' method='POST' enctype='multipart/form-data' class='direct-upload'>

			<input id='s3UploadKey' type='hidden' name='key' value='default'>
			<input type='hidden' name='AWSAccessKeyId' value='" . $AwsKey . "'>
			<input type='hidden' name='acl' value='private'>
			<input type='hidden' name='success_action_status' value='201'>
			<input type='hidden' name='policy' value='" . $base64Policy . "'>
			<input type='hidden' name='signature' value='" . $signature . "'>
			<input type='file' name='file' />
			<!-- 
				Progress Bar to show upload completion percentage
				<div class='progress'><div class='bar'></div></div>
			-->
		</form>";
}

?>