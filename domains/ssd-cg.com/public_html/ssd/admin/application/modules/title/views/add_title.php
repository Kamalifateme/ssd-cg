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
		<a href="<?=base_url()?>add_title">اضافه کردن اطلاعات موضوع ها
		</a>
		</li>
	</ul>

	<div class="row">
	<!-- Project events -->
	<div class="col-lg-12">
	<section class="panel">
				    <?php $a=lang('error_fill');
				 ?>
			<header class="panel-heading"> <i class="fa fa-navicon"></i> اضافه کردن اطلاعات موضوع ها </header>
			<?php 
						 $attributes = array('class' => 'bs-example form-horizontal');
             echo form_open(base_url().'title/add_title',$attributes); ?>
			 
			 	<div class="form-group col-lg-12">
					<label class="col-lg-12 control-label">عنوان<span class="text-danger">*</span></label>
				<div class="col-lg-12">
				
					<select  id="select2-option" style="width:100%;margin-bottom:30px;"  name="title">
						<option value="1">دوره های یادگیری</option>
						<option value="2">استراتژی و بازاریابی</option>
						<option value="3">بهبود عملکرد</option>
						<option value="4">تکنولوژی نوین اطلاعات</option>
						<option value="5"> رهبری کسب و کار و دارایی ها</option>
						<option value="6">تکنولوژی و شبکه های اجتماعی</option>
						<option value="7">استراتژی رشد</option>
                        <option value="9">سازمان</option>
						<option value="10">مجله کارآفرینی</option>
					</select>
				
				</div>
				</div>
				
				<div class="form-group col-lg-12">
					<label class="col-lg-12 control-label">زیر عنوان<span class="text-danger">*</span></label>
				<div class="col-lg-12">
					<input type="text" class="form-control"  name="title_sub"    required >
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