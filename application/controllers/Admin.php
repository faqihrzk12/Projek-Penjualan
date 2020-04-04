<?php

class Admin extends CI_Controller{

public function __construct(){
	parent::__construct();
	$this->load->helper('form');
	$this->load->library('form_validation');
	$this->load->library('pagination');
	$this->load->model("mymodel");
	$this->load->model("modeladmin");
	$this->load->model("dashboard");
}

function index(){ 
if(!isset($this->session->userdata['masuk'])){
	redirect(base_url('sigin/index'));
}


	
	// integrate bootstrap pagination
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li class="page-item"><a href="#" class="page-link">';
		$config['first_tag_close'] = '</a></li>';
		$config['prev_link'] = '«';
		$config['prev_tag_open'] = '<li class="page-item"><div class="page-link">';
		$config['prev_tag_close'] = '</div></li>';
		$config['next_link'] = '»';
		$config['next_tag_open'] = '<li class="page-item"><div class="page-link">';
		$config['next_tag_close'] = '</div></li>';
		$config['last_tag_open'] = '<li class="page-item"><a href="#" class="page-link">';
		$config['last_tag_close'] = '</a></li>';
		$config['cur_tag_open'] = '<li class="active page-item"><a href="#" class="page-link">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page-item"><div class="page-link">';
		$config['num_tag_close'] = '</div></li>';

	$jumlah=$this->mymodel->jumlahdata('barang');
	$config['base_url']=base_url('admin/index');
	$config['total_rows']=$jumlah;
	$config['per_page']=3;
	
	$this->pagination->initialize($config);
	$from=$this->uri->segment(3);
	$hasil=$this->mymodel->paging('barang',$config['per_page'],$from);
	$all = $this->mymodel->semuadata('barang');
	$data = array('databarang' => $hasil ,'data' => $all);
	$this->load->view('barang',$data);
}

function dashboard() {
	$data['total_barang'] = $this->dashboard->getTotalData('barang')->total;
	$data['total_pelanggan'] = $this->dashboard->getTotalData('pelanggan')->total;
	$data['total_penjualan_header'] = $this->dashboard->getTotalData('penjualan_header')->total;
	$data['penjualan_report'] = $this->dashboard->getReportPenjualan();


	$this->load->view('dashboard',$data);
}


function pelanggan(){

	// integrate bootstrap pagination
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li class="page-item"><a href="#" class="page-link">';
		$config['first_tag_close'] = '</a></li>';
		$config['prev_link'] = '«';
		$config['prev_tag_open'] = '<li class="page-item"><div class="page-link">';
		$config['prev_tag_close'] = '</div></li>';
		$config['next_link'] = '»';
		$config['next_tag_open'] = '<li class="page-item"><div class="page-link">';
		$config['next_tag_close'] = '</div></li>';
		$config['last_tag_open'] = '<li class="page-item"><a href="#" class="page-link">';
		$config['last_tag_close'] = '</a></li>';
		$config['cur_tag_open'] = '<li class="active page-item"><a href="#" class="page-link">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page-item"><div class="page-link">';
		$config['num_tag_close'] = '</div></li>';

	$jumlah=$this->mymodel->jumlahdata('pelanggan');
	$config['base_url']=base_url('admin/pelanggan');
	$config['total_rows']=$jumlah;
	$config['per_page']=3;
	
	$this->pagination->initialize($config);
	$from=$this->uri->segment(3);
	$hasil=$this->mymodel->paging('pelanggan',$config['per_page'],$from);
	$all = $this->mymodel->semuadata('pelanggan');
	$data = array('datapembeli' => $hasil, 'data' => $all );
	$this->load->view('pembeli',$data);
}

function user(){

	// integrate bootstrap pagination
		$config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-left">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '«';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '»';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

	$jumlah=$this->mymodel->jumlahdata('cuser');
	$config['base_url']=base_url('admin/user');
	$config['total_rows']=$jumlah;
	$config['per_page']=3;
	
	$this->pagination->initialize($config);
	$from=$this->uri->segment(3);
	$hasil=$this->mymodel->paging('cuser',$config['per_page'],$from);
	$all = $this->mymodel->semuadata('cuser');
	$data = array('datauser' => $hasil, 'data' => $all );
	$this->load->view('user',$data);
}

function suplier(){

	// integrate bootstrap pagination
		$config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-left">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '«';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '»';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

	$jumlah=$this->mymodel->jumlahdata('suplier');
	$config['base_url']=base_url('admin/suplier');
	$config['total_rows']=$jumlah;
	$config['per_page']=3;
	
	$this->pagination->initialize($config);
	$from=$this->uri->segment(3);
	$hasil=$this->mymodel->paging('suplier',$config['per_page'],$from);

	$data = array('datasuplier' => $hasil );
	$this->load->view('suplier',$data);
}



function tambahbarang(){

    $merk=$this->modeladmin->combomerk();
    $data=array('merk'=>$merk);
	$this->load->view('tambahbarang',$data);
}

function tambahpetugas(){
   $akses=$this->modeladmin->comboakses();
    $data=array('akses'=>$akses);
	$this->load->view('tambahpetugas',$data);
}
function tambahpembeli(){
   
	$this->load->view('tambahpembeli');
}


function savebarang(){

	//validasi data salah/kosong

	$this->form_validation->set_rules('kode','kode barang','required|trim');
	$this->form_validation->set_rules('nama','NAMA barang','required|trim');
	$this->form_validation->set_rules('harga','harga ','required|trim');
	$this->form_validation->set_rules('stok','stok ','required|trim');


	if ($this->form_validation->run() == FALSE ) {

	$merk=$this->modeladmin->combomerk();
    $data=array('pesan'=>validation_errors(), 'merk' => $merk);
	$this->load->view('tambahbarang',$data);
		
	}else{
	
	$kode=$this->input->post('kode');
	$nama=$this->input->post('nama');
	$harga=$this->input->post('harga');
	$stok=$this->input->post('stok');
	$merk=$this->input->post('merk');
	

//validasi data doble

$where=array('kode_barang'=>$kode);
$cari=$this->mymodel->getwhere('barang',$where);

if(!empty($cari)){

	$merk=$this->modeladmin->combomerk();
    $data=array('pesan'=>'data kode tidak boleh sama', 'merk' => $merk);
	$this->load->view('tambahbarang',$data);

}else{
	// data array
$data=array('kode_barang'=>$kode,
'nama_barang'=>$nama,
'harga'=>$harga,
'total_stock'=>$stok,
'id_merk'=>$merk);

//menyimpan ke database
$this->mymodel->insert('barang',$data);
$this->session->set_flashdata('insert', true);
$a=base_url('admin/index');
redirect($a);
}
}
}

function savepembeli(){

	//validasi data salah/kosong

	$this->form_validation->set_rules('kode','kode pembeli','required|numeric');
	$this->form_validation->set_rules('nama','NAMA pembeli','required|trim');
	$this->form_validation->set_rules('alamat','alamat ','required|trim');
	$this->form_validation->set_rules('telpon','telpon ','required|trim');


	if ($this->form_validation->run() == FALSE ) {

	
    $data=array('pesan'=>validation_errors());
	$this->load->view('tambahpembeli',$data);
		
	}else{
	
	$kode=$this->input->post('kode');
	$nama=$this->input->post('nama');
	$alamat=$this->input->post('alamat');
	$telpon=$this->input->post('telpon');
	

//validasi data doble

$where=array('id_pelanggan'=>$kode);
$cari=$this->mymodel->getwhere('pelanggan',$where);

if(!empty($cari)){

	
    $data=array('pesan'=>'data kode tidak boleh sama');
	$this->load->view('tambahpembeli',$data);

}else{
	// data array
$data=array('id_pelanggan'=>$kode,
'nama_pelanggan'=>$nama,
'alamat'=>$alamat,
'telepon'=>$telpon);

//menyimpan ke database

$this->mymodel->insert('pelanggan',$data);
$this->session->set_flashdata('insert', true);
$a=base_url('admin/pelanggan');
redirect($a);
}
}
}


function savepetugas(){

	//validasi data salah/kosong

	$this->form_validation->set_rules('kode','kode pembeli','required|numeric');
	$this->form_validation->set_rules('nama','NAMA pembeli','required|trim');
	$this->form_validation->set_rules('password','password ','required|trim');


	if ($this->form_validation->run() == FALSE ) {

	
    $data=array('pesan'=>validation_errors());
	$this->load->view('tambahpetugas',$data);
		
	}else{
	$pass=$this->input->post(md5('password'));
	$kode=$this->input->post('kode');
	$nama=$this->input->post('nama');
	

//validasi data doble

$where=array('id_user'=>$kode);
$cari=$this->mymodel->getwhere('cuser',$where);

if(count($cari)>0){

	
    $data=array('pesan'=>'data kode tidak boleh sama');
	$this->load->view('tambahpetugas',$data);

}else{
	// data array
$data=array('id_user'=>$kode,
'username'=>$this->input->post('user'),
'password'=>$pass,
'nama'=>$nama,
'id_akses'=>$this->input->post('akses'));
//menyimpan ke database

$this->mymodel->insert('cuser',$data);
$a=base_url('admin/user');
redirect($a);
}
}
}




