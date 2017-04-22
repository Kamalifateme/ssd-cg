
	 <div class="row">
	<!-- Start Form -->
	<div class="col-lg-12">

	<section class="panel panel-default">
	<header class="panel-heading font-bold"><i class="fa fa-cogs"></i> <?=lang('invoice_settings')?></header>
	<div class="panel-body">
	  <?php     
$attributes = array('class' => 'bs-example form-horizontal');
echo form_open_multipart('settings/update', $attributes); ?>
<input type="hidden" name="settings" value="<?=$load_setting?>">
			<div class="form-group">
				<label class="col-lg-3 control-label"><?=lang('invoice_color')?> <span class="text-danger">*</span></label> 
				<div class="col-lg-7">
					<input type="text" name="invoice_color" class="form-control" value="<?=config_item('invoice_color')?>" required>
				</div>
			</div>

			<div class="form-group">
				<label class="col-lg-3 control-label"><?=lang('invoices_due_after')?> <span class="text-danger">*</span></label> 
				<div class="col-lg-4">
					<input type="text" name="invoices_due_after" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="<?=lang('days')?>" value="<?=config_item('invoices_due_after')?>" required>
				</div>
			</div>

			<div class="form-group">
				<label class="col-lg-3 control-label"><?=lang('display_invoice_badge')?></label>
				<div class="col-lg-7">
				<select name="display_invoice_badge">
						<option value="<?=config_item('display_invoice_badge')?>"><?=lang('use_current')?></option>
						<option value="FALSE">FALSE</option>
						<option value="TRUE">TRUE</option>
					</select> 
				</div>
			</div>

			<div class="form-group">
				<label class="col-lg-3 control-label"><?=lang('automatic_email_on_recur')?></label>
				<div class="col-lg-7">
				<select name="automatic_email_on_recur">
						<option value="<?=config_item('automatic_email_on_recur')?>"><?=lang('use_current')?></option>
						<option value="FALSE">FALSE</option>
						<option value="TRUE">TRUE</option>
					</select> 
				</div>
			</div>

			<div class="form-group">
				<label class="col-lg-3 control-label"><?=lang('invoice_language')?></label>
				<div class="col-lg-7">
				<select name="invoice_language">
				<option value="<?=config_item('invoice_language')?>"><?=lang('use_current')?></option>
						<option value="en">EN</option>
						<option value="en">EN</option>
						<option value="es">ES</option>
						<option value="de">DE</option>
						<option value="fr">FR</option>
						<option value="it">IT</option>
						<option value="nl">NL</option>
					</select> 
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-3 control-label"><?=lang('invoice_logo')?></label>
				<div class="col-lg-7">
					<input type="file" class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline input-s" name="userfile">
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-3 control-label"><?=lang('default_terms')?></label>
				<div class="col-lg-7">
				<textarea class="form-control" name="default_terms"><?=$this->config->item('default_terms')?></textarea>
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

