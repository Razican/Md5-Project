<?php echo $head ?>

<?php echo $menu ?>

		<div class="content-wrapper">
			<div class="content-logo"><?php echo img(array('src'	=> base_url().'styles/images/logo.png', 'id' => 'logo', 'alt' => 'Logo')); ?></div>
			<div class="content">
				<div class="paypal-form">
					<?php echo form_open('https://www.paypal.com/cgi-bin/webscr', '', $hidden); ?>
						<?php echo paypal_input(); ?>
					<?php echo form_close() ?>
				</div>
				<div class="content-desc"><?php echo lang('home.description'); ?>:</div>
				<div class="home-button"><input type="image" src="<?php echo skin_path(); ?>images/<?php echo $this->lang->lang(); ?>/encryptor.png" alt="<?php echo lang('home.encryptor'); ?>" onClick="top.location.href='<?php echo $this->lang->lang(); ?>/encryptor'" ></div>
				<div class="home-button"><input type="image" src="<?php echo skin_path(); ?>images/<?php echo $this->lang->lang(); ?>/decryptor.png" alt="<?php echo lang('home.encryptor'); ?>" onClick="top.location.href='<?php echo $this->lang->lang(); ?>/encryptor'" ></div>
			</div>
		</div>

<?php echo $foot ?>