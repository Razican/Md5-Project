<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Footer extends CI_Model {

	function __construct()
	{
		parent::__construct();	
	}

	function total_hashes()
	{		
		$query			= $this->db->get($this->db->dbprefix('decryptor'));
		$total_hashes	= $query->num_rows();

		return $total_hashes;
	}
}


/* End of file footer.php */
/* Location: ./application/models/footer.php */