<?php echo $head ?>

<?php echo $menu ?>

	<table width="548" border="0" height="413"  background="<?php echo skin_path(); ?>images/indextable.png">
		<tbody>
		<tr>
			<td colspan="4" height="160"><b><center>
				<?php echo img(array('src'	=> base_url().'styles/images/logo.png', 'alt'	=> 'Logo')); ?>
			</center></b></td>
		</tr><tr>
			<td colspan="3" height="75" bgcolor="#FF3300">
				<center>
				<?php echo form_open('https://www.paypal.com/cgi-bin/webscr', '', $hidden); ?>
					<?php echo paypal_input(); ?>
				<?php echo form_close() ?>
				</center>
			</td>
		</tr><?php echo $result; ?><tr>
			<th colspan="2" align="center" valign="middle">
		</tr>
		</tbody>
	</table>

<?php echo $foot ?>