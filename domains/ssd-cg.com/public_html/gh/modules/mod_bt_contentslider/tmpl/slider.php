<?php
/**
 * @package 	mod_bt_contentslider - BT ContentSlider Module
 * @version		1.4
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

$nav_top = (-1)*(int)$params->get( 'navigation_top', 0 );
$nav_right = (-1)*(int)$params->get( 'navigation_right', 0 ) + 5;
?>
<script type="text/javascript">	
	if(typeof(btcModuleIds)=='undefined'){var btcModuleIds = new Array();var btcModuleOpts = new Array();}
	btcModuleIds.push(<?php echo $module->id; ?>);
	btcModuleOpts.push({
			slideEasing : '<?php echo $slideEasing; ?>',
			fadeEasing : '<?php echo $slideEasing; ?>',
			effect: '<?php echo $effect; ?>',
			preloadImage: '<?php echo $preloadImg; ?>',
			generatePagination: <?php echo $paging ?>,
			play: <?php echo $play; ?>,						
			hoverPause: <?php echo $hoverPause; ?>,	
			slideSpeed : <?php echo $duration; ?>,
			autoHeight:<?php echo $autoHeight ?>,
			fadeSpeed : <?php echo $fadeSpeed ?>,
			equalHeight:<?php echo $equalHeight; ?>,
			width: '<?php echo $moduleWidth; ?>',
			height: '<?php echo $moduleHeight; ?>',
			pause: 100,
			preload: true,
			paginationClass: 'bt_handles',
			generateNextPrev:false,
			prependPagination:true,
	});
	</script>
	<?php if(!$butlet) $totalPages = 0; ?>
	<?php if($butlet || $next_back) { ?>
	<style>
		<?php if(abs($nav_top) == 0 &&  trim($params->get('content_title') =="" )){ ?>
		<?php echo $modid ; ?>{
			padding-top:32px;
		}
		<?php } ?>
		<?php echo $modid ; ?> .bt_handles{
			top:<?php echo $nav_top + 14 ?>px!important;
			right:<?php echo $nav_right ?>px!important;
		}
		<?php echo $modid ; ?> a.next{
			top:<?php echo $nav_top+12 ?>px!important;
			right:<?php echo $nav_right + 14 * $totalPages+5 ?>px!important;
		}
		<?php echo $modid ; ?> a.prev{
			top:<?php echo $nav_top + 12 ?>px!important;
			right:<?php echo $nav_right + 14 * $totalPages +19?>px!important;
		}
		<?php echo $modid ; ?> .bt_handles li{
			background:none;
			padding:0;
			margin:0 1px;
		} 
</style>
<?php } ?>
