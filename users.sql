-- execute this in the wanted database to create the table

CREATE TABLE `test`.`users` ( `id` INT(255) NOT NULL AUTO_INCREMENT , `username` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`), UNIQUE (`username`)) ENGINE = InnoDB; 