	function editbarang($kode)
	{
		$where=array('kode_barang'=>$kode);
		$databarang=$this->mymodel->getwhere('barang',$where);

	
    $data=array('databarang'=>$databarang);

    $this->load->view('admin/editbarang',$data);

	}

	function updatebarang()
	{
	$kode=$this->input->post('kode');
	$nama=$this->input->post('nama');
	$harga=$this->input->post('harga');
	$stok=$this->input->post('stok');
	$merk=$this->input->post('merk');
	
$data=array(
'nama_barang'=>$nama,
'harga'=>$harga,
'total_stock'=>$stok,
'id_merk'=>$merk);

$where=array('kode_barang'=>$kode);

$this->mymodel->update('barang',$data,$where);
$this->session->set_flashdata('update', true);
$a=base_url('admin/index');
redirect($a);
	}

function deleteuser($kode)
{
	$id=array('id_user'=>$kode);
	$this->mymodel->delete('cuser',$id);
	redirect(base_url('admin/user'));
}
function deletebarang($kode)
{
	$id=array('kode_barang'=>$kode);
	$this->mymodel->delete('barang',$id);
	$this->session->set_flashdata('delete', true);
	redirect(base_url('admin/index'));
}


	function edituser($kode)
	{
		$where=array('id_user'=>$kode);
		$datauser=$this->mymodel->getwhere('cuser',$where);

	
    $data=array('datauser'=>$datauser);

    $this->load->view('admin/edituser',$data);

	}

