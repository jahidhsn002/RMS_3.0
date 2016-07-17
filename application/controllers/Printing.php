<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include('Secure.php');

class Printing extends Secure {

	public function index(){
		
		$this->check('table');
		
		$data['printing'] = $this->Db->get_array_select('printing', 'id,name');
		$data['prefix'] = $this->Db->get_value_where_select('settings', array('id'=>2), 'value');
		
		$data['success'] = '';
		$data['error'] = '';
		if(isset($_GET['success'])){$data['success'] = $_GET['success'];}
		if(isset($_GET['error'])){$data['error'] = $_GET['error'];}
		
		$this->load->view('base/header');
		$this->parser->parse('printing/view', $data);
		$this->load->view('base/footer');
	}
	
	public function add(){
		
		$this->check('table/add');
		
		$this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces');
		
		if ($this->form_validation->run() == FALSE){
			
			$this->load->view('base/header');
			$this->load->view('printing/add');
			$this->load->view('base/footer');
		
		}else{
            
			$data = array(
				'name' => $this->input->post('name')
			);
			
			$this->Db->insert('printing', $data);
			
			redirect('printing/?success=Congrats Printing Added');
			exit;
			
        }
		
	}
	
	public function edit( $uid = null ){
		
		$this->check('table/edit');
		
		$check = $this->Db->get_where_limit('printing', array('id' => $uid), 1);
		
		if($check != null){
			
			$data['id'] = $uid;
			$data['printing'] = $this->Db->get_where_array_limit('printing', array('id' => $uid), 1);
			
			$this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces');
		
			if ($this->form_validation->run() == FALSE){
				
				$this->load->view('base/header');
				$this->parser->parse('printing/edit', $data);
				$this->load->view('base/footer');
			
			}else{
				
				$data = array(
					'name' => $this->input->post('name')
				);
				
				$this->Db->update('printing', array('id'=>$uid), $data);
				
				redirect('printing/?success=Congrats User Edited');
				exit;
				
			}
			
			
		}else{
			redirect('printing/?error=Did not Match any ID', 404);
			exit;
		}
		
	}
	
	public function remove($uid = null){
		
		$this->check('table/remove');
		
		$check = $this->Db->get_where_limit('printing', array('id' => $uid), 1);
		
		if($check != null){
			$this->Db->remove('printing', array('id'=>$uid));
			redirect('printing/?error=Printing Deleted From Database');
		}else{
			redirect('printing/?error=Did not Match any ID', 404);
			exit;
		}
	}
	
}
