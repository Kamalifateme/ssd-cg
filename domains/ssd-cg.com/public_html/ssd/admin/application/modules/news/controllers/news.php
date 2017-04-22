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


class News extends MX_Controller {

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
	$this->template->title(lang('news').' - '.$this->config->item('company_name'). ' '. $this->config->item('version'));
	$data['page'] = lang('news');

	$data['news'] = $this->item_model->list_news();
	$data['title'] = $this->item_model->list_title();

	$this->template
	->set_layout('users')
	->build('news',isset($data) ? $data : NULL);
	}
	
	
	function add_news()
	{
		
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('title', 'Title', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('error_editor'));
				redirect('news');
		}else{
					$timezone = 0;
					$now = date("Y-m-d", time()+$timezone);
					$time = date("H:i:s", time()+$timezone);
					list($year, $month, $day) = explode('-', $now);
					list($hour, $minute, $second) = explode(':', $time);
					$timestamp = mktime($hour, $minute, $second, $month, $day, $year);
					$this->load->library('jdf');
					$jalali = $this->jdf->jdate('l,j F Y');


					
			$form_data = array(
			
							'title' => $this->input->post('title'),
							'title_sub' => $this->input->post('s_title'),
							'nev' => $this->input->post('editor'),
							'url' => $this->input->post('url'),
							'title_sub' => $this->input->post('s_title'),
							'image' => $this->input->post('image'),
							'date_a' => $jalali,
							'des' => $this->input->post('description'),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->insert('blog', $form_data); 
			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', lang('news_add_success'));
			redirect('news');
		}
		}else{
	$this->load->module('layouts');
	$this->load->library('template');
	$this->load->library('jdf');
	$data['time'] = $this->jdf->jdate('H:i:s',time);
	$data['datepicker'] = TRUE;
	$data['datatables'] = TRUE;
	$data['img'] = TRUE;

	$data['form'] = TRUE;
		$data['page'] = lang('news');

	$data['title'] = $this->item_model->list_title();
		$this->template
		->set_layout('users')
		->build('add_news',isset($data) ? $data : NULL);

		}
	}
	
	function edit_news()
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
				redirect('news');
		}else{
					$timezone = 0;
					$now = date("Y-m-d", time()+$timezone);
					$time = date("H:i:s", time()+$timezone);
					list($year, $month, $day) = explode('-', $now);
					list($hour, $minute, $second) = explode(':', $time);
					$timestamp = mktime($hour, $minute, $second, $month, $day, $year);
					$this->load->library('jdf');
					$jalali = $this->jdf->jdate('l,j F Y');

			$form_data = array(
							'title' => $this->input->post('title'),
							'title_sub' => $this->input->post('s_title'),
							'nev' => $this->input->post('editor'),
							'url' => $this->input->post('url'),
							'image' => $this->input->post('image'),
							'date_a' => $jalali,
							'des' => $this->input->post('description'),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->where('id',$id)->update('blog', $form_data); 
			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message',lang('news_update_success'));
			redirect('news');
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
	$data['page'] = lang('news');
	$data['news'] = $this->item_model->news_details($this->uri->segment(3));
	$data['title'] = $this->item_model->list_title();
		$this->template
		->set_layout('users')
		->build('edit_news',isset($data) ? $data : NULL);
	}
	}
	function delete_news(){
		if ($this->input->post() ){
					$id = $this->input->post('id', TRUE);
					$this->db->where('id',$id)->delete('blog');

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message', lang('news_deleted_successfully'));
					redirect($this->input->post('r_url'));
		}else{
			$data['id'] = $this->uri->segment(3);
			$this->load->view('modal/delete_news',$data);
		}
		
	}

}

/* End of file items.php */