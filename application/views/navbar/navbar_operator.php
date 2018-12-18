<li><a href="<?php echo base_url('operator/index'); ?>" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
<li>
    <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-users"></i> <span>Data Pegawai</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
    <div id="subPages" class="collapse ">
        <ul class="nav">
            <li><a href="<?php echo base_url('operator/pegawai');?>" class="">Semua Pegawai</a></li>
            <li><a href="<?php echo base_url('operator/dosen');?>" class="">Dosen</a></li>
            <li><a href="<?php echo base_url('operator/staff');?>" class="">Staff</a></li>
        </ul>
    </div>
</li>
<li><a href="<?php echo base_url('operator/reset_password'); ?>" class=""><i class="lnr lnr-users"></i> <span>Reset Password Pegawai</span></a></li>

<li><a href="<?php echo base_url('operator/tambahsurat'); ?>" class=""><i class="lnr lnr-plus-circle"></i> <span>Tambah Surat Tugas</span></a></li>
<li><a href="<?php echo base_url('operator/tampil_surat'); ?>" class=""><i class="lnr lnr-book"></i> <span>Data Surat Tugas</span></a></li>
<li>
    <a href="#subPageRekap" data-toggle="collapse" class="collapsed"><i class="lnr lnr-chart-bars"></i> <span>Rekap Surat Tugas</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
    <div id="subPageRekap" class="collapse ">
        <ul class="nav">
            <li><a href="<?php echo base_url('rekap/index');?>" class="">Rekap Surat Tugas</a></li>
            <li><a href="<?php echo base_url('rekap/rekapdosen');?>" class="">Rekap Dosen</a></li>
            <li><a href="<?php echo base_url('rekap/rekapstaff');?>" class="">Rekap Staff</a></li>
        </ul>
    </div>
</li>