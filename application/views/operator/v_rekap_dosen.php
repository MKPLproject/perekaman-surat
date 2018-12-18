
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
        <h3 class="panel-title"><span>Rekap Surat Tugas</span></h3>
        <p>Dosen</p>
        <div class="right">
        <a class="uk-button uk-button-primary"  uk-toggle="target: #toggle-usage" type="button">
            <span uk-icon="settings"></span>FILTER</a>           
        </div>
    </div>
</div>
<div class="panel-body">
		<div class="row">
				<!-- TABLE STRIPED -->
        <div class="panel">
            <div class="container-fluid">
            <div id="toggle-usage" hidden>
                <div id="toggle-filter" class="uk-section-xsmall">
                    <div uk-grid class="uk-child-width-1-1@s uk-child-width-2-3@l">
                        <div class="">
                            <div class="uk-card uk-card-default">
                                <div class="uk-card-body">
                                    <form action="<?php echo site_url('rekap/Pencarian');?>" method="POST">
                                        <fieldset class="uk-fieldset">

                                            <div class="uk-margin">
                                                <div class="uk-position-relative">
                                                    <span class="uk-form-icon ion-android-person"></span>
                                                    <input list ="NIP" type="text" class="uk-input" name="NIP" placeholder="Ketikkan NIP / NAMA">
                                                        <datalist id = "NIP">
                                                        <?php foreach($records as $rows){ ?>
                                                        <option value="<?php echo $rows['NIP'];?>"> <?php echo $rows['NIP'];?> <?php echo $rows['Nama'];?></option>
                                                        <?php } ?>
                                                        </datalist>
                                                </div>
                                            </div>

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
                                                <a href="<?php echo site_url('rekap'); ?>">Reset</a>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   
                
		<div class="row">
			<div class="col-md-12">
				<!-- TABLE STRIPED -->
				<div class="panel">
			<div class="col-md-12">
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

$('#tabel_rekap_surat').DataTable({
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