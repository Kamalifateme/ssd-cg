<div class="row">
<div class="col-lg-12">
<section class="panel panel-body">
<?php
$all_tasks = $this -> applib -> count_rows('tasks',array('project'=>$project_id));
$done_tasks = $this -> applib -> count_rows('tasks',array('project'=>$project_id,'task_progress >='=>'100'));
$in_progress = $this -> applib -> count_rows('tasks',array('project'=>$project_id,'task_progress <'=>'100','task_progress >'=>'0'));
$remaining = $this -> applib -> count_rows('tasks',array('project'=>$project_id,'task_progress'=>'0'));
if ($all_tasks > 0) {
$perc_done = ($done_tasks/$all_tasks) *100;
$perc_progress = ($in_progress/$all_tasks)*100;
$perc_remaining = ($remaining/$all_tasks)*100;
}else{
$perc_done = $perc_progress = $perc_remaining = 0;
}

$progress = $this -> applib->get_any_field('projects',array('project_id'=>$project_id),'progress');
$project_hours = $this -> applib -> pro_calculate('project_hours',$project_id);
$project_cost = $this -> applib -> pro_calculate('project_cost',$project_id);

$username = $this -> tank_auth -> get_username();
?>
<div class="progress progress-xs m-t-sm">
                          <div class="progress-bar progress-bar-success" data-toggle="tooltip" data-original-title="<?=$progress?>%" style="width: <?=$progress?>%"></div>
                        </div>
<div class="col-lg-6">
<ul class="list-group no-radius">
    <li class="list-group-item">
      <span class="pull-right"><?=$this -> applib->get_any_field('projects',array('project_id'=>$project_id),'project_title')?></span><?=lang('project_name')?></li>

      <?php if ($role == '1' OR $role == '2' OR $this -> applib -> allowed_module('view_project_clients',$username)){ ?>
    <li class="list-group-item">
    <?php
    $client = $this -> applib->get_any_field('projects',array('project_id'=>$project_id),'client');
    ?>
      <span class="pull-right"><?=$this -> applib->get_any_field('companies',array('co_id'=>$client),'company_name')?></span><?=lang('client_name')?></li>
      <?php } ?>


    <li class="list-group-item">
      <span class="pull-right"><?=$this -> applib->get_any_field('projects',array('project_id'=>$project_id),'start_date')?></span><?=lang('start_date')?></li>
    <li class="list-group-item">
    <?php
    $due_date = $this -> applib->get_any_field('projects',array('project_id'=>$project_id),'due_date');
    $due_time = strtotime($due_date);
    $current_time = time();
    ?>
      <span class="pull-right"><?=$due_date?>
      <?php if ($current_time > $due_time){ ?>
         <span class="badge bg-danger"><?=lang('overdue')?></span>
      <?php } ?>
     </span><?=lang('due_date')?></li>
       
</ul>
</div>
<!-- End details C1-->
<div class="col-lg-6">

<ul class="list-group no-radius">
    <li class="list-group-item">
      <span class="pull-right"><strong><?=$project_hours?> <?=lang('hours')?></strong></span><?=lang('logged_hours')?></li>
    <?php if ($role == '1' OR $role == '2' OR $this -> applib -> allowed_module('view_project_cost',$username)){ ?>
    <li class="list-group-item">
      <span class="pull-right"><strong><?=config_item('default_currency')?> <?=number_format($project_cost,2,config_item('decimal_separator'),config_item('thousand_separator'))?></strong></span> <?=lang('project_cost')?></li>
      <?php } ?>

<?php if ($role == '1' OR $role == '3' OR $this -> applib -> project_setting('show_team_members',$project_id)) { ?>
    <li class="list-group-item">
    <?php
      $assigned_users = $this -> applib->get_any_field('projects',array('project_id'=>$project_id),'assign_to');
    ?>
      <span class="pull-right">
      <small class="small">
<?php foreach (unserialize($assigned_users) as $value) {
    echo ucfirst($this -> applib->get_any_field('users',array('id'=>$value),'username')).',';
  } ?>
  </small></span><?=lang('assigned_to')?></li>
<?php } ?>

    <li class="list-group-item">
      <span class="pull-right"><span class="label label-success"> <?=$this -> applib->get_any_field('projects',array('project_id'=>$project_id),'timer')?></span></span><?=lang('timer_status')?></li>
       
</ul>

</div>

<div class="line line-dashed line-lg pull-in"></div>
<blockquote class="small text-muted"><?=$this -> applib->get_any_field('projects',array('project_id'=>$project_id),'description')?></blockquote>

<!-- End details -->
 </section>
  </div> 

  </div>
  <!-- End ROW 1 -->

<div class="row">
<div class="col-lg-6">
<section class="panel panel-default">

