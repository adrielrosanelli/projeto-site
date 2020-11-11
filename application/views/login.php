<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realize O Login</title>
</head>
<body>
    <h2>Realize O Login</h2>
<?php echo validation_errors();?>
<?=!empty($this->session->userdata('mensagem'))?$this->session->userdata('mensagem'):null;?>
<form method="post" action="<?=base_url('login/action')?>">
    E-mail: <input type="email" name="email"><br>
    senha: <input type="password" name="senha"><br>
    <input type="submit" value="Entrar">
</form>
</body>
</html>