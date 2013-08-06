<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Notification_model extends App_Model
	{
		public $_table='notification';

		protected $protected_attributes=array('id');
		
		public $has_many=array();
		
		public $belongs_to=array();
		
		public $after_get=array('after_get');

		public $before_delete=array();

	/*-----------------------------------------------------------------------*/
		
		protected function after_get($data)
		{
			$data['vars']=json_decode($data['vars'],TRUE);

			return $data;
		}

		public function send($key,$data,$email=FALSE,$phone=FALSE)
		{
			$notification=$this->get_by(array(
				'key'=>$key,
			));

			if(!empty($notification))
			{
				if($notification['email_enabled'])
				{
					
				}
			}
		}
	}
	
/* End of file notification_model.php */
/* Location: ./application/models/notification_model.php */