<header class="panel-heading"><?=$all_tasks?> <?=lang('tasks')?></header>
<section class="panel-body">

                    <div class="text-center">
                      <div class="inline ">
                        <div class="easypiechart text-success" data-percent="<?=$perc_done?>" data-line-width="5" data-track-Color="#f0f0f0" data-bar-color="#8ec165" data-rotate="270" data-scale-Color="false" data-size="120" data-animate="2000">
                          <span class="h2 step font-bold"><?=$perc_done?></span>%
                          <div class="easypie-text text-muted"><?=lang('done_tasks')?></div>
                        </div>
                        <div class="font-bold m-t"><?=lang('total')?> <?=$done_tasks?></div>
                      </div>
                      <div class="inline ">
                        <div class="easypiechart text-info" data-percent="<?=$perc_progress?>" data-line-width="5" data-track-Color="#f0f0f0" data-bar-color="#4cc0c1" data-rotate="115" data-scale-Color="false" data-size="120" data-animate="2000">
                          <span class="h2 step font-bold"><?=$perc_progress?></span>%
                          <div class="easypie-text text-muted"><?=lang('in_progress')?></div>
                        </div>
                        <div class="font-bold m-t"><?=lang('total')?> <?=$in_progress?></div>
                      </div>                    
                      <div class="inline">
                        <div class="easypiechart text-danger" data-percent="<?=$perc_remaining?>" data-line-width="5" data-track-Color="#f0f0f0" data-bar-color="#fb6b5b" data-rotate="180" data-scale-Color="false" data-size="120" data-animate="2000">
                          <span class="h2 step font-bold"><?=$perc_remaining?></span>%
                          <div class="easypie-text text-muted"><?=lang('pending')?></div>
                        </div>
                        <div class="font-bold m-t"><?=lang('total')?> <?=$remaining?></div>
                      </div>
                    </div>
                    </section></section>

            </div>
<!-- END TASKS -->
<?php if ($role == '1' OR $role == '3' OR $this -> applib -> project_setting('show_project_files',$project_id)) { ?>
<div class="col-sm-6">
                  <section class="panel panel-default">
                    <header class="panel-heading"><?=lang('recent_files')?></header>
                    <table class="table table-striped m-b-none">
                      <thead>
                        <tr>
                          <th><?=lang('action')?></th>
                          <th><?=lang('file_name')?></th>                    
                          <th width="70"></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $files = $this -> project -> retrieve('files',array('project'=>$project_id), $limit = 4, $offset = 0, $sort =  NULL);
                     if (!empty($files)) {
                  foreach ($files as $key => $f) { ?>
                    <tr>                    
                      <td>
                        <a class="btn btn-xs btn-success" href="<?=base_url()?>projects/files/download/<?=$f->file_id?>"><?=lang('download')?></a>
                      </td>
                      <td><a href="<?=base_url()?>projects/files/download/<?=$f->file_id?>"><?=$f->file_name?></a></td>
                      <td class="text-success"><?=ucfirst($this -> applib->get_any_field('users',array('id'=>$f->uploaded_by),'username'))?></td>
                    </tr>
                        <?php } } ?>
                      </tbody>
                    </table>
                  </section>
                </div>
                <?php } ?>
<!-- END FILES -->


  </div>

  <!-- END ROW -->
  <div class="row">
  <?php if ($role == '1' OR $role == '3' OR $this -> applib -> project_setting('show_project_tasks',$project_id)) { ?>
<div class="col-sm-6">
                  <section class="panel panel-default">
                    <header class="panel-heading"><?=lang('recent_tasks')?></header>
                    <table class="table table-striped m-b-none">
                      <thead>
                        <tr>
                          <th><?=lang('action')?></th>
                          <th><?=lang('task_name')?></th>                    
                          <th width="70"></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $tasks = $this -> project -> retrieve('tasks',array('project'=>$project_id), $limit = 5, $offset = 0, $sort =  NULL);
                     if (!empty($tasks)) {
                  foreach ($tasks as $key => $t) { ?>
                    <tr>                    
                      <td>
                        <a class="btn btn-xs btn-success" href="<?=base_url()?>projects/view/<?=$t->project?>?group=tasks&view=task&id=<?=$t->t_id?>"><?=lang('preview')?></a>
                      </td>
                      <td><?=$t->task_name?></td>
                      <td class="text-success"><?=ucfirst($this -> applib->get_any_field('users',array('id'=>$t->added_by),'username'))?></td>
                    </tr>
                        <?php } } ?>
                      </tbody>
                    </table>
                  </section>
                </div>
                <?php } ?>
<!-- END TASKS -->

<?php if ($role == '1' OR $role == '3' OR $this -> applib -> project_setting('show_project_bugs',$project_id)) { ?>
<div class="col-sm-6">
                  <section class="panel panel-default">
                    <header class="panel-heading"><?=lang('recent_bugs')?></header>
                    <table class="table table-striped m-b-none">
                      <thead>
                        <tr>
                          <th><?=lang('action')?></th>
                          <th><?=lang('issue_ref')?></th>                    
                          <th width="70"></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $bugs = $this -> project -> retrieve('bugs',array('project'=>$project_id), $limit = 4, $offset = 0, $sort =  NULL);
                     if (!empty($bugs)) {
                  foreach ($bugs as $key => $b) { ?>
                    <tr>                    
                      <td>
                        <a class="btn btn-xs btn-success" href="<?=base_url()?>projects/view/<?=$project_id?>/?group=bugs&view=bug&id=<?=$b->bug_id?>"><?=lang('preview')?></a>
                      </td>
                      <td><?=$b->issue_ref?></td>
                      <td class="text-success"><?=ucfirst($this -> applib->get_any_field('users',array('id'=>$b->reporter),'username'))?></td>
                    </tr>
                        <?php } } ?>
                      </tbody>
                    </table>
                  </section>
                </div>
                <?php } ?>
<!-- END FILES -->


  </div>