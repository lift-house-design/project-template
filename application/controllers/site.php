<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends App_Controller
{
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

	public function authentication_error(){}

	public function send_test_notification()
	{
		$this->load->model('notification_model','notification');
		$data=array(
			'var_1'=>'Value 1',
			'var_2'=>'Value 2',
		);
		$this->notification->send('test_notification',$data,'nick@mvbeattie.com','3048716066');

		$this->view=FALSE;
	}
}

/* End of file site.php */
/* Location: ./application/controllers/site.php */