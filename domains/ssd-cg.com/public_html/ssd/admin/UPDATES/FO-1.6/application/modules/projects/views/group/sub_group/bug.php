<section class="panel panel-default">
<?php
$bug = isset($_GET['id']) ? $_GET['id'] : 0;
$details = $this -> db -> where(array('bug_id'=>$bug)) -> get('bugs') -> result();
  if (!empty($details)) {
      foreach ($details as $key => $i) { 

                ?>
<header class="header bg-white b-b clearfix">
                  <div class="row m-t-sm">
                  <div class="col-sm-12 m-b-xs">
                  <a href="<?=base_url()?>projects/bugs/file/<?=$i->project?>/<?=$i->bug_id?>" data-toggle="ajaxModal" class="btn btn-sm btn-success"><?=lang('attach_file')?></a>

                  <?php if ($role == '1') { ?>
                  <a href="<?=base_url()?>projects/bugs/edit/<?=$i->project?>/?id=<?=$i->bug_id?>" data-toggle="ajaxModal" class="btn btn-sm btn-dark"><?=lang('edit_bug')?></a> 
                  <?php } ?>
                  
                  <a href="<?=base_url()?>projects/view/<?=$i->project?>/?group=bugs&view=discuss&id=<?=$i->bug_id?>" class="btn btn-sm btn-dark"><?=lang('bug_comments')?></a> 

                     

                    </div>
                  </div>
                </header>

<div class="row">
<div class="col-lg-12">

<section class="panel panel-body">

<div class="col-lg-6">
<ul class="list-group no-radius">
<li class="list-group-item">
      <span class="pull-right"><?=$this -> applib->get_any_field('projects',array('project_id'=>$i->project),'project_title')?> </span><?=lang('project')?></li>
      <li class="list-group-item">
      <span class="pull-right"><?=$i->issue_title?></span><?=lang('issue_title')?></li>
    <li class="list-group-item">
      <span class="pull-right"><?=$i->issue_ref?> </span><?=lang('issue_ref')?></li>
    <li class="list-group-item">
      <span class="pull-right"><?=ucfirst($this -> applib->get_any_field('users',array('id'=>$i->reporter),'username'))?></span><?=lang('reporter')?></li>

      <?php if ($role != '2') { ?>
    <li class="list-group-item">
      <span class="pull-right"><?=ucfirst($this -> applib->get_any_field('users',array('id'=>$i->assigned_to),'username'))?></span><?=lang('assigned_to')?></li>
      <?php } ?>
      
    
       
</ul>
</div>
<!-- End details C1-->
<div class="col-lg-6">

<ul class="list-group no-radius">
<li class="list-group-item">
      <span class="pull-right"><?=$i->severity?></span><?=lang('severity')?></li>
<li class="list-group-item">
      <span class="pull-right"><?=$i->bug_status?></span><?=lang('bug_status')?></li>
    <li class="list-group-item">
      <span class="pull-right"><?=ucfirst($i->priority)?> </span><?=lang('priority')?></li>
    <li class="list-group-item">
      <span class="pull-right"><?=$i->reported_on?> </span><?=lang('reported_on')?> </li>
    
    <li class="list-group-item">
      <span class="pull-right"><span class="label label-success"> <?=$i->last_modified?></span></span><?=lang('last_modified')?></li>
       
</ul>

</div>


<!-- End details -->
<?php
$files = $this -> db -> where(array('bug'=>$bug)) -> get('bug_files') -> result();
  if (!empty($files)) {
      foreach ($files as $key => $f) { ?>
<label class="label label-success"><a class="text-white" href="<?=base_url()?>projects/bugs/download/<?=$i->project?>/<?=$f->file_id?>" target="_blank"  data-original-title="<?=$f->description?>" data-toggle="tooltip" data-placement="right" title = ""><?=$f->file_name?></a></label>
<?php } } ?>

<div class="line line-dashed line-lg pull-in"></div>
<blockquote class="small text-muted"><?=$i->reproducibility?></blockquote>
 </section>



 
<p><blockquote><?=$i->bug_description?></blockquote></p>

 <?php } } ?>
  </div> 

  </div>
  <!-- End ROW 1 -->

  </section>