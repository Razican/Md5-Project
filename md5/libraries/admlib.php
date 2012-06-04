<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admlib {

	public function get_alerts()
	{
		$CI		=& get_instance();
		$alerts	= '';

		$current_version	= file_get_contents('http://md5-project.razican.com/current.php');
		if(strcmp($current_version, $CI->config->item('version')) > 0)
			$alerts .= lang('admin.updates');

		return $alerts;
	}
}


/* End of file admlib.php */
/* Location: ./application/libraries/admlib.php */