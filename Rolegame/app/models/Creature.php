<?php

class Creature {

    private $idCreature;
    private $name;
    private $description;
    private $avatar;
    private $attackPower;
    private $lifeLevel;
    private $weapon;

    public function __construct() {
        
    }

    public function getIdCreature() {
        return $this->idCreature;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getAvatar() {
        return $this->avatar;
    }

    public function getAttackPower() {
        return $this->attackPower;
    }

    public function getLifeLevel() {
        return $this->lifeLevel;
    }

    public function getWeapon() {
        return $this->weapon;
    }

    public function setIdCreature($idCreature): void {
        $this->idCreature = $idCreature;
    }

    public function setName($name): void {
        $this->name = $name;
    }

    public function setDescription($description): void {
        $this->description = $description;
    }

    public function setAvatar($avatar): void {
        $this->avatar = $avatar;
    }

    public function setAttackPower($attackPower): void {
        $this->attackPower = $attackPower;
    }

    public function setLifeLevel($lifeLevel): void {
        $this->lifeLevel = $lifeLevel;
    }

    public function setWeapon($weapon): void {
        $this->weapon = $weapon;
    }

    function publicCreature2HTML() {
        $result = "<div class=\"card mb-3\" style=\"max-width: 540px;\">";
        $result .= "<div class=\"row g-0\">";
        $result .= "<div class=\"col-md-4\">";
        $result .= "<img src=\"" . $this->getAvatar() . "\" class=\"img-fluid rounded-start\" alt=\"Imagen criatura\">";
        $result .= "</div>";
        $result .= "<div class=\"col-md-8\">";
        $result .= "<div class=\"card-body\">";
        $result .= "<h5 class=\"card-title\">" . $this->getName() . "</h5>";
        $result .= "<p class=\"card-text\">" . $this->getDescription() . "</p>";
        $result .= "</div>";
        $result .= "</div>";
        $result .= "<div class=\"d-inline p-3\">";
        $result .= "<a href=\"./creature/detail.php?id=" . $this->getIdCreature() . "\" class=\"btn\">+Info</a>";
        $result .= "<a href=\"./creature/edit.php?id=" . $this->getIdCreature() . "\" class=\"btn btn-success\">Modificar</a>";
        $result .= "<a href=\"./creature/delete.php?id=" . $this->getIdCreature() . "\" class=\"btn btn-danger\">Eliminar</a>";
        $result .= "</div>";
        $result .= "</div>";
        $result .= "</div>";
        return $result;
    }
}

?>
