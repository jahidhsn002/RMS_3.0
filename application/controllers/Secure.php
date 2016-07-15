<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Secure extends CI_Controller {

	public function index(){
		
		$this->pre_check('dash');
		
		$data['error'] = '';
		if(isset($_GET['error'])){$data['error'] = $_GET['error'];}
		$this->load->view('base/login', $data);
	}
	
	public function error(){
		$this->load->view('base/error');
	}
	
	public function dash(){
		
		$this->check('dash');
		
		$this->load->view('base/header');
		$this->load->view('base/dash');
		$this->load->view('base/footer');
	}
	
	public function check( $level ){
		
		$login	= 	$this->session->userdata('app_login');
		$access = 	$this->session->userdata('user_roll');
		$query	=	$this->Db->get_where_limit("access", array("name" => $access, "level" => $level), 1);
		if($query == null || $login != 'success'){
			redirect('secure/?error=No Permission To Go There. Login First', 404);
			exit;
		}
		
	}
	
	public function pre_check( $level ){
		
		$login	= 	$this->session->userdata('app_login');
		$access = 	$this->session->userdata('user_roll');
		$query	=	$this->Db->get_where_limit("access", array("name" => $access, "level" => $level), 1);
		if($query != null && $login == 'success'){
			redirect('secure/dash');
			exit;
		}
		
	}
	
	public function auth(){
		
		$this->form_validation->set_rules('username', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Passw', 'required|valid_base64');
		
		if ($this->form_validation->run() != FALSE){
            
			$email 	= 	$this->input->post("username");
			$pass 	=  	$this->input->post("password");
			$query	=	$this->Db->get_where_limit("users", array("email" => $email, "pass" => $pass), 1);
			if($query != null){
				$this->session->set_userdata('app_login', 'success');
				foreach($query as $data){
					$this->session->set_userdata('user_name', $data->name);
					$this->session->set_userdata('user_email', $data->email);
					$this->session->set_userdata('user_roll', $data->roll);
					$this->session->set_userdata('user_pass', $data->pass);
				}
				redirect('secure/dash');
			}else{
				redirect('secure/?error=Wrong Username Or Password. Try Again', 404);
				exit;
			}
			
        }else{
            redirect('secure/?error=Invalid Try with Carrecter. Try Again', 404);
			exit;
		}
		
	}
	
	public function logout(){
		
		$this->session->sess_destroy();
		redirect('secure/?error=You Have Been Logged Out');
		exit;
		
	}
	
}
