<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include('Secure.php');

class Table extends Secure {

	public function index(){
		
		$this->check('table');
		
		$data['table'] = $this->Db->get_array_select('table', 'id,number,name');
		$data['prefix'] = $this->Db->get_value_where_select('settings', array('id'=>2), 'value');
		
		$data['success'] = '';
		$data['error'] = '';
		if(isset($_GET['success'])){$data['success'] = $_GET['success'];}
		if(isset($_GET['error'])){$data['error'] = $_GET['error'];}
		
		$this->load->view('base/header');
		$this->parser->parse('table/view', $data);
		$this->load->view('base/footer');
	}
	
	public function add(){
		
		$this->check('table/add');
		
		$this->form_validation->set_rules('number', 'Number', 'required|alpha_numeric');
		$this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces');
		
		if ($this->form_validation->run() == FALSE){
           
			$this->load->view('base/header');
			$this->load->view('table/add');
			$this->load->view('base/footer');
		
		}else{
            
			$data = array(
				'number' => $this->input->post('number'),
				'name' => $this->input->post('name')
			);
			
			$this->Db->insert('table', $data);
			
			redirect('table/?success=Congrats Table Added');
			exit;
			
        }
		
	}
	
	public function edit( $uid = null ){
		
		$this->check('table/edit');
		
		$check = $this->Db->get_where_limit('table', array('id' => $uid), 1);
		
		if($check != null){
			
			$data['id'] = $uid;
			$data['table'] = $this->Db->get_where_array_limit('table', array('id' => $uid), 1);
			
			$this->form_validation->set_rules('number', 'Number', 'required|alpha_numeric');
			$this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces');
		
			if ($this->form_validation->run() == FALSE){
				
				$this->load->view('base/header');
				$this->parser->parse('table/edit', $data);
				$this->load->view('base/footer');
			
			}else{
				
				$data = array(
					'number' => $this->input->post('number'),
					'name' => $this->input->post('name')
				);
				
				$this->Db->update('table', array('id'=>$uid), $data);
				
				redirect('table/?success=Congrats User Edited');
				exit;
				
			}
			
			
		}else{
			redirect('table/?error=Did not Match any ID', 404);
			exit;
		}
		
	}
	
	public function remove($uid = null){
		
		$this->check('table/remove');
		
		$check = $this->Db->get_where_limit('table', array('id' => $uid), 1);
		
		if($check != null){
			$this->Db->remove('table', array('id'=>$uid));
			redirect('table/?error=User ID Deleted From Database');
		}else{
			redirect('table/?error=Did not Match any ID', 404);
			exit;
		}
	}
	
}
