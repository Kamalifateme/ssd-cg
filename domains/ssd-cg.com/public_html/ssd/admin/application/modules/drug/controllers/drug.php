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


class Drug extends MX_Controller {

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
	$this->template->title(lang('drug').' - '.$this->config->item('company_name'). ' '. $this->config->item('version'));
	$data['page'] = lang('drug');

	$data['face'] = $this->item_model->list_face();
	$data['group'] = $this->item_model->list_group();
	$data['alephpa'] = $this->item_model->list_alephpa();
	$data['drug'] = $this->item_model->list_drug();

	$this->template
	->set_layout('users')
	->build('drug',isset($data) ? $data : NULL);
	}
	function add_face()
	{
		
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('type', 'Type', 'required');

		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('error_editor'));
				redirect('drug');
		}else{
			$form_data = array(
							'type' => $this->input->post('type',TRUE),
							'url' => $this->input->post('url',TRUE),							
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->insert('face', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', lang('face_add_success'));
			redirect('drug');
		}
		}else{
		$this->load->view('face/add_face');
		}
	}
	function edit_face()
	{		

		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('type', 'Type', 'required');

		$id = $this->input->post('id', TRUE);
		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('task_update_failed'));
				redirect('drug');
		}else{
 
			$sContent = strip_tags(stripslashes($a),"");
			$form_data = array(
							"type"   =>  $this->input->post('type',TRUE),
							'url' => $this->input->post('url',TRUE),														
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->where('id',$id)->update('face', $form_data); 
			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message',lang('face_edit_success'));
			redirect('drug');
		}
	}else{
		$data['task_face'] = $this->item_model->face_details($this->uri->segment(3));
		$this->load->view('face/edit_face',isset($data) ? $data : NULL);
	}
	}
	function delete_face(){
		if ($this->input->post() ){
					$id = $this->input->post('id', TRUE);
					$this->db->where('id',$id)->delete('face');

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message', lang('face_deleted_successfully'));
					redirect($this->input->post('r_url'));
		}else{
			$data['id'] = $this->uri->segment(3);
			$this->load->view('face/delete_face',$data);
		}
		
	}
		function add_group()
	{
		
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('type', 'Type', 'required');

		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('error_editor'));
				redirect('drug');
		}else{
			$form_data = array(
							'type' => $this->input->post('type',TRUE),
							'url' => $this->input->post('url',TRUE),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->insert('group', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', lang('group_add_success'));
			redirect('drug');
		}
		}else{
		$this->load->view('group/add_group');
		}
	}
	function edit_group()
	{		

		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('type', 'Type', 'required');

		$id = $this->input->post('id', TRUE);
		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('task_update_failed'));
				redirect('drug');
		}else{
 
			$sContent = strip_tags(stripslashes($a),"");
			$form_data = array(
							"type"   =>  $this->input->post('type',TRUE),
							'url' => $this->input->post('url',TRUE),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->where('id',$id)->update('group', $form_data); 
			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message',lang('group_edit_success'));
			redirect('drug');
		}
	}else{
		$data['task_group'] = $this->item_model->group_details($this->uri->segment(3));
		$this->load->view('group/edit_group',isset($data) ? $data : NULL);
	}
	}
	function delete_group(){
		if ($this->input->post() ){
					$id = $this->input->post('id', TRUE);
					$this->db->where('id',$id)->delete('group');

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message', lang('group_deleted_successfully'));
					redirect($this->input->post('r_url'));
		}else{
			$data['id'] = $this->uri->segment(3);
			$this->load->view('group/delete_group',$data);
		}
		
	}
		function add_alephpa()
	{
		
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('type', 'Type', 'required');

		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('error_editor'));
				redirect('drug');
		}else{
			$form_data = array(
							'type' => $this->input->post('type',TRUE),
							'url' => $this->input->post('url',TRUE),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->insert('alephpa', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', lang('alephpa_add_success'));
			redirect('drug');
		}
		}else{
		$this->load->view('alephpa/add_alephpa');
		}
	}
	function edit_alephpa()
	{		

		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('type', 'Type', 'required');

		$id = $this->input->post('id', TRUE);
		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('task_update_failed'));
				redirect('drug');
		}else{
 
			$sContent = strip_tags(stripslashes($a),"");
			$form_data = array(
							"type"   =>  $this->input->post('type',TRUE),
							'url' => $this->input->post('url',TRUE),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->where('id',$id)->update('alephpa', $form_data); 
			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message',lang('alephpa_edit_success'));
			redirect('drug');
		}
	}else{
		$data['task_alephpa'] = $this->item_model->alephpa_details($this->uri->segment(3));
		$this->load->view('alephpa/edit_alephpa',isset($data) ? $data : NULL);
	}
	}
	function delete_alephpa(){
		if ($this->input->post() ){
					$id = $this->input->post('id', TRUE);
					$this->db->where('id',$id)->delete('alephpa');

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message', lang('alephpa_deleted_successfully'));
					redirect($this->input->post('r_url'));
		}else{
			$data['id'] = $this->uri->segment(3);
			$this->load->view('alephpa/delete_alephpa',$data);
		}
		
	}
		function add_drug()
	{
		
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('name', 'Name', 'required');

		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('error_editor'));
				redirect('drug');
		}else{
			$form_data = array(
							'name' => $this->input->post('name',TRUE),
							'description' => $this->input->post('description',TRUE),
							'alephpa' => $this->input->post('alephpa',TRUE),
							'group' => $this->input->post('group',TRUE),
							'face' => $this->input->post('face',TRUE),
							'url' => $this->input->post('url',TRUE),
			                'saved_by' => $this->tank_auth->get_user_id(),
							
			            );
			$this->db->insert('drug', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', lang('drug_add_success'));
			redirect('drug');
		}
		}else{
	$this->load->module('layouts');
	$this->load->library('template');
	$this->load->library('jdf');
	$data['time'] = $this->jdf->jdate('H:i:s',time);
	$data['datepicker'] = TRUE;
	$data['datatables'] = TRUE;
	$data['form'] = TRUE;		$data['img'] = TRUE;
	$data['page'] = lang('drug');
	$data['face'] = $this->item_model->list_face();
	$data['group'] = $this->item_model->list_group();
	$data['alephpa'] = $this->item_model->list_alephpa();
	$data['drug'] = $this->item_model->list_drug();
		$this->template
		->set_layout('users')
		->build('add_drug',isset($data) ? $data : NULL);
		}
	}
	function edit_drug()
	{		

		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('name', 'Name', 'required');


		$id = $this->input->post('id', TRUE);
		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('task_update_failed'));
				redirect('drug');
		}else{
 
			$sContent = strip_tags(stripslashes($a),"");
			$form_data = array(
							'name' => $this->input->post('name',TRUE),
							'description' => $this->input->post('description',TRUE),
							'alephpa' => $this->input->post('alephpa',TRUE),
							'group' => $this->input->post('group',TRUE),
							'face' => $this->input->post('face',TRUE),
							'url' => $this->input->post('url',TRUE),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->where('id',$id)->update('drug', $form_data); 
			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message',lang('drug_edit_success'));
			redirect('drug');
		}
	}else{
		$data['task_drug'] = $this->item_model->drug_details($this->uri->segment(3));
		
	$this->load->module('layouts');
	$this->load->library('template');
	$this->load->library('jdf');
	$data['time'] = $this->jdf->jdate('H:i:s',time);
	$data['datepicker'] = TRUE;
	$data['datatables'] = TRUE;
	$data['form'] = TRUE;		$data['img'] = TRUE;
	$data['page'] = lang('drug');
	$data['face'] = $this->item_model->list_face();
	$data['group'] = $this->item_model->list_group();
	$data['alephpa'] = $this->item_model->list_alephpa();
	$data['drug'] = $this->item_model->list_drug();
		$this->template
		->set_layout('users')
		->build('edit_drug',isset($data) ? $data : NULL);
		}
		}
	function delete_drug(){
		if ($this->input->post() ){
					$id = $this->input->post('id', TRUE);
					$this->db->where('id',$id)->delete('drug');

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message', lang('drug_deleted_successfully'));
					redirect($this->input->post('r_url'));
		}else{
			$data['id'] = $this->uri->segment(3);
			$this->load->view('drug/delete_drug',$data);
		}
		
	}

}

/* End of file items.php */