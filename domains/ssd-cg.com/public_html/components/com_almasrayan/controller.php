<?php
/**
 * @version     1.0.0
 * @package     com_myalmasrayan
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Alireza Balvardi <a.balvardi@gmail.com> - http://dima.ir
 */
 
// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controller');

class almasrayanController extends JController
{
    protected $default_view = 'almasrayan';
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
	static function CountView($table,$id){
		$db = JFactory::getDBO();
		$query = "UPDATE `#__almasrayan_$table` SET `fldClick` = `fldClick` +1 WHERE `id` = $id";
		$db->setQuery( $query );
		//echo "<P>017=".$db->replacePrefix( $query )."</P>";
		$db->Query();

		$query = "SELECT `fldClick` FROM `#__almasrayan_$table` WHERE `id` = $id";
		$db->setQuery( $query );
		//echo "<P>017=".$db->replacePrefix( $query )."</P>";
		$I = $db->loadResult();
		return $I;
	}
//=========================================================================
}