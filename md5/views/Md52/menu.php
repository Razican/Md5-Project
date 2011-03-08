		<div class="menu-margin"><div class="menu">
			<div class="menu-left"></div>
			<div class="menu-center">
				<div class="menu-choice" style="width: 160px;"><?php echo lang('menu.version'); ?>: <?php echo $this->config->item('version'); ?></div>
				<div class="menu-choice" style="width: 160px;">
					<div id="lang">
					<ul><li class="level1"><a class="level1"><?php echo lang('menu.language'); ?></a>
						<ul>
							<li><?php echo anchor($this->lang->switch_uri('es'),'Español', 'class="level2"'); ?></li>
							<li><?php echo anchor($this->lang->switch_uri('en'),'English', 'class="level2"'); ?></li>
							<li><?php echo anchor($this->lang->switch_uri('eu'),'Euskara', 'class="level2"'); ?></li>
						</ul>
					</li></ul>
					</div>
				</div>
				<div class="menu-choice" style="width: 100px;"><?php echo anchor('', lang('menu.index')); ?></div>
				<div class="menu-choice" style="width: 130px;"><?php echo anchor('contact', lang('menu.contact')); ?></div>
				<div class="menu-choice" style="width: 180px;"><?php echo anchor('changelog', lang('menu.changelog')); ?></div>
			</div>
			<div class="menu-right"></div>
		</div></div>
		<div id="content-wrapper">