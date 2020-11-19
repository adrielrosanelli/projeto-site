
<div class="row">
<?php
    foreach($transacionador as $t) {
?>
        
            <div class="col-3" style="text-align: center">
                <div class="card">
                    <img src="uploads/profissionais/<?= $t->arquivo ?>" width="40" alt="">
                    <span>Escolaridade : <?= $t->escolaridade ?></span>
                    <div class="card-body">
                        <h5 class="card-title"><?= $t->nome ?></h5>
                        <span class="card-text"><?= $t->descricao ?></span>
                        <a href="<?= base_url('profissionais/detalhes/' . $t->id) ?>" class="btn btn-primary">+ detalhes</a>
                    </div>
                </div>
            </div>
        

<?php
    }
?>
</div>