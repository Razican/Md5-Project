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
				<div class="content-desc"><?php echo lang('contact.description'); ?>:</div>
				<div class="table">
					<div class="table-row">
						<div class="table-cell-left" style="border-top: none; font-weight: bold; min-width: 125px;"><?php echo lang('contact.nickname'); ?></div>
						<div class="table-cell-left" style="border-top: none; font-weight: bold; min-width: 150px;"><?php echo lang('contact.rank'); ?></div>
						<div class="table-cell-left" style="border-top: none; font-weight: bold; min-width: 250px;"><?php echo lang('contact.email'); ?></div>
						<div class="table-cell-right" style="border-top: none; text-align: center; font-weight: bold;"><?php echo lang('contact.work'); ?></div>
					</div>
					<?php echo contact_table(); ?>
				</div>
			</div>
		</div>

<?php echo $foot ?>