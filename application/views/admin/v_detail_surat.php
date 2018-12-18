
<div class="main-content">
<?php
    $notif = $this->session->flashdata('notif');
    if($notif != NULL){
        echo '
        <div class="uk-alert-primary" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p>'.$notif.'</p>
        </div>
        ';
    }
?>
	<div class="container-fluid">
        <div class="panel">
        <?php 
			foreach($surattugas as $b){ 
		?>
						<!-- MULTI CHARTS -->
							<div class="panel-heading">
								<h3 class="panel-title">Detail Surat</h3>
								<div class="right">
									<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
									<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
								</div>
							</div>
							<div class="panel-body">
                            <div class="uk-grid-small" uk-grid>
            <div class="uk-width-1-2@s">
            <table class="uk-table uk-table-small">
                <tbody>
                    <tr>
                        <td class="uk-width-small">Nomor Surat</td>
                        <td class="uk-table-expand">: <span class="uk-label uk-label-success"><?php echo $b->Nomor_Surat?></span></td>
                    </tr>
                    <tr>
                        <td class="uk-width-small">Tanggal Surat</td>
                        <td class="uk-table-expand">: <?php $date =  $b->Tanggal_Surat; echo date("d-m-Y", strtotime($date))?></td>
                    </tr>
                    <tr>
                        <td class="uk-width-small">Bulan Bayar </td>
                        <td class="uk-width-expand">: <?php echo $b->Bulan_Bayar ?> </td>
                    </tr>
                    
                    <tr>
                        <td class="uk-width-small">Keterangan </td>
                        <td class="uk-width-expand">: <?php echo $b->Keterangan ?> </td>
                    </tr>
                </tbody>
            </table>
            </div>
            <div class="uk-width-1-2@s">
            <table class="uk-table uk-table-small ">
                <tbody>
                    <tr>
                        <td class="uk-width-small">Perihal</td>
                        <td class="uk-table-expand">: <?php echo $b->Perihal ?></td>
                    </tr>
                    <tr>
                        <td class="uk-width-small">File</td>
                        
                        <td class="uk-width-expand">: <a target="_blank" rel="noopener noreferrer" href="<?php echo $b->Link_url; ?>" class="uk-button uk-button-default uk-button-small uk-box-shadow-small ">File</span>
									</a> </td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
							</div>
						</div>
						<!-- END MULTI CHARTS -->


		<div class="row">
			<div class="col-md-12">
				<!-- TABLE STRIPED -->
				<div class="panel">
					<div class="panel-body">
					<a href="<?php echo site_url('admin/tampil_form_tambah_pegawai/'.$b->Nomor_Surat); ?>" class="uk-button uk-button-primary uk-button-small"><span class="lnr lnr-plus-circle "></span>Tambah Pegawai</a><br></br>
						<table id="surattugas" class="table table-striped">
							<thead>
								<tr>
									<th>No </th>
									<th>Nama</th>
									<th>NIP</th>
									<th>Jabatan</th>
									<th>Aksi</th>
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
								<td>
								
									<a href="<?php echo site_url('admin/tampil_form_edit_pegawai/'.$u->Nomor_Surat.'/'.$u->NIP); ?>" class="uk-button uk-button-primary uk-button-small"><span class="lnr lnr-pencil"></span></a> 
									<a href="<?php echo site_url('admin/hapus_pegawai/'.$u->Nomor_Surat.'/'.$u->NIP); ?>" onclick="return deletechecked();" class="uk-button uk-button-danger uk-button-small"><span class="lnr lnr-trash"></span></a> 

								</td>
							</tr>
							<?php } ?>
								
							</tbody>
                            <tfoot>
								<tr>
									<th>No </th>
									<th>Nama</th>
									<th>NIP</th>
									<th>Jabatan</th>
									<th>Aksi</th>
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
	
	$('#surattugas').DataTable({
        lengthMenu: [
            [10, 25, 50, 100, 200, -1],
            [10, 25, 50, 100, 200, "All"]
        ],
        responsive: true,
        paging: true,
        stateSave: true,
        processing: true,
        dom: 'Blftirp',
        buttons: [
            {
                extend: 'copyHtml5',
                text: '<i class="fa fa-files-o"></i>',
                titleAttr: 'Copy',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fa fa-file-pdf-o"></i>',
                titleAttr: 'PDF',
                extension: ".pdf",
                filename: "Surat Tugas",
                title: "",
                orientation: 'landscape',
                customize: function (doc) {

                    doc.styles.tableHeader = {
                        color: 'black',
                        background: 'grey',
                        alignment: 'center'
                    }

                    doc.styles = {
                        subheader: {
                            fontSize: 10,
                            bold: true,
                            color: 'black'
                        },
                        tableHeader: {
                            bold: true,
                            fontSize: 10.5,
                            color: 'black'
                        },
                        lastLine: {
                            bold: true,
                            fontSize: 11,
                            color: 'blue'
                        },
                        defaultStyle: {
                            fontSize: 10,
                            color: 'black'
                        }
                    }

                    var objLayout = {};
                    objLayout['hLineWidth'] = function(i) { return .8; };
                    objLayout['vLineWidth'] = function(i) { return .5; };
                    objLayout['hLineColor'] = function(i) { return '#aaa'; };
                    objLayout['vLineColor'] = function(i) { return '#aaa'; };
                    objLayout['paddingLeft'] = function(i) { return 8; };
                    objLayout['paddingRight'] = function(i) { return 8; };
                    doc.content[0].layout = objLayout;

                    // margin: [left, top, right, bottom]

                    doc.content.splice(0, 0, {
                        text: [
                            {text: 'Texto 0', italics: true, fontSize: 12}
                        ],
                        margin: [0, 0, 0, 12],
                        alignment: 'center'
                    });

                    doc.content.splice(0, 0, {

                        table: {
                            widths: [300, '*', '*'],
                            body: [
                                [
                                    {text: 'Texto 1', bold: true, fontSize: 10}
                                    , {text: 'Texto 2', bold: true, fontSize: 10}
                                    , {text: 'Texto 3', bold: true, fontSize: 10}]
                            ]
                        },

                        margin: [0, 0, 0, 12],
                        alignment: 'center'
                    });


                    doc.content.splice(0, 0, {

                        table: {
                            widths: [300, '*'],
                            body: [
                                [
                                    {
                                        text: [
                                            {text: 'Texto 4', fontSize: 10},
                                            {
                                                text: 'Texto 5',
                                                bold: true,
                                                fontSize: 10
                                            }

                                        ]
                                    }
                                    , {
                                    text: [
                                        {
                                            text: 'Texto 6',
                                            bold: true, fontSize: 18
                                        },
                                        {
                                            text: 'Texto 7',
                                            fontSize: 10
                                        }

                                    ]
                                }]
                            ]
                        },

                        margin: [0, 0, 0, 22],
                        alignment: 'center'
                    });


                },
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excelHtml5',
                text: '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'Excel',
                fieldSeparator: ';',
                filename: "Surat Tugas",
                fieldBoundary: '"',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'csvHtml5',
                text: '<i class="fa fa-file-code-o"></i>',
                titleAttr: 'CSV',
                fieldSeparator: ';',
                fieldBoundary: '"',
                exportOptions: {
                    columns: ':visible'
                }
            },

            {
                extend: 'print',
                text: '<i class="fa fa-print"></i>',
                titleAttr: 'Print',
                exportOptions: {
                    columns: ':visible',
                }
            },

            {
                extend: 'colvis',
                postfixButtons: ['colvisRestore'],
                collectionLayout: 'fixed four-column'
            }

        ]

    });

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
