<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
**********************************************************************************
* Copyright: gitbench 2014
* CodeCanyon Project: http://codecanyon.net/item/freelancer-office/8870728
* Package Date: 2014-09-24 09:33:11 
***********************************************************************************
*/

class Tickets extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this -> load -> module('layouts');	
		$this->load->library(array('tank_auth','template','form_validation','encrypt'));
		$this -> form_validation -> set_error_delimiters('<span style="color:red">', '</span><br>');

		$this -> user = $this->tank_auth->get_user_id();
		$this -> username = $this -> tank_auth -> get_username(); // Set username
		if (!$this -> user) {
			$this -> applib -> redirect_to('auth/login','error',lang('access_denied'));			
		}
		$this -> user_role = $this -> applib->get_any_field('users',array('id'=>$this->user),'role_id');
		$this->user_company = $this -> applib->get_any_field('account_details',array('user_id'=>$this->user),'company');

		$this -> template -> title(lang('tickets').' - '.config_item('company_name'). ' '.config_item('version'));
		$this -> page = lang('tickets');

        $this->load->model('ticket_model', 'mdlticket');

        $this->tickets_table = 'tickets';
        $this->tickets_replies_table = 'ticketreplies';
        $this->departments_table = 'departments';
        $this->activities_table = 'activities';
        $this->users_table = 'users';
        $this->profile_table = 'account_details';

        if ($this->user_role == '1') {
        	$this -> tickets_list = $this -> mdlticket -> retrieve($this->tickets_table,array('id !='=>'0'), $limit = NULL, $offset = 0, $sort = NULL);
        }elseif ($this->user_role == '3') {
        	$this -> tickets_list = $this->_staff_tickets();
        }else{        	
        	$this -> tickets_list = $this -> mdlticket -> retrieve($this->tickets_table,array('reporter'=>$this->user), $limit = NULL, $offset = 0, $sort = NULL);
        }

		
		
	}



	function index()
	{		

	$data['page'] = $this -> page;	
	$data['datatables'] = TRUE;
	$data['role'] = $this -> user_role;
	$data['tickets'] = $this -> tickets_list;

	$this->template
	->set_layout('users')
	->build('tickets',isset($data) ? $data : NULL);
	}

	function view($id = NULL)
	{	

		$this->_has_access($this -> user_role,$this->user_company,$id);

		$data['page'] = $this -> page;
		$data['role'] = $this -> user_role;

		$data['ticket_details'] = $this -> mdlticket -> retrieve($this->tickets_table,array('id'=>$id), $limit = NULL, $offset = 0, $sort = NULL);
		$data['ticket_replies'] = $this -> mdlticket -> retrieve($this->tickets_replies_table,array('ticketid'=>$id), $limit = NULL, $offset = 0, $sort = array('order_by' => 'time','order' => 'desc'));
		$data['tickets'] = $this -> tickets_list; // GET a list of the Tickets

		$this->template
		->set_layout('users')
		->build('ticket_details',isset($data) ? $data : NULL);
	}

	function _has_access($role,$company,$ticket){
		$ticket_dept = $this -> applib->get_any_field($this->tickets_table,array('id'=>$ticket),'department');
		$user_dept = $this -> applib->get_any_field($this->profile_table,array('user_id'=>$this->user),'department');
		$ticket_reporter = $this -> applib->get_any_field($this->tickets_table,array('id'=>$ticket),'reporter');

		if ($role == '1' OR $user_dept == $ticket_dept OR $ticket_reporter == $this->user) {
			return TRUE;
		}else{
			$this -> applib -> redirect_to('tickets','error',lang('access_denied'));	
		}
	}

	function add()
	{
		if ($this->input->post()) {
			if (isset($_POST['dept'])) {
				$this -> applib -> redirect_to('tickets/add/?dept='.$_POST['dept'],'success','Department selected');
			}

		if ($this -> form_validation -> run('tickets','add_ticket') == FALSE)
		{
				$_POST = '';
				$this -> add();
		}else{	
							if(file_exists($_FILES['userfile']['tmp_name']) || is_uploaded_file($_FILES['userfile']['tmp_name'])) {
			                	$attachment = $this->_upload_attachment($_POST);
			                }

			            	// check additional fields
		$additional_fields = array();		
		$additional_data = $this -> db -> where(array('deptid'=>$_POST['department'])) ->get("fields") ->result_array();
		if (is_array($additional_data))
			foreach ($additional_data as $additional)
			{
				// We create these vales as an array
				$name = $additional['uniqid'];
				$additional_fields[$name] = $this -> encrypt -> encode($this -> input -> post($name));
			}
			$insert = array(
				'subject' => $_POST['subject'],
				'ticket_code' => $_POST['ticket_code'],
				'department' => $_POST['department'],
				'priority' => $_POST['priority'],
				'body' => $_POST['body'],
				'status' => 'open'
				);

			if (is_array($additional_fields)){
				$insert['additional'] = json_encode($additional_fields);
			}

			if (isset($attachment)){
				$insert['attachment'] = $attachment;
			}
			if ($this -> user_role != '1') {
				$insert['reporter'] = $this->user;
				$_POST['reporter'] = $this->user;
			}else{
				$insert['reporter'] = $_POST['reporter'];
			}
			


			if($ticket_id = $this -> mdlticket -> add($this->tickets_table,$insert)){

				// Send email to Staff

				$this -> _send_email_to_staff($_POST);

				// Send email to Client 

				$this -> _send_email_to_client($_POST);

				// Log Activity
					$activity = ucfirst(lang('activity_ticket_created').$_POST['ticket_code']);
					$params = array(
					                'user'				=> $this->user,
					                'module' 			=> 'tickets',
					                'module_field_id'	=> $ticket_id,
					                'activity'			=> $activity,
					                'icon'				=> 'fa-ticket'
					                );
					modules::run('activity/log',$params); //pass to activitylog module
					$this -> applib -> redirect_to('tickets/view/'.$ticket_id,'success',lang('ticket_created_successfully'));
				}			
			
			
		}
	}else{
			$data['page'] = $this -> page;
			$data['role'] = $this -> user_role;
			$data['datepicker'] = TRUE;
			$data['form'] = TRUE;
			$data['clients'] = $this -> _get_clients(); 			
			$data['tickets'] = $this -> tickets_list; // GET a list of the Tickets

			$this->template
			->set_layout('users')
			->build('create_ticket',isset($data) ? $data : NULL);

		}
	}


	function edit($id = NULL)
	{
		$this->_has_access($this -> user_role,$this->user_company,$id);
		
		if ($this->input->post()) {
			$ticket_id = $this -> input -> post('id', TRUE);
		if ($this -> form_validation -> run('edit_ticket') == FALSE)
		{
				$_POST = '';
				$this -> applib -> redirect_to('tickets/edit/'.$ticket_id,'error',lang('error_in_form'));
		}else{	
			
			if(file_exists($_FILES['userfile']['tmp_name']) || is_uploaded_file($_FILES['userfile']['tmp_name'])) {
			                	$attachment = $this->_upload_attachment($_POST);
			                }

			if (isset($attachment)){
				$_POST['attachment'] = $attachment;
			}

			if($this -> mdlticket -> update($this->tickets_table,array('id'=>$ticket_id),$_POST)){
				
				// Log Activity
				$activity = ucfirst($this->username).lang('activity_ticket_edited').$_POST['ticket_code'];
				$this -> _log_activity($activity,$this->user,'tickets',$ticket_id,'fa-pencil');

				$this -> applib -> redirect_to('tickets/view/'.$ticket_id,'success',lang('ticket_edited_successfully'));
				}
			
			}
		}else{

			$data['page'] = $this -> page;
			$data['datepicker'] = TRUE;
			$data['form'] = TRUE;
			$data['clients'] = $this -> _get_clients(); 
			$data['tickets'] = $this -> tickets_list; // GET a list of the tickets

			$data['ticket_details'] = $this -> mdlticket -> retrieve($this->tickets_table,array('id'=>$id), $limit = NULL, $offset = 0, $sort = NULL); 

			$this->template
			->set_layout('users')
			->build('edit_ticket',isset($data) ? $data : NULL);

		}
	}

	function reply()
	{
		if ($this->input->post()) {			
			$ticket_id = $this -> input -> post('ticketid');

		if ($this -> form_validation -> run('tickets','ticket_reply') == FALSE)
		{
				$_POST = '';
				$this -> applib -> redirect_to('tickets/view/'.$ticket_id,'error',lang('error_in_form'));
		}else{	
			$insert = array(
				'ticketid' => $_POST['ticketid'],
				'body' => $_POST['reply'],
				'replierid' => $this->tank_auth->get_user_id(),
				);		

			if($reply_id = $this -> mdlticket -> add($this->tickets_replies_table,$insert)){

				$this -> db -> set('status','answered') -> where(array('id'=>$_POST['ticketid'])) -> update($this->tickets_table);

				$user_role = $this -> applib->get_any_field($this->users_table,array('id'=>$_POST['replierid']),'role_id');

				if ($user_role == '2') {
					$this -> _notify_ticket_reply('admin',$_POST); // Send email to admins
				}else{
					$this -> _notify_ticket_reply('client',$_POST); // Send email to client
				}
				// Log Activity
					$activity = ucfirst(lang('activity_ticket_replied').$_POST['ticket_code']);
					$params = array(
					                'user'				=> $this->user,
					                'module' 			=> 'tickets',
					                'module_field_id'	=> $ticket_id,
					                'activity'			=> $activity,
					                'icon'				=> 'fa-ticket'
					                );
					modules::run('activity/log',$params); //pass to activitylog module
					$this -> applib -> redirect_to('tickets/view/'.$ticket_id,'success',lang('ticket_replied_successfully'));
				}			
			
			
		}
	}else{
			$this -> index();

		}
	}

	
	function delete($id = NULL)
	{
		if ($this->input->post()) {

			$ticket = $this->input->post('ticket', TRUE);

			$this -> mdlticket -> delete($this->tickets_replies_table,array('ticketid'=>$ticket)); //delete ticket replies

			$this -> mdlticket -> delete($this->activities_table,array('module'=>'tickets', 'module_field_id' => $ticket));  //clear invoice activities
			$this -> mdlticket -> delete($this->tickets_table,array('id'=>$ticket)); //delete ticket

			$this -> applib -> redirect_to('tickets','success',lang('ticket_deleted_successfully'));
		}else{
			$data['ticket'] = $id;
			$this->load->view('modal/delete_ticket',$data);

		}
	}

	function status($ticket = NULL){
		if (isset($_GET['status'])) {
			$status = $_GET['status'];	
			$this -> db -> set('status',$status) -> where(array('id'=>$ticket)) -> update($this->tickets_table);

			if ($status == 'closed') {
				// Send email to ticket reporter
				$this -> _ticket_closed($ticket);
			}

			$activity = $this->username.' '.lang('activity_ticket_status_changed');

			$this->_log_activity($activity,$this->user,'tickets',$ticket,$icon = 'fa-ticket'); //log activity

			$this -> applib -> redirect_to('tickets/view/'.$ticket,'success',lang('ticket_status_changed'));
		}else{
			$this->index();
		}
	}


	

	function _ticket_closed($ticket){
				$message = $this -> applib -> get_any_field('email_templates',array('email_group' => 'ticket_closed_email'
									), 'template_body');
				$no_of_replies = $this -> db -> where('ticketid',$ticket) -> get($this->tickets_replies_table)->num_rows();
				$reporter = $this -> applib -> get_any_field($this->tickets_table,array('id' => $ticket), 'reporter');
				$reporter_email = $this -> applib -> get_any_field($this->users_table,array('id' => $reporter), 'email');

				$ticket_code = $this -> applib -> get_any_field($this->tickets_table,array('id' => $ticket), 'ticket_code');				

				$TicketCode = str_replace("{TICKET_CODE}",$ticket_code,$message);
				$ReporterEmail = str_replace("{REPORTER_EMAIL}",$reporter_email,$TicketCode);
				$StaffUsername = str_replace("{STAFF_USERNAME}",ucfirst($this->username),$ReporterEmail);
				$TicketStatus = str_replace("{TICKET_STATUS}",'Closed',$StaffUsername);
				$TicketReplies = str_replace("{NO_OF_REPLIES}",$no_of_replies,$TicketStatus);
				$TicketLink = str_replace("{TICKET_LINK}",base_url().'tickets/view/'.$ticket,$TicketReplies);
				$message = str_replace("{SITE_NAME}",config_item('company_name'),$TicketLink);

				$params['subject'] = 'Ticket #'.$ticket_code.' Closed';
				$params['message'] = $message;
				$params['attached_file'] = '';

				$params['recipient'] = $reporter_email;
				
				modules::run('fomailer/send_email',$params);
				
	}

	function _notify_ticket_reply($group,$data){

				$message = $this -> applib -> get_any_field('email_templates',array('email_group' => 'ticket_reply_email'
									), 'template_body');
				$status = $this -> applib -> get_any_field($this->tickets_table,array('id' => $data['ticketid']), 'status');

				$TicketCode = str_replace("{TICKET_CODE}",$data['ticket_code'],$message);
				$TicketStatus = str_replace("{TICKET_STATUS}",ucfirst($status),$TicketCode);
				$TicketLink = str_replace("{TICKET_LINK}",base_url().'tickets/view/'.$data['ticketid'],$TicketStatus);
				$message = str_replace("{SITE_NAME}",config_item('company_name'),$TicketLink);

				$params['subject'] = 'Ticket #'.$data['ticket_code'].' Responded';
				$params['message'] = $message;
				$params['attached_file'] = '';
			
			switch ($group) {
				case 'admin':
				$dept = $this -> applib -> get_any_field('tickets',array('id' => $_POST['ticketid']), 'department');

				$staffs = $this->db -> where(array('department'=> $dept)) -> get($this->tickets_table) -> result();				

				foreach ($staffs as $staff)
				{
					$params['recipient'] = $staff->email;
					modules::run('fomailer/send_email',$params);
				}
				return TRUE;
				break;
				
				default:
				$reporter_id = $this -> applib -> get_any_field($this->tickets_table,array('id' =>$data['ticketid']), 'reporter');
				$reporter_email = $this -> applib -> get_any_field($this->users_table,array('id' => $reporter_id), 'email');

				$params['recipient'] = $reporter_email;
				
				modules::run('fomailer/send_email',$params);
				
				return TRUE;
				break;
			}
	}

	function _send_email_to_staff($postdata)
	{
		if (config_item('email_staff_tickets') == 'TRUE') {

			$staffs = $this->db -> where(array('department'=> $postdata['department'])) -> get($this->profile_table) -> result();

			$reporter_email = $this -> applib->get_any_field($this->users_table,array('id'=>$postdata['reporter']),'email');
			$ticket_id = $this -> applib->get_any_field($this->tickets_table,array('ticket_code'=>$postdata['ticket_code']),'id');

			$message = $this -> applib -> get_any_field('email_templates',array('email_group' => 'ticket_staff_email'
									), 'template_body');

				$TicketCode = str_replace("{TICKET_CODE}",$postdata['ticket_code'],$message);
				$ReporterEmail = str_replace("{REPORTER_EMAIL}",$reporter_email,$TicketCode);
				$TicketLink = str_replace("{TICKET_LINK}",base_url().'tickets/view/'.$ticket_id,$ReporterEmail);
				$message = str_replace("{SITE_NAME}",config_item('company_name'),$TicketLink);
				
				$params['subject'] = 'Ticket #'.$postdata['ticket_code'].' Created';
				$params['message'] = $message;
				$params['attached_file'] = '';

				foreach ($staffs as $staff)
				{
					$params['recipient'] = $staff->email;
					modules::run('fomailer/send_email',$params);
				}

				return TRUE;
		}else{
				return TRUE;
			}

	}

	function _send_email_to_client($postdata)
	{
		
				$email = $this -> applib->get_any_field($this->users_table,array('id'=>$postdata['reporter']),'email');
				$message = $this -> applib -> get_any_field('email_templates',array('email_group' => 'ticket_client_email'
									), 'template_body');
				$ticket_id = $this -> applib->get_any_field($this->tickets_table,array('ticket_code'=>$postdata['ticket_code']),'id');

				$client_email = str_replace("{CLIENT_EMAIL}",$email,$message);
				$ticket_code = str_replace("{TICKET_CODE}",$postdata['ticket_code'],$client_email);
				$ticket_link = str_replace("{TICKET_LINK}",base_url().'tickets/view/'.$ticket_id,$ticket_code);
				$message = str_replace("{SITE_NAME}",config_item('company_name'),$ticket_link);

				$params['recipient'] = $email;
				$params['subject'] = 'Ticket #'.$postdata['ticket_code'].' Created';
				$params['message'] = $message;
				$params['attached_file'] = '';


				
				modules::run('fomailer/send_email',$params);
				return TRUE;

	}

	function _upload_attachment($postfiles){
		// Upload the file.
					$config['upload_path'] = './resource/attachments/';
					$config['allowed_types'] = config_item('allowed_files');
					$config['max_size'] = config_item('file_max_size');
					$config['encrypt_name'] = TRUE;
					$config['remove_spaces'] = TRUE;
					$this -> load -> library('upload', $config);

					if (!$this -> upload -> do_upload())
					{
						$error = $this -> upload -> display_errors();
						return $error;
					}

					$data = $this -> upload -> data();

					if (is_array($data))

						return $data['file_name'];

	}

	function _staff_tickets(){
		$staff_department = $this -> applib->get_any_field($this->profile_table,array('user_id'=>$this->user),'department');
		return $this -> mdlticket -> retrieve($this->tickets_table,array('department'=>$staff_department),$limit = NULL,$offset = 0, $sort = NULL);
	}

	function _get_clients(){		
			$sort = array('order_by' => 'created','order' => 'desc');
			return $this -> mdlticket -> retrieve($this->users_table,array('role_id'=>'2'),$limit = NULL,$offset = 0, $sort); 

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
}

/* End of file invoices.php */