
<!-- Tampilan tabel -->
<div class="main-content">
	<div class="container-fluid">
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
                <table class="uk-table uk-table-middle uk-table-divider">
                <tbody>
                    <tr>
                        <th class="uk-table-expand"><h3 class="panel-title">Data Surat Tugas</h3></th>
                        <th class="uk-table-shrink"> 
                            <form class="uk-search uk-search-default">
                                <span class="uk-search-icon-flip" uk-search-icon></span>
                                <input class="uk-search-input" id="search-inp"type="search" placeholder="Search...">
                            </form>
                        </th>
                        <th class="uk-width-small">
                        <select class="uk-select" id="pageSize">
                            <option value="10">10</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="-1">all</option>
                        </select>
                        </th>
                        <th class="uk-width-small">
                        <div class="uk-inline"> 
                            <a  class="uk-button uk-button-default "> Export <i class="fa fa-file-code-o" aria-hidden="true"></i></a>
                            <div uk-dropdown="mode: click">
                            <ul class="uk-nav uk-dropdown-nav">
                                <li class="uk-active "><a href="<?php echo site_url('admin/excelsurattugas'); ?>"><span class="uk-label uk-label-success fa fa-file-excel-o"> EXCEL</span></a></li>
                                <li><a href="<?php echo site_url('admin/pdfsurattugas'); ?>"><span class="uk-label uk-label-warning fa fa-file-pdf-o"> PDF</span></a></li>
                            </ul>
                            </div>
                        </div>
                       
                        <!--
                            <button type="button" uk-toggle="target: #toggle-usage"><i class="lnr lnr-chevron-up"></i></button>
                            <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>			
                         -->    
                                                
                      
                        </th>
                         <th class="uk-width-small">
                        <a  class="btn-toggle-collapse uk-button uk-button-default ">FILTER  <i class="lnr lnr-chevron-up"></i></a>
                        <!--
                            <button type="button" uk-toggle="target: #toggle-usage"><i class="lnr lnr-chevron-up"></i></button>
                            <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>			
                         -->    
                                                
                      
                        </th>
                     </tr>
                 </tbody>
                </table>
                                
            </div><hr>
            <div class="panel-body">
                    <div class="uk-background-muted uk-padding uk-panel">
                        <form class="uk-grid-small" uk-grid action="<?php echo site_url('admin/filter_surat');?>" method="get">
    
                            <div class="uk-width-1-4@s">
                                <p>Range Bulan Dari</p>
                            </div>
                            <div class="uk-width-1-4@s">
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
                                </select>
                            </div>
                            <div class="uk-width-1-4@s">
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
                            </div>
                            <div class="uk-width-1-4@s">
                            <select name="tahun"  class="uk-select">
                                <?php
                                $mulai= date('Y') - 1;
                                for($i = $mulai;$i<$mulai + 100;$i++){
                                $sel = $i == date('Y') ? ' selected="selected"' : '';
                                echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
                                }
                                ?>
                                </td>
                            </select>
                            </div>
    
                            <div class="uk-width-1-4@s"></div>
                            <div class="uk-width-1-2@s">
                                
                            </div>
                            <div class="uk-width-1-4@s">
                                <div class="uk-align-right">
                                    <button type="submit"  class="uk-button uk-button-primary">
                                        <span uk-icon="search"></span>&nbsp; Search
                                    </button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
    
                            
                            
                
    </div>
            
            
                <div class="panel panel-headline">
                    <!-- TABLE STRIPED -->
                    <div class="panel">
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
                                <td><?php echo $u->Link_url ?></td>
                                <td><?php echo $u->Ket ?></td>
                            </tr>
                            <?php } ?>
								
							</tbody>
							<tfoot>
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
