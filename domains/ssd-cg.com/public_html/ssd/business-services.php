<!DOCTYPE html>
<html dir="rtl" lang="fa-IR" style="margin-top: 0px!important;">
<head>
	<meta charset="UTF-8">
	<meta itemscope itemtype="http://schema.org/headline" itemprop="topOfsite" name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1.0" />
	<meta name="description" content="استراتژی رشد گروه حرفه ای مشاوران ssd |ssd"/>
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

	

					<h1 title="استراتژی رشد | علم فروش | بازاریابی" style="direction:rtl;text-align:center;">استراتژی رشد</h1>
				<?php
				mysql_query("SET CHARACTER SET utf8");   
				mysql_query("SET NAMES utf8_persian_ci");
				$ses_sql=mysql_query("select * from fx_descr where title=7 ") or die(mysql_error()) ;
				$row=mysql_fetch_array($ses_sql);
				$title_sub=$row['title_sub'];
				echo $title_sub;
				?>
				
					
					
			<center>
			<ul class="grid effect-2" id="grid" style="margin-top:20px;;border-bottom:1px #bbb dotted;">

				<?php
				mysql_query("SET CHARACTER SET utf8");   
				mysql_query("SET NAMES utf8_persian_ci");
				$ses_sql=mysql_query("select * from  fx_service order by viwe DESC ") or die(mysql_error()) ;
				for($i=0;$i<3;$i++)
				{
				$row=mysql_fetch_array($ses_sql);
				$name=$row['name'];
				$image=$row['image'];
				$url=$row['url'];

				?>
				<li  style="background-color:#fff;border-radius:7px;;width:30%" >
				<a href="<?php echo $path; ?>business-services/<?php echo $url; ?>">
				<?php if($image=="") {} else { ?>
				<img itemscope itemtype="http://schema.org/photo" alt="خدمات کسب و کار ssd" itemprop="business-services" src="<?php echo $image; ?>" style="width:100%;height:150px" />
				<?php } ?>
				<span itemscope itemtype="http://schema.org/isPartOf" itemprop="business-services" style="font-family:BTraffic;font-size:14pt;color:#000;text-align:justify;direction:rtl;padding:10px;display:block;padding-top:5px;"><?php echo $name; ?></span>			 
				</a>
				</li>
				<?php } ?>	
			</ul>
		</center>
        <h5 title="آرشیو مقالات استراتژی رشد" style="direction:rtl;text-align:right;color:#bbb;margin-top:-20px">آرشیو</h5>
		<?php
				$url=$_GET['url'];
				$a=(explode("/",$url));
				$url1=$a[0];
				$url2=$a[1];
				$url3=$a[2];

				mysql_query("SET CHARACTER SET utf8");   
				mysql_query("SET NAMES utf8_persian_ci");
				$ses_sql=mysql_query("select * from  fx_service order by id DESC ") or die(mysql_error()) ;
				while($row=mysql_fetch_array($ses_sql))
				{
				$name=$row['name'];
				$description=$row['description'];
                $post2 = substr($description, 0, 400); 
				$id=$row['id'];
				$url=$row['url'];
				$image=$row['image'];

				?>
		<div class="cols-2"  style="margin-top:30px;margin-bottom:30px;text-align:justify;direction:rtl;border-bottom:1px #bbb dotted;">


			<div class="col" style="width:25%">
				<img itemscope itemtype="http://schema.org/photo" itemprop="image1" src="<?php echo $image; ?>" style="border-radius:8px;height:150px;width:100%">

			</div>

			<div class="col"  style="width:65%">
            <a itemscope itemtype="http://schema.org/url" itemprop="describecourse" href="<?php echo $path; ?>ssd-business/<?php echo $url; ?>" style="padding:5px;font-weight:bold;font-size:26px"  onmouseover="this.style.textDecoration='underline'" 
    onmouseout="this.style.textDecoration='none'"><?php echo $name; ?></a>
            <br><br>
			<?php echo $post2 ; ?> ...
			
			</div>			
			



					</div>

			<?php } ?>
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