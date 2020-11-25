<h1>Vagas</h1>

<?=anchor(base_url('projeto/create'),'Cadastrar');?>
<div class="row">
<?php
echo '<br>';
!empty($this->session->userdata('mensagem'))?$this->session->userdata('mensagem'):null;
  foreach ($projeto as $p){
  ?>
<div class="col-3" style="text-align: center">
	<div class="card">
  <span>Oferta : <?=$p->valor?></span>
  <div class="card-body">
    <h5 class="card-title"><?=$p->nome?></h5>
    <span class="card-text"><?=$p->descricao?></span>
    <a href="<?=base_url('projeto/detalhes/'.$p->id)?>" class="btn btn-primary">+ detalhes</a>
  </div>
</div>
  </div>
  </div>

<?php
  }
?>

