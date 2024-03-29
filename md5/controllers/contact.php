<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends Md5_Controller {

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

		$this->load->view('contact', $data);
	}

}


/* End of file contact.php */
/* Location: ./application/controllers/contact.php */