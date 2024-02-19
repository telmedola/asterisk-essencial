-- MariaDB dump 10.18  Distrib 10.5.8-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: asterisk
-- ------------------------------------------------------
-- Server version	10.5.8-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS asterisk;
use asterisk;

--
-- Table structure for table `cdr`
--

DROP TABLE IF EXISTS `cdr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cdr` (
  `calldate` datetime DEFAULT CURRENT_TIMESTAMP,
  `clid` varchar(100) DEFAULT NULL,
  `src` varchar(100) DEFAULT NULL,
  `dst` varchar(100) DEFAULT NULL,
  `dcontext` varchar(100) DEFAULT NULL,
  `channel` varchar(100) DEFAULT NULL,
  `dstchannel` varchar(100) DEFAULT NULL,
  `lastapp` varchar(100) DEFAULT NULL,
  `lastdata` varchar(100) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `billsec` int(11) DEFAULT NULL,
  `disposition` varchar(45) DEFAULT NULL,
  `amaflags` varchar(50) DEFAULT NULL,
  `accountcode` varchar(100) DEFAULT NULL,
  `userfield` varchar(100) DEFAULT NULL,
  `uniqueid` varchar(100) DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `answer` datetime DEFAULT NULL,
  KEY `calldate` (`calldate`),
  KEY `uniqueid` (`uniqueid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cdr`
--

LOCK TABLES `cdr` WRITE;
/*!40000 ALTER TABLE `cdr` DISABLE KEYS */;
/*!40000 ALTER TABLE `cdr` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

create table clientes(id integer,nome varchar(100),documento varchar(14), atraso integer);

insert into clientes(id,nome,documento,atraso) values (1,'CLIENTE UM','123456',0);
insert into clientes(id,nome,documento,atraso) values (2,'CLIENTE DOIS','654321',1);

-- Dump completed on 2020-11-25 10:34:57
