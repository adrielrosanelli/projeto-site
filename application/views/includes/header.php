<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">

</head>

<body>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="<?=base_url('home')?>">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse teste" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" id="teste" href="<?=base_url('home')?>">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url("profissionais")?>">Profissionais</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url("projeto")?>">Vagas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url("transacionador")?>"><?=$this->session->userdata("nome")?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url("login/logout")?>">Login/Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container-fluid">