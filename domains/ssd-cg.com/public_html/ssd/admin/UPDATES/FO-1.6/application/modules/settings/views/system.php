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
			<label class="col-lg-3 control-label"><?=lang('base_url')?> <span class="text-danger">*</span></label>
			<div class="col-lg-7">
				<input type="text" name="base_url" class="form-control" value="<?=$this->config->item('base_url')?>" required data-toggle="tooltip" data-placement="top" data-original-title="<?=lang('change_if_necessary')?>" >
			</div>
		</div>		

		<div class="form-group">
			<label class="col-lg-3 control-label"><?=lang('default_language')?> <span class="text-danger">*</span></label>
			<div class="col-lg-4">
				<select name="language" class="form-control" required>
				<option value="<?=$this->config->item('language')?>"><?=lang('use_current')?> - <?=ucfirst($this->config->item('language'))?></option>
				<option value="english">English</option>
				<option value="spanish">Spanish</option>
				<option value="french">French</option>
				<option value="portuguese">Portuguese</option>
				<option value="italian">Italian</option>
				<option value="german">German</option>
				<option value="dutch">Dutch</option>
				<option value="norwegian">Norwegian</option>
				<option value="serbian">Serbia</option>
				</select>
			</div>
		</div>
				
		<div class="form-group">
			<label class="col-lg-3 control-label"><?=lang('file_max_size')?> <span class="text-danger">*</span> </label>
			<div class="col-lg-3">
				<input type="text" class="form-control" value="<?=$this->config->item('file_max_size')?>" name="file_max_size" data-type="digits" data-required="true">
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-3 control-label"><?=lang('allowed_files')?></label>
			<div class="col-lg-7">
				<input type="text" class="form-control" value="<?=$this->config->item('allowed_files')?>" name="allowed_files">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-lg-3 control-label"><?=lang('cron_key')?></label>
			<div class="col-lg-7">
				<input type="text" class="form-control" value="<?=$this->config->item('cron_key')?>" name="cron_key">
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-3 control-label"><?=lang('date_format')?></label>
			<div class="col-lg-7">
				<input type="text" class="form-control" value="<?=$this->config->item('date_format')?>" name="date_format">
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-3 control-label"><?=lang('decimal_separator')?></label>
			<div class="col-lg-7">
				<input type="text" class="form-control" value="<?=$this->config->item('decimal_separator')?>" name="decimal_separator">
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-3 control-label"><?=lang('thousand_separator')?></label>
			<div class="col-lg-7">
				<input type="text" class="form-control" value="<?=$this->config->item('thousand_separator')?>" name="thousand_separator">
			</div>
		</div>

		<div class="form-group">
			<label class="col-lg-3 control-label"><?=lang('client_create_project')?></label>
			<div class="col-lg-4">
				<select name="client_create_project" class="form-control">
					<option value="<?=$this->config->item('client_create_project')?>"><?=lang('use_current')?></option>
					<option value="FALSE"><?=lang('false')?></option>
					<option value="TRUE"><?=lang('true')?></option>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label class="col-lg-3 control-label"><?=lang('demo_mode')?></label>
			<div class="col-lg-4">
				<select name="demo_mode" class="form-control">
					<option value="<?=$this->config->item('demo_mode')?>"><?=lang('use_current')?></option>
					<option value="FALSE"><?=lang('false')?></option>
					<option value="TRUE"><?=lang('true')?></option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-3 control-label"><?=lang('sidebar_theme')?> <span class="text-danger">*</span></label>
			<div class="col-lg-4">
				<select name="sidebar_theme" class="form-control" required>
				<option value="<?=$this->config->item('sidebar_theme')?>"><?=lang('use_current')?> - <?=ucfirst($this->config->item('sidebar_theme'))?></option>
				<option value="light lter">Light</option>
				<option value="dark">Dark</option>
				<option value="black">Black</option>
				</select>
			</div>
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

