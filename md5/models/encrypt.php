<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Encrypt extends CI_Model{

	function Encrypt()
	{
		parent::CI_Model();
	}
	
	function str($str)
	{
		$hash		= do_hash($str, 'md5');
		$query		= $this->db->get_where($this->db->dbprefix('decryptor'), array('md5' => $hash), '1');
		if ($query->num_rows() === 0)
		{
			$this->db->insert($this->db->dbprefix('decryptor'), array('characters' => $str,'md5' => $hash)); 
		}
		return $hash;
	}
}

/* End of file encrypt.php */
/* Location: ./system/application/models/encrypt.php */