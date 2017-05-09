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


class Work extends MX_Controller {

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

	$this->template->title(lang('work').' - '.$this->config->item('company_name'). ' '. $this->config->item('version'));
	$data['page'] = lang('work');

	$data['ssmw'] = $this->item_model->list_ssmw();
	$data['dan'] = $this->item_model->list_dan();
	$data['clinic'] = $this->item_model->list_clinic();
	$data['service'] = $this->item_model->list_service();

	$this->template
	->set_layout('users')
	->build('work',isset($data) ? $data : NULL);
	}
	function add_ssmw()
	{
		
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('description', 'Description', 'required');

		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('error_editor'));
				redirect('work');
		}else{
			$form_data = array(
							'description' => $this->input->post('description'),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->insert('ssmw', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', 'اضافه کردن چراSSD با موفقیت انجام شد');
			redirect('work');
		}
		}else{
	$this->load->module('layouts');
	$this->load->library('template');
	$this->load->library('jdf');
	$data['time'] = $this->jdf->jdate('H:i:s',time);
	$data['datepicker'] = TRUE;
	$data['datatables'] = TRUE;
		$data['form'] = TRUE;
			$data['page'] = lang('work');

		$this->template
		->set_layout('users')
		->build('add_work',isset($data) ? $data : NULL);

		}
	}
	
	function edit_ssmw()
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
				redirect('work');
		}else{
			$a=	$this->input->post('description');
 
			$sContent = strip_tags(stripslashes($a),"");
			$form_data = array(
							"description"   =>  $this->input->post('description'),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->where('id',$id)->update('ssmw', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message',lang('ویرایش چرا SSD با موفقیت انجام شد'));
			redirect('work');
		}
	}else{
			$this->load->module('layouts');
	$this->load->library('template');
	$this->load->library('jdf');
	$data['time'] = $this->jdf->jdate('H:i:s',time);
	$data['datepicker'] = TRUE;
	$data['datatables'] = TRUE;
		$data['page'] = lang('work');

		$data['form'] = TRUE;
		$data['task_work'] = $this->item_model->ssmw_details($this->uri->segment(3));
		$this->template
		->set_layout('users')
		->build('edit_work',isset($data) ? $data : NULL);
	}
	}
	function delete_ssmw(){
		if ($this->input->post() ){
					$id = $this->input->post('id', TRUE);
					$this->db->where('id',$id)->delete('ssmw');

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message', lang('events_deleted_successfully'));
					redirect($this->input->post('r_url'));
		}else{
			$data['id'] = $this->uri->segment(3);
			$this->load->view('modal/delete_work',$data);
		}
		
	}
	
/*dan*/
function add_dan()
	{
		
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('description', 'Description', 'required');

		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('error_editor'));
				redirect('work');
		}else{
			$form_data = array(
							'name' => $this->input->post('name'),
							'description' => $this->input->post('description'),
							'image' => $this->input->post('image'),
							'file' => $this->input->post('file'),
							'url' => $this->input->post('url'),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->insert('dan', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', 'دانستنیهای کسب و کار با موفقیت ثبت شد');
			redirect('work');
		}
		}else{
	$this->load->module('layouts');
	$this->load->library('template');
	$this->load->library('jdf');
	$data['time'] = $this->jdf->jdate('H:i:s',time);
	$data['datepicker'] = TRUE;
	$data['datatables'] = TRUE;
		$data['form'] = TRUE;
			$data['page'] = lang('work');
	$data['img'] = TRUE;
		$this->template
		->set_layout('users')
		->build('add_dan',isset($data) ? $data : NULL);

		}
	}
	
	function edit_dan()
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
				redirect('work');
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
			$this->db->where('id',$id)->update('dan', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message',lang('دانستنیهای کسب و کار با موفقیت ویرایش گردید'));
			redirect('work');
		}
	}else{
			$this->load->module('layouts');
	$this->load->library('template');
	$this->load->library('jdf');
	$data['time'] = $this->jdf->jdate('H:i:s',time);
	$data['datepicker'] = TRUE;
	$data['datatables'] = TRUE;
		$data['page'] = lang('work');
		$data['img'] = TRUE;

		$data['form'] = TRUE;
		$data['dan_details'] = $this->item_model->dan_details($this->uri->segment(3));
		$this->template
		->set_layout('users')
		->build('edit_dan',isset($data) ? $data : NULL);
	}
	}
	function delete_dan(){
		if ($this->input->post() ){
					$id = $this->input->post('id', TRUE);
					$this->db->where('id',$id)->delete('dan');

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message', lang('events_deleted_successfully'));
					redirect($this->input->post('r_url'));
		}else{
			$data['id'] = $this->uri->segment(3);
			$this->load->view('modal/delete_dan',$data);
		}
		
	}
	
	/*clinic*/
