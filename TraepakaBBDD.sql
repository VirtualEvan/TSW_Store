-- MySQL Script generated by MySQL Workbench
-- 11/14/16 16:55:37
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema traepaka
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema traepaka
-- -----------------------------------------------------
DROP DATABASE IF EXISTS `traepaka`;
CREATE SCHEMA IF NOT EXISTS `traepaka` DEFAULT CHARACTER SET utf8 ;
-- DROP USER IF EXISTS `tsw_user`@'localhost';
CREATE USER 'tsw_user'@'localhost' IDENTIFIED BY 'tsw_pass';
GRANT USAGE, SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, INDEX, ALTER ON `traepaka`.* TO 'tsw_user'@'localhost';
USE `traepaka` ;

-- -----------------------------------------------------
-- Table `traepaka`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `traepaka`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `traepaka`.`producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `traepaka`.`products` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `price` FLOAT NOT NULL,
  `description` VARCHAR(500) NOT NULL,
  `image` VARCHAR(45) NOT NULL,
  `user_id` INT NOT NULL,
  `created` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_products_user_idx` (`user_id` ASC),
  CONSTRAINT `fk_product_user`
    FOREIGN KEY (`user_id`)
    REFERENCES `traepaka`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `traepaka`.`chat`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `traepaka`.`chats` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `seller_id` INT NOT NULL,
  `buyer_id` INT NOT NULL,
  `product_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_chat_seller_idx` (`seller_id` ASC),
  INDEX `fk_chat_buyer_idx` (`buyer_id` ASC),
  INDEX `fk_chat_product_idx` (`product_id` ASC),
  CONSTRAINT `fk_chat_seller`
    FOREIGN KEY (`seller_id`)
    REFERENCES `traepaka`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `fk_chat_buyer`
    FOREIGN KEY (`buyer_id`)
    REFERENCES `traepaka`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `fk_chat_product`
    FOREIGN KEY (`product_id`)
    REFERENCES `traepaka`.`products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `traepaka`.`Mensaje`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `traepaka`.`messages` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `sender` TINYINT(1) NOT NULL, -- 0 -> seller, 1 -> buyer
  `chat_id` INT NOT NULL,
  `content` VARCHAR(150) NOT NULL,
  `created` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_message_chat_idx` (`chat_id` ASC),
  CONSTRAINT `fk_message_chat`
    FOREIGN KEY (`chat_id`)
    REFERENCES `traepaka`.`chats` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

/* Then insert some users for testing: */
INSERT INTO users (id, name, username, password, email)
    VALUES (1, 'Esteban', 'virtualevan','password', 'virtualevan@gmail.com');
INSERT INTO users (id, name, username, password, email)
    VALUES (2, 'Luis', 'lrcortizo','password', 'lrcortizo@esei.uvigo.es');
INSERT INTO users (id, name, username, password, email)
    VALUES (3, 'Pablo', 'prhermida','password', 'prhermida@esei.uvigo.es');

/* Then insert some products for testing: */
/*ropa*/
INSERT INTO products (id, name, price, description, image, user_id, created)
    VALUES (1, 'Producto1', 80,'Descripcion de producto 1','Imagen1',1, NOW());
/*telefono roto*/
INSERT INTO products (id, name, price, description, image, user_id, created)
    VALUES (2, 'Pruducto2', 100,'Descripcion de producto 2','Imagen2',1, NOW());
INSERT INTO products (id, name, price, description, image, user_id, created)
    VALUES (3, 'Pruducto3', 20,'Descripcion de producto 3','Imagen3',1, NOW());
/*algo de tia*/
INSERT INTO products (id, name, price, description, image, user_id, created)
    VALUES (4, 'Pruducto4', 30,'Descripcion de producto 4','Imagen4',2, NOW());
INSERT INTO products (id, name, price, description, image, user_id, created)
    VALUES (5, 'Pruducto5', 200,'Descripcion de producto 5','Imagen5',2, NOW());
INSERT INTO products (id, name, price, description, image, user_id, created)
    VALUES (6, 'Pruducto6', 1024,'Descripcion de producto 6','Imagen6',3, NOW());

/* Then insert some chats for testing: */
INSERT INTO chats (id, seller_id, buyer_id, product_id)
    VALUES (1, 1, 2, 1);
INSERT INTO chats (id, seller_id, buyer_id, product_id)
    VALUES (2, 1, 3, 2);
INSERT INTO chats (id, seller_id, buyer_id, product_id)
    VALUES (3, 2, 3, 4);

/* Then insert some messages for testing: */
INSERT INTO messages (id, sender, chat_id, content, created)
    VALUES (1, 1, 1,'ola k ase', NOW());
INSERT INTO messages (id, sender, chat_id, content, created)
    VALUES (2, 1, 1, 'Hazme una rebajita', NOW());
INSERT INTO messages (id, sender, chat_id, content, created)
    VALUES (3, 0, 1,'Claro que si guapi', NOW());
INSERT INTO messages (id, sender, chat_id, content, created)
    VALUES (4, 1, 2,'Es nuevo?', NOW());
INSERT INTO messages (id, sender, chat_id, content, created)
    VALUES (5, 0, 2,'Si, lo de la pantalla es un efecto que se curró Celso', NOW());
INSERT INTO messages (id, sender, chat_id, content, created)
    VALUES (6, 1, 3,'Hola guapa!', NOW());


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;