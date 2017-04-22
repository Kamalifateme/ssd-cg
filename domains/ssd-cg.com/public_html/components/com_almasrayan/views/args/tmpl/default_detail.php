<?php
	// no direct access
	defined('_JEXEC') or die;
	global $config,$option;
	$item = $this->items[0];
	$app = JFactory::getApplication();
	$pathway = $app->getPathway();
	$pathway->addItem ( $item->name);
	$this->document->setTitle($item->name);
	JHtml::_('behavior.modal','.modal');
//===================================================================
	$css = "components/$option/css/detailuser.css";
	JHtml::_("stylesheet",$css);
//===================================================================
?>
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row-fluid">
			<div class="span12">
				<div class="h3 panel-title myright"><?php echo $item->name; ?></div>
			</div>
		</div>
	</div>
	<div class="panel-body">
		<div class="row-fluid">
						<div class="span3">
				
			</div>

			<div class="span9">
				<div class="margin5">
					
					<div><?php echo JText::_("arg_name");?> : <?php echo $item->name;?></div>
					<div><?php echo JText::_("arg_famil");?> : <?php echo $item->famil;?></div>
					<div><?php echo JText::_("arg_mobile");?> : <?php echo $item->mobile;?></div>
					<div><?php echo JText::_("arg_email");?> : <?php echo $item->email;?></div>
				</div>
			</div>
		</div>
	</div>
</div>