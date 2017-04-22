<!-- .aside -->
<aside class="bg-<?=$this->config->item('sidebar_theme')?> b-r aside-md hidden-print" id="nav">
  <section class="vbox">

      <section class="w-f scrollable">
        <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">
          <!-- nav -->
          <nav class="nav-primary hidden-xs">
            <ul class="nav">
			


			
              <li  style="margin-top:10px" class="<?php if($page == lang('home')){echo  ""; }?>">
                <a href="<?=base_url()?>"> <i class="icon-home" >  </i>
              <span><?=lang('home')?></span> </a> </li>
			  
			  <li class="<?php if($page == lang('slider')){echo  ""; }?>"> 
			  <a href="<?=base_url()?>slide"> <i class="icon-camcorder icon" >   </i>
              <span><?=lang('slider')?> </span> </a> </li>
			  
			  <li class="<?php if($page == lang('about')){echo  ""; }?>"> 
			  <a href="<?=base_url()?>about"> <i class=" icon-question icon" >   </i>
              <span>&#1583;&#1585;&#1576;&#1575;&#1585;&#1607; &#1605;&#1575;</span> </a> </li>			  

			  <li class="<?php if($page == lang('contacts')){echo  ""; }?>"> 
			  <a href="<?=base_url()?>contacts"> <i class=" icon-paper-plane icon" >  </i>
              <span><?=lang('Contact_Us')?> </span> </a> </li>
			  
			  
			  <li class="<?php if($page == lang('tutorial')){echo  ""; }?>"> 
			  <a href="<?=base_url()?>tutorial"> <i class=" icon-graduation icon" >   </i>
              <span>&#1570;&#1605;&#1608;&#1586;&#1588;</span> </a> </li>	  
			  
			  <li class="<?php if($page == lang('mosha')){echo  ""; }?>"> 
			  <a href="<?=base_url()?>mosha"> <i class=" icon-bubbles icon" >   </i>
              <span>&#1605;&#1588;&#1575;&#1608;&#1585;&#1607;</span> </a> </li>	  
			  
			  <li class="<?php if($page == lang('work')){echo  ""; }?>"> 
			  <a href="<?=base_url()?>work"> <i class=" icon-briefcase icon" >   </i>
              <span>&#1705;&#1575;&#1585;&#1570;&#1601;&#1585;&#1740;&#1606;&#1740;</span> </a> </li>	  
			  
			  <li class="<?php if($page == lang('title')){echo  ""; }?>"> 
			  <a href="<?=base_url()?>title"> <i class="fa fa-file icon " >   </i>
              <span>&#1575;&#1590;&#1575;&#1601;&#1607; &#1705;&#1585;&#1583;&#1606; &#1575;&#1605;&#1705;&#1575;&#1606;&#1575;&#1578;</span> </a> </li>	 

			  
			  <li class="<?php if($page == lang('news')){echo  ""; }?>"> 
			  <a href="<?=base_url()?>news"> <i class=" icon-book-open icon" >   </i>
              <span>&#1575;&#1582;&#1576;&#1575;&#1585; SSD</span> </a> </li>
			  
			 <li class="<?php if($page == lang('newsk')){echo  ""; }?>"> 
			  <a href="<?=base_url()?>newsk"> <i class=" icon-book-open icon" >   </i>
              <span>&#1575;&#1582;&#1576;&#1575;&#1585; &#1705;&#1587;&#1576; &#1608;&#1705;&#1575;&#1585; </span> </a> </li>
			  
			  <li class="<?php if($page == lang('settings')){echo  ""; }?>"> <a href="<?=base_url()?>settings" > <i class="fa fa-cogs icon" >   </i>
              <span><?=lang('settings')?> </span> </a> </li>
			  
			  <li class="<?php if($page == lang('file')){echo  ""; }?>"> <a href="<?=base_url()?>files" > <i class="fa fa-file icon" >   </i>
              <span><?=lang('file')?> </span> </a> </li>
			  

				
				
				
                
              </ul> </nav>
              <!-- / nav -->
            </div>
          </section>

</section>
</aside>
<!-- /.aside -->