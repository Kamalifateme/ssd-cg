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

class Fopdf extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('tank_auth');
		if (!$this->tank_auth->is_logged_in()) {
			$this->session->set_flashdata('message', lang('access_denied'));
			redirect('');
		}
		$this->load->model('mdl_invoice');
		$this->load->helper('invoicer');
	}

	function invoice(){			
			$data['invoice_details'] = $this->mdl_invoice->invoice_details($this->uri->segment(3));
			$data['payment_status'] = $this->mdl_invoice->payment_status($this->uri->segment(3));
			$data['invoice_items'] = $this->mdl_invoice->invoice_items($this->uri->segment(3));
			$this->load->view('invoice',isset($data) ? $data : NULL);				
	}
	function estimate(){
			$data['estimate_details'] = $this->mdl_invoice->estimate_details($this->uri->segment(3));
			$data['estimate_items'] = $this->mdl_invoice->estimate_items($this->uri->segment(3));
			$this->load->view('estimate',isset($data) ? $data : NULL);	
	}

	function attach_invoice($invoice){			
			$data['invoice_details'] = $this->mdl_invoice->invoice_details($invoice['inv_id']);
			$data['payment_status'] = $this->mdl_invoice->payment_status($invoice['inv_id']);
			$data['invoice_items'] = $this->mdl_invoice->invoice_items($invoice['inv_id']);
			$data['attach'] = TRUE;
			$invoice = $this->load->view('invoice',isset($data) ? $data : NULL,TRUE);	
			return $invoice;			
	}
	function attach_estimate($estimate){
			$data['attach'] = TRUE;			
			$data['estimate_details'] = $this->mdl_invoice->estimate_details($estimate['est_id']);
			$data['estimate_items'] = $this->mdl_invoice->estimate_items($estimate['est_id']);
			$est = $this->load->view('estimate',isset($data) ? $data : NULL,TRUE);	
			return $est;			
	}



}

/* End of file Invoicr.php */