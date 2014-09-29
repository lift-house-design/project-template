<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends App_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->asides['topbar'] = 'topbar';
		$this->asides['notifications'] = 'notifications';
		$this->css[] = 'application.css';
	}		

	public function index()
	{

	}

	public function page()
	{
		$slug=str_replace('-','_',$this->uri->uri_string());

		if(file_exists(APPPATH.'views/pages/'.$slug.'.php'))
		{
			$this->view='pages/'.$slug;
			$this->layout=FALSE;
		}
		elseif(file_exists(APPPATH.'views/'.$slug.'.php'))
		{
			$this->view=$slug;
			$this->layout=FALSE;
		}
		else
			$this->view='site/not_found';
	}

	public function env()
	{
		var_dump(ENVIRONMENT);
	}
}

/* End of file site.php */
/* Location: ./application/controllers/site.php */