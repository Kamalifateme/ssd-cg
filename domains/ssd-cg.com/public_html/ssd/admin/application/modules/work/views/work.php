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
    <!--<li class="active"><a data-toggle="tab" href="#one">چرا SSD</a></li>
    <li><a data-toggle="tab" href="#two">دانستنیهای کسب و کار</a></li>
    <li><a data-toggle="tab" href="#three">کلینیک کسب و کار</a></li>
    <li><a data-toggle="tab" href="#four">خدمات کارآفرینی و کسب و کار</a></li>!-->
    <li class="active"><a data-toggle="tab" href="#five">رهبری</a></li>
    <li><a data-toggle="tab" href="#six">استراتژی های رشد</a></li>
    <li><a data-toggle="tab" href="#seven">بازاریابی</a></li>
    <li><a data-toggle="tab" href="#eight">تکنولوژی</a></li>
    <li><a data-toggle="tab" href="#nine">رسانه های اجتماعی</a></li>
    <li><a data-toggle="tab" href="#ten">مالی</a></li>
    <li><a data-toggle="tab" href="#eleven">کارآفرینی</a></li>
    <li><a data-toggle="tab" href="#towelve">شروع یک کسب و کار</a></li>
    <li><a data-toggle="tab" href="#therteen">فرانشیز</a></li>
    <li><a data-toggle="tab" href="#fourteen">مجله</a></li>
	</ul>
	</div>
	</div>
	
	
	<div class="tab-content">
	
	
    <!-- <div id="one" class="tab-pane fade in active" style="background-color:#fff;border:1px #dddddd solid;border-top:none">
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
    </div>!-->
	<div id="five" class="tab-pane fade in active" style="background-color:#fff;border:1px #dddddd solid;border-top:none">
