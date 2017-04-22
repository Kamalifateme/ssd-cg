<section class="panel panel-default">
<header class="header bg-white b-b clearfix">
                  <div class="row m-t-sm">
                  <div class="col-sm-12 m-b-xs">
                  <?php if($role == '1'){ ?>
                  <a href="<?=base_url()?>projects/team/<?=$project_id?>" data-toggle="ajaxModal" class="btn btn-sm btn-success"><?=lang('update_team')?></a> 
                  <?php } ?>                    

                    </div>
                  </div>
                </header>

    <div class="table-responsive">
    <?php if ($role == '1' OR $role == '3' OR $this -> applib -> project_setting('show_team_members',$project_id)) { ?>
                  <table class="table table-striped b-t b-light AppendDataTables">
                    <thead>
                      <tr>
                      <th class="hidden-xs"><?=lang('avatar_image')?></th>
                       <th><?=lang('username')?></th>

                       <?php if($role == '1'){ ?>
                        <th><?=lang('full_name')?></th> 
                        <th><?=lang('phone')?></th>
                        <?php } ?>
                        
                        <th><?=lang('city')?></th>
                        
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                     $assigned_users = $this -> applib->get_any_field('projects',array('project_id'=>$project_id),'assign_to');
                    error_reporting(0);
                    foreach (unserialize($assigned_users) as $value) { ?>
                      <tr>
                      <td class="hidden-xs"><a class="pull-left thumb-sm avatar">
                  <img src="<?=base_url()?>resource/avatar/<?=$this -> applib->get_any_field('account_details',array('user_id'=>$value),'avatar')?>" class="img-circle"></a>
                  </td>
                      <td><span class="badge bg-success">
                        <?=ucfirst($this -> applib->get_any_field('users',array('id'=>$value),'username'))?>
                        </span></td>

                        <?php if($role == '1'){ ?>
                        <td><?=$this -> applib->get_any_field('account_details',array('user_id'=>$value),'fullname')?></td>
                        <td><?=$this -> applib->get_any_field('account_details',array('user_id'=>$value),'phone')?></td>
                        <?php } ?>

                        <td><?=$this -> applib->get_any_field('account_details',array('user_id'=>$value),'city')?></td>
                        
                        
                        
                      </tr>
                      <?php }  ?>
                    </tbody>
                  </table>



                  <?php } ?>
                  <!-- End view team members -->
                </div>

<!-- End details -->
 </section>