<?php
namespace app\models;

class User extends Model {
	protected $table = 'usuario';

	public function islogado(){
		if(isset($_SESSION['loginId'])){
			return true;
		}else{
			return false;
		}
	}
	public function countNome($nome){
		$sql = "SELECT * FROM {$this->table} where nome='$nome'";
		$count = $this->connection->prepare($sql);
		$count->execute();
		return $count->rowCount();
	}
	public function login($nome, $senha){
		$sql = "SELECT * FROM {$this->table} where nome='$nome' and senha='$senha'";
		$login = $this->connection->prepare($sql);
		$login->execute();
		return $login->fetchAll();
	}
	public function getUser($id){
		$sql = "SELECT * FROM {$this->table} where id='$id'";
		$getUser = $this->connection->prepare($sql);
		$getUser->execute();
		return $getUser->fetchAll();
	}
	public function cadastrar($nome, $senha){
		$sql = "INSERT INTO {$this->table} VALUES (DEFAULT, '$nome', '$senha')";
		$cadastrar = $this->connection->prepare($sql);
		$cadastrar->execute();
	}
	public function cadastrarAumentoH($O,$I,$id){
		$sql = "INSERT INTO aumentoh VALUES (DEFAULT, '$id', '$O', '$I', DEFAULT)";
		$cadastrar = $this->connection->prepare($sql);
		$cadastrar->execute();
	}
	public function cadastrarAumentoD($O,$I,$id){
		$sql = "INSERT INTO aumentod VALUES (DEFAULT, '$id', '$O', '$I', DEFAULT)";
		$cadastrar = $this->connection->prepare($sql);
		$cadastrar->execute();
	}
	public function cadastrarGauss($Do,$Di,$F,$id){
		$sql = "INSERT INTO gauss VALUES (DEFAULT, '$id', '$Do', '$Di', '$F',  DEFAULT)";
		$cadastrar = $this->connection->prepare($sql);
		$cadastrar->execute();
	}
	public function lerHistoricoAumentoH($id) {
		$sql = "SELECT * FROM aumentoh where idUsuario='$id' ORDER BY dataHora desc";
		$getUser = $this->connection->prepare($sql);
		$getUser->execute();
		return $getUser->fetchAll();
	}
	public function lerHistoricoAumentoD($id) {
		$sql = "SELECT * FROM aumentod where idUsuario='$id' ORDER BY dataHora desc";
		$getUser = $this->connection->prepare($sql);
		$getUser->execute();
		return $getUser->fetchAll();
	}
	public function lerHistoricoGauss($id) {
		$sql = "SELECT * FROM gauss where idUsuario='$id' ORDER BY dataHora desc";
		$getUser = $this->connection->prepare($sql);
		$getUser->execute();
		return $getUser->fetchAll();
	}
	public function excluirH($id){
		$sql = "DELETE FROM aumentoh WHERE id = '$id'";
		$delete = $this->connection->prepare($sql);
		$delete->execute();
	}
	public function excluirD($id){
		$sql = "DELETE FROM aumentod WHERE id = '$id'";
		$delete = $this->connection->prepare($sql);
		$delete->execute();
	}
	public function excluirGauss($id){
		$sql = "DELETE FROM gauss WHERE id = '$id'";
		$delete = $this->connection->prepare($sql);
		$delete->execute();
	}
}