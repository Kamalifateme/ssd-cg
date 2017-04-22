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


class Companies extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('tank_auth');
		if ($this->tank_auth->user_role($this->tank_auth->get_role_id()) != 'admin') {
			$this->session->set_flashdata('message', lang('access_denied'));
			redirect('');
		}
		$this->load->model('client_model');
	}

	function index()
	{
	$this->load->module('layouts');
	$this->load->library('template');
	$this->template->title(lang('clients').' - '.$this->config->item('company_name'). ' '. $this->config->item('version'));
	$data['page'] = lang('clients');
	$data['datatables'] = TRUE;
	$data['form'] = TRUE;
	$data['companies'] = $this->AppModel->get_all_records($table = 'companies',
		$array = array(
			'co_id >' => '0'),$join_table = '',$join_criteria = '','date_added');
	$data['countries'] = $this->AppModel->get_all_records($table = 'countries',
		$array = array(
			'id >' => '0'),$join_table = '',$join_criteria = '','id');
	$this->template
	->set_layout('users')
	->build('companies',isset($data) ? $data : NULL);
	}
	function create()
	{
		if ($this->input->post()) {
				$this->load->library('form_validation');
				$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
				$this->form_validation->set_rules('company_ref', 'Company ID', 'required|is_unique[companies.company_ref]');
				$this->form_validation->set_rules('company_name', 'Company Name', 'required');
				$this->form_validation->set_rules('company_email', 'Company Email', 'required');
				$this->form_validation->set_rules('company_address', 'Company Address', 'required');
				if ($this->form_validation->run() == FALSE)
				{
						$this->session->set_flashdata('response_status', 'error');
						$this->session->set_flashdata('message', lang('error_in_form'));
						$_POST = '';
						$this->index();
						//redirect('invoices/manage/add');
				}else{		
					$form_data = $_POST;
					$this->db->insert('companies', $form_data); 
					$company_id = $this->db->insert_id();

					$params['user'] = $this->tank_auth->get_user_id();
					$params['module'] = 'Clients';
					$params['module_field_id'] = $company_id;
					$params['activity'] = ucfirst(lang('activity_added_new_company').' '.$this->input->post('company_name'));
					$params['icon'] = 'fa-user';
					modules::run('activity/log',$params); //log activity

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message', lang('client_registered_successfully'));
					redirect('companies');
				}
		}else{
			$this->session->set_flashdata('response_status', 'error');
			$this->session->set_flashdata('message', lang('error_in_form'));
			redirect('companies');
		}
	}
	function update()
	{
		if ($this->input->post()) {
				$this->load->library('form_validation');
				$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
				$this->form_validation->set_rules('company_ref', 'Company ID', 'required');
				$this->form_validation->set_rules('company_name', 'Company Name', 'required');
				$this->form_validation->set_rules('company_email', 'Company Email', 'required');
				$this->form_validation->set_rules('company_address', 'Company Address', 'required');
				if ($this->form_validation->run() == FALSE)
				{
						$this->session->set_flashdata('response_status', 'error');
						$this->session->set_flashdata('message', lang('error_in_form'));
						$_POST = '';
						$this->index();
						//redirect('invoices/manage/add');
				}else{	
					$company_id = $_POST['co_id'];
					$form_data = $_POST;
					$this->db->where('co_id',$company_id)->update('companies', $form_data); 				
					

					$params['user'] = $this->tank_auth->get_user_id();
					$params['module'] = 'Clients';
					$params['module_field_id'] = $company_id;
					$params['activity'] = ucfirst(lang('activity_updated_company').$this->input->post('company_name'));
					$params['icon'] = 'fa-edit';
					modules::run('activity/log',$params); //log activity

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message', lang('client_updated'));
					redirect('companies/view/details/'.$company_id);
				}
		}else{
			$this->session->set_flashdata('response_status', 'error');
			$this->session->set_flashdata('message', lang('error_in_form'));
			redirect('companies');
		}
	}
	function make_primary(){
		$contact = $this->uri->segment(3);
		$company = $this->uri->segment(4);
		$this->db->set('primary_contact', $contact);
		$this->db->where('co_id',$company)->update('companies'); 
		$this->session->set_flashdata('response_status', 'success');
		$this->session->set_flashdata('message', lang('primary_contact_set'));
		redirect('companies/view/details/'.$company);
	}
}

/* End of file contacts.php */