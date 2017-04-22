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
defined('_JEXEC') or die;

require_once JPATH_SITE.'/components/com_content/helpers/route.php';

jimport('joomla.application.component.model');

JModel::addIncludePath(JPATH_SITE.'/components/com_content/models');

abstract class modAccordianFpCoreHelper
{	
	function corearticlessystem( $text, $length=200 ) {
		//$strip = strip_tags($text);
		//$endText = (strlen($strip) > 200) ? "..." : ""; 
		// strips tags won't remove the actual jscript
		$text = preg_replace( "'<script[^>]*>.*?</script>'si", "", $text );
		$text = preg_replace( '/{.+?}/', '', $text);
		// replace line breaking tags with whitespace
		$text = preg_replace( "'<(br[^/>]*?/|hr[^/>]*?/|/(div|h[1-6]|li|p|td))>'si", ' ', $text );
		$text = substr(strip_tags( $text ), 0, $length) ;
		
		return $text;
		
	}	
	
	public static function getList(&$params)
	{
		// Get the dbo
		$db = JFactory::getDbo();
		
		//Get the config
		$config =& JFactory::getConfig();
		$tzoffset = $config->getValue('config.offset');
		
		// Get an instance of the generic articles model
		$model = JModel::getInstance('Articles', 'ContentModel', array('ignore_request' => true));

		// Set application parameters in model
		$app = JFactory::getApplication();
		$appParams = $app->getParams();
		$model->setState('params', $appParams);
		
		//Get Parameters in module params
		$count		= (int) $params->get('count', 5);
		$time_format= $params->get( 'time_format', 'D, d-m-Y H:i' );
		$totalskip	= (int) $params->get( 'totalskip', 0);
		$show_front	= $params->get('show_front', 1);
		$text_length = intval($params->get( 'preview_count', 200) );

		// Set the filters based on the module params
		$model->setState('list.start', (int) $params->get('totalskip', 0));
		$model->setState('list.limit', (int) $params->get('count', 5));
		$model->setState('filter.published', 1);
		
		$model->setState('list.select', 'a.fulltext, a.id, a.title, a.alias, a.title_alias, a.introtext, a.state, a.catid, a.created, a.created_by, a.created_by_alias,' .
			' a.modified, a.modified_by,a.publish_up, a.publish_down, a.attribs, a.metadata, a.metakey, a.metadesc, a.access,' .
			' a.hits, a.featured,' .
			' LENGTH(a.fulltext) AS readmore');

		// Access filter
		$access = !JComponentHelper::getParams('com_content')->get('show_noauth');
		$authorised = JAccess::getAuthorisedViewLevels(JFactory::getUser()->get('id'));
		$model->setState('filter.access', $access);

		// Category filter
		$model->setState('filter.category_id', $params->get('catid', array()));

		// User filter
		$userId = JFactory::getUser()->get('id');
		switch ($params->get('user_id'))
		{
			case 'by_me':
				$model->setState('filter.author_id', (int) $userId);
				break;
			case 'not_me':
				$model->setState('filter.author_id', $userId);
				$model->setState('filter.author_id.include', false);
				break;

			case '0':
				break;

			default:
				$model->setState('filter.author_id', (int) $params->get('user_id'));
				break;
		}
		
		//Filter by Date
		$date_filtering = $params->get('date_filtering', 'off');
		if ($date_filtering !== 'off') {
			$model->setState('filter.date_filtering', $date_filtering);
			$model->setState('filter.start_date_range', $params->get('start_date_range', '1000-01-01 00:00:00'));
			$model->setState('filter.end_date_range', $params->get('end_date_range', '9999-12-31 23:59:59'));
			$model->setState('filter.relative_date', $params->get('relative_date', 500));
		}
		
		// Filter by language
		$model->setState('filter.language',$app->getLanguageFilter());

		//  Featured switch
		switch ($params->get('show_front'))
		{
			//case '1':
				//$model->setState('filter.featured', 'only');
				//break;
			case '0':
				$model->setState('filter.featured', 'hide');
				break;
			case '1':
			default:
				$model->setState('filter.featured', 'show');
				break;
		}
		
		// Set ordering
		$order_map = array(
			'0' => 'RAND()',
			'1' => 'a.created',
			'2' => 'a.created',
			'3' => 'a.hits',
			'4' => 'a.hits',
			'5' => 'a.modified DESC, a.created',
			//'mc_dsc' => 'CASE WHEN (a.modified = '.$db->quote($db->getNullDate()).') THEN a.created ELSE a.modified END',
			//'p_dsc' => 'a.publish_up',
		);
		$ordering = JArrayHelper::getValue($order_map, $params->get('ordering'), 'a.publish_up');
		//$dir = 'DESC';
		//help ordering system for DESC or ASC
		switch ($params->get( 'orderedby' ))
		{
			case 5:
				$dir = 'DESC';
				break;
			case 4:
				$dir = 'ASC';
				break;
			case 3:
				$dir = 'DESC';
				break;
			case 2:
				$dir = 'ASC';
				break;
			case 1:
				$dir = 'DESC';
				break;
			case 0:
			default:
				$dir = 'DESC';
				break;
		}

		$model->setState('list.ordering', $ordering);
		$model->setState('list.direction', $dir);

		$items = $model->getItems();

		foreach ($items as &$item) {
			//$item->readmore = (trim($item->fulltext) != '');
			$item->slug = $item->id.':'.$item->alias;
			$item->catslug = $item->catid.':'.$item->category_alias;

			if ($access || in_array($item->access, $authorised))
			{
				// We know that user has the privilege to view the article
				$item->link = JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catslug));
				$item->linkText = JText::_('READNEWS');
			}
			else {
				$item->link = JRoute::_('index.php?option=com_user&view=login');
				$item->linkText = JText::_('READNEWS_REGISTER');
			}
			
			$item->created_by = htmlspecialchars( $item->created_by );
			$item->created_by_alias = htmlspecialchars( $item->created_by_alias );
			$item->title = htmlspecialchars( $item->title );
			$item->name = htmlspecialchars( $item->author );
			$item->hits = htmlspecialchars( $item->hits );
			$item->created=JHTML::_('date', htmlspecialchars( $item->created ),"$time_format", $tzoffset);
			
			$item->introtext = JHtml::_('content.prepare', $item->introtext);
			$item->introtext = preg_replace('/<img[^>]*>/', '', $item->introtext);
			$item->introtext = modAccordianFpCoreHelper::corearticlessystem($item->introtext, $text_length);
			
		}

		return $items;
	}
}
