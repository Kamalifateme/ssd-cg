
	 <div class="row">
	<!-- Start Form -->
	<div class="col-lg-12">
	<section class="panel panel-default">
	<header class="panel-heading font-bold"><i class="fa fa-cogs"></i> <?=lang('email_settings')?></header>
	<div class="panel-body">
	  <?php     
$attributes = array('class' => 'bs-example form-horizontal','data-validate'=>'parsley');
echo form_open('settings/update', $attributes); ?>
 <?php echo validation_errors(); ?>
<input type="hidden" name="settings" value="<?=$load_setting?>">

			<div class="form-group">
				<label class="col-lg-3 control-label"><?=lang('company_email')?> <span class="text-danger">*</span></label>
				<div class="col-lg-8">
					<input type="email" class="form-control" value="<?=$this->config->item('company_email')?>" name="company_email" data-type="email" data-required="true">
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-3 control-label"><?=lang('use_postmark')?> </label>
				<div class="col-lg-8">
				<select name="use_postmark" class="form-control">
				<option value="<?=$this->config->item('use_postmark')?>"><?=lang('use_current')?></option>
				<option value="TRUE">TRUE</option>
				<option value="FALSE">FALSE</option>
				</select>
				<span class="help-block m-b-none"><strong>If TRUE,set config here application/config/postmark.php</strong></span>
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-3 control-label"><?=lang('email_protocol')?> <span class="text-danger">*</span></label>
				<div class="col-lg-8">
				<select name="protocol" class="form-control">
				<option value="<?=$this->config->item('protocol')?>"><?=lang('use_current')?></option>
				<option value="mail">MAIL</option>
				<option value="smtp">SMTP</option>
				</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-3 control-label"><?=lang('smtp_host')?> </label>
				<div class="col-lg-8">
					<input type="text" class="form-control"  value="<?=$this->config->item('smtp_host')?>" name="smtp_host">
					<span class="help-block m-b-none">SMTP Server Address</strong>.</span>
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-3 control-label"><?=lang('smtp_user')?></label>
				<div class="col-lg-8">
					<input type="text" class="form-control"  value="<?=$this->config->item('smtp_user')?>" name="smtp_user">
				</div>
			</div>
			<div class="form-group">
			<?php $this->load->library('encrypt'); ?>
				<label class="col-lg-3 control-label"><?=lang('smtp_pass')?></label>
				<div class="col-lg-8">
					<input type="password" class="form-control" value="<?=$this->encrypt->decode($this->config->item('smtp_pass'));?>" name="smtp_pass">
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-3 control-label"><?=lang('smtp_port')?></label>
				<div class="col-lg-8">
					<input type="text" class="form-control" value="<?=$this->config->item('smtp_port')?>" name="smtp_port">
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