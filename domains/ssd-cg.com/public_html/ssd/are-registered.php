<!DOCTYPE html>
<html dir="rtl" lang="fa-IR" style="margin-top: 0px!important;">
<head>
	<meta charset="UTF-8">
	<meta itemscope itemtype="http://schema.org/headline" itemprop="topOfsite" name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1.0" />
    <meta name="description" content="برگزاری دوره‌ های آموزشی حضوری و رایگان آنلاین کارآفرینی و کسب و کار | ssd" />
	<?php include("top.php"); ?>
</head>

<body id="page-new" class=" home page page-id-424 page-template-default" style="direction:ltr">
<?php $page="آموزش آنلاین"; ?>

<div class="container">
	<div id="page" class="hfeed site">

		<div itemscope itemtype="http://schema.org/isPartOf" itemprop="navigation" class="navigation-toggler"><i></i></div>
		<?php include("aside.php"); ?>

	
		<div id="site-main">
		<div id="top" class="site-content" role="main">
		<section id="intro" style="padding-top:0px;">	

	<div itemscope itemtype="http://schema.org/isPartOf" itemprop="entry-content" class="entry-content" >
		<?php include("tophead.php"); ?>

						<h1 title="برگزاری دوره‌ های آموزشی حضوری و رایگان آنلاین کارآفرینی و کسب و کار" style="direction:rtl;text-align:center;">آموزش آنلاین</h1>


			


				<?php
				$url=$_GET['url'];
				$a=(explode("/",$url));
				$url1=$a[0];
				$url2=$a[1];
				$url3=$a[2];

				mysql_query("SET CHARACTER SET utf8");   
				mysql_query("SET NAMES utf8_persian_ci");
				$ses_sql=mysql_query("select * from  fx_sabt order by id DESC ") or die(mysql_error()) ;
				while($row=mysql_fetch_array($ses_sql))
				{
				$name=$row['name'];
				$description=$row['description'];
                $post2 = substr($description, 0, 800); 
				$id=$row['id'];
				$url=$row['url'];
				$image=$row['image'];

				?>
		<div class="cols-2"  style="margin-top:30px;margin-bottom:30px;text-align:justify;direction:rtl;border-bottom:1px #fff dotted;">


			<div class="col">
				<img itemscope itemtype="http://schema.org/photo" itemprop="image1" src="<?php echo $image; ?>" style="width:48%;height:auto;border-radius:8px;">

			</div>

			<div class="col" >
			<h4 title="نام دوره‌ های آموزشی حضوری و رایگان آنلاین کارآفرینی و کسب و کار" itemscope itemtype="http://schema.org/name" itemprop="onlinecourse" style="margin-top:-5px;"><?php echo $name; ?></h4>
			<?php echo $post2 ; ?> ...
			<br><br>
			<a itemscope itemtype="http://schema.org/url" itemprop="describecourse" href="<?php echo $path; ?>reg/<?php echo $url; ?>" style="background-color:#fff;color:#000;padding:5px;">متن کامل مقاله</a>
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
	<script src="<?php echo $path; ?>js/ninja-slider.js" type="text/javascript"></script>

</body>
</html>