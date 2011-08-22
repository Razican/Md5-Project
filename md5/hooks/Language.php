<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Language hook
 *
 * @subpackage	Hooks
 * @author		Razican
 * @category	Hooks
 * @link		http://www.razican.com/
 */

function language()
{
	log_message('debug', 'Language hook initialised.');
	$CI			=& get_instance();

	$language	= $CI->session->userdata('language');
	if(($language != $CI->lang->lang()) && ($CI->lang->lang() != ''))
	{
		$CI->session->set_userdata('language', $CI->lang->lang());
	}
	else if(( ! $CI->lang->lang()) && ( ! $language))
	{
		$CI->load->library('user_agent');
		foreach ($CI->lang->languages as $lang => $name)
		{
			if($CI->agent->accept_lang($lang))
			{
				$CI->session->set_userdata('language', $lang);
				log_message('debug', 'Redirect to '.$lang.$CI->uri->uri_string());
				redirect($lang.$CI->uri->uri_string(), 'location', 302);
				return;
			}
		}
		$CI->session->set_userdata('language', $CI->lang->default_lang());
		log_message('debug', 'Redirect to '.$CI->lang->default_lang().$CI->uri->uri_string());
		redirect($CI->lang->default_lang().$CI->uri->uri_string(), 'location', 302);
	}
	else if ( ! $CI->lang->lang())
	{
		log_message('debug', 'Redirect to '.$language.'/'.$CI->uri->uri_string());
		redirect($language.'/'.$CI->uri->uri_string(), 'location', 302);
	}
}


/* End of file Language.php */
/* Location: ./application/hooks/Language.php */