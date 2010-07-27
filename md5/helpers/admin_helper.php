<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('login_input'))
{
	function login_input()
	{
		$username_input	= array(
			'type'			=> 'text',
			'name'			=> 'username',
		);
		$username_input	= form_input($username_input);
		
		$password_input	= array(
			'type'			=> 'password',
			'name'			=> 'password',
		);
		$password_input	= form_input($password_input);
		
		$submit_input	= array(
			'type'			=> 'submit',
			'name'			=> 'submit',
			'value'			=> lang('admin.login_submit'),
		);
		$submit_input	= form_input($submit_input);

		$login_input	= lang('admin.username').":&nbsp;".$username_input."<br />".lang('admin.password').":&nbsp;".$password_input."<br />".$submit_input;
		return $login_input;
	}
}

/* End of file overal_helper.php */
/* Location: ./system/application/helpers/overal_helper.php */