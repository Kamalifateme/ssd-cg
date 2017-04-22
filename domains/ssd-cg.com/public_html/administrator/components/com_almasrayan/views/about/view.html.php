<?php
/**
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

/**
 * View class for a list of villages.
 *
 * @package		JoomlAdministrator
 * @subpackage	com_almasrayan
 */
class almasrayanViewabout extends JViewLegacy
{
	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
		$this->addToolbar();
		parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 *
	 */
	protected function addToolbar()
	{
		global $app,$view;

		JToolBarHelper::title(JText::_("almasrayan")." : ".JText::_($view), $view.'.png');
	}
}
?>