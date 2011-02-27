<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Controller {

	function Home()
	{
		parent::Controller();	
	}
	
	function index()
	{
/*		if (file_exists(APPPATH ."controllers/install.php"))
		{
			if (!$this->config->item('version'))
			{
				exit(header('location: install'));
			}
			else
			{
				die("<html><head><title>Error!</title></head><body><p><h2><b>Por favor, elimina los siguientes archivos y carpetas:</b></h2><br /><div style=\"color: red;\">". APPPATH ."language/basque/install<br />". APPPATH ."language/english/install<br />". APPPATH ."language/spanish/install<br />". APPPATH ."controllers/install.php<br />". APPPATH ."includes/install/<br />". APPPATH ."views/install/</div></p>Por razones de seguridad, es obligatorio eliminarlos, gracias.</body></html>");
			}
		}
*/
		$this->lang->load('home');		

		$data['head']			= $this->load->view('header', '', TRUE);
		$data['menu']			= $this->load->view('menu', '', TRUE);

		$data['foot']			= $this->load->view('foot', '', TRUE);
		$data['hidden']			= array('cmd' => '_s-xclick', 'hosted_button_id' => '8255830');

		$this->load->view('home', $data);
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */