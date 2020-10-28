-- MySQL Script generated by MySQL Workbench
-- Tue Oct 27 20:51:42 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema projeto-site
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema projeto-site
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `projeto-site` DEFAULT CHARACTER SET utf8 ;
USE `projeto-site` ;

-- -----------------------------------------------------
-- Table `projeto-site`.`empregador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projeto-site`.`empregador` (
  `id` INT NOT NULL,
  `nome` VARCHAR(30) NULL,
  `detalhes` VARCHAR(100) NULL,
  `imagem` VARCHAR(50) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projeto-site`.`profissional`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projeto-site`.`profissional` (
  `id` INT NOT NULL,
  `vagaPretendida` VARCHAR(100) NULL,
  `detalhes` VARCHAR(200) NULL,
  `status` ENUM('disponivel', 'negociando', 'ocupado') NULL,
  `imagem` VARCHAR(50) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projeto-site`.`formacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projeto-site`.`formacao` (
  `idformacao` INT NOT NULL,
  `nome` VARCHAR(45) NULL,
  `nivel` ENUM('superior', 'técnico', 'pós-graduacao', 'mestrado', 'doutorado') NULL,
  `periodo` INT(2) NULL,
  `profissional_id` INT NOT NULL,
  `status` ENUM('concluido', 'cursando') NULL,
  PRIMARY KEY (`idformacao`),
  INDEX `fk_formacao_profissional1_idx` (`profissional_id` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projeto-site`.`vaga`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projeto-site`.`vaga` (
  `id` INT NOT NULL,
  `nome` VARCHAR(45) NULL,
  `detalhe` VARCHAR(100) NULL,
  `empregador_id` INT NOT NULL,
  `valor` INT(6) NULL,
  `dataInicio` DATE NULL,
  `dataFinal` DATE NULL,
  `status` ENUM('disponivel', 'negociando', 'ocupada') NULL,
  `vagacol` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_vaga_empregador1_idx` (`empregador_id` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projeto-site`.`profissionalVaga`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projeto-site`.`profissionalVaga` (
  `profissional_id` INT NOT NULL,
  `vaga_id` INT NOT NULL,
  `preco` INT(6) NULL,
  PRIMARY KEY (`profissional_id`, `vaga_id`),
  INDEX `fk_profissional_has_vaga_vaga1_idx` (`vaga_id` ASC) VISIBLE,
  INDEX `fk_profissional_has_vaga_profissional1_idx` (`profissional_id` ASC) VISIBLE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;