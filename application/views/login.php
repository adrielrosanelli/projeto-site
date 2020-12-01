<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../style.css">
</head>
<body style="background-color: #34495e">
    
<div class="container" >
    <div class="row" style="justify-content:center">
        <div class="col-6" style="margin-top:25vh">
        <div class="card" style="text-align:center;border: solid 10px;border-color:#f1c40f;border-radius: 40px 40px 40px 40px; background-color: #bdc3c7">
            <div class="card-body">
    <h2 class="card-title">Realize o Login</h2>
<div class="row" style="text-align:center; justify-content: center;">
<?php echo validation_errors();?>
<?=!empty($this->session->userdata('mensagem'))?$this->session->userdata('mensagem'):null;?>
    <form method="post" action="<?=base_url('login/action')?>">
        <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="email">Email</span>
        </div>
        <input type="email" name="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="senha">Senha</span>
            </div>
                <input type="password" name="senha" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="row" style="margin-bottom:2vh">
            <div class="col-12">
                <button type="submit" class="btn btn-primary" >Entrar</button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="#" class="btn btn-primary">Cadastrar-se</a>
            </div>
        </div>
    </form>
</div>
</div>
</div>
        </div>
    </div>
</div>


</body>
</html>