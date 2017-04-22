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


class Payments extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this -> load -> module('layouts');	
		$this->load->library(array('tank_auth','template','form_validation'));

		$this -> user = $this->tank_auth->get_user_id();
		$this -> username = $this -> tank_auth -> get_username(); // Set username
		if (!$this -> user) {
			$this -> applib -> redirect_to('auth/login','error',lang('access_denied'));			
		}
		$this -> template -> title(lang('payments').' - '.config_item('company_name'). ' '.config_item('version'));
		$this -> page = lang('payments');
		$sort = array('order_by' => isset($_GET['order_by'])?$_GET['order_by']:'created_date',
		              'order'    => isset($_GET['order'])?$_GET['order']:'desc'
		              );
        $this->load->model('invoice_model', 'invoice');

        $this->payments_table = 'payments';

		$this->payments_list = $this -> invoice -> retrieve($this->payments_table,array('invoice !='=>'0'), $limit = NULL, $offset = 0, $sort);
		
	}

	function index()
	{
	$data['page'] = $this->page;
	$data['datatables'] = TRUE;
	$data['payments'] = $this->payments_list;
	$this->template
	->set_layout('users')
	->build('payments',isset($data) ? $data : NULL);
	}

	function edit($transaction = NULL)
	{
		if ($this->input->post()) {
			$id = $this -> input -> post('p_id', TRUE);
		if ($this -> form_validation -> run('edit_payment') == FALSE)
		{
				$_POST = '';
				$this -> applib -> redirect_to('invoices/payments/edit/'.$id,'error',lang('error_in_form'));
		}else{	
			

			if($this -> invoice -> update($this->payments_table,array('p_id'=>$id),$_POST)){

				$this -> applib -> redirect_to('invoices/payments/edit/'.$id,'success',lang('payment_edited_successfully'));
				}
			
			}
		}else{

			$data['page'] = $this -> page;
			$data['datepicker'] = TRUE;
			$data['payments'] = $this->payments_list;
			$data['payment_methods'] = $this -> db -> where(array('method_id >' => 0)) -> get('payment_methods') -> result();

			$data['payment_details'] = $this -> db -> where('p_id',$this->uri->segment(4)) -> get($this->payments_table)->result();

			$this->template
			->set_layout('users')
			->build('edit_payment',isset($data) ? $data : NULL);

		}
	}

	function details()
	{		
		$data['page'] = $this->page;
		$data['payment_details'] = $this -> db -> where('p_id',$this->uri->segment(4)) -> get($this->payments_table)->result();
		$data['payments'] = $this->payments_list;
		$this->template
		->set_layout('users')
		->build('payment_details',isset($data) ? $data : NULL);
	}	

	function search()
	{
		if ($this->input->post()) {
	$this->load->module('layouts');
	$this->load->library('template');
	$this->template->title(lang('payments').' - '.$this->config->item('company_name'). ' '. $this->config->item('version'));
	$data['page'] = lang('payments');
	$keyword = $this->input->post('keyword', TRUE);
	$data['payments'] = $this->invoice->search_payment($keyword);
	$this->template
	->set_layout('users')
	->build('payments',isset($data) ? $data : NULL);
		}else{
			redirect('invoices/payments');
		}
	}

	function delete($id = NULL)
	{
		if ($this->input->post()) {

			$transaction = $this->input->post('transaction', TRUE);

			$this -> invoice -> delete($this->payments_table,array('p_id'=>$transaction)); //delete transaction

			$this -> applib -> redirect_to('invoices/payments','success',lang('payment_deleted_successfully'));
		}else{
			$data['transaction'] = $id;
			$this->load->view('modal/delete_payment',$data);

		}
	}

	function _log_activity($invoice_id,$activity,$icon){
			$this->db->set('module', 'invoices');
			$this->db->set('module_field_id', $invoice_id);
			$this->db->set('user', $this->tank_auth->get_user_id());
			$this->db->set('activity', $activity);
			$this->db->set('icon', $icon);
			$this->db->insert('activities'); 
	}

}

/* End of file payments.php */