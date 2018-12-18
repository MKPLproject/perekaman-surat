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
        <h3 class="panel-title"><span>Surat Tugas</span></h3>
         <?php 
                            $no = 1;
                            foreach ($detail_st as $b){ }
                            ?>
        <p><span class="uk-label"><?php echo $b->Nama?></span></p>
        <p><span class="uk-label uk-label-success"><?php echo $b->NIP?></span></p>
        <div class="right">
        <p uk-margin>
				<a uk-toggle="target: #toggle-usage" class="uk-button uk-button-small uk-button-secondary"><span uk-icon="settings"></span></a>
                
				 <a href="<?php echo site_url('kbagian/rekapsurat/'.$b->NIP); ?>" class="uk-button uk-button-small uk-button-danger" uk-icon="calendar"></a><?php ?>
			
            </div>  
        </p>
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
                                    <form class="uk-grid-small" uk-grid action="<?php echo site_url('kbagian/PencarianSurat');?>" method="get">

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
                                            <div class="uk-margin">
                                                <center>
                                                <?php 
                                                foreach ($detail_st as $u){ 
                                                ?>
                                                <input type="hidden" class="form-control" name="NIP" value="<?php echo $u->NIP ?>">
                                                <?php } ?>
                                                    <button type="submit"  class="uk-button uk-button-primary">
                                                        <span uk-icon="search"></span>&nbsp; Search
                                                    </button>
                                                </center>
                                            </div>
                                        </div>
                                        <div class="uk-width-1-4@s"></div>
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
					<div class="panel-body">
                    
						<table id="surattugas" class="table table-striped">
						    <thead>
                                <tr>
                                    <th>No </th>
                                    <th>Bulan</th>
                                    <th>Jumlah Surat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $no = 1;
                                foreach($surat as $u){ ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php 
                                        $nip = $u['NIP'];
                                        $bulan = $u['bulan'];
                                        $dt = DateTime::createFromFormat('!m', $u['bulan']);
                                        echo $dt->format('F');
                                    ?></td>
                                    <td><?php echo $u['jumSurat'] ?></td>
                                    <td>
                                    </a> 
                            <a class="uk-button uk-button-default uk-box-shadow-hover-xlarge" data-toggle="modal" data-target="#modal_edit<?php echo $nip;?><?php echo $bulan;?>"> Open</a>	
                            </td></tr>
                            <?php } ?>
                            </tbody>
                    
							<tfoot>
								<tr>
                                    <th>No </th>
                                    <th>Bulan</th>
                                    <th>Jumlah Surat</th>
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


 <!-- ============ MODAL EDIT BARANG =============== -->
 <?php 
   
   foreach($surat as $i):
   
    $NIP=$i['NIP'];
    $bulanModal=$i['bulan'];
   ?>
        <div class="uk-flex-top uk-modal-container modal fade" id="modal_edit<?php echo $NIP;?><?php echo $bulanModal;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog modal-lg uk-modal-body uk-margin-auto-vertical">
            <div class="modal-content">
                <button class="uk-modal-close-default" type="button" uk-close  data-dismiss="modal" aria-hidden="true"></button>
                <div class="uk-modal-header">
                    <h3 class="">Rincian Rekap Surat Tugas [<?php echo $i['bulan'];?>]</h3>
                </div>
                <div class="uk-modal-body">
        <div class="uk-grid-small" uk-grid>
            <div class="uk-width-1-2@s">
            
       
            <table class="">
                <tbody>
                    <tr>
                        <td class="uk-width-small">Nama</td>
                        <td class="uk-table-expand">: <?php echo $i['Nama']?></td>
                    </tr>
                    <tr>
                        <td class="uk-width-small">NIP</td>
                        <td class="uk-table-expand">: <?php echo $i['NIP']?></td>
                    </tr>
                    <tr>
                        <td class="uk-width-small">Status </td>
                        <td class="uk-width-expand">: <?php echo $i['Status'] ?> </td>
                    </tr>
                    
                    <tr>
                        <td class="uk-width-small">Pangkat </td>
                        <td class="uk-width-expand">: <?php echo $i['Pangkat'] ?> </td>
                    </tr>
                </tbody>
            </table>
            </div>
            <div class="uk-width-1-2@s">
            <table class="">
                <tbody>
                    <tr>
                        <td class="uk-width-small">Periode</td>
                        <td class="uk-table-expand">: <?php echo $i['Pangkat'] ?></td>
                    </tr>
                    <tr>
                        <td class="uk-width-small">Bagian</td>
                        <td class="uk-width-expand">: <?php echo $i['Bagian'] ?> </td>
                    </tr>
                    <tr>
                        <td class="uk-width-small">Sub Bagian </td>
                        <td class="uk-width-expand">: <?php echo $i['Sub_Bagian'] ?> </td>
                    </tr>
                    
                    <tr>
                        <td class="uk-width-small">Urusan </td>
                        <td class="uk-width-expand">: <?php echo $i['Urusan'] ?> </td>
                    </tr>
                </tbody>
            </table><br>
            </div>
        </div>

            <div>
            <table id="modalsurattugas" class="table table-striped">
							<thead>
								<tr>
                                <th>No</th>
                                <th>Nomor Surat</th>
                                <th>Perihal</th>
                                <th>Tanggal Surat</th>
                                <th>Jabatan</th>
								</tr>
							</thead>
							<tbody>
                            <?php 
                            $no = 1;
                            foreach ($detail as $s){
                                $bln =  $s['bulan'];
                                if($bulanModal == $bln){
                                    
                            ?>
                            <tr>
                                <td><?php echo $no++?></td>
                                <td><?php echo $s['Nomor_Surat'] ?></td>
                                <td><?php echo $s['Perihal'] ?></td>
                                <td><?php echo date("d/m/Y", strtotime($s['Tanggal_Surat']));?></td>
                                <td><?php echo $s['Jabatan'] ?></td>
                            </tr>
								
                            <?php }} ?>
							</tbody>
							<tfoot>
								<tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>Total Surat Tugas</th>
                                <th><?php echo $no-1?></th>
								</tr>
							</tfoot>
						</table>
            </div>
        </div>
 
        <div class="uk-modal-footer uk-text-right">
            <div id="demo">  <info> </info>  </div>
            <a href="<?php echo site_url('kbagian/excelsuratpegawaiperbulan/'.$NIP.'/'.$bulanModal); ?>" class="uk-button uk-button-primary">Cetak
									</a> 
                    <button class="uk-button uk-button-default uk-modal-close" data-dismiss="modal" aria-hidden="true">Tutup</button>
        
        </div>
        
            </div>
            </div>
        </div>
 
    <?php endforeach;?>
    <!--END MODAL ADD BARANG-->
   
