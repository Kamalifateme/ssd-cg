<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button> <h4 class="modal-title"><?=lang('edit_bug')?></h4>
		</div>
		<?php
					if (!empty($bug_info)) {
					foreach ($bug_info as $key => $i) { ?>
					<?php
			 $attributes = array('class' => 'bs-example form-horizontal');
          echo form_open(base_url().'projects/bugs/edit',$attributes); ?>
		<div class="modal-body">
			 <input type="hidden" name="bug_id" value="<?=$i->bug_id?>">
			 <input type="hidden" name="project" value="<?=$i->project?>">
          		<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('issue_ref')?></label>
				<div class="col-lg-8">
					<input type="text" class="form-control" value="<?=$i->issue_ref?>" name="issue_ref" readonly>
				</div>
				</div>

				<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('issue_title')?> <span class="text-danger">*</span></label>
				<div class="col-lg-8">
					<input type="text" class="form-control" value="<?=$i->issue_title?>" name="issue_title">
				</div>
				</div>

				<?php if ($role == '1') { ?>
				<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('reporter')?> <span class="text-danger">*</span></label>
				<div class="col-lg-8">
				<select name="reporter" class="form-control">
				<option value="<?=$i->reporter?>" selected="selected"><?=lang('use_current')?></option>
					<?php
					 $users = $this -> db -> get('users') -> result();
					if (!empty($users)) {
					foreach ($users as $key => $user) { ?>
						<option value="<?=$user->id?>"><?=ucfirst($user->username)?></option>
					<?php } } ?>	
				</select>
				</div>
				</div>
				<?php } ?>

				<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('priority')?> </label>
				<div class="col-lg-8">
				<select name="priority" class="form-control">
				<option value="<?=$i->priority?>"><?=lang('use_current')?></option>
				 	<option value="low">Low</option>	
				 	<option value="medium">Medium</option>
				 	<option value="high">High</option>				
				</select>
				</div>
				</div>

				<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('severity')?> </label>
				<div class="col-lg-8">
				<select name="severity" class="form-control">
						<option value="<?=$i->severity?>"><?=lang('use_current')?></option>
						<option value="<?=lang('minor')?>"><?=lang('minor')?></option>
						<option value="<?=lang('major')?>"><?=lang('major')?></option>
						<option value="<?=lang('show_stopper')?>"><?=lang('show_stopper')?></option>
						<option value="<?=lang('must_be_fixed')?>"><?=lang('must_be_fixed')?></option>
				</select>
				</div>
				</div>

				<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('description')?> <span class="text-danger">*</span></label>
				<div class="col-lg-8">
				<textarea name="bug_description" class="form-control" required><?=$i->bug_description?></textarea>
				</div>
				</div>

				<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('reproducibility')?> </label>
				<div class="col-lg-8">
				<textarea name="reproducibility" class="form-control" required><?=$i->bug_description?></textarea>
				</div>
				</div>

				<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('assigned_to')?> </label>
				<div class="col-lg-8">
				<select name="assigned_to" class="form-control">
				<option value="<?=$i->assigned_to?>" selected="selected"><?=lang('use_current')?></option>
				<option value="-"><?=lang('not_assigned')?></option>				
				 <?php 
				 $assign_to = $this -> db -> where('role_id !=',2) -> get('users')->result();
				 if (!empty($assign_to)) {
				 foreach ($assign_to as $value) { ?>
				 	<option value="<?=$value->id?>"><?=ucfirst($this -> applib->get_any_field('users',array('id'=>$value->id),'username'))?></option>
                            <?php } ?>
                    <?php } ?>							
				</select>
				</div>
				</div>				
			
		</div>
		<div class="modal-footer"> <a href="#" class="btn btn-default" data-dismiss="modal"><?=lang('close')?></a> 
		<button type="submit" class="btn btn-success"><?=lang('edit_bug')?></button>
		</form>
		<?php } } ?>
		</div>
	</div>
	<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->