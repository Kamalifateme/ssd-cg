<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * Freelancer Office
 * 
 * Web based project and invoicing management system available on codecanyon
 *
 * @package		Freelancer Office
 * @author		William M
 * @copyright	Copyright (c) 2014 - 2015 Gitbench, LLC
 * @license		http://codecanyon.net/wiki/support/legal-terms/licensing-terms/ 
 * @link		http://codecanyon.net/item/freelancer-office/8870728
 * 
 */


class Milestones extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this -> load -> module('layouts');	
		$this->load->library(array('tank_auth','template','form_validation'));
		$this -> form_validation -> set_error_delimiters('<span style="color:red">', '</span><br>');

		$this -> user = $this->tank_auth->get_user_id();
		$this -> username = $this -> tank_auth -> get_username(); // Set username
		if (!$this -> user) {
			$this -> applib -> redirect_to('auth/login','error',lang('access_denied'));			
		}
		$this -> user_role = $this -> applib->get_any_field('users',array('id'=>$this->user),'role_id');

		$this -> template -> title(lang('projects').' - '.config_item('company_name'). ' '.config_item('version'));
		$this -> page = lang('projects');

        $this->load->model('project_model', 'project');

        $this->milestones_table = 'milestones';
		
	}

	function add()
	{
		if ($this->input->post()) {
		if ($this->form_validation->run('projects','add_milestone') == FALSE)
		{
			$_POST = '';
			$this->session->set_flashdata('response_status', 'error');
			$this->session->set_flashdata('message', lang('operation_failed'));
			$this->add();
		}else{
			if ($this -> user_role == '1') {
			$project = $_POST['project'];

			$this -> db -> insert($this->milestones_table,$_POST);

			$activity = ucfirst($this->username).' '.lang('activity_added_new_milestone').': '.$_POST['milestone_name'];
			$this->_log_activity($activity,$this->user,'projects',$project,$icon = 'fa-laptop'); //log activity

			$this -> applib -> redirect_to('projects/view/'.$project.'?group=milestones','success',lang('milestone_added_successfully'));
			}
		}
		}else{
		$data['project'] = $this->uri->segment(4);
		$this->load->view('modal/add_milestone',isset($data) ? $data : NULL);
		}
	}

	function edit()
	{
		if ($this->input->post()) {
		if ($this->form_validation->run('projects','add_milestone') == FALSE)
		{
			$_POST = '';
			$this->session->set_flashdata('response_status', 'error');
			$this->session->set_flashdata('message', lang('operation_failed'));
			$this->edit();
		}else{
			if ($this -> user_role == '1') {
			$project = $_POST['project'];
			$milestone = $_POST['id'];

			$this -> db -> where('id',$milestone) -> update($this->milestones_table,$_POST);

			$this -> applib -> redirect_to('projects/view/'.$project.'/?group=milestones&view=milestone&id='.$milestone,'success',lang('milestone_edited_successfully'));
			}
		}
		}else{
		$milestone = $this->uri->segment(4);
		$data['details'] = $this -> db -> where('id',$milestone) -> get($this->milestones_table) -> result();
		$this->load->view('modal/edit_milestone',isset($data) ? $data : NULL);
		}
	}

	function delete()
	{
		if ($this->input->post()) {
		$this->form_validation->set_rules('project', 'Project ID', 'required');
		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('delete_failed'));
				redirect('projects');
		}else{	
			$project = $this->input->post('project');
			$milestone = $this->input->post('id');

			$this->db->delete($this->milestones_table, array('id' => $milestone)); 

			$activity = ucfirst($this->username).' '.lang('activity_deleted_milestone');
			$this->_log_activity($activity,$this->user,'projects',$project,$icon = 'fa-trash-o'); //log activity

			$this -> applib -> redirect_to('projects/view/'.$project.'?group=milestones','success',lang('milestone_deleted_successfully'));
		}
		}else{
			$data['project'] = $this->uri->segment(4);
			$data['milestone'] = $this->uri->segment(5);
			$this->load->view('modal/delete_milestone',$data);
		}
	}

	function _log_activity($activity,$user,$module,$module_field_id,$icon){
		
					$params = array(
					                'user'				=> $user,
					                'module' 			=> $module,
					                'module_field_id'	=> $module_field_id,
					                'activity'			=> $activity,
					                'icon'				=> $icon
					                );
					modules::run('activity/log',$params); //pass to activitylog module
	}
}

/* End of file milestones.php */