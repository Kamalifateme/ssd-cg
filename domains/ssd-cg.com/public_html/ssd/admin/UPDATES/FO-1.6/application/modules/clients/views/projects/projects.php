<!-- Start -->
<section id="content">
	<section class="hbox stretch">

<aside>
			<section class="vbox">

<section class="scrollable wrapper w-f">
	<section class="panel panel-default">
                <header class="panel-heading"><?=lang('all_projects')?> 
                <a href="<?=base_url()?>projects/add" class="btn btn-xs btn-dark pull-right"><?=lang('create_project')?></a></header>
                <div class="table-responsive">
                  <table class="table table-striped b-t b-light AppendDataTables">
                    <thead>
                      <tr>
                        <th width="20"><?=lang('timer')?></th>
                        <th><?=lang('project_title')?></th>
                        <th><?=lang('start_date')?></th>
                        <th><?=lang('due_date')?></th>
                        <th><?=lang('hours_spent')?></th>
                        <th><?=lang('amount')?></th>
                        <th width="30"><?=lang('options')?></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (!empty($projects)) {
							foreach ($projects as $key => $p) { 
								if ($p->timer == 'Off') {  $timer = 'success'; }else{ $timer = 'danger'; }
								?>
						
                      <tr>
                        <td><span class="label label-<?=$timer?>"><?=$p->timer?></span></td>
                        <td><a class="text-info" href="<?=base_url()?>projects/view/<?=$p->project_id?>"><?=$p->project_title?></a></td>
                        <td><?=$p->start_date?></td>
                        <td><?=$p->due_date?></td>
                        <td><?=$this -> applib -> pro_calculate('project_hours',$p->project_id);?> <?=lang('hours')?></td>
                        <td><?=config_item('default_currency')?> <?=number_format($this -> applib -> pro_calculate('project_cost',$p->project_id),2,config_item('decimal_separator'),config_item('thousand_separator'))?></td>
                        
                        <td>
                          <div class="btn-group">
										<button class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
										<?=lang('options')?>
										<span class="caret"></span></button>
							<ul class="dropdown-menu">											
								<li><a href="<?=base_url()?>projects/view/<?=$p->project_id?>"><?=lang('preview_project')?></a></li>
								<li><a href="<?=base_url()?>projects/view/<?=$p->project_id?>/?group=dashboard&action=edit"><?=lang('edit_project')?></a></li>
								<li><a href="<?=base_url()?>projects/view/<?=$p->project_id?>/?group=history"><?=lang('project_history')?></a></li>
								<li><a href="<?=base_url()?>projects/delete/<?=$p->project_id?>" data-toggle="ajaxModal"><?=lang('delete_project')?></a></li>
							</ul>
							</div>
                        </td>
                      </tr>
                      <?php } } ?>
                    </tbody>
                  </table>
                </div>
              </section>
              </section>
	
		 



		</section> </aside> </section> <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> </section>



<!-- end -->