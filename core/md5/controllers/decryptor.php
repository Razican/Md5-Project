<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Decryptor extends Controller {

	function Decryptor()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$this->lang->load('decryptor');

		$head['page']			= 'decryptor';

		$data['head']			= $this->load->view('header', $head, TRUE);
		$data['menu']			= $this->load->view('menu', "", TRUE);

		$foot['total_hashes']	= $this->footer->total_hashes();
		$foot['copyright']		= $this->footer->copyright();

		$data['foot']			= $this->load->view('foot', $foot, TRUE);
		$data['hidden']			= array('cmd' => '_s-xclick', 'hosted_button_id' => '8255830');

		$this->load->view('decryptor', $data);
	}
	
	function decrypt()
	{
		$this->lang->load('decryptor');
		$this->load->model('decrypt');

		$head['page']			= 'decryptor';

		$data['head']			= $this->load->view('header', $head, TRUE);
		$data['menu']			= $this->load->view('menu_decryption', "", TRUE);

		$foot['total_hashes']	= $this->footer->total_hashes();
		$foot['copyright']		= $this->footer->copyright();

		$data['foot']			= $this->load->view('foot', $foot, TRUE);
		$data['hidden']			= array('cmd' => '_s-xclick', 'hosted_button_id' => '8255830');

		$hash					= $this->input->post('hash');
		$data['result']			= $this->decrypt->hash($hash);
		
		$this->load->view('decrypt', $data);
	}
}

/* End of file decryptor.php */
/* Location: ./system/application/controllers/decryptor.php */