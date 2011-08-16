<?php
function get_execution_time()
{
	static $microtime_start = NULL;
	if($microtime_start === NULL)
	{
		$microtime_start = microtime(TRUE);
		return 0.0;
	}
	return microtime(TRUE) - $microtime_start;
}
get_execution_time();

ini_set('max_execution_time', 3600);

function str()
{	$str	= '';
	$pool	= '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$len	= mt_rand(1, 10);
	for ($f=0; $f < $len; $f++)
	{
		$str .= substr($pool, mt_rand(0, strlen($pool) -1), 1);
	}

	return $str;
}

$file	= '/var/www/md5/files/HashPack 20/install/update.php';
$num	= 20;
$i		= 0;

while (TRUE)
{
	$handler	= fopen($file, 'ab');
	$str		= str();
	fwrite($handler, "		'".$str."' => '".md5($str)."',\n");
	$i++;

	$r	= 10000*(ceil($i/10000));
	if (($i != 0) && ($i == $r))
	{
		fwrite($handler, "	);");
		$num++;

		mkdir('/var/www/md5/files/HashPack '.$num);
		mkdir('/var/www/md5/files/HashPack '.$num.'/install/');
		$file	= '/var/www/md5/files/HashPack '.$num.'/install/update.php';
		$n_handler	= fopen($file, 'wb');
		fwrite($n_handler, "<?php\n\n	\$update	= array(\n");
		fclose($n_handler);

		chmod('/var/www/md5/files/HashPack '.$num.'/', 0777);
		chmod('/var/www/md5/files/HashPack '.$num.'/install/', 0777);
		chmod($file, 0777);
	}
	fclose($handler);

	if (( ! isset($v)) && (get_execution_time() >= 10))
		$v		= $r;

	if(isset($v) && ($i == $v))
		break;
}

header('Location: write.php?i='.$i.'&time='.get_execution_time().'&num='.$num);
