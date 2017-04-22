
	 <div class="row">
	<!-- Start Form -->
	<div class="col-lg-12">

	<section class="panel panel-default">
	<header class="panel-heading font-bold"><i class="fa fa-cogs"></i> <?=lang('general_settings')?></header>
	<div class="panel-body">
	  <?php     
$attributes = array('class' => 'bs-example form-horizontal');
echo form_open_multipart('settings/update', $attributes); ?>
<input type="hidden" name="settings" value="<?=$load_setting?>">
			<div class="form-group">
				<label class="col-lg-3 control-label"><?=lang('company_name')?> <span class="text-danger">*</span></label> 
				<div class="col-lg-7">
					<input type="text" name="company_name" class="form-control" value="<?=$this->config->item('company_name')?>" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-3 control-label"><?=lang('contact_person')?> </label>
				<div class="col-lg-7">
					<input type="text" class="form-control"  value="<?=$this->config->item('contact_person')?>" name="contact_person">
					<span class="help-block m-b-none"><?=lang('company_representative')?></strong>.</span>
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-3 control-label"><?=lang('company_address')?> <span class="text-danger">*</span></label>
				<div class="col-lg-7">
					<textarea class="form-control" name="company_address" required><?=$this->config->item('company_address')?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-3 control-label"><?=lang('company_phone')?></label>
				<div class="col-lg-7">
					<input type="text" class="form-control" value="<?=$this->config->item('company_phone')?>" name="company_phone">
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-3 control-label"><?=lang('company_email')?></label>
				<div class="col-lg-7">
					<input type="email" class="form-control" value="<?=$this->config->item('company_email')?>" name="company_email">
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-3 control-label"><?=lang('company_domain')?></label>
				<div class="col-lg-7">
					<input type="text" class="form-control" value="<?=$this->config->item('company_domain')?>" name="company_domain">
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-3 control-label"><?=lang('company_vat')?></label>
				<div class="col-lg-7">
					<input type="text" class="form-control" value="<?=$this->config->item('company_vat')?>" name="company_vat">
				</div>
			</div>

			<div class="form-group">
				<label class="col-lg-3 control-label"><?=lang('company_logo')?></label>
				<div class="col-lg-7">
					<input type="file" class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline input-s" name="userfile">
				</div>
			</div>

			<div class="form-group">
				<label class="col-lg-3 control-label"><?=lang('country')?></label>
				<div class="col-lg-7">
					<div class="m-b"> 
					<select id="select2-option" style="width:210px" name="company_country" > 
					<optgroup label="Selected Country"> 
					<option value="<?=$this->config->item('company_country')?>"><?=$this->config->item('company_country')?></option>
					</optgroup> 
					<optgroup label="Other Countries"> 
						<?php foreach ($countries as $country): ?>
						<option value="<?=$country->value?>"><?=$country->value?></option>
						<?php endforeach; ?>
					</optgroup> 
					</select> 
					</div> 
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-3 control-label"><?=lang('city')?></label>
				<div class="col-lg-7">
					<input type="text" class="form-control" value="<?=$this->config->item('company_city')?>" name="company_city">
				</div>
			</div>
			
			
			<div class="form-group">
				<div class="col-lg-offset-2 col-lg-10">
				<button type="submit" class="btn btn-sm btn-primary"><?=lang('save_changes')?></button>
				</div>
			</div>
		</form>

		


	</div> </section>
</div>
<!-- End Form -->




</div>

