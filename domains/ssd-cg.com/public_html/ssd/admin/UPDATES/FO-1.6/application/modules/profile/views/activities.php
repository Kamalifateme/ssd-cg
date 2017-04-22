<section id="content"> <section class="vbox"> <section class="scrollable padder">
	<ul class="breadcrumb no-border no-radius b-b b-light pull-in">
		<li><a href="<?=base_url()?>"><i class="fa fa-home"></i> <?=lang('dashboard')?></a></li>
		<li><a href="<?=base_url()?>profile/settings"><?=lang('profile')?></a></li>
		<li class="active"><?=lang('activities')?></li>
	</ul>
	<section class="panel panel-default">
	<header class="panel-heading"> <?=lang('all_activities')?> </header>
	
	<div class="table-responsive">
		<table class="table table-striped b-t b-light text-sm AppendDataTables">
			<thead>
				<tr>	
					<th><?=lang('activity_date')?></th>	
					<th><?=lang('user')?></th>			
					<th><?=lang('module')?></th>
					<th><?=lang('activity')?> </th>
					
				</tr> </thead> <tbody>
				<?php
					if (!empty($activities)) {
					foreach ($activities as $key => $a) { ?>
				<tr>
				<td><?=$a->activity_date?></td>
				<td><?=$this -> applib->get_any_field('account_details',array('user_id'=>$a->user),'fullname')?></td>
				<td><?=strtoupper($a->module)?></td>
				<td><?=$a->activity?></td>
				
			</tr>
			<?php } } ?>
			
	

 </tbody>
</table>
</div>
</section>
</section>
</section>
<a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> </section>