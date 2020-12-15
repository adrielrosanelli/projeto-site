<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    
<div class="container" >
    <div class="row" style="justify-content:center">
        <div class="col-6" style="margin-top:25vh">
        <div class="card" style="text-align:center;border: solid 10px;border-radius: 40px 40px 40px 40px;">
            <div class="card-body">
    <h2 class="card-title">Realize o Login</h2>
<div class="row" style="text-align:center; justify-content: center;">
<?php echo validation_errors();?>
<?=!empty($this->session->userdata('mensagem'))?$this->session->userdata('mensagem'):null;?>
<form method="post" action="<?=base_url('login/action')?>">
    E-mail: <input class="form-control" type="email" name="email">
    senha: <input class="form-control" type="password" name="senha">
    <button type="submit" class="btn btn-success" style="margin-top:5%">Entrar</button>
    <!-- <input type="submit" value="Entrar"> -->
    <a href="<?=base_url('login/create')?>" class="btn btn-primary" style="margin-top:5%">Cadastrar-se</a>
</form>
  </div>
</div>

        </div>
    </div>
</div>
 




</body>
</html>