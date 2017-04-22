<!-- Start -->


<section id="content">
	<section class="hbox stretch">
	
		<aside class="aside-md bg-white b-r hidden-print" id="subNav">

			<header class="dk header b-b">
			 <?php
                $username = $this -> tank_auth -> get_username();
                if($role == '1' OR $this -> applib -> allowed_module('add_estimates',$username)) { ?> 
		<a href="<?=base_url()?>estimates/add" data-original-title="<?=lang('create_estimate')?>" data-toggle="tooltip" data-placement="bottom" class="btn btn-icon btn-default btn-sm pull-right"><i class="fa fa-plus"></i></a>
		<?php } ?>
		<p class="h4"><?=lang('all_estimates')?></p>
		</header>



			<section class="vbox">
			 <section class="scrollable w-f">
			   <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">
			<?=$this->load->view('sidebar/estimates',$estimates)?>

			</div></section>
			</section>
			</aside> 
			
			<aside>
			<section class="vbox">
				<header class="header bg-white b-b clearfix hidden-print">
					<div class="row m-t-sm">
						<div class="col-sm-8 m-b-xs">
						<?php
					if (!empty($estimate_details)) {
			foreach ($estimate_details as $key => $estimate) { ?>
			<a data-original-title="<?=lang('print_estimate')?>" data-toggle="tooltip" data-placement="bottom" href="#" class="btn btn-sm btn-default" onClick="window.print();">
					<i class="fa fa-print"></i> </a> 

 <?php if($role == '1' OR $this -> applib -> allowed_module('edit_estimates',$username)) { ?> 
					<a href="<?=base_url()?>estimates/items/insert/<?=$estimate->est_id?>" title="<?=lang('item_quick_add')?>" class="btn btn-sm btn-<?=config_item('button_color')?>" data-toggle="ajaxModal">
									<i class="fa fa-list-alt text-white"></i> <?=lang('items')?></a>

						<a data-original-title="<?=lang('convert_to_invoice')?>" data-toggle="tooltip" data-placement="bottom" class="btn btn-sm btn-success <?php if($estimate->invoiced == 'Yes' OR $estimate->client == '0'){ echo "disabled"; } ?>" href="<?=base_url()?>estimates/action/convert/<?=$estimate->est_id?>" data-toggle="ajaxModal"
						 title="<?=lang('convert_to_invoice')?>">
						<?=lang('convert_to_invoice')?></a>	
<?php } ?>			

						<div class="btn-group">
						<button class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
						<?=lang('more_actions')?>
						<span class="caret"></span></button>
						<ul class="dropdown-menu">

 <?php if($role == '1' OR $this -> applib -> allowed_module('edit_estimates',$username)) { ?> 
						<li><a href="<?=base_url()?>estimates/edit/<?=$estimate->est_id?>"><?=lang('edit_estimate')?></a></li>
						<li><a href="<?=base_url()?>estimates/email/<?=$estimate->est_id?>" data-toggle="ajaxModal"><?=lang('email_estimate')?></a></li>
						<li><a href="<?=base_url()?>estimates/timeline/<?=$estimate->est_id?>"><?=lang('estimate_history')?></a></li>
<?php } ?>
						<li><a href="<?=base_url()?>estimates/action/status/declined/<?=$estimate->est_id?>"><?=lang('mark_as_declined')?></a></li>
						<li><a href="<?=base_url()?>estimates/action/status/accepted/<?=$estimate->est_id?>"><?=lang('mark_as_accepted')?></a></li>
								
<?php if($role == '1' OR $this -> applib -> allowed_module('delete_estimates',$username)) { ?> 
						<li class="divider"></li>
						<li><a href="<?=base_url()?>estimates/delete/<?=$estimate->est_id?>" data-toggle="ajaxModal"><?=lang('delete_estimate')?></a></li>
<?php } ?>
						</ul>
						</div>
						
						</div>
						<div class="col-sm-4 m-b-xs">
						<?php
						if ($estimate->client != 0) { ?>
						<a href="<?=base_url()?>fopdf/estimate/<?=$estimate->est_id?>" class="btn btn-sm btn-dark pull-right"><i class="fa fa-file-pdf-o"></i> <?=lang('pdf')?></a> 
						<?php } ?>
					
						</div>
					</div> </header>
					
					<!-- Start Display Details -->

					<section class="scrollable wrapper">
								<!-- Start Display Details -->
								<?php
								if(!$this->session->flashdata('message')){
								if(strtotime($estimate->due_date) < time() AND $estimate != 'Yes'){ ?>
								<div class="alert alert-info hidden-print">
									<button type="button" class="close" data-dismiss="alert">×</button> <i class="fa fa-warning"></i>
									<?=lang('invoice_overdue')?>
								</div>
								<?php } } ?>
								
								<section class="scrollable wrapper">
									<div class="row">
										<div class="col-xs-6">
											<img height="40" src="<?=base_url()?>resource/images/logos/<?=config_item('invoice_logo')?>" >	
											
										</div>
										<div class="col-xs-6 text-right">
											<p class="h4"><?=$estimate->reference_no?></p>
											<p class="m-t m-b">
											<?=lang('estimate_date')?>: <strong><?=strftime(config_item('date_format'), strtotime($estimate->date_saved));?></strong><br>
											<?=lang('due_date')?>: <strong><?=strftime(config_item('date_format'), strtotime($estimate->due_date));?></strong><br>
										
											<?=lang('estimate_status')?>: <span class="label bg-success"><?=$estimate->status?> </span><br>
											</p>
										</div>
									</div>


									<div class="well m-t">
                <div class="row">
                  <div class="col-xs-6">
                    <strong><?=lang('received_from')?>:</strong>
                    <h4><?=$this->config->item('company_name')?></h4>
                    <p><?=$this->config->item('company_address')?><br>
                    <?=$this->config->item('company_city')?><br>
                      <?=$this->config->item('company_country')?><br>
                      <?=$this->config->item('company_phone')?> <br>
                      <?=$this->config->item('company_vat')?><br>
                    </p>
                  </div>
                  <div class="col-xs-6">
                    <strong><?=lang('bill_to')?>:</strong>
                    <h4><?=ucfirst($this->applib->company_details($estimate->client,'company_name'))?> <br></h4>
                    <p>
                      <?=ucfirst($this->applib->company_details($estimate->client,'company_address'))?><br>
                       <?=ucfirst($this->applib->company_details($estimate->client,'city'))?><br>
                      <?=ucfirst($this->applib->company_details($estimate->client,'country'))?> <br>
                      <?=$this->applib->company_details($estimate->client,'company_phone')?> <br>
                      <?=$this->applib->company_details($estimate->client,'VAT')?> <br>                      
                    </p>
                  </div>
                </div>
              </div>
									
									<div class="line"></div>
									<table class="table"><thead>
										<tr>
											<th width="25%"><?=lang('item_name')?> </th>
											<th width="35%"><?=lang('description')?> </th>
											<th width="10%"><?=lang('qty')?> </th>
											<th width="15%" class="text-right"><?=lang('unit_price')?> </th>
											<th width="15%" class="text-right"><?=lang('total')?> </th>
										</tr> </thead> <tbody>
										<?php
										if (!empty($estimate_items)) {
										foreach ($estimate_items as $key => $item) { ?>
										<tr>
										<td>
<?php
$item_name = $item->item_name ? $item->item_name : $item->item_desc;
if($role == '1' OR $this -> applib -> allowed_module('edit_estimates',$username)) { ?>
<a href="<?=base_url()?>estimates/items/edit/<?=$item->item_id?>" data-toggle="ajaxModal"><?=$item_name?></a>
											<?php }else{ ?>
											<?=$item_name?>
											<?php } ?>
											</td>

											<td><small class="small text-muted"><?=$item->item_desc?></small> </td>
											<td><?=$item->quantity?></td>
											<td class="text-right"><?=number_format($item->unit_cost,2,$this->config->item('decimal_separator'),$this->config->item('thousand_separator'))?></td>
											<td class="text-right"><?=number_format($item->total_cost,2,$this->config->item('decimal_separator'),$this->config->item('thousand_separator'))?>
<?php if($role == '1' OR $this -> applib -> allowed_module('edit_estimates',$username)) { ?> 
								<a class="hidden-print" href="<?=base_url()?>estimates/items/delete/<?=$item->item_id?>/<?=$item->estimate_id?>" data-toggle="ajaxModal"><i class="fa fa-trash-o text-danger"></i></a>
<?php } ?>
								</td>
											</tr>
											<?php } } ?>
<?php if($role == '1' OR $this -> applib -> allowed_module('edit_estimates',$username)) { ?> 
											<tr class="hidden-print">
												<?php
												$attributes = array('class' => 'bs-example form-horizontal');
												echo form_open(base_url().'estimates/items/add', $attributes); ?>
												<input type="hidden" name="estimate_id" value="<?=$estimate->est_id?>">
												<td> <input type="text" name="item_name"  placeholder="Item Name" class="form-control"></td>
												<td> <input type="text" name="item_desc" placeholder="Item Description" class="form-control"></td>
												<td><input type="text" name="quantity" placeholder="1" class="form-control"></td>
												<td><input type="text" name="unit_cost" required placeholder="50.56" class="form-control"></td>
												<td><button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check"></i> <?=lang('save')?></button></td>
											</form>
										</tr>
<?php } ?>
										<tr>
											<td colspan="4" class="text-right no-border"><strong><?=lang('sub_total')?></strong></td>
											<td> <?=number_format($this -> applib -> est_calculate('estimate_cost',$estimate->est_id),2,config_item('decimal_separator'),config_item('thousand_separator'))?></td>
										</tr>
										<tr>
											<td colspan="4" class="text-right no-border">
											<strong><?=lang('tax')?> - <?php echo $estimate->tax;?>%</strong></td>
											<td><?=number_format($this -> applib -> est_calculate('tax',$estimate->est_id),2,config_item('decimal_separator'),config_item('thousand_separator'))?> </td>
										</tr>
										<?php if($estimate->discount > 0){ ?>
										<tr>
											<td colspan="4" class="text-right no-border">
											<strong><?=lang('discount')?> - <?php echo $estimate->discount;?>%</strong></td>
											<td><?=number_format($this -> applib -> est_calculate('discount',$estimate->est_id),2,config_item('decimal_separator'),config_item('thousand_separator'))?> </td>
										</tr>
										<?php } ?>
										<tr>
											<td colspan="4" class="text-right no-border"><strong><?=lang('total')?></strong></td>
											<td><?=$estimate->currency?> <?=number_format($this -> applib -> est_calculate('estimate_amount',$estimate->est_id),2,config_item('decimal_separator'),config_item('thousand_separator'))?></td>
										</tr>
									</tbody>
								</table>
							</section>
							<p><blockquote><?=$estimate->notes?></blockquote></p>
						</section> 
					<?php } } ?>
					 <!-- End display details -->






					</section>  




		</section> </aside> </section> <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> </section>



<!-- end -->