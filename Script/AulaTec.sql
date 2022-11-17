-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema aulatec
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `aulatec` ;

-- -----------------------------------------------------
-- Schema aulatec
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `aulatec` DEFAULT CHARACTER SET utf8 ;
USE `aulatec` ;

-- -----------------------------------------------------
-- Table `aulatec`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aulatec`.`cliente` (
  `idCliente` INT NOT NULL AUTO_INCREMENT,
  `nomeCliente` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `enderecoCliente` VARCHAR(100) CHARACTER SET 'utf8' NOT NULL,
  `telefoneCliente` VARCHAR(20) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `nascimentoCliente` DATE NULL DEFAULT NULL,
  `bairroCliente` VARCHAR(50) NULL DEFAULT NULL,
  `cidadeCliente` VARCHAR(50) NULL DEFAULT NULL,
  `estadoCliente` VARCHAR(2) NULL DEFAULT NULL,
  PRIMARY KEY (`idCliente`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `aulatec`.`servico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aulatec`.`servico` (
  `idServico` INT NOT NULL AUTO_INCREMENT,
  `nomeServico` VARCHAR(45) CHARACTER SET 'utf8' NOT NULL,
  `descricaoServico` VARCHAR(45) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `precoServico` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`idServico`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `aulatec`.`ordemservico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aulatec`.`ordemservico` (
  `idOS` INT NOT NULL,
  `dataOS` VARCHAR(45) NULL DEFAULT NULL,
  `idCliente` INT NULL DEFAULT NULL,
  `totalOS` DECIMAL(10,2) NULL DEFAULT NULL,
  `descontoOS` DECIMAL(10,2) NULL DEFAULT NULL,
  PRIMARY KEY (`idOS`),
  CONSTRAINT `fk_Venda_Cliente`
    FOREIGN KEY (`idCliente`)
    REFERENCES `aulatec`.`cliente` (`idCliente`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;

CREATE INDEX `fk_Venda_Cliente_idx` ON `aulatec`.`ordemservico` (`idCliente` ASC) VISIBLE;

-- -----------------------------------------------------
-- Table `aulatec`.`itemos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aulatec`.`itemos` (
  `idVenda` INT NOT NULL,
  `idServico` INT NOT NULL,
  `QuantidadeIOS` DECIMAL(10,2) NULL DEFAULT NULL,
  `valorServico` DECIMAL(10,2) NULL DEFAULT NULL,
  PRIMARY KEY (`idVenda`, `idServico`),
  CONSTRAINT `fk_itemVenda_Produto`
    FOREIGN KEY (`idServico`)
    REFERENCES `aulatec`.`servico` (`idServico`),
  CONSTRAINT `fk_itemVenda_Venda`
    FOREIGN KEY (`idVenda`)
    REFERENCES `aulatec`.`ordemservico` (`idOS`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;

CREATE INDEX `fk_itemVenda_Produto_idx` ON `aulatec`.`itemos` (`idServico` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `aulatec`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aulatec`.`usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `loginUsuario` VARCHAR(45) NOT NULL,
  `senhaUsuario` VARCHAR(40) NOT NULL,
  PRIMARY KEY (`idUsuario`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
