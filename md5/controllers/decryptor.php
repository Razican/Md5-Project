<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Decryptor extends CI_Controller {

	public function index()
	{
		if($this->uri->segment(3))
		{
			redirect('decryptor');
		}

		$this->lang->load('decryptor');

		$data['head']			= $this->load->view('header', '', TRUE);
		$data['menu']			= $this->load->view('menu', '', TRUE);

		$data['foot']			= $this->load->view('foot', '', TRUE);
		$data['hidden']			= array('cmd' => '_s-xclick', 'hosted_button_id' => '8255830');

		$this->load->view('decryptor', $data);
	}
	
	public function decrypt()
	{
		if (!$this->input->post('hash'))
		{
			redirect('/decryptor');
		}
		$this->lang->load('decryptor');
		$this->load->model('decrypt_m');

		$data['head']			= $this->load->view('header', '', TRUE);
		$data['menu']			= $this->load->view('menu', "", TRUE);

		$data['foot']			= $this->load->view('foot', '', TRUE);
		$data['hidden']			= array('cmd' => '_s-xclick', 'hosted_button_id' => '8255830');

		$hash					= $this->input->post('hash');
		$data['result']			= $this->decrypt_m->hash($hash);
		
		$this->load->view('decrypt', $data);
	}
}


/* End of file decryptor.php */
/* Location: ./application/controllers/decryptor.php */