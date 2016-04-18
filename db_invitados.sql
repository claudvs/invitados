/*
SQLyog Community v12.09 (64 bit)
MySQL - 5.1.72-community : Database - db_invitados
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

insert  into `eventos`(`id`,`evento_nombre`,`evento_lugar`,`evento_fecha`,`evento_hora`,`evento_cupo`,`evento_observaciones`,`created_at`,`updated_at`,`deleted_at`) values (1,'Celinas','Cañoto','04/29/2016 5:22 PM','18:25','300','Urbanizaciones','2016-04-18 15:23:17','2016-04-18 15:23:17',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `invitados_eventos` */

insert  into `invitados_eventos`(`id`,`evento_id`,`invitado_id`,`relacionador_id`,`estado`,`created_at`,`updated_at`) values (8,1,9,3,'0','2016-04-18 20:27:03','2016-04-18 20:27:03');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`migration`,`batch`) values ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2016_04_10_190215_create_eventos_table',1),('2016_04_10_192216_create_relacion_evento_relacionadors_table',1),('2016_04_10_192239_create_relacion_evento_invitados_table',1),('2016_04_10_192315_create_relacion_relacionador_invitados_table',1),('2016_04_11_084026_add_deleted_to_eventos_table',1),('2016_04_11_185053_add_deleted_to_users_table',1),('2016_04_12_205959_create_invitados_eventos_table',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `relacion_relacionador_invitados` */

insert  into `relacion_relacionador_invitados`(`id`,`relacionador_id`,`invitado_id`,`created_at`,`updated_at`) values (8,3,9,'2016-04-18 20:27:04','2016-04-18 20:27:04');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`apellidos`,`ci`,`nroCelular`,`fechanac`,`sexo`,`email`,`usuario`,`password`,`tipo`,`estado`,`codigo`,`facebook_id`,`remember_token`,`created_at`,`updated_at`,`deleted_at`) values (2,'','','','','0000-00-00','Masculino','','iAlfa','$2y$10$tvtxjjqITLP039BOkVvLAe.gNu60Ib0w24gXMRK3z.KIbdfv70HL6','Administrador','1','0','',NULL,'2016-04-18 15:19:18','2016-04-18 15:19:22',NULL),(3,'Carolina','Ribero','36245678','75644552','0000-00-00','','caro@gmail.com','iCaro','$2y$10$0YClqVYbZTBjmPMxZEXpTegPlP6zDCCyG/N4E9zp/A/HoPEcai0FG','Relacionador','1','3560233','',NULL,'2016-04-18 15:24:26','2016-04-18 15:24:26',NULL),(9,'Claud Saavedra','Fernandez','','75666223','0000-00-00','Masculino','cvs_3000@hotmail.com','','','Invitado','1','0','10154115712297878',NULL,'2016-04-18 20:25:57','2016-04-18 20:27:04',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
