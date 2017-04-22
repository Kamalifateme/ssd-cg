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


class Bugs extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this -> load -> module('layouts');	
		$this->load->library(array('tank_auth','template','form_validation'));
		$this -> form_validation -> set_error_delimiters('<span style="color:red">', '</span><br>');

		$this -> user = $this->tank_auth->get_user_id();
		$this -> username = $this -> tank_auth -> get_username(); // Set username
		$this -> user_role = $this -> applib->get_any_field('users',array('id'=>$this->user),'role_id');
		if (!$this -> user) {
			$this -> applib -> redirect_to('auth/login','error',lang('access_denied'));			
		}
		$this -> template -> title(lang('projects').' - '.config_item('company_name'). ' '.config_item('version'));
		$this -> page = lang('projects');

        $this->load->model('project_model', 'project');

        $this->projects_table = 'projects';
        $this->bugs_table = 'bugs';
        $this->activities_table = 'activities';
        $this->bug_comments_table = 'bug_comments';
        $this->bug_files_table = 'bug_files';

		// $this -> bug_list = $this -> project -> retrieve($this->projects_table,array('project_id !='=>'0'), $limit = NULL, $offset = 0, $sort = NULL);
		
	}

	function add()
	{
		if ($this->input->post()) {	
		
		if ($this -> user_role != '1') { $_POST['reporter'] = $this->user; }
		if ($this -> user_role != '1') { $_POST['assigned_to'] = '-'; }
		
				$this -> db -> insert($this -> bugs_table,$_POST);
				$bug_id = $this -> db ->insert_id();
					// Log Activity
				$activity = 'Added an Issue #'.$this->input->post('issue_ref');
				$params = array(
					                'user'				=> $this->user,
					                'module' 			=> 'projects',
					                'module_field_id'	=> $_POST['project'],
					                'activity'			=> $activity,
					                'icon'				=> 'fa-bug'
					                );
					modules::run('activity/log',$params); //pass to activitylog module

					if(config_item('notify_bug_assignment') == 'TRUE' AND $this -> user_role == '1'){
						$this -> _notify_assigned_bug($bug_id);
					}

					$this -> _reported_notification($bug_id);

			$this -> applib -> redirect_to('projects/view/'.$_POST['project'].'/?group=bugs','success',lang('bug_assigned_successfully'));
		}else{			
			$data['role'] = $this->user_role;
			$data['project'] = $this->uri->segment(4);
			$this->load->view('modal/add_bug', isset($data) ? $data : NULL);
		}
	}

	function _notify_assigned_bug($bug){

			$message = $this -> applib ->get_any_field('email_templates',array('email_group' => 'bug_assigned'),'template_body');

			$assigned_user = $this -> applib ->get_any_field($this->bugs_table,array('bug_id' => $bug),'assigned_to');
			$email = $this -> applib ->get_any_field('users',array('id' => $assigned_user),'email');

			$issue_title = $this -> applib ->get_any_field($this->bugs_table,array('bug_id' => $bug),'issue_title');
			$issue_project = $this -> applib ->get_any_field($this->bugs_table,array('bug_id' => $bug),'project');
			$project_title = $this -> applib ->get_any_field($this->projects_table,array('project_id' => $issue_project),'project_title');

			
			$issue_title = str_replace("{ISSUE_TITLE}",$issue_title,$message);
			$assigned_by =  str_replace("{ASSIGNED_BY}",ucfirst($this->username),$issue_title);
			$issue_project_title = str_replace("{PROJECT_TITLE}",$project_title,$assigned_by);
			$site_url = str_replace("{SITE_URL}",base_url(),$issue_project_title);
			$message = str_replace("{SITE_NAME}",config_item('company_name'),$site_url);

			
			$params['recipient'] = $email;

			$params['subject'] = '[ '.config_item('company_name').' ]'.' '.lang('assigned_bug_subject');
			$params['message'] = $message;		

			$params['attached_file'] = '';

			modules::run('fomailer/send_email',$params);

	}

	function _reported_notification($bug){
			$issue_title = $this -> applib -> get_any_field($this->bugs_table,array('bug_id'=>$bug),'issue_title');
			$project = $this -> applib -> get_any_field($this->bugs_table,array('bug_id'=>$bug),'project');


			$message = $this -> applib ->get_any_field('email_templates',array('email_group' => 'bug_reported'), 'template_body');

			$title = str_replace("{ISSUE_TITLE}",$issue_title,$message);
			$added_by = str_replace("{ADDED_BY}",$this->username,$title);
			$project_url = str_replace("{BUG_URL}",base_url().'projects/view/'.$project.'?group=bugs&view=bug&id='.$bug,$added_by);			
			$message = str_replace("{SITE_NAME}",config_item('company_name'),$project_url);			

			$assigned_to = $this -> applib -> get_any_field($this->bugs_table,array('bug_id'=>$bug),'assigned_to');

			$params['recipient'] = $this -> user_profile -> get_user_details($assigned_to,'email');

			$params['subject'] = '[ '.$this->config->item('company_name').' ]'.' '.lang('new_bug_reported_subject');
			$params['message'] = $message;

			$params['attached_file'] = '';

			modules::run('fomailer/send_email',$params);
	}

	function edit()
	{
		if ($this->input->post()) {	

				$_POST['last_modified'] = date("Y-m-d H:i:s");
		
				$this -> db -> where('bug_id',$_POST['bug_id']) -> update($this -> bugs_table,$_POST);
					// Log Activity
					$activity = 'Edited an Issue #'.$this->input->post('issue_ref');
					$params = array(
					                'user'				=> $this->user,
					                'module' 			=> 'projects',
					                'module_field_id'	=> $_POST['project'],
					                'activity'			=> $activity,
					                'icon'				=> 'fa-edit'
					                );
					modules::run('activity/log',$params); //pass to activitylog module

			$this -> applib -> redirect_to('projects/view/'.$_POST['project'].'/?group=bugs&view=bug&id='.$_POST['bug_id'],'success',lang('bug_assigned_successfully'));
		}else{
			$data['role'] = $this->user_role;
			$bug_id = isset($_GET['id']) ? $_GET['id'] : '';
			$data['project'] = $this->uri->segment(4);
			$data['bug'] = $bug_id;
			$data['bug_info'] = $this -> db ->where('bug_id',$bug_id)->get($this->bugs_table)->result();
			$this->load->view('modal/edit_bug', isset($data) ? $data : NULL);
		}
	}

	function file()
	{		
		if ($this->input->post()) {
			$project = $this->input->post('project', TRUE);
			$bug = $this->input->post('bug', TRUE);
			$description = $this->input->post('description', TRUE);

			if ($this->config->item('demo_mode') == 'FALSE') {
                    $config['upload_path'] = './resource/bug-files/';
                    $config['allowed_types'] = config_item('allowed_files');
                    $config['max_size']	= $this->config->item('file_max_size');
                    $config['overwrite'] = FALSE;

                    $this->load->library('upload');

                    $this->upload->initialize($config);

                    if(!$this->upload->do_multi_upload("projectfiles")) {
                    	$this -> applib -> redirect_to('projects/view/'.$project.'?group=bugs','error',lang('operation_failed'));
                    } else {

                        $fileinfs = $this->upload->get_multi_upload_data();
                        foreach($fileinfs as $findex=>$fileinf) {
                            $data = array(
                                'bug'       => $bug,
                                'file_name'		=> $fileinf['file_name'],
                                'description'	=> $description,
                                'uploaded_by'	=> $this->tank_auth->get_user_id(),
                            );
                            $this->db->insert('bug_files', $data);

                            $file_id = $this->db->insert_id();
                        }

                $activity = ucfirst($this->username).' '.lang('activity_uploaded_file').' to a bug';
				$params = array(
					                'user'				=> $this->user,
					                'module' 			=> 'projects',
					                'module_field_id'	=> $project,
					                'activity'			=> $activity,
					                'icon'				=> 'fa-file'
					                );
				modules::run('activity/log',$params); //pass to activitylog module

				$this -> _upload_notification($bug);

                $this -> applib -> redirect_to('projects/view/'.$project.'/?group=bugs&view=bug&id='.$bug,'success',lang('file_uploaded_successfully'));
                    }
                }else{
                	 $this -> applib -> redirect_to('projects/view/'.$project.'/?group=bugs','error',lang('demo_warning'));
                }
		}else{
		$data['project'] = $this->uri->segment(4);
		$data['bug'] = $this->uri->segment(5);
		$this->load->view('modal/add_bug_file',isset($data) ? $data : NULL);
		}
	}

	function _upload_notification($bug){
			$issue_title = $this -> applib -> get_any_field('bugs',array('bug_id'=>$bug),'issue_title');
			$project = $this -> applib -> get_any_field('bugs',array('bug_id'=>$bug),'project');


			$message = $this -> applib ->get_any_field('email_templates',array('email_group' => 'bug_file'), 'template_body');

			$uploaded_by = str_replace("{UPLOADED_BY}",$this->username,$message);
			$title = str_replace("{ISSUE_TITLE}",$issue_title,$uploaded_by);
			$project_url = str_replace("{BUG_URL}",base_url().'projects/view/'.$project.'?group=bugs&view=bug&id='.$bug,$title);			
			$message = str_replace("{SITE_NAME}",config_item('company_name'),$project_url);			

			$assigned_to = $this -> applib -> get_any_field('bugs',array('bug_id'=>$bug),'assigned_to');

			$params['recipient'] = $this -> user_profile -> get_user_details($assigned_to,'email');

			$params['subject'] = '[ '.$this->config->item('company_name').' ]'.' '.lang('bug_file_uploaded');
			$params['message'] = $message;

			$params['attached_file'] = '';

			modules::run('fomailer/send_email',$params);
	}

	function status(){
		$status = isset($_GET['s']) ? $_GET['s'] : '';
		$bug = isset($_GET['id']) ? $_GET['id'] : '';
		$project = $this->uri->segment(4);

		switch ($status) {
			case 'confirmed':
				$this -> db -> set('bug_status','Confirmed') -> where('bug_id',$bug) -> update($this->bugs_table);
				break;
			case 'in_progress':
				$this -> db -> set('bug_status','In Progress') -> where('bug_id',$bug) -> update($this->bugs_table);
				break;
			case 'resolved':
				$this -> db -> set('bug_status','Resolved') -> where('bug_id',$bug) -> update($this->bugs_table);
				break;
			case 'verified':
				$this -> db -> set('bug_status','Verified') -> where('bug_id',$bug) -> update($this->bugs_table);
				break;			
			default:
				$this -> db -> set('bug_status','Unconfirmed') -> where('bug_id',$bug) -> update($this->bugs_table);
				break;
		}
		$this -> _notify_bug_status_change($bug,$project,$status);
		$this -> applib -> redirect_to('projects/view/'.$project.'/?group=bugs','success',lang('bug_status_changed'));
	}

	function _notify_bug_status_change($bug,$project,$status){

			$message = $this -> applib ->get_any_field('email_templates',array('email_group' => 'bug_status'),'template_body');

			$assigned_user = $this -> applib ->get_any_field($this->bugs_table,array('bug_id' => $bug),'assigned_to');
			$email = $this -> applib ->get_any_field('users',array('id' => $assigned_user),'email');

			$issue_title = $this -> applib ->get_any_field($this->bugs_table,array('bug_id' => $bug),'issue_title');

			
			$email_issue_title = str_replace("{ISSUE_TITLE}",$issue_title,$message);
			$assigned_by =  str_replace("{STATUS}",strtoupper($status),$email_issue_title);
			$marker_by = str_replace("{MARKED_BY}",$this->username,$assigned_by);
			$bug_url = str_replace("{BUG_URL}",base_url().'projects/view/'.$project.'?group=bugs&view=bug&id='.$bug,$marker_by);
			$message = str_replace("{SITE_NAME}",config_item('company_name'),$bug_url);

			
			$params['recipient'] = $email;

			$params['subject'] = '[ '.config_item('company_name').' ]'.' '.lang('bug_status_change_subject');
			$params['message'] = $message;		

			$params['attached_file'] = '';

			modules::run('fomailer/send_email',$params);

	}

	function comment()
	{
		if ($this->input->post()) {	
			$_POST['comment_by'] = $this ->tank_auth -> get_user_id();
			$project = $_POST['project'];
			unset($_POST['project']);
		
				$this -> db -> insert($this -> bug_comments_table,$_POST);
				$comment_id = $this -> db ->insert_id();

				$bug = $_POST['bug_id'];

				// Send email to client and assigned user
				if(config_item('notify_bug_comments') == 'TRUE'){
					
					$bug_assigned_to = $this -> applib ->get_any_field($this->bugs_table,array('bug_id' => $bug),'assigned_to');
					$bug_reporter = $this -> applib ->get_any_field($this->bugs_table,array('bug_id' => $bug),'reporter');
					if($this -> user == $bug_assigned_to){
						$this -> _notify_bug_comment($bug,$project,'reporter');
					}else{
						$this -> _notify_bug_comment($bug,$project,'staff');
					}
				}

			$this -> applib -> redirect_to('projects/view/'.$project.'/?group=bugs&view=discuss&id='.$_POST['bug_id'],'success',lang('bug_comment_add'));
		}else{			
			
		}
	}

	function _notify_bug_comment($bug,$project,$notify){

			$message = $this -> applib ->get_any_field('email_templates',array('email_group' => 'bug_comment'),'template_body');

			if($notify == 'reporter'){
				$reporter = $this -> applib ->get_any_field($this->bugs_table,array('bug_id' => $bug),'reporter');
				$email = $this -> applib ->get_any_field('users',array('id' => $reporter),'email');
			}else{
				$assigned_user = $this -> applib ->get_any_field($this->bugs_table,array('bug_id' => $bug),'assigned_to');
				$email = $this -> applib ->get_any_field('users',array('id' => $assigned_user),'email');
			}			

			$issue_title = $this -> applib ->get_any_field($this->bugs_table,array('bug_id' => $bug),'issue_title');

			
			$posted_by = str_replace("{POSTED_BY}",$this->username,$message);
			$email_issue_title =  str_replace("{ISSUE_TITLE}",$issue_title,$posted_by);
			$comment_url = str_replace("{COMMENT_URL}",base_url().'projects/view/'.$project.'?group=bugs&view=discuss&id='.$bug,$email_issue_title);
			$message = str_replace("{SITE_NAME}",config_item('company_name'),$comment_url);

			
			$params['recipient'] = $email;

			$params['subject'] = '[ '.config_item('company_name').' ]'.' '.lang('bug_comment_subject');
			$params['message'] = $message;		

			$params['attached_file'] = '';
			
			modules::run('fomailer/send_email',$params);

	}

	function download()
	{
	$this->load->helper('download');
	$project = $this->uri->segment(4);
	$file_id = $this->uri->segment(5);
	$file_name = $this -> applib -> get_any_field('bug_files',array('file_id'=>$file_id),'file_name');
	if(file_exists('./resource/bug-files/'.$file_name)){
			$data = file_get_contents('./resource/bug-files/'.$file_name); // Read the file's contents
			force_download($file_name, $data);
		}else{
			$this -> applib -> redirect_to('projects/view/'.$project.'/?group=bugs','error',lang('operation_failed'));
			}
	}
	

	function delete()
	{
		if ($this->input->post()) {
			$project = $this->input->post('project');
			$bug_id = $_POST['bug_id'];

			$this -> db -> delete($this->bug_comments_table, array('bug_id' => $bug_id)); // delete comments
			$this -> db -> delete($this->bug_files_table, array('bug' => $bug_id)); // delete files
			$this -> db -> delete($this->bugs_table, array('bug_id' => $bug_id)); // delete bug

			$this -> applib -> redirect_to('projects/view/'.$project.'/?group=bugs','success',lang('issue_deleted_successfully'));
		}else{
			$bug_id = isset($_GET['id']) ? $_GET['id'] : '';

			$data['project'] = $this->uri->segment(4);
			$data['bug_id'] = $bug_id;
			$this->load->view('modal/delete_bug',$data);
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