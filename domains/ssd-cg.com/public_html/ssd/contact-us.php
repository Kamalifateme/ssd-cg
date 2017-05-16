<!DOCTYPE html>
<html dir="rtl" lang="fa-IR" style="margin-top: 0px!important;">
<head>
	<meta charset="UTF-8">
	<meta itemscope itemtype="http://schema.org/headline" itemprop="topOfsite" name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1.0" />
	<meta name="description" content="
گروه مشاوران ما با دید بهبود وترقی وضعیت کسب وکار کشورمان ایران، با راهنمایی وجهت دهی ایده وسرمایه در چهار چوب ارائه طرح های کسب وکار نوآورانه گام بر می دارد."/>
	<?php include("top.php"); ?>
</head>

<body id="page-new" class=" home page page-id-424 page-template-default" style="direction:ltr">
<?php $page="ارتباط با ما"; ?>
<div class="container">
	<div id="page" class="hfeed site">

		<div itemscope itemtype="http://schema.org/isPartOf" itemprop="navigation" class="navigation-toggler"><i></i></div>
		<?php include("aside.php"); ?>

	
		<div id="site-main">
		<div id="top" class="site-content" role="main">
		<section id="intro" style="padding-top:0px;">	

	<div itemscope itemtype="http://schema.org/isPartOf" itemprop="itemprop="topOfSiteHead" class="entry-content" >
		<?php include("tophead.php"); ?>

	

		<div class="cols-2" style="margin-top:30px;text-align:justify;direction:rtl;">
					<h1 title="contact-us | ssd" style="direction:rtl;text-align:center;">ارتباط با ما</h1>

		<div class="col">

		</div>
		
		<div class="col">
				<?php
				mysql_query("SET CHARACTER SET utf8");   
				mysql_query("SET NAMES utf8_persian_ci");
				$ses_sql=mysql_query("select * from fx_contact") or die(mysql_error()) ;
				$row=mysql_fetch_array($ses_sql);
				$phone=$row['phone'];
				$email=$row['email'];
				$address=$row['address'];
				$ins=$row['ins'];
				?>
				
				<div itemscope itemtype="http://schema.org/address" itemprop="addresscompany" style="direction:rtl;">آدرس : <?php echo $address; ?></div><br>
				<div itemscope itemtype="http://schema.org/phone" itemprop="phonecompany" style="direction:rtl;">تلفن : <?php echo $phone; ?></div><br>
				<div itemscope itemtype="http://schema.org/email" itemprop="emailcompany" style="direction:rtl;">آدرس ایمیل : <?php echo $email; ?></div><br>
				<div itemscope itemtype="http://schema.org/address" itemprop="addressinstagram" style="direction:rtl;">آدرس اینستاگرام : <?php echo $ins; ?></div><br>
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