/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 100134
Source Host           : localhost:3306
Source Database       : laravel_starter

Target Server Type    : MYSQL
Target Server Version : 100134
File Encoding         : 65001

Date: 2019-07-01 18:30:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2019_06_16_234555_create_permission_tables', '1');
INSERT INTO `migrations` VALUES ('4', '2019_06_17_001819_create_posts_table', '2');

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
INSERT INTO `model_has_roles` VALUES ('4', 'App\\User', '1');
INSERT INTO `model_has_roles` VALUES ('5', 'App\\User', '8');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `module` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES ('1', 'posts.create', 'Create Post', 'Post', 'web', '2019-06-17 00:40:12', '2019-06-17 00:40:12');
INSERT INTO `permissions` VALUES ('2', 'posts.edit', 'Edit Post', 'Post', 'web', '2019-06-17 00:40:31', '2019-06-17 00:40:31');
INSERT INTO `permissions` VALUES ('3', 'posts.delete', 'Delete Post', 'Post', 'web', '2019-06-17 00:40:43', '2019-06-17 00:40:43');
INSERT INTO `permissions` VALUES ('4', 'posts.view', 'View Post', 'Post', 'web', '2019-06-17 00:40:43', '2019-06-17 00:40:43');
INSERT INTO `permissions` VALUES ('5', 'roles.view', 'View Role', 'Role', 'web', '2019-06-30 10:05:35', '2019-06-30 10:05:40');
INSERT INTO `permissions` VALUES ('6', 'roles.create', 'Create Role', 'Role', 'web', '2019-06-30 10:05:35', '2019-06-30 10:05:40');
INSERT INTO `permissions` VALUES ('7', 'roles.edit', 'Edit Role', 'Role', 'web', '2019-06-30 10:05:35', '2019-06-30 10:05:40');
INSERT INTO `permissions` VALUES ('8', 'roles.delete', 'Delete Role', 'Role', 'web', '2019-06-30 10:05:35', '2019-06-30 10:05:40');
INSERT INTO `permissions` VALUES ('9', 'users.view', 'View User', 'User', 'web', '2019-06-30 10:05:35', '2019-06-30 10:05:40');
INSERT INTO `permissions` VALUES ('10', 'users.create', 'Create User', 'User', 'web', '2019-06-30 10:05:35', '2019-06-30 10:05:40');
INSERT INTO `permissions` VALUES ('11', 'users.edit', 'Edit User', 'User', 'web', '2019-06-30 10:05:35', '2019-06-30 10:05:40');
INSERT INTO `permissions` VALUES ('12', 'users.delete', 'Delete User', 'User', 'web', '2019-06-30 10:05:35', '2019-06-30 10:05:40');
INSERT INTO `permissions` VALUES ('13', 'users.assign_role', 'Assign User Role', 'User', 'web', '2019-06-30 10:05:35', '2019-06-30 10:05:40');

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES ('1', 'title1', 'body 1', null, null);
INSERT INTO `posts` VALUES ('4', 'Test title 2', 'test description 2', '2019-07-01 10:37:45', '2019-07-01 10:37:45');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('4', 'super_admin', 'Super Admin', 'web', '2019-06-18 15:29:20', '2019-06-18 15:29:20');
INSERT INTO `roles` VALUES ('5', 'manager', 'Manager', 'web', '2019-07-01 04:05:46', '2019-07-01 04:05:46');

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------
INSERT INTO `role_has_permissions` VALUES ('1', '5');
INSERT INTO `role_has_permissions` VALUES ('2', '5');
INSERT INTO `role_has_permissions` VALUES ('4', '5');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Md. Shahin Howlader', 'mdshahin0002@gmail.com', null, '$2y$10$BqA/FMjbl1DkuKuWHKk0GesEehBtCpccAlxFdYrjsrUqyAFEiqDnG', null, '2019-06-17 00:25:23', '2019-06-17 02:11:26');
INSERT INTO `users` VALUES ('8', 'Rony', 'rony@gmail.com', null, '$2y$10$wMO05qI14H6x9SzeFrRxc.xBspsl7Zbc7kV5Md5tFE1FSXOwEhG6q', null, '2019-07-01 04:10:06', '2019-07-01 04:10:06');
