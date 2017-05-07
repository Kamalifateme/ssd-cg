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
	
	function list_lead($limit)
	{
		return $this->db->order_by('id','desc')->get('lead',$limit,$this->uri->segment(3))->result();
	}

	function lead_details($about)
	{
		return $this->db->where('id',$about)->get(lead)->result();
	}
	
	function list_grow($limit)
	{
		return $this->db->order_by('id','desc')->get('grow',$limit,$this->uri->segment(3))->result();
	}

	function grow_details($about)
	{
		return $this->db->where('id',$about)->get(grow)->result();
	}
	
	function list_marketing($limit)
	{
		return $this->db->order_by('id','desc')->get('marketing',$limit,$this->uri->segment(3))->result();
	}

	function marketing_details($about)
	{
		return $this->db->where('id',$about)->get(marketing)->result();
	}
	
	function list_tech($limit)
	{
		return $this->db->order_by('id','desc')->get('tech',$limit,$this->uri->segment(3))->result();
	}

	function tech_details($about)
	{
		return $this->db->where('id',$about)->get(tech)->result();
	}
	
	function list_social($limit)
	{
		return $this->db->order_by('id','desc')->get('social',$limit,$this->uri->segment(3))->result();
	}

	function social_details($about)
	{
		return $this->db->where('id',$about)->get(social)->result();
	}
	
	function list_finance($limit)
	{
		return $this->db->order_by('id','desc')->get('finance',$limit,$this->uri->segment(3))->result();
	}

	function finance_details($about)
	{
		return $this->db->where('id',$about)->get(finance)->result();
	}
	
	function list_entre($limit)
	{
		return $this->db->order_by('id','desc')->get('entre',$limit,$this->uri->segment(3))->result();
	}

	function entre_details($about)
	{
		return $this->db->where('id',$about)->get(entre)->result();
	}
	
	function list_busi($limit)
	{
		return $this->db->order_by('id','desc')->get('busi',$limit,$this->uri->segment(3))->result();
	}

	function busi_details($about)
	{
		return $this->db->where('id',$about)->get(busi)->result();
	}
	
	function list_franch($limit)
	{
		return $this->db->order_by('id','desc')->get('franch',$limit,$this->uri->segment(3))->result();
	}

	function franch_details($about)
	{
		return $this->db->where('id',$about)->get(franch)->result();
	}
	
	function list_mag($limit)
	{
		return $this->db->order_by('id','desc')->get('mag',$limit,$this->uri->segment(3))->result();
	}

	function mag_details($about)
	{
		return $this->db->where('id',$about)->get(mag)->result();
	}
}

/* End of file model.php */