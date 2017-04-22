<?php     
$attributes = array('class' => 'bs-example form-horizontal');
echo form_open('settings/templates', $attributes); ?>
			<input type="hidden" name="email_group" value="task_assigned">
			<input type="hidden" name="return_url" value="<?=base_url()?>settings/?settings=templates&group=project&email=task_assigned">
			<div class="form-group">
				<label class="col-lg-2 control-label">Email Template</label>
				<div class="col-lg-10">
				<textarea class="form-control foeditor" name="email_template">
				<?=$this -> applib -> get_any_field('email_templates',array(
				                                    'email_group' => 'task_assigned'
									), 'template_body')?></textarea>
				</div>
			</div>
			
			
			<div class="form-group">
				<div class="col-lg-offset-2 col-lg-10">
				<button type="submit" class="btn btn-sm btn-primary"><?=lang('save_changes')?></button>
				</div>
			</div>
		</form>