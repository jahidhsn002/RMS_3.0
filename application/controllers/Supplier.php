<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include('Secure.php');

class Supplier extends Secure {

	public function index(){
		
		$this->check('table');
		
		$data['supplier'] = $this->Db->get_array_select('supplier', 'id,name,designation,company,address,contact');
		$data['prefix'] = $this->Db->get_value_where_select('settings', array('id'=>2), 'value');
		
		$data['success'] = '';
		$data['error'] = '';
		if(isset($_GET['success'])){$data['success'] = $_GET['success'];}
		if(isset($_GET['error'])){$data['error'] = $_GET['error'];}
		
		$this->load->view('base/header');
		$this->parser->parse('supplier/view', $data);
		$this->load->view('base/footer');
	}
	
	public function add(){
		
		$this->check('table/add');
		
		$this->form_validation->set_rules('company', 'Company', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('designation', 'Cesignation', 'alpha_numeric_spaces');
		$this->form_validation->set_rules('address', 'Address', 'alpha_numeric_spaces');
		$this->form_validation->set_rules('contact', 'Contact', 'alpha_numeric_spaces');
		
		if ($this->form_validation->run() == FALSE){
           
			$this->load->view('base/header');
			$this->load->view('supplier/add');
			$this->load->view('base/footer');
		
		}else{
            
			$data = array(
				'company' => $this->input->post('company'),
				'name' => $this->input->post('name'),
				'designation' => $this->input->post('designation'),
				'address' => $this->input->post('address'),
				'contact' => $this->input->post('contact')
			);
			
			$this->Db->insert('supplier', $data);
			
			redirect('supplier/?success=Congrats Supplier Added');
			exit;
			
        }
		
	}
	
	public function edit( $uid = null ){
		
		$this->check('table/edit');
		
		$check = $this->Db->get_where_limit('supplier', array('id' => $uid), 1);
		
		if($check != null){
			
			$data['id'] = $uid;
			$data['supplier'] = $this->Db->get_where_array_limit('supplier', array('id' => $uid), 1);
			
			$this->form_validation->set_rules('company', 'Company', 'required|alpha_numeric_spaces');
			$this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces');
			$this->form_validation->set_rules('designation', 'Cesignation', 'alpha_numeric_spaces');
			$this->form_validation->set_rules('address', 'Address', 'alpha_numeric_spaces');
			$this->form_validation->set_rules('contact', 'Contact', 'alpha_numeric_spaces');
		
			if ($this->form_validation->run() == FALSE){
				
				$this->load->view('base/header');
				$this->parser->parse('supplier/edit', $data);
				$this->load->view('base/footer');
			
			}else{
				
				$data = array(
					'company' => $this->input->post('company'),
					'name' => $this->input->post('name'),
					'designation' => $this->input->post('designation'),
					'address' => $this->input->post('address'),
					'contact' => $this->input->post('contact')
				);
				
				$this->Db->update('supplier', array('id'=>$uid), $data);
				
				redirect('supplier/?success=Congrats User Edited');
				exit;
				
			}
			
			
		}else{
			redirect('supplier/?error=Did not Match any ID', 404);
			exit;
		}
		
	}
	
	public function remove($uid = null){
		
		$this->check('table/remove');
		
		$check = $this->Db->get_where_limit('supplier', array('id' => $uid), 1);
		
		if($check != null){
			$this->Db->remove('supplier', array('id'=>$uid));
			redirect('supplier/?error=User ID Deleted From Database');
		}else{
			redirect('supplier/?error=Did not Match any ID', 404);
			exit;
		}
	}
	
}
