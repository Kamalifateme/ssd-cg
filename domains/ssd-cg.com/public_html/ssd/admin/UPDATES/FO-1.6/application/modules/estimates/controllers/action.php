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


class Action extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('tank_auth');
		$this -> user = $this->tank_auth->get_user_id();
		$this -> username = $this -> tank_auth -> get_username(); // Set username
		if (!$this -> user) {
			$this -> applib -> redirect_to('auth/login','error',lang('access_denied'));			
		}
		$this->estimates_table = 'estimates';
		$this->invoices_table = 'invoices';
		$this->estimate_items_table = 'estimate_items';
		$this->invoice_items_table = 'items';
		$this->load->model('estimates_model','estimate');
	}
	
	function emailestimate(){
		if ($this->input->post()) {			
			$est_id = $this->input->post('est_id');
			$ref = $this->input->post('ref');
			$subject = $this->input->post('subject');
			if ($this->input->post('client_name') == '0') {
				$client_name = $this->input->post('recipient');
			}else{
				$client_name = $this->input->post('client_name');
			}

			$clientname = str_replace("{CLIENT}",$client_name,$this->input->post('message'));
			$refno = str_replace("{REF}",$this->input->post('ref'),$clientname);
			$amount = str_replace("{AMOUNT}",$this->input->post('amount'),$refno);
			$currency = str_replace("{CURRENCY}",$this->config->item('default_currency'),$amount);
			$link = str_replace("{LINK}",base_url().'clients/estimates/',$currency);
			$message = str_replace("{COMPANY}",$this->config->item('company_name'),$link);

			$est_client = $this->estimate->get_client($est_id);
			if ($est_client == '0') {
				$recipient = $this->input->post('recipient');
			}else{
				$recipient = $this->user_profile->get_user_details($est_client,'email');
			}
			$this->_email_estimate($est_id,$message,$subject,$recipient);

			$this->db->set('emailed', 'Yes');
			$this->db->set('date_sent', date ("Y-m-d H:i:s", time()));
			$this->db->where('est_id',$est_id)->update('estimates'); 

			$activity = lang('activity_estimate').$ref.lang('activity_estimate_sent');

			$this->_log_activity($est_id,$activity,$icon = 'fa-envelope'); //log activity

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', lang('estimate_sent_successfully'));
			redirect('estimates/manage/details/'.$est_id);
		}else{
			$data['estimate_details'] = $this->estimate->estimate_details($this->uri->segment(4));
			$this->load->view('modal/email_estimate',$data);
		}
	}

	function convert(){
		$id = $this->uri->segment(4);
		$i = $this -> db -> where(array('est_id' => $id)) -> get($this->estimates_table) -> row();

			$ref = 'INV'.filter_var($i->reference_no,FILTER_SANITIZE_NUMBER_INT);
			if(config_item('increment_invoice_number') == 'TRUE'){
				$ref = 'INV'.$this -> applib -> generate_invoice_number();
			}
			$invoice_data = array(
			                'reference_no' => $ref,
			                'client' => $i->client,
			                'currency' => $i->currency,
			                'due_date' => $i->due_date,
			                'notes' => $i->notes,
			                'tax' => $i->tax,
			            );
			$this->db->insert($this->invoices_table, $invoice_data);
			$invoice_id = $this->db->insert_id();

			$estimate_items = $this -> db -> where(array('estimate_id' => $id)) -> get($this->estimate_items_table) -> result(); 

			foreach ($estimate_items as $key => $est_item) {
				$items_data = array(
			                'invoice_id' => $invoice_id,
			                'item_name' => $est_item->item_name,
			                'item_desc' => $est_item->item_desc,
			                'unit_cost' => $est_item->unit_cost,
			                'quantity' => $est_item->quantity,
			                'total_cost' => $est_item->total_cost,
			            );
				$this->db->insert($this->invoice_items_table, $items_data);
			}		

			$activity = 'Converted EST #'.$ref. ' to Invoice';

			$this->_log_activity($activity,$this->tank_auth->get_user_id(),'estimates',$id,$icon = 'fa-laptop'); //log activity	 
			$this -> db -> set('invoiced', 'Yes') -> where('est_id',$id) -> update($this->estimates_table); 
			$this -> applib -> redirect_to('invoices/view/'.$invoice_id,'success',lang('estimate_invoiced_successfully'));
	}

	function status(){
		$estimate = $this->uri->segment(5);
			if ($this->uri->segment(4) == 'accepted') {
				$status = 'Accepted';
			}else{
				$status = 'Declined';
			}
			$this->db->set('status', $status);
			$this->db->where('est_id',$estimate)->update('estimates'); 

			$activity = 'EST #'.$this->uri->segment(6). ' marked as '.$this->uri->segment(4);

			$this->_log_activity($activity,$this->user,'estimates',$estimate,'fa-paperclip');

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', lang('estimate_'.$this->uri->segment(4).'_successfully'));
			redirect('estimates/view/'.$estimate);

	}
	function _email_estimate($est_id,$message,$subject,$recipient){
			$est_details = $this->estimate->estimate_details($est_id);
			foreach ($est_details as $key => $est) {
				$data['estimate_ref'] = $est->reference_no;
				$reference_no = $est->reference_no;
			}
			
			$params['recipient'] = $recipient;

			$params['subject'] = $subject;	
			$params['message'] = $message;

			$data['estimate_details'] = $this->estimate->estimate_details($est_id);
			$data['estimate_items'] = $this->estimate->estimate_items($est_id);
			$data['recipient'] = $recipient;

			$this->load->helper('file');
			$estimate['est_id'] = $est_id;
			$estimate['ref'] = $reference_no;

			$esthtml = modules::run('fopdf/attachestimate',$estimate);

			$params['attached_file'] = '';
			if ($this->input->post('client_name') != '0') {
					if ( ! write_file('./resource/tmp/Estimate #'.$reference_no.'.pdf',$esthtml)){
				    $this->session->set_flashdata('response_status', 'error');
					$this->session->set_flashdata('message', lang('write_access_denied'));
					redirect('estimates/manage/details/'.$est_id);
				 		}else{
					$params['attached_file'] = './resource/tmp/Estimate #'.$reference_no.'.pdf';
					}
			}			

			modules::run('fomailer/send_email',$params);

			unlink('./resource/tmp/Estimate #'.$reference_no.'.pdf');
	}
	function delete()
	{
		if ($this->input->post()) {

			$estimate = $this->input->post('estimate', TRUE);

			$this->db->where('estimate_id',$estimate)->delete('estimate_items'); //delete estimate items

			$this->db->set('est_deleted', 'Yes');
			$this->db->where('est_id',$estimate)->update('estimates'); // mark estimate as deleted

			$this->db->set('deleted', '1');
			$this->db->where(array('module'=>'estimates', 'module_field_id' => $estimate))->update('activities'); //clear estimate activities


			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', lang('estimate_deleted_successfully'));
			redirect('estimates');
		}else{
			$data['estimate'] = $this->uri->segment(4);
			$data['estimate_ref'] = $this->uri->segment(5);
			$this->load->view('modal/delete_estimate',$data);

		}
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

/* End of file action.php */