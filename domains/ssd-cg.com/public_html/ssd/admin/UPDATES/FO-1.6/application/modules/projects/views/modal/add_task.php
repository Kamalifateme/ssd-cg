<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button> <h4 class="modal-title"><?=lang('add_task')?></h4>
		</div>
		
					<?php
			$role = $this -> applib->get_any_field('users',array('id'=>$this->tank_auth->get_user_id()),'role_id');
			 $attributes = array('class' => 'bs-example form-horizontal');
          echo form_open(base_url().'projects/tasks/add',$attributes); ?>
          <input type="hidden" name="project" value="<?=$project?>">
		<div class="modal-body">
          		<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('task_name')?> <span class="text-danger">*</span></label>
				<div class="col-lg-8">
					<input type="text" class="form-control" placeholder="Task Name" name="task_name">
				</div>
				</div>
<?php if($role != 2){ ?>
				<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('milestone')?> <span class="text-danger">*</span></label>
				<div class="col-lg-8">
				<select name="milestone" class="form-control" required>
				<?php 
				$milestones = $this -> db-> where('project',$project) -> get('milestones') -> result();
				if (!empty($milestones)) {
					foreach ($milestones as $m) { ?>
						<option value="<?=$m->id?>"><?=$m->milestone_name?></option>
					<?php } } ?>					
				</select>
				</div>
				</div>
<?php } ?>

				<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('description')?> <span class="text-danger">*</span></label>
				<div class="col-lg-8">
				<textarea name="description" class="form-control"><?=lang('description')?></textarea>
				</div>
				</div>

<?php if($role != 2){ ?>
				<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('progress')?> <span class="text-danger">*</span></label>
				<div class="col-lg-8">
				<select name="progress" class="form-control">
					<option value="0">0 %</option>
					<option value="10">10 %</option>
					<option value="20">20 %</option>
					<option value="30">30 %</option>
					<option value="40">40 %</option>
					<option value="50">50 %</option>
					<option value="60">60 %</option>
					<option value="70">70 %</option>
					<option value="80">80 %</option>
					<option value="90">90 %</option>
					<option value="100">100 %</option>
				</select>
				</div>
				</div>
<?php } ?>
				<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('due_date')?> <small class="small text-muted">(DD-MM-YYYY)</small> </label>
				<div class="col-lg-8">
					<input type="text" class="form-control" value="<?=date('d-m-Y')?>" name="due_date">
				</div>
				</div>

				<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('estimated_hours')?> </label>
				<div class="col-lg-8">
					<input type="text" class="form-control" placeholder="100" name="estimate">
				</div>
				</div>

<?php if($role != 2){ ?>
				<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('assigned_to')?> <span class="text-danger">*</span></label>
				<div class="col-lg-8">
				<select name="assigned_to[]" multiple="multiple" class="form-control" required>
				<option value="-"><?=lang('not_assigned')?></option>
				<?php 
				$assign_to = $this -> applib->get_any_field('projects',array('project_id'=>$project),'assign_to');
				if (!empty($assign_to)) {
					foreach (unserialize($assign_to) as $value) { ?>
						<option value="<?=$value?>"><?=ucfirst($this->user_profile->get_profile_details($value,'fullname'))?></option>
					<?php } } ?>					
				</select>
				</div>
				</div>
<?php } ?>

<?php if($role != '2'){ ?>
				<div class="form-group">
                      <label class="col-lg-4 control-label"><?=lang('visible_to_client')?></label>
                      <div class="col-lg-8">
                        <label class="switch">
                          <input type="checkbox" name="visible">
                          <span></span>
                        </label>
                      </div>
                    </div>


				
<?php } ?>
				

				

				
			
		</div>
		<div class="modal-footer"> <a href="#" class="btn btn-default" data-dismiss="modal"><?=lang('close')?></a> 
		<button type="submit" class="btn btn-primary"><?=lang('add_task')?></button>
		</form>
		</div>
	</div>
	<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->