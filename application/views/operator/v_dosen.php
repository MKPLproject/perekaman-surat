
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
<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title"><span>Pegawai</span></h3>
                            <p>Dosen</p>
                            <div class="right">
        <a href="<?php echo site_url('operator/input'); ?>" class="uk-button uk-button-primary uk-button-small">Tambah Pegawai</a><br></br>
       							
                </div>
						</div>
						</div>

	<div class="panel-body">
		
		
            
		<div class="row">
				<!-- TABLE STRIPED -->
				<div class="panel">
					<div class="container-fluid">
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
                                <th>Jabatan</th>
                                <th>Surat Tugas</th>
                                <th>Aksi</th>
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
                                <td><?php echo $u->jabatan ?></td>
                                <td>
                                <a href="<?php echo site_url('operator/Surat/'.$u->NIP); ?>" class="uk-button uk-button-default uk-box-shadow-medium ">OPEN</span>
									</a> 
                                </td>
								<td>
								
									<a href="<?php echo site_url('operator/update/'.$u->NIP); ?>" class="uk-button uk-button-primary uk-button-small"><span class="lnr lnr-pencil "></span>
									</a> 
									<a href="<?php echo site_url('operator/hapus/'.$u->NIP); ?>" onclick="return deletechecked();" class="uk-button uk-button-danger uk-button-small"><span class="lnr lnr-trash"></span></a> 

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
                                <th>Jabatan</th>
                                <th>Surat Tugas</th>
                                <th>Aksi</th>
                            </tr>
							</tfoot>
						</table>
                        



					</div>
				</div>
        </div>
    </div>
    </div>
				<!-- END TABLE STRIPED -->




 <!-- Javascript tambahan untuk prepare update dan delete-->
<script type="text/javascript">

$('#pegawai').DataTable({
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
