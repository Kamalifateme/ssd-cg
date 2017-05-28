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


class Mosha extends MX_Controller {

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

		$this->template->title(lang('mosha').' - '.$this->config->item('company_name'). ' '. $this->config->item('version'));
		$data['page'] = lang('mosha');
	
		$data['ssmm'] = $this->item_model->list_ssmm();
		$data['fani'] = $this->item_model->list_fani();
		$data['mali'] = $this->item_model->list_mali();
		$data['man'] = $this->item_model->list_man();
	
		$this->template
		->set_layout('users')
		->build('mosha',isset($data) ? $data : NULL);
	}
	function add_ssmm()
	{
		
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('description', 'Description', 'required');

		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('error_editor'));
				redirect('mosha');
		}else{
			$form_data = array(
							'name' => $this->input->post('name'),
							'description' => $this->input->post('description'),
							'image' => $this->input->post('image'),
							'file' => $this->input->post('file'),
							'url' => $this->input->post('url'),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->insert('ssmm', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', 'اطلاعات با موفقیت ثبت گردید.');
			redirect('mosha');
		}
		}else{
			$this->load->module('layouts');
			$this->load->library('template');
			$this->load->library('jdf');
			$data['time'] = $this->jdf->jdate('H:i:s',time);
			$data['datepicker'] = TRUE;
			$data['datatables'] = TRUE;
			$data['form'] = TRUE;
			$data['img'] = TRUE;
			$data['page'] = lang('mosha');

			$this->template
			->set_layout('users')
			->build('add_mosha',isset($data) ? $data : NULL);

		}
	}
	
	function edit_ssmm()
	{		

		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('description', 'Description', 'required');

		$id = $this->input->post('id', TRUE);
		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('task_update_failed'));
				redirect('mosha');
		}else{
			$a=	$this->input->post('description');
 
			$sContent = strip_tags(stripslashes($a),"");
			$form_data = array(
							'name' => $this->input->post('name'),
							'description' => $this->input->post('description'),
							'image' => $this->input->post('image'),
							'url' => $this->input->post('url'),
							'file' => $this->input->post('file'),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->where('id',$id)->update('ssmm', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message',lang('اطلاعات با موفقیت ویرایش گردید'));
			redirect('mosha');
		}
	}else{
		$this->load->module('layouts');
		$this->load->library('template');
		$this->load->library('jdf');
		$data['time'] = $this->jdf->jdate('H:i:s',time);
		$data['datepicker'] = TRUE;
		$data['datatables'] = TRUE;
		$data['page'] = lang('mosha');
		$data['img'] = TRUE;
		$data['form'] = TRUE;
		$data['task_mosha'] = $this->item_model->ssmm_details($this->uri->segment(3));
		$this->template
		->set_layout('users')
		->build('edit_mosha',isset($data) ? $data : NULL);
	}
	}
	function delete_ssmm(){
		if ($this->input->post() ){
					$id = $this->input->post('id', TRUE);
					$this->db->where('id',$id)->delete('ssmm');

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message', lang('events_deleted_successfully'));
					redirect($this->input->post('r_url'));
		}else{
			$data['id'] = $this->uri->segment(3);
			$this->load->view('modal/delete_mosha',$data);
		}
		
	}
	
	/*fani*/
	function add_fani()
	{
		
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('description', 'Description', 'required');

		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('error_editor'));
				redirect('mosha');
		}else{
			$form_data = array(
							'name' => $this->input->post('name'),
							'description' => $this->input->post('description'),
							'image' => $this->input->post('image'),
							'file' => $this->input->post('file'),
							'url' => $this->input->post('url'),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->insert('fani', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', 'اطلاعات با موفقیت ثبت گردید.');
			redirect('mosha');
		}
		}else{
			$this->load->module('layouts');
			$this->load->library('template');
			$this->load->library('jdf');
			$data['time'] = $this->jdf->jdate('H:i:s',time);
			$data['datepicker'] = TRUE;
			$data['datatables'] = TRUE;
			$data['form'] = TRUE;
			$data['page'] = lang('mosha');
			$data['img'] = TRUE;
			$this->template
			->set_layout('users')
			->build('add_fani',isset($data) ? $data : NULL);

		}
	}
	
	function edit_fani()
	{		

		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('description', 'Description', 'required');

		$id = $this->input->post('id', TRUE);
		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('task_update_failed'));
				redirect('mosha');
		}else{
			$a=	$this->input->post('description');
 
			$sContent = strip_tags(stripslashes($a),"");
			$form_data = array(
							'name' => $this->input->post('name'),
							'description' => $this->input->post('description'),
							'image' => $this->input->post('image'),
							'url' => $this->input->post('url'),
							'file' => $this->input->post('file'),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->where('id',$id)->update('fani', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message',lang('اطلاعات با موفقیت ویرایش گردید'));
			redirect('mosha');
		}
	}else{
		$this->load->module('layouts');
		$this->load->library('template');
		$this->load->library('jdf');
		$data['time'] = $this->jdf->jdate('H:i:s',time);
		$data['datepicker'] = TRUE;
		$data['datatables'] = TRUE;
		$data['page'] = lang('mosha');
		$data['img'] = TRUE;

		$data['form'] = TRUE;
		$data['fani_details'] = $this->item_model->fani_details($this->uri->segment(3));
		$this->template
		->set_layout('users')
		->build('edit_fani',isset($data) ? $data : NULL);
	}
	}
	function delete_fani(){
		if ($this->input->post() ){
					$id = $this->input->post('id', TRUE);
					$this->db->where('id',$id)->delete('fani');

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message', lang('events_deleted_successfully'));
					redirect($this->input->post('r_url'));
		}else{
			$data['id'] = $this->uri->segment(3);
			$this->load->view('modal/delete_fani',$data);
		}
		
	}
	
	/*man*/
	function add_man()
	{
		
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('description', 'Description', 'required');

		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('error_editor'));
				redirect('mosha');
		}else{
			$form_data = array(
							'name' => $this->input->post('name'),
							'description' => $this->input->post('description'),
							'image' => $this->input->post('image'),
							'file' => $this->input->post('file'),
							'url' => $this->input->post('url'),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->insert('man', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', 'اطلاعات با موفقیت ثبت گردید.');
			redirect('mosha');
		}
		}else{
			$this->load->module('layouts');
			$this->load->library('template');
			$this->load->library('jdf');
			$data['time'] = $this->jdf->jdate('H:i:s',time);
			$data['datepicker'] = TRUE;
			$data['datatables'] = TRUE;
			$data['form'] = TRUE;
			$data['page'] = lang('mosha');
			$data['img'] = TRUE;
			$this->template
			->set_layout('users')
			->build('add_man',isset($data) ? $data : NULL);

		}
	}
	
	function edit_man()
	{		

		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('description', 'Description', 'required');

		$id = $this->input->post('id', TRUE);
		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('task_update_failed'));
				redirect('mosha');
		}else{
			$a=	$this->input->post('description');
 
			$sContent = strip_tags(stripslashes($a),"");
			$form_data = array(
							'name' => $this->input->post('name'),
							'description' => $this->input->post('description'),
							'image' => $this->input->post('image'),
							'url' => $this->input->post('url'),
							'file' => $this->input->post('file'),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->where('id',$id)->update('man', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message',lang('اطلاعات با موفقیت ویرایش گردید'));
			redirect('mosha');
		}
	}else{
		$this->load->module('layouts');
		$this->load->library('template');
		$this->load->library('jdf');
		$data['time'] = $this->jdf->jdate('H:i:s',time);
		$data['datepicker'] = TRUE;
		$data['datatables'] = TRUE;
		$data['page'] = lang('mosha');
		$data['img'] = TRUE;

		$data['form'] = TRUE;
		$data['man_details'] = $this->item_model->man_details($this->uri->segment(3));
		$this->template
		->set_layout('users')
		->build('edit_man',isset($data) ? $data : NULL);
	}
	}
	function delete_man(){
		if ($this->input->post() ){
					$id = $this->input->post('id', TRUE);
					$this->db->where('id',$id)->delete('man');

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message', lang('events_deleted_successfully'));
					redirect($this->input->post('r_url'));
		}else{
			$data['id'] = $this->uri->segment(3);
			$this->load->view('modal/delete_man',$data);
		}
		
	}
	
	
	/*mali*/
	function add_mali()
	{
		
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('description', 'Description', 'required');

		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('error_editor'));
				redirect('mosha');
		}else{
			$form_data = array(
							'name' => $this->input->post('name'),
							'description' => $this->input->post('description'),
							'image' => $this->input->post('image'),
							'file' => $this->input->post('file'),
							'url' => $this->input->post('url'),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->insert('mali', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', 'اطلاعات با موفقیت ثبت گردید.');
			redirect('mosha');
		}
		}else{
			$this->load->module('layouts');
			$this->load->library('template');
			$this->load->library('jdf');
			$data['time'] = $this->jdf->jdate('H:i:s',time);
			$data['datepicker'] = TRUE;
			$data['datatables'] = TRUE;
			$data['form'] = TRUE;
			$data['page'] = lang('mosha');
			$data['img'] = TRUE;
			$this->template
			->set_layout('users')
			->build('add_mali',isset($data) ? $data : NULL);

		}
	}
	
	function edit_mali()
	{		

		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('description', 'Description', 'required');

		$id = $this->input->post('id', TRUE);
		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('task_update_failed'));
				redirect('mosha');
		}else{
			$a=	$this->input->post('description');
 
			$sContent = strip_tags(stripslashes($a),"");
			$form_data = array(
							'name' => $this->input->post('name'),
							'description' => $this->input->post('description'),
							'image' => $this->input->post('image'),
							'url' => $this->input->post('url'),
							'file' => $this->input->post('file'),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->where('id',$id)->update('mali', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message',lang('اطلاعات با موفقیت ویرایش گردید'));
			redirect('mosha');
		}
	}else{
		$this->load->module('layouts');
		$this->load->library('template');
		$this->load->library('jdf');
		$data['time'] = $this->jdf->jdate('H:i:s',time);
		$data['datepicker'] = TRUE;
		$data['datatables'] = TRUE;
		$data['page'] = lang('mosha');
		$data['img'] = TRUE;

		$data['form'] = TRUE;
		$data['mali_details'] = $this->item_model->mali_details($this->uri->segment(3));
		$this->template
		->set_layout('users')
		->build('edit_mali',isset($data) ? $data : NULL);
	}
	}
	function delete_mali(){
		if ($this->input->post() ){
					$id = $this->input->post('id', TRUE);
					$this->db->where('id',$id)->delete('mali');

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message', lang('events_deleted_successfully'));
					redirect($this->input->post('r_url'));
		}else{
			$data['id'] = $this->uri->segment(3);
			$this->load->view('modal/delete_mali',$data);
		}
		
	}
	
	
	

}

/* End of file items.php */