<?php
/**
 * @package 	mod_bt_facebooklikebox - BT Facebook Likebox Module
 * @version		1.2
 * @created		Oct 2011

 * @author		BowThemes
 * @email		support@bowthems.com
 * @website		http://bowthemes.com
 * @support		Forum - http://bowthemes.com/forum/
 * @copyright	Copyright (C) 2012 Bowthemes. All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 *
 */
// no direct access
defined('_JEXEC') or die('Restricted access');

$likebox = $params->get('type','likebox')=='likebox';
if($likebox){
	$href = 'http://www.facebook.com/plugins/likebox.php?href=';
}
else{
	$href = 'http://www.connect.facebook.com/widgets/fan.php?href=';
}
?>

<div  class="bt-facebookpage<?php echo $moduleclass_sfx ?>" >
<iframe 
	src="<?php 
		$href .= urlencode(trim($params->get('href')));
		$href .='&connections='.$params->get('connections',10);
		if($params->get('width'))
		{
			$href .= "&amp;width=".$params->get('width');
		}
		if($params->get('height'))
		{
			$href .= "&amp;height=".$params->get('height');
		}
		if($params->get('colorscheme'))
		{
			$href .= "&amp;colorscheme=".$params->get('colorscheme');
		}
		if($params->get('show_stream'))
		{
			$href .= "&amp;stream=".$params->get('show_stream');
		}
		if($params->get('border_color') && $likebox)
		{
			$href .= "&amp;border_color=".urlencode($params->get('border_color'));
		}
		
		if($params->get('show_header'))
		{
			$href .= "&amp;header=".$params->get('show_header');
		}
		if($params->get('add_customcss',0) && !$likebox)
		{
			$mainframe = JFactory::getApplication();
			$template = $mainframe->getTemplate();
			$overridePath = JPATH_BASE.DS.'templates'.DS.$template.DS.'html'.DS.'mod_bt_facebooklikebox'.DS.'css'.DS.'custom.css';
			if(file_exists($overridePath))
			{	$filemtime = filemtime($overridePath);
				$document->addStyleSheet(  JURI::root().'templates/'.$template.'/html/mod_bt_login/css/custom.css');
				$customCss = urlencode(JURI::root().'/modules/mod_bt_facebooklikebox/tmpl/css/custom.css?m='.$filemtime);
			}
			else{
				$filemtime = filemtime(JPATH_BASE.DS.'modules'.DS.'mod_bt_facebooklikebox'.DS.'tmpl'.DS.'css'.DS.'custom.css');
				$customCss = urlencode(JURI::root().'/modules/mod_bt_facebooklikebox/tmpl/css/custom.css?m='.$filemtime);
			}
			$href .= "&amp;css=".$customCss;
		}
		
		$href = $href;
		
		echo $href;	
	?>" scrolling="no" 
	frameborder="0" 
	style="border:none; overflow:hidden; width:<?php echo $params->get('width') ? $params->get('width').'px':'100%'?>; height:<?php echo $params->get('height')?>px;" 
	allowTransparency="true">
</iframe>
</div>
