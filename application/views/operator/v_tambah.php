
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <!-- INPUTS -->
            <div class="panel">
                <div class="uk-card uk-card-default">
                
                        <div class="uk-card-header">
                            Tambah Data Pegawai
                            
                           
                        
                        </div>
                        <div class="uk-card-body">
                            <form action="<?php echo base_url(). 'operator/tambahPegawai'; ?>" class="uk-form-horizontal uk-margin-large" method="POST">

                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">NIP</label>
                                    <div class="uk-form-controls">
										<input name="NIP" class="uk-input" type="text"  required>
                                    </div>
                                </div>

								<div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Nama</label>
                                    <div class="uk-form-controls">
										<input name="Nama" class="uk-input" type="text"  required>
                                    </div>
                                </div>

                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Status</label>
                                    <div class="uk-form-controls">
                                    <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                                        <label><input class="uk-radio" type="radio" name="Status" value="Dosen"checked> Dosen</label>
                                        <label><input class="uk-radio" type="radio" name="Status" value="Staff"> Staff</label>
                                    </div>
                                    </div>
                                </div>
								
								 <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Pangkat</label>
                                    <div class="uk-form-controls">
										<input name="Pangkat" class="uk-input" type="text"  required>
                                    </div>
                                </div>
								
								 <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">No Telpon</label>
                                    <div class="uk-form-controls">
										<input name="No_Telp" class="uk-input" type="text" required>
                                    </div>
                                </div>
								
								 <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Bagian</label>
                                    <div class="uk-form-controls">
                                    <input list ="Bagian"name="Bagian" class="uk-input" type="text" placeholder="Ketik Sebagian karakter, dan akan muncul pilihan" required>
                                    <datalist id = "Bagian">
                                        <?php 
                                         $arr = array();
                                         foreach($pegawai as $value){
                                             $arr[$value->Bagian] = $value->Bagian;
                                         }
                                         foreach($arr as $bag){?>
                                        <option value="<?php echo $bag?>"> <?php echo $bag;?></option>
                                        <?php  }?>
                                    </datalist>
                                    </div>
                                </div>
								
								 <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Sub Bagian</label>
                                    <div class="uk-form-controls">
										<input list="Sub_Bagian"name="Sub_Bagian" class="uk-input" type="text"  placeholder="Ketik Sebagian karakter, dan akan muncul pilihan" required>
                                    <datalist id = "Sub_Bagian">
                                        <?php 
                                         $arr = array();
                                         foreach($pegawai as $value){
                                             $arr[$value->Sub_Bagian] = $value->Sub_Bagian;
                                         }
                                         foreach($arr as $bag){?>
                                        <option value="<?php echo $bag?>"> <?php echo $bag;?></option>
                                        <?php  }?>
                                    </datalist>
                                    </div>
                                </div>
								
								 <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Urusan</label>
                                    <div class="uk-form-controls">
										<input list="Urusan" name="Urusan" class="uk-input" type="text" placeholder="Ketik Sebagian karakter, dan akan muncul pilihan" required>
                                        <datalist id = "Urusan">
                                        <?php 
                                         $arr = array();
                                         foreach($pegawai as $value){
                                             $arr[$value->Urusan] = $value->Urusan;
                                         }
                                         foreach($arr as $bag){?>
                                        <option value="<?php echo $bag?>"> <?php echo $bag;?></option>
                                        <?php  }?>
                                    </datalist>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text">Jabatan</label>
                                    <div class="uk-form-controls">
                                    <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                                        <label><input class="uk-radio" type="radio" name="Status" value="Kepala"checked> Kepala</label>
                                        <label><input class="uk-radio" type="radio" name="Status" value="Staff"> Staff</label>
                                    </div>
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
                        </div>
                </div>
            </div>
            <!-- END INPUTS -->
            
        </div>
    </div>
</div>
    <!-- END MAIN CONTENT -->

<!-- END MAIN -->