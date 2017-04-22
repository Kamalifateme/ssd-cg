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


class Hospital extends MX_Controller {

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
	$this->template->title(lang('hospital').' - '.$this->config->item('company_name'). ' '. $this->config->item('version'));
	$data['page'] = lang('hospital');

	$data['hospital'] = $this->item_model->list_hospital();
	$data['city'] = $this->item_model->list_city();

	$this->template
	->set_layout('users')
	->build('hospital',isset($data) ? $data : NULL);
	}
	
	function add_city()
	{
		
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('city', 'City', 'required');

		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('error_editor'));
				redirect('hospital');
		}else{
			$form_data = array(
							'city' => $this->input->post('city',TRUE),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->insert('city', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', lang('city_add_success'));
			redirect('hospital');
		}
		}else{
		$this->load->view('modal/add_city');
		}
	}
	
	
	
	function edit_city()
	{		

		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('city', 'City', 'required');

		$id = $this->input->post('id', TRUE);
		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('task_update_failed'));
				redirect('hospital');
		}else{
 
			$sContent = strip_tags(stripslashes($a),"");
			$form_data = array(
							"city"   =>  $this->input->post('city',TRUE),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->where('id',$id)->update('city', $form_data); 
			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message',lang('city_edit_success'));
			redirect('hospital');
		}
	}else{
		$data['task_city'] = $this->item_model->city_details($this->uri->segment(3));
		$this->load->view('modal/edit_city',isset($data) ? $data : NULL);
	}
	}
	
	
		function delete_city(){
		if ($this->input->post() ){
					$id = $this->input->post('id', TRUE);
					$this->db->where('id',$id)->delete('city');

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message', lang('events_deleted_successfully'));
					redirect($this->input->post('r_url'));
		}else{
			$data['id'] = $this->uri->segment(3);
			$this->load->view('modal/delete_city',$data);
		}
		
	}
	
	
	
	
	
	
	
	function add_hospital()
	{
		
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('error_editor'));
				redirect('hospital');
		}else{
			$form_data = array(
							'name' => $this->input->post('name'),
							'city' => $this->input->post('city'),
							'url' => $this->input->post('url'),

							'description' => $this->input->post('description'),
							'image' => $this->input->post('image'),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->insert('hospital', $form_data); 
			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', lang('hospital_add_success'));
			redirect('hospital');
		}
		}else{
	$this->load->module('layouts');
	$this->load->library('template');
	$this->load->library('jdf');
	$data['time'] = $this->jdf->jdate('H:i:s',time);
	$data['datepicker'] = TRUE;
	$data['datatables'] = TRUE;
	$data['form'] = TRUE;
		$data['page'] = lang('hospital');
		$data['img'] = TRUE;

	$data['city'] = $this->item_model->list_city();
		$this->template
		->set_layout('users')
		->build('add_hospital',isset($data) ? $data : NULL);

		}
	}
	
	function edit_hospital()
	{		

		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');

		$id = $this->input->post('id', TRUE);
		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('task_update_failed'));
				redirect('hospital');
		}else{
			$form_data = array(
							'name' => $this->input->post('name'),
							'city' => $this->input->post('city'),
							'description' => $this->input->post('description'),
							'image' => $this->input->post('image'),
							'url' => $this->input->post('url'),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->where('id',$id)->update('hospital', $form_data); 
			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message',lang('hospital_update_success'));
			redirect('hospital');
		}
	}else{
			$this->load->module('layouts');
	$this->load->library('template');
	$this->load->library('jdf');
	$data['time'] = $this->jdf->jdate('H:i:s',time);
	$data['datepicker'] = TRUE;
	$data['datatables'] = TRUE;
		$data['form'] = TRUE;		$data['img'] = TRUE;

				$data['page'] = lang('hospital');

		$data['hospitals'] = $this->item_model->hospital_details($this->uri->segment(3));
	$data['city'] = $this->item_model->list_city();

		$this->template
		->set_layout('users')
		->build('edit_hospital',isset($data) ? $data : NULL);
	}
	}
	function delete_hospital(){
		if ($this->input->post() ){
					$id = $this->input->post('id', TRUE);
					$this->db->where('id',$id)->delete('hospital');

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message', lang('events_deleted_successfully'));
					redirect($this->input->post('r_url'));
		}else{
			$data['id'] = $this->uri->segment(3);
			$this->load->view('modal/delete_hospital',$data);
		}
		
	}

}

/* End of file items.php */