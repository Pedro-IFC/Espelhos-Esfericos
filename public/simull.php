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
			<br>
			<div class="col s10">
				<iframe src="https://phet.colorado.edu/sims/geometric-optics/geometric-optics_pt_BR.html" width="750" height="600" scrolling="no" allowfullscreen></iframe>
			</div>
		</div>
		<div class="row">
			<a href="https://phet.colorado.edu/pt_BR/simulation/legacy/geometric-optics">Pode-se acessar a simulação acima por esse site.</a>
		</div>
			<div class="row">
				Apesar de tudo o mais completo é este do <a href="https://www.geogebra.org/m/FD6UYfRx"> Geogebra</a>
			</div>
		</div>
	</div>
<?php
	include "assets/html/footer.html";
?>