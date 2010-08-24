<?php

class MY_Loader extends CI_Loader {

	function view($view, $vars = array(), $return = FALSE)
	{
		global $CI;
		return $this->_ci_load(array('_ci_view' => $CI->config->item('skin').'/'.$view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));
	}
}

/* End of file MY_Loader.php */
/* Location: ./application/core/MY_Loader.php */