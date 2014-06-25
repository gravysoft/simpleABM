/*
SQLyog Ultimate v11.11 (32 bit)
MySQL - 5.6.15 : Database - testLoco
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`testLoco` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `testLoco`;

/*Table structure for table `Categoria` */

DROP TABLE IF EXISTS `Categoria`;

CREATE TABLE `Categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `Categoria` */

insert  into `Categoria`(`id`,`nombre`) values (1,'cat2'),(4,'cat1');

/*Table structure for table `Producto` */

DROP TABLE IF EXISTS `Producto`;

CREATE TABLE `Producto` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `costo` float DEFAULT NULL,
  `descuento` float DEFAULT NULL,
  `recargo` float DEFAULT NULL,
  `precio_sugerido` float DEFAULT NULL,
  `stock` varchar(45) DEFAULT NULL,
  `categoria` varchar(45) DEFAULT NULL,
  `subcategoria` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `Producto` */

insert  into `Producto`(`id_producto`,`nombre`,`descripcion`,`costo`,`descuento`,`recargo`,`precio_sugerido`,`stock`,`categoria`,`subcategoria`) values (1,'prod1','desc',18.1,5,1,14.1,'10','cat1','subcat1'),(3,'prod2','desc2',18.5,4.5,2,16,'8','cat1','subcat1');

/*Table structure for table `SubCategoria` */

DROP TABLE IF EXISTS `SubCategoria`;

CREATE TABLE `SubCategoria` (
  `id_subcat` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nombre_subcat` varchar(20) DEFAULT NULL,
  `id_categoria` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_subcat`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `SubCategoria` */

insert  into `SubCategoria`(`id_subcat`,`nombre_subcat`,`id_categoria`) values (7,'subcat5',1),(8,'subcat6',1),(10,'catAlan',4);

/*Table structure for table `Usuario` */

DROP TABLE IF EXISTS `Usuario`;

CREATE TABLE `Usuario` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `_nombre` varchar(45) DEFAULT NULL,
  `_email` varchar(45) DEFAULT NULL,
  `_pass` varchar(45) DEFAULT NULL,
  `_level` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*Data for the table `Usuario` */

insert  into `Usuario`(`_id`,`_nombre`,`_email`,`_pass`,`_level`) values (1,'admin','admin@admin.com','86f7e437faa5a7fce15d1ddcb9eaeaea377667b8','admin'),(2,'alan','alan@alan.com','ca7626314d8325763d3d21bd61f12349dd39652c','usuario'),(4,'usuario','usuario@asd.com','da39a3ee5e6b4b0d3255bfef95601890afd80709','admin'),(5,'prueba1','prueba1update@asd.com','da39a3ee5e6b4b0d3255bfef95601890afd80709','admin'),(6,'prueba2','asdupdate@asd.com','da39a3ee5e6b4b0d3255bfef95601890afd80709','admin'),(10,'prueba3update','asd@asd.com','da39a3ee5e6b4b0d3255bfef95601890afd80709','admin'),(20,'pruebaValidate','asd@asd.com','86f7e437faa5a7fce15d1ddcb9eaeaea377667b8','admin');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
