<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include('Secure.php');

class Salse extends Secure {
	
	public function index(){
		
		$this->check('table/edit');
		
		if(isset($_GET["category"]) && !isset($_GET["food"]) && !isset($_GET['cart'])){
			$category = $this->input->get('category');
			$data['foods'] = $this->Db->get_array_where_in_select('food', 'category', $category, 'id,thumb,name,price,unit');
		}elseif(!isset($_GET["category"]) && isset($_GET["food"]) && !isset($_GET['cart'])){
			$fid = $_GET["food"];
			$data = array(
				'id'      => $fid,
				'qty'     => 1,
				'price'   => $this->Db->get_value_where_select('food', array('id'=>$fid), 'price'),
				'name'    => $this->Db->get_value_where_select('food', array('id'=>$fid), 'name')
			);
			echo $this->cart->insert($data);
			redirect('salse/?cart=1');
			exit;
		}elseif(!isset($_GET["category"]) && !isset($_GET["food"]) && isset($_GET['cart'])){
			if($_GET['cart'] == 0){
				$this->cart->destroy();
				redirect('Salse');
				exit;
			}
		}
		
		$data['supplier'] = $this->Db->get_array_select('supplier', 'id,name,company');
		$data['category'] = $this->Db->get_array_select('category', 'id,name,thumb');
		$data['discount'] = $this->Db->get_array_select('discount', 'id,name,value,type');
		$data['payment'] = $this->Db->get_array_select('payment', 'id,name');
		
		$data['success'] = '';
		$data['error'] = '';
		if(isset($_GET['success'])){$data['success'] = $_GET['success'];}
		if(isset($_GET['error'])){$data['error'] = $_GET['error'];}
		
		$this->load->view('base/header');
		$this->parser->parse('salse/view', $data);
		$this->load->view('base/footer');
		
	}
	
	public function order(){
		
		$this->check('table/edit');
		
		if(isset($_GET["category"]) && !isset($_GET["food"]) && !isset($_GET['cart'])){
			$category = $this->input->get('category');
			$data['foods'] = $this->Db->get_array_where_in_select('food', 'category', $category, 'id,thumb,name,price,unit');
		}elseif(!isset($_GET["category"]) && isset($_GET["food"]) && !isset($_GET['cart'])){
			$fid = $_GET["food"];
			$data = array(
				'id'      => $fid,
				'qty'     => 1,
				'price'   => $this->Db->get_value_where_select('food', array('id'=>$fid), 'price'),
				'name'    => $this->Db->get_value_where_select('food', array('id'=>$fid), 'name')
			);
			echo $this->cart->insert($data);
			redirect('salse/?cart=1');
			exit;
		}elseif(!isset($_GET["category"]) && !isset($_GET["food"]) && isset($_GET['cart'])){
			if($_GET['cart'] == 0){
				$this->cart->destroy();
				redirect('Salse');
				exit;
			}
		}
		
		$data['supplier'] = $this->Db->get_array_select('supplier', 'id,name,company');
		$data['category'] = $this->Db->get_array_select('category', 'id,name,thumb');
		$data['table'] = $this->Db->get_array_select('table', 'id,number,name');
		$data['discount'] = $this->Db->get_array_select('discount', 'id,name,value,type');
		$data['payment'] = $this->Db->get_array_select('payment', 'id,name');
		
		$data['success'] = '';
		$data['error'] = '';
		if(isset($_GET['success'])){$data['success'] = $_GET['success'];}
		if(isset($_GET['error'])){$data['error'] = $_GET['error'];}
		
		$this->load->view('base/header');
		$this->parser->parse('salse/order', $data);
		$this->load->view('base/footer');
		
	}
	
	public function complete_partsell(){
		
		$this->form_validation->set_rules('paid', 'Paid', 'required|numeric');
		$this->form_validation->set_rules('payment', 'Payment', 'required|alpha_dash');
		$this->form_validation->set_rules('discount', 'Discount', 'required|numeric');
		
		if ($this->form_validation->run() != FALSE){
			
			$total = $this->cart->total();
			if($this->Db->get_value_where_select('discount', array('id'=>$_POST['discount']), 'type') == 'parcent'){
				$dis = $this->Db->get_value_where_select('discount', array('id'=>$_POST['discount']), 'value');
				$discount = (($total*$dis)/100) . '(' . $dis . '%)';
				$t_dis = $total - (($total*$dis)/100);
			}else{
				$dis = $this->Db->get_value_where_select('discount', array('id'=>$_POST['discount']), 'value');
				$discount = $dis;
				$t_dis = $total - $dis;
			}
			
			$serv = $this->Db->get_value_where_select('settings_fundamentals', array('id'=>1), 'value');
			$service = (($t_dis*$serv)/100) . '(' . $serv . '%)';
			$s_dis = $t_dis + (($t_dis*$serv)/100);
			
			$vate = $this->Db->get_value_where_select('settings_fundamentals', array('id'=>2), 'value');
			$vat = (($s_dis*$vate)/100) . '(' . $vate . '%)';
			$v_dis = $s_dis + (($s_dis*$vate)/100);
			
			$left = $v_dis - $_POST['paid'];
			
			$data = array(
				'total' => $v_dis,
				'discount' => $discount,
				'service' => $service,
				'vat' => $vat,
				'paid' => $_POST['paid'],
				'payment' => $_POST['payment'],
				'left' => $left,
				'cradit' => $this->session->userdata('user_id'),
				'cradit_name' => $this->session->userdata('user_name'),
				'time' => gmt_to_local(local_to_gmt(time()), 'UP6', FALSE)
			);
			$key = $this->Db->insert('history_sales', $data);
			foreach ($this->cart->contents() as $items):
				
				$food = array(
					'food_id' => $items['id'],
					'key' => $key,
					'name' => $items['name'],
					'qty' => $items['qty'],
					'price' => $items['price'],
					'subtotal' => $items['subtotal']
				);
				$this->Db->insert('history_food', $food);
			
			endforeach;
			
			redirect('salse/partsell_slip/' . $key);
			exit;
			
		}else{
			echo validation_errors();
			//redirect('refar');
			exit;
		}
		
	}
	
	public function partsell_slip($uid = null){
		
		$this->check('table/edit');
		
		$check = $this->Db->get_where_limit('history_sales', array('id' => $uid), 1);
		
		if($check != null){
			
			$data['slip'] = $this->Db->get_where_array_limit('history_sales', array('id' => $uid), 1);
			$data['food'] = $this->Db->get_where_array('history_food', array('key' => $uid));
			
			$data['contact'] = $this->Db->get_value_where_select('settings_store', array('id'=>2), 'value');
			$data['address'] = $this->Db->get_value_where_select('settings_store', array('id'=>3), 'value');
			
			$this->load->view('base/header');
			$this->parser->parse('slip/history_sales', $data);
			$this->load->view('base/footer');
		
		}else{
			redirect('history/?error=Did not Match any ID', 404);
			exit;
		}
		
	}
	
	public function update_cart(){
		$i =1;
		foreach ($this->cart->contents() as $item) {
			$up_data[] = array(
				'rowid' => $this->input->post($i.'rowid'),
				'qty' => $this->input->post($i.'qty')
			);
			$i++;
		}
		$this->cart->update($up_data);
		redirect($this->input->post('refar'));
		exit;
	}
	
}
