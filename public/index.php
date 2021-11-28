<?php
	session_start();	
	include "assets/html/header.html";
	require_once "../config.php";
	use app\models\User;
	$user = new User;
?>
	<?php
		include "assets/html/menu.html"
	?>
	<div class="container">
		<div class="row">
			<?php 
				$islogado=$user->islogado();
				if(!$islogado){
					echo '<h5 class="erro">Não será possivel salvar seus cálculos se não estiver logado</h5>';
					include 'assets/php/login.php';
				}else{
					include 'assets/php/logado.php';
				}
				include 'assets/html/conteudoAumento.html';
				include 'assets/html/conteudoEquacaoDeGauss.html';
			?>	
		</div>
	</div>
<?php
	include "assets/html/footer.html";
?>