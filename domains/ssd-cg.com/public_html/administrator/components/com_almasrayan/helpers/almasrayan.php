<?php
/**
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */
defined("_JEXEC") or die;
/**
 * almasrayan component helper.
 *
 * @package		JoomlAdministrator
 * @subpackage	com_almasrayan
 */
class almasrayanHelper
{
	/**
	 * Configure the Linkbar.
	 *
	 * @param	string	The name of the active view.
	 *
	 * @return	void
	 */
	public static function addSubmenu($submenu)
	{
		global $app,$compconfig;
		$option = "com_almasrayan";
		$db = JFactory::getDBO();
		JSubMenuHelper::addEntry(JText::_("PANEL"), "index.php?option=$option", $submenu == "almasrayan");
		// set some global property
		$Xsubmenu = array();
		$Xsubmenu["args"] = "arg";
		JSubMenuHelper::addEntry(JText::_("args"), "index.php?option=$option&view=args", $submenu == "args");
		$Xsubmenu["help"] = "help";
		JSubMenuHelper::addEntry(JText::_("help"), "index.php?option=$option&view=help", $submenu == "help");
		$Xsubmenu["about"] = "about";
		JSubMenuHelper::addEntry(JText::_("about"), "index.php?option=$option&view=about", $submenu == "about");
		$document = JFactory::getDocument();
		$document->addStyleDeclaration(".icon-48-generic {background-image: url(../components/$option/images/icon48/almasrayan.png);}");
		if(isset($Xsubmenu[$submenu]))
		$document->addStyleDeclaration(".icon-48-$submenu {background-image: url(../components/$option/images/icon48/".$Xsubmenu[$submenu].".png);}");
		$document->setTitle(JText::_($submenu));
	}
}
?>