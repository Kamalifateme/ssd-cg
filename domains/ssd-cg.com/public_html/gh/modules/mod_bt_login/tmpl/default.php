<?php
/**
 * @package 	mod_bt_login - BT Login Module
 * @version		1.0
 * @created		Oct 2011

 * @author		BowThemes
 * @email		support@bowthems.com
 * @website		http://bowthemes.com
 * @support		Forum - http://bowthemes.com/forum/
 * @copyright	Copyright (C) 2011 Bowthemes. All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 *
 */

// no direct access
defined('_JEXEC') or die('Restricted access');
?>
<div id="btl">
	<!-- Panel top -->
	<div class="btl-panel">
		<?php if($type == 'logout') : ?>
		<!-- Profile button -->
		<span id="btl-panel-profile" class="btl-dropdown">
			
			<?php
			echo JText::_("BTL_WELCOME").", ";
			if($params->get('name') == 0) : {
				echo $user->get('name');
			} else : {
				echo $user->get('username');
			} endif;
			?>
		</span> 
		<?php else : ?>
			
			<!-- Registration button -->
			<?php
			if($enabledRegistration){
				$option = JRequest::getCmd('option');
				$task = JRequest::getCmd('task');
				if($option!='com_user' && $task != 'register'){
			?>
			<span id="btl-panel-registration" class="<?php echo $effect;?>"><?php echo JText::_('JREGISTER');?></span>
			<?php }
			} ?>
			<!-- Login button -->
			<span id="btl-panel-login" class="<?php echo $effect;?>"><?php echo JText::_('JLOGIN');?></span>
			
		<?php endif; ?>
	</div>
	<!-- content dropdown/modal box -->
	<div id="btl-content">
		<?php if($type == 'logout') : ?>
		<!-- Profile module -->
		<div id="btl-content-profile" class="btl-content-block">
			<?php echo $loggedInHtml; ?>
			
			<div class="btl-buttonsubmit">
				<form action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>" method="post" name="logoutForm">
					<button name="Submit" class="btl-buttonsubmit" onclick="document.logoutForm.submit();"><?php echo JText::_('JLOGOUT'); ?></button>
					<input type="hidden" name="option" value="com_users" />
					<input type="hidden" name="task" value="user.logout" />
					<input type="hidden" name="return" value="<?php echo $return; ?>" />
					<?php echo JHtml::_('form.token'); ?>
				
				</form>
			</div>
		</div>
		<?php else : ?>	
		<!-- Form login -->	
		<div id="btl-content-login" class="btl-content-block">
			<?php if(JPluginHelper::isEnabled('authentication', 'openid')) : ?>
				<?php JHTML::_('script', 'openid.js'); ?>
			<?php endif; ?>
			<form name="btl-formlogin" class="btl-formlogin" action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>" method="post">
			<h3><?php echo JText::_('Login') ?></h3>
			<div class="btl-error" id="btl-login-error"></div>
			<div class="btl-field">
				<div class="btl-label"><?php echo JText::_('Username') ?></div>
				<div class="btl-input">
					<input id="btl-input-username" type="text" name="username"	/>
				</div>
			</div>
			<div class="btl-field">
				<div class="btl-label"><?php echo JText::_('Password') ?></div>
				<div class="btl-input">
					<input id="btl-input-password" type="password" name="password" alt="password" />
				</div>
			</div>
			<div class="clear"></div>
			<?php if (JPluginHelper::isEnabled('system', 'remember')) : ?>
			<div class="btl-field">
				
				<div class="btl-label"></div>	
				<div class="btl-input">
					<input id="btl-input-remember" type="checkbox" name="remember"
						value="yes" />
						<?php echo JText::_('MOD_LOGIN_REMEMBER_ME'); ?>
				</div>	
			</div>
			<div class="clear"></div>
			<?php endif; ?>
			<div class="btl-buttonsubmit">
				<input type="submit" name="Submit" class="btl-buttonsubmit" onclick="return loginAjax()" value="<?php echo JText::_('JLOGIN') ?>" /> 
				<input type="hidden" name="option" value="com_users" />
				<input type="hidden" name="task" value="user.login" /> 
				<input type="hidden" name="return" id="btl-return"	value="<?php echo $return; ?>" />
			</div>
			</form>		
		</div>
		<div id="btl-content-registration" class="btl-content-block">
			<form name="btl-formregistration" class="btl-formregistration" action="<?php echo JRoute::_('index.php?option=com_users&task=registration.register'); ?>" method="post">
			<h3><?php echo JText::_("JREGISTER"); ?></h3>
			<div class="btl-note"><span><?php echo JText::_("BTL_REQUIRED_FIELD"); ?></span></div>
			<div id="btl-registration-error" class="btl-error"></div>
			<div class="btl-field">
				<div class="btl-label"><?php echo JText::_( 'Name' ); ?></div>
				<div class="btl-input">
					<input id="btl-input-name" type="text" name="jform[name]" />
				</div>
			</div>
			<div class="clear"></div>
			<div class="btl-field">
				<div class="btl-label"><?php echo JText::_( 'Username' ); ?></div>
				<div class="btl-input">
					<input id="btl-input-username1" type="text" name="jform[username]" />
				</div>
			</div>
			<div class="clear"></div>
			<div class="btl-field">
				<div class="btl-label"><?php echo JText::_( 'Password' ); ?></div>
				<div class="btl-input">
					<input id="btl-input-password1" type="password" name="jform[password1]" />
				</div>
			</div>
			<div class="clear"></div>
			<div class="btl-field">
				<div class="btl-label"><?php echo JText::_( 'Verify password' ); ?></div>
				<div class="btl-input">
					<input id="btl-input-password2" type="password" name="jform[password2]" />
				</div>
			</div>
			<div class="clear"></div>
			<div class="btl-field">
				<div class="btl-label"><?php echo JText::_( 'Email' ); ?></div>
				<div class="btl-input">
					<input id="btl-input-email1" type="text" name="jform[email1]" />
				</div>
			</div>
			<div class="clear"></div>
			<div class="btl-field">
				<div class="btl-label"><?php echo JText::_( 'Verify email' ); ?></div>
				<div class="btl-input">
					<input id="btl-input-email2" type="text" name="jform[email2]" />
				</div>
			</div>
			<div class="clear"></div>
			<div class="btl-buttonsubmit">
			<button type="submit" class="btl-buttonsubmit"><?php echo JText::_('JREGISTER');?></button>
			<input type="hidden" name="option" value="com_users" /> 
			<input type="hidden" name="task" value="registration.register" /> 
			<?php echo JHtml::_('form.token');?>
			</div>
		</form>
		</div>	
		<?php endif; ?>
	</div>
