<section id="content"> 
<section class="vbox"> <section class="scrollable padder">
	<ul class="breadcrumb no-border no-radius b-b b-light pull-in ">
		
		<li>
		<a href="<?=base_url()?>"><?=lang('home')?>/
		</a>
		</li>
		
		<li class="active">
		<a href="<?=base_url()?>work">کارآفرینی و کسب  وکار/
		</a>
		</li>
		
		
		<li class="active">
		<a href="<?=base_url()?>work/edit_service">ویرایش استراتژی های رشد و علم فروش
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
			if (!empty($service_details)) {
			foreach ($service_details as $key => $dan) { ?>
			<?php
			 $attributes = array('class' => 'bs-example form-horizontal');
             echo form_open(base_url().'work/edit_service',$attributes); ?>
			 
			 
			<header class="panel-heading"> <i class="fa fa-pencil"></i>ویرایش استراتژی های رشد و علم فروش</header>

				<input type="hidden" name="id" value="<?=$dan->id?>">

				
				<div class="form-group col-lg-12">
					<label class="col-lg-12 control-label">عنوان<span class="text-danger">*</span></label>
				<div class="col-lg-12">
					<input type="text" class="form-control"  name="name" value="<?=$dan->name?>"   required >
				</div>
				</div>
			 

				<div class="form-group" style="padding:15px;">
				<label class="col-lg-12 control-label"><?=lang('description')?> <span class="text-danger"></span></label>
				<div class="col-lg-12">
				<textarea name="description" class="form-control editor"><?=$dan->description?></textarea>
				</div>
				</div>
				
				<div class="form-group" style="padding:15px;">
				<label class="col-lg-12 control-label">آدرس<span class="text-danger">*</span></label>
				<div class="col-lg-12">
					<input type="text" class="form-control"  name="url"  value="<?=$dan->url?>"  required >
				</div>
				</div>
				
				<div class="form-group col-lg-12">
				    <label class="col-lg-12 control-label"><?=lang('image')?></label>
				<div class="col-lg-12">
				<a href="<?=base_url()?>filemanager/dialog.php?type=1&field_id=imageu157" class="iframe-btn" id="" type="button">
                <input type="text" name="image"  id="imageu157" class="form-control" value="<?=$dan->image?>" /></a>
				</div>
				</div>
				
				<div class="form-group col-lg-12">
				    <label class="col-lg-12 control-label">فایل</label>
				<div class="col-lg-12">
				<a href="<?=base_url()?>filemanager/dialog.php?type=2&field_id=imageu159" class="iframe-btn" id="" type="button">
                <input type="text" name="file"  id="imageu159" class="form-control" value="<?=$dan->file?>" /></a>
				</div>
				</div>		
				
			
		<div class="modal-footer"> <a href="<?=base_url()?>work/" class="btn btn-default"><?=lang('back')?></a> 
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