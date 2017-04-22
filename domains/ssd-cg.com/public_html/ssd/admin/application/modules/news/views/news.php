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
			

			
			<a href="<?=base_url()?>news/add_news" class="btn btn-sm btn-primary" style="margin-right:15px;" ><i class="fa fa-plus"></i> <?=lang('add_inf')?></a>

	
	<div class="table-responsive">
							<table  class="table table-striped m-b-none AppendDataTables">
			<thead>
				<tr>
					<th width="20%"><?=lang('title')?> </th>
					<th width="15%"><?=lang('date')?> </th>	
					<th width="50%"><?=lang('description')?> </th>	
					<th width="15%"><?=lang('option')?> </th>
				</tr> </thead> <tbody>
				<?php
								if (!empty($news)) {
				foreach ($news as $key => $new) { ?>
				<tr>
					<td><?=$new->title?></td>
					<td><?=$new->date_a?></td>
					<td>
					<?php $ab=$new->des;
					$des = htmlspecialchars( (string)$ab );
					$post = substr($des , 0, 800); 
					echo $post;
					?>
					</td>
					<td>

					<a href="<?=base_url()?>news/edit_news/<?=$new->id?>" class="btn btn-warning btn-xs" ><i class="icon-note"></i></a>
					<a href="<?=base_url()?>news/delete_news/<?=$new->id?>" class="btn btn-danger btn-xs" data-toggle="ajaxModal">
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