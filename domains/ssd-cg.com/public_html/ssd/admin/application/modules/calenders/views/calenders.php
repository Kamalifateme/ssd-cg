<section id="content"> 
<section class="vbox"> <section class="scrollable padder">
	<ul class="breadcrumb no-border no-radius b-b b-light pull-in ">
		
		<li>
		<a href="<?=base_url()?>"><?=lang('home')?>
		/
		</a>
		</li>
		
		<li class="active">
		<a href="<?=base_url()?>calenders"><?=lang('add_calender')?>
		</a>
		</li>
	</ul>

	<div class="row">
	<!-- Project events -->
	<div class="col-lg-12">
	<section class="panel">
	<header class="panel-heading"> <i class="fa fa-navicon"></i> <?=lang('add_calender')?> </header>
	<div class="row text-sm wrapper">
	

			<a href="<?=base_url()?>calenders/save_event" class="btn btn-sm btn-primary" style="margin-right:15px;" data-toggle="ajaxModal"><i class="fa fa-plus"></i> <?=lang('add_inf')?></a>

	</div>
	<div class="table-responsive">
			<table  class="table table-striped m-b-none AppendDataTables">
			<thead>
				<tr>
					<th width="20%"><?=lang('title')?></th>
					<th width="25%"><?=lang('description')?> </th>
					<th width="14%"><?=lang('date_start')?> </th>
					<th width="14%"><?=lang('date_end')?> </th>
					<th width="14%"><?=lang('color')?> </th>			
					<th width="13%"><?=lang('option')?> </th>
					

					
					
				</tr> </thead> <tbody>
				<?php
								if (!empty($events)) {
				foreach ($events as $key => $event) { ?>
				<tr>
					<?php 
					$a=$event->start_date;
					$datestart = explode("-", $a);
					$yearss=$datestart[0];
					$monthss=$datestart[1];
					$dayss=$datestart[2];
					$this->load->library('jdf');
					$jalali = $this->jdf->gregorian_to_jalali($yearss,$monthss,$dayss,'-');
					
					$b=$event->end_date;
					$dateend = explode("-", $b);
					$yeare=$dateend[0];
					$monthe=$dateend[1];
					$daye=$dateend[2];
					$jalali2 = $this->jdf->gregorian_to_jalali($yeare,$monthe,$daye,'-');

					?>
					<td><?=$event->title?></td>
					<td><?=$event->description?></td>
					<td style="font-family:BYekan,Arial, Helvetica, sans-serif;font-size:11pt;"><span class="label label-success"><?=$event->time_start?>  <?php echo $jalali; ?>  </span></td>
					<td style="font-family:BYekan,Arial, Helvetica, sans-serif;font-size:11pt;"><span class="label label-info"><?=$event->time_end?>   <?php echo $jalali2; ?>  </span></td>
					<td><span class="label label-success" style="background-color:<?=$event->color?>"><?=lang('color')?></span></td>
					<td><a href="<?=base_url()?>calenders/edit_event/<?=$event->id?>" class="btn btn-warning btn-xs" data-toggle="ajaxModal"><i class="icon-note"></i></a>
					<a href="<?=base_url()?>calenders/delete_event/<?=$event->id?>" class="btn btn-danger btn-xs" data-toggle="ajaxModal">
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

<footer class="panel-footer">
				<div class="row">
				<div class="col-sm-2 hidden-xs">
				<?php
				 $events_found = $this->db->get('events')->num_rows();
                ?>

				</div>
				<div class="col-sm-2 text-center"> 
				</div>
				<div class="col-sm-8 text-right text-center-xs">

				</div>
				</div>				</div>
				</div>
</footer>
</div>
<!-- End Project events -->

</div>

	</section>
</section>
</section>
<a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> </section>