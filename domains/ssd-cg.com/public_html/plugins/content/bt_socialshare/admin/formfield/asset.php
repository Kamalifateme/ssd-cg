<?php/** * @package 	formfield * @version		1.0 * @created		Oct 2011 * @author		BowThemes * @email		support@bowthems.com * @website		http://bowthemes.com * @support		Forum - http://bowthemes.com/forum/ * @copyright	Copyright (C) 2011 Bowthemes. All rights reserved. * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL * */// no direct accessdefined('_JEXEC') or die('Restricted access');jimport('joomla.form.formfield');class JFormFieldAsset extends JFormField {    protected $type = 'Asset';    protected function getInput() {				//JHTML::_('behavior.mootools');		$checkJqueryLoaded = false;		$document	= &JFactory::getDocument();		$header = $document->getHeadData();		foreach($header['scripts'] as $scriptName => $scriptData)		{			if(substr_count($scriptName,'jquery')){				$checkJqueryLoaded = true;			}		}					//Add js		if(!$checkJqueryLoaded) 		$document->addScript(JURI::root().$this->element['path'].'js/jquery.min.js');		$document->addScript(JURI::root().$this->element['path'].'js/chosen.jquery.min.js');				$document->addScript(JURI::root().$this->element['path'].'js/colorpicker/colorpicker.js');        $document->addScript(JURI::root().$this->element['path'].'js/bt.js');        				//Add css         		$document->addStyleSheet(JURI::root().$this->element['path'].'css/bt.css');        $document->addStyleSheet(JURI::root().$this->element['path'].'js/colorpicker/colorpicker.css');                $document->addStyleSheet(JURI::root().$this->element['path'].'css/chosen.css');                                return null;    }}?>