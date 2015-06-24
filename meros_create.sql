-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema meros
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema meros
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `meros` DEFAULT CHARACTER SET utf8 ;
USE `meros` ;

-- -----------------------------------------------------
-- Table `meros`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `meros`.`users` (
  `id` VARCHAR(16) NOT NULL COMMENT '一意に識別するID',
  `name` VARCHAR(45) NOT NULL COMMENT '名称',
  `password` VARCHAR(45) NOT NULL COMMENT 'ログインに要するパスワード',
  `areaCode` VARCHAR(3) NOT NULL COMMENT '地域コード',
  `authority` INT(3) NOT NULL COMMENT '権限',
  `mainMailAddress` VARCHAR(100) NULL DEFAULT NULL COMMENT '業務時間内に使用されるメールアドレス',
  `subMailAddress` VARCHAR(100) NULL DEFAULT NULL COMMENT '業務時間外に使用されるメールアドレス',
  `invalidFlg` INT(3) NULL DEFAULT 0,
  `created` DATETIME NOT NULL,
  `creater` VARCHAR(16) NOT NULL,
  `modified` DATETIME NOT NULL,
  `modifyer` VARCHAR(16) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `INDEX` (`id` ASC, `authority` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `meros`.`customers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `meros`.`customers` (
  `id` VARCHAR(16) NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `areaCode` VARCHAR(3) NOT NULL,
  `invalidFlg` INT(3) NULL DEFAULT 0,
  `created` DATETIME NOT NULL,
  `creater` VARCHAR(16) NOT NULL,
  `modified` DATETIME NOT NULL,
  `modifyer` VARCHAR(16) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `meros`.`cars`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `meros`.`cars` (
  `id` VARCHAR(16) NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `driverName` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `customerId` VARCHAR(16) NOT NULL,
  `invalidFlg` INT(3) NULL DEFAULT 0,
  `created` DATETIME NOT NULL,
  `creater` VARCHAR(16) NOT NULL,
  `modified` DATETIME NOT NULL,
  `modifyer` VARCHAR(16) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `meros`.`plans`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `meros`.`plans` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `customerId` VARCHAR(16) NOT NULL,
  `carId` VARCHAR(16) NOT NULL,
  `ymd` DATE NOT NULL,
  `row` INT NOT NULL,
  `startTime` TIME NULL,
  `endTime` TIME NULL,
  `destination` VARCHAR(256) NULL,
  `approvedYmd` DATETIME NULL,
  `approver` VARCHAR(16) NULL,
  `requestStartTime` TIME NULL,
  `requestEndTime` TIME NULL,
  `requestDestination` VARCHAR(256) NULL,
  `status` INT(3) NOT NULL,
  `created` DATETIME NOT NULL,
  `creater` VARCHAR(16) NOT NULL,
  `modified` DATETIME NOT NULL,
  `modifyer` VARCHAR(16) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `meros`.`settings`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `meros`.`settings` (
  `id` INT NOT NULL,
  `systemName` VARCHAR(45) NOT NULL,
  `mode` INT(3) NOT NULL,
  `created` DATETIME NOT NULL,
  `creater` VARCHAR(16) NOT NULL,
  `modified` DATETIME NOT NULL,
  `modifyer` VARCHAR(16) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

USE `meros` ;

-- -----------------------------------------------------
-- Placeholder table for view `meros`.`account_view`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `meros`.`account_view` (`id` INT, `name` INT, `password` INT, `areaCode` INT, `invalidFlg` INT, `kbn` INT);

-- -----------------------------------------------------
-- View `meros`.`account_view`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `meros`.`account_view`;
USE `meros`;
CREATE 
     OR REPLACE ALGORITHM = UNDEFINED 
    DEFINER = `tds`@`%` 
    SQL SECURITY INVOKER
VIEW `account_view` AS
    SELECT 
        `u`.`id` AS `id`,
        `u`.`name` AS `name`,
        `u`.`password` AS `password`,
        `u`.`areaCode` AS `areaCode`,
        `u`.`invalidFlg` AS `invalidFlg`,
        '1' AS `kbn`
    FROM
        `users` `u` 
    UNION ALL SELECT 
        `cu`.`id` AS `id`,
        `cu`.`name` AS `name`,
        `cu`.`password` AS `password`,
        `cu`.`areaCode` AS `areaCode`,
        `cu`.`invalidFlg` AS `invalidFlg`,
        '2' AS `kbn`
    FROM
        `customers` `cu` 
    UNION ALL SELECT 
        `ca`.`id` AS `id`,
        `ca`.`name` AS `name`,
        `ca`.`password` AS `password`,
        `cu`.`areaCode` AS `areaCode`,
        `ca`.`invalidFlg` AS `invalidFlg`,
        '3' AS `kbn`
    FROM
        `cars` `ca`
        INNER JOIN
			`customers` `cu`
		ON
			`ca`.`customerId` = `cu`.`id`;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
