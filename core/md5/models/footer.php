<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Footer extends Model{

	function Footer()
	{
		parent::Model();
	}
	
	function total_hashes()
	{
		$table			= $this->db->dbprefix('decryptor');
		$query			= $this->db->query('SELECT * FROM '.$table.';');
		$total_hashes	= $query->num_rows();
		
		return $total_hashes;
	}
	
	function copyright()
	{
		$link		= 'http://creativecommons.org/licenses/by-nc-nd/3.0/deed.'.$this->lang->lang();
		$img		= array (
		'src'	=> 'http://i.creativecommons.org/l/by-nc-nd/3.0/es/80x15.png',
		'style'	=> 'border-width:0',
		'alt'	=> 'Creative Commons License'
		);
		
		$copy_img	= img($img);
		$copyright	= anchor($link, $copy_img);
		
		return $copyright;
	}
}

/* End of file footer.php */
/* Location: ./system/application/models/footer.php */