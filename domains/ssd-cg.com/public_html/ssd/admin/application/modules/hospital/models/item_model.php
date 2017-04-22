<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Item_model extends CI_Model
{
	

	function list_city($limit)
	{
		return $this->db->order_by('id','desc')->get('city',$limit,$this->uri->segment(3))->result();
	}
	function list_hospital($limit)
	{
		return $this->db->order_by('id','desc')->get('hospital',$limit,$this->uri->segment(3))->result();
	}
	
	function saved_item_details($item)
	{
		return $this->db->where('item_id',$item)->get('items_saved')->result();
	}

	function city_details($city)
	{
		return $this->db->where('id',$city)->get('city')->result();
	}
	function hospital_details($city)
	{
		return $this->db->where('id',$city)->get('hospital')->result();
	}
}

/* End of file model.php */