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


class Tutorial extends MX_Controller {

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
	$this->template->title(lang('tutorial').' - '.$this->config->item('company_name'). ' '. $this->config->item('version'));
	$data['page'] = lang('tutorial');
	
	$data['onvan'] = $this->item_model->list_archiveo();
	$data['archiveg'] = $this->item_model->list_archiveg();

	$data['simt'] = $this->item_model->list_simt();
	$data['learn'] = $this->item_model->list_learning();
	$data['sabt'] = $this->item_model->list_sabt();

	$this->template
	->set_layout('users')
	->build('tutorial',isset($data) ? $data : NULL);
	}
	function add_ssd()
	{
		
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('description', 'Description', 'required');

		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('error_editor'));
				redirect('tutorial');
		}else{
			$form_data = array(
							'ssd' => $this->input->post('description'),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->insert('simt', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			
			
			$this->session->set_flashdata('message', 'اطلاعات مربوطه با موفقیت ثبت گردید');


			redirect('tutorial');

		}
		}else{
	$this->load->module('layouts');
	$this->load->library('template');
	$this->load->library('jdf');
	$data['time'] = $this->jdf->jdate('H:i:s',time);
	$data['datepicker'] = TRUE;
	$data['datatables'] = TRUE;
		$data['form'] = TRUE;
			$data['page'] = lang('tutorial');

		$this->template
		->set_layout('users')
		->build('add_ssd',isset($data) ? $data : NULL);

		}
	}
	function edit_ssd()
	{		

		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('description', 'Description', 'required');

		$id = $this->input->post('id', TRUE);
		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('task_update_failed'));
				redirect('tutorial');
		}else{
			$a=	$this->input->post('description');
 
			$sContent = strip_tags(stripslashes($a),"");
			$form_data = array(
							"ssd"   =>  $this->input->post('description'),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->where('id',$id)->update('simt', $form_data); 
			$des=$this->input->post('description');

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message','اطلاعات با موفقیت ویرایش گردید');
			redirect('tutorial');
		}
	}else{
			$this->load->module('layouts');
	$this->load->library('template');
	$this->load->library('jdf');
	$data['time'] = $this->jdf->jdate('H:i:s',time);
	$data['datepicker'] = TRUE;
	$data['datatables'] = TRUE;
		$data['page'] = lang('tutorial');

		$data['form'] = TRUE;
		$data['task_simt'] = $this->item_model->simt_details($this->uri->segment(3));
		$this->template
		->set_layout('users')
		->build('edit_ssd',isset($data) ? $data : NULL);
	}
	}
	function delete_ssd(){
		if ($this->input->post() ){
					$id = $this->input->post('id', TRUE);
					$this->db->where('id',$id)->delete('simt');

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message','اطلاعات با موفقیت حذف گردید');
					redirect($this->input->post('r_url'));
		}else{
			$data['id'] = $this->uri->segment(3);
			$this->load->view('modal/delete_ssd',$data);
		}
		
	}
	
	/*learn*/
	function add_learn()
	{
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('description', 'Description', 'required');

		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('error_editor'));
				redirect('tutorial');
		}else{
			$form_data = array(
							'name' => $this->input->post('name'),
							'title_sub' => $this->input->post('s_title'),
							'description' => $this->input->post('description'),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->insert('learning ', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			
			
			$this->session->set_flashdata('message', 'اطلاعات مربوطه با موفقیت ثبت گردید');


			redirect('tutorial');

		}
		}else{
	$this->load->module('layouts');
	$this->load->library('template');
	$this->load->library('jdf');
	$data['time'] = $this->jdf->jdate('H:i:s',time);
	$data['datepicker'] = TRUE;
	$data['datatables'] = TRUE;
		$data['form'] = TRUE;
			$data['page'] = lang('tutorial');
	$data['titlesa'] = $this->item_model->list_title2();

		$this->template
		->set_layout('users')
		->build('add_learn',isset($data) ? $data : NULL);

		}
	}
	function edit_learn()
	{		

		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('description', 'Description', 'required');

		$id = $this->input->post('id', TRUE);
		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('task_update_failed'));
				redirect('tutorial');
		}else{
			$a=	$this->input->post('description');
 
			$sContent = strip_tags(stripslashes($a),"");
			$form_data = array(
							'name' => $this->input->post('name'),
							'title_sub' => $this->input->post('s_title'),
							'description' => $this->input->post('description'),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->where('id',$id)->update('learning', $form_data); 
			$des=$this->input->post('description');

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message','ویرایش با موفقیت انجام گردید');
			redirect('tutorial');
		}
	}else{
			$this->load->module('layouts');
	$this->load->library('template');
	$this->load->library('jdf');
	$data['time'] = $this->jdf->jdate('H:i:s',time);
	$data['datepicker'] = TRUE;
	$data['datatables'] = TRUE;
		$data['page'] = lang('tutorial');
	$data['titlesa'] = $this->item_model->list_title2();

		$data['form'] = TRUE;
		$data['task_learn'] = $this->item_model->learning_details($this->uri->segment(3));
		$this->template
		->set_layout('users')
		->build('edit_learn',isset($data) ? $data : NULL);
	}
	}
	function delete_learn(){
		if ($this->input->post() ){
					$id = $this->input->post('id', TRUE);
					$this->db->where('id',$id)->delete('learning');

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message','اطلاعات با موفقیت حذف گردید');
					redirect($this->input->post('r_url'));
		}else{
			$data['id'] = $this->uri->segment(3);
			$this->load->view('modal/delete_learn',$data);
		}
		
	}
	/*learn*/

	/*sabt*/	
		function add_sabt()
	{
		
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('description', 'Description', 'required');

		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('error_editor'));
				redirect('tutorial');
		}else{
			$form_data = array(
							'name' => $this->input->post('name'),
							'description' => $this->input->post('description'),
							'url' => $this->input->post('url'),
							'image' => $this->input->post('image'),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->insert('sabt ', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			
			
			$this->session->set_flashdata('message', 'اطلاعات با موفقیت ثبت شد');


			redirect('tutorial');

		}
		}else{
	$this->load->module('layouts');
	$this->load->library('template');
	$this->load->library('jdf');
	$data['time'] = $this->jdf->jdate('H:i:s',time);
	$data['datepicker'] = TRUE;
	$data['datatables'] = TRUE;
		$data['form'] = TRUE;$data['img'] = TRUE;
			$data['page'] = lang('tutorial');

		$this->template
		->set_layout('users')
		->build('add_sabt',isset($data) ? $data : NULL);

		}
	}
	function edit_sabt()
	{		

		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('description', 'Description', 'required');

		$id = $this->input->post('id', TRUE);
		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('task_update_failed'));
				redirect('tutorial');
		}else{
			$a=	$this->input->post('description');
 
			$sContent = strip_tags(stripslashes($a),"");
			$form_data = array(
							'name' => $this->input->post('name'),
							'description' => $this->input->post('description'),
							'url' => $this->input->post('url'),
							'image' => $this->input->post('image'),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->where('id',$id)->update('sabt', $form_data); 
			$des=$this->input->post('description');

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message','ویرایش با موفقیت انجام شد');
			redirect('tutorial');
		}
	}else{
			$this->load->module('layouts');
	$this->load->library('template');
	$this->load->library('jdf');
	$data['time'] = $this->jdf->jdate('H:i:s',time);
	$data['datepicker'] = TRUE;
	$data['datatables'] = TRUE;
		$data['page'] = lang('tutorial');
		$data['img'] = TRUE;

		$data['form'] = TRUE;
		$data['sabt_details'] = $this->item_model->sabt_details($this->uri->segment(3));
		$this->template
		->set_layout('users')
		->build('edit_sabt',isset($data) ? $data : NULL);
	}
	}
	function delete_sabt(){
		if ($this->input->post() ){
					$id = $this->input->post('id', TRUE);
					$this->db->where('id',$id)->delete('sabt');

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message','حذف با موفقیت انجام شد');
					redirect($this->input->post('r_url'));
		}else{
			$data['id'] = $this->uri->segment(3);
			$this->load->view('modal/delete_sabt',$data);
		}
		
	}
	/*sabt*/
	
	/*onvan*/
	function add_archiveo()
	{
		
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('description', 'Description', 'required');

		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('error_editor'));
				redirect('tutorial');
		}else{
			$form_data = array(
							'name' => $this->input->post('name'),
							'description' => $this->input->post('description'),
														'url' => $this->input->post(url),

			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->insert('archiveo ', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			
			
			$this->session->set_flashdata('message', 'اطلاعات مربوطه ثبت گردید');


			redirect('tutorial');

		}
		}else{
	$this->load->module('layouts');
	$this->load->library('template');
	$this->load->library('jdf');
	$data['time'] = $this->jdf->jdate('H:i:s',time);
	$data['datepicker'] = TRUE;
	$data['datatables'] = TRUE;
		$data['form'] = TRUE;
			$data['page'] = lang('tutorial');

		$this->template
		->set_layout('users')
		->build('add_archiveo',isset($data) ? $data : NULL);

		}
	}
	function edit_archiveo()
	{		

		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('description', 'Description', 'required');

		$id = $this->input->post('id', TRUE);
		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('task_update_failed'));
				redirect('tutorial');
		}else{
 
			$sContent = strip_tags(stripslashes($a),"");
			$form_data = array(
							'name' => $this->input->post('name'),
							'description' => $this->input->post('description'),
							'url' => $this->input->post(url),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->where('id',$id)->update('archiveo', $form_data); 
			$des=$this->input->post('description');

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message','ویرایش با موفقیت انجام شد');
			redirect('tutorial');
		}
	}else{
			$this->load->module('layouts');
	$this->load->library('template');
	$this->load->library('jdf');
	$data['time'] = $this->jdf->jdate('H:i:s',time);
	$data['datepicker'] = TRUE;
	$data['datatables'] = TRUE;
		$data['page'] = lang('tutorial');
		$data['ssss'] = $this->item_model->ar_details($this->uri->segment(3));

		$data['form'] = TRUE;
		$this->template
		->set_layout('users')
		->build('edit_archiveo',isset($data) ? $data : NULL);
	}
	}
	function delete_archiveo(){
		if ($this->input->post() ){
					$id = $this->input->post('id', TRUE);
					$this->db->where('id',$id)->delete('archiveo');

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message','اطلاعات با موفقیت حذف گردید');
					redirect($this->input->post('r_url'));
		}else{
			$data['id'] = $this->uri->segment(3);
			$this->load->view('modal/delete_archiveo',$data);
		}
		
	}
	/*onvan*/

	/*zironvan*/
	function add_archiveg()
	{
		
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('s_title', 'S_title', 'required');

		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('error_editor'));
				redirect('tutorial');
		}else{
			$form_data = array(
							'sub_g' => $this->input->post('s_title'),
							'image' => $this->input->post('image'),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->insert('archiveg ', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			
			
			$this->session->set_flashdata('message', 'اطلاعات مربوطه ثبت گردید');


			redirect('tutorial/add_archiveg');

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

			$data['page'] = lang('tutorial');
	$data['onvan'] = $this->item_model->list_archiveo();

		$this->template
		->set_layout('users')
		->build('add_archiveg',isset($data) ? $data : NULL);

		}
	}
	function edit_archiveg()
	{		

		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('s_title', 'S_title', 'required');

		$id = $this->input->post('id', TRUE);
		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('task_update_failed'));
				redirect('tutorial');
		}else{
 
			$sContent = strip_tags(stripslashes($a),"");
			$form_data = array(
							'sub_g' => $this->input->post('s_title'),
							'image' => $this->input->post('image'),
			                'saved_by' => $this->tank_auth->get_user_id(),
			            );
			$this->db->where('id',$id)->update('archiveg', $form_data); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message','ویرایش با موفقیت انجام شد');
			redirect('tutorial');
		}
	}else{
			$this->load->module('layouts');
	$this->load->library('template');
	$this->load->library('jdf');
	$data['time'] = $this->jdf->jdate('H:i:s',time);
	$data['datepicker'] = TRUE;
	$data['datatables'] = TRUE;				$data['img'] = TRUE;

		$data['page'] = lang('tutorial');
		$data['ssss'] = $this->item_model->archiveg_details($this->uri->segment(3));
	$data['onvan'] = $this->item_model->list_archiveo();

		$data['form'] = TRUE;
		$this->template
		->set_layout('users')
		->build('edit_archiveg',isset($data) ? $data : NULL);
	}
	}
	function delete_archiveg(){
		if ($this->input->post() ){
					$id = $this->input->post('id', TRUE);
					$this->db->where('id',$id)->delete('archiveg');

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message','اطلاعات با موفقیت حذف گردید');
					redirect($this->input->post('r_url'));
		}else{
			$data['id'] = $this->uri->segment(3);
			$this->load->view('modal/delete_archiveg',$data);
		}
		
	}
	/*zironvan*/
	
	
	 public function do_upload()
        {
			
                $config['upload_path']          = '../../../../../file/';
                $config['allowed_types']        = '*';
                $config['max_size']             = 500000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('image1'))
                {
                        $error = array('خطا' => $this->upload->display_errors());

                        $this->load->view("<?=base_url()?>tutorial/add_sabt", $error);
						redirect('tutorial');
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        $this->load->view("<?=base_url()?>tutorial/add_sabt", $data);
						redirect('tutorial');
                }
				
      
	  if(is_file($config['upload_path']))
{
    chmod($config['upload_path'], 777); ## this should change the permissions
}
	  
	  
	  
	    }
	
	
	
}

/* End of file items.php */