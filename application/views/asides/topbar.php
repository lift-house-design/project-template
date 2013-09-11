<div id="topbar">
	<? if($logged_in): ?>

		<? /* Greeting */ ?>
		Welcome, <?= (trim($user['first_name'].' '.$user['last_name'])) ?> |

		<?  /* role-specific navigation */
			foreach($user['roles'] as $role){
				switch($role){
					case 'administrator':
						echo anchor('/administration','Administration') . ' | ';
						break;
					case 'user':
						echo anchor('/dashboard','Dashboard') . ' | ';
						break;
				}
			}
		?>
		<?= anchor('/authentication/log_out','Log Out') ?>
	<? else: ?>
		<? /* Login Form */ ?>
		<?= form_open('/authentication/log_in', array('class'=>'login-form')) ?>
			<?= form_input(array(
				'name'=>'email',
				'id'=>'email',
				'placeholder'=>'E-mail',
				'value'=>set_value('value'),
				'class'=>'small',
			)) ?>
			<?= form_password(array(
				'name'=>'password',
				'id'=>'password',
				'placeholder'=>'Password',
				'class'=>'small',
			)) ?>
			<?= form_submit('login', 'Log In') ?>
			<?= anchor('/authentication/sign_up','Sign Up') ?> |
			<?= anchor('/authentication/forgot_password','Forgot Password?') ?>
		<?= form_close() ?>
	<? endif; ?>
</div>