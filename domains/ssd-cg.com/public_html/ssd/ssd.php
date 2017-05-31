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
	else if($url1=="newsall" && $url2=='')
	{
		include("newsall.php");
	}
	else if($url1=="newsall2" && $url2=='')
	{
		include("newsall2.php");
	}
	else if($url1=="about-us" && $url2=='')
	{
		include("about-us.php");
	}
	else if($url1=="contact-us" && $url2=='')
	{
		include("contact-us.php");
	}
	else if($url1=="ssd-education" && $url2=='')
	{
		include("ssd-education.php");
	}
	else if($url1=="ssd-consultation" && $url2=='')
	{
		include("ssd-consultation.php");
	}	
	else if($url1=="ssd-consultation" && $url2!='')
	{
		include("ssd-consultation2.php");
	}	
	else if($url1=="ssd-business" && $url2=='')
	{
		include("business.php");
	}
	else if($url1=="ssd-business" && $url2!='')
	{
		include("business2.php");
	}	
	else if($url1=="learning-courses" && $url2=='')
	{
		include("learn.php");
	}
	else if($url1=="learning-courses" && $url2!='')
	{
		include("learn2.php");
	}	
	else if($url1=="reg" && $url2=='')
	{
		include("are-registered.php");
	}
	else if($url1=="reg" && $url2!='')
	{
		include("are-registered2.php");
	}
	else if($url1=="business-services" && $url2=='')
	{
		include("business-services.php");
	}
	else if($url1=="business-services" && $url2!='')
	{
		include("business-services2.php");
	}
	else if($url1=="business-clinic" && $url2=='')
	{
		include("business-clinic.php");
	}
	else if($url1=="business-clinic" && $url2!='')
	{
		include("business-clinic2.php");
	}
	else if($url1=="business-knowledge" && $url2=='')
	{
		include("business-knowledge.php");
	}
	else if($url1=="business-knowledge" && $url2!='')
	{
		include("business-knowledge2.php");
	}
	else if($url1=="technical" && $url2=='')
	{
		include("technical.php");
	}
	else if($url1=="technical" && $url2!='')
	{
		include("technical2.php");
	}
	else if($url1=="management" && $url2=='')
	{
		include("management.php");
	}
	else if($url1=="management" && $url2!='')
	{
		include("management2.php");
	}
	else if($url1=="financial" && $url2=='')
	{
		include("financial.php");
	}
	else if($url1=="financial" && $url2!='')
	{
		include("financial2.php");
	}
	else if($url1=="archive-images" && $url2=='')
	{
		include("archive-images.php");
	}
	else if($url1=="archive-images" && $url2!='')
	{
		include("archive-images2.php");
	} else {
		include("error.php");
	}
?>