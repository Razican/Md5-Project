<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Encrypt_m extends CI_Model {

	public function str($str)
	{
		$hash		= do_hash($str, 'md5');
		$query		= $this->db->get_where($this->db->dbprefix('decryptor'), array('hash' => $hash), '1');
		if ($query->num_rows() === 0)
		{
			$this->db->insert($this->db->dbprefix('decryptor'), array('string' => $str,'hash' => $hash));
		}
		return $hash;
	}
}


/* End of file encrypt.php */
/* Location: ./application/models/encrypt.php */