</div>
<script type="text/javascript">var btlOpt = {REQUIRED_USERNAME: '<?php echo JText::_("REQUIRED_USERNAME"); ?>',REQUIRED_PASSWORD: '<?php echo JText::_("REQUIRED_PASSWORD"); ?>',REQUIRED_PASSWORD:'<?php echo JText::_("REQUIRED_PASSWORD"); ?>',BT_AJAX: '<?php echo JURI::base(); ?>modules/mod_bt_login/ajax.php',BT_RETURN: '<?php echo base64_decode($return); ?>',E_LOGIN_AUTHENTICATE: "<?php echo JText::_("E_LOGIN_AUTHENTICATE"); ?>",REQUIRED_NAME:'<?php echo JText::_("REQUIRED_NAME"); ?>',REQUIRED_USERNAME: '<?php echo JText::_("REQUIRED_USERNAME"); ?>',REQUIRED_PASSWORD:'<?php echo JText::_("REQUIRED_PASSWORD"); ?>',REQUIRED_VERIFY_PASSWORD:'<?php echo JText::_("REQUIRED_VERIFY_PASSWORD"); ?>',PASSWORD_NOT_MATCH:'<?php echo JText::_("PASSWORD_NOT_MATCH"); ?>',REQUIRED_EMAIL:'<?php echo JText::_("REQUIRED_EMAIL"); ?>',EMAIL_INVALID:'<?php echo JText::_("EMAIL_INVALID"); ?>',	REQUIRED_VERIFY_EMAIL:'<?php echo JText::_("REQUIRED_VERIFY_EMAIL"); ?>',EMAIL_NOT_MATCH:'<?php echo JText::_("EMAIL_NOT_MATCH"); ?>'}</script>
