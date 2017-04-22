<section class="panel panel-default">
<header class="header bg-white b-b clearfix">
                  <div class="row m-t-sm">
                  <div class="col-sm-12 m-b-xs">
                  <a href="<?=base_url()?>projects/bugs/add/<?=$project_id?>" data-toggle="ajaxModal" class="btn btn-sm btn-success"><?=lang('new_bug')?></a> 

                     

                    </div>
                  </div>
                </header>
    <div class="table-responsive">
                  <table class="table table-striped b-t b-light AppendDataTables">
                    <thead>
                      <tr>
                        <th><?=lang('issue_title')?></th>
                        <th><?=lang('reporter')?></th>
                        <th><?=lang('status')?></th>
                        <th><?=lang('severity')?></th>
                        <?php if ($role != '2') { ?>
                        <th><?=lang('options')?></th>
                        <?php } ?>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $bugs = $this -> db -> where(array('project'=>$project_id)) -> get('bugs') -> result();
                    if (!empty($bugs)) {
              foreach ($bugs as $key => $b) { 
                $issue_title = $b->issue_title ? $b->issue_title : $b->issue_ref;
                if ($b->bug_status == 'Resolved' OR $b->bug_status == 'Verified') {  
                  $status_label = 'success'; 
                }elseif($b->bug_status == 'Confirmed'){ 
                  $status_label = 'info'; 
                }elseif ($b->bug_status == 'In Progress') {
                  $status_label = 'primary'; 
                } else{ 
                  $status_label = 'default'; 
                }
                ?>
            
                      <tr>                        
                        <td><a class="text-info" href="<?=base_url()?>projects/view/<?=$b->project?>?group=bugs&view=bug&id=<?=$b->bug_id?>" data-original-title="<?=$b->bug_description?>" data-toggle="tooltip" data-placement="right" title = ""><?=$issue_title?></a></td>
                        <td><?=ucfirst($this -> applib->get_any_field('users',array('id'=>$b->reporter),'username'));?></td>
                        <td><span class="label label-<?=$status_label?>"><?=ucfirst($b->bug_status)?></span></td>
                        <td><?=ucfirst($b->severity)?></td>
<?php if ($role != '2') { ?>
                        <td>
                        <div class="btn-group">
                    <button class="btn btn-xs btn-<?=config_item('button_color')?> dropdown-toggle" data-toggle="dropdown">
                    <?=lang('change_status')?>
                    <span class="caret"></span></button>
                <ul class="dropdown-menu">
                          
<li>
<a href="<?=base_url()?>projects/bugs/status/<?=$b->project?>/?id=<?=$b->bug_id?>&s=unconfirmed"><?=lang('unconfirmed')?></a>
</li>
<li>
<a href="<?=base_url()?>projects/bugs/status/<?=$b->project?>/?id=<?=$b->bug_id?>&s=confirmed"><?=lang('confirmed')?></a>
</li>
<li>
<a href="<?=base_url()?>projects/bugs/status/<?=$b->project?>/?id=<?=$b->bug_id?>&s=in_progress"><?=lang('in_progress')?></a>
</li>
<li>
<a href="<?=base_url()?>projects/bugs/status/<?=$b->project?>/?id=<?=$b->bug_id?>&s=resolved"><?=lang('resolved')?></a>
</li>
<li>
<a href="<?=base_url()?>projects/bugs/status/<?=$b->project?>/?id=<?=$b->bug_id?>&s=verified"><?=lang('verified')?></a>
</li>
                </ul>
              </div>
                        <a class="btn btn-xs btn-default" href="<?=base_url()?>projects/bugs/edit/<?=$b->project?>/?id=<?=$b->bug_id?>" data-toggle="ajaxModal"><i class="fa fa-edit"></i></a>
                          <a class="btn btn-xs btn-default" href="<?=base_url()?>projects/bugs/delete/<?=$b->project?>/?id=<?=$b->bug_id?>" data-toggle="ajaxModal"><i class="fa fa-trash-o"></i></a>
                        </td>
          <?php } ?>
                      </tr>
                      <?php } } ?>
                    </tbody>
                  </table>
                </div>

<!-- End details -->
 </section>