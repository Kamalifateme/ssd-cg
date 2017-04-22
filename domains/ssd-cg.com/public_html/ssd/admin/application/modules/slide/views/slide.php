<section id="content"> 
<section class="vbox"> <section class="scrollable padder">
	<ul class="breadcrumb no-border no-radius b-b b-light pull-in ">
		
		<li>
		<a href="<?=base_url()?>"><?=lang('home')?>/
		</a>
		</li>
		
		<li class="active">
		<a href="<?=base_url()?>slide"><?=lang('slider')?>
		</a>
		</li>
		

	</ul>

	<div class="row">
	<!-- Project events -->
	<div class="col-lg-12">
	<section class="panel">
			<header class="panel-heading"> <i class="fa fa-navicon"></i> <?=lang('table_slide')?> </header>
			<a href="<?=base_url()?>slide/add_slide" class="btn btn-sm btn-info"  style="margin-right:15px;" ><i class="fa fa-plus"></i> <?=lang('add_inf')?></a>

	
	<div class="table-responsive">
							<table  class="table table-striped m-b-none AppendDataTables">
			<thead>
				<tr>
					<th width="30%"><?=lang('slider')?> </th>	
					<th width="30%"><?=lang('title')?> </th>
					<th width="20%">لینک</th>
					
					<th width="20%"><?=lang('option')?> </th>
				</tr> </thead> <tbody>
				<?php
				if (!empty($slide)) {
				foreach ($slide as $key => $slider) { ?>
				<tr>
				
					<td><img src="<?=$slider->slider?>" width="200px" height="120px;" style="border-radius:15px;"/></td>
					<td><?=$slider->title?></td>
					<td><?=$slider->link?></td>
					<td>

					<a href="<?=base_url()?>slide/edit_slide/<?=$slider->id?>" class="btn btn-warning btn-xs" ><i class="icon-note"></i></a>
					<a href="<?=base_url()?>slide/delete_slide/<?=$slider->id?>" class="btn btn-danger btn-xs" data-toggle="ajaxModal">
					<i class="icon-trash"></i></a>
					</td>
				</tr>
				<?php  }} else{ ?>
				<tr>
					<td></td><td><?=lang('nothing_to_display')?></td><td></td><td></td>
				</tr>
				<?php } ?>
				
				
				
			</tbody>
		</table>
	</div>
</div>

<!-- End Project events -->

</div>










	</section>
</section>
</section>
<a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> </section>