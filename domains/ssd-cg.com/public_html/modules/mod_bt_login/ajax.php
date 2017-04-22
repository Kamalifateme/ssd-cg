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

	if (!defined ('_JEXEC')) {

		define( '_JEXEC', 1 );
		
		$path = dirname(dirname(dirname(__FILE__)));
		
		define('JPATH_BASE', $path );

		define( 'DS', DIRECTORY_SEPARATOR );
		
		require_once ( JPATH_BASE .DS.'includes'.DS.'defines.php' );
		
		require_once ( JPATH_BASE .DS.'includes'.DS.'framework.php' );
		
		$mainframe =& JFactory::getApplication('site');

		$db = & JFactory::getDBO();
		
		jimport ('joomla.plugin.helper');

		//JRequest::checkToken('request') or jexit( 'Invalid Token' );

		global $mainframe;

		if ($return = JRequest::getVar('return', '', 'method', 'base64')) {
			$return = base64_decode($return);
			if (!JURI::isInternal($return)) {
				$return = '';
			}
		}

		$options = array();
		
		$options['remember'] = JRequest::getBool('remember', false);
		
		$options['return'] = $return;

		$credentials = array();
		
		$credentials['username'] = JRequest::getVar('username', '', 'method', 'username');
		
		$credentials['password'] = JRequest::getString('passwd', '', 'post', JREQUEST_ALLOWRAW);
		
		//preform the login action
		$error = $mainframe->login($credentials, $options);
		
		echo $error;
		
		die();
}
?>