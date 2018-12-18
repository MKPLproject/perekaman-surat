<!-- login view -->
<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login | Surat Tugas FEB</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/main.css">

	<!-- ui kit-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/uikit.min.css" />
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/notyf.min.css" />
<script src="<?php echo base_url(); ?>/assets/js/uikit.min.js" ></script>
<script src="<?php echo base_url(); ?>/assets/js/uikit-icons.min.js" ></script>
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>/assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url(); ?>/assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<h2 class="logo text-center">SURAT TUGAS FEB</h2>
								<p class="lead">Login to your account</p>
							</div>
							
							<?php
								$notif = $this->session->flashdata('notif');
								if($notif != NULL){
									echo '
										<div class="alert alert-danger">'.$notif.'</div>
									';
								}
							?>
							<form class="form-auth-small" action="<?php echo base_url().'auth/cek_login'; ?>" method="post">
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Username</label>
									<input type="text" class="form-control" id="username" name="username" placeholder="Username">
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input type="password" class="form-control" id="password" name="password" placeholder="Password">
								</div>
								<div class="form-group clearfix">
									<label class="fancy-checkbox element-left">
										<input type="checkbox">
										<span>Remember me</span>
									</label>
								</div>
								<input type="submit" class="btn btn-primary btn-lg btn-block" value="LOGIN">
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">PEMETAAN SURAT TUGAS</h1>
							<p>by mas mas e</p>
							<div id="testing">
							
							<p>---TESTING---</p>
							<p>ADMIN : username="admin" || pass="admin"</p>
							<p>======================</p>
							<p>TATA USAHA</p>
							<p>Kepala Bagian : username="196209141981031001" pass="031001"</p>			
							<p>Kasubag Administrasi Umum dan Perlengkapan : username="196402151989031001" pass="031001"</p>			
							<p>Kasubag Akademik : username="197501242005022003" pass="022003"</p>				
							<p>Kasubag Keuangan dan Kepegawaian : username="197102142005011001" pass="011001"</p>				
							<p>Kasubag  Pengelola Sistem Informasi, Infrastruktur, dan Kehumasan : username="197303252006041004" pass="041004"</p>
							<p>Kasubag Kemahasiswaan dan Alumni  : username="196101251981031001" pass="031001"</p><br>
							<p>==========</p><br>
							<p>KAUR</p>
							<p>kaur Administrasi Umum dan Perlengkapan : username="196207242006041001" pass="041001"</p>			
							<p>kaur Akademik | Perkuliahan: username="196004122006041001" pass="041001"</p>				
							<p>kaur Keuangan dan Kepegawaian : username="196310172000032001" pass="032001"</p>				
							<p>kaur  Pengelola Sistem Informasi, Infrastruktur, dan Kehumasan : username="2012058806281001" pass="281001"</p>
							<p>==========</p><br>
							<p>STAFF</p>
							<p>Staff Administrasi Umum dan Perlengkapan : username="196205062006041001" pass="041001"</p>
							<p>=================</p>
							<p>pegawai NON AKTIF</p>
							<P>username = 196004122006041001  pass="041001"</P>
							</div>
						
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
