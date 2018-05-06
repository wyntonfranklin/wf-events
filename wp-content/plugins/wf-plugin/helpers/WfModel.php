<?php
/**
 * Created by PhpStorm.
 * User: shady
 * Date: 5/5/2018
 * Time: 8:51 PM
 */

class WfModel {

	private $_db;
	private $_table;
	private $_data;

	public function __construct($table_name='') {

		global $wpdb;
		$this->_db = $wpdb;
		$this->_table = $table_name;
	}

	public function findByPk( $value, $key ){
		$sql = 'SELECT * from '.$this->table() .' WHERE '.$key . '='.$value;
		$results = $this->db()->get_row($sql,ARRAY_A);
		$this->setData( $results );
		return $this->getData();
	}

	public function findAll(){
		$sql = 'SELECT * from '.$this->table();
		$results = $this->db()->get_results($sql,ARRAY_A);
		$this->setData( $results );
		return $this->getData();
	}

	public function update( $values, $key, $value ){
		$this->db()->update($this->table(),$values,array($key=>$value));
		return true;
	}

	public function db(){
		return $this->_db;
	}

	public static function wpdb(){
		global $wpdb;
		return $wpdb;
	}

	public function table(){
		return $this->_table;
	}

	public function setData( $data ){
		$this->_data = $data;
	}

	public function getData(){
		return $this->_data;
	}

	public function getKey( $value ){
		return $this->getData()[$value];
	}

	public function queryAll( $sql ){
		$results = $this->db()->get_results($sql,ARRAY_A);
		$this->setData( $results );
	}

	public function queryRow( $sql ){
		$results = $this->db()->get_row($sql,ARRAY_A);
		$this->setData( $results );
		return $this->getData();
	}

	public function query( $sql ){
		return $this->db()->query( $sql );
	}


}