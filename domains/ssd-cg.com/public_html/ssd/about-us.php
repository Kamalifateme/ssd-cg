<!DOCTYPE html>
<html dir="rtl" lang="fa-IR" style="margin-top: 0px!important;">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1.0" />
	<meta itemscope itemtype="http://schema.org/headline" itemprop="topOfsite" >

<meta content="شرکت تعاونی دانش بنیان سیمرغ صنعت و دانش با نام اختصاری SSD به عنوان نماینده گروه مشاوران رهاورد تلاش ارغوان در منطقه مرکز و جنوب کشور، با بهره گیری از تیم مشاوران مجرب و متخصص در راستای تعالی و تحقق
     چشم اندازمشتریان خود گام بر می دارد. ">	
	
	<?php include("top.php"); ?>
</head>

<body id="page-new" class=" home page page-id-424 page-template-default" style="direction:ltr">
<?php $page="درباره ما"; ?>
<div class="container">
	<div id="page" class="hfeed site">

		<div itemscope itemtype="http://schema.org/isPartOf" itemprop="navigation" class="navigation-toggler"><i></i></div>
		<?php include("aside.php"); ?>

	
		<div id="site-main">
		<div id="top" class="site-content" role="main">
		<section id="intro" style="padding-top:0px;">	

	<div  itemscope itemtype="http://schema.org/headline" itemprop="entry-content" class="entry-content" >
		<?php include("tophead.php"); ?>

 

		<div class="cols-1" style="margin-top:30px;text-align:justify;direction:rtl;">
					<h1 title="درباره ssd" style="direction:rtl;text-align:center;">درباره ما</h1>

		<div itemscope itemtype="http://schema.org/isPartOf" itemprop="introduct" class="col">

				<?php
				mysql_query("SET CHARACTER SET utf8");   
				mysql_query("SET NAMES utf8_persian_ci");
				$ses_sql=mysql_query("select * from fx_introduction ") or die(mysql_error()) ;
				$row=mysql_fetch_array($ses_sql);
				$description=$row['description'];
				?>
			 <span itemscope itemtype="http://schema.org/isPartOf" itemprop="describe" style="font-size:12pt;color:#ffffff;text-align:justify;direction:rtl;"><?php echo $description; ?></span>
			 
		</div>
			
		</div>
		
		<h1 itemscope itemtype="http://schema.org/isPartOf" itemprop="customerssd" style="direction:rtl;text-align:center;" title="مشتریان ssd">مشتریان ما</h1>

		
	   <div itemscope itemtype="http://schema.org/isPartOf" itemprop="orderssd" class="cols-3" style="margin-top:30px;text-align:center;direction:rtl;">


				<?php
				mysql_query("SET CHARACTER SET utf8");   
				mysql_query("SET NAMES utf8_persian_ci");
				$ses_sql=mysql_query("select * from fx_customer order by id DESC ") or die(mysql_error()) ;
				while($row=mysql_fetch_array($ses_sql))
				{
				$name=$row['name'];
				$image=$row['image'];

				?>
				<div class="col" style="font-size:11pt;color:#ffffff;font-family:tahoma">
				<img itemscope itemtype="http://schema.org/photo" itemprop="customerimg" alt="مشتریان ssd" src="<?php echo $image?>" style="width:100%;height:auto">
				<br>
				<?php echo $name; ?>
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
	<script type='text/javascript' src='<?php echo $path; ?>js/script.js'></script>
	<script type="text/javascript" src="<?php echo $path; ?>js/loader.js" async></script>
	<script src="<?php echo $path; ?>js/thumbnail-slider.js" type="text/javascript"></script>
	<script src="<?php echo $path; ?>js/ninja-slider.js" type="text/javascript"></script>

</body>
</html>