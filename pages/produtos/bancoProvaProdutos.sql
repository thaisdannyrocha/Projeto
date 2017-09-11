/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.6.15-log : Database - prova
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`prova` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `prova`;

/*Table structure for table `itemvenda` */

DROP TABLE IF EXISTS `itemvenda`;

CREATE TABLE `itemvenda` (
  `codigoVenda` int(11) NOT NULL,
  `codigoProduto` int(11) NOT NULL,
  `quantidade` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigoVenda`,`codigoProduto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `itemvenda` */

insert  into `itemvenda`(`codigoVenda`,`codigoProduto`,`quantidade`) values (1,2,12),(1,4,5),(1,3,3),(1,1,6),(2,1,23),(3,5,3),(3,4,4);

/*Table structure for table `produto` */

DROP TABLE IF EXISTS `produto`;

CREATE TABLE `produto` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `produto` */

insert  into `produto`(`codigo`,`nome`) values (1,'Diafragma regular D220'),(2,'Ferragem reflexiva F2332'),(3,'Sorvedor 556'),(4,'Seringa estética 2234'),(5,'Televisão Dt200');

/*Table structure for table `venda` */

DROP TABLE IF EXISTS `venda`;

CREATE TABLE `venda` (
  `codigo` int(11) NOT NULL,
  `data` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `venda` */

insert  into `venda`(`codigo`,`data`,`status`) values (1,'2015-11-13 20:28:24',1),(2,'2015-11-14 11:07:40',1),(3,'2015-11-14 11:48:30',1),(4,'2015-11-14 12:18:37',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
