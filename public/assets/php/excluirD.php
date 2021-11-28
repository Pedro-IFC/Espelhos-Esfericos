<?php
	session_start();	
	require_once "../../../config.php";
	use app\models\User;
	$user = new User;
	$id=$_GET['Id'];
	$user->excluirD($id);
	header("Location: ../../historicoAumento.php");
?>