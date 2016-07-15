<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Db extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
	
	public function get($table){
        $query = $this->db->get($table);
        return $query->result();
    }
	
	public function get_where($table, $query){
        $query = $this->db
						->where($query)
						->get($table);
        return $query->result();
    }
	
    public function get_select($table, $field){
        $query = $this->db
						->select($field)
						->get($table);
        return $query->result();
    }
	
	public function get_relation($table,$id,$demand){
		$out = 'False';
        $query = $this->db
						->where('id', $id)
						->select($demand)
						->get($table);
        $values = $query->result();
		foreach($values as $value){
				$out = $value->$demand;
		}
		return $out;
    }
	
	public function insert($table, $data){
		if ( ! $this->db->insert($table, $data)){
			return 'False';
		}else{
			$data = $this->db->get_where($table, $data, 1);
			foreach($data->result() as $field){
				return $field->id;
			}
		}
    }
	
	public function update($table, $data, $data2){
		if ( ! $this->db->where('id',$data)->update($table, $data2)){
			return $this->db->error();
		}
		return 'True';
    }
	
	public function trash($table,$id){
		if ( ! $this->db->delete($table, array('id' => $id))){
			return $this->db->error();
		}
		return 'True';
    }
	
	public function trash_where($table,$query){
		if ( ! $this->db->delete($table, $query)){
			return $this->db->error();
		}
		return 'True';
    }
	
	function login($username, $password){
		$this -> db -> select('id, username, password');
		$this -> db -> from('user');
		$this -> db -> where('username', $username);
		$this -> db -> where('password', MD5($password));
		$this -> db -> limit(1);
		 
		$query = $this -> db -> get();
		 
		if($query -> num_rows() == 1){
			return $query->result();
		}else{
			return false;
		}
	}
	
}

?>