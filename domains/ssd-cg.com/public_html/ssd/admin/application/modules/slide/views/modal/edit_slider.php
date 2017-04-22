<section id="content"> 
<section class="vbox"> <section class="scrollable padder">
	<ul class="breadcrumb no-border no-radius b-b b-light pull-in ">
		
		<li>
		<a href="<?=base_url()?>"><?=lang('home')?>/
		</a>
		</li>
		
		<li class="active">
		<a href="<?=base_url()?>slide"><?=lang('slider')?>/
		</a>
		</li>
		
		
		<li class="active">
		<a href="<?=base_url()?>slide/edit_slide"><?=lang('edit_slide')?>
		</a>
		</li>
	</ul>

	<div class="row">
	<!-- Project events -->
	<div class="col-lg-12">
	<section class="panel">
			     <?php
								if (!empty($slide)) {
				foreach ($slide as $key => $slider) { ?>
				
			<header class="panel-heading"> <i class="fa fa-navicon"></i> <?=lang('edit_slide')?> </header>
			<?php 
						 $attributes = array('class' => 'bs-example form-horizontal');
             echo form_open(base_url().'slide/edit_slide',$attributes); ?>
			 
			    <?php $a=lang('error_fill');
				 ?>
			 <input type="hidden" name="id" value="<?=$slider->id?>">
          			

				<div class="form-group col-lg-12">
					<label class="col-lg-12 control-label"><?=lang('title1')?> </label>
				<div class="col-lg-12">
					<input type="text" class="form-control" value="<?=$slider->title?>"  name="title"     >
				</div>
				</div>
				
				<div class="form-group col-lg-12">
					<label class="col-lg-12 control-label">لینک به صفحات</label>
				<div class="col-lg-12">
					<input type="text" class="form-control" value="<?=$slider->link?>"  name="link"     >
				</div>
				</div>
				

				<div class="form-group col-lg-12">
				    <label class="col-lg-12 control-label"><?=lang('image')?> <span class="text-danger">*</span></label>
				<div class="col-lg-12">
				<a href="<?=base_url()?>filemanager/dialog.php?type=1&field_id=imageu157" class="iframe-btn" id="" type="button">
                <input type="text" name="slider"  id="imageu157" value="<?=$slider->slider?>" class="form-control" required/></a>
				</div>
				</div>
				
			<div class="modal-footer"> <a href="<?=base_url()?>slide/" class="btn btn-default"><?=lang('back')?></a> 
		<button type="submit" class="btn btn-primary"><?=lang('save_changes')?></button>
		</form>		<?php } } ?>

	</div>


</div>
<!-- End Project events -->

</div>
	
	</section>
</section>
</section>
<a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> </section>
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
