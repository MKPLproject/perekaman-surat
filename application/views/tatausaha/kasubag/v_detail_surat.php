
<!-- Tampilan tabel -->
<div class="main-content">
	<div class="container-fluid">
		<?php 
			foreach($surattugas as $b){ 
		?>
		<div class="col-md-12">
		
		</div>
		
		<?php
			
			$notif = $this->session->flashdata('notif');
			if($notif != NULL){
				echo '
					<div class="alert alert-danger">'.$notif.'</div>
				';
			}
		?>
		<div class="row">
			<div class="col-md-12">
				<!-- TABLE STRIPED -->
				<div class="panel">
					<div class="panel-body">
						<table id="surattugas" class="table table-striped">
							<thead>
								<tr>
									<th>No </th>
									<th>Nama</th>
									<th>NIP</th>
									<th>Jabatan</th>
								</tr>
							</thead>
							<tbody>
							
							<?php 
							}
								$no = 1;
								foreach($detail_st as $u){ 
							?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo $u->Nama ?></td>
								<td><?php echo $u->NIP ?></td>
								<td><?php echo $u->Jabatan ?></td>
								
							</tr>
							<?php } ?>
								
							</tbody>
                            <tfoot>
								<tr>
									<th>No </th>
									<th>Nama</th>
									<th>NIP</th>
									<th>Jabatan</th>
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
			</div>
		</div>
	</div>
</div>


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
