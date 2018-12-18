<a class="uk-button uk-button-default" href="#modal-sections" uk-toggle>Open</a>
<!-- -->
<div id="modal-sections" class=" uk-flex-top uk-modal-container" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h3 class="">Rincian Rekap Surat Tugas Bulan January 2018</h3>
        </div>
        
        <div class="uk-modal-body">
        <div class="uk-grid-small" uk-grid>
            <div class="uk-width-1-2@s">
            <table class="">
                <tbody>
                    <tr>
                        <td class="uk-width-small">Nama</td>
                        <td class="uk-table-expand">: Sueddi Sihotang</td>
                    </tr>
                    <tr>
                        <td class="uk-width-small">NIP</td>
                        <td class="uk-width-expand">: 155150201111309 </td>
                    </tr>
                    <tr>
                        <td class="uk-width-small">Status </td>
                        <td class="uk-width-expand">: Dosen </td>
                    </tr>
                    
                    <tr>
                        <td class="uk-width-small">Jabatan </td>
                        <td class="uk-width-expand">: III/d </td>
                    </tr>
                </tbody>
            </table>
            </div>
            <div class="uk-width-1-2@s">
            <table class="">
                <tbody>
                    <tr>
                        <td class="uk-width-small">Peride</td>
                        <td class="uk-table-expand">: Sueddi Sihotang</td>
                    </tr>
                    <tr>
                        <td class="uk-width-small">Bagian</td>
                        <td class="uk-width-expand">: 155150201111309 </td>
                    </tr>
                    <tr>
                        <td class="uk-width-small">Sub Bagian </td>
                        <td class="uk-width-expand">: Dosen </td>
                    </tr>
                    
                    <tr>
                        <td class="uk-width-small">Urusan </td>
                        <td class="uk-width-expand">: III/d </td>
                    </tr>
                </tbody>
            </table><br>
            </div>
        </div>

            <div>
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
                                <td>1</td>
                                <td>Sueddi Sihotang</td>
                                <td>155150201111309</td>
                                <td>0544/UN10.F02/PP/2018</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>20-10-2011</td>
                                <td>asd</td>
                                <td>asd</td>
                            </tr>
                            <?php } ?>
								
							</tbody>
							<tfoot>
								<tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>Total Surat Tugas</th>
                                <th>4</th>
								</tr>
							</tfoot>
						</table>
            </div>
        </div>
        <div class="uk-modal-footer uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cetak</button>
            <button class="uk-button uk-button-primary uk-modal-close" type="button">Close</button>
        </div>
    </div>
</div>