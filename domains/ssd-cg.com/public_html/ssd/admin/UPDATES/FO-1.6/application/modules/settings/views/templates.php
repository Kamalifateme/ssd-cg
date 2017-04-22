
	 <div class="row">
	<!-- Start Form -->
	<div class="col-lg-12">
	<section class="panel panel-default">
	<div class="panel-body">
	  <!-- START TEMPLATES -->

<?php
$template_group = isset($_GET['group'])?$_GET['group']:'user';
?>
		         <!-- Start Form -->
<?=$this->load->view('templates/'.$template_group);?>
				<!-- End Form -->

	  <!-- END TEMPLATES -->
	</div> </section>
</div>
<!-- End Form -->





</div>