<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
**********************************************************************************
* Copyright: gitbench 2014
* CodeCanyon Project: http://codecanyon.net/item/freelancer-office/8870728
* Package Date: 2014-09-24 09:33:11 
***********************************************************************************
*/

// Includes all users operations
class Items extends MX_Controller {

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
		$this->items_table = 'items';
		$this->saved_items_table = 'items_saved';
		$this->load->model('invoice_model', 'items');
		
	}

	function add(){
		if ($this->input->post()) {

		$invoice_id = $_POST['invoice_id'];

		if ($this -> form_validation -> run('invoices','add_item') == FALSE)
		{	
				$_POST = '';
				$this -> applib -> redirect_to('invoices/view/'.$invoice_id,'error',lang('error_in_form'));	
		}else{	
			$_POST['total_cost'] = $this->input->post('unit_cost') * $this->input->post('quantity');
				if($this -> items -> add($this->items_table,$_POST)){
					$this -> applib -> redirect_to('invoices/view/'.$invoice_id,'success',lang('item_added_successfully'));
				}
			}
		}
	}

	function edit(){
		if ($this->input->post()) {

		$invoice_id = $this -> applib->get_any_field($this->items_table,array('item_id'=>$_POST['item_id']),'invoice_id');
		if ($this -> form_validation -> run('invoices','add_item') == FALSE)
		{	
				$_POST = '';
				$this -> applib -> redirect_to('invoices/view/'.$invoice_id,'error',lang('error_in_form'));	
		}else{	
			$_POST['total_cost'] = $this->input->post('unit_cost') * $this->input->post('quantity');
				if($this -> items -> update($this->items_table, array('item_id' => $_POST['item_id']),$_POST)){
					$this -> applib -> redirect_to('invoices/view/'.$invoice_id,'success',lang('item_added_successfully'));
				}
			}
		}else{
			$item = $this->uri->segment(4);
			$data['item_details'] = $this -> items -> retrieve($this->items_table,array('item_id' => $item),$limit = NULL, $offset = 0,$sort = NULL);
			$this->load->view('modal/edit_item',$data);
		}
	}

	function insert()
	{
		if ($this->input->post()) {
			$invoice = $this->input->post('invoice');			
			if ($this->form_validation->run('invoices','insert_items') == FALSE)
			{
					$this -> applib -> redirect_to('invoices/view/'.$invoice,'error',lang('operation_failed'));
			}else{	
			$item = $this->input->post('item');
			$quantity = $this -> input -> post('quantity');
			$saved_item = $this -> items -> retrieve($this->saved_items_table,array('item_id'=>$item),$limit = NULL, $offset = 0,$sort = NULL);	
			foreach ($saved_item as $key => $i) {
				$item_name = $i->item_name;
				$item_desc = $i->item_desc;
				$unit_cost = $i->unit_cost;
				$total_cost = $quantity * $i->unit_cost;
			}

			$form_data = array(
			                'invoice_id' => $invoice,
			                'item_name'  => $item_name,
			                'item_desc' => $item_desc,
			                'unit_cost' => $unit_cost,
			                'quantity' => $quantity,
			                'total_cost' => $total_cost
			            );
			if($this -> items -> add($this->items_table,$form_data)){
					$this -> applib -> redirect_to('invoices/view/'.$invoice,'success',lang('item_added_successfully'));
				}
			}
		}else{
			$data['invoice'] = $this->uri->segment(4);
			$data['items'] = $this -> items -> retrieve($this->saved_items_table,array('item_id !=' => 0),$limit = NULL, $offset = 0,$sort = NULL);
			$this->load->view('modal/quickadd',$data);
		}
	}

	function delete(){
		if ($this->input->post() ){
					$item_id = $this->input->post('item', TRUE);
					$invoice = $this->input->post('invoice', TRUE);
					if($this -> items -> delete($this->items_table,array('item_id' => $item_id))){
						$this -> applib -> redirect_to('invoices/view/'.$invoice,'success',lang('item_deleted_successfully'));
					}
		}else{
			$data['item_id'] = $this->uri->segment(4);
			$data['invoice'] = $this->uri->segment(5);
			$this->load->view('modal/delete_item',$data);
		}
	}


}

/* End of file invoices.php */