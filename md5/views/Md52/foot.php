		</div>
<?php if (!defined('INSTALL')): ?>
		<div class="menu-margin"><div class="menu">
			<div class="menu-left"></div>
			<div class="menu-center"><?php echo lang('foot.now_we'); ?> <?php echo number_format($this->footer->total_hashes(),0,",","."); ?> <?php echo lang('foot.hashes_in'); ?>. <?php echo copyright(); ?></div>
			<div class="menu-right"></div>
		</div></div>
		<?php if ($this->config->item('admin-link')) :?><div class="admin-link"><?php echo anchor('admin', lang('overal.admin')); ?></div><?php endif; ?>
<?php endif; ?>
	</div>
	</body>
</html>