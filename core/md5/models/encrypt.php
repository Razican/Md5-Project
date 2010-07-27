<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Encrypt extends Model{

	function Encrypt()
	{
		parent::Model();
	}
	
	function str($str)
	{
		$table			= $this->db->dbprefix('decryptor');
		$hash			= dohash($str, 'md5');
		$query			= $this->db->query("SELECT * FROM $table WHERE `hash` = '$hash';");
		if ($query->num_rows() === 0)
		{
			$string		= fix_str($str);
			$this->db->query("INSERT INTO $table (string,hash) values ('$string','$hash');");
		}
		return $hash;
	}
}

/* End of file encrypt.php */
/* Location: ./system/application/models/encrypt.php */