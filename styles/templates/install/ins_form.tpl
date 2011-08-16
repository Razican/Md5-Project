<table width="603" border="0" cellspacing="0">
	<tr style="height:160px;">
		<td width="98" style="background-image: url(./../styles/images/ttl.png);">&nbsp;</td>
		<td style="background-image: url(./../styles/images/ttm.png);"><center><img src="./../styles/images/{sellang}/logo.png" alt="Logo"></center></td>
		<td width="98" style="background-image: url(./../styles/images/ttr.png);">&nbsp;</td>
	</tr>
</table>
<form action="index.php?mode=ins2" method="post">
<table width="603" border="1" cellspacing="0" style="border-color:#000000;">
	{changechmod}<tr>
		<td bgcolor="#FF3300" align="center" valign="middle">{sqlserv}:<br>{eg}: localhost</td>
		<td bgcolor="#FF3300" align="center" valign="middle"><input type="text" name="host" value="" size="30"></td>
	</tr><tr>
		<td bgcolor="#FF3300" align="center" valign="middle">{sqldatabase}:<br>{eg}: md5</td>
		<td bgcolor="#FF3300" align="center" valign="middle"><input type="text" name="db" value="" size="30"></td>
	</tr><tr>
		<td bgcolor="#FF3300" align="center" valign="middle">{sqluser}:<br>{eg}: root</td>
		<td bgcolor="#FF3300" align="center" valign="middle"><input type="text" name="user" value="" size="30"></td>
	</tr><tr>
		<td bgcolor="#FF3300" align="center" valign="middle">{sqlpass}:<br>{eg}: 12345</td>
		<td bgcolor="#FF3300" align="center" valign="middle"><input type="password" name="password" value="" size="30"></td>
	</tr><tr>
		<td bgcolor="#FF3300" align="center" valign="middle">{sqlprefix}:<br>{eg}: md5_</td>
		<td bgcolor="#FF3300" align="center" valign="middle"><input type="text" name="prefix" value="md5_" size="30"></td>
	</tr>
</table>
<table width="603" border="0" cellspacing="0">
	<tr>
		<td colspan="3" bgcolor="#FF3300">&nbsp;</td>
	</tr><tr>
		<td colspan="3" align="center" valign="middle" bgcolor="#FF3300"><input type="submit" name="next" value="{install}"></td>
	</tr><tr>
		<td width="98" style="height: 100px; background-image: url(./../styles/images/tbl.png);">&nbsp;</td>
		<td bgcolor="#FF3300">&nbsp;</td>
		<td width="100" style="height: 100px; background-image: url(./../styles/images/tbr.png);">&nbsp;</td>
	</tr>
</table></form><br>
