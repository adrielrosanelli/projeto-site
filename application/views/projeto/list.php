<h1>Vagas</h1>

<?=anchor(base_url('projeto/create'),'Cadastrar');?>
<div class="row">
<?php
echo '<br>';
!empty($this->session->userdata('mensagem'))?$this->session->userdata('mensagem'):null;
  foreach ($projeto as $p){
  ?>
<div class="col-12 col-sm-6 col-md-4 col-xl-3" style="margin-bottom:3%">
	<div class="card"style="height:100%; justify-content:center">
  <span>Oferta : <?=$p->valor?></span>
  <div class="card-body">
    <h5 class="card-title"><?=$p->nome?></h5>
    <span class="card-text"><?=$p->descricao?></span>
    <br>
    <a href="<?=base_url('projeto/detalhes/'.$p->id)?>" class="btn btn-primary">+ detalhes</a>
  </div>
</div>
  </div>
  
  <?php
  }
  ?>
  </div>

