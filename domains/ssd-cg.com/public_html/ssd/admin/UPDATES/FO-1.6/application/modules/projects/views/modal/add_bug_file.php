<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button> <h4 class="modal-title"><?=lang('upload_file')?></h4>
		</div>
		
					<?php
			 $attributes = array('class' => 'bs-example form-horizontal');
          echo form_open_multipart(base_url().'projects/bugs/file',$attributes); ?>
          <input type="hidden" name="project" value="<?=$project?>">
           <input type="hidden" name="bug" value="<?=$bug?>">
		<div class="modal-body">
			<p><?=lang('email_sending_warning')?></p>

                <div id="file_container">
                    <div class="form-group">
                        <label class="col-lg-4 control-label"><?=lang('file_name')?> </label>
                        <div class="col-lg-8">
                            <input type="file" name="projectfiles[]">
                        </div>
                    </div>
                </div>
                <div style="height: 32px;">
                    <a href="#" class="btn btn-xs btn-default pull-right" id="add-new-file">Add another file</a>
                    <a href="#" class="btn btn-xs btn-default pull-right" id="clear-files" style="margin-right:6px;">Clear files</a>
                </div>

                <div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('description')?> <span class="text-danger">*</span></label>
				<div class="col-lg-8">
				<textarea name="description" class="form-control"><?=lang('description')?></textarea>
				</div>
				</div>
			
		</div>
		<div class="modal-footer"> <a href="#" class="btn btn-default" data-dismiss="modal"><?=lang('close')?></a> 
		<button type="submit" class="btn btn-primary"><?=lang('upload_file')?></button>
		</form>
		</div>
	</div>

    <script type="text/javascript">
        $('#clear-files').click(function(){
            $('#file_container').html(
                "<div class='form-group'>" +
                    "<label class='col-lg-4 control-label'><?=lang('file_name')?> </label>" +
                    "<div class='col-lg-8'>" +
                    "<input type='file' name='projectfiles[]'>" +
                    "</div></div>"
            );
        });

        $('#add-new-file').click(function(){
            $('#file_container').append(
                "<div class='form-group'>" +
                    "<label class='col-lg-4 control-label'><?=lang('file_name')?> </label>" +
                "<div class='col-lg-8'>" +
                "<input type='file' name='projectfiles[]'>" +
                "</div></div>"
            );
        });
    </script>
	<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->