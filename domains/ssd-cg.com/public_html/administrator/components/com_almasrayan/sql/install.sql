DROP TABLE IF EXISTS `#__almasrayan_arg`;
CREATE TABLE `#__almasrayan_arg` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`published` tinyint(1) NOT NULL,
	`ordering` int(11) NOT NULL,
	`alias` varchar(255) NOT NULL,
	`name` varchar(255) NOT NULL ,
	`famil` varchar(255) NOT NULL ,
	`mobile` int(11) NOT NULL ,
	`email` varchar(255) NOT NULL ,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;