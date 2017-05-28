<!DOCTYPE html>
<html dir="rtl" lang="fa-IR" style="margin-top: 0px!important;">
<head>
	<meta charset="UTF-8">
	<meta itemscope itemtype="http://schema.org/headline" itemprop="topOfsite" name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1.0" />
      <meta name="description" content="Iran Web Festival | دوره های یادگیری ssd | ssd" />
	<?php include("top.php"); ?>
</head>

<body id="page-new" class=" home page page-id-424 page-template-default" style="direction:ltr">
<?php $page="دوره های یادگیری"; ?>

<div class="container">
	<div id="page" class="hfeed site">

		<div itemscope itemtype="http://schema.org/isPartOf" itemprop="navigation" class="navigation-toggler"><i></i></div>
		<?php include("aside.php"); ?>

	
		<div id="site-main">
		<div id="top" class="site-content" role="main">
		<section id="intro" style="padding-top:0px;">	

	<div itemscope itemtype="http://schema.org/headline" itemprop="entry-content" class="entry-content" >
		<?php include("tophead.php"); ?>

						<h1 title="دوره آموزشی ssd" style="direction:rtl;text-align:center;">دوره های یادگیری</h1>

				<?php
				mysql_query("SET CHARACTER SET utf8");   
				mysql_query("SET NAMES utf8_persian_ci");
				$ses_sql=mysql_query("select * from fx_descr where title=1 ") or die(mysql_error()) ;
				$row=mysql_fetch_array($ses_sql);
				$title_sub=$row['title_sub'];
				echo $title_sub;
				?>
		<div class="cols-2" style="margin-top:30px;text-align:justify;direction:rtl;">


				<?php
				$url=$_GET['url'];
				$a=(explode("/",$url));
				$url1=$a[0];
				$url2=$a[1];
				$url3=$a[2];

				mysql_query("SET CHARACTER SET utf8");   
				mysql_query("SET NAMES utf8_persian_ci");
				$ses_sql=mysql_query("select * from  fx_title where title='1' ") or die(mysql_error()) ;
				while($row=mysql_fetch_array($ses_sql))
				{
				$title_sub=$row['title_sub'];
				$title=$row['title'];
				$id=$row['id'];

				?>
				<div class="col" style="border-radius:7px;">
				<a style="border-radius:7px;font-size:14pt;color:#000;text-align:justify;direction:rtl;width:100%;display:block;background-color:#fff;padding:10px;" href="<?php echo $path; ?>learning-courses/<?php echo $id; ?>" style="background-color:#fff;height:40px;padding:10px;">
				<span style="border-radius:7px;"><?php echo $title_sub; ?></span>			 
				</a>
				</div>
				
				<?php } ?>	
		</div>
		
		
	</section>



	<?php include("menu.php"); ?>


	</div><!-- #page -->

		
	</div>
</div>

	<script type='text/javascript' src='<?php echo $path; ?>js/jquery.js'></script>
	<script type='text/javascript' src='<?php echo $path; ?>js/jquery-migrate.min.js'></script>
	<script type="text/javascript" src="<?php echo $path; ?>js/loader.js" async></script>
	<script type='text/javascript' src='<?php echo $path; ?>js/script.js'></script>

	<script src="<?php echo $path; ?>js/thumbnail-slider.js" type="text/javascript"></script>
	<script src="<?php echo $path; ?>js/ninja-slider.js" type="text/javascript"></script>

</body>
</html>