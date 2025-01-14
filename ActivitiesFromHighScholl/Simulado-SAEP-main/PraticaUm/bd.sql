CREATE DATABASE SAEP_praticaUm;
USE SAEP_praticaUm;

CREATE TABLE usuarios(
id_usuario INT PRIMARY KEY auto_increment NOT NULL,
nome_usuario VARCHAR(90) NOT NULL,
email_usuario VARCHAR(90) NOT NULL,
telefone_usuario VARCHAR(90) NOT NULL,
senha_usuario VARCHAR(90),
tipo_usuario ENUM ("colaborador", "cliente") NOT NULL
);

CREATE TABLE chamados(
id_chamado INT PRIMARY KEY auto_increment NOT NULL,
fk_usuario INT NOT NULL,
FOREIGN KEY (fk_usuario) REFERENCES usuarios(id_usuario),
fk_colaborador INT,
FOREIGN KEY (fk_colaborador) REFERENCES usuarios(id_usuario),
descricao_chamado VARCHAR(180) NOT NULL,
status_chamado ENUM ("Aberto", "Em andamento", "Resolvido") NOT NULL,
criticidade_chamado ENUM ("Alta", "Média", "Baixa") NOT NULL,
data_abertura_chamado DATE
);
