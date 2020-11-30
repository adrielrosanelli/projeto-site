<fieldset>
<legend><?=$titulo?></legend>
<?php echo validation_errors();?>
<form enctype="multipart/form-data" method="POST" action="<?=$action?>">
<input type="text" name="nome" value="<?=$nome?>" placeholder="Digite seu nome"><br>
<input type="email" name="email" value="<?=$email?>" placeholder="Digite seu e-mail"><br>
<textarea name="descricao" id="descricao" cols="30" rows="10"><?=$descricao?></textarea><br>
<input type="date" name="dataNascimento" value="<?=$dataNascimento?>" placeholder="Digite a sua data de Nascimento"><br>
<input type="number" name="escolaridade" value="<?=$escolaridade?>" placeholder="Digite sua escolaridade"><br>
<input type="number" name="precoHora" value="<?=$precoHora?>" placeholder="Digite o preço da sua Hora"><br>
<select name="status" id="status">
    <option value="<?=$status?>">Selecione o seu</option>
    <option value="<?=$status?>">Selecione o seu</option>
    <option value="<?=$status?>">Selecione o seu</option>
    <option value="<?=$status?>">Selecione o seu</option>
    <option value="<?=$status?>">Selecione o seu</option>
</select>
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
</fieldset> 


<!-- <input type="text" name="descricao" value="<?=$descricao?>" placeholder="Descreva-se"><br> -->