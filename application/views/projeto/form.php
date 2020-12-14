<!-- <fieldset>
<legend><?=$titulo?></legend> - 
<?=validation_errors();?>
<form method="POST" action="<?=$action?>"> - 
    <input type="text" name="nome" value="<?=$nome?>" placeholder="Digite a vaga"><br> - 
    <input type="descricao" name="descricao" value="<?=$descricao?>" placeholder="Descreva a vaga"><br> - 
    <input type="date" name="dataInicial" value="<?=$dataInicial?>" placeholder="Inicio do Projeto"><br> -
    <input type="number" name="valor" value="<?=$valor?>" placeholder="Proposta Inicial"><br> - 
    <input type="text" name="status" value="<?=$status?>" placeholder="Disponibilidade da vaga"><br>
    <input type="submit" value="Gravar">
</form>
</fieldset> -->
<legend><?=$titulo?></legend>

<form method="POST" action="<?=$action?>">
<div class="form-row" >
    <div class="form-group col-md-3">
      <label for="nome">Vaga</label>
      <input type="text" value="<?=$nome?>" placeHolder="Digite o Nome da Vaga" class="form-control" id="nome">
      <small id="nome" class="form-text text-muted">Digite exatamente o nome da vaga</small>
    </div>
    <div class="form-group col-md-3" >
        <label for="valor">Proposta</label>
        <div class="input-group-prepend">
    <span class="input-group-text" id="valor">R$</span>
    <input type="number" class="form-control" id="valor" value="<?=$valor?>" placeHolder="Digite a sua Proposta" aria-describedby="valor">
</div>
<small id="valor" class="form-text text-muted">Lembre-se que a Proposta é calculada por Hora</small>
    </div>
</div>
<!--  -->
<div class="form-row" >
    <div class="form-group col-md-6">
        <label for="descricao">Descrição da Vaga</label>
        <textarea class="form-control" id="descricao" placeHolder="Descreva as características vaga" rows="3"><?=$descricao?></textarea>
        <small id="descricao" class="form-text text-muted">Disserte sobre a Vaga</small>
    </div>
</div>
<!--  -->
<div class="form-row" >
    <div class="form-group col-md-3">
      <label for="dataInicial">Data</label>
      <input type="date" value="<?=$dataInicial?>" class="form-control" id="dataInicial">
      <small id="dataInicial" class="form-text text-muted">Data referente a abertura da vaga</small>
    </div>
    <div class="form-group col-md-3" >
    <label for="status">Status da vaga</label>
    <select class="form-control" id="status">
      <option value="<?=$status ='Disponivel' ?>">Disponivel</option>
      <option value="<?=$status = 'Negociando'?>">Negociando</option>
      <option value="<?=$status = 'fechado'?>">Fechado</option>
    </select>
    <small id="status" class="form-text text-muted">Status atual da vaga</small>
    </div>
</div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>