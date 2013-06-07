<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class User_model extends App_Model
	{
		public $_table='users';
		
		/*public $validate=array(
			array(
				'field'=>'',
				'label'=>'',
				'rules'=>'required',
			),
		);*/
		
		public $has_many=array();
		
		public $belongs_to=array();
		
		public $after_get=array();

		/* User members
		-------------------------------------------------------------------------*/

		public $logged_in=FALSE;
		
		public $data;
		
		public function __construct()
		{
			parent::__construct();
			
			$user=session('user');
			$this->logged_in=!empty($user);
			
			if($this->logged_in)
				$this->data=$user;
		}
		
		public function log_in($email=NULL,$password=NULL)
		{
			if(!isset($email))
				$email=post('email');
			if(!isset($password))
				$password=post('password');
			
			if(empty($email)||empty($password))
				return FALSE;
			
			$user=$this->get_by(array(
				'email'=>$email,
				'password'=>sha1($password),
			));
			
			if(empty($user))
				return FALSE;
			
			session('user',$user);
			
			return TRUE;
		}
		
		public function log_out()
		{
			session('user',NULL);
		}
		
		public function change_password($current_password,$new_password)
		{
			// Can't change the password of a user not logged in
			if($this->logged_in===FALSE)
				return FALSE;
			
			// Confirm the current password
			$user=$this->get_by(array(
				'id'=>$this->data['id'],
				'password'=>sha1($current_password),
			));
			
			if(empty($user))
				return FALSE;
			else
			{
				// Change the password
				$this->update($this->data['id'],array(
					'password'=>sha1($new_password),
				));
				
				return TRUE;
			}
		}
	}
	
/* End of file user_model.php */
/* Location: ./application/models/user_model.php */