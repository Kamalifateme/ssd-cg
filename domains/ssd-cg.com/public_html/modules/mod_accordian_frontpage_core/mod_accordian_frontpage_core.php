<?php
/**
* Accordian FrontPage Core - Joomla Module
* Version			: 2.0
* Created by		: RBO Team - RumahBelanja.com
* Created on		: December 2008 (Joomla 1.5.x) - December 2010 (Joomla 1.6.x) - December 2011 (Joomla 1.7.x)
* Updated on		: December 02nd, 2011
* Package			: Joomla 1.7.x
* License			: http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*/


// no direct access
defined('_JEXEC') or die('Restricted access');

// Include the syndicate functions only once
require_once dirname(__FILE__).'/helper.php';

$list = modAccordianFpCoreHelper::getList($params);
$counter = 0;
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_accordian_frontpage_core', $params->get('layout', 'default'));