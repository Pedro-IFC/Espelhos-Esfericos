	<button class="btn waves-effect waves-light" type="submit" name="salvar">Salvar o aumento
	   	<i class="material-icons right">cloud_circle</i>
	</button>
</form>
<?php
	if (isset($_POST['salvar'])) {
		if (isset($_SESSION['loginId'])) {
			$id=$_SESSION['loginId'];
			$user->cadastrarAumentoH($O,$I,$id);
		}
 	}
?>