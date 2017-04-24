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
		<a href="<?=base_url()?>tutorial/edit_sabt">ویرایش آموزش آنلاین
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
			if (!empty($sabt_details)) {
			foreach ($sabt_details as $key => $sabts) { ?>
			<?php
			 $attributes = array('class' => 'bs-example form-horizontal');
             echo form_open(base_url().'tutorial/edit_sabt',$attributes); ?>
			 
			 
			<header class="panel-heading"> <i class="fa fa-pencil"></i>ویرایش آموزش آنلاین</header>

				<input type="hidden" name="id" value="<?=$sabts->id?>">
				
				
				
				
				
				<div class="form-group col-lg-12">
					<label class="col-lg-12 control-label">نام دوره<span class="text-danger">*</span></label>
				<div class="col-lg-12">
					<input type="text" class="form-control"  name="name"  value="<?=$sabts->name?>"   required >
				</div>
				</div>

				
				<div class="form-group" style="padding:15px;">
				<label class="col-lg-12 control-label"><?=lang('description')?> <span class="text-danger"></span></label>
				<div class="col-lg-12">
				<textarea name="description" class="form-control editor"><?=$sabts->description?></textarea>
				</div>
				</div>
				
				<div class="form-group col-lg-12">
					<label class="col-lg-12 control-label">آدرس<span class="text-danger">*</span></label>
				<div class="col-lg-12">
					<input type="text" class="form-control" value="<?=$sabts->url?>"  name="url"    required >
				</div>
				</div>
				
				<div class="form-group col-lg-12">
				    <label class="col-lg-12 control-label"><?=lang('image')?></label>
				<div class="col-lg-12">
				<a href="<?=base_url()?>filemanager/dialog.php?type=1&field_id=imageu157" class="iframe-btn" id="" type="button">
                <input type="text" name="image1"  id="imageu157" value="<?=$sabts->image1?>" class="form-control" /></a>
				</div>
				</div>

				<div class="form-group col-lg-12">
				    <label class="col-lg-12 control-label"><?=lang('image')?></label>
				<div class="col-lg-12">
				<a href="<?=base_url()?>filemanager/dialog.php?type=1&field_id=imageu158" class="iframe-btn" id="" type="button">
                <input type="text" name="image2"  id="imageu158" value="<?=$sabts->image2?>" class="form-control" /></a>
				</div>
				</div>
				
				<div class="form-group col-lg-12">
				    <label class="col-lg-12 control-label"><?=lang('image')?> </label>
				<div class="col-lg-12">
				<a href="<?=base_url()?>filemanager/dialog.php?type=1&field_id=imageu159" class="iframe-btn" id="" type="button">
                <input type="text" name="image3"  id="imageu159" value="<?=$sabts->image3?>" class="form-control" /></a>
				</div>
				</div>
				
				<div class="form-group col-lg-12">
				    <label class="col-lg-12 control-label"><?=lang('image')?> </label>
				<div class="col-lg-12">
				<a href="<?=base_url()?>filemanager/dialog.php?type=1&field_id=imageu160" class="iframe-btn" id="" type="button">
                <input type="text" name="image4"  id="imageu160" value="<?=$sabts->image4?>" class="form-control" /></a>
				</div>
				</div>

			
		<div class="modal-footer"> <a href="<?=base_url()?>tutorial/" class="btn btn-default"><?=lang('back')?></a> 
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