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
			$cookie						= get_cookie('md5project', TRUE);
			
			if ($cookie)
			{

				$cookie					= explode("/%/", $cookie);

					if ($this->config->item('admin_password') === $this->encrypt->decode($cookie[1]) && ($this->encrypt->decode($cookie[0]) === $this->config->item('admin_username')))
					{
						$head['page']	= 'admin';

						/*$data['head']	= $this->load->view('adm/header', $head, TRUE);
						$data['menu']	= $this->load->view('adm/menu', "", TRUE);

						$this->load->view('adm/index', $data);*/
						echo "¡Estás dentro!";
					}
					else
					{
						delete_cookie('md5project');
						redirect('admin/error', 'location', 301);
					}
			}
			else
			{
			
				$head['page']			= 'admin';

				$data['head']			= $this->load->view('header', $head, TRUE);
				$data['menu']			= $this->load->view('menu', "", TRUE);

				$data['foot']			= $this->load->view('foot', '', TRUE);
				
				$this->load->view('login', $data);
			}
		}
		else
		{
		
			if (($this->config->item('admin_password') == sha1($this->input->post('password', TRUE))) && ($this->input->post('username', TRUE) === $this->config->item('admin_username')))
			{
				if (!$this->input->post('remember', TRUE))
				{
					$expire			= 0;
				}
				else
				{
					$expire			= 7*24*60*60;
				}
				set_cookie('md5project', $this->encrypt->encode($this->input->post('username', TRUE)).'/%/'.$this->encrypt->encode(sha1($this->input->post('password', TRUE))), $expire, $this->config->item('cookie_domain'));
				
				redirect('admin', 'location', 301);
			}
			else
			{
				echo "Pass o user mal";
				//redirect('admin/error', 'location', 301);
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