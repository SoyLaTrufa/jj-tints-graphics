<?php

class MY_Model extends CI_Model {

	const DEBUG = false;

	var $fields = array();
	var $table = '';

	function __construct(){
        parent::__construct();
    }

    public function get_query_list($filters=null,$orders=null,$paginator=array(),$fields='*')
	{
		$items = array();

		$sql = $this->sql_query_list($filters,$orders,$paginator,$fields='*');
		if(self::DEBUG){
            log_message('error', '|| '.get_class($this).' || get_query_list: '.$sql);
        }

		$query = $this->db->query($sql);

		foreach($query->result() as $it){
			$items[] = $it;
		}

		return $items;
	}

	public function sql_query_list($filters,$orders,$paginator=array(),$fields='*')
	{
		$sql = 'SELECT '.$fields.' FROM '.$this->table.' WHERE 1=1';
		$filters = [];
		if(count($filters)>0){
		// if(count((is_countable($filters)?$filters:[]))){
			$sql .= implode(' ',$filters);
		}

		$orders = count($orders)>0 ? $orders : array('orden ASC','id DESC');
		$sql .= ' ORDER BY '.implode(',',$orders);

		if(isset($paginator['startrow']) && isset($paginator['pagination']) && is_numeric($paginator['startrow']) && is_numeric($paginator['pagination'])){
			$sql .= ' LIMIT '.$paginator['startrow'].', '.$paginator['pagination'];
		}

		return $sql;
	}

	public function get_item($id)
	{

		$sql = 'SELECT * FROM '.$this->table.' WHERE id = '.$id.' LIMIT 1';
		if(self::DEBUG){
            log_message('error', '|| '.get_class($this).' || get_item: '.$sql);
        }

		$res = $this->db->query($sql);
		if($res){
			return $res->row();

		}else{
			log_message('error', "MY_Model - Error(".$this->db->_error_number().") ".$this->db->_error_message());
			return false;
		}

	}

	public function save_item($o, $isUpdate, $validar = true)
	{

    	if( $validar ){
    		// Validación de ejemplo
	  		// if(! $o->novedad_id){
			// 	throw new Exception('Seleccioná alguna novedad.');
			// 	return false;
			// }
		}
		
		$data = array();

		if($o){
			foreach($this->fields as $f){
				if(isset($o->$f)){
					$data[$f] = $o->$f;
				}
			}
		}

		if($isUpdate){
			$this->db->where('id', $o->id);
			$this->db->update($this->table, $data);
			$id = $o->id;
		}else{
			$data['id'] = null;
			$this->db->insert($this->table, $data);
			$id = $this->db->insert_id();
		}

		if(self::DEBUG){
            log_message('error', '|| '.get_class($this).' || save_item: '.$this->db->last_query());
        }

		if ($this->db->_error_message()){
			log_message('error', 'MY_Model - '.$this->table.': '.$this->db->_error_message());
		}

		return $id;

	}

	public function delete_item($id)
	{
		$this->db->where('id',$id);
		$this->db->delete($this->table);

		if(self::DEBUG){
            log_message('error', '|| '.get_class($this).' || delete_item: '.$this->db->last_query());
        }

        if ($this->db->_error_message()){
			log_message('error', 'MY_Model - '.$this->table.': '.$this->db->_error_message());
			return false;
		}

		return true;
	}


}