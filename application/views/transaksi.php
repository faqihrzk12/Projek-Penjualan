<?php
if (isset($this->session->akses)==FALSE) {
	redirect(base_url());
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="icon" type="image/png" href="../images/logo1.jpg">
<title>Rumahku.com</title>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url('bootstrap-3-3-7/css/bootstrap.min.css')?>">
<link href='<?php echo base_url('images/pos.png');?>' type='image/x-icon' rel='shortcut icon'>
<script src="<?php echo base_url('bootstrap-3-3-7/js/jquery-3.1.1.min.js')?>"></script>
<script src="<?php echo base_url('bootstrap-3-3-7/js/bootstrap.min.js')?>"></script>
</head>
<body>
<style type="text/css">
body {
	background: #f1f1f1;
}

.footer {
	margin-bottom: 22px;
}
.panel-primary .form-group {
	margin-bottom: 10px;
}
.form-control {
	border-radius: 0px;
	box-shadow: none;
}
.error_validasi { margin-top: 0px; }
</style>
<?php
if (isset($this->session->pesan)) {
	$message_display=$this->session->pesan;
	$this->session->unset_userdata('pesan');
}
$this->load->view('admin/nav_kasir');
$nomor=0;$total=0;
?>
<div class="container-fluid" >
	<!-- informasi Nota-->
	<form  action="<?php echo base_url('penjualan/simpandulu')?>" method="POST" name="formbook" enctype="multipart/form-data">
	<div class="panel panel-default">
		<div class="panel-body">
			<div class='row'>
				<div class='col-sm-3'>
					<div class="panel panel-primary">
						<div class="panel-heading"><i class="glyphicon glyphicon-cog"></i> Informasi Nota</div>
						<div class="panel-body">
							<div class="form-horizontal">
								<div class="form-group">
									<label class="col-sm-4 control-label">No. Nota</label>
									<div class="col-sm-8">
										<input type='text' name='nomor_nota' class='form-control input-sm' id='nomor_nota' value="<?php echo $this->session->nota;?>" readonly>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Tanggal</label>
									<div class="col-sm-8">
										<input type='date' name='tanggal' class='form-control input-sm' id='tanggal' value="<?php echo $this->session->tanggal?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Kasir Id</label>
									<div class="col-sm-8">
										<input type='text' name='kasirid' class='form-control input-sm' id='kasirid' value="<?php echo $this->session->userdata('ses_id');?>" readonly>
									</div>
								</div>
							</div>	
					    </div> <!--batas panel body-->
				    </div> <!--panel body primary-->
				    <div class="panel panel-primary">
						<div class="panel-heading"><i class="glyphicon glyphicon-user"></i> Informasi Pembeli</div>
						<div class="panel-body">
							<div class="form-horizontal">
								<div class="form-group">
									<label class="col-sm-4 control-label">Pembeli</label>
									<div class="col-sm-8">
									<select name='id_pelanggan' id='id_pelanggan' class='form-control input-sm' style='cursor: pointer;'>
									<option value=''>-- Umum --</option>
									<?php
									if($cmbpelanggan->num_rows() > 0)
									{
										foreach($cmbpelanggan->result() as $p)
										{
											if ($this->session->id_pelanggan==$p->id_pelanggan) { $x="selected";} else {$x="";};
											echo "<option value='".$p->id_pelanggan."' ".$x." >".$p->nama_pelanggan."</option>";
										}
									}
									?>
								    </select>
										
												<?php
										//$p=$this->session->userdata['statusform']['id_pelanggan'];	
										//$js = 'class="form-control input-sm" id="id_pelanggan" placeholder="tesssss"';
				           				//echo form_dropdown('id_pelanggan', $cmbpelanggan, $p,$js);
					                	?>									
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-4" style="text-align: right" >Alamat</div>
									<div class="col-sm-8">
										<div id='alamat'><?php echo $this->session->alamat?></div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-4" style="text-align: right" >Telepon</div>
									<div class="col-sm-8">
										<div id='telepon'><?php echo $this->session->telepon?></div>
									</div>
										
								</div>
							</div>	
					    </div> <!--batas panel body-->
				    </div> <!--panel body primary-->
				    <?php if (isset($message_display)) { ?>
								 <div class="alert alert-danger" role="alert" >
									<button type="button" class="close" data-dismiss="alert"><i class="glyphicon glyphicon-remove"></i></button>
									<h4><B>Pesan :</B></h4> 
									<?php echo $message_display;?>
								</div>
						 	<?php }?>
			    </div> <!--batas col-sm3 -->

			    <div class='col-sm-9'>
					<h5>
						<i class='glyphicon glyphicon-shopping-cart'></i> Penjualan > Transaksi
					</h5>
					
					<table class='table table-bordered' id='TabelTransaksi'>
						<thead>
							<tr class="info">
								<th style='width:35px;'>No</th>
								<th style='width:210px;'>Kode Barang</th>
								<th>Nama Barang</th>
								<th style='width:120px;text-align: right;'>Harga Satuan</th>
								<th style='width:75px;'>Qty</th>
								<th style='width:125px;text-align: right;'>Sub Total</th>
								<th style='width:40px;'></th>
							</tr>
						</thead>
						<?php
							//----tampilkan data detil yang sebelumnya
						    if (count($datadetil)>0) {
							$nomor=0;
							foreach ($datadetil as $row) {
								$nomor++; $total=$total+$row->total;
						?>
						<tbody>
							<tr>
								<td><?php echo $nomor?>
									<input type='hidden' name="id_detil" value="<?php echo $row->id_detil;?>">
								</td>
								<td><?php echo $row->kode_barang;?></td>
								<td><?php echo $row->nama_barang;?></td>
								<td style="text-align: right;"><span><?php echo number_format($row->harga_satuan,0);?></span></td>
								<td><span><?php echo $row->jumlah_beli;?></span></td>
								<td style="text-align:right">
									<input type='hidden' name="subtotal" value="<?php echo $row->total;?>">	
									<span><?php echo number_format($row->total,0);?></span>
								</td>
								<td >
									<a href="javascript:;" data-id="<?php echo $row->id_detil?>" data-toggle="modal"  data-target="#modal-konfirmasi" class="btn btn-danger btn-xs" title="Hapus"><i class="glyphicon glyphicon-trash"></i></a>
								</td>
							</tr>
						</tbody>	
						<?php }

							}
							$nomor++;
						?>
						<!--untuk input penjualan-->
						<tbody>
							<tr>
								<td ><?php echo $nomor?></td>
								<td >
									<select name='kode_barang' id='kode_barang' class='form-control input-sm' style='cursor: pointer;'>
									<option value=''>-- Pilih Kode Barang--</option>
									<?php
									if($cmbkodebrg->num_rows() > 0)
									{
										foreach($cmbkodebrg->result() as $p)
										{
											echo "<option value='".$p->kode_barang."'>".$p->kode_barang."</option>";
										}
									}
									?>

								</td>
								<td>
									<div id='nama_barang'></div>

								</td>
								<td style="text-align: right;">
									<input type='hidden' name="harga_barang">
									<span></span>
								</td>
								<td>
									<input type='text' name='jumlah_beli' class='form-control input-sm' id='jumlah_beli' onkeypress='return check_int(event)'>
								</td>
								<td style="text-align:right">
									<input type='hidden' name="subtotal">
									<span></span>
								</td>
								<td >
									<button type="submit" class="btn btn-default btn-xs" title="Tambah" ><span class="glyphicon glyphicon-plus"></span></button>
								</td>
							
						</tbody>
					</table>

					<div class='alert alert-info' style="text-align: right">
					<div class=" pull-left">	
						<button type='button' class='btn btn-primary' id='batal'><span class="glyphicon glyphicon-remove"></span> Transaksi Batal</button>	

						<button type='button' class='btn btn-primary' id='baru'><span class="glyphicon glyphicon-edit"></span> Transaksi Baru</button>
					    
					    <button type='button' class='btn btn-primary' id='cetak'><span class="glyphicon glyphicon-print"></span> Cetak Transaksi</button>	
					</div>	
						<h2 style="margin-top: 0px;margin-bottom: 0px">Total : <span id='TotalBayar'>Rp. <?php echo number_format($total,0);?></span></h2>
						<input type="hidden" id='TotalBayarHidden' name="totalbayar" value="<?php echo $total;?>" >
					
					</div>
					<div class='row'>
						<div class='col-sm-7'>
							<textarea name='catatan' id='catatan' class='form-control' rows='2' placeholder="Catatan Transaksi (Jika Ada)" style='resize: vertical; width:83%;'></textarea>
							<br />
							 
						</div>
						<div class='col-sm-5'>
							<div class="form-horizontal">
								<div class="form-group">
									<label class="col-sm-6 control-label">Bayar</label>
									<div class="col-sm-6">
										<input type='text' name='cash' id='UangCash' class='form-control' onkeypress='return check_int(event)'>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-6 control-label">Kembali</label>
									<div class="col-sm-6">
										<input type='text' id='UangKembali' class='form-control' disabled>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-6 control-label"></label>
									<div class="col-sm-6">
									<button type='submit' class='btn btn-primary' title="Simpan"><span class="glyphicon glyphicon-log-in"></span> Bayar </button>
								</div>

							</div>
								<div class='row'>
								
								</div>
							</div>
						</div>
					</div>

					<br />
				</div>
		    </div> <!--bataas row-->
	    </div>
	</div>
	<!--batas akhir onformasi nota-->
	<!-- informasi Pelanggan-->
	<!--batas akhir informasi pelanggan-->
</form>
</div> <!--container-->							

</body>
</html>
<script>

$(document).ready(function(){
	
	$('#id_pelanggan').change(function(){
		if($(this).val() !== '')
	    {
			$.ajax({
				url: "<?php echo base_url('penjualan/ajax_pelanggan'); ?>",
				type: "POST",
				data: "id_pelanggan="+$(this).val(),
				dataType:'json',
				success: function(json){
					$('#alamat').html(json.alamat);
					$('#telepon').html(json.telepon);
				}
			});
		}
		else
		{
			$('#alamat').html('<i>Tidak Ada</i>');
			$('#telepon').html('<i>Tidak Ada</i>');			
		}	
	});


	$('#kode_barang').change(function(){
	  if($(this).val() !== '')
	  {
	    var Indexnya = $(this).parent().parent().index();	
	    	$.ajax({
				url: "<?php echo base_url('penjualan/ajax_kodebarang'); ?>",
				type: "POST",
				data: "kode_barang="+$(this).val(),
				dataType:'json',
				success: function(json){
					$('#nama_barang').html(json.nama_barang);
					$('#harga_barang').html(json.harga_barang);
					Indexnya=json.jumlah_item;
					
					$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(4) input').val(json.harga_barang);
					$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(4) span').html(to_rupiah(json.harga_barang));
					$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(5) input').val(1);
					$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(6) input').val(json.harga_barang);
					$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(6) span').html(to_rupiah(json.harga_barang));			

					$('#TabelTransaksi tbody tr').each(function(){
						$(this).find('td:nth-child(5) input').focus();
					});

					HitungTotalBayar();
				}
			});
		}
		});


//batas document	
})	

// modal untuk transaksi baru
$('#baru').click(function(){
//	$('.modal-dialog').removeClass('modal-lg');
//	$('.modal-dialog').add('modal-sm');
	$('#ModalHeader').html('Konfirmasi');
	$('#ModalContent').html("Apakah yakin akan membuat transaksi baru ?");
	$('#ModalFooter').html("<button type='button' id='TransaksiBaru' class='btn btn-primary'>Ya, saya yakin</button><button type='button' class='btn btn-default' data-dismiss='modal' autofocus>Batal</button>");
	$('#ModalGue').modal('show');
});
// kode untuk aksi dai transaksi baru
$(document).on('click','#TransaksiBaru',function(){
		$('#ModalGue').modal('hide');
		window.open("<?php echo base_url('penjualan/transaksibaru')?>",'_self');
});

// modal batalkan transaksi 
$('#batal').click(function(){
//	$('.modal-dialog').removeClass('modal-lg');
	$('.modal-dialog').add('modal-sm');
	$('#ModalHeader').html('Konfirmasi');
	$('#ModalContent').html("Apakah yakin akan dibatalkan ?");
	$('#ModalFooter').html("<button type='button' id='TransaksiBatal' class='btn btn-primary'>Ya, saya yakin</button><button type='button' class='btn btn-default' data-dismiss='modal' >Batal</button>");
	$('#ModalGue').modal('show');
});

// kode untuk aksi dai transaksi baru
$(document).on('click','#TransaksiBatal',function(){
		$('#ModalGue').modal('hide');
		window.open("<?php echo base_url('penjualan/transaksibatal')?>",'_self');
});

// modal cetak transaksi 
$('#cetak').click(function(){
	
if($('#TotalBayarHidden').val() >0) {
	$('#ModalHeader').html('Konfirmasi');
	$('#ModalContent').html("Apakah yakin data akan dicetak ?");
	$('#ModalFooter').html("<button type='button' id='CetakTransaksi' class='btn btn-primary'>Ya, saya yakin</button><button type='button' class='btn btn-default' data-dismiss='modal'>Batal</button>");
	$('#ModalGue').modal('show');
} else {
	$('#ModalHeader').html('Konfirmasi');
	$('#ModalContent').html("Belum ada transaksi");
	$('#ModalFooter').html("<button type='button' class='btn btn-default' data-dismiss='modal'>Batal</button>");
	$('#ModalGue').modal('show');
};
});


$(document).ready(function(){
 
$('#modal-konfirmasi').on('show.bs.modal', function (event) {
var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
 
// Untuk mengambil nilai dari data-id="" yang telah kita tempatkan pada link hapus
var id = div.data('id')
 
var modal = $(this)
// Mengisi atribut href pada tombol ya yang kita berikan id hapus-true pada modal .
modal.find('#hapus-true-data').attr("href","penjualan/delete_detil/"+id);
})
 
});


// kode untuk aksi dari cetak transaksi 
$(document).on('click','#CetakTransaksi',function(){
		$('#ModalGue').modal('hide');
		window.open("<?php echo base_url('penjualan/cetak_transaksi')?>",'_blank');
});

// kode untuk aksi dari transaksi baru
$(document).on('click','#hapus_detil',function(){
		$('#ModalGue').modal('hide');
		window.open("<?php echo base_url('penjualan/transaksibatal')?>",'_self');
});


$(document).on('keyup', '#jumlah_beli', function(){
	//var Indexnya = $(this).parent().parent().index();
	var Indexnya = $('#TabelTransaksi tbody tr').length-1;
	var Harga = $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(4) input').val();
	var JumlahBeli = $(this).val();
	if (JumlahBeli=='') {JumlahBeli=0};
	
	var Subtotal= parseInt(Harga) * parseInt(JumlahBeli);
	$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(6) input').val(Subtotal);
	$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(6) span').html(to_rupiah(Subtotal));

	HitungTotalBayar();
		
});

$(document).on('keyup', '#UangCash', function(){
	HitungTotalKembalian();
});


function HitungTotalBayar()
{
	var Total = 0;
	$('#TabelTransaksi tbody tr').each(function(){
		if($(this).find('td:nth-child(6) input').val() > 0)
		{
			var SubTotal = $(this).find('td:nth-child(6) input').val();
			Total = parseInt(Total) + parseInt(SubTotal);
		}
	});

	$('#TotalBayar').html('Rp. '+to_rupiah(Total));
	$('#TotalBayarHidden').val(Total);

	$('#UangCash').val('');
	$('#UangKembali').val('');
}


function HitungTotalKembalian()
{
	var Cash = $('#UangCash').val();
	var TotalBayar = $('#TotalBayarHidden').val();

	if(parseInt(Cash) >= parseInt(TotalBayar)){
		var Selisih = parseInt(Cash) - parseInt(TotalBayar);
		$('#UangKembali').val(to_rupiah(Selisih));
	} else {
		$('#UangKembali').val('');
	}
}

function to_rupiah(angka){
    var rev     = parseInt(angka, 0).toString().split('').reverse().join('');
    var rev2    = '';
    for(var i = 0; i < rev.length; i++){
        rev2  += rev[i];
        if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
            rev2 += '.';
        }
    }
    return rev2.split('').reverse().join('');
}

function check_int(evt) {
	var charCode = ( evt.which ) ? evt.which : event.keyCode;
	return ( charCode >= 48 && charCode <= 57 || charCode == 8 );
}

</script>

		<div class="modal" id="ModalGue" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class='glyphicon glyphicon-remove'></i></button>
						<h4 class="modal-title" id="ModalHeader"></h4>
					</div>
					<div class="modal-body btn-danger" id="ModalContent"></div>
					<div class="modal-footer" id="ModalFooter"></div>
				</div>
			</div>
		</div>


<!-- modal konfirmasi class="modal fade"-->
		<div id="modal-konfirmasi" class="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				 
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Konfirmasi</h4>
				</div>
				<div class="modal-body btn-info">
					Apakah Anda yakin ingin menghapus data ini ?
				</div>
				<div class="modal-footer">
					<a href="javascript:;" class="btn btn-danger" id="hapus-true-data">Hapus</a>
					<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
				</div>
				 
				</div>
			</div>
		</div>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});

 
</script>
<!--		
		<script>
		$('#ModalGue').on('hide.bs.modal', function () {
		   setTimeout(function(){ 
		   		$('#ModalHeader, #ModalContent, #ModalFooter').html('');
		   }, 500);
		});
</script>
-->