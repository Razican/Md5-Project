<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Changelog extends Controller {

	function Changelog()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$this->lang->load('changelog');
		$this->load->helper('changelog');

		$data['head']				= $this->load->view('header', '', TRUE);
		$data['menu']				= $this->load->view('menu', '', TRUE);

		$data['foot']				= $this->load->view('foot', '', TRUE);
		$data['hidden']				= array('cmd' => '_s-xclick', 'hosted_button_id' => '8255830');
		
		$data['changelog_table']	= changelog_table();
		$this->load->view('changelog', $data);
	}
	
}

/* End of file contact.php */
/* Location: ./application/controllers/contact.php */