<?php
if (!defined('INSIDE'))
{
	die("Hacking Atempt");
}

$parse = isset($lang) ? $lang : ""; //Le decimos que $parse tambien será $lang
function display ($page, $foot = true, $menu = true) //Definimos la funcion
{
	global $link, $sellang, $title, $root_path; //estas serán variables globales

	$DisplayPage ="<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01//EN\" \"http://www.w3.org/TR/html4/strict.dtd\">
	<html>
	<head>
		<meta content=\"text/html; charset=utf-8\" http-equiv=\"Content-Type\">
		<title>". $title ."</title>
		<link rel=\"stylesheet\" type=\"text/css\" href=\"".$root_path."styles/css/formate.css\">
		<link rel=\"shortcut icon\" href=\"".$root_path."favicon.ico\">
	</head>
	<body img background=".$root_path."styles/images/background.png><center><br>"; //La primera parte de la pagina
	if ($menu) //Si queremos el menú
	{
		$DisplayPage .= ShowMenu (); //mostramos el menú
	}
	$DisplayPage .= $page ."\n</center>\n"; // el body de la pagina
	if ($foot) //si queremos el footer
	{
		$DisplayPage .= ShowFoot (); //ponemos el footer
	}
	if ($link) //en el caso de que haya una conexión a la base de datos abierta
	{
		mysql_close($link); //cerramos la conexión
	}
	echo $DisplayPage; //muestra la pagina
	die(); //Si hay un error no mostrará nada
}
function ReadFromFile($filename) //definimos la funcion
{
	$content = @file_get_contents ($filename); //cogemos el contenido del archivo
	return $content; //retornamos el contenido del archivo
}
function gettemplate ($templatename) //definición de la función
{
	global $tplEx, $root_path; //variables globales

	$filename = $root_path. TEMPLATE_DIR .'/'. $templatename.$tplEx; //definimos el archivo
	return ReadFromFile($filename); //retornamos el template
}
function parsetemplate ($template, $array) //definimos la función
{
	global $var1, $var2, $phpEx; //ponemos las variables globales
	
	return preg_replace('#\{([a-z0-9\-_]*?)\}#Ssie', '( ( isset($array[\'\1\']) ) ? $array[\'\1\'] : \'\' );', $template); //Retornamos el texto
}
function includeLang ($filename) //definimos la funcion
{
	global $lang, $langEx, $sellang, $root_path; //las globales

if (($sellang != "es") and ($sellang != "eu") and ($sellang != "en")) //en el caso de que lo que recibamos no sea una de estas tres
{
	$SelLanguage = DEFAULT_LANG; // se mostrará el idioma por defecto
}
else //si no
{
	$SelLanguage = $sellang; //lo que se mostrará será lo que recibamos
}
	include ($root_path."language/". $SelLanguage ."/". $filename.$langEx); //incluimos el archivo de lenguaje
}
function ShowMenu () //definimos la funcion
{
	global $sellang, $lang, $parse, $file, $file2, $error; //variables globales

	includeLang('menu'); //incluimos el lenguaje
	$parse = $lang; //$parse será $lang
	if (!defined("INSTALL")) //si no está definido INSTALL
	{
		$Template = "menu"; //el template será 'menu'
	}
	else // si está definido
	{
		$Template = "install/menu"; //será el de la instalación
		$parse['error'] = $error; //y mostrará los errores
	}
	$parse['version'] = VERSION; // esta será la versión
	$parse['sellang'] = $sellang; //mostramos el lenguaje
	$parse['file'] = $file; //mostramos el archivo
	$menu = parsetemplate(gettemplate($Template), $parse); //Le decimos cual será el menu
	return $menu; //le decimos que devuelva el menu
}
function ShowFoot ($Template = 'foot') //definimos la funcion
{
	global $sellang, $lang, $parse; //variables globales

	includeLang('footer'); //incluimos el lenguaje
	$parse = $lang; //$parse será $lang
	$tablesel = doquery("SELECT * FROM {{table}};", "decryptor"); //seleccionamos todas las entradas de la base de datos
	$tablerows = mysql_num_rows($tablesel); //contamos las líneas
	$parse['tablerows'] = $tablerows; //le explicamos que lo debe mostrar
	$foot = parsetemplate(gettemplate($Template), $parse); //Le decimos cual será e footer
	return $foot; //le decimos que devuelva el footer
}
function doquery($query, $table, $fetch = false) //Definimos a función
{
	global $link, $debug, $root_path; //variables globales
	require($root_path.'config.php'); //incluimos la configuración
	if(!$link) //si no hay una conexión establecida
	{
		$link = mysql_connect($dbsettings["server"],
		$dbsettings["user"],
		$dbsettings["pass"]) or die ("SQL Error (server doqueryion problem)"); //nos conectamos

		mysql_select_db($dbsettings["name"]) or die("SQL Error 2 (database selection problem)"); //seleccionamos la base de datos
	}
	$sql = str_replace("{{table}}", $dbsettings['prefix'].$table, $query); //construimos la query
	$sqlquery = mysql_query($sql) or die("SQL Error 3 (query problem)".$sql); //hacemos la query
	unset($dbsettings);
	if($fetch) //si hemos pedido un fetch_array
	{
		$sqlrow = mysql_fetch_array($sqlquery); //hacemos un fetch_array
		return $sqlrow; //retornamos el resultado del fetch array
	}
	else //si no
	{
		return $sqlquery; //retornamos la conulta
	}
}
?>