<?php 

class Pegawai extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('m_pegawai');
		$this->load->helper('url');
	}

	function index(){
		$data['main_view'] = 'pegawai/v_pegawai';
		$data['pegawai'] = $this->m_pegawai->tampilPegawai()->result();
		$this->load->view('template', $data);
	}
	public function cari(){
		$data['main_view'] = 'pegawai/v_pegawai';
	$keyword = $this->input->get('cari', TRUE); //mengambil nilai dari form input cari
	$data['pegawai'] = $this->m_pegawai->cari($keyword); //mencari data karyawan berdasarkan inputan
	$this->load->view('template', $data); //menampilkan data yang sudah dicari
	}	
	
	function Surat($NIP){
		$data['main_view'] = 'pegawai/v_surat';
		$data['detail_st'] = $this->m_pegawai->SuratTugas($NIP);
		$this->load->view('template',$data);
		}
		
	function PencarianSurat(){
		$data['main_view'] = 'pegawai/v_surattugas';
		$bln1 = $this->input->get('bln1');
		$bln2 = $this->input->get('bln2');
		$tahun = $this->input->get('tahun');
		$nip = $this->input->get('NIP');
		$data['detail_st'] = $this->m_pegawai->SuratTugs($bln1,$bln2,$tahun,$nip);
		$this->load->view('template',$data);
	}
	
	function input(){
		$data['main_view'] = 'pegawai/v_tambah';
		$this->load->view('template',$data);
	}
	function tambahPegawai(){
		$NIP = $this->input->post('NIP');
		$Nama = $this->input->post('Nama');
		$Status = $this->input->post('Status');
		$Pangkat = $this->input->post('Pangkat');
		$No_Telp = $this->input->post('No_Telp');
		
		$data = array(
			'NIP' => $NIP,
			'Nama' => $Nama,
			'Status' => $Status,
			'Pangkat' => $Pangkat,
			'No_Telp' =>$No_Telp
			
		);
		$this->m_pegawai->tambahPegawai($data,'pegawai');
		redirect('pegawai');
	}

	function hapus($NIP){
		$where = array('NIP' => $NIP);
		$this->m_pegawai->hapus_data($where,'pegawai');
		redirect('pegawai');
	}

	function update($NIP){
		$data['main_view'] = 'pegawai/v_edit';
		$where = array('NIP' => $NIP);
		$data['pegawai'] = $this->m_pegawai->edit_data($where,'pegawai')->result();
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
		
		
		$data = array(
			'Nama' => $Nama,
			'Status' => $Status,
			'Pangkat' => $Pangkat,
			'No_Telp' => $No_Telp
			
		
		);

		$where = array('NIP' => $NIP);

		$this->m_pegawai->update_data($where,$data,'pegawai');
		redirect('pegawai');
	}
	


	} 
?>