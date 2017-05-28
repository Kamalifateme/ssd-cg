<section id="content"> 
<section class="vbox"> <section class="scrollable padder">
<script src="jquery.js"></script>
	<ul class="breadcrumb no-border no-radius b-b b-light pull-in ">
		
		<li>
		<a href="<?=base_url()?>"><?=lang('home')?>/
		</a>
		</li>
		
		<li class="active">
		<a href="<?=base_url()?>tutorial">آموزش
		</a>
		</li>
	</ul>

	
	<div class="row" style="direction:rtl;">
	<div class="col-lg-12">
	<ul class="nav nav-tabs" >
    <li class="active"><a data-toggle="tab" href="#one">چرا SSD</a></li>
    <li><a data-toggle="tab" href="#two">دوره های یادگیری</a></li>
    <li><a data-toggle="tab" href="#three">آموزش آنلاین</a></li>
    <li><a data-toggle="tab" href="#four">(اضافه کردن عنوان)آرشیو تصاویر</a></li>
	<li><a data-toggle="tab" href="#five">(اضافه کردن گالری به عنوان)آرشیو تصاویر</a></li>

	</ul>
	</div>
	</div>
	
	<div class="tab-content">
	
	
    <div id="one" class="tab-pane fade in active" style="background-color:#fff;border:1px #dddddd solid;border-top:none">
		<a href="<?=base_url()?>tutorial/add_ssd" class="btn btn-sm btn-info"  style="margin-right:15px;margin-top:15px;" ><i class="fa fa-plus"></i> <?=lang('add_inf')?></a>

		<table  class="table table-striped m-b-none AppendDataTables">
			<thead>
				<tr>
					<th width="80%">توضیحات</th>	
					<th width="20%"><?=lang('option')?> </th>
				</tr> </thead> <tbody>
				<?php
								if (!empty($simt)) {
				foreach ($simt as $key => $ssdtt) { ?>
				<tr>

					<td><?=$ssdtt->ssd?></td>
					<td>

					<a href="<?=base_url()?>tutorial/edit_ssd/<?=$ssdtt->id?>" class="btn btn-warning btn-xs" ><i class="icon-note"></i></a>
					<a href="<?=base_url()?>tutorial/delete_ssd/<?=$ssdtt->id?>" class="btn btn-danger btn-xs" data-toggle="ajaxModal">
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
<a href="<?=base_url()?>tutorial/add_learn" class="btn btn-sm btn-info"  style="margin-right:15px;margin-top:15px;" ><i class="fa fa-plus"></i> <?=lang('add_inf')?></a>

		<table  class="table table-striped m-b-none AppendDataTables">
			<thead>
				<tr>
					<th width="25%">نام دوره</th>	
					<th width="55%">توضیحات</th>	
					<th width="20%"><?=lang('option')?> </th>
				</tr> </thead> <tbody>
				<?php
								if (!empty($learn)) {
				foreach ($learn as $key => $learns) { ?>
				<tr>

					<td><?=$learns->name?></td>
					<td><?=$learns->description?></td>

					<td>
					<a href="<?=base_url()?>tutorial/edit_learn/<?=$learns->id?>" class="btn btn-warning btn-xs" ><i class="icon-note"></i></a>
					<a href="<?=base_url()?>tutorial/delete_learn/<?=$learns->id?>" class="btn btn-danger btn-xs" data-toggle="ajaxModal">
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
<a href="<?=base_url()?>tutorial/add_sabt" class="btn btn-sm btn-info"  style="margin-right:15px;margin-top:15px;" ><i class="fa fa-plus"></i> <?=lang('add_inf')?></a>

		<table  class="table table-striped m-b-none AppendDataTables">
			<thead>
				<tr>
					<th width="30%">عنوان</th>	
					<th width="40%">توضیحات</th>
					<th width="10%"><?=lang('option')?> </th>
				</tr> </thead> <tbody>
				<?php
								if (!empty($sabt)) {
				foreach ($sabt as $key => $sabts) { ?>
				<tr>

					<td><?=$sabts->name?></td>
					<td><?=$sabts->description?></td>
					<td>

					<a href="<?=base_url()?>tutorial/edit_sabt/<?=$sabts->id?>" class="btn btn-warning btn-xs" ><i class="icon-note"></i></a>
					<a href="<?=base_url()?>tutorial/delete_sabt/<?=$sabts->id?>" class="btn btn-danger btn-xs" data-toggle="ajaxModal">
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
<a href="<?=base_url()?>tutorial/add_archiveo" class="btn btn-sm btn-info"  style="margin-right:15px;margin-top:15px;" ><i class="fa fa-plus"></i> <?=lang('add_inf')?></a>

		<table  class="table table-striped m-b-none AppendDataTables">
			<thead>
				<tr>
					<th width="30%">عنوان </th>	
					<th width="60%">توضیحات</th>	
					<th width="10%"><?=lang('option')?> </th>
				</tr> </thead> <tbody>
				<?php
								if (!empty($onvan)) {
				foreach ($onvan as $key => $onvans) { ?>
				<tr>

					<td><?=$onvans->name?></td>
					<td><?=$onvans->description?></td>
					<td>

					<a href="<?=base_url()?>tutorial/edit_archiveo/<?=$onvans->id?>" class="btn btn-warning btn-xs" ><i class="icon-note"></i></a>
					<a href="<?=base_url()?>tutorial/delete_archiveo/<?=$onvans->id?>" class="btn btn-danger btn-xs" data-toggle="ajaxModal">
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
	

    <div id="five" class="tab-pane fade" style="background-color:#fff;border:1px #dddddd solid;border-top:none">
<a href="<?=base_url()?>tutorial/add_archiveg" class="btn btn-sm btn-info"  style="margin-right:15px;margin-top:15px;" ><i class="fa fa-plus"></i> <?=lang('add_inf')?></a>

		<table  class="table table-striped m-b-none AppendDataTables">
			<thead>
				<tr>
					<th width="60%">توضیحات</th>	
					<th width="10%"><?=lang('option')?> </th>
				</tr> </thead> <tbody>
				<?php
								if (!empty($archiveg)) {
				foreach ($archiveg as $key => $sss) { ?>
				<tr>

					<td><img src="<?=$sss->image?>" width="220px" height="120px;"></td>
					<td>

					<a href="<?=base_url()?>tutorial/edit_archiveg/<?=$sss->id?>" class="btn btn-warning btn-xs" ><i class="icon-note"></i></a>
					<a href="<?=base_url()?>tutorial/delete_archiveg/<?=$sss->id?>" class="btn btn-danger btn-xs" data-toggle="ajaxModal">
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