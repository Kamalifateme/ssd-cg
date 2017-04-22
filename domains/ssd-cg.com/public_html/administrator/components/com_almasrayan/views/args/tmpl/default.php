<?php
/**
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
		echo "<pre>";
		print_r($_POST);
		echo "</pre>";
 */
// no direct access
defined('_JEXEC') or die;
	JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
	global $option,$compconfig;
	$css = JURI::root()."components/$option/css/css.css";
	JHtml::_("stylesheet",$css);
	$listOrder	= $this->escape($this->state->get('list.ordering'));
	$listDirn	= $this->escape($this->state->get('list.direction'));
	$saveOrder	= $listOrder == 'ordering';
	if ($saveOrder)
	{
		$saveOrderingUrl = "index.php?option=$option&task=args.saveOrderAjax&tmpl=component";
		JHtml::_('sortablelist.sortable', 'articleList', 'adminForm', strtolower($listDirn), $saveOrderingUrl);
	}
	$views = "arg";
?>
<script language="javascript">
	//==========================================
	Joomla.submitbutton = function(pressbutton){
		if(pressbutton=="args.delete"){
				if(!confirm("<?php echo almasrayanController::LoadMessageConfirmRemove(JText::_($views)); ?>"))
				return false;
		}
		Joomla.submitform(pressbutton, document.getElementById('adminForm'));
	}
	Joomla.orderTable = function()
	{
		table = document.getElementById("sortTable");
		direction = document.getElementById("directionTable");
		order = table.options[table.selectedIndex].value;
		if (order != '<?php echo $listOrder; ?>')
		{
			dirn = 'asc';
		}
		else
		{
			dirn = direction.options[direction.selectedIndex].value;
		}
		Joomla.tableOrdering(order, dirn, '');
	}
</script>
	<form enctype="multipart/form-data" action="<?php echo JRoute::_('index.php?option=com_almasrayan&view=args'); ?>" method="post" name="adminForm" id="adminForm">
	<div id="j-main-container" class="span10 mycontainer">
		<fieldset id="filter-bar">
			<div class="filter-search fltlft">
				<label class="filter-search-lbl" for="filter_search"><?php echo JText::_('JSEARCH_FILTER_LABEL'); ?></label>
				<input type="text" name="filter_search" id="filter_search" value="<?php echo $this->escape($this->state->get('filter.search')); ?>" title="<?php echo JText::_('COM_MYSENDSMS_SEARCH_IN_TITLE'); ?>" />
				<?php echo $this->lists["published"];?>
				<button type="submit"><?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?></button>
				<button type="button" onclick="document.id('filter_search').value='';Joomla.submitform();"><?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?></button>
			</div>
		</fieldset>
		<div class="clearfix"> </div>
		<table class="table table-striped" id="articleList">
			<thead>
				<tr>
					<th width="1%" class="nowrap center hidden-phone">
						<?php echo JHtml::_('grid.sort', '<i class="icon-menu-2"></i>', 'ordering', $listDirn, $listOrder, null, 'asc', 'JGRID_HEADING_ORDERING'); ?></th>
					<th width="1%">
						<input type="checkbox" name="checkall-toggle" value="" title="<?php echo JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)" />
					</th>
					<th width="60"><?php echo JHtml::_('grid.sort','JSTATUS', 'published',$listDirn, $listOrder); ?></th>
					<th><?php echo JText::_("EDIT"); ?></th>
					<th><?php echo JText::_('JFIELD_ALIAS_LABEL'); ?></th>
					<th><?php echo JHtml::_('grid.sort','arg_name', 'name', $listDirn, $listOrder); ?></th>
					<th><?php echo JHtml::_('grid.sort','arg_famil', 'famil', $listDirn, $listOrder); ?></th>
					<th><?php echo JHtml::_('grid.sort','arg_mobile', 'mobile', $listDirn, $listOrder); ?></th>
					<th><?php echo JHtml::_('grid.sort','arg_email', 'email', $listDirn, $listOrder); ?></th>
					<th width="60" class="center"><?php echo JHtml::_('grid.sort','JGRID_HEADING_ID', 'id', $listDirn, $listOrder); ?></th>
				</tr>
			</thead>
	
			<tfoot>
				<tr>
					<td colspan="20">
						<?php echo $this->pagination->getListFooter(); ?>
					</td>
				</tr>
			</tfoot>
			<tbody>
			<?php foreach ($this->items as $i => $item) :
				?>
				<tr class="row<?php echo $i % 2; ?>">
					<td class="order nowrap center hidden-phone">
					<?php
						$disableClassName = '';
						$disabledLabel	  = '';
						if (!$saveOrder) :
							$disabledLabel    = JText::_('JORDERINGDISABLED');
							$disableClassName = 'inactive tip-top';
						endif; ?>
						<span class="sortable-handler hasToolTip <?php echo $disableClassName?>" title="<?php echo $disabledLabel?>">
							<i class="icon-menu"></i>
						</span>
						<input type="text" style="display:none;" name="order[]" size="5"
							value="<?php echo $item->ordering;?>" class="width-20 text-area-order " />
					</td>
					<td class="center"><?php echo JHtml::_('grid.id', $i, $item->id); ?></td>
					<td class="center"><?php echo JHtml::_('jgrid.published', $item->published, $i, 'args.', 1);?></td>
					<td><a href="<?php echo JRoute::_('index.php?option=com_almasrayan&task=arg.edit&id='.(int) $item->id); ?>"><?php echo JText::_("EDIT"); ?></a></td>
					<td><?php echo $item->alias;?></td>
					<td><?php echo $item->name;?></td>
					<td><?php echo $item->famil;?></td>
					<td><?php echo almasrayanController::Comma($item->mobile);?></td>
					<td><?php echo $item->email;?></td>
					<td class="center"><?php echo $item->id; ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<div>
			<input type="hidden" name="task" value="" />
			<input type="hidden" name="boxchecked" value="0" />
			<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
			<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
			<?php echo JHtml::_('form.token'); ?>
		</div>
	
	</div>
	</form>
