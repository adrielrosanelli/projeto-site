<?=anchor(base_url('profissionais/delete/'.$transacionador->id),'Deletar');?>
<br>
<?php
if($projeto->codigoDoContratante != $this->session->userdata("id")){

}else{
    ?>
    <a href="<?=base_url('login/create')?>" class="btn btn-primary">Cadastrar-se</a>
    <?php
}
?>
<?=anchor(base_url('profissionais/update/'.$transacionador->id),'Alterar');?>
<h2><?=$transacionador->nome?>
<br>
<small><?=$transacionador->dataNascimento?></small>
</h2>
<br>
<img src="uploads/profissionais/<?=$transacionador->arquivo?>" width="100" alt="">
<p><?=$transacionador->descricao?></p>
