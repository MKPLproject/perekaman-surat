<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

//construc
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_auth');
	}


//method index
	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('Status') == 'admin'){
			
				redirect('admin/index');
			}else if($this->session->userdata('Status') == 'operator'){
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
			$this->load->view('v_login');
		}
	}

//method cek login
	public function cek_login(){
		if($this->session->userdata('logged_in') == FALSE){

			$this->form_validation->set_rules('username', 'username', 'trim|required');
			$this->form_validation->set_rules('password', 'password', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				if($this->m_auth->cek_user_admin() == TRUE){
					$status = $this->session->userdata('Status');
					if($status=="admin"){
						redirect('admin/index');
					}else{
						redirect('operator/index');

					}
					
				} if($this->m_auth->cek_user_pegawai() == TRUE){ //login Kasubag
					$bagian = $this->session->userdata('Bagian');
					$sub_bagian = $this->session->userdata('Sub_Bagian');
					$urusan = $this->session->userdata('Urusan');
					
					$stat =$this->session->userdata('stat');
					if($bagian == 'Tata Usaha'){
						if($sub_bagian!="null"){
							if($urusan=="null"){
								if($stat=="aktif"){
									redirect('Kasubag/index');
									}else{
										
										$this->session->set_flashdata('notif', 'Username atau Password salah');
										redirect('auth/logout');
									}	
							}
						}
					}
				} if($this->m_auth->cek_user_pegawai1() == TRUE){ //login KTU
					$bagian = $this->session->userdata('Bagian');
					$sub_bagian = $this->session->userdata('Sub_Bagian');
					$urusan = $this->session->userdata('Urusan');
					
					$stat =$this->session->userdata('stat');
					if($sub_bagian=="null"){
						if($urusan=="null"){
							if($stat=="aktif"){
								redirect('kbagian/index');
							}else{
								
								$this->session->set_flashdata('notif', 'Username atau Password salah');
								redirect('auth/logout');
							}	
						}
					}
				} if($this->m_auth->cek_user_pegawai() == TRUE){ //login KaUr
					$bagian = $this->session->userdata('Bagian');
					$sub_bagian = $this->session->userdata('Sub_Bagian');
					$urusan = $this->session->userdata('Urusan');
					$jabatan = $this->session->userdata('jabatan');
					
					$stat =$this->session->userdata('stat');
					if($sub_bagian!="null"){
						if($urusan!="null"){
							if($jabatan == "kepala"){
								if($stat=="aktif"){
									redirect('kaur/index');
								}else{
									
									$this->session->set_flashdata('notif', 'Username atau Password salah');
									redirect('auth/logout');
								}	
							}
						}
					}
				} if($this->m_auth->cek_user_pegawai() == TRUE){ //login staff
					$bagian = $this->session->userdata('Bagian');
					$sub_bagian = $this->session->userdata('Sub_Bagian');
					$urusan = $this->session->userdata('Urusan');
					$jabatan = $this->session->userdata('jabatan');
					
					$stat =$this->session->userdata('stat');
					if($sub_bagian!="null"){
						if($urusan!="null"){
							if($jabatan == "staff"){
								if($stat=="aktif"){
									redirect('staff/index');
								}else{
									
									$this->session->set_flashdata('notif', 'Username atau Password salah');
									redirect('auth/logout');
								}	
							}
						}
					}
				} else{
					$this->session->set_flashdata('notif', 'Username atau Password salah');
					redirect('auth/index');
				}
			} else {
				$this->session->set_flashdata('notif', validation_errors());
					redirect('auth/index');
			}

		} else {
			redirect('admin/index');
		}
	}

	function profil($username){
		$status = $this->session->userdata('Status');
		if($status=="admin"){
			$data['main_view'] = 'admin/v_profil_user';
		}else{
			$data['main_view'] = 'operator/v_profil_user';

		}
		$data['user'] = $this->m_auth->getData($username);  
		$this->load->view('template', $data);
	}
	
	function pass($username){
		if ($this->session->userdata('Bagian') != 'null' && $this->session->userdata('Sub_Bagian')=='null'){
		$data['main_view'] = 'tatausaha/kepala_bagian/v_profil_pegawai';
		}else if ($this->session->userdata('Bagian') != 'null' && $this->session->userdata('Sub_Bagian') != 'null' && $this->session->userdata('Urusan') =='null'){			
		$data['main_view'] = 'tatausaha/kasubag/v_profil_pegawai';
		}else if ($this->session->userdata('Bagian') != 'null' && $this->session->userdata('Sub_Bagian') != 'null' && $this->session->userdata('Urusan') !='null' && $this->session->userdata('jabatan') == 'kepala'){			
		$data['main_view'] = 'tatausaha/kepala_urusan/v_profil_pegawai';
		}else{
		$data['main_view'] = 'tatausaha/staff/v_profil_pegawai';
		}
		$data['pegawai'] = $this->m_auth->getDataPegawai($username);   
		$this->load->view('template', $data);
    }

	function update_password(){
		$username = $this->input->post('username');
		$password_lama = $this->input->post('password_lama');
        $password_baru = $this->input->post('password_baru');
        $data_lama = array(
            'username' => $username,
            'password' => $password_lama,
            );
        $data_baru = array(
            'username' => $username,
            'password' => $password_baru,
            );
    
        $where = array(
            'username' => $username
        );
        //
        $cek = $this->m_auth->cek_login("user",$data_lama)->num_rows();
		if($cek > 0){
 
		
        
            $this->m_auth->update_password($where,$data_baru,'user');
            
            $data_baru['user'] = $this->m_auth->getData($username);   
			$data_baru['main_view'] = 'admin/v_profil_user'; 
            print "<script type=\"text/javascript\">alert('Yes, password berhasil diganti');</script>";	 
            $this->load->view('template', $data_baru);

 
		}else{
			print "<script type=\"text/javascript\">alert('Gagal, password lama tidak terdaftar di database');</script>";	
		   
			$data_lama['user'] = $this->m_auth->getData($username);   
			$data_lama['main_view'] = 'admin/v_profil_user'; 
            $this->load->view('template', $data_lama);
        }
	}

//method logout
	 function logout(){
		$this->session->sess_destroy();
		redirect('auth/index');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */