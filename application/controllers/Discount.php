<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include('Secure.php');

class Discount extends Secure {

	public function index(){
		
		$this->check('table');
		
		$data['discount'] = $this->Db->get_array_select('discount', 'id,name,type,value');
		$data['prefix'] = $this->Db->get_value_where_select('settings', array('id'=>2), 'value');
		
		$data['success'] = '';
		$data['error'] = '';
		if(isset($_GET['success'])){$data['success'] = $_GET['success'];}
		if(isset($_GET['error'])){$data['error'] = $_GET['error'];}
		
		$this->load->view('base/header');
		$this->parser->parse('discount/view', $data);
		$this->load->view('base/footer');
	}
	
	public function add(){
		
		$this->check('table/add');
		
		$this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('type', 'Type', 'required|in_list[parcent,strait]');
		$this->form_validation->set_rules('value', 'Discount', 'required|numeric');
		
		if ($this->form_validation->run() == FALSE){
			
			$this->load->view('base/header');
			$this->load->view('discount/add');
			$this->load->view('base/footer');
		
		}else{
            
			$data = array(
				'name' => $this->input->post('name'),
				'type' => $this->input->post('type'),
				'value' => $this->input->post('value')
			);
			
			$this->Db->insert('discount', $data);
			
			redirect('discount/?success=Congrats Discount Added');
			exit;
			
        }
		
	}
	
	public function edit( $uid = null ){
		
		$this->check('table/edit');
		
		$check = $this->Db->get_where_limit('discount', array('id' => $uid), 1);
		
		if($check != null){
			
			$data['id'] = $uid;
			$data['discount'] = $this->Db->get_where_array_limit('discount', array('id' => $uid), 1);
			
			$this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces');
			$this->form_validation->set_rules('type', 'Type', 'required|in_list[parcent,strait]');
			$this->form_validation->set_rules('value', 'Discount', 'required|numeric');
		
			if ($this->form_validation->run() == FALSE){
				
				$this->load->view('base/header');
				$this->parser->parse('discount/edit', $data);
				$this->load->view('base/footer');
			
			}else{
				
				$data = array(
					'name' => $this->input->post('name'),
					'type' => $this->input->post('type'),
					'value' => $this->input->post('value')
				);
				
				$this->Db->update('discount', array('id'=>$uid), $data);
				
				redirect('discount/?success=Congrats User Edited');
				exit;
				
			}
			
			
		}else{
			redirect('discount/?error=Did not Match any ID', 404);
			exit;
		}
		
	}
	
	public function remove($uid = null){
		
		$this->check('table/remove');
		
		$check = $this->Db->get_where_limit('discount', array('id' => $uid), 1);
		
		if($check != null){
			$this->Db->remove('discount', array('id'=>$uid));
			redirect('discount/?error=Discount Deleted From Database');
		}else{
			redirect('discount/?error=Did not Match any ID', 404);
			exit;
		}
	}
	
}
