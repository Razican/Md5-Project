<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	$QryUpdateDB	= "ALTER TABLE ".$this->db->dbprefix('decryptor')." DROP PRIMARY KEY, ADD PRIMARY KEY(`ID`);"
	$QryUpdateDB	.= "ALTER TABLE ".$this->db->dbprefix('decryptor')." CHANGE `ID` `ID` BIGINT( 20 ) UNSIGNED NOT NULL AUTO_INCREMENT;"
	$QryUpdateDB	.= "ALTER TABLE ".$this->db->dbprefix('decryptor')." CHANGE `characters` `string` VARCHAR( 50 ) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL;"
	$QryUpdateDB	.= "ALTER TABLE ".$this->db->dbprefix('decryptor')." CHANGE `md5` `hash` CHAR( 32 ) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL;"
	$QryUpdateDB	.= "ALTER TABLE ".$this->db->dbprefix('decryptor')." ADD UNIQUE `UNIQUE` ( `ID` , `hash` ( 32 ) , `string` ( 50 ) );"
	$QryUpdateDB	.= "ALTER TABLE ".$this->db->dbprefix('decryptor')." ENGINE =  InnoDB DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci"
	$QryUpdateDB	.= "FLUSH TABLE ".$this->db->dbprefix('decryptor').";"
	$QryUpdateDB	.= "OPTIMIZE TABLE ".$this->db->dbprefix('decryptor').";"

	//Droping table
	$QryDropTable   = "DROP TABLE IF EXISTS ".$this->db->dbprefix('decryptor').";";

	//Table creation
	$QryTabledecryptor         = "CREATE TABLE IF NOT EXISTS ".$this->db->dbprefix('decryptor')." (";
	$QryTabledecryptor        .= "`ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,";
	$QryTabledecryptor        .= "`string` varchar(50) COLLATE latin1_spanish_ci NOT NULL,";
	$QryTabledecryptor        .= "`hash` char(32) COLLATE latin1_spanish_ci NOT NULL,";
	$QryTabledecryptor        .= "PRIMARY KEY (`ID`),";
	$QryTabledecryptor        .= "UNIQUE KEY `UNIQUE` (`ID`,`hash`,`string`)";
	$QryTabledecryptor        .= ") ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;";
	//Fin

	//actualización
	$QryUpdateTable	= "INSERT INTO ".$this->db->dbprefix('decryptor')." (`string`, `hash`) VALUES";
	$QryUpdateTable	.= "('pepe', '926e27eecdbc7a18858b3798ba99bddd'),";
	$QryUpdateTable	.= "('juan', 'a94652aa97c7211ba8954dd15a3cf838'),";
	$QryUpdateTable	.= "('carlos', 'dc599a9972fde3045dab59dbd1ae170b'),";
	$QryUpdateTable	.= "('boniato', '9edea89ac8ed7884999e6cb020b426d3'),";
	$QryUpdateTable	.= "('jupiter', '27a5148ea0fbddae22d902bea9a19531'),";
	$QryUpdateTable	.= "('superman', '84d961568a65073a3bcf0eb216b2a576'),";
	$QryUpdateTable	.= "('super', '1b3231655cebb7a1f783eddf27d254ca'),";
	$QryUpdateTable	.= "('yo', '6d0007e52f7afb7d5a0650b0ffb8a4d1'),";
	$QryUpdateTable	.= "('llop', '541583733855abf1479ea9fb9dede9fd'),";
	$QryUpdateTable	.= "('gogo', '1406f37190e825427440bc020919218a'),";
	$QryUpdateTable	.= "('favds', 'c13c9e5af1ea1a6d3e38bb0cc97eab02'),";
	$QryUpdateTable	.= "('Pedro', '38e2b2e31c0fce9537f735dda9fdf10a'),";
	$QryUpdateTable	.= "('KoSs', '18600b5273b77470bb58100bad764d6e'),";
	$QryUpdateTable	.= "('koss', '99ead7315b67b3160309f512046e3690'),";
	$QryUpdateTable	.= "('serc', '441932710d3be09db869820f52c4c6db'),";
	$QryUpdateTable	.= "('sg', '5dae429688af1c521ad87ac394192c6d'),";
	$QryUpdateTable	.= "('ads', '2deb000b57bfac9d72c14d4ed967b572'),";
	$QryUpdateTable	.= "('g', 'b2f5ff47436671b6e533d8dc3614845d'),";
	$QryUpdateTable	.= "('godwana', 'c4cf7d297739e6951bdc67d5135877b5'),";
	$QryUpdateTable	.= "('dsd5', '15e0a7232cc2375917779fa9dcbc8627'),";
	$QryUpdateTable	.= "('grvcb', '6ee8796f9955dbad47dc798e7d226a76'),";
	$QryUpdateTable	.= "('kk', 'dc468c70fb574ebd07287b38d0d0676d'),";
	$QryUpdateTable	.= "('encriptar', 'f969c5b9320c33912948824ec4553eea'),";
	$QryUpdateTable	.= "('wFASFASZ', '3177ea519839f67d700319e27b694444'),";
	$QryUpdateTable	.= "('md5', '1bc29b36f623ba82aaf6724fd3b16718'),";
	$QryUpdateTable	.= "('hg', '40fe9ad4949331a12f5f19b477133924'),";
	$QryUpdateTable	.= "('kjjkm', '024041d805c086e9b1bfd7d82d72b22f'),";
	$QryUpdateTable	.= "('gatorade', '55712537786b86a6856caeb5fdcd7684'),";
	$QryUpdateTable	.= "('ulJKB ASLIC', '8b904f6b919af2f32be5bad3e53d44d2'),";
	$QryUpdateTable	.= "('dsagfd', '16d7c8b26068855e8b42fb481a81762c'),";
	$QryUpdateTable	.= "('rtg', '1da33616e19f532fca9bf8e3c095d11d'),";
	$QryUpdateTable	.= "('dfde', '404d5969805e5acb4736b8acb734abbf'),";
	$QryUpdateTable	.= "('jffghf', 'c742a900bed006075799bedf2dcb8809'),";
	$QryUpdateTable	.= "('lol', '9cdfb439c7876e703e307864c9167a15');";
	//Fin
?>