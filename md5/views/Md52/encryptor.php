<?php echo $head ?>

<?php echo $menu ?>

	<table width="548" border="0" height="413"  background="<?php echo skin_path(); ?>images/indextable.png">
		<tbody>
		<tr>
			<td colspan="4" height="160"><b><center>
				<?php echo img(array('src'	=> base_url().'styles/images/logo.png', 'alt'	=> 'Logo')); ?>
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
		<?php echo form_open('encryptor/encrypt'); ?>
		<tr>
			<td width="240" height="50" align="center" valign="middle"><?php echo lang('encryptor.string'); ?>:</td>
			<td width="298" align="left" valign="middle" ><?php echo string_input(); ?></td>
		</tr>
		<tr>
			<td colspan="2" align="center" valign="top"><?php echo string_submit(); ?></td>
		</tr>
		</form>
		</tbody>
	</table>

<?php echo $foot ?>