<li id="mediaplayer" data-name="مدیا پلیر">

	<div class="info">

		مدیا پلیر ویجت کیت یک ویجت کاملا HTML5 می باشد که برای پخش فایل های ویدیو ای و صوتی طراحی شده است . یک پلیر فلش کمکی نیز برای مرورگر های قدیمی به مدیا پلیر اضافه شده. <a href="#" class="howtouse">نحوه استفاده ...</a>
		
		<div class="howtouse">
			<p>از المنت <code>video</code> برای فعال کردن پخش کننده ویدیو در سایت استفاده کنید . مثال :</p>

<pre>&lt;<code>video</code> src="video.mp4" width="320" height="240"&gt;&lt;/<code>video</code>&gt;</pre>

			<p>شما همچنین می توانید فایل های مختلف را اضافه کنید, تا از فرمت های ویدیو ای مختلف مثل h.264, WebM یا Ogg پشتیبانی شود:</p>

<pre>&lt;<code>video</code> width="320" height="240"&gt;
	&lt;source type="video/mp4"  src="video.mp4" /&gt;
	&lt;source type="video/webm" src="video.webm" /&gt;
	&lt;source type="video/ogg"  src="video.ogv" /&gt;
&lt;/<code>video</code>&gt;
</pre>

			<p>از المنت <code>audio</code> برای فعال کردن پخش کننده MP3 در سایت استفاده کنید . مثال :</p>
			
			<pre>&lt;<code>audio</code> src="audio.mp3" type="audio/mp3"&gt;&lt;/<code>audio</code>&gt;</pre>
		</div>

	</div>

	<div class="config">
		<form method="post" action="<?php echo $this['system']->link(array('task' => 'config_mediaplayer', 'ajax' => true)); ?>">
			<ul class="properties">
				<li class="separator">تنظیمات</li>

				<?php

					foreach ($xml->settings->setting as $setting) {

						$name    = (string) 'mediaplayer_'.$setting->attributes()->name;
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