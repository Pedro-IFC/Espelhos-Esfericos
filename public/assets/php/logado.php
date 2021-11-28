<?php
	$dados= $user->getUser($_SESSION['loginId'])[0];
?>
<div class="col s12 m7">
    <h2 class="header">Usuário: <?php echo $dados->nome;?></h2>
    <div class="card horizontal">
      <div class="card-image">
        <img src="assets/img/favicon.png" height="100px">
      </div>
      <div class="card-stacked">
        <div class="card-content">
          <b>Usuário:</b> <?php echo $dados->nome;?><br> 
          <b>Id:</b> <?php echo $dados->id;?>
        </div>
        <div class="card-action">
          <a href="assets/php/sair.php">Sair</a>
        </div>
      </div>
    </div>
  </div>
