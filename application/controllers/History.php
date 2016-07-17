<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include('Secure.php');

class History extends Secure {

	public function index(){
		
		$this->check('table');
		
		$data['history_supply'] = $this->Db->get_select('history_supply', 'id,name,unit,stock,price,total,supplier,supplier_name,time');
		
		$data['prefix'] = $this->Db->get_value_where_select('settings', array('id'=>2), 'value');
		$data['price_unit'] = $this->Db->get_value_where_select('settings_store', array('id'=>1), 'value');
		
		$data['success'] = '';
		$data['error'] = '';
		if(isset($_GET['success'])){$data['success'] = $_GET['success'];}
		if(isset($_GET['error'])){$data['error'] = $_GET['error'];}
		
		$this->load->view('base/header');
		$this->load->view('history/view', $data);
		$this->load->view('base/footer');
	}
	
	public function salse(){
		
		$this->check('table');
		
		$data['history_sales'] = $this->Db->get_select('history_sales', 'id,total,discount,paid,payment,left,time');
		
		$data['prefix'] = $this->Db->get_value_where_select('settings', array('id'=>2), 'value');
		$data['price_unit'] = $this->Db->get_value_where_select('settings_store', array('id'=>1), 'value');
		
		$data['success'] = '';
		$data['error'] = '';
		if(isset($_GET['success'])){$data['success'] = $_GET['success'];}
		if(isset($_GET['error'])){$data['error'] = $_GET['error'];}
		
		$this->load->view('base/header');
		$this->load->view('history/partsale', $data);
		$this->load->view('base/footer');
	}
	
	
	
}
