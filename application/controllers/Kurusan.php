<?php 

class Kurusan extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->helper('url');
		$this->load->model('m_kbagian');
	}

	function index(){
		$data['main_view'] = 'tatausaha/Kurusan/dashboard_view';
		$data['surattugas'] = $this->m_kbagian->tampil_surat();
		$data['pegawai'] = $this->m_kbagian->get_pegawai();
		//$data['surattugas'] = $this->m_kbagian->get_jml_surat();
		//$data['surattugas'] = $this->m_kbagian->get_jml_pegawai();
		//$data['detail_st'] = $this->m_kbagian->get_aktif_person();   
		$this->load->view('template', $data);
	}

	function tampil_surat(){
		$data['main_view'] = 'tatausaha/Kurusan/v_tampil';
		$data['surattugas'] = $this->m_kbagian->tampil_surat();   
		$this->load->view('template', $data);
	}

	function detail_surat($Nomor_Surat){
		$data['detail_st'] = $this->m_kbagian->detail_surat($Nomor_Surat);   
		$this->load->view('v_detail_surat', $data);
	}

	function detail_surat($Nomor_Surat){
		$data['main_view'] = 'tatausaha/Kurusan/v_detail_surat';
		$data2['main_view'] = 'tatausaha/Kurusan/v_buat_detail_surat';
		$page = $_SERVER['PHP_SELF'];
		$values=explode("/",$page); 
		$length=sizeof($values); 
		$url=$values[$length-4].'/'.$values[$length-3].'/'.$values[$length-2].'/'.$values[$length-1]; 
		$cek = $this->m_kbagian->cek_ketersediaan_detail($url)->num_rows();
		if($cek > 0){
			$data['detail_st'] = $this->m_kbagian->detail_surat($url);   
			$data['surattugas'] = $this->m_kbagian->get_no_surat($url);   
			$this->load->view('template', $data);
		}else{
			print "<script type=\"text/javascript\">alert('Detail Surat $url tidak tersedia, Klik OK untuk membuat detail surat ini');</script>";			 			 
			$data2['surattugas'] = $this->m_kbagian->get_no_surat($url);   
			$data2['pegawai'] = $this->m_kbagian->get_pegawai();
			$this->load->view('template', $data2);
		}
	}

	//mmembuat detail surat
	function detailsurat(){
		$page = $_SERVER['PHP_SELF'];
		$values=explode("/",$page); 
		$length=sizeof($values); 
		$url=$values[$length-4].'/'.$values[$length-3].'/'.$values[$length-2].'/'.$values[$length-1]; 
		$data['surattugas'] = $this->m_kbagian->get_no_surat($url);   
		$data['main_view'] = 'tatausaha/Kurusan/v_buat_detail_surat';
		$this->load->view('template',$data);
	}

		// lihat list TU	
    function PegawaiTU(){
		$data['main_view'] = 'tatausaha/Kurusan/v_pegawai';
		$data['pegawai'] = $this->m_kbagian->tampilPegawaiTU();
		$this->load->view('template', $data);
	}
	function filter(){
		$subbagian = $this->input->post('NIP');
		$urusan = $this->input->post('Tanggal_Surat');
		
		if( $subbagian != null && $urusan == null){
			
			$data['main_view'] = 'tatausaha/Kurusan/v_pegawai';
			$data['pegawai'] = $this->m_kbagian->tampilPegawaiTU_SubBagian($subbagian);
			$this->load->view('template',$data);
		} else if ( $subbagian == null && $urusan != null){
			
			$data['main_view'] = 'tatausaha/Kurusan/v_pegawai';
			$data['pegawai'] = $this->m_kbagian->tampilPegawaiTU_Urusan($urusan);
			$this->load->view('template',$data);	
		}else if ( $subbagian != null && $urusan != null){
			
			$data['main_view'] = 'tatausaha/Kurusan/v_pegawai';
			$data['pegawai'] = $this->m_kbagian->tampilPegawaiTU_SubBagian2($subbagian,$urusan);
			$this->load->view('template',$data);	
		}else if ($subbagian == null && $urusan == null){
			
			
			$this->session->set_flashdata('notif','Subbagian atau Urusan harap diisi');
			redirect('Kbagian/PegawaiTU');
			
		}
	}
	function cari_surat(){
		$keyword = $_POST['keyword'];
		$this->load->model('m_kbagian');
		$data['surattugas'] = $this->m_kbagian->cari_surat_tugas($keyword);
		$this->load->view('tatausaha/Kurusan/v_tampil', $data);
	}	

	public function cari(){
	$data['main_view'] = 'tatausaha/Kurusan/v_pegawai';
	$keyword = $this->input->get('cari', TRUE); //mengambil nilai dari form input cari
	$data['pegawai'] = $this->m_kbagian->cari($keyword); //mencari data karyawan berdasarkan inputan
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
			
		$data['main_view'] = 'tatausaha/Kurusan/v_pegawai';
		$data['pegawai'] = $this->m_kbagian->tampilPegawaiTU();
		}
		}
		
	function PencarianSurat(){
		$data['main_view'] = 'tatausaha/Kurusan/v_surattugas';
		$bln1 = $this->input->get('bln1');
		$bln2 = $this->input->get('bln2');
		$tahun = $this->input->get('tahun');
		$nip = $this->input->get('NIP');
		$data['detail_st'] = $this->m_kbagian->SuratTugs($bln1,$bln2,$tahun,$nip);
		$this->load->view('template',$data);
	}
	

	function data_admin(){
		$data['main_view'] = 'tatausaha/Kurusan/v_data_admin';
		$data['user'] = $this->m_kbagian->getDataAdmin();   
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
			$data['detail_st'] = $this->m_admin->surat_perbulan($NIP);
			$this->load->view('template',$data);
		}
		function detailrekapsuratform($NIP,$bulan){
			$data['main_view'] = 'admin/v_rekap_bulan_pegawai';
			$data['detail_st'] = $this->m_admin->surat_perbulan_detail_form($NIP,$bulan);
			$data['surattugas'] = $this->m_admin->surat_perbulan_detail($NIP,$bulan);
			$this->load->view('template',$data);
		
		}
	
		public function ajax_edit($id,$bulan)
		{
		$data = $this->m_admin->get_by_id($id,$bulan);
		echo json_encode($data);
		}

	function rekap(){	  
		$pegawai = $this->db->query("SELECT
		x.NIP,
		x.Nama,
		SUM(x.januari) AS januari,
		SUM(x.februari) AS februari,
		SUM(x.maret) AS maret,
		SUM(x.april) AS april,
		SUM(x.mei) AS mei,
		SUM(x.juni) AS juni,
		SUM(x.juli) AS juli,
		SUM(x.agustus) AS agustus,
		SUM(x.september) AS september,
		SUM(x.oktober) AS oktober,
		SUM(x.november) AS november,
		SUM(x.desember) AS desember,
		SUM(x.JumlahST) AS JumlahST
		FROM (
		SELECT 
		pegawai.NIP,
		pegawai.Nama,
		IF( MONTH(surattugas.Tanggal_Surat) = 1, COUNT(detail_st.NIP), 0)  AS januari,
		IF( MONTH(surattugas.Tanggal_Surat) = 2, COUNT(detail_st.NIP), 0)  AS februari,
		IF( MONTH(surattugas.Tanggal_Surat) = 3, COUNT(detail_st.NIP), 0)  AS maret,
		IF( MONTH(surattugas.Tanggal_Surat) = 4, COUNT(detail_st.NIP), 0)  AS april,
		IF( MONTH(surattugas.Tanggal_Surat) = 5, COUNT(detail_st.NIP), 0)  AS mei,
		IF( MONTH(surattugas.Tanggal_Surat) = 6, COUNT(detail_st.NIP), 0)  AS juni,
		IF( MONTH(surattugas.Tanggal_Surat) = 7, COUNT(detail_st.NIP), 0)  AS juli,
		IF( MONTH(surattugas.Tanggal_Surat) = 8, COUNT(detail_st.NIP), 0)  AS agustus,
		IF( MONTH(surattugas.Tanggal_Surat) = 9, COUNT(detail_st.NIP), 0)  AS september,
		IF( MONTH(surattugas.Tanggal_Surat) = 10, COUNT(detail_st.NIP), 0)  AS oktober,
		IF( MONTH(surattugas.Tanggal_Surat) = 11, COUNT(detail_st.NIP), 0)  AS november,
		IF( MONTH(surattugas.Tanggal_Surat) = 12, COUNT(detail_st.NIP), 0) AS desember,
		Count(detail_st.NIP) AS JumlahST
		FROM
		detail_st ,
		pegawai, surattugas
		WHERE
		detail_st.NIP = pegawai.NIP and detail_st.Nomor_Surat = surattugas.Nomor_Surat AND YEAR(surattugas.Tanggal_Surat)AND pegawai.Bagian ='Tata Usaha'
		GROUP BY
		pegawai.NIP,
		pegawai.Nama,
		MONTH (surattugas.Tanggal_Surat)) x
		GROUP BY x.NIP, x.Nama");
		$data = array();
		$data['main_view'] ="tatausaha/Kurusan/v_rekap";
		$data['records'] = $pegawai->result_array();
		$this->load->view('template',$data);
	}

	function Pencarian(){
		$username = $this->input->post('NIP');
		$tgl = $this->input->post('Tanggal_Surat');
		if($tgl == null && $username !=null) {
		$str1="SELECT
			x.NIP,
			x.Nama,
			SUM(x.januari) AS januari,
			SUM(x.februari) AS februari,
			SUM(x.maret) AS maret,
			SUM(x.april) AS april,
			SUM(x.mei) AS mei,
			SUM(x.juni) AS juni,
			SUM(x.juli) AS juli,
			SUM(x.agustus) AS agustus,
			SUM(x.september) AS september,
			SUM(x.oktober) AS oktober,
			SUM(x.november) AS november,
			SUM(x.desember) AS desember,
			SUM(x.JumlahST) AS JumlahST ";
			$str3=" GROUP BY x.NIP, x.Nama";
			$str = "SELECT
			detail_st.NIP,
			pegawai.Nama,
			IF( MONTH(surattugas.Tanggal_Surat) = 1, COUNT(detail_st.NIP), 0)  AS januari,
			IF( MONTH(surattugas.Tanggal_Surat) = 2, COUNT(detail_st.NIP), 0)  AS februari,
			IF( MONTH(surattugas.Tanggal_Surat) = 3, COUNT(detail_st.NIP), 0)  AS maret,
			IF( MONTH(surattugas.Tanggal_Surat) = 4, COUNT(detail_st.NIP), 0)  AS april,
			IF( MONTH(surattugas.Tanggal_Surat) = 5, COUNT(detail_st.NIP), 0)  AS mei,
			IF( MONTH(surattugas.Tanggal_Surat) = 6, COUNT(detail_st.NIP), 0)  AS juni,
			IF( MONTH(surattugas.Tanggal_Surat) = 7, COUNT(detail_st.NIP), 0)  AS juli,
			IF( MONTH(surattugas.Tanggal_Surat) = 8, COUNT(detail_st.NIP), 0)  AS agustus,
			IF( MONTH(surattugas.Tanggal_Surat) = 9, COUNT(detail_st.NIP), 0)  AS september,
			IF( MONTH(surattugas.Tanggal_Surat) = 10, COUNT(detail_st.NIP), 0)  AS oktober,
			IF( MONTH(surattugas.Tanggal_Surat) = 11, COUNT(detail_st.NIP), 0)  AS november,
			IF( MONTH(surattugas.Tanggal_Surat) = 12, COUNT(detail_st.NIP), 0) AS desember,
			Count(detail_st.NIP) AS JumlahST
			FROM
			detail_st ,
			pegawai, surattugas
			WHERE
			detail_st.NIP = pegawai.NIP and detail_st.Nomor_Surat = surattugas.Nomor_Surat AND pegawai.Bagian ='Tata Usaha'";
			$st = " GROUP BY pegawai.NIP, pegawai.Nama, MONTH(surattugas.Tanggal_Surat) ";
			$pegawai = $this->db->query($str1."FROM (".$str.$tgl.$st.") x".$str3);
			$data = array();
			$data['records'] = $pegawai->result_array();
			$data['pegawai'] = $pegawai->result_array();
			$this->session->set_flashdata('msg', 
						'<div class="alert alert-danger">
							<h4>Oppss</h4>
							<p>Tahun belum di input '.$tgl.'</p>
						</div>');    
						$data['main_view'] = "tatausaha/Kurusan/v_rekap";
				$this->load->view('template',$data);      
			} else if ($username == null && $tgl != null) {
			$str1="SELECT
			x.NIP,
			x.Nama,
			SUM(x.januari) AS januari,
			SUM(x.februari) AS februari,
			SUM(x.maret) AS maret,
			SUM(x.april) AS april,
			SUM(x.mei) AS mei,
			SUM(x.juni) AS juni,
			SUM(x.juli) AS juli,
			SUM(x.agustus) AS agustus,
			SUM(x.september) AS september,
			SUM(x.oktober) AS oktober,
			SUM(x.november) AS november,
			SUM(x.desember) AS desember,
			SUM(x.JumlahST) AS JumlahST ";
			$str3=" GROUP BY x.NIP, x.Nama";
			$str = "SELECT
			detail_st.NIP,
			pegawai.Nama,
			IF( MONTH(surattugas.Tanggal_Surat) = 1, COUNT(detail_st.NIP), 0)  AS januari,
			IF( MONTH(surattugas.Tanggal_Surat) = 2, COUNT(detail_st.NIP), 0)  AS februari,
			IF( MONTH(surattugas.Tanggal_Surat) = 3, COUNT(detail_st.NIP), 0)  AS maret,
			IF( MONTH(surattugas.Tanggal_Surat) = 4, COUNT(detail_st.NIP), 0)  AS april,
			IF( MONTH(surattugas.Tanggal_Surat) = 5, COUNT(detail_st.NIP), 0)  AS mei,
			IF( MONTH(surattugas.Tanggal_Surat) = 6, COUNT(detail_st.NIP), 0)  AS juni,
			IF( MONTH(surattugas.Tanggal_Surat) = 7, COUNT(detail_st.NIP), 0)  AS juli,
			IF( MONTH(surattugas.Tanggal_Surat) = 8, COUNT(detail_st.NIP), 0)  AS agustus,
			IF( MONTH(surattugas.Tanggal_Surat) = 9, COUNT(detail_st.NIP), 0)  AS september,
			IF( MONTH(surattugas.Tanggal_Surat) = 10, COUNT(detail_st.NIP), 0)  AS oktober,
			IF( MONTH(surattugas.Tanggal_Surat) = 11, COUNT(detail_st.NIP), 0)  AS november,
			IF( MONTH(surattugas.Tanggal_Surat) = 12, COUNT(detail_st.NIP), 0) AS desember,
			Count(detail_st.NIP) AS JumlahST
			FROM
			detail_st ,
			pegawai, surattugas
			WHERE
			detail_st.NIP = pegawai.NIP and detail_st.Nomor_Surat = surattugas.Nomor_Surat AND pegawai.Bagian ='Tata Usaha' AND YEAR(surattugas.Tanggal_Surat) =  ";
			$st = " GROUP BY pegawai.NIP, pegawai.Nama, MONTH(surattugas.Tanggal_Surat) ";
			$pegawai = $this->db->query($str1."FROM (".$str.$tgl.$st.") x".$str3);
			$data = array();
			$data['records'] = $pegawai->result_array();
			$this->session->set_flashdata('msg', 
						'<div class="alert alert-success">
							<p>Tahun berhasil di input '.$tgl.'</p>
						</div>');    
						$data['main_view'] = "tatausaha/Kurusan/v_rekap";
				$this->load->view('template',$data);
			}else if($tgl == null && $username ==null){
			$str1="SELECT
			x.NIP,
			x.Nama,
			SUM(x.januari) AS januari,
			SUM(x.februari) AS februari,
			SUM(x.maret) AS maret,
			SUM(x.april) AS april,
			SUM(x.mei) AS mei,
			SUM(x.juni) AS juni,
			SUM(x.juli) AS juli,
			SUM(x.agustus) AS agustus,
			SUM(x.september) AS september,
			SUM(x.oktober) AS oktober,
			SUM(x.november) AS november,
			SUM(x.desember) AS desember,
			SUM(x.JumlahST) AS JumlahST ";
			$str3=" GROUP BY x.NIP, x.Nama";
			$str = "SELECT
			detail_st.NIP,
			pegawai.Nama,
			IF( MONTH(surattugas.Tanggal_Surat) = 1, COUNT(detail_st.NIP), 0)  AS januari,
			IF( MONTH(surattugas.Tanggal_Surat) = 2, COUNT(detail_st.NIP), 0)  AS februari,
			IF( MONTH(surattugas.Tanggal_Surat) = 3, COUNT(detail_st.NIP), 0)  AS maret,
			IF( MONTH(surattugas.Tanggal_Surat) = 4, COUNT(detail_st.NIP), 0)  AS april,
			IF( MONTH(surattugas.Tanggal_Surat) = 5, COUNT(detail_st.NIP), 0)  AS mei,
			IF( MONTH(surattugas.Tanggal_Surat) = 6, COUNT(detail_st.NIP), 0)  AS juni,
			IF( MONTH(surattugas.Tanggal_Surat) = 7, COUNT(detail_st.NIP), 0)  AS juli,
			IF( MONTH(surattugas.Tanggal_Surat) = 8, COUNT(detail_st.NIP), 0)  AS agustus,
			IF( MONTH(surattugas.Tanggal_Surat) = 9, COUNT(detail_st.NIP), 0)  AS september,
			IF( MONTH(surattugas.Tanggal_Surat) = 10, COUNT(detail_st.NIP), 0)  AS oktober,
			IF( MONTH(surattugas.Tanggal_Surat) = 11, COUNT(detail_st.NIP), 0)  AS november,
			IF( MONTH(surattugas.Tanggal_Surat) = 12, COUNT(detail_st.NIP), 0) AS desember,
			Count(detail_st.NIP) AS JumlahST
			FROM
			detail_st ,
			pegawai, surattugas
			WHERE
			detail_st.NIP = pegawai.NIP and detail_st.Nomor_Surat = surattugas.Nomor_Surat AND pegawai.Bagian ='Tata Usaha' ";
			$st = " GROUP BY pegawai.NIP, pegawai.Nama, MONTH(surattugas.Tanggal_Surat) ";
			$pegawai = $this->db->query($str1."FROM (".$str.$st.") x  ".$str3);
			$data = array();
			$data['records'] = $pegawai->result_array();
			$this->session->set_flashdata('msg', 
						'<div class="alert alert-danger">
							<h4>Oppss</h4>
							<p>Tahun dan NIP belum di input </p>
						</div>');    
						$data['main_view'] = "tatausaha/Kurusan/v_rekap";
				$this->load->view('template',$data);
			}else{
			$str1="SELECT
			x.NIP,
			x.Nama,
			SUM(x.januari) AS januari,
			SUM(x.februari) AS februari,
			SUM(x.maret) AS maret,
			SUM(x.april) AS april,
			SUM(x.mei) AS mei,
			SUM(x.juni) AS juni,
			SUM(x.juli) AS juli,
			SUM(x.agustus) AS agustus,
			SUM(x.september) AS september,
			SUM(x.oktober) AS oktober,
			SUM(x.november) AS november,
			SUM(x.desember) AS desember,
			SUM(x.JumlahST) AS JumlahST ";
			$str3=" GROUP BY x.NIP, x.Nama";
			$str = "SELECT
			detail_st.NIP,
			pegawai.Nama,
			IF( MONTH(surattugas.Tanggal_Surat) = 1, COUNT(detail_st.NIP), 0)  AS januari,
			IF( MONTH(surattugas.Tanggal_Surat) = 2, COUNT(detail_st.NIP), 0)  AS februari,
			IF( MONTH(surattugas.Tanggal_Surat) = 3, COUNT(detail_st.NIP), 0)  AS maret,
			IF( MONTH(surattugas.Tanggal_Surat) = 4, COUNT(detail_st.NIP), 0)  AS april,
			IF( MONTH(surattugas.Tanggal_Surat) = 5, COUNT(detail_st.NIP), 0)  AS mei,
			IF( MONTH(surattugas.Tanggal_Surat) = 6, COUNT(detail_st.NIP), 0)  AS juni,
			IF( MONTH(surattugas.Tanggal_Surat) = 7, COUNT(detail_st.NIP), 0)  AS juli,
			IF( MONTH(surattugas.Tanggal_Surat) = 8, COUNT(detail_st.NIP), 0)  AS agustus,
			IF( MONTH(surattugas.Tanggal_Surat) = 9, COUNT(detail_st.NIP), 0)  AS september,
			IF( MONTH(surattugas.Tanggal_Surat) = 10, COUNT(detail_st.NIP), 0)  AS oktober,
			IF( MONTH(surattugas.Tanggal_Surat) = 11, COUNT(detail_st.NIP), 0)  AS november,
			IF( MONTH(surattugas.Tanggal_Surat) = 12, COUNT(detail_st.NIP), 0) AS desember,
			Count(detail_st.NIP) AS JumlahST
			FROM
			detail_st ,
			pegawai, surattugas
			WHERE
			detail_st.NIP = pegawai.NIP and detail_st.Nomor_Surat = surattugas.Nomor_Surat AND pegawai.Bagian ='Tata Usaha' AND YEAR(surattugas.Tanggal_Surat) =  ";
			$st = " GROUP BY pegawai.NIP, pegawai.Nama, MONTH(surattugas.Tanggal_Surat) ";
			$pegawai = $this->db->query($str1."FROM (".$str.$tgl." AND detail_st.NIP =  " .$username.$st.") x".$str3);
			$data = array();
			$data['records'] = $pegawai->result_array();
			$data['pegawai'] = $pegawai->result_array();
			$this->session->set_flashdata('msg', 
						'<div class="alert alert-success">
							<h4>Oppss</h4>
							<p>Tahun dan NIP berhasil  di input </p>
						</div>');
						$data['main_view'] = "tatausaha/Kurusan/v_rekap";
			$this->load->view('template',$data);		
		}
	}
		
	} 
?>
