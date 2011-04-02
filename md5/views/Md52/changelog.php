<?php echo $head ?>

<?php echo $menu ?>

		<div class="content-wrapper">
			<div class="content-logo"><?php echo img(array('src'	=> base_url().'styles/images/logo.png', 'id' => 'logo', 'alt' => 'Logo')); ?></div>
			<div class="content">
				<div class="paypal-form">
					<?php echo form_open('https://www.paypal.com/cgi-bin/webscr', '', array('cmd' => '_s-xclick', 'hosted_button_id' => '8255830')); ?>
						<?php echo paypal_input(); ?>
					<?php echo form_close() ?>
				</div>
				<div class="content-desc"><?php echo lang('changelog.desc_long'); ?>:</div>
				<div class="changelog-table">
					<div class="changelog-row">
						<div class="changelog-cell-left" style="border-top: none; font-weight: bold;"><?php echo lang('changelog.version'); ?></div>
						<div class="changelog-cell-right" style="border-top: none; text-align: center; font-weight: bold;"><?php echo lang('changelog.description'); ?></div>
					</div>
					<?php echo changelog_table(); ?>
				</div>
			</div>
		</div>

<?php echo $foot ?>