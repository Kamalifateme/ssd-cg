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
		<a href="<?=base_url()?>drug/edit_drug"><?=lang('update_drug')?>
		</a>
		</li>
	</ul>

	<div class="row">
	<!-- Project events -->
	<div class="col-lg-12">
	<section class="panel">
	
			<header class="panel-heading"> <i class="fa fa-navicon"></i> <?=lang('update_drug')?> </header>
			<?php 
						 $attributes = array('class' => 'bs-example form-horizontal');
             echo form_open(base_url().'drug/edit_drug',$attributes); ?>
			 
			    <?php $a=lang('error_fill');
				 ?>
				 						<?php
				if (!empty($task_drug)) {
				foreach ($task_drug as $key => $drugs) { 
			?>
				 
				<div class="form-group col-lg-12">
					<label class="col-lg-12 control-label"><?=lang('drug')?> <span class="text-danger">*</span></label>
				<div class="col-lg-12">
					<input type="text" class="form-control"  name="name"  value="<?=$drugs->name?>"  required >
				</div>
				</div>


				<div class="form-group col-lg-12">
					<label class="col-lg-12 control-label"><?=lang('face')?> <span class="text-danger">*</span></label>
				<div class="col-lg-12">
					<select name="face" class="form-control">
					<option value="<?=$drugs->face?>">پیش فرض</option>

					<?php
					$query = $this->db->query("select * from fx_face");
					foreach ($query->result() as $row)
					{
					?>
					<option value="<?php echo $row->id; ?>"><?php echo $row->type; ?></option>
	
				<?php } ?>
				</select>
				</div>
				</div>
			 
			 
			 
				<div class="form-group col-lg-12">
					<label class="col-lg-12 control-label"><?=lang('group')?> <span class="text-danger">*</span></label>
				<div class="col-lg-12">
					<select name="group" class="form-control">
					<option value="<?=$drugs->group?>">پیش فرض</option>

					<?php
					$query = $this->db->query("select * from fx_group");
					foreach ($query->result() as $row)
					{
					?>
					<option value="<?php echo $row->id; ?>"><?php echo $row->type; ?></option>
	
				<?php } ?>
				</select>
				</div>
				</div>
				
				
				
				<div class="form-group col-lg-12">
					<label class="col-lg-12 control-label"><?=lang('alephpa')?> <span class="text-danger">*</span></label>
				<div class="col-lg-12">
					<select name="alephpa" class="form-control">
					<option value="<?=$drugs->alephpa?>">پیش فرض</option>

					<?php
					$query = $this->db->query("select * from fx_alephpa");
					foreach ($query->result() as $row)
					{
					?>
					<option value="<?php echo $row->id; ?>"><?php echo $row->type; ?></option>
	
				<?php } ?>
				</select>
				</div>
				</div>
			 

				<div class="form-group col-lg-12">
					<label class="col-lg-12 control-label"><?=lang('url')?> <span class="text-danger">*</span></label>
				<div class="col-lg-12">
					<input type="text" class="form-control" value="<?=$drugs->url?>"  name="url"    required >
				</div>
				</div>
				
				
				<input type="hidden" name="id" value="<?=$drugs->id?>">
				<div class="form-group" style="padding:15px;">
				<label class="col-lg-12 control-label"><?=lang('description')?> <span class="text-danger"></span></label>
				<div class="col-lg-12">
				<textarea name="description" class="form-control editor"><?=$drugs->description?></textarea>
				</div>
				</div>
				

				
				
			<div class="modal-footer"> <a href="<?=base_url()?>drug/" class="btn btn-default"><?=lang('back')?></a> 
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
