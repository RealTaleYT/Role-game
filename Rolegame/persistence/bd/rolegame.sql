
-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema rolegame
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `rolegame` ;

-- -----------------------------------------------------
-- Schema rolegame
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `rolegame` DEFAULT CHARACTER SET utf8 ;
USE `rolegame` ;

CREATE TABLE IF NOT EXISTS `creature` (
  `idCreature` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `desctiption` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `attackPower` int(11) DEFAULT NULL,
  `lifeLevel` int(11) DEFAULT NULL,
  `weapon` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCreature`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
