<?php echo $head ?>

<?php echo $menu ?>

	<table width="548" border="0" height="413"  background="<?php echo skin_path(); ?>images/indextable.png">
		<tbody>
		<tr>
			<td colspan="4" height="160"><b><center>
				<?php echo show_logo(); ?>
			</center></b></td>
		</tr><tr>
			<td colspan="3" bgcolor="#FF3300">
				<center>
				<?php echo form_open('https://www.paypal.com/cgi-bin/webscr', '', $hidden); ?>
					<?php echo paypal_input(); ?>
				<?php echo form_close() ?>
				</center>
			</td>
		</tr>
		<?php echo form_open('decryptor/decrypt'); ?>
		<tr>
			<td width="240" height="50" align="center" valign="middle"><?php echo lang('decryptor.hash'); ?>:</td>
			<td width="298" align="left" valign="middle" ><?php echo hash_input(); ?></td>
		</tr>
		<tr>
			<td colspan="2" align="center" valign="top"><?php echo hash_submit(); ?></td>
		</tr>
		<?php echo form_close() ?>
		</tbody>
	</table>

<?php echo $foot ?>