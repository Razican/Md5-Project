<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Decrypt extends Model{

	function Decrypt()
	{
		parent::Model();
	}
	
	function hash($hash)
	{
		if (preg_match("([0-9a-fA-F]{32})",$hash) and (strlen($hash) === 32))
		{
			$hash		= $hash;

			$table			= $this->db->dbprefix('decryptor');
			$query			= $this->db->query("SELECT * FROM $table WHERE `hash` = '$hash';");

			if ($query->num_rows() === 1)
			{
				$row			= $query->row_array();
				$data['hash']	= $hash;
				$data['string']	= $row['string'];
				$result			= $this->load->view('decryption_result', $data, TRUE);
			}
			else
			{
				$data['hash']		= $hash;
				$result				= $this->load->view('not_decrypted', $data, TRUE);
			}
		}
		else
		{
			$data['hash']	= $hash;
			$result			= $this ->load->view('no_hash', $data, TRUE);
		}
		return $result;
	}
}

/* End of file decrypt.php */
/* Location: ./system/application/models/decrypt.php */