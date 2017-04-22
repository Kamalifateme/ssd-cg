<section id="content"> 
<section class="vbox"> <section class="scrollable padder">
	<ul class="breadcrumb no-border no-radius b-b b-light pull-in ">
		
		<li>
		<a href="<?=base_url()?>"><?=lang('home')?>/
		</a>
		</li>
		
		<li class="active">
		<a href="<?=base_url()?>title">امکانات/
		</a>
		</li>
		
		
		<li class="active">
		<a href="<?=base_url()?>add_descr">اضافه کردن توضیح آیکونها
		</a>
		</li>
	</ul>

	<div class="row">
	<!-- Project events -->
	<div class="col-lg-12">
	<section class="panel">
				    <?php $a=lang('error_fill');
				 ?>
			<header class="panel-heading"> <i class="fa fa-navicon"></i>اضافه کردن توضیح آیکونها</header>
			<?php 
						 $attributes = array('class' => 'bs-example form-horizontal');
             echo form_open(base_url().'title/add_descr',$attributes); ?>
			 
			
			 	<div class="form-group col-lg-12">
					<label class="col-lg-12 control-label">عنوان<span class="text-danger">*</span></label>
				<div class="col-lg-12">
				
					<select  id="select2-option" style="width:100%;margin-bottom:30px;"  name="title">
						<option value="1">دوره های یادگیری</option>
						<option value="2">مالی</option>
						<option value="3">مدیریتی</option>
						<option value="4">فنی</option>
						<option value="5">دانستنیهای کسب و کار</option>
						<option value="6">کلینیک کسب و کار</option>
						<option value="7">خدمات کارآفرینی و کسب و کار</option>
						<option value="8">ssd(آموزش)</option>
						<option value="9">ssd(مشاوره)</option>
						<option value="10">ssd(کارآفرینی)</option>
						<option value="11">گالری تصاویر</option>
						<option value="12">در حال ثبت نام</option>

					</select>
				
				</div>
				</div>
				
				<div class="form-group" style="padding:15px;">
				<label class="col-lg-12 control-label"><?=lang('description')?> <span class="text-danger"></span></label>
				<div class="col-lg-12">
				<textarea name="title_sub" class="form-control editor"></textarea>
				</div>
				</div>
	
				<div class="form-group" style="padding:15px;">
				<label class="col-lg-12 control-label">توضیحات منوها<span class="text-danger"></span></label>
				<div class="col-lg-12">
				<textarea name="title_sub2" class="form-control editor"></textarea>
				</div>
				</div>

	
			<div class="modal-footer"> <a href="<?=base_url()?>title/" class="btn btn-default"><?=lang('back')?></a> 
		<button type="submit" class="btn btn-primary"><?=lang('save_changes')?></button>
		</form>
	</div>


</div>
<!-- End Project events -->
<script>
var elements = document.getElementsByTagName("INPUT");
for (var i = 0; i < elements.length; i++) {
    elements[i].oninvalid = function(e) {
        e.target.setCustomValidity("");
        if (!e.target.validity.valid) {
            e.target.setCustomValidity("<?php echo $a; ?>");
        }
    };
    elements[i].oninput = function(e) {
        e.target.setCustomValidity("");
    };
}
</script>
</div>

	</section>
</section>
</section>
<a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> </section>