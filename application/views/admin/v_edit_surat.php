
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="panel">
                <div class="uk-card uk-card-default">
                        <div class="uk-card-header">
                            Edit Surat tugas
                        </div>
                        <div class="uk-card-body">
                            <center>
                                <h4>Edit Surat Tugas</h4><br />
                            </center>
	                    <?php foreach($surattugas as $u): ?>
                            <form action="<?php echo base_url().'admin/update_surat_tugas/' ?>" class="uk-form-horizontal uk-margin-large">

                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Nomor Surat</label>
                                    <div class="uk-form-controls">
                                        <input name="Nomor_Surat" class="uk-input" id="form-horizontal-text" type="text" required value="<?php echo $u->Nomor_Surat ?>">
                                    </div>
                                </div>

                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Tanggal Surat</label>
                                    <div class="uk-form-controls">
					                    <input class="uk-input" type="date" name="Tanggal_Surat" value="<?php echo $u->Tanggal_Surat ?>">
                                    </div>
                                </div>

                                    <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Bulan Bayar</label>
                                    <div class="uk-form-controls">
                                        <input name="Bulan_Bayar" class="uk-input" name="Bulan_Bayar" id="form-horizontal-text" type="text" required  value="<?php echo $u->Bulan_Bayar ?>">
                                    </div>
                                </div>

                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-select">Keterangan</label>
                                    <div class="uk-form-controls">
                                        <select name="Keterangan"class="uk-select" required id="form-horizontal-select">
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
                                        <input name="Nama_kegiatan_Remun" class="uk-input" id="form-horizontal-text" required type="text" value="<?php echo $u->Nama_kegiatan_Remun ?>">
                                    </div>
                                </div>

                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Perihal</label>
                                    <div class="uk-form-controls">
                                        <input name="Perihal" class="uk-input" id="form-horizontal-text" required type="text" value="<?php echo $u->Perihal ?>">
                                    </div>
                                </div>

                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Link URL</label>
                                    <div class="uk-form-controls">
                                        <input name="Link_url" class="uk-input" id="form-horizontal-text"  requiredtype="text" value="<?php echo $u->Link_url ?>">
                                    </div>
                                </div>

                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Keterangan tambahan</label>
                                    <div class="uk-form-controls">
                                        <input name="Ket" class="uk-input" id="form-horizontal-text" required type="text" value="<?php echo $u->Ket ?>">
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
            
        </div>
    </div>
</div>