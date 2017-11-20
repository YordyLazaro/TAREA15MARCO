/*
SQLyog Enterprise - MySQL GUI v8.12 
MySQL - 5.5.8-log : Database - baseconocimiento
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`baseconocimiento` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `baseconocimiento`;

/*Table structure for table `enfermedad` */

DROP TABLE IF EXISTS `enfermedad`;

CREATE TABLE `enfermedad` (
  `id_enfer` int(5) NOT NULL,
  `nom_enfer` varchar(30) DEFAULT NULL,
  `desc_enfer` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_enfer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `enfermedad` */

insert  into `enfermedad`(`id_enfer`,`nom_enfer`,`desc_enfer`) values (1,'Leucemia','Es un Cancer de Globulos Blancos, los cuales Ayudan a su Organismo a combatir las Infecciones.'),(2,'Porfiria','Grupos de Trastornos Provocados por deficienciencia de las Enzimas implicadas en las Sintesis del Hem.'),(3,'Pancreatitis','Inflamacion del Pancreas. Esto ocurre Cuando las Enzimas Pancreaticas que dirigen la comida se activan en el Pancreas en lugar de hacerlo en el Intestino Delgado.'),(4,'Apendicitis','Consiste en la Inflamacion del Apendice y no siempre presenta sintomas claros, por lo que aveces se confunde con otras Afecciones.'),(5,'Otitis','Es una Afeccion muy Frecuente en la Infancia, habitualmente Evoluciona sin Complicaciones, Pero la Inflamacion del Oido medio pude Ser Cronica.'),(6,'Rinitis','Es un Trastorno que Afecta a las Mucosa Nasal y se Caracteriza por un Incremento de las Secresiones Nasales.');

/*Table structure for table `sintoma` */

DROP TABLE IF EXISTS `sintoma`;

CREATE TABLE `sintoma` (
  `id_sint` int(5) NOT NULL,
  `nom_sint` varchar(100) DEFAULT NULL,
  `id_enfer` int(5) DEFAULT NULL,
  PRIMARY KEY (`id_sint`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sintoma` */

insert  into `sintoma`(`id_sint`,`nom_sint`,`id_enfer`) values (1,'Cansancio',1),(2,'Falta de Apetito',1),(3,'Perdida de Peso',1),(4,'Dolores Articulares y Oseos',1),(5,'Hemorragias en la Piel o las Mucosas',1),(6,'Colicos o Dolor Abdominal',2),(7,'Dolor Muscular',2),(8,'Entumecimiento u Hormigueo',2),(9,'Cambios de Personalidad',2),(10,'Dolor en Brazos y Piernas',2),(11,'Dolor Abdominal',3),(12,'Heces Color Arcilla',3),(13,'Llenura Abdominal por Gases',3),(14,'Leve Coloracion Amarillenta de la Piel y los Ojos',3),(15,'Erupcion o Ulcera',3),(16,'Dolor Alrededor del Ombligo',4),(17,'Nauseas',4),(18,'Fiebre Baja',4),(19,'Escalofrios y Temblores',4),(20,'Diarrea',4),(21,'Sensacion de Taponamiento Auricular',5),(22,'Dolor de Oido',5),(23,'Vomito',5),(24,'Autofonia',5),(25,'Falta de Apetito',5),(26,'Picazon en la Nariz, la Boca, los Ojos, la Garganta, la Piel o en Cualquier area',6),(27,'Estornudos',6),(28,'Congestion Nasal',6),(29,'Oidos Tapados y Disminucion del Sentido del Olfato',6),(30,'Hinchazon Debajo de los Ojos',6);

/*Table structure for table `tratamiento` */

DROP TABLE IF EXISTS `tratamiento`;

CREATE TABLE `tratamiento` (
  `id_trat` int(5) NOT NULL,
  `desc_trat` varchar(150) DEFAULT NULL,
  `id_enfer` int(5) DEFAULT NULL,
  `tipaciente` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_trat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tratamiento` */

insert  into `tratamiento`(`id_trat`,`desc_trat`,`id_enfer`,`tipaciente`) values (1,'Terapia de Induccion, Terapia de Consolidacion e Intensificacion y Terapia de Mantenimiento',1,'Niños'),(2,'Feblotomia(Extraer 500 mililitros de Sangre cada 1 o 2 Semanas)',2,'Niños y Adultos'),(3,'Antibioticos',3,'Adultos'),(4,'Cirugia',4,'Adultos'),(5,'AntiInflamtorios y Analgesicos (Paracetamol, Ibuprofeno) Durante Periodos Cortos',5,'Niños'),(6,'Paracentesis Timpanica (Consite en Extraer el Liquido del Interior del Oido) ',5,'Adultos'),(7,'Quimoterapias',1,'Adultos');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
