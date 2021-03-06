DROP DATABASE IF EXISTS `shared_gallery`;

CREATE DATABASE IF NOT EXISTS `shared_gallery`;

USE `shared_gallery`;

DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `images`;

CREATE TABLE `users`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(255) UNIQUE NOT NULL,
    `email` VARCHAR(255) UNIQUE NOT NULL,
    `password` CHAR(60) NOT NULL,
    `streetAddress` VARCHAR(255) NOT NULL,
    `city` VARCHAR(255) NOT NULL,
    `country` VARCHAR(255) NOT NULL,
    `postcode` VARCHAR(255) NOT NULL,
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL
)   ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_UNICODE_CI;

CREATE TABLE `images`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `path` VARCHAR(255) NOT NULL,
    `thumbnailPath` VARCHAR(255) NOT NULL,
    `size` INT NOT NULL,
    `uploadedAt` DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
    `uploaderId` INT UNSIGNED NOT NULL
)   ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_UNICODE_CI;

ALTER TABLE `images` ADD FOREIGN KEY (`uploaderId`) REFERENCES `users`(`id`) ON DELETE CASCADE;