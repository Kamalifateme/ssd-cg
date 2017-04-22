<li id="spotlight" data-name="اسپات لایت">

	<div class="info">

		اسپات لایت به شما اجازه می دهد تا یک رویه به تصاویرتان اضافه کنید که می تواند با آمدن ماوس روی تصویر ، حرکت کند یا ظاهر شود. رویه می تواند یک تصویر یا یک محتوای HTML باشد. <a href="#" class="howtouse">نحوه استفاده ...</a>
		
		<div class="howtouse">
			<p>از داده آتریبوت HTML 5 سفارشی <code>data-spotlight</code> برای فعال سازی اسپات لایت استفاده کنید . مثال :</p>
		
			<pre>&lt;a <code>data-spotlight="on"</code> href="mypage.html"&gt;&lt;img src="image.jpg" width="180" height="120" alt="" /&gt;&lt;/a&gt;</pre>

			<p>برای ساخت یک روی سفارشی از یک دایو با کلاس <code>overlay</code> استفاده کنید. شما می توانید پارامتر های افکت را به داده آتریبوت اضافه کنید . مثال :</p>

			<pre>&lt;a <code>data-spotlight="effect:bottom;"</code> href="mypage.html"&gt;
		&lt;img src="image.jpg" width="180" height="120" alt="" /&gt;
		&lt;div <code>class="overlay"</code>&gt;رویه سفارشی&lt;/div&gt;
	&lt;/a></pre>

			<p>شما می توانید پارامتر های افکت را به <code>fade</code>, <code>bottom</code>, <code>top</code>, <code>right</code> یا <code>left</code> تنظیم کنید .
		</div>

	</div>

	<div class="config">
		<form method="post" action="<?php echo $this['system']->link(array('task' => 'config_spotlight', 'ajax' => true)); ?>">
			<ul class="properties">
				<li class="separator">تنظیمات</li>

				<?php

					foreach ($xml->settings->setting as $setting) {

						$name    = (string) 'spotlight_'.$setting->attributes()->name;
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
				<input type="submit" value="ذخیره تغییرات" class="button-primary"/><span></span>
			</p>
		</form>
	</div>

</li>