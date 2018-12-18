

<div class="content-background">
            <div class="uk-section-large">
                <div class="uk-container uk-container-large">
                    <div uk-grid class="uk-child-width-1-1@s uk-child-width-2-3@l">
                        <div class="uk-width-1-1@s uk-width-1-5@l uk-width-1-3@xl"></div>
                        <div class="uk-width-1-1@s uk-width-3-5@l uk-width-1-3@xl">
                            <div class="uk-card uk-card-default">
                                <div class="uk-card-header">
                                    Konfirmasi Reset Password
                                </div>
                                <div class="uk-card-body">
                                    
                                <form class="uk-form-horizontal uk-margin-large" action="<?php echo base_url(). 'operator/pass'; ?>" method="post">

                                <?php foreach($pegawai as $u){ ?>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">NIP</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input" name="NIP" id="form-horizontal-text" type="text" value = "<?php echo $u->NIP ?>">
                                        
                                    </div>
                                </div>

                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Nama</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input" name="Nama" value= "<?php echo $u->Nama ?>" id="form-horizontal-text" type="text" >
                                        
					                    <input type="hidden" name="Password" value= "<?php echo substr ($u->NIP,-6) ?>">
                                        
                                    </div>
                                </div>

                                <center>
                                <div class="uk-margin">
                                    <button type="submit" class="uk-button uk-button-primary">
                                        <span class="ion-forward"></span>&nbsp; Reset Password
                                    </button>
                                </div>
                                
                                </center>

                                <?php } ?>
                                </form>
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-1-1@s uk-width-1-5@l uk-width-1-3@xl"></div>
                    </div>
                </div>
            </div>
        </div>

        
        <script src="<?php echo base_url(); ?>/assets/js/script.js"></script>