<a href="<?=base_url()?>work/add_lead" class="btn btn-sm btn-info"  style="margin-right:15px;margin-top:15px;" ><i class="fa fa-plus"></i> <?=lang('add_inf')?></a>

		<table  class="table table-striped m-b-none AppendDataTables">
			<thead>
				<tr>
					<th width="30%">عنوان</th>	
					<th width="40%">توضیحات</th>	
					<th width="10%"><?=lang('option')?> </th>
				</tr> </thead> <tbody>
				<?php
								if (!empty($lead)) {
				foreach ($lead as $key => $leads) { ?>
				<tr>

					<td><?=$leads->name?></td>
					<td><?=$leads->description?></td>
					<td>
					<a href="<?=base_url()?>work/edit_lead/<?=$leads->id?>" class="btn btn-warning btn-xs" ><i class="icon-note"></i></a>
					<a href="<?=base_url()?>work/delete_lead/<?=$leads->id?>" class="btn btn-danger btn-xs" data-toggle="ajaxModal">
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
    <div id="six" class="tab-pane fade" style="background-color:#fff;border:1px #dddddd solid;border-top:none">
<a href="<?=base_url()?>work/add_grow" class="btn btn-sm btn-info"  style="margin-right:15px;margin-top:15px;" ><i class="fa fa-plus"></i> <?=lang('add_inf')?></a>

		<table  class="table table-striped m-b-none AppendDataTables">
			<thead>
				<tr>
					<th width="30%">عنوان</th>	
					<th width="40%">توضیحات</th>	
					<th width="10%"><?=lang('option')?> </th>
				</tr> </thead> <tbody>
				<?php
								if (!empty($grow)) {
				foreach ($lead as $key => $grows) { ?>
				<tr>

					<td><?=$grows->name?></td>
					<td><?=$grows->description?></td>
					<td>
					<a href="<?=base_url()?>work/edit_grow/<?=$grows->id?>" class="btn btn-warning btn-xs" ><i class="icon-note"></i></a>
					<a href="<?=base_url()?>work/delete_grow/<?=$grows->id?>" class="btn btn-danger btn-xs" data-toggle="ajaxModal">
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
    <div id="seven" class="tab-pane fade" style="background-color:#fff;border:1px #dddddd solid;border-top:none">
<a href="<?=base_url()?>work/add_marketing" class="btn btn-sm btn-info"  style="margin-right:15px;margin-top:15px;" ><i class="fa fa-plus"></i> <?=lang('add_inf')?></a>

		<table  class="table table-striped m-b-none AppendDataTables">
			<thead>
				<tr>
					<th width="30%">عنوان</th>	
					<th width="40%">توضیحات</th>	
					<th width="10%"><?=lang('option')?> </th>
				</tr> </thead> <tbody>
				<?php
								if (!empty($marketing)) {
				foreach ($marketing as $key => $marketings) { ?>
				<tr>

					<td><?=$marketings->name?></td>
					<td><?=$marketings->description?></td>
					<td>
					<a href="<?=base_url()?>work/edit_marketing/<?=$marketings->id?>" class="btn btn-warning btn-xs" ><i class="icon-note"></i></a>
					<a href="<?=base_url()?>work/delete_marketing/<?=$marketings->id?>" class="btn btn-danger btn-xs" data-toggle="ajaxModal">
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
    <div id="eight" class="tab-pane fade" style="background-color:#fff;border:1px #dddddd solid;border-top:none">
<a href="<?=base_url()?>work/add_tech" class="btn btn-sm btn-info"  style="margin-right:15px;margin-top:15px;" ><i class="fa fa-plus"></i> <?=lang('add_inf')?></a>

		<table  class="table table-striped m-b-none AppendDataTables">
			<thead>
				<tr>
					<th width="30%">عنوان</th>	
					<th width="40%">توضیحات</th>	
					<th width="10%"><?=lang('option')?> </th>
				</tr> </thead> <tbody>
				<?php
								if (!empty($tech)) {
				foreach ($tech as $key => $techs) { ?>
				<tr>

					<td><?=$techs->name?></td>
					<td><?=$techs->description?></td>
					<td>
					<a href="<?=base_url()?>work/edit_tech/<?=$techs->id?>" class="btn btn-warning btn-xs" ><i class="icon-note"></i></a>
					<a href="<?=base_url()?>work/delete_tech/<?=$techs->id?>" class="btn btn-danger btn-xs" data-toggle="ajaxModal">
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
    <div id="nine" class="tab-pane fade" style="background-color:#fff;border:1px #dddddd solid;border-top:none">
<a href="<?=base_url()?>work/add_social" class="btn btn-sm btn-info"  style="margin-right:15px;margin-top:15px;" ><i class="fa fa-plus"></i> <?=lang('add_inf')?></a>

		<table  class="table table-striped m-b-none AppendDataTables">
			<thead>
				<tr>
					<th width="30%">عنوان</th>	
					<th width="40%">توضیحات</th>	
					<th width="10%"><?=lang('option')?> </th>
				</tr> </thead> <tbody>
				<?php
								if (!empty($social)) {
				foreach ($social as $key => $socials) { ?>
				<tr>

					<td><?=$socials->name?></td>
					<td><?=$socials->description?></td>
					<td>
					<a href="<?=base_url()?>work/edit_social/<?=$socials->id?>" class="btn btn-warning btn-xs" ><i class="icon-note"></i></a>
					<a href="<?=base_url()?>work/delete_social/<?=$socials->id?>" class="btn btn-danger btn-xs" data-toggle="ajaxModal">
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
    <div id="ten" class="tab-pane fade" style="background-color:#fff;border:1px #dddddd solid;border-top:none">
<a href="<?=base_url()?>work/add_finance" class="btn btn-sm btn-info"  style="margin-right:15px;margin-top:15px;" ><i class="fa fa-plus"></i> <?=lang('add_inf')?></a>

		<table  class="table table-striped m-b-none AppendDataTables">
			<thead>
				<tr>
					<th width="30%">عنوان</th>	
					<th width="40%">توضیحات</th>	
					<th width="10%"><?=lang('option')?> </th>
				</tr> </thead> <tbody>
				<?php
								if (!empty($finance)) {
				foreach ($finance as $key => $finances) { ?>
				<tr>

					<td><?=$finances->name?></td>
					<td><?=$finances->description?></td>
					<td>
					<a href="<?=base_url()?>work/edit_finance/<?=$finances->id?>" class="btn btn-warning btn-xs" ><i class="icon-note"></i></a>
					<a href="<?=base_url()?>work/delete_finance/<?=$finances->id?>" class="btn btn-danger btn-xs" data-toggle="ajaxModal">
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
    <div id="eleven" class="tab-pane fade" style="background-color:#fff;border:1px #dddddd solid;border-top:none">
<a href="<?=base_url()?>work/add_entre" class="btn btn-sm btn-info"  style="margin-right:15px;margin-top:15px;" ><i class="fa fa-plus"></i> <?=lang('add_inf')?></a>

		<table  class="table table-striped m-b-none AppendDataTables">
			<thead>
				<tr>
					<th width="30%">عنوان</th>	
					<th width="40%">توضیحات</th>	
					<th width="10%"><?=lang('option')?> </th>
				</tr> </thead> <tbody>
				<?php
								if (!empty($entre)) {
				foreach ($entre as $key => $entres) { ?>
				<tr>

					<td><?=$entres->name?></td>
					<td><?=$entres->description?></td>
					<td>
					<a href="<?=base_url()?>work/edit_entre/<?=$entres->id?>" class="btn btn-warning btn-xs" ><i class="icon-note"></i></a>
					<a href="<?=base_url()?>work/delete_entre/<?=$entres->id?>" class="btn btn-danger btn-xs" data-toggle="ajaxModal">
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
    <div id="towelve" class="tab-pane fade" style="background-color:#fff;border:1px #dddddd solid;border-top:none">
<a href="<?=base_url()?>work/add_busi" class="btn btn-sm btn-info"  style="margin-right:15px;margin-top:15px;" ><i class="fa fa-plus"></i> <?=lang('add_inf')?></a>

		<table  class="table table-striped m-b-none AppendDataTables">
			<thead>
				<tr>
					<th width="30%">عنوان</th>	
					<th width="40%">توضیحات</th>	
					<th width="10%"><?=lang('option')?> </th>
				</tr> </thead> <tbody>
				<?php
								if (!empty($busi)) {
				foreach ($busi as $key => $busis) { ?>
				<tr>

					<td><?=$busis->name?></td>
					<td><?=$busis->description?></td>
					<td>
					<a href="<?=base_url()?>work/edit_busi/<?=$busis->id?>" class="btn btn-warning btn-xs" ><i class="icon-note"></i></a>
					<a href="<?=base_url()?>work/delete_busi/<?=$busis->id?>" class="btn btn-danger btn-xs" data-toggle="ajaxModal">
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
    <div id="therteen" class="tab-pane fade" style="background-color:#fff;border:1px #dddddd solid;border-top:none">
<a href="<?=base_url()?>work/add_franch" class="btn btn-sm btn-info"  style="margin-right:15px;margin-top:15px;" ><i class="fa fa-plus"></i> <?=lang('add_inf')?></a>

		<table  class="table table-striped m-b-none AppendDataTables">
			<thead>
				<tr>
					<th width="30%">عنوان</th>	
					<th width="40%">توضیحات</th>	
					<th width="10%"><?=lang('option')?> </th>
				</tr> </thead> <tbody>
				<?php
								if (!empty($franch)) {
				foreach ($franch as $key => $franchs) { ?>
				<tr>

					<td><?=$franchs->name?></td>
					<td><?=$franchs->description?></td>
					<td>
					<a href="<?=base_url()?>work/edit_franch/<?=$franchs->id?>" class="btn btn-warning btn-xs" ><i class="icon-note"></i></a>
					<a href="<?=base_url()?>work/delete_franch/<?=$franchs->id?>" class="btn btn-danger btn-xs" data-toggle="ajaxModal">
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
    <div id="fourteen" class="tab-pane fade" style="background-color:#fff;border:1px #dddddd solid;border-top:none">
<a href="<?=base_url()?>work/add_mag" class="btn btn-sm btn-info"  style="margin-right:15px;margin-top:15px;" ><i class="fa fa-plus"></i> <?=lang('add_inf')?></a>

		<table  class="table table-striped m-b-none AppendDataTables">
			<thead>
				<tr>
					<th width="30%">عنوان</th>	
					<th width="40%">توضیحات</th>	
					<th width="10%"><?=lang('option')?> </th>
				</tr> </thead> <tbody>
				<?php
								if (!empty($mag)) {
				foreach ($mag as $key => $mags) { ?>
				<tr>

					<td><?=$mags->name?></td>
					<td><?=$mags->description?></td>
					<td>
					<a href="<?=base_url()?>work/edit_mag/<?=$mags->id?>" class="btn btn-warning btn-xs" ><i class="icon-note"></i></a>
					<a href="<?=base_url()?>work/delete_mag/<?=$mags->id?>" class="btn btn-danger btn-xs" data-toggle="ajaxModal">
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