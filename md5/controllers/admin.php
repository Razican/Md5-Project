<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();	
	}

	function index()
	{
		$this->lang->load('admin');
		$this->load->helper(array('cookie', 'admin'));
		$this->load->library('encrypt');

		if((!$this->input->post('username')) OR (!$this->input->post('password')))
		{			
			$data['head']			= $this->load->view('header', '', TRUE);
			$data['menu']			= $this->load->view('menu', '', TRUE);

			$data['foot']			= $this->load->view('foot', '', TRUE);

			$this->load->view('login', $data);
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
/* Location: ./application/controllers/admin.php */