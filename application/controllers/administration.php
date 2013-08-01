<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administration extends App_Controller
{
	public $nav=array();

	protected $layout='layouts/administration';

	public function __construct()
	{
		parent::__construct();

		$this->css=array('reset.css','administration.css');
		$this->js[]='administration.js';

		$this->_load_modules();

		$this->data['nav']=$this->nav;
	}

	/**
	 * Instantiates all the admin modules
	 */
	protected function _load_modules()
	{
		$this->load->library('modules');

		foreach($this->modules->get_modules('admin') as $admin_module)
		{
			$module=$this->modules->get_instance($admin_module,'admin');
			$module->init($this);
		}
	}

	public function index()
	{
		
	}

	public function module()
	{
		$this->view=FALSE;
		$args=func_get_args();

		if(count($args)>0)
		{
			if(count($args)==1)
			{
				$module_name=array_shift($args);
				$method='index';
				$module_args=array();
			}
			else
			{
				$module_name=array_shift($args);
				$method=array_shift($args);
				$module_args=$args;
			}

			$this->load->library('modules');
			$module=$this->modules->get_instance($module_name,'admin');

			call_user_func_array(array($module,$method),$module_args);
		}
	}
}

/* End of file administration.php */
/* Location: ./application/controllers/administration/administration.php */