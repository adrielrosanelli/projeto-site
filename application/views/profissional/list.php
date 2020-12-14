<h1>Profissionais</h1>
<a href="<?=base_url('login/create')?>" class="btn btn-primary" style="margin-bottom: 2%;margin-top:1%">Cadastrar-Se</a>
<div class="row">
<?php
echo '<br>';
!empty($this->session->userdata('mensagem'))?$this->session->userdata('mensagem'):null;
  foreach ($transacionador as $t){
  ?>
<div class="col-12 col-sm-6 col-md-4 col-xl-3" style="margin-bottom:3%">
	<div class="card" style="height:100%; justify-content:center">
    <img src="uploads/profissionais/<?=$t->arquivo?>" width="100%" alt="">
  <span>Escolaridade : <?=$t->escolaridade?></span>
  <div class="card-body">
    <h5 class="card-title"><?=$t->nome?></h5>
    <h5 class="card-title"><?=$t->id?></h5>
    <span class="card-text"><?=$t->descricao?></span>
    <br>
    <a href="<?=base_url('profissionais/detalhes/'.$t->id)?>" class="btn btn-primary">+ detalhes</a>
  </div>
</div>
  </div>
  
  <?php
  }
  ?>
  </div>

