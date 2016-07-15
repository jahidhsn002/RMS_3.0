<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include('Secure.php');

class User extends Secure {

	public function index(){
		
		$this->check('user');
		
		$data['user'] = $this->Db->get_array_select('users', 'name,email,roll,id');
		$data['prefix'] = $this->Db->get_value_where_select('settings', array('id'=>1), 'value');
		
		$data['success'] = '';
		$data['error'] = '';
		if(isset($_GET['success'])){$data['success'] = $_GET['success'];}
		if(isset($_GET['error'])){$data['error'] = $_GET['error'];}
		
		$this->load->view('base/header');
		$this->parser->parse('user/view', $data);
		$this->load->view('base/footer');
	}
	
	public function add(){
		
		$this->check('user/add');
		
		$this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('pass', 'Password', 'required|valid_base64');
		$this->form_validation->set_rules('roll', 'Roll', 'required|in_list[admin,owner,coock,manager,waiter]');
		
		if ($this->form_validation->run() == FALSE){
           
			$this->load->view('base/header');
			$this->load->view('user/add');
			$this->load->view('base/footer');
		
		}else{
            
			$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'roll' => $this->input->post('roll'),
				'pass' => $this->input->post('pass')
			);
			
			$this->Db->insert('users', $data);
			
			redirect('user/?success=Congrats User Added');
			exit;
			
        }
		
	}
	
	public function edit( $uid = null ){
		
		$this->check('user/edit');
		
		$check = $this->Db->get_where_limit('users', array('id' => $uid), 1);
		
		if($check != null){
			
			$data['id'] = $uid;
			$data['user'] = $this->Db->get_where_array_limit('users', array('id' => $uid), 1);
			
			$this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('pass', 'Password', 'required|valid_base64');
			$this->form_validation->set_rules('roll', 'Roll', 'required|in_list[admin,owner,coock,manager,waiter]');
			
			if ($this->form_validation->run() == FALSE){
				
				$this->load->view('base/header');
				$this->parser->parse('user/edit', $data);
				$this->load->view('base/footer');
			
			}else{
				
				$data = array(
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'roll' => $this->input->post('roll'),
					'pass' => $this->input->post('pass')
				);
				
				$this->Db->update('users', array('id'=>$uid), $data);
				
				redirect('user/?success=Congrats User Added');
				exit;
				
			}
			
			
		}else{
			redirect('user/?error=Did not Match any ID', 404);
			exit;
		}
		
	}
	
	public function remove($uid = null){
		
		$this->check('user/remove');
		
		$check = $this->Db->get_where_limit('users', array('id' => $uid), 1);
		
		if($check != null){
			$this->Db->remove('users', array('id'=>$uid));
			redirect('user/?error=User ID Deleted From Database');
		}else{
			redirect('user/?error=Did not Match any ID', 404);
			exit;
		}
	}
	
}
