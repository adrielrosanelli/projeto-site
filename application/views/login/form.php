<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<legend style="margin-left:2%;margin-top:2%"><?=$titulo?></legend>
<?=validation_errors();?>
<form enctype="multipart/form-data" method="POST" action="<?=$action?>">
<div class="form-row" style="margin-left:2%">
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
<div class="form-row"style="margin-left:2%" >
<div class="form-group col-md-3">
      <label for="senha">Senha</label>
      <input type="password" name="senha" value="<?=$senha?>" class="form-control" id="senha" placeHolder="Digite sua Senha">
      <small id="senha" class="form-text text-muted">Digite sua Senha</small>
    </div>
    <div class="form-group col-md-3">
      <label for="dataNascimento">Data</label>
      <input type="date" name="dataNascimento" value="<?=$dataNascimento?>" class="form-control" id="dataNascimento">
      <small id="dataNascimento" class="form-text text-muted">Sua data de nascimento</small>
    </div>
</div>
  <button type="submit" class="btn btn-primary" style="margin-left:2%">Enviar</button>
</form>