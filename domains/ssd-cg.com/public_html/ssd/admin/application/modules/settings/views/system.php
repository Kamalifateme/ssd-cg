<div class="row">
	<!-- Start Form -->
	<div class="col-lg-12">

	<section class="panel panel-default">
	<header class="panel-heading font-bold"><i class="fa fa-cogs"></i> <?=lang('system_settings')?></header>
	<div class="panel-body">
		<?php
		$attributes = array('class' => 'bs-example form-horizontal');
echo form_open_multipart('settings/update', $attributes); ?>
		 <?php echo validation_errors(); ?>
		<input type="hidden" name="settings" value="<?=$load_setting?>">
		<div class="form-group">
			<div class="col-lg-9">
				<input type="text" name="base_url" class="form-control" value="<?=$this->config->item('base_url')?>" required data-toggle="tooltip" data-placement="top" data-original-title="<?=lang('change_if_necessary')?>" >
			</div>
			<label class="col-lg-3 control-label"><?=lang('base_url')?> <span class="text-danger">*</span></label>

		</div>		


				
		<div class="form-group">
			<div class="col-lg-9">
				<input type="text" class="form-control" value="<?=$this->config->item('file_max_size')?>" name="file_max_size" data-type="digits" data-required="true">
			</div>
			<label class="col-lg-3 control-label"><?=lang('file_max_size')?> <span class="text-danger">*</span> </label>

		</div>
		<div class="form-group">
			<div class="col-lg-9">
				<input type="text" class="form-control" value="<?=$this->config->item('allowed_files')?>" name="allowed_files">
			</div>
			<label class="col-lg-3 control-label"><?=lang('allowed_files')?></label>

		</div>


		<div class="form-group">
			<div class="col-lg-10">
			
			<div class="col-lg-3">
			<input id="checkbox1" type="radio" name="sidebar_theme2" value="sample1.css" ><label class="pwhite" for="checkbox1"> انتخاب</label>
			</div>
			<div class="col-lg-3">
			<input id="checkbox2" type="radio" name="sidebar_theme2" value="sample2.css" ><label class="pred" for="checkbox2"> انتخاب</label>
			</div>
			<div class="col-lg-3">
			<input id="checkbox3" type="radio" name="sidebar_theme2" value="sample3.css" ><label class="pgreen" for="checkbox3"> انتخاب</label>
			</div>
			<div class="col-lg-3">
			<input id="checkbox4" type="radio" name="sidebar_theme2" value="sample4.css" ><label class="pwred" for="checkbox4"> انتخاب</label>
			</div>
			<div class="col-lg-3">
			<input id="checkbox5" type="radio" name="sidebar_theme2" value="sample5.css" ><label class="pwgreen" for="checkbox5"> انتخاب</label>
			</div>
			<div class="col-lg-3">
			<input id="checkbox6" type="radio" name="sidebar_theme2" value="sample6.css" ><label class="pwblue" for="checkbox6"> انتخاب</label>
			</div>
			<div class="col-lg-3">
			<input id="checkbox7" type="radio" name="sidebar_theme2" value="sample7.css" ><label class="ppurble" for="checkbox7"> انتخاب</label>
			</div>
			<div class="col-lg-3">
			<input id="checkbox8" type="radio" name="sidebar_theme2" value="sample8.css" ><label class="pwpurble" for="checkbox8"> انتخاب</label>
			</div>
			<div class="col-lg-3">
			<input id="checkbox9" type="radio" name="sidebar_theme2" value="sample9.css" ><label class="bblue" for="checkbox9"> انتخاب</label>
			</div>
			<div class="col-lg-3">
			<input id="checkbox10" type="radio" name="sidebar_theme2" value="sample10.css" ><label class="bwhite" for="checkbox10"> انتخاب</label>
			</div>
			<div class="col-lg-3">
			<input id="checkbox11" type="radio" name="sidebar_theme2" value="sample11.css" ><label class="bpurble" for="checkbox11"> انتخاب</label>
			</div>
			<div class="col-lg-3">
			<input id="checkbox12" type="radio" name="sidebar_theme2" value="sample12.css" ><label class="wpurble" for="checkbox12">  انتخاب</label>
			</div>
			<div class="col-lg-3">
			<input id="checkbox13" type="radio" name="sidebar_theme2" value="sample13.css" ><label class="bbwhite" for="checkbox13"> انتخاب</label>
			</div>


			</div>
			<label class="col-lg-2 control-label"><?=lang('sidebar_theme')?> <span class="text-danger">*</span></label>

		</div>
	
	
	<div class="form-group">
		<div class="col-lg-offset-2 col-lg-10"> 
		<button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check"></i> <?=lang('save_changes')?></button>
		</div>
	</div>
</form>




	</div> </section>
</div>
<!-- End Form -->




</div>

