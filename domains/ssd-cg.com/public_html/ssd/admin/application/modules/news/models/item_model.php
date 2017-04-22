<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Item_model extends CI_Model
{
	

	function list_title($limit)
	{
		return $this->db->order_by('id','desc')->get('title',$limit,$this->uri->segment(3))->result();
	}
	function list_news($limit)
	{
		return $this->db->order_by('id','desc')->get('blog',$limit,$this->uri->segment(3))->result();
	}
	
	function saved_item_details($item)
	{
		return $this->db->where('item_id',$item)->get('items_saved')->result();
	}

	function title_details($title)
	{
		return $this->db->where('id',$title)->get('title')->result();
	}
	function news_details($city)
	{
		return $this->db->where('id',$city)->get('blog')->result();
	}
}

/* End of file model.php */