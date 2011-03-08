<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Encryptor extends CI_Controller {

	function __construct()
	{
		parent::__construct();	
	}

	function index()
	{
		$this->lang->load('encryptor');		

		$data['head'] = $this->load->view('header', '', TRUE);
		$data['menu'] = $this->load->view('menu', '', TRUE);

		$data['foot'] = $this->load->view('foot', '', TRUE);
		$data['hidden']			= array('cmd' => '_s-xclick', 'hosted_button_id' => '8255830');

		$this->load->view('encryptor', $data);
	}
	
	function encrypt()
	{
		if (!$this->input->post('string'))
		{
			redirect('/encryptor');
		}
		$this->lang->load('encryptor');
		$this->load->model('encrypt_m');
		
		$data['head']			= $this->load->view('header', '', TRUE);
		$data['menu']			= $this->load->view('menu', "", TRUE);
		$data['hidden']			= array('cmd' => '_s-xclick', 'hosted_button_id' => '8255830');
		$data['string']			= $this->input->post('string');
		$data['hash']			= $this->encrypt_m->str($this->input->post('string'));

		$data['foot']			= $this->load->view('foot', '', TRUE);

		$this->load->view('encrypt', $data);
	}
}


/* End of file encryptor.php */
/* Location: ./application/controllers/encryptor.php */