<style type="text/css">
@import url(http://fonts.googleapis.com/css?family=Dosis:300|Lato:300,400,600,700|Roboto+Condensed:300,700|Open+Sans+Condensed:300,600|Open+Sans:400,300,600,700|Maven+Pro:400,700);
@import url("http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");


.content:before {
  content: "";
  position: fixed;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  z-index: -1;
  display: block;
  background-color: black;
  background-image: url("http://shuleportal.com/login-bg.jpg");
  width: 100%;
  height: 100%;
  background-size: cover;
  -webkit-filter: blur(2px);
  -moz-filter: blur(1px);
  -o-filter: blur(1px);
  -ms-filter: blur(1px);
  filter: blur(1px);
}

.content {
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background-color: rgba(10, 10, 10, 0.5);
  margin: auto auto;
  -moz-border-radius: 4px;
  -webkit-border-radius: 4px;
  border-radius: 4px;
  -moz-box-shadow: 0 0 10px black;
  -webkit-box-shadow: 0 0 10px black;
  box-shadow: 0 0 10px black;
}
.panel{
	margin-bottom: 10px;
}
</style>







<?php
$login = array(
	'name'	=> 'login',
	'class'	=> 'form-control input-lg',
	'placeholder' => 'admin',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or Username';
} else if ($login_by_username) {
	$login_label = 'Username';
} else {
	$login_label = 'Email';
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'inputPassword',
	'size'	=> 30,
	'class' => 'form-control input-lg'
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>

<div class="content">
<section id="content" class="m-t-lg wrapper-md animated fadeInUp">

		<div class="container aside-xxl">
		 <section class="panel panel-default bg-white m-t-lg">
		<header class="panel-heading text-center"> <strong>Project Management System</strong> 
			<?php  echo modules::run('sidebar/flash_msg');?>  
		</header>

		<?php 
		$attributes = array('class' => 'panel-body wrapper-lg');
		echo form_open($this->uri->uri_string(),$attributes); ?>
			<div class="form-group">
				<label class="control-label"><?=lang('email_user')?></label>
				<?php echo form_input($login); ?>
				<span style="color: red;">
				<?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></span>
			</div>
			<div class="form-group">
				<label class="control-label"><?=lang('password')?></label>
				<?php echo form_password($password); ?>
				<span style="color: red;"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?></span>
			</div>


	<?php if ($show_captcha) {
		if ($use_recaptcha) { ?>
	<tr>
		<td colspan="2">
			<div id="recaptcha_image"></div>
		</td>
		<td>
			<a href="javascript:Recaptcha.reload()"><?=lang('Get_another_CAPTCHA')?></a>
			<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')"><?=lang('Get_an_audio_CAPTCHA')?></a></div>
			<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')"><?=lang('Get_an_image_CAPTCHA')?></a></div>
		</td>
	</tr>
	<tr>
		<td>
			<div class="recaptcha_only_if_image"><?=lang('Enter_the_words_above')?></div>
			<div class="recaptcha_only_if_audio"><?=lang('Enter_the_numbers_you_hear')?></div>
		</td>
		<td><input type="text" id="recaptcha_response_field" name="recaptcha_response_field" /></td>
		<td style="color: red;"><?php echo form_error('recaptcha_response_field'); ?></td>
		<?php echo $recaptcha_html; ?>
	</tr>
	<?php } else { ?>
	<tr>
		<td colspan="3">
			<p><?=lang('Enter_the_code_exactly')?></p>
			<?php echo $captcha_html; ?>
		</td>
	</tr>
	<tr>
		<td><?php echo form_label('Confirmation Code', $captcha['id']); ?></td>
		<td><?php echo form_input($captcha); ?></td>
		<td style="color: red;"><?php echo form_error($captcha['name']); ?></td>
	</tr>
	<?php }
	} ?>

	<div class="checkbox">
				<label>
					<?php echo form_checkbox($remember); ?> <?=lang('This_is_my_computer')?>
				</label>
			</div>
 <a href="<?=base_url()?>auth/forgot_password" class="pull-right m-t-xs"><small><?=lang('Forgot_password')?></small></a> 
			<button type="submit" class="btn btn-primary"><?=lang('Sign_in')?></button>
			<div class="line line-dashed">
			</div> 
			<?php if ($this->config->item('allow_registration', 'tank_auth')){ ?>
			<p class="text-muted text-center"><small><?=lang('Do_not_have_an_account')?></small></p> 
			<?php } ?>
			<a href="<?=base_url()?>auth/register/" class="btn btn-success btn-block"><?=lang('Get_Your_Account')?></a>
<?php echo form_close(); ?>

 </section>



	<!-- footer --> 

	<footer id="footer">
	<div class="text-center text-white padder">
		<p> <small>Powered by  <a href="http://codecanyon.net/item/freelancer-office/8870728">Freelancer Office</a> v<?=config_item('version')?> 
		<br>&copy; <?=date('Y')?> <?=lang('with_all_the_love')?> <a href="<?=$this->config->item('company_domain')?>" target="_blank"><?=$this->config->item('company_name')?></a> </small> </p>
	</div> 
	</footer>
	<!-- / footer -->

	</div> 


	</section>
</div>