<section id="content"> 
<section class="vbox"> <section class="scrollable padder">
	<ul class="breadcrumb no-border no-radius b-b b-light pull-in ">
		
		<li>
		<a href="<?=base_url()?>"><?=lang('home')?>/
		</a>
		</li>
		
		<li class="active">
		<a href="<?=base_url()?>work">کارآفرینی و کسب  وکار
		</a>
		</li>
		

	</ul>

	<div class="row" style="direction:rtl;">
	<div class="col-lg-12">
	<ul class="nav nav-tabs" >
    <li class="active"><a data-toggle="tab" href="#one">مجله کارآفرینی</a></li>
    <li><a data-toggle="tab" href="#two">رهبری کسب و کار و دارایی ها</a></li>
    <li><a data-toggle="tab" href="#three">تکنولوژی و شبکه های اجتماعی</a></li>
    <li><a data-toggle="tab" href="#four">استراتژی های رشد و علم فروش</a></li>
	</ul>
	</div>
	</div>
	
	
	<div class="tab-content">
	
	
    <div id="one" class="tab-pane fade in active" style="background-color:#fff;border:1px #dddddd solid;border-top:none">
		<a href="<?=base_url()?>work/add_ssmw" class="btn btn-sm btn-info"  style="margin-right:15px;margin-top:15px;" ><i class="fa fa-plus"></i> <?=lang('add_inf')?></a>

		<table  class="table table-striped m-b-none AppendDataTables">
			<thead>
				<tr>
					<th width="80%">توضیحات</th>	
					<th width="20%"><?=lang('option')?> </th>
				</tr> </thead> <tbody>
				<?php
								if (!empty($ssmw)) {
				foreach ($ssmw as $key => $ssdtt) { ?>
				<tr>

					<td><?=$ssdtt->description?></td>
					<td>

					<a href="<?=base_url()?>work/edit_ssmw/<?=$ssdtt->id?>" class="btn btn-warning btn-xs" ><i class="icon-note"></i></a>
					<a href="<?=base_url()?>work/delete_ssmw/<?=$ssdtt->id?>" class="btn btn-danger btn-xs" data-toggle="ajaxModal">
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
<a href="<?=base_url()?>work/add_dan" class="btn btn-sm btn-info"  style="margin-right:15px;margin-top:15px;" ><i class="fa fa-plus"></i> <?=lang('add_inf')?></a>

		<table  class="table table-striped m-b-none AppendDataTables">
			<thead>
				<tr>
					<th width="30%">نام دوره</th>	
					<th width="40%">توضیحات</th>	
					<th width="10%"><?=lang('option')?> </th>
				</tr> </thead> <tbody>
				<?php
								if (!empty($dan)) {
				foreach ($dan as $key => $dans) { ?>
				<tr>

					<td><?=$dans->name?></td>
					<td><?=$dans->description?></td>
					<td>
					<a href="<?=base_url()?>work/edit_dan/<?=$dans->id?>" class="btn btn-warning btn-xs" ><i class="icon-note"></i></a>
					<a href="<?=base_url()?>work/delete_dan/<?=$dans->id?>" class="btn btn-danger btn-xs" data-toggle="ajaxModal">
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
<a href="<?=base_url()?>work/add_clinic" class="btn btn-sm btn-info"  style="margin-right:15px;margin-top:15px;" ><i class="fa fa-plus"></i> <?=lang('add_inf')?></a>

		<table  class="table table-striped m-b-none AppendDataTables">
			<thead>
				<tr>
					<th width="30%">نام دوره</th>	
					<th width="40%">توضیحات</th>	
					<th width="10%"><?=lang('option')?> </th>
				</tr> </thead> <tbody>
				<?php
								if (!empty($clinic)) {
				foreach ($clinic as $key => $clinics) { ?>
				<tr>

					<td><?=$clinics->name?></td>
					<td><?=$clinics->description?></td>
					<td>
					<a href="<?=base_url()?>work/edit_clinic/<?=$clinics->id?>" class="btn btn-warning btn-xs" ><i class="icon-note"></i></a>
					<a href="<?=base_url()?>work/delete_clinic/<?=$clinics->id?>" class="btn btn-danger btn-xs" data-toggle="ajaxModal">
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
<a href="<?=base_url()?>work/add_service" class="btn btn-sm btn-info"  style="margin-right:15px;margin-top:15px;" ><i class="fa fa-plus"></i> <?=lang('add_inf')?></a>

		<table  class="table table-striped m-b-none AppendDataTables">
			<thead>
				<tr>
					<th width="30%">نام دوره</th>	
					<th width="40%">توضیحات</th>	
					<th width="10%"><?=lang('option')?> </th>
				</tr> </thead> <tbody>
				<?php
								if (!empty($service)) {
				foreach ($service as $key => $services) { ?>
				<tr>

					<td><?=$services->name?></td>
					<td><?=$services->description?></td>
					<td>
					<a href="<?=base_url()?>work/edit_service/<?=$services->id?>" class="btn btn-warning btn-xs" ><i class="icon-note"></i></a>
					<a href="<?=base_url()?>work/delete_service/<?=$services->id?>" class="btn btn-danger btn-xs" data-toggle="ajaxModal">
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
</section>
<a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> </section>