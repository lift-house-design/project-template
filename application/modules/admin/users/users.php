<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users_admin_module extends Admin_module
{
	public $name='Users';

	public function index()
	{
		echo 'INDEX FN CALLED ON USERS MODULE';
	}
}