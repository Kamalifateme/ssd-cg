<!DOCTYPE html>
<html dir="rtl" lang="fa-IR" style="margin-top: 0px!important;">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1.0" />
	<meta name="description" content="دانستنی های کسب و کار درک کاملی از عملکرد های کلی کسب و کار و مناطق خاص تحت تجزیه و تحلیل می باشد، داشتن اطلاعات دقیق و کامل از این دانستنی ها برای توسعه ساختار بنیادین سازمان حیاتی است، بر اساس این اطلاعات تحلیلگر می تواند درک درستی از کاربران، مشکلات و احتیاجات آن ها بدست آورد و روش های جدید و پربازده ای را برای انجام وظایف اولیه کاربران طراحی کند."/>
    <meta property="og:locale" content="fa_IR" />
<meta property="og:type" content="website" />
<meta property="og:title" content="رهبری کسب و کار و دارایی ها گروه حرفه ای مشاوران ssd" />
<meta property="og:description" content="دانستنی های کسب و کار درک کاملی از عملکرد های کلی کسب و کار و مناطق خاص تحت تجزیه و تحلیل می باشد، داشتن اطلاعات دقیق و کامل از این دانستنی ها برای توسعه ساختار بنیادین سازمان حیاتی است، بر اساس این اطلاعات تحلیلگر می تواند درک درستی از کاربران، مشکلات و احتیاجات آن ها بدست آورد و روش های جدید و پربازده ای را برای انجام وظایف اولیه کاربران طراحی کند." />
<meta property="og:image" content="../ssd/menu/dan1.png" />
<meta property="og:site_name" content="ssd_cg" />
<meta name="telegram:description" content="دانستنی های کسب و کار درک کاملی از عملکرد های کلی کسب و کار و مناطق خاص تحت تجزیه و تحلیل می باشد، داشتن اطلاعات دقیق و کامل از این دانستنی ها برای توسعه ساختار بنیادین سازمان حیاتی است، بر اساس این اطلاعات تحلیلگر می تواند درک درستی از کاربران، مشکلات و احتیاجات آن ها بدست آورد و روش های جدید و پربازده ای را برای انجام وظایف اولیه کاربران طراحی کند." />
<meta name="telegram:title" content="رهبری کسب و کار و دارایی ها گروه حرفه ای مشاوران ssd" />
<meta name="instagram:description" content="دانستنی های کسب و کار درک کاملی از عملکرد های کلی کسب و کار و مناطق خاص تحت تجزیه و تحلیل می باشد، داشتن اطلاعات دقیق و کامل از این دانستنی ها برای توسعه ساختار بنیادین سازمان حیاتی است، بر اساس این اطلاعات تحلیلگر می تواند درک درستی از کاربران، مشکلات و احتیاجات آن ها بدست آورد و روش های جدید و پربازده ای را برای انجام وظایف اولیه کاربران طراحی کند." />
<meta name="instagram:title" content="رهبری کسب و کار و دارایی ها گروه حرفه ای مشاوران ssd" />
	<?php include("top.php"); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>css/component.css" />
	<script src="<?php echo $path; ?>js/modernizr.custom.js"></script>
</head>

<body id="page-new" class=" home page page-id-424 page-template-default" style="direction:ltr">
<?php $page="رهبری کسب و کار و دارایی ها"; ?>

<div class="container">
	<div id="page" class="hfeed site">

		<div itemscope itemtype="http://schema.org/isPartOf" itemprop="navigation" class="navigation-toggler"><i></i></div>
		<?php include("aside.php"); ?>

	
		<div id="site-main">
		<div id="top" class="site-content" role="main">
		<section id="intro" style="padding-top:0px;">	

	<div itemscope itemtype="http://schema.org/headline" itemprop="entry-content" class="entry-content" >
		<?php include("tophead.php"); ?>

	

