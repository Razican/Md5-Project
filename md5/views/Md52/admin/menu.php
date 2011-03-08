		<div class="menu-margin"><div class="menu">
			<div class="menu-left"></div>
			<div class="menu-center">
				<div class="menu-choice" style="width: 160px;"><?php echo lang('menu.version'); ?>: <?php echo $this->config->item('version'); ?></div>
				<div class="menu-choice" style="width: 130px;">
					<div id="lang" style="width: 130px;">
					<ul><li class="level1" style="width: 130px;"><a class="level1" style="width: 130px;"><?php echo lang('menu.language'); ?></a>
						<ul>
							<li><?php echo anchor($this->lang->switch_uri('es'),'Español', 'class="level2" style="width: 130px;"'); ?></li>
							<li><?php echo anchor($this->lang->switch_uri('en'),'English', 'class="level2" style="width: 130px;"'); ?></li>
							<li><?php echo anchor($this->lang->switch_uri('eu'),'Euskara', 'class="level2" style="width: 130px;"'); ?></li>
						</ul>
					</li></ul>
					</div>
				</div>
				<div class="menu-choice" style="width: 70px;"><?php echo anchor('admin', lang('menu.index')); ?></div>
				<div class="menu-choice" style="width: 150px;"><?php echo anchor('admin/str_gen', lang('admin.str_gen')); ?></div>
				<div class="menu-choice" style="width: 150px;"><?php echo anchor('admin/settings', lang('admin.settings')); ?></div>
				<div class="menu-choice" style="width: 70px;"><?php echo anchor('admin/logout', lang('admin.logout')); ?></div>
			</div>
			<div class="menu-right"></div>
		</div></div>