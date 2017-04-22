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


class contacts extends MX_Controller {

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

	$this->template->title(lang('contacts').' - '.$this->config->item('company_name'). ' '. $this->config->item('version'));
	$data['page'] = lang('contacts');

	$data['contact'] = $this->item_model->list_contact();
	$data['con'] = $this->item_model->list_contacts();

	$this->template->title(lang('catalog').' - '.$this->config->item('company_name'). ' '. $this->config->item('version'));


	
	$this->template
	->set_layout('users')
	->build('contacts',isset($data) ? $data : NULL);
	}
	
	
	function add_contacts()
	{
		
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('phone', 'Phone', 'required');

		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('error_editor'));
				redirect('contacts');
		}else{
			$form_data = array(
							'phone' => $this->input->post('phone'),
							'phone2' => $this->input->post('phone2'),
							'phone3' => $this->input->post('phone3'),
							'phone4' => $this->input->post('phone4'),
							'phone5' => $this->input->post('phone5'),
							'phone6' => $this->input->post('phone6'),
							'email' => $this->input->post('email'),
							'address' => $this->input->post('address'),
							'ins' => $this->input->post('ins'),

			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->insert('contact', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			
			
			$this->session->set_flashdata('message','&#1575;&#1591;&#1604;&#1575;&#1593;&#1575;&#1578; &#1575;&#1585;&#1578;&#1576;&#1575;&#1591; &#1576;&#1575; &#1605;&#1575; &#1575;&#1590;&#1575;&#1601;&#1607; &#1711;&#1585;&#1583;&#1740;&#1583;');

			redirect('contacts');

		}
		}else{
	$this->load->module('layouts');
	$this->load->library('template');
	$this->load->library('jdf');
	$data['time'] = $this->jdf->jdate('H:i:s',time);
	$data['datepicker'] = TRUE;
	$data['datatables'] = TRUE;
		$data['form'] = TRUE;
			$data['page'] = lang('contacts');

		$this->template
		->set_layout('users')
		->build('add_contacts',isset($data) ? $data : NULL);

		}
	}
	
	function edit_contacts()
	{		

		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('phone', 'Phone', 'required');

		$id = $this->input->post('id', TRUE);
		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('task_update_failed'));
				redirect('contacts');
		}else{
			$a=	$this->input->post('description');
 
			$sContent = strip_tags(stripslashes($a),"");
			$form_data = array(
							'phone' => $this->input->post('phone'),
							'phone2' => $this->input->post('phone2'),
							'phone3' => $this->input->post('phone3'),
							'phone4' => $this->input->post('phone4'),
							'phone5' => $this->input->post('phone5'),
							'phone6' => $this->input->post('phone6'),
							'email' => $this->input->post('email'),
							'address' => $this->input->post('address'),
							'email' => $this->input->post('email'),
							'address' => $this->input->post('address'),
							'ins' => $this->input->post('ins'),

			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->where('id',$id)->update('contact', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message','&#1575;&#1591;&#1604;&#1575;&#1593;&#1575;&#1578; &#1575;&#1585;&#1578;&#1576;&#1575;&#1591; &#1576;&#1575; &#1605;&#1575; &#1608;&#1740;&#1585;&#1575;&#1740;&#1588; &#1711;&#1585;&#1583;&#1740;&#1583;');
			redirect('contacts');
		}
	}else{
			$this->load->module('layouts');
	$this->load->library('template');
	$this->load->library('jdf');
	$data['time'] = $this->jdf->jdate('H:i:s',time);
	$data['datepicker'] = TRUE;
	$data['datatables'] = TRUE;
		$data['page'] = lang('contacts');

		$data['form'] = TRUE;
		$data['task_contacts'] = $this->item_model->contact_details($this->uri->segment(3));
		$this->template
		->set_layout('users')
		->build('edit_contacts',isset($data) ? $data : NULL);
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

		function delete_contacts(){
		if ($this->input->post() ){
					$id = $this->input->post('id', TRUE);
					$this->db->where('id',$id)->delete('contact');

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message', '&#1575;&#1591;&#1604;&#1575;&#1593;&#1575;&#1578; &#1575;&#1585;&#1578;&#1576;&#1575;&#1591; &#1576;&#1575; &#1605;&#1575; &#1581;&#1584;&#1601; &#1711;&#1585;&#1583;&#1740;&#1583;');
					redirect($this->input->post('r_url'));
		}else{
			$data['id'] = $this->uri->segment(3);
			$this->load->view('modal/delete_contact',$data);
		}
		
	}
			function delete_con(){
		if ($this->input->post() ){
					$id = $this->input->post('id', TRUE);
					$this->db->where('id',$id)->delete('contacts');

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message', '&#1575;&#1591;&#1604;&#1575;&#1593;&#1575;&#1578; &#1575;&#1585;&#1578;&#1576;&#1575;&#1591; &#1576;&#1575; &#1605;&#1575; &#1581;&#1584;&#1601; &#1711;&#1585;&#1583;&#1740;&#1583;');
					redirect($this->input->post('r_url'));
		}else{
			$data['id'] = $this->uri->segment(3);
			$this->load->view('modal/delete_contacts',$data);
		}
		
	}
	
	
}

/* End of file items.php */