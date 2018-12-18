
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <!-- INPUTS -->
            <div class="panel">
                <div class="uk-card uk-card-default">
                
                        <div class="uk-card-header">
                            Tambah Data Pegawai
                        </div>
                        <div class="uk-grid-small" uk-grid>
                        <div class="uk-width-1-2@s">
                        <div class="uk-card-body ">
                        <?php foreach($surattugas as $u): ?>
                                    <div class="uk-fieldset uk-margin">
                                        <div class="uk-position-relative">
                                        <center>
                                   
                                   <h4 class="page-title uk-label uk-label-success">No Surat : <?php echo $u->Nomor_Surat?> </h4><br>
                                   
                                   <h4 class="page-title uk-label uk-label-primary">Perihal : <?php echo $u->Perihal?> </h4><br>
                                   </center>
                                        </div>
                                    </div>
                            <form action="<?php echo base_url(). 'admin/tambah_pegawai'; ?>" class="uk-form-horizontal uk-margin-large">

                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Nomor Surat</label>
                                    <div class="uk-form-controls">
                                                    
											<input list="nip" name="NIP" required placeholder="NAMA | NIP" class="uk-input">  
											<datalist id="nip">
											 <?php foreach($pegawai as $p): ?>
												<option value="<?php echo $p->NIP?>"><?php echo $p->Nama?> | <?php echo $p->NIP?></option>
											   
											 <?php endforeach ?>
											</datalist>
											
											<input type="hidden" name="Nomor_Surat" value="<?php echo $u->Nomor_Surat ?>">
                                    </div>
                                </div>

                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Jabatan</label>
                                    <div class="uk-form-controls">
                                        <input name="Jabatan"class="uk-input" id="form-horizontal-text" type="text" placeholder="Jabatan">
                                    </div>
                                </div>
                                   
                                
                                <center>
                                <div class="uk-margin">
                                    <button type="submit" class="uk-button uk-button-primary">
                                        <span class="ion-forward"></span>&nbsp; Tambah Detail Surat    
                                    </button>
                                </div>

                                </center>
                            </form>
	                                <?php endforeach ?>
                        </div>
    </div>
    <div class="uk-width-1-2@s">
    <div class="uk-container uk-container-xsmall">
   
    <div class="uk-background-muted uk-padding uk-panel">
    <table class="uk-table uk-table-small uk-table-divider">
    <thead>
        <tr>
            <th>Table Heading</th>
            <th>Table Heading</th>
            <th>Table Heading</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Table Data</td>
            <td>Table Data</td>
            <td>Table Data</td>
        </tr>
        <tr>
            <td>Table Data</td>
            <td>Table Data</td>
            <td>Table Data</td>
        </tr>
        <tr>
            <td>Table Data</td>
            <td>Table Data</td>
            <td>Table Data</td>
        </tr>
    </tbody>
</table>
        </div>

    
    </div>
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