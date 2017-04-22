<section id="content"> 
<section class="vbox"> <section class="scrollable padder">
	<ul class="breadcrumb no-border no-radius b-b b-light pull-in ">
		
		<li>
		<a href="<?=base_url()?>"><?=lang('home')?>/
		</a>
		</li>
		
		<li class="active">
		<a href="<?=base_url()?>hospital"><?=lang('hospital')?>/
		</a>
		</li>
		
		
		<li class="active">
		<a href="<?=base_url()?>add_hospital"><?=lang('insert_hospital')?>
		</a>
		</li>
	</ul>

	<div class="row">
	<!-- Project events -->
	<div class="col-lg-12">
	<section class="panel">
	
			<header class="panel-heading"> <i class="fa fa-navicon"></i> <?=lang('insert_hospital')?> </header>
			<?php 
						 $attributes = array('class' => 'bs-example form-horizontal');
             echo form_open(base_url().'hospital/add_hospital',$attributes); ?>
			 
			    <?php $a=lang('error_fill');
				 ?>
				<div class="form-group col-lg-12">
					<label class="col-lg-12 control-label"><?=lang('hospital')?> <span class="text-danger">*</span></label>
				<div class="col-lg-12">
					<input type="text" class="form-control"  name="name"    required >
				</div>
				</div>

				<div class="form-group col-lg-12">
					<label class="col-lg-12 control-label"><?=lang('url')?> <span class="text-danger">*</span></label>
				<div class="col-lg-12">
					<input type="text" class="form-control"  name="url"    required >
				</div>
				</div>
				
				
				<div class="form-group col-lg-12">
					<label class="col-lg-12 control-label"><?=lang('city')?> <span class="text-danger">*</span></label>
				<div class="col-lg-12">
					<select name="city" class="form-control"">
				<?php
				if (!empty($city)) {
				foreach ($city as $key => $cit) {
				
				?>
					<option value="<?php echo $cit->id; ?>"><?=$cit->city?></option>
				<?php }} ?>
				</div>
				</div>
			 
			 
				<input type="hidden" name="id" value="<?=$about->id?>">
				<div class="form-group" style="padding:15px;">
				<label class="col-lg-12 control-label"><?=lang('description')?> <span class="text-danger"></span></label>
				<div class="col-lg-12">
				<textarea name="description" class="form-control editor"></textarea>
				</div>
				</div>
				
				<div class="form-group col-lg-12">
				<label class="col-lg-12 control-label"><?=lang('image')?> <span class="text-danger">*</span></label>
				<div class="col-lg-12">
				<a href="<?=base_url()?>filemanager/dialog.php?type=1&field_id=imageu157" class="iframe-btn" id="" type="button">
                <input type="text" name="image"  id="imageu157" class="form-control" required/></a>
				</div>
				</div>
				
				
			<div class="modal-footer"> <a href="<?=base_url()?>hospital/" class="btn btn-default"><?=lang('back')?></a> 
		<button type="submit" class="btn btn-primary"><?=lang('save_changes')?></button>
		</form>
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
