<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Item_model extends CI_Model
{
	

	function list_simt($limit)
	{
		return $this->db->order_by('id','desc')->get('simt',$limit,$this->uri->segment(3))->result();
	}
	function simt_details($title)
	{
		return $this->db->where('id',$title)->get('simt')->result();
	}

	
	function list_learning($limit)
	{
		return $this->db->order_by('id','desc')->get('learning',$limit,$this->uri->segment(3))->result();
	}
	function learning_details($title)
	{
		return $this->db->where('id',$title)->get('learning')->result();
	}	
	
	
	function list_sabt($limit)
	{
		return $this->db->order_by('id','desc')->get('sabt',$limit,$this->uri->segment(3))->result();
	}
	function sabt_details($title)
	{
		return $this->db->where('id',$title)->get('sabt')->result();
	}	

	function list_title($limit)
	{
		return $this->db->order_by('id','desc')->get('title',$limit,$this->uri->segment(3))->result();
	}
	function title_details($title)
	{
		return $this->db->where('title',1)->get('title')->result();
	}
	
	function list_title2($limit)
	{
		return $this->db->order_by('id','desc')->get('title2',$limit,$this->uri->segment(3))->result();
	}
	
	function list_archiveo($limit)
	{
		return $this->db->order_by('id','desc')->get('archiveo',$limit,$this->uri->segment(3))->result();
	}
	function ar_details($sss)
	{
		return $this->db->where('id',$sss)->get('archiveo')->result();
	}	
	
	function list_archiveg($limit)
	{
		return $this->db->order_by('id','desc')->get('archiveg',$limit,$this->uri->segment(3))->result();
	}
	function archiveg_details($ssss)
	{
		return $this->db->where('id',$ssss)->get('archiveg')->result();
	}	
	
	
	
	
	
}

/* End of file model.php */