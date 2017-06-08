<!DOCTYPE html>
<html dir="rtl" lang="fa-IR" style="margin-top: 0px!important;">
<head>
	<meta charset="UTF-8">
	<meta itemscope itemtype="http://schema.org/headline" itemprop="topOfsite" name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1.0" />
	<meta name="description" content=""اخبار روز اقتصادی ssd |اخبار روز کسب و کار و کارآفرینی ssd"/>
	<meta property="og:locale" content="fa_IR" />
<meta property="og:type" content="website" />
<meta property="og:title" content="اخبار روز اقتصادی ssd |اخبار روز کسب و کار و کارآفرینی ssd" />
<meta property="og:description" content="ما با تشکیل تیم های متخصص جهت مشاوره و آموزش در زمینه های مختلف مسائل سازمانی از مجموعه های صنفی و صنعتی کوچک تا صنایع بزرگ، با بالاترین کیفیت و تعهد در خدمت صاحبان کسب و کار هستیم." />
<meta property="og:image" content="../ssd/img/logo33.png" />
<meta property="og:site_name" content="ssd_cg" />
<meta name="telegram:description" content="ما با تشکیل تیم های متخصص جهت مشاوره و آموزش در زمینه های مختلف مسائل سازمانی از مجموعه های صنفی و صنعتی کوچک تا صنایع بزرگ، با بالاترین کیفیت و تعهد در خدمت صاحبان کسب و کار هستیم." />
<meta name="telegram:title" content="اخبار روز اقتصادی ssd |اخبار روز کسب و کار و کارآفرینی ssd" />
<meta name="instagram:description" content="ما با تشکیل تیم های متخصص جهت مشاوره و آموزش در زمینه های مختلف مسائل سازمانی از مجموعه های صنفی و صنعتی کوچک تا صنایع بزرگ، با بالاترین کیفیت و تعهد در خدمت صاحبان کسب و کار هستیم." />
<meta name="instagram:title" content="اخبار روز اقتصادی ssd |اخبار روز کسب و کار و کارآفرینی ssd" />
	<?php include("top.php"); ?>
</head>

<body id="page-new" class=" home page page-id-424 page-template-default" style="direction:ltr">

<div class="container">
	<div id="page" class="hfeed site">

		<div itemscope itemtype="http://schema.org/isPartOf" itemprop="navigation" class="navigation-toggler"><i></i></div>
		<?php include("aside.php"); ?>

	
		<div id="site-main">
		<div id="top" class="site-content" role="main">
		<section id="intro" style="padding-top:0px;">	

	<div itemscope itemtype="http://schema.org/headline" itemprop="entry-content" class="entry-content" >
		<?php include("tophead.php"); ?>

	
		<div class="cols" style="margin-top :20px;direction:rtl;text-align:justify">
		
					<div style="margin-bottom:15px;">

							<?php 	
							$urla=$_GET['url']; 
							$a=(explode("/",$urla));
							$url1=$a[0];
							$url2=$a[1];
							$url3=$a[2];
							?>
							<?php

							include("mydb.php");
							$sql = "UPDATE  fx_blog SET viwe=viwe+1 where url='$url2'";
							mysql_query($sql) or die(mysql_error());

							mysql_query("SET CHARACTER SET utf8");   
							mysql_query("SET NAMES utf8_persian_ci");
							$query = mysql_query("SELECT * FROM fx_blog where url='$url2' ORDER BY id DESC ")
							or die(mysql_error());
							$row6 = mysql_fetch_array($query);
							$title=$row6['title'];
							$title_sub =$row6['title_sub'];
							$des=$row6['des'];
							$date=$row6['date_a'];
							$nev=$row6['nev'];
							$image=$row6['image'];
							$url=$row6['url'];
							$viwe=$row6['viwe'];
							$ida=$row6['id'];
							$love=$row6['love'];

							$ip=$_SERVER['REMOTE_ADDR']; 
							$result=mysql_query("select love from fx_blog where id='$ida'");
							$row=mysql_fetch_array($result);
							$ip_sql=mysql_query("select ip_add from fx_image_ip where img_id_fk='$ida' and ip_add='$ip'");
							$count=mysql_num_rows($ip_sql);
							if($count==0)
							{
							$aaa=1;
							}
							else
							{
							$aaa=2;
							}

							?>
						
					
							 <div style="margin-bottom:3px;width:100%;">
							 <div class="logg2" style="padding:5px;margin-left:6px;font-family:BYekan,tahoma;direction:rtl;text-align:right">
						
						<img itemscope itemtype="http://schema.org/photo" itemprop="newsimg" src="<?php echo $image; ?>" style="width:300px;height:auto" class="img-rounded" alt="<?php echo $title; ?>" style="width:60%;height:auto;margin-bottom:-10px;margin-right:20%;">
						<div class="ndrug"><h2 title="اخبار روز اقتصادی ssd |اخبار روز کسب و کار و کارآفرینی ssd" style="font-family:iranian;font-size:13pt;margin-bottom:-10px;"><?php echo $title; ?></h2></div><br>
						<span itemscope itemtype="http://schema.org/isPartOf" itemprop="visit1" style="font-family:iranian;font-size:11pt;">تعداد بازدید : <?php echo $viwe; ?></span> <span style="font-family:iranian;font-size:11pt;margin-right:30px;">تاریخ : <?php echo $date; ?></span>
						
						<div>

						</div>
						<br><br>
						<div style="text-align:justify;direction:rtl;font-family:iranian;"><?php echo $des; ?></div>

					
					
					
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
	<script>
	$(function() {
$(".love").click(function() 
{
var id = $(this).attr("id");
var dataString = 'id='+ id ;
var parent = $(this);
$(this).fadeOut(300);
$.ajax({
type: "POST",
url: "ajax_love2.php",
data: dataString,
cache: false,
success: function(html)
{
parent.html(html);
parent.fadeIn(300);
} 
});
return false;
});
});
	</script>
</body>
</html>