<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Encryptor extends Controller {

	function Encryptor()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$this->lang->load('encryptor');

		$head['page'] = 'encryptor';

		$data['head'] = $this->load->view('header', $head, TRUE);
		$data['menu'] = $this->load->view('menu', "", TRUE);

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
		$this->load->model('encrypt');

		$head['page']			= 'encryptor';
		$data['head']			= $this->load->view('header', $head, TRUE);
		$data['menu']			= $this->load->view('menu_encryption', "", TRUE);
		$data['hidden']			= array('cmd' => '_s-xclick', 'hosted_button_id' => '8255830');
		$data['string']			= $this->input->post('string');
		$data['hash']			= $this->encrypt->str($this->input->post('string'));

		$data['foot']			= $this->load->view('foot', '', TRUE);

		$this->load->view('encrypt', $data);
	}
}

/* End of file encryptor.php */
/* Location: ./system/application/controllers/encryptor.php */