<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Item_model extends CI_Model
{
	

	function list_face($limit)
	{
		return $this->db->order_by('id','desc')->get('face',$limit,$this->uri->segment(3))->result();
	}
		function face_details($face)
	{
		return $this->db->where('id',$face)->get('face')->result();
	}
	function list_group($limit)
	{
		return $this->db->order_by('id','desc')->get('group',$limit,$this->uri->segment(3))->result();
	}
		function group_details($group)
	{
		return $this->db->where('id',$group)->get('group')->result();
	}
	function list_alephpa($limit)
	{
		return $this->db->order_by('id','desc')->get('alephpa',$limit,$this->uri->segment(3))->result();
	}
		function alephpa_details($alephpa)
	{
		return $this->db->where('id',$alephpa)->get('alephpa')->result();
	}
		function list_drug($limit)
	{
		return $this->db->order_by('id','desc')->get('drug',$limit,$this->uri->segment(3))->result();
	}
		function drug_details($drug)
	{
		return $this->db->where('id',$drug)->get('drug')->result();
	}
}

/* End of file model.php */