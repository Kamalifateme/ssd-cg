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


class Items extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('tank_auth');
		if ($this->tank_auth->user_role($this->tank_auth->get_role_id()) != 'admin') {
			$this->session->set_flashdata('message', lang('access_denied'));
			redirect('');
		}
		$this->load->model('item_model');
	}

	function index()
	{
		$this->list_items();
	}

	function list_items()
	{
	$this->load->module('layouts');
	$this->load->library('template');
	$this->template->title(lang('item_lookups').' - '.$this->config->item('company_name'). ' '. $this->config->item('version'));
	$data['page'] = lang('item_lookups');
	$data['datatables'] = TRUE;
	$data['invoice_items'] = $this->item_model->list_items($limit = 20);
	$data['project_tasks'] = $this->item_model->list_tasks($limit = 20);
	$this->template
	->set_layout('users')
	->build('templates',isset($data) ? $data : NULL);
	}

	function add_item()
	{
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('item_name', 'Description', 'required');
		$this->form_validation->set_rules('unit_cost', 'Unit Price', 'required');
		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('operation_failed'));
				redirect($this->input->post('r_url'));
		}else{		

			$this->db->insert('items_saved', $_POST); 

			$this->session->set_flashdata('response_status', 'success');
				$this->session->set_flashdata('message', lang('item_added_successfully'));
				redirect($_SERVER['HTTP_REFERER']);
		}
		}else{
		$this->load->view('modal/add_item');
		}
	}
	function save_task()
	{
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('task_name', 'Task Name', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');

		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('task_add_failed'));
				redirect('items');
		}else{
		if ($this->input->post('visible') == 'on') { $visible = 'Yes'; } else { $visible = 'No'; }	
			$form_data = array(
			                'task_name' => $this->input->post('task_name'),
			                'visible' => $visible,
			                'task_desc' => $this->input->post('description'),
			                'estimate_hours' => $this->input->post('estimate'),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->insert('saved_tasks', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', lang('task_add_success'));
			redirect('items');
		}
		}else{
		$this->load->view('modal/save_task');
		}
	}
	function edit_item()
	{
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('item_name', 'Description', 'required');
		$this->form_validation->set_rules('unit_cost', 'Unit Price', 'required');
		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('operation_failed'));
				redirect($this->input->post('r_url'));
		}else{	
			$url = $this->input->post('r_url');
			unset($_POST['r_url']);

			$this->db->where('item_id',$this->input->post('item_id'))->update('items_saved', $_POST); 

			$this->session->set_flashdata('response_status', 'success');
				$this->session->set_flashdata('message', lang('operation_successful'));
				redirect($url);
		}
		}else{
		$data['item_details'] = $this->item_model->saved_item_details($this->uri->segment(3));
		$this->load->view('modal/edit_item',$data);
		}
	}
	function edit_task()
	{		
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('task_name', 'Task Name', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');

		$template_id = $this->input->post('template_id', TRUE);
		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('task_update_failed'));
				redirect('items');
		}else{
		if ($this->input->post('visible') == 'on') { $visible = 'Yes'; } else { $visible = 'No'; }	
			$form_data = array(
			                'task_name' => $this->input->post('task_name'),
			                'visible' => $visible,
			                'task_desc' => $this->input->post('description'),
			                'estimate_hours' => $this->input->post('estimate'),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->where('template_id',$template_id)->update('saved_tasks', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', lang('task_update_success'));
			redirect('items');
		}
	}else{
		$data['task_details'] = $this->item_model->task_details($this->uri->segment(3));
		$this->load->view('modal/edit_task',isset($data) ? $data : NULL);
	}
	}
	function delete_task(){
		if ($this->input->post() ){
					$template_id = $this->input->post('template_id', TRUE);
					$this->db->where('template_id',$template_id)->delete('saved_tasks');

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message', lang('item_deleted_successfully'));
					redirect($this->input->post('r_url'));
		}else{
			$data['template_id'] = $this->uri->segment(3);
			$this->load->view('modal/delete_task',$data);
		}
		
	}
	function delete_item(){
		if ($this->input->post() ){
					$item_id = $this->input->post('item', TRUE);
					$this->db->where('item_id',$item_id)->delete('items_saved');

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message', lang('item_deleted_successfully'));
					redirect($this->input->post('r_url'));
		}else{
			$data['item_id'] = $this->uri->segment(3);
			$this->load->view('modal/delete_item',$data);
		}
		
	}
}

/* End of file items.php */