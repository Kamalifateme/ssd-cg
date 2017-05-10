

<section id="Education">
		<h1  title="ثبت نام از طریق سایت گروه حرفه ای مشاوران کارآفرینی و کسب و کار ssd">آموزش</h1>

		<ul class="cols-4 ca-menu" style="margin-top:60px;margin-bottom:60px;margin-right: -20px;margin-left:-15px;">
		<div itemscope itemtype="http://schema.org/WebSite" itemprop="isPartOf" class="mmenus">
			
                    <li itemscope itemtype="http://schema.org/WebSite" itemprop="url" id="learning"  style="">
                        <a href="<?php echo $path; ?>learning-courses" >
                            <div class="ca-content">
                                <h2 title="دوره های یادگیری مجازی و حضوری کارافرینی و کسب و کار ssd" class="ca-main" style="font-size:28px;">دوره های یادگیری</h2>
                                <h3 title="نام دوره های یادگیری مجازی و حضوری کارافرینی و کسب و کار ssd" class="ca-sub">
				<?php
				mysql_query("SET CHARACTER SET utf8");   
				mysql_query("SET NAMES utf8_persian_ci");
				$ses_sql=mysql_query("select * from fx_descr where title=1 ") or die(mysql_error()) ;
				$row=mysql_fetch_array($ses_sql);
				$title_sub2=$row['title_sub2'];
				echo $title_sub2;
				?>
				</h3>                           
								</div>
                        </a>
                    </li>
