
  <!-- Display staff -->
    <div class="table-responsive">
              <table class="AppendDataTables table table-striped m-b-none">
                <thead>
                  <tr>
                  <th><?=lang('full_name')?></th> 
                  <th><?=lang('username')?> </th>
                  <th><?=lang('role')?> </th>
                  <th class="hidden-sm"><?=lang('registered_on')?> </th>
                  <th class="hidden-sm"><?=lang('avatar_image')?></th>
                  <th><?=lang('options')?></th>
                  </tr> </thead> <tbody>
      <?php
      $this -> db -> join('account_details','account_details.user_id = users.id');
      $users = $this -> db -> where(array('role_id'=>'3')) -> get('users') -> result();
      if (!empty($users)) {
      foreach ($users as $key => $user) { ?>
                  <tr>
                  
                  <td><?=$user->fullname?></td>
                  <td><?=ucfirst($user->username)?></td>                  
                    <td>
                    <span class="label label-primary"><?=ucfirst($this -> user_profile -> role_by_id($user->role_id))?></span></td>
                    <td class="hidden-sm"><?=strftime(config_item('date_format'), strtotime($user->created));?> </td>
                    <td class="hidden-sm"><a class="pull-left thumb-sm avatar">
                  <img src="<?=base_url()?>resource/avatar/<?=$user->avatar?>" class="img-circle"></a>
                  </td>
          <td>
          <a href="<?=base_url()?>settings/?settings=permissions&staff=<?=$user->user_id?>" class="btn btn-default btn-sm" title="<?=lang('edit_permissions')?>"><i class="fa fa-edit"></i> <?=lang('edit_permissions')?> </a>
        
          </td>
                  </tr>
                  <?php } } ?>
                  
                  
                </tbody>
              </table>
            </div>

    

<!-- End staff -->