 <div class="table-responsive">
                  <table class="table table-striped b-t b-light AppendDataTables">
                    <thead>
                      <tr>                        
                        <th><?=lang('start_time')?></th>
                        <th><?=lang('stop_time')?></th>
                        <?php  if($role != '2'){ ?><th><?=lang('user')?></th><?php } ?>

                        <th><?=lang('time_spent')?></th>
                        <?php  if($role != '2'){ ?>
                        <th><?=lang('options')?></th>
                        <?php } ?>
                      </tr>
                    </thead>
                    <tbody>
 <?php
      $user = $this-> tank_auth -> get_user_id();
          if($role == '3'){
              $timer = $this -> db -> where(array('project'=>$project_id,'user' => $user)) -> get('project_timer') -> result();
          }else{
              $timer = $this -> db -> where(array('project'=>$project_id)) -> get('project_timer') -> result();
          }
          if (!empty($timer)) {
              foreach ($timer as $key => $t) {  
?>
            
                      <tr>

                        <td><span class="label label-success"><?=strftime('%b %d, %Y %H :%M', $t->start_time)?></span></td>
                        <td><span class="label label-danger"><?=strftime('%b %d, %Y %H :%M', $t->end_time)?></span></td>
                        
                        <?php if($role != '2'){ ?>
                        <td><?=ucfirst($this -> applib->get_any_field('users',array('id'=>$t->user),'username'))?></td>
                        <?php } ?>
                        
                        <td><small class="small text-muted"><?=$this -> applib -> get_time_spent($t->end_time - $t->start_time)?></td>
                         <?php  if($role != '2'){ ?>
                        <td>
                         <a class="btn btn-xs btn-danger" href="<?=base_url()?>projects/timesheet/edit/<?=$t->project?>?group=timesheets&cat=projects&id=<?=$t->timer_id?>" data-toggle="ajaxModal"><i class="fa fa-edit"></i></a>

                          <a class="btn btn-xs btn-dark" href="<?=base_url()?>projects/timesheet/delete/<?=$t->project?>?group=timesheets&cat=projects&id=<?=$t->timer_id?>" data-toggle="ajaxModal"><i class="fa fa-trash-o"></i></a>
                         
                        </td>
                        <?php } ?>
                      </tr>
                      <?php } } ?>
                    </tbody>
                  </table>
                </div>