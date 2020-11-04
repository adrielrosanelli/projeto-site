<h1>Contatos</h1>
<span>Conheça nossos Contatos</span>
<div class="row">
	<?php
	foreach ($contatos as $c){
	?>
	<div class="col-4">
	<div class="card">
		<img src="<?=$this->config->item("base_url_cdn")?>uploads/contatos/<?=$c->arquivo?>" class="card-img-top" alt="...">
		<div class="card-body">
			<h5 class="card-title"><?=$c->nome?></h5>
			<a href="<?=base_url('contatos/detalhes/'.$c->id)?>" class="btn btn-primary">+ detalhes</a>
		</div>
	</div>
</div>
<?php
}
?>
</div>
