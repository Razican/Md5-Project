<?php

$hashpacks	= isset($_GET['i']) ? $_GET['i']/10000 : 0;
$time		= isset($_GET['time']) ? $_GET['time'] : 0;

if(($hashpacks != 0) && ($time != 0))
{
	$handler	= fopen('/var/www/md5/files/HashPack Creator/md5.php', "ab");
	fwrite($handler, "\$handler	= fopen('/var/www/md5/files/HashPack Creator/md5.php', \"wb\");\n");
	fwrite($handler, "fwrite(\$handler, \"<?php\\n\\n\");\n");
	fwrite($handler, "fwrite(\$handler, \"ini_set('max_execution_time', 3600);\\n\\n\");\n");
	fwrite($handler, "fwrite(\$handler, \"function get_execution_time()\\n{\\n\");\n");
	fwrite($handler, "fwrite(\$handler, \"	static \\\$microtime_start = NULL;\\n\");\n");
	fwrite($handler, "fwrite(\$handler, \"	if(\\\$microtime_start === NULL)\\n	{\\n\");\n");
	fwrite($handler, "fwrite(\$handler, \"		\\\$microtime_start = microtime(TRUE);\\n\");\n");
	fwrite($handler, "fwrite(\$handler, \"		return 0.0;\\n	}\\n\");\n");
	fwrite($handler, "fwrite(\$handler, \"	return microtime(TRUE) - \\\$microtime_start;\\n}\\n\");\n");
	fwrite($handler, "fwrite(\$handler, \"get_execution_time();\\n\\n\");\n");
	fwrite($handler, "fwrite(\$handler, \"\\\$array	= array(\\n\");\n");
	fwrite($handler, "foreach (\$array as \$value)\n{\n	fwrite(\$handler, \"'\".\$value.\"',\\n\");\n}\n");
	fwrite($handler, "fwrite(\$handler, \");\\n\\n\");\n");
	fwrite($handler, "fwrite(\$handler, \"\\\$file	= '/var/www/md5/files/HashPack \".\$num.\"/install/update.php';\\n\");\n");
	fwrite($handler, "fwrite(\$handler, \"\\\$num	= \".\$num.\";\\n\\n\");\n");
	fwrite($handler, "fwrite(\$handler, \"for (\\\$i = 0;;)\\n{\\n\");\n");
	fwrite($handler, "fwrite(\$handler, \"	\\\$handler	= fopen(\\\$file, \\\"ab\\\");\\n\\n\");\n");
	fwrite($handler, "fwrite(\$handler, \"	\\\$len		= mt_rand(1, 10);\\n\");\n");
	fwrite($handler, "fwrite(\$handler, \"	\\\$pool		= '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';\\n\\n\");\n");
	fwrite($handler, "fwrite(\$handler, \"	\\\$str = '';\\n\");\n");
	fwrite($handler, "fwrite(\$handler, \"	for (\\\$f=0; \\\$f < \\\$len; \\\$f++)\\n	{\\n\");\n");
	fwrite($handler, "fwrite(\$handler, \"		\\\$str .= substr(\\\$pool, mt_rand(0, strlen(\\\$pool) -1), 1);\\n	}\\n\");\n");
	fwrite($handler, "fwrite(\$handler, \"	\\\$md5 = md5(\\\$str);\");\n");
	fwrite($handler, "fwrite(\$handler, \"	if ( ! in_array(\\\$md5, \\\$array))\\n	{\\n\");\n");
	fwrite($handler, "fwrite(\$handler, \"		fwrite(\\\$handler, \\\"		'\\\".\\\$str.\\\"' => '\\\".\\\$md5.\\\"',\\\\n\\\");\\n\\n\");\n");
	fwrite($handler, "fwrite(\$handler, \"		\\\$array[] = \\\$md5;\\n		\\\$i++;\\n	}\\n\\n\");\n");
	fwrite($handler, "fwrite(\$handler, \"	\\\$r	= 10000*(ceil(\\\$i/10000));\\n\\n\");\n");
	fwrite($handler, "fwrite(\$handler, \"	if ((\\\$i != 0) && (\\\$i == \\\$r))\\n	{\\n\");\n");
	fwrite($handler, "fwrite(\$handler, \"		fwrite(\\\$handler, \\\"	);\\\");\\n		\\\$num++;\\n\\n\");\n");
	fwrite($handler, "fwrite(\$handler, \"		mkdir('/var/www/md5/files/HashPack '.\\\$num);\\n\");\n");
	fwrite($handler, "fwrite(\$handler, \"		mkdir('/var/www/md5/files/HashPack '.\\\$num.'/install/');\\n\");\n");
	fwrite($handler, "fwrite(\$handler, \"		\\\$file	= '/var/www/md5/files/HashPack '.\\\$num.'/install/update.php';\\n\\n\");\n");
	fwrite($handler, "fwrite(\$handler, \"		\\\$n_handler	= fopen(\\\$file, \\\"wb\\\");\\n\");\n");
	fwrite($handler, "fwrite(\$handler, \"		fwrite(\\\$n_handler, \\\"<?php\\\\n\\\\n\\\");\");\n");
	fwrite($handler, "fwrite(\$handler, \"		fwrite(\\\$n_handler, \\\"	\\\\\\\$update	= array(\\\\n\\\");\\n\");\n");
	fwrite($handler, "fwrite(\$handler, \"		fclose(\\\$n_handler);\\n\\n\");\n");
	fwrite($handler, "fwrite(\$handler, \"		chmod('/var/www/md5/files/HashPack '.\\\$num.'/', 0777);\\n\");\n");
	fwrite($handler, "fwrite(\$handler, \"		chmod('/var/www/md5/files/HashPack '.\\\$num.'/install/', 0777);\\n\");\n");
	fwrite($handler, "fwrite(\$handler, \"		chmod(\\\$file, 0777);\\n	}\\n\\n\");\n");
	fwrite($handler, "fwrite(\$handler, \"	fclose(\\\$handler);\\n\\n\");\n");
	fwrite($handler, "fwrite(\$handler, \"	if (( ! isset(\\\$v)) && (get_execution_time() >= 1800))\\n\");\n");
	fwrite($handler, "fwrite(\$handler, \"		\\\$v		= \\\$r;\\n\\n\");\n");
	fwrite($handler, "fwrite(\$handler, \"	if(isset(\\\$v) && (\\\$i == \\\$v))\\n	{\\n		break;\\n	}\\n}\\n\\n\");\n");
	fwrite($handler, "fclose(\$handler);\n\n");
	fwrite($handler, "header('Location: write.php?i='.\$i.'&time='.get_execution_time());");
	fclose($handler);

	echo 'Se han creado '.$hashpacks.' HashPacks.<br />';
	echo 'El creador ha tardado '.$time.' segundos.<br /><br />';
	echo '<a href="md5.php" >Crear más hashes</a>.';
}
else
{
	echo 'Ha ocurrido un error.';
}