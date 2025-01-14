CREATE DATABASE SAEP_praticaDois;
USE SAEP_praticaDois;

CREATE TABLE usuarios(
id_usuario INT PRIMARY KEY auto_increment NOT NULL,
nome_usuario VARCHAR(90) NOT NULL,
email_usuario VARCHAR(90) NOT NULL,
telefone_usuario VARCHAR(90) NOT NULL,
cpf_usuario VARCHAR(11) NOT NULL,
senha_usuario VARCHAR(90),
tipo_usuario ENUM ("funcionario", "cliente") NOT NULL
);

CREATE TABLE solicitacoes(
id_solicitacao INT PRIMARY KEY auto_increment NOT NULL,
fk_usuario INT NOT NULL,
FOREIGN KEY (fk_usuario) REFERENCES usuarios(id_usuario),
fk_colaborador INT,
FOREIGN KEY (fk_colaborador) REFERENCES usuarios(id_usuario),
descricao_solicitacao VARCHAR(180) NOT NULL,
status_solicitacao ENUM ("Pendente", "Em andamento", "Finalizada") NOT NULL,
criticidade_solicitacao ENUM ("Alta", "Média", "Baixa") NOT NULL,
data_abertura_solicitacao DATE
);