	function updateuser()
	{
	$kode=$this->input->post('kode');
	$user=$this->input->post('user');
	$password=$this->input->post('password');
	$nama=$this->input->post('nama');
	
$data=array(
'username'=>$user,
'password'=>$password,
'nama'=>$nama);

$where=array('id_user'=>$kode);

$this->mymodel->update('cuser',$data,$where);
$a=base_url('admin/user');
redirect($a);
	}




	function editpembeli($kode)
	{
		$where=array('id_pelanggan'=>$kode);
		$datapembeli=$this->mymodel->getwhere('pelanggan',$where);

	
    $data=array('datapembeli'=>$datapembeli);

    $this->load->view('admin/editpembeli',$data);

	}

	function updatepembeli()
	{
	$kode=$this->input->post('kode');
	$nama=$this->input->post('nama');
	$alamat=$this->input->post('alamat');
	$telpon=$this->input->post('telpon');
	
$data=array(
'nama_pelanggan'=>$nama,
'alamat'=>$alamat,
'telepon'=>$telpon);

$where=array('id_pelanggan'=>$kode);

$this->mymodel->update('pelanggan',$data,$where);
$this->session->set_flashdata('update', true);
$a=base_url('admin/pelanggan');
redirect($a);
	}


function deletepembeli($kode)
{
	$id=array('id_pelanggan'=>$kode);
	$this->mymodel->delete('pelanggan',$id);
	$this->session->set_flashdata('delete', true);
	redirect(base_url('admin/pelanggan'));
}



function editsuplier($kode)
	{
		$where=array('kode'=>$kode);
		$datasuplier=$this->mymodel->getwhere('suplier',$where);

	
    $data=array('datasuplier'=>$datasuplier);

    $this->load->view('admin/editsuplier',$data);

	}

