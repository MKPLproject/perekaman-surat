
<!-- Tampilan tabel -->
<div class="main-content">
	<div class="container-fluid">
		<center><h3 class="page-title">Data Surat Tugas</h3></center>
		
		<?php
			$notif = $this->session->flashdata('notif');
			if($notif != NULL){
				echo '
					<div class="alert alert-danger">'.$notif.'</div>
				';
			}
		?>
        <form class="uk-grid-small" uk-grid action="<?php echo site_url('pegawai/PencarianSurat');?>"  method="get">
            <div class="uk-margin">
                    <label class="uk-form-label" for="form-horizontal-select">Select</label>
                    <div class="uk-form-controls uk-width-1-2@s">
                        <select name="bln1" class="uk-select" required id="form-horizontal-select">
                        <option disabled selected>-Bulan-</option>
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">november</option>
                            <option value="12">Desember</option>
                        </select>sd
                        <select name="bln2" class="uk-select" required id="form-horizontal-select">
                        <option disabled selected>-Bulan-</option>
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">november</option>
                            <option value="12">Desember</option>
                        </select>
                        Tahun
                            <select name="tahun">
                            <?php
                            $mulai= date('Y') - 1;
                            for($i = $mulai;$i<$mulai + 100;$i++){
                            $sel = $i == date('Y') ? ' selected="selected"' : '';
                            echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
                            }
                            ?>
                            <?php 
                    foreach ($detail_st as $u){ 
                    ?>
                            <input type="hidden" class="form-control" name="NIP" value="<?php echo $u->NIP ?>">
                    <?php } ?>
                            </td>
                            
                        <button type="submit" class="btn btn-default">Search</button>
                    </div>
                </div>
            </form>
		<div class="row">
			<div class="col-md-12">
				<!-- TABLE STRIPED -->
				<div class="panel">
					<div class="panel-body">
						<table id="surattugas" class="table table-striped">
							<thead>
								<tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Nomor Surat</th>
                                <th>Perihal</th>
                                <th>Keterangan</th>
                                <th>Jabatan</th>
                                <th>Tanggal Surat</th>
                                <th>Link File</th>
                                <th>Keterangan tambahan</th>
								</tr>
							</thead>
							<tbody>
							<?php 
                            $no = 1;
                            foreach ($detail_st as $u){ 
                            ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $u->Nama ?></td>
                                <td><?php echo $u->NIP ?></td>
                                <td><?php echo $u->Nomor_Surat ?></td>
                                <td><?php echo $u->Perihal ?></td>
                                <td><?php echo $u->Keterangan ?></td>
                                <td><?php echo $u->Jabatan ?></td>
                                <td><?php $date =  $u->Tanggal_Surat; echo date("d-m-Y", strtotime($date))?></td>
                                <td><?php echo $u->Link_url ?></td
                                <td><?php echo $u->Ket ?></td
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
