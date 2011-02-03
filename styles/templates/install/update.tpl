<table width="603" border="0" cellspacing="0">
	<tr height="160">
		<td width="98" background="./../styles/images/ttl.png">&nbsp;</td>
		<td background="./../styles/images/ttm.png"><center><img src="./../styles/images/{sellang}/logo.png" alt="Logo"></center></td>
		<td width="98" background="./../styles/images/ttr.png">&nbsp;</td>
	</tr>
</table>
<form action="index.php?mode=update&update=true" method="post">
<table width="603" border="1" cellspacing="0" bordercolor="#000000">
	<tr height="50">
		<td colspan="2" bgcolor="#FF3300" align="center" valign="middle"><font color="orange">{changechmod}<br>{updater_ch} {actdtb} {to} {database}.</font></td>
	</tr><tr>
		<td bgcolor="#FF3300" align="center" valign="middle">{sqlserv}:<br>{ex}: localhost</font></td>
		<td bgcolor="#FF3300" align="center" valign="middle"><input type="text" name="host" value="{curhost}" size="30"></td>
	</tr><tr>
		<td bgcolor="#FF3300" align="center" valign="middle">{sqldatabase}:<br>{ex}: md5</font></td>
		<td bgcolor="#FF3300" align="center" valign="middle"><input type="text" name="db" value="{curname}" size="30"></td>
	</tr><tr>
		<td bgcolor="#FF3300" align="center" valign="middle">{sqluser}:<br>{ex}: root</font></td>
		<td bgcolor="#FF3300" align="center" valign="middle"><input type="text" name="user" value="{curuser}" size="30"></td>
	</tr><tr>
		<td bgcolor="#FF3300" align="center" valign="middle">{sqlpass}:<br>{ex}: 12345</font></td>
		<td bgcolor="#FF3300" align="center" valign="middle"><input type="password" name="password" value="{curpass}" size="30"></td>
	</tr><tr>
		<td bgcolor="#FF3300" align="center" valign="middle">{sqlprefix}:<br>{ex}: md5_</font></td>
		<td bgcolor="#FF3300" align="center" valign="middle"><input type="text" name="prefix" value="{curprefix}" size="30"></td>
	</tr><tr>
		<td bgcolor="#FF3300" align="center" valign="middle">{tplexten}:<br>{ex}: tpl</font></td>
		<td bgcolor="#FF3300" align="center" valign="middle"><input type="text" name="tplEx" value="{curtpl}" size="30"></td>
	</tr><tr>
		<td bgcolor="#FF3300" align="center" valign="middle">{phpexten}:<br>{ex}: php</font></td>
		<td bgcolor="#FF3300" align="center" valign="middle"><input type="text" name="phpEx" value="{curphp}" size="30"></td>
	</tr><tr>
		<td bgcolor="#FF3300" align="center" valign="middle">{langexten}:<br>{ex}: mo</font></td>
		<td bgcolor="#FF3300" align="center" valign="middle"><input type="text" name="langEx" value="{curlangex}" size="30"></td>
	</tr>
</table>
<table width="603" border="0" cellspacing="0">
	<tr>
		<td colspan="3" bgcolor="#FF3300">&nbsp;</td>
	</tr><tr>
		<td colspan="3" align="center" valign="middle" bgcolor="#FF3300"><input type="submit" name="next" value="{updateyes}"></td>
	</tr><tr>
		<td width="98" height="100" background="./../styles/images/tbl.png">&nbsp;</td>
		<td bgcolor="#FF3300">&nbsp;</td>
		<td width="100"  height="100" background="./../styles/images/tbr.png">&nbsp;</td>
	</tr>
</table>