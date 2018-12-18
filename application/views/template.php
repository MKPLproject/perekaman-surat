<!doctype html>
<html lang="en">

<head>
	<title>FEB</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/main.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/datatable.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>/assets/img/logo.jpg">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url(); ?>/assets/img/logo.png">

	<!-- Javascript -->

	<!-- datatable -->
	
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js "></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js "></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js  "></script>

<!-- ui kit-->
 <meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/uikit.min.css" />
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/notyf.min.css" />
<script src="<?php echo base_url(); ?>/assets/js/uikit.min.js" ></script>
<script src="<?php echo base_url(); ?>/assets/js/uikit-icons.min.js" ></script>

</head>

<body class="">
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
			<a href="<?php echo base_url() ?>" class="uk-logo">
				
			<img src="<?php echo base_url(); ?>/assets/img/feb.png" width="27px"> FEB UB
			</a>
			</div>
			<div class="container-fluid">
					<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				
				<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
						<?php
							if($this->session->userdata('Status') == 'admin'){?>
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="<?php echo base_url(); ?>/assets/img/feb.png" class="img-circle" alt="Avatar">
								<span>
								 	<?php echo $this->session->userdata('username'); ?></span> 
								 <i class="icon-submenu lnr lnr-chevron-down"></i>
							</a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo base_url('auth/profil/'.$this->session->userdata('username')); ?>"><i class="lnr lnr-user"></i> <span>Edit Password</span></a></li>
								<li><a href="<?php echo base_url('auth/logout'); ?>"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
							<?php 
							}else if($this->session->userdata('Status') == 'operator'){?>
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="<?php echo base_url(); ?>/assets/img/feb.png" class="img-circle" alt="Avatar">
								 <span>
								 	<?php echo $this->session->userdata('username'); ?>
								 <i class="icon-submenu lnr lnr-chevron-down"></i>
								 </span>
							</a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo base_url('auth/profil/'.$this->session->userdata('username')); ?>"><i class="lnr lnr-user"></i> <span>Edit Password</span></a></li>
								<li><a href="<?php echo base_url('auth/logout'); ?>"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
							<?php 
							}else{ ?>
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="<?php echo base_url(); ?>/assets/img/feb.png" class="img-circle" alt="Avatar">
								 <span>
								 	<?php echo $this->session->userdata('NIP'); ?></span> 
								 <i class="icon-submenu lnr lnr-chevron-down"></i>
							</a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo base_url('auth/pass/'.$this->session->userdata('NIP')); ?>"><i class="lnr lnr-user"></i> <span>Edit Password</span></a></li>
								<li><a href="<?php echo base_url('auth/logout'); ?>"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>	
							<?php 
							}?>
							
						</li>
					</ul>
				</div>
				</div>
				
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<?php
							if($this->session->userdata('Status') == 'admin'){  //admin
								include 'navbar/navbar_admin.php';
								?>
								<?php
							}else if($this->session->userdata('Status') == 'operator'){
								include 'navbar/navbar_operator.php';
								?>
								<?php
							
							}else {
								if($this->session->userdata('Bagian') == 'Tata Usaha'){  	//KTU
									if($this->session->userdata('Sub_Bagian') == 'null'){ 
										include 'navbar/navbar_tata_usaha_kbagian.php';?>
										<?php
									
									
									} if($this->session->userdata('Sub_Bagian') != 'null'){ //Kasubag
										if($this->session->userdata('Urusan') == 'null'){ 
											include 'navbar/navbar_tata_usaha_kasubag.php';?>
											<?php
										}
									
									} if($this->session->userdata('Sub_Bagian' )!= 'null') { //Kaur
										if($this->session->userdata('Urusan' )!= 'null'){
											if($this->session->userdata('jabatan')== 'kepala'){
											include 'navbar/navbar_tata_usaha_kaur.php';?>
											<?php
											}
										}
									} if($this->session->userdata('Sub_Bagian' )!= 'null') { //Kaur
										if($this->session->userdata('Urusan' )!= 'null'){
											if($this->session->userdata('jabatan')== 'staff'){
											include 'navbar/navbar_tata_usaha_staff.php';?>
											<?php
											}
										}
									}
								
								}else {?>
								
								
								<?php								
								}
							}
								
								?>
									
								
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
		<div id="main_page" class="">
<?php
				$this->load->view($main_view);
			?>
		</div>
			<!-- MAIN CONTENT -->
			
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		
	</div>
	<!-- END WRAPPER 
	<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
			</div>
		</footer>
	-->
	<script src="<?php echo base_url(); ?>/assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?php echo base_url(); ?>/assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="<?php echo base_url(); ?>/assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="<?php echo base_url(); ?>/assets/scripts/klorofil-common.js"></script>
</body>

</html>
