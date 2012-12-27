CREATE TABLE `book` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `isbn` varchar(15) NOT NULL,
  `title` varchar(96) NOT NULL,
  `publisher` varchar(64) NOT NULL,
  `page` int(4) unsigned NOT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `IDX_book_isbn` (`isbn`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `book` VALUES
    (1,'1234567891','Book 1','O\'reilly',456,'No description'),
    (2,'2345678901234','Book 2','Approx',689,'Book 2 description'),
    (3,'0987654321','Book 3','O\'reilly',589,'Nothing');
