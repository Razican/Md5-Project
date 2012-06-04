<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Md5_Controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->output->enable_profiler($this->config->item('debug'));
	}
}


/* End of file Md5_Controller.php */
/* Location: ./application/core/Md5_Controller.php */