<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('contact_table'))
{
	function contact_table()
	{
		require_once(APPPATH .'/includes/vars'.EXT);

		foreach ($staff as $n => $data)
		{

			if ($data['rank'] === "admin")
			{
				$parse['rank']	= lang('contact.administrator');
			}
			elseif ($data['rank'] === "opera")
			{
				$parse['rank']	= lang('contact.operator');
			}
			elseif ($data['rank'] === "contrib")
			{
				$parse['rank']	= lang('contact.contributor');
			}
			else
			{
				$parse['rank']	= lang('contact.dkn');
			}

			$worksum			= $data['prog'] + $data['transl'] + $data['design'];

			if ($data['prog'] === 1)
			{
				$work			= humanize(lang('contact.programmer'));
				if ($worksum === 2)
				{
					$work		.= " ".lang('contact.and')." ";
					if ($data['transl'] === 1)
					{
						$work	.= lang('contact.translator');
					}
					else
					{
						$work	.= lang('contact.designer');
					}
				}
				elseif ($worksum === 3)
				{
					$work		.= ", ".lang('contact.translator')." ".lang('contact.and')." ".lang('contact.designer');
				}
			}
			elseif ($data['transl'] === 1)
			{
				$work			= humanize(lang('contact.translator'));
				if ($worksum === 2)
				{
					$work		.= " ".lang('contact.and')." ".lang('contact.designer');
				}
			}
			elseif ($data['design'] === 1)
			{
				$work			= humanize(lang('contact.designer'));
			}
			else
			{
				$work			= lang('contact.dkn');
			}

			$parse['work']		= $work;
			$parse['nick']		= $data['nick'];

			if ($data['email'] === "N/A")
			{
				$parse['email']	= $data['email'];
			}
			else
			{
				$parse['email']	= safe_mailto($data['email']);
			}

			$CI =& get_instance();
			$contact_table		= isset($contact_table) ? $contact_table : "";
			$contact_table		.= $CI->load->view('contact_table', $parse, TRUE);
		}

		return $contact_table;
	}
}


/* End of file contact_helper.php */
/* Location: ./application/helpers/contact_helper.php */