<?php if (!defined('INSTALL')): ?>
		<table class="menu">
			<tr align="center" valign="middle">
				<td width="10" style="background: url(<?php echo skin_path(); ?>images/menuleft.png) no-repeat;">&nbsp;</td>
				<td width="710" style="background: url(<?php echo skin_path(); ?>images/menucenter.png);" class="menutext"><?php echo lang('foot.now_we'); ?> <?php echo number_format($this->footer->total_hashes(),0,",","."); ?> <?php echo lang('foot.hashes_in'); ?>. <?php echo copyright(); ?></td>
				<td width="10" style="background: url(<?php echo skin_path(); ?>images/menuright.png) no-repeat">&nbsp;</td>
			</tr>
		</table>
		</center>
		<div class="admin_link"><?php echo anchor('admin', lang('overal.admin')); ?></div>
	</body>
</html>
<?php endif; ?>