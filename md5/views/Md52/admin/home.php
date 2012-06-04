<?php echo $head ?>

<?php echo $menu ?>

<div class="admin-content">
	<div class="alerts <?php echo (empty($alerts) ? 'green' : 'red'); ?>"><?php echo (empty($alerts) ? lang('admin.no_alerts') : $alerts); ?></div>
	<div class="settings-summary">
		<?php foreach($settings as $key => $value): ?>
		<div class="setting key"><?php echo lang('admin.'.$key); ?></div>
		<div class="setting value"><?php echo $value; ?></div>
		<?php endforeach; ?>
	</div>
</div>

<?php echo $foot ?>