<section id="content"> 
<section class="vbox"> <section class="scrollable padder">
	<ul class="breadcrumb no-border no-radius b-b b-light pull-in ">
		
		<li>
		<a href="<?=base_url()?>"><?=lang('home')?>/
		</a>
		</li>
		
		<li class="active">
		<a href="<?=base_url()?>doctor"><?=lang('doctor')?>
		</a>
		</li>
		

	</ul>

	<div class="row">

	<div class="col-lg-12">
	<section class="panel">
			<header class="panel-heading"> <i class="fa fa-navicon"></i> <?=lang('doctor')?> </header>
			<a href="<?=base_url()?>doctor/add_doctor" class="btn btn-sm btn-primary" style="margin-right:15px;" ><i class="fa fa-plus"></i> <?=lang('add_inf')?></a>

	
	<div class="table-responsive">
							<table  class="table table-striped m-b-none AppendDataTables">
			<thead>
				<tr>
					<th width="20%"><?=lang('name')?> </th>
					<th width="15%"><?=lang('specialty')?> </th>	
					<th width="55%"><?=lang('description')?> </th>	
					<th width="10%"><?=lang('option')?> </th>
				</tr> </thead> <tbody>
				<?php
								if (!empty($doctor)) {
				foreach ($doctor as $key => $hos) { ?>
				<tr>
					<td><?=$hos->name?></td>
					<td>
<?=$hos->takh?>
					
					</td>
					<td>
					<?php $ab=$hos->description;
					$des = htmlspecialchars( (string)$ab );
					$post = substr($des , 0, 800); 
					echo $post;
					?>
					</td>
					<td>

					<a href="<?=base_url()?>doctor/edit_doctor/<?=$hos->id?>" class="btn btn-warning btn-xs" ><i class="icon-note"></i></a>
					<a href="<?=base_url()?>doctor/delete_doctor/<?=$hos->id?>" class="btn btn-danger btn-xs" data-toggle="ajaxModal">
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