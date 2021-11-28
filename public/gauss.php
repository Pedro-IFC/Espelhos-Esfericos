<?php
	session_start();	
	include "assets/html/header.html";
	require_once "../config.php";
	use app\models\User;
	$user = new User;

	$Do=isset($_POST['Do'])?$_POST['Do']:"";
	$Di=isset($_POST['Di'])?$_POST['Di']:"";
	$F=isset($_POST['F'])?$_POST['F']:"";
	$Frv=isset($_POST['Frv'])?$_POST['Frv']:1;
	$Dorv=isset($_POST['Dorv'])?$_POST['Dorv']:1;
	$Dirv=isset($_POST['Dirv'])?$_POST['Dirv']:1;
?>
	<?php
		include "assets/html/menu.html"
	?>
	<br><br>
	<div class="container">
		<a class="btn waves-effect waves-light" href="index.php">Voltar</a><br><br>
		<div class="row">
			<form method="POST">
				<p>Deixe vazio o campo que deseja cálcular</p>
				<div class="input-field col s4">
			        <input placeholder="Do" id="Do" type="text" name="Do" class="validate"
			        value="<?php echo $Do; ?>">
			        <label for="Do">Do</label>
			    </div>
			    <div class="col s"></div>
			    <div class="input-field col s4">
			        <input placeholder="Di" id="Di" type="text" name="Di" class="validate"
			        value="<?php echo $Di; ?>">
			        <label for="Di">Di</label>
			    </div>
			    <div class="col s2">
			    	<label>
			            <input name="Dirv" type="radio" value="1"
			            <?php if($Dirv==1) echo "CHECKED";?>>
			            <span>Real</span>
			        </label>
			        <label>
			            <input name="Dirv" type="radio" value="2"
			            <?php if($Dirv==2) echo "CHECKED";?>>
						<span>Virtual</span>
			        </label>
			    </div>
			    <div class="input-field col s4">
			        <input placeholder="F" id="F" type="text" name="F" class="validate"
			        value="<?php echo $F; ?>">
			        <label for="F">F</label>
			    </div>
			    <div class="col s2">
			    	<label>
			            <input name="Frv" type="radio" value="1"
			            <?php if($Frv==1) echo "CHECKED";?>>
			            <span>Real</span>
			        </label>
			        <label>
			            <input name="Frv" type="radio" value="2"
			            <?php if($Frv==2) echo "CHECKED";?>>
						<span>Virtual</span>
			        </label>
			    </div>
		</div>
		<div class="row">	
			    <button class="waves-effect waves-light btn" type="submit" name="calc">Cálcular<i class="material-icons right">send</i></button>
				<br><br>
				<a class="btn waves-effect waves-light" href="historicoGauss.php">Histórico</a><br>
			</form>
			<?php
				if(isset($_POST['calc'])){
					if($Di=="0" or $Do=="0" or $F=="0"){
						echo "Erro o divisor não pode ser 0";
					}else{
						$DoB=$Do;
						$DiB=$Do;
						$FB=$F;
						if ($Di!="" and $Do!="" and $F=="") {
							if ($Dirv==1) {
								$Di=+abs($Di);
							}else{
								$Di=-abs($Di);
							}
							$calcD1=1/$Do;
							$calcD2= 1/$Di;
							echo '1/F = 1/'.$Do.' + 1/'.$Di.'<br>';
							if ($calcD2<0) {
								echo "1/F = $calcD1 $calcD2<br>";
							}else{
								echo "1/F = $calcD1 + $calcD2<br>";
							}
							$calc=$calcD1+$calcD2;
							echo "1/F= $calc <br>";
							echo "F=1/$calc<br>";
							if ($calc==0) {
								echo "Não é possivel dividir um numero por 0.";
							}else{
								$calc2=1/$calc;
								echo "F=$calc2 <br>";
							}
							if (isset($_SESSION['loginId'])) {
								$id=$_SESSION['loginId'];
								$user->cadastrarGauss($DoB,$DiB,$calc2,$id);
							}
						}else if($Do!="" and $F!="" and $Di==""){	
							if ($Frv==1) {
								$F=+abs($F);
							}else{
								$F=-abs($F);
							}
							$calcD1=1/$Do;
							$calcF1=1/$F;
							echo '1/'.$F.' = 1/'.$Do.' + 1/Di<br>';
							echo "$calcF1=$calcD1 + 1/Di <br>";
							$calcD1=$calcD1*-1;
							if ($calcD1>0) {
								echo "$calcF1 + $calcD1=1/Di <br>";
							}else{
								echo "$calcF1 $calcD1=1/Di <br>";
							}
							$calc=$calcF1 + $calcD1;
							echo "1/Di=$calc<br>";
							echo "Di=1/$calc<br>";
							if ($calc==0) {
								echo "Não é possivel dividir um numero por 0.";
							}else{
								$calc2=1/$calc;
								echo "Di=$calc2 <br>";
							}
							if (isset($_SESSION['loginId'])) {
								$id=$_SESSION['loginId'];
								$user->cadastrarGauss($DoB,$calc2,$FB,$id);
							}
						}else if($Di!="" and $F!="" and $Do==""){
							if ($Frv==1) {
								$Frv=+abs($Frv);
							}else{
								$Frv=-abs($Frv);
							}	
							if ($Dirv==1) {
								$Di=+abs($Di);
							}else{
								$Di=-abs($Di);
							}
							$calcD2=1/$Di;
							$calcF1=1/$F;
							echo '1/'.$F.' = 1/Do + 1/'.$Di.'<br>';
							if ($calcD2>0) {
								echo "$calcF1=1/Do + $calcD2 <br>";
							}else{
								echo "$calcF1=1/Do $calcD2 <br>";
							}
							$calcD2=$calcD2*-1;
							if ($calcD2>0) {
								echo "$calcF1 + $calcD2=1/Do <br>";
							}else{
								echo "$calcF1 $calcD2=1/Do <br>";
							}
							$calc=$calcF1 + $calcD2;
							echo "1/Do=$calc<br>";
							echo "Do=1/$calc<br>";
							if ($calc==0) {
								echo "Não é possivel dividir um numero por 0.";
							}else{
								$calc2=1/$calc;
								echo "Do=$calc2 <br>";
							}
							if (isset($_SESSION['loginId'])) {
								$id=$_SESSION['loginId'];
								$user->cadastrarGauss($calc2,$DiB,$FB,$id);
							}
						}else{
							echo "Não há nada para cálcular";
						}
					}
				}
			?>
		</div>
		<div class="row">
			<form method="POST">
				<button class="btn waves-effect waves-light" type="submit" name="conteudo">Conteúdo</button>
			</form>
		</div>
	<?php
		if (isset($_POST['conteudo']) and !isset($_POST['fechar'])) {
			include "assets/html/conteudoEquacaoDeGauss2.html";
		}

		echo "</div>";
		include "assets/html/footer.html";
	?>