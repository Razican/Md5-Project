<?php echo $head ?>

<?php echo $menu ?>

<div class="admin-content">
	<div class="alerts <?php echo (empty($alerts) ? 'green' : 'red'); ?>"><?php echo (empty($alerts) ? lang('admin.no_alerts') : $alerts); ?></div>
	<div class="settings-summary"><?php echo "Resumen de la configuración"//$settings; ?>
</div>

<?php echo $foot ?>