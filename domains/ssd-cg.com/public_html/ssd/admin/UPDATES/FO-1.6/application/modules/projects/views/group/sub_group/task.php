<section class="panel panel-default">
<?php
$task = isset($_GET['id']) ? $_GET['id'] : 0;
if($role != '2'){
$details = $this -> db -> where(array('t_id'=>$task)) -> get('tasks') -> result();
}else{
  $details = $this -> db -> where(array('t_id'=>$task,'visible' => 'Yes')) -> get('tasks') -> result();
}

  if (!empty($details)) {
      foreach ($details as $key => $t) {
      if($t->project == $project_id){
      ?>
      
<header class="header bg-white b-b clearfix">
                  <div class="row m-t-sm">
                  <div class="col-sm-12 m-b-xs">

                  <a href="<?=base_url()?>projects/tasks/file/<?=$t->project?>/<?=$t->t_id?>" data-toggle="ajaxModal" class="btn btn-sm btn-success"><?=lang('attach_file')?></a> 
  <?php if($role == '1' OR $role == '3' OR $t->added_by == $this->tank_auth-> get_user_id()){ ?>
                  <a href="<?=base_url()?>projects/tasks/edit/<?=$t->t_id?>" data-toggle="ajaxModal" class="btn btn-sm btn-dark"><?=lang('edit_task')?></a>
  <?php } if($role == '1'){ ?> 
                  <a href="<?=base_url()?>projects/tasks/delete/<?=$t->project?>/<?=$t->t_id?>" data-toggle="ajaxModal" title="<?=lang('delete_task')?>" class="btn btn-sm btn-danger"><i class="fa fa-trash-o text-white"></i> <?=lang('delete_task')?></a>
<?php } ?>
                     

                    </div>
                  </div>
                </header>

<div class="row">
<div class="col-lg-12">

<section class="panel panel-body">
<div class="col-lg-12">
<div class="col-lg-2"><?=lang('progress')?></div>
<div class="col-lg-10"><div class="progress progress-xs m-t-sm"> 
                          <div class="progress-bar progress-bar-success" data-toggle="tooltip" data-original-title="<?=$t->task_progress?>%" style="width: <?=$t->task_progress?>%"></div>
                        </div>
  </div>
  </div>


<div class="col-lg-6">
<ul class="list-group no-radius">
    <li class="list-group-item">
      <span class="pull-right"><?=$t->task_name?> </span><?=lang('task_name')?></li>
    <li class="list-group-item">
      <span class="pull-right"><?=$this -> applib->get_any_field('projects',array('project_id'=>$t->project),'project_title');?></span><?=lang('project')?></li>
      <?php if($role != '2'){ ?> 
    <li class="list-group-item">
      <span class="pull-right"><?=$t->visible?></span><?=lang('visible_to_client')?></li>
      <?php } ?>
    <li class="list-group-item">
      <span class="pull-right"><?=$t->due_date?></span><?=lang('due_date')?></li>
       
</ul>
</div>
<!-- End details C1-->
<div class="col-lg-6">

<ul class="list-group no-radius">
    <li class="list-group-item">
      <span class="pull-right"><strong><?=$this-> applib -> get_time_spent($this->applib->task_time_spent($t->t_id))?></strong></span><?=lang('logged_hours')?></li>
    <li class="list-group-item">
      <span class="pull-right"><?=$t->estimated_hours?> <?=lang('hours')?></span><?=lang('estimated_hours')?> </li>

      <?php if($role != '2'){ ?> 

    <li class="list-group-item">
    <?php
      $assigned_users = $this -> applib->get_any_field('tasks',array('t_id'=>$t->t_id),'assigned_to');
    ?>
      <span class="pull-right">
      <small class="small">
<?php error_reporting(0);
foreach (unserialize($assigned_users) as $value) {
    echo ucfirst($this -> applib->get_any_field('users',array('id'=>$value),'username')).',';
  } ?>
  </small></span><?=lang('assigned_to')?></li>

  <?php } ?>

    <li class="list-group-item">
      <span class="pull-right"><span class="label label-success"> <?=$t->timer_status?></span></span><?=lang('timer_status')?></li>
       
</ul>

</div>

<div class="line line-dashed line-lg pull-in"></div>
<blockquote><?=lang('milestone')?>: <a href="<?=base_url()?>projects/view/<?=$t->project?>/?group=milestones&view=milestone&id=<?=$t->milestone?>" class="text-primary"><?=$this -> applib->get_any_field('milestones',array('id'=>$t->milestone),'milestone_name');?></a></blockquote>



<p><blockquote><?=$t->description?></blockquote></p>
<!-- End details -->
<?php
$this->load->helper('file');
$files = $this -> db -> where(array('task'=>$task)) -> get('task_files') -> result();
  if (!empty($files)) {
      foreach ($files as $key => $f) { ?>
<label class="label label-success"><a class="text-white" href="<?=base_url()?>projects/tasks/download/<?=$f->file_id?>" title = ""><?=$f->file_name?></a></label> 
<?php
$file_name = './resource/project-files/'.$f->file_name;
$file_ext = get_mime_by_extension($file_name);

if (strpos("image/pjpeg|image/jpeg|image/png|image/x-png|image/gif|image/tiff", trim($file_ext, " ")) !== false) { ?>
<a class="text-white btn btn-xs btn-info" href="<?=base_url()?>projects/tasks/preview/<?=$f->file_id?>/<?=$project_id?>" data-toggle="ajaxModal"><i class="fa fa-eye"></i> </a> |
<?php } } } ?>
 </section>
 <?php } } } ?>
  </div> 

  </div>
  <!-- End ROW 1 -->

  </section>