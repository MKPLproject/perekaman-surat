<li><a href="<?php echo base_url('admin/index'); ?>" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
<li>
    <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-users"></i> <span>Data Pegawai</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
    <div id="subPages" class="collapse ">
        <ul class="nav">
            <li><a href="<?php echo base_url('admin/pegawai');?>" class="">Semua Pegawai</a></li>
            <li><a href="<?php echo base_url('admin/dosen');?>" class="">Dosen</a></li>
            <li><a href="<?php echo base_url('admin/staff');?>" class="">Staff</a></li>
        </ul>
    </div>
</li>
<li><a href="<?php echo base_url('admin/reset_password'); ?>" class=""><i class="lnr lnr-users"></i> <span>Reset Password Pegawai</span></a></li>
<li><a href="<?php echo base_url('admin/data_admin/'); ?>" class=""><i class="lnr lnr-user"></i> <span>Data Admin & Operator</span></a></li>

<li><a href="<?php echo base_url('admin/tambahsurat'); ?>" class=""><i class="lnr lnr-plus-circle"></i> <span>Tambah Surat Tugas</span></a></li>
<li><a href="<?php echo base_url('admin/tampil_surat'); ?>" class=""><i class="lnr lnr-book"></i> <span>Data Surat Tugas</span></a></li>
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