<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button> <h4 class="modal-title"><?=lang('edit_task')?></h4>
		</div>
		<?php
					if (!empty($task_details)) {
					foreach ($task_details as $key => $task) { ?>
					<?php
			 $attributes = array('class' => 'bs-example form-horizontal');
          echo form_open(base_url().'projects/tasks/edit',$attributes); ?>
		<div class="modal-body">
			 <input type="hidden" name="task_id" value="<?=$task->t_id?>">
			 <input type="hidden" name="project" value="<?=$task->project?>">
          		<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('task_name')?> <span class="text-danger">*</span></label>
				<div class="col-lg-8">
					<input type="text" class="form-control" value="<?=$task->task_name?>" name="task_name">
				</div>
				</div>
				
<?php if($role != 2){ ?>
				<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('milestone')?> <span class="text-danger">*</span></label>
				<div class="col-lg-8">
				<select name="milestone" class="form-control">
				<option value="<?=$task->milestone?>"><?=lang('use_current')?></option>
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
				<textarea name="description" class="form-control"><?=$task->description?></textarea>
				</div>
				</div>
<?php if($role != 2){ ?>
				<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('progress')?> <span class="text-danger">*</span></label>
				<div class="col-lg-8">
				<select name="progress" class="form-control">
				<option value="<?=$task->task_progress?>"><?=$task->task_progress?> %</option>
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
				<label class="col-lg-4 control-label"><?=lang('due_date')?> <small class="small">(DD-MM-YYYY)</small> </label>
				<div class="col-lg-8">
					<input type="text" class="form-control" value="<?=$task->due_date?>" name="due_date">
				</div>
				</div>

				<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('estimated_hours')?> </label>
				<div class="col-lg-8">
					<input type="text" class="form-control" value="<?=$task->estimated_hours?>" name="estimate">
				</div>
				</div>

	<?php if($role == '1'){ ?>

	<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('assigned_to')?> <span class="text-danger">*</span></label>
				<div class="col-lg-8">
				<select name="assigned_to[]" multiple="multiple" class="form-control">
				<?php error_reporting(0)?>
				 <?php if (!empty($assign_to)) {
				 foreach (unserialize($assign_to) as $value) { ?>				 
				 	<option value="<?=$value?>" <?php foreach (unserialize($task->assigned_to) as $user) { 
				 		if ($user == $value) { ?> selected = "selected" <?php } else { } } ?>>
				 		<?=ucfirst($this->user_profile->get_profile_details($value,'fullname'))?></option>
                            <?php } ?>
                    <?php } ?>							
				</select>
				</div>
				</div>
<?php } if($role != '2'){ ?>
				<div class="form-group">
                      <label class="col-lg-4 control-label"><?=lang('visible_to_client')?></label>
                      <div class="col-lg-8">
                        <label class="switch">
                          <input type="checkbox" name="visible" <?php if($task->visible == 'Yes'){ echo "checked=\"checked\""; }?>>
                          <span></span>
                        </label>
                      </div>
                    </div>


				
<?php } ?>
				

				

				
			
		</div>
		<div class="modal-footer"> <a href="#" class="btn btn-default" data-dismiss="modal"><?=lang('close')?></a> 
		<button type="submit" class="btn btn-success"><?=lang('edit_task')?></button>
		</form>
		<?php } } ?>
		</div>
	</div>
	<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->