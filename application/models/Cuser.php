<?php
class Cuser extends CI_Model
{
	
	public function selectWithArgs($args = array()) {
		foreach ($args as $key => $value) {
			$this->db->where($key, $value);
		}
		$query = $this->db->get('cuser');
		$result = $query->result_array();
		return $result;
	}

	public function insert($data) {
		$res=$this->db->insert('cuser',$data);
		return $res;
	}
}


?>