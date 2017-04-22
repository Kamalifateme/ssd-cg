<?php    
$attributes = array('class' => 'bs-example form-horizontal');
echo form_open('settings/permissions', $attributes); ?>
<input type="hidden" name="settings" value="permissions">
<input type="hidden" name="user_id" value="<?=$user_id?>">

    <!-- checkbox -->
    <?php 
    $permission = $this -> db -> where(array('status'=>'active')) -> get('permissions') -> result();
    $current_json_permissions = $this -> applib -> get_any_field('account_details',array('user_id'=>$user_id),'allowed_modules');
    if ($current_json_permissions == NULL) {
      $current_json_permissions = '{"settings":"permissions"}';
    }
    $current_permissions = json_decode($current_json_permissions);

    foreach ($permission as $key => $p) { ?>
      <div class="checkbox">
                <label class="checkbox-custom">
                    <input name="<?=$p->name?>" <?php
                    if ( array_key_exists($p->name, $current_permissions) ) {
                     echo "checked=\"checked\"";
                    }

                    ?>  type="checkbox">
                      <i class="fa fa-fw fa-square-o checked"></i> <b><?=ucfirst($p->name)?></b> - <small><?=$p->description?></small> 
                </label>
      </div>
      <div class="line line-dashed line-lg pull-in"></div>
            
    <?php } ?>
          
          

      
      
      <div class="form-group">
        <div class="col-lg-1 col-lg-10">
        <button type="submit" class="btn btn-sm btn-danger"><?=lang('save_changes')?></button>
        </div>
      </div>
    </form>