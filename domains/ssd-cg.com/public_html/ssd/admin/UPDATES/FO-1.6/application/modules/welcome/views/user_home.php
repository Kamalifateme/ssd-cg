<section id="content"> <section class="vbox"> <section class="scrollable padder">
	<ul class="breadcrumb no-border no-radius b-b b-light pull-in">
		<small><?=lang('welcome_back')?> , <?php
		echo $this->user_profile->get_profile_details($this->tank_auth->get_user_id(),'fullname')  ? $this->user_profile->get_profile_details($this->tank_auth->get_user_id(),'fullname') : $this->tank_auth->get_username()?> </small>
	</ul>

	<section class="panel panel-default">

		<div class="row m-l-none m-r-none bg-dark lter">
			<div class="col-sm-6 col-md-3 padder-v b-r b-light">
            <a class="clear" href="<?=base_url()?>projects">
				<span class="fa-stack fa-2x pull-left m-r-sm"> <i class="fa fa-circle fa-stack-2x text-warning"></i> <i class="fa fa-coffee fa-stack-1x text-white"></i>
				</span> 
				<span class="h3 block m-t-xs"><strong><?=$this->user_profile->count_table_rows('projects')?> </strong>
				</span> <small class="text-muted text-uc"><?=lang('projects')?> </small> </a>
			</div>
			<div class="col-sm-6 col-md-3 padder-v b-r b-light">
				<a class="clear" href="<?=base_url()?>messages">
				<span class="fa-stack fa-2x pull-left m-r-sm"> <i class="fa fa-circle fa-stack-2x text-info"></i> <i class="fa fa-envelope fa-stack-1x text-white"></i>
				</span> 
					<span class="h3 block m-t-xs"><strong><?=$this->user_profile->count_rows('messages',array('user_to'=>$this->tank_auth->get_user_id(),'deleted'=>'No'))?> </strong>
				</span> <small class="text-muted text-uc"><?=lang('messages')?>  </small> </a>
			</div>
			<div class="col-sm-6 col-md-3 padder-v b-r b-light">
            <a class="clear" href="<?=base_url()?>invoices">
				<span class="fa-stack fa-2x pull-left m-r-sm"> <i class="fa fa-circle fa-stack-2x text-danger"></i> <i class="fa fa-suitcase fa-stack-1x text-white"></i>
				</span> 
				<span class="h3 block m-t-xs"><strong><?=$this->user_profile->count_table_rows('invoices')?> </strong></span>
				<small class="text-muted text-uc"><?=lang('invoices')?>  </small> </a>
			</div>
			<div class="col-sm-6 col-md-3 padder-v b-r b-light lt">
            <a class="clear" href="<?=base_url()?>tickets">
				<span class="fa-stack fa-2x pull-left m-r-sm"> <i class="fa fa-circle fa-stack-2x text-success"></i> <i class="fa fa-ticket fa-stack-1x text-white"></i>
				</span> 
				<span class="h3 block m-t-xs"><strong><?=$this->user_profile->count_table_rows('tickets')?></strong>
				</span> <small class="text-muted text-uc"><?=lang('tickets')?>  </small> </a>
			</div>
		</div> </section>
		<div class="row">
			<div class="col-md-8">
				<section class="panel panel-default">
				<header class="panel-heading font-bold"> <?=lang('recent_projects')?></header>
				<div class="panel-body">
					
					<table class="table table-striped m-b-none text-sm">
						<thead>
							<tr>
							<th><?=lang('timer')?></th>
								<th><?=lang('progress')?></th>
								<th><?=lang('project_name')?> </th>
								<th><?=lang('options')?></th>
							</tr> </thead>
							<tbody>
								
								<?php
								if (!empty($projects)) {
								foreach ($projects as $key => $project) { ?>								
								<tr>

								<?php
							if ($project->timer == 'Off') {  $timer = 'success'; }else{ $timer = 'danger'; }?>
							<td><span class="label label-<?=$timer?>"><?=$project->timer?></span></td>
									<td>									
							<?php if ($project->progress >= 100) { $bg = 'success'; }else{ $bg = 'danger'; } ?>
										<div class="progress progress-xs progress-striped active">
											<div class="progress-bar progress-bar-<?=$bg?>" data-toggle="tooltip" data-original-title="<?=$project->progress?>%" style="width: <?=$project->progress?>%">
											</div>
										</div>
									</td>
									<td><?=$project->project_title?> </td>
									<td>
										<a class="btn  btn-dark btn-xs" href="<?=base_url()?>projects/view/<?=$project->project_id?>">
										<i class="fa fa-suitcase text"></i> <?=lang('project')?></a>
									</td>
								</tr>
								<?php }
								}else{ ?>
								<tr>
									<td><?=lang('nothing_to_display')?></td><td></td><td></td>
								</tr>
								<?php } ?>
								
								
							</tbody>
						</table>
					</div> <footer class="panel-footer bg-white no-padder">
					<div class="row text-center no-gutter">
						<div class="col-xs-3 b-r b-light">
							<span class="h4 font-bold m-t block"><?=$this->user_profile->count_table_rows('bugs')?>
							</span> <small class="text-muted m-b block"><?=lang('bugs')?></small>
						</div>
						<div class="col-xs-3 b-r b-light">
							<span class="h4 font-bold m-t block"><?=$this->user_profile->count_rows('projects',array('progress >='=>'100'))?>
							</span> <small class="text-muted m-b block"><?=lang('complete_projects')?></small>
						</div>
                        <div class="col-xs-3 b-r b-light">
                        <span class="h4 font-bold m-t block"><?=$this->user_profile->count_table_rows('tasks')?>
                        </span> <small class="text-muted m-b block"><?=lang('tasks')?>  </small>
						</div>
						<div class="col-xs-3">
							<span class="h4 font-bold m-t block"><?=$this->user_profile->count_rows('comments',array('posted_by'=>$this->tank_auth->get_user_id()))?>
							</span> <small class="text-muted m-b block"><?=lang('project_comments')?></small>
                            
						</div>
					</div> </footer>
				</section>
			</div>

			<div class="col-lg-4"> 

			<section class="panel panel-default">

			<header class="panel-heading"><?=lang('recently_paid_invoices')?></header>
			<div class="panel-body"> 
			
			<div class="list-group bg-white">
                 <?php
                 $recently_paid = $this -> db -> order_by('created_date','desc') -> get('payments',5) -> result();
					if (!empty($recently_paid)) {
					foreach ($recently_paid as $key => $i) {
						$ref = $this -> applib->get_any_field('invoices',array('inv_id'=>$i->invoice),'reference_no');
						$currency = $this -> applib->get_any_field('invoices',array('inv_id'=>$i->invoice),'currency');
						$payment_method_name = $this -> applib->get_any_field('payment_methods',array('method_id'=>$i->payment_method),'method_name');
						if($i->payment_method == '1'){ $badge = 'success'; }elseif($i->payment_method == '2'){ $badge = 'danger'; }else{ $badge = 'dark'; } 
					 ?>
                    <a href="<?=base_url()?>invoices/view/<?=$i->invoice?>" class="list-group-item">
                    <?=$ref?> - <small class="text-muted"><?=$currency?> <?=$i->amount?> <span class="badge bg-<?=$badge?>"><?=$payment_method_name?></span></small>
                    </a>
                    <?php  } } ?>
                  </div>


			</div>

			<div class="panel-footer"><small><?=lang('total_receipts')?>: <strong><?=config_item('default_currency')?> <?=number_format($this->applib->get_sum('payments','amount',$array = array('inv_deleted' => 'No')),2,config_item('decimal_separator'),config_item('thousand_separator'))?></strong></small></div> 
			</section>

		</div>


	</div>
	<div class="row">
	

		<div class="col-md-8">
			<div class="row">
			

                <!-- Percentage Received -->
                <div class="col-lg-6">
                  <section class="panel panel-default">
                    <header class="panel-heading">
                     <?=lang('recent_tickets')?>
                    </header>
                    <div class="panel-body">

                    <div class="list-group bg-white">
                 <?php
                 $tickets = $this -> db -> order_by('created','desc') -> get('tickets',7) -> result();
					if (!empty($tickets)) {
					foreach ($tickets as $key => $ticket) {
						if($ticket->status == 'open'){ $badge = 'danger'; }elseif($ticket->status == 'closed'){ $badge = 'success'; }else{ $badge = 'dark'; } 
					 ?>
                    <a href="<?=base_url()?>tickets/view/<?=$ticket->id?>" data-original-title="<?=$ticket->subject?>" data-toggle="tooltip" data-placement="top" title = "" class="list-group-item">
                    <?=$ticket->ticket_code?> - <small class="text-muted"><?=lang('priority')?>: <?=$ticket->priority?> <span class="badge bg-<?=$badge?>"><?=$ticket->status?></span></small>
                    </a>
                    <?php  } } ?>
                  </div>

                    </div>
                    
                  </section>
                </div>

                <!-- Revenue Collection -->
                <?php
      $total_receipts = $this->applib->get_sum('payments','amount',$array = array('inv_deleted' => 'No'));
      $invoices_cost = $this -> applib -> all_invoice_amount();

      $outstanding = $this -> applib -> all_outstanding(); 
      if ($outstanding < 0) {
       $outstanding = 0;
      }
      if ($invoices_cost > 0) {
            $perc_paid = ($total_receipts / $invoices_cost)*100;
            if ($perc_paid > 100) {
              $perc_paid = '100';
            }else{
              $perc_paid = round($perc_paid,1);
            }
            $perc_outstanding = round(100 - $perc_paid,1);
          }else{ $perc_paid = 0; $perc_outstanding = 0;}         
          ?>
                  <div class="col-lg-6">
                  <section class="panel panel-default">
                    <header class="panel-heading"><?=lang('revenue_collection')?></header>
                    <div class="panel-body text-center"> 
                    <h4><?=lang('received_amount')?></h4>  
                     <small class="text-muted block"><?=lang('percentage_collection')?></small> 

                <div class="sparkline inline" data-type="pie" data-height="150" data-slice-colors="['#65BD77','#FFC333']">
                <?=$perc_paid?>,<?=$perc_outstanding?></div>
                      <div class="line pull-in"></div>
                      <div class="text-xs">
                        <i class="fa fa-circle text-warning"></i> <?=lang('outstanding')?> - <?=$perc_outstanding?>%
                        <i class="fa fa-circle text-primary"></i> <?=lang('paid')?> - <?=$perc_paid?>%
                      </div>
                    </div>
                     <div class="panel-footer"><small><?=lang('total')?> <?=lang('outstanding')?> : <strong>
                     <?=$this->config->item('default_currency')?> <?=number_format($outstanding,2,config_item('decimal_separator'),config_item('thousand_separator'))?></strong></small></div>
                  </section>
                </div>

                
              </div>
		</div>
		<div class="col-md-4"> <section class="panel panel-default b-light">
<div class="panel-body">
			<section class="comment-list block"> 
			<?php
								if (!empty($activities)) {
								foreach ($activities as $key => $activity) { ?>
			<article id="comment-id-1" class="comment-item">
				<span class="fa-stack pull-left m-l-xs"><a class="pull-left thumb-sm"><img src="<?=base_url()?>resource/avatar/<?=$this->user_profile->get_profile_details($activity->user,'avatar')?>" class="img-circle"></a>
				</span> <section class="comment-body m-b-lg">
					<header> <a href="#"><strong><?=$this->user_profile->get_profile_details($activity->user,'fullname')?$this->user_profile->get_profile_details($activity->user,'fullname'):$this->user_profile->get_user_details($activity->user,'username')?></strong></a>					
						<span class="text-muted text-xs"> <?php
								$today = time();
								$activity_day = strtotime($activity->activity_date) ;
								echo $this->user_profile->get_time_diff($today,$activity_day);
							?> <?=lang('ago')?></span> </header>
					<div><?=$activity->activity?></div> 
					</section>
			</article>
			<?php }} ?>
						
						</section>

							</div>
							
						</section>
					</div>
				</div>
			</section>
		</section>
	<a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> </section>