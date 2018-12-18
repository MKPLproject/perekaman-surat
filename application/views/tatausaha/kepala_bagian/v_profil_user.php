
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <!-- INPUTS -->
            <div class="panel">
                <div class="uk-card uk-card-default">
                        <div class="uk-card-header">
                                    DATA kbagian
                                </div>
                                <div class="uk-card-body">
	                                <?php foreach($user as $u): ?>
                                    <center>
                                        <h2>Edit Password </h2>
                                    </center>
                                    <form class="uk-form-horizontal uk-margin-large" action="<?php echo base_url(). 'auth/update_password'; ?>" method="POST">
                                        <fieldset class="uk-fieldset">
                                        <div class="uk-margin">
                                            <label class="uk-form-label" for="form-horizontal-text">Username</label>
                                            <div class="uk-form-controls">
                                                <p><?php echo $u->username ?></p>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <label class="uk-form-label" for="form-horizontal-text">Password Lama</label>
                                            <div class="uk-form-controls">
                                                <input required class="uk-input" name="password_lama" id="form-horizontal-text" type="password" placeholder="Password lama">
                                            </div>
                                        </div>

                                        <div class="uk-margin">
                                            <label class="uk-form-label" for="form-horizontal-text">Password baru</label>
                                            <div class="uk-form-controls">
                                                <input required class="uk-input" name="password_baru" id="form-horizontal-text" type="password" placeholder="Password baru">
                                            
                                                <input type="hidden" name="username" value="<?php echo $u->username ?>">
                                            </div>
                                        </div>
                                        <center>
                                        
                                        <div class="uk-margin">
                                                <button type="submit" class="uk-button uk-button-primary">
                                                    <span class="ion-forward"></span>&nbsp; Simpan
                                                </button>
                                            </div>
                                        </center>


                                        </fieldset>
                                            <hr />
                                    </form>
	                                <?php endforeach ?>
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