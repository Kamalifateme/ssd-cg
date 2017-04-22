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


class Calenders extends MX_Controller {

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
	$this->template->title(lang('calenders').' - '.$this->config->item('company_name'). ' '. $this->config->item('version'));
	$data['page'] = lang('calenders');
	$data['events'] = $this->item_model->list_events();
	$this->template
	->set_layout('users')
	->build('calenders',isset($data) ? $data : NULL);
	}
	function clientinvoices()
	{		
		$data['user_invoices'] = $this->user->user_invoices($this->uri->segment(4));
		$this->load->view('client_invoices',isset($data) ? $data : NULL);
	}
	function save_event()
	{
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('event_title', 'Event Title', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');

		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('task_add_failed'));
				redirect('calenders');
		}else{
					$a=$this->input->post('date_start');
					$datestart = explode("-", $a);
					$yearss=$datestart[0];
					$monthss=$datestart[1];
					$dayss=$datestart[2];
					$this->load->library('jdf');
					$jalali = $this->jdf->jalali_to_gregorian($yearss,$monthss,$dayss,'-');
					
					$ed = explode("-", $jalali);
					$years=$ed[0];
					$months=$ed[1];
					$days=$ed[2];
					if($months>=10)
					{
					}
					else
					{
					$months="0".$months;
					}
					if($days>=10)
					{
					}
					else
					{
					$days="0".$days;
					}
					$start=$years."-".$months."-".$days;
					

					
					
					$b=$this->input->post('date_end');
					$dateend = explode("-", $b);
					$yeare=$dateend[0];
					$monthe=$dateend[1];
					$daye=$dateend[2];
					$jalali2 = $this->jdf->jalali_to_gregorian($yeare,$monthe,$daye,'-');
					
										
					$ee = explode("-", $jalali2);
					$yeare=$ee[0];
					$monthe=$ee[1];
					$daye=$ee[2];
					if($monthe>=10)
					{
					}
					else
					{
					$monthe="0".$monthe;
					}
					if($daye>=10)
					{
					}
					else
					{
					$daye="0".$daye;
					}
					$end=$yeare."-".$monthe."-".$daye;
					
					
					
					
					
					
			$form_data = array(
			                'title' => $this->input->post('event_title'),
			                'start_date' => $start,			               
			                'end_date' => $end,			                
			                'time_start' => $this->input->post('event_time_start'),
			                'time_end' => $this->input->post('event_time_end'),
							'description' => $this->input->post('description'),
							'color' => $this->input->post('color'),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->insert('events', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', lang('events_add_success'));
			redirect('calenders');
		}
		}else{
		$this->load->view('modal/save_event');
		}
	}
	
	function edit_event()
	{		
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('event_title', 'Event Title', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');

		$id = $this->input->post('id', TRUE);
		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('task_update_failed'));
				redirect('calenders');
		}else{
					$a=$this->input->post('date_start');
					$datestart = explode("-", $a);
					$yearss=$datestart[0];
					$monthss=$datestart[1];
					$dayss=$datestart[2];
					$this->load->library('jdf');
					$jalali = $this->jdf->jalali_to_gregorian($yearss,$monthss,$dayss,'-');
					
					$ed = explode("-", $jalali);
					$years=$ed[0];
					$months=$ed[1];
					$days=$ed[2];
					if($months>=10)
					{
					}
					else
					{
					$months="0".$months;
					}
					if($days>=10)
					{
					}
					else
					{
					$days="0".$days;
					}
					$start=$years."-".$months."-".$days;

					$b=$this->input->post('date_end');
					$dateend = explode("-", $b);
					$yeare=$dateend[0];
					$monthe=$dateend[1];
					$daye=$dateend[2];
					$jalali2 = $this->jdf->jalali_to_gregorian($yeare,$monthe,$daye,'-');
					
										
					$ee = explode("-", $jalali2);
					$yeare=$ee[0];
					$monthe=$ee[1];
					$daye=$ee[2];
					if($monthe>=10)
					{
					}
					else
					{
					$monthe="0".$monthe;
					}
					if($daye>=10)
					{
					}
					else
					{
					$daye="0".$daye;
					}
					$end=$yeare."-".$monthe."-".$daye;

			$form_data = array(
			                'title' => $this->input->post('event_title'),
			                'start_date' => $start,			               
			                'end_date' => $end,			                
			                'time_start' => $this->input->post('event_time_start'),
			                'time_end' => $this->input->post('event_time_end'),
							'description' => $this->input->post('description'),
							'color' => $this->input->post('color'),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->where('id',$id)->update('events', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', lang('events_update_successfully'));
			redirect('calenders');
		}
	}else{
		$data['task_events'] = $this->item_model->event_details($this->uri->segment(3));
		$this->load->view('modal/edit_event',isset($data) ? $data : NULL);
	}
	}
	function delete_event(){
		if ($this->input->post() ){
					$id = $this->input->post('id', TRUE);
					$this->db->where('id',$id)->delete('events');

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message', lang('events_deleted_successfully'));
					redirect($this->input->post('r_url'));
		}else{
			$data['id'] = $this->uri->segment(3);
			$this->load->view('modal/delete_event',$data);
		}
		
	}

}

/* End of file items.php */