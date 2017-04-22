<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Item_model extends CI_Model
{
	

	function list_events($limit)
	{
		return $this->db->order_by('start_date','desc')->get('events',$limit,$this->uri->segment(3))->result();
	}
	
	function saved_item_details($item)
	{
		return $this->db->where('item_id',$item)->get('items_saved')->result();
	}

	function event_details($event)
	{
		return $this->db->where('id',$event)->get('events')->result();
	}
	
}

/* End of file model.php */