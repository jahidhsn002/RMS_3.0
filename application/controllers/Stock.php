<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include('Secure.php');

class Stock extends Secure {

	public function index(){
		
		$this->check('table');
		
		// Start
		if(isset($_POST['sid'])){
			
			$uid = $this->input->post('sid');
			$check = $this->Db->get_where_limit('stock', array('food_id' => $uid), 1);
			
			if($check != null){
				
				$this->form_validation->set_rules('qty', 'Wastage', 'required|numeric');
				
				if ($this->form_validation->run() != FALSE){
					
					$stock = $check[0]->stock - $this->input->post('qty');
					$wastage = $check[0]->wastage + $this->input->post('qty');
					
					$data = array(
						'stock' => $stock,
						'wastage' => $wastage
					);
					
					$this->Db->update('stock', array('food_id'=>$uid), $data);
					
					redirect('stock/?success=Congrats '. $validate = $check[0]->name .' Wastage Added');
					exit;
					
				}else{
					redirect('stock/?error='.validation_errors(), 404);
					exit;
				}
				
			}else{
				redirect('stock/?error=Did not Match any Options', 404);
				exit;
			}
		}
		// End
		
		$data['stock'] = $this->Db->get_select('stock', 'food_id,stock,wastage,price');
		
		$data['prefix'] = $this->Db->get_value_where_select('settings', array('id'=>2), 'value');
		$data['price_unit'] = $this->Db->get_value_where_select('settings_store', array('id'=>1), 'value');
		
		$data['success'] = '';
		$data['error'] = '';
		if(isset($_GET['success'])){$data['success'] = $_GET['success'];}
		if(isset($_GET['error'])){$data['error'] = $_GET['error'];}
		
		$this->load->view('base/header');
		$this->load->view('stock/view', $data);
		$this->load->view('base/footer');
	}
	
	public function supply(){
		
		$this->check('table/edit');
		
		if(isset($_GET["category"])){
			$category = $this->input->get('category');
			$data['food'] = $this->Db->get_array_where_in_select('food', 'category', $category, 'id,thumb,name');
		}
		
		$data['supplier'] = $this->Db->get_array_select('supplier', 'id,name,company');
		$data['category'] = $this->Db->get_array_select('category', 'id,name,thumb');
		
		$data['success'] = '';
		$data['error'] = '';
		if(isset($_GET['success'])){$data['success'] = $_GET['success'];}
		if(isset($_GET['error'])){$data['error'] = $_GET['error'];}
		
		$this->load->view('base/header');
		$this->parser->parse('stock/supply', $data);
		$this->load->view('base/footer');
		
	}
	
	public function add(){
		
		$this->check('table/edit');
		
		$check1 = $this->Db->get_where_limit('food', array('id' => $_POST['id']), 1);
		$check2 = $this->Db->get_where_limit('supplier', array('id' => $_POST['supplier']), 1);
		
		if($check1 != null && $check2 != null){
			
			$this->form_validation->set_rules('qty', 'Quantity', 'required|numeric');
			$this->form_validation->set_rules('total', 'Total', 'required|numeric');
			$this->form_validation->set_rules('paid', 'Paid', 'required|numeric');
			$this->form_validation->set_rules('supplier', 'Supplier', 'required|numeric');
		
			if ($this->form_validation->run() != FALSE){
				
				$qty_prev = $this->Db->get_value_where_select('stock', array('food_id'=>$_POST['id']), 'stock');
				$total_prev = $this->Db->get_value_where_select('stock', array('food_id'=>$_POST['id']), 'price') * $qty_prev;
				
				$qty = $qty_prev + $_POST['qty'];
				$total = $total_prev + $_POST['total'];
				$price = $total/$qty;
				
				$data = array(
					'stock' => $qty,
					'price' => $price
				);
				
				$this->Db->update('stock', array('food_id'=>$_POST['id']), $data);
				
				$data = array(
					'name' => $this->Db->get_value_where_select('food', array('id'=>$_POST['id']), 'name'),
					'unit' => $this->Db->get_value_where_select('food', array('id'=>$_POST['id']), 'unit'),
					'stock' => $_POST['qty'],
					'price' => $_POST['total']/$_POST['qty'],
					'total' => $_POST['total'],
					'paid' => $_POST['paid'],
					'due' => ($_POST['total'] - $_POST['paid']),
					'supplier_name' => $this->Db->get_value_where_select('supplier', array('id'=>$_POST['supplier']), 'name'),
					'supplier' => $_POST['supplier'],
					'time' => gmt_to_local(local_to_gmt(time()), 'UP6', FALSE)
				);
				
				$slid = $this->Db->insert('history_supply', $data);
				redirect('stock/slip/'. $slid);
				exit;
			
			}else{
				
				redirect('stock/?error='. validation_errors());
				exit;
				
			}
			
			
		}else{
			redirect('stock/?error=Did not Match any ID', 404);
			exit;
		}
		
	}
	
	public function slip($uid = null){
		
		$this->check('table/edit');
		
		$check = $this->Db->get_where_limit('history_supply', array('id' => $uid), 1);
		
		if($check != null){
			
			$data['slip'] = $this->Db->get_where_array_limit('history_supply', array('id' => $uid), 1);
			
			$this->load->view('base/header');
			$this->parser->parse('slip/history_supply', $data);
			$this->load->view('base/footer');
		
		}else{
			redirect('history/?error=Did not Match any ID', 404);
			exit;
		}
		
	}
	
}
