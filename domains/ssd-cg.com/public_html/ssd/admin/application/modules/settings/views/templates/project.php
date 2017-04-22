<div class="m-b-sm">
<?php
$setting_email = isset($_GET['email'])?$_GET['email']:'project_file';
?>
		         
	<div class="btn-group">
		<a href="<?=base_url()?>settings/?settings=templates&group=project&email=project_file" class="<?php if($setting_email == 'project_file'){ echo "active"; } ?> btn btn-default">Project Files</a>
		<a href="<?=base_url()?>settings/?settings=templates&group=project&email=project_complete" class="<?php if($setting_email == 'project_complete'){ echo "active"; } ?> btn btn-default">Project Complete</a>
		<a href="<?=base_url()?>settings/?settings=templates&group=project&email=project_comment" class="<?php if($setting_email == 'project_comment'){ echo "active"; } ?> btn btn-default">Project Comment</a>
		<a href="<?=base_url()?>settings/?settings=templates&group=project&email=task_assigned" class="<?php if($setting_email == 'task_assigned'){ echo "active"; } ?> btn btn-default">Task Assignment</a>
		<a href="<?=base_url()?>settings/?settings=templates&group=project&email=project_assigned" class="<?php if($setting_email == 'project_assigned'){ echo "active"; } ?> btn btn-default">Project Assignment</a>
	</div>              
 </div>

		              <!-- Start Form -->
<?=$this->load->view('templates/project/'.$setting_email);?>
				<!-- End Form -->

