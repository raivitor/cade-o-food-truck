-- -----------------------------------------------------
-- Schema food_truck
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `food_truck` DEFAULT CHARACTER SET utf8 ;
USE `food_truck` ;

-- -----------------------------------------------------
-- Table `food_truck`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `food_truck`.`usuario` ;

CREATE TABLE IF NOT EXISTS `food_truck`.`usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  `nome` VARCHAR(255),
  `senha` VARCHAR(255) NOT NULL,
  `data_de_nascimento` DATETIME,
  `cpf` VARCHAR(14),
  `sexo` CHAR(1),
  `papel` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`email`),
  UNIQUE INDEX `usuario_unq_cpf` (`cpf`),
  UNIQUE INDEX `usuario_unq_id` (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `food_truck`.`gerente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `food_truck`.`gerente` ;

CREATE TABLE IF NOT EXISTS `food_truck`.`gerente` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `usuario_email` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `gerente_idx_usuario_email_fk` (`usuario_email`),
  CONSTRAINT `gerente_fk_usuario_email`
    FOREIGN KEY (`usuario_email`)
    REFERENCES `food_truck`.`usuario` (`email`)
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `food_truck`.`dono`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `food_truck`.`dono` ;

CREATE TABLE IF NOT EXISTS `food_truck`.`dono` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `usuario_email` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `dono_idx_usuario_email_fk` (`usuario_email`),
  CONSTRAINT `dono_fk_usuario_email`
    FOREIGN KEY (`usuario_email`)
    REFERENCES `food_truck`.`usuario` (`email`)
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `food_truck`.`empresa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `food_truck`.`empresa` ;

CREATE TABLE IF NOT EXISTS `food_truck`.`empresa` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cnpj` VARCHAR(18),
  `dono_id` INT NOT NULL,
  `nome` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `empresa_unq_cnpj` (`cnpj`),
  INDEX `empresa_idx_dono_id_fk` (`dono_id`),
  CONSTRAINT `empresa_fk_dono_id`
    FOREIGN KEY (`dono_id`)
    REFERENCES `food_truck`.`dono` (`id`)
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `food_truck`.`food_truck`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `food_truck`.`food_truck` ;

CREATE TABLE IF NOT EXISTS `food_truck`.`food_truck` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `descricao` MEDIUMTEXT,
  `telefone` VARCHAR(255),
  `logo` TEXT,
  `fotos` VARCHAR(255),
  `media_votos` DOUBLE,
  `gerente_id` INT NOT NULL,
  `empresa_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `food_truck_idx_gerente_id_fk` (`gerente_id`),
  INDEX `food_truck_idx_empresa_id_fk` (`empresa_id`),
  CONSTRAINT `food_truck_fk_gerente_id`
    FOREIGN KEY (`gerente_id`)
    REFERENCES `food_truck`.`gerente` (`id`)
    ON UPDATE CASCADE,
  CONSTRAINT `food_truck_fk_empresa_id`
    FOREIGN KEY (`empresa_id`)
    REFERENCES `food_truck`.`empresa` (`id`)
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `food_truck`.`redes_sociais`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `food_truck`.`redes_sociais` ;

CREATE TABLE IF NOT EXISTS `food_truck`.`redes_sociais` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255),
  `link` VARCHAR(255),
  `logo` VARCHAR(255),
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `food_truck`.`pagamento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `food_truck`.`pagamento` ;

