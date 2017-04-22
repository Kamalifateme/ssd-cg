<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Item_model extends CI_Model
{
	

	function list_ssmm($limit)
	{
		return $this->db->order_by('id','desc')->get('ssmm',$limit,$this->uri->segment(3))->result();
	}

	function ssmm_details($about)
	{
		return $this->db->where('id',$about)->get(ssmm)->result();
	}
	
	
	
	function list_fani($limit)
	{
		return $this->db->order_by('id','desc')->get('fani',$limit,$this->uri->segment(3))->result();
	}

		function fani_details($about)
	{
		return $this->db->where('id',$about)->get(fani)->result();
	}
	
		function list_man($limit)
	{
		return $this->db->order_by('id','desc')->get('man',$limit,$this->uri->segment(3))->result();
	}

		function man_details($about)
	{
		return $this->db->where('id',$about)->get(man)->result();
	}
	
	function list_mali($limit)
	{
		return $this->db->order_by('id','desc')->get('mali',$limit,$this->uri->segment(3))->result();
	}

		function mali_details($about)
	{
		return $this->db->where('id',$about)->get(mali)->result();
	}
	
}

/* End of file model.php */