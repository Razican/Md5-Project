<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Md5_Loader Class
 *
 * @subpackage	Libraries
 * @author		Razican
 * @category	Loader
 * @link		http://www.razican.com/
 */

class Md5_Loader extends CI_Loader {

	function view($view, $vars = array(), $return = FALSE)
	{
		global $CI;

		$skin	= $CI->config->item('skin');
		$skin	= isset($skin) ? $skin.'/' : '';

		return $this->_ci_load(array('_ci_view' => $skin.$view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));

	}
}


/* End of file Md5_Loader.php */
/* Location: ./application/core/Md5_Loader.php */