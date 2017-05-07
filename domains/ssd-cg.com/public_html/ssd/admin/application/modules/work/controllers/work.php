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
	$data['lead'] = $this->item_model->list_lead();
	$data['grow'] = $this->item_model->list_grow();
	$data['marketing'] = $this->item_model->list_marketing();
	$data['tech'] = $this->item_model->list_tech();
	$data['social'] = $this->item_model->list_social();
	$data['finance'] = $this->item_model->list_finance();
	$data['entre'] = $this->item_model->list_entre();
	$data['busi'] = $this->item_model->list_busi();
	$data['franch'] = $this->item_model->list_franch();
	$data['mag'] = $this->item_model->list_mag();

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
	
		/*lead*/
function add_lead()
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
			$this->db->insert('lead', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', 'اطلاعات رهبری با موفقیت ثبت شد');
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
		->build('add_lead',isset($data) ? $data : NULL);

		}
	}
	
	function edit_lead()
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
			$this->db->where('id',$id)->update('lead', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message',lang('اطلاعات رهبری با موفقیت ویرایش گردید'));
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
		$data['lead_details'] = $this->item_model->lead_details($this->uri->segment(3));
		$this->template
		->set_layout('users')
		->build('edit_lead',isset($data) ? $data : NULL);
	}
	}
	function delete_lead(){
		if ($this->input->post() ){
					$id = $this->input->post('id', TRUE);
					$this->db->where('id',$id)->delete('lead');

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message', lang('events_deleted_successfully'));
					redirect($this->input->post('r_url'));
		}else{
			$data['id'] = $this->uri->segment(3);
			$this->load->view('modal/delete_lead',$data);
		}
		
	}
	
	/*grow*/
function add_grow()
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
			$this->db->insert('grow', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', 'اطلاعات استراتژی های رشد با موفقیت ثبت شد');
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
		->build('add_grow',isset($data) ? $data : NULL);

		}
	}
	
	function edit_grow()
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
			$this->db->where('id',$id)->update('grow', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message',lang('اطلاعات استراتژی های رشد با موفقیت ویرایش گردید'));
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
		$data['grow_details'] = $this->item_model->grow_details($this->uri->segment(3));
		$this->template
		->set_layout('users')
		->build('edit_grow',isset($data) ? $data : NULL);
	}
	}
	function delete_grow(){
		if ($this->input->post() ){
					$id = $this->input->post('id', TRUE);
					$this->db->where('id',$id)->delete('grow');

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message', lang('events_deleted_successfully'));
					redirect($this->input->post('r_url'));
		}else{
			$data['id'] = $this->uri->segment(3);
			$this->load->view('modal/delete_grow',$data);
		}
		
	}
	/*marketing*/
function add_marketing()
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
			$this->db->insert('marketing', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', 'اطلاعات بازاریابی با موفقیت ثبت شد');
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
		->build('add_marketing',isset($data) ? $data : NULL);

		}
	}
	
	function edit_marketing()
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
			$this->db->where('id',$id)->update('marketing', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message',lang('اطلاعات بازاریابی با موفقیت ویرایش گردید'));
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
		$data['marketing_details'] = $this->item_model->marketing_details($this->uri->segment(3));
		$this->template
		->set_layout('users')
		->build('edit_marketing',isset($data) ? $data : NULL);
	}
	}
	function delete_marketing(){
		if ($this->input->post() ){
					$id = $this->input->post('id', TRUE);
					$this->db->where('id',$id)->delete('marketing');

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message', lang('events_deleted_successfully'));
					redirect($this->input->post('r_url'));
		}else{
			$data['id'] = $this->uri->segment(3);
			$this->load->view('modal/delete_marketing',$data);
		}
		
	}
	/*tech*/
function add_tech()
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
			$this->db->insert('tech', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', 'اطلاعات تکنولوژی با موفقیت ثبت شد');
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
		->build('add_tech',isset($data) ? $data : NULL);

		}
	}
	
	function edit_tech()
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
			$this->db->where('id',$id)->update('tech', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message',lang('اطلاعات تکنولوژی با موفقیت ویرایش گردید'));
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
		$data['tech_details'] = $this->item_model->tech_details($this->uri->segment(3));
		$this->template
		->set_layout('users')
		->build('edit_tech',isset($data) ? $data : NULL);
	}
	}
	function delete_tech(){
		if ($this->input->post() ){
					$id = $this->input->post('id', TRUE);
					$this->db->where('id',$id)->delete('tech');

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message', lang('events_deleted_successfully'));
					redirect($this->input->post('r_url'));
		}else{
			$data['id'] = $this->uri->segment(3);
			$this->load->view('modal/delete_tech',$data);
		}
		
	}
	/*social*/
function add_social()
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
			$this->db->insert('social', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', 'اطلاعات رسانه های اجتماعی با موفقیت ثبت شد');
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
		->build('add_social',isset($data) ? $data : NULL);

		}
	}
	
	function edit_social()
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
			$this->db->where('id',$id)->update('social', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message',lang('اطلاعات رسانه های اجتماعی با موفقیت ویرایش گردید'));
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
		$data['social_details'] = $this->item_model->social_details($this->uri->segment(3));
		$this->template
		->set_layout('users')
		->build('edit_social',isset($data) ? $data : NULL);
	}
	}
	function delete_social(){
		if ($this->input->post() ){
					$id = $this->input->post('id', TRUE);
					$this->db->where('id',$id)->delete('social');

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message', lang('events_deleted_successfully'));
					redirect($this->input->post('r_url'));
		}else{
			$data['id'] = $this->uri->segment(3);
			$this->load->view('modal/delete_social',$data);
		}
		
	}
	/*finance*/
