<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Item_model extends CI_Model
{
	

	function list_title($limit)
	{
		return $this->db->order_by('id','desc')->get('title',$limit,$this->uri->segment(3))->result();
	}
	
	function list_title2($limit)
	{
		return $this->db->order_by('id','desc')->get('title2',$limit,$this->uri->segment(3))->result();
	}
	
	function title_details($about)
	{
		return $this->db->where('id',$about)->get('title')->result();
	}
	function title_detailsa($about)
	{
		return $this->db->where('id',$about)->get('title2')->result();
	}
	
	
	function descr_title($limit)
	{
		return $this->db->order_by('id','desc')->get('descr',$limit,$this->uri->segment(3))->result();
	}

	function descr_details($catalog)
	{
		return $this->db->where('id',$catalog)->get('descr')->result();
	}
	
	
	
	
}

/* End of file model.php */