<section id="content"> 
<section class="vbox"> <section class="scrollable padder">
	<ul class="breadcrumb no-border no-radius b-b b-light pull-in ">
		
		<li>
		<a href="<?=base_url()?>"><?=lang('home')?>/
		</a>
		</li>
		
		<li class="active">
		<a href="<?=base_url()?>mosha">مشاوره/
		</a>
		</li>
		
		
		<li class="active">
		<a href="<?=base_url()?>mosha/edit_mosha">ویرایش چرا SSD
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
			if (!empty($task_mosha)) {
			foreach ($task_mosha as $key => $moshav) { ?>
			<?php
			 $attributes = array('class' => 'bs-example form-horizontal');
             echo form_open(base_url().'mosha/edit_ssmm',$attributes); ?>
			 
			 
			<header class="panel-heading"> <i class="fa fa-pencil"></i>ویرایش چرا SSD</header>

				<input type="hidden" name="id" value="<?=$moshav->id?>">
				<div class="form-group" style="padding:15px;">
				<label class="col-lg-12 control-label"><?=lang('description')?> <span class="text-danger"></span></label>
				<div class="col-lg-12">
				<textarea name="description" class="form-control editor"><?=$moshav->description?></textarea>
				</div>
				</div>
				
			
		<div class="modal-footer"> <a href="<?=base_url()?>mosha/" class="btn btn-default"><?=lang('back')?></a> 
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