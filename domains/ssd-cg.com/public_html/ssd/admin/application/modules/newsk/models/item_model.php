<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Item_model extends CI_Model
{
	


	function list_news($limit)
	{
		return $this->db->order_by('id','DESC')->get('newsk',$limit,$this->uri->segment(3))->result();
	}
	
	function saved_item_details($item)
	{
		return $this->db->where('item_id',$item)->get('items_saved')->result();
	}


	function news_details($city)
	{
		return $this->db->where('id',$city)->get('newsk')->result();
	}
}

/* End of file model.php */