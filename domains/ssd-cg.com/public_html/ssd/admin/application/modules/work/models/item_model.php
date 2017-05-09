<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Item_model extends CI_Model
{
	

	function list_ssmw($limit)
	{
		return $this->db->order_by('id','desc')->get('ssmw',$limit,$this->uri->segment(3))->result();
	}

	function ssmw_details($about)
	{
		return $this->db->where('id',$about)->get('ssmw')->result();
	}
	

	
	function list_dan($limit)
	{
		return $this->db->order_by('id','desc')->get('dan',$limit,$this->uri->segment(3))->result();
	}

	function dan_details($about)
	{
		return $this->db->where('id',$about)->get(dan)->result();
	}
	
	
	
	function list_clinic($limit)
	{
		return $this->db->order_by('id','desc')->get('clinic',$limit,$this->uri->segment(3))->result();
	}

	function clinic_details($about)
	{
		return $this->db->where('id',$about)->get(clinic)->result();
	}
	
	function list_service($limit)
	{
		return $this->db->order_by('id','desc')->get('service',$limit,$this->uri->segment(3))->result();
	}

	function service_details($about)
	{
		return $this->db->where('id',$about)->get(service)->result();
	}
}

/* End of file model.php */