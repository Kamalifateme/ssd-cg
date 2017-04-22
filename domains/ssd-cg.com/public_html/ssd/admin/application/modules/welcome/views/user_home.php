<section id="content"> <section class="vbox"> <section class="scrollable padder">
	<ul class="breadcrumb no-border no-radius b-b b-light pull-in">
		<li>
		<a href="<?=base_url()?>"><?=lang('home')?>
		</a>
		</li>	</ul>
	<div class="m-b-md"> <h3 class="m-b-none"><?=lang('dashboard')?></h3>
		<small><?=lang('welcome_back')?> , <?php
		echo $this->user_profile->get_profile_details($this->tank_auth->get_user_id(),'fullname')  ? $this->user_profile->get_profile_details($this->tank_auth->get_user_id(),'fullname') : $this->tank_auth->get_username()?> </small>
	</div>
	<section >
		<div class="row m-l-none m-r-none bg-dark lter" style="border: 1px solid #e7e7e7;">
			<a class="clear" href="<?=base_url()?>drug">
			<div class="col-sm-6 col-md-3 padder-v b-dark">
			
				<span class="fa-stack fa-2x pull-left m-r-sm"> <i class="fa fa-circle fa-stack-2x text-dark"></i> <i class="fa fa-flask fa-stack-1x text-white"></i>
				</span> 
				<span class="h3 block m-t-xs text-dark"><strong><?=$this->user_profile->count_table_rows('blog')?> </strong>
				</span> <small class="text-muted text-uc"><?=lang('drug')?> </small> </a>
			</div>
			<div class="col-sm-6 col-md-3 padder-v b-r b-dark">
			<a class="clear" href="<?=base_url()?>hospital">
				<span class="fa-stack fa-2x pull-left m-r-sm"> <i class="fa fa-circle fa-stack-2x text-info"></i> <i class="fa fa-building fa-stack-1x text-white"></i>
				</span> 
				<span class="h3 block m-t-xs text-dark"><strong><?=$this->user_profile->count_table_rows('blog')?></strong>
				</span> <small class="text-muted text-uc"><?=lang('hospital')?>  </small> </a>
			</div>
			<div class="col-sm-6 col-md-3 padder-v b-r b-dark">
			<a class="clear" href="<?=base_url()?>contacts">
				<span class="fa-stack fa-2x pull-left m-r-sm"> <i class="fa fa-circle fa-stack-2x text-danger"></i> <i class="fa  fa-send fa-stack-1x text-white"></i>
				</span> 
				<span class="h3 block m-t-xs text-dark"><strong><?=$this->user_profile->count_table_rows('contacts')?> </strong></span>
				<small class="text-muted text-uc"><?=lang('Contact_Us')?>  </small> </a>
			</div>
			<div class="col-sm-6 col-md-3 padder-v b-r b-dark ">
			<a class="clear" href="<?=base_url()?>users/account/active">
				<span class="fa-stack fa-2x pull-left m-r-sm"> <i class="fa fa-circle fa-stack-2x text-success"></i> <i class="fa fa-user fa-stack-1x text-white"></i>
				</span> 
				<span class="h3 block m-t-xs text-dark"><strong><?=$this->user_profile->count_table_rows('users')?></strong>
				</span> <small class="text-muted text-uc"><?=lang('users')?>  </small> </a>
			</div>
		</div> </section>
		<div class="row">
			<div class="col-md-12">
				<section class="panel">
				<header class="panel-heading"><i class=" icon-calendar"></i> <?=lang('project_calendar')?></header>
				<div class="panel-body">
					
				<a href="<?=base_url()?>calenders" class="btn btn-dark" > <i class="icon-pencil"></i><?=lang('add_calender')?></a><br><br><br>
				<div id='calendar'></div>
								
					</div> 
				</section>
			</div>

	</div>
	
			</section>
		</section>
	<a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> </section>