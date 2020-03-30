<?php
class Dashboard extends CI_Model
{
	
	/* public function selectWithArgs($args = array()) {
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
	} */

	public function getTotalData($table) {
		$this->db->select(
				'COUNT(*) as total'
			);
		$query = $this->db->get($table);
		$result = $query->row();
		return $result;
	}

	public function getReportPenjualan() {
		$query = $this->db->query(
			"SELECT
				MONTH(tanggal) as bulan,
				COUNT(*) as total_penjualan,
				SUM(grand_total) as total_grand_total
			FROM
				penjualan_header
			WHERE
				YEAR(tanggal) = '2020'
			GROUP BY MONTH(tanggal)"
		);
		$result = $query->result_array();
		return $result;
	}
}


?>