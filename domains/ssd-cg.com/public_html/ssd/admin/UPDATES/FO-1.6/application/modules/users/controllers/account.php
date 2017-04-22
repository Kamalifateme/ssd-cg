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


class Account extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('tank_auth');
		if ($this->tank_auth->user_role($this->tank_auth->get_role_id()) != 'admin') {
			$this->session->set_flashdata('response_status', 'error');
			$this->session->set_flashdata('message', lang('access_denied'));
			redirect('');
		}
		$this->load->model('user_model');
	}
	function index(){
		$this->active();
	}

	function active()
	{
	$this->load->module('layouts');
	$this->load->library('template');
	$this->template->title(lang('users').' - '.$this->config->item('company_name'). ' '. $this->config->item('version'));
	$data['page'] = lang('users');
	$data['datatables'] = TRUE;
	$data['form'] = TRUE;
	$data['users'] = $this->user_model->users();
	$data['roles'] = $this->user_model->roles();
	$data['companies'] = $this->AppModel->get_all_records($table = 'companies',
		$array = array(
			'co_id >' => '0'),$join_table = '',$join_criteria = '','date_added');
	$this->template
	->set_layout('users')
	->build('users',isset($data) ? $data : NULL);
	}

	function auth()
	{
		if ($this->input->post()) {
			if ($this->config->item('demo_mode') == 'TRUE') {
			$this->session->set_flashdata('response_status', 'error');
			$this->session->set_flashdata('message', lang('demo_warning'));
			redirect('users/account');
		}
		$user_password = $this->input->post('password');

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('email', 'Email', 'required');

		if(!empty($user_password)) {
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length['.$this->config->item('password_min_length', 'tank_auth').']|max_length['.$this->config->item('password_max_length', 'tank_auth').']');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean|matches[password]');
        }
		
		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('operation_failed'));
				redirect('users/account');
		}else{	
		$user_id =  $this->input->post('user_id');
			$profile_data = array(
			                'username' => $this->input->post('username'),
			                'email' => $this->input->post('email'),
			                'role_id' => $this->input->post('role_id'),
			                'modified' => date("Y-m-d H:i:s")             
			            );

			$this->db->where('id',$user_id)->update('users', $profile_data); 

			if(!empty($user_password)) {
                $this->tank_auth->set_new_password($user_id,$user_password);
            }

					$params['user'] = $this->tank_auth->get_user_id();
					$params['module'] = 'Users';
					$params['module_field_id'] = $user_id;
					$params['activity'] = ucfirst(lang('activity_updated_system_user').$this->input->post('fullname'));
					$params['icon'] = 'fa-edit';
					modules::run('activity/log',$params); //log activity

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', lang('user_edited_successfully'));
			redirect('users/account');
		}
		}else{
		$data['user_details'] = $this-> user_model ->user_details($this->uri->segment(4));
		$data['roles'] = $this-> user_model ->roles();
		$data['companies'] = $this -> AppModel->get_all_records($table = 'companies',
		$array = array(
			'co_id >' => '0'),$join_table = '',$join_criteria = '','date_added');
		$this->load->view('modal/edit_login',$data);
		}
	}

	function delete()
	{
		if ($this->input->post()) {

			if ($this->config->item('demo_mode') == 'TRUE') {
			$this->session->set_flashdata('response_status', 'error');
			$this->session->set_flashdata('message', lang('demo_warning'));
			redirect($this->input->post('r_url'));
		}
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('user_id', 'User ID', 'required');
		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('delete_failed'));
				$this->input->post('r_url');
		}else{	
			$user = $this->input->post('user_id');
			$this->db->delete('comments', array('posted_by' => $user)); 
			$this->db->delete('activities', array('user' => $user));  
			$this->db->delete('bugs', array('reporter' => $user)); 
			// Delete bug files
			$bug_files = $this->user_model->user_bug_files($user);
			foreach ($bug_files as $key => $f) {
				unlink('./resource/bug-files/'.$f->file_name);
			}
			if ($this->user_profile->get_profile_details($user,'avatar') != 'default_avatar.jpg') {
				unlink('./resource/avatar/'.$this->user_profile->get_profile_details($user,'avatar'));
			}			

			$this->db->delete('files', array('uploaded_by' => $user)); 
			$this->db->delete('bug_files', array('uploaded_by' => $user)); 
			$this->db->delete('account_details', array('user_id' => $user)); 
			$this->db->delete('users', array('id' => $user)); 
			// Log Activity
					$params['user'] = $this->tank_auth->get_user_id();
					$params['module'] = 'Users';
					$params['module_field_id'] = $user;
					$params['activity'] = ucfirst(lang('activity_deleted_system_user'));
					$params['icon'] = 'fa-trash-o';
					modules::run('activity/log',$params); //log activity

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', lang('user_deleted_successfully'));
			redirect($this->input->post('r_url'));
		}
		}else{
			$data['user_id'] = $this->uri->segment(4);
			$this->load->view('modal/delete_user',$data);
		}
	}
}

/* End of file account.php */