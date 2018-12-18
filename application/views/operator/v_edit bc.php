<div class="content-background">
            <div class="uk-section-xsmall">
                <div class="uk-container uk-container-large">
                    <div uk-grid class="uk-child-width-1-1@s uk-child-width-2-3@l">
                        <div class="uk-width-1-1@s uk-width-1-5@l uk-width-1-3@xl"></div>
                        <div class="uk-width-1-1@s uk-width-3-5@l uk-width-1-3@xl">
                            <div class="uk-card uk-card-default">
                                <div class="uk-card-header">
                                    Edit Data Pegawai ok
                                </div>
                                <div class="uk-card-body">
	                                <?php foreach($pegawai as $u): ?>
                                    <form action="<?php echo site_url(). 'operator/editPegawai'; ?>" method="post">
                                        <fieldset class="uk-fieldset">
                                            <div class="uk-margin">
                                                <div class="uk-position-relative">
                                                <input name="NIP" class="uk-input" type="text" value="<?php echo $u->NIP ?>" required>
                                                </div>
                                            </div>
                                            <div class="uk-margin">
                                                <div class="uk-position-relative">
                                                <input name="Nama" class="uk-input" type="text" value="<?php echo $u->Nama ?>" required>
                                                </div>
                                            </div>
                                            <div class="uk-margin">
                                                <div class="uk-position-relative">
                                                <select name="Status" class="form-control" required>
                                                    <option disabled selected>-Pilih-</option>
                                                    <option value="Dosen">Dosen</option>
                                                    <option value="Staff">Staff</option>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="uk-margin">
                                                <div class="uk-position-relative">
                                                <input name="Pangkat" class="uk-input" type="text" value="<?php echo $u->Pangkat ?>" required>
                                                </div>
                                            </div>
                                            <div class="uk-margin">
                                                <div class="uk-position-relative">
                                                <input name="No_Telp" class="uk-input" type="text" value="<?php echo $u->No_Telp ?>" required>
                                                </div>
                                            </div>
                                            <div class="uk-margin">
                                                <div class="uk-position-relative">
                                                <input name="Bagian" class="uk-input" type="text" value="<?php echo $u->Bagian ?>" required>
                                                </div>
                                            </div>
                                            <div class="uk-margin">
                                                <div class="uk-position-relative">
                                                <input name="Sub_Bagian" class="uk-input" type="text" value="<?php echo $u->Sub_Bagian ?>" required>
                                                </div>
                                            </div>
                                            <div class="uk-margin">
                                                <div class="uk-position-relative">
                                                <input name="Urusan" class="uk-input" type="text" value="<?php echo $u->Urusan ?>" required>
                                                </div>
                                            </div>



                                            <div class="uk-margin">
                                                <button type="submit" class="uk-button uk-button-primary">
                                                    <span class="ion-forward"></span>&nbsp; Simpan
                                                </button>
                                            </div>

                                            <hr />
                                        </fieldset>
                                    </form>
	                                <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-1-1@s uk-width-1-5@l uk-width-1-3@xl"></div>
                    </div>
                </div>
            </div>
        </div>

        
        <script src="<?php echo base_url(); ?>/assets/js/script.js"></script>