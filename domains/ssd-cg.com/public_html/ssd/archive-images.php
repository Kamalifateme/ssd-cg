<!DOCTYPE html>
<html dir="rtl" lang="fa-IR" style="margin-top: 0px!important;">
<head>
	<meta charset="UTF-8">
	<meta itemscope itemtype="http://schema.org/headline" itemprop="topOfsite" name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1.0" />
    <meta name="description" content="آرشیو تصاویر ssd | ssd" />
      <meta property="og:locale" content="fa_IR" />
<meta property="og:type" content="website" />
<meta property="og:title" content="آرشیو تصاویر شرکت سیمرغ صنعت و دانش ssd" />
<meta property="og:description" content="آرشیو تصاویر شرکت سیمرغ صنعت و دانش ssd در این بخش موجود می‌باشد." />
<meta property="og:image" content="../ssd/menu/archive.png" />
<meta property="og:site_name" content="ssd_cg" />
<meta name="telegram:description" content="آرشیو تصاویر شرکت سیمرغ صنعت و دانش ssd در این بخش موجود می‌باشد." />
<meta name="telegram:title" content="آرشیو تصاویر شرکت سیمرغ صنعت و دانش ssd" />
<meta name="instagram:description" content="آرشیو تصاویر شرکت سیمرغ صنعت و دانش ssd در این بخش موجود می‌باشد." />
<meta name="instagram:title" content="آرشیو تصاویر شرکت سیمرغ صنعت و دانش ssd" />
	<?php include("top.php"); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>css/component.css" />
	<script src="<?php echo $path; ?>js/modernizr.custom.js"></script>
</head>

<body id="page-new" class=" home page page-id-424 page-template-default" style="direction:ltr">
<?php $page="آرشیو تصاویر"; ?>

<div itemscope itemtype="http://schema.org/photo" itemprop="container" class="container">
	<div id="page" class="hfeed site">

		<div itemscope itemtype="http://schema.org/isPartOf" itemprop="navigation" class="navigation-toggler"><i></i></div>
		<?php include("aside.php"); ?>

	
		<div id="site-main">
		<div id="top" class="site-content" role="main">
		<section id="intro" style="padding-top:0px;">	

	<div itemscope itemtype="http://schema.org/isPartOf" itemprop="entry-content" class="entry-content" >
		<?php include("tophead.php"); ?>

	

				<h1 title="آرشیو تصاویر ssd" style="direction:rtl;text-align:center;">آرشیو تصاویر</h1>
				<?php
				mysql_query("SET CHARACTER SET utf8");   
				mysql_query("SET NAMES utf8_persian_ci");
				$ses_sql=mysql_query("select * from fx_descr where title=11 ") or die(mysql_error()) ;
				$row=mysql_fetch_array($ses_sql);
				$title_sub=$row['title_sub'];
				echo $title_sub;
				?>
				
					
					
			<center>
			<ul class="grid effect-2" id="grid" style="margin-top:20px;">

				<?php
				mysql_query("SET CHARACTER SET utf8");   
				mysql_query("SET NAMES utf8_persian_ci");
				$ses_sql=mysql_query("select * from  fx_archiveo order by id DESC ") or die(mysql_error()) ;
				while($row=mysql_fetch_array($ses_sql))
				{
				$id=$row['id'];
				$name=$row['name'];
				$url=$row['url'];
				$ses_sql2=mysql_query("select * from  fx_archiveg where sub_g='$id' ") or die(mysql_error()) ;
				$row2=mysql_fetch_array($ses_sql2);
				$image=$row2['image'];

				?>
				<li style="background-color:#fff;border-radius:7px;" >
				<a href="<?php echo $path; ?>archive-images/<?php echo $url; ?>">
				<img itemscope itemtype="http://schema.org/photo" itemprop="archive-images" alt="آرشیو تصاویر ssd" src="<?php echo $image; ?>" style="width:100%" />
				<span style="font-family:BTraffic;font-size:13pt;color:#000;text-align:justify;direction:rtl;padding:10px;display:block;padding-top:5px;"><?php echo $name; ?></span>			 
				</a>
				</li>
				<?php } ?>	
			</ul>
		</center>
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

		<script src="<?php echo $path; ?>js/masonry.pkgd.min.js"></script>
		<script src="<?php echo $path; ?>js/imagesloaded.js"></script>
		<script src="<?php echo $path; ?>js/classie.js"></script>
		<script src="<?php echo $path; ?>js/AnimOnScroll.js"></script>
		<script>
			new AnimOnScroll( document.getElementById( 'grid' ), {
				minDuration : 0.4,
				maxDuration : 0.7,
				viewportFactor : 0.2
			} );
		</script>

</body>
</html>