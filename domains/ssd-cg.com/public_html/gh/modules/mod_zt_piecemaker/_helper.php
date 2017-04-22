<?php
/**
 * @package JV Piecemaker module for Joomla! 1.5
 * @author http://www.ZooTemplate.com
 * @copyright (C) 2010- ZooTemplate.Com
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/

jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');
require_once (JPATH_SITE.DS.'components'.DS.'com_content'.DS.'helpers'.DS.'route.php');
class ZTPiecemakerHelper {
	var $params;
	var $moduleId;
	var $xmlFile;
	function __construct($params,$moduleId){
		$this->params = $params;
		$this->moduleId = $moduleId;
		$this->xmlFile = JPATH_BASE.DS."modules".DS."mod_zt_piecemaker".DS."assets".DS."xml".DS."piecemakerXML".$moduleId.".xml";
		$this->createdDirThumb();
	}
	function createdDirThumb($comp='com_content',$folderImage=''){
		$thumbImgParentFolder = JPATH_BASE.DS.'images'.DS.'stories'.DS.'thumbs'.DS.$comp.$folderImage;
		if(!JFolder::exists($thumbImgParentFolder)){
			JFolder::create($thumbImgParentFolder);
		}
	}
	function checkImage($file) {
		preg_match("/\<img.+?src=\"(.+?)\".+?\/>/", $file, $matches);
		if(count($matches)){
			return $matches[1];
		} else {return '';}
	}
	function FileExists($file) {
		if(file_exists($file))
		return true;
		else
		return false;
	}
	function introContent($str, $limit = 100,$end_char = '&#8230;'){
		if (trim($str) == '') return $str;
		// always strip tags for text
		$str = strip_tags($str);
		preg_match('/\s*(?:\S*\s*){'.(int)$limit.'}/', $str, $matches);
		if (strlen($matches[0]) == strlen($str))$end_char = '';
		return rtrim($matches[0]).$end_char;
	}
	/*
	 * Function create thumbnail of image in content
	 * @Created by joomvision
	 */
	function getThumb($text, $tWidth,$tHeight, $reflections=false,$id=0,$isComp='com_content'){
		preg_match("/\<img.+?src=\"(.+?)\".+?\/>/", $text, $matches);
		$paths = array();
		$showbug = true;
		if (isset($matches[1])) {
			$image_path = $matches[1];
			//joomla 1.5 only
			$isInternalLink = $this->isInternalLink($image_path);
			if(!$isInternalLink) {
				$path_parts = pathinfo($image_path);
				$imgName = $path_parts['basename'];
				$internalLink = JPATH_BASE.DS."images".DS."stories".DS."thumbs".DS."externallink".DS.$imgName;
				$this->saveImage($internalLink,$image_path);
				$image_path = "images/stories/thumbs/externallink/".$imgName;
			} else {
				if(!$this->FileExists($image_path)) return '';
			}
			// create a thumb filename
			$file_div = strrpos($image_path,'.');
			$thumb_ext = substr($image_path, $file_div);
			$thumb_prev = substr($image_path, 0, $file_div);
			$thumb_path = '';
			$thumb_path = 'images/stories/thumbs/'.$isComp.'/'.$id.'/jvpiecemaker_'.$tWidth.'x'.$tHeight.$thumb_ext;
			if(file_exists($thumb_path)) @unlink($thumb_path);
			// check to see if this file exists, if so we don't need to create it
			if ($thumb_path !='' && function_exists("gd_info") && !file_exists($thumb_path)) {
				// file doens't exist, so create it and save it
				include_once('thumbnail.inc.php');
				$thumb = new ZTThumbnail($image_path);
				if ($thumb->error) {
					if ($showbug)   echo "JV Image ERROR: " . $thumb->errmsg . ": " . $image_path;
					return false;
				}
				//$thumb->resize($size);
				$thumb->resize_image($tWidth,$tHeight);
				if ($reflections) {
					$thumb->createReflection(30,30,60,false);
				}
				if (!is_writable(dirname($thumb_path))) {
					$thumb->destruct();
					return false;
				}
				$thumb->save($thumb_path);
				$thumb->destruct();
			}
			return ($thumb_path);
		} else {
			return false;
		}
	}
	//End create thumbnail
	
	/*
	 * Function check image is internal link or external link
	 * @Created by joomlavision
	 */
	function isInternalLink($image_path){
		$full_url = JURI::base();
		//remove any protocol/site info from the image path
		$parsed_url = parse_url($full_url);
		$paths[] = $full_url;
		if (isset($parsed_url['path']) && $parsed_url['path'] != "/") $paths[] = $parsed_url['path'];
		foreach ($paths as $path) {
			if (strpos($image_path,$path) !== false) {
				$image_path = substr($image_path,strpos($image_path, $path)+strlen($path));
			}
		}			
		// remove any / that begins the path
		if (substr($image_path, 0 , 1) == '/') $image_path = substr($image_path, 1);
		//if after removing the uri, still has protocol then the image
		//is remote and we don't support thumbs for external images
		if (strpos($image_path,'http://') !== false || strpos($image_path,'https://') !== false) { 
			return false;
		} 
		return true;
			
	}
	//End check image
	
	/*
	 * Function get items to show slideshow
	 * @Created by joomlavision
	 */
	function getSlideContent(){
		global $mainframe;
		$db         =& JFactory::getDBO();
		$user       =& JFactory::getUser();
		$userId     = (int) $user->get('id');

		$categories = ( array )$this->params->get('categories',array());
		if(count($categories)){
			$strCatId = implode(',',$categories);
			$categoriesCondi = " AND cc.id IN ($strCatId)";
		}
		$intro_length = intval($this->params->get( 'intro_length', 50) );
		//$count      = (int) $params->get('count', 0);
		$count = $this->params->get('no_items');		
		$aid        = $user->get('aid', 0);	
		$thumbWidth = $this->params->get('module_width');
		$thumbHeight = $this->params->get('module_height');			

		$contentConfig = &JComponentHelper::getParams( 'com_content' );
		$access     = !$contentConfig->get('shownoauth');
		$nullDate   = $db->getNullDate();

		$date =& JFactory::getDate();
		$now = $date->toMySQL();
		$where      = 'a.state = 1'
		. ' AND ( a.publish_up = '.$db->Quote($nullDate).' OR a.publish_up <= '.$db->Quote($now).' )'
		. ' AND ( a.publish_down = '.$db->Quote($nullDate).' OR a.publish_down >= '.$db->Quote($now).' )'
		;
		// Ordering
		$orderBy = $this->params->get('ordering');
		$ordering = 'a.'.$orderBy.' '.$this->params->get('sort_order');		
		// Content Items only
		$query = 'SELECT a.*,a.id as key1, cc.id as key2, cc.title as cat_title, ' .
            ' CASE WHEN CHAR_LENGTH(a.alias) THEN CONCAT_WS(":", a.id, a.alias) ELSE a.id END as slug,'.
            ' CASE WHEN CHAR_LENGTH(cc.alias) THEN CONCAT_WS(":", cc.id, cc.alias) ELSE cc.id END as catslug'.
            ' FROM #__content AS a' .             
            ' INNER JOIN #__categories AS cc ON cc.id = a.catid' .
            ' INNER JOIN #__sections AS s ON s.id = a.sectionid' .
            ' WHERE '. $where .' AND s.id > 0' .
		($access ? ' AND a.access <= ' .(int) $aid. ' AND cc.access <= ' .(int) $aid. ' AND s.access <= ' .(int) $aid : '').
		(count($categories) ? $categoriesCondi:'').
            ' AND s.published = 1' .
            ' AND cc.published = 1' .
            ' ORDER BY '. $ordering;
		$db->setQuery($query, 0, $count);
		$rows = $db->loadObjectList();
		if(count($rows)){
			$i      = 0;
			$lists  = array();
			$article_count = count($rows);
			foreach ( $rows as $row ){
				$imageurl = $this->checkImage($row->introtext);
				$folderImg = DS.$row->id;
				$lists[$i]->thumb_diff = '';
				$lists[$i]->thumb = '';
				$this->createdDirThumb('com_content',$folderImg);
				$lists[$i]->title = $row->title;
				$lists[$i]->alias = $row->alias;
				$lists[$i]->link = JRoute::_(ContentHelperRoute::getArticleRoute($row->slug, $row->catslug, $row->sectionid));
				$lists[$i]->introtext = $this->introContent($row->introtext, $intro_length);		
				if($this->checkImage($row->introtext)) $lists[$i]->thumb = $this->getThumb($row->introtext, $thumbWidth,$thumbHeight,false,$row->id,'com_content');				
				$i++;
			}
		}
		return $lists;
	}
	//End get list of items
	
	/*
	 * Function write data into xml file
	 * @Created by joomlavision
	 */
	function writeXmlFile(){
		$listContents = $this->getSlideContent();//Get slide contents
		$moduleWidth = $this->params->get('module_width');
		$moduleHeight = $this->params->get('module_height');
		$noSlices = $this->params->get('no_slices');
		$tweenTime = $this->params->get('tween_time');
		$tweenDelay = $this->params->get('tween_delay');
		$tweenType = $this->params->get('tween_type');
		$zDistance = $this->params->get('zDistance');
		$expand = $this->params->get('expand');
		$innerColor =  str_replace('#','',$this->params->get('expand'));
		$textBackground =  str_replace('#','',$this->params->get('innerColor'));
		$shadowDarkness =  $this->params->get('shadowDarkness');
		$textDistance =  $this->params->get('textDistance');
		$autoplay = $this->params->get('autoplay',0);
		if(count($listContents)){
			//Render tag <settings>
			$xml = <<<EOP
<?xml version="1.0" encoding="utf-8"?>
<Piecemaker>
  <Settings>
    <imageWidth>$moduleWidth</imageWidth>
    <imageHeight>$moduleHeight</imageHeight>
    <segments>$noSlices</segments>
    <tweenTime>$tweenTime</tweenTime>
    <tweenDelay>$tweenDelay</tweenDelay>
    <tweenType>$tweenType</tweenType>
    <zDistance>$zDistance</zDistance>
    <expand>$expand</expand>
    <innerColor>0x$innerColor</innerColor>
    <textBackground>0x$textBackground</textBackground>
    <shadowDarkness>$shadowDarkness</shadowDarkness>
    <textDistance>$textDistance</textDistance>
    <autoplay>$autoplay</autoplay>
  </Settings>

EOP;
		foreach($listContents as $item){
			if($this->params->get('show_description') == 1) {
					$xml .= <<<EOQ
  <Image Filename="$item->thumb">
    <Text>
  		 <headline>$item->title</headline>
  		 <break>Ӂ</break>
  		 <paragraph>$item->introtext</paragraph>  		 
    </Text>
  </Image>

EOQ;
			} else {
			$xml .= <<<EOQ
  <Image Filename="$item->thumb">
    <Text>
  		
    </Text>
  </Image>

EOQ;
		}
		}
		$xml.='</Piecemaker>';
		if($this->xmlFile){
			if(JFile::write($this->xmlFile,$xml)) return true;
			else {
				echo 'Write file error';
			}
		}
	}
	}
	//End write data into xml file
}
?>