use php;
DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
                        `userid` int NOT NULL AUTO_INCREMENT,
                        `email` varchar(50) DEFAULT NULL,
                        `password` char(50) NOT NULL,
                        PRIMARY KEY (`userid`),
                        UNIQUE KEY `userid_UNIQUE` (`userid`),
                        UNIQUE KEY `email_UNIQUE` (`email`)
);

    LOCK TABLES `user` WRITE;

UNLOCK TABLES;

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
                           `productid` int NOT NULL AUTO_INCREMENT,
                           `download-file` varchar(50) DEFAULT NULL,
                           `productname` varchar(45) DEFAULT NULL,
                           PRIMARY KEY (`productid`)
);

LOCK TABLES `product` WRITE;

UNLOCK TABLES;


DROP TABLE IF EXISTS `order`;

CREATE TABLE `order` (
  `orderid` int NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `download-count` int DEFAULT NULL,
  `productid` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`orderid`),
  UNIQUE KEY `orderid_UNIQUE` (`orderid`),
  KEY `productid_idx` (`productid`),
  KEY `userid_idx` (`user_id`),
  CONSTRAINT `productid` FOREIGN KEY (`productid`) REFERENCES `product` (`productid`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`userid`)
);

LOCK TABLES `order` WRITE;

UNLOCK TABLES;




DROP TABLE IF EXISTS `token`;

CREATE TABLE `token` (
  `idtoken` int NOT NULL AUTO_INCREMENT,
  `remember_me` char(50) DEFAULT NULL,
  `userid` int DEFAULT NULL,
  PRIMARY KEY (`idtoken`),
  UNIQUE KEY `idtoken_UNIQUE` (`idtoken`),
  UNIQUE KEY `remember_me_UNIQUE` (`remember_me`),
  KEY `userid_idx` (`userid`),
  CONSTRAINT `userid` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`)
);


LOCK TABLES `token` WRITE;

UNLOCK TABLES;





