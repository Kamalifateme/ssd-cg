<div class="modal-dialog animated fadeInDownBig " >
	<div class="modal-content">
	<div class="modal-content modal-content-one">

		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button> <h4 class="modal-title"><?=lang('add_group')?></h4>
		</div>
		<style>
.datepicker{z-index:99999 !important;}
</style>
					<?php
			 $attributes = array('class' => 'bs-example form-horizontal');
          echo form_open(base_url().'drug/add_group',$attributes); ?>
		<div class="modal-body">
					    <?php $a=lang('error_fill');
				 ?>
          		<div class="form-group col-lg-12">
					<label class="col-lg-12 control-label"><?=lang('group')?> <span class="text-danger">*</span></label>
				<div class="col-lg-12">
					<input type="text" class="form-control"  name="type" required>
				</div>
				</div>
          		<div class="form-group col-lg-12">
					<label class="col-lg-12 control-label"><?=lang('url')?> <span class="text-danger">*</span></label>
				<div class="col-lg-12">
					<input type="text" class="form-control"  name="url" required>
				</div>
				</div>

			
		</div>
		
		<div class="modal-footer" > <a href="#" class="btn btn-default" data-dismiss="modal"><?=lang('close')?></a> 
		<button type="submit" class="btn btn-success"><?=lang('save_as_group')?></button>
		</form>
		</div>
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

  		