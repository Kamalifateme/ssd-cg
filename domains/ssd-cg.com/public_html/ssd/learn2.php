<!DOCTYPE html>
<html dir="rtl" lang="fa-IR" style="margin-top: 0px!important;">
<head>
	<meta charset="UTF-8">
	<meta itemscope itemtype="http://schema.org/headline" itemprop="topOfsite" name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1.0" />
    <meta name="description" content="گروه مشاوران SSD با وجود شبکه مشاوران و مدرسان مجرب و حرفه ای توان ارائه دوره های یادگیری عملیاتی در اکثر سطوح مدیریتی و مراحل مختلف  چرخه عمر سازمانی اعم از دوره های کارآفرینی و ایجاد کسب و کار تا دوره های خرد و کلان مدیریت سازمان را دارا می باشد. تاکید ما بر کاربردی بودن دوره های یادگیری مان است." />
    <meta name="description" content="گروه مشاوران SSD با وجود شبکه مشاوران و مدرسان مجرب و حرفه ای توان ارائه دوره های یادگیری عملیاتی در اکثر سطوح مدیریتی و مراحل مختلف  چرخه عمر سازمانی اعم از دوره های کارآفرینی و ایجاد کسب و کار تا دوره های خرد و کلان مدیریت سازمان را دارا می باشد. تاکید ما بر کاربردی بودن دوره های یادگیری مان است." />
	<meta property="og:locale" content="fa_IR" />
<meta property="og:type" content="website" />
<meta property="og:title" content="دوره های یادگیری ssd" />
<meta property="og:description" content="گروه مشاوران SSD با وجود شبکه مشاوران و مدرسان مجرب و حرفه ای توان ارائه دوره های یادگیری عملیاتی در اکثر سطوح مدیریتی و مراحل مختلف  چرخه عمر سازمانی اعم از دوره های کارآفرینی و ایجاد کسب و کار تا دوره های خرد و کلان مدیریت سازمان را دارا می باشد." />
<meta property="og:image" content="../ssd/menu/Yadgiri.png" />
<meta property="og:site_name" content="ssd_cg" />
<meta name="telegram:description" content="گروه مشاوران SSD با وجود شبکه مشاوران و مدرسان مجرب و حرفه ای توان ارائه دوره های یادگیری عملیاتی در اکثر سطوح مدیریتی و مراحل مختلف  چرخه عمر سازمانی اعم از دوره های کارآفرینی و ایجاد کسب و کار تا دوره های خرد و کلان مدیریت سازمان را دارا می باشد." />
<meta name="telegram:title" content="دوره های یادگیری ssd" />
<meta name="instagram:description" content="گروه مشاوران SSD با وجود شبکه مشاوران و مدرسان مجرب و حرفه ای توان ارائه دوره های یادگیری عملیاتی در اکثر سطوح مدیریتی و مراحل مختلف  چرخه عمر سازمانی اعم از دوره های کارآفرینی و ایجاد کسب و کار تا دوره های خرد و کلان مدیریت سازمان را دارا می باشد." />
<meta name="instagram:title" content="دوره های یادگیری ssd" />
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
<br><br>
				<a itemscope itemtype="http://schema.org/url" itemprop="learning-courses" href="<?php echo $path; ?>learning-courses" style="font-size:13pt;display:block;border-radius:6px;border:2px #fff solid;width:290px;text-align:center;padding:5px;">بازگشت به دوره های یادگیری</a><br>

<div id="nestedAccordion">
				<?php
				$url=$_GET['url'];
				$a=(explode("/",$url));
				$url1=$a[0];
				$url2=$a[1];
				$url3=$a[2];

				mysql_query("SET CHARACTER SET utf8");   
				mysql_query("SET NAMES utf8_persian_ci");
				$ses_sql=mysql_query("select * from  fx_title2 where sub_title='$url2' ") or die(mysql_error()) ;
				while($row=mysql_fetch_array($ses_sql))
				{
				$sub_title=$row['sub_title'];
				$name=$row['name'];
				$id=$row['id'];

				?>
			<h2 title="دوره های یادگیری | دوره آموزشی رایگان و ارزان | دوره یادگیری رایگان و ارزان |ssd"><?php echo $name; ?></h2>
				<div>
				<?php 
				$ses_sql2=mysql_query("select * from  fx_learning where title_sub='$id' ") or die(mysql_error()) ;
				while($row2=mysql_fetch_array($ses_sql2))
				{
				$description=$row2['description'];
				$name=$row2['name'];
				?>
					<h3 title="نام دوره آموزشی رایگان و ارزان"><?php echo $name; ?></h3>
					<div>
					<?php echo $description; ?>	
					</div>
				<?php } ?>
					
				</div>
			<?php } ?>

		</div>

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
	<script src="<?php echo $path; ?>js/ninja-slider.js" type="text/javascript"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		var parentDivs = $('#nestedAccordion div'),
		childDivs = $('#nestedAccordion h3').siblings('div');

		$('#nestedAccordion h2').click(function(){
			parentDivs.slideUp();
			if($(this).next().is(':hidden')){
				$(this).next().slideDown();
			}else{
				$(this).next().slideUp();
			}
		});
		$('#nestedAccordion h3').click(function(){
			childDivs.slideUp();
			if($(this).next().is(':hidden')){
				$(this).next().slideDown();
			}else{
				$(this).next().slideUp();
			}
		});
	});
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
</body>
</html>