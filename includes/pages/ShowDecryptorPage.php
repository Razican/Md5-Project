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
	$parse['size']		= "32"; //le diremos la longitud del hash
	$file = "index".$phpEx."?page=decryptor&"; // este es el archivo
	$parse['file'] = $file; // lo diremos que lo muestre
	$parse['ini']		= "de"; //unas iniciales
	if (!$_POST['md5']) //si no ha escrito ningún Md5
	{
		$parse['action']	= $lang['decrypt'];	//la acción será desencriptar
		$parse['input']		= $lang['md5_hash']; //ponemos el lenguaje del hash
		$parse['name']	= "md5"; //este es al {name} del template
		$title	=	$lang['titledecrypt']; //el titulo del documento será este otro
		$page	=	parsetemplate(gettemplate('program'), $parse); //le decimos como será la página web
		display($page); //le decimos que muestre la pagina web
	}
	else //Si no
	{
		$md5	=	$_POST['md5']; //recojemos el hash
		$parse['md5']	=	$md5; //le decimos que el hash que debe mostrar en el documento es el que ha recogido
		$title = $lang['decryptedtitle']; //Este el título
		$charsel = doquery("Select `characters` From {{table}} WHERE `md5` = '$md5';", "decryptor"); //seleccionamos las cadenas de caracteres
		$characters	= mysql_fetch_array($charsel); //sacamos las cadenas de caracteres
		$charsum = mysql_num_rows($charsel); // contamos las líneas de caracteres
		$length = strlen($md5); //miramos la longitud del string
		if((preg_match("([0-9a-fA-F]{32})",$md5) and ($length = 32))) //si no tiene 32 caracteres de largo
		{
			if ($charsum == 1) //si hay algún hash en la base de datos
			{
				foreach($characters as $char) //cada hash lo trataremos de la siguiente forma
				{
					$parse['characters'] = $char; //le decimos que lo muestre
				}
				$page	=	parsetemplate(gettemplate('results'), $parse); //elegimos el template
			}
			elseif ($charsum > 1) //si hay algún hash en la base de datos
			{
				$charsel2 = doquery("Select * From {{table}} WHERE `md5` = '$md5';", "decryptor", true); //cogemos el string
				$parse['characters'] = $charsel2['characters']; //le decimos que lo tiene que mostrar
				$charlist = parsetemplate(gettemplate('twomd5_table'), $parse); //le decimos que lo ponga en el template
				$ID = $charsel2['ID']; //le diremos que coja la ID de la tabla
				for ($i = $charsum; $i >= 1; $i--) //si la suma de strings es superior a uno, restamos uno
				{
					$charsel2 = doquery("Select * From {{table}} WHERE `md5` = '$md5' AND `ID` > '".$ID."';", "decryptor", true); //sacamos el string de la tabla
					$parse['characters'] = $charsel2['characters']; //lo cogemos en una variable
					$charlist .= parsetemplate(gettemplate('twomd5_table'), $parse); //lo mostramos
					$ID = $charsel2['ID']; //cogemos la nueva ID
				}
				$parse['charlist'] = $charlist; //hacemos la lista de strings
				$page = parsetemplate(gettemplate('twomd5'), $parse); //la mostramos
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
?>