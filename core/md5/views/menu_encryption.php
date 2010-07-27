		<table width="720" height="30" border="0" align="center" cellspacing="0">
			<tr align="center" valign="middle">
				<td width="10" style="background: url(<?php echo skin_path(); ?>images/menuleft.png) no-repeat;">&nbsp;</td>
				<td width="125" style="background: url(<?php echo skin_path(); ?>images/menucenter.png);" class="menutext"><?php echo lang('menu.version'); ?>: 2.0</td>
				<td width="115" style="background: url(<?php echo skin_path(); ?>images/menucenter.png);">
					<div id="lang"><ul><li class="level1"><a class="level1"><?php echo lang('menu.language'); ?></a>
						<ul>
							<li><?php echo anchor(base_url().'es/encryptor/','Español', 'class="level2"'); ?></li>
							<li><?php echo anchor(base_url().'en/encryptor/','English', 'class="level2"'); ?></li>
							<li><?php echo anchor(base_url().'eu/encryptor/','Euskara', 'class="level2"'); ?></li>
						</ul>
					</li></ul></div>
				</td>
				<td width="80" style="background: url(<?php echo skin_path(); ?>images/menucenter.png);"><?php echo anchor('', lang('menu.index')); ?></td>
				<td width="80" style="background: url(<?php echo skin_path(); ?>images/menucenter.png);"><?php echo anchor('contact', lang('menu.contact')); ?></td>
				<td width="160" style="background: url(<?php echo skin_path(); ?>images/menucenter.png);"><?php echo anchor('changelog', lang('menu.changelog')); ?></td>
				<td width="160" style="background: url(<?php echo skin_path(); ?>images/menucenter.png);"><?php echo anchor('admin', lang('menu.admin')); ?></td>
				<td width="10" style="background: url(<?php echo skin_path(); ?>images/menuright.png) no-repeat">&nbsp;</td>
			</tr>
		</table>
		<br><br>