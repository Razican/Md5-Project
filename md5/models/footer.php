<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Footer extends CI_Model {

	public function total_hashes()
	{
		return $this->db->count_all('decryptor');
	}
}


/* End of file footer.php */
/* Location: ./application/models/footer.php */