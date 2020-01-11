<?php

/**
* 
*/
class Mymodel extends CI_Model
{
	
	public function semuadata($tabel)
	{
		$myquery="select * from ".$tabel;
		$res=$this->db->query($myquery);
		return $res->result();
	}

		public function insert($table,$data){
			$res=$this->db->insert($table,$data);
			return $res;
		}

       

       
		public function update($table,$data,$where){
			$res=$this->db->update($table,$data,$where);
			return $res;
		}


		public function delete($table,$where){
			$res=$this->db->delete($table,$where);
			return $res;
		}

		public function getwhere($table,$where)
		{
			$res=$this->db->get_where($table,$where);
			return $res->row();
		}

		public function jumlahdata($table){
			return $this->db->get($table)->num_rows();
		}
			public function jumlah_record($table,$where){
			return $this->db->get_where($table,$where)->num_rows();
		}


		public function paging($table,$rows,$start){
			return $this->db->get($table,$rows,$start)->result();
		} 

		
}


?>