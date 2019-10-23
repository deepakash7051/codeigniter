-- ---------------------------------------
-- tbl_question_type
-- ---------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_question_type` (
  `id` INT  AUTO_INCREMENT ,
  `ques_type` VARCHAR(250) NOT NULL ,
  `created_on` timestamp default '0000-00-00 00:00:00', 
  `updated_on` timestamp default now() on update now(), 
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

-- ---------------------------------------
-- tbl_question
-- ---------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_question` (
  `id` INT  AUTO_INCREMENT ,
  `question` VARCHAR(250) NOT NULL ,
  `ques_type_id` INT(11),
  `created_on` timestamp default '0000-00-00 00:00:00', 
  `updated_on` timestamp default now() on update now(), 
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

-- ---------------------------------------
-- tbl_user
-- ---------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_user` (
	`id` INT AUTO_INCREMENT ,
	`username` VARCHAR(100) NOT NULL ,
	`password` VARCHAR(250) NOT NULL ,
	`created_on` timestamp default '0000-00-00 00:00:00', 
	`updated_on` timestamp default now() on update now(),
	PRIMARY KEY (`id`))
ENGINE = InnoDB;

-- ---------------------------------------
-- tbl_employee
-- ---------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_employee` (
	`id` INT AUTO_INCREMENT ,
	`name` VARCHAR(100) NOT NULL ,
	`gender` VARCHAR(100) NOT NULL ,
	`designation` VARCHAR(100) NOT NULL ,
	`address` VARCHAR(200) NOT NULL ,
	`age` VARCHAR(100) NOT NULL ,
	`created_on` timestamp, 
	`updated_on` timestamp default now() on update now(),
	PRIMARY KEY (`id`))
ENGINE = InnoDB;
