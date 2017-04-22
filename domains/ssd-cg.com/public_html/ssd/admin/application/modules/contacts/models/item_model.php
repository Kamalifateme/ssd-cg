<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Item_model extends CI_Model
{
	

	function list_contact($limit)
	{
		return $this->db->order_by('id','desc')->get('contact',$limit,$this->uri->segment(3))->result();
	}

	function contact_details($about)
	{
		return $this->db->where('id',$about)->get('contact')->result();
	}
	
	function list_contacts($limit)
	{
		return $this->db->order_by('id','desc')->get('contacts',$limit,$this->uri->segment(3))->result();
	}

	function contacts_details($about)
	{
		return $this->db->where('id',$about)->get('contacts')->result();
	}
	
	
}

/* End of file model.php */