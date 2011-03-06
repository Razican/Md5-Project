<?php

class Md5_Loader extends CI_Loader {

	function view($view, $vars = array(), $return = FALSE)
	{
		global $CI;
		if (!defined('INSTALL'))
		{
			return $this->_ci_load(array('_ci_view' => $CI->config->item('skin').'/'.$view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));
		}
		else
		{
			return $this->_ci_load(array('_ci_view' => 'install/'.$view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));
		}
	}
}


/* End of file Md5_Loader.php */
/* Location: ./application/core/Md5_Loader.php */