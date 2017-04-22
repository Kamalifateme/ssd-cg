<section id="content"> 
<section class="vbox"> <section class="scrollable padder">
	<ul class="breadcrumb no-border no-radius b-b b-light pull-in ">
		
		<li>
		<a href="<?=base_url()?>"><?=lang('home')?>/
		</a>
		</li>
		
		<li class="active">
		<a href="<?=base_url()?>about"><?=lang('Introduction')?>/
		</a>
		</li>
		
		
		<li class="active">
		<a href="<?=base_url()?>add_about">اضافه کردن کاتالوگ
		</a>
		</li>
	</ul>

	<div class="row">
	<!-- Project events -->
	<div class="col-lg-12">
	<section class="panel">
				    <?php $a=lang('error_fill');
				 ?>
			<header class="panel-heading"> <i class="fa fa-navicon"></i>اضافه کردن کاتالوگ  </header>
			<?php 
						 $attributes = array('class' => 'bs-example form-horizontal');
             echo form_open(base_url().'about/add_catalog',$attributes); ?>
			 
			<input type="hidden" name="id" value="<?=$about->id?>">
			
				<div class="form-group col-lg-12">
					<label class="col-lg-12 control-label">نام کاتالوگ</label>
				<div class="col-lg-12">
					<input type="text" class="form-control"  name="name"     >
				</div>
				</div>
				
				<div class="form-group col-lg-12">
				    <label class="col-lg-12 control-label">آدرس<span class="text-danger">*</span></label>
				<div class="col-lg-12">
				<a href="<?=base_url()?>filemanager/dialog.php?type=2&field_id=imageu157" class="iframe-btn" id="" type="button">
                <input type="text" name="address"  id="imageu157" class="form-control" required/></a>
				</div>
				</div>
				
			<div class="modal-footer"> <a href="<?=base_url()?>about/" class="btn btn-default"><?=lang('back')?></a> 
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