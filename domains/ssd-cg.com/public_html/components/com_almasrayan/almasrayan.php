<?php
defined('_JEXEC') or die;
@define('DS',DIRECTORY_SEPARATOR);
// Include dependancies
jimport('joomla.application.component.controller');
//===================================================================
	global $option,$app,$compconfig,$view;
	$app = JFactory::getApplication();
	$option = JRequest::getVar("option");
	$view = JRequest::getVar("view");
	$compconfig = JComponentHelper::getParams($option);
	if(!$compconfig->get("enable_component",1)){
		echo $compconfig->get("disable_message");
		return;
	}
//===================================================================
// Execute the task.
$controller	= JController::getInstance('almasrayan');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
