<section id="content"> 
<section class="vbox"> <section class="scrollable padder">
	<ul class="breadcrumb no-border no-radius b-b b-light pull-in ">
		
		<li>
		<a href="<?=base_url()?>"><?=lang('home')?>/
		</a>
		</li>
		
		<li class="active">
		<a href="<?=base_url()?>news"><?=lang('news')?>/
		</a>
		</li>
		
		
		<li class="active">
		<a href="<?=base_url()?>add_news"><?=lang('insert_news')?>
		</a>
		</li>
	</ul>

	<div class="row">
	<!-- Project events -->
	<div class="col-lg-12">
	<section class="panel">
	
			<header class="panel-heading"> <i class="fa fa-navicon"></i> <?=lang('insert_news')?> </header>
						<?php
				if (!empty($news)) {
				foreach ($news as $key => $new) { 
			?>
			<?php 
						 $attributes = array('class' => 'bs-example form-horizontal');
             echo form_open(base_url().'news/edit_news',$attributes); ?>
			 
			    <?php $a=lang('error_fill');
				 ?>
				 
				<div class="form-group col-lg-12">
					<label class="col-lg-12 control-label"><?=lang('title')?> <span class="text-danger">*</span></label>
				<div class="col-lg-12">
					<input type="text" class="form-control" value="<?=$new->title?>"  name="title"    required >
				</div>
				</div>

				
				<div class="form-group col-lg-12">
					<label class="col-lg-12 control-label"><?=lang('s_title')?> <span class="text-danger">*</span></label>
				<div class="col-lg-12">
					<select id="select2-option" style="width:100%;margin-bottom:30px;"  name="s_title" required> 
					<option value=""></option>
					<option value="1">اخبار SSD</option>
					<option value="2">اخبار کسب و کار</option></select>
				</div>
				</div>
			 
								<input type="hidden">

				
				<div class="form-group col-lg-12">
					<label class="col-lg-12 control-label"><?=lang('url')?> <span class="text-danger">*</span></label>
				<div class="col-lg-12">
					<input type="text" class="form-control" value="<?=$new->url?>" name="url"  required >
				</div>
				</div>
				
				<div class="form-group col-lg-12">
					<label class="col-lg-12 control-label"><?=lang('editor')?> <span class="text-danger">*</span></label>
				<div class="col-lg-12">
					<input type="text" class="form-control" value="<?=$new->nev?>" name="editor" required >
				</div>
				</div>
				
				<div class="form-group col-lg-12">
				    <label class="col-lg-12 control-label"><?=lang('image')?> <span class="text-danger">*</span></label>
				<div class="col-lg-12">
				<a href="<?=base_url()?>filemanager/dialog.php?type=1&field_id=imageu157" class="iframe-btn" id="" type="button">
                <input type="text" name="image" value="<?=$new->image?>" id="imageu157" class="form-control" required/></a>
				</div>
				</div>
								
								
								
								
				<input type="hidden" name="id" value="<?=$new->id?>">

				<div class="form-group" style="padding:15px;">
				<label class="col-lg-12 control-label"><?=lang('description')?> <span class="text-danger"></span></label>
				<div class="col-lg-12">
				<textarea name="description"  class="form-control editor"> <?=$new->des?></textarea>
				</div>
				</div>
			<div class="modal-footer"> <a href="<?=base_url()?>news/" class="btn btn-default"><?=lang('back')?></a> 
		<button type="submit" class="btn btn-primary"><?=lang('save_changes')?></button>
				</form><?php } } ?>
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
