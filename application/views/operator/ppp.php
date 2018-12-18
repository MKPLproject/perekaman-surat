
		<!-- MAIN -->
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Dashboard</h3>
							<p class="panel-subtitle">Periode: <?php foreach($periode as $per){ echo $per['periode']; }?></p>
							<div class="right">
									<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
									<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>									
							</div>
						</div>

						
						<div class="panel-body">
							<div class="row">
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-users"></i></span>
										<p>
											<span class="number"><?php foreach($pegawai as $a){ echo $a['countPegawai']; }?></span>
											<span class="title">Jumlah Pegawai</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-envelope-open"></i></span>
										<p>
											<span class="number"><?php foreach($surat as $a){ echo $a['countSurat']; }?>
											</span>
											<span class="title">Jumlah Surat</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-eye"></i></span>
										<p>
											<span class="number">0</span>
											<span class="title">Nol</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-bar-chart"></i></span>
										<p>
											<span class="number">0</span>
											<span class="title">Nol</span>
										</p>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-9">
								<center>
								<h3 class="panel-title"><span class="uk-label uk-label-danger">Grafik Pemetaan Surat Tugas - <?php echo $per['periode']?></span></h3>
								</center><br>
								<div class="uk-card-body">
                                    <canvas id="chart1"></canvas>
                                </div>
								
								</div>
								<div class="col-md-3">
								<div>
								<form class="uk-margin-large" id="myform" method="post" action="<?php echo site_url('operator/indeks');?>">
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
										foreach($surattugas as $u){ 
											$dt = DateTime::createFromFormat('!m', $u['bulan']);
											
										?>
									<tr>
										<td id="date"><?php echo $dt->format('M');?></td>
										<td><?php echo $u['jum'] ?></td>
										
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
						<!-- RECENT PURCHASES -->
						<div class="panel">
							<div class="panel-heading">
								<h3 class="panel-title"><span class="uk-label uk-label-warning">Dosen</span> dengan surat tugas terbanyak</h3>
								<div class="right">
									<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
									<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
								</div>
							</div>
							<div class="panel-body no-padding">
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
										foreach($dosen as $dsn){ ?>
										<tr>
											<td><?php echo $no++ ?></td>
											<td><span class=""><?php echo $dsn['Nama'] ?></span></td>
											<td><?php echo $dsn['NIP']?></td>
											<td><?php echo $dsn['jumSurat'] ?></td>
										</tr>
											
									<?php } ?>
									</tbody>
								</table>
							</div>
							<div class="panel-footer">
								<div class="row">
									<div class="col-md-6"><span class="panel-note"><i class="fa fa-clock-o"></i> Periode: <?php foreach($periode as $per){ echo $per['periode']; }?></span></div>
									<div class="col-md-6 text-right"><a href="<?php echo base_url('rekap/rekapDosen');?>" class="btn btn-primary">Lihat Semua</a></div>
								</div>
							</div>
						</div>
						<!-- END RECENT PURCHASES -->
					</div>
					<div class="col-md-6">
						<!-- MULTI CHARTS -->
						<div class="panel">
							<div class="panel-heading">
								<h3 class="panel-title"><span class="uk-label uk-label-success">Staff</span> dengan surat terbanyak</h3>
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
										foreach($staff as $u){ ?>
										<tr>
											<td><?php echo $no++ ?></td>
											<td><span class=""><?php echo $u['Nama'] ?></span></td>
											<td><?php echo $u['NIP']?></td>
											<td><?php echo $u['jumSurat'] ?></td>
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
									<div class="col-md-6 text-right"><a href="<?php echo base_url('rekap/rekapStaff');?>" class="btn btn-primary">Lihat Semua</a></div>
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

		var ctx = $("#chart1");

var data = {
    labels: [<?php 
								$no = 1;
								foreach($surattugas as $u){ 
									$dt = DateTime::createFromFormat('!m', $u['bulan']);
									echo "'".$dt->format('M')."',";
							} ?>],
    datasets: [
        {
            label: "Website traffic",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "#F44336",
            borderColor: "#F44336",
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: "#F44336",
            pointBackgroundColor: "#fff",
            pointBorderWidth: 1,
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "#F44336",
            pointHoverBorderColor: "#F44336",
            pointHoverBorderWidth: 2,
            pointRadius: 1,
            pointHitRadius: 10,
            data: [<?php 
								foreach($surattugas as $u){ 
									echo $u["jum"].",";
							} ?>],
            spanGaps: false,
        }
    ]
};

var options = {
	responsive: true,
    maintainAspectRatio: false,
    legend: {
        display: false,
    },
    tooltips: {
        bodyFontColor: '#fff',
    },
	height: "300px",
			showPoint: true,
			scales: {
            yAxes: [{
                gridLines: {
                    display: false,
                },
            }],
            xAxes: [{
                gridLines: {
                    display: false,
                }
            }]
        }
}

var myLineChart = new Chart(ctx, {
    type: 'line',
    data: data,
    options: options
});











		new Chartist.Line('#demo-line-chart', data, options);

		

		
	});
	</script>
<script type="text/javascript">