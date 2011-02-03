<?php
if (filesize('config.php') == 0) //si el config.php no está escrito
{ 
	exit(header('location: install/index.php'));//te lleva a la instalación
}
elseif (file_exists('install/update.php')) //si existe el archivo de actualización
{
	exit(header('location: install/index.php?mode=update')); //te lleva a la actualización
} 
elseif ((file_exists('install/index.php')) or (file_exists('install/database.php')) or (file_exists('styles/templates/install/'))) //si existe alguno de estos
{
	echo"<h2><b>Por favor, elimina los siguientes archivos: install.php, database.php y templates/install/</b></h2><br>
	Por razones de seguridad, es obligatorio eliminarlos, gracias."; //te dice esto
}
elseif (@fopen("config.php", "a")) //si puede abrir el archivo de configuración
{
	echo"<h2><b>Por favor, cambia el CHMOD del archivo config.php a CHMOD 440</b></h2><br>
	Por razones de seguridad, es obligatorio, gracias."; //te dice esto
}
else
{ //si no hay ningún contratiempo

	define('INSIDE'  , TRUE); //definimos inside como true

	include('config.php'); //incluimos las extensiones
	include('common'.$phpEx); //incluimos los parametros comunes
	$sellang = isset($_GET['lang']) ? $_GET['lang'] : ""; //La variable $sellang será la información que recivamos con el get lang
	$parse['version'] = VERSION; // esta será la versión
	$Page = isset($_GET['page']) ? $_GET['page'] : ""; //le decimos cual será la página
	switch($Page) //creamos el switch
	{
// -------------------------------------------------------------------------------------------------//
		case 'decryptor': //si quiere entrar en el desencriptador
			include_once('includes/pages/ShowDecryptorPage'.$phpEx); //incluimos el controlador del desencriptador
		break;
// -------------------------------------------------------------------------------------------------//
		case 'encryptor': //si quiere entrar en el encriptador
			include_once('includes/pages/ShowEncryptorPage'.$phpEx); //incluimos el controlador del encriptador
		break;
// -------------------------------------------------------------------------------------------------//
		case 'contact'; //si quiere entrar en la página de contacto
			require_once('includes/vars'.$phpEx); //incluimos las variables de los contactos
			include_once('includes/pages/ShowContactPage'.$phpEx); //incluimos el controlador de la página de contacto
		break;
// -------------------------------------------------------------------------------------------------//
		case 'changelog': //si quiere entrar en el changelog
			include_once('includes/pages/ShowChangelogPage'.$phpEx); //incluimos el controlador del changelog
		break;
// -------------------------------------------------------------------------------------------------//
		default:
			include_once('includes/pages/ShowIndexPage'.$phpEx); //si no, incluimos el controlador del index
// -------------------------------------------------------------------------------------------------//
	}
	display($page); //mostramos la página
}
?>
