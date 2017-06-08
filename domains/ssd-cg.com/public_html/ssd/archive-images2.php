<!DOCTYPE html>
<html dir="rtl" lang="fa-IR" style="margin-top: 0px!important;">
<head>
	<meta charset="UTF-8">
	<meta itemscope itemtype="http://schema.org/headline" itemprop="topOfsite" name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1.0" />
	<meta name="description" content=" گروه حرفه ای مشاوران کسب و کار و کارآفرینی  ssd آرشیو تصاویر| ssd" />
    <meta property="og:locale" content="fa_IR" />
<meta property="og:type" content="website" />
<meta property="og:title" content="آرشیو تصاویر ssd" />
<meta property="og:description" content="آرشیو تصاویر ssd در این بخش موجود می باشد." />
<meta property="og:image" content="../ssd/menu/archive.png" />
<meta property="og:site_name" content="ssd_cg" />
<meta name="telegram:description" content="آرشیو تصاویر ssd در این بخش موجود می باشد." />
<meta name="telegram:title" content="آرشیو تصاویر ssd" />
<meta name="instagram:description" content="آرشیو تصاویر ssd در این بخش موجود می باشد." />
<meta name="instagram:title" content="آرشیو تصاویر ssd" />
	<?php include("top.php"); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>css/component.css" />
	<link href='<?php echo $path; ?>css/simplelightbox.css' rel='stylesheet' type='text/css'>

	<script src="<?php echo $path; ?>js/modernizr.custom.js"></script>
</head>

<body id="page-new" class=" home page page-id-424 page-template-default" style="direction:ltr">
<?php $page="آرشیو تصاویر"; ?>

<div  class="container">
	<div id="page" class="hfeed site">

		<div itemscope itemtype="http://schema.org/isPartOf" itemprop="navigation" class="navigation-toggler"><i></i></div>
		<?php include("aside.php"); ?>

	
		<div id="site-main">
		<div id="top" class="site-content" role="main">
		<section id="intro" style="padding-top:0px;">	

	<div itemscope itemtype="http://schema.org/isPartOf" itemprop="entry-content" class="entry-content" >
		<?php include("tophead.php"); ?>
				<h1 title="آرشیو تصاویر ssd" style="direction:rtl;text-align:center;">آرشیو تصاویر</h1>

		
			<br>
			<a itemscope itemtype="http://schema.org/photo" itemprop="archive-image" href="<?php echo $path; ?>archive-images" style="font-size:13pt;display:block;border-radius:6px;border:2px #fff solid;width:200px;text-align:center;padding:5px;margi">بازگشت به آرشیو تصاویر</a><br>

			<?php
				$url=$_GET['url'];
				$a=(explode("/",$url));
				$url1=$a[0];
				$url2=$a[1];
				$url3=$a[2];
				mysql_query("SET CHARACTER SET utf8");   
				mysql_query("SET NAMES utf8_persian_ci");
				$ses_sql2=mysql_query("select * from  fx_archiveo where url='$url2' order by id DESC ") or die(mysql_error()) ;
				$row2=mysql_fetch_array($ses_sql2);
				$id=$row2['id'];
				$description=$row2['description'];				
				?>
				<div itemscope itemtype="http://schema.org/isPartOf" itemprop="descriptionimage" style="text-align:justify;direction:rtl;font-family:BTraffic;"><?php echo $description; ?></div>
			
			
						<ul class="grid effect-2 lb-album gallery" id="grid" style="margin-top:20px;">
			<?php
				$url=$_GET['url'];
				$a=(explode("/",$url));
				$url1=$a[0];
				$url2=$a[1];
				$url3=$a[2];
				$ses_sql2=mysql_query("select * from  fx_archiveo where url='$url2' order by id DESC ") or die(mysql_error()) ;
				$row2=mysql_fetch_array($ses_sql2);
				$id=$row2['id'];
								$description=$row2['description'];

				mysql_query("SET CHARACTER SET utf8");   
				mysql_query("SET NAMES utf8_persian_ci");
				$ses_sql=mysql_query("select * from fx_archiveg where sub_g='$id' order by id DESC ") or die(mysql_error()) ;
				while($row=mysql_fetch_array($ses_sql))
				{
				$image=$row['image'];
				$id2=$row['id'];


				?>
				<li  style="background-color:#fff;border-radius:7px;" >
						<a href="<?php echo $image; ?>" class="big">	
<img  itemscope itemtype="http://schema.org/photo" itemprop="image1" alt="آرشیو تصاویر ssd" class="jbox-img" src="<?php echo $image; ?>" >
			</a>
				</li>
				<?php } ?>
			</ul>



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
<script type="text/javascript" src="<?php echo $path; ?>js/simple-lightbox.js"></script>
<script>
	$(function(){
		var $gallery = $('.gallery li a').simpleLightbox();
		
		$gallery.on('show.simplelightbox', function(){
			console.log('Requested for showing');
		})
		.on('shown.simplelightbox', function(){
			console.log('Shown');
		})
		.on('close.simplelightbox', function(){
			console.log('Requested for closing');
		})
		.on('closed.simplelightbox', function(){
			console.log('Closed');
		})
		.on('change.simplelightbox', function(){
			console.log('Requested for change');
		})
		.on('next.simplelightbox', function(){
			console.log('Requested for next');
		})
		.on('prev.simplelightbox', function(){
			console.log('Requested for prev');
		})
		.on('nextImageLoaded.simplelightbox', function(){
			console.log('Next image loaded');
		})
		.on('prevImageLoaded.simplelightbox', function(){
			console.log('Prev image loaded');
		})
		.on('changed.simplelightbox', function(){
			console.log('Image changed');
		})
		.on('nextDone.simplelightbox', function(){
			console.log('Image changed to next');
		})
		.on('prevDone.simplelightbox', function(){
			console.log('Image changed to prev');
		})
		.on('error.simplelightbox', function(e){
			console.log('No image found, go to the next/prev');
			console.log(e);
		});
	});
</script>

</body>
</html>