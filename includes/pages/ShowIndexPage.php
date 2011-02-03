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
	$file	= "index".$phpEx."?"; //definimos el archivo
	$parse['file'] = $file; //le decimos que lo muestre
	$title	=	$lang['indextitle']; //este será el título
	$page	=	parsetemplate(gettemplate('index'), $parse); //construimos la página
?>