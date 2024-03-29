<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Md5_Controller {

	public function index()
	{
		if($this->uri->segment(3))
		{
			redirect('admin');
		}

		$this->lang->load('admin');
		$this->load->helper('admin');
		$this->load->library('admlib');

		if((!$this->input->post('username')) OR (!$this->input->post('password')))
		{
			if($this->session->userdata('logged_in'))
			{

				$data['head']			= $this->load->view('header', '', TRUE);
				$data['menu']			= $this->load->view('admin/menu', '', TRUE);
				$data['alerts']			= $this->admlib->get_alerts();
				$data['settings']		= array(
											'skin'			=> $this->config->item('skin'),
											'admin-link'	=> lang('admin.link_'.$this->config->item('admin-link')),
											'debug'			=> lang('admin.debug_'.$this->config->item('debug')));

				$data['foot']			= $this->load->view('admin/foot', '', TRUE);

				$data['hidden']			= array('cmd' => '_s-xclick', 'hosted_button_id' => '8255830');

				$this->load->view('admin/home', $data);
			}
			else
			{
				$data['head']			= $this->load->view('header', '', TRUE);
				$data['menu']			= $this->load->view('menu', '', TRUE);
				$data['hidden']			= array('cmd' => '_s-xclick', 'hosted_button_id' => '8255830');
				$data['foot']			= $this->load->view('admin/foot', '', TRUE);

				$this->load->view('admin/login', $data);
			}
		}
		else
		{

			if (($this->config->item('admin_password') == sha1($this->input->post('password', TRUE))) && ($this->input->post('username', TRUE) === $this->config->item('admin_username')))
			{
				if (!$this->input->post('remember'))
				{
					$this->config->set_item('sess_expire_on_close', TRUE);
				}
				$userdata	= array(
					'logged_in' => TRUE
					);

				$this->session->set_userdata($userdata);

				redirect('admin', 'location', 302);
			}
			else
			{
				echo "Pass o user mal";
				//Guardar en flashdata el error
				//redirect('admin/error', 'location', 302);
			}
		}
	}

	public function logout()
	{
		if($this->session->userdata('logged_in'))
		{
			$this->session->sess_destroy();
		}
		else
		{
			log_message('error', 'User with IP '.$this->input->ip_address().' has tried to enter /admin/logout without loggin in.');
		}
		redirect('/');
	}

	public function error()
	{
		echo "Ha ocurrido un error";
	}
}


/* End of file admin.php */
/* Location: ./application/controllers/admin.php */