<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {
	
public function __construct()
{
 parent::__construct();
  $this->load->helper('form');
  $this->load->library('form_validation');
  $this->load->library('session');	 
    $this->load->library('mylibrary');	 

  $this->load->model('model_penjualan');
  $this->load->model('mymodel');
   
}

function index()
{

if(!isset($this->session->userdata['masuk'])){
	redirect(base_url('sigin/index'));
}
	if (!isset($this->session->simpan)) {
		// transaksi baru
		//$nt=$this->model_penjualan->initialisasi('nota');
		$nt=$this->model_penjualan->get_nota();
		$n=$nt->nota+1;
		$nota=date('Y').date('m').substr('000000'.$n,-5,5);
		// simpan session transaksi
		$sesi=array('nota'=>$nota,'tanggal'=>date('Y-m-d'),'id_pelanggan'=>'');
		$this->session->set_userdata($sesi);

		//$this->session->set_userdata('statusform',$sesi);
		$this->session->set_userdata('simpan',0);
		//buat session alamat dan no tlp---
		$sesi_pelanggan=array('alamat'=>'Tidak ada','telepon'=>'Tidak Ada');
		$this->session->set_userdata($sesi_pelanggan);
	} 
	$nota=$this->session->nota;
	$cmbpelanggan=$this->model_penjualan->combo_pelanggan();
	$cmbkodebrg=$this->model_penjualan->combo_kodebrg();
	$datadetil=$this->model_penjualan->penjualan_detil($nota);
	
	$data=array('cmbpelanggan'=>$cmbpelanggan,'cmbkodebrg'=>$cmbkodebrg,'datadetil'=>$datadetil);
	$this->load->view('transaksi',$data);
}


function simpandulu()
{
	$nota=$this->input->post('nomor_nota');
	$tanggal=$this->input->post('tanggal');
	$id_pelanggan=$this->input->post('id_pelanggan');
	$kode_barang=$this->input->post('kode_barang');
	$jumlah_beli=$this->input->post('jumlah_beli');

	$this->form_validation->set_rules('jumlah_beli','<b><i>Jumlah Beli</i></b>','required|numeric');
	$this->form_validation->set_rules('kode_barang','<b><i>Kode Barang</i></b>','required');
	$this->form_validation->set_rules('id_pelanggan','<b><i>Pelanggan</i></b>','required');
	//--cek validasi data--
	if ($this->form_validation->run() == FALSE ) { 
		$this->session->set_userdata('pesan','Data belum lengkap, '.validation_errors());
		redirect(base_url().'penjualan');
		exit;
	}

	// cek stock ----
	$stok=$this->model_penjualan->cek_stock($kode_barang);
	if ($stok->total_stock<=$jumlah_beli) {
		$psn="Stock Barang tidak cukup !!!, sisa ".$stok->total_stock;
		$this->session->set_userdata('pesan',$psn);
		redirect(base_url().'penjualan');
		exit;	
	}

	// cek status simpan
	if ($this->session->simpan==0) {
		//---data pertama kali simpan
	
		//---simpan ke data header
		$data=array('nomor_faktur'=>$nota,
			'tanggal'=>$tanggal,
			'id_pelanggan'=>$id_pelanggan,
			'grand_total'=>$this->input->post('totalbayar'),
			'bayar'=>$this->input->post('cash'),
			'potongan_harga' => $this->input->post('potonganHarga'),
			'ongkos_kirim' => $this->input->post('ongkosKirimFixed'),
			'pembulatan' => $this->input->post('pembulatanFixed'),
			'id_user'=>$this->input->post('kasirid'),
			'keterangan'=>$this->input->post('catatan'));
		//simpan ke tabel penjuala header
		$this->mymodel->Insert('penjualan_header',$data);

		//update nomor urut faktur
		$data=array('nota'=>'nota+1');
		$this->model_penjualan->updatenota();
		//----update nomor statusform simpan jadi 1
		$sesi=array('nota'=>$nota,'tanggal'=>$tanggal,'kasir'=>'0001','id_pelanggan'=>$id_pelanggan);
		$this->session->set_userdata($sesi);
		$this->session->set_userdata('simpan',1);
		// simpan informasi pelanggan
		$plg=$this->model_penjualan->data_pelanggan($id_pelanggan);
		$sesi=array('alamat'=>$plg->alamat,'telepon'=>$plg->telepon);
		$this->session->set_userdata($sesi);

	}
		//update header
		$data=array(
			'tanggal'=>$tanggal,
			'id_pelanggan'=>$id_pelanggan,
			'grand_total'=>$this->input->post('totalbayar'),
			'bayar'=>$this->input->post('cash'),
			'potongan_harga' => $this->input->post('potonganHarga'),
			'ongkos_kirim' => $this->input->post('ongkosKirimFixed'),
			'pembulatan' => $this->input->post('pembulatanFixed'),
			'id_user'=>$this->input->post('kasirid'),
			'keterangan'=>$this->input->post('catatan'));
		
		$where=array('nomor_faktur'=>$nota);
		$this->mymodel->Update('penjualan_header',$data,$where);
		
		// simpan data detil
		$data=array('nomor_faktur'=>$this->input->post('nomor_nota'),
			'kode_barang'=>$kode_barang,
			'jumlah_beli'=>$jumlah_beli,
			'harga_satuan'=>$this->input->post('harga_barang'),
			'total'=>$this->input->post('subtotal'));
		$this->mymodel->Insert('penjualan_detil',$data);
		//update stock
		$this->model_penjualan->update_stock($kode_barang,$jumlah_beli,"-");

		$this->session->set_userdata('pesan','Data Telah Disimpan');
		redirect(base_url().'penjualan');
		
	
		//$this->index();
}


function ajax_pelanggan()
{
	$id_pelanggan = $this->input->post('id_pelanggan');
	$data = $this->model_penjualan->data_pelanggan($id_pelanggan);
	$json['alamat']	=$data->alamat;
	$json['telepon']=$data->telepon;
	echo json_encode($json);
}


function ajax_kodebarang()
{
	$nota=$this->session->nota;
	$kode_barang = $this->input->post('kode_barang');
	$where=array('kode_barang'=>$kode_barang);
	$jr=$this->model_penjualan->jumlah_item($nota);
	
	$data = $this->model_penjualan->data_barang($kode_barang);
	$json['nama_barang']=$data->nama_barang;
	$json['harga_barang']=$data->harga;
	$json['jumlah_item']=$jr;
	
	echo json_encode($json);
}


public function transaksibaru()
{
	$sesi=array('simpan'=>0,'nota'=>'','tanggal'=>'','id_pelanggan'=>'');
	$this->session->unset_userdata('statusform');
	$sesi=array('alamat'=>'','telepon'=>'');
	$this->session->unset_userdata('sesi_pelanggan',$sesi);
	$this->session->unset_userdata('simpan',0);
	$this->session->set_userdata('pesan','Transakasi Baru sudah dapat digunakan');
	redirect(base_url().'penjualan');
	//$this->index();
	
}

public function transaksibatal()
{
	$nota=$this->session->userdata['statusform']['nota'];
	// update stock dulu
	$hasil=$this->model_penjualan->data_detil($nota);
	foreach ($hasil as $row ) {
		$this->model_penjualan->update_stock($row->kode_barang,$row->jumlah_beli,"+");	
	}
	
	$where=array('nomor_faktur'=>$nota);
	$this->mymodel->Delete('penjualan_header',$where);
	$this->mymodel->Delete('penjualan_detil',$where);
	$this->session->set_userdata('pesan','Data Transakasi Telah dibatalkan');
	redirect(base_url().'penjualan');
	
}

//public function delete_detil($id_detil,$kode_barang,$jumlah_beli)
public function delete_detil($id_detil)

{
	// cari info kode barang dan jumlah beli dari id_detil yg akan dihapus
	$cariinfo=$this->model_penjualan->info_penjualan_detil($id_detil);
	
	$where=array('id_detil'=>$id_detil);
	$this->mymodel->delete('penjualan_detil',$where);
	// update stock
	$this->model_penjualan->update_stock($cariinfo->kode_barang,$cariinfo->jumlah_beli,"+");

	$this->session->set_userdata('pesan','Data barang sudah dihapus');
	redirect(base_url().'penjualan');
}

public function cetak_transaksi()
{
	$nota=$this->session->nota;
	$where=array('nomor_faktur'=>$nota);
	$dataheader=$this->model_penjualan->penjualan_header($nota);
	if(empty($dataheader))
	{
		$this->session->set_userdata('pesan','Belum ada data');
		redirect(base_url().'penjualan');
		exit;
	}
	

	$datadetil=$this->model_penjualan->penjualan_detil($nota);
	$this->load->library('fpdf');		
		$pdf = new FPDF('P','mm','A5');
		$pdf->AddPage();
		$pdf->SetFont('Arial','',9);
		$title = 'Faktur Penjualan';
		$pdf->SetTitle($title);
		$pdf->SetAuthor('Faqih');

		$pdf->Ln();
		$pdf->Cell(40, 4, 'Rumahku.com', 0, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(40, 4, 'Jln. Pinangsia Raya No.42, RT.6/RW.5.', 0, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(40, 4, 'Kec.Taman Sari,Kota Jakarta Barat', 0, 0, 'L');
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Cell(20, 4, 'Nota', 0, 0, 'L'); 
		$pdf->Cell(55, 4, ' : '.$nota, 0, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(20, 4, 'Tanggal', 0, 0, 'L');
		$pdf->Cell(85, 4, ' : '.$dataheader->tanggal, 0, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(20, 4, 'Kasir', 0, 0, 'L'); 
		$pdf->Cell(85, 4, ' : '.$dataheader->id_user, 0, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(20, 4, 'Pelanggan', 0, 0, 'L'); 
		$pdf->Cell(85, 4, ' : '.$dataheader->nama_pelanggan, 0, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(20, 4, 'Alamat', 0, 0, 'L'); 
		$pdf->Cell(85, 4, ' : '.$dataheader->alamat, 0, 0, 'L');
		$pdf->Ln();
		//$pdf->Cell(130, 5, '--------------------------------------------------------------------------------------------------------------------------', 0, 0, 'L');
		$pdf->Ln();
		
		$pdf->Cell(25, 5, 'Kode', 1, 0, 'L');
		$pdf->Cell(40, 5, 'Item', 1, 0, 'L');
		$pdf->Cell(25, 5, 'Harga', 1, 0, 'R');
		$pdf->Cell(15, 5, 'Qty', 1, 0, 'R');
		$pdf->Cell(25, 5, 'Subtotal', 1, 0, 'R');
		//$pdf->Ln();
		//$pdf->Cell(130, 5, '--------------------------------------------------------------------------------------------------------------------------', 0, 0, 'L');
		
		$totalGross = 0;
		foreach ($datadetil as $row)  {
			$pdf->Ln();
			$pdf->Cell(25, 5, $row->kode_barang, 1, 0, 'L');
			$pdf->Cell(40, 5, $row->nama_barang, 1, 0, 'L');
			$pdf->Cell(25, 5, number_format($row->harga_satuan,0), 1, 0, 'R');
			$pdf->Cell(15, 5, $row->jumlah_beli, 1, 0, 'R');
			$pdf->Cell(25, 5, number_format($row->total,0), 1,0,'R');
			$totalGross += $row->total;
		}
		//$pdf->Ln();
		//$pdf->Cell(130, 5, '--------------------------------------------------------------------------------------------------------------------------', 0, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(105, 5, 'Harga Jual', 1, 0, 'R');
		$pdf->Cell(25, 5, number_format($totalGross,0), 1,0,'R');
		$pdf->Ln();
		$pdf->Cell(105, 5, 'Potongan Harga', 1, 0, 'R');
		$pdf->Cell(25, 5, number_format($dataheader->potongan_harga,0), 1,0,'R');
		$pdf->Ln();
		$pdf->Cell(105, 5, 'Subtotal', 1, 0, 'R');
		$pdf->Cell(25, 5, number_format($totalGross - $dataheader->potongan_harga,0), 1,0,'R');
		$pdf->Ln();
		$pdf->Cell(105, 5, 'Ongkos Kirim', 1, 0, 'R');
		$pdf->Cell(25, 5, number_format($dataheader->ongkos_kirim,0), 1,0,'R');
		$pdf->Ln();
		$pdf->Cell(105, 5, 'Pembulatan', 1, 0, 'R');
		$pdf->Cell(25, 5, number_format($dataheader->pembulatan,0), 1,0,'R');
		$pdf->Ln();
		$pdf->Cell(105, 5, 'Total', 1, 0, 'R');
		$pdf->Cell(25, 5, number_format($totalGross - $dataheader->potongan_harga + $dataheader->ongkos_kirim + $dataheader->pembulatan,0), 1,0,'R');
		$pdf->Ln();
		$pdf->Cell(105, 5, 'Bayar', 1, 0, 'R');
		$pdf->Cell(25, 5, number_format($dataheader->bayar,0), 1,0,'R');
		$pdf->Ln();
		$pdf->Cell(105, 5, 'Sisa Pembayaran', 1, 0, 'R');
		$pdf->Cell(25, 5, number_format($totalGross - $dataheader->potongan_harga + $dataheader->ongkos_kirim + $dataheader->pembulatan - $dataheader->bayar,0), 1,0,'R');
		//$pdf->Cell(131, 5, '----------------------------------', 0, 0, 'R');
		$pdf->SetFont('Arial','B',6);
		$pdf->Ln();
		$pdf->Cell(30, 5, 'Perhatian', 'L', 0, 'R');
		$pdf->Cell(100, 5, '- REK. BCA 001-770-9138 A/N PT. RUMAH MAHARDIKA KARSYA', 'R', 0, 'L');
		$pdf->Ln();
		$pdf->Cell(30, 5, '', 'L', 0, 'R');
		$pdf->Cell(100, 5, '- REK. MANDIRI 115-000-333-9977 A/N PT. RUMAH MAHARDIKA KARSYA', 'R', 0, 'L');
		$pdf->Ln();
		$pdf->Cell(30, 5, '', 'L', 0, 'R');
		$pdf->Cell(100, 5, '- Barang-barang yang sudah dibeli tidak dapat ditukar/dikembalikan', 'R', 0, 'L');
		$pdf->Ln();
		$pdf->Cell(30, 5, '', 'L', 0, 'R');
		$pdf->Cell(100, 5, '- Kami tidak bertanggung jawab atas ketersediaan/kondisi barang jika barang tidak', 'R', 0, 'L');
		$pdf->Ln();
		$pdf->Cell(30, 5, '', 'L,B', 0, 'R');
		$pdf->Cell(100, 5, ' diambil dalam jangka waktu 30 hari', 'R,B', 0, 'L');
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Cell(130, 5, "Terimakasih telah berbelanja dengan kami", 0, 0, 'C');

		$pdf->Output();
	//redirect(base_url().'penjualan');
	//$this->index();
}


public function cetak()
{
    $tglawal=$this->session->userdata('awal');
	$tglakhir=$this->session->userdata('akir');

	$data=$this->model_penjualan->laporan_penjualan_pertgl($tglawal,$tglakhir);
	$tglawal=$this->mylibrary->format_tanggal($tglawal);
	$tglakhir=$this->mylibrary->format_tanggal($tglakhir);
	if(count($data)==0) {
		$this->session->set_userdata('pesan','Belum ada data');
		redirect(base_url().'penjualan/lp');
		exit;
	}

	$this->load->library('fpdf');		
		$pdf = new FPDF('P','mm','A5');
		$pdf->AddPage();
		$pdf->SetFont('Arial','',9);
		$title = 'Laporan Data Penjualan Pertanggal';
		$pdf->SetTitle($title);
		$pdf->SetAuthor('Faqih');
		
		
		$pdf->Ln();
		$pdf->Cell(40, 4, 'Rumahku.com', 0, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(40, 4, 'Jln. Pinangsia Raya No.42, RT.6/RW.5.', 0, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(40, 4, 'Kec.Taman Sari,Kota Jakarta Barat', 0, 0, 'L');
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Cell(40, 4, 'Laporan Data Penjualan', 0, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(20, 4, 'Tanggal', 0, 0, 'L');
		$pdf->Cell(85, 4, ' : '.$tglawal.' Sampai '.$tglakhir, 0, 0, 'L');
		$pdf->Ln();
		
		//$pdf->Cell(130, 5, '--------------------------------------------------------------------------------------------------------------------------', 0, 0, 'L');
		$pdf->Ln();
		
		$pdf->Cell(20, 5, 'Tanggal', 1, 0, 'L');
		$pdf->Cell(25, 5, 'Kode Barang', 1, 0, 'L');
		$pdf->Cell(40, 5, 'Nama barang', 1, 0, 'R');
		$pdf->Cell(16, 5, 'Harga', 1, 0, 'R');
		$pdf->Cell(10, 5, 'Qty', 1, 0, 'R');
		$pdf->Cell(25, 5, 'Total', 1, 0, 'R');
		//$pdf->Ln();
		//$pdf->Cell(130, 5, '--------------------------------------------------------------------------------------------------------------------------', 0, 0, 'L');
		
		//$pdf->Cell(131, 5, '----------------------------------', 0, 0, 'R');
		    $n=0;$ttotal=0;$tqty=0;
			foreach ($data as $row)  {
					$n++;$ttotal=$ttotal+$row->total;
      					$tqty=$tqty+$row->jumlah_beli;
      				
			$pdf->Ln();
     		$pdf->Cell(20, 5, $row->tanggal, 1, 0, 'L');
			$pdf->Cell(25, 5, $row->kode_barang, 1, 0, 'L');
			$pdf->Cell(40, 5, $row->nama_barang, 1, 0, 'L');
			$pdf->Cell(16, 5, number_format($row->harga_satuan,0), 1, 0, 'R');
			$pdf->Cell(10, 5, $row->jumlah_beli, 1, 0, 'R');
			$pdf->Cell(25, 5, number_format($row->total,0), 1,0,'R');
		}
		//$pdf->Ln();
		//$pdf->Cell(130, 5, '--------------------------------------------------------------------------------------------------------------------------', 0, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(101, 5, 'Total', 1, 0, 'R');

		$pdf->Cell(10, 5, number_format($tqty,0), 1,0,'R');
		$pdf->Cell(25, 5, number_format($ttotal,0), 1,0,'R');
		$pdf->Ln();
		//$pdf->Cell(131, 5, '----------------------------------', 0, 0, 'R');
		$pdf->Ln();
		
		$pdf->Cell(130, 5, "", 0, 0, 'C');

		$pdf->Output();
	//redirect(base_url().'penjualan');
	//$this->index();.
}



public function cetakbarang()
{
    $tglawal=$this->session->userdata('awal');
	$tglakhir=$this->session->userdata('akir');
    $kode_barang=$this->session->userdata('barang');
	$data=$this->model_penjualan->laporan_penjualan_perbrg($tglawal,$tglakhir,$kode_barang);
	$tglawal=$this->mylibrary->format_tanggal($tglawal);
	$tglakhir=$this->mylibrary->format_tanggal($tglakhir);
	if(count($data)==0) {
		$this->session->set_userdata('pesan','Belum ada data');
		redirect(base_url().'penjualan/lpbr');
		exit;
	}

	$this->load->library('fpdf');		
		$pdf = new FPDF('P','mm','A5');
		$pdf->AddPage();
		$pdf->SetFont('Arial','',9);
		$title = 'Laporan Penjualan Per Namabarang';
		$pdf->SetTitle($title);
		$pdf->SetAuthor('Faqih');
	
		$pdf->Cell(40, 4, 'Rumahku.com', 0, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(40, 4, 'Jln. Pinangsia Raya No.42, RT.6/RW.5.', 0, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(40, 4, 'Kec.Taman Sari,Kota Jakarta Barat', 0, 0, 'L');
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Cell(40, 4, 'Laporan Penjualan Data', 0, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(20, 4, 'Tanggal', 0, 0, 'L');
		$pdf->Cell(85, 4, ' : '.$tglawal.' Sampai '.$tglakhir, 0, 0, 'L');
		$pdf->Ln();
		//$pdf->Cell(130, 5, '--------------------------------------------------------------------------------------------------------------------------', 0, 0, 'L');
		$pdf->Ln();
		
		$pdf->Cell(20, 5, 'Tanggal', 1, 0, 'L');
		$pdf->Cell(25, 5, 'Kode Barang', 1, 0, 'L');
		$pdf->Cell(40, 5, 'Nama barang', 1, 0, 'R');
		$pdf->Cell(16, 5, 'Harga', 1, 0, 'R');
		$pdf->Cell(10, 5, 'Qty', 1, 0, 'R');
		$pdf->Cell(25, 5, 'Total', 1, 0, 'R');
		//$pdf->Ln();
		//$pdf->Cell(130, 5, '--------------------------------------------------------------------------------------------------------------------------', 0, 0, 'L');
		
		//$pdf->Cell(131, 5, '----------------------------------', 0, 0, 'R');
		    $n=0;$ttotal=0;$tqty=0;
			foreach ($data as $row)  {
					$n++;$ttotal=$ttotal+$row->total;
      					$tqty=$tqty+$row->jumlah_beli;
      				
					
			$pdf->Ln();
     		$pdf->Cell(20, 5, $row->tanggal, 1, 0, 'L');
			$pdf->Cell(25, 5, $row->kode_barang, 1, 0, 'L');
			$pdf->Cell(40, 5, $row->nama_barang, 1, 0, 'L');
			$pdf->Cell(16, 5, number_format($row->harga_satuan,0), 1, 0, 'R');
			$pdf->Cell(10, 5, $row->jumlah_beli, 1, 0, 'R');
			$pdf->Cell(25, 5, number_format($row->total,0), 1,0,'R');
		}
		//$pdf->Ln();
		//$pdf->Cell(130, 5, '--------------------------------------------------------------------------------------------------------------------------', 0, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(101, 5, 'Total', 1, 0, 'R');

		$pdf->Cell(10, 5, number_format($tqty,0), 1,0,'R');
		$pdf->Cell(25, 5, number_format($ttotal,0), 1,0,'R');
		$pdf->Ln();
		//$pdf->Cell(131, 5, '----------------------------------', 0, 0, 'R');
		$pdf->Ln();
		
		$pdf->Cell(130, 5, "", 0, 0, 'C');

		$pdf->Output();
	//redirect(base_url().'penjualan');
	//$this->index();.
}
function lpbr(){
		$combokdbarang=$this->model_penjualan->combokdbarang();
		$barang=array('barang'=>$combokdbarang);
	$this->session->set_userdata("muncul",FALSE);
    $this->load->view('penjualan/laporanbarang',$barang);
}
function lp(){
	
    
	$this->session->set_userdata("muncul",FALSE);
    $this->load->view('penjualan/laporan');
}

public function preview_laporan_perbrg()
{
	$this->session->set_userdata("muncul",TRUE);
	$tglawal=$this->input->post('tglawal');
	$tglakhir=$this->input->post('tglakhir');
	$kode_barang=$this->input->post('barang');

	$this->session->set_userdata("awal",$tglawal);
    $this->session->set_userdata("akir",$tglakhir);
	$this->session->set_userdata("barang",$kode_barang);


	$a=$this->model_penjualan->laporan_penjualan_perbrg($tglawal,$tglakhir,$kode_barang);
	$tglawal=$this->mylibrary->format_tanggal($tglawal);
	$tglakhir=$this->mylibrary->format_tanggal($tglakhir);

	$combokdbarang=$this->model_penjualan->combokdbarang();
	$data=array('laporan'=>$a,'tglawal'=>$tglawal,'tglakhir'=>$tglakhir,'barang'=>$combokdbarang);
	$this->load->view('penjualan/laporanbarang',$data);
}
public function preview_laporan()

{
	$tglawal=$this->input->post('tglawal');
	$tglakhir=$this->input->post('tglakhir');
	$this->session->set_userdata("awal",$tglawal);
    $this->session->set_userdata("akir",$tglakhir);
	$this->session->set_userdata("muncul",TRUE);

	$a=$this->model_penjualan->laporan_penjualan_pertgl($tglawal,$tglakhir);
	$tglawal=$this->mylibrary->format_tanggal($tglawal);

	$tglakhir=$this->mylibrary->format_tanggal($tglakhir);
	$data=array('laporan'=>$a,'tglawal'=>$tglawal,'tglakhir'=>$tglakhir);
	$this->load->view('penjualan/laporan',$data);
}

}
?>