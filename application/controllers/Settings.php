<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include('Secure.php');

class Settings extends Secure {

	public function index(){
		
		$this->check('settings');
		
		// Start
		if(isset($_POST['sid'])){
			
			$uid = $this->input->post('sid');
			$check = $this->Db->get_where_limit('settings', array('id' => $uid), 1);
			
			if($check != null){
				
				$validate = $check[0]->validate;
				$this->form_validation->set_rules('value', 'Value', 'required|'.$validate);
				
				if ($this->form_validation->run() != FALSE){
					
					$data = array(
						'value' => $this->input->post('value')
					);
					
					$this->Db->update('settings', array('id'=>$uid), $data);
					
					redirect('settings/?success=Congrats '. $validate = $check[0]->name .' Edited');
					exit;
					
				}else{
					redirect('settings/?error='.validation_errors(), 404);
					exit;
				}
				
			}else{
				redirect('settings/?error=Did not Match any Options', 404);
				exit;
			}
		}
		// End
		
		$data['setting'] = $this->Db->get_array_select('settings', 'id,name,value');
		
		$data['success'] = '';
		$data['error'] = '';
		if(isset($_GET['success'])){$data['success'] = $_GET['success'];}
		if(isset($_GET['error'])){$data['error'] = $_GET['error'];}
		
		$this->load->view('base/header');
		$this->parser->parse('settings/view', $data);
		$this->load->view('base/footer');
	}
	
	public function store(){
		
		$this->check('settings/store');
		
		// Start
		if(isset($_POST['sid'])){
			
			$uid = $this->input->post('sid');
			$check = $this->Db->get_where_limit('settings_store', array('id' => $uid), 1);
			
			if($check != null){
				
				$validate = $check[0]->validate;
				$this->form_validation->set_rules('value', 'Value', 'required|'.$validate);
				
				if ($this->form_validation->run() != FALSE){
					
					$data = array(
						'value' => $this->input->post('value')
					);
					
					$this->Db->update('settings_store', array('id'=>$uid), $data);
					
					redirect('settings/store/?success=Congrats '. $validate = $check[0]->name .' Edited');
					exit;
					
				}else{
					redirect('settings/store/?error='.validation_errors(), 404);
					exit;
				}
				
			}else{
				redirect('settings/store/?error=Did not Match any Options', 404);
				exit;
			}
		}
		// End
		
		$data['setting'] = $this->Db->get_array_select('settings_store', 'id,name,value');
		
		$data['success'] = '';
		$data['error'] = '';
		if(isset($_GET['success'])){$data['success'] = $_GET['success'];}
		if(isset($_GET['error'])){$data['error'] = $_GET['error'];}
		
		$this->load->view('base/header');
		$this->parser->parse('settings/view_store', $data);
		$this->load->view('base/footer');
	}
	
	public function customize(){
		
		$this->check('settings/customize');
		
		// Start
		if(isset($_POST['sid'])){
			
			$uid = $this->input->post('sid');
			$check = $this->Db->get_where_limit('settings_customize', array('id' => $uid), 1);
			
			if($check != null){
				
				$validate = $check[0]->validate;
				$this->form_validation->set_rules('value', 'Value', 'required|'.$validate);
				
				if ($this->form_validation->run() != FALSE){
					
					$data = array(
						'value' => $this->input->post('value')
					);
					
					$this->Db->update('settings_customize', array('id'=>$uid), $data);
					
					redirect('settings/customize/?success=Congrats '. $validate = $check[0]->name .' Edited');
					exit;
					
				}else{
					redirect('settings/customize/?error='.validation_errors(), 404);
					exit;
				}
				
			}else{
				redirect('settings/customize/?error=Did not Match any Options', 404);
				exit;
			}
		}
		// End
		
		$data['setting'] = $this->Db->get_array_select('settings_customize', 'id,name,value');
		
		$data['success'] = '';
		$data['error'] = '';
		if(isset($_GET['success'])){$data['success'] = $_GET['success'];}
		if(isset($_GET['error'])){$data['error'] = $_GET['error'];}
		
		$this->load->view('base/header');
		$this->parser->parse('settings/view_customize', $data);
		$this->load->view('base/footer');
	}
	
	public function fundamentals(){
		
		$this->check('settings/fundamentals');
		
		// Start
		if(isset($_POST['sid'])){
			
			$uid = $this->input->post('sid');
			$check = $this->Db->get_where_limit('settings_fundamentals', array('id' => $uid), 1);
			
			if($check != null){
				
				$validate = $check[0]->validate;
				$this->form_validation->set_rules('value', 'Value', 'required|'.$validate);
				
				if ($this->form_validation->run() != FALSE){
					
					$data = array(
						'value' => $this->input->post('value')
					);
					
					$this->Db->update('settings_fundamentals', array('id'=>$uid), $data);
					
					redirect('settings/fundamentals/?success=Congrats '. $validate = $check[0]->name .' Edited');
					exit;
					
				}else{
					redirect('settings/fundamentals/?error='.validation_errors(), 404);
					exit;
				}
				
			}else{
				redirect('settings/fundamentals/?error=Did not Match any Options', 404);
				exit;
			}
		}
		// End
		
		$data['setting'] = $this->Db->get_array_select('settings_fundamentals', 'id,name,value');
		
		$data['success'] = '';
		$data['error'] = '';
		if(isset($_GET['success'])){$data['success'] = $_GET['success'];}
		if(isset($_GET['error'])){$data['error'] = $_GET['error'];}
		
		$this->load->view('base/header');
		$this->parser->parse('settings/view_fundamentals', $data);
		$this->load->view('base/footer');
	}
	
}
