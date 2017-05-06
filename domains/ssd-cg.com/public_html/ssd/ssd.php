<?php
	$url=$_GET['url'];
	$a=(explode("/",$url));
	$url1=$a[0];
	$url2=$a[1];
	$url3=$a[2];

	if($url1=="news" && $url2!='')
	{
	include("news.php");
	}	
	
	if($url1=="newsall" && $url2=='')
	{
	include("newsall.php");
	}
	if($url1=="newsall2" && $url2=='')
	{
	include("newsall2.php");
	}
	if($url1=="about-us" && $url2=='')
	{
	include("about-us.php");
	}
	if($url1=="contact-us" && $url2=='')
	{
	include("contact-us.php");
	}
	if($url1=="ssd-education" && $url2=='')
	{
	include("ssd-education.php");
	}
	if($url1=="ssd-consultation" && $url2=='')
	{
	include("ssd-consultation.php");
	}	
	if($url1=="ssd-business" && $url2=='')
	{
	include("business.php");
	}	
	if($url1=="learning-courses" && $url2=='')
	{
	include("learn.php");
	}
	if($url1=="learning-courses" && $url2!='')
	{
	include("learn2.php");
	}	
	if($url1=="reg" && $url2=='')
	{
	include("are-registered.php");
	}
	if($url1=="reg" && $url2!='')
	{
	include("are-registered2.php");
	}
	if($url1=="business-services" && $url2=='')
	{
	include("business-services.php");
	}
	if($url1=="business-services" && $url2!='')
	{
	include("business-services2.php");
	}
		if($url1=="business-clinic" && $url2=='')
	{
	include("business-clinic.php");
	}
	if($url1=="business-clinic" && $url2!='')
	{
	include("business-clinic2.php");
	}
	if($url1=="business-knowledge" && $url2=='')
	{
	include("business-knowledge.php");
	}
	if($url1=="business-knowledge" && $url2!='')
	{
	include("business-knowledge2.php");
	}
	if($url1=="leadership" && $url2=='')
	{
	include("leadership.php");
	}
	if($url1=="growth-strategy" && $url2=='')
	{
	include("growth-strategy.php");
	}
	if($url1=="marketing" && $url2=='')
	{
	include("marketing.php");
	}
	if($url1=="technology" && $url2=='')
	{
	include("technology.php");
	}
	if($url1=="social-media" && $url2=='')
	{
	include("social-media.php");
	}
	if($url1=="finance" && $url2=='')
	{
	include("finance.php");
	}
	if($url1=="entrepreneur" && $url2=='')
	{
	include("entrepreneur.php");
	}
	if($url1=="starting-business" && $url2=='')
	{
	include("starting-business.php");
	}
	if($url1=="franchies" && $url2=='')
	{
	include("franchies.php");
	}
	if($url1=="magazine" && $url2=='')
	{
	include("magazine.php");
	}
	if($url1=="technical" && $url2=='')
	{
	include("technical.php");
	}
	if($url1=="technical" && $url2!='')
	{
	include("technical2.php");
	}
	if($url1=="management" && $url2=='')
	{
	include("management.php");
	}
	if($url1=="management" && $url2!='')
	{
	include("management2.php");
	}
	if($url1=="financial" && $url2=='')
	{
	include("financial.php");
	}
	if($url1=="financial" && $url2!='')
	{
	include("financial2.php");
	}
	if($url1=="archive-images" && $url2=='')
	{
	include("archive-images.php");
	}
	if($url1=="archive-images" && $url2!='')
	{
	include("archive-images2.php");
	}
?>