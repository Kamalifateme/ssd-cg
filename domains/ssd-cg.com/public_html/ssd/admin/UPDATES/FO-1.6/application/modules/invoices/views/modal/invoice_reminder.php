<div class="modal-dialog">
	<div class="modal-content">
	<?php
	foreach ($invoice_details as $key => $invoice) { ?>
		<div class="modal-header"> <button type="button" class="close" data-dismiss="modal">&times;</button> 
		<h4 class="modal-title"><?=lang('invoice_reminder')?></h4>
		</div><?php
			 $attributes = array('class' => 'bs-example form-horizontal');
          echo form_open(base_url().'invoices/remind',$attributes); ?>
		<div class="modal-body">
			<input type="hidden" name="invoice_id" value="<?=$invoice->inv_id?>">
			<input type="hidden" name="client_name" value="<?=$this -> applib -> get_any_field('companies',array(
				                                    'co_id' => $invoice->client
									), 'company_name')?>">
			<input type="hidden" name="amount" value="<?=number_format($this -> applib -> calculate('invoice_due',$invoice->inv_id),2,config_item('decimal_separator'),config_item('thousand_separator'))?>">
			 
          				<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('subject')?> <span class="text-danger">*</span></label>
				<div class="col-lg-8">
					<input type="text" class="form-control" value="Invoice <?=$invoice->reference_no?> Reminder" name="subject">
				</div>
				</div>
				
				
				<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('message')?></label>
				<div class="col-lg-8">
				<div>
					<?=$this -> applib -> get_any_field('email_templates',array(
				                                    'email_group' => 'invoice_reminder'
									), 'template_body')?>
				</div>
				</div>
				</div>
			
		</div>
		<div class="modal-footer"> <a href="#" class="btn btn-default" data-dismiss="modal"><?=lang('close')?></a> 
		<button type="submit" class="btn btn-<?=config_item('button_color')?>"><?=lang('send_reminder')?></button>
		</form>
		</div>
	</div>
	<?php } ?>
	<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->