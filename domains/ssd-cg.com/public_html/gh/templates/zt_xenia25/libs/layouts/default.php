<?php
/**
 * @copyright	Copyright (C) 2008 - 2011 ZooTemplate.com. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>">
<head>
<jdoc:include type="head" />
<?php JHTML::_('behavior.mootools'); ?>
	<?php
		$document = JFactory::getDocument();
		$document->addStyleSheet($ztTools->baseurl() . 'templates/system/css/system.css');
		$document->addStyleSheet($ztTools->baseurl() . 'templates/system/css/general.css');
		$document->addStyleSheet($ztTools->templateurl() . 'css/default.css');
		$document->addStyleSheet($ztTools->templateurl() . 'css/template.css');
		$document->addStyleSheet($ztTools->templateurl() . 'css/k2.css');
		$document->addStyleSheet($ztTools->templateurl() . 'css/k2.print.css');
		$document->addStyleSheet($ztTools->templateurl() . 'css/patterns.css');
		
		if($ztrtl == 'rtl') {
			$document->addStyleSheet($ztTools->templateurl() . 'css/template_rtl.css');
			$document->addStyleSheet($ztTools->templateurl() . 'css/typo_rtl.css');
		} else {
			$document->addStyleSheet($ztTools->templateurl() . 'css/typo.css');
		}
		
		if($ztTools->getParam('zt_fontfeature')) {
			$document->addStyleSheet($ztTools->templateurl() . 'css/fonts.css');
		}
		
		if($this->params->get('zt_change_color')) {
			$document->addStyleSheet($ztTools->templateurl() . 'css/rainbow.css');
			$document->addScript($ztTools->templateurl() . 'js/rainbow.js');
			$document->addScript($ztTools->templateurl() . 'js/ladypop.js');
			$document->addScript($ztTools->templateurl() . 'js/lazyEffects.js');
		}

		$document->addScript($ztTools->templateurl() . 'js/zt.script.js');
	?>
	<link href='http://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo $ztTools->templateurl(); ?>css/modules.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $ztTools->templateurl(); ?>css/css3.php?url=<?php echo $ztTools->templateurl(); ?>" type="text/css" />
	<!--[if lte IE 6]>
	<link rel="stylesheet" href="<?php echo $ztTools->templateurl(); ?>css/ie6.css" type="text/css" />
	<script type="text/javascript" src="<?php echo $ztTools->templateurl() ?>js/ie_png.js"></script>
	<script type="text/javascript">
	window.addEvent ('load', function() {
	   ie_png.fix('.png');
	});
	</script>
	<![endif]-->
	<!--[if lte IE 7]>
	<link rel="stylesheet" href="<?php echo $ztTools->templateurl(); ?>css/ie7.css" type="text/css" />
	<![endif]-->

<?php
	include_once (dirname(__FILE__).DS.'header.php');
?>


</head>
<body id="bd" class="fs<?php echo $ztTools->getParam('zt_font'); ?> <?php echo $ztrtl; ?> <?php echo $ztTools->getPageClassSuffix(); ?> clearfix <?php echo $ztTools->getParamsValue($prefix, 'image', 'bd');?>">
<div id="zt-wrapper">
	<div id="zt-wrapper-inner">
		<!--#begin Header-->
		<div id="zt-header" class="clearfix">
			<div class="zt-wrapper">
				<div id="zt-header-inner">

					<div id="zt-logo">
						<h1 class="zt-logo"><a class="png" href="<?php echo $ztTools->baseurl() ; ?>" title="<?php echo $ztTools->sitename(); ?>">
							<span><?php echo $ztTools->sitename() ; ?></span></a>
						</h1>
					</div>

					<div id="zt-mainmenu">
						<div id="zt-mainmenu-inner">
							<?php $menu->show(); ?>
						</div>
					</div>

				</div>	
			</div>	
		</div>	
		<!--#end Header-->

		<?php if($this->countModules('slideshow')) : ?>							
		<div id="zt-slideshow" class="clearfix <?php echo $ztTools->getParamsValue($prefix, 'image', 'zt-slideshow');?>">
			<div class="zt-slideshow-wrapper">
				<div id="zt-slideshow-inner">
					<jdoc:include type="modules" name="slideshow" />
				</div>
			</div>
		</div>
		<?php endif; ?>

		<?php
		$spotlight = array ('user1','user2','user3','user4');
		$consl = $ztTools->calSpotlight($spotlight,$ztTools->isOP()?100:100,'%');
		if( $consl) :
		?>
		<!--#Begin User 2-->
		<div id="zt-userwrap1" class="clearfix">
			<div class="zt-wrapper">
				<div id="zt-userwrap1-inner">
					
					<?php if($this->countModules('user1')) : ?>
					<div id="zt-user1" class="zt-user zt-box<?php echo $consl['user1']['class']; ?>" style="width: <?php echo $consl['user1']['width']; ?>;">
						<div class="zt-box-inside">
							<jdoc:include type="modules" name="user1" style="ztxhtml" />
						</div>
					</div>
					<?php endif; ?>
					
					<?php if($this->countModules('user2')) : ?>
					<div id="zt-user2" class="zt-user zt-box<?php echo $consl['user2']['class']; ?>" style="width: <?php echo $consl['user2']['width']; ?>;">
						<div class="zt-box-inside">
							<jdoc:include type="modules" name="user2" style="ztxhtml" />
						</div>
					</div>
					<?php endif; ?>
					
					<?php if($this->countModules('user3')) : ?>
					<div id="zt-user3" class="zt-user zt-box<?php echo $consl['user3']['class']; ?>" style="width: <?php echo $consl['user3']['width']; ?>;">
						<div class="zt-box-inside">
							<jdoc:include type="modules" name="user3" style="ztxhtml" />
						</div>
					</div>
					<?php endif; ?>
					
					<?php if($this->countModules('user4')) : ?>
					<div id="zt-user4" class="zt-user zt-box<?php echo $consl['user4']['class']; ?>" style="width: <?php echo $consl['user4']['width']; ?>;">
						<div class="zt-box-inside">
							<jdoc:include type="modules" name="user4" style="ztxhtml" />
						</div>
					</div>
					<?php endif; ?>
					
				</div>
			</div>
		</div>
		<!--#end User 1-->
		<?php  endif; ?>


		<!-- #Main -->
		<div id="zt-mainframe" class="clearfix <?php echo $ztTools->getPageClassSuffix(); ?>">
			<div class="zt-wrapper">
				<div id="zt-mainframe-inner">

					<div id="zt-container<?php echo $zt_width; ?>" class="clearfix zt-layout<?php echo $ztTools->getParam('zt_layout'); ?>">
							
							<?php if($this->countModules('left')) : ?>
							<div id="zt-left">
								<div id="zt-left-inner">
									<div class="box-t">
										<div class="box-t-l"></div>
										<div class="box-t-r"></div>
										<div class="clearfix"></div>
									</div>

									<div class="box-c-l">
										<div class="box-c-r">
											<div class="box-c">
												<div class="box-c-c">
													<jdoc:include type="modules" name="left" style="ztxhtml" />
												</div>
											</div>
										</div>
										<div class="clearfix"></div>
									</div>

									<div class="box-b">
										<div class="box-b-l"></div>
										<div class="box-b-r"></div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							<?php endif; ?>
							
							<div id="zt-content">
								<div id="zt-content-inner">

									<?php if($this->countModules('breadcrumb')) : ?>
									<!-- Breadcrumb -->
									<div id="zt-breadcrumbs" class="clearfix">
										<div id="zt-breadcrumbs-inner">
											<jdoc:include type="modules" name="breadcrumb" />
										</div>
									</div>
									<!-- #Breadcrumb -->
									<?php endif ; ?>
									
									<div id="zt-component" class="clearfix">
										<div id="zt-component-inner">
											<jdoc:include type="message" />
											<jdoc:include type="component" />
										</div>
									</div>
									
									
									<?php if($this->countModules('col1')) : ?>
									<div id="zt-col1" class="zt-user">
										<div class="zt-box-inside">
											<jdoc:include type="modules" name="col1" style="ztxhtml" />
										</div>
									</div>
									<?php endif; ?>
									
								</div>
							</div>

							<?php if($this->countModules('right')) : ?>
							<div id="zt-right">
								<div id="zt-right-inner">
									<div class="box-t">
										<div class="box-t-l"></div>
										<div class="box-t-r"></div>
										<div class="clearfix"></div>
									</div>

									<div class="box-c-l">
										<div class="box-c-r">
											<div class="box-c">
												<div class="box-c-c">
													<jdoc:include type="modules" name="right" style="ztxhtml" />
												</div>
											</div>
										</div>
										<div class="clearfix"></div>
									</div>

									<div class="box-b">
										<div class="box-b-l"></div>
										<div class="box-b-r"></div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							<?php endif; ?>
							
							<?php
							$spotlight1 = array ('col2','col3','col4','col5');
							$consl1 = $ztTools->calSpotlight($spotlight1,$ztTools->isOP()?100:100,'%');
							if( $consl1) :
							?>	
							<!--#Begin Spotlight Col 1-->
							<div id="zt-colspan1" class=" clearfix">
								<div id="zt-colspan1-inner">
								
									<?php if($this->countModules('col2')) : ?>
									<div id="zt-col2" class="zt-user zt-box<?php echo $consl1['col2']['class']; ?>" style="width: <?php echo $consl1['col2']['width']; ?>;">
										<div class="zt-box-inside">
											<jdoc:include type="modules" name="col2" style="ztxhtml" />
										</div>
									</div>
									<?php endif; ?>
									
									<?php if($this->countModules('col3')) : ?>
									<div id="zt-col3" class="zt-user zt-box<?php echo $consl1['col3']['class']; ?>" style="width: <?php echo $consl1['col3']['width']; ?>;">
										<div class="zt-box-inside">
											<jdoc:include type="modules" name="col3" style="ztxhtml" />
										</div>
									</div>
									<?php endif; ?>
									
									<?php if($this->countModules('col4')) : ?>
									<div id="zt-col4" class="zt-user zt-box<?php echo $consl1['col4']['class']; ?>" style="width: <?php echo $consl1['col4']['width']; ?>;">
										<div class="zt-box-inside">
											<jdoc:include type="modules" name="col4" style="ztxhtml" />
										</div>
									</div>
									<?php endif; ?>
									
									<?php if($this->countModules('col5')) : ?>
									<div id="zt-col5" class="zt-user zt-box<?php echo $consl1['col5']['class']; ?>" style="width: <?php echo $consl1['col5']['width']; ?>;">
										<div class="zt-box-inside">
											<jdoc:include type="modules" name="col5" style="ztxhtml" />
										</div>
									</div>
									<?php endif; ?>
									
								</div>
							</div>
							<!--#end Spotlight Col 1-->		
							<?php endif; ?>	
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- #End Main -->

		<?php
		$spotlight2 = array ('user5','user6');
		$consl2 = $ztTools->calSpotlight($spotlight2,$ztTools->isOP()?100:100,'%');
		if( $consl2) :
		?>
		<!--#Begin User 4-->
		<div id="zt-userwrap2" class="clearfix">
			<div class="zt-wrapper">
				<div id="zt-userwrap2-inner">
				
					<?php if($this->countModules('user5')) : ?>
					<div id="zt-user5" class="zt-user zt-box<?php echo $consl2['user5']['class']; ?>" style="width: <?php echo $consl2['user5']['width']; ?>;">
						<div class="zt-box-inside">
							<jdoc:include type="modules" name="user5" style="ztxhtml" />
						</div>
					</div>
					<?php endif; ?>
					
					<?php if($this->countModules('user6')) : ?>
					<div id="zt-user6" class="zt-user zt-box<?php echo $consl2['user6']['class']; ?>" style="width: <?php echo $consl2['user6']['width']; ?>;">
						<div class="zt-box-inside">
							<jdoc:include type="modules" name="user6" style="ztxhtml" />
						</div>
					</div>
					<?php endif; ?>
					
				</div>
			</div>
		</div>
		<!--#end User 4-->
		<?php endif; ?>	

		<?php
		$spotlight3 = array ('user7','user8','user9','user10');
		$consl3 = $ztTools->calSpotlight($spotlight3,$ztTools->isOP()?100:100,'%');
		if( $consl3) :
		?>
		<!--#Begin User 5-->
		<div id="zt-userwrap3" class="clearfix">
			<div class="zt-wrapper">
				<div id="zt-userwrap3-inner">
				
					<?php if($this->countModules('user7')) : ?>
					<div id="zt-user7" class="zt-user zt-box<?php echo $consl3['user7']['class']; ?>" style="width: <?php echo $consl3['user7']['width']; ?>;">
						<div class="zt-box-inside">
							<jdoc:include type="modules" name="user7" style="ztxhtml" />
						</div>
					</div>
					<?php endif; ?>
					
					<?php if($this->countModules('user8')) : ?>
					<div id="zt-user8" class="zt-user zt-box<?php echo $consl3['user8']['class']; ?>" style="width: <?php echo $consl3['user8']['width']; ?>;">
						<div class="zt-box-inside">
							<jdoc:include type="modules" name="user8" style="ztxhtml" />
						</div>
					</div>
					<?php endif; ?>
					
					<?php if($this->countModules('user9')) : ?>
					<div id="zt-user9" class="zt-user zt-box<?php echo $consl3['user9']['class']; ?>" style="width: <?php echo $consl3['user9']['width']; ?>;">
						<div class="zt-box-inside">
							<jdoc:include type="modules" name="user9" style="ztxhtml" />
						</div>
					</div>
					<?php endif; ?>
					
					<?php if($this->countModules('user10')) : ?>
					<div id="zt-user10" class="zt-user zt-box<?php echo $consl3['user10']['class']; ?>" style="width: <?php echo $consl3['user10']['width']; ?>;">
						<div class="zt-box-inside">
							<jdoc:include type="modules" name="user10" style="ztxhtml" />
						</div>
					</div>
					<?php endif; ?>
					
				</div>
			</div>
		</div>
		<!--#end User 5-->
		<?php endif; ?>
		
		<?php
		$spotlight4 = array ('user11','user12');
		$consl2 = $ztTools->calSpotlight($spotlight4,$ztTools->isOP()?100:100,'%');
		if( $consl2) :
		?>
		<!--#Begin User 4-->
		<div id="zt-userwrap4" class="clearfix">
			<div class="zt-wrapper">
				<div id="zt-userwrap4-inner">
				
					<?php if($this->countModules('user11')) : ?>
					<div id="zt-user11" class="zt-user zt-box<?php echo $consl2['user11']['class']; ?>" style="width: <?php echo $consl2['user11']['width']; ?>;">
						<div class="zt-box-inside">
							<jdoc:include type="modules" name="user11" style="ztxhtml" />
						</div>
					</div>
					<?php endif; ?>
					
					<?php if($this->countModules('user12')) : ?>
					<div id="zt-user12" class="zt-user zt-box<?php echo $consl2['user12']['class']; ?>" style="width: <?php echo $consl2['user12']['width']; ?>;">
						<div class="zt-box-inside">
							<jdoc:include type="modules" name="user12" style="ztxhtml" />
						</div>
					</div>
					<?php endif; ?>
					
				</div>
			</div>
		</div>
		<!--#end User 4-->
		<?php endif; ?>	

		<!-- footer -->
		<div id="zt-footer" class="clearfix <?php echo $ztTools->getParamsValue($prefix, 'image', 'zt-footer');?>">
			<div class="zt-wrapper">
				<div id="zt-footer-inner">	
					<div id="zt-copyright">
						
						<?php if($this->countModules('footer-menu')) : ?>
							<div id="zt-footer-menu">	
								<jdoc:include type="modules" name="footer-menu" />
							</div>		
						<?php endif; ?>
						
						<?php if($ztTools->getParam('zt_footer')) : ?>
						<?php echo $ztTools->getParam('zt_footer_text'); ?>
						<?php else : ?>
						کپی رایت &copy; <?php echo Date('Y');?> <a href="http://www.P30Template.com" title="قالب های جوملا">پی سی تمپلیت</a> بهینه و فارسی سازی قالبهای حرفه ای جوملا.
						<?php endif; ?>
					</div>
					
					<?php if($this->countModules('footer')) : ?>
					<div id="ztbacktotop">	
						<jdoc:include type="modules" name="footer" />
					</div>		
					<?php endif; ?>	
				</div>
			</div>
		</div>		
		<!-- #footer -->

	</div>
</div>

<jdoc:include type="modules" name="debug" />
<?php
	if($this->params->get('zt_change_color')) {
		include_once (dirname(__FILE__).DS.'footer.php');
	}
?>
</body>
</html>