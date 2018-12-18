<?php 

class Administrator extends CI_Controller{

	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged_in') == TRUE){
			 if($this->session->userdata('Status') == 'operator'){
				redirect('operator/index');
			}else if ($this->session->userdata('Bagian') != 'null' && $this->session->userdata('Sub_Bagian')=='null'){
				
				redirect('kbagian/index');
			}else if ($this->session->userdata('Bagian') != 'null' && $this->session->userdata('Sub_Bagian') != 'null' && $this->session->userdata('Urusan') =='null'){
				redirect('kasubag/index');
			}else if ($this->session->userdata('Bagian') != 'null' && $this->session->userdata('Sub_Bagian') != 'null' && $this->session->userdata('Urusan') !='null' && $this->session->userdata('jabatan') == 'kepala'){
				redirect('kaur/index');
			}else if ($this->session->userdata('Bagian') != 'null' && $this->session->userdata('Sub_Bagian') != 'null' && $this->session->userdata('Urusan') !='null' && $this->session->userdata('jabatan') == 'staff'){
				redirect('staff/index');
			}
		} else {
			redirect('auth/logout');
		}	
		$this->load->helper('url');
		$this->load->model('m_admin');
	}

	function index(){
		$tahun = date("Y");
		$data['main_view'] = 'admin/dashboard_view';
		$data['surattugas'] = $this->m_admin->get_bulan_surat_tahun($tahun);
		$data['pegawai'] = $this->m_admin->get_count_pegawai();
		$data['surat'] = $this->m_admin->get_count_surat();
		$data['periode'] = $this->m_admin->get_periode($tahun);
		$data['dosen'] = $this->m_admin->get_jum_surat_dosen($tahun);
		$data['staff'] = $this->m_admin->get_jum_surat_staff($tahun);
		$data['allstaff'] = $this->m_admin->get_bulan_surat_staff($tahun);
		$data['alldosen'] = $this->m_admin->get_bulan_surat_dosen($tahun);
		//$data['surattugas'] = $this->m_admin->get_jml_surat();
		//$data['surattugas'] = $this->m_admin->get_jml_pegawai();
		//$data['detail_st'] = $this->m_admin->get_aktif_person();   
		$this->load->view('template', $data);
	}

	function indeks(){
		$tahun = $this->input->post('tahun');
		$data['main_view'] = 'admin/dashboard_view';
		$data['surattugas'] = $this->m_admin->get_bulan_surat_tahun($tahun);
		$data['periode'] = $this->m_admin->get_periode($tahun);
		$data['surattugas'] = $this->m_admin->get_bulan_surat_tahun($tahun);
		$data['pegawai'] = $this->m_admin->get_count_pegawai();
		$data['surat'] = $this->m_admin->get_count_surat_tahun($tahun);
		$data['dosen'] = $this->m_admin->get_jum_surat_dosen($tahun);
		$data['staff'] = $this->m_admin->get_jum_surat_staff($tahun);
		$data['allstaff'] = $this->m_admin->get_bulan_surat_staff($tahun);
		$data['alldosen'] = $this->m_admin->get_bulan_surat_dosen($tahun);
		//$data['surattugas'] = $this->m_admin->get_jml_surat();
		//$data['surattugas'] = $this->m_admin->get_jml_pegawai();
		//$data['detail_st'] = $this->m_admin->get_aktif_person();   
		$this->load->view('template', $data);
	}

	function navbartest(){
		$data['main_view'] = 'admin/v_tambah_detail_surat';
		$this->load->view('template', $data);
	}

	function get_bulan(){
		
		$data['main_view'] = 'admin/v_bulan';
		$tahun = '2017';
		$data['dosen'] = $this->m_admin->get_bulan_surat_tahun($tahun);
		//$data['staff'] = $this->m_admin->get_bulan_surat_staff();
		$this->load->view('template', $data);
	}

	function tampil_surat(){
		$data['main_view'] = 'admin/v_tampil';
		$data['surattugas'] = $this->m_admin->tampil_surat();   
		$this->load->view('template', $data);
	}

	function excelsuratpegawaiperbulan($nip,$bulan){
		$data['detail_st'] = $this->m_admin->surat_perbulan_detail_form($nip,$bulan);
		$data['surattugas'] = $this->m_admin->surat_perbulan_detail($nip,$bulan);
		$data['surattugas'] = $this->m_admin->tampil_surat();   
		$this->load->view('admin/export/v_surat_tugas_pegawai_perbulan', $data);
	}

	function excelsurattugas(){
		$data['surattugas'] = $this->m_admin->tampil_surat();   
		$this->load->view('admin/export/excel_export_surat_tugas', $data);
	}

	function pdfsurattugas(){
		$data['surattugas'] = $this->m_admin->tampil_surat();   
		$this->load->view('admin/export/pdf_export_surat_tugas', $data);
	}

	// direct halaman ke url pdf online
	function lihatsuratpdf($url){
		redirect($url);
	}

	//function detail_surat($Nomor_Surat){
		//$data['detail_st'] = $this->m_admin->detail_surat($Nomor_Surat);   
		//$this->load->view('v_detail_surat', $data);
	//}

	function detail_surat($Nomor_Surat){
		$data['main_view'] = 'admin/v_detail_surat';
		$data2['main_view'] = 'admin/v_buat_detail_surat';
		$page = $_SERVER['PHP_SELF'];
		$values=explode("/",$page); 
		$length=sizeof($values); 
		$url=$values[$length-4].'/'.$values[$length-3].'/'.$values[$length-2].'/'.$values[$length-1]; 
		$cek = $this->m_admin->cek_ketersediaan_detail($url)->num_rows();
		if($cek > 0){
			$data['detail_st'] = $this->m_admin->detail_surat($url);   
			$data['surattugas'] = $this->m_admin->get_no_surat($url);   
			$this->load->view('template', $data);
		}else{ 	 
			print "<script type=\"text/javascript\">alert('Surat dengan nomor $url tidak mempunyai detail surat');</script>";	
			$data2['surattugas'] = $this->m_admin->get_no_surat($url);   
			$data2['pegawai'] = $this->m_admin->get_pegawai();
			$data2['detail_st'] = $this->m_admin->detail_surat($url);  
			$this->load->view('template', $data2);
		}
	}

	function tambahsurat(){
		$data['main_view'] = 'admin/v_tambah_surat_tugas';
		$this->load->view('template',$data);
	}

	function tambah_surat(){
		$Nomor_Surat = $this->input->post('Nomor_Surat');
		$Tanggal_Surat = $this->input->post('Tanggal_Surat');
		$Bulan_Bayar = $this->input->post('Bulan_Bayar');
		$Keterangan = $this->input->post('Keterangan');
		$Nama_kegiatan_Remun = $this->input->post('Nama_kegiatan_Remun');
		$Perihal = $this->input->post('Perihal');
		$Link_url = $this->input->post('Link_url');
		$Ket = $this->input->post('Ket');
 
		$cek = $this->m_admin->ceksurat($Nomor_Surat)->num_rows();
		if($cek > 0 ){
			$this->session->set_flashdata('notif', "Surat Tugas dengan Nomor $Nomor_Surat sudah terdaftar di sistem");
			redirect('admin/tambahsurat');
		}else{
			$data = array(
			'Nomor_Surat' => $Nomor_Surat,
			'Tanggal_Surat' => $Tanggal_Surat,
			'Bulan_Bayar' => $Bulan_Bayar,
			'Keterangan' => $Keterangan,
			'Nama_kegiatan_Remun' => $Nama_kegiatan_Remun,
			'Perihal' => $Perihal,
			'Link_url' => $Link_url,
			'Ket' => $Ket
			);
		$this->m_admin->tambah_surat($data,'surattugas');
		$data['pegawai'] = $this->m_admin->get_pegawai();   
		$data['surattugas'] = $this->m_admin->get_no_surat($Nomor_Surat);   
		$data['detail_st'] = $this->m_admin->detail_surat($Nomor_Surat); 
		print "<script type=\"text/javascript\">alert('Nomor Surat Berhasil Ditambahkan !');</script>";
		$data['main_view'] = 'admin/v_buat_detail_surat';
		$this->load->view('template', $data);	
		}
	}

	//mmembuat detail surat
	function detailsurat(){
		$page = $_SERVER['PHP_SELF'];
		$values=explode("/",$page); 
		$length=sizeof($values); 
		$url=$values[$length-4].'/'.$values[$length-3].'/'.$values[$length-2].'/'.$values[$length-1]; 
		$data['surattugas'] = $this->m_admin->get_no_surat($url);   
		$data['main_view'] = 'admin/v_buat_detail_surat';
		$this->load->view('template',$data);
	}

	
	function tampil_form_edit_surat($Nomor_Surat){
		$data['main_view'] = 'admin/v_edit_surat';
		$page = $_SERVER['PHP_SELF'];
		$values=explode("/",$page); 
		$length=sizeof($values); 
		$url=$values[$length-4].'/'.$values[$length-3].'/'.$values[$length-2].'/'.$values[$length-1];  
		$cek = $this->m_admin->cek_ketersediaan_detail($url)->num_rows();
		$data['surattugas'] = $this->m_admin->tampil_data_edit_surat($url);   
		$data['main_view'] = 'admin/v_edit_surat';
		$this->load->view('template', $data);
	}

	

	function update_surat_tugas(){
		$Nomor_Surat = $this->input->post('Nomor_Surat');
		$Tanggal_Surat = $this->input->post('Tanggal_Surat');
		$Bulan_Bayar = $this->input->post('Bulan_Bayar');
		$Keterangan = $this->input->post('Keterangan');
		$Nama_kegiatan_Remun = $this->input->post('Nama_kegiatan_Remun');
		$Perihal = $this->input->post('Perihal');
		$Link_url = $this->input->post('Link_url');
		$Ket = $this->input->post('Ket');
 
		$data = array(
			'Nomor_Surat' => $Nomor_Surat,
			'Tanggal_Surat' => $Tanggal_Surat,
			'Bulan_Bayar' => $Bulan_Bayar,
			'Keterangan' => $Keterangan,
			'Nama_Kegiatan_Remun' => $Nama_Kegiatan_Remun,
			'Perihal' => $Perihal,
			'Link_url' => $Link_url,
			'Ket' => $Ket
			);
	
		$where = array(
			'Nomor_Surat' => $Nomor_Surat
		);
	
		$this->m_admin->update_surat_tugas($where,$data,'surattugas');
		
		$this->session->set_flashdata('notif', "Surat Tugas Berhasil Di Update");
		redirect('admin/tampil_surat');
	}

	function hapus_surat_tugas($Nomor_Surat){
		$page = $_SERVER['PHP_SELF'];
		$values=explode("/",$page); 
		$length=sizeof($values); 
		$url=$values[$length-4].'/'.$values[$length-3].'/'.$values[$length-2].'/'.$values[$length-1]; 
		$cek = $this->m_admin->cek_ketersediaan_detail($url)->num_rows();
		$where = array('Nomor_Surat' => $url);
		if($cek > 0){	
			$this->m_admin->hapus_surat_tugas($where,'surattugas');
			$this->m_admin->hapus_detail_surat_tugas($where,'detail_st');
		}else{		
			$this->m_admin->hapus_surat_tugas($where,'surattugas');
		}
		$this->session->set_flashdata('notif', "Surat Tugas $url Berhasil Di Hapus !");
		redirect('admin/tampil_surat/');
	}

	function tampil_form_tambah_pegawai($Nomor_Surat){
		$page = $_SERVER['PHP_SELF'];
		$values=explode("/",$page); 
		$length=sizeof($values); 
		$url=$values[$length-4].'/'.$values[$length-3].'/'.$values[$length-2].'/'.$values[$length-1]; 
		$data['pegawai'] = $this->m_admin->get_pegawai();   
		$data['surattugas'] = $this->m_admin->get_no_surat($url);   
		$data['detail_st'] = $this->m_admin->detail_surat($url);  
		$data['main_view'] = 'admin/v_buat_detail_surat';
		$this->load->view('template', $data);
	}

	function tambah_pegawai(){
		$Nomor_Surat = $this->input->post('Nomor_Surat');
		$NIP = $this->input->post('NIP');
		$Jabatan = $this->input->post('Jabatan');
		$cek = $this->m_admin->cekdetail($Nomor_Surat,$NIP)->num_rows();
		if($cek > 0 ){
			
			$this->session->set_flashdata('notif', "Pegawai $nip sudah ditambahkan sebelumnya !");
			redirect('admin/tampil_form_tambah_pegawai/'.$Nomor_Surat);
		}else{
				$data = array(
				'Nomor_Surat' => $Nomor_Surat,
				'NIP' => $NIP,
				'Jabatan' => $Jabatan
			);
			$this->m_admin->tambah_pegawai($data,'detail_st');
			$this->session->set_flashdata('notif', "Pegawai $NIP berhasil ditambahkan !");
			redirect('admin/tampil_form_tambah_pegawai/'.$Nomor_Surat);
		}
	
	}

		// lihat list dosen dan staff
	function dosen(){
		$data['main_view'] = 'admin/v_dosen';
		$data['pegawai'] = $this->m_admin->tampildosen('dosen');
		$this->load->view('template',$data);
	}
	function staff(){
		$data['main_view'] = 'admin/v_staff';
		$data['pegawai'] = $this->m_admin->tampilstaff('staff');
		$this->load->view('template',$data);
	}

	function tambah_admin(){
		$data['main_view'] = 'admin/v_tambah_admin';
		$this->load->view('template',$data);
	}

	function tambahadmin(){
		$username = $this->input->post('username');
		$status = $this->input->post('Status');
		$password = $this->input->post('Password');
		if($cek > 0 ){
			$this->session->set_flashdata('notif', "username sudah terdaftar, gunakan username lain!");
			redirect('admin/tambah_admin/');
		}else{
			$data = array(
				'username' => $username,
				'Status' => $status,
				'Password' => $password
				);
			$this->m_admin->tambah_admin($data,'user');
			$this->session->set_flashdata('notif', "User baru berhasil ditambahkan!");
			redirect('admin/data_admin/');
		}
		
	}


	function hapus_pegawai(){
		$page = $_SERVER['PHP_SELF'];
		$values=explode("/",$page); 
		$length=sizeof($values); 
		$No_Surat=$values[$length-5].'/'.$values[$length-4].'/'.$values[$length-3].'/'.$values[$length-2]; 
		$NIP=$values[$length-1];
		$where = array('NIP' => $NIP);
		$this->m_admin->hapus_pegawai($where,'detail_st');
		$this->session->set_flashdata('notif', "Data Pegawai $NIP Berhasil Di Hapus !");
		redirect('admin/detail_surat/'.$No_Surat);
	}

	//mengedit detail surat per pegawai
	function tampil_form_edit_pegawai($Nomor_Surat){
		$page = $_SERVER['PHP_SELF'];
		$values=explode("/",$page); 
		$length=sizeof($values); 
		$No_Surat=$values[$length-5].'/'.$values[$length-4].'/'.$values[$length-3].'/'.$values[$length-2]; 
		$NIP=$values[$length-1];
		$data['detail_st'] = $this->m_admin->tampil_data_detail_surat_pegawai($No_Surat,$NIP);   
		$data['main_view'] = 'admin/v_edit_pegawai';
		$this->load->view('template', $data);
	}
	

	function update_pegawai(){
		$Nomor_Surat = $this->input->post('Nomor_Surat');
		$NIP = $this->input->post('NIP');
		$Jabatan = $this->input->post('Jabatan');
 
		$data = array(
			'Nomor_Surat' => $Nomor_Surat,
			'NIP' => $NIP,
			'Jabatan' => $Jabatan
			);
	
		$where = array(
			'Nomor_Surat' => $Nomor_Surat,
			'NIP' => $NIP
		);
	
		$this->m_admin->update_pegawai($where,$data,'detail_st');
		$this->session->set_flashdata('notif', "Data Pegawai $NIP Berhasil Di Ubah !");
		redirect('admin/detail_surat/'.$Nomor_Surat);
	}

	function tambah_detail_surat_tugas(){
		$Nomor_Surat = $this->input->post('Nomor_Surat');
		$NIP = $this->input->post('NIP');
		$Jabatan = $this->input->post('Jabatan');
 
		$data = array(
			'Nomor_Surat' => $Nomor_Surat,
			'NIP' => $NIP,
			'Jabatan' => $Jabatan,
			);
		$this->m_admin->tambah_detail_surat_tugas($data,'detail_st');
		$this->session->set_flashdata('notif', "Pegawai $NIP berhasil ditambahkan");
		redirect('admin/detail_surat/'.$Nomor_Surat);
	}

	function cari_surat(){
		$keyword = $_POST['keyword'];
		$this->load->model('m_admin');
		$data['surattugas'] = $this->m_admin->cari_surat_tugas($keyword);
		$this->load->view('admin/v_tampil', $data);
	}
    function pegawai(){
		$data['main_view'] = 'admin/v_pegawai';
		$data['pegawai'] = $this->m_admin->tampilPegawai()->result();
		$this->load->view('template', $data);
	}
	public function cari(){
		$data['main_view'] = 'admin/v_pegawai';
	$keyword = $this->input->get('cari', TRUE); //mengambil nilai dari form input cari
	$data['pegawai'] = $this->m_admin->cari($keyword); //mencari data karyawan berdasarkan inputan
	$this->load->view('template', $data); //menampilkan data yang sudah dicari
	}	
	
	function Surat($NIP){
		
		$data['main_view'] = 'admin/v_surat';
		$data2['main_view'] = 'admin/v_pegawai';
		$page = $_SERVER['PHP_SELF'];
		$values=explode("/",$page); 
		$length=sizeof($values); 
		$url=$values[$length-1]; 
		$cek = $this->m_admin->cek_ketersediaan_surat($url)->num_rows();
		if($cek > 0){
			$data['detail_st'] = $this->m_admin->SuratTugas($url);
			$this->load->view('template',$data);
		}else{
			print "<script type=\"text/javascript\">alert('Pegawai dengan NIP $url tidak mempunyai surat tugas');</script>";			 			 
			$data2['pegawai'] = $this->m_admin->tampilPegawai()->result();
			$this->load->view('template', $data2);
		}
	}

	function SuratStaff($NIP){
		
		$data['main_view'] = 'admin/v_surat';
		$data2['main_view'] = 'admin/v_staff';
		$page = $_SERVER['PHP_SELF'];
		$values=explode("/",$page); 
		$length=sizeof($values); 
		$url=$values[$length-1]; 
		$cek = $this->m_admin->cek_ketersediaan_surat($url)->num_rows();
		if($cek > 0){
			$data['detail_st'] = $this->m_admin->SuratTugas($url);
			$this->load->view('template',$data);
		}else{
			print "<script type=\"text/javascript\">alert('Pegawai dengan NIP $url tidak mempunyai surat tugas');</script>";			 			 
			$data2['pegawai'] = $this->m_admin->tampilPegawai()->result();
			$this->load->view('template', $data2);
		}
	}

	function SuratDosen($NIP){
		
		$data['main_view'] = 'admin/v_surat';
		$data2['main_view'] = 'admin/v_dosen';
		$page = $_SERVER['PHP_SELF'];
		$values=explode("/",$page); 
		$length=sizeof($values); 
		$url=$values[$length-1]; 
		$cek = $this->m_admin->cek_ketersediaan_surat($url)->num_rows();
		if($cek > 0){
			$data['detail_st'] = $this->m_admin->SuratTugas($url);
			$this->load->view('template',$data);
		}else{
			print "<script type=\"text/javascript\">alert('Pegawai dengan NIP $url tidak mempunyai surat tugas');</script>";			 			 
			$data2['pegawai'] = $this->m_admin->tampilPegawai()->result();
			$this->load->view('template', $data2);
		}
	}

	function filter_surat(){
		$data['main_view'] = 'admin/v_tampil_after_filter';
		$bln1 = $this->input->get('bln1');
		$bln2 = $this->input->get('bln2');
		$tahun = $this->input->get('tahun');
		$data['surattugas'] = $this->m_admin->filter_surat($bln1,$bln2,$tahun);
		$this->load->view('template',$data);
	}
		
	function PencarianSurat(){
		$data['main_view'] = 'admin/v_surattugas';
		$bln1 = $this->input->get('bln1');
		$bln2 = $this->input->get('bln2');
		$tahun = $this->input->get('tahun');
		$nip = $this->input->get('NIP');
		$data['detail_st'] = $this->m_admin->SuratTugs($bln1,$bln2,$tahun,$nip);
		$this->load->view('template',$data);
	}
	
	function input(){
		$data['pegawai'] = $this->m_admin->get_bagian();
		$data['main_view'] = 'admin/v_tambah';
		$this->load->view('template',$data);
	}
	function tambahPegawai(){
		$NIP = $this->input->post('NIP');
		$Nama = $this->input->post('Nama');
		$Status = $this->input->post('Status');
		$Pangkat = $this->input->post('Pangkat');
		$No_Telp = $this->input->post('No_Telp');
		$Bagian = $this->input->post('Bagian');
		$Urusan = $this->input->post('Urusan');
		$Sub_Bagian = $this->input->post('Sub_Bagian');
		$password = substr($NIP, -6);
		
		$data = array(
			'NIP' => $NIP,
			'Nama' => $Nama,
			'Status' => $Status,
			'Pangkat' => $Pangkat,
			'Password' =>$password,
			'No_Telp' =>$No_Telp,
			'Bagian' => $Bagian,
			'Sub_Bagian' => $Sub_Bagian,
			'Urusan' => $Urusan
			
		);
		$this->m_admin->tambahPegawai($data,'pegawai');
		$this->session->set_flashdata('notif', "Pegawai $NIP berhasil ditambahkan");
		redirect('admin/pegawai');
	}

	function hapus($NIP){
		$where = array('NIP' => $NIP);
		$this->m_admin->hapus_data($where,'pegawai');
		$this->session->set_flashdata('notif', "Data Pegawawi $NIP berhasil dihapus");
		redirect('admin/pegawai');
	}

	function update($NIP){
		$data['main_view'] = 'admin/v_edit';
		$where = array('NIP' => $NIP);
		$data['pegawai'] = $this->m_admin->edit_data($where,'pegawai')->result();
		$this->load->view('template',$data);
	}
	function edit_data($where,$table){
	 return $this->db->get_where($table,$where);
	}
	
	function editPegawai(){
		$NIP = $this->input->post('NIP');
		$Nama = $this->input->post('Nama');
		$Status = $this->input->post('Status');
		$Pangkat = $this->input->post('Pangkat');
		$No_Telp = $this->input->post('No_Telp');
		$Bagian = $this->input->post('Bagian');
		$Urusan = $this->input->post('Urusan');
		$Sub_Bagian = $this->input->post('Sub_Bagian');
		
		
		$data = array(
			'Nama' => $Nama,
			'Status' => $Status,
			'Pangkat' => $Pangkat,
			'Bagian' => $Bagian,
			'Sub_Bagian' => $Sub_Bagian,
			'Urusan' => $Urusan,
			'No_Telp' => $No_Telp
			
		
		);

		$where = array('NIP' => $NIP);

		$this->m_admin->update_data($where,$data,'pegawai');
		$this->session->set_flashdata('notif', "Data Pegawai $NIP berhasil di Update");
		redirect('admin/pegawai');
	}

	function data_admin(){
		$data['main_view'] = 'admin/v_data_admin';
		$data['user'] = $this->m_admin->getDataAdmin();   
		$this->load->view('template', $data);
	}

	function reset_password(){
		$data['main_view'] = 'admin/v_reset_password';
		$data['pegawai'] = $this->m_admin->tampilReset()->result();
		$this->load->view('template', $data);
	}
	
	function resetaksi(){
	$NIP = $this->input->post('NIP');	
		$data = array(
			'NIP' => $NIP
			
		
		);
			$where = array('NIP' => $NIP);
		
			$data['main_view'] = 'admin/v_reset_pass';
		$data['pegawai'] = $this->m_admin->resetpass($where,'pegawai')->result();
		$this->load->view('template', $data);
	
	}

	// rekap surat pegawai perbulan
	function rekapsurat($NIP){
		$data['main_view'] = 'admin/v_datasurat';
		//$data['detail_st'] = $this->m_admin->surat_bulan($NIP);
		$data['surat'] = $this->m_admin->surat_perbulan($NIP);
		$data['detail'] = $this->m_admin->rekap_surat_perbulan($NIP);
		$this->load->view('template',$data);
	}
	function detailrekapsuratform($NIP,$bulan){
		$data['main_view'] = 'admin/v_rekap_bulan_pegawai';
		//$data['detail_st'] = $this->m_admin->surat_perbulan_detail_form($NIP,$bulan);
		$data['surat_bulan'] = $this->m_admin->surat_perbulan_detail_form($NIP,$bulan);
		$data['surattugas'] = $this->m_admin->surat_perbulan_detail($NIP,$bulan);
		$this->load->view('template',$data);
	
	}

	} 
?>
