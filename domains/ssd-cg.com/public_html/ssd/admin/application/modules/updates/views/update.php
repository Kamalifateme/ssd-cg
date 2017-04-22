<section id="content"> <section class="vbox"> <section class="scrollable padder">
	<ul class="breadcrumb no-border no-radius b-b b-light pull-in">
		<li><a href="<?=base_url()?>"><i class="fa fa-home"></i> <?=lang('home')?></a></li>
		<li class="active"><?=lang('updates')?></li>
	</ul>
	 <div class="row">
	 <div class="col-lg-8">
	<section class="panel panel-default">
	<div class="panel-body">
<!-- Start Upgrader -->
<?php
if($latest_version > config_item('version')) { ?>
<div class="alert alert-success">
     <button type="button" class="close" data-dismiss="alert">×</button>
       <i class="fa fa-ok-sign"></i> A new update is available <a href="<?=$update_tips?>" target="_blank" class="alert-link">update guide</a>.
</div>
<?php } ?>

<h4 class="m-t-none">System Details</h4>

<!-- Updates message -->




<ul>
<li>Freelancer Office Version: <?=config_item('version')?></li>
<li>Latest Release Version: <span class="badge bg-success"><?=$latest_version?></span> <small class="small text-muted">(released <?=$release_date?>)</small></li>
<li>PHP Version: <?=phpversion()?></li>
<li>Codeigniter Version: <?=CI_VERSION?></li>
<li>Server Name: <?=$_SERVER['SERVER_NAME']?></li>
<li>CURL Status: <?=function_exists('curl_version') ? 'Enabled' : 'Disabled';?></li>
<li>Purchase Status: <span class="badge bg-danger"><?=Applib::pc()?></span></li>
</ul>




<?php if($latest_version > config_item('version')) { ?>

<a href="<?=base_url()?>updates/backup" class="btn btn-danger" data-loading-text="Creating Backup...">Backup System</a>

<a id="download" class="btn btn-info" data-toggle="class:show inline" data-loading-text="Downloading...">Download Updates</a>

<a href="<?=base_url()?>updates/install" class="btn btn-success">Install Updates</a>


<?php } ?>

<hr>

<h4 class="m-t-none">Backup Files</h4>

<ul>
	<?php foreach ($backups as $file) { ?>
		<li><a href="<?=base_url()?>resource/backup/<?=$file?>" class="text-info"><?=$file?></a></li>
	<?php } ?>
</ul>

<h4 class="m-t-none">Updates Files</h4>

<ul>
  <?php foreach ($updates as $file) { ?>
    <li><a class="text-info"><?=$file?></a></li>
  <?php } ?>
</ul>

<div id="response"></div>



<!-- End Upgrade -->

</div>
</section>

<!-- footer -->
  <footer id="footer">
    <div class="text-center padder clearfix">
      <p>
        <small>Powered by <a class="text-info" href="http://codecanyon.net/item/freelancer-office/8870728">Freelancer Office v.<?=config_item('version')?></a></small>
      </p>
    </div>
  </footer>
  <!-- / footer -->
</div>

</section>
</section>
<a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
</section>


 <script src="<?=base_url()?>resource/js/jquery-2.1.1.min.js"></script>
<script> 
    $( document ).ready(function () {
      $("#download").click(function () {
        $.get("updates/get_update/<?=$latest_version?>.zip", function () {
          $("#response").html('<div class=\"alert alert-info\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button> <i class=\"fa fa-ok-sign\"></i><strong>Success!</strong> Update downloaded successfully reload to install update </div>');
        });
      });

      
    });
  </script>
