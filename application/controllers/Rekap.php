<?php 

class Rekap extends CI_Controller{
	
	function index(){	  
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
		detail_st.NIP = pegawai.NIP and detail_st.Nomor_Surat = surattugas.Nomor_Surat AND YEAR(surattugas.Tanggal_Surat)
		GROUP BY
		pegawai.NIP,
		pegawai.Nama,
		MONTH (surattugas.Tanggal_Surat)) x
		GROUP BY x.NIP, x.Nama");
		$data = array();
		$data['main_view'] = "admin/v_rekap";
		$data['records'] = $pegawai->result_array();
		$this->load->view('template',$data);
	}

	function rekapdosen(){	  
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
		detail_st.NIP = pegawai.NIP and detail_st.Nomor_Surat = surattugas.Nomor_Surat AND YEAR(surattugas.Tanggal_Surat) AND pegawai.Status = 'Dosen'
		GROUP BY
		pegawai.NIP,
		pegawai.Nama,
		MONTH (surattugas.Tanggal_Surat)) x
		GROUP BY x.NIP, x.Nama");
		$data = array();
		$data['main_view'] = "admin/v_rekap_dosen";
		$data['records'] = $pegawai->result_array();
		$this->load->view('template',$data);
	}
	
	function rekapstaff(){	  
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
			detail_st.NIP = pegawai.NIP and detail_st.Nomor_Surat = surattugas.Nomor_Surat AND YEAR(surattugas.Tanggal_Surat) AND pegawai.Status = 'Staff'
			GROUP BY
			pegawai.NIP,
			pegawai.Nama,
			MONTH (surattugas.Tanggal_Surat)) x
			GROUP BY x.NIP, x.Nama");
			$data = array();
			$data['records'] = $pegawai->result_array();
			$data['main_view'] = "admin/v_rekap_staff";
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
			detail_st.NIP = pegawai.NIP and detail_st.Nomor_Surat = surattugas.Nomor_Surat ";
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
						$data['main_view'] = "admin/v_rekap";
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
			detail_st.NIP = pegawai.NIP and detail_st.Nomor_Surat = surattugas.Nomor_Surat AND YEAR(surattugas.Tanggal_Surat) = ";
			$st = " GROUP BY pegawai.NIP, pegawai.Nama, MONTH(surattugas.Tanggal_Surat) ";
			$pegawai = $this->db->query($str1."FROM (".$str.$tgl.$st.") x".$str3);
			$data = array();
			$data['records'] = $pegawai->result_array();
			$this->session->set_flashdata('msg', 
						'<div class="alert alert-success">
							<p>Tahun berhasil di input '.$tgl.'</p>
						</div>');    
						$data['main_view'] = "admin/v_rekap";
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
			detail_st.NIP = pegawai.NIP and detail_st.Nomor_Surat = surattugas.Nomor_Surat ";
			$st = " GROUP BY pegawai.NIP, pegawai.Nama, MONTH(surattugas.Tanggal_Surat) ";
			$pegawai = $this->db->query($str1."FROM (".$str.$st.") x  ".$str3);
			$data = array();
			$data['records'] = $pegawai->result_array();
			$this->session->set_flashdata('msg', 
						'<div class="alert alert-danger">
							<h4>Oppss</h4>
							<p>Tahun dan NIP belum di input </p>
						</div>');    
						$data['main_view'] = "admin/v_rekap";
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
			detail_st.NIP = pegawai.NIP and detail_st.Nomor_Surat = surattugas.Nomor_Surat AND YEAR(surattugas.Tanggal_Surat) =  ";
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
						$data['main_view'] = "admin/v_rekap";
			$this->load->view('template',$data);		
		}
	}
}
		
		
		
?>