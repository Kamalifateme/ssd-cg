<?php
/**
 * @package		JoomlAdministrator
 * @subpackage	com_almasrayan
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
	global $option,$compconfig;
	$css = JURI::root()."components/$option/css/css.css";
	JHtml::_("stylesheet",$css);
?>
	<form>
	<div id="j-main-container" class="span10 mycontainer">
	<?php echo JText::_("about");?>
	</div>
	</form>