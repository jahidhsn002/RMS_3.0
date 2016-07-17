<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include('Secure.php');

class Payment extends Secure {

	public function index(){
		
		$this->check('table');
		
		$data['payment'] = $this->Db->get_array_select('payment', 'id,name');
		$data['prefix'] = $this->Db->get_value_where_select('settings', array('id'=>2), 'value');
		
		$data['success'] = '';
		$data['error'] = '';
		if(isset($_GET['success'])){$data['success'] = $_GET['success'];}
		if(isset($_GET['error'])){$data['error'] = $_GET['error'];}
		
		$this->load->view('base/header');
		$this->parser->parse('payment/view', $data);
		$this->load->view('base/footer');
	}
	
	public function add(){
		
		$this->check('table/add');
		
		$this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces');
		
		if ($this->form_validation->run() == FALSE){
			
			$this->load->view('base/header');
			$this->load->view('payment/add');
			$this->load->view('base/footer');
		
		}else{
            
			$data = array(
				'name' => $this->input->post('name')
			);
			
			$this->Db->insert('payment', $data);
			
			redirect('payment/?success=Congrats Payment Added');
			exit;
			
        }
		
	}
	
	public function edit( $uid = null ){
		
		$this->check('table/edit');
		
		$check = $this->Db->get_where_limit('payment', array('id' => $uid), 1);
		
		if($check != null){
			
			$data['id'] = $uid;
			$data['payment'] = $this->Db->get_where_array_limit('payment', array('id' => $uid), 1);
			
			$this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces');
		
			if ($this->form_validation->run() == FALSE){
				
				$this->load->view('base/header');
				$this->parser->parse('payment/edit', $data);
				$this->load->view('base/footer');
			
			}else{
				
				$data = array(
					'name' => $this->input->post('name')
				);
				
				$this->Db->update('payment', array('id'=>$uid), $data);
				
				redirect('payment/?success=Congrats User Edited');
				exit;
				
			}
			
			
		}else{
			redirect('payment/?error=Did not Match any ID', 404);
			exit;
		}
		
	}
	
	public function remove($uid = null){
		
		$this->check('table/remove');
		
		$check = $this->Db->get_where_limit('payment', array('id' => $uid), 1);
		
		if($check != null){
			$this->Db->remove('payment', array('id'=>$uid));
			redirect('payment/?error=Payment Deleted From Database');
		}else{
			redirect('payment/?error=Did not Match any ID', 404);
			exit;
		}
	}
	
}
