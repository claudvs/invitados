/*
SQLyog Community v12.06 (64 bit)
MySQL - 5.1.47-community : Database - db_invitados
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_invitados` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_invitados`;

/*Table structure for table `eventos` */

DROP TABLE IF EXISTS `eventos`;

CREATE TABLE `eventos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `evento_nombre` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `evento_lugar` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `evento_fecha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `evento_hora` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `evento_cupo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `evento_observaciones` varchar(600) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `eventos` */

LOCK TABLES `eventos` WRITE;

insert  into `eventos`(`id`,`evento_nombre`,`evento_lugar`,`evento_fecha`,`evento_hora`,`evento_cupo`,`evento_observaciones`,`created_at`,`updated_at`,`deleted_at`) values (1,'Claudio','Cañoto','04/19/2016 6:02 AM','02:10','22222','afs','2016-04-18 10:02:27','2016-04-18 10:02:27',NULL);

UNLOCK TABLES;

/*Table structure for table `invitados_eventos` */

DROP TABLE IF EXISTS `invitados_eventos`;

CREATE TABLE `invitados_eventos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `evento_id` int(10) unsigned NOT NULL,
  `invitado_id` int(10) unsigned NOT NULL,
  `relacionador_id` int(10) unsigned NOT NULL,
  `estado` enum('0','1','2') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invitados_eventos_evento_id_foreign` (`evento_id`),
  KEY `invitados_eventos_invitado_id_foreign` (`invitado_id`),
  KEY `invitados_eventos_relacionador_id_foreign` (`relacionador_id`),
  CONSTRAINT `invitados_eventos_relacionador_id_foreign` FOREIGN KEY (`relacionador_id`) REFERENCES `users` (`id`),
  CONSTRAINT `invitados_eventos_evento_id_foreign` FOREIGN KEY (`evento_id`) REFERENCES `eventos` (`id`),
  CONSTRAINT `invitados_eventos_invitado_id_foreign` FOREIGN KEY (`invitado_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `invitados_eventos` */

LOCK TABLES `invitados_eventos` WRITE;

insert  into `invitados_eventos`(`id`,`evento_id`,`invitado_id`,`relacionador_id`,`estado`,`created_at`,`updated_at`) values (2,1,3,5,'0','2016-04-18 10:54:47','2016-04-18 10:54:47');

UNLOCK TABLES;

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `migrations` */

LOCK TABLES `migrations` WRITE;

insert  into `migrations`(`migration`,`batch`) values ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2016_04_10_190215_create_eventos_table',1),('2016_04_10_192216_create_relacion_evento_relacionadors_table',1),('2016_04_10_192239_create_relacion_evento_invitados_table',1),('2016_04_10_192315_create_relacion_relacionador_invitados_table',1),('2016_04_11_084026_add_deleted_to_eventos_table',1),('2016_04_11_185053_add_deleted_to_users_table',1),('2016_04_12_205959_create_invitados_eventos_table',1);

UNLOCK TABLES;

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `password_resets` */

LOCK TABLES `password_resets` WRITE;

UNLOCK TABLES;

/*Table structure for table `relacion_evento_invitados` */

DROP TABLE IF EXISTS `relacion_evento_invitados`;

CREATE TABLE `relacion_evento_invitados` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `evento_id` int(10) unsigned NOT NULL,
  `invitado_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `relacion_evento_invitados_evento_id_foreign` (`evento_id`),
  KEY `relacion_evento_invitados_invitado_id_foreign` (`invitado_id`),
  CONSTRAINT `relacion_evento_invitados_invitado_id_foreign` FOREIGN KEY (`invitado_id`) REFERENCES `users` (`id`),
  CONSTRAINT `relacion_evento_invitados_evento_id_foreign` FOREIGN KEY (`evento_id`) REFERENCES `eventos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `relacion_evento_invitados` */

LOCK TABLES `relacion_evento_invitados` WRITE;

UNLOCK TABLES;

/*Table structure for table `relacion_evento_relacionadors` */

DROP TABLE IF EXISTS `relacion_evento_relacionadors`;

CREATE TABLE `relacion_evento_relacionadors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `evento_id` int(10) unsigned NOT NULL,
  `relacionador_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `relacion_evento_relacionadors_evento_id_foreign` (`evento_id`),
  KEY `relacion_evento_relacionadors_relacionador_id_foreign` (`relacionador_id`),
  CONSTRAINT `relacion_evento_relacionadors_relacionador_id_foreign` FOREIGN KEY (`relacionador_id`) REFERENCES `users` (`id`),
  CONSTRAINT `relacion_evento_relacionadors_evento_id_foreign` FOREIGN KEY (`evento_id`) REFERENCES `eventos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `relacion_evento_relacionadors` */

LOCK TABLES `relacion_evento_relacionadors` WRITE;

UNLOCK TABLES;

/*Table structure for table `relacion_relacionador_invitados` */

DROP TABLE IF EXISTS `relacion_relacionador_invitados`;

CREATE TABLE `relacion_relacionador_invitados` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `relacionador_id` int(10) unsigned NOT NULL,
  `invitado_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `relacion_relacionador_invitados_relacionador_id_foreign` (`relacionador_id`),
  KEY `relacion_relacionador_invitados_invitado_id_foreign` (`invitado_id`),
  CONSTRAINT `relacion_relacionador_invitados_invitado_id_foreign` FOREIGN KEY (`invitado_id`) REFERENCES `users` (`id`),
  CONSTRAINT `relacion_relacionador_invitados_relacionador_id_foreign` FOREIGN KEY (`relacionador_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `relacion_relacionador_invitados` */

LOCK TABLES `relacion_relacionador_invitados` WRITE;

insert  into `relacion_relacionador_invitados`(`id`,`relacionador_id`,`invitado_id`,`created_at`,`updated_at`) values (4,5,3,'2016-04-18 10:10:17','2016-04-18 10:10:17'),(5,5,3,'2016-04-18 10:54:47','2016-04-18 10:54:47');

UNLOCK TABLES;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ci` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nroCelular` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fechanac` date NOT NULL,
  `sexo` enum('Masculino','Feminino') COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` enum('Administrador','Relacionador','Invitado') COLLATE utf8_unicode_ci NOT NULL,
  `estado` enum('0','1','2') COLLATE utf8_unicode_ci NOT NULL,
  `codigo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `facebook_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

LOCK TABLES `users` WRITE;

insert  into `users`(`id`,`name`,`apellidos`,`ci`,`nroCelular`,`fechanac`,`sexo`,`email`,`usuario`,`password`,`tipo`,`estado`,`codigo`,`facebook_id`,`remember_token`,`created_at`,`updated_at`,`deleted_at`) values (3,'Claud Saavedra','Vargas','','75666223','0000-00-00','Masculino','cvs_3000@hotmail.com','','','Invitado','1','','10154115712297878',NULL,'2016-04-18 09:08:30','2016-04-18 10:54:47',NULL),(4,'','','','','0000-00-00','Masculino','','iAlfa','$2y$10$loZf/f1y8YgjwXe1vDkh7.QPa36W0rITNusuj8fljMhYehjKxnThS','Administrador','1','','',NULL,'2016-04-18 09:26:34','2016-04-18 09:26:34',NULL),(5,'Claudio','Vargas Saavedra','3627592','75666223','0000-00-00','Masculino','klaudiocvs@gmail.com','iClaudio','$2y$10$GU048GI.wPo.aGWphhusJeZnrkH5kqD3BwHok/I3vG.v0GZrz7Mny','Relacionador','1','4212737','',NULL,'2016-04-18 09:27:17','2016-04-18 09:27:17',NULL);

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
