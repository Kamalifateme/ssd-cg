<section id="content"> 
<section class="vbox"> <section class="scrollable padder">
	<ul class="breadcrumb no-border no-radius b-b b-light pull-in ">
		
		<li>
		<a href="<?=base_url()?>"><?=lang('home')?>/
		</a>
		</li>
		
		<li class="active">
		<a href="<?=base_url()?>contacts">&#1575;&#1585;&#1578;&#1576;&#1575;&#1591; &#1576;&#1575; &#1605;&#1575;/
		</a>
		</li>
		
		
		<li class="active">
		<a href="<?=base_url()?>edit_contacts">&#1608;&#1740;&#1585;&#1575;&#1740;&#1588; &#1575;&#1585;&#1578;&#1576;&#1575;&#1591; &#1576;&#1575; &#1605;&#1575;
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
			if (!empty($task_contacts)) {
			foreach ($task_contacts as $key => $contact) { ?>
			<?php
			 $attributes = array('class' => 'bs-example form-horizontal');
             echo form_open(base_url().'contacts/edit_contacts',$attributes); ?>
			 
			 
			<header class="panel-heading"> <i class="fa fa-pencil"></i> &#1608;&#1740;&#1585;&#1575;&#1740;&#1588; &#1575;&#1585;&#1578;&#1576;&#1575;&#1591; &#1576;&#1575; &#1605;&#1575; </header>

				<input type="hidden" name="id" value="<?=$contact->id?>">

				
				
				<div class="form-group col-lg-12">
					<label class="col-lg-12 control-label">&#1570;&#1583;&#1585;&#1587;</label>
				<div class="col-lg-12">
					<input type="text" class="form-control"  name="address"  value="<?=$contact->address?>"    >
				</div>
				</div>
				
				<div class="form-group col-lg-12">
					<label class="col-lg-12 control-label">&#1578;&#1604;&#1601;&#1606;</label>
				<div class="col-lg-12">
					<input type="text" class="form-control"  name="phone"  value="<?=$contact->phone?>"    >
				</div>
				</div>
				
				<div class="form-group col-lg-12">
					<label class="col-lg-12 control-label">&#1601;&#1705;&#1587;</label>
				<div class="col-lg-12">
					<input type="text" class="form-control"  name="phone2"  value="<?=$contact->phone2?>"    >
				</div>
				</div>


				<div class="form-group col-lg-12">
					<label class="col-lg-12 control-label">&#1705;&#1575;&#1606;&#1575;&#1604; &#1578;&#1604;&#1711;&#1585;&#1575;&#1605;</label>
				<div class="col-lg-12">
					<input type="text" class="form-control"  name="phone3"  value="<?=$contact->phone3?>"    >
				</div>
				</div>


				<div class="form-group col-lg-12">
					<label class="col-lg-12 control-label">&#1578;&#1604;&#1601;&#1606;</label>
				<div class="col-lg-12">
					<input type="text" class="form-control"  name="phone4"  value="<?=$contact->phone4?>"    >
				</div>
				</div>				
				
				<div class="form-group col-lg-12">
					<label class="col-lg-12 control-label">&#1578;&#1604;&#1601;&#1606;</label>
				<div class="col-lg-12">
					<input type="text" class="form-control"  name="phone5"  value="<?=$contact->phone5?>"    >
				</div>
				</div>					
				
				
				<div class="form-group col-lg-12">
					<label class="col-lg-12 control-label">&#1578;&#1604;&#1601;&#1606;</label>
				<div class="col-lg-12">
					<input type="text" class="form-control"  name="phone6"  value="<?=$contact->phone6?>"    >
				</div>
				</div>					
				
				
				
				
								<div class="form-group col-lg-12">
					<label class="col-lg-12 control-label">&#1570;&#1583;&#1585;&#1587; &#1575;&#1740;&#1605;&#1740;&#1604;</label>
				<div class="col-lg-12">
					<input type="text" class="form-control"  name="email"  value="<?=$contact->email?>"    >
				</div>
				</div>
				
								<div class="form-group col-lg-12">
					<label class="col-lg-12 control-label">&#1575;&#1740;&#1606;&#1587;&#1578;&#1575;&#1711;&#1585;&#1575;&#1605;</label>
				<div class="col-lg-12">
					<input type="text" class="form-control"  name="ins"  value="<?=$contact->ins?>"    >
				</div>
				</div>
				
			
		<div class="modal-footer"> <a href="<?=base_url()?>contacts/" class="btn btn-default"><?=lang('back')?></a> 
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