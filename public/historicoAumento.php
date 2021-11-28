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
		<br><br>
		<a class="btn waves-effect waves-light" href="aumento.php">Voltar</a>
		<div class="row">
			<?php 
				if (!$user->islogado()) {
					echo '<h5 class="erro">Não será possivel salvar seus cálculos se não estiver logado</h5>';
				}else{
					?>
					<h1>Aumento H</h1>
					<table>
					    <thead>
					        <tr>
					            <th>DataHora</th>
					            <th>Id</th>
					            <th>IdUsuario</th>
					            <th>Ho</th>
					            <th>Hi</th>
					            <th>A</th>
					            <th>Excluir</th>
					        </tr>
					    </thead>
					<tbody>
					<?php
					$historico=$user->lerHistoricoAumentoH($_SESSION['loginId']);
					foreach ($historico as $linha) {
						echo '<tr>';
						echo "<td>".$linha->dataHora."</td>";
                		echo "<td>".$linha->id."</td>";
                		echo "<td>".$linha->idUsuario."</td>";
                		echo "<td>".$linha->ho."</td>";
                		echo "<td>".$linha->hi."</td>";
                		echo "<td>".($linha->hi/$linha->ho)."</td>";
                		echo '<td><a href="assets/php/excluirH.php?Id='.$linha->id.'"><i class="material-icons">delete</i></<a></td>';
                		
                		echo '</tr>';
					}
					?>
   	 					</tbody>
					</table>
					<h1>Aumento D</h1>   
					<table>
					    <thead>
					        <tr>
					        	<th>DataHora</th>
					            <th>Id</th>
					            <th>IdUsuario</th>
					            <th>Do</th>
					            <th>Di</th>
					            <th>A</th>
					            <th>Excluir</th>
					        </tr>
					    </thead>
					<tbody>
					<?php
					$historico=$user->lerHistoricoAumentoD($_SESSION['loginId']);
					foreach ($historico as $linha) {
						echo '<tr>';
						echo "<td>".$linha->dataHora."</td>";
                		echo "<td>".$linha->id."</td>";
                		echo "<td>".$linha->idUsuario."</td>";
                		echo "<td>".$linha->do."</td>";
                		echo "<td>".$linha->di."</td>";
                		echo "<td>".($linha->di/$linha->do)."</td>";
                		echo '<td><a href="assets/php/excluirD.php?Id='.$linha->id.'"><i class="material-icons">delete</i></<a></td>';
                		echo '</tr>';
					}
					?>
   	 					</tbody>
					</table>
					<?php
				}
			?>	
		</div>
	</div>
<?php
	include "assets/html/footer.html";
?>