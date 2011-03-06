<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Decryptor extends CI_Controller {

	function __construct()
	{
		parent::__construct();	
	}

	function index()
	{
		$this->lang->load('decryptor');

		$data['head']			= $this->load->view('header', '', TRUE);
		$data['menu']			= $this->load->view('menu', '', TRUE);

		$data['foot']			= $this->load->view('foot', '', TRUE);
		$data['hidden']			= array('cmd' => '_s-xclick', 'hosted_button_id' => '8255830');

		$this->load->view('decryptor', $data);
	}
	
	function decrypt()
	{
		if (!$this->input->post('hash'))
		{
			redirect('/decryptor');
		}
		$this->lang->load('decryptor');
		$this->load->model('decrypt_m');

		$data['head']			= $this->load->view('header', '', TRUE);
		$data['menu']			= $this->load->view('menu_decryption', "", TRUE);

		$data['foot']			= $this->load->view('foot', '', TRUE);
		$data['hidden']			= array('cmd' => '_s-xclick', 'hosted_button_id' => '8255830');

		$hash					= $this->input->post('hash');
		$data['result']			= $this->decrypt_m->hash($hash);
		
		$this->load->view('decrypt', $data);
	}
}


/* End of file decryptor.php */
/* Location: ./application/controllers/decryptor.php */