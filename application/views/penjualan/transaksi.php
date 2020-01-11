<!DOCTYPE html>
<html>
<head>
	<title>penjualan</title>


<meta http-equiv="Content-Language" content="en-us">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('bootstrap-3-3-7/css/bootstrap.css')?>">
<link rel="stylesheet" href="<?php echo base_url('bootstrap-3-3-7/css/bootstrap.min.css')?>">
<script src="<?php echo base_url('bootstrap-3-3-7/js/jquery-3.1.1.min.js')?>"></script>
<script src="<?php echo base_url('bootstrap-3-3-7/js/bootstrap.min.js')?>"></script>
a
<style type="text/css">
	body{background:#f1f1f1;}
    .panel-primary .form-group{margin-bottom: 5px;}
    .form-control{border-radius: 0px;box-shadow: none;}
</style>
<script type="text/javascript">
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
</script>



<script type="text/javascript">

$(document).ready(function(){
	$('#id_pelanggan').change(function(){
		if($(this).val() !=='')
		{
			$.ajax({
				url:"<?php echo base_url('penjualan/ajax_penjualan')?>",
				type:"POST",
				data:"id_pelanggan="+$(this).val(),
				dataType:'json',
				success: function(json){
					$('#alamat').html(json.alamat);
					$('#telpon').html(json.telpon);
				}
			});
		}else{
			$('#alamat').html('<i>tidak ada data</i>');
			$('#telpon').html('<i>tidak ada data</i>');
		}
	});
})
</script>


<script type="text/javascript">
$(document).ready(function(){
	$('#id_barang').change(function(){

		if($(this).val() !=='')

		{
	    var Indexnya = $(this).parent().parent().index();	
			$.ajax({
				url:"<?php echo base_url('penjualan/ajax_barang');?>",
				type:"POST",
				data:"id_barang="+$(this).val(),
				dataType:'json',
				success: function(json){
					$('#nama_barang').html(json.nama_barang);
					$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(4) input').val(json.harga);
					$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(4) span').html(to_rupiah(json.harga));
					$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(5) input').val(1);
					$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(6) input').val(json.harga);
					$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(6) span').html(to_rupiah(json.harga));

						$('#TabelTransaksi tbody tr').each(function(){
						$(this).find('td:nth-child(5) input').focus();
						});
				}
			});
		}else{
			$('#nama_barang').html('<i>tidak ada data</i>');
			$('#harga').html('<i>tidak ada data</i>');
			
		}
	});
})



function check_int(evt) {
	var charCode = ( evt.which ) ? evt.which : event.keyCode;
	return ( charCode >= 48 && charCode <= 57 || charCode == 8 );
}



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

</script>
</head>

<body>
<?php $this->load->view('admin/nav_kasir') ;

$nomor=0;

if (isset($this->session->pesan)) {
	$message_display=$this->session->pesan;
	$this->session->unset_userdata('pesan');
}
?>
	


	<div class='container-fluid' >

			<form  action="<?php echo base_url('penjualan/simpandulu')?>" method="POST" name="formbook" enctype="multipart/form-data">

      <div class='panel panel-default'>
      	 <div class="panel-body">


      	<div class="col-sm-3"><!--kolom 1 -->

          <div class="panel panel-primary"><!--panel 1 -->
          	 <div class='panel-heading'> <span class="glyphicon glyphicon-print"></span> informasi nota</div>
          	 	<div class="panel-body">
          	 				
          	 					
					<div class="form-horizontal">
								<div class="form-group">
										<label class="col-sm-4 control-label" >nota</label>
										<div class="col-sm-8">
										<input type="text" name="nota" class="form-control" 	placeholder="nota" readonly id="nomor_nota" value="<?php  echo $this->session->nota ?>">
									</div>
								</div>

									<div class="form-group">
										<label class="col-sm-4 control-label" >tanggal</label>
										<div class="col-sm-8">
										<input type="date" name="tanggal" class="form-control input-sm" 	placeholder="nota" value="<?php echo date('Y-m-d') ?>" readonly >
									</div>
								</div>


									<div class="form-group">
										<label class="col-sm-4 control-label" >kasir</label>
										<div class="col-sm-8">
										<input type="text" name="kasir" class="form-control" 	placeholder="kasir" readonly="" value=<?php echo $this->session->userdata('ses_nama');?>>
									</div>
								</div>

							  </div>
       
          	 </div>
      	   
     	    </div>
          
           <div class="panel panel-primary"><!--panel 2 -->
          	 <div class='panel-heading'>  <span class="glyphicon glyphicon-user"></span>  informasi pelanggan	</div>
          	 	<div class="panel-body">
          								

					<div class="form-horizontal">
								<div class="form-group">
										<label class="col-sm-4 control-label" >pelanggan</label>
										<div class="col-sm-8" >
										<select class="form-control" id="id_pelanggan" name="pelanggan">
											<option value="">pelanggan</option>
											<?php
													foreach ($cmbpelanggan->result() as $row) {
														echo "<option value='".$row->id_pelanggan."'>".$row->nama_pelanggan."</option>";
													}

											?>
											
										</select>
									</div>
								</div>

									<div class="form-group" >
										<label class="col-sm-4 control-label" >alamat</label>
										<div class="col-sm-8" id="alamat" class="form-control">
									   
									</div>
								</div>


									<div class="form-group">
										<label class="col-sm-4 control-label" >Telpon</label>
										<div class="col-sm-8" id="telpon" class="form-control">
										
									</div>
								</div>
							</div>		
							   
       
          	 </div>
      	   
     	 </div>

     	</div>
     						<!--alert peringatan -->

 							<?php if (isset($message_display)) { ?>
								 <div class="alert alert-danger" role="alert" >
									<button type="button" class="close" data-dismiss="alert"><i class="glyphicon glyphicon-remove"></i></button>
									<h4><B>Pesan :</B></h4> 
									<?php echo $message_display;?>
								</div>
						 	<?php }?>
				
				<!--kolom 2 -->
      	<div class="col-sm-9">
      		<h5><i class="glyphicon glyphicon-shopping-cart"></i>penjualan > transaksi	</h5>
      			<table class="table table-bordered" id="TabelTransaksi">
      				<thead>
      					<tr class="info">
      						<th style="width:35px">#</th>
      						<th style="width:210px">kode barang</th>
      						<th>nama barang</th>
      						<th style="width: 120px;text-align: right;">harga satuan</th>
      						<th style="width: 75px">qty</th>
      						<th style="width: 125px;text-align: right;" >sub total</th>
      						<th style="width: 40px">aksi</th>
      						
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
      						<td><?php $nomor++;
      						echo $nomor; 
      						?></td>
      						<td>
      								<select class="form-control" id="id_barang" name="barang">
											<option value="">kode barang</option>
											<?php
													foreach ($cmbkodebrg->result() as $row) {
														echo "<option value='".$row->kode_barang."'>".$row->kode_barang."</option>";
													}

											?>
											
										</select>

      						</td>
      						<td>
      							
      							<div id="nama_barang"></div>
      						</td>
      						<td>
      							<input type="hidden" name="harga" id="hargahiden">
      							<span id="harga"></span>
      						</td>
      						<td>
      							
      							<input type="text" name="jumlah" id="jumlah_beli" class="form-control" onkeypress="return check_int(event)">
      						</td>
      						<td>
      							
      							<input type="hidden" name="subtotal" id="Subtotal">
      							<span id="Subtotal"></span>
      						</td>
      						<td>
      							
      							<button type="submit" class="btn btn-danger btn-xs" title="simpan"><span class='glyphicon glyphicon-save'></button>
      						</td>
      					</tr>
      				</tbody>
      			</table>
      			<div class="alert alert-info" style="text-align: right;">
      				  <div class='col-sm-2'>
      				  	<a class="btn btn-default btn-block" href="" role='button' data-toggle='tooltip' title="transaksi batal" onclick="return confirm('yakin akan membuat transaksi baru? ')"><span class="glyphicon glyphicon-plus"></span>New</a>
      				  	
      				  </div>
      				  	  <div class='col-sm-2'>
      				  	<a class="btn btn-default btn-block" href="" role='button' data-toggle='tooltip' title="transaksi batal" onclick="return confirm('yakin akan batalkan transaksi ? ')"><span class="glyphicon glyphicon-remove"></span>Cancel</a>
      				  	
      				  </div>
      				  	  <div class='col-sm-2'>
      				  	<a class="btn btn-default btn-block" href="" role='button' data-toggle='tooltip' title="transaksi batal" onclick="return confirm('yakin akan cetak transaksi ? ')"><span class="glyphicon glyphicon-print"></span>Print</a>
      				  	
      				  </div>
      				 <h2 style="margin-top: 0px;margin-bottom: 0px">total : <span id="TotalBayar">Rp.</span></h2>
      				 <input type="hidden" name="TotalBayar">
      			</div>

      			<div class="col-sm-7 row" > 
      				<textarea cols="60" rows="2" placeholder="catatan....." name="keterangan"></textarea>
      			</div>
      		
   
    			<div class="col-sm-5">
    								
					
								<div class="form-group">
										<label class="col-sm-4 control-label" >bayar</label>
										<div class="col-sm-8">
										<input type="text" name="UangCash" class="form-control" 	placeholder="bayar"  >
									</div>
								</div>

								<div class="form-group">
										<label class="col-sm-4 control-label" >kembali</label>
										<div class="col-sm-8">
										<input type="text" name="kembali" class="form-control" 	placeholder="kembali" readonly id="UangKembali" >
									</div>
								</div>
							
    			</div>
   
   
      	</div>
		
	 </div>
	</div>
	</form>
	</div>






</body>
</html>