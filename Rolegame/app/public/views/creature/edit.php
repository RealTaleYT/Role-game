<?php
require_once(dirname(__FILE__) . '\..\..\..\..\persistence\DAO\CreatureDAO.php');
require_once(dirname(__FILE__) . '\..\..\..\models\Creature.php');
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $creatureDAO = new CreatureDAO();
    $creature = $creatureDAO->selectById($id);
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Detail</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar bg-black">
            <div class="container-fluid justify-content-start">
                <a class="navbar-brand" href="./../index.php">
                    <img src="./../../../../assets/img/logo.png" alt="Logo" width="100" height="50" class="d-inline-block align-text-top">
                </a>
                <a class="nav-link link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover fs-3" href="./insert.php">Crear una criatura</a>
            </div>
        </nav>
        <form method="POST" action="../../../controllers/creature/CreatureController.php">
            <input type="hidden" name="type" value="edit">
            <input type="hidden" name="idCreature" value="<?php
            echo (isset($_GET["id"]) ? $creature->getIdCreature() : "");
            ?>">
            <div class="container">
                <div class="d-inline">
                    <label class="form-label">Name</label>
                    <input class="form-control" type="text" placeholder="Name" value="<?php
                    echo (isset($_GET["id"]) ? $creature->getName() : "");
                    ?>" name="name" id="name">
                </div>
                <div class="d-inline">
                    <label class="form-label">Description</label>
                    <input class="form-control" type="text" placeholder="Description" name="description" id="description" value="<?php
                    echo (isset($_GET["id"]) ? $creature->getDescription() : "");
                    ?>">
                </div>
                <div class="d-inline">
                    <label class="form-label">Avatar</label>
                    <input class="form-control" type="text" placeholder="Avatar" name="avatar" id="avatar" value="<?php
                    echo (isset($_GET["id"]) ? $creature->getAvatar() : "");
                    ?>">
                </div>
                <div class="d-inline">
                    <label class="form-label">Attack Power</label>
                    <input class="form-control" type="number" placeholder="Attack Power" name="power" id="attackPower"value="<?php
                    echo (isset($_GET["id"]) ? $creature->getAttackPower() : "");
                    ?>">
                </div>
                <div class="d-inline">
                    <label class="form-label">Life Level</label>
                    <input class="form-control" type="number" placeholder="Life Level" name="life" id="lifeLevel"value="<?php
                    echo (isset($_GET["id"]) ? $creature->getLifeLevel() : "");
                    ?>">
                </div>
                <div class="d-inline">
                    <label class="form-label">Weapon</label>
                    <input class="form-control" type="text" placeholder="Weapon" name="weapon" id="weapon"value="<?php
                    echo (isset($_GET["id"]) ? $creature->getWeapon() : "");
                    ?>">
                </div>
                <br>
                <button type="submit" class="btn btn-outline-primary">Editar/Regresar</button>
            </div>
        </form>
        <br>
        <footer class="blockquote-footer">
            CopyRigth©PeterParker2015
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    </body>
</html>