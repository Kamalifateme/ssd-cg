<section id="content"> 
<section class="vbox"> <section class="scrollable padder">
	<ul class="breadcrumb no-border no-radius b-b b-light pull-in ">
		
		<li>
		<a href="<?=base_url()?>"><?=lang('home')?>/
		</a>
		</li>
		
		<li class="active">
		<a href="<?=base_url()?>drug"><?=lang('drug')?>
		</a>
		</li>
		

	</ul>

	<div class="row">
	
	<div class="col-lg-12">
	<section class="panel">
			<header class="panel-heading"> <i class="fa fa-navicon"></i> <?=lang('table_drug')?> </header>
			<a href="<?=base_url()?>drug/add_drug" class="btn btn-sm btn-info" style="margin-right:15px;" ><i class="fa fa-plus"></i> <?=lang('add_inf')?></a>

	<div class="table-responsive">
							<table  class="table table-striped m-b-none AppendDataTables">
			<thead>
				<tr>
					<th width="10%"><?=lang('alephpa')?> </th>	
					<th width="10%"><?=lang('group')?> </th>	
					<th width="10%"><?=lang('face')?> </th>	
					<th width="20%"><?=lang('drug')?> </th>
					<th width="35%"><?=lang('description')?> </th>
					<th width="15%"><?=lang('option')?> </th>
				</tr> </thead> <tbody>
				<?php
								if (!empty($drug)) {
				foreach ($drug as $key => $drugs) { ?>
				<tr>
				
					<td>
					<?php
					$alephpaa=$drugs->alephpa;
					$query = $this->db->query("select * from fx_alephpa where id=$alephpaa ");
					foreach ($query->result() as $row)
					{
					echo $row->type;
					}
					?>
					</td>
					<td>
					<?php
					$groups=$drugs->group;
					$query = $this->db->query("select * from fx_group where id=$groups ");
					foreach ($query->result() as $row)
					{
					echo $row->type;
					}
					?>
					</td>
					<td>
					<?php
					$facea=$drugs->face;
					$query = $this->db->query("select * from fx_face where id=$facea ");
					foreach ($query->result() as $row)
					{
					echo $row->type;
					}
					?>
					</td>
					<td><?=$drugs->name?></td>
					<td>
					<?php $ab=$drugs->description;
					$des = htmlspecialchars( (string)$ab );
					$post = substr($des , 0, 800); 
					echo $post;
					?>
					</td>

					<td>

					<a href="<?=base_url()?>drug/edit_drug/<?=$drugs->id?>" class="btn btn-warning btn-xs" ><i class="icon-note"></i></a>
					<a href="<?=base_url()?>drug/delete_drug/<?=$drugs->id?>" class="btn btn-danger btn-xs" data-toggle="ajaxModal">
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

	
	
	
	
	
	
	
	
	<!-- Project events -->
	<div class="col-lg-12">
	<section class="panel">
			<header class="panel-heading"> <i class="fa fa-navicon"></i> <?=lang('table_face')?> </header>
			<a href="<?=base_url()?>drug/add_face" class="btn btn-sm btn-info" data-toggle="ajaxModal" style="margin-right:15px;" ><i class="fa fa-plus"></i> <?=lang('add_inf')?></a>

	
	<div class="table-responsive">
							<table  class="table table-striped m-b-none AppendDataTables">
			<thead>
				<tr>
					<th width="80%"><?=lang('face')?> </th>	
					<th width="20%"><?=lang('option')?> </th>
				</tr> </thead> <tbody>
				<?php
								if (!empty($face)) {
				foreach ($face as $key => $faces) { ?>
				<tr>
					<td><?=$faces->type?></td>
					<td>

					<a href="<?=base_url()?>drug/edit_face/<?=$faces->id?>" class="btn btn-warning btn-xs" data-toggle="ajaxModal"><i class="icon-note"></i></a>
					<a href="<?=base_url()?>drug/delete_face/<?=$faces->id?>" class="btn btn-danger btn-xs" data-toggle="ajaxModal">
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

	<div class="col-lg-12">
	<section class="panel">
			<header class="panel-heading"> <i class="fa fa-navicon"></i> <?=lang('table_group')?> </header>
			<a href="<?=base_url()?>drug/add_group" class="btn btn-sm btn-info" data-toggle="ajaxModal" style="margin-right:15px;" ><i class="fa fa-plus"></i> <?=lang('add_inf')?></a>

	
	<div class="table-responsive">
							<table  class="table table-striped m-b-none AppendDataTables">
			<thead>
				<tr>
					<th width="80%"><?=lang('group')?> </th>	
					<th width="20%"><?=lang('option')?> </th>
				</tr> </thead> <tbody>
				<?php
								if (!empty($group)) {
				foreach ($group as $key => $groups) { ?>
				<tr>
					<td><?=$groups->type?></td>
					<td>

					<a href="<?=base_url()?>drug/edit_group/<?=$groups->id?>" class="btn btn-warning btn-xs" data-toggle="ajaxModal"><i class="icon-note"></i></a>
					<a href="<?=base_url()?>drug/delete_group/<?=$groups->id?>" class="btn btn-danger btn-xs" data-toggle="ajaxModal">
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

<div class="col-lg-12">
	<section class="panel">
			<header class="panel-heading"> <i class="fa fa-navicon"></i> <?=lang('table_alephpa')?> </header>
			<a href="<?=base_url()?>drug/add_alephpa" class="btn btn-sm btn-info" data-toggle="ajaxModal" style="margin-right:15px;" ><i class="fa fa-plus"></i> <?=lang('add_inf')?></a>

	
	<div class="table-responsive">
							<table  class="table table-striped m-b-none AppendDataTables">
			<thead>
				<tr>
					<th width="80%"><?=lang('alephpa')?> </th>	
					<th width="20%"><?=lang('option')?> </th>
				</tr> </thead> <tbody>
				<?php
								if (!empty($alephpa)) {
				foreach ($alephpa as $key => $alephpas) { ?>
				<tr>
					<td><?=$alephpas->type?></td>
					<td>

					<a href="<?=base_url()?>drug/edit_alephpa/<?=$alephpas->id?>" class="btn btn-warning btn-xs" data-toggle="ajaxModal"><i class="icon-note"></i></a>
					<a href="<?=base_url()?>drug/delete_alephpa/<?=$alephpas->id?>" class="btn btn-danger btn-xs" data-toggle="ajaxModal">
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

</div>
	


</div>



<!-- End Project events -->

</div>


	</section>
</section>
</section>
<a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> </section>