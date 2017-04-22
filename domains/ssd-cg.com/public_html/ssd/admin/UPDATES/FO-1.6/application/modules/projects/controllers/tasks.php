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


class Tasks extends MX_Controller {

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
		$this -> user_role = $this -> applib->get_any_field('users',array('id'=>$this->user),'role_id');

		$this -> template -> title(lang('projects').' - '.config_item('company_name'). ' '.config_item('version'));
		$this -> page = lang('projects');

        $this->load->model('project_model', 'project');

        $this->tasks_table = 'tasks';
        $this->tasks_timer_table = 'tasks_timer';
        $this->activities_table = 'activities';
        $this->saved_tasks_table = 'saved_tasks';
	}




	function edit()
	{		
		if ($this->input->post()) {

		$project = $this->input->post('project', TRUE);
		$task_id = $this->input->post('task_id', TRUE);
		if ($this->form_validation->run('projects','add_task') == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('task_update_failed'));
				redirect('projects/view/'.$project.'?group=tasks&view=task&id='.$task_id);
		}else{
			$form_data = array(
			                'task_name' => $this->input->post('task_name'),
			                'project' => $this->input->post('project'),
			                'due_date' => $this->input->post('due_date'),
			                'description' => $this->input->post('description'),
			                'estimated_hours' => $this->input->post('estimate'),
			            );
		if ($this -> user_role != '2') {
			if ($this->input->post('visible') == 'on') { $visible = 'Yes'; } else { $visible = 'No'; }
			$form_data['visible'] = $visible;
			$form_data['milestone'] = $this->input->post('milestone');
			$form_data['task_progress'] = $this->input->post('progress');

			if ($this -> user_role == '1') {
			$assign = $this->input->post('assigned_to');
			$this->db->where('task_assigned',$task_id)->delete('assign_tasks');

					foreach ($assign as $key => $value) {				
							$this->db->set('assigned_user',$value);
							$this->db->set('project_assigned',$project);
							$this->db->set('task_assigned',$task_id);
							$this->db->insert('assign_tasks');				
						}
						$assigned_to = serialize($this->input->post('assigned_to'));
						$form_data['assigned_to'] = $assigned_to;
					}
		}
			$this -> db -> where('t_id',$task_id) -> update('tasks', $form_data); 

			if (isset($assigned_to)) {
				if (config_item('notify_task_assignments') == 'TRUE') {
				// Send email notification
				$this->_assigned_notification($project,$this->input->post('task_name'),$assigned_to);
				}
			}		

			$activity = lang('activity_edited_a_task').' '.$this->input->post('task_name');
			$this->_log_activity($project,$activity,$icon='fa-tasks'); //log activity

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', lang('task_update_success'));
			redirect('projects/view/'.$project.'?group=tasks&view=task&id='.$task_id);
		}
	}else{
		$task = $this->uri->segment(4);
		$data['role'] = $this -> user_role;
		$data['fuelux'] = TRUE;
		$data['project'] = $this -> applib->get_any_field($this->tasks_table,array('t_id'=>$task),'project');
		$data['assign_to'] = $this -> applib->get_any_field('projects',array('project_id'=>$data['project']),'assign_to');
		$data['task_details'] = $this -> db -> where(array('t_id'=>$task)) -> get($this->tasks_table) -> result();
		$this->load->view('modal/edit_task',isset($data) ? $data : NULL);
		}
	}



	function add()
	{		
		if ($this->input->post()) {

		$project = $this->input->post('project', TRUE);
		if ($this->form_validation->run('projects','add_task') == FALSE)
		{
			$this -> applib -> redirect_to('projects/view/'.$project.'?group=tasks','error',lang('task_add_failed'));
		}else{
			
		
		$assign = $this->input->post('assigned_to');	
		$assigned_to = 	serialize($this->input->post('assigned_to'));
		$form_data = array(
			                'task_name' => $this->input->post('task_name'),
			                'project' => $this->input->post('project'),
			                'due_date' => $this->input->post('due_date'),
			                'assigned_to' => $assigned_to,
			                'task_progress' => $this->input->post('progress'),
			                'description' => $this->input->post('description'),
			                'estimated_hours' => $this->input->post('estimate'),
			                'added_by' => $this->user,
			            );
		if ($this -> user_role != '2') {
			if ($this->input->post('visible') == 'on') { $visible = 'Yes'; } else { $visible = 'No'; }
			$form_data['visible'] = $visible;
			$form_data['milestone'] = $this->input->post('milestone');
			$form_data['task_progress'] = $this->input->post('progress');
		}else{
			$form_data['visible'] = 'Yes';
		}
			$task_id = $this->db->insert($this->tasks_table, $form_data); 
					
			foreach ($assign as $key => $value) {
				$this->db->set('assigned_user',$value);
				$this->db->set('project_assigned',$project);
				$this->db->set('task_assigned',$task_id);
				$this->db->insert('assign_tasks');				
			}

			if (config_item('notify_task_assignments') == 'TRUE') {
			//send notification to assigned user
				$this->_assigned_notification($project,$this->input->post('task_name'),$assigned_to); 
			
			}
			

			$activity = lang('activity_added_new_task').' '.$this->input->post('task_name');
			$this->_log_activity($project,$activity,$icon='fa-tasks'); //log activity

			$this -> applib -> redirect_to('projects/view/'.$project.'?group=tasks','success',lang('task_add_success'));
		}
			}else{
		$data['project'] = $this->uri->segment(4);
		$this->load->view('modal/add_task',isset($data) ? $data : NULL);
		}
	}



	function add_from_template()
	{		
		if ($this->input->post()) {

			$project = $this->input->post('project', TRUE);

			$template_id = $this->input->post('template_id', TRUE);
			$template_details = $this -> db -> where(array('template_id'=>$template_id)) ->get($this->saved_tasks_table)->result();
			foreach ($template_details as $key => $task) {
				$task_name = $task->task_name;
				$task_desc = $task->task_desc;
				$visible = $task->visible;
				$estimate = $task->estimate_hours?$task->estimate_hours:0;
			}
			$assigned_to = $this -> applib -> get_any_field('projects',array('project_id'=>$project),'assign_to');

			$form_data = array(
			                'task_name' => $task_name,
			                'project' => $project,
			                'assigned_to' => $assigned_to,
			                'visible' => $visible,
			                'task_progress' => 0,
			                'description' => $task_desc,
			                'estimated_hours' => $estimate,
			                'added_by' => $this->user,
			            );
			$this->db->insert($this->tasks_table, $form_data); 

			if (config_item('notify_task_assignments') == 'TRUE') {
			//send notification to assigned user
				$this->_assigned_notification($project,$this->input->post('task_name'),$assigned_to); 
			}
			

			$activity = lang('activity_added_new_task').' '.$this->input->post('task_name');
			$this->_log_activity($project,$activity,$icon='fa-tasks'); //log activity

			$this -> applib -> redirect_to('projects/view/'.$project.'?group=tasks','success',lang('task_add_success'));

	}else{
		$data['project'] = $this->uri->segment(4);
		$data['saved_tasks'] = $this -> db -> get($this->saved_tasks_table) -> result();
		$this->load->view('modal/task_from_templates',isset($data) ? $data : NULL);
	}
	}

	function file()
	{		
		if ($this->input->post()) {
			//file uploading
			$project = $this->input->post('project', TRUE);
			$task = $this->input->post('task', TRUE);
                if ($this->config->item('demo_mode') == 'FALSE') {
                    $config['upload_path'] = './resource/project-files/';
                    $config['allowed_types'] = config_item('allowed_files');
                    $config['max_size']	= $this->config->item('file_max_size');
                    $config['overwrite'] = FALSE;

                    $this->load->library('upload');

                    $this->upload->initialize($config);

                    if(!$this->upload->do_multi_upload("taskfiles")) {
                        $this->session->set_flashdata('response_status', 'error');
                        $this->session->set_flashdata('message',$this->lang->line('operation_failed'));
                        redirect('projects/view/'.$project.'?group=tasks&view=task&id='.$task);
                    } else {

                        $fileinfs = $this->upload->get_multi_upload_data();
                        foreach($fileinfs as $findex=>$fileinf) {
                            $data = array(
                                'task'          => $task,
                                'file_name'		=> $fileinf['file_name'],
                                'file_ext'		=> $fileinf['file_ext'],
                                'original_name'	=> $fileinf['client_name'],
                                'description'	=> '',
                                'uploaded_by'	=> $this->tank_auth->get_user_id(),
                            );
                            $this->db->insert('task_files', $data);

                            $file_id = $this->db->insert_id();
                        }
                        if (config_item('notify_project_files') == 'TRUE') {
							//send notification to assigned user
							$this->_upload_notification($project); 
						}

                        $this->session->set_flashdata('response_status', 'success');
                        $this->session->set_flashdata('message',$this->lang->line('file_uploaded_successfully'));
                        redirect('projects/view/'.$project.'?group=tasks&view=task&id='.$task);
                    }
                }
		}else{
			$this->load->view('modal/task_add_file',isset($data) ? $data : NULL);
		}
	}

	function _upload_notification($project){
		$project_title = $this -> applib -> get_any_field('projects',array('project_id'=>$project),'project_title');


			$message = $this -> applib ->get_any_field('email_templates',array('email_group' => 'project_file'), 'template_body');

			$uploaded_by = str_replace("{UPLOADED_BY}",$this->username,$message);
			$title = str_replace("{PROJECT_TITLE}",$project_title,$uploaded_by);
			$project_url = str_replace("{PROJECT_URL}",base_url().'projects/view/'.$project.'/?group=tasks',$title);			
			$message = str_replace("{SITE_NAME}",config_item('company_name'),$project_url);			

			$assigned_to = $this -> applib -> get_any_field('projects',array('project_id'=>$project),'assign_to');			

			if (!empty($assigned_to)) {
				 foreach (unserialize($assigned_to) as $value) { 
					$params['recipient'] = $this -> user_profile -> get_user_details($value,'email');

					$params['subject'] = '[ '.$this->config->item('company_name').' ]'.' '.lang('task_file_uploaded');
					$params['message'] = $message;

					$params['attached_file'] = '';

					modules::run('fomailer/send_email',$params);
			}
		}
	}

	function tracking()
	{
		$action = ucfirst($this->uri->segment(4));
		$project = $this->uri->segment(5);
		$task = $this->uri->segment(6);
		if ($action == 'Off') {	
		if(!$this->_timer_started_by($task)){
				$this -> applib -> redirect_to($_SERVER["HTTP_REFERER"],'error',lang('timer_not_allowed'));
			}

			$task_start =  $this -> applib->get_any_field($this->tasks_table,array('t_id'=>$task),'start_time'); //task start time
			$task_logged_time =  $this-> applib ->task_time_spent($task); 
			$time_logged = (time() - $task_start) + $task_logged_time; //time already logged

			$this->db->set('timer_status', $action);
			$this->db->set('logged_time', $time_logged);
			$this->db->set('start_time', '');
			$this->db->where('t_id',$task)->update($this->tasks_table);
			$this->_log_timesheet($project,$task,$task_start,time()); //log timesheet
			$message = 'timer_stopped_success';
		}else{
			$this->db->set('timer_status', $action);
			$this->db->set('start_time', time());
			$this->db->set('timer_started_by', $this -> user);
			$this->db->where('t_id',$task)->update($this->tasks_table);
			$message = 'timer_started_success';
		}
		$this -> applib -> redirect_to('projects/view/'.$project.'?group=tasks','success',lang($message));
	}

	function _timer_started_by($task){
		$started_by = $this -> applib->get_any_field($this->tasks_table,array('t_id'=>$task),'timer_started_by');
		if ($started_by == $this->user OR $this->user_role == '1') {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function timesheet()
	{		
		$data['timesheets'] = $this->project->timesheets($this->uri->segment(4));
		$this->load->view('tabs/timesheets',isset($data) ? $data : NULL);
	}
	function tasks()
	{		
		$data['project_tasks'] = $this->project->project_tasks($this->uri->segment(4));
		$this->load->view('tabs/tasks',isset($data) ? $data : NULL);
	}



	function download()
	{

			$file_id = $this->uri->segment(4);
			$this->load->helper('download');
			$file_name = $this -> applib -> get_any_field('task_files',array('file_id'=>$file_id),'file_name');
			if($file_name == ''){
				$this -> applib -> redirect_to($_SERVER["HTTP_REFERER"],'error',lang('operation_failed'));
			}
			if(file_exists('./resource/project-files/'.$file_name)){
			$data = file_get_contents('./resource/project-files/'.$file_name); // Read the file's contents
			force_download($file_name, $data);
			}
	
	}

	 function preview(){
        if (!$this->input->post()) {
            $file_id = $this->uri->segment(4);
            $project_id = $this->uri->segment(5);
            $file =  $this->db->select()
                ->from('task_files')
                ->where('file_id', $file_id)
                ->get()
                ->row();
            if ($file)
            {
                if(file_exists('./resource/project-files/'.$file->file_name)){
                    $data['file'] = $file;
                    $data['project_id'] = $project_id;
                    $this->load->view('modal/preview_task_file', $data);
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
			$project = $this->input->post('project', TRUE);
		
			$task = $this->input->post('task_id');

			$this->db->delete($this->tasks_table, array('t_id' => $task)); 
			$this->db->delete($this->tasks_timer_table, array('task' => $task)); 

			$this -> applib -> redirect_to('projects/view/'.$project.'?group=tasks','success',lang('task_deleted'));
		}else{
			$data['task_id'] = $this->uri->segment(5);
			$data['project'] = $this->uri->segment(4);
			$this->load->view('modal/delete_task',$data);
		}
	}
	function pilot(){
		if ($this->uri->segment(4) == 'on') {
			$status = 'TRUE';
		}else{
			$status = 'FALSE';
		}
			$task = $this->uri->segment(5);
			$project = $this->uri->segment(6)/8600;

			$this->db->set('auto_progress', $status);
			$this->db->where('t_id',$task)->update('tasks');

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', lang('progress_auto_calculated'));
			redirect('projects/view/details/'.$project);
	}

	function _assigned_notification($project,$task_name,$assigned_to){
			$project_title = $this -> applib -> get_any_field('projects',array('project_id'=>$project),'project_title');

			$message = $this -> applib ->get_any_field('email_templates',array('email_group' => 'task_assigned'), 'template_body');

			$task_name = str_replace("{TASK_NAME}",$task_name,$message);
			$assigned_by = str_replace("{ASSIGNED_BY}",$this->username,$task_name);
			$title = str_replace("{PROJECT_TITLE}",$project_title,$assigned_by);
			$link =  str_replace("{PROJECT_URL}",base_url().'projects/view/'.$project.'?group=tasks',$title);
			$message = str_replace("{SITE_NAME}",config_item('company_name'),$link);
			
			if (!empty($assigned_to)) {
				 foreach (unserialize($assigned_to) as $value) { 
			$params['recipient'] = $this -> applib -> get_any_field('users',array('id'=>$value),'email');

			$params['subject'] = '[ '.$this->config->item('company_name').' ]'.' '.lang('task_assigned_subject');
			$params['message'] = $message;		

			$params['attached_file'] = '';
			 modules::run('fomailer/send_email',$params);
			}
		 }
	}

	function _log_timesheet($project,$task,$start_time,$end_time){
			$this->db->set('pro_id', $project);
			$this->db->set('task', $task);
			$this->db->set('user', $this->user);
			$this->db->set('start_time', $start_time);
			$this->db->set('end_time', $end_time);
			$this->db->insert('tasks_timer'); 
	}

	function _log_activity($project,$activity,$icon){
			$this->db->set('module', 'projects');
			$this->db->set('module_field_id', $project);
			$this->db->set('user', $this->user);
			$this->db->set('activity', $activity);
			$this->db->set('icon', $icon);
			$this->db->insert($this->activities_table); 
	}
}

/* End of file tasks.php */