function add_finance()
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
			$this->db->insert('finance', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', 'اطلاعات مالی با موفقیت ثبت شد');
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
		->build('add_finance',isset($data) ? $data : NULL);

		}
	}
	
	function edit_finance()
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
			$this->db->where('id',$id)->update('finance', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message',lang('اطلاعات مالی با موفقیت ویرایش گردید'));
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
		$data['finance_details'] = $this->item_model->finance_details($this->uri->segment(3));
		$this->template
		->set_layout('users')
		->build('edit_finance',isset($data) ? $data : NULL);
	}
	}
	function delete_finance(){
		if ($this->input->post() ){
					$id = $this->input->post('id', TRUE);
					$this->db->where('id',$id)->delete('finance');

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message', lang('events_deleted_successfully'));
					redirect($this->input->post('r_url'));
		}else{
			$data['id'] = $this->uri->segment(3);
			$this->load->view('modal/delete_finance',$data);
		}
		
	}
	/*entre*/
function add_entre()
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
			$this->db->insert('entre', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', 'اطلاعات کارآفرینی با موفقیت ثبت شد');
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
		->build('add_entre',isset($data) ? $data : NULL);

		}
	}
	
	function edit_entre()
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
			$this->db->where('id',$id)->update('entre', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message',lang('اطلاعات کارآفرینی با موفقیت ویرایش گردید'));
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
		$data['entre_details'] = $this->item_model->entre_details($this->uri->segment(3));
		$this->template
		->set_layout('users')
		->build('edit_entre',isset($data) ? $data : NULL);
	}
	}
	function delete_entre(){
		if ($this->input->post() ){
					$id = $this->input->post('id', TRUE);
					$this->db->where('id',$id)->delete('entre');

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message', lang('events_deleted_successfully'));
					redirect($this->input->post('r_url'));
		}else{
			$data['id'] = $this->uri->segment(3);
			$this->load->view('modal/delete_entre',$data);
		}
		
	}
	/*busi*/
function add_busi()
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
			$this->db->insert('busi', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', 'اطلاعات شروع یک کسب و کار با موفقیت ثبت شد');
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
		->build('add_busi',isset($data) ? $data : NULL);

		}
	}
	
	function edit_busi()
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
			$this->db->where('id',$id)->update('busi', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message',lang('اطلاعات شروع یک کسب و کار با موفقیت ویرایش گردید'));
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
		$data['busi_details'] = $this->item_model->busi_details($this->uri->segment(3));
		$this->template
		->set_layout('users')
		->build('edit_busi',isset($data) ? $data : NULL);
	}
	}
	function delete_busi(){
		if ($this->input->post() ){
					$id = $this->input->post('id', TRUE);
					$this->db->where('id',$id)->delete('busi');

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message', lang('events_deleted_successfully'));
					redirect($this->input->post('r_url'));
		}else{
			$data['id'] = $this->uri->segment(3);
			$this->load->view('modal/delete_busi',$data);
		}
		
	}
	/*franch*/
function add_franch()
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
			$this->db->insert('franch', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', 'اطلاعات فرانشیز با موفقیت ثبت شد');
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
		->build('add_franch',isset($data) ? $data : NULL);

		}
	}
	
	function edit_franch()
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
			$this->db->where('id',$id)->update('franch', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message',lang('اطلاعات فرانشیز با موفقیت ویرایش گردید'));
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
		$data['franch_details'] = $this->item_model->franch_details($this->uri->segment(3));
		$this->template
		->set_layout('users')
		->build('edit_franch',isset($data) ? $data : NULL);
	}
	}
	function delete_franch(){
		if ($this->input->post() ){
					$id = $this->input->post('id', TRUE);
					$this->db->where('id',$id)->delete('franch');

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message', lang('events_deleted_successfully'));
					redirect($this->input->post('r_url'));
		}else{
			$data['id'] = $this->uri->segment(3);
			$this->load->view('modal/delete_franch',$data);
		}
		
	}
	/*mag*/
function add_mag()
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
			$this->db->insert('mag', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', 'اطلاعات مجله با موفقیت ثبت شد');
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
		->build('add_mag',isset($data) ? $data : NULL);

		}
	}
	
	function edit_mag()
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
			$this->db->where('id',$id)->update('mag', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message',lang('اطلاعات مجله با موفقیت ویرایش گردید'));
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
		$data['mag_details'] = $this->item_model->mag_details($this->uri->segment(3));
		$this->template
		->set_layout('users')
		->build('edit_mag',isset($data) ? $data : NULL);
	}
	}
	function delete_mag(){
		if ($this->input->post() ){
					$id = $this->input->post('id', TRUE);
					$this->db->where('id',$id)->delete('mag');

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message', lang('events_deleted_successfully'));
					redirect($this->input->post('r_url'));
		}else{
			$data['id'] = $this->uri->segment(3);
			$this->load->view('modal/delete_mag',$data);
		}
		
	}
	
}

/* End of file items.php */