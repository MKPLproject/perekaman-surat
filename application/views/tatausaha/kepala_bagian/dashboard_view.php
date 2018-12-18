<?php 
$bagian = $this->session->userdata('Bagian');
$sub_bagian = $this->session->userdata('Sub_Bagian');
$urusan = $this->session->userdata('Urusan');
$jabatan = $this->session->userdata('jabatan');
$nama = $this->session->userdata('Nama');
?>
		<!-- MAIN -->
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
						<div class="row">
						<div class="col-md-5">
							<h3 class="panel-title">Dashboard <?php echo $bagian ?></h3><hr>
							<p class=""><?php echo $nama ?></p>
						</div>
						<div class="col-md-6">	
							<p class="panel-subtitle">Kepala Bagian : <?php echo $sub_bagian?></p>
							<p class="panel-subtitle">Periode: <?php foreach($periode as $per){ echo $per['periode']; }?></p>
						</div>
						<div class="col-md-1">
							<div class="right">
								<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
								<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>									
							</div>
						</div>
					</div>
						</div>

						
						<div class="panel-body">
							<div class="row">
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-users"></i></span>
										<p>
											<span class="number"><?php foreach($pegawai as $a){ echo $a['countPegawai']; }?></span>
											<span class="title">Jumlah Pegawai <?php echo $bagian?></span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-envelope-open"></i></span>
										<p>
											<span class="number"><?php foreach($jumsuratpribadipertahun as $a){ echo $a['jumSuratPeribadiPertahun']; }?>
											</span>
											<span class="title">Jumlah Surat</span>
											<span class="title"></span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-eye"></i></span>
										<p>
											<span class="number">0</span>
											<span class="title">Nol</span>
											<span class="title"></span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-bar-chart"></i></span>
										<p>
											<span class="number">0</span>
											<span class="title">Nol</span>
											<span class="title"></span>
										</p>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-9">
								<center>
								<h3 class="panel-title"><span class="uk-label uk-label-danger">Grafik Pemetaan Surat Tugas - <?php echo $per['periode']?></span></h3>
								</center>
									
									<br>
									<div id="demo-line-chart" class="ct-chart"></div>
								</div>
								<div class="col-md-3">
								<div>
								<form class="uk-margin-large" id="myform" method="post" action="<?php echo site_url('kbagian/indeks');?>">
									<div class="uk-margin">
										<div class="uk-form-controls ">
											<div class="input-group">
																
											<select name="tahun"  class="uk-select" onchange="submitform();">
													<?php
													$mulai= date('Y');
													for($i = $mulai;$i>$mulai - 50;$i--){
													$sel = $i == date('Y') ? ' selected="selected"' : '';
													echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
													}
													?>
													
												</select>
												<span class="input-group-btn"><button type="submit"  class="uk-button uk-button-primary" uk-icon="search"></button></span>
											</div>
										</div>
										
									</div>

								</form>
								
								</div>
								<table id="surattugas" class="table table-striped">
									<thead>
										<tr>
											<th>Bulan</th>
											<th>Jumlah Surat</th>
										</tr>
									</thead>
									<tbody>
									<?php 
										$no = 1;
										foreach($pribadi as $u){ 
											$dt = DateTime::createFromFormat('!m', $u['bulan']);
											
										?>
									<tr>
										<td id="date"><?php echo $dt->format('M');?></td>
										<td><?php echo $u['jum_surat_pribadi'] ?></td>
										
									</tr>
									<?php } ?>
										
									</tbody>
								</table>
								</div>
							</div>
						</div>
					</div>
					<!-- END OVERVIEW -->
				<div class="row">
					
					<div class="col-md-6">
						<!-- MULTI CHARTS -->
						<div class="panel">
							<div class="panel-heading">
								<h3 class="panel-title"><span class="uk-label uk-label-success">Staff <?php echo $bagian?></span> dengan surat terbanyak</h3>
								<div class="right">
									<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
									<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
								</div>
							</div>
							<div class="panel-body">
							<table class="table table-striped">
									<thead>
										<tr>
											<th>No </th>
											<th>Nama</th>
											<th>NIP</th>
											<th>Jumlah Surat</th>
										</tr>
									</thead>
									<tbody>
									<?php 
										$no = 1;
										foreach($bgn as $u){ ?>
										<tr>
											<td><?php echo $no++ ?></td>
											<td><span class=""><?php echo $u['Nama'] ?></span></td>
											<td><?php echo $u['NIP']?></td>
											<td><?php echo $u['jumSuratBagian'] ?></td>
										</tr>
											
									<?php } ?>
									</tbody>
								</table>
							</div>
							<div class="panel-footer">
								<div class="row">
									<div class="col-md-6"><span class="panel-note"><i class="fa fa-clock-o"></i> 
									Periode: <?php foreach($periode as $per){ echo $per['periode']; }?>
									</span></div>
									<div class="col-md-6 text-right"><a href="<?php echo base_url('kbagian/rekap');?>" class="btn btn-primary">Lihat Semua</a></div>
								</div>
							</div>
						</div>
						<!-- END MULTI CHARTS -->
					</div>

					<div class="col-md-6">
						<!-- MULTI CHARTS -->
						<div class="panel">
							<div class="panel-heading">
								<h3 class="panel-title"><span class="uk-label uk-label-warning">Staff <?php echo $bagian?></span> dengan surat terendah</h3>
								<div class="right">
									<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
									<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
								</div>
							</div>
							<div class="panel-body">
							<table class="table table-striped">
									<thead>
										<tr>
											<th>No </th>
											<th>Nama</th>
											<th>NIP</th>
											<th>Jumlah Surat</th>
										</tr>
									</thead>
									<tbody>
									<?php 
										$no = 1;
										foreach($surat_terendah as $b){ ?>
										<tr>
											<td><?php echo $no++ ?></td>
											<td><span class=""><?php echo $b['Nama'] ?></span></td>
											<td><?php echo $b['NIP']?></td>
											<td><?php echo $b['jumSuratBagianTerendah'] ?></td>
										</tr>
											
									<?php } ?>
									</tbody>
								</table>
							</div>
							<div class="panel-footer">
								<div class="row">
									<div class="col-md-6"><span class="panel-note"><i class="fa fa-clock-o"></i> 
									Periode: <?php foreach($periode as $per){ echo $per['periode']; }?>
									</span></div>
									<div class="col-md-6 text-right"><a href="<?php echo base_url('kbagian/rekap');?>" class="btn btn-primary">Lihat Semua</a></div>
								</div>
							</div>
						</div>
						<!-- END MULTI CHARTS -->
					</div>
				</div>
				
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2018 <a href="https://www.themeineed.com" target="_blank">Mas mas e</a>. All Rights Reserved.</p>
			</div>
		</footer>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	
	<script>
	$(function() {
		var options;

		var data = {
			labels: [
				<?php 
								foreach($pribadi as $u){ 
									$dt = DateTime::createFromFormat('!m', $u['bulan']);
									echo "'".$dt->format('M')."',";
							} ?>],
			series: [{
				name: 'series-projection',
				data: [<?php 
								foreach($pribadi as $u){ 
									echo $u["jum_surat_pribadi"].",";
							} ?>],
			}]
		};

		// line chart
		options = {
			height: "300px",
			showPoint: true,
			axisX: {
				showGrid: false
			},
			lineSmooth: false,series: {
				'series-projection': {
					showArea: false,
					showPoint: true,
					showLine: true
				},
			},
		};

		var responsiveOptions = [
  ['screen and (max-width: 640px)', {
    seriesBarDistance: 5,
    axisX: {
      labelInterpolationFnc: function (value) {
        return value[0];
      }
    }
  }]
];

		new Chartist.Line('#demo-line-chart', data, options, responsiveOptions);


	});
	</script>
<script type="text/javascript">
