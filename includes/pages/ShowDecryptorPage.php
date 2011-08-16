<?php
if (!defined('INSIDE'))
{
	die("Hacking Atempt");
}

	includeLang('lang'); //incluimos el lenguaje
	$parse = $lang; //le decimos que la variable $parse tambien es la variable $lang

	if (($sellang != "es") and ($sellang != "eu") and ($sellang != "en")) //en el caso de que lo que recibamos no sea una de estas tres
	{
		$parse['sellang'] = DEFAULT_LANG; // se mostrará el idioma por defecto
	}
	else //si no
	{
		$parse['sellang'] = $sellang; //lo que se mostrará será lo que recibamos
	}
	$parse['size']	= "32"; //le diremos la longitud del hash
	$file = "index.php?page=decryptor&"; // este es el archivo
	$parse['file']	= $file; // lo diremos que lo muestre
	$parse['ini']	= "de"; //unas iniciales
	$md5			= isset($_POST['md5']) ? $_POST['md5'] : FALSE; //recojemos el hash
	if ($md5) //si ha escrito algún hash
	{
		$parse['md5']	=	$md5; //le decimos que el hash que debe mostrar en el documento es el que ha recogido
		$title = $lang['decryptedtitle']; //Este el título
		$charsel = doquery("Select `characters` From {{table}} WHERE `md5` = '$md5' limit 1;", "decryptor"); //seleccionamos las cadenas de caracteres
		$characters	= mysql_fetch_array($charsel); //sacamos las cadenas de caracteres
		$charsum = mysql_num_rows($charsel); // contamos las líneas de caracteres
		$length = strlen($md5); //miramos la longitud del string
		if((preg_match("([0-9a-fA-F]{32})",$md5) and ($length = 32))) //si tiene 32 caracteres de largo
		{
			if ($charsum === 1) //si hay algún hash en la base de datos
			{
				foreach($characters as $char) //cada hash lo trataremos de la siguiente forma
				{
					$parse['characters'] = $char; //le decimos que lo muestre
				}
				$page	=	parsetemplate(gettemplate('results'), $parse); //elegimos el template
			}
			else
			{
				$page	=	parsetemplate(gettemplate('nondecrypted'), $parse); //le decimos que no hemos encontrado nada
			}
		}
		else //si no
		{
			$page	=	parsetemplate(gettemplate('nomd5'), $parse); //le diremos que no es un md5
		}
	}
	else //Si no
	{
		$parse['action']	= $lang['decrypt'];	//la acción será desencriptar
		$parse['input']		= $lang['md5_hash']; //ponemos el lenguaje del hash
		$parse['name']		= "md5"; //este es al {name} del template
		$title				= $lang['titledecrypt']; //el titulo del documento será este otro
		$page				= parsetemplate(gettemplate('program'), $parse); //le decimos como será la página web
	}
