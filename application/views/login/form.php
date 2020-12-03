<fieldset>
<legend><?=$titulo?></legend>
<?php echo validation_errors();?>
<form enctype="multipart/form-data" method="POST" action="<?=$action?>">
<input type="text" name="nome" value="<?=$nome?>" placeholder="Digite seu nome"><br>
<input type="email" name="email" value="<?=$email?>" placeholder="Digite seu e-mail"><br>
<input type="password" name="senha" value="<?=$senha?>" placeholder="Digite sua senha"><br>
<input type="date" name="dataNascimento" value="<?=$dataNascimento?>" placeholder="Digite a sua data de Nascimento"><br>
<?php
?>
<input type="submit" value="Gravar">
</form>
</fieldset> 