<br><br>
				<a itemscope itemtype="http://schema.org/url" itemprop="business-knowledge" href="<?php echo $path; ?>business-knowledge" style="font-size:13pt;display:block;border-radius:6px;border:2px #fff solid;width:290px;text-align:center;padding:5px;"> بازگشت به صفحه رهبری کسب و کار و دارایی ها</a><br>

				<div class="col" style="text-align:justify;direction:rtl;width:100%;margin:0px;margin-top:-30px;">

				<?php
				$url=$_GET['url'];
				$a=(explode("/",$url));
				$url1=$a[0];
				$url2=$a[1];
				$url3=$a[2];
				$sql = "UPDATE  fx_dan SET viwe=viwe+1 where url='$url2'";
				mysql_query($sql) or die(mysql_error());
				mysql_query("SET CHARACTER SET utf8");   
				mysql_query("SET NAMES utf8_persian_ci");
				$ses_sql=mysql_query("select * from  fx_dan where url='$url2' order by id DESC ") or die(mysql_error()) ;
				$row=mysql_fetch_array($ses_sql);
				
				$name=$row['name'];
				$image=$row['image'];
				$url=$row['url'];
				$description=$row['description'];
				$viwe=$row['viwe'];
				$file=$row['file'];

				?>
				<br>
				<span itemscope itemtype="http://schema.org/isPartOf" itemprop="visit" style="font-size:20pt;"><?php echo $name; ?></span>
				<br>
                <?php if($image==""){}else { ?>
								<img itemscope itemtype="http://schema.org/photo" itemprop="business-knowledge" src="<?php echo $image; ?>" style="border-radius:7px;width:640px;height:320px;border:5px #fff solid;" />
				<?php } ?>
								<br>
				<span style="font-size:15pt;color:#791057"> تعداد بازدید : <?php echo $viwe; ?></span>
				<br>
				<span style="font-size:14pt;font-family:BTraffic;"><?php echo $description; ?></span><br><br>
								
								<?php if($file==""){}else { ?>
				<a href="<?php echo $file; ?>" style="font-size:13pt;display:block;border-radius:6px;border:2px #fff solid;width:200px;text-align:center;padding:5px;">دریافت فایل ضمیمه شده</a><br>
				<?php } ?>
				</div>
				<?php
				include_once 'star-rating/dbConfig.php';
				//Fetch rating deatails from database
				$query = "SELECT rating_number, FORMAT((total_points / rating_number),1) as average_rating FROM fx_post_rating WHERE post_id = 9".$id." AND status = 1";
				$result = $db->query($query);
				$ratingRow = $result->fetch_assoc();
				?>
                <input name="rating" value="0" id="rating_star" type="hidden" postID="9<?php echo $id?>" />
                <div class="overall-rating">(میانگین امتیاز <span id="avgrat"><?php echo $ratingRow['average_rating']; ?></span>
	            از <span id="totalrat"><?php echo $ratingRow['rating_number']; ?></span>  رای)</span></div>	
                <br/><br/>
	<div id="my-comment"></div>

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
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo $path; ?>easy-comment/jquery.easy-comment.js"></script>
    <script type="text/javascript">
		jQuery(document).ready(function(){
		   $("#my-comment").EasyComment({
			   path:"<?php echo $path; ?>easy-comment/",
			   moderate:false,
			   maxReply:5
			   });
		});
	</script>
    <link href="<?php echo $path; ?>star-rating/rating.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="<?php echo $path; ?>star-rating/rating.js"></script>
    <script language="javascript" type="text/javascript">
	$(function() {
		$("#rating_star").codexworld_rating_widget({
			starLength: '5',
			initialValue: '',
			callbackFunctionName: 'processRating',
			imageDirectory: 'images/',
			inputAttr: 'postID'
		});
	});
	
	function processRating(val, attrVal){
		$.ajax({
			type: 'POST',
			url: '../star-rating/rating.php',
			data: 'postID='+attrVal+'&ratingPoints='+val,
			dataType: 'json',
			success : function(data) {
				if (data.status == 'ok') {
					alert('You have rated '+val);
					$('#avgrat').text(data.average_rating);
					$('#totalrat').text(data.rating_number);
				}else{
					alert('Some problem occured, please try again.');
				}
			}
		});
	}
	</script>

</body>
</html>