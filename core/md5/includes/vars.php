<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$staff1 = array (
	array ("rank"=>"admin", "email"=>"admin@razican.com", "nick"=>"Razican", "prog"=>1, "transl"=>1, "design"=>1),
	array ("rank"=>"contrib", "email"=>"N/A", "nick"=>"lechiguero", "prog"=>1, "transl"=>0, "design"=>0),
	array ("rank"=>"contrib", "email"=>"cds-emmet@hotmail.com", "nick"=>"Emmet", "prog"=>0, "transl"=>1, "design"=>0)
);

require_once(APPPATH .'/includes/other_vars'.EXT);

$staff = array_merge($staff1, $staff2);

/* End of file vars.php */
/* Location: ./system/application/includes/vars.php */