CREATE TABLE IF NOT EXISTS `food_truck`.`pagamento` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(255),
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `food_truck`.`geoposicao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `food_truck`.`geoposicao` ;

CREATE TABLE IF NOT EXISTS `food_truck`.`geoposicao` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `latitude` DOUBLE,
  `longitude` DOUBLE,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `food_truck`.`rota`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `food_truck`.`rota` ;

CREATE TABLE IF NOT EXISTS `food_truck`.`rota` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `rua` VARCHAR(255),
  `cep` VARCHAR(9),
  `cidade` VARCHAR(255),
  `estado` VARCHAR(255),
  `dia_da_semana` VARCHAR(255),
  `hora_de_inicio` TIME,
  `hora_de_termino` TIME,
  `food_truck_id` INT NOT NULL,
  `geoposicao_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `rota_idx_food_truck_id_fk` (`food_truck_id`),
  INDEX `rota_idx_geoposicao_id_fk` (`geoposicao_id`),
  CONSTRAINT `rota_fk_food_truck_id`
    FOREIGN KEY (`food_truck_id`)
    REFERENCES `food_truck`.`food_truck` (`id`)
    ON UPDATE CASCADE,
  CONSTRAINT `rota_fk_geoposicao_id`
    FOREIGN KEY (`geoposicao_id`)
    REFERENCES `food_truck`.`geoposicao` (`id`)
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `food_truck`.`sabor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `food_truck`.`sabor` ;

CREATE TABLE IF NOT EXISTS `food_truck`.`sabor` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(255),
  PRIMARY KEY (`id`),
  UNIQUE INDEX `tipo_UNIQUE` (`tipo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `food_truck`.`categoria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `food_truck`.`categoria` ;

CREATE TABLE IF NOT EXISTS `food_truck`.`categoria` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`nome`),
  UNIQUE INDEX `id_UNIQUE` (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `food_truck`.`item_de_cardapio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `food_truck`.`item_de_cardapio` ;

CREATE TABLE IF NOT EXISTS `food_truck`.`item_de_cardapio` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `preco` FLOAT,
  `ingredientes` VARCHAR(255),
  `descricao` VARCHAR(255),
  `sabor_id` INT NOT NULL,
  `categoria_nome` VARCHAR(255) NOT NULL,
  `food_truck_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `item_de_cardapio_idx_sabor_id_fk` (`sabor_id`),
  INDEX `item_de_cardapio_idx_categoria_id_fk` (`categoria_nome`),
  INDEX `item_de_cardapio_idx_food_truck_id_fk` (`food_truck_id`),
  CONSTRAINT `item_de_cardapio_fk_sabor_id`
    FOREIGN KEY (`sabor_id`)
    REFERENCES `food_truck`.`sabor` (`id`)
    ON UPDATE CASCADE,
  CONSTRAINT `item_de_cardapio_fk_categoria_nome`
    FOREIGN KEY (`categoria_nome`)
    REFERENCES `food_truck`.`categoria` (`nome`)
    ON UPDATE CASCADE,
  CONSTRAINT `item_de_cardapio_fk_food_truck_id`
    FOREIGN KEY (`food_truck_id`)
    REFERENCES `food_truck`.`food_truck` (`id`)
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `food_truck`.`promocao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `food_truck`.`promocao` ;

CREATE TABLE IF NOT EXISTS `food_truck`.`promocao` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `desconto` FLOAT,
  `valor` FLOAT,
  `data_de_inicio` DATETIME,
  `data_de_termino` DATETIME,
  `food_truck_id` INT NOT NULL,
  `item_de_cardapio_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `promocao_idx_food_truck_id_fk` (`food_truck_id`),
  INDEX `promocao_idx_item_de_cardapio_id_fk` (`item_de_cardapio_id`),
  CONSTRAINT `promocao_fk_food_truck_id`
    FOREIGN KEY (`food_truck_id`)
    REFERENCES `food_truck`.`food_truck` (`id`)
    ON UPDATE CASCADE,
  CONSTRAINT `promocao_fk_item_de_cardapio_id`
    FOREIGN KEY (`item_de_cardapio_id`)
    REFERENCES `food_truck`.`item_de_cardapio` (`id`)
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `food_truck`.`divulgador`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `food_truck`.`divulgador` ;

CREATE TABLE IF NOT EXISTS `food_truck`.`divulgador` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `usuario_email` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `divulgador_idx_usuario_email_fk` (`usuario_email`),
  CONSTRAINT `divulgador_fk_usuario_email`
    FOREIGN KEY (`usuario_email`)
    REFERENCES `food_truck`.`usuario` (`email`)
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `food_truck`.`evento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `food_truck`.`evento` ;

