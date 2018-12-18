<?php 

class M_kbagian extends CI_Model{
	public function __construct()
    {
        $this->load->database();
	}
	
	function get_bulan(){
		$this->db->select('*');
		$this->db->select('date_format(Tanggal_Surat,"%b-%y") as bulan');
		$this->db->from('surattugas');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_count_pegawai(){
		
		$b = $this->session->userdata('Bagian');
		$sb = $this->session->userdata('Sub_Bagian');
		$u = $this->session->userdata('Urusan');
		$j = $this->session->userdata('jabatan');
		$this->db->select('NIP ,count(*) as countPegawai');
		$this->db->from('pegawai');
		$this->db->where('pegawai.Bagian',$b);
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_count_surat(){
		$this->db->select('Nomor_Surat ,count(*) as countSurat');
		$this->db->from('surattugas');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_periode($tahun){
		$this->db->select('date_format(Tanggal_Surat,"%Y") as periode');
		$this->db->from('surattugas');
		$this->db->where('YEAR(surattugas.Tanggal_Surat)',$tahun);
		$this->db->group_by('periode');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_count_surat_tahun($tahun){
		$this->db->select('Nomor_Surat ,count(*) as countSurat');
		$this->db->from('surattugas');
		$this->db->where('YEAR(surattugas.Tanggal_Surat)',$tahun);
		$query = $this->db->get();
		return $query->result_array();
	}


	function get_bulan_surat(){
		$this->db->select('Nomor_Surat ,count(*) as jum');
		$this->db->select('date_format(Tanggal_Surat,"%m") as bulan');
		$this->db->from('surattugas');
		$this->db->group_by('bulan');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_bulan_surat_staff($tahun){
		$this->db->select('surattugas.Nomor_Surat ,count(*) as jum_surat_staff');
		$this->db->select('date_format(surattugas.Tanggal_Surat,"%m") as bulan');
		$this->db->from('detail_st');
		$this->db->join('surattugas', 'surattugas.Nomor_Surat=detail_st.Nomor_Surat');
		$this->db->join('pegawai', 'pegawai.NIP=detail_st.NIP');
		$this->db->group_by('bulan');
		$this->db->where('pegawai.Status','Staff');
		$this->db->where('YEAR(surattugas.Tanggal_Surat)',$tahun);
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_bulan_surat_dosen($tahun){
		$this->db->select('detail_st.Nomor_Surat ,count(*) as jum_surat_dosen');
		$this->db->select('date_format(surattugas.Tanggal_Surat,"%m") as bulan');
		$this->db->from('detail_st');
		$this->db->join('surattugas', 'surattugas.Nomor_Surat=detail_st.Nomor_Surat');
		$this->db->join('pegawai', 'pegawai.NIP=detail_st.NIP');
		$this->db->group_by('bulan');
		$this->db->where('pegawai.Status','Dosen');
		$this->db->where('YEAR(surattugas.Tanggal_Surat)',$tahun);
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_bulan_surat_tahun($tahun){
		$this->db->select('Nomor_Surat ,count(*) as jum');
		$this->db->select('date_format(Tanggal_Surat,"%m") as bulan');
		$this->db->from('surattugas');
		$this->db->group_by('bulan');
		$this->db->where('YEAR(surattugas.Tanggal_Surat)',$tahun);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_bulan_surat_pribadi_tahun($tahun){
		$nip = $this->session->userdata('NIP');
		$this->db->select('*');
		$this->db->select('detail_st.Nomor_Surat ,count(*) as jum_surat_pribadi');
		$this->db->select('date_format(surattugas.Tanggal_Surat,"%m") as bulan');
		$this->db->from('detail_st');
		$this->db->join('surattugas', 'surattugas.Nomor_Surat=detail_st.Nomor_Surat');
		$this->db->join('pegawai', 'pegawai.NIP=detail_st.NIP');
		$this->db->group_by('bulan');
		$this->db->where('pegawai.NIP',$nip);
		$this->db->where('YEAR(surattugas.Tanggal_Surat)',$tahun);
		$query = $this->db->get();
		return $query->result_array();
	}
	function get_jum_surat_dosen($tahun){
		$this->db->select('*');
		$this->db->select('surattugas.Tanggal_Surat');
		$this->db->select('detail_st.Nomor_Surat ,count(*) as jumSurat');
		$this->db->from('detail_st');
		$this->db->join('surattugas', 'surattugas.Nomor_Surat=detail_st.Nomor_Surat');
		$this->db->join('pegawai', 'pegawai.NIP=detail_st.NIP');
		$this->db->group_by('detail_st.NIP');
		$this->db->order_by("jumSurat", "DESC");
		$this->db->where('pegawai.Status','Dosen');
		$this->db->where('YEAR(surattugas.Tanggal_Surat)',$tahun);
		$this->db->limit('5');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_jum_surat_staff($tahun){
		$this->db->select('*');
		$this->db->select('surattugas.Tanggal_Surat');
		$this->db->select('detail_st.Nomor_Surat ,count(*) as jumSurat');
		$this->db->from('detail_st');
		$this->db->join('surattugas', 'surattugas.Nomor_Surat=detail_st.Nomor_Surat');
		$this->db->join('pegawai', 'pegawai.NIP=detail_st.NIP');
		$this->db->group_by('detail_st.NIP');
		$this->db->order_by("jumSurat", "DESC");
		$this->db->where('YEAR(surattugas.Tanggal_Surat)',$tahun);
		$this->db->where('pegawai.Status','Staff');
		$this->db->limit('5');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_jum_surat_pribadi_pertahun($tahun){
		$nip = $this->session->userdata('NIP');
		$this->db->select('detail_st.Nomor_Surat ,count(*) as jumSuratPeribadiPertahun');
		$this->db->from('detail_st');
		$this->db->join('surattugas', 'surattugas.Nomor_Surat=detail_st.Nomor_Surat');
		$this->db->join('pegawai', 'pegawai.NIP=detail_st.NIP');
		$this->db->where('pegawai.NIP',$nip);
		$this->db->where('YEAR(surattugas.Tanggal_Surat)',$tahun);
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_jum_surat_bagian($tahun){
		$b = $this->session->userdata('Bagian');
		$this->db->select('*');
		$this->db->select('surattugas.Tanggal_Surat');
		$this->db->select('detail_st.Nomor_Surat ,count(*) as jumSuratBagian');
		$this->db->from('detail_st');
		$this->db->join('surattugas', 'surattugas.Nomor_Surat=detail_st.Nomor_Surat');
		$this->db->join('pegawai', 'pegawai.NIP=detail_st.NIP');
		$this->db->group_by('detail_st.NIP');
		$this->db->order_by("jumSuratBagian", "DESC");
		$this->db->where('YEAR(surattugas.Tanggal_Surat)',$tahun);
		$this->db->where('pegawai.Bagian',$b);
		$this->db->limit('5');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_jum_surat_bagian_terendah($tahun){
		$b = $this->session->userdata('Bagian');
		$this->db->select('*');
		$this->db->select('surattugas.Tanggal_Surat');
		$this->db->select('detail_st.Nomor_Surat ,count(*) as jumSuratBagianTerendah');
		$this->db->from('detail_st');
		$this->db->join('surattugas', 'surattugas.Nomor_Surat=detail_st.Nomor_Surat');
		$this->db->join('pegawai', 'pegawai.NIP=detail_st.NIP');
		$this->db->group_by('detail_st.NIP');
		$this->db->order_by("jumSuratBagianTerendah", "ASC");
		$this->db->where('YEAR(surattugas.Tanggal_Surat)',$tahun);
		$this->db->where('pegawai.Bagian',$b);
		$this->db->limit('5');
		$query = $this->db->get();
		return $query->result_array();
	}

	function tampil_surat(){
		$b = $this->session->userdata('Bagian');
		$sb = $this->session->userdata('Sub_Bagian');
		$u = $this->session->userdata('Urusan');
		$j = $this->session->userdata('jabatan');
		$nip= $this->session->userdata('NIP');
		$this->db->select('*');
		$this->db->from('detail_st');
		$this->db->join('surattugas', 'surattugas.Nomor_Surat=detail_st.Nomor_Surat');
		$this->db->join('pegawai', 'pegawai.NIP=detail_st.NIP');
		$this->db->where('detail_st.NIP',$nip);
		$query = $this->db->get();
		return $query->result();
	}

	function detail_surat($Nomor_Surat){
		$this->db->select('*');
		$this->db->from('detail_st');
		$this->db->join('surattugas', 'surattugas.Nomor_Surat=detail_st.Nomor_Surat');
		$this->db->join('pegawai', 'pegawai.NIP=detail_st.NIP');
		$this->db->where('detail_st.Nomor_Surat',$Nomor_Surat);
		$query = $this->db->get();
		return $query->result();
	}

	function tampil_data_edit_surat($Nomor_Surat){		
		$this->db->select('*');
		$this->db->from('surattugas');
		$this->db->where('Nomor_Surat',$Nomor_Surat);
		$query = $this->db->get();
		return $query->result();
	}

	function tampil_data_detail_surat_pegawai($Nomor_Surat,$NIP){		
		$this->db->select('*');
		$this->db->from('detail_st');
		$this->db->join('surattugas', 'surattugas.Nomor_Surat=detail_st.Nomor_Surat');
		$this->db->join('pegawai', 'pegawai.NIP=detail_st.NIP');
		$this->db->where('detail_st.Nomor_Surat',$Nomor_Surat);
		$this->db->where('detail_st.NIP',$NIP);
		$query = $this->db->get();
		return $query->result();
	}

	function get_no_surat($Nomor_Surat){		
		$this->db->select('*');
		$this->db->from('surattugas');
		$this->db->where('Nomor_Surat',$Nomor_Surat);
		$query = $this->db->get();
		return $query->result();
	}

	function tampil_no_surat($Nomor_Surat){		
		$this->db->select('Nomor_Surat');
		$this->db->from('detail_st');
		$this->db->where('Nomor_Surat',$Nomor_Surat);
		$query = $this->db->get();
		return $query->result();
	}

	function tambah_surat($data,$table){
		$this->db->insert($table,$data);
	}

	function hapus_surat_tugas($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function hapus_detail_surat_tugas($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function update_surat_tugas($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}



	function get_NIP_Pegawai($NIP){
		$this->db->select('NIP');
		$this->db->from('Pegawai');
		$this->db->where('NIP',$NIP);
		$query = $this->db->get();
		return $query->result();
	}


	function tambah_admin($data,$table){
		$this->db->insert($table,$data);
	}

	function cek_ketersediaan_detail($Nomor_Surat){
		$this->db->select('*');
		$this->db->from('detail_st');
		$this->db->where('Nomor_Surat',$Nomor_Surat);
		$query = $this->db->get();
		return $query;
	}

	function tambah_detail_surat_tugas($data,$table){
		$this->db->insert($table,$data);
	}

	function cari_surat_tugas($keyword)
    {
		$cari = $this->input->GET('cari', TRUE);
        $data = $this->db->query("SELECT * from surattugas where Name like '%$cari%' ");
        return $data->result();
    }

    public function get_jml_pegawai(){
		return $this->db->select('count(*) as jml_pegawai')
					    ->get('pegawai')
					    ->row();
	}

	public function get_jml_surat(){
	}

	public function get_aktif_person(){
		return $this->db->select('count(*) as jml_pengguna')
					    ->get('user')
					    ->row();
	}
	//HANS
    function tampilPegawaiTU(){
		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->where('pegawai.Bagian','Tata Usaha');
		$query = $this->db->get();
		return $query->result();
	}
	function tampilPegawaiTU_SubBagian($sub){
		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->where('pegawai.Bagian','Tata Usaha');
		$this->db->where('pegawai.Sub_Bagian',$sub);
		$query = $this->db->get();
		return $query->result();
	}

	public function cari($keyword){
	$this->db->like('NIP', $keyword)->
	or_like('Nama', $keyword)->
	or_like('Status', $keyword)->
	or_like('Pangkat', $keyword);
	return $this->db->get('pegawai')->result();

	}	
		
	function SuratTugas($NIP){
	$this->db->select('*');
	$this->db->from('detail_st');
	$this->db->join('pegawai', 'pegawai.NIP = detail_st.NIP');
	$this->db->join('surattugas', 'surattugas.Nomor_Surat = detail_st.Nomor_Surat' );
	$this->db->where('pegawai.NIP',$NIP);
	$query = $this->db->get();
	return $query->result();
	}
	
	function SuratTugs($bln1,$bln2,$tahun,$nip){
	$this->db->select('*');
	$this->db->from('detail_st');
	$this->db->join('pegawai', 'pegawai.NIP = detail_st.NIP');
	$this->db->join('surattugas', 'surattugas.Nomor_Surat = detail_st.Nomor_Surat' );
	$this->db->where('MONTH(surattugas.Tanggal_Surat)>=',$bln1);
	$this->db->where('MONTH(surattugas.Tanggal_Surat)<=',$bln2);
	$this->db->where('YEAR(surattugas.Tanggal_Surat)',$tahun);
	$this->db->where('pegawai.NIP',$nip); 
	$query = $this->db->get();
	return $query->result();
	}

	function getDataAdmin(){
		$this->db->select('*');
		$this->db->from('user');
		$query = $this->db->get();
		return $query->result();
	}
	
	function tampilReset(){
		return $this->db->get('pegawai');
	}
	function resetpass($where,$table){
	return $this->db->get_where($table,$where);	

		
	}
	function updatedatapassword($where,$data,$table){
	$this->db->where($where);
	$this->db->update($table,$data);
	}	

	function surat_rekap_perbulan($nip){	
		$this->db->select('*');
		$this->db->select('date_format(Tanggal_Surat,"%m") as bulan');
		$this->db->select('detail_st.Nomor_Surat ,count(*) as jumSurat');
		$this->db->from('detail_st');
		$this->db->join('surattugas', 'surattugas.Nomor_Surat=detail_st.Nomor_Surat');
		$this->db->join('pegawai', 'pegawai.NIP=detail_st.NIP');
		$this->db->group_by('detail_st.NIP');
		$this->db->group_by('bulan');
		$this->db->where('detail_st.NIP',$nip);
		$this->db->order_by("bulan", "DESC");
		$query = $this->db->get();
		return $query->result_array();
	}


	function rekap_surat_perbulan($nip){
		$this->db->select('*');
		$this->db->select('date_format(Tanggal_Surat,"%m") as bulan');
		$this->db->from('detail_st');
		$this->db->join('surattugas', 'surattugas.Nomor_Surat=detail_st.Nomor_Surat');
		$this->db->join('pegawai', 'pegawai.NIP=detail_st.NIP');
		$this->db->where('detail_st.NIP',$nip);
		$this->db->order_by("Tanggal_Surat", "DESC");
		$query = $this->db->get();
		return $query->result_array();
	}


	function surat_perbulan($nip){
		$this->db->select('*');
		$this->db->from('detail_st');
		$this->db->join('pegawai', 'pegawai.NIP = detail_st.NIP');
		$this->db->join('surattugas', 'surattugas.Nomor_Surat = detail_st.Nomor_Surat' );
		$this->db->where('pegawai.NIP',$nip);
		//$this->db->group_by('MONTH(surattugas.Tanggal_Surat)');
		$query = $this->db->get();
		return $query->result();
	}

	
	function surat_perbulan_detail($nip){
		$this->db->select('*');
		$this->db->from('detail_st');
		$this->db->join('pegawai', 'pegawai.NIP = detail_st.NIP');
		$this->db->join('surattugas', 'surattugas.Nomor_Surat = detail_st.Nomor_Surat' );
		$this->db->where('pegawai.NIP',$nip);
		$query = $this->db->get();
		return $query->result();	
	}
		
	function surat_perbulan_detail_form($nip,$bulan){
		$this->db->select('*');
		$this->db->from('detail_st');
		$this->db->join('pegawai', 'pegawai.NIP = detail_st.NIP');
		$this->db->join('surattugas', 'surattugas.Nomor_Surat = detail_st.Nomor_Surat' );
		$this->db->where('pegawai.NIP',$nip);
		$this->db->where('MONTH(surattugas.Tanggal_Surat)',$bulan);
		$query = $this->db->get();
		return $query->result();	
	}



	function tampildosen(){
		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->where('pegawai.Status','dosen');
		$query = $this->db->get();
		return $query->result();
		}
		function tampilstaff(){
		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->where('pegawai.Status','staff');
		$query = $this->db->get();
		return $query->result();
		}

		function cek_ketersediaan_surat($NIP){
			$this->db->select('*');
			$this->db->from('detail_st');
			$this->db->where('NIP',$NIP);
			$query = $this->db->get();
			return $query;
		}
	

}

