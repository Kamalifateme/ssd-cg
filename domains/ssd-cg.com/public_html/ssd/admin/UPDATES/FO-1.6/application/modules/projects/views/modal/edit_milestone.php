<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button> <h4 class="modal-title"><?=lang('edit_milestone')?></h4>
		</div>
		<?php 
		$role = $this -> applib->get_any_field('users',array('id'=>$this->tank_auth->get_user_id()),'role_id');
		if($role == '1'){ ?>

		<?php
			if (!empty($details)) {
			foreach ($details as $key => $m) { 
			
			$attributes = array('class' => 'bs-example form-horizontal');
          echo form_open(base_url().'projects/milestones/edit',$attributes); ?>
          <input type="hidden" name="project" value="<?=$m->project?>">
          <input type="hidden" name="id" value="<?=$m->id?>">
		<div class="modal-body">
		
          		<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('milestone_name')?> <span class="text-danger">*</span></label>
				<div class="col-lg-8">
					<input type="text" class="form-control" value="<?=$m->milestone_name?>" name="milestone_name">
				</div>
				</div>

				<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('description')?> </label>
				<div class="col-lg-8">
				<textarea name="description" class="form-control"><?=$m->description?></textarea>
				</div>
				</div>

				<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('start_date')?> <small class="small text-muted">(DD-MM-YYYY)</small> </label>
				<div class="col-lg-8">
					<input type="text" class="form-control" value="<?=$m->start_date?>" name="start_date">
				</div>
				</div>

				<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('due_date')?> <small class="small text-muted">(DD-MM-YYYY)</small> </label>
				<div class="col-lg-8">
					<input type="text" class="form-control" value="<?=$m->due_date?>" name="due_date">
				</div>
				</div>
				
<?php 
		} 
	} 
?>
		</div>
		<div class="modal-footer"> <a href="#" class="btn btn-default" data-dismiss="modal"><?=lang('close')?></a> 
		<button type="submit" class="btn btn-primary"><?=lang('edit_milestone')?></button>
		</form>
		<?php } ?>
		</div>
	</div>
	<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->