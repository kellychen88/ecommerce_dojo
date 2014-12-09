-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema e_commerce_products
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema e_commerce_products
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `e_commerce_products` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `e_commerce_products` ;

-- -----------------------------------------------------
-- Table `e_commerce_products`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `e_commerce_products`.`users` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(45) NULL,
  `last_name` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `address` VARCHAR(255) NULL,
  `address2` VARCHAR(255) NULL,
  `city` VARCHAR(45) NULL,
  `state` VARCHAR(45) NULL,
  `zip_code` VARCHAR(45) NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e_commerce_products`.`customer_order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `e_commerce_products`.`customer_order` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `amount` DECIMAL(6,2) NULL,
  `date_created` DATETIME NULL,
  `users_ID` INT NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_customer_order_users1_idx` (`users_ID` ASC),
  CONSTRAINT `fk_customer_order_users1`
    FOREIGN KEY (`users_ID`)
    REFERENCES `e_commerce_products`.`users` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e_commerce_products`.`category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `e_commerce_products`.`category` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e_commerce_products`.`product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `e_commerce_products`.`product` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `price` VARCHAR(45) NULL,
  `description` VARCHAR(255) NULL,
  `img` VARCHAR(45) NULL,
  `updated_at` VARCHAR(45) NULL,
  `category_ID` INT NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_product_category1_idx` (`category_ID` ASC),
  CONSTRAINT `fk_product_category1`
    FOREIGN KEY (`category_ID`)
    REFERENCES `e_commerce_products`.`category` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e_commerce_products`.`ordered_product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `e_commerce_products`.`ordered_product` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `quantity` VARCHAR(45) NULL,
  `customer_order_ID` INT NOT NULL,
  `product_ID` INT NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_ordered_product_customer_order1_idx` (`customer_order_ID` ASC),
  INDEX `fk_ordered_product_product1_idx` (`product_ID` ASC),
  CONSTRAINT `fk_ordered_product_customer_order1`
    FOREIGN KEY (`customer_order_ID`)
    REFERENCES `e_commerce_products`.`customer_order` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ordered_product_product1`
    FOREIGN KEY (`product_ID`)
    REFERENCES `e_commerce_products`.`product` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
