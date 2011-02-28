<?php echo $head ?>

<?php echo $menu ?>

	<table width="603" border="0" cellspacing="0">
		<tr>
			<td width="98" height="160" background="<?php echo skin_path(); ?>images/ttl.png">&nbsp;</td>
			<td background="<?php echo skin_path(); ?>images/ttm.png"><center><?php echo img(array('src'	=> base_url().'styles/images/logo.png', 'alt'	=> 'Logo')); ?></center></td>
			<td width="98"  height="160" background="<?php echo skin_path(); ?>images/ttr.png">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3" bgcolor="#FF3300" height="55">
				<center>
					<?php echo form_open('https://www.paypal.com/cgi-bin/webscr', '', $hidden); ?>
						<?php echo paypal_input(); ?>
					<?php echo form_close() ?>
				</center>
			</td>
		</tr>
	</table>
	<table width="603" border="1"  bordercolor="#000000" cellspacing="0">
		<tr>
			<td height="25" align="center" valign="middle" bgcolor="#FF3300" bordercolor="#000000"><font color="black"><?php echo lang('changelog.version'); ?></font></td>
			<td height="25" align="center" valign="middle" bgcolor="#FF3300" bordercolor="#000000"><font color="black"><?php echo lang('changelog.description'); ?></font></td>
		</tr>
		<?php echo $changelog_table; ?>
	</table>
	<table width="603" border="0" cellspacing="0">
		<tr>
			<td width="98" height="100" background="<?php echo skin_path(); ?>images/tbl.png">&nbsp;</td>
			<td bgcolor="#FF3300">&nbsp;</td>
			<td width="100"  height="100" background="<?php echo skin_path(); ?>images/tbr.png">&nbsp;</td>
		</tr>
	</table>

<?php echo $foot ?>