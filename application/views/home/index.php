
    <link rel="stylesheet" href="css/primeiraTela.css">
<div class="row">
<?php
!empty($this->session->userdata('mensagem'))?$this->session->userdata('mensagem'):null;
if(!empty($transacionador)){
    

    foreach($transacionador as $t) {
?>
        
            <div class="col-12 col-sm-6 col-md-4 col-xl-3" style="margin-bottom:3%">
                <div class="card" style="height:100%">
                    <img src="uploads/profissionais/<?= $t->arquivo ?>" width="100%"alt="">
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
    
}
?>
</div>