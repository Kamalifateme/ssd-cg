<section id="content">
          <section class="hbox stretch">
            <aside class="aside-md bg-white b-r" id="subNav">
              <div class="wrapper b-b header"><?=lang('application_settings')?></div>
              <ul class="nav">
                <li class="b-b b-light <?php if($load_setting == 'general'){ echo "bg-light dker text-white"; } ?>">
                <a href="<?=base_url()?>settings/?settings=general"><i class="fa fa-chevron-left pull-right m-t-xs text-xs text-info"></i> <?=lang('general_settings')?> </a>
                </li>


                <li class="b-b b-light <?php if($load_setting == 'system'){ echo "bg-light dker text-white"; } ?>">
                <a href="<?=base_url()?>settings/?settings=system"><i class="fa fa-chevron-left pull-right m-t-xs text-xs text-info"></i><?=lang('system_settings')?></a></li>


              </ul>
            </aside>
            <aside>
              <section class="vbox">
                <header class="header bg-white b-b clearfix">
                  <div class="row m-t-sm">
                  <div class="col-sm-8 m-b-xs">
                      <?php if($load_setting == 'templates'){  ?>

                      <?php } ?>

                       
                       <?php if($load_setting == 'system'){  ?>
                      <a href="<?=base_url()?>settings/database" class="btn btn-danger"><i class="fa fa-cloud-download text"></i>
                      <span class="text"><?=lang('database_backup')?></span>
                    </a>
                    <?php } ?>

                    </div>
                    <div class="col-sm-4 m-b-xs">
                      
                    </div>
                  </div>
                </header>
                <section class="scrollable wrapper">
                    <!-- Load the settings form in views -->
                      <?=$this -> load -> view($load_setting)?>
                    <!-- End of settings Form -->
                </section>
                
              </section>
            </aside>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen, open" data-target="#nav,html"></a>
        </section>