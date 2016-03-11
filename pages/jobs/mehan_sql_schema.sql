SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`job_refferal`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`job_refferal` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NULL ,
  `job_id` INT NULL ,
  `reffered_to_user_id` INT NULL ,
  `reffered_to_email_id` VARCHAR(45) NULL ,
  `status` INT NULL ,
  `created` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`job_category`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`job_category` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(45) NULL ,
  `status` INT NULL ,
  `created` TIMESTAMP NULL ,
  `updated` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`package`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`package` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `type` VARCHAR(45) NULL ,
  `title` VARCHAR(45) NULL ,
  `description` TEXT NULL ,
  `status` INT NULL ,
  `created` TIMESTAMP NULL ,
  `updated` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Jobs`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Jobs` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NULL ,
  `category_id` INT NULL ,
  `title` VARCHAR(45) NULL ,
  `description` VARCHAR(45) NULL ,
  `postal_code` VARCHAR(45) NULL ,
  `address_1` TEXT NULL ,
  `address_2` TINYTEXT NULL ,
  `state` VARCHAR(45) NULL ,
  `city` VARCHAR(45) NULL ,
  `country` VARCHAR(45) NULL ,
  `min_max_salary` VARCHAR(45) NULL ,
  `working_hour` VARCHAR(45) NULL ,
  `weekends` VARCHAR(45) NULL ,
  `job_tasks` VARCHAR(45) NULL ,
  `status` INT NULL ,
  `active_from` TIMESTAMP NULL ,
  `created` TIMESTAMP NULL ,
  `updated` TIMESTAMP NULL ,
  `contract_period` VARCHAR(45) NULL ,
  `accomodation` VARCHAR(45) NULL ,
  `accomodation_rate` VARCHAR(45) NULL ,
  `car_offer` VARCHAR(45) NULL ,
  `car_rate` VARCHAR(45) NULL ,
  `overtime` VARCHAR(45) NULL ,
  `overtime_hour` VARCHAR(45) NULL ,
  `health_insurance` VARCHAR(45) NULL ,
  `yearly_bonus` VARCHAR(45) NULL ,
  `commission` VARCHAR(45) NULL ,
  `commission_freq` VARCHAR(45) NULL ,
  `commission_cap` VARCHAR(45) NULL ,
  `commission_conditions` VARCHAR(45) NULL ,
  `nationality` VARCHAR(45) NULL ,
  `iqama_transfer` VARCHAR(45) NULL ,
  `age_range` VARCHAR(45) NULL ,
  `exp_req` VARCHAR(45) NULL ,
  `exp_years` VARCHAR(45) NULL ,
  `exp_field` VARCHAR(45) NULL ,
  `exp_industry` VARCHAR(45) NULL ,
  `gender` VARCHAR(45) NULL ,
  `car_req` VARCHAR(45) NULL ,
  `employees_req` INT NULL ,
  `job_refferal_id` INT NOT NULL ,
  `job_category_id` INT NOT NULL ,
  `package_id` INT NOT NULL ,
  PRIMARY KEY (`id`, `job_refferal_id`, `job_category_id`, `package_id`) ,
  INDEX `fk_Jobs_job_refferal` (`job_refferal_id` ASC) ,
  INDEX `fk_Jobs_job_category` (`job_category_id` ASC) ,
  INDEX `fk_Jobs_package` (`package_id` ASC) ,
  CONSTRAINT `fk_Jobs_job_refferal`
    FOREIGN KEY (`job_refferal_id` )
    REFERENCES `mydb`.`job_refferal` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Jobs_job_category`
    FOREIGN KEY (`job_category_id` )
    REFERENCES `mydb`.`job_category` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Jobs_package`
    FOREIGN KEY (`package_id` )
    REFERENCES `mydb`.`package` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`payments`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`payments` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NULL ,
  `payment_type` VARCHAR(45) NULL ,
  `payment_to` INT NULL ,
  `amount` VARCHAR(45) NULL ,
  `reference_id` VARCHAR(255) NULL ,
  `status` INT NULL ,
  `created` TIMESTAMP NULL ,
  `updated` TIMESTAMP NULL ,
  `Users_id` INT NOT NULL ,
  `Users_Jobs_id` INT NOT NULL ,
  `Users_job_refferal_id` INT NOT NULL ,
  `Users_payments_id` INT NOT NULL ,
  PRIMARY KEY (`id`, `Users_id`, `Users_Jobs_id`, `Users_job_refferal_id`, `Users_payments_id`) ,
  INDEX `fk_payments_Users` (`Users_id` ASC, `Users_Jobs_id` ASC, `Users_job_refferal_id` ASC, `Users_payments_id` ASC) ,
  CONSTRAINT `fk_payments_Users`
    FOREIGN KEY (`Users_id` , `Users_Jobs_id` , `Users_job_refferal_id` , `Users_payments_id` )
    REFERENCES `mydb`.`Users` (`id` , `Jobs_id` , `job_refferal_id` , `payments_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`notifications`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`notifications` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NULL ,
  `user_from_id` INT NULL ,
  `type` VARCHAR(45) NULL ,
  `title` VARCHAR(45) NULL ,
  `description` TEXT NULL ,
  `status` INT NULL ,
  `created` TIMESTAMP NULL ,
  `updated` TIMESTAMP NULL ,
  `Users_id` INT NOT NULL ,
  `Users_Jobs_id` INT NOT NULL ,
  `Users_job_refferal_id` INT NOT NULL ,
  `Users_payments_id` INT NOT NULL ,
  `Users_notifications_id` INT NOT NULL ,
  PRIMARY KEY (`id`, `Users_id`, `Users_Jobs_id`, `Users_job_refferal_id`, `Users_payments_id`, `Users_notifications_id`) ,
  INDEX `fk_notifications_Users` (`Users_id` ASC, `Users_Jobs_id` ASC, `Users_job_refferal_id` ASC, `Users_payments_id` ASC, `Users_notifications_id` ASC) ,
  CONSTRAINT `fk_notifications_Users`
    FOREIGN KEY (`Users_id` , `Users_Jobs_id` , `Users_job_refferal_id` , `Users_payments_id` , `Users_notifications_id` )
    REFERENCES `mydb`.`Users` (`id` , `Jobs_id` , `job_refferal_id` , `payments_id` , `notifications_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`job_applications`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`job_applications` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `job_id` INT NULL ,
  `user_id` INT NULL ,
  `title` VARCHAR(45) NULL ,
  `description` VARCHAR(45) NULL ,
  `files` VARCHAR(45) NULL ,
  `status` VARCHAR(45) NULL ,
  `status_details` INT NULL ,
  `created` TIMESTAMP NULL ,
  `updated` TIMESTAMP NULL ,
  `Jobs_id` INT NOT NULL ,
  `Users_id` INT NOT NULL ,
  `Users_Jobs_id` INT NOT NULL ,
  PRIMARY KEY (`id`, `Jobs_id`, `Users_id`, `Users_Jobs_id`) ,
  INDEX `fk_job_applications_Jobs` (`Jobs_id` ASC) ,
  INDEX `fk_job_applications_Users` (`Users_id` ASC, `Users_Jobs_id` ASC) ,
  CONSTRAINT `fk_job_applications_Jobs`
    FOREIGN KEY (`Jobs_id` )
    REFERENCES `mydb`.`Jobs` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_job_applications_Users`
    FOREIGN KEY (`Users_id` , `Users_Jobs_id` )
    REFERENCES `mydb`.`Users` (`id` , `Jobs_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`messages`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`messages` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `parent_id` INT NULL ,
  `to_user_id` INT NULL ,
  `from_user_id` INT NULL ,
  `job_application_id` INT NOT NULL ,
  `title` VARCHAR(45) NULL ,
  `description` TEXT NULL ,
  `status` INT NULL ,
  `created` TIMESTAMP NULL ,
  `updated` TIMESTAMP NULL ,
  `Users_id` INT NOT NULL ,
  `Users_Jobs_id` INT NOT NULL ,
  `Users_job_refferal_id` INT NOT NULL ,
  `Users_payments_id` INT NOT NULL ,
  `Users_notifications_id` INT NOT NULL ,
  `Users_package_id1` INT NOT NULL ,
  `Users_messages_id` INT NOT NULL ,
  `job_applications_id` INT NOT NULL ,
  `job_applications_Jobs_id` INT NOT NULL ,
  `job_applications_Users_id` INT NOT NULL ,
  `job_applications_Users_Jobs_id` INT NOT NULL ,
  PRIMARY KEY (`id`, `Users_id`, `Users_Jobs_id`, `Users_job_refferal_id`, `Users_payments_id`, `Users_notifications_id`, `Users_package_id1`, `Users_messages_id`, `job_applications_id`, `job_applications_Jobs_id`, `job_applications_Users_id`, `job_applications_Users_Jobs_id`) ,
  INDEX `fk_messages_Users` (`Users_id` ASC, `Users_Jobs_id` ASC, `Users_job_refferal_id` ASC, `Users_payments_id` ASC, `Users_notifications_id` ASC, `Users_package_id1` ASC, `Users_messages_id` ASC) ,
  INDEX `fk_messages_job_applications` (`job_applications_id` ASC, `job_applications_Jobs_id` ASC, `job_applications_Users_id` ASC, `job_applications_Users_Jobs_id` ASC) ,
  CONSTRAINT `fk_messages_Users`
    FOREIGN KEY (`Users_id` , `Users_Jobs_id` , `Users_job_refferal_id` , `Users_payments_id` , `Users_notifications_id` , `Users_package_id1` , `Users_messages_id` )
    REFERENCES `mydb`.`Users` (`id` , `Jobs_id` , `job_refferal_id` , `payments_id` , `notifications_id` , `package_id1` , `messages_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_messages_job_applications`
    FOREIGN KEY (`job_applications_id` , `job_applications_Jobs_id` , `job_applications_Users_id` , `job_applications_Users_Jobs_id` )
    REFERENCES `mydb`.`job_applications` (`id` , `Jobs_id` , `Users_id` , `Users_Jobs_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Users` (
  `id` INT NOT NULL ,
  `user_type` VARCHAR(45) NULL ,
  `user_role` VARCHAR(45) NULL ,
  `first_name` VARCHAR(255) NULL ,
  `last_name` VARCHAR(255) NULL ,
  `email` VARCHAR(45) NULL ,
  `username` VARCHAR(45) NULL ,
  `phone` VARCHAR(45) NULL ,
  `postal_code` VARCHAR(45) NULL ,
  `address_1` TEXT NULL ,
  `address_2` TEXT NULL ,
  `state` VARCHAR(45) NULL ,
  `city` VARCHAR(45) NULL ,
  `country` VARCHAR(45) NULL ,
  `emp_position` VARCHAR(45) NULL ,
  `emp_industry` VARCHAR(45) NULL ,
  `emp_company_name` VARCHAR(45) NULL ,
  `profile_complted_steps` INT NULL ,
  `profile_completed_percentage` VARCHAR(45) NULL ,
  `user_ranking` INT NULL ,
  `status` INT NULL ,
  `created` TIMESTAMP NULL ,
  `package_id` INT NULL ,
  `update` TIMESTAMP NULL ,
  `last_login` TIMESTAMP NULL ,
  `Jobs_id` INT NOT NULL ,
  `job_refferal_id` INT NOT NULL ,
  `payments_id` INT NOT NULL ,
  `notifications_id` INT NOT NULL ,
  `package_id1` INT NOT NULL ,
  `messages_id` INT NOT NULL ,
  PRIMARY KEY (`id`, `Jobs_id`, `job_refferal_id`, `payments_id`, `notifications_id`, `package_id1`, `messages_id`) ,
  INDEX `fk_Users_Jobs` (`Jobs_id` ASC) ,
  INDEX `fk_Users_job_refferal` (`job_refferal_id` ASC) ,
  INDEX `fk_Users_payments` (`payments_id` ASC) ,
  INDEX `fk_Users_notifications` (`notifications_id` ASC) ,
  INDEX `fk_Users_package` (`package_id1` ASC) ,
  INDEX `fk_Users_messages` (`messages_id` ASC) ,
  CONSTRAINT `fk_Users_Jobs`
    FOREIGN KEY (`Jobs_id` )
    REFERENCES `mydb`.`Jobs` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Users_job_refferal`
    FOREIGN KEY (`job_refferal_id` )
    REFERENCES `mydb`.`job_refferal` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Users_payments`
    FOREIGN KEY (`payments_id` )
    REFERENCES `mydb`.`payments` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Users_notifications`
    FOREIGN KEY (`notifications_id` )
    REFERENCES `mydb`.`notifications` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Users_package`
    FOREIGN KEY (`package_id1` )
    REFERENCES `mydb`.`package` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Users_messages`
    FOREIGN KEY (`messages_id` )
    REFERENCES `mydb`.`messages` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = Falcon;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
