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
		<a href="<?=base_url()?>edit_title">ویرایش توضیح آیکونها
		</a>
		</li>
	</ul>
			    <?php $a=lang('error_fill');
				 ?>
	<div class="row">
	<!-- Project events -->
	<div class="col-lg-12">
	<section class="panel">
			<?php
			if (!empty($task_descr)) {
			foreach ($task_descr as $key => $descr) { ?>
			<?php
			 $attributes = array('class' => 'bs-example form-horizontal');
             echo form_open(base_url().'title/edit_descr',$attributes); ?>
			 
			 
			<header class="panel-heading"> <i class="fa fa-pencil"></i> ویرایش توضیح آیکونها </header>

				<input type="hidden" name="id" value="<?=$descr->id?>">

				
			 	<div class="form-group col-lg-12">
					<label class="col-lg-12 control-label">عنوان<span class="text-danger">*</span></label>
				<div class="col-lg-12">
				
					<select  id="select2-option"  style="width:100%;margin-bottom:30px;"  name="title">
						<option value="<?=$descr->title?>">پیش فرض</option>
						<option value="1">دوره های یادگیری</option>
						<option value="2">استراتژی و بازاریابی</option>
						<option value="3">بهبود عملکرد</option>
						<option value="4">تکنولوژی نوین اطلاعات</option>
						<option value="5"> رهبری کسب و کار و دارایی ها</option>
						<option value="6">تکنولوژی و شبکه های اجتماعی</option>
						<option value="7">استراتژی رشد</option>
						<option value="8">ssd(آموزش)</option>
						<option value="9">سازمان</option>
						<option value="10">مجله کارآفرینی</option>
						<option value="11">گالری تصاویر</option>
						<option value="12">آموزش آنلاین</option>

					</select>
				
				</div>
				</div>
				
				<div class="form-group" style="padding:15px;">
				<label class="col-lg-12 control-label"><?=lang('description')?> <span class="text-danger"></span></label>
				<div class="col-lg-12">
				<textarea name="title_sub" class="form-control editor"><?=$descr->title_sub?></textarea>
				</div>
				</div>

				<div class="form-group" style="padding:15px;">
				<label class="col-lg-12 control-label">توضیحات منو<span class="text-danger"></span></label>
				<div class="col-lg-12">
				<textarea name="title_sub2" class="form-control editor"><?=$descr->title_sub2?></textarea>
				</div>
				</div>				
			
		<div class="modal-footer"> <a href="<?=base_url()?>title/" class="btn btn-default"><?=lang('back')?></a> 
		<button type="submit" class="btn btn-primary"><?=lang('save_changes')?></button>
		</form>
		<?php } } ?>
		</div>

	</div>


</div>
<!-- End Project events -->

</div>

	</section>
</section>
</section>
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
<a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> </section>