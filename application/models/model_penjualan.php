<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	 
class Model_penjualan extends CI_Model{
	    	 
function combo_pelanggan(){
   	$myquery="select id_pelanggan,nama_pelanggan from pelanggan ";
   	$kasus=$this->db->query($myquery);
   	return $kasus;
}
function auth_user($username,$password){
      $query=$this->db->query("SELECT * FROM cuser WHERE username='$username' AND password=MD5('$password') LIMIT 1");
      return $query;
   }
   function combopelanggan(){
         $query="select id_pelanggan,nama_pelanggan from pelanggan";
         $data=$this->db->query($query);
         return $data;     
            }

      function combokdbarang(){
         $query="select kode_barang,nama_barang from barang";
         $data=$this->db->query($query);
            return $data;
                  }

function combo_kodebrg(){
   	$myquery="select kode_barang,nama_barang from barang ";
   	$kasus=$this->db->query($myquery);
   	return $kasus;
}

function get_nota(){
      $myquery="select nota from initialisasi ";
      $kasus=$this->db->query($myquery)->row();
      return $kasus;
}

function data_pelanggan($id_pelanggan){
      $myquery="select * from pelanggan where id_pelanggan='$id_pelanggan'";
      $kasus=$this->db->query($myquery)->row();
      return $kasus;
}

function combo_namabrg(){
      $myquery="select kode_barang,nama_barang from barang ";
      $kasus=$this->db->query($myquery);
      return $kasus;
}

function data_barang($kode_barang){
      $myquery="select * from barang where kode_barang='$kode_barang'";
      $kasus=$this->db->query($myquery)->row();
      return $kasus;
}







function updatenota(){
   	$myquery="update initialisasi set nota=nota+1";
   	$kasus=$this->db->query($myquery);
}

function penjualan_header($nota){
      $myquery="SELECT penjualan_header.nomor_faktur,penjualan_header.tanggal,penjualan_header.id_user,penjualan_header.grand_total,penjualan_header.bayar,penjualan_header.keterangan,pelanggan.nama_pelanggan,pelanggan.alamat,penjualan_header.potongan_harga,penjualan_header.ongkos_kirim,penjualan_header.pembulatan from penjualan_header INNER JOIN pelanggan on penjualan_header.id_pelanggan=pelanggan.id_pelanggan where nomor_faktur='$nota'";
      $kasus=$this->db->query($myquery)->row();
      return $kasus;
}

function info_penjualan_detil($id_detil){
   $myquery="select kode_barang,jumlah_beli from penjualan_detil where id_detil=$id_detil";
   echo $myquery;
   $kasus=$this->db->query($myquery)->row();
   return $kasus;
}

function penjualan_detil($nota){
   	$myquery="SELECT penjualan_detil.id_detil,penjualan_detil.kode_barang,barang.nama_barang,penjualan_detil.jumlah_beli,penjualan_detil.harga_satuan,penjualan_detil.total from penjualan_detil INNER JOIN barang on penjualan_detil.kode_barang=barang.kode_barang where nomor_faktur='$nota'";
   	$kasus=$this->db->query($myquery)->result();
   	return $kasus;
}

function jumlah_item($nota){
   	$myquery="select nomor_faktur from penjualan_detil where nomor_faktur='$nota'";
   	$kasus=$this->db->query($myquery)->num_rows();
   	return $kasus;
}

function data_detil($nota){
      $myquery="select * from penjualan_detil where nomor_faktur='$nota'";
      $kasus=$this->db->query($myquery)->result();
      return $kasus;
}





function cek_stock($kode_barang){
      $myquery="select total_stock from barang where kode_barang='$kode_barang'";
      $kasus=$this->db->query($myquery)->row();
      return $kasus;
}

function update_stock($kode_barang,$jumlah_barang,$tanda){
      $myquery="update barang set total_stock=total_stock".$tanda.$jumlah_barang." where kode_barang='$kode_barang'";
      $kasus=$this->db->query($myquery);
           
}

function laporan_penjualan_pertgl($tglawal,$tglakhir){
      $myquery="SELECT penjualan_detil.id_detil,penjualan_detil.kode_barang,barang.nama_barang,penjualan_detil.jumlah_beli,penjualan_detil.harga_satuan,penjualan_detil.total,penjualan_header.tanggal,penjualan_header.grand_total from penjualan_detil INNER JOIN barang on penjualan_detil.kode_barang=barang.kode_barang inner join penjualan_header on penjualan_header.nomor_faktur=penjualan_detil.nomor_faktur where (tanggal>='$tglawal' and tanggal<='$tglakhir')";
      
      $kasus=$this->db->query($myquery)->result();
      return $kasus;
}

function laporan_penjualan_perbrg($tglawal,$tglakhir,$kode_barang){
      $myquery="SELECT penjualan_detil.id_detil,penjualan_detil.kode_barang,barang.nama_barang,penjualan_detil.jumlah_beli,penjualan_detil.harga_satuan,penjualan_detil.total,penjualan_header.tanggal from penjualan_detil INNER JOIN barang on penjualan_detil.kode_barang=barang.kode_barang inner join penjualan_header on penjualan_header.nomor_faktur=penjualan_detil.nomor_faktur where (tanggal>='$tglawal' and tanggal<='$tglakhir') and (penjualan_detil.kode_barang='$kode_barang')";
      $kasus=$this->db->query($myquery)->result();
      return $kasus;
}



} ?>
