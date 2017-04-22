<?php
/*
 *
 * @package		ZT Piece Maker
 * @version		1.0.0
 * @author		ZooTemplate
 * @copyright	Copyright (C) 2011 http://www.zootemplate.com. All rights reserved.. All rights reserved
 * @license		GNU/GPL
 * 
 * Component ZT Creator version 1.0 is a free tool developed by ZooTemplate.com.
 */

defined('_JEXEC') or die('Restricted access');

class mod_zt_piecemakerInstallerScript
{
	function preflight($type, $parent)
	{
		$type = strtolower($type);
		if($type == 'install' || $type == 'update')
			$this->updateManifest($parent);
	}
	
	private function updateManifest($parent)
	{
		jimport('joomla.filesystem.file');
		
		$installer 			= $parent->getParent();
		$manifestFile 		= basename($installer->getPath('manifest'));
		$cleanManifestFile 	= preg_replace('/^\_+/i', '', $manifestFile);

		$dir = dirname(__FILE__) . DS . 'install' . DS;

		JFile::delete($dir . $cleanManifestFile);
		JFile::copy($dir . '..' . DS . $cleanManifestFile, $dir . $cleanManifestFile);
	}
}
?>