</div>

		<div itemscope itemtype="http://schema.org/WebSite" itemprop="isPartOf" class="mmenus">
                    <li itemscope itemtype="http://schema.org/WebSite" itemprop="url" id="reg">
                        <a href="<?php echo $path; ?>reg" style="">
                            <div class="ca-content">
                                <h2 title="دوره های آموزشی مجازی و حضوری کارافرینی و کسب و کار ssd" class="ca-main">آموزش آنلاین</h2>
                                <h3 title="نام دوره های آموزشی مجازی و حضوری کارافرینی و کسب و کار ssd" class="ca-sub">
			<?php
				mysql_query("SET CHARACTER SET utf8");   
				mysql_query("SET NAMES utf8_persian_ci");
				$ses_sql=mysql_query("select * from fx_descr where title=12 ") or die(mysql_error()) ;
				$row=mysql_fetch_array($ses_sql);
				$title_sub2=$row['title_sub2'];
				echo $title_sub2;
				?>
				</h3>                           
								</div>
                        </a>
                    </li>
			</div>

		<div itemscope itemtype="http://schema.org/WebSite" itemprop="isPartOf" class="mmenus">
                    <li itemscope itemtype="http://schema.org/WebSite" itemprop="url" id="archive">
                        <a href="<?php echo $path; ?>archive-images" style="">
                            <div itemscope itemtype="http://schema.org/image" itemprop="photo" class="ca-content">
                                <h2 title="تصاویر دوره های مجازی و حضوری کارآفرینی و کسب و کار ssd" class="ca-main">آرشیو تصاویر</h2>
                                <h3 title="نام تصاویر دوره های مجازی و حضوری کارآفرینی و کسب و کار ssd" class="ca-sub">
			<?php
				mysql_query("SET CHARACTER SET utf8");   
				mysql_query("SET NAMES utf8_persian_ci");
				$ses_sql=mysql_query("select * from fx_descr where title=11 ") or die(mysql_error()) ;
				$row=mysql_fetch_array($ses_sql);
				$title_sub2=$row['title_sub2'];
				echo $title_sub2;
				?>
				</h3>                            </div>
                        </a>
                    </li>								
			</div>
			
		<div itemscope itemtype="http://schema.org/WebSite" itemprop="isPartOf" class="mmenus">
                    <li id="education" style="">
                        <a href="<?php echo $path; ?>ssd-education" >
                            <div class="ca-content">
                                <h2 title="چرا گروه حرفه ای مشاوران کارآفرینی و راه اندازی کسب و کار ssd" class="ca-main">چرا SSD</h2>
                                <h3 title="شرح چرا گروه حرفه ای مشاوران کارآفرینی و راه اندازی کسب و کار ssd" class="ca-sub">
				<?php
				mysql_query("SET CHARACTER SET utf8");   
				mysql_query("SET NAMES utf8_persian_ci");
				$ses_sql=mysql_query("select * from fx_descr where title=8 ") or die(mysql_error()) ;
				$row=mysql_fetch_array($ses_sql);
				$title_sub2=$row['title_sub2'];
				echo $title_sub2;
				?>
				
				
								</h3>
                            </div>
                        </a>
                    </li>
			</div>	

		
		</ul>

	</section>
	
	<section id="Consultation">

	<h1 title="گروه حرفه ای مشاوران کارآفرینی و راه اندازی کسب و کار">مشاوره</h1>
		<ul itemscope itemtype="http://schema.org/WebSite" itemprop="hasPart" class="cols-4 ca-menu" style="margin-top:60px;margin-bottom:60px;margin-right: -20px;margin-left:-15px;">

		<div  itemscope itemtype="http://schema.org/WebSite" itemprop="isPartOf" class="mmenus">
                    <li id="mali">
                        <a href="<?php echo $path; ?>financial" >
                            <div class="ca-content">
                                 <h2 title="گروه حرفه ای مشاوران مالی کارآفرینی و کسب و کار ssd" class="ca-main">مالی</h2>
                                <h3 title="نام مواد گروه حرفه ای مشاوران مالی کارآفرینی و کسب و کار ssd" class="ca-sub">
				<?php
				mysql_query("SET CHARACTER SET utf8");   
				mysql_query("SET NAMES utf8_persian_ci");
				$ses_sql=mysql_query("select * from fx_descr where title=2 ") or die(mysql_error()) ;
				$row=mysql_fetch_array($ses_sql);
				$title_sub2=$row['title_sub2'];
				echo $title_sub2;
				?>								</h3>                           
								</div>
                        </a>
                    </li>
		</div>

		<div  itemscope itemtype="http://schema.org/WebSite" itemprop="isPartOf" class="mmenus">
                    <li id="mod">
                        <a href="<?php echo $path; ?>management" >
                            <div class="ca-content">
                                <h2 title="گروه حرفه ای مشاوران مدیریتی کارآفرینی و کسب و کار ssd" class="ca-main">مدیریتی</h2>
                                <h3 title="نام مواد گروه حرفه ای مشاوران مدیریتی کارآفرینی و کسب و کار ssd" class="ca-sub">
				<?php
				mysql_query("SET CHARACTER SET utf8");   
				mysql_query("SET NAMES utf8_persian_ci");
				$ses_sql=mysql_query("select * from fx_descr where title=3 ") or die(mysql_error()) ;
				$row=mysql_fetch_array($ses_sql);
				$title_sub2=$row['title_sub2'];
				echo $title_sub2;
				?>								</h3>                           
								</div>
                        </a>
                    </li>
			</div>

		<div  itemscope itemtype="http://schema.org/WebSite" itemprop="isPartOf" class="mmenus">
                    <li id="fani">
                        <a href="<?php echo $path; ?>technical" >
                            <div class="ca-content">
                                <h2 title="گروه حرفه ای مشاوران فنی کارآفرینی و کسب و کار ssd" class="ca-main">فنی</h2>
                                <h3 title="نام مواد گروه حرفه ای مشاوران فنی کارآفرینی و کسب و کار ssd"  class="ca-sub">
				<?php
				mysql_query("SET CHARACTER SET utf8");   
				mysql_query("SET NAMES utf8_persian_ci");
				$ses_sql=mysql_query("select * from fx_descr where title=4 ") or die(mysql_error()) ;
				$row=mysql_fetch_array($ses_sql);
				$title_sub2=$row['title_sub2'];
				echo $title_sub2;
				?>								</h3>                            </div>
                        </a>
                    </li>								
			</div>

					
		<div  itemscope itemtype="http://schema.org/WebSite" itemprop="isPartOf" class="mmenus">
                    <li id="education">
                        <a href="<?php echo $path; ?>ssd-consultation" >
                            <div class="ca-content">
                                <h2 title="چرا گروه حرفه ای مشاوران کارآفرینی و راه اندازی کسب و کار ssd" class="ca-main">چرا SSD</h2>
                                <h3 title="شرح چرا گروه حرفه ای مشاوران کارآفرینی و راه اندازی کسب و کار ssd" class="ca-sub">
				<?php
				mysql_query("SET CHARACTER SET utf8");   
				mysql_query("SET NAMES utf8_persian_ci");
				$ses_sql=mysql_query("select * from fx_descr where title=9 ") or die(mysql_error()) ;
				$row=mysql_fetch_array($ses_sql);
				$title_sub2=$row['title_sub2'];
				echo $title_sub2;
				?>								</h3>
                            </div>
                        </a>
                    </li>
			</div>	
		
		</ul>
              
	</section>
	
	
		<section id="Entrepreneurship">
		
				<h1 title="سامانه راهنمای مالکیت فکری، کارآفرینی و تجاری سازی گروه حرفه ای مشاوران SSD">کارآفرینی و کسب و کار</h1>

		<ul class="cols-4 ca-menu" style="margin-top:60px;margin-bottom:60px;margin-right: -20px;margin-left:-15px;">
		

			
		<div  itemscope itemtype="http://schema.org/WebSite" itemprop="isPartOf" class="mmenus">
                    <li id="dan">
                        <a href="<?php echo $path; ?>business-knowledge" >
                            <div class="ca-content">
                                <h2 title="دانستنی های کسب و کار و کارآفرینی ssd" class="ca-main">دانستنیهای کسب و کار</h2>
                                <h3 title="شرح دانستنی های کسب و کار و کارآفرینی ssd" class="ca-sub">
				<?php
				mysql_query("SET CHARACTER SET utf8");   
				mysql_query("SET NAMES utf8_persian_ci");
				$ses_sql=mysql_query("select * from fx_descr where title=5 ") or die(mysql_error()) ;
				$row=mysql_fetch_array($ses_sql);
				$title_sub=$row['title_sub2'];
				echo $title_sub;
				?>									</h3>                           
								</div>
                        </a>
                    </li>
			</div>

		<div  itemscope itemtype="http://schema.org/WebSite" itemprop="isPartOf" class="mmenus">
                    <li id="clinic">
                        <a href="<?php echo $path; ?>business-clinic" >
                            <div class="ca-content">
                                <h2 title="کلینیک کسب و کار و کارآفرینی ssd" class="ca-main" >کلینیک کسب و کار</h2>
                                <h3 title="شرح کلینیک کسب و کار و کارآفرینی ssd" class="ca-sub">
				<?php
				mysql_query("SET CHARACTER SET utf8");   
				mysql_query("SET NAMES utf8_persian_ci");
				$ses_sql=mysql_query("select * from fx_descr where title=6 ") or die(mysql_error()) ;
				$row=mysql_fetch_array($ses_sql);
				$title_sub=$row['title_sub2'];
				echo $title_sub;
				?>									</h3>                           
								</div>
                        </a>
                    </li>
			</div>

		<div  itemscope itemtype="http://schema.org/WebSite" itemprop="isPartOf" class="mmenus">
                    <li id="ser">
                        <a href="<?php echo $path; ?>business-services" >
                            <div class="ca-content">
                                <h2 title="خدمات کارآفرینی و کسب و کار گروه حرفه ای مشاوران ssd" class="ca-main" style="font-size: 22px;">خدمات کارآفرینی و کسب و کار</h2>
                                <h3 title="شرح خدمات کارآفرینی و کسب و کار گروه حرفه ای مشاوران ssd" class="ca-sub">
				<?php
				mysql_query("SET CHARACTER SET utf8");   
				mysql_query("SET NAMES utf8_persian_ci");
				$ses_sql=mysql_query("select * from fx_descr where title=7 ") or die(mysql_error()) ;
				$row=mysql_fetch_array($ses_sql);
				$title_sub=$row['title_sub2'];
				echo $title_sub;
				?>									</h3>                            </div>
                        </a>
                    </li>								
			</div>

		<div  itemscope itemtype="http://schema.org/WebSite" itemprop="isPartOf" class="mmenus">
                    <li id="education">
                        <a href="<?php echo $path; ?>ssd-business" >
                            <div class="ca-content">
                                <h2 title="چرا گروه حرفه ای مشاوران کارآفرینی و راه اندازی کسب و کار ssd" class="ca-main">چرا SSD؟</h2>

                                <h3 title="شرح چرا گروه حرفه ای مشاوران کارآفرینی و راه اندازی کسب و کار ssd" class="ca-sub">
				<?php
				mysql_query("SET CHARACTER SET utf8");   
				mysql_query("SET NAMES utf8_persian_ci");
				$ses_sql=mysql_query("select * from fx_descr where title=10 ") or die(mysql_error()) ;
				$row=mysql_fetch_array($ses_sql);
				$title_sub=$row['title_sub2'];
				echo $title_sub;
				?>								</h3>
                            </div>
                        </a>
                    </li>
			</div>	
		
		</ul>
		
		
		</section>
