<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authentication extends App_Controller
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

	public function log_in()
	{
		if($this->user->logged_in)
			redirect('/');

		$this->authenticate=FALSE;
		if($this->input->post())
		{
			if($this->user->log_in())
			{
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				//should show errors here		
			}
		}
	}

	public function log_out()
	{	
		$this->user->log_out();
		redirect('/');
	}

	public function sign_up()
	{
		$rules=array(
			array(
				'field'=>'email',
				'label'=>'E-mail',
				'rules'=>'trim|required|max_length[64]|valid_email|is_unique[user.email]',
			),
			array(
				'field'=>'password',
				'label'=>'Password',
				'rules'=>'trim|required|sha1',
			),
			array(
				'field'=>'confirm_password',
				'label'=>'Confirm Password',
				'rules'=>'trim|required|matches[password]|sha1',
			),
			array(
				'field'=>'first_name',
				'label'=>'First Name',
				'rules'=>'trim|required',
			),
			array(
				'field'=>'last_name',
				'label'=>'Last Name',
				'rules'=>'trim',
			),
			array(
				'field'=>'phone',
				'label'=>'Phone',
				'rules'=>'trim|required|valid_phone',
			),
		);

		$this->load->library('form_validation');
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run()!==FALSE)
		{
			$data=$this->input->post();
			$data['confirm_code']=$this->user->generate_confirm_code();

			if($user_id=$this->user->insert($data))
			{
				$url = site_url('/authentication/confirm_account/'.$user_id.'/'.$data['confirm_code']);
				$message = "<body>To confirm your account, visit the link below:<br/>\n<br/>\n<a href=\"$url\">$url</a></body>";
				send_email("Account Confirmation", $message, $data['email']);
				$this->form_validation->reset_values();
				$this->set_notification('You have been sent an e-mail with a link that will verify your e-mail address and activate your account. Thank you for registering!');
			}
		}

		$this->js[]='jquery.maskedinput.min.js';
		$this->js[]='pages/site-sign-up.js';
	}

	public function confirm_account($id,$confirm_code)
	{
		$this->data['confirmed']=FALSE;

		$user=$this->user->get_by(array(
			'id'=>$id,
			'confirm_code'=>$confirm_code,
		));

		if(!empty($user))
		{
			$data=array(
				'confirm_code'=>NULL,
			);
			if($this->user->update($id,$data))
			{
				$this->data['confirmed']=TRUE;
				$this->data['email']=$user['email'];
				$this->set_notification('Your account has been confirmed!');
			}
		}
	}

	public function forgot_password()
	{
		$rules=array(
			array(
				'field'=>'email',
				'label'=>'E-mail',
				'rules'=>'trim|required|max_length[64]|valid_email',
			),
		);

		$this->load->library('form_validation');
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run()!==FALSE)
		{
			$user=$this->user->get_by(array(
				'email'=>$this->input->post('email'),
			));

			if(!empty($user))
			{
				$data=array(
					'confirm_code'=>$this->user->generate_confirm_code(),
				);
				if($this->user->update($user['id'],$data))
				{
					$url = site_url('/authentication/reset_password/'.$user['id'].'/'.$data['confirm_code']);
					$message = "<body>To reset your password, visit the link below:<br/>\n<br/>\n<a href=\"$url\">$url</a></body>";
					send_email("Password Reset", $message, $user['email']);
					$this->form_validation->reset_values();
					$this->set_notification('You have been sent an e-mail with a link that will allow you to reset your password.');
				}
			}
			else
			{
				$this->form_validation->set_error('That e-mail address was not found. Please check your e-mail address and try again.');
			}
		}
	}

	public function reset_password($id,$confirm_code)
	{
		$this->data['password_reset']=FALSE;
		$this->data['confirmed']=FALSE;
		$this->data['id']=$id;
		$this->data['confirm_code']=$confirm_code;

		$this->load->library('form_validation');

		$user=$this->user->get_by(array(
			'id'=>$id,
			'confirm_code'=>$confirm_code,
		));

		if(!empty($user))
		{
			$this->data['confirmed']=TRUE;
			$this->data['email']=$user['email'];

			$rules=array(
				array(
					'field'=>'password',
					'label'=>'Password',
					'rules'=>'trim|required|sha1',
				),
				array(
					'field'=>'confirm_password',
					'label'=>'Confirm Password',
					'rules'=>'trim|required|matches[password]|sha1',
				),
			);

			$this->form_validation->set_rules($rules);

			if($this->form_validation->run()!==FALSE)
			{
				$data=array(
					'password'=>$this->input->post('password'),
					'confirm_code'=>NULL,
				);

				if($this->user->update($id,$data))
				{
					$this->data['password_reset']=TRUE;
				}
				else
				{
					$this->form_validation->set_error('There was a problem resetting your password. Please try again.');
				}
			}
		}
	}
}

/* End of file authentication.php */
/* Location: ./application/controllers/authentication.php */