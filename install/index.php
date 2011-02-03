<?php
$root_path = "./../"; //definimos el directorio principal

if (filesize('./../config.php') != 0) //si el config.php está escrito
{
	exit(header('location: '.$root_path.'index.php')); //te lleva al inicio
}
else
{
	define('INSIDE', TRUE); //definimos INSIDE
	define('INSTALL', TRUE); //definimos //INSTALL

	//indicamos las extensiones preliminares
	$phpEx	= ".php";
	$tplEx	= ".tpl";
	$langEx	= ".mo";

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

			$frame  = parsetemplate(gettemplate('install/ins_form'), $parse); //le decimos cual será la página
		break;
// -------------------------------------------------------------------------------------------------//
		case 'ins2': //si es ins2
			$title	= $lang['install']; //el título
			$file = "index.php?mode=ins1&"; //este será el archivo
			
			//Si no dice nada//
			if ((!$_POST['host'])			||
				($_POST['host'] == "")		||
				(!$_POST['user'])			||
				($_POST['user'] == "")		||
				(!$_POST['prefix'])			||
				($_POST['prefix'] == "")	||
				(!$_POST['db'])				||
				($_POST['db'] == "")		||
				(!$_POST['tplEx'])			||
				($_POST['tplEx'] == "")		||
				(!$_POST['langEx'])			||
				($_POST['langEx'] == "")	||
				(!$_POST['phpEx'])			||
				($_POST['phpEx'] == "")		)
			{
				
				exit(header("Location: index.php?mode=ins1&error=error4")); //salimos
			}
			
			//Definimos las variables //
			$host		= $_POST['host'];
			$user		= $_POST['user'];
			$pass		= $_POST['password'];
			$prefix		= $_POST['prefix'];
			$db			= $_POST['db'];
			$tplExt		= $_POST['tplEx'];
			$langExt	= $_POST['langEx'];
			$phpExt		= $_POST['phpEx'];

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
			$dz = fopen($root_path."config.php", "w");
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
			fwrite($dz, ");");
			fwrite($dz, "// Cambiar si la extensión que usas no es .php, .mo o .tpl\n");
			fwrite($dz, "\$phpEx = \".".$phpExt."\"; //extensión de los archivos\n");
			fwrite($dz, "\$langEx = \".".$langExt."\"; //extensión de los archivos de lenguaje\n");
			fwrite($dz, "\$tplEx = \".".$tplExt."\"; //extensión de los templates\n");
			fwrite($dz, "// No cambiar lo siguiente\n");
			fwrite($dz, "\$actdtb = ".$database.";\n");
			fwrite($dz, "?>");
			fclose($dz);
			$parse['second']	= $lang['ins_writted'];
			doquery ($QryDropTable,		'decryptor');
			doquery ($QryTabledecryptor,	'decryptor');
			doquery ($QryUpdateTable,	'decryptor'  );
			$parse['third']	= $lang['ins_queryok'];

			$frame  = parsetemplate(gettemplate('install/ins_form_done'), $parse); //mostramos la página
			break;
// -------------------------------------------------------------------------------------------------//
			case 'update': //si quiere actualizar
				$file = "index.php?mode=update&"; //este será el archivo
				if ((filesize($root_path.'config.php') != 0) and (file_exists('update'.$phpEx))) //si el config.php está escrito y existe el update.php
				{
					include_once($root_path.'config.php');
					include_once('update'.$phpEx);
					if (($_GET['update'] == "true") and ($actdtb < $database)) //si se puede y se quiere actualizar
					{
						$new = 0;
						$existed = 0;
						
						// Si no postea nada //
						if ((!$_POST['host'])			||
							($_POST['host'] == "")		||
							(!$_POST['user'])			||
							($_POST['user'] == "")		||
							(!$_POST['prefix'])			||
							($_POST['prefix'] == "")	||
							(!$_POST['db'])				||
							($_POST['db'] == "")		||
							(!$_POST['tplEx'])			||
							($_POST['tplEx'] == "")		||
							(!$_POST['langEx'])			||
							($_POST['langEx'] == "")	||
							(!$_POST['phpEx'])			||
							($_POST['phpEx'] == "")		)
						{
							exit(header("Location: index.php?mode=update&error=error4")); //error
						}
						
						// Definimos las variables //
						$host		= $_POST['host'];
						$user		= $_POST['user'];
						$pass		= $_POST['password'];
						$prefix		= $_POST['prefix'];
						$db			= $_POST['db'];
						$tplExt		= $_POST['tplEx'];
						$langExt	= $_POST['langEx'];
						$phpExt		= $_POST['phpEx'];

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
						$dz = fopen($root_path."config.php", "w");
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
						fwrite($dz, ");");
						fwrite($dz, "// Cambiar si la extensión que usas no es .php, .mo o .tpl\n");
						fwrite($dz, "\$phpEx = \".".$phpExt."\"; //extensión de los archivos\n");
						fwrite($dz, "\$langEx = \".".$langExt."\"; //extensión de los archivos de lenguaje\n");
						fwrite($dz, "\$tplEx = \".".$tplExt."\"; //extensión de los templates\n");
						fwrite($dz, "// No cambiar lo siguiente\n");
						fwrite($dz, "\$actdtb = ".$database.";\n");
						fwrite($dz, "?>");
						fclose($dz);
						$parse['second']	= $lang['ins_writted'];
						
						//Actualizamos //
						foreach ($update as $a => $b)
						{
							$charsel = doquery("Select `characters` From {{table}} WHERE `md5` = '".$b['md5']."';", "decryptor"); //seleccionamos las cadenas de caracteres
							$charsum = mysql_num_rows($charsel); // contamos las líneas de caracteres
							if ($charsum == 0) //si no existe
							{
								doquery("INSERT into {{table}} (characters,md5) values ('".$b['characters']."','".$b['md5']."')", "decryptor"); //la metemos
								$new++;
							}
							else //si existe
							{
								$existed++;
							}
						}
						
						//Mostramos las estadísticas //
						$parse['new'] = $new;
						$parse['existed'] = $existed;
						$frame  = parsetemplate(gettemplate('install/updated'), $parse); //mostramos la página
					}
					elseif ($actdtb < $database) //si la database está desactualizada
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
						$dot = ".";
						$nodot = "";
						$parse['curhost']	= $dbsettings['server'];
						$parse['curuser']	= $dbsettings['user'];
						$parse['curpass']	= $dbsettings['pass'];
						$parse['curname']	= $dbsettings['name'];
						$parse['curprefix']	= $dbsettings['prefix'];
						$parse['curphp']	= str_replace($dot,$nodot,$phpEx);
						$parse['curtpl']	= str_replace($dot,$nodot,$tplEx);
						$parse['curlangex']	= str_replace($dot,$nodot,$langEx);
						$parse['actdtb']	= "v.".$actdtb;
						$parse['database']	= "v.".$database;
						$frame  = parsetemplate(gettemplate('install/update'), $parse);
					}
					else //si no
					{
						echo "<h2><b>Por favor, elimina los siguientes archivos: install/update.php, styles/templates/install/update.tpl y styles/templates/install/updated.tpl</b></h2><br>Por razones de seguridad, es obligatorio eliminarlos, gracias."; //te dice esto
						exit();
					}
				}
				elseif (filesize('./../config.php') == 0) //si el config no está escrito
				{
					exit(header('location: index.php')); //te lleva a a instalación
				}
				else //si no
				{
					exit(header('location: '.$root_path.'index.php')); //te lleva al inicio
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
}
?>