<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function index()
	{
		if($this->uri->segment(3))
		{
			redirect('contact');
		}

		$this->lang->load('contact');
		$this->load->helper(array('contact', 'inflector'));

		$data['head']			= $this->load->view('header', '', TRUE);
		$data['menu']			= $this->load->view('menu', '', TRUE);

		$data['foot']			= $this->load->view('foot', '', TRUE);
		$data['hidden']			= array('cmd' => '_s-xclick', 'hosted_button_id' => '8255830');
		
		$data['contact_table']	= contact_table();
		$this->load->view('contact', $data);
	}
	
}


/* End of file contact.php */
/* Location: ./application/controllers/contact.php */