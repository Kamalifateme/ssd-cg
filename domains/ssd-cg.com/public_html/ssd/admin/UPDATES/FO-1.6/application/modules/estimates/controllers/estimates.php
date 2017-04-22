<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
**********************************************************************************
* Copyright: gitbench 2014
* Licence: Please check CodeCanyon.net for licence details. 
* CodeCanyon Project: http://codecanyon.net/item/freelancer-office/8870728
* Package Date: 2014-09-24 09:33:11 
***********************************************************************************
*/


class Estimates extends MX_Controller {

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

		$this -> template -> title(lang('estimates').' - '.config_item('company_name'). ' '.config_item('version'));
		$this -> page = lang('estimates');

		$this->load->model('estimates_model','estimate');

        $this->estimates_table = 'estimates';
        $this->estimate_items_table = 'estimate_items';
        $this->activities_table = 'activities';
        $this->clients_table = 'companies';

        if ($this->user_role == '1' OR $this -> applib -> allowed_module('view_all_estimates',$this->username)) {
        	$this -> estimates_list = $this -> estimate -> retrieve($this->estimates_table,array('est_id !='=>'0'), $limit = NULL, $offset = 0, $sort = NULL);
        }else{        	
        	$this -> estimates_list = $this -> estimate -> retrieve($this->estimates_table,array('client'=>$this->user_company), $limit = NULL, $offset = 0, $sort = NULL);
        }
	}

	function index()
	{
	$data['page'] = $this->page;
	$data['role'] = $this -> user_role;

	$data['datatables'] = TRUE;
	$data['estimates'] = $this->estimates_list;
	$this->template
	->set_layout('users')
	->build('estimates',isset($data) ? $data : NULL);
	}

	function view($estimate_id = NULL)
	{	
		if(!$this -> _can_view_estimate($estimate_id)){
			$this -> applib -> redirect_to('estimates','error',lang('access_denied'));
		}

		$data['page'] = $this -> page;
		$data['role'] = $this -> user_role;

		$data['estimate_details'] = $this -> estimate -> retrieve($this->estimates_table, array('est_id'=>$estimate_id), $limit = NULL, $offset = 0, $sort = NULL);
		$data['estimate_items'] = $this -> estimate -> retrieve($this->estimate_items_table, array('estimate_id'=>$estimate_id), $limit = NULL, $offset = 0, $sort = NULL);
		$data['estimates'] = $this -> estimates_list; // GET a list of the Estimates

		$this->template
		->set_layout('users')
		->build('estimate_details',isset($data) ? $data : NULL);
	}

	function _can_view_estimate($estimate){
		if ($this -> user_role == '1') {
				return TRUE;
			}elseif($this -> user_role == '3' AND $this -> applib -> allowed_module('view_all_estimates',$this->username)){
				return TRUE;
			}elseif($this -> user_role == '2'){
			$estimate_client =  $this -> applib->get_any_field($this->estimates_table,array('est_id'=>$estimate),'client');
			if ($estimate_client == $this->user_company) {
				return TRUE;
			}else{
				return FALSE;
			}
		}else{
			return FALSE;
		}
	}

	function add()
	{

		if($this -> _can_add_estimate() == FALSE){
			$this -> applib -> redirect_to('estimates','error',lang('access_denied'));
		}

		if ($this->input->post()) {

		if ($this->form_validation->run('estimates','add_estimate') == FALSE)
		{
			$this -> applib -> redirect_to('estimates','error',lang('operation_failed'));
		}else{	
		if($estimate_id = $this -> estimate -> add($this->estimates_table,$_POST)){
				// Log Activity
					$activity = ucfirst(lang('activity_estimate_created').$this->input->post('reference_no'));
					$params = array(
					                'user'				=> $this->user,
					                'module' 			=> 'estimates',
					                'module_field_id'	=> $estimate_id,
					                'activity'			=> $activity,
					                'icon'				=> 'fa-plus'
					                );
					modules::run('activity/log',$params); //pass to activitylog module
					$this -> applib -> redirect_to('estimates/view/'.$estimate_id,'success',lang('estimate_created_successfully'));
				}
			}

		}else{
				$data['page'] = $this->page;
				$data['form'] = TRUE;
				$data['role'] = $this -> user_role;

				$data['datepicker'] = TRUE;
				$data['datatables'] = TRUE;
				$data['clients'] = $this -> _get_clients();
				$data['estimates'] = $this-> estimates_list;
				$this->template
				->set_layout('users')
				->build('create_estimate',isset($data) ? $data : NULL);

		}
	}

	function _can_add_estimate(){
		if ($this->user_role == '1' OR $this -> applib -> allowed_module('add_estimates',$this->username)) {
			return TRUE;
		}else{
			return FALSE;	
		}
	}

	function edit($id = NULL)
	{
		if ($this->input->post()) {
		$estimate_id = $this -> input -> post('est_id', TRUE);
		if ($this -> form_validation -> run('estimates','edit_estimate') == FALSE)
		{
				$_POST = '';
				$this -> applib -> redirect_to('estimates/edit/'.$estimate_id,'error',lang('error_in_form'));
		}else{	
			if($this -> estimate -> update($this->estimates_table,array('est_id'=>$estimate_id),$_POST)){
				// Log Activity
				$activity = ucfirst($this->username.' edited ESTIMATE #'.$this->input->post('reference_no'));
				$this -> _log_activity($activity,$this->user,'estimates',$estimate_id,'fa-pencil');

				$this -> applib -> redirect_to('estimates/view/'.$estimate_id,'success',lang('estimate_edited_successfully'));
				}
			}
		}else{
			$data['page'] = $this -> page;
			$data['datepicker'] = TRUE;
			$data['role'] = $this -> user_role;
			
			$data['form'] = TRUE;
			$data['clients'] = $this -> _get_clients(); 
			$data['estimates'] = $this -> estimates_list; // GET a list of the Invoices

			$data['estimate_details'] = $this -> estimate -> retrieve($this->estimates_table,array('est_id'=>$id), $limit = NULL, $offset = 0, $sort = 	NULL); 

			$this->template
			->set_layout('users')
			->build('edit_estimate',isset($data) ? $data : NULL);

		}
	}

	function timeline($estimate_id = NULL)
	{		
		$data['page'] = $this->page;
		$data['role'] = $this -> user_role;
		
		$data['estimate_details'] = $this -> estimate -> retrieve($this->estimates_table,array('est_id'=>$estimate_id), $limit = NULL, $offset = 0, $sort = 	NULL); 
		$sort = array('order_by' => 'activity_date','order' => 'desc');
		$data['activities'] = $this -> estimate -> retrieve($this->activities_table,array('module_field_id'=>$estimate_id,'module'=>'estimates'), $limit = NULL, $offset = 0, $sort ); 
		$data['estimates'] = $this->estimates_list;
		$this->template
		->set_layout('users')
		->build('timeline',isset($data) ? $data : NULL);
	}

	function delete($id = NULL)
	{
		if ($this->input->post()) {

			$estimate = $this->input->post('estimate', TRUE);

			$this->db->where('estimate_id',$estimate)->delete($this->estimate_items_table); //delete estimate items

			$this->db->where('est_id',$estimate)->delete($this->estimates_table); // mark estimate as deleted

			$this->db->where(array('module'=>'estimates', 'module_field_id' => $estimate))->delete($this->activities_table); //clear estimate activities

			$this -> applib -> redirect_to('estimates','success',lang('estimate_deleted_successfully'));
		}else{
			$data['estimate'] = $id;
			$this->load->view('modal/delete_estimate',$data);

		}
	}

	function email($id = NULL){
		if ($this->input->post()) {			
			$est_id = $this->input->post('estimate_id');
			$ref = $this->input->post('ref');
			$message = $this -> applib -> get_any_field('email_templates',array(
				                                    'email_group' => 'estimate_email'
									), 'template_body');

			$subject = $this->input->post('subject');
			if ($this->input->post('client_name') == '0') {
				$client_name = $this->input->post('recipient');
			}else{
				$client_name = $this->input->post('client_name');
			}
			$clientname = str_replace("{CLIENT}",$client_name,$message);
			$refno = str_replace("{ESTIMATE_REF}",$ref,$clientname);
			$amount = str_replace("{AMOUNT}",$this->input->post('amount'),$refno);
			$currency = str_replace("{CURRENCY}",$this->input->post('estimate_currency'),$amount);
			$link = str_replace("{ESTIMATE_LINK}",base_url().'estimates/view/'.$est_id,$currency);
			$message = str_replace("{SITE_NAME}",config_item('company_name'),$link);


			$est_client = $this -> applib -> get_any_field($this->estimates_table,array('est_id' => $est_id), 'client');
			if ($est_client == '0') {
			$recipient = $this->input->post('recipient');
			}else{
			$recipient = $this -> applib -> get_any_field($this->clients_table,array('co_id' => $est_client), 'company_email');
			}
			$this->_email_estimate($est_id,$message,$subject,$recipient);

			$this->db->set('emailed', 'Yes');
			$this->db->set('date_sent', date ("Y-m-d H:i:s", time()));
			$this->db->where('est_id',$est_id)->update('estimates'); 

			$activity = lang('activity_estimate').$ref.lang('activity_estimate_sent');

			$this->_log_activity($activity,$this->user,'estimates',$est_id,$icon = 'fa-envelope'); //log activity

			$this -> applib -> redirect_to('estimates/view/'.$est_id,'success',lang('estimate_sent_successfully'));
		}else{
			$data['estimate_details'] = $this -> estimate -> retrieve($this->estimates_table,array('est_id'=>$id), $limit = NULL, $offset = 0, $sort = 	NULL);
			$this->load->view('modal/email_estimate',$data);
		}
	}

	function _email_estimate($est_id,$message,$subject,$recipient){
			$est_details = $this -> estimate -> retrieve($this->estimates_table,array('est_id'=>$est_id), $limit = NULL, $offset = 0, $sort = 	NULL);
			foreach ($est_details as $key => $est) {
				
			}
			$data['estimate_ref'] = $est->reference_no;
			$reference_no = $est->reference_no;
			
			$params['recipient'] = $recipient;

			$params['subject'] = $subject;	
			$params['message'] = $message;

			$data['estimate_details'] = $this -> estimate -> retrieve($this->estimates_table,array('est_id'=>$est_id), $limit = NULL, $offset = 0, $sort = 	NULL);
			$data['estimate_items'] = $this -> estimate -> retrieve($this->estimate_items_table, array('estimate_id'=>$estimate_id), $limit = NULL, $offset = 0, $sort = NULL);
			$data['recipient'] = $recipient;

			$this->load->helper('file');
			$estimate['est_id'] = $est_id;
			$estimate['ref'] = $reference_no;

			$esthtml = modules::run('fopdf/attach_estimate',$estimate);

			$params['attached_file'] = '';
			if ($this->input->post('client_name') != '0') {
					if ( ! write_file('./resource/tmp/Estimate #'.$reference_no.'.pdf',$esthtml)){
					$this -> applib -> redirect_to('estimates/view/'.$est_id,'error',lang('write_access_denied'));
				 		}else{
					$params['attached_file'] = './resource/tmp/Estimate #'.$reference_no.'.pdf';
					}
			}			

			modules::run('fomailer/send_email',$params);

			unlink('./resource/tmp/Estimate #'.$reference_no.'.pdf');
	}

	function _get_clients(){
		$sort = array('order_by' => 'date_added','order' => 'desc');
		return $this -> estimate -> retrieve($this->clients_table,array('co_id !='=>'0'),$limit = NULL,$offset = 0, $sort); 
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

/* End of file estimates.php */