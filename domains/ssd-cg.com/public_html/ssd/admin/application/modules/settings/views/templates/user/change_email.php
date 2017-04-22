<?php     
$attributes = array('class' => 'bs-example form-horizontal');
echo form_open('settings/templates?settings=templates&group=user&email=change_email', $attributes); ?>
			<input type="hidden" name="email_group" value="change_email">
			<input type="hidden" name="return_url" value="<?=base_url()?>settings/?settings=templates&group=user&email=change_email">
			<div class="form-group">
				<div class="col-lg-10">
				<textarea class="form-control foeditor" name="email_template">
					<?=$this -> applib -> get_any_field('email_templates',array(
				                                    'email_group' => 'change_email'
									), 'template_body')?>
				</textarea>
								<label class="col-lg-2 control-label">قالب ایمیل</label>

				</div>
			</div>
			
			
			<div class="form-group">
				<div class="col-lg-offset-2 col-lg-10">
				<button type="submit" class="btn btn-sm btn-primary"><?=lang('save_changes')?></button>
				</div>
			</div>
		</form>