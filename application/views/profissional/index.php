<h1>profissional</h1>
<span>Conheça Profissionais Disponiveis</span>


<div class="row">
	<?php
	foreach ($profissional as $p){
	?>
	<div class="col-3" style="text-align: center">
	<div class="card">
  <span><?=$p->escolaridade?></span>
  <div class="card-body">
    <h5 class="card-title"><?=$p->nome?></h5>
    <p class="card-text"><?=$p->descricao?></p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
	</div>
	

<?php
}
?>