<section id="contact">
				<div  itemscope itemtype="http://schema.org/Organization" itemprop="contactPoint" class="cols-2" style="margin-top:30px;">
				
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
				
				<div  itemscope itemtype="http://schema.org/Organization" itemprop="address" style="direction:rtl;"><i class="fa fa-map-marker"></i> <?php echo $address; ?></div><br>
				<div  itemscope itemtype="http://schema.org/Organization" itemprop="telephone" style="direction:rtl;"><i class="fa fa-phone"></i>  <?php echo $phone; ?></div><br>
				<?php if($phone4==""){}else{?> 
				<div  itemscope itemtype="http://schema.org/Organization" itemprop="telephone" style="direction:rtl;"><i class="fa fa-phone"></i>  <?php echo $phone4; ?></div><br>
                                <?php } ?>
				<?php if($phone5==""){}else{?> 
				<div  itemscope itemtype="http://schema.org/Organization" itemprop="telephone" style="direction:rtl;"><i class="fa fa-phone"></i>  <?php echo $phone5; ?></div><br>
                                <?php } ?>
				<?php if($phone6==""){}else{?> 
				<div  itemscope itemtype="http://schema.org/Organization" itemprop="isPartOf" style="direction:rtl;"><i class="fa fa-phone"></i>  <?php echo $phone6; ?></div><br>
                                <?php } ?>

				<?php if($phone2==""){}else{?> 
				<div  itemscope itemtype="http://schema.org/Organization" itemprop="isPartOf" style="direction:rtl;"><i class="fa fa-fax"></i>  <?php echo $phone2; ?></div><br>
                                <?php } ?>

				<?php if($phone3==""){}else{?> 
				<div  itemscope itemtype="http://schema.org/Organization" itemprop="isPartOf" style="direction:rtl;"><i class="fa fa-paper-plane"></i>  <?php echo $phone3; ?></div><br>
                                <?php } ?>

                                <div style="direction:rtl;"><i class="fa fa-envelope"></i>  <?php echo $email; ?></div><br>
				<div  itemscope itemtype="http://schema.org/Organization" itemprop="isPartOf" style="direction:rtl;"><i class="fa fa-instagram"></i> <?php echo $ins; ?></div><br>

				</div>
				
				<div class="col">
				
				</div>
				
				
				</div>
	</section>