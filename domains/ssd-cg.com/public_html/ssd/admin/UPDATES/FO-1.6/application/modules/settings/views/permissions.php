
   <div class="row">
  <!-- Start Form -->
  <div class="col-lg-12">
  <section class="panel panel-default">
  <header class="panel-heading font-bold"><i class="fa fa-cogs"></i> <?=lang('permission_settings')?> <?php
  if (isset($_GET['staff'])) {
     echo ' for '.ucfirst($this -> applib -> get_any_field('users',array('id'=>$_GET['staff']),'username'));
   }
 ?></header>
  <div class="panel-body">
<?php
if (isset($_GET['staff'])) {
  $data['user_id'] = $_GET['staff'];
  $this -> load -> view('permissions/edit_permissions', $data);
}else{
  $this -> load -> view('permissions/staff');
}
?> 
  </div> </section>
</div>
<!-- End Form -->




</div>

