<section class="panel panel-default">
<header class="header bg-white b-b clearfix">
                  <div class="row m-t-sm">
                  <div class="col-sm-12 m-b-xs">
<?php
if ($role == '1' OR $role == '3' OR $this -> applib -> project_setting('show_timesheets',$project_id)) { 




  $cat = isset($_GET['cat']) ? $_GET['cat'] : 'projects';
  ?>
                  <div class="m-b-sm">
                  <?php  if($role != '2'){ ?>
                  <a href="<?=base_url()?>projects/timesheet/add_time/<?=$project_id?>?group=timesheets&cat=<?=$cat?>" data-toggle="ajaxModal" class="btn btn-dark btn-sm"><i class="fa fa-clock-o"></i> <?=lang('time_entry')?></a>
                  <?php } ?>

                    <div class="btn-group">
                      <button class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown"><?=lang('timesheets')?> <span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li><a href="<?=base_url()?><?=uri_string()?>?group=timesheets&cat=projects"><?=lang('project_timesheet')?></a></li>
                        <li><a href="<?=base_url()?><?=uri_string()?>?group=timesheets&cat=tasks"><?=lang('tasks_timesheet')?></a></li>
                      </ul>
                    </div>
                  </div>                     

                    </div>
                  </div>
                </header>

                <?php
  if($cat == 'projects'){
      $data['project_id'] = $project_id;
      $this -> load -> view('group/sub_group/project_timelog',$data);
    }else{
      $data['project_id'] = $project_id;
      $this -> load -> view('group/sub_group/tasks_timelog',$data);
    }




  }
?>

   

<!-- End details -->
 </section>