CREATE TABLE IF NOT EXISTS `food_truck`.`evento` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data_de_inicio` DATETIME NOT NULL,
  `data_de_termino` DATETIME NOT NULL,
  `nome` VARCHAR(255) NOT NULL,
  `descricao` TEXT,
  `divulgador_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `evento_idx_divulgador_id_fk` (`divulgador_id`),
  CONSTRAINT `evento_fk_divulgador_id`
    FOREIGN KEY (`divulgador_id`)
    REFERENCES `food_truck`.`divulgador` (`id`)
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `food_truck`.`cliente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `food_truck`.`cliente` ;

CREATE TABLE IF NOT EXISTS `food_truck`.`cliente` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `geoposicao_id` INT NOT NULL,
  `usuario_email` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `cliente_idx_geoposicao_id_fk` (`geoposicao_id`),
  INDEX `cliente_idx_usuario_email_fk` (`usuario_email`),
  CONSTRAINT `cliente_fk_geoposicao_id`
    FOREIGN KEY (`geoposicao_id`)
    REFERENCES `food_truck`.`geoposicao` (`id`)
    ON UPDATE CASCADE,
  CONSTRAINT `cliente_fk_usuario_email`
    FOREIGN KEY (`usuario_email`)
    REFERENCES `food_truck`.`usuario` (`email`)
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `food_truck`.`foodTruck_has_pagamento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `food_truck`.`foodTruck_has_pagamento` ;

