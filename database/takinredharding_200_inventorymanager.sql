-- Adminer 4.8.4 MySQL 8.0.39-0ubuntu0.22.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` tinyint NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1,	'clothing',	'wearable items'),
(2,	'Minor furniture',	'Furniture smaller than 2x2x2 metres'),
(8,	'Major furniture',	'Furniture larger than 2x2x2 metres'),
(10,	'Major furniture',	'Furniture larger than 2x2x2 metres'),
(11,	'Party gear',	'items that can be used for parties');

DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `id` tinyint NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `category` tinyint NOT NULL,
  PRIMARY KEY (`name`),
  UNIQUE KEY `id` (`id`),
  KEY `category` (`category`),
  CONSTRAINT `items_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `items` (`id`, `name`, `description`, `category`) VALUES
(18,	'Sunglasses',	'shaded glasses to keep the sun out of your face',	1),
(25,	'White plastic chair',	'Simple, stackable design - very common',	2);

-- 2024-09-01 22:49:50
