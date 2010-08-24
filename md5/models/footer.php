<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Footer extends CI_Model{

	function Footer()
	{
		parent::CI_Model();
	}
	
	function total_hashes()
	{
		if (!defined('INSTALL'))
		{
			$query			= $this->db->get($this->db->dbprefix('decryptor'));
			$total_hashes	= $query->num_rows();
			
			return $total_hashes;
		}
	}
}

/* End of file footer.php */
/* Location: ./system/application/models/footer.php */