CREATE TABLE IF NOT EXISTS `food_truck`.`foodTruck_has_pagamento` (
  `food_truck_id` INT NOT NULL,
  `pagamento_id` INT NOT NULL,
  PRIMARY KEY (`food_truck_id`, `pagamento_id`),
  INDEX `fk_FoodTruck_has_Pagamento_Pagamento1_idx` (`pagamento_id`),
  INDEX `fk_FoodTruck_has_Pagamento_FoodTruck1_idx` (`food_truck_id`),
  CONSTRAINT `food_truck_has_pagamento_fk_food_truck_id`
    FOREIGN KEY (`food_truck_id`)
    REFERENCES `food_truck`.`food_truck` (`id`)
    ON UPDATE CASCADE,
  CONSTRAINT `food_truck_has_pagamento_fk_pagamento_id`
    FOREIGN KEY (`pagamento_id`)
    REFERENCES `food_truck`.`pagamento` (`id`)
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `food_truck`.`favorito`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `food_truck`.`favorito` ;

CREATE TABLE IF NOT EXISTS `food_truck`.`favorito` (
  `food_truck_id` INT NOT NULL,
  `cliente_id` INT NOT NULL,
  `id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `favorito_idx_cliente_id_fk` (`cliente_id`),
  INDEX `favorito_idx_food_truck_id_fk` (`food_truck_id`),
  CONSTRAINT `favorito_fk_food_truck_id`
    FOREIGN KEY (`food_truck_id`)
    REFERENCES `food_truck`.`food_truck` (`id`)
    ON UPDATE CASCADE,
  CONSTRAINT `favorito_fk_cliente_id`
    FOREIGN KEY (`cliente_id`)
    REFERENCES `food_truck`.`cliente` (`id`)
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `food_truck`.`food_truck_has_redes_sociais`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `food_truck`.`food_truck_has_redes_sociais` ;

CREATE TABLE IF NOT EXISTS `food_truck`.`food_truck_has_redes_sociais` (
  `food_truck_id` INT NOT NULL,
  `redes_sociais_id` INT NOT NULL,
  PRIMARY KEY (`food_truck_id`, `redes_sociais_id`),
  INDEX `food_truck_has_redes_sociais_idx_redes_sociais_id_fk` (`redes_sociais_id`),
  INDEX `food_truck_has_redes_sociais_idx_food_truck_id_fk` (`food_truck_id`),
  CONSTRAINT `food_truck_has_redes_sociais_fk_food_truck_id`
    FOREIGN KEY (`food_truck_id`)
    REFERENCES `food_truck`.`food_truck` (`id`)
    ON UPDATE CASCADE,
  CONSTRAINT `food_truck_has_redes_sociais_fk_redes_sociais_id`
    FOREIGN KEY (`redes_sociais_id`)
    REFERENCES `food_truck`.`redes_sociais` (`id`)
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `food_truck`.`food_truck_has_evento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `food_truck`.`food_truck_has_evento` ;

CREATE TABLE IF NOT EXISTS `food_truck`.`food_truck_has_evento` (
  `food_truck_id` INT NOT NULL,
  `evento_id` INT NOT NULL,
  PRIMARY KEY (`food_truck_id`, `evento_id`),
  INDEX `fk_FoodTruck_has_Evento_Evento1_idx` (`evento_id`),
  INDEX `fk_FoodTruck_has_Evento_FoodTruck1_idx` (`food_truck_id`),
  CONSTRAINT `food_truck_has_evento_fk_food_truck_id`
    FOREIGN KEY (`food_truck_id`)
    REFERENCES `food_truck`.`food_truck` (`id`)
    ON UPDATE CASCADE,
  CONSTRAINT `food_truck_has_evento_fk_evento_id`
    FOREIGN KEY (`evento_id`)
    REFERENCES `food_truck`.`evento` (`id`)
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `food_truck`.`checkin`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `food_truck`.`checkin` ;

CREATE TABLE IF NOT EXISTS `food_truck`.`checkin` (
  `cliente_id` INT NOT NULL,
  `food_truck_id` INT NOT NULL,
  `data` DATETIME NOT NULL,
  `id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `checkin_idx_food_truck_id_fk` (`food_truck_id`),
  INDEX `checkin_idx_cliente_id_fk` (`cliente_id`),
  CONSTRAINT `checkin_fk_cliente_id`
    FOREIGN KEY (`cliente_id`)
    REFERENCES `food_truck`.`cliente` (`id`)
    ON UPDATE CASCADE,
  CONSTRAINT `checkin_fk_food_truck_id`
    FOREIGN KEY (`food_truck_id`)
    REFERENCES `food_truck`.`food_truck` (`id`)
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `food_truck`.`avaliacao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `food_truck`.`avaliacao` ;

CREATE TABLE IF NOT EXISTS `food_truck`.`avaliacao` (
  `cliente_id` INT NOT NULL,
  `food_truck_id` INT NOT NULL,
  `nota` FLOAT NOT NULL,
  `data` DATETIME,
  `id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `avaliacao_idx_food_truck_id_fk` (`food_truck_id`),
  INDEX `avaliacao_idx_cliente_id_fk` (`cliente_id`),
  CONSTRAINT `avaliacao_fk_cliente_id`
    FOREIGN KEY (`cliente_id`)
    REFERENCES `food_truck`.`cliente` (`id`)
    ON UPDATE CASCADE,
  CONSTRAINT `avaliacao_fk_food_truck_id`
    FOREIGN KEY (`food_truck_id`)
    REFERENCES `food_truck`.`food_truck` (`id`)
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `food_truck`.`gerente_has_empresa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `food_truck`.`gerente_has_empresa` ;

CREATE TABLE IF NOT EXISTS `food_truck`.`gerente_has_empresa` (
  `gerente_id` INT NOT NULL,
  `empresa_id` INT NOT NULL,
  PRIMARY KEY (`gerente_id`, `empresa_id`),
  INDEX `gerente_has_empresa_idx_empresa_id_fk` (`empresa_id`),
  INDEX `gerente_has_empresa_idx_gerente_id_fk` (`gerente_id`),
  CONSTRAINT `gerente_has_empresa_fk_gerente_id`
    FOREIGN KEY (`gerente_id`)
    REFERENCES `food_truck`.`gerente` (`id`)
    ON UPDATE CASCADE,
  CONSTRAINT `gerente_has_empresa_fk_empresa_id`
    FOREIGN KEY (`empresa_id`)
    REFERENCES `food_truck`.`empresa` (`id`)
    ON UPDATE CASCADE)
ENGINE = InnoDB;

DELIMITER $$

USE `food_truck`$$
DROP TRIGGER IF EXISTS `food_truck`.`avaliacao_AFTER_INSERT` $$
USE `food_truck`$$
CREATE DEFINER = CURRENT_USER TRIGGER `food_truck`.`avaliacao_AFTER_INSERT` AFTER INSERT ON `avaliacao` FOR EACH ROW
BEGIN
    UPDATE food_truck SET media_votos = (SELECT AVG(nota) AS nota FROM avaliacao WHERE avaliacao.food_truck_id = NEW.food_truck_id) WHERE food_truck.id = NEW.food_truck_id; 
END$$

DELIMITER ;
