<!-- Start -->
<section id="content">
	<section class="hbox stretch">

<aside>
			<section class="vbox">

<section class="scrollable wrapper w-f">
	<section class="panel panel-default">
                <header class="panel-heading"><?=lang('all_tickets')?> 
                <a href="<?=base_url()?>tickets/add" class="btn btn-xs btn-dark pull-right"><?=lang('create_ticket')?></a></header>
                <div class="table-responsive">
                  <table class="table table-striped b-t b-light AppendDataTables">
                    <thead>
                      <tr>
                        <th><?=lang('ticket_code')?></th>
                        <th><?=lang('subject')?></th>
                        <?php if ($role == '1') { ?>
                        <th><?=lang('reporter')?></th>
                        <?php } ?>
                        <th><?=lang('department')?></th>
                        <th><?=lang('priority')?></th>
                        <th><?=lang('status')?></th>
                        <th width="30"><?=lang('options')?></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (!empty($tickets)) {
							foreach ($tickets as $key => $t) { 
if($t->status == 'open'){ $s_label = 'danger'; }elseif($t->status=='closed'){ $s_label = 'success'; }else{ $s_label = 'default';}
                ?>
                      <tr>
                        <td><span class="label label-success"><?=$t->ticket_code?></span></td>
                        <td><a class="text-info" href="<?=base_url()?>tickets/view/<?=$t->id?>"><?=$t->subject?></a></td>
                        <?php if ($role == '1') { ?>
                        <td><?=ucfirst($this -> applib->get_any_field('users',array('id'=>$t->reporter),'username'))?></td>
                        <?php } ?>
                        <td><?=$this -> applib->get_any_field('departments',array('deptid'=>$t->department),'deptname')?></td>
                        <td><?=$t->priority?></td>
                        <td><span class="label label-<?=$s_label?>"><?=ucfirst($t->status)?></span> </td>
                        <td>
                          <div class="btn-group">
										<button class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
										<i class="fa fa-cogs"></i> <?=lang('options')?>
										<span class="caret"></span></button>
							<ul class="dropdown-menu">											
								<li><a href="<?=base_url()?>tickets/view/<?=$t->id?>"><?=lang('preview_ticket')?></a></li>
                <?php if ($role == '1') { ?>
								<li><a href="<?=base_url()?>tickets/edit/<?=$t->id?>"><?=lang('edit_ticket')?></a></li>
								<li><a href="<?=base_url()?>tickets/delete/<?=$t->id?>" data-toggle="ajaxModal" title="<?=lang('delete_ticket')?>"><?=lang('delete_ticket')?></a></li>
                <?php } ?>
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