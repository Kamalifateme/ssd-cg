<section id="content">
          <section class="hbox stretch">
 
            <aside class="aside-md bg-white b-r scrollable" id="subNav" >
              <div class="wrapper b-b header"><?=lang('project_details')?></div>
<?php
 $username = $this -> tank_auth -> get_username();
                  if (!empty($project_details)) {
                  foreach ($project_details as $key => $p) { ?>

 

              <ul class="nav">
              <li class="b-b b-light <?php if($group == 'dashboard'){ echo "bg-light dker text-white"; } ?>">
                <a href="<?=base_url()?>projects/view/<?=$p->project_id?>/?group=dashboard"><i class="fa fa-chevron-right pull-right m-t-xs text-xs text-info"></i> <i class="fa fa-home"></i> <?=lang('project_dashboard')?></a>
                </li>

<?php if ($role == '1' OR $role == '3' OR $this -> applib -> project_setting('show_team_members',$p->project_id)) { ?>
                <li class="b-b b-light <?php if($group == 'teams'){ echo "bg-light dker text-white"; } ?>">
                <a href="<?=base_url()?>projects/view/<?=$p->project_id?>/?group=teams"><i class="fa fa-chevron-right pull-right m-t-xs text-xs text-info"></i> <i class="fa fa-group"></i> <?=lang('team_members')?></a>
                </li>
<?php } 
 if ($role == '1' OR $role == '3' OR $this -> applib -> project_setting('show_milestones',$p->project_id)) { ?>
                <li class="b-b b-light <?php if($group == 'milestones'){ echo "bg-light dker text-white"; } ?>">
                <a href="<?=base_url()?>projects/view/<?=$p->project_id?>/?group=milestones"><i class="fa fa-chevron-right pull-right m-t-xs text-xs text-info"></i> <i class="fa fa-laptop"></i> <?=lang('milestones')?></a>
                </li>
<?php }
 if ($role == '1' OR $role == '3' OR $this -> applib -> project_setting('show_project_tasks',$p->project_id)) {
                $timer_on = $this -> applib -> count_rows('tasks',array('project'=>$p->project_id,'timer_status'=>'On')); ?>

                <li class="b-b b-light <?php if($group == 'tasks'){ echo "bg-light dker text-white"; } ?>">
                <a href="<?=base_url()?>projects/view/<?=$p->project_id?>/?group=tasks"><i class="fa fa-chevron-right pull-right m-t-xs text-xs text-info"></i> <i class="fa fa-tasks"></i> <?=lang('project_tasks')?> <?php if($timer_on > 0){?><b class="badge bg-danger pull-right"><?=$timer_on?></b><?php } ?></a>
                </li>
<?php }
if ($role == '1' OR $role == '3' OR $this -> applib -> project_setting('show_project_files',$p->project_id)) { ?>
                <li class="b-b b-light <?php if($group == 'files'){ echo "bg-light dker text-white"; } ?>">
                <a href="<?=base_url()?>projects/view/<?=$p->project_id?>?group=files"><i class="fa fa-chevron-right pull-right m-t-xs text-xs text-info"></i> <i class="fa fa-file"></i> <?=lang('project_files')?></a>
                </li>
<?php } 
if ($role == '1' OR $role == '3' OR $this -> applib -> project_setting('show_timesheets',$p->project_id)) { ?>
                <li class="b-b b-light <?php if($group == 'timesheets'){ echo "bg-light dker text-white"; } ?>">
                <a href="<?=base_url()?>projects/view/<?=$p->project_id?>?group=timesheets"><i class="fa fa-chevron-right pull-right m-t-xs text-xs text-info"></i> <i class="fa fa-clock-o"></i> <?=lang('timesheets')?></a>
                </li>
<?php }
if ($role == '1' OR $role == '3' OR $this -> applib -> project_setting('show_project_bugs',$p->project_id)) { ?>
                <li class="b-b b-light <?php if($group == 'bugs'){ echo "bg-light dker text-white"; } ?>">
                <a href="<?=base_url()?>projects/view/<?=$p->project_id?>?group=bugs"><i class="fa fa-chevron-right pull-right m-t-xs text-xs text-info"></i> <i class="fa fa-bug"></i> <?=lang('project_bugs')?></a>
                </li>
<?php }
if ($role == '1' OR $role == '3' OR $this -> applib -> project_setting('show_project_history',$p->project_id)) { ?>
                <li class="b-b b-light <?php if($group == 'history'){ echo "bg-light dker text-white"; } ?>">
                <a href="<?=base_url()?>projects/view/<?=$p->project_id?>?group=history"><i class="fa fa-chevron-right pull-right m-t-xs text-xs text-info"></i> <i class="fa fa-list-alt"></i> <?=lang('project_history')?></a>
                </li>
<?php }
if ($role == '1' OR $role == '3' OR $this -> applib -> project_setting('show_project_comments',$p->project_id)) { ?>
                <li class="b-b b-light <?php if($group == 'comments'){ echo "bg-light dker text-white"; } ?>">
                <a href="<?=base_url()?>projects/view/<?=$p->project_id?>?group=comments"><i class="fa fa-chevron-right pull-right m-t-xs text-xs text-info"></i> <i class="fa fa-comments"></i> <?=lang('project_comments')?></a>
                </li>
<?php }
if ($role == '1' OR $role == '3' OR $this -> applib -> project_setting('show_project_calendar',$p->project_id)) { ?>
                 <li class="b-b b-light <?php if($group == 'calendar'){ echo "bg-light dker text-white"; } ?>">
                <a href="<?=base_url()?>projects/view/<?=$p->project_id?>?group=calendar"><i class="fa fa-chevron-right pull-right m-t-xs text-xs text-info"></i> <i class="fa fa-calendar"></i> <?=lang('project_calendar')?></a>
                </li>
<?php } 
if ($role == '1' OR $this -> applib -> allowed_module('view_project_notes',$username)){ ?>
                <li class="b-b b-light <?php if($group == 'notes'){ echo "bg-light dker text-white"; } ?>">
                <a href="<?=base_url()?>projects/view/<?=$p->project_id?>?group=notes"><i class="fa fa-chevron-right pull-right m-t-xs text-xs text-info"></i> <i class="fa fa-pencil"></i> <?=lang('project_notes')?></a>
                </li>
  <?php } 
  if ($role == '1') { ?>
                <li class="b-b b-light <?php if($group == 'settings'){ echo "bg-light dker text-white"; } ?>">
                <a href="<?=base_url()?>projects/view/<?=$p->project_id?>?group=settings"><i class="fa fa-chevron-right pull-right m-t-xs text-xs text-info"></i> <i class="fa fa-cogs"></i> <?=lang('project_settings')?></a>
                </li>
                <?php } ?>
              </ul>
             
            </aside>


            <aside>
              <section class="vbox">
                <header class="header bg-white b-b clearfix">
                  <div class="row m-t-sm">
                  <div class="col-sm-12 m-b-xs">
 <?php if ($role == '1' OR $this -> applib -> allowed_module('edit_all_projects',$username)){ ?>
                     <a href="<?=base_url()?>projects/view/<?=$p->project_id?>?group=<?=$group?>&action=edit" class="btn btn-dark btn-sm"><i class="fa fa-edit"></i> <?=lang('edit_project')?></a>

<?php } ?>

<?php if ($role == '1'){ ?>
    <a href="<?=base_url()?>projects/copy_project/<?=$p->project_id?>" data-toggle="ajaxModal" class="btn btn-dark btn-sm"><i class="fa fa-copy"></i> <?=lang('clone_project')?></a>

    <a href="<?=base_url()?>projects/invoice/<?=$p->project_id?>" class="btn btn-dark btn-sm" data-toggle="ajaxModal"><i class="fa fa-money"></i> <?=lang('invoice_project')?></a>
    <?php } 
if ($role != '2'){

if($p->timer == 'On') { $label = 'danger'; } else{ $label = 'success'; } 
      if ($p->timer == 'On') { ?>
      <a href="<?=base_url()?>projects/tracking/off/<?=$p->project_id?>" class="btn btn-sm btn-<?=$label?> "> <i class="fa fa-clock-o text-white"></i> <?=lang('stop_timer')?></a>
      <?php }else{ ?>
      <a href="<?=base_url()?>projects/tracking/on/<?=$p->project_id?>" class="btn btn-sm btn-<?=$label?> "> <i class="fa fa-clock-o text-white"></i> <?=lang('start_timer')?></a>
      <?php } ?>

<?php } ?>



<?php if ($role == '1' OR $this -> applib -> allowed_module('delete_projects',$username)){ ?>
<a href="<?=base_url()?>projects/delete/<?=$p->project_id?>?group=<?=$group?>" data-toggle="ajaxModal" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i> <?=lang('delete_project')?></a>
<?php } ?>
                    </div>
                  </div>
                </header>
                <section class="scrollable wrapper">
                    <!-- Load the settings form in views -->
                    <?php
                    if(isset($_GET['action']) == 'edit'){ 
                      $this -> load -> view('group/edit_project',$project_details); 
                    }
                    else{
                    $data['project_id'] = $p->project_id;
                    $this -> load -> view('group/'.$group,$data);
                  }
                    ?>
                    <!-- End of settings Form -->
                </section>
                
              </section>
            </aside>

            <?php } } ?>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen, open" data-target="#nav,html"></a>
        </section>