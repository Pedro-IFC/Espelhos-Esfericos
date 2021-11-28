<?php
	session_start();
	include "../html/header.html";
	include "../html/menu.html";
?>
<br><br>
<div class="container">
	<div class="row">
		<form method="POST">
			<h3>Confirme a saída da conta</h3><br><br>
			<button class="btn red waves-effect waves-light" type="submit" name="sair">Sair
		    	<i class="material-icons right">send</i>
		  	</button>
		  	<a href="../../index.php" class="btn waves-effect waves-light">Cancelar</a>
		  	<br><br><br><br><br>
		</form>
	</div>
</div>
<?php
	if (isset($_POST['sair'])) {
		unset($_SESSION['loginId']);
		header("Location: ../../index.php");
	}
	include "../html/footer.html";
?>