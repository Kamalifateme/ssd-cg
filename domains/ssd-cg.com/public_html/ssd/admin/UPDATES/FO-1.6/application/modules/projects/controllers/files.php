<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
**********************************************************************************
* Copyright: gitbench 2014
* Licence: Please check CodeCanyon.net for licence details. 
* More licence clarification available here: htttp://codecanyon.net/wiki/support/legal-terms/licensing-terms/ 
* CodeCanyon User: http://codecanyon.net/user/gitbench
* CodeCanyon Project: http://codecanyon.net/item/freelancer-office/8870728
* Package Date: 2014-09-24 09:33:11 
***********************************************************************************
*/


class Files extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this -> load -> module('layouts');	
		$this->load->library(array('tank_auth','template','form_validation'));
		$this -> form_validation -> set_error_delimiters('<span style="color:red">', '</span><br>');

		$this -> user = $this->tank_auth->get_user_id();
		$this -> username = $this -> tank_auth -> get_username(); // Set username
		if (!$this -> user) {
			$this -> applib -> redirect_to('auth/login','error',lang('access_denied'));			
		}
		$this -> template -> title(lang('projects').' - '.config_item('company_name'). ' '.config_item('version'));
		$this -> page = lang('projects');

        $this->load->model('project_model', 'project');

        $this->projects_table = 'projects';
        $this->clients_table = 'companies';
        $this->activities_table = 'activities';

		$this -> project_list = $this -> project -> retrieve($this->projects_table,array('project_id !='=>'0'), $limit = NULL, $offset = 0, $sort = NULL);
	}
	function add()
	{		
		if ($this->input->post()) {
			$project = $this->input->post('project', TRUE);
			$description = $this->input->post('description', TRUE);

			if ($this->config->item('demo_mode') == 'FALSE') {
                    $config['upload_path'] = './resource/project-files/';
                    $config['allowed_types'] = config_item('allowed_files');
                    $config['max_size']	= $this->config->item('file_max_size');
                    $config['overwrite'] = FALSE;

                    $this->load->library('upload');

                    $this->upload->initialize($config);

                    if(!$this->upload->do_multi_upload("projectfiles")) {
                    	$this -> applib -> redirect_to('projects/view/'.$project.'?group=files','error',lang('operation_failed'));
                    } else {

                        $fileinfs = $this->upload->get_multi_upload_data();
                        foreach($fileinfs as $findex=>$fileinf) {
                            $data = array(
                                'project'       => $project,
                                'file_name'		=> $fileinf['file_name'],
                                'description'	=> $description,
                                'uploaded_by'	=> $this->tank_auth->get_user_id(),
                            );
                            $this->db->insert('files', $data);

                            $file_id = $this->db->insert_id();
                        }

                if (config_item('notify_project_files') == 'TRUE') {
                	$this->_upload_notification($project);
            	}

                $activity = ucfirst($this->username).' '.lang('activity_uploaded_file');
				$params = array(
					                'user'				=> $this->user,
					                'module' 			=> 'projects',
					                'module_field_id'	=> $project,
					                'activity'			=> $activity,
					                'icon'				=> 'fa-file'
					                );
					modules::run('activity/log',$params); //pass to activitylog module
                        $this -> applib -> redirect_to('projects/view/'.$project.'/?group=files','success',lang('file_uploaded_successfully'));
                    }
                }else{
                	$this->session->set_flashdata('response_status', 'error');
					$this->session->set_flashdata('message', lang('demo_warning'));
                	redirect($_SERVER['HTTP_REFERER']);
                }
		}else{
		$data['project'] = $this->uri->segment(4);
		$this->load->view('modal/add_file',isset($data) ? $data : NULL);
	}
}
	function download()
	{
	$this->load->helper('download');
	$file_id = $this->uri->segment(4);
	$file_name = $this -> applib -> get_any_field('files',array('file_id'=>$file_id),'file_name');
	$project = $this -> applib -> get_any_field('files',array('file_id'=>$file_id),'project');
	if(file_exists('./resource/project-files/'.$file_name)){
			$data = file_get_contents('./resource/project-files/'.$file_name); // Read the file's contents
			force_download($file_name, $data);
		}else{
			$this -> applib -> redirect_to('projects/view/'.$project,'error',lang('operation_failed'));
			}
	}

	function preview(){
        if (!$this->input->post()) {
            $file_id = $this->uri->segment(4);
            $project_id = $this->uri->segment(5);
            $file =  $this->db->select()
                ->from('files')
                ->where('file_id', $file_id)
                ->get()
                ->row();
            if ($file)
            {
                if(file_exists('./resource/project-files/'.$file->file_name)){
                    $data['file'] = $file;
                    $data['project_id'] = $project_id;
                    $this->load->view('modal/preview_file', $data);
                }else{
                    $this->session->set_flashdata('message',$this->lang->line('operation_failed'));
                    redirect('projects/view/'.$project_id);
                }
            }
            else
            {
                $this->session->set_flashdata('message',$this->lang->line('operation_failed'));
                redirect('projects/view/'.$project_id);
            }
        }
    }

	function delete()
	{
		if ($this->input->post()) {

		$project_id = $this->input->post('project', TRUE);
		$file_id = $this->input->post('file', TRUE);
		
			$file_name = $this -> applib -> get_any_field('files',array('file_id'=>$file_id),'file_name');
			unlink('./resource/project-files/'.$file_name);
			$this->db->delete('files', array('file_id' => $file_id)); 

			$activity = ucfirst($this->username)." deleted a file ".$file_name;
			// Log Activity
					$params = array(
					                'user'				=> $this->user,
					                'module' 			=> 'projects',
					                'module_field_id'	=> $project_id,
					                'activity'			=> $activity,
					                'icon'				=> 'fa-times'
					                );
					modules::run('activity/log',$params); //pass to activitylog module
			$this -> applib -> redirect_to('projects/view/'.$project_id.'/?group=files','success',lang('file_deleted'));

		}else{
			if(isset($_GET['id'])){
				$data['file_id'] = $_GET['id'];
				$data['project_id'] = $this->uri->segment(4);
				$this->load->view('modal/delete_file',$data);
			}			
			
		}
	}

	function _upload_notification($project){
		$project_title = $this -> applib -> get_any_field('projects',array('project_id'=>$project),'project_title');


			$message = $this -> applib ->get_any_field('email_templates',array('email_group' => 'project_file'), 'template_body');

			$uploaded_by = str_replace("{UPLOADED_BY}",$this->username,$message);
			$title = str_replace("{PROJECT_TITLE}",$project_title,$uploaded_by);
			$project_url = str_replace("{PROJECT_URL}",base_url().'projects/view/'.$project.'/?group=files',$title);			
			$message = str_replace("{SITE_NAME}",config_item('company_name'),$project_url);			

			$assigned_to = $this -> applib -> get_any_field('projects',array('project_id'=>$project),'assign_to');			

			if (!empty($assigned_to)) {
				 foreach (unserialize($assigned_to) as $value) { 
					$params['recipient'] = $this -> user_profile -> get_user_details($value,'email');

					$params['subject'] = '[ '.$this->config->item('company_name').' ]'.' '.lang('project_file_uploaded');
					$params['message'] = $message;

					$params['attached_file'] = '';
					var_dump($params);

					//modules::run('fomailer/send_email',$params);
			}
		}
		die();
	}
	
	function _log_activity($project_id,$activity,$icon){
			$this->db->set('module', 'projects');
			$this->db->set('module_field_id', $project_id);
			$this->db->set('user', $this->tank_auth->get_user_id());
			$this->db->set('activity', $activity);
			$this->db->set('icon', $icon);
			$this->db->insert('activities'); 
	}
}

/* End of file files.php */