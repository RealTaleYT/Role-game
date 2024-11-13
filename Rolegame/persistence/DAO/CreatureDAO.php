<?php

require_once(dirname(__FILE__) . '..\..\conf\PersistentManager.php');

class CreatureDAO {

    const Creature_TABLE = "creature";

    private $conn = null;

    public function __construct() {
        $this->conn = PersistentManager::getInstance()->get_connection();
    }

    public function selectAll() {
        $query = "SELECT * FROM " . CreatureDAO::Creature_TABLE;
        $result = mysqli_query($this->conn, $query);
        $creatures = array();
        while ($creatureBD = mysqli_fetch_array($result)) {
            $creature = new Creature();
            $creature->setIdCreature($creatureBD["idCreature"]);
            $creature->setName($creatureBD["name"]);
            $creature->setDescription($creatureBD["description"]);
            $creature->setAvatar($creatureBD["avatar"]);
            $creature->setAttackPower($creatureBD["attackPower"]);
            $creature->setLifeLevel($creatureBD["lifeLevel"]);
            $creature->setWeapon($creatureBD["weapon"]);
            array_push($creatures, $creature);
        }
        return $creatures;
    }

    public function insert($creature) {
        $query = "INSERT INTO " . CreatureDAO::Creature_TABLE .
                " (name, description, avatar, attackPower, lifeLevel, weapon) VALUES(?,?,?,?,?,?)";
        $stmt = mysqli_prepare($this->conn, $query);
        $name = $creature->getName();
        $description = $creature->getDescription();
        $avatar = $creature->getAvatar();
        $attackPower = $creature->getAttackPower();
        $lifeLevel = $creature->getLifeLevel();
        $weapon = $creature->getWeapon();
        mysqli_stmt_bind_param($stmt, 'ssssss', $name, $description, $avatar, $attackPower, $lifeLevel, $weapon);
        return $stmt->execute();
    }

    public function selectById($id) {
        $query = "SELECT name, description, avatar, attackPower, lifeLevel, weapon FROM " . CreatureDAO::Creature_TABLE . " WHERE idCreature=?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $name, $desciption, $avatar, $attackPower, $lifeLevel, $weapon);

        $creature = new Creature();
        while (mysqli_stmt_fetch($stmt)) {
            $creature->setIdCreature($id);
            $creature->setName($name);
            $creature->setDescription($desciption);
            $creature->setAvatar($avatar);
            $creature->setAttackPower($attackPower);
            $creature->setLifeLevel($lifeLevel);
            $creature->setWeapon($weapon);
        }

        return $creature;
    }

    public function update($creature) {
        $query = "UPDATE " . CreatureDAO::Creature_TABLE .
                " SET name=?, description=?, avatar=?, attackPower=?, lifeLevel=?, weapon=?"
                . " WHERE idCreature=?";
        $stmt = mysqli_prepare($this->conn, $query);
        $name = $creature->getName();
        $description = $creature->getDescription();
        $avatar = $creature->getAvatar();
        $attackPower = $creature->getAttackPower();
        $lifeLevel = $creature->getLifeLEvel();
        $weapon = $creature->getWeapon();
        $id = $creature->getIdCreature();
        mysqli_stmt_bind_param($stmt, 'ssssssi', $name, $description, $avatar, $attackPower, $lifeLevel, $weapon, $id);
        return $stmt->execute();
    }

    public function delete($idCreature) {
        $query = "DELETE FROM " . CreatureDAO::Creature_TABLE . " WHERE `idCreature` = ?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $idCreature);
        return $stmt->execute();
    }
}
