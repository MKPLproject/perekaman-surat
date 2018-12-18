
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
		<form class="align: center;">




</form>
		<div class="row">
			<div class="col-md-12">
				<!-- TABLE STRIPED -->
				<div class="panel">
					<div class="panel-body">
						<table id="surattugas" class="table table-striped">
							<thead>
								<tr>
									<th>No </th>
									<th>No Surat</th>
									<th>Tgl Surat</th>
									<th>Bulan Bayar</th>
									<th>Keterangan</th>
									<th>Perihal</th>
									<th>Link URL</th>
									<th>Ket</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								$no = 1;
								foreach($surattugas as $u){ 
								$noSurat = $u->Nomor_Surat;
								?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo $u->Nomor_Surat ?></td>
								<td><?php $date =  $u->Tanggal_Surat; 
										  echo date("d-m-Y", strtotime($date))?></td>
								<td><?php echo $u->Bulan_Bayar ?></td>
								<td><?php echo $u->Keterangan ?></td>
								<td><?php echo anchor('admin/detail_surat/'.$u->Nomor_Surat,$u->Perihal) ?></td>
								<td><?php echo $u->Link_url ?></td>
								<td><?php echo $u->Ket ?></td>
							</tr>
							<?php } ?>
								
							</tbody>
                            <tfoot>
								<tr>
									<th>No </th>
									<th>No Surat</th>
									<th>Tgl Surat</th>
									<th>Bulan Bayar</th>
									<th>Keterangan</th>
									<th>Perihal</th>
									<th>Link URL</th>
									<th>Ket</th>
								</tr>
							</tfoot>
						</table>
                        


<table cellspacing="0" cellpadding="0" border="0">
	<tbody>
		<tr>
			<td class="gutter">
				<div class="line number1 index0 alt2" style="display: none;">1</div>
			</td>
			<td class="code">
				<div class="container" style="display: none;">
					<div class="line number1 index0 alt2" style="display: none;">&nbsp;</div>
				</div>
			</td>
		</tr>
	</tbody>
</table>

					</div>
				</div>
				<!-- END TABLE STRIPED -->




 <!-- Javascript tambahan untuk prepare update dan delete-->
<script type="text/javascript">

$(document).ready(function() {
    $('#surattugas').DataTable( {
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
