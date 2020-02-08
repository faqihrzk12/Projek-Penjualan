<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/png" href="../images/logo1.jpg">
	<title>Rumahku.com</title>

<meta http-equiv="Content-Language" content="en-us">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('bootstrap-3-3-7/css/bootstrap.css')?>">
<link rel="stylesheet" href="<?php echo base_url('bootstrap-3-3-7/css/bootstrap.min.css')?>">
<script src="<?php echo base_url('bootstrap-3-3-7/js/jquery-3.1.1.min.js')?>"></script>
<script src="<?php echo base_url('bootstrap-3-3-7/js/bootstrap.min.js')?>"></script>
<style type="text/css">
	
	.panel{background-color:grey;
			background:rgba(188,26,26,1);
			text-align: center;
			padding-top: 50px;
			margin-top: 100px; 
			border: 0px;
</style>


</head>
<!-- <body class="jumbotron jumbotron-fluid mb-3" background="../images/logo.jpg" > -->

			<!--kolom 1-->
	<div class="col-sm-4">
		</div>
				<!--kolom 2-->

	<div class="col-sm-4">
		<div class="panel panel-default">
		<div class="panel-body">
				<?php if (isset($pesan)) {?>

				<div class='alert alert-danger' role='alert'>
					<button type="button" class="close" data-dismiss='alert'>x</button>
					<h4>peringatan</h4>

					<?php echo $pesan;?>
				</div> 
				
				<?php } ?>

		
			<form class="form-vertical" action="<?php echo base_url('sigin/login')?> " method="post">
				<div class="row justify-content-center">
      				<div class="col-xl-10 col-lg-12 col-md-9">
        			<div class="card o-hidden border-0 shadow-lg my-5">
    			  <img class="card-img-top mx-auto" style="width:55%;" src="../images/logo1.jpg">
				<div class="form-group">
					<br>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input type="text" name="username"  class="form-control" id="user" placeholder="Username"/>
					</div>
				</div>
				

				<div class="form-group">
					<div class="input-group" >
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input type="password" name="password"  class="form-control" id="password" placeholder="Password">
					</div>
				</div>

				<button type="submit" class="btn btn-primary btn-lg btn-block"><span class="glyphicon glyphicon-log-in"> Login </span></button>
			</div>
		</div>
	</div>
			</form>
		</div>
		</div>
	</div>
				
				<!--kolom 3-

		<div class="col-sm-8">
				<!-- AWAL CAROUSEL-
   		<div id="myCarousel" claass="carousel slide" data-ride="carousel">
      <!-- Indicators -
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>

      </ol>
  
      <!-- Wrapper for slides 
      <div class="carousel-inner">
        <div class="item">
          <img src="<?php echo base_url().'images/1.jpg'?>" alt="Los Angeles" style="width:100%;">
        </div>
  
        <div class="item">
          <a href="">
          <img src="<?php echo base_url().'images/2.jpg'?>" alt="Chicago" style="width:100%;">
        </a>
        </div>
      
        <div class="item ">
          <img src="<?php echo base_url().'images/3.jpg'?>" alt="New york" style="width:100%;">
        </div>
        <div class="item active">
          <img src="<?php echo base_url().'images/5.jpg'?>" alt="New york" style="width:100%;">
        </div>
       
      </div>
  
      <!-- Left and right controls -
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
       </div>

	<!-- AKHIR CAROUSEL-->

		</div>
				<!--kolom 4-->

		
		</div>


	
</body>
</html>