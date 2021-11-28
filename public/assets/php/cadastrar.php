<?php
	session_start();	
	require_once "../../../config.php";
	use app\models\User;
	$user = new User;
	include "../html/header2.html";
	include "../html/menu.html";
	$nome=isset($_POST['nome'])?$_POST['nome']:"";
	$senha=isset($_POST['senha'])?$_POST['senha']:"";
?>
<br><br>

<div class="container">
	<div class="row">
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
	   	 		<button class="btn waves-effect waves-light" type="submit" name="cadastrar">Cadastrar
   	 				<i class="material-icons right">cloud_circle</i>
  				</button>
				Já está cadastrado? <a href="../../index.php">Logue aqui.</a>
			</div>
			<?php
				if (isset($_POST['cadastrar'])) {
					if ($senha!="" and $nome!="") {
						$count=$user->countNome($nome);
						if($count>=1){
							echo "Já existe registro para: $nome, troque seu nome";
						}else{
							$user->cadastrar($nome,$senha);
							$user->sucess();
							header("Location: ../../index.php");
						}
					}else{
						echo "Preencha o formulário";
					}
				}
			?>
		</form>	
	</div>
</div>
<br><br><br><br><br><br><br>
<?php
	
	include "../html/footer.html";
?>