<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button> <h4 class="modal-title"><?=lang('add_milestone')?></h4>
		</div>
		
					<?php
			$role = $this -> applib->get_any_field('users',array('id'=>$this->tank_auth->get_user_id()),'role_id');
			 $attributes = array('class' => 'bs-example form-horizontal');
          echo form_open(base_url().'projects/milestones/add',$attributes); ?>
          <input type="hidden" name="project" value="<?=$project?>">
		<div class="modal-body">
		<?php if($role == '1'){ ?>
          		<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('milestone_name')?> <span class="text-danger">*</span></label>
				<div class="col-lg-8">
					<input type="text" class="form-control" placeholder="Milestone Name" name="milestone_name">
				</div>
				</div>
<?php } ?>

				<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('description')?> </label>
				<div class="col-lg-8">
				<textarea name="description" class="form-control"><?=lang('description')?></textarea>
				</div>
				</div>

				<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('start_date')?> <small class="small text-muted">(DD-MM-YYYY)</small> </label>
				<div class="col-lg-8">
					<input type="text" class="form-control" value="<?=date('d-m-Y')?>" name="start_date">
				</div>
				</div>

				<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('due_date')?> <small class="small text-muted">(DD-MM-YYYY)</small> </label>
				<div class="col-lg-8">
					<input type="text" class="form-control" value="<?=date('d-m-Y')?>" name="due_date">
				</div>
				</div>
				
			
		</div>
		<div class="modal-footer"> <a href="#" class="btn btn-default" data-dismiss="modal"><?=lang('close')?></a> 
		<button type="submit" class="btn btn-primary"><?=lang('add_milestone')?></button>
		</form>
		</div>
	</div>
	<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->