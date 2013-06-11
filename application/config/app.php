<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Development Mode
|--------------------------------------------------------------------------
|
| Set to true to display errors and debugging information.
|
|--------------------------------------------------------------------------
*/
$config['dev_mode']=TRUE;

/*
|--------------------------------------------------------------------------
| Database Configuration
|--------------------------------------------------------------------------
|
| http://ellislab.com/codeigniter/user-guide/database/configuration.html
|
|--------------------------------------------------------------------------
*/
$config['database']=array(
	'hostname'=>'localhost',
	'username'=>'root',
	'password'=>'',
	'database'=>'test',
	'dbdriver'=>'mysql',
	'db_debug'=>$config['dev_mode'],
);

/*
|--------------------------------------------------------------------------
| General Site Configuration
|--------------------------------------------------------------------------
|
| 'site_name'			the name of the site to be used in the title bar and
|						various other locations
|
| 'site_description'	a short description or tagline to be used as the
|						default meta description and possibly other places
|						on the site
|
| 'title_format'		the formatting of the title used on every page, where
|						the first argument is the site name and the second is
|						the page name
|
| 'copyright_format'	the formatting of the copyright used at the bottom
|						of every page and in the meta tag, where the first
|						argument is the site name and the second is the 
|						current year
|
| 'assets_url'			url prefix to the assets directory
|
| 'ga_code'				the "UA-XXXXX-X" code for google analytics, or FALSE
|						to disable
|
*/
$config['site_name']='Project Template';
$config['site_description']='Making projects work';
$config['title_format']='%1$s | %2$s';
$config['copyright_format']='Copyright &copy; %1$s %2$d. All Rights Reserved.';
$config['assets_url']='/assets';
$config['ga_code']=FALSE;

/*
|--------------------------------------------------------------------------
| Contact Form Configuration
|--------------------------------------------------------------------------
*/
$config['contact_form']=array(
	'recipient_email'=>'nickniebaum@gmail.com',
	'recipient_name'=>'Nick Niebaum',
	'sender_email'=>'nickniebaum@gmail.com',
	'sender_name'=>'Nick Niebaum',
	'subject'=>'Website Contact Form Submitted by {first_name} {last_name}',
	'body'=>file_get_contents(dirname(__FILE__).'/templates/contact_form.php'),
);

/* End of file app.php */
/* Location: ./application/config/app.php */