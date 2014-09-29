<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['error_email'] = 'bain.lifthousedesign@gmail.com';

/*
|--------------------------------------------------------------------------
| Metadata
|--------------------------------------------------------------------------
| 'site_name'			The company or website name (Used in copyright)
| 'meta'				Default values for <meta> and <title> tags 
| 'copyright'			Used in footer, does not usually need to be changed
| 'seo_content'			Content that search engines see, but humans do not
*/
$config['site_name'] = 'Lift House Design';
$config['meta'] = array(
	'title' => "Project Template",
	'description' => "Project Template for LAMP Developers"
);
$config['copyright']='Copyright &copy; '.$config['site_name'].' '.date('Y').' All Rights Reserved.';
$config['seo_content'] = '<a href="http://twitterape.com>Trend Archive</a>"';

/*
|--------------------------------------------------------------------------
| URL / Path Configuration
|--------------------------------------------------------------------------
| 'base_url'			Base site URL (prefix with http://)
| 'assets_url'			URL prefix to the assets directory
| 'module_path'			Base module directory path
*/
$config['assets_url']='/assets';
$config['module_path']=APPPATH.'modules';

/*
|--------------------------------------------------------------------------
| Monitoring / Analytics
|--------------------------------------------------------------------------
| 'ga_code'				The "UA-XXXXX-X" code for google analytics, or FALSE
|						to disable
*/
$config['ga_code']=FALSE;

/*
|--------------------------------------------------------------------------
| E-mail Notifications Configuration
|--------------------------------------------------------------------------
| 'sender_email'		The e-mail address displayed as the sender on
|						outgoing e-mails
| 'sender_name'			The name displayed as the sender on outgoing
|						e-mails
| 'config'				Configuration array passed to the e-mail component
*/
$config['email_notifications']=array(
	'sender_email'=>'no-reply@lifthousedesign.com',
	'sender_name'=>'Lifthouse Design',
	'config'=>array(
		'protocol'=>'smtp',
		'smtp_host'=>'mail.lifthousedesign.com',
		'smtp_user'=>'noreply@lifthousedesign.com',
		'smtp_pass'=>'9sbZdlAklydT',
		'smtp_port'=>'25',
		'mailtype'=>'html',
	),
);

/*
|--------------------------------------------------------------------------
| SMS Notifications Configuration
|--------------------------------------------------------------------------
| 'config'				Configuration array used by the Twilio component
*/
$config['sms_notifications']=array(
	'config'=>array(
		'mode'=>'prod',
		'account_sid'=>'AC295178e1f333781132528cd16d55e49b',
		'auth_token'=>'81905b30336cc2fb674adf13e3f17fb2',
		'api_version'=>'2010-04-01',
		'number'=>'+15129422374',
	),
);