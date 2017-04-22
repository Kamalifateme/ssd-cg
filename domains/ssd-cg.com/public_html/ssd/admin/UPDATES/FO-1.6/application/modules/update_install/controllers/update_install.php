<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Update_install extends MX_Controller {
 
    function __construct()
    {
        parent::__construct();
        $this->load->library('tank_auth');
        if ($this->tank_auth->user_role($this->tank_auth->get_role_id()) != 'admin') {
            $this->session->set_flashdata('response_status', 'error');
            $this->session->set_flashdata('message', lang('access_denied'));
            redirect('');
        }

    }
    function index(){ 
        $this->load->module('layouts');
        $this->load->library('template');
        $data['form'] = TRUE;
        $this->template->title(lang('updates').' - '.$this->config->item('company_name'). ' '. $this->config->item('version'));
        $data['page'] = lang('home');
        $this->template
            ->set_layout('users')
            ->build('updater',isset($data) ? $data : NULL);
        }
}

/* End of file updater.php */