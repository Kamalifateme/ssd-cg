<?php 
class com_almasrayanInstallerScript
{
	protected $source;
//===============================================
	public function install($parent) {
	?>
	<fieldset class="alert alert-success">
	<center>
		<H1>برنامه الماس رایان نسخه 1.0.0 با موفقیت نصب گردید</H1>
		<H1>almasrayan Ver 1.0.0 Successfully Installed.</H1>
		<H3>آدرس ایمیل : reshkooeiah@gmail.com</H3>
		<H3><a href="almasrayan.com" target="_blank">حسین توکلی</a></H3>
	</center>
	</fieldset>
	<?php 
 }
//===============================================
	public function uninstall($parent) {
	?>
	<fieldset class="alert alert-info">
		<center>
			<H1>برنامه الماس رایان نسخه 1.0.0 با موفقیت حذف شد</H1>
			<H1>almasrayan Ver 1.0.0 Successfully UnInstalled.</H1>
			<H3>آدرس ایمیل : reshkooeiah@gmail.com</H3>
			<H3><a href="almasrayan.com" target="_blank">حسین توکلی</a></H3>
		</center>
	</fieldset>
	<?php 
	}
//===============================================
	}
	?>