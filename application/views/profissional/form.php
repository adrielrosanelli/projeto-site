<legend><?=$titulo?></legend>
<?=validation_errors();?>
<form enctype="multipart/form-data" method="POST" action="<?=$action?>">
<div class="form-row" >
    <div class="form-group col-md-3">
      <label for="nome">Nome</label>
      <input type="text" name="nome" value="<?=$nome?>" placeHolder="Digite o seu Nome" class="form-control" id="nome">
      <small id="nome" class="form-text text-muted">Digite seu Nome</small>
    </div>
    <div class="form-group col-md-3" >
    <label for="email">Email</label>
    <input type="email" name="email" class="form-control" id="email" value="<?=$email?>" placeHolder="Digite seu email" aria-describedby="email">
    <small id="email" class="form-text text-muted">Não compartilharemos seu email com ninguém</small>
    </div>
</div>
<!--  -->
<div class="form-row" >
    <div class="form-group col-md-3">
        <label for="descricao">Descrição do profissional</label>
        <textarea class="form-control" name="descricao" id="descricao" placeHolder="Descreva as características vaga" rows="3"><?=$descricao?></textarea>
        <small id="descricao" class="form-text text-muted">Disserte sobre a Vaga</small>
    </div>
    <div class="form-group col-md-3">
        <label for="arquivo">Selecione a sua foto</label>
        <input type="file" name="arquivo" value="<?=$arquivo?>" class="form-control" id="arquivo">
        <small id="arquivo" class="form-text text-muted">Selecione o Arquivo</small>
    </div>
</div>
<!--  -->
<div class="form-row" >
    <div class="form-group col-md-3">
      <label for="dataNascimento">Data</label>
      <input type="date" name="dataNascimento" value="<?=$dataNascimento?>" class="form-control" id="dataNascimento">
      <small id="dataNascimento" class="form-text text-muted">Sua data de nascimento</small>
    </div>
    <div class="form-group col-md-3" >
    <label for="escolaridade">Disponibilidade</label>
    <select class="form-control" name="escolaridade" id="escolaridade">
      <option value="<?=$escolaridade ='Disponivel' ?>">Disponivel</option>
      <option value="<?=$escolaridade = 'Ocupado'?>">Ocupado</option>
    </select>
    <small id="escolaridade" class="form-text text-muted">Disponibilidade do profissional</small>
    </div>
</div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>