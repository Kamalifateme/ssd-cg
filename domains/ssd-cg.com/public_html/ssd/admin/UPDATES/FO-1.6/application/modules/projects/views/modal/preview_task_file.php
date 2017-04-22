<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button> <h4 class="modal-title"><?=lang('preview_file')?></h4>
        </div>
        <div class="modal-body">
            <img width="538" src="<?=base_url().'projects/tasks/download/'.($file->file_id).'/'.($project_id)?>"
                 alt="<?=$file->original_name?>"/>
        </div>
    </div>
</div>