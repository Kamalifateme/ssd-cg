<section id="content"> 
<section class="vbox"> <section class="scrollable padder">
	<ul class="breadcrumb no-border no-radius b-b b-light pull-in ">
		
		<li>
		<a href="<?=base_url()?>"><?=lang('home')?>/
		</a>
		</li>
		
		<li class="active">
		<a href="<?=base_url()?>about"><?=lang('Introduction')?>
		</a>
		</li>
		

	</ul>

	<div class="row">
	<!-- Project events -->
	<div class="col-lg-12">
	<section class="panel">
			<header class="panel-heading"> <i class="fa fa-navicon"></i> <?=lang('table_about')?> </header>
			<a href="<?=base_url()?>about/add_about" class="btn btn-sm btn-primary" style="margin-right:15px;" ><i class="fa fa-plus"></i> <?=lang('add_inf')?></a>

	
	<div class="table-responsive">
							<table  class="table table-striped m-b-none AppendDataTables">
			<thead>
				<tr>
					<th width="80%"><?=lang('description')?> </th>	
					<th width="20%"><?=lang('option')?> </th>
				</tr> </thead> <tbody>
				<?php
								if (!empty($about)) {
				foreach ($about as $key => $abouts) { ?>
				<tr>
					<td>
					<?php $ab=$abouts->description;
					$des = htmlspecialchars( (string)$ab );
					$post = substr($des , 0, 800); 
					echo $post;
					?>
					
					</td>
					<td>

					<a href="<?=base_url()?>about/edit_about/<?=$abouts->id?>" class="btn btn-warning btn-xs" ><i class="icon-note"></i></a>
					<a href="<?=base_url()?>about/delete_about/<?=$abouts->id?>" class="btn btn-danger btn-xs" data-toggle="ajaxModal">
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


	<div class="row">
	<!-- Project events -->
	<div class="col-lg-12">
	<section class="panel">
			<header class="panel-heading"> <i class="fa fa-navicon"></i> کاتالوگ</header>
			<a href="<?=base_url()?>about/add_catalog" class="btn btn-sm btn-primary" style="margin-right:15px;" ><i class="fa fa-plus"></i> <?=lang('add_inf')?></a>

	
	<div class="table-responsive">
							<table  class="table table-striped m-b-none AppendDataTables">
			<thead>
				<tr>
					<th width="80%">کاتالوگ</th>	
					<th width="20%"><?=lang('option')?> </th>
				</tr> </thead> <tbody>
				<?php
								if (!empty($catalog)) {
				foreach ($catalog as $key => $catalogs) { ?>
				<tr>
					<td>
					<?=$catalogs->name?>
					</td>
					<td>

					<a href="<?=base_url()?>about/edit_catalog/<?=$catalogs->id?>" class="btn btn-warning btn-xs" ><i class="icon-note"></i></a>
					<a href="<?=base_url()?>about/delete_catalog/<?=$catalogs->id?>" class="btn btn-danger btn-xs" data-toggle="ajaxModal">
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



	<div class="row">
	<!-- Project events -->
	<div class="col-lg-12">
	<section class="panel">
			<header class="panel-heading"> <i class="fa fa-navicon"></i>لوگو مشتریان</header>
			<a href="<?=base_url()?>about/add_customer" class="btn btn-sm btn-primary" style="margin-right:15px;" ><i class="fa fa-plus"></i> <?=lang('add_inf')?></a>

	
	<div class="table-responsive">
							<table  class="table table-striped m-b-none AppendDataTables">
			<thead>
				<tr>
					<th width="40%">نام مشتری</th>
					<th width="40%">لوگو مشتری </th>	
					<th width="20%"><?=lang('option')?> </th>
				</tr> </thead> <tbody>
				<?php
								if (!empty($customer)) {
				foreach ($customer as $key => $customers) { ?>
				<tr>
					<td>
					<?=$customers->name?>
					</td>
					<td>
					<img src="<?=$customers->image?>" width="200px" height="120px" style="border-radius:15px;"
					</td>
					<td>

					<a href="<?=base_url()?>about/edit_customer/<?=$customers->id?>" class="btn btn-warning btn-xs" ><i class="icon-note"></i></a>
					<a href="<?=base_url()?>about/delete_customer/<?=$customers->id?>" class="btn btn-danger btn-xs" data-toggle="ajaxModal">
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