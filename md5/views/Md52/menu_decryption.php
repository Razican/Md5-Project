		<table class="menu">
			<tr align="center" valign="middle">
				<td width="10" style="background: url(<?php echo skin_path(); ?>images/menuleft.png) no-repeat;">&nbsp;</td>
				<td width="160" style="background: url(<?php echo skin_path(); ?>images/menucenter.png);" class="menutext"><?php echo lang('menu.version'); ?>: <?php echo $this->config->item('version'); ?></td>
				<td width="160" style="background: url(<?php echo skin_path(); ?>images/menucenter.png);">
					<div id="lang"><ul><li class="level1"><a class="level1"><?php echo lang('menu.language'); ?></a>
						<ul>
							<li><?php echo anchor('es/decryptor/','Español', 'class="level2"'); ?></li>
							<li><?php echo anchor('en/decryptor/','English', 'class="level2"'); ?></li>
							<li><?php echo anchor('eu/decryptor/','Euskara', 'class="level2"'); ?></li>
						</ul>
					</li></ul></div>
				</td>
				<td width="100" style="background: url(<?php echo skin_path(); ?>images/menucenter.png);"><?php echo anchor('', lang('menu.index')); ?></td>
				<td width="130" style="background: url(<?php echo skin_path(); ?>images/menucenter.png);"><?php echo anchor('contact', lang('menu.contact')); ?></td>
				<td width="180" style="background: url(<?php echo skin_path(); ?>images/menucenter.png);"><?php echo anchor('changelog', lang('menu.changelog')); ?></td>
				<td width="10" style="background: url(<?php echo skin_path(); ?>images/menuright.png) no-repeat">&nbsp;</td>
			</tr>
		</table>