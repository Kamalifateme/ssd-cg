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
$doc = &JFactory::getDocument();
$doc->addStyleSheet('modules/mod_accordian_frontpage_core/css/style.css');
JHTML::_('behavior.mootools');
?>
<?php //Params
$separator_author 	= $params->get( 'title_author', ' | ' ) ;
$layout_style		= $params->get( 'layout_style', 0 );
//$fulllink			= $params->get( 'fulllink', '+Read News...' );
$full_link			= $params->get( 'fulllink', 1 );
?>
<script type="text/javascript">
	window.addEvent('domready', function(){
		new Accordion('h3.atStart', 'div.atStart', {
			opacity: <?php echo($params->get('transparent_slide')==1?"true":"false"); ?>,
			duration: <?php echo($params->get('moo_duration', 200)); ?>,
			transition: Fx.Transitions.<?php echo($params->get('moo_transition', 'Expo.easeOut')); ?>,
			<?php if($params->get('start_transition')==1) :?>
			display: <?php echo($params->get('start_open')); ?>,
			<?php else: ?>
			show: <?php echo($params->get('start_open')); ?>,
			<?php endif; ?>
			onActive: function(toggler, element){
				toggler.addClass('toggle-hilite');
			},
			onBackground: function(toggler, element){
				toggler.removeClass('toggle-hilite');
			}
		});
});
</script>

<div id="accordian" class="corenews<?php echo $params->get('moduleclass_sfx'); ?>">
<?php foreach ($list as $item) :  ?>
		<h3 class="toggler atStart bg<?php echo ($counter)%2; ?>">
		
		<?php if(!$params->get('title_as_link')) { ?>
			<?php echo $item->title; ?>
		<?php } else { ?>
			<a href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a>
		<?php } ?>
		</h3>
		<div class="element atStart bg<?php echo ($counter++)%2; ?>">
			<?php if (($params->get('show_author')) || ($params->get('show_date'))) {?>
				<span class="dateauthor">
				<?php if ($params->get('show_date')) {?>
					<?php echo $item->created; ?>
				<?php } ?>
				<?php if ($layout_style=="1") {?><br/><?php } ?>
				<?php if ($params->get('show_author')) {?>
					<?php echo $separator_author; ?> <?php echo $item->name; ?>
				<?php } ?>
				</span>
			<?php } ?>
			<?php if($params->get('full_link')) { ?>
				<span class="corecontent"><?php echo ($item->introtext . '... <a href="'.$item->link.'">'.$item->linkText.'</a><br/><br/>'); ?></span>
			<?php } else { ?>
				<span class="corecontent"><?php echo ($item->introtext) .'<br/><br/>' ; ?></span>
				<?php } ?>
		</div>
<?php endforeach; ?>
</div>