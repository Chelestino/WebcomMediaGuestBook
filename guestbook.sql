--
-- Скрипт сгенерирован Devart dbForge Studio for MySQL, Версия 6.3.323.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 27.06.2015 20:20:41
-- Версия сервера: 5.6.22-log
-- Версия клиента: 4.1
--


-- 
-- Отключение внешних ключей
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Установить режим SQL (SQL mode)
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- Установка кодировки, с использованием которой клиент будет посылать запросы на сервер
--
SET NAMES 'utf8';

-- 
-- Установка базы данных по умолчанию
--
USE guestbook;

--
-- Описание для таблицы messages
--
DROP TABLE IF EXISTS messages;
CREATE TABLE messages (
  message_id INT(11) NOT NULL AUTO_INCREMENT,
  added DATETIME DEFAULT NULL,
  update_message DATETIME DEFAULT NULL,
  user_message VARCHAR(255) NOT NULL,
  user VARCHAR(255) NOT NULL,
  media VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (message_id)
)
ENGINE = INNODB
AUTO_INCREMENT = 28
AVG_ROW_LENGTH = 1260
CHARACTER SET utf8
COLLATE utf8_unicode_ci;

-- 
-- Восстановить предыдущий режим SQL (SQL mode)
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Включение внешних ключей
-- 
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;