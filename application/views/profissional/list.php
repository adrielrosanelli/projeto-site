<h1>profissional</h1>

<?=anchor(base_url('profissionais/create'),'Cadastrar');?>
<?php
echo '<br>';
!empty($this->session->userdata('mensagem'))?$this->session->userdata('mensagem'):null;

if(!empty($transacionador)){
  foreach ($transacionador as $t){
  ?>
<div class="col-3" style="text-align: center">
	<div class="card">
    <img src="uploads/{$t->arquivo}" width="40" alt="">
  <span><?=$t->escolaridade?></span>
  <div class="card-body">
    <h5 class="card-title"><?=$t->nome?></h5>
    <span class="card-text"><?=$t->descricao?></span>
    <a href="<?=base_url('profissionais/detalhes/'.$t->id)?>" class="btn btn-primary">+ detalhes</a>
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

