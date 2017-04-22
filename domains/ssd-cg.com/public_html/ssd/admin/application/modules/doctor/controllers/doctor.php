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


class Doctor extends MX_Controller {

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
	$this->load->library('jdf');
	$data['time'] = $this->jdf->jdate('H:i:s',time);
	$data['datepicker'] = TRUE;
	$data['datatables'] = TRUE;
	$data['form'] = TRUE;
	$this->template->title(lang('doctor').' - '.$this->config->item('company_name'). ' '. $this->config->item('version'));
	$data['page'] = lang('doctor');

	$data['doctor'] = $this->item_model->list_doctor();

	$this->template
	->set_layout('users')
	->build('doctor',isset($data) ? $data : NULL);
	}
	

	
	function add_doctor()
	{
		
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('takh', 'Takh', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('error_editor'));
				redirect('doctor');
		}else{
			$form_data = array(
							'name' => $this->input->post('name'),
							'takh' => $this->input->post('takh'),
							'url' => $this->input->post('url'),

							'description' => $this->input->post('description'),
							'image' => $this->input->post('image'),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->insert('doctor', $form_data); 
			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', lang('doctor_add_success'));
			redirect('doctor');
		}
		}else{
	$this->load->module('layouts');
	$this->load->library('template');
	$this->load->library('jdf');
	$data['time'] = $this->jdf->jdate('H:i:s',time);
	$data['datepicker'] = TRUE;
	$data['datatables'] = TRUE;
	$data['form'] = TRUE;
		$data['page'] = lang('doctor');
		$data['img'] = TRUE;

		$this->template
		->set_layout('users')
		->build('add_doctor',isset($data) ? $data : NULL);

		}
	}
	
	function edit_doctor()
	{		

		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('takh', 'Takh', 'required');

		$id = $this->input->post('id', TRUE);
		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('task_update_failed'));
				redirect('doctor');
		}else{
			$form_data = array(
							'name' => $this->input->post('name'),
							'takh' => $this->input->post('takh'),
							'description' => $this->input->post('description'),
							'image' => $this->input->post('image'),
							'url' => $this->input->post('url'),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->where('id',$id)->update('doctor', $form_data); 
			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message',lang('doctor_update_success'));
			redirect('doctor');
		}
	}else{
			$this->load->module('layouts');
	$this->load->library('template');
	$this->load->library('jdf');
	$data['time'] = $this->jdf->jdate('H:i:s',time);
	$data['datepicker'] = TRUE;
	$data['datatables'] = TRUE;
		$data['form'] = TRUE;		$data['img'] = TRUE;

				$data['page'] = lang('doctor');

		$data['doctors'] = $this->item_model->doctor_details($this->uri->segment(3));

		$this->template
		->set_layout('users')
		->build('edit_doctor',isset($data) ? $data : NULL);
	}
	}
	function delete_doctor(){
		if ($this->input->post() ){
					$id = $this->input->post('id', TRUE);
					$this->db->where('id',$id)->delete('doctor');

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message', lang('events_deleted_successfully'));
					redirect($this->input->post('r_url'));
		}else{
			$data['id'] = $this->uri->segment(3);
			$this->load->view('delete_doctor',$data);
		}
		
	}

}

/* End of file items.php */