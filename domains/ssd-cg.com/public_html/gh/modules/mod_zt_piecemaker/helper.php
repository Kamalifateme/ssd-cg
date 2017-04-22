<?php
/**
 * @package ZT Piecemaker module for Joomla! 1.6
 * @author http://www.zootemplate.com
 * @copyright (C) 2011- ZooTemplate.Com
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/

jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');
require_once (JPATH_SITE.DS.'components'.DS.'com_content'.DS.'helpers'.DS.'route.php');
class ztPiecemakerHelper {
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
	 * @Created by zootemplate
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
				include_once(JPATH_BASE . DS . "modules" . DS . "mod_zt_piecemaker" . DS . "thumbnail.inc.php");
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
	 * @Created by zootemplate
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
		
		// Get the dbo
		$db = JFactory::getDbo();
		
		$thumbWidth = $this->params->get('module_width');
		$thumbHeight = $this->params->get('module_height');
		$intro_length = intval($this->params->get( 'intro_length', 50) );
		// Get an instance of the generic articles model
		$model = JModel::getInstance('Articles', 'ContentModel', array('ignore_request' => true));

		// Set application parameters in model
		$app = JFactory::getApplication();
		$appParams = $app->getParams();
		$model->setState('params', $appParams);

		// Set the filters based on the module params
		$model->setState('list.start', 0);
		$model->setState('list.limit', (int) $this->params->get('no_items', 10));
		$model->setState('filter.published', 1);

		// Access filter
		$access = !JComponentHelper::getParams('com_content')->get('show_noauth');	

		// Category filter
		$model->setState('filter.category_id', $this->params->get('catid', array())); 
		
		// Set ordering
        $orderBy = $this->params->get('ordering');
		$ordering = 'a.'.$orderBy.'';
		$model->setState('list.ordering', $ordering);
        $model->setState('list.direction', $this->params->get('sort_order'));
		
		$lists = array();
		$items = $model->getItems();
		if(count($items)){
			$i      = 0;
			
			$article_count = count($items);		
			foreach ( $items as $item ){
				$item->slug = $item->id.':'.$item->alias;
				$item->catslug = $item->catid.':'.$item->category_alias;
				$imageurl = $this->checkImage($item->introtext);
				$folderImg = DS.$item->id;
				$lists[$i]->thumb_diff = '';
				$lists[$i]->thumb = '';
				$this->createdDirThumb('com_content',$folderImg);			
				$lists[$i]->title = $item->title;
				$lists[$i]->alias = $item->alias;
				$lists[$i]->link = JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catslug));
				$lists[$i]->introtext = $this->introContent($item->introtext, $intro_length,'');					
				if($this->checkImage($item->introtext)) $lists[$i]->thumb = $this->getThumb($item->introtext,$thumbWidth,$thumbHeight,false,$item->id,'com_content');
				$i++;
			}		
		}

		return $lists;
	}
	//End get list of items
	
	/*
	 * Function write data into xml file
	 * @Created by zootemplate
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