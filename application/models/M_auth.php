<?php 

class M_auth extends CI_Model{	
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}	
	function getData($username){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username',$username);
		$query = $this->db->get();
		return $query->result();
	}
	
	function getDataPegawai($username){
		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->where('NIP',$username);
		$query = $this->db->get();
		return $query->result();
    }
    
    
	function update_password($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function cek_user_admin(){
		$u = $this->input->post('username');
		$p = $this->input->post('password');

		$query = $this->db->where('username', $u)
						  ->where('password', $p)
						  ->get('user');
		if($this->db->affected_rows() > 0){

			$data_login = $query->row();

			$data_session = array(
									'logged_in' => TRUE,
									'username' => $data_login->username,
									'Status' => $data_login->Status
								);
			$this->session->set_userdata($data_session);
			return TRUE;
		
		} else{
			return FALSE;
		}
	}
	public function cek_user_operator(){
		$u = $this->input->post('username');
		$p = $this->input->post('password');

		$query = $this->db->where('username', $u)
						  ->where('password', $p)
						  ->get('user');
		if($this->db->affected_rows() > 0){

			$data_login = $query->row();

			$data_session = array(
									'logged_in' => TRUE,
									'username' => $data_login->username,
									'Status' => $data_login->Status
								);
			$this->session->set_userdata($data_session);
			return TRUE;
		
		} else{
			return FALSE;
		}
	}

	public function cek_user_pegawai(){
		$u = $this->input->post('username');
		$p = $this->input->post('password');

		$query = $this->db->where('NIP', $u)
						  ->where('password', $p)
						  ->get('pegawai');
		if($this->db->affected_rows() > 0){

			$data_login = $query->row();

			$data_session = array(
									'logged_in' => TRUE,
									'NIP' => $data_login->NIP,
									'Nama' => $data_login->Nama,
									'Bagian' => $data_login->Bagian,
									'Sub_Bagian' => $data_login->Sub_Bagian,
									'jabatan'	    => $data_login->jabatan,
									'Urusan' => $data_login->Urusan,
									'stat' => $data_login->stat
								);
			$this->session->set_userdata($data_session);
			return TRUE;
		
		} else{
			return FALSE;
		}
	}
	
	public function cek_user_pegawai1(){
		$u = $this->input->post('username');
		$p = $this->input->post('password');

		$query = $this->db->where('NIP', $u)
						  ->where('password', $p)
						  ->get('pegawai');
		if($this->db->affected_rows() > 0){

			$data_login = $query->row();

			$data_session = array(
									'logged_in' => TRUE,
									'NIP' => $data_login->NIP,
									'Nama' => $data_login->Nama,	
									'Bagian' => $data_login->Bagian,
									'Sub_Bagian' => $data_login->Sub_Bagian,
									'jabatan'	    => $data_login->jabatan,
									'Urusan' => $data_login->Urusan,
									'stat' => $data_login->stat
								);
			$this->session->set_userdata($data_session);
			return TRUE;
		
		} else{
			return FALSE;
		}
	}
	
}