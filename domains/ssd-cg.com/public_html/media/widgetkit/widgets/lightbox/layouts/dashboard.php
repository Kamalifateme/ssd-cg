<li id="lightbox" data-name="لایت باکس">

	<div class="info" style="color:#666;">
		
		لایت باکس به شما اجازه خواهد داد تا تصاویر ، ویدیو ها ، فایل های HTML و... را به صورت پاپ آپ در سایتتان بدون ترک صفحه سایتتان نمایش دهید . <a href="#" class="howtouse">نحوه استفاده ...</a>
		
		<div class="howtouse">
			<p>از داده آتریبوت HTML 5 سفارشی <code>data-lightbox</code> برای فعال سازی لایت باکس استفاده کنید . مثال :</p>

			<pre>&lt;a <code>data-lightbox="on"</code> href="image_lb.jpg"&gt;&lt;img src="image.jpg" width="180" height="120" alt="" /&gt;&lt;/a&gt;</pre>

			<p>اگر می خواهید برای تصاویر و ویدیو هایتان گروه بسازید از پارامتر <code>group</code> استفاده کنید . مثال :</p>

			<pre>&lt;a <code>data-lightbox="group:mygroup"</code> href="image1_lb.jpg"&gt;&lt;img src="image1.jpg" width="180" height="120" alt="" /&gt;&lt;/a&gt;
&lt;a <code>data-lightbox="group:mygroup"</code> href="image2_lb.jpg"&gt;&lt;img src="image2.jpg" width="180" height="120" alt="" /&gt;&lt;/a&gt;</pre>

			<p>از المنت های موجود به عنوان محتوای لایت باکس استفاده کنید . مثال :</p>

			<pre>&lt;a <code>data-lightbox="on"</code> href="<code>#element-id</code>"&gt;Lightbox&lt;/a&gt;</pre>

			<p>شما می توانید پارامتر های دیگری به آتریبوت لایت باکس اضافه کنید . مثال :</p>

			<pre>&lt;a <code>data-lightbox="transitionIn:elastic;transitionOut:elastic;"</code> href="http://www.wikipedia.org"&gt;Lightbox&lt;/a&gt;</pre>

			<p>لیست تمامی پارامتر های لایت باکس اینجاست :</p>

			<ul>
				<li><strong>titlePosition</strong> - عنوان لایت باکس کجا نمایش داده بشه ؟ (<code>float</code>, <code>outside</code>, <code>inside</code> یا <code>over</code>)</li>
				<li><strong>transitionIn</strong> - افکت باز شدن را انتخاب کنید. (<code>fade</code>, <code>elastic</code>, یا <code>none</code>)</li>
				<li><strong>transitionOut</strong> - افکت بسته شدن را انتخاب کنید . (<code>fade</code>, <code>elastic</code>, یا <code>none</code>)</li>
				<li><strong>overlayShow</strong> - به <code>true</code> یا <code>false</code> تنظیم کنید . </li>
				<li><strong>width</strong> - طول را به پیکسل وارد کنید .</li>
				<li><strong>height</strong> - ارتفاع را به پیکسل وارد کنید .</li>
				<li><strong>padding</strong> - فاصله را به پیکسل وارد کنید .</li>
			</ul>			
		</div>

	</div>

	<div class="config">
		<form method="post" action="<?php echo $this['system']->link(array('task' => 'config_lightbox', 'ajax' => true)); ?>">
			<ul class="properties">
				<li class="separator">تنظیمات</li>

				<?php

					foreach ($xml->settings->setting as $setting) {

						$name    = (string) 'lightbox_'.$setting->attributes()->name;
						$type    = (string) $setting->attributes()->type;
						$label   = (string) $setting->attributes()->label;
						$value   = (string) $this['system']->options->has($name) ? $this['system']->options->get($name) : (string) $setting->attributes()->default;

						echo '<li>';
						echo '<div class="wlabel">'.$label.'</div>';
						echo '<div class="field">'.$this['field']->render($type, $name, $value, $setting).'</div>';
						echo '<div class="description">'.$setting->attributes()->description.'</div>';
						echo '</li>';

					}

				?>

			</ul>
			<p>
				<input type="submit" value="ذخیره تغییرات" class="buttonad"/><span></span>
			</p>
		</form>
	</div>

</li>