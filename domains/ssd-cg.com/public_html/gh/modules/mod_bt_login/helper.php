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

class modbt_loginHelper
{
	function getReturnURL($params, $type)
	{
		if($itemid =  $params->get($type))
		{  
			$menu =& JSite::getMenu();  
			$item = $menu->getItem($itemid); //var_dump($menu);die;
			if ($item)
			{
				$url = JRoute::_($item->link.'&Itemid='.$itemid, false);
			}
			else
			{
			// stay on the same page
			$uri = JFactory::getURI();
			$url = $uri->toString(array('path', 'query', 'fragment'));
			}
				
		}
		else
		{
			// stay on the same page
			$uri = JFactory::getURI();
			$url = $uri->toString(array('path', 'query', 'fragment'));
		}

		return base64_encode($url);
	}

	function getType()
	{
		$user = & JFactory::getUser();
		return (!$user->get('guest')) ? 'logout' : 'login';
	}
	
	function getModules($params) {
		$user = & JFactory::getUser();
		if ($user->get('guest')) return '';
		
		$document = JFactory::getDocument();
		$moduleRender = $document->loadRenderer('module');
		$positionRender = $document->loadRenderer('modules');
		
		$html = '';
		
		$db = JFactory::getDbo();
		$i=0;
		$module_id = $params->get('module_id', array());
		if (count($module_id) > 0) {
			$sql = "SELECT * FROM #__modules WHERE id IN (".implode(',', $module_id).") ORDER BY ordering";
			$db->setQuery($sql);
			$modules = $db->loadObjectList();
			foreach ($modules as $module) {
				
				if ($module->module != 'mod_bt_login') {
					$i++;
					$html = $html . $moduleRender->render($module->module, array('title' => $module->title, 'style' => 'rounded'));
					//$html = $html .$moduleRender->render($module->module, array('title' => $module->title, 'style' => 'rounded'));
					if($i%2==0) $html.="<br clear='both'>";
				}
			}
		}	
		$module_position = $params->get('module_position', array());
		if (count($module_position) > 0) {
			foreach ($module_position as $position) {
				$modules = JModuleHelper::getModules($position);
				foreach ($modules as $module) {
					if ($module->module != 'mod_bt_login') {
						$i++;
						$html = $html . $moduleRender->render($module, array('style' => 'rounded'));
						if($i%2==0) $html.="<br clear='both'>";
					}
				}
			}
		}
		return $html;
	}
	function fetchHead($params){
		$document	= &JFactory::getDocument();
		$header = $document->getHeadData();
		if($params->get('loadCSS',"1")) {
			$document->addStyleSheet(JURI::root().'modules/mod_bt_login/assets/css/style.css');
		}

		$loadJquery = true;
		switch($params->get('loadJquery',"auto")){
			case "0":
				$loadJquery = false;
				break;
			case "1":
				$loadJquery = true;
				break;
			case "auto":
				
				foreach($header['scripts'] as $scriptName => $scriptData)
				{
					if(substr_count($scriptName,'jquery'))
					{
						$loadJquery = false;
						break;
					}
				}
			break;		
		}
		//Add js
		if($loadJquery)
		{ 
			$document->addScript(JURI::root().'modules/mod_bt_login/assets/js/jquery.min.js');
		}
		$document->addScript(JURI::root().'modules/mod_bt_login/assets/js/jquery.simplemodal.js');
		$document->addScript(JURI::root().'modules/mod_bt_login/assets/js/default.js');	

	}
}