function add_clinic()
	{
		
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('description', 'Description', 'required');

		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('error_editor'));
				redirect('work');
		}else{
			$form_data = array(
							'name' => $this->input->post('name'),
							'description' => $this->input->post('description'),
							'image' => $this->input->post('image'),
							'file' => $this->input->post('file'),
							'url' => $this->input->post('url'),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->insert('clinic', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', 'اطلاعات کلینیک کسب و کار با موفقیت ثبت شد');
			redirect('work');
		}
		}else{
	$this->load->module('layouts');
	$this->load->library('template');
	$this->load->library('jdf');
	$data['time'] = $this->jdf->jdate('H:i:s',time);
	$data['datepicker'] = TRUE;
	$data['datatables'] = TRUE;
		$data['form'] = TRUE;
			$data['page'] = lang('work');
	$data['img'] = TRUE;
		$this->template
		->set_layout('users')
		->build('add_clinic',isset($data) ? $data : NULL);

		}
	}
	
	function edit_clinic()
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
				redirect('work');
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
			$this->db->where('id',$id)->update('clinic', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message',lang('اطلاعات کلینیک کسب و کار با موفقیت ویرایش گردید'));
			redirect('work');
		}
	}else{
			$this->load->module('layouts');
	$this->load->library('template');
	$this->load->library('jdf');
	$data['time'] = $this->jdf->jdate('H:i:s',time);
	$data['datepicker'] = TRUE;
	$data['datatables'] = TRUE;
		$data['page'] = lang('work');
		$data['img'] = TRUE;

		$data['form'] = TRUE;
		$data['clinic_details'] = $this->item_model->clinic_details($this->uri->segment(3));
		$this->template
		->set_layout('users')
		->build('edit_clinic',isset($data) ? $data : NULL);
	}
	}
	function delete_clinic(){
		if ($this->input->post() ){
					$id = $this->input->post('id', TRUE);
					$this->db->where('id',$id)->delete('clinic');

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message', lang('events_deleted_successfully'));
					redirect($this->input->post('r_url'));
		}else{
			$data['id'] = $this->uri->segment(3);
			$this->load->view('modal/delete_clinic',$data);
		}
		
	}
	
	
	/*servie*/
function add_service()
	{
		
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('description', 'Description', 'required');

		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('error_editor'));
				redirect('work');
		}else{
			$form_data = array(
							'name' => $this->input->post('name'),
							'description' => $this->input->post('description'),
							'image' => $this->input->post('image'),
							'file' => $this->input->post('file'),
							'url' => $this->input->post('url'),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->insert('service', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', 'اطلاعات با موفقیت ثبت گردید');
			redirect('work');
		}
		}else{
	$this->load->module('layouts');
	$this->load->library('template');
	$this->load->library('jdf');
	$data['time'] = $this->jdf->jdate('H:i:s',time);
	$data['datepicker'] = TRUE;
	$data['datatables'] = TRUE;
		$data['form'] = TRUE;
			$data['page'] = lang('work');
	$data['img'] = TRUE;
		$this->template
		->set_layout('users')
		->build('add_service',isset($data) ? $data : NULL);

		}
	}
	
	function edit_service()
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
				redirect('work');
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
			$this->db->where('id',$id)->update('service', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message',lang('اطلاعات با موفقیت ویرایش گردید'));
			redirect('work');
		}
	}else{
			$this->load->module('layouts');
	$this->load->library('template');
	$this->load->library('jdf');
	$data['time'] = $this->jdf->jdate('H:i:s',time);
	$data['datepicker'] = TRUE;
	$data['datatables'] = TRUE;
		$data['page'] = lang('work');
		$data['img'] = TRUE;

		$data['form'] = TRUE;
		$data['service_details'] = $this->item_model->service_details($this->uri->segment(3));
		$this->template
		->set_layout('users')
		->build('edit_service',isset($data) ? $data : NULL);
	}
	}
	function delete_service(){
		if ($this->input->post() ){
					$id = $this->input->post('id', TRUE);
					$this->db->where('id',$id)->delete('service');

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message', lang('events_deleted_successfully'));
					redirect($this->input->post('r_url'));
		}else{
			$data['id'] = $this->uri->segment(3);
			$this->load->view('modal/delete_service',$data);
		}
		
	}
	
}

/* End of file items.php */