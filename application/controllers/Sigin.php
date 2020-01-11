<?php

class Sigin extends CI_Controller{

public function __construct(){
	parent::__construct();
	$this->load->helper('form');
	$this->load->library('form_validation');
	$this->load->library('pagination');
	$this->load->model("mymodel");
	$this->load->model("modeladmin");
	$this->load->model("model_penjualan");
	
	$this->load->library('session');
}

function index(){
	$this->load->view('login');
}



function login(){
	$this->form_validation->set_rules('username','user name','required|trim');
	$this->form_validation->set_rules('password','password','required|trim');

	if ($this->form_validation->run()==FALSE){
		$data=array('pesan'=>validation_errors());
		$this->load->view('login',$data);
	}else{

	 $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
			
        $cek_user=$this->model_penjualan->auth_user($username,$password);

        if($cek_user->num_rows() > 0){ //jika login sebagai admin
				$data=$cek_user->row_array();
        		$this->session->set_userdata('masuk',TRUE);
		         if($data['id_akses']=='1'){ //Akses admin
		            $this->session->set_userdata('akses','1');
		            $this->session->set_userdata('ses_id',$data['id_user']);
		            $this->session->set_userdata('ses_nama',$data['nama']);
		            redirect('admin');

		         }else { //akses kasir
		         	 if($data['id_akses']=='2'){
		            $this->session->set_userdata('akses','2');
					$this->session->set_userdata('ses_id',$data['id_user']);
		            $this->session->set_userdata('ses_nama',$data['nama']);
		            redirect('penjualan');
		         }}

        }else{  // jika username dan password tidak ditemukan atau salah
							$url=base_url('sigin');
							echo $this->session->set_flashdata('msg','Username Atau Password Salah');
							redirect($url);
					}
        }

    }

function log (){
	$this->form_validation->set_rules('user','user name','required|trim');
	$this->form_validation->set_rules('password','password','required|trim');

	if ($this->form_validation->run()==FALSE){
		$data=array('pesan'=>validation_errors());
		$this->load->view('login',$data);
	}else{
		$userid=$this->input->post('user');
		$passid=$this->input->post('password');
		
		$where=array('username'=>$userid,'password'=>md5($passid));
		$record=$this->mymodel->jumlah_record('cuser',$where);
		if($record==0){
			$data=array('pesan'=>'user name atau password salah');
			$this->load->view('login',$data);
			}else{
				$sesi=array('username'=>$userid,'useraktif'=>'admin');
				$this->session->set_userdata('userlogin',$sesi);
				$this->load->view('admin/nav_admin',$sesi);
				redirect(base_url('admin/index'));
			}
		}
}

function logout(){
	  $this->session->sess_destroy();  
	redirect(base_url('Sigin/index'));


}
}
?>