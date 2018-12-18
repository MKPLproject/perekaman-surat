<?php
// header('Content-Transfer-Encoding: binary');
// header("Content-Type: application/octet-stream"); 
// header("Content-Transfer-Encoding: binary"); 
// header('Expires: '.gmdate('D, d M Y H:i:s').' GMT'); 
// header('Content-Disposition: attachment; filename = "Export '.date("Y-m-d").'.xls"'); 
// header('Pragma: no-cache'); 


?>
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
<style>
table, th { border: 0.5px solid #000; 
    text-align: center;}  

</style>

 <?php 
                                                foreach ($detail_st as $u){ 
                                                ?>
                                                <input type="hidden" class="form-control" name="NIP" value="<?php echo $u->NIP ?>">
                                                <?php } ?>

 <!-- ============ MODAL EDIT BARANG =============== -->
 <?php 
  foreach($detail_st as $value){
	$arr[substr($value->Tanggal_Surat,5,-3)] = substr($value->Tanggal_Surat,5,-3);
}
foreach($arr as $bulan){

	$date=$u->Tanggal_Surat;
	$tanggal = substr($date,0,4);	
}                                      

        foreach($detail_st as $i):
            $NIP=$i->NIP;
            $Nama=$i->Nama;
            $bulanModal = substr($i->Tanggal_Surat,5,-3);
            if ($bulan == 01){
                $periode = "Januari - ".$tanggal;
                
            } else if ($bulan == 02){
                
                $periode = "Februari - ".$tanggal;
            } else if ($bulan == 03){
                
                $periode = "Maret - ".$tanggal;
            } else if ($bulan == 04){
                
                $periode = "April - ".$tanggal;
            } else if ($bulan == 05){
                
                $periode = "Mei - ".$tanggal;
            } else if ($bulan == 06){
                
                $periode = "Juni - ".$tanggal;
            } else if ($bulan == 07){
                
                $periode = "Juli - ".$tanggal;
            } else if ($bulan == 08){
                
                $periode = "Agustus - ".$tanggal;
            } else if ($bulan == 09){
                
                $periode = "September - ".$tanggal;
            } else if ($bulan == 10){
                
                $periode = "Oktober - ".$tanggal;
            } else if ($bulan == 11){
                
                $periode = "November - ".$tanggal;
            } else if ($bulan == 12){
                
                $periode = "Desember - ".$tanggal;
            } else {
                $periode = "Bulan Tidak ditemukan!!!";
            }
        ?>
        <div class="uk-flex-top uk-modal-container modal fade" id="modal_edit<?php echo $NIP;?><?php echo $bulanModal;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog modal-lg uk-modal-body uk-margin-auto-vertical">
            <div class="modal-content">
        <button class="uk-modal-close-default" type="button" uk-close  data-dismiss="modal" aria-hidden="true"></button>
            <div class="uk-modal-header">
            <h3 class="">Rincian Rekap Surat Tugas [<?php echo $periode;?>]</h3>
        </div>
           
                <div class="uk-modal-body">
        <div class="uk-grid-small" uk-grid>
            <div class="uk-width-1-2@s">
            
       
            <table class="">
                <tbody>
                    <tr>
                        <td class="uk-width-small">Nama</td>
                        <td class="uk-table-expand">: <?php echo $Nama?></td>
                    </tr>
                    <tr>
                        <td class="uk-width-small">NIP</td>
                        <td class="uk-table-expand">: <?php echo $NIP?></td>
                    </tr>
                    <tr>
                        <td class="uk-width-small">Status </td>
                        <td class="uk-width-expand">: <?php echo $i->Status ?> </td>
                    </tr>
                    
                    <tr>
                        <td class="uk-width-small">Pangkat </td>
                        <td class="uk-width-expand">: <?php echo $i->Pangkat ?> </td>
                    </tr>
                </tbody>
            </table>
            </div>
            <div class="uk-width-1-2@s">
            <table class="">
                <tbody>
                    <tr>
                        <td class="uk-width-small">Periode</td>
                        <td class="uk-table-expand">: <?php echo $periode ?></td>
                    </tr>
                    <tr>
                        <td class="uk-width-small">Bagian</td>
                        <td class="uk-width-expand">: <?php echo $i->Bagian ?> </td>
                    </tr>
                    <tr>
                        <td class="uk-width-small">Sub Bagian </td>
                        <td class="uk-width-expand">: <?php echo $i->Sub_Bagian ?> </td>
                    </tr>
                    
                    <tr>
                        <td class="uk-width-small">Urusan </td>
                        <td class="uk-width-expand">: <?php echo $i->Urusan ?> </td>
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
                            foreach ($detail_st as $s){
                                $date =  $s->Tanggal_Surat;
                                $bln=substr($date,5,-3);
                                if($bulanModal == $bln){
                                    
                            ?>
                            <tr>
                                <td><?php echo $no++?></td>
                                <td><?php echo $s->Nomor_Surat ?></td>
                                <td><?php echo $s->Perihal ?></td>
                                <td><?php echo date("d/m/Y", strtotime($date));?></td>
                                <td><?php echo $s->Jabatan ?></td>
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
            <a href="<?php echo site_url('admin/excelsuratpegawaiperbulan/'.$NIP.'/'.$bulan); ?>" class="uk-button uk-button-primary">Cetak
									</a> 
                    <button class="uk-button uk-button-default uk-modal-close" data-dismiss="modal" aria-hidden="true">Tutup</button>
        
        </div>
        
            </div>
            </div>
        </div>
 
    <?php endforeach;?>
    <!--END MODAL ADD BARANG-->
   
