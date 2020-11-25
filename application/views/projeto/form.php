<fieldset>
<legend><?=$titulo?></legend>
<?=validation_errors();?>
<form method="POST" action="<?=$action?>">
    <input type="text" name="nome" value="<?=$nome?>" placeholder="Digite a vaga"><br>
    <input type="descricao" name="descricao" value="<?=$descricao?>" placeholder="Descreva a vaga"><br>
    <input type="date" name="dataInicial" value="<?=$dataInicial?>" placeholder="Inicio do Projeto"><br>
    <input type="number" name="valor" value="<?=$valor?>" placeholder="Proposta Inicial"><br>
    <input type="number" name="status" value="<?=$status?>" placeholder="Disponibilidade da vaga"><br>
    <input type="submit" value="Gravar">
</form>
</fieldset>