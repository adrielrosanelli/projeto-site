<h1><?=$this->session->userdata("nome")?></h1>
<br>
<h3><?=$this->session->userdata("id")?></h3>
<h3><?=$this->session->userdata("descricao")?></h3>
<h3><?=$this->session->userdata("telefone")?></h3>
<br>
<?=anchor(base_url('profissionais/update/'.$this->session->userdata("id")),'Alterar');?>
<?php

foreach ($projeto as $p){
  ?>
<div class="col-3" style="text-align: center">
	<div class="card">
  <span>Oferta : <?=$p->valor?></span>
  <div class="card-body">
    <h5 class="card-title"><?=$p->nome?></h5>
    <span class="card-text"><?=$p->descricao?></span>
    <span class="card-text"><?=$p->telefoneContratante?></span>
    <a href="<?=base_url('projeto/detalhes/'.$p->id)?>" class="btn btn-primary">+ detalhes</a>
  </div>
</div>
  </div>
  </div>

<?php
  }
  ?>