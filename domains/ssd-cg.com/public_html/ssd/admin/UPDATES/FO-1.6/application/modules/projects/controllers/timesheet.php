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


class Timesheet extends MX_Controller {

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
        $this->tasks_table = 'tasks';
        $this->clients_table = 'companies';
        $this->activities_table = 'activities';
        $this->comments_table = 'comments';
        $this->project_timer_table = 'project_timer';
        $this->task_timer_table = 'tasks_timer';

		$this -> project_list = $this -> project -> retrieve($this->projects_table,array('project_id !='=>'0'), $limit = NULL, $offset = 0, $sort = NULL);
		
	}

	function add_time()
	{
		if ($this->input->post()) {				

		$start_time = strtotime($_POST['start_time']);
		$end_time = strtotime($_POST['end_time']);
		$time_spent = $end_time - $start_time;
			if($_POST['cat'] == 'tasks'){
				if ($this->form_validation->run('projects','add_task_time') == FALSE)
					{
						$this->session->set_flashdata('response_status', 'error');
						$this->session->set_flashdata('message', lang('error_in_form'));
						redirect($_SERVER['HTTP_REFERER']);

					}else{
				$task_timer = array(
			                'task' => $_POST['task'],
			                'pro_id' => $_POST['project'],
			                'start_time' => $start_time,
			                'end_time' => $end_time,
			                'user' => $this -> user
			                );			
				$this -> db -> insert($this -> task_timer_table,$task_timer);

				$logged_time = $this -> applib->get_any_field('tasks',array('t_id'=>$_POST['task']),'logged_time');
				$this -> db -> set('logged_time',$time_spent+$logged_time) -> where(array('t_id'=>$_POST['task'])) -> update($this -> tasks_table);
				} // Insert time validation ok

				}else{
					$project_timer = array(
			                'project' => $_POST['project'],
			                'start_time' => $start_time,
			                'user' => $this -> user,
			                'end_time' => $end_time
			                );
				$this -> db -> insert($this -> project_timer_table,$project_timer);
				$logged_time = $this -> applib->get_any_field('projects',array('project_id'=>$_POST['project']),'time_logged');
				$this -> db -> set('time_logged',$time_spent+$logged_time) -> where(array('project_id'=>$_POST['project'])) -> update($this -> projects_table);
			}

			$this -> applib -> redirect_to('projects/view/'.$_POST['project'].'/?group=timesheets&cat='.$_POST['cat'],'success',lang('time_logged_successfully'));
		 // Passed validation

		}else{
			$data['project'] = $this->uri->segment(4);
			$data['cat'] = isset($_GET['cat']) ? $_GET['cat'] : 'projects';
			$this->load->view('modal/add_time', isset($data) ? $data : NULL);
		}
	}
	function edit()
	{
		if ($this->input->post()) {	
		$start_time = strtotime($_POST['start_time']);
		$end_time = strtotime($_POST['end_time']);
		$time_spent = $end_time - $start_time;
		if($_POST['cat'] == 'tasks'){
			$task_timer = array(
			                'task' => $_POST['task'],
			                'pro_id' => $_POST['project'],
			                'start_time' => $start_time,
			                'end_time' => $end_time,
			                'user' => $this -> user
			                );			
			$this -> db -> where('timer_id',$_POST['timer_id']) -> update($this -> task_timer_table,$task_timer);				
				}else{
			$project_timer = array(
			                'project' => $_POST['project'],
			                'start_time' => $start_time,
			                'user' => $this -> user,
			                'end_time' => $end_time
			                );
			$this -> db -> where('timer_id',$_POST['timer_id']) -> update($this -> project_timer_table,$project_timer);			
			}

			$this -> applib -> redirect_to('projects/view/'.$_POST['project'].'/?group=timesheets&cat='.$_POST['cat'],'success',lang('time_logged_successfully'));
		}else{
			$cat = isset($_GET['cat']) ? $_GET['cat'] : '';
			$timer_id = isset($_GET['id']) ? $_GET['id'] : '';
			$data['project'] = $this->uri->segment(4);
			$data['timer_id'] = $timer_id;
			$data['cat'] = $cat;
			if($cat == 'tasks'){ 
				$data['info'] = $this->db->where('timer_id',$timer_id)->get($this->task_timer_table)->result(); 
			}else{ 
				$data['info'] = $this->db->where('timer_id',$timer_id)->get($this->project_timer_table)->result();
			}
			$this->load->view('modal/edit_time', isset($data) ? $data : NULL);
		}
	}

	function delete()
	{
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('project', 'Project ID', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this -> applib -> redirect_to('projects/view/'.$_POST['project'].'/?group=timesheets&cat='.$_POST['cat'],'error',lang('delete_failed'));
		}else{	
			$project = $this->input->post('project');

			if ($_POST['cat'] == 'tasks') {
				$this -> db->delete($this->task_timer_table, array('timer_id' => $this->input->post('timer_id'))); 
				}else{
				$this->db->delete($this->project_timer_table, array('timer_id' => $this->input->post('timer_id'))); 
			}
			$this -> applib -> redirect_to('projects/view/'.$project.'/?group=timesheets&cat='.$_POST['cat'],'success',lang('time_deleted_successfully'));
			}
		}else{
			$cat = isset($_GET['cat']) ? $_GET['cat'] : '';
			$timer_id = isset($_GET['id']) ? $_GET['id'] : '';

			$data['project'] = $this->uri->segment(4);
			$data['timer_id'] = $timer_id;
			$data['cat'] = $cat;
			$this->load->view('modal/delete_time',$data);
		}
	}

	function _comment_notification($project){
			$project_title = $this->user_profile->get_project_details($project,'project_title');
			$project_manager = $this->user_profile->get_project_details($project,'assign_to');

			$posted_by = $this->user_profile->get_user_details($this->tank_auth->get_user_id(),'username');
			$data['project_title'] = $project_title;
			$data['posted_by'] = $posted_by;

			$params['recipient'] = $this->user_profile->get_user_details($project_manager,'email');

			$params['subject'] = '[ '.$this->config->item('company_name').' ]'.' New comment received from '.$posted_by;
			$params['message'] = $this->load->view('email/comment_notification',$data,TRUE); 

			$params['attached_file'] = '';

			modules::run('fomailer/send_email',$params);
	}

	function _log_activity($activity,$user,$module,$module_field_id,$icon){
		
					$params = array(
					                'user'				=> $user,
					                'module' 			=> $module,
					                'module_field_id'	=> $module_field_id,
					                'activity'			=> $activity,
					                'icon'				=> $icon
					                );
					modules::run('activity/log',$params); //pass to activitylog module
	}
	function _log_timesheet($project,$start_time,$end_time){
			$this->db->set('project', $project);
			$this->db->set('start_time', $start_time);
			$this->db->set('end_time', $end_time);
			$this->db->insert('project_timer'); 
	}
}

/* End of file projects.php */