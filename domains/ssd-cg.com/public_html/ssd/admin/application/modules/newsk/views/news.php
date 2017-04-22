<section id="content"> 
<section class="vbox"> <section class="scrollable padder">
	<ul class="breadcrumb no-border no-radius b-b b-light pull-in ">
		
		<li>
		<a href="<?=base_url()?>"><?=lang('home')?>/
		</a>
		</li>
		
		<li class="active">
		<a href="<?=base_url()?>news"><?=lang('news')?>
		</a>
		</li>
		

	</ul>



	<div class="col-lg-12">
	<section class="panel">
	
			<header class="panel-heading"> <i class="fa fa-navicon"></i> <?=lang('table_news')?> </header>
			

			
			<a href="<?=base_url()?>newsk/add_news" class="btn btn-sm btn-primary" style="margin-right:15px;" ><i class="fa fa-plus"></i> <?=lang('add_inf')?></a>

	
	<div class="table-responsive">
							<table  class="table table-striped m-b-none AppendDataTables">
			<thead>
				<tr>
					<th width="40%" style="display:none;">&#1578;&#1585;&#1578;&#1740;&#1576;</th>

					<th width="40%"><?=lang('title')?> </th>
					<th width="45%">&#1570;&#1583;&#1585;&#1587; &#1606;&#1608;&#1740;&#1587;&#1606;&#1583;&#1607;</th>
				        <th>&#1593;&#1605;&#1604;&#1740;&#1575;&#1578;</th>

</tr> </thead> <tbody>
				<?php
								if (!empty($news)) {
				foreach ($news as $key => $new) { ?>
				<tr>
					<td style="display:none;"><?=$new->id?></td>

					<td><?=$new->title?></td>
					<td><?=$new->url?></td>

					<td>

					<a href="<?=base_url()?>newsk/edit_news/<?=$new->id?>" class="btn btn-warning btn-xs" ><i class="icon-note"></i></a>
					<a href="<?=base_url()?>newsk/delete_news/<?=$new->id?>" class="btn btn-danger btn-xs" data-toggle="ajaxModal">
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