<style type="text/css">
  
</style>

<div  class="container-fluid" style="margin-top:5pt;"> <!-- container fluid untuk full screen -->
<nav class="navbar navbar-inverse" >
  <div class="container-fluid" >
    <div class="navbar-header">
      <a class="navbar-brand" ><b><span class="glyphicon glyphicon-shopping-cart"></span> <font color="#FFFFFF">Rumahku.com</font></b></a>
    </div>
    <ul class="nav navbar-nav">
    <li  ><a href="<?php echo base_url('admin/index');?>"><span class="glyphicon glyphicon-home"></span> Home</a></li>
      
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
      <span class="glyphicon glyphicon-th-list"></span> Master <span class="caret"></span></a>
          <ul class="dropdown-menu">
               <li><a href="<?php echo base_url('admin/index'); ?>"><span class='glyphicon glyphicon-briefcase'> Barang </span></a></li>
                <li><a href="<?php echo base_url('admin/user'); ?>"><span class='glyphicon glyphicon-user'> Petugas </span></a></li>
               <li><a href="<?php echo base_url('admin/pelanggan'); ?>"><span class='glyphicon glyphicon-user'> Pembeli </span></a> </li> 
          </ul>
    </li>


    
      <li class="dropdown">
        <a href="<?php echo base_url('admin/lp');?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
      <span class="glyphicon glyphicon-th-list"></span> Laporan <span class="caret"></span></a>
          <ul class="dropdown-menu">
               <li><a href="<?php echo base_url('Penjualan/lp'); ?>"><span class="glyphicon glyphicon-refresh"> Data Transaksi Pertanggal</a></li>
                   <li><a href="<?php echo base_url('Penjualan/lpbr'); ?>"><span class="glyphicon glyphicon-refresh"> Data Transaksi Barang</a></li>
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
