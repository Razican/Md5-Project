<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Changelog extends CI_Controller {

	public function index()
	{
		if($this->uri->segment(3))
		{
			redirect('changelog');
		}

		$this->lang->load('changelog');
		$this->load->helper('changelog');

		$data['head']				= $this->load->view('header', '', TRUE);
		$data['menu']				= $this->load->view('menu', '', TRUE);

		$data['foot']				= $this->load->view('foot', '', TRUE);

		$this->load->view('changelog', $data);
	}
}


/* End of file changelog.php */
/* Location: ./application/controllers/changelog.php */