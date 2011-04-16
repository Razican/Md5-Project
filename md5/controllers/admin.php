<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		if($this->uri->segment(3))
		{
			redirect('admin');
		}

		$this->lang->load('admin');
		$this->load->helper('admin');

		if((!$this->input->post('username')) OR (!$this->input->post('password')))
		{
			if($this->session->userdata('logged_in'))
			{

				$data['head']			= $this->load->view('header', '', TRUE);
				$data['menu']			= $this->load->view('admin/menu', '', TRUE);

				$data['foot']			= $this->load->view('admin/foot', '', TRUE);

				$data['hidden']			= array('cmd' => '_s-xclick', 'hosted_button_id' => '8255830');

				$this->load->view('admin/home', $data);
			}
			else
			{
				$data['head']			= $this->load->view('header', '', TRUE);
				$data['menu']			= $this->load->view('menu', '', TRUE);

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
				//redirect('admin/error', 'location', 302);
			}
		}
	}

	public function error()
	{
		echo "Ha ocurrido un error";
	}
}


/* End of file admin.php */
/* Location: ./application/controllers/admin.php */