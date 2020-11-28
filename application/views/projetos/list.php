<h1>profissional</h1>
<div class="row">

<?=anchor(base_url('profissionais/create'),'Cadastrar');?>

<?php
echo '<br>';
!empty($this->session->userdata('mensagem'))?$this->session->userdata('mensagem'):null;
if(!empty($vagas)){
  foreach ($vagas as $v){
  ?>
<div class="col-3" style="text-align: center">
	<div class="card">
    <img src="uploads/profissionais/<?=$v->arquivo?>" width="40" alt="">
  <span>Escolaridade : <?=$v->escolaridade?></span>
  <div class="card-body">
    <h5 class="card-title"><?=$v->nome?></h5>
    <span class="card-text"><?=$v->descricao?></span>
    <a href="<?=base_url('profissionais/detalhes/'.$v->id)?>" class="btn btn-primary">+ detalhes</a>
  </div>
</div>
  </div>
<?php
  }
}else{
  echo "<h1>Tá vazio</h1>";
  
  exit();
}
?>
</div>

