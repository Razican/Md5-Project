<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Md5_Config Class
 *
 * @subpackage	Libraries
 * @author		Jérôme Jaglale
 * @category	Libraries
 * @link		http://maestric.com/en/doc/php/codeigniter_i18n
 */

class Md5_Config extends CI_Config {

	function __construct()
	{
		parent::__construct();
	}

	function site_url($uri = '')
	{
		if (is_array($uri))
		{
			$uri = implode('/', $uri);
		}

		if (class_exists('CI_Controller'))
		{
			$uri = get_instance()->lang->localized($uri);
		}

		return parent::site_url($uri);
	}
}


/* End of file Md5_Config.php */
/* Location: ./application/core/Md5_Config.php */