<style type="text/css">
  
</style>

<div  class="container-fluid" style="margin-top:5pt;"> <!-- container fluid untuk full screen -->
<nav class="navbar navbar-inverse" >
  <div class="container-fluid" >
    <div class="navbar-header">
      <a class="navbar-brand" ><b><span class="glyphicon glyphicon-shopping-cart"></span> <font color="#FFFFFF">Rumahku.com</font></b></a>
    </div>
    <ul class="nav navbar-nav">
    <li  ><a href="<?php echo base_url('Penjualan');?>"><span class="glyphicon glyphicon-home"></span> Transaksi</a></li>
      
    

    
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
      <span class="glyphicon glyphicon-user"></span> Laporan <span class="caret"></span></a>
          <ul class="dropdown-menu">
               <li><a href="<?php echo base_url('Penjualan/lp'); ?>"><span class="glyphicon glyphicon-refresh"> Datatransaksi</a></li>
                <li><a href="<?php echo base_url('Penjualan/lpbr'); ?>"><span class="glyphicon glyphicon-refresh"> Datatransaksi_barang</a></li>
          </ul>
    </li>
      
    </ul>
  
      <ul class="nav navbar-nav navbar-right">
       <li><p class="navbar-text navbar-left"><b><i> Welcome : <?php echo $this->session->userdata('ses_nama');?><font color="#FFFFFF"></font> </i></b></p></li>
        <li><a href="<?php echo base_url('sigin/logout')?>" role="button" ><span class="glyphicon glyphicon-log-in"></span> Logout </a></li>
    
      </ul>

  </div>
</nav>
</div>
