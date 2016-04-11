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

insert  into `eventos`(`id`,`evento_nombre`,`evento_lugar`,`evento_fecha`,`evento_hora`,`evento_cupo`,`evento_observaciones`,`created_at`,`updated_at`,`deleted_at`) values (1,'Queen: \"Una noche en Bohemia\"','Cinemark Bolivia Santa Cruz de la Sierra, Bolivia','04/16/2016 10:38 PM','23:15','300','Ahora tendrás la oportunidad de ver el monumental concierto de 1975 en Londres y el documental nunca antes visto que profundiza la historia de Queen. Presenta entrevistas recién descubiertas con los cuatro miembros de la banda, grabaciones de actuaciones en vivo y mucho más. \r\nQueen: \"Una Noche en Bohemia\", especialmente restaurado y re-mezclado para la pantalla grande.','2016-04-11 20:38:51','2016-04-11 20:38:51',NULL);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`migration`,`batch`) values ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2016_04_10_190215_create_eventos_table',1),('2016_04_10_192216_create_relacion_evento_relacionadors_table',1),('2016_04_10_192239_create_relacion_evento_invitados_table',1),('2016_04_10_192315_create_relacion_relacionador_invitados_table',1),('2016_04_11_084026_add_deleted_to_eventos_table',1),('2016_04_11_185053_add_deleted_to_users_table',2);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `relacion_relacionador_invitados` */

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
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`apellidos`,`ci`,`nroCelular`,`fechanac`,`sexo`,`email`,`usuario`,`password`,`tipo`,`estado`,`remember_token`,`created_at`,`updated_at`,`deleted_at`) values (6,'Claudios','Vargas Saavedra','3627592','75666223','0000-00-00','Masculino','klaudiocvs@gmail.com','iClaudioVargas','$2y$10$WMdzdx//Qo9kUQZJAE1A2ep7OWns1DAHS1vz7jmQ.58wFvTiKbptO','Relacionador','1',NULL,'2016-04-11 18:03:15','2016-04-11 19:02:32','2016-04-11 19:02:32'),(7,'Daniela','Ondarza','3627592','75666223','0000-00-00','','daniela@fake.com','iDaniela','$2y$10$kEEfTZx/YB5dpdnu6Mmiu.yUi8XmLEQFk1RjPUa1XE7SkQ/ch4rv2','Relacionador','1','uamcypRdKsHg3DXiVVnPFNIWoLUvx3u049rfsgFnHxsfEsnaqEVeryNK3buN','2016-04-11 18:46:19','2016-04-11 21:50:01',NULL),(8,'Gledis','Cortez','9876542','12354648','0000-00-00','Feminino','gldedis@fake.com','iGledis','$2y$10$kEEfTZx/YB5dpdnu6Mmiu.yUi8XmLEQFk1RjPUa1XE7SkQ/ch4rv2','Administrador','1','UBplccq5hLJMcjLm9wXOe3SZEjwZa9FoBs1TC2F7nA3yUEZqfdCW263QESIF','2016-04-11 18:46:19','2016-04-11 21:50:34',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
