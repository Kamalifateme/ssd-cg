<section class="panel panel-default">
<header class="header bg-white b-b clearfix">
                  <div class="row m-t-sm">
                  <div class="col-sm-12 m-b-xs">
                  <a href="<?=base_url()?>projects/files/add/<?=$project_id?>" data-toggle="ajaxModal" class="btn btn-sm btn-success"><?=lang('upload_file')?></a>

                     

                    </div>
                  </div>
                </header>
    <div class="table-responsive">
                  <table class="table table-striped b-t b-light AppendDataTables">
                    <thead>
                      <tr>
                        <th><?=lang('user')?></th>
                        <th><?=lang('file_name')?></th>
                        <th width="40%"><?=lang('description')?></th>
                        <th><?=lang('options')?></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $this->load->helper('file');
                    $files = $this -> db -> where(array('project'=>$project_id)) -> get('files') -> result();
                    if (!empty($files)) {
              foreach ($files as $key => $f) {  ?>
            
                      <tr>
                        <td><span class="label label-success"><?=ucfirst($this -> applib->get_any_field('users',array('id'=>$f->uploaded_by),'username'));?></span></td>
                        <td><a class="text-info" href="<?=base_url()?>projects/download/<?=$f->project?>?group=files&id=<?=$f->file_id?>"><?=$f->file_name?></a></td>
                        <td><small class="small text-muted"><?=$f->description?></small></td>
                        <td>

                        <?php
$file_name = './resource/project-files/'.$f->file_name;
$file_ext = get_mime_by_extension($file_name);

if (strpos("image/pjpeg|image/jpeg|image/png|image/x-png|image/gif|image/tiff", trim($file_ext, " ")) !== false) { ?>
<a class="text-white btn btn-xs btn-info" href="<?=base_url()?>projects/files/preview/<?=$f->file_id?>/<?=$project_id?>" data-toggle="ajaxModal"><i class="fa fa-eye"></i> </a> <?php } ?>
                        
                          <a class="btn btn-xs btn-dark" href="<?=base_url()?>projects/download/<?=$f->project?>?group=files&id=<?=$f->file_id?>"><i class="fa fa-file"></i></a>
                          <?php  if($f->uploaded_by == $this-> tank_auth -> get_user_id() OR $role == '1'){ ?>
                          <a class="btn btn-xs btn-danger" href="<?=base_url()?>projects/files/delete/<?=$f->project?>?group=files&id=<?=$f->file_id?>" data-toggle="ajaxModal"><i class="fa fa-trash-o"></i></a>
                          <?php } ?>
                        </td>
                        
                      </tr>
                      <?php } } ?>
                    </tbody>
                  </table>
                </div>

<!-- End details -->
 </section>