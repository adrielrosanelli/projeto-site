<h1><?=$this->session->userdata("nome")?></h1>
<br>
<h3><?=$this->session->userdata("id")?></h3>
<br>
<?=anchor(base_url('profissionais/update/'.$this->session->userdata("id")),'Alterar');?>
<div class="row">
<?php
echo '<br>';
!empty($this->session->userdata('mensagem'))?$this->session->userdata('mensagem'):null;
  ?>
<div class="col-3" style="text-align: center">
	<div class="card">
    <img src="uploads/profissionais/<?=$this->session->userdata("arquivo")?>" width="40" alt="">
  <span>Escolaridade : <?=$this->session->userdata("escolaridade")?></span>
  <div class="card-body">
    <h5 class="card-title"><?=$this->session->userdata("nome")?></h5>
    <span class="card-text"><?=$this->session->userdata("descricao")?></span>
  </div>
</div>
  </div>
  </div>

  <div class="row">
<?php
echo '<br>';
!empty($this->session->userdata('mensagem'))?$this->session->userdata('mensagem'):null;
  ?>
<div class="col-3" style="text-align: center">
	<div class="card">
    <img src="uploads/profissionais/<?=$this->session->userdata("arquivo")?>" width="40" alt="">
  <span>Escolaridade : <?=$this->session->userdata("escolaridade")?></span>
  <div class="card-body">
    <h5 class="card-title"><?=$this->session->userdata("nome")?></h5>
    <span class="card-text"><?=$this->session->userdata("descricao")?></span>
  </div>
</div>
  </div>
  </div>


