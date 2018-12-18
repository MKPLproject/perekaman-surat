<div class="content-background">
            <div class="uk-section-large">
                <div class="uk-container uk-container-large">
                    <div uk-grid class="uk-child-width-1-1@s uk-child-width-2-3@l">
                        <div class="uk-width-1-1@s uk-width-1-5@l uk-width-1-3@xl"></div>
                        <div class="uk-width-1-1@s uk-width-3-5@l uk-width-1-3@xl">
                            <div class="uk-card uk-card-default">
                                <div class="uk-card-header">
                                    Tambah Admin & Operator
                                </div>
                                <div class="uk-card-body">
                                    <form action="<?php echo base_url(). 'admin/tambahadmin'; ?>" method="POST">
                                        <fieldset class="uk-fieldset">

                                            <div class="uk-margin">
                                                <div class="uk-position-relative">
                                                    <span class="uk-form-icon ion-edit"></span>
                                                    <input name="username" class="uk-input" type="text" placeholder="username" required>     
                                                </div>
                                            </div>
                                            
                                            <div class="uk-margin">
                                                <div class="uk-position-relative">
                                                <select name="Status" class="uk-select" required>
                                                    <option value="">Status</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="admin">Operator</option>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="uk-margin">
                                                <div class="uk-position-relative">
                                                    <span class="uk-form-icon ion-edit"></span>
                                                    <input name="Password" class="uk-input" type="text" placeholder="password" required>
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
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-1-1@s uk-width-1-5@l uk-width-1-3@xl"></div>
                    </div>
                </div>
            </div>
        </div>

        
        <script src="<?php echo base_url(); ?>/assets/js/script.js"></script>