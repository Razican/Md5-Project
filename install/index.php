<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
/*ini_set('display_errors', 0);
error_reporting(0);*/

$root_path = "./../"; //definimos el directorio principal

if ((filesize($root_path.'config.php') != 0) && ( ! file_exists('update.php'))) //si el config.php está escrito
	exit(header('location: '.$root_path)); //te lleva al inicio

define('INSIDE', TRUE); //definimos INSIDE
define('INSTALL', TRUE); //definimos INSTALL

include($root_path.'common.php'); //incluimos el common
$sellang = isset($_GET['lang']) ? $_GET['lang'] : ""; //La variable $sellang será la información que recivamos con el get lang
includeLang('install'); //incluimos el archivo de lenguaje
$parse = $lang; //le decimos que la variable $parse tambien es la variable $lang
if (($sellang != "es") and ($sellang != "eu") and ($sellang != "en")) //en el caso de que lo que recibamos no sea una de estas tres
{
	$parse['sellang'] = DEFAULT_LANG; // se mostrará el idioma por defecto
}
else //si no
{
	$parse['sellang'] = $sellang; //lo que se mostrará será lo que recibamos
}
$Mode = isset($_GET['mode']) ? $_GET['mode'] : ""; //le decimos cual será el modo
$parse['version'] = VERSION; // esta será la versión
$parse['file2'] = "index.php?"; //este será el {file2}
switch ($Mode) //creamos el switch
{
// -------------------------------------------------------------------------------------------------//
	case 'ins1': //si es ins1
		if (filesize($root_path.'config.php') != 0) //si el config.php está escrito
			exit(header('location: '.$root_path)); //te lleva al inicio

		$title	= $lang['install']; //el título
		$parse['changechmod'] = $lang['changechmod']; //le decimos que cambie el CHMOD
		$file = "index.php?mode=ins1&"; //este será el archivo

		$get_error	= isset($_GET['error']) ? $_GET['error'] : "";
		// ERRORES //
		if ($get_error === "error1")
		{
			$error = $lang['ins_error1'];
		}
		elseif ($get_error === "error2")
		{
			$error = $lang['ins_error2'];
		}
		elseif ($get_error === "error3")
		{
			$error = $lang['ins_error3'];
		}
		elseif ($get_error === "error4")
		{
			$error = $lang['ins_error4'];
		}

		if (( ! is_writable($root_path."config.php")) &&( ! @chmod($root_path."config.php", 0777)))
			$parse['changechmod']	= '<tr style="height:50px"><td colspan="2" bgcolor="#FF3300" align="center" valign="middle"><font color="orange">'.$lang['changechmod'].'</font></td></tr>';
		else
			$parse['changechmod']	= '';

		$frame  = parsetemplate(gettemplate('install/ins_form'), $parse); //le decimos cual será la página
	break;
// -------------------------------------------------------------------------------------------------//
	case 'ins2': //si es ins2
		if (filesize($root_path.'config.php') != 0) //si el config.php está escrito
			exit(header('location: '.$root_path)); //te lleva al inicio
		$title	= $lang['install']; //el título
		$file = "index.php?mode=ins1&"; //este será el archivo

		//Si no dice nada//
		if ((!$_POST['host'])			||
			($_POST['host'] == "")		||
			(!$_POST['user'])			||
			($_POST['user'] == "")		||
			(!$_POST['password'])		||
			($_POST['password'] == "")	||
			(!$_POST['prefix'])			||
			($_POST['prefix'] == "")	||
			(!$_POST['db'])				||
			($_POST['db'] == "")		)
		{
			exit(header("Location: index.php?mode=ins1&error=error4")); //salimos
		}

		//Definimos las variables //
		$host		= $_POST['host'];
		$user		= $_POST['user'];
		$pass		= $_POST['password'];
		$prefix		= $_POST['prefix'];
		$db			= $_POST['db'];

		//Probamos la conexión //
		$connection = @mysql_connect($host, $user, $pass);
		if (!$connection)
		{
			exit(header("Location: index.php?mode=ins1&error=error1"));
		}
		$dbselect = @mysql_select_db($db);
		if (!$dbselect)
		{
			exit(header("Location: index.php?mode=ins1&error=error2"));
		}

		//Escibimos el config.php //
		$dz = fopen($root_path."config.php", "wb");
		if (!$dz)
		{
			exit(header("Location: index.php?mode=ins1&error=error3"));
		}
		include('database.php');
		$parse['first']	= $lang['ins_doqueryed'];
		fwrite($dz, "<?php\n");
		fwrite($dz, "if(!defined(\"INSIDE\")){ die(\"Intento de Hackeo\"); } //si alguien intenta acceder desde fuera te dice que has intentado hackear el programa\n");
		fwrite($dz, "\$dbsettings = Array(\n");
		fwrite($dz, "\"server\"     => \"".$host."\", // Servidor SQL.\n");
		fwrite($dz, "\"user\"       => \"".$user."\", // Usuario de la base de datos.\n");
		fwrite($dz, "\"pass\"       => \"".$pass."\", // Contraseña de MySQL.\n");
		fwrite($dz, "\"name\"       => \"".$db."\", // Nombre de la base de datos.\n");
		fwrite($dz, "\"prefix\"     => \"".$prefix."\", // Prefijo de las tablas.\n");
		fwrite($dz, ");\n");
		fclose($dz);
		$parse['second']	= $lang['ins_written'];
		doquery ($QryDropTable,		'decryptor');
		doquery ($QryTabledecryptor,	'decryptor');
		doquery ($QryUpdateTable,	'decryptor'  );
		$parse['third']		= $lang['ins_queryok'];

		if ((is_writable($root_path."config.php")) &&( ! @chmod($root_path."config.php", 0444)))
			$parse['changechmod']	= '<br><font color="orange">'.$lang['changechmod2'].'</font>';
		else
			$parse['changechmod']	= '';

		$frame  = parsetemplate(gettemplate('install/ins_form_done'), $parse); //mostramos la página
		break;
// -------------------------------------------------------------------------------------------------//
		case 'update': //si quiere actualizar
			$file	= "index.php?mode=update&"; //este será el archivo
			$title	= $lang['update']; //el título
			if ((filesize($root_path.'config.php') != 0) and (file_exists('update.php'))) //si el config.php está escrito y existe el update.php
			{
				include_once($root_path.'config.php');
				include_once('update.php');
				if ($_SERVER['REQUEST_METHOD'] === 'POST') //si se puede y se quiere actualizar
				{
					$new = 0;
					$existed = 0;

					// Si no postea algo //
					if ((!$_POST['host'])			||
						($_POST['host'] == "")		||
						(!$_POST['user'])			||
						($_POST['user'] == "")		||
						(!$_POST['password'])		||
						($_POST['password'] == "")	||
						(!$_POST['prefix'])			||
						($_POST['prefix'] == "")	||
						(!$_POST['db'])				||
						($_POST['db'] == "")		)
					{
						exit(header("Location: index.php?mode=update&error=error4")); //error
					}

					if (($_POST['host'] != $dbsettings['server'])	||
						($_POST['user'] != $dbsettings['user'])		||
						($_POST['password'] != $dbsettings['pass'])	||
						($_POST['prefix'] != $dbsettings['prefix'])	||
						($_POST['db'] != $dbsettings['name'])		)
					{
						// Definimos las variables //
						$host		= $_POST['host'];
						$user		= $_POST['user'];
						$pass		= $_POST['password'];
						$prefix		= $_POST['prefix'];
						$db			= $_POST['db'];

						// Probamos la conexión //
						$connection = @mysql_connect($host, $user, $pass);
						if (!$connection)
						{
							exit(header("Location: index.php?mode=update&error=error1"));
						}
						$dbselect = @mysql_select_db($db);
						if (!$dbselect)
						{
							exit(header("Location: index.php?mode=update&error=error2"));
						}

						// Abrimos el config.php //
						$dz = fopen($root_path."config.php", "wb");
						if (!$dz)
						{
							exit(header("Location: index.php?mode=update&error=error3"));
						}
						$parse['first']	= $lang['ins_doqueryed'];
						fwrite($dz, "<?php\n");
						fwrite($dz, "if(!defined(\"INSIDE\")){ die(\"Intento de Hackeo\"); } //si alguien intenta acceder desde fuera te dice que has intentado hackear el programa\n");
						fwrite($dz, "\$dbsettings = Array(\n");
						fwrite($dz, "\"server\"     => \"".$host."\", // Servidor SQL.\n");
						fwrite($dz, "\"user\"       => \"".$user."\", // Usuario de la base de datos.\n");
						fwrite($dz, "\"pass\"       => \"".$pass."\", // Contraseña de MySQL.\n");
						fwrite($dz, "\"name\"       => \"".$db."\", // Nombre de la base de datos.\n");
						fwrite($dz, "\"prefix\"     => \"".$prefix."\", // Prefijo de las tablas.\n");
						fwrite($dz, ");\n");
						fclose($dz);
						$parse['second']	= $lang['ins_written'];
					}

					if( ! ini_set('max_execution_time', 3600))
						$max_updates = 1000;

					$time = microtime(TRUE);
					//Actualizamos //
					foreach ($update as $characters => $md5)
					{
						$charsel = doquery("Select `characters` From {{table}} WHERE `md5` = '".$md5."' limit 1;", "decryptor"); //seleccionamos las cadenas de caracteres
						if (mysql_num_rows($charsel) === 0) //si no existe
						{
							doquery("INSERT into {{table}} (characters,md5) values ('".$characters."','".$md5."')", "decryptor"); //la metemos
							$new++;
						}
						else //si existe
						{
							$existed++;
						}
						if (($new-1) % 5000 === 0)
							mysql_free_result($charsel);

						if ((isset($max_updates)) && ($new === $max_updates))
							break;

						if (microtime(TRUE)-$time >= 3570)
							break;
					}
					if ((is_writable($root_path."config.php")) &&( ! @chmod($root_path."config.php", 0444)))
						$parse['changechmod']	= '<br><font color="orange">'.$lang['changechmod2'].'</font>';
					else
						$parse['changechmod']	= '';

					//Mostramos las estadísticas //
					$parse['new'] = $new;
					$parse['existed'] = $existed;
					$frame  = parsetemplate(gettemplate('install/updated'), $parse); //mostramos la página
				}
				else
				{

					$get_error	= isset($_GET['error']) ? $_GET['error'] : "";
					// ERRORES //
					if ($get_error === "error1")
					{
						$error = $lang['ins_error1'];
					}
					elseif ($get_error === "error2")
					{
						$error = $lang['ins_error2'];
					}
					elseif ($get_error === "error3")
					{
						$error = $lang['ins_error3'];
					}
					elseif ($get_error === "error4")
					{
						$error = $lang['ins_error4'];
					}

					// Mostramos algunas variables del config.php //
					$parse['curhost']	= $dbsettings['server'];
					$parse['curuser']	= $dbsettings['user'];
					$parse['curpass']	= $dbsettings['pass'];
					$parse['curname']	= $dbsettings['name'];
					$parse['curprefix']	= $dbsettings['prefix'];

					if (( ! is_writable($root_path."config.php")) &&( ! @chmod($root_path."config.php", 0777)))
						$parse['changechmod']	= '<tr style="height:50px"><td colspan="2" bgcolor="#FF3300" align="center" valign="middle"><font color="orange">'.$lang['changechmod'].'</font></td></tr>';
					else
						$parse['changechmod']	= '';

					$frame  = parsetemplate(gettemplate('install/update'), $parse);
				}
			}
			elseif (filesize($root_path.'config.php') === 0) //si el config no está escrito
			{
				exit(header('location: '.$root_path.'install/')); //te lleva a a instalación
			}
			else //si no
			{
				exit(header('location: '.$root_path)); //te lleva al inicio
			}
		break;
// -------------------------------------------------------------------------------------------------//
	default:
		$file = "index.php?mode=intro&"; //este será el archivo
		$title	= $lang['introduction']; //el título
		$frame  = parsetemplate(gettemplate('install/ins_intro'), $parse); //le diremos cual es la página
// -------------------------------------------------------------------------------------------------//
}
display($frame, false); //mostramos la página
