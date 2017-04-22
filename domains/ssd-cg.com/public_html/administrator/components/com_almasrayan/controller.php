<?php
defined('_JEXEC') or die;
class almasrayanController extends JController
{
	//=========================================================================
	protected $default_view = 'almasrayan';
	//=========================================================================
	public function display($cachable = false, $urlparams = false){
		require_once JPATH_COMPONENT_ADMINISTRATOR.'/helpers/almasrayan.php';
		// Load the submenu.
		almasrayanHelper::addSubmenu(JRequest::getCmd('view', 'almasrayan'));

		parent::display();

		return $this;
	}
	//========================================== }
	static function LoadMessageConfirmRemove($msg = ''){
		$alert = sprintf(JText::_("MYPN_DELETE"),$msg);
		return $alert;
	}
	//=========================================================================
	static function Comma($myVal) {
	$T=array();
	if(!is_numeric($myVal))
		return $myVal;
	$X = "$myVal";
	$X = strrev($X);
	while(strlen($X)){
		$A = substr($X,0,3);
		$A = strrev($A);
		$T[] = $A;
		$X = substr($X,3);
	}
	$T=array_reverse($T);
	if(count($T))
	$T[0]=intval($T[0]);
	return implode(',',$T);
	}
	//=========================================================================
}
?>