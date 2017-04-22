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


class Welcome extends MX_Controller {

	function __construct()
	{
		parent::__construct();

		if (!$this->tank_auth->is_logged_in()) {
			$this->session->set_flashdata('message',lang('login_required'));
			redirect('auth/login');
		}
		if ($this->tank_auth->user_role($this->tank_auth->get_role_id()) == 'collaborator') {
			redirect('collaborator');
		}
		if ($this->tank_auth->user_role($this->tank_auth->get_role_id()) == 'client') {
			redirect('clients');
		}

	}

	function index()
	{
	$this->load->model('home_model');
	$this->load->module('layouts');
	$this->load->library('template');
	$this->template->title('Welcome - '.$this->config->item('company_name'));
	$data['page'] = lang('home');
	$data['projects'] = $this->home_model->recent_projects($limit = 5);
	$data['activities'] = $this->home_model->recent_activities($limit = 6);
	$data['cal'] = TRUE;

	$this->template
	->set_layout('users')
	->build('user_home',isset($data) ? $data : NULL);
	}
	function _monthly_data($month)
	{
		$query = $this->db->select_sum('amount')->where(array('month_paid'=>$month,'year_paid'=>date('Y')))->get('payments');
		foreach ($query->result() as $row)
			{
				$amount = $row->amount ? $row->amount : 0;
   				return round($amount);
			}
	}
}

/* End of file welcome.php */