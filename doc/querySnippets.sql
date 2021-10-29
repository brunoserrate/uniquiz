-- Criar a database
CREATE DATABASE `uniquiz`;
-- Tabelas
create table pergunta(
    id bigint PRIMARY KEY,
    pergunta varchar(300) NOT NULL,
    resposta_a varchar(100) NOT NULL,
    resposta_certa_a tinyint NOT NULL,
    resposta_b varchar(100) NOT NULL,
    resposta_certa_b tinyint NOT NULL,
    resposta_c varchar(100) NOT NULL,
    resposta_certa_c tinyint NOT NULL,
    resposta_d varchar (100) NOT NULL,
    resposta_certa_d tinyint NOT NULL,
    quiz_id bigint NOT NULL,
    pontos int NOT NULL,
    data_criacao timestamp,
    data_atualizacao timestamp
);
create table quiz(
    id bigint PRIMARY KEY,
    nome varchar(100) NOT NULL,
    descricao varchar(300) NOT NULL,
    categoria_id int NOT NULL,
    data_criacao timestamp,
    data_atualizacao timestamp,
    usuario_id bigint NOT NULL
);
create table categoria(
    id int PRIMARY KEY,
    nome varchar(50) NOT NULL,
    data_criacao timestamp,
    data_atualizacao timestamp
);
create table ranking(
    id bigint PRIMARY KEY,
    pontuacao int NOT NULL,
    tentativas int NOT NULL,
    data_criacao timestamp,
    data_atualizacao timestamp,
    usuario_id bigint NOT NULL,
    quiz_id bigint NOT NULL
);
CREATE TABLE `usuario` (
    `id` bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nome` varchar(255) NOT NULL,
    `apelido` varchar(255) NULL,
    `email` varchar(255) NOT NULL,
    `senha` varchar(255) NOT NULL,
    `ativo` tinyint NOT NULL,
    `data_criacao` timestamp NULL,
    `data_atualizacao` timestamp NULL
);
-- Adicinar auto increment
ALTER TABLE `categoria` CHANGE `id` `id` int NOT NULL AUTO_INCREMENT FIRST;
ALTER TABLE `pergunta` CHANGE `id` `id` bigint NOT NULL AUTO_INCREMENT FIRST;
ALTER TABLE `quiz` CHANGE `id` `id` bigint NOT NULL AUTO_INCREMENT FIRST;
ALTER TABLE `ranking` CHANGE `id` `id` bigint NOT NULL AUTO_INCREMENT FIRST;