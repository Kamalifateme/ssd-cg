<!-- .aside -->
<aside class="bg-<?=$this->config->item('sidebar_theme')?> b-r aside-md hidden-print" id="nav">
  <section class="vbox">
   <header class="header bg-primary lter text-center clearfix">
      <div class="btn-group">
        <button type="button" class="btn btn-sm btn-dark btn-icon" title="<?=lang('quick_links')?>"><i class="fa fa-globe"></i></button>
        <div class="btn-group hidden-nav-xs">
          <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown"> <?=lang('languages')?>
          <span class="caret">
          </span> </button>
          <!-- Load Languages -->
          <?=$this->load->view('languages');?>

        </div>
      </div> </header>

      <section class="scrollable">
        <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">
          <!-- nav -->
          <nav class="nav-primary hidden-xs">
            <ul class="nav">
              <li class="<?php if($page == lang('home')){echo  "active"; }?>">
                <a href="<?=base_url()?>clients"> <i class="fa fa-dashboard icon"> <b class="bg-success"></b> </i>
              <span><?=lang('home')?></span> </a> </li>

              <?php
              $user_id = $this->tank_auth -> get_user_id();
              $client_co = $this -> applib->get_any_field('account_details',array('user_id'=>$user_id),'company');
              $timer_on = $this -> applib -> count_rows('projects',array('timer'=>'On','client' => $client_co));
                ?>

              <li class="<?php if($page == lang('projects')){echo  "active"; }?>"> <a href="<?=base_url()?>projects" > <?php if($timer_on > 0){?><b class="badge bg-danger pull-right"><?=$timer_on?></b><?php } ?> <i class="fa fa-coffee icon"> <b class="bg-success"></b> </i>
              <span><?=lang('projects')?> </span> </a> </li>

              <li class="<?php if($page == lang('messages')){echo  "active"; }?>"> <a href="<?=base_url()?>clients/messages" > <b class="badge bg-success pull-right"><?=$this->user_profile->count_rows('messages',array('user_to'=>$this->tank_auth->get_user_id(),'status' => 'Unread'))?></b> <i class="fa fa-envelope-o icon"> <b class="bg-success"></b> </i>
              <span><?=lang('messages')?> </span> </a> </li> 

              <li class="<?php if($page == lang('invoices')){echo  "active"; }?>"> <a href="<?=base_url()?>invoices" > <i class="fa fa-list icon"> <b class="bg-success"></b> </i>
                <span><?=lang('invoices')?> </span> </a> </li> 

                <li class="<?php if($page == lang('estimates')){echo  "active"; }?>"> <a href="<?=base_url()?>estimates" > <i class="fa fa-list-alt icon"> <b class="bg-success"></b> </i>
                <span><?=lang('estimates')?> </span> </a> </li> 

                <li class="<?php if($page == lang('payments')){echo  "active"; }?>"> <a href="<?=base_url()?>clients/payments" > <i class="fa fa-money icon"> <b class="bg-success"></b> </i>
                <span><?=lang('payments_sent')?> </span> </a> </li> 
              
              



              <li class="<?php if($page == lang('tickets')){echo  "active"; }?>"> <a href="<?=base_url()?>tickets" > <i class="fa fa-ticket icon"> <b class="bg-success"></b> </i>
                <span><?=lang('tickets')?> </span> </a> </li>   

                          

              

             
                
                
              </ul> </nav>
              <!-- / nav -->
            </div>
          </section>
         

  
</section>
</aside>
<!-- /.aside -->