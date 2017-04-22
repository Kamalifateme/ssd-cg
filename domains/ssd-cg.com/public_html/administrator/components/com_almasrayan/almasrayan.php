<?php
defined('_JEXEC') or die;
	global $option,$view;
	$option = JRequest::getVar("option");
	$view = JRequest::getVar("view");
	$controller = JController::getInstance('almasrayan');
	$controller->execute(JFactory::getApplication()->input->get('task'));
	$controller->redirect();

?>