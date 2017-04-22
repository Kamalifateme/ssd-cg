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
		<a href="<?=base_url()?>edit_title">ویرایش موضوع اطلاعات
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
			if (!empty($task_title)) {
			foreach ($task_title as $key => $title) { ?>
			<?php
			 $attributes = array('class' => 'bs-example form-horizontal');
             echo form_open(base_url().'title/edit_title',$attributes); ?>
			 
			 
			<header class="panel-heading"> <i class="fa fa-pencil"></i> ویرایش موضوع اطلاعات</header>

				<input type="hidden" name="id" value="<?=$title->id?>">
			 
			 	<div class="form-group col-lg-12">
					<label class="col-lg-12 control-label">عنوان<span class="text-danger">*</span></label>
				<div class="col-lg-12">
				
					<select  id="select2-option" style="width:100%;margin-bottom:30px;"  name="title">
					<option></option>
						<option value="1">دوره های یادگیری</option>
						<option value="2">مالی</option>
						<option value="3">مدیریتی</option>
						<option value="4">فنی</option>
						<option value="5">دانستنیهای کسب و کار</option>
						<option value="6">کلینیک کسب و کار</option>
						<option value="7">خدمات کارآفرینی و کسب و کار</option>
					</select>
				
				</div>
				</div>
				<div class="form-group col-lg-12">
					<label class="col-lg-12 control-label">زیر عنوان<span class="text-danger">*</span></label>
				<div class="col-lg-12">
					<input type="text" class="form-control" value="<?=$title->title_sub?>"  name="title_sub"    required >
				</div>
				</div>
			
		<div class="modal-footer"> <a href="<?=base_url()?>about/" class="btn btn-default"><?=lang('back')?></a> 
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