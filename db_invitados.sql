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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `eventos` */

insert  into `eventos`(`id`,`evento_nombre`,`evento_lugar`,`evento_fecha`,`evento_hora`,`evento_cupo`,`evento_observaciones`,`created_at`,`updated_at`,`deleted_at`) values (3,'Queen: \"Una noche en Bohemia\".','Cinemark Bolivia Santa Cruz de la Sierra, Bolivia','04/15/2016 7:03 PM','23:30','300','Ahora tendrás la oportunidad de ver el monumental concierto de 1975 en Londres y el documental nunca antes visto que profundiza la historia de Queen. Presenta entrevistas recién descubiertas con los cuatro miembros de la banda, grabaciones de actuaciones en vivo y mucho más. \r\nQueen: \"Una Noche en Bohemia\", especialmente restaurado y re-mezclado para la pantalla grande.','2016-04-13 17:03:53','2016-04-13 17:03:53',NULL),(4,'FÉMINA','	 Hide Map Esquina del Cronopio Colon esq. Lemoine, Santa Cruz de la Sierra, Bolivia','04/16/2016 9:44 PM','23:30','150','Una noche para disfrutar de la pintura , escuchar buena música con Caribru ( Carolina Rivero) y la poesía con Nelly Vázquez.\r\nESTOS CUADROS SON PARTE DE MI BÚSQUEDA , TIENEN LA FIGURA FEMENINA COMO PRINCIPAL MOTIVO Y SIGUEN UN ESTILO GRÁFICO Y EXPRESIVO . ISABEL JORDÁN','2016-04-13 19:44:39','2016-04-13 19:44:39',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `invitados_eventos` */

insert  into `invitados_eventos`(`id`,`evento_id`,`invitado_id`,`relacionador_id`,`estado`,`created_at`,`updated_at`) values (2,3,4,3,'0','2016-04-13 19:13:58','2016-04-13 20:07:01'),(3,3,5,3,'0','2016-04-13 19:17:50','2016-04-13 20:11:17'),(4,4,7,6,'0','2016-04-13 19:48:44','2016-04-13 19:48:44'),(5,3,7,6,'0','2016-04-13 19:48:54','2016-04-13 20:11:42');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `relacion_relacionador_invitados` */

insert  into `relacion_relacionador_invitados`(`id`,`relacionador_id`,`invitado_id`,`created_at`,`updated_at`) values (1,3,4,'2016-04-13 17:11:52','2016-04-13 17:11:52'),(2,3,5,'2016-04-13 19:17:27','2016-04-13 19:17:27'),(3,6,7,'2016-04-13 19:48:32','2016-04-13 19:48:32');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`apellidos`,`ci`,`nroCelular`,`fechanac`,`sexo`,`email`,`usuario`,`password`,`tipo`,`estado`,`remember_token`,`created_at`,`updated_at`,`deleted_at`) values (1,'Alfa','','','','0000-00-00','Masculino','','iAlfa','$2y$10$IacP7Fs7VNIx2VACDnIpD.3ixJfFSZkigauhMjmrZ2FpZgZPWzUEu','Administrador','1',NULL,NULL,NULL,NULL),(3,'Claudio','Vargas Saavedra','3627592','75666223','0000-00-00','Masculino','klaudiocvs@gmaild.com','iClaudio','$2y$10$l7XyHnk/hzwDbF0yg4Tc6.vsLHNAmCGjKfrZZj/HprSJrurHY1MzS','Relacionador','1','ptt7czrtWqKnTOEECgN9WVYLqVDk8ytBNd8OL5BrAR15aiB4eKwq8OnoJFNr','2016-04-13 17:02:59','2016-04-13 19:46:49',NULL),(4,'Carmen','Moreno','','75248545','0000-00-00','','carmen@example.com','','','Invitado','1',NULL,'2016-04-13 17:11:51','2016-04-13 17:11:52',NULL),(5,'Klaudio','Vargas Saavedra','','75666555','0000-00-00','Masculino','klaudiocvs@gmail.com','','','Invitado','1',NULL,'2016-04-13 19:17:26','2016-04-13 19:17:27',NULL),(6,'Adan','Adan','789465231','75945621','0000-00-00','Masculino','adan@example.com','iAdan','$2y$10$ZYjlNDpLSacBJrV6veqgMevyV8OBMdfbxrk0EfBCW.bqDpvMIU5By','Relacionador','1',NULL,'2016-04-13 19:46:06','2016-04-13 19:46:07',NULL),(7,'Gledis','Cortez','','7675805','0000-00-00','','gledis@example.com','','','Invitado','1',NULL,'2016-04-13 19:48:31','2016-04-13 19:48:32',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
