<!-- .aside -->
<aside class="bg-<?=$this->config->item('sidebar_theme')?> b-r aside-md hidden-print" id="nav">
  <section class="vbox">
    <header class="header bg-primary lter text-center clearfix">
     <div class="btn-group">
        
        <div class="btn-group hidden-nav-xs">
          <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"> <?=lang('languages')?>
          <span class="caret">
          </span> </button>
          <!-- Load Languages -->
          <?=$this->load->view('languages');?> 
        </div>	
      </div>  </header>
      <section class="w-f scrollable">
      <?php
      $username = $this -> tank_auth -> get_username();
      ?>
        <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">
          <!-- nav -->
          <nav class="nav-primary hidden-xs">
            <ul class="nav">
              <li class="<?php if($page == lang('home')){echo  "active"; }?>">
                <a href="<?=base_url()?>collaborator"> <i class="fa fa-dashboard icon"> <b class="bg-primary"></b> </i>
              <span><?=lang('home')?></span> </a> </li>

              
              <li class="<?php if($page == lang('projects')){echo  "active"; }?>"> <a href="<?=base_url()?>projects" > <i class="fa fa-coffee icon"> <b class="bg-primary"></b> </i>
              <span><?=lang('projects')?> </span> </a> </li>

              <li class="<?php if($page == lang('messages')){echo  "active"; }?>"> <a href="<?=base_url()?>collaborator/messages" > <b class="badge bg-success pull-right"><?=$this->user_profile->count_rows('messages',array('user_to'=>$this->tank_auth->get_user_id(),'status' => 'Unread'))?></b> <i class="fa fa-envelope-o icon"> <b class="bg-primary"></b> </i>
              <span><?=lang('messages')?> </span> </a> </li> 

              <?php if($this -> applib -> allowed_module('view_all_invoices',$username)){ ?>
              <li class="<?php if($page == lang('invoices')){echo  "active"; }?>"> <a href="<?=base_url()?>invoices" > <i class="fa fa-list icon"> <b class="bg-success"></b> </i>
                <span><?=lang('invoices')?> </span> </a> </li> 
                <?php } ?>

              <?php if($this -> applib -> allowed_module('view_all_estimates',$username)){ ?>
              <li class="<?php if($page == lang('estimates')){echo  "active"; }?>"> <a href="<?=base_url()?>estimates" > <i class="fa fa-list-alt icon"> <b class="bg-success"></b> </i>
                <span><?=lang('estimates')?> </span> </a> </li> 
                <?php } ?>


               <?php if($this -> applib -> allowed_module('view_payments',$username)){ ?>
              <li class="<?php if($page == lang('payments')){echo  "active"; }?>"> <a href="<?=base_url()?>collaborator/payments" > <i class="fa fa-money icon"> <b class="bg-success"></b> </i>
                <span><?=lang('payments_sent')?> </span> </a> </li>
                <?php } ?> 

               
              <li class="<?php if($page == lang('tickets')){echo  "active"; }?>"> <a href="<?=base_url()?>tickets" > <i class="fa fa-ticket icon"> <b class="bg-success"></b> </i>
                <span><?=lang('tickets')?> </span> </a> </li>  

                          

              

             
                
                
              </ul> </nav>
              <!-- / nav -->
            </div>
          </section>
            <footer class="footer lt hidden-xs b-t b-light">
              <div id="msg" class="dropup"> <section class="dropdown-menu on aside-md m-l-n"> <section class="panel bg-white">
              <header class="panel-heading b-b b-light"><?=lang('messages')?></header>
              <div class="panel-body animated fadeInRight">
                <p class="text-sm"><?=lang('get_started')?></p>
                <p><a href="<?=base_url()?>collaborator/conversation/send" class="btn btn-sm btn-primary"><?=lang('send_message')?></a></p>
              </div> </section> </section>
            </div>
            <div id="bug" class="dropup"> <section class="dropdown-menu on aside-md m-l-n"> <section class="panel bg-white">
            <header class="panel-heading b-b b-light"><?=lang('bugs')?></header>
            <div class="panel-body animated fadeInRight">
              <p class="text-sm"><?=lang('get_started')?></p>
              <p>
              <a href="<?=base_url()?>collaborator/bug_view/add" data-toggle="ajaxModal" class="btn btn-sm btn-primary">
              <?=lang('new_bug')?></a>
              </p>
            </div>
          </section>
        </section>
      </div>
      <div class="btn-group hidden-nav-xs">
      <button type="button" title="<?=lang('messages')?>" class="btn btn-icon btn-sm btn-light " data-toggle="dropdown" data-target="#msg"><i class="fa fa-envelope"></i></button>
       <button type="button" title="<?=lang('bugs')?>" class="btn btn-icon btn-sm btn-light" data-toggle="dropdown" data-target="#bug"><i class="fa fa-bug"></i></button>
      </div>
    </footer>

  
</section>
</aside>
<!-- /.aside -->