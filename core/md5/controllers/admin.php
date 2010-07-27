<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Controller {

	function Admin()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$this->lang->load('admin');
		$this->load->helper(array('cookie', 'admin'));
		$this->load->library('encrypt');

		if((!$this->input->post('username')) OR (!$this->input->post('password')))
		{
			$cookie						= get_cookie($this->config->item('cookie_prefix').'md5project');
			
			if ($cookie)
			{

				$cookie					= explode("/%/", $cookie);
				$cookie_user			= $this->encrypt->decode($cookie[0]);
				$admin					= $this->db->query("SELECT * FROM ". $this->db->dbprefix('admin') ." WHERE `username` = '".$cookie_user."';");
				
				if($admin->num_rows() == 1)
				{
					foreach ($admin->result() as $row)
					{
						$pass			= $row->password;
						$ip				= $row->last_ip;
					}
					if (($pass == dohash($this->encrypt->decode($cookie[1]), 'md5')) && ($ip == $this->input->ip_address()))
					{
						$head['page']	= 'admin';

						$data['head']	= $this->load->view('adm/header', $head, TRUE);
						$data['menu']	= $this->load->view('adm/menu', "", TRUE);

						$this->load->view('adm/index', $data);
					}
					else
					{
						delete_cookie($this->config->item('cookie_prefix').'md5project');
						redirect('admin/error', 'location', 301);
					}
				}
				else
				{
					delete_cookie($this->config->item('cookie_prefix').'md5project');
					redirect('admin/error', 'location', 301);
				}
			}
			else
			{
			
				$head['page']			= 'admin';

				$data['head']			= $this->load->view('header', $head, TRUE);
				$data['menu']			= $this->load->view('menu', "", TRUE);

				$foot['total_hashes']	= $this->footer->total_hashes();
				$foot['copyright']		= $this->footer->copyright();

				$data['foot']			= $this->load->view('foot', $foot, TRUE);
				
				$this->load->view('login', $data);
			}
		}
		else
		{

			$admin						= $this->db->query("SELECT * FROM ". $this->db->dbprefix('admin') ." WHERE `username` = '".$this->input->post('username')."';");
			
			if($admin->num_rows() == 1)
			{
				foreach ($admin->result() as $row)
				{
					$pass				= $row->password;
				}
				if ($pass == dohash($this->input->post('password'), 'md5'))
				{
					if (!$this->input->post('remember'))
					{
						$expire			= 0;
					}
					else
					{
						$expire			= time()+7*24*60*60;
					}
					set_cookie($this->config->item('cookie_prefix').'md5project', $this->encrypt->encode($this->input->post('username')).'/%/'.$this->encrypt->encode($this->input->post('password')), $expire, '/',$this->config->item('cookie_domain'), FALSE, TRUE);

					$this->db->query("UPDATE ". $this->db->dbprefix('admin') ." SET `last_ip` = '".$this->input->ip_address()."' WHERE `username` = '".$this->input->post('username')."';");
					
					redirect('admin', 'location', 301);
				}
				else
				{
					redirect('admin', 'location', 301);
				}
			}
			else
			{
				redirect('admin/error', 'location', 301);
			}
		}
	}

	function error()
	{
		echo "Ha ocurrido un error";
	}
}

/* End of file admin.php */
/* Location: ./system/application/controllers/admin.php */