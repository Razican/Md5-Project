<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Install extends Controller {

	function Install()
	{
		parent::Controller();	
	}

	function index()
	{
/*		if (file_exists(APPPATH ."config/custom".EXT))
		{
			die("<html><head><title>Error!</title></head><body><p><h2><b>Por favor, elimina los siguientes archivos y carpetas:</b></h2><br /><div style=\"color: red;\">". APPPATH ."language/basque/install<br />". APPPATH ."language/english/install<br />". APPPATH ."language/spanish/install<br />". APPPATH ."controllers/install.php<br />". APPPATH ."includes/install/<br />". APPPATH ."views/install/</div></p>Por razones de seguridad, es obligatorio eliminarlos, gracias.</body></html>");
		}
*/
		exit(header('location: install/intro'));
	}

	function intro()
	{
		define('INSTALL', TRUE);
		$this->lang->load('install/lang');
		$this->load->view('intro');
	}

	function ins1($error = NULL)
	{
		define('INSTALL', TRUE);
		$this->lang->load('install/lang');

		$data['head']		= $this->load->view('install/header', "", TRUE);
		$data['menu']		= $this->load->view('install/menu', "", TRUE);

		$data['error']		= ($error == 1) OR ($error == 2) OR ($error == 3) OR ($error == 4) ? lang('install.error'.$error) : NULL;

		$data['foot']		= $this->load->view('install/footer', "", TRUE);
		$this->load->view('ins1', $data);
	}

	function ins2()
	{
		define('INSTALL', TRUE);
		$this->lang->load('install/lang');

		$data['head']		= $this->load->view('install/header', "", TRUE);
		$data['menu']		= $this->load->view('install/menu', "", TRUE);

		if ((!$this->input->post('adm_user'))		OR
			($this->input->post('adm_user') == "")	OR
			(!$this->input->post('host'))			OR
			($this->input->post('host') == "")		OR
			(!$this->input->post('db_user'))		OR
			($this->input->post('db_user') == "")	OR
			(!$this->input->post('prefix'))			OR
			($this->input->post('prefix') == "")	OR
			(!$this->input->post('db'))				OR
			($this->input->post('db') == ""))
		{
				
			exit(header("Location: install/ins1/4"));
		}

		$host		= $this->input->post('host');
		$db_user	= $this->input->post('db_user');
		$db_pass	= $this->input->post('db_password');
		$adm_user	= $this->input->post('adm_user');
		$adm_pass	= $this->encrypt->sha1($this->input->post('adm_password'));
		$prefix		= $this->input->post('prefix');
		$db			= $this->input->post('db');
		
		$connection = @mysql_connect($host, $user, $pass);
		if (!$connection)
		{
			exit(header("Location: install/ins1/1"));
		}
		$dbselect = @mysql_select_db($db);
		if (!$dbselect)
		{
			exit(header("Location: install/ins1/2"));
		}

		$config_data		= '<?php if ( ! defined(\'BASEPATH\')) exit(\'No direct script access allowed\');\n\n';
		$config_data		.= 'if (defined(\'IN_ADMIN\'))\n';
		$config_data		.= '{\n	$config[\'languaje\']		= '. $this->config->item('languaje') .';\n};';
		$config_data		.= '$config[\'skin\']				= "Md52";\n';
		$config_data		.= '$config[\'version\']			= 2.0;\n\n';
		$config_data		.= '$config[\'cookie_domain\']		= "'. $this->input->server('SERVER_NAME') .'";\n\n';
		$config_data		.= '$config[\'admin_username\']		= "'. $adm_user .'";\n';
		$config_data		.= '$config[\'admin_password\']		= "'. $adm_pass .'";\n\n';
		$config_data		.= '/* End of file custom.php */\n/* Location: ./system/application/config/custom.php */';

		$db_data			= '<?php  if ( ! defined(\'BASEPATH\')) exit(\'No direct script access allowed\');\n\n';
		$db_data			.= '$active_group = "default";\n';
		$db_data			.= '$active_record = TRUE;\n\n';
		$db_data			.= '$db[\'default\'][\'hostname\'] = "'. $host .'";\n';
		$db_data			.= '$db[\'default\'][\'username\'] = "'. $db_user .'";\n';
		$db_data			.= '$db[\'default\'][\'password\'] = "'. $db_pass .'";\n';
		$db_data			.= '$db[\'default\'][\'database\'] = "'. $db .'";\n';
		$db_data			.= '$db[\'default\'][\'dbdriver\'] = "mysql";\n';
		$db_data			.= '$db[\'default\'][\'dbprefix\'] = "'. $prefix .'";\n';
		$db_data			.= '$db[\'default\'][\'pconnect\'] = TRUE;\n';
		$db_data			.= '$db[\'default\'][\'db_debug\'] = FALSE;\n';
		$db_data			.= '$db[\'default\'][\'cache_on\'] = FALSE;\n';
		$db_data			.= '$db[\'default\'][\'cachedir\'] = "";\n';
		$db_data			.= '$db[\'default\'][\'char_set\'] = "utf8";\n';
		$db_data			.= '$db[\'default\'][\'dbcollat\'] = "utf8_spanish_ci";\n\n';
		$db_data			.= '/* End of file database.php */\n/* Location: ./system/application/config/database.php */';

		if (( ! write_file(APPPATH .'config/custom'.EXT, $config_data)) OR ( ! write_file(APPPATH .'config/database'.EXT, $db_data)))
		{
			exit(header("Location: install/ins1/3"));
		}

		require_once(APPPATH .'includes/install/database'.EXT);
		$this->db->query($QryDropTable);
		$this->db->query($QryTabledecryptor);
		$this->db->query($QryUpdateTable);

		$data['foot']		= $this->load->view('install/footer', "", TRUE);
		$this->load->view('ins2', $data);
	}
}

/* End of file install.php */
/* Location: ./application/controllers/install.php */