<?php
namespace app\models;
ini_set('default_charset','UTF-8');
abstract class Model {
	protected $connection;

	public function __construct() {
		$this->connection = Connection::connect();
	}
	public function all() {
		$sql = "SELECT * FROM {$this->table}";
		$all = $this->connection->prepare($sql);
		$all->execute();
		return $all->fetchAll();
	}
	public function sucess(){
		echo '<script type="text/javascript"> alert("Sucesso")</script>';
	}
}