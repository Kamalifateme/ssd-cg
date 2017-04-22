<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Item_model extends CI_Model
{
	


	function list_slide($limit)
	{
		return $this->db->order_by('id','desc')->get('slider',$limit,$this->uri->segment(3))->result();
	}
	
	function slide_details($city)
	{
		return $this->db->where('id',$city)->get('slider')->result();
	}
}

/* End of file model.php */