	function updatesuplier()
	{
	$kode=$this->input->post('kode');
	$nama=$this->input->post('nama');
	$alamat=$this->input->post('alamat');
	$telpon=$this->input->post('telpon');
	
$data=array(
'nama'=>$nama,
'alamat'=>$alamat,
'handphone'=>$telpon);

$where=array('kode'=>$kode);

$this->mymodel->update('suplier',$data,$where);
$a=base_url('admin/suplier');
redirect($a);
	}


function deletesuplier($kode)
{
	$id=array('kode'=>$kode);
	$this->mymodel->delete('suplier',$id);
	redirect(base_url('admin/suplier'));
}

function trmasuk(){

	// integrate bootstrap pagination
		$config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-left">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '«';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '»';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

	$jumlah=$this->mymodel->jumlahdata('header_masuk');
	$config['base_url']=base_url('admin/trmasuk');
	$config['total_rows']=$jumlah;
	$config['per_page']=5;
	
	$this->pagination->initialize($config);
	$from=$this->uri->segment(5);
	$hasil=$this->mymodel->paging('header_masuk',$config['per_page'],$from);

	$data = array('datatrmasuk' => $hasil );
	$this->load->view('trmasuk',$data);
}




 function tambahtrmasuk(){
$combopt=$this->modeladmin->combopetugas();
$combobr=$this->modeladmin->combobarang();
$combotrms=$this->modeladmin->combotrms();
	$combosp=$this->modeladmin->combosuplier();
	$data=array('combopt'=>$combopt,'combosp'=>$combosp,'combobr'=>$combobr,'combotr'=>$combotrms);
	$this->load->view('tambahtrmasuk',$data);
}



function edittrmasuk($kode)
	{
		$where=array('kode_tr'=>$kode);
		$datatrmasuk=$this->mymodel->getwhere('tr_masuk',$where);

	
    $data=array('datatrmasuk'=>$datatrmasuk);

    $this->load->view('admin/edittrmasuk',$data);

	}

	function updatetrmasuk()
	{
	$kode=$this->input->post('kode');
	$tanggal=$this->input->post('tanggal');
	$kodebarang=$this->input->post('kodebarang');
	$kodesuplier=$this->input->post('kodesuplier');
	$jumlah=$this->input->post('jumlah');
	
$data=array(
'tanggal'=>$tanggal,
'kode_barang'=>$kodebarang,
'kode_suplier'=>$kodesuplier,
'jumlah'=>$jumlah);

$where=array('kode_tr'=>$kode);

$this->mymodel->update('tr_masuk',$data,$where);
$a=base_url('admin/trmasuk');
redirect($a);
	}


function deletetrmasuk($kode)
{
	$id=array('kode_tr'=>$kode);
	$this->mymodel->delete('header_masuk',$id);
	redirect(base_url('admin/trmasuk'));
}

function trkeluar(){

	// integrate bootstrap pagination
		$config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-left">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '«';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '»';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

	$jumlah=$this->mymodel->jumlahdata('header_keluar');
	$config['base_url']=base_url('admin/trkeluar');
	$config['total_rows']=$jumlah;
	$config['per_page']=3;
	
	$this->pagination->initialize($config);
	$from=$this->uri->segment(3);
	$hasil=$this->mymodel->paging('header_keluar',$config['per_page'],$from);

	$data = array('datatrkeluar' => $hasil );
	$this->load->view('trkeluar',$data);
}

 function tambahtrkeluar(){
	$combotr=$this->modeladmin->combotrkl();
	$combopb=$this->modeladmin->combopembeli();
	$combopt=$this->modeladmin->combopetugas();
	$combobr=$this->modeladmin->combobarang();
	$data=array('combopb'=>$combopb,'combopt'=>$combopt,'combotr'=>$combotr,'combobr'=>$combobr);

	$this->load->view('tambahtrkeluar',$data);
}


function edittrkeluar($kode)
	{
		$where=array('kode_tr'=>$kode);
		$datatrkeluar=$this->mymodel->getwhere('tr_keluar',$where);

	
    $data=array('datatrkeluar'=>$datatrkeluar);

    $this->load->view('admin/edittrkeluar',$data);

	}

	function updatetrkeluar()
	{
	$kode=$this->input->post('kode');
	$tanggal=$this->input->post('tanggal');
	$kodebarang=$this->input->post('kodebarang');
	$kodepembeli=$this->input->post('kodepembeli');
	$jumlah=$this->input->post('jumlah');
	$total=$this->input->post('total');
$data=array(
'tanggal'=>$tanggal,
'kode_barang'=>$kodebarang,
'kode_pembeli'=>$kodepembeli,
'jumlah'=>$jumlah,
'total'=>$total);

$where=array('kode_tr'=>$kode);

$this->mymodel->update('tr_keluar',$data,$where);
$a=base_url('admin/trkeluar');
redirect($a);
	}





}
?>