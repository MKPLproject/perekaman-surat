<?php 

class M_staff extends CI_Model{
	public function __construct()
    {
        $this->load->database();
	}


	function get_periode($tahun){
		$this->db->select('date_format(Tanggal_Surat,"%Y") as periode');
		$this->db->from('surattugas');
		$this->db->where('YEAR(surattugas.Tanggal_Surat)',$tahun);
		$this->db->group_by('periode');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_bulan_surat_pribadi_perbulan_tahun($tahun){
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

	function get_pegawai(){
		$b = $this->session->userdata('Bagian');
		$sb = $this->session->userdata('Sub_Bagian');
		$u = $this->session->userdata('Urusan');
		$j = $this->session->userdata('jabatan');
		$nip= $this->session->userdata('NIP');
		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->where('pegawai.NIP',$nip);
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
		$this->db->select('Nomor_Surat');
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


	function get_NIP_Pegawai($NIP){
		$this->db->select('*');
		$this->db->from('Pegawai');
		$this->db->where('NIP',$NIP);
		$query = $this->db->get();
		return $query->result();
	}


	function cek_ketersediaan_detail($Nomor_Surat){
		$this->db->select('*');
		$this->db->from('detail_st');
		$this->db->where('Nomor_Surat',$Nomor_Surat);
		$query = $this->db->get();
		return $query;
	}

	function tampilStaff(){
	$nip= $this->session->userdata('NIP');
	$this->db->select('*');
	$this->db->from('pegawai');
	$this->db->where('pegawai.NIP',$nip);
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

	function surat_perbulan($nip){	
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

	
		



}