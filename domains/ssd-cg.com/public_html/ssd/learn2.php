<!DOCTYPE html>
<html dir="rtl" lang="fa-IR" style="margin-top: 0px!important;">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1.0" />
	<?php include("top.php"); ?>
</head>

<body id="page-new" class=" home page page-id-424 page-template-default" style="direction:ltr">
<?php $page="&#1583;&#1608;&#1585;&#1607; &#1607;&#1575;&#1740; &#1740;&#1575;&#1583;&#1711;&#1740;&#1585;&#1740;"; ?>

<div class="container">
	<div id="page" class="hfeed site">

		<div class="navigation-toggler"><i></i></div>
		<?php include("aside.php"); ?>

	
		<div id="site-main">
		<div id="top" class="site-content" role="main">
		<section id="intro" style="padding-top:0px;">	

	<div class="entry-content" >
		<?php include("tophead.php"); ?>
<br><br>
				<a href="<?php echo $path; ?>learning-courses" style="font-size:13pt;display:block;border-radius:6px;border:2px #fff solid;width:290px;text-align:center;padding:5px;">&#1576;&#1575;&#1586;&#1711;&#1588;&#1578; &#1576;&#1607; &#1583;&#1608;&#1585;&#1607; &#1607;&#1575;&#1740; &#1740;&#1575;&#1583;&#1711;&#1740;&#1585;&#1740;</a><br>

<div id="nestedAccordion">
				<?php
				$url=$_GET['url'];
				$a=(explode("/",$url));
				$url1=$a[0];
				$url2=$a[1];
				$url3=$a[2];

				mysql_query("SET CHARACTER SET utf8");   
				mysql_query("SET NAMES utf8_persian_ci");
				$ses_sql=mysql_query("select * from  fx_title2 where sub_title='$url2' ") or die(mysql_error()) ;
				while($row=mysql_fetch_array($ses_sql))
				{
				$sub_title=$row['sub_title'];
				$name=$row['name'];
				$id=$row['id'];

				?>
			<h2><?php echo $name; ?></h2>
				<div>
				<?php 
				$ses_sql2=mysql_query("select * from  fx_learning where title_sub='$id' ") or die(mysql_error()) ;
				while($row2=mysql_fetch_array($ses_sql2))
				{
				$description=$row2['description'];
				$name=$row2['name'];
				?>
					<h3><?php echo $name; ?></h3>
					<div>
					<?php echo $description; ?>	
					</div>
				<?php } ?>
					
				</div>
			<?php } ?>

		</div>



	</section>



	<?php include("menu.php"); ?>


	</div><!-- #page -->

		
	</div>
</div>

	<script type='text/javascript' src='<?php echo $path; ?>js/jquery.js'></script>
	<script type='text/javascript' src='<?php echo $path; ?>js/jquery-migrate.min.js'></script>
	<script type='text/javascript' src='<?php echo $path; ?>js/script.js'></script>
	<script type="text/javascript" src="<?php echo $path; ?>js/loader.js" async></script>
	<script src="<?php echo $path; ?>js/thumbnail-slider.js" type="text/javascript"></script>
	<script src="<?php echo $path; ?>js/ninja-slider.js" type="text/javascript"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		var parentDivs = $('#nestedAccordion div'),
		childDivs = $('#nestedAccordion h3').siblings('div');

		$('#nestedAccordion h2').click(function(){
			parentDivs.slideUp();
			if($(this).next().is(':hidden')){
				$(this).next().slideDown();
			}else{
				$(this).next().slideUp();
			}
		});
		$('#nestedAccordion h3').click(function(){
			childDivs.slideUp();
			if($(this).next().is(':hidden')){
				$(this).next().slideDown();
			}else{
				$(this).next().slideUp();
			}
		});
	});
	</script>
</body>
</html>