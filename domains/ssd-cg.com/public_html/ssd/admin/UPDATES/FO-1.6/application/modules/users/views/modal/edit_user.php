<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header"> <button type="button" class="close" data-dismiss="modal">&times;</button> 
		<h4 class="modal-title"><?=lang('edit')?> <?=lang('user')?></h4>
		</div><?php
			 $attributes = array('class' => 'bs-example form-horizontal');
          echo form_open(base_url().'users/view/update',$attributes); ?>
          <?php
								if (!empty($user_details)) {
				foreach ($user_details as $key => $user) { ?>
		<div class="modal-body">
			 <input type="hidden" name="user_id" value="<?=$user->user_id?>">
			 <input type="hidden" name="company" value="<?=$user->company?>">
			 
			 <div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('full_name')?> <span class="text-danger">*</span></label>
				<div class="col-lg-8">
					<input type="text" class="form-control" value="<?=$user->fullname?>" name="fullname">
				</div>
				</div>
				<div class="form-group">
			        <label class="col-lg-4 control-label"><?=lang('company')?> </label>
			        <div class="col-lg-8">
			        <select  name="company" > 
			          <option value="<?=$user->company?>"><?=lang('use_current')?></option>

			          <?php if (!empty($companies)) {
			            foreach ($companies as $company){ ?>
			            <option value="<?=$company->co_id?>"><?=$company->company_name?></option>
			            <?php }} ?>
			            <option value="-"><?=$this->config->item('company_name')?></option>
			          </select> 
			          </div>
			      </div>

			      <?php
			      $role = $this -> applib->get_any_field('users',array('id'=>$user->user_id),'role_id');
			      if ($role == '3') { ?>
			      <div class="form-group">
			        <label class="col-lg-4 control-label"><?=lang('department')?> </label>
			        <div class="col-lg-8">
			        <select  name="department" > 
			          <option value="<?=$user->department?>"><?=lang('use_current')?></option>

			          <?php 
			          $departments = $this->db->get('departments')->result();
			          if (!empty($departments)){
			            foreach ($departments as $d){ ?>
			            <option value="<?=$d->deptid?>"><?=$d->deptname?></option>
			            <?php }} ?>
			          </select> 
			          </div>
			      </div>
			      <?php } ?>

				<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('phone')?> </label>
				<div class="col-lg-8">
					<input type="text" class="form-control" value="<?=$user->phone?>" name="phone">
				</div>
				</div>
				
				<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('city')?> </label>
				<div class="col-lg-8">
					<input type="text" class="form-control" value="<?=$user->city?>" name="city">
				</div>
				</div>
				<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('vat')?> </label>
				<div class="col-lg-8">
					<input type="text" class="form-control" value="<?=$user->vat?>" name="vat">
				</div>
				</div>
				<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('address')?> </label>
				<div class="col-lg-8">
				<textarea name="address" class="form-control"><?=$user->address?></textarea>
				</div>
				</div>
			
		</div>
		<div class="modal-footer"> <a href="#" class="btn btn-default" data-dismiss="modal"><?=lang('close')?></a> 
		<button type="submit" class="btn btn-primary"><?=lang('save_changes')?></button>
		</form>
		<?php } } ?>
		</div>
	</div>
	<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->