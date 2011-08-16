<?php
if (!defined('INSIDE'))
{
	die("Hacking Atempt");
}

	includeLang('lang'); //incluimos el archivo de lenguaje
	$parse = $lang; //le decimos que la variable $parse tambien es la variable $lang

	if (($sellang != "es") and ($sellang != "eu") and ($sellang != "en")) //en el caso de que lo que recibamos no sea una de estas tres
	{
		$parse['sellang'] = DEFAULT_LANG; // se mostrará el idioma por defecto
	}
	else //si no
	{
		$parse['sellang'] = $sellang; //lo que se mostrará será lo que recibamos
	}

	$credlist	= ""; //definimos $credlist
	foreach ($staff as $number => $data) //la explicamos como tratar el array de segundo nivel
	{
		if ($data['rank'] === "admin") //si el rango es admin
		{
			$parse['rankpo'] = $lang['administrator']; //el rango será el que en el lenguaje será admin
		}
		elseif ($data['rank'] === "opera") //si es operador
		{
			$parse['rankpo'] = $lang['operator']; //el rango será el que en el lenguaje será operador
		}
		elseif ($data['rank'] === "colab") //si es colaborador
		{
			$parse['rankpo'] = $lang['contributor']; //el rango será el que en el lenguaje será acolaborador
		}
		else //si no es ninguno de esos
		{
			$parse['rankpo'] = $lang['dkn']; //el rango será desconocido
		}

		$worksum = $data['prog'] + $data['trad'] + $data['design']; //Hacemos la cuenta de los trabajos qu tiene cada uno
		if ($data['prog'] === 1) // si es programador
		{
			$work = $lang['progI'].$lang['prog']; //el trabajo será programador
			if ($worksum === 2) //si tiene dos trabajos
			{
				$work .= " ".$lang['and']." "; //le decimos que diga "y"
				if ($data['trad'] === 1) //si el segundo trabajo es traductor
				{
					$work .= $lang['tradi'].$lang['trad']; //el segundo trabajo será traductor
				}
				else //si no
				{
					$work .= $lang['designi'].$lang['design']; //el segundo trabajo será diseáador
				}
			}
			elseif ($worksum === 3) //si tiene tres trabajos
			{
				$work .= ", ".$lang['tradi'].$lang['trad']." ".$lang['and']." ".$lang['designi'].$lang['design']; // se le ponen los tres
			}
		}
		elseif ($data['trad'] === 1) // si su trabajo es traductor
		{
			$work = $lang['tradI'].$lang['trad']; //el trabajo será traductor
			if ($worksum === 2) //si además tiene dos trabajos
			{
				$work .= " ".$lang['and']." ".$lang['designi'].$lang['design']; //el segundo será diseñador
			}
		}
		elseif ($data['design'] === 1) //si es diseñador
		{
			$work = $lang['designI'].$lang['design']; //será diseñador
		}
		else //si no
		{
			$work = $lang['dkn']; //diremos que su trabajo es desconocido
		}
		$parse['wor'] = $work; //lo incluimos todo en el template
		$parse['nick'] = $data['nick']; //el nick será el que aparezca en el array
		if ($data['email'] === "N/A") //si no tiene email
		{
			$parse['mail'] = $data['email']; //le diremos que no tenemos su email
		}
		else //si si lo tiene
		{
			$parse['mail'] = "<a href=\"mailto:".$data['email']."\">".$data['email']."</a>"; //el mail será el que aparezca en el array
		}
		$credlist	.= parsetemplate(gettemplate('contact_table'), $parse); //actualizamos el template por cada valor del array
	}
	$parse['table']	= "<table width=\"603\" style=\"border: 1px solid #000000;\" cellspacing=\"0\"><tr>
	<td align=\"center\" valign=\"middle\" bgcolor=\"#FF3300\" style=\"border: 1px solid #000000;\"><font color=\"lime\">".$lang['nickname']."</font></td>
	<td align=\"center\" valign=\"middle\" bgcolor=\"#FF3300\" style=\"border: 1px solid #000000;\"><font color=\"lime\">".$lang['rank']."</font></td>
	<td align=\"center\" valign=\"middle\" bgcolor=\"#FF3300\" style=\"border: 1px solid #000000;\"><font color=\"lime\">".$lang['email']."</font></td>
	<td align=\"center\" valign=\"middle\" bgcolor=\"#FF3300\" style=\"border: 1px solid #000000;\"><font color=\"lime\">".$lang['work']."</font></td>
	</tr>".$credlist."</table>"; //Creamos la tabla
	$file		= "index.php?page=contact&"; //le decimos cual será el archivo
	$title = $lang['contacttitle']; //este será el título
	$page = parsetemplate(gettemplate('contchan'), $parse); //esta será la página
