<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('changelog_table'))
{
	function changelog_table()
	{

		foreach (lang('changelog.table') as $v => $d)
		{
			$parse['version']		= $v;
			$parse['description']	= nl2br($d);

			$CI =& get_instance();
			$changelog_table		= isset($changelog_table) ? $changelog_table : "";
			$changelog_table		.= $CI->load->view('changelog_table', $parse, TRUE);
		}

		return $changelog_table;
	}
}


/* End of file changelog_helper.php */
/* Location: ./application/helpers/changelog_helper.php */