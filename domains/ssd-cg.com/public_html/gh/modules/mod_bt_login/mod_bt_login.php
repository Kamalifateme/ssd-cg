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

// Include the syndicate functions only once
require_once (dirname(__FILE__).DS.'helper.php');
modbt_loginHelper::fetchHead($params);

$mainframe = JFactory::getApplication();
$params->def('greeting', 1);

$type 	= modbt_loginHelper::getType();
$return	= modbt_loginHelper::getReturnURL($params, $type);
$loggedInHtml = modbt_loginHelper::getModules($params);

$user =& JFactory::getUser();

if($params->get("display_type")==1)
{
	$effect = 'btl-dropdown';
}
else
{
	$effect = 'btl-modal';
}	
$usersConfig = JComponentHelper::getParams('com_users');
$enabledRegistration=false;
if ($usersConfig->get('allowUserRegistration')){
	$enabledRegistration=true;
}
$language = JFactory::getLanguage();
require(JModuleHelper::getLayoutPath('mod_bt_login'));

?>

