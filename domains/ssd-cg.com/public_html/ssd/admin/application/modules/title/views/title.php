<section id="content"> 
<section class="vbox"> <section class="scrollable padder">
	<ul class="breadcrumb no-border no-radius b-b b-light pull-in ">
		
		<li>
		<a href="<?=base_url()?>"><?=lang('home')?>/
		</a>
		</li>
		
		<li class="active">
		<a href="<?=base_url()?>title">&#1575;&#1590;&#1575;&#1601;&#1607; &#1705;&#1585;&#1583;&#1606; &#1575;&#1605;&#1705;&#1575;&#1606;&#1575;&#1578;
		</a>
		</li>
		

	</ul>

	<div class="row">
	<!-- Project events -->
	<div class="col-lg-12">
	<section class="panel">
			<header class="panel-heading"> <i class="fa fa-navicon"></i> &#1580;&#1583;&#1608;&#1604; &#1575;&#1590;&#1575;&#1601;&#1607; &#1705;&#1585;&#1583;&#1606; &#1605;&#1608;&#1590;&#1608;&#1593; &#1576;&#1585;&#1575;&#1740; &#1575;&#1591;&#1604;&#1575;&#1593;&#1575;&#1578; </header>
			<a href="<?=base_url()?>title/add_title" class="btn btn-sm btn-primary" style="margin-right:15px;" ><i class="fa fa-plus"></i> <?=lang('add_inf')?></a>

	
	<div class="table-responsive">
							<table  class="table table-striped m-b-none AppendDataTables">
			<thead>
				<tr>
					<th width="40%">&#1605;&#1608;&#1590;&#1608;&#1593;</th>
					<th width="40%">&#1578;&#1608;&#1590;&#1740;&#1581;&#1575;&#1578;</th>	
					<th width="20%"><?=lang('option')?> </th>
				</tr> </thead> <tbody>
				<?php
								if (!empty($title)) {
				foreach ($title as $key => $titles) { ?>
				<tr>
					<td>
					
					<?php 
					if($titles->title==1){echo "&#1583;&#1608;&#1585;&#1607; &#1607;&#1575;&#1740; &#1740;&#1575;&#1583;&#1711;&#1740;&#1585;&#1740;"; } 
					if($titles->title==2){echo "&#1605;&#1575;&#1604;&#1740;"; } 
					if($titles->title==3){echo "&#1605;&#1583;&#1740;&#1585;&#1740;&#1578;&#1740;"; } 
					if($titles->title==4){echo "&#1601;&#1606;&#1740;"; } 
					if($titles->title==5){echo "&#1583;&#1575;&#1606;&#1587;&#1578;&#1606;&#1740;&#1607;&#1575;&#1740; &#1705;&#1587;&#1576; &#1608; &#1705;&#1575;&#1585;"; } 
					if($titles->title==6){echo "&#1705;&#1604;&#1740;&#1606;&#1740;&#1705; &#1705;&#1587;&#1576; &#1608; &#1705;&#1575;&#1585;"; } 
					if($titles->title==7){echo "&#1582;&#1583;&#1605;&#1575;&#1578; &#1705;&#1575;&#1585;&#1570;&#1601;&#1585;&#1740;&#1606;&#1740; &#1608; &#1705;&#1587;&#1576; &#1608; &#1705;&#1575;&#1585;"; } 

					?>
					</td>
					<td>
					<?=$titles->title_sub?>
					</td>
					<td>

					<a href="<?=base_url()?>title/edit_title/<?=$titles->id?>" class="btn btn-warning btn-xs" ><i class="icon-note"></i></a>
					<a href="<?=base_url()?>title/delete_title/<?=$titles->id?>" class="btn btn-danger btn-xs" data-toggle="ajaxModal">
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
			<header class="panel-heading"> <i class="fa fa-navicon"></i> &#1580;&#1583;&#1608;&#1604; &#1586;&#1740;&#1585; &#1605;&#1580;&#1605;&#1608;&#1593;&#1607; &#1583;&#1608;&#1585;&#1607; &#1607;&#1575;&#1740; &#1740;&#1575;&#1583;&#1711;&#1740;&#1585;&#1740; </header>
			<a href="<?=base_url()?>title/add_title2" class="btn btn-sm btn-primary" style="margin-right:15px;" ><i class="fa fa-plus"></i> <?=lang('add_inf')?></a>

	
	<div class="table-responsive">
							<table  class="table table-striped m-b-none AppendDataTables">
			<thead>
				<tr>
					<th width="80%">&#1605;&#1608;&#1590;&#1608;&#1593;</th>	
					<th width="20%"><?=lang('option')?> </th>
				</tr> </thead> <tbody>
				<?php
								if (!empty($title2)) {
				foreach ($title2 as $key => $titles2) { ?>
				<tr>

					<td>
					<?=$titles2->name?>
					</td>
					<td>

					<a href="<?=base_url()?>title/edit_title2/<?=$titles2->id?>" class="btn btn-warning btn-xs" ><i class="icon-note"></i></a>
					<a href="<?=base_url()?>title/delete_title2/<?=$titles2->id?>" class="btn btn-danger btn-xs" data-toggle="ajaxModal">
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
			<header class="panel-heading"> <i class="fa fa-navicon"></i> &#1575;&#1590;&#1575;&#1601;&#1607; &#1705;&#1585;&#1583;&#1606; &#1593;&#1606;&#1608;&#1575;&#1606; &#1570;&#1740;&#1705;&#1608;&#1606;&#1607;&#1575;</header>
			<a href="<?=base_url()?>title/add_descr" class="btn btn-sm btn-primary" style="margin-right:15px;" ><i class="fa fa-plus"></i> <?=lang('add_inf')?></a>

	
	<div class="table-responsive">
							<table  class="table table-striped m-b-none AppendDataTables">
			<thead>
				<tr>
					<th width="40%">&#1605;&#1608;&#1590;&#1608;&#1593;</th>
					<th width="40%">&#1578;&#1608;&#1590;&#1740;&#1581;&#1575;&#1578;</th>	
					<th width="20%"><?=lang('option')?> </th>
				</tr> </thead> <tbody>
				<?php
								if (!empty($descr)) {
				foreach ($descr as $key => $descrs) { ?>
				<tr>
					<td>
					<?php 
					if($descrs->title==1){echo "&#1583;&#1608;&#1585;&#1607; &#1607;&#1575;&#1740; &#1740;&#1575;&#1583;&#1711;&#1740;&#1585;&#1740;"; } 
					if($descrs->title==2){echo "&#1605;&#1575;&#1604;&#1740;"; } 
					if($descrs->title==3){echo "&#1605;&#1583;&#1740;&#1585;&#1740;&#1578;&#1740;"; } 
					if($descrs->title==4){echo "&#1601;&#1606;&#1740;"; } 
					if($descrs->title==5){echo "&#1583;&#1575;&#1606;&#1587;&#1578;&#1606;&#1740;&#1607;&#1575;&#1740; &#1705;&#1587;&#1576; &#1608; &#1705;&#1575;&#1585;"; } 
					if($descrs->title==6){echo "&#1705;&#1604;&#1740;&#1606;&#1740;&#1705; &#1705;&#1587;&#1576; &#1608; &#1705;&#1575;&#1585;"; } 
					if($descrs->title==7){echo "&#1582;&#1583;&#1605;&#1575;&#1578; &#1705;&#1575;&#1585;&#1570;&#1601;&#1585;&#1740;&#1606;&#1740; &#1608; &#1705;&#1587;&#1576; &#1608; &#1705;&#1575;&#1585;"; } 
					if($descrs->title==8){echo "ssd(&#1570;&#1605;&#1608;&#1586;&#1588;)"; } 
					if($descrs->title==9){echo "ssd(&#1605;&#1588;&#1575;&#1608;&#1585;&#1607;)"; } 
					if($descrs->title==10){echo "ssd(&#1705;&#1575;&#1585;&#1570;&#1601;&#1585;&#1740;&#1606;&#1740;)"; } 
					if($descrs->title==11){echo "&#1711;&#1575;&#1604;&#1585;&#1740; &#1578;&#1589;&#1575;&#1608;&#1740;&#1585;"; } 
					if($descrs->title==12){echo "&#1583;&#1585; &#1581;&#1575;&#1604; &#1579;&#1576;&#1578; &#1606;&#1575;&#1605;"; } 

					?>
					</td>
					<td>
					<?=$descrs->title_sub?>
					</td>
					<td>

					<a href="<?=base_url()?>title/edit_descr/<?=$descrs->id?>" class="btn btn-warning btn-xs" ><i class="icon-note"></i></a>
					<a href="<?=base_url()?>title/delete_descr/<?=$descrs->id?>" class="btn btn-danger btn-xs" data-toggle="ajaxModal">
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