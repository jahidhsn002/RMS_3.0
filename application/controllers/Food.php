<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include('Secure.php');

class Food extends Secure {

	public function index(){
		
		$this->check('table');
		
		$data['category'] = $this->Db->get_array_select('category', 'id,name');
		$data['printing'] = $this->Db->get_array_select('printing', 'id,name');
		
		if(isset($_GET["category"])){
			$category = $this->input->get('category');
			$data['food'] = $this->Db->get_array_where_in_select('food', 'category', $category, 'id,thumb,name,unit');
		}else if(isset($_GET["printing"])){
			$printing = $this->input->get('printing');
			$data['food'] = $this->Db->get_array_where_in_select('food', 'printing', $printing, 'id,thumb,name,unit');
		}else if(isset($_GET["printing"]) && isset($_GET["category"])){
			$category = $this->input->get('category');
			$printing = $this->input->get('printing');
			$data['food'] = $this->Db->get_array_where_in_double_select('food', 'printing', $printing, 'category', $category, 'id,thumb,name,unit');
		}else{
			$data['food'] = $this->Db->get_array_select('food', 'id,thumb,name,unit');
		}
		
		$data['prefix'] = $this->Db->get_value_where_select('settings', array('id'=>2), 'value');
		
		$data['success'] = '';
		$data['error'] = '';
		if(isset($_GET['success'])){$data['success'] = $_GET['success'];}
		if(isset($_GET['error'])){$data['error'] = $_GET['error'];}
		
		$this->load->view('base/header');
		$this->parser->parse('food/view', $data);
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
		$this->form_validation->set_rules('unit', 'Unit', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('price', 'Price', 'required|numeric');
		$this->form_validation->set_rules('category', 'Category', 'required|numeric');
		$this->form_validation->set_rules('printing', 'Printing', 'required|numeric');
		
		if ($this->form_validation->run() == FALSE || !$this->upload->do_upload('thumb')){
			
			$data['category'] = $this->Db->get_array_select('category', 'id,name');
			$data['printing'] = $this->Db->get_array_select('printing', 'id,name');
			
			$this->load->view('base/header');
			$this->parser->parse('food/add', $data);
			$this->load->view('base/footer');
		
		}else{
            
			$up_data = $this->upload->data();
			
			$data = array(
				'name' => $this->input->post('name'),
				'thumb' => sanitize_filename($up_data['file_name']),
				'unit' => $this->input->post('unit'),
				'price' => $this->input->post('price'),
				'category' => $this->input->post('category'),
				'printing' => $this->input->post('printing')
			);
			
			$fid = $this->Db->insert('food', $data);
			
			$stock = array(
				'food_id' => $fid,
				'stock' => 0,
				'wastage' => 0,
				'price' => 0
			);
			
			$this->Db->insert('stock', $stock);
			
			redirect('food/?success=Congrats Food Added');
			exit;
			
        }
		
	}
	
	public function edit( $uid = null ){
		
		$this->check('table/edit');
		
		$check = $this->Db->get_where_limit('food', array('id' => $uid), 1);
		
		if($check != null){
			
			$data['id'] = $uid;
			$data['food'] = $this->Db->get_where_array_limit('food', array('id' => $uid), 1);
			
			$this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces');
			$this->form_validation->set_rules('unit', 'Unit', 'required|alpha_numeric_spaces');
			$this->form_validation->set_rules('price', 'Price', 'required|numeric');
			$this->form_validation->set_rules('category', 'Category', 'required|numeric');
			$this->form_validation->set_rules('printing', 'Printing', 'required|numeric');
		
			if ($this->form_validation->run() == FALSE){
				
				$data['category'] = $this->Db->get_array_select('category', 'id,name');
				$data['printing'] = $this->Db->get_array_select('printing', 'id,name');
			
				$this->load->view('base/header');
				$this->parser->parse('food/edit', $data);
				$this->load->view('base/footer');
			
			}else{
				
				$data = array(
					'name' => $this->input->post('name'),
					'unit' => $this->input->post('unit'),
					'price' => $this->input->post('price'),
					'category' => $this->input->post('category'),
					'printing' => $this->input->post('printing')
				);
				
				$this->Db->update('food', array('id'=>$uid), $data);
				
				redirect('food/?success=Congrats Food Edited');
				exit;
				
			}
			
			
		}else{
			redirect('food/?error=Did not Match any ID', 404);
			exit;
		}
		
	}
	
	public function remove($uid = null){
		
		$this->check('table/remove');
		
		$check = $this->Db->get_where_limit('food', array('id' => $uid), 1);
		
		if($check != null){
			$this->Db->remove('food', array('id'=>$uid));
			$this->Db->remove('stock', array('food_id'=>$uid));
			redirect('food/?error=Food Deleted From Database');
		}else{
			redirect('food/?error=Did not Match any ID', 404);
			exit;
		}
	}
	
}
