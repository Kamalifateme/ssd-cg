<?php
/**
* Flexi Custom Code - Joomla Module
* Version			: 1.3
* Created by		: RBO Team > Project::: RumahBelanja.com, Demo::: GtechPedia.Com
* Created on		: v1.0 - December 16th, 2010 (Joomla 1.6.x) and v1.2 - August 21th, 2011 (Joomla 1.7.x) - v1.2.1 December 24th, 2011 (Joomla 2.5)
* Updated			: v1.3 - July 12, 2012
* Package			: Joomla 2.5.x
* License			: http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

	class modFlexiCustomCode {
		function parsePHPviaFile($custom) {
			$tmpfname = tempnam(JPATH_SITE."/tmp", "html");
			$handle = fopen($tmpfname, "w");
			fwrite($handle, $custom, strlen($custom));
			fclose($handle);
			include_once($tmpfname);
			unlink($tmpfname);
		}
	}

?>