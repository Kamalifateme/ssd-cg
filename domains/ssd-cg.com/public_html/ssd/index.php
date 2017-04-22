<!DOCTYPE html>
<html dir="rtl" lang="fa-IR" style="margin-top: 0px!important;">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1.0" />
	<?php include("top.php"); ?>
<link href="<?php echo $path; ?>css/jquery.bxslider.css" rel="stylesheet" />

</head>

<body id="page-new" class=" home page page-id-424 page-template-default" style="direction:ltr">
<?php $page="&#1575;&#1582;&#1576;&#1575;&#1585; &#1608; &#1585;&#1608;&#1740;&#1583;&#1575;&#1583;&#1607;&#1575;"; ?>

<div class="container">
	<div id="page" class="hfeed site">

		<div class="navigation-toggler"><i></i></div>
		<?php include("aside.php"); ?>

	
		<div id="site-main">
		<div id="top" class="site-content" role="main">
		<section id="intro" style="padding-top:0px;">	

	<div class="entry-content" >
		<?php include("tophead.php"); ?>

	<div class="home-slider-wrapper">

             <ul class="bxslider" style="padding: 0px;">

				<?php
				mysql_query("SET CHARACTER SET utf8");   
				mysql_query("SET NAMES utf8_persian_ci");
				$ses_sql=mysql_query("select * from fx_slider") or die(mysql_error()) ;
				while ($row=mysql_fetch_array($ses_sql)) 
				{
				$slider=$row['slider'];
				$title=$row['title'];
				$link=$row['link'];
				?>
                  
                     <?php if($link=="") { ?>
                     <li style="margin:0px;padding:0px;"><center><img src="<?php echo $slider; ?>" title="<?php echo $title; ?>" /></center></li>
                      <?php } else { ?>
                     <li style="margin:0px;padding:0px;"><center><a href="<?php echo $link; ?>"><img src="<?php echo $slider; ?>" title="<?php echo $title; ?>" /></a><center>


</li>

				<?php }} ?>
					
                </ul>
</div>
	
	
	
	
		<div class="cols-2" style="margin-top:-20px;">		
		
		<div class="col">
			<div class="box" style="height:270px">
			<div class="title">&#1575;&#1582;&#1576;&#1575;&#1585; &#1705;&#1587;&#1576; &#1608; &#1705;&#1575;&#1585;</div>
				<?php
				mysql_query("SET CHARACTER SET utf8");   
				mysql_query("SET NAMES utf8_persian_ci");
				$ses_sql=mysql_query("select * from fx_newsk order by id DESC LIMIT 3") or die(mysql_error()) ;
				while ($row=mysql_fetch_array($ses_sql)) 
				{
				$title=$row['title'];
				$url=$row['url'];
				?>
<center>

			<div style="display:list-item;list-style-type:disc;width:95%;text-align:right"><a href="<?php echo $url; ?>" target="_blank" style="font-family:BTraffic;color:#000;display:block;padding-top:5px;padding-bottom:5px;"><?php echo $title; ?> </a></div>
	</center>			
<?php } ?>			
					<a target="_blank" href="<?php echo $path; ?>newsall2" style="color:#a73b87;font-family:BTraffic">&#1606;&#1605;&#1575;&#1740;&#1588; &#1578;&#1605;&#1575;&#1605; &#1575;&#1582;&#1576;&#1575;&#1585;</a>

				</div>

		</div>	
		
		<div class="col">
			<div class="box">
			<div class="title">&#1575;&#1582;&#1576;&#1575;&#1585; SSD</div>
				<?php
				mysql_query("SET CHARACTER SET utf8");   
				mysql_query("SET NAMES utf8_persian_ci");
				$ses_sql=mysql_query("select * from fx_blog where title_sub='1' LIMIT 3") or die(mysql_error()) ;
				while ($row=mysql_fetch_array($ses_sql)) 
				{
				$title=$row['title'];
				$url=$row['url'];$date_a=$row['date_a'];
				?>
<center>
			<div style="display:list-item;list-style-type:disc;width:95%;text-align:right"><a href="<?php echo $path; ?>news/<?php echo $url; ?>" style="color:#000;display:block;padding-top:5px;padding-bottom:5px;font-family:BTraffic"><?php echo $title; ?> <span style="font-size:9pt;color:#afafaf;font-family:BTraffic"><?php echo $date_a; ?></span></a></div>
	</center>			
<?php } ?>
				<a href="<?php echo $path; ?>newsall" style="color:#a73b87;font-family:BTraffic">&#1606;&#1605;&#1575;&#1740;&#1588; &#1578;&#1605;&#1575;&#1605; &#1575;&#1582;&#1576;&#1575;&#1585;</a>
			</div>

		</div>

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
        <script src="<?php echo $path; ?>js/jquery.bxslider.min.js"></script>
        <script>
$('.bxslider').bxSlider({
  auto: true,
  autoControls: true
});
         </script>
</body>
</html>