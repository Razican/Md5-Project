<?php
ini_set('display_errors', 0);
error_reporting(0);

if ((filesize('config.php') === 0) OR (file_exists('install/update.php'))) //si el config.php no está escrito
{
	exit(header('location: install'));//te lleva a la instalación
}
elseif (file_exists('install')) //si existe el directorio de instalación
{
	function delete_install()
	{
		if (strnatcmp(phpversion(),'5.0.4') >= 0)
		{
			$files = scandir('install');
			foreach ($files as $file){ if ( ! @unlink($file)){ return FALSE; }}
			return rmdir('install');
		}
	}

	if ( ! delete_install()) //y no se puede borrar
		echo"<h2><b>Por favor, elimina la carpeta install</b></h2><br>
		Por razones de seguridad, es obligatorio eliminarla, gracias."; //te dice esto
}
elseif ((is_writable("config.php")) && ( ! @chmod("config.php", 0777))) //si puede escribir el archivo de configuración
{
	echo"<h2><b>Por favor, cambia el CHMOD del archivo config.php a CHMOD 444</b></h2><br>
	Por razones de seguridad, es obligatorio, gracias."; //te dice esto
}
else
{ //si no hay ningún contratiempo

	define('INSIDE'  , TRUE); //definimos inside como true

	include('config.php'); //incluimos las extensiones
	include('common.php'); //incluimos los parametros comunes
	$sellang = isset($_GET['lang']) ? $_GET['lang'] : ""; //La variable $sellang será la información que recivamos con el get lang
	$parse['version'] = VERSION; // esta será la versión
	$Page = isset($_GET['page']) ? $_GET['page'] : ""; //le decimos cual será la página
	switch($Page) //creamos el switch
	{
// -------------------------------------------------------------------------------------------------//
		case 'decryptor': //si quiere entrar en el desencriptador
			include_once('includes/pages/ShowDecryptorPage.php'); //incluimos el controlador del desencriptador
		break;
// -------------------------------------------------------------------------------------------------//
		case 'encryptor': //si quiere entrar en el encriptador
			include_once('includes/pages/ShowEncryptorPage.php'); //incluimos el controlador del encriptador
		break;
// -------------------------------------------------------------------------------------------------//
		case 'contact'; //si quiere entrar en la página de contacto
			require_once('includes/vars.php'); //incluimos las variables de los contactos
			include_once('includes/pages/ShowContactPage.php'); //incluimos el controlador de la página de contacto
		break;
// -------------------------------------------------------------------------------------------------//
		case 'changelog': //si quiere entrar en el changelog
			include_once('includes/pages/ShowChangelogPage.php'); //incluimos el controlador del changelog
		break;
// -------------------------------------------------------------------------------------------------//
		default:
			include_once('includes/pages/ShowIndexPage.php'); //si no, incluimos el controlador del index
// -------------------------------------------------------------------------------------------------//
	}
	display($page); //mostramos la página
}
