
<?php


class Modeladmin extends CI_Model{

function combopembeli(){
			$query="select kode,nama from pembeli";
			$data=$this->db->query($query);
			foreach ($data->result() as $row) {
				$pembeli[$row->kode]=$row->nama;
			}return $pembeli;
		}


		function combomerk(){
			$query='select id_merk,merk from merk';
			$data=$this->db->query($query);
			return $data;

		}

		function comboakses(){
			$query='select id_akses,akses from akses';
			$data=$this->db->query($query);
			return $data;

		}
			function combotrkl(){
			$query='select kode_tr,tanggal from header_keluar';
			$data=$this->db->query($query);
			foreach ($data->result() as $row) {
				$tr[$row->kode_tr]=$row->kode_tr;
			}return $tr;

		}
		function combosuplier(){
			$query="select kode,nama from suplier";
			$data=$this->db->query($query);
			foreach ($data->result() as $row) {
				$suplier[$row->kode]=$row->nama;
			}return $suplier;
		}
		function combopetugas(){
			$query='select kode,nama from petugas';
			$data=$this->db->query($query);
			foreach($data->result() as $row){
				$petugas[$row->kode]=$row->nama;
			}return $petugas;
		}

		function combobarang(){
			$query="select kode,nama from barang";
			$data=$this->db->query($query);
			foreach ($data->result() as $row ) {
				$barang[$row->kode]=$row->nama;
			}return $barang;
		}


	
}
		?>