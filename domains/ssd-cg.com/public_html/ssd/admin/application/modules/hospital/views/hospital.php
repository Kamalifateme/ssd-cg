<section id="content"> 
<section class="vbox"> <section class="scrollable padder">
	<ul class="breadcrumb no-border no-radius b-b b-light pull-in ">
		
		<li>
		<a href="<?=base_url()?>"><?=lang('home')?>/
		</a>
		</li>
		
		<li class="active">
		<a href="<?=base_url()?>hospital"><?=lang('hospital')?>
		</a>
		</li>
		

	</ul>

	<div class="row">
	<!-- Project events -->
	<div class="col-lg-12">
	<section class="panel">
			<header class="panel-heading"> <i class="fa fa-navicon"></i> <?=lang('table_city')?> </header>
			<a href="<?=base_url()?>hospital/add_city" class="btn btn-sm btn-info" data-toggle="ajaxModal" style="margin-right:15px;" ><i class="fa fa-plus"></i> <?=lang('add_inf')?></a>

	
	<div class="table-responsive">
							<table  class="table table-striped m-b-none AppendDataTables">
			<thead>
				<tr>
					<th width="80%"><?=lang('city')?> </th>	
					<th width="20%"><?=lang('option')?> </th>
				</tr> </thead> <tbody>
				<?php
								if (!empty($city)) {
				foreach ($city as $key => $cit) { ?>
				<tr>
					<td><?=$cit->city?></td>
					<td>

					<a href="<?=base_url()?>hospital/edit_city/<?=$cit->id?>" class="btn btn-warning btn-xs" data-toggle="ajaxModal"><i class="icon-note"></i></a>
					<a href="<?=base_url()?>hospital/delete_city/<?=$cit->id?>" class="btn btn-danger btn-xs" data-toggle="ajaxModal">
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
			<header class="panel-heading"> <i class="fa fa-navicon"></i> <?=lang('table_hospital')?> </header>
			<a href="<?=base_url()?>hospital/add_hospital" class="btn btn-sm btn-primary" style="margin-right:15px;" ><i class="fa fa-plus"></i> <?=lang('add_inf')?></a>

	
	<div class="table-responsive">
							<table  class="table table-striped m-b-none AppendDataTables">
			<thead>
				<tr>
					<th width="20%"><?=lang('hospital')?> </th>
					<th width="15%"><?=lang('city')?> </th>	
					<th width="55%"><?=lang('description')?> </th>	
					<th width="10%"><?=lang('option')?> </th>
				</tr> </thead> <tbody>
				<?php
								if (!empty($hospital)) {
				foreach ($hospital as $key => $hos) { ?>
				<tr>
					<td><?=$hos->name?></td>
					<td>
					<?php
					$cit=$hos->city;
					$query = $this->db->query("select * from fx_city where id=$cit ");
					foreach ($query->result() as $row)
					{
							echo $row->city;
					}
					?>
					
					</td>
					<td>
					<?php $ab=$hos->description;
					$des = htmlspecialchars( (string)$ab );
					$post = substr($des , 0, 800); 
					echo $post;
					?>
					</td>
					<td>

					<a href="<?=base_url()?>hospital/edit_hospital/<?=$hos->id?>" class="btn btn-warning btn-xs" ><i class="icon-note"></i></a>
					<a href="<?=base_url()?>hospital/delete_hospital/<?=$hos->id?>" class="btn btn-danger btn-xs" data-toggle="ajaxModal">
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