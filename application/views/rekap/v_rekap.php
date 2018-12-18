
<!-- Tampilan tabel -->
<div class="main-content">
	<div class="container-fluid">
		<center><h3 class="page-title">Data Rekap Surat Tugas</h3></center>
		
		<?php
			$notif = $this->session->flashdata('notif');
			if($notif != NULL){
				echo '
					<div class="alert alert-danger">'.$notif.'</div>
				';
			}
        ?>
        
        <center><form action="<?php echo site_url('rekap/Pencarian');?>" onsubmit="return_validasi()"  method="post">
						<div class="form-group">
                        <input list ="NIP" type="text" name="NIP">
					<datalist id = "NIP">
					<?php foreach($records as $rows){ ?>
					<option value="<?php echo $rows['NIP'];?>"> <?php echo $rows['NIP'];?> <?php echo $rows['Nama'];?></option>
					<?php } ?>
					</datalist>
							<input type="number" class="form-control" name="Tanggal_Surat"  placeholder="Tahun">
							<button type="submit" class="btn btn-default">Search</button>
							<a href="<?php echo site_url('rekap'); ?>" style="text-decoration:none; color: black;">Reset</a>
						</div>
                    </form></center>
		<div class="row">
			<div class="col-md-12">
				<!-- TABLE STRIPED -->
				<div class="panel">
					<div class="panel-body">
						<table id="surattugas" class="table table-striped">
							<thead>
                            <tr>
                                    <th>No</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Januari</th>
                                    <th>Februari</th>
                                    <th>Maret</th>
                                    <th>April</th>
                                    <th>Mei</th>
                                    <th>Juni</th>
                                    <th>Juli</th>
                                    <th>Agustus</th>
                                    <th>September</th>
                                    <th>Oktober</th>
                                    <th>November</th>
                                    <th>Desember</th>
                                    <th>Jumlah Surat</th>
                                </tr>
                                <?php 
                                $no = 1;
                                foreach ($records as $rows){ 
                                ?>
                                <tr>
                                    <td><?php echo $no++;?></td>
                                    <td><?php echo $rows['NIP'];?></td> 
                                    <td><?php echo $rows['Nama'];?></td>
                                    <td><?php echo $rows['januari'];?></td>
                                    <td><?php echo $rows['februari'];?></td>
                                    <td><?php echo $rows['maret'];?></td>
                                    <td><?php echo $rows['april'];?></td>
                                    <td><?php echo $rows['mei'];?></td>
                                    <td><?php echo $rows['juni'];?></td>
                                    <td><?php echo $rows['juli'];?></td>
                                    <td><?php echo $rows['agustus'];?></td>
                                    <td><?php echo $rows['september'];?></td>
                                    <td><?php echo $rows['oktober'];?></td>
                                    <td><?php echo $rows['november'];?></td>
                                    <td><?php echo $rows['desember'];?></td>
                                    <td><?php echo $rows['JumlahST'];?></td>

                                </tr>
                                <?php } ?>
								
							</tbody>
						</table>
                        


					</div>
				</div>
				<!-- END TABLE STRIPED -->




 <!-- Javascript tambahan untuk prepare update dan delete-->
<script type="text/javascript">

</script>
