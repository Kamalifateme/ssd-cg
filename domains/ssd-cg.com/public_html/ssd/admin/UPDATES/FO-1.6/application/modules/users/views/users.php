<section id="content">
          <section class="hbox stretch">
            <!-- .aside -->
            <aside>
              <section class="vbox">
               <header class="header bg-white b-b b-light">
                  <a href="#aside" data-toggle="class:show" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus"></i> <?=lang('new_user')?></a>
                  <p><?=lang('system_users')?></p>
                </header>
                <section class="scrollable wrapper">

                  <div class="row">			
				<div class="col-lg-12">
					<section class="panel panel-default">

						<div class="table-responsive">
							<table id="clients" class="table table-striped m-b-none AppendDataTables">
								<thead>
									<tr>
									<th><?=lang('full_name')?></th>	
									<th><?=lang('username')?> </th>
									<th><?=lang('company')?> </th>
									<th><?=lang('role')?> </th>
									<th class="hidden-sm"><?=lang('registered_on')?> </th>
									<th class="hidden-sm"><?=lang('avatar_image')?></th>
									<th><?=lang('options')?></th>
									</tr> </thead> <tbody>
			<?php
			if (!empty($users)) {
			foreach ($users as $key => $user) { ?>
									<tr>
									
									<td><?=$user->fullname?></td>
									<td><?=ucfirst($user->username)?></td>
									<td><a href="<?=base_url()?>companies/view/details/<?=$user->company?>" class="text-info">
									<?=$this->applib->company_details($user->company,'company_name')?></a></td>
										<td><?php
					if ($this->user_profile->role_by_id($user->role_id) == 'admin') {
						$span_badge = 'label label-danger';
					}elseif ($this->user_profile->role_by_id($user->role_id) == 'staff') {
						$span_badge = 'label label-primary';
					}
					else{
						$span_badge = '';
					}
					?><span class="<?=$span_badge?>">
					<?=ucfirst($this->user_profile->role_by_id($user->role_id))?></span></td>
										<td class="hidden-sm"><?=strftime(config_item('date_format'), strtotime($user->created));?> </td>
										<td class="hidden-sm"><a class="pull-left thumb-sm avatar">
									<img src="<?=base_url()?>resource/avatar/<?=$user->avatar?>" class="img-circle"></a>
									</td>
					<td>
					<a href="<?=base_url()?>users/account/auth/<?=$user->user_id?>" class="btn btn-default btn-xs" data-toggle="ajaxModal" title="<?=lang('user_edit_login')?>"><i class="fa fa-lock"></i> <?=lang('user_edit_login')?></a>

					<a href="<?=base_url()?>users/view/update/<?=$user->user_id?>" class="btn btn-default btn-xs" data-toggle="ajaxModal" title="<?=lang('edit')?>"><i class="fa fa-edit"></i> </a>
					<?php
					if ($user->username != $this->tank_auth->get_username()) { ?>
					<a href="<?=base_url()?>users/account/delete/<?=$user->user_id?>" class="btn btn-primary btn-xs" data-toggle="ajaxModal" title="<?=lang('delete')?>"><i class="fa fa-trash-o"></i></a>
					<?php } ?>
					</td>
									</tr>
									<?php } } ?>
									
									
								</tbody>
							</table>
						</div>
					</section>
				</div>
			</div>

                </section>
              </section>
            </aside>
            <!-- /.aside -->
            <!-- .aside -->
            <aside class="aside-lg bg-white b-l hide" id="aside">
              <section class="vbox">
      <section class="scrollable wrapper">
                <?php
          echo form_open(base_url().'auth/register_user'); ?>
           <?php echo $this->session->flashdata('form_errors'); ?>
           <input type="hidden" name="r_url" value="<?=base_url()?>users/account">
          <div class="form-group">
				<label><?=lang('full_name')?> <span class="text-danger">*</span></label>
					<input type="text" class="input-sm form-control" value="<?=set_value('fullname')?>" placeholder="E.g John Doe" name="fullname" required>
				</div>
                  <div class="form-group">
                    <label><?=lang('username')?> <span class="text-danger">*</span></label>
                    <input type="text" name="username" placeholder="Eg. johndoe" value="<?=set_value('username')?>" class="input-sm form-control" required>
                  </div>
                  <div class="form-group">
                    <label><?=lang('email')?> <span class="text-danger">*</span></label>
                    <input type="email" placeholder="johndoe@me.com" name="email" value="<?=set_value('email')?>" class="input-sm form-control" required>
                  </div>
                  <div class="form-group">
                    <label><?=lang('password')?></label>
                    <input type="password" placeholder="<?=lang('password')?>" value="<?=set_value('password')?>" name="password"  class="input-sm form-control">
                  </div>
                  <div class="form-group">
                    <label><?=lang('confirm_password')?></label>
                    <input type="password" placeholder="<?=lang('confirm_password')?>" value="<?=set_value('confirm_password')?>" name="confirm_password"  class="input-sm form-control">
                  </div>
                  <div class="form-group">
			        <label><?=lang('company')?> </label>
			        <select id="select2-option" style="width:200px" name="company" > 
			          <optgroup label="Default Country"> 
			          <option value="-"><?=$this->config->item('company_name')?></option>
			          </optgroup> 
			          <optgroup label="Other Companies"> 
			          <?php if (!empty($companies)) {
			            foreach ($companies as $company){ ?>
			            <option value="<?=$company->co_id?>"><?=$company->company_name?></option>
			            <?php }} ?>
			          </optgroup> 
			          </select> 
			      </div>
			      <div class="form-group">
				<label><?=lang('phone')?> </label>
					<input type="text" class="input-sm form-control" value="<?=set_value('phone')?>" name="phone" placeholder="+52 782 983 434">
				</div>
                  <div class="form-group">
                    <label><?=lang('role')?></label>
                    <div>
                      <select name="role" class="form-control">
                      <?php
                      if (!empty($roles)) {
                      foreach ($roles as $r) { ?>
                      	 <option value="<?=$r->r_id?>"><?=ucfirst($r->role)?></option>
                      <?php } } ?>
                          </select>
                    </div>
                  </div>
                  <div class="m-t-lg"><button class="btn btn-sm btn-success"><?=lang('register_user')?></button></div>
                </form>
              </section>
              </section>
            </aside>
            <!-- /.aside -->
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen, open" data-target="#nav,html"></a>
        </section>

