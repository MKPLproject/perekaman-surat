<?php 

class M_admin extends CI_Model{
	var $table='pegawai';
	public function __construct()
    {
        $this->load->database();
	}
	
	function tampil_surat(){
		$this->db->select('*');	
		$this->db->from('surattugas');
		$this->db->order_by("Tanggal_Entry", "DESC");
		$query = $this->db->get();
		return $query->result();
	}

	function get_bulan(){
		$this->db->select('*');
		$this->db->select('date_format(Tanggal_Surat,"%b-%y") as bulan');
		$this->db->from('surattugas');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_count_pegawai(){
		$this->db->select('NIP ,count(*) as countPegawai');
		$this->db->from('pegawai');
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

	function get_jum_surat_bagian_terendah($tahun){
		$this->db->select('*');
		$this->db->select('surattugas.Tanggal_Surat');
		$this->db->select('detail_st.Nomor_Surat ,count(*) as jumSurat');
		$this->db->from('detail_st');
		$this->db->join('surattugas', 'surattugas.Nomor_Surat=detail_st.Nomor_Surat');
		$this->db->join('pegawai', 'pegawai.NIP=detail_st.NIP');
		$this->db->group_by('detail_st.NIP');
		$this->db->order_by("jumSurat", "ASC");
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

	// function get_bulan_surat_dosen(){
	
	// 	$this->db->select('Nomor_Surat ,count(*) as jum');
	// 	$this->db->select('date_format(Tanggal_Surat,"%m") as bulan');
	// 	$this->db->from('surattugas');
	// 	$this->db->group_by('bulan');
	// 	$query = $this->db->get();
	// 	return $query->result_array();
	// }

	// function get_bulan_surat_staff(){
	// 	$this->db->select('*');
	// 	$this->db->select('Nomor_Surat ,count(*) as jumStaff');
	// 	$this->db->from('detail_st');
	// 	$this->db->join('pegawai', 'pegawai.NIP=detail_st.NIP');
	// 	$this->db->join('surattugas', 'surattugas.Nomor_Surat=detail_st.Nomor_Surat');
	// 	$this->db->where('pegawai.Status','Staff');
	// 	$this->db->group_by('blnStaff');
	// 	$query = $this->db->get();
	// 	return $query->result_array();
	// }

	function cekdetail($Nomor_Surat,$NIP){
		$this->db->select('*');
		$this->db->from('detail_st');
		$this->db->where('Nomor_Surat',$Nomor_Surat);
		$this->db->where('NIP',$NIP);
		$query=$this->db->get();
		return $query;
	}
	//HANS
	function cekpegawai($NIP){
		$this->db->select('pegawai.NIP');
		$this->db->from('pegawai');
		$this->db->where('NIP',$NIP);
		$query=$this->db->get();
		return $query;
	}
		//HANS
	function cekuser($username){
		$this->db->select('user.username');
		$this->db->from('user');
		$this->db->where('username',$username);
		$query=$this->db->get();
		return $query;
	}

	function ceksurat($surat){
		$this->db->select('Nomor_Surat');
		$this->db->from('surattugas');
		$this->db->where('Nomor_Surat',$surat);
		$query=$this->db->get();
		return $query;
	}

	function get_pegawai(){
		$query = $this->db->select('*')->from('pegawai')->get();
		return $query->result();
	}

	function get_bagian(){
		$this->db->select('*');
		$this->db->from('pegawai');
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

	function tambah_pegawai($data,$table){
		$this->db->insert($table,$data);
	}

	function tambah_admin($data,$table){
		$this->db->insert($table,$data);
	}

	function hapus_pegawai($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function update_pegawai($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function cek_ketersediaan_detail($Nomor_Surat){
		$this->db->select('*');
		$this->db->from('detail_st');
		$this->db->where('Nomor_Surat',$Nomor_Surat);
		$query = $this->db->get();
		return $query;
	}

	function cek_ketersediaan_surat($NIP){
		$this->db->select('*');
		$this->db->from('detail_st');
		$this->db->where('NIP',$NIP);
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

    function tampilPegawai(){
		return $this->db->get('pegawai');
	}
	public function cari($keyword){
	$this->db->like('NIP', $keyword)->
	or_like('Nama', $keyword)->
	or_like('Status', $keyword)->
	or_like('Pangkat', $keyword);
	return $this->db->get('pegawai')->result();

	}
	function tambahPegawai($data,$table){
		$this->db->insert($table,$data);
	} 
	
	function hapus_data($where,$table){
	$this->db->where($where);
	$this->db->delete($table);
	}	
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	function edit_data($where,$table){
	return $this->db->get_where($table,$where);	
	}
	/* function update($NIP) {
        $NIP = $this->input->post('nim');
        $Nama  = $this->input->post('nama');
        $ = $this->input->post('alamat');
        $email = $this->input->post('email');
        $data = array (
            'nim' => $nim,
            'nama'  => $nama,
            'alamat'=> $alamat,
            'email' => $email
        );
        $this->db->where('id', $id);
        $this->db->update('tb_mahasiswa', $data);
    }
 
    function getById($id) {
        return $this->db->get_where('tb_mahasiswa', array('id' => $id))->row();
    } */
	function SuratTugas($NIP){
	$this->db->select('*');
	$this->db->from('detail_st');
	$this->db->join('pegawai', 'pegawai.NIP = detail_st.NIP');
	$this->db->join('surattugas', 'surattugas.Nomor_Surat = detail_st.Nomor_Surat' );
	$this->db->where('pegawai.NIP',$NIP);
	$query = $this->db->get();
	return $query->result();
	}

	function filter_surat($bln1,$bln2,$tahun){
		$this->db->select('*');
		$this->db->from('surattugas');
		$this->db->where('MONTH(Tanggal_Surat)>=',$bln1);
		$this->db->where('MONTH(Tanggal_Surat)<=',$bln2);
		$this->db->where('YEAR(Tanggal_Surat)',$tahun);
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

		
	function surat_perbulan_detail_form($nip,$bulan){
		$this->db->select('*');
		$this->db->from('detail_st');
		$this->db->join('surattugas', 'surattugas.Nomor_Surat=detail_st.Nomor_Surat');
		$this->db->join('pegawai', 'pegawai.NIP=detail_st.NIP');
		$this->db->where('detail_st.NIP',$nip);
		$this->db->where('MONTH(surattugas.Tanggal_Surat)',$bulan);
		$query = $this->db->get();
		return $query->result_array();
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

	public function get()
	{
	}

}

