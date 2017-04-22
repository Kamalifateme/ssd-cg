<section id="content"> 
<section class="vbox"> <section class="scrollable padder">
	<ul class="breadcrumb no-border no-radius b-b b-light pull-in ">
		
		<li>
		<a href="<?=base_url()?>"><?=lang('home')?>/
		</a>
		</li>
		
		<li class="active">
		<a href="<?=base_url()?>tutorial">&#1570;&#1605;&#1608;&#1586;&#1588;/
		</a>
		</li>
		
		
		<li class="active">
		<a href="<?=base_url()?>edit_learn">&#1608;&#1740;&#1585;&#1575;&#1740;&#1588; &#1583;&#1608;&#1585;&#1607; &#1740;&#1575;&#1583;&#1711;&#1740;&#1585;&#1740;
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
			if (!empty($task_learn)) {
			foreach ($task_learn as $key => $learns) { ?>
			<?php
			 $attributes = array('class' => 'bs-example form-horizontal');
             echo form_open(base_url().'tutorial/edit_learn',$attributes); ?>
			 
			 
			<header class="panel-heading"> <i class="fa fa-pencil"></i>&#1608;&#1740;&#1585;&#1575;&#1740;&#1588; &#1583;&#1608;&#1585;&#1607; &#1740;&#1575;&#1583;&#1711;&#1740;&#1585;&#1740;</header>

				<input type="hidden" name="id" value="<?=$learns->id?>">
				
				
			<div class="form-group col-lg-12">
					<label class="col-lg-12 control-label"><?=lang('s_title')?> <span class="text-danger">*</span></label>
				<div class="col-lg-12">
					<select id="select2-option" style="width:100%;margin-bottom:30px;"  name="s_title" required> 
					<option></option>
			 <?php
			if (!empty($titlesa)) {
			foreach ($titlesa as $key => $titles) { ?>
			<option value="<?=$titles->id?>"><?=$titles->name?></option>
			<?php }} ?>
					
				</select>
				</div>
				</div>
				
				<div class="form-group col-lg-12">
					<label class="col-lg-12 control-label">&#1606;&#1575;&#1605; &#1583;&#1608;&#1585;&#1607;<span class="text-danger">*</span></label>
				<div class="col-lg-12">
					<input type="text" class="form-control"  name="name"  value="<?=$learns->name?>"   required >
				</div>
				</div>
				
				<div class="form-group" style="padding:15px;">
				<label class="col-lg-12 control-label"><?=lang('description')?> <span class="text-danger"></span></label>
				<div class="col-lg-12">
				<textarea name="description" class="form-control editor"><?=$learns->description?></textarea>
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