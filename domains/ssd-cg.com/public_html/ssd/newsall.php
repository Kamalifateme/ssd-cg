<!DOCTYPE html>
<html dir="rtl" lang="fa-IR" style="margin-top: 0px!important;">
<head>
	<meta charset="UTF-8">
	<meta itemscope itemtype="http://schema.org/headline" itemprop="topOfsite" name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1.0" />
    <meta name="description" content="جدیدترین و آخرین تمام اخبار اقتصادی ssd | جدیدترین و آخرین تمام اخبار کسب و کار و کارآفرینی ssd | ssd" />
    <meta property="og:locale" content="fa_IR" />
<meta property="og:type" content="website" />
<meta property="og:title" content="جدیدترین و آخرین تمام اخبار اقتصادی ssd | جدیدترین و آخرین تمام اخبار کسب و کار و کارآفرینی ssd | ssd" />
<meta property="og:description" content="ما با تشکیل تیم های متخصص جهت مشاوره و آموزش در زمینه های مختلف مسائل سازمانی از مجموعه های صنفی و صنعتی کوچک تا صنایع بزرگ، با بالاترین کیفیت و تعهد در خدمت صاحبان کسب و کار هستیم." />
<meta property="og:image" content="../ssd/img/logo33.png" />
<meta property="og:site_name" content="ssd_cg" />
<meta name="telegram:description" content="ما با تشکیل تیم های متخصص جهت مشاوره و آموزش در زمینه های مختلف مسائل سازمانی از مجموعه های صنفی و صنعتی کوچک تا صنایع بزرگ، با بالاترین کیفیت و تعهد در خدمت صاحبان کسب و کار هستیم." />
<meta name="telegram:title" content="اخبار روز اقتصادی ssd |اخبار روز کسب و کار و کارآفرینی ssd" />
<meta name="instagram:description" content="ما با تشکیل تیم های متخصص جهت مشاوره و آموزش در زمینه های مختلف مسائل سازمانی از مجموعه های صنفی و صنعتی کوچک تا صنایع بزرگ، با بالاترین کیفیت و تعهد در خدمت صاحبان کسب و کار هستیم." />
<meta name="instagram:title" content="جدیدترین و آخرین تمام اخبار اقتصادی ssd | جدیدترین و آخرین تمام اخبار کسب و کار و کارآفرینی ssd | ssd" />
	<?php include("top.php"); ?>
</head>

<body id="page-new" class=" home page page-id-424 page-template-default" style="direction:ltr">

<div class="container">
	<div id="page" class="hfeed site">

		<div itemscope itemtype="http://schema.org/isPartOf" itemprop="navigation" class="navigation-toggler"><i></i></div>
		<?php include("aside.php"); ?>

	
		<div id="site-main">
		<div id="top" class="site-content" role="main">
		<section id="intro" style="padding-top:0px;">	

	<div itemscope itemtype="http://schema.org/isPartOf" itemprop="itemprop="topOfSiteHead" class="entry-content" >
		<?php include("tophead.php"); ?>

	
					<h1 title= "جدیدترین و آخرین تمام اخبار اقتصادی ssd | جدیدترین و آخرین تمام اخبار کسب و کار و کارآفرینی ssd | ssd">تمام اخبار</h1>

		<div class="cols-1" style="margin-top:-10px;">

		<div class="col">
			<div class="box">
			<div class="title">اخبار SSD</div>
				<?php
				mysql_query("SET CHARACTER SET utf8");   
				mysql_query("SET NAMES utf8_persian_ci");
				$ses_sql=mysql_query("select * from fx_blog where title_sub='1' order by id DESC") or die(mysql_error()) ;
				while ($row=mysql_fetch_array($ses_sql)) 
				{
				$title=$row['title'];
				$url=$row['url'];$date_a=$row['date_a'];
				?>
			<div><a itemscope itemtype="http://schema.org/url" itemprop="itemprop="newsssd" href="<?php echo $path; ?>news/<?php echo $url; ?>" style="color:#000;display:block;padding-top:5px;padding-bottom:5px;"><?php echo $title; ?> <span style="font-size:9pt;color:#afafaf"><?php echo $date_a; ?></span></a></div>
				<?php } ?>
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
	<script src="<?php echo $path; ?>js/thumbnail-slider.js" type="text/javascript"></script>
	<script src="<?php echo $path; ?>js/ninja-slider.js" type="text/javascript"></script>

</body>
</html>