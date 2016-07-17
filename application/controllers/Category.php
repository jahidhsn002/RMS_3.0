<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include('Secure.php');

class Category extends Secure {

	public function index(){
		
		$this->check('table');
		
		$data['category'] = $this->Db->get_array_select('category', 'id,thumb,name');
		$data['prefix'] = $this->Db->get_value_where_select('settings', array('id'=>2), 'value');
		
		$data['success'] = '';
		$data['error'] = '';
		if(isset($_GET['success'])){$data['success'] = $_GET['success'];}
		if(isset($_GET['error'])){$data['error'] = $_GET['error'];}
		
		$this->load->view('base/header');
		$this->parser->parse('category/view', $data);
		$this->load->view('base/footer');
	}
	
	public function add(){
		
		$this->check('table/add');
		
		// Uploads
		$config['upload_path']          = './upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1048;
        $config['max_width']            = 200;
        $config['max_height']           = 200;
		
		// Load Config
		$this->upload->initialize($config);
		
		$this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces');
		
		if ($this->form_validation->run() == FALSE || !$this->upload->do_upload('thumb')){
			
			$this->load->view('base/header');
			$this->load->view('category/add');
			$this->load->view('base/footer');
		
		}else{
            
			$up_data = $this->upload->data();
			
			$data = array(
				'name' => $this->input->post('name'),
				'thumb' => sanitize_filename($up_data['file_name'])
			);
			
			$this->Db->insert('category', $data);
			
			redirect('category/?success=Congrats Category Added');
			exit;
			
        }
		
	}
	
	public function edit( $uid = null ){
		
		$this->check('table/edit');
		
		$check = $this->Db->get_where_limit('category', array('id' => $uid), 1);
		
		if($check != null){
			
			$data['id'] = $uid;
			$data['category'] = $this->Db->get_where_array_limit('category', array('id' => $uid), 1);
			
			$this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces');
		
			if ($this->form_validation->run() == FALSE){
				
				$this->load->view('base/header');
				$this->parser->parse('category/edit', $data);
				$this->load->view('base/footer');
			
			}else{
				
				$data = array(
					'name' => $this->input->post('name')
				);
				
				$this->Db->update('category', array('id'=>$uid), $data);
				
				redirect('category/?success=Congrats User Edited');
				exit;
				
			}
			
			
		}else{
			redirect('category/?error=Did not Match any ID', 404);
			exit;
		}
		
	}
	
	public function remove($uid = null){
		
		$this->check('table/remove');
		
		$check = $this->Db->get_where_limit('category', array('id' => $uid), 1);
		
		if($check != null){
			$this->Db->remove('category', array('id'=>$uid));
			redirect('category/?error=Category Deleted From Database');
		}else{
			redirect('category/?error=Did not Match any ID', 404);
			exit;
		}
	}
	
}
