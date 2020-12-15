<!-- <fieldset>
<legend><?=$titulo?></legend>
<?php echo validation_errors();?>
<form enctype="multipart/form-data" method="POST" action="<?=$action?>">
<input type="text" name="nome" value="<?=$nome?>" placeholder="Digite seu nome"><br>
<input type="number" name="telefone" value="<?=$telefone?>" placeholder="Digite seu telefone"><br>
<input type="text" name="descricao" value="<?=$descricao?>" placeholder="Descreva-se"><br>
<input type="date" name="dataNascimento" value="<?=$dataNascimento?>" placeholder="Digite a sua data de Nascimento"><br>
<input type="number" name="escolaridade" value="<?=$escolaridade?>" placeholder="Digite sua escolaridade"><br>
<input type="number" name="precoHora" value="<?=$precoHora?>" placeholder="Digite o preço da sua Hora"><br>
<input type="text" name="status" value="<?=$status?>" placeholder="Digite sua disponibilidade"><br>
<input name="arquivo" type="file"><br>
<?php
if(!empty($arquivo)){
    echo"<img src='".base_url("uploads/{$arquivo}")."' width='150'>";
    echo"<input type='hidden' value='{$arquivo}' name='arquivo_aux'>";
}
?>
<input type="submit" value="Gravar">
</form>
</fieldset>  -->