<section id="content">
          <section class="hbox stretch">
            <aside class="aside-md bg-white b-r" id="subNav">
              <div class="wrapper b-b header"><?=lang('application_settings')?></div>
              <ul class="nav">
                <li class="b-b b-light <?php if($load_setting == 'general'){ echo "bg-light dker text-white"; } ?>">
                <a href="<?=base_url()?>settings/?settings=general"><i class="fa fa-chevron-right pull-right m-t-xs text-xs text-info"></i><?=lang('general_settings')?></a>
                </li>
                <li class="b-b b-light <?php if($load_setting == 'email'){ echo "bg-light dker text-white"; } ?>">
                <a href="<?=base_url()?>settings/?settings=email"><i class="fa fa-chevron-right pull-right m-t-xs text-xs text-info"></i><?=lang('email_settings')?></a></li>
                <li class="b-b b-light <?php if($load_setting == 'templates'){ echo "bg-light dker text-white"; } ?>">
                <a href="<?=base_url()?>settings/?settings=templates"><i class="fa fa-chevron-right pull-right m-t-xs text-xs text-info"></i><?=lang('email_templates')?></a></li>
                <li class="b-b b-light <?php if($load_setting == 'permissions'){ echo "bg-light dker text-white"; } ?>">
                <a href="<?=base_url()?>settings/?settings=permissions"><i class="fa fa-chevron-right pull-right m-t-xs text-xs text-info"></i><?=lang('staff_permissions')?></a></li>
                <li class="b-b b-light <?php if($load_setting == 'payments'){ echo "bg-light dker text-white"; } ?>">
                <a href="<?=base_url()?>settings/?settings=payments"><i class="fa fa-chevron-right pull-right m-t-xs text-xs text-info"></i><?=lang('payment_settings')?></a></li>
                <li class="b-b b-light <?php if($load_setting == 'system'){ echo "bg-light dker text-white"; } ?>">
                <a href="<?=base_url()?>settings/?settings=system"><i class="fa fa-chevron-right pull-right m-t-xs text-xs text-info"></i><?=lang('system_settings')?></a></li>
                <li class="b-b b-light <?php if($load_setting == 'invoice'){ echo "bg-light dker text-white"; } ?>">
                <a href="<?=base_url()?>settings/?settings=invoice"><i class="fa fa-chevron-right pull-right m-t-xs text-xs text-info"></i><?=lang('invoice_settings')?></a></li>
                <li class="b-b b-light <?php if($load_setting == 'departments'){ echo "bg-light dker text-white"; } ?>">
                <a href="<?=base_url()?>settings/?settings=departments"><i class="fa fa-chevron-right pull-right m-t-xs text-xs text-info"></i><?=lang('departments')?></a></li>
                <li class="b-b b-light <?php if($load_setting == 'fields'){ echo "bg-light dker text-white"; } ?>">
                <a href="<?=base_url()?>settings/?settings=fields"><i class="fa fa-chevron-right pull-right m-t-xs text-xs text-info"></i><?=lang('custom_fields')?></a></li>
              </ul>
            </aside>
            <aside>
              <section class="vbox">
                <header class="header bg-white b-b clearfix">
                  <div class="row m-t-sm">
                  <div class="col-sm-8 m-b-xs">
                      <?php if($load_setting == 'templates'){  ?>
                      <div class="btn-group">                       
                        <button type="button" class="btn btn-sm btn-success" title="Filter" data-toggle="dropdown"><i class="fa fa-cogs"></i> <?=lang('choose_template')?><span class="caret"></span></button>
                        <ul class="dropdown-menu">
                          <li><a href="<?=base_url()?>settings/?settings=templates&group=user"><?=lang('account_emails')?></a></li>
                          <li><a href="<?=base_url()?>settings/?settings=templates&group=bugs"><?=lang('bug_emails')?></a></li>
                          <li><a href="<?=base_url()?>settings/?settings=templates&group=project"><?=lang('project_emails')?></a></li>
                          <li><a href="<?=base_url()?>settings/?settings=templates&group=invoice"><?=lang('invoicing_emails')?></a></li>
                          <li><a href="<?=base_url()?>settings/?settings=templates&group=ticket"><?=lang('ticketing_emails')?></a></li>
                          <li class="divider"></li>
                          <li><a href="<?=base_url()?>settings/?settings=templates&group=extra"><?=lang('extra_emails')?></a></li>
                        </ul>
                      </div>
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