<div class="row">
<div class="col-lg-12">

<section class="scrollable wrapper">
<?php
 if ($role == '1' OR $role == '3' OR $this -> applib -> project_setting('show_milestones',$project_id)) { 



  $sub_group = isset($_GET['view']) ? $_GET['view'] : '';
  if($sub_group == ''){
      $data['project_id'] = $project_id;
      $this -> load -> view('group/sub_group/milestones',$data);
    }else{
      $data['project_id'] = $project_id;
      $this -> load -> view('group/sub_group/'.$sub_group,$data);
    }



  }
?>
 </section>
  </div> 

  </div>
  <!-- End ROW 1 -->