<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Item_model extends CI_Model
{
	


	function list_doctor($limit)
	{
		return $this->db->order_by('id','desc')->get('doctor',$limit,$this->uri->segment(3))->result();
	}

	function doctor_details($city)
	{
		return $this->db->where('id',$city)->get('doctor')->result();
	}
}

/* End of file model.php */