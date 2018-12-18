
<!-- Tampilan tabel -->
<div class="main-content">
	<div class="container-fluid">
		<center><h3 class="page-title">Data Pegawai</h3></center>
		
		<?php
			$notif = $this->session->flashdata('notif');
			if($notif != NULL){
				echo '
					<div class="alert alert-danger">'.$notif.'</div>
				';
			}
		?>
        <center>
            
        <a href="<?php echo site_url('kbagian/input'); ?>" class="uk-button uk-button-primary uk-button-small"><span class="lnr lnr-plus-circle "></span>Tambah Data</a><br></br>
       
		
    </center>
		<div class="row">
			<div class="col-md-12">
				<!-- TABLE STRIPED -->
				<div class="panel">
					<div class="panel-body">
						<table id="pegawai" class="table table-striped">
							<thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Password</th>
                                <th>Status</th>
                                <th>Jabatan</th>
                                <th>Nomor Telpon</th>
                                <th>Bagian</th>
                                <th>Sub Bagian</th>
                                <th>Urusan</th>
                                <th>Surat Tugas</th>
                            </tr>
							</thead>
							<tbody>
							<?php 
                            $no = 1;
                            foreach ($pegawai as $u){ 
                            ?>
							<tr>
                                 <td><?php echo $no++ ?></td>
                                <td><?php echo $u->Nama ?></td>
                                <td><?php echo $u->NIP ?></td>
                                <td><?php echo $u->password ?></td>
                                <td><?php echo $u->Status ?></td>
                                <td><?php echo $u->Pangkat ?></td>
                                <td><?php echo $u->No_Telp ?></td>
                                <td><?php echo $u->Bagian ?></td>
                                <td><?php echo $u->Sub_Bagian ?></td>
                                <td><?php echo $u->Urusan ?></td>
                                <td>
                                <a href="<?php echo site_url('kbagian/SuratDosen/'.$u->NIP); ?>" class="uk-button uk-button-default uk-button-small"><span class="lnr lnr-book "></span>
									</a> 
                                </td>
								
							</tr>
							<?php } ?>
								
							</tbody>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Password</th>
                                <th>Status</th>
                                <th>Jabatan</th>
                                <th>Nomor Telpon</th>
                                <th>Bagian</th>
                                <th>Sub Bagian</th>
                                <th>Urusan</th>
                                <th>Surat Tugas</th>
                            </tr>
							</tfoot>
						</table>
                        



					</div>
				</div>
				<!-- END TABLE STRIPED -->




 <!-- Javascript tambahan untuk prepare update dan delete-->
<script type="text/javascript">
$(document).ready(function() {
    $('#pegawai').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, ':visible' ]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 5 ]
                }
            },
            'colvis'
        ]
    } );
} );
function deletechecked()
    {
        if(confirm("Serius ingin menghapus data ini ?"))
        {
            return true;
        }
        else
        {
            return false;  
        } 
   }
</script>
