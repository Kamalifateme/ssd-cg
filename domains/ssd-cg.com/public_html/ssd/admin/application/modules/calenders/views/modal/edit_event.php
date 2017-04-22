
<div class="modal-dialog animated fadeInDownBig">
	<div class="modal-content modal-lg">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button> <h4 class="modal-title"><?=lang('update_events')?></h4>
		</div>
				<style>
.bootstrap-timepicker{z-index:1152 !important;}.datepicker{z-index:1151 !important;}
</style>
		<?php
								if (!empty($task_events)) {
				foreach ($task_events as $key => $event) { ?>
					<?php
			 $attributes = array('class' => 'bs-example form-horizontal');
          echo form_open(base_url().'calenders/edit_event',$attributes); ?>
		<div class="modal-body">
			 <input type="hidden" name="id" value="<?=$event->id?>">
          			
					<?php 
					$a=$event->start_date;
					$datestart = explode("-", $a);
					$yearss=$datestart[0];
					$monthss=$datestart[1];
					$dayss=$datestart[2];
					$this->load->library('jdf');
					$jalali = $this->jdf->gregorian_to_jalali($yearss,$monthss,$dayss,'-');
					
					$b=$event->end_date;
					$dateend = explode("-", $b);
					$yeare=$dateend[0];
					$monthe=$dateend[1];
					$daye=$dateend[2];
					$jalali2 = $this->jdf->gregorian_to_jalali($yeare,$monthe,$daye,'-');

					?>
				<div class="form-group">
					<label class="col-lg-12 control-label"><?=lang('title')?> <span class="text-danger">*</span></label>
				<div class="col-lg-12">
					<input type="text" class="form-control" value="<?=$event->title?>"  name="event_title" required>
				</div>
				</div>

				<div class="form-group">
					<label class="col-lg-12 control-label"><?=lang('date_start')?> <span class="text-danger">*</span></label>
				<div class="col-lg-12">
				<input class="datepic3 datepicker-input form-control" value="<?=$jalali?>" size="16" type="text"  name="date_start" required>
				</div>
				</div>
				
				
				<div class="form-group">
					<label class="col-lg-12 control-label"><?=lang('date_end')?> <span class="text-danger">*</span></label>
				<div class="col-lg-12">
				<input class="datepic3 datepicker-input form-control" size="16" value="<?=$jalali2?>" type="text" name="date_end" required >
				</div>
				</div>
				
				
				 <div class="form-group">
				 	<label class="col-lg-12 control-label"><?=lang('time_start')?> <span class="text-danger">*</span></label>
				<div class="col-lg-12">
					<input type="text" class="form-control clockface_3" value="02:30" value="<?=$event->time_start?>" data-format="HH:mm"  name="event_time_start" required>
				</div>
				</div>
				
				
				<div class="form-group">
					<label class="col-lg-12 control-label"><?=lang('time_end')?> <span class="text-danger">*</span></label>
				<div class="col-lg-12">
					<input type="text" class="form-control clockface_3" value="02:30" value="<?=$event->time_end?>"  id="time" data-format="HH:mm" name="event_time_end" required>
				</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-12 control-label"><?=lang('color')?> <span class="text-danger">*</span></label>
				<div class="col-lg-12">
					<select name="color" class="form-control"">
					<option value="<?=$event->color?>"><?=lang('default')?></option>
					<option value="#d84a38"><?=lang('red')?></option>
					<option value="#578ebe"><?=lang('blue')?></option>
					<option value="#f3c200"><?=lang('yellow')?></option>
					<option value="#1bbc9b"><?=lang('green')?></option>
					<option value="#8e44ad"><?=lang('Violet')?></option>
					<option value="#736357"><?=lang('brown')?></option>
					<option value="#000"><?=lang('black')?></option>
					<option value="#ffa200"><?=lang('orange')?></option>

					</select>
				</div>
				</div>
				
				
				<div class="form-group">
					<label class="col-lg-12 control-label"><?=lang('description')?> <span class="text-danger"></span></label>
				<div class="col-lg-12">
				<textarea name="description" class="form-control"><?=$event->description?></textarea>
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
      <script src="<?=base_url()?>resource/js/jquery-2.1.1.min.js"></script>

<script src="<?=base_url()?>resource/js/datepicker/bootstrap-datepicker.js" cache="false"></script>
<script src="<?=base_url()?>resource/js/datepicker/bootstrap-datepicker.fa.js" cache="false"></script>
<script src="<?=base_url()?>resource/js/datepicker/bootstrap-timepicker.min.js" cache="false"></script>
<script src="<?=base_url()?>resource/js/datepicker/clockface.js" cache="false"></script>
		<script>
            $(document).ready(function() {
                $(".datepic3").datepicker({
                    isRTL: true,
                    dateFormat: "yy-mm-dd"
                });
            });
		</script>
		<script type="text/javascript">
        $('.clockface_3').clockface({
            format: 'HH:mm'
        }).clockface('show', '14:30');
        </script> 