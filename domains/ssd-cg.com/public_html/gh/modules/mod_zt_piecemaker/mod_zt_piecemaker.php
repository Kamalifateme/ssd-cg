<?php
/**
 * @package ZT Piecemaker module for Joomla! 1.6
 * @author http://www.zootemplate.com
 * @copyright (C) 2011- ZooTemplate.Com
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/

defined('_JEXEC') or die('Restricted access');// no direct access

$version = new JVersion();

if($version->RELEASE != '1.5') {
	require_once(dirname(__FILE__).DS.'helper.php');
}
else {
	require_once(dirname(__FILE__).DS.'_helper.php');
}

$ztPiecemaker 	= new ztPiecemakerHelper($params,$module->id);
$listItems 		= $ztPiecemaker->writeXmlFile();

if(count($listItems)) {
	require(JModuleHelper::getLayoutPath('mod_zt_piecemaker'));
}
?>