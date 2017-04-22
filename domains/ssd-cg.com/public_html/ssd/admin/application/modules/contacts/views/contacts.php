<section id="content"> 
<section class="vbox"> <section class="scrollable padder">
	<ul class="breadcrumb no-border no-radius b-b b-light pull-in ">
		
		<li>
		<a href="<?=base_url()?>"><?=lang('home')?>/
		</a>
		</li>
		
		<li class="active">
		<a href="<?=base_url()?>contacts">ارتباط با ما
		</a>
		</li>
		

	</ul>

	

<div class="row">
	<!-- Project events -->
	<div class="col-lg-12">
	<section class="panel">
			<header class="panel-heading"> <i class="fa fa-navicon"></i> جدول ارتباط با ما </header>
			<a href="<?=base_url()?>contacts/add_contacts" class="btn btn-sm btn-primary" style="margin-right:15px;" ><i class="fa fa-plus"></i> <?=lang('add_inf')?></a>

	
	<div class="table-responsive">
							<table  class="table table-striped m-b-none AppendDataTables">
			<thead>
				<tr>
					<th width="40%">آدرس</th>	
					<th width="15%">تلفن</th>	
					<th width="15%">آدرس ایمیل</th>	
					<th width="15%">اینستاگرام</th>	
					<th width="15%"><?=lang('option')?> </th>
				</tr> </thead> <tbody>
				<?php
								if (!empty($contact)) {
				foreach ($contact as $key => $contacts) { ?>
				<tr>
					<td>
					<?=$contacts->address?>
					</td>
					<td>
					<?=$contacts->phone?>
					</td>
					<td>
					<?=$contacts->email?>
					</td>
					<td>
					<?=$contacts->ins?>
					</td>					
					
					
					<td>

					<a href="<?=base_url()?>contacts/edit_contacts/<?=$contacts->id?>" class="btn btn-warning btn-xs" ><i class="icon-note"></i></a>
					<a href="<?=base_url()?>contacts/delete_contacts/<?=$contacts->id?>" class="btn btn-danger btn-xs" data-toggle="ajaxModal">
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
			<header class="panel-heading"> <i class="fa fa-navicon"></i>2 جدول ارتباط با ما </header>

	<div class="table-responsive">
							<table  class="table table-striped m-b-none AppendDataTables">
			<thead>
				<tr>
					<th width="15%">نام</th>	
					<th width="15%">تلفن</th>	
					<th width="15%">آدرس ایمیل</th>	
					<th width="25%">توضیحات</th>	
					<th width="15%">تاریخ</th>	
					<th width="15%"><?=lang('option')?> </th>
				</tr> </thead> <tbody>
				<?php
								if (!empty($con)) {
				foreach ($con as $key => $cons) { ?>
				<tr>
					<td>
					<?=$cons->name?>
					</td>
					<td>
					<?=$cons->phone?>
					</td>
					<td>
					<?=$cons->email?>
					</td>
					<td>
					<?=$cons->description?>
					</td>					
					<td>
					<?=$cons->date2?>
					</td>
					
					<td>

					<a href="<?=base_url()?>contacts/delete_con/<?=$cons->id?>" class="btn btn-danger btn-xs" data-toggle="ajaxModal">
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