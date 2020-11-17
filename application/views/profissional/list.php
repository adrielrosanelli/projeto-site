<h1>profissional</h1>
<?php
anchor(base_url('profissionais/create'),'Cadastrar');
echo '<br>';
!empty($this->session->userdata('mensagem'))?$this->session->userdata('mensagem'):null;

if(!empty($transacionador)){
  foreach ($transacionador as $t){
  ?>
<div class="col-3" style="text-align: center">
	<div class="card">
  <span><?=$t->escolaridade?></span>
  <div class="card-body">
    <h5 class="card-title"><?=$t->nome?></h5>
    <p class="card-text"><?=$t->descricao?></p>
    <a href="<?=base_url('profissionais/detalhes/'.$t->id)?>" class="btn btn-primary">+ detalhes</a>
  </div>
</div>
	</div>

<?php
  }
}else{
  redirect(base_url('profissionais/form'));
  exit();
}
?>
<span>Conheça Profissionais Disponiveis</span>


<div class="row">
	<?php
	foreach ($transacionador as $t){
	?>
	<div class="col-3" style="text-align: center">
	<div class="card">
  <span><?=$t->escolaridade?></span>
  <div class="card-body">
    <h5 class="card-title"><?=$t->nome?></h5>
    <p class="card-text"><?=$t->descricao?></p>
    <a href="<?=base_url('profissionais/detalhes/'.$t->id)?>" class="btn btn-primary">+ detalhes</a>
  </div>
</div>
	</div>
	

<?php
}
?>
