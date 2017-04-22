
<div class="modal-dialog animated fadeInDownBig">
	<div class="modal-content modal-lg">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button> <h4 class="modal-title"><?=lang('update_face')?></h4>
		</div>
				<style>
.bootstrap-timepicker{z-index:1152 !important;}.datepicker{z-index:1151 !important;}
</style>			    <?php $a=lang('error_fill');
				 ?>
		<?php
								if (!empty($task_face)) {
				foreach ($task_face as $key => $face) { ?>
					<?php
			 $attributes = array('class' => 'bs-example form-horizontal');
          echo form_open(base_url().'drug/edit_face',$attributes); ?>
		<div class="modal-body">
			 <input type="hidden" name="id" value="<?=$face->id?>">
          			

				<div class="form-group">
					<label class="col-lg-12 control-label"><?=lang('city')?> <span class="text-danger">*</span></label>
				<div class="col-lg-12">
					<input type="text" class="form-control"  value="<?=$face->type?>"  name="type" required>
				</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-12 control-label"><?=lang('url')?> <span class="text-danger">*</span></label>
				<div class="col-lg-12">
					<input type="text" class="form-control"  value="<?=$face->url?>"  name="url" required>
				</div>
				</div>	

		</div>
		<div class="modal-footer"> <a href="#" class="btn btn-default" data-dismiss="modal"><?=lang('close')?></a> 
		<button type="submit" class="btn btn-success"><?=lang('save_changes')?></button>
		</form>
		<?php } } ?>
		</div>
	</div>
	<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
<script>
var elements = document.getElementsByTagName("INPUT");
for (var i = 0; i < elements.length; i++) {
    elements[i].oninvalid = function(e) {
        e.target.setCustomValidity("");
        if (!e.target.validity.valid) {
            e.target.setCustomValidity("<?php echo $a; ?>");
        }
    };
    elements[i].oninput = function(e) {
        e.target.setCustomValidity("");
    };
}
</script>
