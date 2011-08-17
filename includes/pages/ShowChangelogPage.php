<?php
if(!defined("INSIDE")){ die("Intento de Hackeo"); } //si alguien intenta acceder desde fuera te dice que has intentado hackear el programa

	includeLang('changelog'); //incluimos el lenguaje del changelog
	$parse = $lang; //le decimos que la variable $parse tambien es la variable $lang

	if (($sellang != "es") and ($sellang != "eu") and ($sellang != "en")) //en el caso de que lo que recibamos no sea una de estas tres
	{
		$parse['sellang'] = DEFAULT_LANG; // se mostrará el idioma por defecto
	}
	else //si no
	{
		$parse['sellang'] = $sellang; //lo que se mostrará será el idioma que recibamos
	}
	$body	= ""; //definimos $body
	foreach($lang['changelog'] as $number => $text) //le explicamos como tieneque tratar el array del changelog
	{
		$parse['version_number'] = $number; //las versiones serán $number
		if (strnatcmp(phpversion(),'5.3.0') >= 0)	//las características de las versiones serán $text
			$parse['description'] = nl2br($text, FALSE);
		else
			$parse['description'] = nl2br($text);

		$body .= parsetemplate(gettemplate('changelog_table'), $parse); //le decimos que por cada versión actualice el template
	}
	$parse['table'] = "<table width=\"603\" style=\"border: 1px solid #000000;\" cellspacing=\"0\"><tr>
	<td height=\"25\" align=\"center\" valign=\"middle\" bgcolor=\"#FF3300\" style=\"border: 1px solid #000000;\"><font color=\"black\">". $lang['Version']."</font></td>
	<td height=\"25\" align=\"center\" valign=\"middle\" bgcolor=\"#FF3300\" style=\"border: 1px solid #000000;\"><font color=\"black\">".$lang['Description']."</font></td></tr>".$body."</table>"; //le decimos que lo que tiene que mostrar en la zona de body es lo que hemos construido con el foreach
	$file	= "index.php?page=changelog&"; //le decimos cual es el archivo
	$title	= $lang['changelogtitle']; //Este será el título
	$page	= parsetemplate(gettemplate('contchan'), $parse); //esta será la página
