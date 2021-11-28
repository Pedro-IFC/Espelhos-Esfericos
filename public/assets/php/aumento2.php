<?php 
	$O=isset($_POST['O'])?$_POST['O']:"";
	$I=isset($_POST['I'])?$_POST['I']:"";
?>
<div class="row">
	<div class="input-field col s6">
	      <input placeholder="<?php echo $medida?>o" name="O" type="text" class="validate"
	      value="<?php echo $O;?>">
	      <label for="first_name"><?php echo $medida?>o</label>
	</div>
	<div class="input-field col s6">
		<input placeholder="<?php echo $medida?>i" name="I" type="text" class="validate"
		value="<?php echo $I;?>">
	  	<label for="last_name"><?php echo $medida?>i</label>
	</div>
</div>
<button class="btn waves-effect waves-light" type="submit" name="proximo">Cálcular 
	<i class="material-icons right">chevron_right</i>
</button><br><br>
<?php 
	echo "<h6>Cálculo:</h6><br>";
	if($O==0){
		echo "Não é possivel calcular ".$medida."o não pode ser 0<br>";
	}
	if($I==0){
		echo "Não é possivel calcular ".$medida."i não pode ser 0<br>";
	}
	if ($O!=0 and $I!=0){
		$A = $I/$O;
		echo 'A='.$medida.'i/'.$medida.'o <br>';
		echo 'A='.$I.'/'.$O.'<br>';
		echo "A=$A <br><br>";
		if($A<1){
			echo "A imagem é menor que o objeto<br>";
		}elseif($A==1){
			echo "A imagem é do mesmo tamanho que o objeto<br>";
		}else{
			echo "A imagem é maior que o objeto<br>";
		}
		?>
		</form>
		<?php
			if (isset($_POST['proximo'])) {
				if (isset($_SESSION['loginId'])) {
					$id=$_SESSION['loginId'];
					if ($medida=="H") {
						$user->cadastrarAumentoH($O,$I,$id);	
					}else{
						$user->cadastrarAumentoD($O,$I,$id);
					}
				}
		 	}
		}
?>