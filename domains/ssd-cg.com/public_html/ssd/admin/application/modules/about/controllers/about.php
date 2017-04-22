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


class About extends MX_Controller {

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

	$this->template->title(lang('about').' - '.$this->config->item('company_name'). ' '. $this->config->item('version'));
	$data['page'] = lang('about');

	$data['about'] = $this->item_model->list_about();

	$this->template->title(lang('catalog').' - '.$this->config->item('company_name'). ' '. $this->config->item('version'));

	$data['catalog'] = $this->item_model->list_catalog();
	$data['customer'] = $this->item_model->list_customer();

	
	$this->template
	->set_layout('users')
	->build('about',isset($data) ? $data : NULL);
	}
	function add_about()
	{
		
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('description', 'Description', 'required');

		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('error_editor'));
				redirect('about');
		}else{
			$form_data = array(
							'description' => $this->input->post('description'),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->insert('introduction', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			
			
			$this->session->set_flashdata('message', lang('about_add_success'));
			$this->load->library('email');
			$this->email->from('info@unique-web.ir', 'unique');
			$this->email->to('uniqueweb.ir@gmail.com'); 
			$this->email->subject('Email Test');
			$this->email->message('Testing the email class.');	
			$this->email->send();
			echo $this->email->print_debugger();

			redirect('about');

		}
		}else{
	$this->load->module('layouts');
	$this->load->library('template');
	$this->load->library('jdf');
	$data['time'] = $this->jdf->jdate('H:i:s',time);
	$data['datepicker'] = TRUE;
	$data['datatables'] = TRUE;
		$data['form'] = TRUE;
			$data['page'] = lang('about');

		$this->template
		->set_layout('users')
		->build('add_about',isset($data) ? $data : NULL);

		}
	}
	
	function edit_about()
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
				redirect('about');
		}else{
			$a=	$this->input->post('description');
 
			$sContent = strip_tags(stripslashes($a),"");
			$form_data = array(
							"description"   =>  $this->input->post('description'),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->where('id',$id)->update('introduction', $form_data); 
			$des=$this->input->post('description');
			echo $des;
			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message','طلاعات درباره ما بدرستی ویرایش گریدد');
			redirect('about');
		}
	}else{
			$this->load->module('layouts');
	$this->load->library('template');
	$this->load->library('jdf');
	$data['time'] = $this->jdf->jdate('H:i:s',time);
	$data['datepicker'] = TRUE;
	$data['datatables'] = TRUE;
		$data['page'] = lang('about');

		$data['form'] = TRUE;
		$data['task_about'] = $this->item_model->about_details($this->uri->segment(3));
		$this->template
		->set_layout('users')
		->build('edit_about',isset($data) ? $data : NULL);
	}
	}
	function delete_about(){
		if ($this->input->post() ){
					$id = $this->input->post('id', TRUE);
					$this->db->where('id',$id)->delete('introduction');

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message', lang('events_deleted_successfully'));
					redirect($this->input->post('r_url'));
		}else{
			$data['id'] = $this->uri->segment(3);
			$this->load->view('modal/delete_about',$data);
		}
		
	}

	
	
	
	function add_catalog()
	{
		
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('name', 'Name', 'required');

		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('error_editor'));
				redirect('about');
		}else{
			$form_data = array(
						    'name' => $this->input->post('name'),
							'address' => $this->input->post('address'),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->insert('catalog', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			
			
			$this->session->set_flashdata('message', 'اطلاعات کاتالوگ با موفقیت ثبت گردید');


			redirect('about');
		}
		}else{
	$this->load->module('layouts');
	$this->load->library('template');
	$this->load->library('jdf');
	$data['time'] = $this->jdf->jdate('H:i:s',time);
	$data['datepicker'] = TRUE;
	$data['datatables'] = TRUE;
		$data['form'] = TRUE;
			$data['page'] = lang('about');
		$data['img'] = TRUE;

		$this->template
		->set_layout('users')
		->build('add_catalog',isset($data) ? $data : NULL);

		}
	}
	
		function edit_catalog()
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
				redirect('about');
		}else{
			$a=	$this->input->post('description');
 
			$sContent = strip_tags(stripslashes($a),"");
			$form_data = array(
						    'name' => $this->input->post('name'),
							'address' => $this->input->post('address'),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->where('id',$id)->update('catalog', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message','اطلاعات کاتالوگ ویرایش گردید');
			redirect('about');
		}
	}else{
			$this->load->module('layouts');
	$this->load->library('template');
	$this->load->library('jdf');
	$data['time'] = $this->jdf->jdate('H:i:s',time);
	$data['datepicker'] = TRUE;
	$data['datatables'] = TRUE;
		$data['page'] = lang('about');
		$data['img'] = TRUE;

		$data['form'] = TRUE;
		$data['task_catalog'] = $this->item_model->catalog_details($this->uri->segment(3));
		$this->template
		->set_layout('users')
		->build('edit_catalog',isset($data) ? $data : NULL);
	}
	}
	function delete_catalog(){
		if ($this->input->post() ){
					$id = $this->input->post('id', TRUE);
					$this->db->where('id',$id)->delete('catalog');

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message', 'کاتالوگ مورد نظر با موفقیت حذف شد');
					redirect($this->input->post('r_url'));
		}else{
			$data['id'] = $this->uri->segment(3);
			$this->load->view('modal/delete_catalog',$data);
		}
		
	}
	
		function add_customer()
	{
		
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('name', 'Name', 'required');

		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('error_editor'));
				redirect('about');
		}else{
			$form_data = array(
						    'name' => $this->input->post('name'),
							'image' => $this->input->post('image'),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->insert('customer', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			
			
			$this->session->set_flashdata('message', 'اطلاعات مشتری مورد نظر ثبت گردید');


			redirect('about');
		}
		}else{
	$this->load->module('layouts');
	$this->load->library('template');
	$this->load->library('jdf');
	$data['time'] = $this->jdf->jdate('H:i:s',time);
	$data['datepicker'] = TRUE;
	$data['datatables'] = TRUE;
		$data['form'] = TRUE;
			$data['page'] = lang('about');
		$data['img'] = TRUE;

		$this->template
		->set_layout('users')
		->build('add_customer',isset($data) ? $data : NULL);

		}
	}
	function edit_customer()
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
				redirect('about');
		}else{
			$a=	$this->input->post('description');
 
			$sContent = strip_tags(stripslashes($a),"");
			$form_data = array(
						    'name' => $this->input->post('name'),
							'image' => $this->input->post('image'),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->where('id',$id)->update('customer', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message','اطلاعات مشتری ویرایش گردید');
			redirect('about');
		}
	}else{
			$this->load->module('layouts');
	$this->load->library('template');
	$this->load->library('jdf');
	$data['time'] = $this->jdf->jdate('H:i:s',time);
	$data['datepicker'] = TRUE;
	$data['datatables'] = TRUE;
		$data['page'] = lang('about');
		$data['img'] = TRUE;

		$data['form'] = TRUE;
		$data['task_customer'] = $this->item_model->customer_details($this->uri->segment(3));
		$this->template
		->set_layout('users')
		->build('edit_customer',isset($data) ? $data : NULL);
	}
	}
	
		function delete_customer(){
		if ($this->input->post() ){
					$id = $this->input->post('id', TRUE);
					$this->db->where('id',$id)->delete('customer');

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message', 'مشتری مورد نظر با موفقیت حذف گردید');
					redirect($this->input->post('r_url'));
		}else{
			$data['id'] = $this->uri->segment(3);
			$this->load->view('modal/delete_customer',$data);
		}
		
	}
}

/* End of file items.php */