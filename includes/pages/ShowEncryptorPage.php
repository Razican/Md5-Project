<?php
if (!defined('INSIDE'))
{
	die("Hacking Atempt");
}

	includeLang('lang'); //incluimos el archivo de lenguaje
	$parse = $lang; //le decimos que la variable $parse tambien es la variable $lang

	if (($sellang != "es") and ($sellang != "eu") and ($sellang != "en")) //en el caso de que lo que recibamos no sea una de estas tres
	{
		$parse['sellang'] = DEFAULT_LANG; // se mostrará el idioma por defecto
	}
	else //si no
	{
		$parse['sellang'] = $sellang; //lo que se mostrará será lo que recibamos
	}
	$parse['size']		= "50"; //el tamaño del string será como máximo así de largo
	$parse['action']	= $lang['encrypt']; //la acción será encriptar
	$parse['input']		= $lang['word']; //le decimos que string del lenguaje cojer
	$file				= "index.php?page=encryptor&"; //este será el archivo
	$parse['file']		= $file; //le decimos que muestre el archivo
	$parse['ini']		= "en"; //unas iniciales
	$characters			= isset($_POST['characters']) ? $_POST['characters'] : FALSE;  //recojemos la cadena
	if ($characters) //si ha escrito algúna cadena
	{
		$characters	= $_POST['characters']; //le decimos que la variable $characters será la que reciba por el protocolo post
		$md5	= md5($characters); //la variable md5 será la variable characters convertida a md5
		$md5sel	= doquery("Select `md5` From {{table}} WHERE `md5` = '$md5' limit 1;", 'decryptor'); //le pedimos que seleccione todos los hashes que sean iguales al que ha pedido
		$md5sum	= mysql_num_rows($md5sel); //le pedimos que cuente cuantos hashes iguales hay
		if (($md5sum === 0)) //en caso en el que no haya md5 iguales
		{
			doquery("INSERT into {{table}} (characters,md5) values ('$characters','$md5')", "decryptor"); //mete los valores en la base de datos
		}
		$parse['md5']	=	$md5; //lo que muestre como md5 será el hash en cuestión
		$parse['characters']	=	$characters; //el string será el que ponga
		$title	=	$lang['encryptedtitle']; //este será el titulo
		$page	=	parsetemplate(gettemplate('results'), $parse); //elegimos el template
	}
	else //si no
	{
		$parse['name']	= "characters"; //le decimos como será el {name}
		$title	=	$lang['titleencrypt']; //este será el título
		$page	=	parsetemplate(gettemplate('program'), $parse); //esta será la página
	}
