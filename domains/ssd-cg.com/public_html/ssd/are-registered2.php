<!DOCTYPE html>
<html dir="rtl" lang="fa-IR" style="margin-top: 0px!important;">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1.0" />
	<?php include("top.php"); ?>
</head>

<body id="page-new" class=" home page page-id-424 page-template-default" style="direction:ltr">
<?php $page="در حال ثبت نام"; ?>

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
				<a href="<?php echo $path; ?>reg" style="font-size:13pt;display:block;border-radius:6px;border:2px #fff solid;width:290px;text-align:center;padding:5px;"> &#1576;&#1575;&#1586;&#1711;&#1588;&#1578; &#1576;&#1607; &#1583;&#1585; &#1581;&#1575;&#1604; &#1579;&#1576;&#1578; &#1606;&#1575;&#1605;</a><br>

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
				$image1=$row['image1'];
				$date2=$row['date2'];
				$image2=$row['image2'];
				$image3=$row['image3'];
				$image4=$row['image4'];

				?>
		<div class="cols-1"  style="margin-top:30px;margin-bottom:30px;text-align:justify;direction:rtl;border-bottom:1px #fff dotted;">

			
			
			<div class="col">
				<img src="<?php echo $image1; ?>" width="300px;height:auto">
				<br>
								<h3 style="margin:0px;"><?php echo $name; ?></h3>

				<div style="font-family:BTraffic;"><?php echo $description; ?></div>
				<img src="<?php echo $image2; ?>" >
				<img src="<?php echo $image3; ?>" >
				<img src="<?php echo $image4; ?>" >

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