<div class="content-background">
            <div class="uk-section-large">
                <div class="uk-container uk-container-large">
                    <div uk-grid class="uk-child-width-1-1@s uk-child-width-2-3@l">
                        <div class="uk-width-1-1@s uk-width-1-5@l uk-width-1-3@xl"></div>
                        <div class="uk-width-1-1@s uk-width-3-5@l uk-width-1-3@xl">
                            <div class="uk-card uk-card-default">
                                <div class="uk-card-header">
                                    Edit Detail Surat
                                </div>
                                <div class="uk-card-body">
	                                <?php foreach($detail_st as $u): ?>
                                    <center>
                                        <h2>Nomor Surat : </h2>
                                        <h4><?php echo $u->Nomor_Surat ?></h4>
                                    </center>
                                    <form action="<?php echo base_url(). 'admin/update_pegawai'; ?>" method="POST">
                                        <fieldset class="uk-fieldset">
                                            <center>
                                                <div class="uk-margin">
                                                    <div class="uk-position-relative">
                                                        <label class="uk-form-label" for="form-horizontal-text">NIP  : <?php echo $u->NIP ?></label>                         
                                                        <input type="hidden" name="Nomor_Surat" value="<?php echo $u->Nomor_Surat ?>">
                                                        <input type="hidden" name="NIP" value="<?php echo $u->NIP ?>">
                                                </div>
                                                </div>
                                                <div class="uk-margin">
                                                    <div class="uk-position-relative">
                                                        <label class="uk-form-label" for="form-horizontal-text">Nama : <?php echo $u->Nama ?></label>
                                                </div>
                                                </div>
                                            </center>
                                            
                                            <div class="uk-margin">
                                                <div class="uk-position-relative">
                                                    <span class="uk-form-icon ion-edit"></span>
                                                    <input name="Jabatan" class="uk-input" type="text" value="<?php echo $u->Jabatan ?>" required>
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