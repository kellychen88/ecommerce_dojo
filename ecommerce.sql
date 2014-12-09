SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `ecommerce` DEFAULT CHARACTER SET utf8 ;
USE `ecommerce` ;

-- -----------------------------------------------------
-- Table `ecommerce`.`category`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ecommerce`.`category` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NULL DEFAULT NULL ,
  `image_path` VARCHAR(255) NULL DEFAULT NULL ,
  `created_at` DATETIME NULL DEFAULT NULL ,
  `updated_at` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecommerce`.`users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ecommerce`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NULL DEFAULT NULL ,
  `email` VARCHAR(255) NULL DEFAULT NULL ,
  `password` VARCHAR(255) NULL DEFAULT NULL ,
  `address` VARCHAR(255) NULL DEFAULT NULL ,
  `created_at` DATETIME NULL DEFAULT NULL ,
  `updated_at` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecommerce`.`orders`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ecommerce`.`orders` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `amount` FLOAT NULL DEFAULT NULL ,
  `created_at` DATETIME NULL DEFAULT NULL ,
  `updated_at` DATETIME NULL ,
  `user_id` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_orders_users_idx` (`user_id` ASC) ,
  CONSTRAINT `fk_orders_users`
    FOREIGN KEY (`user_id` )
    REFERENCES `ecommerce`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecommerce`.`products`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ecommerce`.`products` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NULL DEFAULT NULL ,
  `price` DECIMAL(10,0) NULL DEFAULT NULL ,
  `description` TEXT NULL DEFAULT NULL ,
  `image_path` VARCHAR(255) NULL DEFAULT NULL ,
  `created_at` DATETIME NULL DEFAULT NULL ,
  `updated_at` DATETIME NULL DEFAULT NULL ,
  `category_id` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_products_category1_idx` (`category_id` ASC) ,
  CONSTRAINT `fk_products_category1`
    FOREIGN KEY (`category_id` )
    REFERENCES `ecommerce`.`category` (`id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 37
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecommerce`.`ordered_product`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ecommerce`.`ordered_product` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `quanity` INT NULL DEFAULT NULL ,
  `orders_id` INT(11) NOT NULL ,
  `product_id` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_ordered_product_orders1_idx` (`orders_id` ASC) ,
  INDEX `fk_ordered_product_products1_idx` (`product_id` ASC) ,
  CONSTRAINT `fk_ordered_product_orders1`
    FOREIGN KEY (`orders_id` )
    REFERENCES `ecommerce`.`orders` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ordered_product_products1`
    FOREIGN KEY (`product_id` )
    REFERENCES `ecommerce`.`products` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

USE `ecommerce` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
