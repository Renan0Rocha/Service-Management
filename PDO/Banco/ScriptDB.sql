
DROP SCHEMA IF EXISTS `AulaTec` ;

-- -----------------------------------------------------
-- Schema AulaTec
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `AulaTec` DEFAULT CHARACTER SET utf8 ;
USE `AulaTec` ;

-- -----------------------------------------------------
-- Table `Cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Cliente` (
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
-- Table `AulaTec`.`servico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Servico` (
  `idServico` INT NOT NULL AUTO_INCREMENT,
  `nomeServico` VARCHAR(45) CHARACTER SET 'utf8' NOT NULL,
  `descricaoServico` VARCHAR(45) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `precoServico` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`idServico`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `AulaTec`.`ordemservico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OrdemServico` (
  `idOS` INT NOT NULL AUTO_INCREMENT,
  `dataOS` VARCHAR(45) NULL DEFAULT NULL,
  `idCliente` INT NULL DEFAULT NULL,
  `totalOS` DECIMAL(10,2) NULL DEFAULT NULL,
  `descontoOS` DECIMAL(10,2) NULL DEFAULT NULL,
  PRIMARY KEY (`idOS`),
  CONSTRAINT `fk_OS_Cliente`
    FOREIGN KEY (`idCliente`)
    REFERENCES `Cliente` (`idCliente`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;

CREATE INDEX `fk_OS_Cliente_idx` ON `OrdemServico` (`idCliente` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `itemos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ItemOS` (
  `idOS` INT NOT NULL,
  `idServico` INT NOT NULL,
  `quantidadeIOS` DECIMAL(10,2) NULL DEFAULT NULL,
  `valorServico` DECIMAL(10,2) NULL DEFAULT NULL,
  PRIMARY KEY (`idOS`, `idServico`),
  CONSTRAINT `fk_itemOS_Servico`
    FOREIGN KEY (`idServico`)
    REFERENCES `Servico` (`idServico`),
  CONSTRAINT `fk_itemOS_OS`
    FOREIGN KEY (`idOS`)
    REFERENCES `OrdemServico` (`idOS`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;

CREATE INDEX `fk_itemOS_Servico_idx` ON `ItemOS` (`idServico` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `loginUsuario` VARCHAR(45) NOT NULL,
  `senhaUsuario` VARCHAR(40) NOT NULL,
  PRIMARY KEY (`idUsuario`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
