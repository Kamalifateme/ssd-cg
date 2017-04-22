<!-- Start -->
<section id="content">
	<section class="hbox stretch">

<aside>
			<section class="vbox">

<section class="scrollable wrapper w-f">
	<section class="panel panel-default">
                <header class="panel-heading"><?=lang('all_invoices')?> 
                <?php
                $username = $this -> tank_auth -> get_username();
                if($role == '1' OR $this -> applib -> allowed_module('add_invoices',$username)) { ?>
                <a href="<?=base_url()?>invoices/add" class="btn btn-xs btn-dark pull-right"><?=lang('create_invoice')?></a>
                <?php } ?> 
                </header>
                <div class="table-responsive">
                  <table class="table table-striped b-t b-light AppendDataTables">
                    <thead>
                      <tr>
                        <th><?=lang('status')?></th>
                        <th><?=lang('invoice')?></th>
                        <th><?=lang('due_date')?></th>
                        <th><?=lang('client_name')?></th>
                        <th><?=lang('amount')?></th>
                        <th><?=lang('due_amount')?></th>
                        <th width="30"><?=lang('options')?></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (!empty($invoices)) {
							foreach ($invoices as $key => $invoice) {
						if ($this-> applib ->payment_status($invoice->inv_id) == lang('fully_paid')){ $invoice_status = lang('fully_paid'); $label = "success"; }
						elseif($invoice->emailed == 'Yes') { $invoice_status = lang('sent'); $label = "info";	}
							else{ $invoice_status = lang('draft'); $label = "default"; }
							?>
                      <tr>
                        <td><span class="label label-<?=$label?>"><?=$invoice_status?></span>
                        <?php
                        if ($invoice->recurring == 'Yes') { ?>
                          <span class="label label-primary"><i class="fa fa-retweet"></i></span>
                        <?php }  ?>
                        
                        </td>
                        <td><a class="text-info" href="<?=base_url()?>invoices/view/<?=$invoice->inv_id?>"><?=$invoice->reference_no?></a></td>
                        <td><?=$invoice->due_date?></td>
                        <td><?=$this -> applib->get_any_field('companies',array('co_id'=>$invoice->client),'company_name')?></td>

                        <td><?=$invoice->currency?> <?=number_format($this -> applib -> calculate('invoice_cost',$invoice->inv_id),2,config_item('decimal_separator'),config_item('thousand_separator'))?></td>
                        
                        <td><?=$invoice->currency?> <?=number_format($this -> applib -> calculate('invoice_due',$invoice->inv_id),2,config_item('decimal_separator'),config_item('thousand_separator'))?></td>
                        <td>
                          <div class="btn-group">
										<button class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
										<i class="fa fa-cogs"></i> <?=lang('options')?>
										<span class="caret"></span></button>
							<ul class="dropdown-menu">											
								<li><a href="<?=base_url()?>invoices/view/<?=$invoice->inv_id?>"><?=lang('preview_invoice')?></a></li>
                 <?php if($role == '1' OR $this -> applib -> allowed_module('edit_all_invoices',$username)) { ?>
								<li><a href="<?=base_url()?>invoices/edit/<?=$invoice->inv_id?>"><?=lang('edit_invoice')?></a></li>
                <?php } ?>
                <?php if($role == '1' OR $this -> applib -> allowed_module('email_invoices',$username)) { ?>
								<li><a href="<?=base_url()?>invoices/timeline/<?=$invoice->inv_id?>"><?=lang('invoice_history')?></a></li>
								<li><a href="<?=base_url()?>invoices/email/<?=$invoice->inv_id?>" data-toggle="ajaxModal" title="<?=lang('email_invoice')?>"><?=lang('email_invoice')?></a></li>
                <?php } ?>
                <?php if($role == '1' OR $this -> applib -> allowed_module('send_email_reminders',$username)) { ?>
								<li><a href="<?=base_url()?>invoices/remind/<?=$invoice->inv_id?>" data-toggle="ajaxModal" title="<?=lang('send_reminder')?>"><?=lang('send_reminder')?></a></li>
                <?php } ?>
								<li><a href="<?=base_url()?>fopdf/invoice/<?=$invoice->inv_id?>"><?=lang('pdf')?></a></li>
							</ul>
							</div>
                        </td>
                      </tr>
                      <?php } } ?>
                    </tbody>
                  </table>
                </div>
              </section>
              </section>
	
		 



		</section> </aside> </section> <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> </section>



<!-- end -->