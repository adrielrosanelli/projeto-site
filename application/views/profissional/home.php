<h1>profissional</h1>
<span>Conheça Profissionais Disponiveis</span>
<div class="row">
	<?php
	foreach ($profissional as $p){
	?>
	<div class="col-4">
	<div class="card">
		
		<div class="card-body">
			<h5 class="card-title"><?=$p->nome?></h5>
		</div>
	</div>
</div>
<?php
}
?>
</div>