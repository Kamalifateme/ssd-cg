<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header"> <button type="button" class="close" data-dismiss="modal">&times;</button> 
		<h4 class="modal-title"><?=lang('delete_milestone')?></h4>
		</div><?php
			echo form_open(base_url().'projects/milestones/delete'); ?>
		<div class="modal-body">
			<p><?=lang('delete_milestone_warning')?></p>
			
			<input type="hidden" name="project" value="<?=$project?>">
			<input type="hidden" name="id" value="<?=$milestone?>">

		</div>
		<div class="modal-footer"> <a href="#" class="btn btn-default" data-dismiss="modal"><?=lang('close')?></a>
			<button type="submit" class="btn btn-danger"><?=lang('delete_button')?></button>
		</form>
	</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->