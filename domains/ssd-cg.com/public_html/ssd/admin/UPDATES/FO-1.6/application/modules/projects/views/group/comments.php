
<section class="panel panel-default">


                <div class="row">
<div class="col-lg-12">

<section class="panel panel-body">

<section class="comment-list block">
<article class="comment-item media" id="comment-form">
<?php
if ($role == '1' OR $role == '3' OR $this -> applib -> project_setting('show_project_comments',$project_id)) { 




$user = $this -> tank_auth -> get_user_id();
$myavatar = $this -> applib->get_any_field('account_details',array('user_id'=>$user),'avatar');
$project_title = $this -> applib->get_any_field('projects',array('project_id'=>$project_id),'project_title');
?>
                      <a class="pull-left thumb-sm avatar"><img src="<?=base_url()?>resource/avatar/<?=$myavatar?>" class="img-circle"></a>
                      <section class="media-body">

                      <section class="panel panel-default">
                          <?php 
                      $attributes = 'class="m-b-none"';
                        echo form_open(base_url().'projects/comment/',$attributes); ?>
                         <input type="hidden" name="project" value="<?=$project_id?>">
                            <textarea class="form-control no-border" name="comment" rows="3" placeholder="<?=$project_title?> comment"></textarea>
                          
                          <footer class="panel-footer bg-light lter">
                            <button class="btn btn-info pull-right btn-sm" type="submit"><?=lang('post_comment')?></button>
                            <ul class="nav nav-pills nav-sm">
                            </ul>
                          </footer>
                          </form>
                        </section>
                      
                      </section>
                    </article>
<?php
$comments = $this -> db -> where(array('project'=>$project_id)) ->order_by('date_posted','desc') -> get('comments') -> result();
                  if (!empty($comments)) {
                  foreach ($comments as $key => $c) {
  $avatar = $this -> applib->get_any_field('account_details',array('user_id'=>$c->posted_by),'avatar');
  $role_id = $this -> applib->get_any_field('users',array('id'=>$c->posted_by),'role_id');
  $user_role = $this->tank_auth->user_role($role_id);
  $username = $this -> applib->get_any_field('users',array('id'=>$c->posted_by),'username');
if($user_role == 'admin'){ $role_label = 'danger'; }else{ $role_label = 'info';}
?> 
                    <article id="comment-id-1" class="comment-item">
                      <a class="pull-left thumb-sm avatar">
                        <img src="<?=base_url()?>resource/avatar/<?=$avatar?>" class="img-circle">
                      </a>
                      <span class="arrow left"></span>
                      <section class="comment-body panel panel-default">
                        <header class="panel-heading bg-white">
                          <a href="#"><?=ucfirst($username)?></a>
                          <label class="label bg-<?=$role_label?> m-l-xs"><?=$user_role?></label> 
                          <span class="text-muted m-l-sm pull-right">
                            <i class="fa fa-clock-o"></i>
              <?php
                $today = time();
                $comment_day = strtotime($c->date_posted) ;
                echo $this-> applib -> get_time_diff($today,$comment_day);
              ?> <?=lang('ago')?>
                          </span>
                        </header>
                        <div class="panel-body">
                          <div class="text-muted small"><?=$c->message?></div>
                          <div class="comment-action m-t-sm">
                            
                          </div>
                        </div>
                      </section>
                    </article>

                   <?php } }else{ ?>
                      <article id="comment-id-1" class="comment-item">
                      <section class="comment-body panel panel-default">
                      <p><?=lang('no_comments_found')?></p>
                      </section>
                      </article>
                      <?php } } ?>
                   
                  </section>
                  </section>
                  </div>
                  </div>
                  </section>