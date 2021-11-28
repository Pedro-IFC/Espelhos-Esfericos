<?php
	$nome=isset($_POST['nome'])?$_POST['nome']:"";
	$senha=isset($_POST['senha'])?$_POST['senha']:"";
?>
<br><br><br><br>
<form method="post">
	<div class="row">
	    <div class="input-field col s6">
	       	<input placeholder="Nome com até 80 caracteres" id="nome" name="nome" type="text" class="validate"
	        	value="<?php echo $nome;?>">	    
	    </div>
	    <div class="input-field col s6">
	    	<input id="senha" type="password" name="senha" class="validate"
	    	value="<?php echo $senha;?>">
	    	<label for="senha">Senha com até 30 carácteres</label>
	    </div>
	    <button class="btn waves-effect waves-light" type="submit" name="entrar">Entrar
   	 		<i class="material-icons right">chevron_right</i>
  		</button>
		Não tem um login? <a href="assets/php/cadastrar.php">Cadastre-se aqui.</a>
	</div>
	<?php
		if (isset($_POST['entrar'])) {
			if ($senha!="" and $nome!="") {
				$count=$user->countNome($nome);
				if($count>=1){
					$login=$user->login($nome, $senha);
					$_SESSION['loginId']=$login[0]->id;
					header("Location: index.php");
				}else{
					echo "Sem registros para: $nome";
				}
			}else{
				echo "Preencha o formulário";
			}
		}
	?>
</form>