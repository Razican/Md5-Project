<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Decrypt_m extends CI_Model {

	public function hash($hash)
	{
		$data['hash']	= $hash;

		if (preg_match("([0-9a-fA-F]{32})",$hash) and (strlen($hash) === 32))
		{
			$table			= $this->db->dbprefix('decryptor');
			$query			= $this->db->get_where($this->db->dbprefix('decryptor'), array('hash' => $hash), '1');

			if ($query->num_rows() === 1)
			{
				$row			= $query->row();
				$data['string']	= $row->string;
				$result			= $this->load->view('decryption_result', $data, TRUE);
			}
			else
			{
				$result				= $this->load->view('not_decrypted', $data, TRUE);
			}
		}
		else
		{
			$result			= $this ->load->view('no_hash', $data, TRUE);
		}
		return $result;
	}
}


/* End of file decrypt.php */
/* Location: ./application/models/decrypt.php */