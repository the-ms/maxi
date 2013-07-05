-- Adminer 3.1.0 MySQL dump

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = 'SYSTEM';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `maxi` /*!40100 DEFAULT CHARACTER SET cp1251 */;
USE `maxi`;

DROP TABLE IF EXISTS `module_cats`;
CREATE TABLE `module_cats` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `date` date NOT NULL DEFAULT '0000-00-00',
  `access` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `rate` int(10) unsigned NOT NULL DEFAULT '350',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `module_cats` (`id`, `title`, `text`, `image`, `file`, `date`, `access`, `rate`) VALUES
(3,	'Рубрика',	'',	'3.jpg',	'P6230002.JPG',	'2009-06-27',	1,	350);

DROP TABLE IF EXISTS `module_comments`;
CREATE TABLE `module_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `item` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `user` int(10) unsigned NOT NULL,
  `ip` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `date` date NOT NULL DEFAULT '0000-00-00',
  `access` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `module_comments` (`id`, `text`, `item`, `name`, `email`, `user`, `ip`, `date`, `access`) VALUES
(1,	'коммент',	'5',	'вася',	'ms@ensk.ru',	1,	'127.0.0.1',	'2009-06-27',	1),
(2,	'коммент',	'6',	'петя',	'',	0,	'127.0.0.1',	'2009-06-27',	1),
(3,	'23',	'7',	'3',	'',	0,	'127.0.0.1',	'2009-06-27',	1),
(4,	'3',	'7',	'4',	'',	0,	'127.0.0.1',	'2009-06-27',	1);

DROP TABLE IF EXISTS `module_items`;
CREATE TABLE `module_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `cat` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `price` int(10) unsigned NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `icq` int(10) unsigned NOT NULL DEFAULT '0',
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `zip` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `occupation` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `user` int(10) unsigned NOT NULL,
  `ip` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `date` date NOT NULL DEFAULT '0000-00-00',
  `access` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `rate` int(10) unsigned NOT NULL DEFAULT '350',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `module_items` (`id`, `title`, `text`, `cat`, `price`, `image`, `file`, `name`, `phone`, `icq`, `url`, `email`, `city`, `zip`, `address`, `company`, `occupation`, `user`, `ip`, `date`, `access`, `rate`) VALUES
(3,	'21',	'',	'1',	0,	'3.jpg',	'P6230002.JPG',	'',	'',	0,	'',	'ms@ensk.ru',	'',	'',	'',	'',	'',	1,	'127.0.0.1',	'2009-06-27',	1,	350),
(5,	'1',	'текст',	'3',	0,	'5.jpg',	'P6230004.JPG',	'',	'',	0,	'',	'ms@ensk.ru',	'',	'',	'фафаф',	'',	'',	1,	'127.0.0.1',	'2009-06-27',	1,	350),
(6,	'2',	'',	'3',	0,	'',	'',	'',	'',	0,	'',	'',	'',	'',	'',	'',	'',	0,	'127.0.0.1',	'2009-06-27',	1,	350),
(7,	'3',	'',	'3',	0,	'7.jpg',	'',	'',	'',	0,	'',	'',	'',	'',	'',	'',	'',	0,	'127.0.0.1',	'2009-06-27',	1,	350),
(8,	'5',	'',	'3',	0,	'',	'',	'',	'',	0,	'',	'',	'',	'',	'',	'',	'',	0,	'127.0.0.1',	'2009-06-27',	1,	350),
(9,	'заголовок',	'тек\r\nст',	'3',	0,	'',	'',	'',	'',	0,	'',	'',	'',	'',	'',	'',	'',	0,	'0',	'0000-00-00',	1,	350),
(10,	'нуе',	'',	'3',	0,	'',	'',	'',	'',	0,	'',	'',	'',	'',	'',	'',	'',	0,	'0',	'0000-00-00',	1,	350),
(11,	'ttt',	't',	'',	0,	'',	'',	'',	'',	0,	'',	'',	'',	'',	'',	'',	'',	0,	'0',	'0000-00-00',	1,	350);

DROP TABLE IF EXISTS `users_items`;
CREATE TABLE `users_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `gender` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `icq` int(10) unsigned NOT NULL DEFAULT '0',
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `zip` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `occupation` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ip` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `date` date NOT NULL DEFAULT '0000-00-00',
  `access` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `users_items` (`id`, `title`, `password`, `text`, `image`, `name`, `gender`, `birthday`, `phone`, `icq`, `url`, `email`, `city`, `zip`, `address`, `company`, `occupation`, `ip`, `date`, `access`) VALUES
(1,	'user',	'c81e728d9d4c2f636f067f89cc14862c',	'www',	'',	'',	'1',	'2009-06-27',	'',	0,	'',	'',	'',	'',	'',	'',	'',	'127.0.0.1',	'2009-06-27',	1);

-- 2013-07-05 10:53:28
