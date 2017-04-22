<section id="content"> 
<section class="vbox"> <section class="scrollable padder">
	<ul class="breadcrumb no-border no-radius b-b b-light pull-in ">
		
		<li>
		<a href="<?=base_url()?>"><?=lang('home')?>/
		</a>
		</li>
		
		<li class="active">
		<a href="<?=base_url()?>mosha">مشاوره
		</a>
		</li>
	</ul>

	
	<div class="row" style="direction:rtl;">
	<div class="col-lg-12">
	<ul class="nav nav-tabs" >
    <li class="active"><a data-toggle="tab" href="#one">چرا SSD</a></li>
    <li><a data-toggle="tab" href="#two">فنی</a></li>
    <li><a data-toggle="tab" href="#three">مالی</a></li>
    <li><a data-toggle="tab" href="#four">مدیریتی</a></li>

	</ul>
	</div>
	</div>
	
	<div class="tab-content">
	
	
    <div id="one" class="tab-pane fade in active" style="background-color:#fff;border:1px #dddddd solid;border-top:none">
		<a href="<?=base_url()?>mosha/add_ssmm" class="btn btn-sm btn-info"  style="margin-right:15px;margin-top:15px;" ><i class="fa fa-plus"></i> <?=lang('add_inf')?></a>

		<table  class="table table-striped m-b-none AppendDataTables">
			<thead>
				<tr>
					<th width="80%">توضیحات</th>	
					<th width="20%"><?=lang('option')?> </th>
				</tr> </thead> <tbody>
				<?php
								if (!empty($ssmm)) {
				foreach ($ssmm as $key => $ssdtt) { ?>
				<tr>

					<td><?=$ssdtt->description?></td>
					<td>

					<a href="<?=base_url()?>mosha/edit_ssmm/<?=$ssdtt->id?>" class="btn btn-warning btn-xs" ><i class="icon-note"></i></a>
					<a href="<?=base_url()?>mosha/delete_ssmm/<?=$ssdtt->id?>" class="btn btn-danger btn-xs" data-toggle="ajaxModal">
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
	
		
		<div id="two" class="tab-pane fade" style="background-color:#fff;border:1px #dddddd solid;border-top:none">
<a href="<?=base_url()?>mosha/add_fani" class="btn btn-sm btn-info"  style="margin-right:15px;margin-top:15px;" ><i class="fa fa-plus"></i> <?=lang('add_inf')?></a>

		<table  class="table table-striped m-b-none AppendDataTables">
			<thead>
				<tr>
					<th width="30%">نام دوره</th>	
					<th width="40%">توضیحات</th>	
					<th width="10%"><?=lang('option')?> </th>
				</tr> </thead> <tbody>
				<?php
								if (!empty($fani)) {
				foreach ($fani as $key => $fanis) { ?>
				<tr>

					<td><?=$fanis->name?></td>
					<td><?=$fanis->description?></td>
					<td>
					<a href="<?=base_url()?>mosha/edit_fani/<?=$fanis->id?>" class="btn btn-warning btn-xs" ><i class="icon-note"></i></a>
					<a href="<?=base_url()?>mosha/delete_fani/<?=$fanis->id?>" class="btn btn-danger btn-xs" data-toggle="ajaxModal">
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
	
	
<div id="three" class="tab-pane fade" style="background-color:#fff;border:1px #dddddd solid;border-top:none">
<a href="<?=base_url()?>mosha/add_mali" class="btn btn-sm btn-info"  style="margin-right:15px;margin-top:15px;" ><i class="fa fa-plus"></i> <?=lang('add_inf')?></a>

		<table  class="table table-striped m-b-none AppendDataTables">
			<thead>
				<tr>
					<th width="30%">نام دوره</th>	
					<th width="40%">توضیحات</th>	
					<th width="10%"><?=lang('option')?> </th>
				</tr> </thead> <tbody>
				<?php
								if (!empty($mali)) {
				foreach ($mali as $key => $malis) { ?>
				<tr>

					<td><?=$malis->name?></td>
					<td><?=$malis->description?></td>
					<td>
					<a href="<?=base_url()?>mosha/edit_mali/<?=$malis->id?>" class="btn btn-warning btn-xs" ><i class="icon-note"></i></a>
					<a href="<?=base_url()?>mosha/delete_mali/<?=$malis->id?>" class="btn btn-danger btn-xs" data-toggle="ajaxModal">
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
	
	
    <div id="four" class="tab-pane fade" style="background-color:#fff;border:1px #dddddd solid;border-top:none">
<a href="<?=base_url()?>mosha/add_man" class="btn btn-sm btn-info"  style="margin-right:15px;margin-top:15px;" ><i class="fa fa-plus"></i> <?=lang('add_inf')?></a>

		<table  class="table table-striped m-b-none AppendDataTables">
			<thead>
				<tr>
					<th width="30%">نام دوره</th>	
					<th width="40%">توضیحات</th>	
					<th width="10%"><?=lang('option')?> </th>
				</tr> </thead> <tbody>
				<?php
								if (!empty($man)) {
				foreach ($man as $key => $mans) { ?>
				<tr>

					<td><?=$mans->name?></td>
					<td><?=$mans->description?></td>
					<td>
					<a href="<?=base_url()?>mosha/edit_man/<?=$mans->id?>" class="btn btn-warning btn-xs" ><i class="icon-note"></i></a>
					<a href="<?=base_url()?>mosha/delete_man/<?=$mans->id?>" class="btn btn-danger btn-xs" data-toggle="ajaxModal">
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



</section>
</section>
<a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> </section>