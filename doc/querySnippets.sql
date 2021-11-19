SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';
SET NAMES utf8mb4;
DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nome` varchar(50) NOT NULL,
    `data_criacao` timestamp NULL DEFAULT NULL,
    `data_atualizacao` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`)
);
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
    `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `uuid` varchar(255) NOT NULL,
    `connection` text NOT NULL,
    `queue` text NOT NULL,
    `payload` longtext NOT NULL,
    `exception` longtext NOT NULL,
    `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
);
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
    `id` bigint(20) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `apelido` varchar(255) DEFAULT NULL,
    `email` varchar(255) NOT NULL,
    `email_verified_at` timestamp NULL DEFAULT NULL,
    `password` varchar(255) NOT NULL,
    `remember_token` varchar(100) DEFAULT NULL,
    `ativo` tinyint(4) NOT NULL DEFAULT '1',
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `users_email_unique` (`email`)
);
DROP TABLE IF EXISTS `quiz`;
CREATE TABLE `quiz` (
    `id` bigint(20) NOT NULL AUTO_INCREMENT,
    `nome` varchar(100) NOT NULL,
    `descricao` varchar(300) NOT NULL,
    `categoria_id` int(11) NOT NULL,
    `data_criacao` timestamp NULL DEFAULT NULL,
    `data_atualizacao` timestamp NULL DEFAULT NULL,
    `usuario_id` bigint(20) NOT NULL,
    `ativo` tinyint(4) NOT NULL DEFAULT '1',
    PRIMARY KEY (`id`),
    KEY `categoria_id` (`categoria_id`),
    KEY `usuario_id` (`usuario_id`),
    CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON DELETE RESTRICT,
    CONSTRAINT `quiz_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT
);
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `migration` varchar(255) NOT NULL,
    `batch` int(11) NOT NULL,
    PRIMARY KEY (`id`)
);
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
    `email` varchar(255) NOT NULL,
    `token` varchar(255) NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    KEY `password_resets_email_index` (`email`)
);
DROP TABLE IF EXISTS `pergunta`;
CREATE TABLE `pergunta` (
    `id` bigint(20) NOT NULL AUTO_INCREMENT,
    `pergunta` varchar(300) NOT NULL,
    `resposta_a` varchar(100) NOT NULL,
    `resposta_certa_a` tinyint(4) NOT NULL,
    `resposta_b` varchar(100) NOT NULL,
    `resposta_certa_b` tinyint(4) NOT NULL,
    `resposta_c` varchar(100) NOT NULL,
    `resposta_certa_c` tinyint(4) NOT NULL,
    `resposta_d` varchar(100) NOT NULL,
    `resposta_certa_d` tinyint(4) NOT NULL,
    `quiz_id` bigint(20) NOT NULL,
    `pontos` int(11) NOT NULL,
    `data_criacao` timestamp NULL DEFAULT NULL,
    `data_atualizacao` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `quiz_id` (`quiz_id`),
    CONSTRAINT `pergunta_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`id`) ON DELETE RESTRICT
);
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
    `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `tokenable_type` varchar(255) NOT NULL,
    `tokenable_id` bigint(20) unsigned NOT NULL,
    `name` varchar(255) NOT NULL,
    `token` varchar(64) NOT NULL,
    `abilities` text,
    `last_used_at` timestamp NULL DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
    KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`, `tokenable_id`)
);
DROP TABLE IF EXISTS `ranking`;
CREATE TABLE `ranking` (
    `id` bigint(20) NOT NULL AUTO_INCREMENT,
    `pontuacao` int(11) NOT NULL,
    `tentativas` int(11) NOT NULL,
    `data_criacao` timestamp NULL DEFAULT NULL,
    `data_atualizacao` timestamp NULL DEFAULT NULL,
    `usuario_id` bigint(20) NOT NULL,
    `quiz_id` bigint(20) NOT NULL,
    PRIMARY KEY (`id`),
    KEY `usuario_id` (`usuario_id`),
    CONSTRAINT `ranking_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT,
    CONSTRAINT `ranking_ibfk_3` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT
);