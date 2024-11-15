<?php

require_once(dirname(__FILE__) . '/../../../persistence/DAO/CreatureDAO.php');
require_once(dirname(__FILE__) . '/../../../app/models/Creature.php');
require_once(dirname(__FILE__) . '../../../models/validations/ValidationRules.php');

$_creatureController = new CreatureController();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["type"] == "create") {
        $_creatureController->createAction();
    } else if ($_POST["type"] == "edit") {
        $_creatureController->editAction();
    } else if ($_POST["type"] == "delete") {
        $_creatureController->deleteAction();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $_creatureController->deleteAction();
}

class CreatureController {

    public function __construct() {
        
    }

    function readAction() {
        $creatureDAO = new CreatureDAO();
        return $creatureDAO->selectAll();
    }

    function createAction() {
        $name = ValidationsRules::test_input($_POST["name"]);
        $description = ValidationsRules::test_input($_POST["description"]);
        $avatar = ValidationsRules::test_input($_POST["avatar"]);
        $power = ValidationsRules::test_input($_POST["power"]);
        $life = ValidationsRules::test_input($_POST["life"]);
        $weapon = ValidationsRules::test_input($_POST["weapon"]);
        $creature = new Creature();
        $creature->setName($name);
        $creature->setDescription($description);
        $creature->setAvatar($avatar);
        $creature->setAttackPower($power);
        $creature->setLifeLevel($life);
        $creature->setWeapon($weapon);
        $creatureDAO = new CreatureDAO();
        $creatureDAO->insert($creature);

        header('Location: ../../public/views/index.php');
    }

    function editAction() {
        $idCreature = $_POST["idCreature"];
        $name = $_POST["name"];
        $description = $_POST["description"];
        $avatar = $_POST["avatar"];
        $power = $_POST["power"];
        $life = $_POST["life"];
        $weapon = $_POST["weapon"];
        $creature = new Creature();
        $creature->setIdCreature($idCreature);
        $creature->setName($name);
        $creature->setDescription($description);
        $creature->setAvatar($avatar);
        $creature->setAttackPower($power);
        $creature->setLifeLevel($life);
        $creature->setWeapon($weapon);
        $creatureDAO = new CreatureDAO();
        $creatureDAO->update($creature);

        header('Location: ../../public/views/index.php');
    }

    function deleteAction() {
        $id = $_POST["idCreature"];

        $creatureDAO = new CreatureDAO();
        $creatureDAO->delete($id);

        header('Location: ../../public/views/index.php');
    }
}
