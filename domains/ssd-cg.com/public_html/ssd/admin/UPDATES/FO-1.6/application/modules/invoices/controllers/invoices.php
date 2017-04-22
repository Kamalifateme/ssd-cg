<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
**********************************************************************************
* Copyright: gitbench 2014
* CodeCanyon Project: http://codecanyon.net/item/freelancer-office/8870728
* Package Date: 2014-09-24 09:33:11 
***********************************************************************************
*/

class Invoices extends MX_Controller {

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

		$this -> template -> title(lang('invoices').' - '.config_item('company_name'). ' '.config_item('version'));
		$this -> page = lang('invoices');
		$sort = array('order_by' => isset($_GET['order_by'])?$_GET['order_by']:'date_saved',
		              'order'    => isset($_GET['order'])?$_GET['order']:'desc'
		              );
        $this->load->model('invoice_model', 'invoice');

        $this->invoice_table = 'invoices';
        $this->items_table = 'items';
        $this->clients_table = 'companies';
        $this->payments_method_table = 'payment_methods';
        $this->payments_table = 'payments';
        $this->activities_table = 'activities';

        if ($this->user_role == '1' OR $this -> applib -> allowed_module('view_all_invoices',$this->username)) {
        	$this -> invoices_list = $this -> invoice -> retrieve($this->invoice_table,array('inv_id !='=>'0'), $limit = NULL, $offset = 0, $sort);
        }else{
        	
        	$this -> invoices_list = $this -> invoice -> retrieve($this->invoice_table,array('client'=>$this->user_company), $limit = NULL, $offset = 0, $sort);
        }

		
		
	}



	function index()
	{		

	$data['page'] = $this -> page;	
	$data['datatables'] = TRUE;
	$data['role'] = $this -> user_role;
	
	$data['invoices'] = $this -> invoices_list;

	$this->template
	->set_layout('users')
	->build('invoices',isset($data) ? $data : NULL);
	}

	function view($invoice_id = NULL)
	{	
		if(!$this -> _can_view_invoice($invoice_id)){
			$this -> applib -> redirect_to('invoices','error',lang('access_denied'));
		}

		$data['page'] = $this -> page;
		$data['stripe'] = TRUE;
		$data['role'] = $this -> user_role;

		$data['invoice_details'] = $this -> invoice -> retrieve($this->invoice_table,array('inv_id'=>$invoice_id), $limit = NULL, $offset = 0, $sort = 	NULL);
		$data['invoice_items'] = $this -> invoice -> retrieve($this->items_table,array('invoice_id'=>$invoice_id), $limit = NULL, $offset = 0, $sort = NULL);
		$data['invoices'] = $this -> invoices_list; // GET a list of the Invoices
		$data['payment_status'] = $this -> applib -> payment_status($invoice_id);

		$this->template
		->set_layout('users')
		->build('invoice_details',isset($data) ? $data : NULL);
	}

	function add()
	{
		if(!$this -> _can_add_invoice()){
			$this -> applib -> redirect_to('invoices','error',lang('access_denied'));
		}

		if ($this->input->post()) {
		if ($this -> form_validation -> run('invoices','add_invoice') == FALSE)
		{
				$_POST = '';
				$this -> applib -> redirect_to('invoices/add','error',lang('error_in_form'));
		}else{	
			if(config_item('increment_invoice_number') == 'TRUE'){
				$_POST['reference_no'] = 'INV'.$this -> applib -> generate_invoice_number();
			}
			if($invoice_id = $this -> invoice -> add($this->invoice_table,$_POST)){
				// Log Activity
					$activity = ucfirst(lang('activity_invoice_created').$_POST['reference_no']);
					$params = array(
					                'user'				=> $this->user,
					                'module' 			=> 'invoices',
					                'module_field_id'	=> $invoice_id,
					                'activity'			=> $activity,
					                'icon'				=> 'fa-plus'
					                );
					modules::run('activity/log',$params); //pass to activitylog module
					$this -> applib -> redirect_to('invoices/view/'.$invoice_id,'success',lang('invoice_created_successfully'));
				}			
			
			
		}
	}else{
			$data['page'] = $this -> page;
			$data['role'] = $this -> user_role;

			$data['datepicker'] = TRUE;
			$data['form'] = TRUE;
			$data['clients'] = $this -> _get_clients(); 			
			$data['invoices'] = $this -> invoices_list; // GET a list of the Invoices

			$this->template
			->set_layout('users')
			->build('create_invoice',isset($data) ? $data : NULL);

		}
	}


	function edit($invoice_id = NULL)
	{
		if ($this->input->post()) {
			$invoice_id = $this -> input -> post('inv_id', TRUE);
		if ($this -> form_validation -> run('invoices','edit_invoice') == FALSE)
		{
				$_POST = '';
				$this -> applib -> redirect_to('invoices/edit/'.$invoice_id,'error',lang('error_in_form'));
		}else{	
			

			if($this -> invoice -> update($this->invoice_table,array('inv_id'=>$invoice_id),$_POST)){
				if($this->input->post('r_freq') != 'none'){
					$this -> _make_recurring($invoice_id,$_POST); // set recurring
				}
				// Log Activity
				$activity = ucfirst($this->tank_auth->get_username().lang('activity_invoice_edited').$_POST['reference_no']);
				$this -> _log_activity($activity,$this->user,'invoices',$invoice_id,'fa-pencil');

				$this -> applib -> redirect_to('invoices/view/'.$invoice_id,'success',lang('invoice_edited_successfully'));
				}
			
			}
		}else{

			$data['page'] = $this -> page;
			$data['datepicker'] = TRUE;
			$data['form'] = TRUE;
			$data['role'] = $this -> user_role;

			$data['clients'] = $this -> _get_clients(); 
			$data['invoices'] = $this -> invoices_list; // GET a list of the Invoices

			$data['invoice_details'] = $this -> invoice -> retrieve($this->invoice_table,array('inv_id'=>$invoice_id), $limit = NULL, $offset = 0, $sort = 	NULL); 

			$this->template
			->set_layout('users')
			->build('edit_invoice',isset($data) ? $data : NULL);

		}
	}

	function pay($invoice = NULL)
	{
		if($this -> _can_pay_invoice() == FALSE){
			$this -> applib -> redirect_to('invoices','error',lang('access_denied'));
		}
		if ($this->input->post()) {
			$invoice_id = $this->input->post('invoice');
			$paid_amount = $this->input->post('amount');
		if ($this->form_validation->run('invoices','pay_invoice') == FALSE)
		{
			$this -> applib -> redirect_to('invoices/view/'.$invoice_id,'error',lang('payment_failed'));
		}else{	
			$due = round($this -> applib -> calculate('invoice_due',$invoice_id),2);

			if ($paid_amount > $due) {
				$this -> applib -> redirect_to('invoices/view/'.$invoice_id,'error',lang('overpaid_amount'));
			}
			
			$transaction = array(
			              'invoice' => $invoice_id,
			              'paid_by' => $this -> applib->get_any_field($this->invoice_table,array('inv_id'=>$invoice_id),'client'),
			              'payment_method' => $this->input->post('payment_method'),
			              'amount' => $paid_amount,
			              'payment_date' => $this->input->post('payment_date'),
			              'trans_id' => $this->input->post('trans_id'),
			              'notes' => $this->input->post('notes'),
			              'month_paid' => date('m'),
			              'year_paid' => date('Y'),
			            );
			if($this -> invoice -> add($this->payments_table,$transaction)){
			$activity = lang('activity_payment_of').$this -> applib->get_any_field($this->invoice_table,array('inv_id'=>$invoice_id),'currency').' '.$paid_amount.lang('activity_payment_recieved_and_applied').$this -> applib->get_any_field($this->invoice_table,array('inv_id' => $invoice_id),'reference_no');

			$this->_log_activity($activity,$this->user,'invoices',$invoice_id,$icon = 'fa-usd'); //log activity
			}
			if ($this->input->post('send_thank_you') == 'on') {

				$this->_send_payment_email($invoice_id,$paid_amount); //send thank you email
			}
			$this -> applib -> redirect_to('invoices/view/'.$invoice_id,'success',lang('payment_added_successfully'));
			}
		}else{
			$data['page'] = $this -> page;
			$data['role'] = $this -> user_role;

			$data['invoice_id'] = $invoice;
			$data['datepicker'] = TRUE;
			$data['invoices'] = $this -> invoices_list; // GET a list of the Invoices
			$data['payment_methods'] = $this -> invoice -> retrieve($this->payments_method_table,array('method_id !='=>0), $limit = NULL, $offset = 0, $sort = 	NULL);
			$data['invoice_details'] = $this -> invoice -> retrieve($this->invoice_table,array('inv_id'=>$invoice), $limit = NULL, $offset = 0, $sort = 	NULL); 

			$this->template
			->set_layout('users')
			->build('pay_invoice',isset($data) ? $data : NULL);
		}
	}



	function stop_recur($invoice_id = NULL)
	{
		if(!$this->user_role == '1' OR $this -> applib -> allowed_module('edit_all_invoices',$this->username)){
			$this -> applib -> redirect_to('invoices','error',lang('access_denied'));
		}
		if ($this->input->post()) {

		$invoice = $_POST['invoice'];
		$this->load->model('mdl_invoices_recurring');

			if($this -> mdl_invoices_recurring -> stop($invoice)){
				// Log Activity
					$activity = ucfirst(lang('activity_recurring_stopped'));
					$params = array(
					                'user'				=> $this->user,
					                'module' 			=> 'invoices',
					                'module_field_id'	=> $invoice,
					                'activity'			=> $activity,
					                'icon'				=> 'fa-plus'
					                );
					modules::run('activity/log',$params); //pass to activitylog module
					$this -> applib -> redirect_to('invoices/view/'.$invoice,'success',lang('recurring_invoice_stopped'));
				}	
	}else{
			$data['invoice'] = $invoice_id;
			$this->load->view('modal/stop_recur',$data);

		}
	}


	function timeline($invoice_id = NULL)
	{		
		$data['page'] = $this->page;
		$data['role'] = $this -> user_role;
		$data['invoice_details'] = $this -> invoice -> retrieve($this->invoice_table,array('inv_id'=>$invoice_id), $limit = NULL, $offset = 0, $sort = 	NULL); 
		$sort = array('order_by' => 'activity_date','order' => 'desc');
		$data['activities'] = $this -> invoice -> retrieve($this->activities_table,array('module_field_id'=>$invoice_id,'module'=>'invoices'), $limit = NULL, $offset = 0, $sort ); 
		$data['invoices'] = $this->invoices_list;
		$this->template
		->set_layout('users')
		->build('timeline',isset($data) ? $data : NULL);
	}

	function delete($invoice_id = NULL)
	{
		if ($this->input->post()) {

			$invoice = $this->input->post('invoice', TRUE);

			$this -> invoice -> delete('items',array('invoice_id'=>$invoice)); //delete invoice items

			$this -> invoice -> delete($this->payments_table,array('invoice'=>$invoice)); //delete invoice payments

			$this -> invoice -> delete($this->activities_table,array('module'=>'invoices', 'module_field_id' => $invoice));  //clear invoice activities
			$this -> invoice -> delete($this->invoice_table,array('inv_id'=>$invoice)); //delete invoice

			$this -> applib -> redirect_to('invoices','success',lang('invoice_deleted_successfully'));
		}else{
			$data['invoice'] = $invoice_id;
			$this->load->view('modal/delete_invoice',$data);

		}
	}

	function remind($invoice = NULL){
		if ($this->input->post()) {			
			$invoice = $this->input->post('invoice_id');
			$message = $this -> applib -> get_any_field('email_templates',array(
				                                    'email_group' => 'invoice_reminder'
									), 'template_body');

			$currency = $this -> applib -> get_any_field($this->invoice_table,array('inv_id' => $invoice), 'currency');
			$subject = $this->input->post('subject');

			$clientname = str_replace("{CLIENT}",$this->input->post('client_name'),$message);
			$amount = str_replace("{AMOUNT}",$this->input->post('amount'),$clientname);
			$currency = str_replace("{CURRENCY}",$currency,$amount);
			$link = str_replace("{INVOICE_LINK}",base_url().'invoices/view/'.$invoice,$currency);
			$message = str_replace("{SITE_NAME}",config_item('company_name'),$link);

			$this->_email_invoice($invoice,$message,$subject);

			$activity = lang('activity_invoice_reminder_sent');

			$this->_log_activity($activity,$this->user,'invoices',$invoice,$icon = 'fa-shopping-cart'); //log activity

			$this -> applib -> redirect_to('invoices/view/'.$invoice,'success',lang('reminder_sent_successfully'));
		}else{
			$data['invoice_details'] = $this -> invoice -> retrieve($this->invoice_table,array('inv_id'=>$invoice), $limit = NULL, $offset = 0, $sort = NULL); 
			$this->load->view('modal/invoice_reminder',$data);
		}
	}


	function email($invoice_id = NULL){
		if ($this->input->post()) {			
			$invoice_id = $this->input->post('invoice_id');
			$ref = $this->input->post('ref');
			$subject = $this->input->post('subject');
			$message = $this -> applib -> get_any_field('email_templates',array(
				                                    'email_group' => 'invoice_message'
									), 'template_body');

			$ClientName = str_replace("{CLIENT}",$this->input->post('client_name'),$message);
			$Amount = str_replace("{AMOUNT}",$this->input->post('amount'),$ClientName);
			$Currency = str_replace("{CURRENCY}",$this->input->post('invoice_currency'),$Amount);
			$link = str_replace("{INVOICE_LINK}",base_url().'invoices/view/'.$invoice_id,$Currency);
			$message = str_replace("{SITE_NAME}",$this->config->item('company_name'),$link);

			$this->_email_invoice($invoice_id,$message,$subject); // Email Invoice

			$data = array('emailed' => 'Yes', 'date_sent' => date ("Y-m-d H:i:s", time()));

			$this -> invoice -> update($this->invoice_table,array('inv_id'=>$invoice_id),$data);

			$activity = lang('activity_invoice').$ref.lang('activity_invoice_sent');
			// Log activity

			$this -> _log_activity($activity,$this->user,'invoices',$invoice_id,'fa-envelope');
			$this -> applib -> redirect_to('invoices/view/'.$invoice_id,'success',lang('invoice_sent_successfully'));
		}else{
			$data['invoice_details'] = $this -> invoice -> retrieve($this->invoice_table,array('inv_id'=>$invoice_id), $limit = NULL, $offset = 0, $sort = 	NULL); 
			$this->load->view('modal/email_invoice',$data);
		}
	}

	function _can_view_invoice($invoice){
		if ($this -> user_role == '1') {
			return TRUE;
		}elseif($this -> user_role == '3' AND $this -> applib -> allowed_module('view_all_invoices',$this->username)){
			return TRUE;
		}elseif($this -> user_role == '2'){
			$invoice_client =  $this -> applib->get_any_field($this->invoice_table,array('inv_id'=>$invoice),'client');
			if ($invoice_client == $this->user_company) {
				return TRUE;
			}else{
				return FALSE;
			}
		}else{
			return FALSE;
		}
	}

	function _can_add_invoice(){
		if ($this -> user_role == '1') {
				return TRUE;
			}elseif($this -> user_role == '3' AND $this -> applib -> allowed_module('add_invoices',$this->username)){
				return TRUE;
		}else{
				return FALSE;
		}
	}
	function _can_pay_invoice(){
		if ($this -> user_role == '1') {
				return TRUE;
			}elseif($this -> user_role == '3' AND $this -> applib -> allowed_module('pay_invoice_offline',$this->username)){
				return TRUE;
		}else{
				return FALSE;
		}
	}

	function chart()
	{
				$data['chart'] = TRUE; // Load chart JS 
				$this -> load -> view('invoices/invoice_chart',isset($data) ? $data : NULL);
	}

	function _send_payment_email($invoice_id,$paid_amount){
			$message = $this -> applib -> get_any_field('email_templates',array('email_group' => 'payment_email'
									), 'template_body');
			$currency = $this -> applib -> get_any_field($this->invoice_table,array('inv_id' => $invoice_id), 'currency');

			$invoice_currency = str_replace("{INVOICE_CURRENCY}",$currency,$message);
			$amount = str_replace("{PAID_AMOUNT}",$paid_amount,$invoice_currency);
			$message = str_replace("{SITE_NAME}",config_item('company_name'),$amount);

			$client = $this -> applib -> get_any_field($this->invoice_table,array('inv_id' => $invoice_id), 'client');

			$address = $this -> applib -> get_any_field($this->clients_table,array('co_id' => $client), 'company_email');

			$params['recipient'] = $address;

			$params['subject'] = '[ '.config_item('company_name').' ]'.' '.lang('payment_received_subject');
			$params['message'] = $message;
			$params['attached_file'] = '';

			modules::run('fomailer/send_email',$params);
	}


	 function _email_invoice($invoice_id,$message,$subject){
            $client = $this -> applib -> get_any_field($this->invoice_table,array('inv_id' => $invoice_id),'client');

            $invoice = $this -> db -> where('inv_id',$invoice_id) -> get($this->invoice_table) -> row();
            $recipient = $this -> applib -> get_any_field($this->clients_table,array('co_id'=>$client),'company_email');

            $params = array(
                            'recipient' => $recipient,
                            'subject'   => $subject,
                            'message'   => $message
                            );

            $this->load->helper('file');
            $attach['inv_id'] = $invoice_id;

            $invoicehtml = modules::run('fopdf/attach_invoice',$attach);

            $params['attached_file'] = '';
            if ( ! write_file('./resource/tmp/Invoice #'.$invoice->reference_no.'.pdf',$invoicehtml)){
                $this -> applib -> redirect_to('invoices/view/'.$invoice_id,'error',lang('write_access_denied'));
             }else{
                $params['attached_file'] = './resource/tmp/Invoice #'.$invoice->reference_no.'.pdf';
                $params['attachment_url'] = base_url().'resource/tmp/Invoice #'.$invoice->reference_no.'.pdf';
            }
            modules::run('fomailer/send_email',$params);

           unlink('./resource/tmp/Invoice #'.$invoice->reference_no.'.pdf');
    }

	function _make_recurring($invoice,$data){
		$recur_days = $this -> _calculate_days($data['r_freq']);
		$due_date = $this -> applib -> get_any_field($this->invoice_table,array('inv_id'=>$invoice),'due_date');
		$next_date = date("Y-m-d",strtotime($due_date."+ ".$recur_days." days"));
		if ($data['recur_end_date'] == '') {
			$recur_end_date = '0000-00-00';
		}else{
			$recur_end_date = $data['recur_end_date'];
		}
		$recur_end_date = date('Y-m-d',strtotime($recur_end_date));
		$update_invoice = array(
		                        'recurring' => 'Yes',
		                        'r_freq' => $recur_days,
		                        'recur_frequency' => $data['r_freq'],
		                        'recur_start_date'=>$data['recur_start_date'],
		                        'recur_end_date'=>$recur_end_date,
		                        'recur_next_date' => $next_date
		                        );
		$this -> invoice -> update( $this->invoice_table, array('inv_id'=>$invoice), $update_invoice);
		return TRUE; 

	}
	function _calculate_days($frequency){
		switch ($frequency)
			        {
			            case '7D':	
			            	return 7;
			                break;
			            case '1M':
			                return 31;
			                break;
			            case '3M':
			                return 90;
			                break;
			            case '6M':
			                return 182;
			                break;
			            case '1Y':
			                return 365;
			                break;
			        }
	}

	function _get_clients(){		
			$sort = array('order_by' => 'date_added','order' => 'desc');
			return $this -> invoice -> retrieve($this->clients_table,array('co_id !='=>'0'),$limit = NULL,$offset = 0, $sort); 

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