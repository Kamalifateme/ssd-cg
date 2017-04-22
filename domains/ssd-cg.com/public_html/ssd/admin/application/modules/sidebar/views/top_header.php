<header class="bg-dark  header navbar navbar-fixed-top-xs hidden-xs"  >
	<div class="navbar-header aside-md navbar-right logo" style="text-align: center;direction:rtl;height:55px;z-index:9999;width:219px" > 
	<a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav"> <i class="fa fa-bars"></i> </a> 
	<img style='width:60px;height:auto;margin-top:2px;' src="<?=base_url()?>resource/images/<?=config_item('company_logo')?>" class="m-r-sm">
	<a ><?=$this->config->item('company_name')?></a>
	</div>
			<ul class="nav navbar-nav navbar-left hidden-xs nav-user side" style="margin-left:15px;">
					<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="thumb-sm avatar pull-left"> 
						<img src="<?=base_url()?>resource/avatar/<?=$this->user_profile->get_profile_details($this->tank_auth->get_user_id(),'avatar') ?>">
						</span> <?php 
	echo $this->user_profile->get_profile_details($this->tank_auth->get_user_id(),'fullname') ? $this->user_profile->get_profile_details($this->tank_auth->get_user_id(),'fullname') : $this->tank_auth->get_username()?> <b class="caret"></b> </a>
						<ul class="dropdown-menu animated fadeInRight" style="width:200px;">

							<li><a href="<?=base_url()?>settings"><i class="icon-settings"></i> <?=lang('settings')?></a> </li>
							
							<?php
							$role = $this->tank_auth->user_role($this->tank_auth->get_role_id());
							if ($role == 'admin') { ?>
							<li> <a href="<?=base_url()?>calenders/"><i class="icon-calendar"></i> <?=lang('add_calender')?></a></li>
							<?php }
							?>
							
							<li class="divider"></li>
							<li> <a href="<?=base_url()?>auth/logout" ><i class="icon-logout"></i> <?=lang('logout')?></a> </li>
						</ul> </li>
					</ul>
					
					
					
		<ul class="nav navbar-nav navbar-left hidden-xs">
		<li class="dropdown">
		<a href="#" class="dropdown-toggle "  data-toggle="fullscreen"> <i class="icon-size-fullscreen"></i>
			<span class="font-bold"></span>
		</a> 	
			</li>
		</ul>	
		
	
			
		<ul class="nav navbar-nav navbar-left hidden-xs">
		<li class="dropdown">
		<a href="#" class="dropdown-toggle " data-toggle="dropdown"> <i class="icon-envelope-open" ></i>
			<span class="font-bold"></span>
		</a> 						
		<ul class="dropdown-menu animated fadeInRight" style="width:270px;">
					<?php
					$query = $this->db->query("select * from fx_contacts ORDER BY id DESC");
					foreach ($query->result() as $row)
					{
					?>
						<li style="padding:5px; border-bottom:1px #EFF2F6 solid;">
					<span style="color:#888888; width:70%; display:inline-block;"><?php echo $row->name; ?></span>
					<span class="label label-info" style="width:28%; display:inline-block;"><?php echo $row->date; ?></span>	
					</li>
					<?php
					}
					?>
					<li><a href="<?=base_url()?>contacts/"><center><span class="label label-danger" style="width:50%; display:inline-block;font-size:13px;"><?=lang('viwe_all')?></span><center></a></li>

			</ul> 			
			</li>
			</ul>
			
		<ul class="nav navbar-nav navbar-left hidden-xs">
		<li class="dropdown">
		<a href="#" class="dropdown-toggle " data-toggle="dropdown"> <i class="icon-calendar" ></i>
			<span class="font-bold"></span>
		</a> 						
		<ul class="dropdown-menu animated fadeInRight" style="width:330px;">
					<?php
					$query = $this->db->query("select * from fx_events ORDER BY id DESC");
					foreach ($query->result() as $row)
					{
					?>
					<li style="padding:5px; border-bottom:1px #EFF2F6 solid;">
					<span style="color:#888888; width:50%; display:inline-block;"><?php echo $row->title; ?></span>
					<span class="label label-info" style="width:24%; display:inline-block;"><?php echo $row->start_date; ?></span>
					<span class="label label-warning" style="width:24%; display:inline-block;"><?php echo $row->end_date; ?></span>	
					
					</li>
					<?php

					}
					?>
					<li><a href="<?=base_url()?>calenders/"><center><span class="label label-danger" style="width:50%; display:inline-block;font-size:13px;"><?=lang('viwe_all')?></span></center></a></li>

			</ul>
						</li>
			</ul>
					
				</header>
				
				
	<header class="bg-dark  header navbar navbar-fixed-top-xs visible-xs" style="margin-bottom:-52px;top:0px;" >
	<div class="navbar-header aside-md navbar-right" style="text-align: center;direction:rtl;" > 
	<a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav" style="color:#777777"> <i class="fa  fa-align-justify" style="color:#777777"></i> منو</a> 
	</div>
	</header>
				
				
				
				
				