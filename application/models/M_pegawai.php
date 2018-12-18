<?php 
class M_Pegawai extends CI_Model{
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

}


 ?>