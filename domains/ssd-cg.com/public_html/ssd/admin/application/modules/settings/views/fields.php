
	 <div class="row">
	<!-- Start Form -->
	<div class="col-lg-12">
	<section class="panel panel-default">
	<div class="panel-body">
	  <!-- START TEMPLATES -->

<?php
$department = isset($_GET['dept'])?$_GET['dept']:'';

		         if ($department != '') {
		         	$this->load->view('fields/custom_field');
		         }else{
		         	$this->load->view('fields/select_dept');
		         }
?>
				<!-- End Form -->

	  <!-- END TEMPLATES -->
	</div> </section>
</div>
<!-- End Form -->





</div>