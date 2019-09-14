create database test;

use test;

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `pname` varchar(100) NOT NULL,
  `pdes` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `pquan` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
);