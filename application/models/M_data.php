<?php 

class M_data extends CI_Model{
	public function __construct()
    {
        $this->load->database();
	}
	
	function tampil_surat(){
		$query = $this->db->select('*')->from('surattugas')->get();
		return $query->result();
	}

	function get_pegawai(){
		$query = $this->db->select('NIP')->from('pegawai')->get();
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

}