<section id="content">
	<section class="hbox stretch">
		<?php
										if (!empty($client_details)) {
		foreach ($client_details as $key => $i) { ?>
		<!-- .aside -->
		<aside>
			<section class="vbox">
				<header class="header bg-white b-b b-light">
					<a href="#aside" data-toggle="class:show" class="btn btn-sm btn-dark pull-right"><i class="fa fa-edit"></i> <?=lang('edit')?></a>

					<p><?=$i->company_name?> - <?=lang('details')?> </p>
				</header>
				<section class="scrollable wrapper">
					<section class="panel panel-default">			
						
						<div class="panel-body">							
							<!-- Details START -->
							<div class="col-md-6">
								<div class="group">
									<h4 class="subheader text-muted"><?=lang('contact_details')?></h4>
									<div class="row inline-fields">
										<div class="col-md-4"><?=lang('company_name')?></div>
										<div class="col-md-6"><?=$i->company_name?></div>
									</div>
									<div class="row inline-fields">
										<div class="col-md-4"><?=lang('contact_person')?></div>
										<div class="col-md-6"><?=$this->user_profile->get_profile_details($i->primary_contact,'fullname')?></div>
									</div>
									<div class="row inline-fields">
										<div class="col-md-4"><?=lang('email')?></div>
										<div class="col-md-6"><?=$i->company_email?></div>
									</div>
								</div>
								<div class="group">
									<h4 class="subheader text-muted"><?=lang('other_details')?></h4>
									<div class="row inline-fields">
										<div class="col-md-4"><?=lang('city')?></div>
										<div class="col-md-6"><?=$i->city?></div>
									</div>
									<div class="row inline-fields">
										<div class="col-md-4"><?=lang('country')?></div>
										<div class="col-md-6 text-success"><?=$i->country?></div>
									</div>									
									
									
								</div>
								
							</div>
							<div class="col-md-6">
								<div class="group">
									<div class="row" style="margin-top: 5px">
										<div class="rec-pay col-md-12">
											<h4 class="subheader text-muted"><?=lang('received_amount')?></h4>
											<h3 class="amount text-success cursor-pointer"><strong>
											<?=$this->config->item('default_currency')?> 
											<?=number_format($this->user_profile->client_paid($i->co_id),2,$this->config->item('decimal_separator'),$this->config->item('thousand_separator'))?>
											</strong></h3>
											<div class="row inline-fields">
										<div class="col-md-4"><?=lang('address')?></div>
										<div class="col-md-6"><?=$i->company_address?></div>
									</div>
									<div class="row inline-fields">
										<div class="col-md-4"><?=lang('phone')?></div>
										<div class="col-md-6"><?=$i->company_phone?></div>
									</div>
											<div class="row inline-fields">
										<div class="col-md-4"><?=lang('website')?></div>
										<div class="col-md-6"><a href="<?=$i->company_website?>" class="text-info" target="_blank"><?=$i->company_website?></a></div>
									</div>
									<div class="row inline-fields">
										<div class="col-md-4"><?=lang('vat')?></div>
										<div class="col-md-6"><?=$i->VAT?></div>
									</div>
									<div class="row inline-fields">
										<div class="col-md-4"><a href="#additional_info" data-toggle="class:show">Show Account Details</a></div>
										<div class="col-md-6">
										<div id="additional_info" class="hide">
										<div class="bg-white">
																			
										<?=lang('account_username')?> : <?=$i->account_username?><br>
										<?=lang('account_password')?> : <?=$i->account_password?><br>
										<?=lang('port')?> : <?=$i->port?><br>
										<?=lang('hostname')?> : <?=$i->hostname?><br>
										<?=lang('hosting_company')?> : <?=$i->hosting_company?><br>
										</div>
										</div>
										</div>
									
									</div>
									<!-- End Additional Info -->
										</div>
									</div>
								</div>
							</div>
							
							<!-- Details END -->
						</div>

						<div class="panel-body">
							<!-- Client Contacts -->
							<div class="col-md-12">
							<section class="panel panel-default">
                <header class="panel-heading">
                <a href="<?=base_url()?>contacts/add/<?=$i->co_id?>" class="btn btn-xs btn-info pull-right" data-toggle="ajaxModal"><i class="fa fa-plus"></i> <?=lang('add_contact')?></a>

                <i class="fa fa-user"></i> <?=lang('contacts')?></header>
			<table class="table table-striped b-t b-light text-sm AppendDataTables">
			<thead>
				<tr>
					<th><?=lang('full_name')?></th>
					<th><?=lang('email')?></th>
					<th><?=lang('phone')?> </th>
					<th><?=lang('last_login')?> </th>
					<th><?=lang('options')?></th>
				</tr> </thead> <tbody>
				<?php
								if (!empty($client_contacts)) {
				foreach ($client_contacts as $key => $contact) { ?>
				<tr>
					<td><?=$contact->fullname?></td>
					<td class="text-info" ><?=$contact->email?> </td>
					<td><?=$contact->phone?> </td>
					<?php
					if ($contact->last_login == '0000-00-00 00:00:00') {
						$login_time = "-";
					}else{ $login_time = strftime("%b %d, %Y %H:%M:%S", strtotime($contact->last_login)); } ?>
					<td><?=$login_time?> </td>				
					<td>
					
					<a href="<?=base_url()?>companies/make_primary/<?=$contact->user_id?>/<?=$i->co_id?>" class="btn btn-default btn-xs" title="<?=lang('primary_contact')?>" >
					<i class="fa fa-chain <?php if ($i->primary_contact == $contact->user_id) { echo "text-danger"; } ?>"></i> </a>
					<a href="<?=base_url()?>contacts/view/update/<?=$contact->user_id?>" class="btn btn-default btn-xs" title="<?=lang('edit')?>"  data-toggle="ajaxModal">
					<i class="fa fa-edit"></i> </a>
					<a href="<?=base_url()?>users/account/delete/<?=$contact->user_id?>" class="btn btn-default btn-xs" title="<?=lang('delete')?>" data-toggle="ajaxModal">
					<i class="fa fa-trash-o"></i> </a>
					</td>
				</tr>
				<?php  } } ?>
				
				
				
			</tbody>
		</table>
							</section></div>

							<!-- Client Invoices -->
							<div class="col-md-6">
							<section class="panel panel-default">
                <header class="panel-heading"><i class="fa fa-list"></i> <?=strtoupper(lang('invoices'))?> </header>
		<table class="table table-striped b-t b-light text-sm AppendDataTables">
			<thead>
				<tr>
					<th><?=lang('reference_no')?></th>
					<th><?=lang('date_issued')?></th>
					<th><?=lang('due_date')?> </th>
					<th><?=lang('amount')?> </th>
				</tr> </thead> <tbody>
				<?php
								if (!empty($client_invoices)) {
				foreach ($client_invoices as $key => $invoice) { ?>
				<tr>
					<td><a class="text-info" href="<?=base_url()?>invoices/view/<?=$invoice->inv_id?>"><?=$invoice->reference_no?></a></td>
					<td><?=strftime(config_item('date_format'), strtotime($invoice->date_saved));?> </td>
					<td><?=strftime(config_item('date_format'), strtotime($invoice->due_date));?> </td>
					<td><small><?=$this->config->item('default_currency')?></small> <?=number_format($this->applib->invoice_payable($invoice->inv_id),2,$this->config->item('decimal_separator'),$this->config->item('thousand_separator'))?> </td>
				</tr>
				<?php  } } ?>
				
				
				
			</tbody>
		</table></section>
							</div>
							<!-- Client Projects -->
							<div class="col-md-6">
							<section class="panel panel-default">
                <header class="panel-heading"><i class="fa fa-suitcase"></i> <?=strtoupper(lang('projects'))?> </header>
			<table class="table table-striped b-t b-light text-sm AppendDataTables">
			<thead>
				<tr>
					<th><?=lang('project_code')?></th>
					<th><?=lang('project_name')?></th>
					<th><?=lang('progress')?> </th>
				</tr> </thead> <tbody>
				<?php
								if (!empty($client_projects)) {
				foreach ($client_projects as $key => $project) { ?>
				<tr>
					<td><a class="text-info" href="<?=base_url()?>projects/view/<?=$project->project_id?>">
					<?=$project->project_code?></a></td>
					<td><?=$project->project_title?> </td>
					<td><div class="progress progress-xs m-t-xs progress-striped active m-b-none">
				<div class="progress-bar progress-bar-success" data-toggle="tooltip" data-original-title="<?=$project->progress?>%" style="width: <?=$project->progress?>%">
											</div>
										</div>
					</td>
				</tr>
				<?php  } } ?>
				
				
				
			</tbody>
		</table>
							</section></div>
						</div>
						<!-- End -->
					</section>
				</section>
			</section>
		</aside>
		<!-- /.aside -->
		<!-- .aside -->
		<aside class="aside-lg bg-white b-l hide" id="aside">
			<section class="vbox">
				<section class="scrollable wrapper">
					<?php
					echo form_open(base_url().'companies/update'); ?>
					<?php echo validation_errors(); ?>
					<input type="hidden" name="company_ref" value="<?=$i->company_ref?>">
					<input type="hidden" name="co_id" value="<?=$i->co_id?>">
					<div class="form-group">
						<label><?=lang('company_name')?> <span class="text-danger">*</span></label>
						<input type="text" name="company_name" value="<?=$i->company_name?>" class="input-sm form-control" required>
					</div>
					<div class="form-group">
						<label><?=lang('company_email')?> <span class="text-danger">*</span></label>
						<input type="email" name="company_email" value="<?=$i->company_email?>" class="input-sm form-control" required>
					</div>
					<div class="form-group">
						<label><?=lang('phone')?> </label>
						<input type="text" value="<?=$i->company_phone?>" name="company_phone"  class="input-sm form-control">
					</div>
					<div class="form-group">
						<label><?=lang('website')?> </label>
						<input type="text" value="<?=$i->company_website?>" name="company_website"  class="input-sm form-control">
					</div>
					<div class="form-group">
						<label><?=lang('address')?> <span class="text-danger">*</span></label>
						<textarea name="company_address" class="form-control"><?=$i->company_address?></textarea>
					</div>
					<div class="form-group">
						<label><?=lang('city')?> </label>
						<input type="text" value="<?=$i->city?>" name="city" class="input-sm form-control">
					</div>
					<div class="form-group">
						<label><?=lang('vat')?> </label>
						<input type="text" value="<?=$i->VAT?>" name="VAT" class="input-sm form-control">
					</div>
					<!-- Start Additional fields -->
					<p><a href="#additional_fields" data-toggle="class:show">Additional Fields</a></p>
					<div id="additional_fields" class="hide">

					<div class="form-group">
						<label><?=lang('account_username')?> </label>
						<input type="text" value="<?=$i->account_username?>" name="account_username" class="input-sm form-control">
					</div>
					<div class="form-group">
						<label><?=lang('account_password')?> </label>
						<input type="password" value="<?=$i->account_password?>" name="account_password" class="input-sm form-control">
					</div>
					<div class="form-group">
						<label><?=lang('port')?> </label>
						<input type="text" value="<?=$i->port?>" name="port" class="input-sm form-control">
					</div>
					<div class="form-group">
						<label><?=lang('hostname')?> </label>
						<input type="text" value="<?=$i->hostname?>" name="hostname" class="input-sm form-control">
					</div>
					<div class="form-group">
						<label><?=lang('hosting_company')?> </label>
						<input type="text" value="<?=$i->hosting_company?>" name="hosting_company" class="input-sm form-control">
					</div>
					</div> 
					<!-- End Additional Fields -->
					<div class="form-group">
						<label><?=lang('country')?> </label>
						<select id="select2-option" style="width:200px" name="country" >
							<optgroup label="Selected Country">
								<option value="<?=$i->country?>"><?=$i->country?></option>
							</optgroup>
							<optgroup label="Other Countries">
								<?php foreach ($countries as $country): ?>
								<option value="<?=$country->value?>"><?=$country->value?></option>
								<?php endforeach; ?>
							</optgroup>
						</select>
					</div>
					<button type="submit" class="btn btn-sm btn-success"><?=lang('save_changes')?></button>
					<hr>
				</form>
				
			</section></section>
			
		</aside>
		<!-- /.aside -->
		<?php }} ?>
	</section>
	<a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen, open" data-target="#nav,html"></a>
</section>