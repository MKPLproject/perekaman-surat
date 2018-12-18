
<div class="main-content">
    <div class="container-fluid"><?php
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
        <div class="row">
            <!-- INPUTS -->
            <div class="panel">
                <div class="uk-card uk-card-default">
                        <div class="uk-card-header">
                            Tambah Surat tugas
                        </div>
                        <div class="uk-card-body">
                            <center>
                                <h4>Tambah Surat Tugas</h4><br />
                            </center>
                            <form action="<?php echo base_url().'operator/tambah_surat'; ?>" class="uk-form-horizontal uk-margin-large" method="post">

                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Nomor Surat</label>
                                    <div class="uk-form-controls">
                                        <input name="Nomor_Surat" pattern="[0-9]+/[A-Z0-9.]+/[A-Z]+\/[0-9]{4}$" class="uk-input" id="form-horizontal-text" type="text" required placeholder="Nomor Surat...">
                                    </div>
                                </div>

                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Tanggal Surat</label>
                                    <div class="uk-form-controls">
                                        <input name="Tanggal_Surat"class="uk-input" id="form-horizontal-text" type="date"  placeholder="Tanggal Surat">
                                    </div>
                                </div>

                                    <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Bulan Bayar</label>
                                    <div class="uk-form-controls">
                                        <input name="Bulan_Bayar" class="uk-input" name="Bulan_Bayar" id="form-horizontal-text" type="text" placeholder="Bulan Bayar">
                                    </div>
                                </div>

                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-select">Keterangan</label>
                                    <div class="uk-form-controls">
                                        <select name="Keterangan"class="uk-select" id="form-horizontal-select">
                                            <option value="">Select</option>
                                            <option value="Poin">Poin</option>
                                            <option value="Koin">Koin</option>
                                            <option Value="Non Remun">Non Remun</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Nama Kegiatan Remun</label>
                                    <div class="uk-form-controls">
                                        <input name="Nama_kegiatan_Remun" class="uk-input" id="form-horizontal-text" type="text" placeholder="Nama Kegiatan Remun">
                                    </div>
                                </div>

                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Perihal</label>
                                    <div class="uk-form-controls">
                                        <input name="Perihal" class="uk-input" id="form-horizontal-text" type="text" placeholder="Perihal">
                                    </div>
                                </div>

                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Link URL</label>
                                    <div class="uk-form-controls">
                                        <input name="Link_url" class="uk-input" id="form-horizontal-text" type="url" placeholder="Link URL">
                                    </div>
                                </div>

                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Keterangan tambahan</label>
                                    <div class="uk-form-controls">
                                        <input name="Ket" class="uk-input" id="form-horizontal-text" type="text" placeholder="Keterangan tambahan">
                                    </div>
                                </div>
                                
                                <center>
                                <div class="uk-margin">
                                    <button type="submit" class="uk-button uk-button-primary">
                                        <span class="ion-forward"></span>&nbsp; Tambah Surat    
                                    </button>
                                </div>

                                </center>
                            </form>
                        </div>
                </div>
            </div>
            <!-- END INPUTS -->
            
        </div>
    </div>
</div>
    <!-- END MAIN CONTENT -->

<!-- END MAIN -->