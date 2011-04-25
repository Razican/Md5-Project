<?php echo $head ?>

<?php echo $menu ?>

	<table width="548" border="0" height="413" background="<?php echo skin_path(); ?>images/indextable.png">
		<tbody>
		<tr>
			<td colspan="4" height="160"><b><center>
				<?php echo show_logo(); ?>
			</center></b></td>
		</tr><tr>
			<td colspan="3" height="75" bgcolor="#FF3300">
				<center>
				<?php echo form_open('https://www.paypal.com/cgi-bin/webscr', '', $hidden); ?>
					<?php echo paypal_input(); ?>
				<?php echo form_close() ?>
				</center>
			</td>
		</tr><tr>
			<td height="35" align="center" valign="middle"><?php echo lang('encryptor.string'); ?>:</td>
			<td align="center" valign="middle"><?php echo $string; ?></td>
		</tr><tr>
			<td width="269" height="35" align="center" valign="middle"><?php echo lang('encryptor.hash'); ?>:</td>
			<td width="269" align="center" valign="middle" ><?php echo $hash.nbs(5); ?></td>
		</tr><tr>
			<th colspan="2" align="center" valign="middle">
		</tr>
		</tbody>
	</table>

<?php echo $foot ?>