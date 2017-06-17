<!DOCTYPE html>
<html dir="rtl" lang="fa-IR" style="margin-top: 0px!important;">
<head>
	<meta charset="UTF-8">
	<meta itemscope itemtype="http://schema.org/headline" itemprop="topOfsite" name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1.0" />
<meta name="description" content="برگزاری دوره‌ های آموزشی حضوری و رایگان آنلاین کارآفرینی و کسب و کار در شرکت سیمرغ صنعت و دانش ssd" />
<meta property="og:locale" content="fa_IR" />
<meta property="og:type" content="website" />
<meta property="og:title" content="برگزاری دوره‌ های آموزشی حضوری و رایگان آنلاین کارآفرینی و کسب و کار در شرکت سیمرغ صنعت و دانش ssd" />
<meta property="og:description" content="مقالات و ویدیوهای آموزشی در این بخش موجود می باشد." />
<meta property="og:image" content="../ssd/menu/sabt1.png" />
<meta property="og:site_name" content="ssd_cg" />
<meta name="telegram:description" content="مقالات و ویدیوهای آموزشی در این بخش موجود می باشد." />
<meta name="telegram:title" content="برگزاری دوره‌ های آموزشی حضوری و رایگان آنلاین کارآفرینی و کسب و کار شرکت سیمرغ صنعت و دانش ssd" />
<meta name="instagram:description" content="مقالات و ویدیوهای آموزشی در این بخش موجود می باشد." />
<meta name="instagram:title" content="برگزاری دوره‌ های آموزشی حضوری و رایگان آنلاین کارآفرینی و کسب و کار در شرکت سیمرغ صنعت و دانش ssd" />
	<?php include("top.php"); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $path; ?>css/component.css" />
	<script src="<?php echo $path; ?>js/modernizr.custom.js"></script>
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

<center>
			<ul class="grid effect-2" id="grid" style="margin-top:20px;border-bottom:1px #bbb dotted;overflow:auto">

				<?php
				mysql_query("SET CHARACTER SET utf8");   
				mysql_query("SET NAMES utf8_persian_ci");
				$ses_sql=mysql_query("select * from  fx_sabt order by viwe DESC ") or die(mysql_error()) ;
				for($i=0;$i<3;$i++)
				{
					if($row=mysql_fetch_array($ses_sql)) {
						$name=$row['name'];
						$image=$row['image'];
						$url=$row['url'];

				?>
				<li  style="background-color:#fff;border-radius:7px;width:30%" >
				<a itemscope itemtype="http://schema.org/url" itemprop="business-knowledge" href="<?php echo $path; ?>reg/<?php echo $url; ?>">
				<?php if($image=="") {} else { ?>
				<img src="<?php echo $image; ?>" style="width:100%;height:150px" />
				<?php } ?>
				<span itemscope itemtype="http://schema.org/isPartOf" itemprop="business-knowledge" style="font-family:BTraffic;font-size:14pt;color:#000;text-align:justify;direction:rtl;padding:10px;display:block;padding-top:5px;"><?php echo $name; ?></span>			 
				</a>
				</li>
				<?php }} ?>	
			</ul>
		</center>
        <h5 title="آرشیو مقالات مجله کسب و کار" style="direction:rtl;text-align:right;color:#bbb;margin-top:-20px">آرشیو</h5>
			


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


			<div class="col" style="width:25%">
				<img itemscope itemtype="http://schema.org/photo" itemprop="image1" src="<?php echo $image; ?>" style="width:100%;height:150px;border-radius:8px;">

			</div>

			<div class="col" style="width:65%">
			<a itemscope itemtype="http://schema.org/url" itemprop="describecourse" href="<?php echo $path; ?>reg/<?php echo $url; ?>" style="padding:5px;font-weight:bold;font-size:26px"  onmouseover="this.style.textDecoration='underline'" 
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
	<script src="<?php echo $path; ?>js/ninja-slider.js" type="text/javascript"></script>
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