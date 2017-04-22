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


class Projects extends MX_Controller {

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
		$this->user_company = $this -> applib->get_any_field('account_details',array('user_id'=>$this->user),'company');

		$this -> template -> title(lang('projects').' - '.config_item('company_name'). ' '.config_item('version'));
		$this -> page = lang('projects');

        $this->load->model('project_model', 'project');

        $this->projects_table = 'projects';
        $this->clients_table = 'companies';
        $this->activities_table = 'activities';
        $this->comments_table = 'comments';
        $this->users_table = 'users';
        
        if ($this->user_role == '1' OR $this -> applib -> allowed_module('view_all_projects',$this->username)) {
        	$this -> project_list = $this->_admin_projects();
        }elseif ($this->user_role == '3') {
        	$this -> project_list = $this->_staff_projects();
        }else{        	
        	$this -> project_list = $this -> project -> retrieve($this->projects_table,array('client'=>$this->user_company), $limit = NULL, $offset = 0, $sort = NULL);
        }		
		
	}


	function index()
	{
	$data['page'] = $this->page;
	$data['projects'] = $this -> project_list;
	$data['datatables'] = TRUE;
	$data['role'] = $this -> user_role;
	$this->template
	->set_layout('users')
	->build('projects',isset($data) ? $data : NULL);
	}

	function add()
	{
		if($this->_can_add_project() != TRUE){
			$this -> applib -> redirect_to('projects','error',lang('access_denied'));
		}

		if ($this->input->post()) {
			if ($this->form_validation->run('projects','add_project') == FALSE) // Validation ok
			{
				$_POST = ''; // clear POST data and redirect
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('operation_failed'));
				$this->add();
			}else{		
			if ($this->input->post('fixed_rate') == 'on') { $fixed_rate = 'Yes'; } else { $fixed_rate = 'No'; }

			if ($this -> user_role != '2') { // If added by client, just assign admin
				if($this -> user_role == '3'){
					$_POST['assign_to'] = 'a:1:{i:0;s:1:"'.$this->user.'";}';
				}else{
					$_POST['assign_to'] = serialize($this->input->post('assign_to'));
				}
				
			}else{
				$_POST['assign_to'] = 'a:1:{i:0;s:1:"1";}';
				$_POST['client'] = $this->user_company;
				$_POST['progress'] = 0;			
			}

				$this -> db -> insert($this->projects_table,$_POST);
				$project_id = $this -> db -> insert_id();

				// Store assignments in assign_projects table

				$assign = unserialize($_POST['assign_to']);
				$this -> db -> where('project_assigned',$project_id)->delete('assign_projects');
				foreach ($assign as $key => $value) {				
					$this->db->set('assigned_user',$value);
					$this->db->set('project_assigned',$project_id);
					$this->db->insert('assign_projects');
				}

				// Set Fixed Rate
				$data = array('fixed_rate' => $fixed_rate); 
				$this -> db -> where('project_id', $project_id) -> update($this->projects_table, $data);

				// Send email to the assigned users
				if(config_item('notify_project_assignments') == 'TRUE'){
					$this -> _assigned_notification($_POST['assign_to'],$project_id);
				}
				

				$activity = ucfirst($this->username).' '.lang('activity_added_new_project').' #'.$_POST['project_code'];
				$this->_log_activity($activity,$this->user,'projects',$project_id,$icon = 'fa-coffee'); //log activity

				$this -> applib -> redirect_to('projects/view/'.$project_id.'?group=dashboard','success',lang('project_added_successfully'));
			}
		}else{
		$data['page'] = $this->page;
		$data['form'] = TRUE;
		$data['role'] = $this -> user_role;
		$data['datepicker'] = TRUE;
		$data['set_fixed_rate'] = TRUE;
		$data['projects'] = $this -> project_list;
		$data['assign_to'] = $this -> db -> where('role_id !=',2) -> get($this->users_table)->result();
		$data['clients'] = $this -> db -> where('co_id >',0) -> get($this->clients_table)->result();
		$this->template
		->set_layout('users')
		->build('create_project',isset($data) ? $data : NULL);
		}
	}

	function _can_add_project(){
		if ($this -> applib -> allowed_module('add_projects',$this->username)){
			return TRUE;
		}elseif ( $this->user_role == '1') {
			return TRUE;
		}elseif ($this->user_role == '2' AND config_item('client_create_project') == 'TRUE') {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function view($project = NULL)
	{		
		$this->_check_owner($this -> user_role,$this->user_company,$project);

		$data['page'] = lang('projects');
		$data['datatables'] = TRUE;
		$data['fuelux'] = TRUE;
		$data['role'] = $this -> user_role;
		$data['group'] = $this->input->get('group', TRUE)?$this->input->get('group', TRUE):'dashboard';
		if(isset($_GET['action']) ? $_GET['action'] : '' == 'edit'){
		$data['form'] = TRUE;
		$data['datepicker'] = TRUE;
		$data['set_fixed_rate'] = TRUE;
		}
		if($data['group'] == 'calendar'){ $data['calendar'] = TRUE; }
		$data['project_details'] = $this -> project -> retrieve($this->projects_table,array('project_id'=>$project), $limit = NULL, $offset = 0, $sort = 	NULL);

		
		$this->template
		->set_layout('users')
		->build('details',isset($data) ? $data : NULL);
	}

	function edit()
	{
		$project_id = $this->input->post('project_id');	
		$this -> _can_edit_project($this -> user_role,$this->user_company,$project_id);

		if ($this->input->post()) {
		
		
		if ($this->form_validation->run('projects','edit_project') == FALSE)
		{
			$_POST = '';
			$this -> applib -> redirect_to('projects/view/'.$project_id.'?group=dashboard&action=edit','error',lang('error_in_form'));
		}else{	
			if ($this->input->post('fixed_rate') == 'on') { $fixed_rate = 'Yes'; } else { $fixed_rate = 'No'; }	

			$assign = $this->input->post('assign_to');
			$this -> db -> where('project_assigned',$project_id)->delete('assign_projects');
			foreach ($assign as $key => $value) {				
				$this->db->set('assigned_user',$value);
				$this->db->set('project_assigned',$project_id);
				$this->db->insert('assign_projects');				
			}
			$_POST['assign_to'] = serialize($assign);

			$this -> AppModel -> update($this->projects_table,$_POST,$where = array('project_id' => $project_id));
			// Set Fixed Rate
			$data = array('fixed_rate' => $fixed_rate); 
			$this->db->where('project_id', $project_id)->update('projects', $data);

			// Send email to the assigned users
			if(config_item('notify_project_assignments') == 'TRUE'){
				$this -> _assigned_notification($_POST['assign_to'],$project_id);
			}

			$activity = ucfirst($this->username).lang('activity_edited_a_project').$this->input->post('project_code');

			$this->_log_activity($activity,$this->user,'projects',$project_id,$icon = 'fa-coffee'); //log activity

			if ($this->input->post('progress') == '100') {
				$this->_project_complete($project_id);
			}

			$this -> applib -> redirect_to('projects/view/'.$project_id.'?group=dashboard&action=edit','success',lang('project_edited_successfully'));
		}
		}else{
			$this -> applib -> redirect_to('projects','error',lang('error_in_form'));
		}
	}

	function copy_project($project = NULL)
	{		
		if ($this->input->post()) {

		$project = $this->input->post('project', TRUE);

		$this->form_validation->set_rules('project', 'Project', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this -> applib -> redirect_to('projects/view/'.$project.'?group=dashboard','error',lang('project_copy_failed'));
		}else{

		$project_code = $this -> applib->get_any_field('projects',array('project_id'=>$project),'project_code');

		$new_code = filter_var($project_code,FILTER_SANITIZE_NUMBER_INT)+1 ;
		
		$project_info = $this -> db -> where(array('project_id'=>$project)) -> get($this->projects_table) ->result();
		foreach ($project_info as $key => $i) {
			
		}
		$insert = array(
		                	'project_code' => $new_code,
		                	'project_title' => $i->project_title,
		                	'client'		=> $i->client,
		                	'start_date' 	=> $i->start_date,
		                	'due_date'		=> $i->due_date,
		                	'fixed_rate'	=> $i->fixed_rate,
		                	'hourly_rate'	=> $i->hourly_rate,
		                	'fixed_price'	=> $i->fixed_price,
		                	'progress'		=> $i->progress,
		                	'notes'			=> $i->notes,
		                	'assign_to'		=> $i->assign_to,
		                	'status'		=> $i->status,
		                	'settings'		=> $i->settings,
		                	'estimate_hours'=> $i->estimate_hours,
		                	'date_created'	=> $i->date_created
		                );
		
		$this -> db -> insert($this->projects_table,$insert);
		$new_project_id = $this -> db -> insert_id();

			$activity = lang('activity_copied_project').' '.$i->project_code;
			$this->_log_activity($activity,$this->user,'projects',$new_project_id,$icon = 'fa-copy'); //log activity

			$this -> applib -> redirect_to('projects/view/'.$new_project_id.'?group=dashboard','success',lang('project_copied'));
		}
			}else{
		$data['project'] = $project;
		$this->load->view('modal/clone_project',isset($data) ? $data : NULL);
		}
	}

	function settings(){
		$this -> _can_edit_project($this -> user_role,$this->user_company,$_POST['project_id']); // can edit project

		if ($_POST) {
			 $settings = json_encode($_POST);
			 $data = array(
			              'settings' => $settings);			
			 $this -> db -> where(array('project_id' => $_POST['project_id'])) -> update($this->projects_table,$data);

			 $this->session->set_flashdata('response_status', 'success');
			 $this->session->set_flashdata('message', lang('settings_updated_successfully'));
			redirect(base_url().'projects/view/'.$_POST['project_id'].'?group=settings');
		}else{
			$this->index();
		}
	
	}

	function team($project = NULL)
	{		
		if ($this->input->post()) {

		$project = $this->input->post('project', TRUE);

		$this->form_validation->set_rules('project', 'Project', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this -> applib -> redirect_to('projects/view/'.$project.'?group=teams','error',lang('error_in_form'));
		}else{
			$assigned = serialize($this->input->post('assigned_to'));
			$db_array = array(
		                	'assign_to' => $assigned
		                );
		
			$this -> db -> where('project_id',$project) -> update($this->projects_table,$db_array);

			// Send email to assigned members
			$this -> _assigned_notification($assigned,$project);

			$activity = lang('activity_edited_team');
			$this->_log_activity($activity,$this->user,'projects',$project,$icon = 'fa-group'); //log activity

			$this -> applib -> redirect_to('projects/view/'.$project.'/?group=teams','success',lang('project_team_updated'));
				}
			}else{
		$data['project'] = $project;
		$data['role'] = $this -> user_role;
		$this->load->view('modal/edit_team',isset($data) ? $data : NULL);
		}
	}

	function invoice($project = NULL)
	{		
		if ($this->input->post()) {

		$project = $this->input->post('project', TRUE);

		$this->form_validation->set_rules('project', 'Project', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this -> applib -> redirect_to('projects/view/'.$project.'?group=dashboard','error',lang('invoice_not_created'));
		}else{
		$this->load->helper('string');
		$reference_no = 'INV'.random_string('nozero', 6);

		if(config_item('increment_invoice_number') == 'TRUE'){
				$reference_no = 'INV'.$this -> applib -> generate_invoice_number();
			}
		
		$project_info = $this -> db -> where(array('project_id'=>$project)) -> get($this->projects_table) ->result();
		foreach ($project_info as $key => $i) {
			
		}
		$project_cost = $this -> applib -> pro_calculate('project_cost',$project);
		$project_hours = $this -> applib -> pro_calculate('project_hours',$project);
		$fixed_rate = $this -> applib-> get_any_field('projects',array('project_id'=>$project),'fixed_rate');

		if($fixed_rate == 'Yes'){
			$project_rate = $this -> applib->get_any_field('projects',array('project_id'=>$project),'fixed_price');
		}else{
			$project_rate = $this -> applib->get_any_field('projects',array('project_id'=>$project),'hourly_rate');
		}
		$invoice = array(
		                	'reference_no' => $reference_no,
		                	'tax'			=> 0,
		                	'client'		=> $i->client,
		                	'currency' 	=> config_item('default_currency'),
		                	'due_date'		=> $i->due_date,
		                );		
		$this -> db -> insert('invoices',$invoice);
		$invoice_id = $this -> db -> insert_id();

		$items = array(
		                	'invoice_id' => $invoice_id,
		                	'item_name'	 => 'Project Code: '.$i->project_code,
		                	'item_desc'	=> $i->project_title.' bill for '.$project_hours.' '.lang('hours'),
		                	'unit_cost'	=> $project_rate,
		                	'quantity'	=> $project_hours,
		                	'total_cost' => $project_cost
		                );		
		$this -> db -> insert('items',$items);

			$activity = lang('invoiced_project').' '.$i->project_code;
			$this->_log_activity($activity,$this->user,'projects',$project,$icon = 'fa-money'); //log activity

			$this -> applib -> redirect_to('invoices/view/'.$invoice_id,'success',lang('invoice_created_successfully'));
		}
			}else{
		$data['project'] = $project;
		$this->load->view('modal/invoice_project',isset($data) ? $data : NULL);
		}
	}

	function search()
	{
	if ($this->input->post()) {
	$this->load->module('layouts');
	$this->load->library('template');
	$this->template->title(lang('projects').' - '.$this->config->item('company_name'). ' '. $this->config->item('version'));
	$data['page'] = lang('projects');
	$keyword = $this->input->post('keyword', TRUE);
	$data['projects'] = $this->project_model->search_project($keyword);
	$this->template
	->set_layout('users')
	->build('projects',isset($data) ? $data : NULL);
	}else{
			redirect('projects/view_projects/all');
		}
	}

	
	function comment()
	{
		if ($this->input->post()) {
			$project_id = $this->input->post('project');	
			$form_data = array(
			                'project' => $project_id,
			                'posted_by' => $this->user,
			                'message' => $this->input->post('comment')
			            );
			$this->db->insert($this->comments_table, $form_data); 

			 $activity = 'Added a comment to Project';
				$params = array(
					                'user'				=> $this->user,
					                'module' 			=> 'projects',
					                'module_field_id'	=> $project_id,
					                'activity'			=> $activity,
					                'icon'				=> 'fa-comment'
					                );
					modules::run('activity/log',$params); //pass to activitylog module

			if (config_item('notify_project_comments') == 'TRUE') {
				$this->_comment_notification($project_id); //send notification to the administrator
			}

			

			$this -> applib -> redirect_to('projects/view/'.$project_id.'/?group=comments','success',lang('comment_successful'));

			}else{
				redirect('projects');
		}
	}


	function replies()
	{
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('message', 'Message', 'required');
		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('comment_failed'));
				redirect('projects/view/details/'.$this->input->post('project',TRUE));
		}else{		
		$project_id = $this->input->post('project');	
			$form_data = array(
			                'parent_comment' => $this->input->post('comment', TRUE),
			                'reply_msg' => $this->input->post('message'),
			                'replied_by' => $this->tank_auth->get_user_id()
			            );
			$this->db->insert('comment_replies', $form_data); 

			$this->_comment_notification($project_id); //send notification to the administrator

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', lang('comment_replied_successful'));
			redirect('projects/view/details/'.$this->input->post('project',TRUE));
			}
		}else{
		$data['comment'] = $this->input->get('c', TRUE);
		$data['project'] = $this->input->get('p', TRUE);
		$this->load->view('modal/comment_reply',isset($data) ? $data : NULL);
		}
	}

	function download($project = NULL)
	{

		if (isset($_GET['id'])) {
			$file_id = $this->input->get('id', TRUE);
			$this->load->helper('download');
			$file_name = $this -> applib -> get_any_field('files',array('file_id'=>$file_id),'file_name');
			if($file_name == ''){
				$this -> applib -> redirect_to($_SERVER["HTTP_REFERER"],'error',lang('operation_failed'));
			}
			if(file_exists('./resource/project-files/'.$file_name)){
			$data = file_get_contents('./resource/project-files/'.$file_name); // Read the file's contents
			force_download($file_name, $data);
		}else{
			 $this -> applib -> redirect_to($_SERVER["HTTP_REFERER"],'error',lang('operation_failed'));
			}
		}
	
	}

	function tracking()
	{
		$action = ucfirst($this->uri->segment(3));
		$project = $this->uri->segment(4);
		$timer_msg = '';
		if ($action == 'Off') {	
			if(!$this->_timer_started_by($project)){
				$this -> applib -> redirect_to($_SERVER["HTTP_REFERER"],'error',lang('timer_not_allowed'));
			}		
			$project_start = $this -> applib->get_any_field($this->projects_table,array('project_id'=>$project),'timer_start'); 
			$project_logged_time =  $this -> applib -> pro_calculate('project_hours',$project);
			$time_logged = (time() - $project_start) + $project_logged_time; //time already logged

			$this->db->set('timer', $action);
			$this->db->set('time_logged', $time_logged);
			$this->db->set('timer_start', '');
			$this->db->where('project_id',$project)->update($this->projects_table);
			$this->_log_timesheet($project,$project_start,time()); //log activity
			$timer_msg = 'timer_stopped_success';

		}else{
			$this->db->set('timer', $action);
			$this->db->set('timer_started_by', $this -> user);
			$this->db->set('timer_start', time());
			$this->db->where('project_id',$project)->update($this->projects_table);
			$timer_msg = 'timer_started_success';
		}
		$this -> applib -> redirect_to($_SERVER["HTTP_REFERER"],'success',lang($timer_msg));
	}

	function _timer_started_by($project){
		$started_by = $this -> applib->get_any_field($this->projects_table,array('project_id'=>$project),'timer_started_by');
		if ($started_by == $this->user OR $this->user_role == '1') {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function _project_complete($project) {
			$client = $this -> applib ->get_any_field($this->projects_table,array('project_id'=>$project),'client');

			$project_title = $this -> applib ->get_any_field($this->projects_table,array('project_id'=>$project),'project_title');
			$project_code = $this -> applib ->get_any_field($this->projects_table,array('project_id'=>$project),'project_code');
			$project_hours = $this -> applib -> pro_calculate('project_hours',$project);
			$project_cost = config_item('default_currency').' '.$this -> applib -> pro_calculate('project_cost',$project);

			$company_name = $this -> applib ->get_any_field($this->clients_table,array('co_id'=>$client),'company_name');

			$message = $this -> applib ->get_any_field('email_templates',array('email_group' => 'project_complete'), 'template_body');

			$ClientName = str_replace("{CLIENT_NAME}",$company_name,$message);
			$ProjectTitle = str_replace("{PROJECT_TITLE}",$project_title,$ClientName);
			$ProjectCode = str_replace("{PROJECT_CODE}",$project_code,$ProjectTitle);
			$link = str_replace("{PROJECT_URL}",base_url().'projects/view/'.$project,$ProjectCode);
			$ProjectHours = str_replace("{PROJECT_HOURS}",$project_hours,$link);
			$ProjectCost = str_replace("{PROJECT_COST}",$project_cost,$ProjectHours);

			$message = str_replace("{SITE_NAME}",$this->config->item('company_name'),$ProjectCost);

			$params['recipient'] = $this -> applib ->get_any_field($this->clients_table,array('co_id'=>$client),'company_email');

			$params['subject'] = '[ '.$this->config->item('company_name').' ] '.' '.lang('project_complete_subject');	
			$params['message'] = $message;
			
			
			$params['attached_file'] = '';
			var_dump($params);
			die();

			modules::run('fomailer/send_email',$params);

	}

	function delete()
	{
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('project_id', 'Project ID', 'required');
		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('delete_failed'));
				redirect('projects');
		}else{	
		$project = $this->input->post('project_id');

			$this->db->delete('projects', array('project_id' => $project)); 
			$this->db->delete('comments', array('project' => $project)); 
			$this->db->delete('activities', array('module' => 'projects','module_field_id' => $project)); 
			$this->db->delete('project_timer', array('project' => $project)); 
			$this->db->delete('tasks', array('project' => $project)); 
			$this->db->delete('tasks_timer', array('pro_id' => $project)); 
			$this->db->delete('bugs', array('project' => $project)); 
			// Delete project files
			$files = $this -> db -> where('project',$project) -> get('files') -> result();
			foreach ($files as $key => $f) {
				unlink('./resource/project-files/'.$f->file_name);
			}

			$this->db->delete('files', array('project' => $project));

			$this -> applib -> redirect_to('projects','success',lang('project_deleted_successfully'));
		}
		}else{
			$data['project_id'] = $this->uri->segment(3);
			$this->load->view('modal/delete_project',$data);
		}
	}
	function delcomment()
	{
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('comment', 'Comment ID', 'required');
		$this->form_validation->set_rules('project', 'Project ID', 'required');
		$project_id = $this->input->post('project', TRUE);
		$comment_id = $this->input->post('comment', TRUE);

		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('comment_delete_failed'));
				redirect('projects/view/'.$project_id);
		}else{	
		$this->db->delete('comments', array('comment_id' => $comment_id)); 		
			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', lang('comment_deleted'));
			redirect('projects/view/'.$project_id);
			}
		}else{
			$data['comment_id'] = $this->input->get('c', TRUE);
			$data['project_id'] = $this->input->get('p', TRUE);
			$this->load->view('modal/delete_comment',$data);
		}
	}
	function timelog()
	{		
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('logged_time', 'Logged Time', 'required');

		$project = $this->input->post('project', TRUE);

		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('time_entered_failed'));
				redirect('projects/view/'.$project);
		}else{	
			$project_logged_time =  $this->project_model->get_project_logged_time($project); 
			$time_logged = $project_logged_time + ($this->input->post('logged_time', TRUE) *3600); //time already logged

			$this->db->set('time_logged', $time_logged);
			$this->db->where('project_id',$project)->update('projects'); 
		}

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', lang('time_entered_success'));
			redirect('projects/view/'.$project);
	}else{
		$data['logged_time'] =  $this->project_model->get_project_logged_time($this->uri->segment(3)/8600); 
		$data['project_details'] = $this->project_model->project_details($this->uri->segment(3)/8600);
		$this->load->view('modal/time_entry',isset($data) ? $data : NULL);
		}
	}



	function _comment_notification($project){

			$project_title = $this -> applib -> get_any_field($this->projects_table,array('project_id'=>$project),'project_title');
			$teams = $this -> applib -> get_any_field($this->projects_table,array('project_id'=>$project),'assign_to');


			$message = $this -> applib ->get_any_field('email_templates',array('email_group' => 'project_comment'), 'template_body');

			$posted_by = str_replace("{POSTED_BY}",$this->username,$message);
			$title = str_replace("{PROJECT_TITLE}",$project_title,$posted_by);
			$link =  str_replace("{COMMENT_URL}",base_url().'projects/view/'.$project.'?group=comments',$title);
			$message = str_replace("{SITE_NAME}",config_item('company_name'),$link);
			
			if (!empty($teams)) {
				 foreach (unserialize($teams) as $user) { 
			$params['recipient'] = $this -> applib -> get_any_field('users',array('id'=>$user),'email');

			$params['subject'] = '[ '.config_item('company_name').' ]'.' '.lang('project_comment_subject');
			$params['message'] = $message;		

			$params['attached_file'] = '';

			modules::run('fomailer/send_email',$params);
			}

		 }
	}

	function _assigned_notification($assigned_to,$project){
			$project_title = $this -> applib -> get_any_field('projects',array('project_id'=>$project),'project_title');


			$message = $this -> applib ->get_any_field('email_templates',array('email_group' => 'project_assigned'), 'template_body');

			$assigned_by = str_replace("{ASSIGNED_BY}",$this->username,$message);
			$title = str_replace("{PROJECT_TITLE}",$project_title,$assigned_by);
			$link =  str_replace("{PROJECT_URL}",base_url().'projects/view/'.$project,$title);
			$message = str_replace("{SITE_NAME}",config_item('company_name'),$link);
			
			if (!empty($assigned_to)) {
				 foreach (unserialize($assigned_to) as $value) { 
			$params['recipient'] = $this -> applib -> get_any_field('users',array('id'=>$value),'email');

			$params['subject'] = '[ '.config_item('company_name').' ]'.' '.lang('project_assigned_subject');
			$params['message'] = $message;		

			$params['attached_file'] = '';

			modules::run('fomailer/send_email',$params);
			}
		 }
	}

	function pilot(){
		if ($this->uri->segment(3) == 'on') {
			$status = 'TRUE';
		}else{
			$status = 'FALSE';
		}
			$project = $this->uri->segment(4)/8600;

			$this->db->set('auto_progress', $status);
			$this->db->where('project_id',$project)->update('projects');

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', lang('progress_auto_calculated'));
			redirect('projects/view/details/'.$project);
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
			$this->db->set('user', $this->user);
			$this->db->set('end_time', $end_time);
			$this->db->insert('project_timer'); 
	}

	function _admin_projects(){
		 return $this -> project -> retrieve($this->projects_table,array('project_id !='=>'0'), $limit = NULL, $offset = 0, $sort = NULL);
	}


	function _staff_projects(){
		$this -> db -> join('assign_projects','assign_projects.project_assigned = projects.project_id');
		return $this -> db -> where('assigned_user', $this -> user) -> get($this->projects_table) -> result();
	}

	function _can_edit_project($role,$company,$project){
		if ($role == '1' OR $this -> applib -> allowed_module('edit_all_projects',$this->username)) {
			return TRUE;
		}else{
			$this -> applib -> redirect_to('projects','error',lang('access_denied'));	
		}
	}


	function _check_owner($role,$company,$project){
		$project_client = $this -> applib->get_any_field('projects',array('project_id'=>$project),'client');
		if ($role == '1' OR $company == $project_client OR $this -> applib -> allowed_module('view_all_projects',$this->username) OR $this->_assigned_project($project)) {
			return TRUE;
		}else{
			$this -> applib -> redirect_to('projects','error',lang('access_denied'));	
		}
	}

	function _assigned_project($project){
		$assigned = $this -> db -> where(array('assigned_user'=>$this -> user,'project_assigned' => $project)) -> get('assign_projects') -> num_rows();
		if ($assigned > 0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}
}

/* End of file projects.php */