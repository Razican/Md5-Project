<?php

$hashpacks	= isset($_GET['i']) ? $_GET['i']/10000 : 0;
$time		= isset($_GET['time']) ? $_GET['time'] : 0;
$num		= isset($_GET['num']) ? $_GET['num'] :0;

if(($hashpacks != 0) && ($time != 0) && ($num != 0))
{
	$handler	= fopen('/var/www/md5/files/HashPack Creator/md5.php', 'wb');
	fwrite($handler, "<?php\n");
	fwrite($handler, "function get_execution_time()\n{\n");
	fwrite($handler, "	static \$microtime_start = NULL;\n");
	fwrite($handler, "	if(\$microtime_start === NULL)\n	{\n");
	fwrite($handler, "		\$microtime_start = microtime(TRUE);\n		return 0.0;\n	}\n");
	fwrite($handler, "	return microtime(TRUE) - \$microtime_start;\n}\n");
	fwrite($handler, "get_execution_time();\n\n");
	fwrite($handler, "ini_set('max_execution_time', 3600);\n\n");
	fwrite($handler, "function str()\n{	\$str	= '';\n");
	fwrite($handler, "	\$pool	= '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';\n");
	fwrite($handler, "	\$len	= mt_rand(1, 10);\n");
	fwrite($handler, "	for (\$f=0; \$f < \$len; \$f++)\n	{\n");
	fwrite($handler, "		\$str .= substr(\$pool, mt_rand(0, strlen(\$pool) -1), 1);\n	}\n\n");
	fwrite($handler, "	return \$str;\n}\n\n");
	fwrite($handler, "\$file	= '/var/www/md5/files/HashPack $num/install/update.php';\n\$num	= $num;\n\$i		= 0;\n\n");
	fwrite($handler, "while (TRUE)\n{\n	\$handler	= fopen(\$file, 'ab');\n	\$str		= str();\n");
	fwrite($handler, "	fwrite(\$handler, \"		'\".\$str.\"' => '\".md5(\$str).\"',\\n\");\n	\$i++;\n\n");//Warning!!!
	fwrite($handler, "	\$r	= 10000*(ceil(\$i/10000));\n	if ((\$i != 0) && (\$i == \$r))\n	{\n");
	fwrite($handler, "		fwrite(\$handler, \"	);\");\n		\$num++;\n\n");//Warning!!!
	fwrite($handler, "		mkdir('/var/www/md5/files/HashPack '.\$num);\n");
	fwrite($handler, "		mkdir('/var/www/md5/files/HashPack '.\$num.'/install/');\n");
	fwrite($handler, "		\$file	= '/var/www/md5/files/HashPack '.\$num.'/install/update.php';\n");
	fwrite($handler, "		\$n_handler	= fopen(\$file, 'wb');\n");
	fwrite($handler, "		fwrite(\$n_handler, \"<?php\\n\\n	\\\$update	= array(\\n\");\n");//Warning!!!
	fwrite($handler, "		fclose(\$n_handler);\n\n		chmod('/var/www/md5/files/HashPack '.\$num.'/', 0777);\n");
	fwrite($handler, "		chmod('/var/www/md5/files/HashPack '.\$num.'/install/', 0777);\n");
	fwrite($handler, "		chmod(\$file, 0777);\n	}\n	fclose(\$handler);\n\n");
	fwrite($handler, "	if (( ! isset(\$v)) && (get_execution_time() >= 10))\n		\$v		= \$r;\n\n");
	fwrite($handler, "	if(isset(\$v) && (\$i == \$v))\n		break;\n}\n\n");
	fwrite($handler, "header('Location: write.php?i='.\$i.'&time='.get_execution_time().'&num='.\$num);");
	fclose($handler);

	echo 'Se han creado '.$hashpacks.' HashPacks.<br />';
	echo 'El creador ha tardado '.$time.' segundos.<br /><br />';
	echo '<a href="md5.php" >Crear más hashes</a>.';
}
else
{
	echo 'Ha ocurrido un error.';
}
