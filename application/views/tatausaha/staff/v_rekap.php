
<!-- Tampilan tabel -->
<div class="main-content">
	<div class="container-fluid">
		<center> 
            <div class="uk-card uk-card-default">
                <div class="uk-card-header">
                        Data Rekap Surat Tugas
                </div> 
            </div>
        </center>
		
		<?php
			$notif = $this->session->flashdata('notif');
			if($notif != NULL){
				echo '
					<div class="alert alert-danger">'.$notif.'</div>
				';
			}
        ?>
        
        <center>
        <div class=""><br>
            <button class="uk-button uk-button-primary"  uk-toggle="target: #toggle-usage" type="button">
            <span uk-icon="settings"></span>FILTER</button>
            <div id="toggle-usage" hidden>
                <div id="toggle-filter" class="uk-section-xsmall">
                    <div uk-grid class="uk-child-width-1-1@s uk-child-width-2-3@l">
                        <div class="">
                            <div class="uk-card uk-card-default">
                                <div class="uk-card-body">
                                    <form action="<?php echo site_url('Staff/Pencarian');?>" method="POST">
                                        <fieldset class="uk-fieldset">
                                            <div class="uk-margin">
                                                <div class="uk-position-relative">
                                                    <span class="uk-form-icon ion-calendar"></span>
                                                    <input name="Tanggal_Surat" type="number" placeholder="Tahun" class="uk-input" required  >
                                                </div>
                                            </div>


                                            <div class="uk-margin">
                                                <button type="submit"  class="uk-button uk-button-primary">
                                                    <span uk-icon="search"></span>&nbsp; Search
                                                </button>
                                            </div>

                                            <div class="uk-margin">
                                                <a href="<?php echo site_url('Staff/rekap'); ?>">Reset</a>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   
                
        </center><br>
		<div class="row">
			<div class="col-md-12">
				<!-- TABLE STRIPED -->
				<div class="panel">
					<div class="panel-body">
						<table id="tabel_rekap_surat" class="table table-striped">
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
                            </thead>
                            <tbody>
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
                            <tfoot>
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
                            </tfoot>
						</table>
                        <table cellspacing="0" cellpadding="0" border="1">
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
    $('#tabel_rekap_surat').DataTable( {
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