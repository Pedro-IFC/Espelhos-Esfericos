<?php
	session_start();	
	include "assets/html/header.html";
	require_once "../config.php";
	use app\models\User;
	$user = new User;
	$medida = isset($_POST['medida'])?$_POST['medida']:'D';
?>
	<?php
		include "assets/html/menu.html"
	?>
	<br><br>
	<div class="container">
		<a class="btn waves-effect waves-light" href="index.php">Voltar</a><br><br>
		<div class="row">
			<form method="POST">
				<label>
				    <input class="" name="medida" type="radio" value="H"
				    <?php if ($medida=='H') echo "checked";?>>
				    <span>Altura (Ho e Hi)</span>
				</label>
				<label>
				    <input class="" name="medida" type="radio" value="D"
				    <?php if ($medida=='D') echo "checked";?>>
				    <span>Distancia (Do e Di)</span>
				</label>
				    <?php
				    	if (isset($_POST['proximo'])) {
				    		include "assets/php/aumento2.php";
				    	}else{
				    		echo '<br><button class="btn waves-effect waves-light" type="submit" name="proximo">Proximo <i class="material-icons right">chevron_right</i></button>';
				    	}
				    ?>

			<a class="btn waves-effect waves-light" href="historicoAumento.php">Histórico</a>
		</div>
		<div class="row">
			<form method="POST">
				<button class="btn waves-effect waves-light" type="submit" name="conteudo">Conteúdo</button>
			</form>
		</div>
	<?php
	if (isset($_POST['conteudo']) and !isset($_POST['fechar'])) {
		include "assets/html/conteudoAumento2.html";
	}
	echo "</div>";
	include "assets/html/footer.html";
?>