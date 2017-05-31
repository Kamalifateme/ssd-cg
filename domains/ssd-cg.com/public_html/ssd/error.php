<!DOCTYPE html>
<html dir="rtl" lang="fa-IR" style="margin-top: 0px!important;">
<head>
	<meta charset="UTF-8">
	<meta itemscope itemtype="http://schema.org/headline" itemprop="topOfsite" name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1.0" />
	<?php include("top.php"); ?>
<link href="<?php echo $path; ?>css/jquery.bxslider.css" rel="stylesheet" />

</head>
<body id="page-new" class=" home page page-id-424 page-template-default" style="direction:ltr">
<div class="container">
	<div id="page" class="hfeed site">

	
		<div id="site-main">
		<div id="top" class="site-content" role="main">
		<section id="intro" style="padding-top:0px;">	

	<div itemscope itemtype="http://schema.org/isPartOf" itemprop="itemprop="topOfSiteHead" class="entry-content" >
		<?php include("tophead.php"); ?>
<h2 style="margin-top:170px" title="خطای 404"> صفحه مورد نظر یافت نشد </h2>
	</section>
<section id="contact" style="background-color:#000">
				<div itemscope itemtype="http://schema.org/contactPoint" itemprop="contact" class="cols-2" style="margin-top:30px">
				
				<div class="col" style="text-align:right;">
					<h1 title="ارتباط با گروه حرفه ای مشاوران کارآفرینی و کسب و کار">ارتباط با ما</h1>
				<?php
				mysql_query("SET CHARACTER SET utf8");   
				mysql_query("SET NAMES utf8_persian_ci");
				$ses_sql=mysql_query("select * from fx_contact") or die(mysql_error()) ;
				$row=mysql_fetch_array($ses_sql);
				$phone=$row['phone'];
				$phone2=$row['phone2'];
				$phone3=$row['phone3'];
				$phone4=$row['phone4'];
				$phone5=$row['phone5'];
				$phone6=$row['phone6'];
				$email=$row['email'];
				$address=$row['address'];
				$ins=$row['ins'];
				?>
				
				<div itemscope itemtype="http://schema.org/PostalAddress" itemprop="address" style="direction:rtl;"><i class="fa fa-map-marker"></i> <?php echo $address; ?></div><br>
				<div itemscope itemtype="http://schema.org/telephone" itemprop="phone" style="direction:rtl;"><i class="fa fa-phone"></i>  <?php echo $phone; ?></div><br>
				<?php if($phone4==""){}else{?> 
				<div itemscope itemtype="http://schema.org/telephone" itemprop="phone4" style="direction:rtl;"><i class="fa fa-phone"></i>  <?php echo $phone4; ?></div><br>
                                <?php } ?>
				<?php if($phone5==""){}else{?> 
				<div itemscope itemtype="http://schema.org/telephone" itemprop="phone5" style="direction:rtl;"><i class="fa fa-phone"></i>  <?php echo $phone5; ?></div><br>
                                <?php } ?>
				<?php if($phone6==""){}else{?> 
				<div itemscope itemtype="http://schema.org/isPartOf" itemprop="phone6" style="direction:rtl;"><i class="fa fa-phone"></i>  <?php echo $phone6; ?></div><br>
                                <?php } ?>

				<?php if($phone2==""){}else{?> 
				<div itemscope itemtype="http://schema.org/isPartOf" itemprop="phone2" style="direction:rtl;"><i class="fa fa-fax"></i>  <?php echo $phone2; ?></div><br>
                                <?php } ?>

				<?php if($phone3==""){}else{?> 
				<div itemscope itemtype="http://schema.org/isPartOf" itemprop="phone3" style="direction:rtl;"><i class="fa fa-paper-plane"></i>  <?php echo $phone3; ?></div><br>
                                <?php } ?>

                                <div style="direction:rtl;"><i class="fa fa-envelope"></i>  <?php echo $email; ?></div><br>
				<div itemscope itemtype="http://schema.org/isPartOf" itemprop="instagram" style="direction:rtl;"><i class="fa fa-instagram"></i> <?php echo $ins; ?></div><br>

				</div>
				
				<div class="col">
				
				</div>
				
				
				</div>
	</section>
	


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