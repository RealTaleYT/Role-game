<?php
require_once(dirname(__FILE__) . '/../../controllers/creature/CreatureController.php'); 
$creatureController = new CreatureController();
$creatures = $creatureController->readAction();
require_once(dirname(__FILE__) . '/../../../utils/SessionUtils.php');
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Role Game</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar bg-black">
            <div class="container-fluid justify-content-start">
                <a class="navbar-brand" href="./../index.php">
                    <img src="./assets/img/logo.png" alt="Logo" width="60" height="60" class="d-inline-block align-text-top">
                </a>
                <a class="nav-link link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover fs-3" href="./insert.php">Crear una criatura</a>
            </div>
        </nav>
        <br>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <img src="./assets/img/Banner.png"  width="700" height="400" alt="Imagen demostrativa">
                </div>
                <div class="col align-self-center">
                    <h1>Comunidad de usuarios de heroes</h1>
                    <h2>La aventura comienza en tu navegador</h2>
                    <button class="btn btn-primary">Comenzar</button>
                </div>
            </div>
        </div>
        <br>
        <hr>
        <div class="container-fluid">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?php ?>" class="img-fluid rounded-start" alt="Avatar criatura">
                    </div>
                    <div class="col-md-8">

                    </div>
                </div>
                <br>
                <hr>
                <div class="card-body">
                    <h5 class="card-title"><?php ?></h5>
                    <p class="card-text"><?php ?></p>
                    <div class="d-inline p-3">
                        <a href="./creature/detail" class="btn btn-primary">+Info</a>
                        <a href="./creature/modify" class="btn btn-primary">Modificar</a>
                        <a href="#" class="btn btn-primary">Eliminar</a>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <footer class="blockquote-footer">
            CopyRigth©PeterParker2015
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    </body>
</html>