-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema wip__outilgof
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema wip__outilgof
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `wip__outilgof` DEFAULT CHARACTER SET latin1 ;
USE `wip__outilgof` ;

-- -----------------------------------------------------
-- Table `wip__outilgof`.`stf`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wip__outilgof`.`stf` (
  `id_stf` INT(11) NOT NULL AUTO_INCREMENT,
  `nom_stf` VARCHAR(255) NULL DEFAULT NULL,
  `diminutif_stf` VARCHAR(255) NOT NULL,
  `adresse_stf` TEXT NOT NULL,
  PRIMARY KEY (`id_stf`),
  INDEX `diminutif_stf` (`diminutif_stf` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `wip__outilgof`.`gof`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wip__outilgof`.`gof` (
  `id_gof` INT(11) NOT NULL AUTO_INCREMENT,
  `id_stf` INT(11) NOT NULL,
  `nom_gof` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_gof`),
  INDEX `id_stf` (`id_stf` ASC),
  CONSTRAINT `gof_ibfk_1`
    FOREIGN KEY (`id_stf`)
    REFERENCES `wip__outilgof`.`stf` (`id_stf`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `wip__outilgof`.`alerte`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wip__outilgof`.`alerte` (
  `id_alerte` INT(11) NOT NULL AUTO_INCREMENT,
  `id_stf` INT(11) NULL DEFAULT NULL,
  `id_gof` INT(11) NULL DEFAULT NULL,
  `texte_alerte` LONGTEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id_alerte`),
  INDEX `id_stf` (`id_stf` ASC),
  INDEX `id_gof` (`id_gof` ASC),
  CONSTRAINT `alerte_ibfk_1`
    FOREIGN KEY (`id_gof`)
    REFERENCES `wip__outilgof`.`gof` (`id_gof`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `alerte_ibfk_2`
    FOREIGN KEY (`id_stf`)
    REFERENCES `wip__outilgof`.`stf` (`id_stf`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `wip__outilgof`.`flotte`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wip__outilgof`.`flotte` (
  `id_flotte` INT(11) NOT NULL AUTO_INCREMENT,
  `id_stf` INT(11) NOT NULL,
  `nom_flotte` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id_flotte`),
  INDEX `id_stf` (`id_stf` ASC),
  CONSTRAINT `flotte_ibfk_1`
    FOREIGN KEY (`id_stf`)
    REFERENCES `wip__outilgof`.`stf` (`id_stf`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `wip__outilgof`.`gof_to_flotte`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wip__outilgof`.`gof_to_flotte` (
  `id_gof_to_flotte` INT(11) NOT NULL AUTO_INCREMENT,
  `id_gof` INT(11) NOT NULL,
  `id_flotte` INT(11) NOT NULL,
  PRIMARY KEY (`id_gof_to_flotte`),
  UNIQUE INDEX `id_gof` (`id_gof` ASC, `id_flotte` ASC),
  INDEX `id_flotte` (`id_flotte` ASC),
  CONSTRAINT `gof_to_flotte_ibfk_1`
    FOREIGN KEY (`id_gof`)
    REFERENCES `wip__outilgof`.`gof` (`id_gof`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `gof_to_flotte_ibfk_2`
    FOREIGN KEY (`id_flotte`)
    REFERENCES `wip__outilgof`.`flotte` (`id_flotte`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `wip__outilgof`.`statut_operationnel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wip__outilgof`.`statut_operationnel` (
  `id_statut_operationnel` INT(11) NOT NULL AUTO_INCREMENT,
  `statut_operationnel` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_statut_operationnel`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `wip__outilgof`.`materiel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wip__outilgof`.`materiel` (
  `id_materiel` INT(11) NOT NULL AUTO_INCREMENT,
  `serie_loc` VARCHAR(255) NOT NULL,
  `numero_loc` INT(255) NOT NULL,
  `numero_europe_loc` BIGINT(20) NULL DEFAULT NULL,
  `id_stf` INT(11) NULL DEFAULT NULL,
  `id_flotte` INT(11) NULL DEFAULT NULL,
  `id_statut_operationnel` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_materiel`),
  UNIQUE INDEX `numero_loc` (`numero_loc` ASC),
  INDEX `serie_loc` (`serie_loc` ASC),
  INDEX `id_stf` (`id_stf` ASC),
  INDEX `id_flotte` (`id_flotte` ASC),
  INDEX `id_statut_operationnel` (`id_statut_operationnel` ASC),
  CONSTRAINT `materiel_ibfk_1`
    FOREIGN KEY (`id_stf`)
    REFERENCES `wip__outilgof`.`stf` (`id_stf`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `materiel_ibfk_2`
    FOREIGN KEY (`id_flotte`)
    REFERENCES `wip__outilgof`.`flotte` (`id_flotte`)
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT `materiel_ibfk_3`
    FOREIGN KEY (`id_statut_operationnel`)
    REFERENCES `wip__outilgof`.`statut_operationnel` (`id_statut_operationnel`)
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `wip__outilgof`.`immobilisation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wip__outilgof`.`immobilisation` (
  `id_immobilisation` INT(11) NOT NULL AUTO_INCREMENT,
  `date_debut` DATETIME NOT NULL,
  `date_fin` DATETIME NULL DEFAULT NULL,
  `id_materiel` INT(11) NOT NULL,
  PRIMARY KEY (`id_immobilisation`),
  INDEX `id_materielomotive` (`id_materiel` ASC),
  CONSTRAINT `fk_immobilisation_materiel1`
    FOREIGN KEY (`id_materiel`)
    REFERENCES `wip__outilgof`.`materiel` (`id_materiel`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `wip__outilgof`.`site_realisateur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wip__outilgof`.`site_realisateur` (
  `id_site_realisateur` INT(11) NOT NULL AUTO_INCREMENT,
  `nom_site_realisateur` VARCHAR(255) NOT NULL,
  `diminutif_site_realisateur` VARCHAR(255) NOT NULL,
  `equivalent_gmao_diminutif_site_realisateur` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id_site_realisateur`),
  INDEX `diminutif_site_realisateur` (`diminutif_site_realisateur` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `wip__outilgof`.`statut_intervention`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wip__outilgof`.`statut_intervention` (
  `id_statut_intervention` INT(11) NOT NULL AUTO_INCREMENT,
  `statut_intervention` INT(11) NOT NULL,
  PRIMARY KEY (`id_statut_intervention`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `wip__outilgof`.`type_intervention`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wip__outilgof`.`type_intervention` (
  `id_type_intervention` INT(11) NOT NULL AUTO_INCREMENT,
  `type_intervention` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id_type_intervention`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `wip__outilgof`.`rdv`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wip__outilgof`.`rdv` (
  `id_rdv` INT(11) NOT NULL AUTO_INCREMENT,
  `date_debut_rdv` DATETIME NOT NULL,
  `date_fin_rdv` DATETIME NULL DEFAULT NULL,
  `id_site_realisateur` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_rdv`),
  INDEX `id_site_realisateur` (`id_site_realisateur` ASC),
  CONSTRAINT `rdv_ibfk_1`
    FOREIGN KEY (`id_site_realisateur`)
    REFERENCES `wip__outilgof`.`site_realisateur` (`id_site_realisateur`)
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `wip__outilgof`.`intervention`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wip__outilgof`.`intervention` (
  `id_intervention` BIGINT(20) NOT NULL,
  `id_materiel` INT(11) NOT NULL,
  `libelle_intervention` TEXT NULL DEFAULT NULL,
  `id_type_intervention` INT(11) NULL DEFAULT NULL,
  `id_statut_intervention` INT(11) NOT NULL DEFAULT '0',
  `code_operation_intervention` VARCHAR(255) NULL DEFAULT NULL,
  `id_rdv` INT(11) NULL DEFAULT NULL,
  `debut_previsionnel_intervention` DATETIME NULL DEFAULT NULL,
  `date_fin_previsionnelle` DATETIME NULL DEFAULT NULL,
  `date_fin_reelle` DATETIME NULL DEFAULT NULL,
  `id_site_realisateur` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_intervention`),
  INDEX `id_materiel` (`id_materiel` ASC),
  INDEX `id_type_intervention` (`id_type_intervention` ASC),
  INDEX `id_statut_intervention` (`id_statut_intervention` ASC),
  INDEX `id_rdv` (`id_rdv` ASC),
  INDEX `id_site_realisateur` (`id_site_realisateur` ASC),
  CONSTRAINT `intervention_ibfk_1`
    FOREIGN KEY (`id_materiel`)
    REFERENCES `wip__outilgof`.`materiel` (`id_materiel`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `intervention_ibfk_2`
    FOREIGN KEY (`id_site_realisateur`)
    REFERENCES `wip__outilgof`.`site_realisateur` (`id_site_realisateur`)
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT `intervention_ibfk_3`
    FOREIGN KEY (`id_statut_intervention`)
    REFERENCES `wip__outilgof`.`statut_intervention` (`id_statut_intervention`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `intervention_ibfk_4`
    FOREIGN KEY (`id_type_intervention`)
    REFERENCES `wip__outilgof`.`type_intervention` (`id_type_intervention`)
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT `intervention_ibfk_5`
    FOREIGN KEY (`id_rdv`)
    REFERENCES `wip__outilgof`.`rdv` (`id_rdv`)
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
