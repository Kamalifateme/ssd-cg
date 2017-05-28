<!DOCTYPE html>
<html dir="rtl" lang="fa-IR" style="margin-top: 0px!important;">
<head>
	<meta charset="UTF-8">
	<meta itemscope itemtype="http://schema.org/headline" itemprop="topOfsite" name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1.0" />
    <meta name="description" content="Iran Web Festival | دوره‌ های آموزشی حضوری و رایگان آنلاین کارآفرینی و کسب و کار ssd | ssd" />
	<?php include("top.php"); ?>
</head>

<body id="page-new" class=" home page page-id-424 page-template-default" style="direction:ltr">
<?php $page="آموزش آنلاین"; ?>

<div itemscope itemtype="http://schema.org/isPartOf" itemprop="container" class="container">
	<div id="page" class="hfeed site">

		<div itemscope itemtype="http://schema.org/isPartOf" itemprop="navigation" class="navigation-toggler"><i></i></div>
		<?php include("aside.php"); ?>

	
		<div id="site-main">
		<div id="top" class="site-content" role="main">
		<section id="intro" style="padding-top:0px;">	

	<div itemscope itemtype="http://schema.org/isPartOf" itemprop="content" class="entry-content" >
		<?php include("tophead.php"); ?>

<br><br>
				<a itemscope itemtype="http://schema.org/url" itemprop="onlinecourse" href="<?php echo $path; ?>reg" style="font-size:13pt;display:block;border-radius:6px;border:2px #fff solid;width:290px;text-align:center;padding:5px;"> بازگشت به آموزش آنلاین</a><br>

				<div class="col" style="text-align:justify;direction:rtl;width:100%;margin:0px;margin-top:-30px;">

			


				<?php
				$url=$_GET['url'];
				$a=(explode("/",$url));
				$url1=$a[0];
				$url2=$a[1];
				$url3=$a[2];

				mysql_query("SET CHARACTER SET utf8");   
				mysql_query("SET NAMES utf8_persian_ci");
				$ses_sql=mysql_query("select * from  fx_sabt where url='$url2' ") or die(mysql_error()) ;
				$row=mysql_fetch_array($ses_sql);
				$name=$row['name'];
				$description=$row['description'];
				$id=$row['id'];
				$url=$row['url'];
				$image=$row['image'];

				?>
		<div class="cols-1"  style="margin-top:30px;margin-bottom:30px;text-align:justify;direction:rtl;border-bottom:1px #fff dotted;">

			
			
			<div class="col">
				<img itemscope itemtype="http://schema.org/photo" itemprop="image1" src="<?php echo $image; ?>" width="300px;height:auto">
				<br>
								<h3 title="نام دوره‌ های آموزشی حضوری و رایگان آنلاین کارآفرینی و کسب و کار" itemscope itemtype="http://schema.org/name" itemprop="educationcourse" style="margin:0px;"><?php echo $name; ?></h3>

				<div style="font-family:BTraffic;"><?php echo $description; ?></div>

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