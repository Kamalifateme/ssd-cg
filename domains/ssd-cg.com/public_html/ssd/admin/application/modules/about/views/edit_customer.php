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
		<a href="<?=base_url()?>edit_about">ویرایش مشتری
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
			if (!empty($task_customer)) {
			foreach ($task_customer as $key => $customers) { ?>
			<?php
			 $attributes = array('class' => 'bs-example form-horizontal');
             echo form_open(base_url().'about/edit_customer',$attributes); ?>
			 
			 
			<header class="panel-heading"> <i class="fa fa-pencil"></i> ویرایش کاتالوگ </header>

				<input type="hidden" name="id" value="<?=$customers->id?>">

				
				
				<div class="form-group col-lg-12">
					<label class="col-lg-12 control-label">نام مشتری</label>
				<div class="col-lg-12">
					<input type="text" class="form-control"  name="name"  value="<?=$customers->name?>"    >
				</div>
				</div>
				
				<div class="form-group col-lg-12">
				    <label class="col-lg-12 control-label">لوگو<span class="text-danger">*</span></label>
				<div class="col-lg-12">
				<a href="<?=base_url()?>filemanager/dialog.php?type=1&field_id=imageu157"   class="iframe-btn" id="" type="button">
                <input type="text" name="image" value="<?=$customers->image?>"  id="imageu157" class="form-control" required/></a>
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