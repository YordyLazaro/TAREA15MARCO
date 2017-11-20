/*
SQLyog Enterprise - MySQL GUI v8.12 
MySQL - 5.0.19-nt : Database - sistemaexperto
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`sistemaexperto` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `sistemaexperto`;

/*Table structure for table `detalletra` */

DROP TABLE IF EXISTS `detalletra`;

CREATE TABLE `detalletra` (
  `id_deta_tra` int(4) NOT NULL,
  `tratamiento` varchar(500) default NULL,
  `id_enfermedad` int(4) NOT NULL,
  `tipoper` varchar(20) default NULL,
  PRIMARY KEY  (`id_deta_tra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `detalletra` */

insert  into `detalletra`(`id_deta_tra`,`tratamiento`,`id_enfermedad`,`tipoper`) values (1,'aaaaaaaaaaaa',1,'niño'),(2,'bbbbbbbbbbbb',1,'adulto'),(3,'cccccccccccc',1,'adulto mayor');

/*Table structure for table `enfermedades` */

DROP TABLE IF EXISTS `enfermedades`;

CREATE TABLE `enfermedades` (
  `id_enfermedad` int(4) NOT NULL,
  `nombre_enfermedad` varchar(30) default NULL,
  PRIMARY KEY  (`id_enfermedad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `enfermedades` */

insert  into `enfermedades`(`id_enfermedad`,`nombre_enfermedad`) values (1,'gripe'),(2,'sdsd');

/*Table structure for table `sintomas` */

DROP TABLE IF EXISTS `sintomas`;

CREATE TABLE `sintomas` (
  `id_sintomas` int(4) NOT NULL,
  `nombre_sintoma` varchar(30) default NULL,
  `id_enfermedad` int(4) NOT NULL,
  PRIMARY KEY  (`id_sintomas`),
  KEY `FK_sintomas` (`id_enfermedad`),
  CONSTRAINT `FK_sintomas` FOREIGN KEY (`id_enfermedad`) REFERENCES `enfermedades` (`id_enfermedad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sintomas` */

insert  into `sintomas`(`id_sintomas`,`nombre_sintoma`,`id_enfermedad`) values (1,'fiebre',1),(2,'tos',1),(3,'dolor de cabeza',1),(4,'aaa',2);

/*Table structure for table `traramiento` */

DROP TABLE IF EXISTS `traramiento`;

CREATE TABLE `traramiento` (
  `id_trata` int(4) NOT NULL,
  `nombre_tra` varchar(30) default NULL,
  `id_emfermedad.` int(4) NOT NULL,
  PRIMARY KEY  (`id_trata`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `traramiento` */

insert  into `traramiento`(`id_trata`,`nombre_tra`,`id_emfermedad.`) values (1,'gripe',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
