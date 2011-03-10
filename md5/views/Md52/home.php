<?php echo $head ?>

<?php echo $menu ?>

		<div class="content">
			<div class="content-logo"><?php echo img(array('src'	=> base_url().'styles/images/logo.png', 'alt'	=> 'Logo')); ?></div>
			<div class="paypal-form">
				<?php echo form_open('https://www.paypal.com/cgi-bin/webscr', '', $hidden); ?>
					<?php echo paypal_input(); ?>
				<?php echo form_close() ?>
			</div>
			<div class="content-desc"><?php echo lang('home.description'); ?>:</div>
			<div class="home-button"><input type="image" src="<?php echo skin_path(); ?>images/<?php echo $this->lang->lang(); ?>/encryptor.png" alt="<?php echo lang('home.encryptor'); ?>" onClick="top.location.href='<?php echo $this->lang->lang(); ?>/encryptor'" ></div>
			<div class="home-button"><input type="image" src="<?php echo skin_path(); ?>images/<?php echo $this->lang->lang(); ?>/encryptor.png" alt="<?php echo lang('home.encryptor'); ?>" onClick="top.location.href='<?php echo $this->lang->lang(); ?>/encryptor'" ></div>
		</div>

		<table width="548" border="0" height="413"  background="<?php echo skin_path(); ?>images/indextable.png">
			<tbody>
			<tr>
				<td colspan="3" height="130"><b><center><?php echo img(array('src'	=> base_url().'styles/images/logo.png', 'alt'	=> 'Logo')); ?></center></b></td>
			</tr><tr>
				<td colspan="3" height="82" bgcolor="#FF3300">
				<center>
					<?php echo form_open('https://www.paypal.com/cgi-bin/webscr', '', $hidden); ?>
						<?php echo paypal_input(); ?>
					<?php echo form_close() ?>
				</center>
				</td>
			</tr><tr>
				<th height="82" colspan="3"><font color="orange"><?php echo lang('home.description'); ?>:</font></th>
			</tr><tr height="100">
				<th height="89"><input type="image" src="<?php echo skin_path(); ?>images/<?php echo $this->lang->lang(); ?>/encryptor.png" alt="<?php echo lang('home.encryptor'); ?>" onClick="top.location.href= '<?php echo $this->lang->lang(); ?>/encryptor'" ></th>
				<th><input type="image" src="<?php echo skin_path(); ?>images/<?php echo $this->lang->lang(); ?>/decryptor.png" alt="<?php echo lang('home.decryptor'); ?>" onClick="top.location.href= '<?php echo $this->lang->lang(); ?>/decryptor'" ></th>
			</tr>
			</tbody>
		</table>

<?php echo $foot ?>