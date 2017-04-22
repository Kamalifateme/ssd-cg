<div id="widgetkit" class="wrap">
	
	<?php echo $this['template']->render('title', array('title' => ($widget->id ? 'ویرایش' : 'افزودن').' اسلایدشو')); ?>

	<form id="form" method="post" action="<?php echo $this['system']->link(array('task' => 'save_slideshow')); ?>">
   
        <div class="sidebar">
            
            <div class="box">
                <h3>تنظیمات</h3>
                <div class="content">
                    <?php

						$settings = array();

						foreach (array($xml, $style_xml) as $x) {
							if ($setting = $x->xpath('settings/setting')) {
								$settings = array_merge($settings, $setting);
							}
						}

                        foreach ($settings as $setting) {

                            $name    = (string) $setting->attributes()->name;
                            $type    = (string) $setting->attributes()->type;
                            $label   = (string) $setting->attributes()->label;
                            $name    = (string) $setting->attributes()->name;
                            $default = (string) $setting->attributes()->default;
                            $value   = isset($widget->settings[$name]) ? $widget->settings[$name] : $default;
                            
                            echo '<div class="option">';
                            echo '<h4>'.$label.'</h4>';
                            echo '<div class="value">';
                            echo $this['field']->render($type, 'settings['.$name.']', $value, $setting);
                            echo '</div>';
                            echo '</div>';

                        } 

                    ?>
                </div>
            </div>
			
			<div class="box order">
                <h3>ترتیب</h3>
                <div class="content">
					<p class="description">برای مرتب کردن بکشید و رها کنید</p>
					<ul id="order"></ul>
				</div>
            </div>

        </div>

        <div class="form">

			<input type="hidden" value="<?php echo $widget->id; ?>" name="id" id="widget_id" />
			<input type="text" value="<?php echo $widget->name; ?>" name="name" placeholder="نام اسلاید شو را در این قسمت وارد کنید ..." class="name" required />
            
            <div id="items">
            <?php

                foreach ($widget->items as $id => $item) {
                    echo $this->render('slideshow:layouts/item', compact('id', 'item', 'widget', 'style_xml'));
                }

            ?>
            </div>

			<p class="actions">
				<input type="submit" value="ذخیره تغییرات" class="button-primary action save"/>
	            <button type="button" class="button-secondary action add">افزودن آیتم جدید</button>  
				<span></span>
			</p>

        </div>
        
	</form>
	
</div>