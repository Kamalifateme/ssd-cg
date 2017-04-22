<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Slide extends MX_Controller {

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
	$this->template->title(lang('slider').' - '.$this->config->item('company_name'). ' '. $this->config->item('version'));
	$data['page'] = lang('slider');

	$data['slide'] = $this->item_model->list_slide();

	$this->template
	->set_layout('users')
	->build('slide',isset($data) ? $data : NULL);
	}
	
	function add_slide()
	{
		
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('slider', 'Slider', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('error_editor'));
				redirect('slide');
		}else{
			$form_data = array(
							'slider' => $this->input->post('slider'),
							'title' => $this->input->post('title'),
							'link' => $this->input->post('link'),

			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->insert('slider', $form_data); 
			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', 'اسلایدر مورد نظر با موفقیت ثبت شد');
			redirect('slide');
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

	$data['page'] = lang('slider');
		$this->template
		->set_layout('users')
		->build('modal/add_slide',isset($data) ? $data : NULL);

		}
	}
	function edit_slide()
	{		

		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('slider', 'Slider', 'required');

		$id = $this->input->post('id', TRUE);
		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('task_update_failed'));
				redirect('slide');
		}else{
			$form_data = array(
							'slider' => $this->input->post('slider'),
							'title' => $this->input->post('title'),
			                'saved_by' => $this->tank_auth->get_user_id(),
							'link' => $this->input->post('link'),

			            );
			$this->db->where('id',$id)->update('slider', $form_data); 
			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message',lang('slider_update_success'));
			redirect('slide');
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

				$data['page'] = lang('slider');

		$data['slide'] = $this->item_model->slide_details($this->uri->segment(3));

		$this->template
		->set_layout('users')
		->build('modal/edit_slider',isset($data) ? $data : NULL);
	}
	}
	
	
	
	function delete_slide(){
		if ($this->input->post() ){
					$id = $this->input->post('id', TRUE);
					$this->db->where('id',$id)->delete('slider');

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message', lang('slider_deleted_successfully'));
					redirect($this->input->post('r_url'));
		}else{
			$data['id'] = $this->uri->segment(3);
			$this->load->view('modal/delete_slider',$data);
		}
		
	}

}

/* End of file items.php */