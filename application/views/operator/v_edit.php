
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <!-- INPUTS -->
            <div class="panel">
                <div class="uk-card uk-card-default">
                        <div class="uk-card-header">
                            Edit Data Pegawai
                        </div>
                        <div class="uk-card-body">
	                                <?php foreach($pegawai as $u): ?>
                            <form action="<?php echo base_url(). 'admin/editPegawai'; ?>" method="POST" class="uk-form-horizontal uk-margin-large">

                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">NIP</label>
                                    <div class="uk-form-controls">
										<input name="NIP" class="uk-input" type="text" value="<?php echo $u->NIP ?>" required>
                                    </div>
                                </div>

								<div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Nama</label>
                                    <div class="uk-form-controls">
										<input name="Nama" class="uk-input" type="text" value="<?php echo $u->Nama ?>" required>
                                    </div>
                                </div>

                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Status</label>
                                    <div class="uk-form-controls">
                                                <select name="Status" class="form-control" required>
                                                    <option disabled selected>-Pilih-</option>
                                                    <option value="Dosen">Dosen</option>
                                                    <option value="Staff">Staff</option>
                                                </select>
                                    </div>
                                </div>
								
								 <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Pangkat</label>
                                    <div class="uk-form-controls">
										<input name="Pangkat" class="uk-input" type="text" value="<?php echo $u->Pangkat ?>" required>
                                    </div>
                                </div>
								
								 <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">No Telpon</label>
                                    <div class="uk-form-controls">
										<input name="No_Telp" class="uk-input" type="text" value="<?php echo $u->No_Telp ?>" required>
                                    </div>
                                </div>
								
								 <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Bagian</label>
                                    <div class="uk-form-controls">
                                    <input list ="Bagian"name="Bagian" class="uk-input" type="text" placeholder="Bagian" required>
                                    <datalist id = "Bagian">
                                    <?php 
                                    foreach($pegawai as $rows){ ?>
                                    <option value="<?php echo $rows->Sub_Bagian?>"> <?php echo $rows->Sub_Bagian;?></option>
                                    <?php } ?>
                                    </datalist>
                                    </div>
                                </div>
								
								 <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Sub Bagian</label>
                                    <div class="uk-form-controls">
										<input name="Sub_Bagian" class="uk-input" type="text" value="<?php echo $u->Sub_Bagian ?>" required>
                                    </div>
                                </div>
								
								 <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Urusan</label>
                                    <div class="uk-form-controls">
										<input name="Urusan" class="uk-input" type="text" value="<?php echo $u->Urusan ?>" required>
                                    </div>
                                </div>
                                   
                                
                                <center>
                                <div class="uk-margin">
                                    <button type="submit" class="uk-button uk-button-primary">
                                        <span class="ion-forward"></span>&nbsp; Simpan    
                                    </button>
                                </div>

                                </center>
                            </form>
	                                <?php endforeach ?>
                        </div>
                </div>
            </div>
            <!-- END INPUTS -->
            
        </div>
    </div>
</div>
    <!-- END MAIN CONTENT -->

<!-- END MAIN -->