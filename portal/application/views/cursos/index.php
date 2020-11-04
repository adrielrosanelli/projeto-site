<h1>Cursos</h1>
<span>Conheça nossos Cursos</span>
<div class="row">
<?php
foreach ($cursos as $c){
?>
<div class="col-4">
	<div class="card">
	<img src="<?=$this->config->item("base_url_cdn")?>/uploads/cursos/<?=$c->imagem?>" class="card-img-top" alt="...">
	<div class="card-body">
		<h5 class="card-title"><?=$c->nome?></h5>
		<p class="card-text"><?=$c->descricao?></p>
		<a href="<?=base_url('cursos/detalhes/'.$c->id)?>" class="btn btn-primary">+ detalhes</a>
	</div>
</div>
</div>
<?php
}
?>
</div>
