<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends App_Controller
{
	public function index()
	{
		
	}

	public function authentication_error(){}

	public function send_test_notification()
	{
		$this->load->model('notification_model','notification');
		$data=array(

		);
		$this->notification->send('test_notification',$data,'nick@mvbeattie.com','3048716066');
	}
}

/* End of file site.php */
/* Location: ./application/controllers/site.php */