<section id="content"> 
<section class="vbox"> <section class="scrollable padder">
	<ul class="breadcrumb no-border no-radius b-b b-light pull-in ">
		
		<li>
		<a href="<?=base_url()?>"><?=lang('home')?>/
		</a>
		</li>
		
		<li class="active">
		<a href="<?=base_url()?>tutorial">آموزش/
		</a>
		</li>
		
		
		<li class="active">
		<a href="<?=base_url()?>tutorial/add_learn">اضافه کردن در حال ثبت نام
		</a>
		</li>
	</ul>

	<div class="row">
	<!-- Project events -->
	<div class="col-lg-12">
	<section class="panel">
				    <?php $a=lang('error_fill');
				 ?>
			<header class="panel-heading"> <i class="fa fa-navicon"></i> اضافه کردن در حال ثبت نام </header>
			<?php 
						 $attributes = array('class' => 'bs-example form-horizontal');
             echo form_open(base_url().'tutorial/add_sabt',$attributes); ?>
			 
			 	<div class="form-group col-lg-12">
					<label class="col-lg-12 control-label">نام دوره<span class="text-danger">*</span></label>
				<div class="col-lg-12">
					<input type="text" class="form-control"  name="name"    required >
				</div>
				</div>
			 
			 
				<div class="form-group" style="padding:15px;">
				<label class="col-lg-12 control-label"><?=lang('description')?> <span class="text-danger"></span></label>
				<div class="col-lg-12">
				<textarea name="description" class="form-control editor"></textarea>
				</div>
				</div>
				
				<div class="form-group col-lg-12">
					<label class="col-lg-12 control-label">آدرس<span class="text-danger">*</span></label>
				<div class="col-lg-12">
					<input type="text" class="form-control"  name="url"    required >
				</div>
				</div>

				<div class="form-group col-lg-12">
					<label class="col-lg-12 control-label">تاریخ<span class="text-danger">*</span></label>
				<div class="col-lg-12">
					<input type="text" class="form-control"  name="date2"     >
				</div>
				</div>

				
				<div class="form-group col-lg-12">
				    <label class="col-lg-12 control-label"><?=lang('image')?> </label>
				<div class="col-lg-12">
				<a href="<?=base_url()?>filemanager/dialog.php?type=1&field_id=imageu157" class="iframe-btn" id="" type="button">
                <input type="text" name="image1"  id="imageu157" class="form-control" /></a>
				</div>
				</div>

				<div class="form-group col-lg-12">
				    <label class="col-lg-12 control-label"><?=lang('image')?> </label>
				<div class="col-lg-12">
				<a href="<?=base_url()?>filemanager/dialog.php?type=1&field_id=imageu158" class="iframe-btn" id="" type="button">
                <input type="text" name="image2"  id="imageu158" class="form-control" /></a>
				</div>
				</div>
				
				<div class="form-group col-lg-12">
				    <label class="col-lg-12 control-label"><?=lang('image')?> </label>
				<div class="col-lg-12">
				<a href="<?=base_url()?>filemanager/dialog.php?type=1&field_id=imageu159" class="iframe-btn" id="" type="button">
                <input type="text" name="image3"  id="imageu159" class="form-control" /></a>
				</div>
				</div>
				
				<div class="form-group col-lg-12">
				    <label class="col-lg-12 control-label"><?=lang('image')?> </label>
				<div class="col-lg-12">
				<a href="<?=base_url()?>filemanager/dialog.php?type=1&field_id=imageu160" class="iframe-btn" id="" type="button">
                <input type="text" name="image4"  id="imageu160" class="form-control" /></a>
				</div>
				</div>

				
				
			<div class="modal-footer"> <a href="<?=base_url()?>tutorial/" class="btn btn-default"><?=lang('back')?></a> 
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