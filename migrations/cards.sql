CREATE TABLE `cards` (
  `id` int(11) NOT NULL AUTO_INCREMENT ,
  `series` varchar(5) NOT NULL,
  `number` varchar(11) NOT NULL,
  `time_generated` datetime NOT NULL,
  `time_used` datetime DEFAULT NULL,
  `used` tinyint(1) DEFAULT '0',
  `active` tinyint(1) DEFAULT '1',
  `expiration_date` datetime NOT NULL,
  `bonus` int(11) NOT NULL,
  PRIMARY KEY (id)
) ;