<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Item_model extends CI_Model
{
	

	function list_about($limit)
	{
		return $this->db->order_by('id','desc')->get('introduction',$limit,$this->uri->segment(3))->result();
	}
	
	function saved_item_details($item)
	{
		return $this->db->where('item_id',$item)->get('items_saved')->result();
	}

	function about_details($about)
	{
		return $this->db->where('id',$about)->get('introduction')->result();
	}
	
	function list_catalog($limit)
	{
		return $this->db->order_by('id','desc')->get('catalog',$limit,$this->uri->segment(3))->result();
	}

	function catalog_details($catalog)
	{
		return $this->db->where('id',$catalog)->get('catalog')->result();
	}
	
	
		function list_customer($limit)
	{
		return $this->db->order_by('id','desc')->get('customer',$limit,$this->uri->segment(3))->result();
	}

	function customer_details($catalog)
	{
		return $this->db->where('id',$catalog)->get('customer')->result();
	}
	
	
}

/* End of file model.php */