<div class="modal-dialog animated fadeInDownBig">
	<div class="modal-content" style="height: 215px;width:50%;margin-right:25%;margin-left:25%;">
		<div class="modal-header"> <button type="button" class="close" data-dismiss="modal">&times;</button> 
		<h4 class="modal-title"><?=lang('delete_doctor')?></h4>
		</div><?php
			echo form_open(base_url().'doctor/delete_doctor'); ?>
		<div class="modal-body">
			<p><?=lang('delete_item_warning')?></p>
			<input type="hidden" name="r_url" value="<?=base_url()?>doctor">
			
			<input type="hidden" name="id" value="<?=$id?>">

		</div>
		<div class="modal-footer"> <a href="#" class="btn btn-default" data-dismiss="modal"><?=lang('close')?></a>
			<button type="submit" class="btn btn-danger"><?=lang('delete_button')?></button>
		</form>
	</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->