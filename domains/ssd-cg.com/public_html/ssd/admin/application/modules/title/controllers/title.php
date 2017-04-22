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


class Title extends MX_Controller {

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

	$this->template->title(lang('title').' - '.$this->config->item('company_name'). ' '. $this->config->item('version'));
	$data['page'] = lang('title');

	$data['title'] = $this->item_model->list_title();
	$data['descr'] = $this->item_model->descr_title();
	$data['title2'] = $this->item_model->list_title2();

	$this->template
	->set_layout('users')
	->build('title',isset($data) ? $data : NULL);
	}
	function add_title()
	{
		
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('title', 'Title', 'required');

		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('error_editor'));
				redirect('title');
		}else{
			$form_data = array(
							'title' => $this->input->post('title'),
							'title_sub' => $this->input->post('title_sub'),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->insert('title', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			
			
			$this->session->set_flashdata('message', '&#1575;&#1591;&#1604;&#1575;&#1593;&#1575;&#1578; &#1605;&#1608;&#1590;&#1608;&#1593; &#1576;&#1575; &#1605;&#1608;&#1601;&#1602;&#1740;&#1578; &#1579;&#1576;&#1578; &#1711;&#1585;&#1583;&#1740;&#1583;');


			redirect('title');

		}
		}else{
	$this->load->module('layouts');
	$this->load->library('template');
	$this->load->library('jdf');
	$data['time'] = $this->jdf->jdate('H:i:s',time);
	$data['datepicker'] = TRUE;
	$data['datatables'] = TRUE;
	$data['form'] = TRUE;
	$data['page'] = lang('title');

		$this->template
		->set_layout('users')
		->build('add_title',isset($data) ? $data : NULL);

		}
	}
	
	function edit_title()
	{		

		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('title', 'Title', 'required');

		$id = $this->input->post('id', TRUE);
		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('task_update_failed'));
				redirect('title');
		}else{
 
			$sContent = strip_tags(stripslashes($a),"");
			$form_data = array(
							'title' => $this->input->post('title'),
							'title_sub' => $this->input->post('title_sub'),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->where('id',$id)->update('title', $form_data); 
			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message','&#1575;&#1591;&#1604;&#1575;&#1593;&#1575;&#1578; &#1605;&#1608;&#1590;&#1608;&#1593; &#1576;&#1575; &#1605;&#1608;&#1601;&#1602;&#1740;&#1578; &#1608;&#1740;&#1585;&#1575;&#1740;&#1588; &#1711;&#1585;&#1583;&#1740;&#1583;');
			redirect('title');
		}
	}else{
			$this->load->module('layouts');
	$this->load->library('template');
	$this->load->library('jdf');
	$data['time'] = $this->jdf->jdate('H:i:s',time);
	$data['datepicker'] = TRUE;
	$data['datatables'] = TRUE;
		$data['page'] = lang('title');

		$data['form'] = TRUE;
		$data['title_details'] = $this->item_model->title_details($this->uri->segment(3));
		$this->template
		->set_layout('users')
		->build('edit_title',isset($data) ? $data : NULL);
	}
	}
	function delete_title(){
		if ($this->input->post() ){
					$id = $this->input->post('id', TRUE);
					$this->db->where('id',$id)->delete('title');

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message', lang('events_deleted_successfully'));
					redirect($this->input->post('r_url'));
		}else{
			$data['id'] = $this->uri->segment(3);
			$this->load->view('modal/delete_title',$data);
		}
		
	}

	
	
	
	
	
	
	
	
	
	
	
	function add_title2()
	{
		
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('name', 'Name', 'required');

		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('error_editor'));
				redirect('title2');
		}else{
			$form_data = array(
							'name' => $this->input->post('name'),
							'sub_title' => $this->input->post('title_sub'),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->insert('title2', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			
			
			$this->session->set_flashdata('message', '&#1575;&#1591;&#1604;&#1575;&#1593;&#1575;&#1578; &#1605;&#1608;&#1590;&#1608;&#1593; &#1576;&#1575; &#1605;&#1608;&#1601;&#1602;&#1740;&#1578; &#1579;&#1576;&#1578; &#1711;&#1585;&#1583;&#1740;&#1583;');


			redirect('title');

		}
		}else{
	$this->load->module('layouts');
	$this->load->library('template');
	$this->load->library('jdf');
	$data['time'] = $this->jdf->jdate('H:i:s',time);
	$data['datepicker'] = TRUE;
	$data['datatables'] = TRUE;
	$data['form'] = TRUE;
	$data['page'] = lang('title2');
	$data['title'] = $this->item_model->list_title();

		$this->template
		->set_layout('users')
		->build('add_title2',isset($data) ? $data : NULL);

		}
	}
	
	function edit_title2()
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
				redirect('title');
		}else{
 
			$sContent = strip_tags(stripslashes($a),"");
			$form_data = array(
							'name' => $this->input->post('name'),
							'sub_title' => $this->input->post('title_sub'),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->where('id',$id)->update('title2', $form_data); 
			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message','&#1575;&#1591;&#1604;&#1575;&#1593;&#1575;&#1578; &#1605;&#1608;&#1590;&#1608;&#1593; &#1576;&#1575; &#1605;&#1608;&#1601;&#1602;&#1740;&#1578; &#1608;&#1740;&#1585;&#1575;&#1740;&#1588; &#1711;&#1585;&#1583;&#1740;&#1583;');
			redirect('title');
		}
	}else{
			$this->load->module('layouts');
	$this->load->library('template');
	$this->load->library('jdf');
	$data['time'] = $this->jdf->jdate('H:i:s',time);
	$data['datepicker'] = TRUE;
	$data['datatables'] = TRUE;
		$data['page'] = lang('title2');
		$data['form'] = TRUE;
		$data['title'] = $this->item_model->list_title();

		
		$data['title_detailsa'] = $this->item_model->title_detailsa($this->uri->segment(3));
		$this->template
		->set_layout('users')
		->build('edit_title2',isset($data) ? $data : NULL);
	}
	}
	function delete_title2(){
		if ($this->input->post() ){
					$id = $this->input->post('id', TRUE);
					$this->db->where('id',$id)->delete('title2');

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message', lang('events_deleted_successfully'));
					redirect($this->input->post('r_url'));
		}else{
			$data['id'] = $this->uri->segment(3);
			$this->load->view('modal/delete_title2',$data);
		}
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	function add_descr()
	{
		
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('title', 'Title', 'required');

		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('error_editor'));
				redirect('title');
		}else{
			$form_data = array(
							'title' => $this->input->post('title'),
							'title_sub' => $this->input->post('title_sub'),
							'title_sub2' => $this->input->post('title_sub2'),

			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->insert('descr', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			
			
			$this->session->set_flashdata('message', '&#1575;&#1591;&#1604;&#1575;&#1593;&#1575;&#1578; &#1605;&#1608;&#1590;&#1608;&#1593; &#1570;&#1740;&#1705;&#1608;&#1606;&#1607;&#1575; &#1576;&#1575; &#1605;&#1608;&#1601;&#1602;&#1740;&#1578; &#1579;&#1576;&#1578; &#1711;&#1585;&#1583;&#1740;&#1583;');


			redirect('title');
		}
		}else{
	$this->load->module('layouts');
	$this->load->library('template');
	$this->load->library('jdf');
	$data['time'] = $this->jdf->jdate('H:i:s',time);
	$data['datepicker'] = TRUE;
	$data['datatables'] = TRUE;
		$data['form'] = TRUE;
			$data['page'] = lang('title');
		$data['img'] = TRUE;

		$this->template
		->set_layout('users')
		->build('add_descr',isset($data) ? $data : NULL);

		}
	}
	
		function edit_descr()
	{		

		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('title', 'Title', 'required');

		$id = $this->input->post('id', TRUE);
		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('task_update_failed'));
				redirect('title');
		}else{
 
			$sContent = strip_tags(stripslashes($a),"");
			$form_data = array(
							'title' => $this->input->post('title'),
							'title_sub' => $this->input->post('title_sub'),
														'title_sub2' => $this->input->post('title_sub2'),

			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->where('id',$id)->update('descr', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message','&#1575;&#1591;&#1604;&#1575;&#1593;&#1575;&#1578; &#1605;&#1608;&#1590;&#1608;&#1593; &#1570;&#1740;&#1705;&#1608;&#1606;&#1607;&#1575; &#1576;&#1575; &#1605;&#1608;&#1601;&#1602;&#1740;&#1578; &#1608;&#1740;&#1585;&#1575;&#1740;&#1588; &#1711;&#1585;&#1583;&#1740;&#1583;');
			redirect('title');
		}
	}else{
			$this->load->module('layouts');
	$this->load->library('template');
	$this->load->library('jdf');
	$data['time'] = $this->jdf->jdate('H:i:s',time);
	$data['datepicker'] = TRUE;
	$data['datatables'] = TRUE;
		$data['page'] = lang('title');
		$data['img'] = TRUE;

		$data['form'] = TRUE;
		$data['task_descr'] = $this->item_model->descr_details($this->uri->segment(3));
		$this->template
		->set_layout('users')
		->build('edit_descr',isset($data) ? $data : NULL);
	}
	}
	function delete_descr(){
		if ($this->input->post() ){
					$id = $this->input->post('id', TRUE);
					$this->db->where('id',$id)->delete('descr');

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message', '&#1575;&#1591;&#1604;&#1575;&#1593;&#1575;&#1578; &#1576;&#1575; &#1605;&#1608;&#1601;&#1602;&#1740;&#1578; &#1581;&#1584;&#1601; &#1711;&#1585;&#1583;&#1740;&#1583;');
					redirect($this->input->post('r_url'));
		}else{
			$data['id'] = $this->uri->segment(3);
			$this->load->view('modal/delete_descr',$data);
		}
		
	}
	
}

/* End of file items.php */