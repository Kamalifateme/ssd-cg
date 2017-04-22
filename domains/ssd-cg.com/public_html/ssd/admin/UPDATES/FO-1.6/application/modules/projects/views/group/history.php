
					<div  id="activity">
                          <ul class="list-group no-radius m-b-none m-t-n-xxs list-group-lg no-border">
											<?php
                      if ($role == '1' OR $role == '3' OR $this -> applib -> project_setting('show_project_history',$project_id)) { 




                      $activities = $this-> db -> where(array('module'=>'projects','module_field_id'=>$project_id)) -> order_by('activity_date','desc') -> get('activities') -> result();
											if (!empty($activities)) {
											foreach ($activities as $key => $a) { ?>
                            <li class="list-group-item">
                              <a href="#" class="thumb-sm pull-left m-r-sm">
                                <img src="<?=base_url()?>resource/avatar/<?=$this -> applib -> get_any_field('account_details',array('user_id' => $a->user), 'avatar')?>" class="img-circle">
                              </a>
                              <a href="#" class="clear">
                                <small class="pull-right"><?=strftime("%b %d, %Y %H:%M:%S", strtotime($a->activity_date)) ?></small>
                                <strong class="block"><?=ucfirst($this -> applib -> get_any_field('users',array('id' => $a->user), 'username'))?></strong>
                                <small><?=$a->activity?> </small>
                              </a>
                            </li>
                            <?php } } }?>

                          </ul>
                        </div>