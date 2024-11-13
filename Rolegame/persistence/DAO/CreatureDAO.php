<?php

require_once(dirname(__FILE__) . '..\..\conf\PersistentManager.php');

class CreatureDAO {

    const Creature_TABLE = "creture";

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
            $creature->setAttackPower($creatureBD["AttackPower"]);
            $creature->setLifeLevel($creatureBD["LifeLevel"]);
            $creature->setWeapon($creatureBD["Weapon"]);
            array_push($creatures, $creature);
        }
        return $creatures;
    }
    public function insert($creature) {
        $query = "INSERT INTO " . CreatureDAO::Creature_TABLE .
                " (name, description, avatar, attackPower, lifeLevel, weapoen) VALUES(?,?,?,?,?,?)";
        $stmt = mysqli_prepare($this->conn, $query);
        $name = $creature->getName();
        $description= $creature->getDescription();
        $avatar = $creature->getAvatar();
        $attackPower = $creature->getAttackPower();
        $lifeLevel = $creature->getLifeLevel();
        $weapon = $creature->getWeapon();
        mysqli_stmt_bind_param($stmt, 'ssssss', $name, $description, $avatar, $attackPower, $lifeLevel, $weapon);
        return $stmt->execute();
    }
    public function selectById($id) {
        $query = "SELECT name, description, avatar, attackPower, lifeLevel, weapon FROM " . CreatureDAO::Creature_TABLE . " WHERE idUser=?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $name, $desciption, $avatar, $attackPower, $lifeLevel, $weapon);

        $creature = new Creature();
        while (mysqli_stmt_fetch($stmt)) {
            $creature->setIdUser($id);
            $creature->setName($name);
            $creature->setDescription($desciption);
            $creature->setAvatar($avatar);
            $creature->setAttackPower($attackPower);
            $creature->setLifeLevel($lifeLevel);
            $creature->setWeapon($weapon);
       }

        return $creature;
    }
    
    public function delete($id) {
        $query = "DELETE FROM " . CreatureDAO::Creature_TABLE . " WHERE idUser =?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        return $stmt->execute();
    }
}
