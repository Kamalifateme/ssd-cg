<!DOCTYPE html>
<html lang="en" class="app">
  <head>
    <meta charset="utf-8" />
    <meta name="description" content="">
    <meta name="author" content="<?=$this->config->item('site_author')?>">
    <meta name="keyword" content="<?=$this->config->item('site_desc')?>">
    <link rel="shortcut icon" href="<?=base_url()?>resource/images/favicon.ico">
    <title><?php  echo $template['title'];?></title>
    <!-- Bootstrap core CSS -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="<?=base_url()?>resource/css/app.v2.css" type="text/css" />
       <link rel="stylesheet" href="<?=base_url()?>resource/css/style.css" type="text/css" />
    <link rel="stylesheet" href="<?=base_url()?>resource/js/toastr/toastr.css" type="text/css" />
    <link rel="stylesheet" href="<?=base_url()?>resource/css/font.css" type="text/css" cache="false" />
    <link rel="stylesheet" href="<?=base_url()?>resource/css/typeahead.css" type="text/css" cache="false" />
    
     <?php if (isset($fuelux)) { ?>
    <link rel="stylesheet" href="<?=base_url()?>resource/js/fuelux/fuelux.css" type="text/css" />
    <?php } ?>

    <?php if (isset($editor)) { ?>
    <link href="<?=base_url()?>resource/css/summernote.css" rel="stylesheet"  type="text/css">
    <?php } ?>
    <?php if (isset($datepicker)) { ?>
    <link rel="stylesheet" href="<?=base_url()?>resource/js/slider/slider.css" type="text/css" cache="false" />
    <link rel="stylesheet" href="<?=base_url()?>resource/js/datepicker/datepicker.css" type="text/css" cache="false" />
    <?php } ?>
    <?php if (isset($calendar)) { ?>
    <link rel="stylesheet" href="<?=base_url()?>resource/js/fullcalendar/fullcalendar.css" type="text/css"  />
    <?php } ?>

    <?php
     if (isset($form)) { ?>
    <link rel="stylesheet" href="<?=base_url()?>resource/js/select2/select2.css" type="text/css" cache="false" />
    <link rel="stylesheet" href="<?=base_url()?>resource/js/select2/theme.css" type="text/css" cache="false" />
    <?php } ?>
    <?php
    if ($this->uri->segment(2) == 'help') { ?>
    <link rel="stylesheet" href="<?=base_url()?>resource/js/intro/introjs.css" type="text/css" cache="false" />
    <?php }  ?>
    <?php
    if (isset($datatables)) { ?>
    <link rel="stylesheet" href="<?=base_url()?>resource/js/datatables/datatables.css" type="text/css" cache="false" />
    <?php }  ?>
    <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js" cache="false">
    </script>
    <script src="js/ie/respond.min.js" cache="false">
    </script>
    <script src="js/ie/excanvas.js" cache="false">
    </script> <![endif]-->
  </head>
  <body>
    <section class="vbox">
      <!--header start-->
      <?php  echo modules::run('sidebar/top_header');?>
      <!--header end-->
      <section>
        <section class="hbox stretch">
          <?php
          if ($this->tank_auth->user_role($this->tank_auth->get_role_id()) == 'admin') {
          echo modules::run('sidebar/admin_menu');
          }elseif ($this->tank_auth->user_role($this->tank_auth->get_role_id()) == 'staff') {
          echo modules::run('sidebar/collaborator_menu');
          }else{
          echo modules::run('sidebar/client_menu');
          }
          ?>
          <!--main content start-->
          <?php  echo $template['body'];?>
          <!--main content end-->
          <aside class="bg-light lter b-l aside-md hide" id="notes">
            <div class="wrapper">Notification
            </div> </aside>
          </section>
        </section>
      </section>
      <script src="<?=base_url()?>resource/js/jquery-2.1.1.min.js"></script>
      <script src="<?=base_url()?>resource/js/app.v2.js"></script>
      <script src="<?=base_url()?>resource/js/charts/easypiechart/jquery.easy-pie-chart.js" cache="false"></script>
      <script src="<?=base_url()?>resource/js/charts/sparkline/jquery.sparkline.min.js" cache="false"></script>
      <script src="<?=base_url()?>resource/js/toastr/toastr.js"></script>
      <script src="<?=base_url()?>resource/js/typeahead.js"></script>

       <?php if (isset($fuelux)) { ?>
    <script src="<?=base_url()?>resource/js/fuelux/fuelux.js"></script>
    <?php } ?>

      <?php if (isset($editor)) { ?>
      <script src="<?=base_url()?>resource/js/summernote.min.js"></script>
      <script type="text/javascript">
      $('.foeditor').summernote({
          codemirror: { // codemirror options
            theme: 'monokai'
          }
        });
      $('.note-toolbar .note-fontsize,.note-toolbar .note-help,.note-toolbar .note-fontname,.note-toolbar .note-height,.note-toolbar .note-table').remove();
      </script>
      <?php } ?>
      <!-- Bootstrap -->
      <!-- js placed at the end of the document so the pages load faster -->
      <?php  echo modules::run('sidebar/scripts');?>
      <?php
      if ($this->uri->segment(3) == 'details') { ?>
      <script type="text/javascript">
        $('[data-toggle="tabajax"]').click(function(e) {
            var $this = $(this),
            loadurl = $this.attr('href'),
            targ = $this.attr('data-target');
            $.get(loadurl, function(data) {
            $(targ).html(data);
        });
      $this.tab('show');
      return false;
      });
      </script>
      <?php } ?>
    </body>
  </html>