
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
        <div class="row">
            <!-- INPUTS -->
            <div class="panel">
                <div class="uk-card uk-card-default">
                
                        <div class="uk-card-header">
                            Tambah Detail Surat
                            
                             <?php foreach($surattugas as $u): ?>
                                    <div class="uk-fieldset uk-margin">
                                        <div class="uk-position-relative">
                                        <center>
                                        <a class="uk-accordion-title" href="#">No Surat : <?php echo $u->Nomor_Surat?></a>
                                   <h4 class="page-title uk-label uk-label-success"> </h4><br>
                                   
                                   <h4 class="page-title uk-label uk-label-primary">Perihal : <?php echo $u->Perihal?> </h4><br>
                                   </center>
                                        </div>
                                    </div>
	                                <?php endforeach ?>
                        </div>
                        <div class="uk-grid-small" uk-grid>
                        <div class="uk-width-1-2@s">
                        <div class="uk-card-body ">
                            <form action="<?php echo base_url(). 'operator/tambah_pegawai'; ?>" class="uk-form-horizontal uk-margin-large" method="POST" >

                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">NIP</label>
                                    <div class="uk-form-controls">
                                                    
											<input list="nip" name="NIP" required placeholder="NAMA | NIP" class="uk-input" required>  
											<datalist id="nip">
											 <?php foreach($pegawai as $p): ?>
												<option value="<?php echo $p->NIP?>"><?php echo $p->Nama?> | <?php echo $p->NIP?></option>
											   
											 <?php endforeach ?>
											</datalist>
											
                                    </div>
                                </div>

                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Jabatan</label>
                                    <div class="uk-form-controls">
                                        <input name="Jabatan"class="uk-input" id="form-horizontal-text" type="text" placeholder="Jabatan" required>
                                    </div>
                                </div>
                                   
                                
                             <?php foreach($surattugas as $u): ?>
											<input type="hidden" name="Nomor_Surat" value="<?php echo $u->Nomor_Surat ?>">
				
                                            <?php endforeach ?>
                                <center>
                                <div class="uk-margin">
                                    <button type="submit" class="uk-button uk-button-primary">
                                        <span class="ion-forward"></span>&nbsp; Tambah Detail Surat    
                                    </button>
                                </div>

                                </center>
                            </form>
                        </div>
        </div>
        <div class="uk-width-1-2@s"><br><div class="uk-panel uk-panel-scrollable">
            <div class="uk-container uk-container-xsmall">
                <div class="uk-background-muted uk-padding uk-panel">
                    <table class="uk-table uk-table-small uk-table-divider">
                    <center>
                    <span class="uk-label uk-background-secondary ">Data yang sudah ditambahkan</span></center>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
							
								$no = 1;
								foreach($detail_st as $p){ 
							?>
                            <tr>
                                <td><?php echo $no++?></td>
                                <td><?php echo $p->NIP?></td>
                                <td><?php echo $p->Nama?></td>
                                <td><?php echo $p->Jabatan?></td>
                            </tr>
							<?php } ?>
                            
                        </tbody>
                    </table>
                </div>
            </div><br>
        </div>
</div>
                       
                </div>
            </div>
            <!-- END INPUTS -->
            
        </div>
    </div>
</div>
    <!-- END MAIN CONTENT -->

<!-- END MAIN -->