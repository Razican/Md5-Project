<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends Controller {

	function Contact()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$this->lang->load('contact');
		$this->load->helper(array('contact', 'inflector'));

		$head['page']			= 'contact';

		$data['head']			= $this->load->view('header', $head, TRUE);
		$data['menu']			= $this->load->view('menu', "", TRUE);

		$foot['total_hashes']	= $this->footer->total_hashes();
		$foot['copyright']		= $this->footer->copyright();

		$data['foot']			= $this->load->view('foot', $foot, TRUE);
		$data['hidden']			= array('cmd' => '_s-xclick', 'hosted_button_id' => '8255830');
		
		$data['contact_table']	= contact_table();
		$this->load->view('contact', $data);
	}
	
}

/* End of file contact.php */
/* Location: ./system/application/controllers/contact.php */