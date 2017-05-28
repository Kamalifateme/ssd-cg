<!DOCTYPE html>
<html dir="rtl" lang="fa-IR" style="margin-top: 0px!important;">
<head>
	<meta charset="UTF-8">
	<meta itemscope itemtype="http://schema.org/headline" itemprop="topOfsite" name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1.0" />
	<?php include("top.php"); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>css/component.css" />
	<script src="<?php echo $path; ?>js/modernizr.custom.js"></script>
</head>

<body id="page-new" class=" home page page-id-424 page-template-default" style="direction:ltr">
<?php $page="استراتژی رشد"; ?>

<div class="container">
	<div id="page" class="hfeed site">

		<div itemscope itemtype="http://schema.org/isPartOf" itemprop="navigation" class="navigation-toggler"><i></i></div>
		<?php include("aside.php"); ?>

	
		<div id="site-main">
		<div id="top" class="site-content" role="main">
		<section id="intro" style="padding-top:0px;">	

	<div itemscope itemtype="http://schema.org/headline" itemprop="entry-content" class="entry-content" >
		<?php include("tophead.php"); ?>

	

<br><br>
			<a itemscope itemtype="http://schema.org/url" itemprop="business-services" href="<?php echo $path; ?>business-services" style="font-size:13pt;display:block;border-radius:6px;border:2px #fff solid;width:330px;text-align:center;padding:5px;">بازگشت به صفحه استراتژی رشد</a><br>

				<div class="col" style="text-align:justify;direction:rtl;width:100%;margin:0px;margin-top:-30px;">

				<?php
				$url=$_GET['url'];
				$a=(explode("/",$url));
				$url1=$a[0];
				$url2=$a[1];
				$url3=$a[2];
				$sql = "UPDATE  fx_service SET viwe=viwe+1 where url='$url2'";
				mysql_query($sql) or die(mysql_error());
				mysql_query("SET CHARACTER SET utf8");   
				mysql_query("SET NAMES utf8_persian_ci");
				$ses_sql=mysql_query("select * from  fx_service where url='$url2' order by id DESC ") or die(mysql_error()) ;
				$row=mysql_fetch_array($ses_sql);
				
				$name=$row['name'];
				$image=$row['image'];
				$url=$row['url'];
				$description=$row['description'];
				$viwe=$row['viwe'];
				$file=$row['file'];

				?>
				<br>
				<span style="font-size:20pt;"><?php echo $name; ?></span>
				<br>
                <?php if($image==""){}else { ?>
								<img itemscope itemtype="http://schema.org/photo" itemprop="servicePhoto" alt="دفتر مشاوره اطلاع رسانی و خدمات کارآفرینی" src="<?php echo $image; ?>" style="border-radius:7px;width:640px;height:auto;border:5px #fff solid;" />
				<?php } ?>
				<br>
				<span itemscope itemtype="http://schema.org/isPartOf" itemprop="visit" style="font-size:15pt;color:#791057"> تعداد بازدید : <?php echo $viwe; ?></span>
				<br>
				<span style="font-size:14pt;font-family:BTraffic"><?php echo $description; ?></span><br>
								
				<?php if($file==""){}else { ?>
				<a href="<?php echo $file; ?>" style="font-size:13pt;display:block;border-radius:6px;border:2px #fff solid;width:200px;text-align:center;padding:5px;">دریافت فایل ضمیمه شده</a><br>
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