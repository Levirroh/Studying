/* CREATE DATABASE notas_dupla_johann_mateus;
USE notas_dupla_johann_mateus;

CREATE TABLE notas (
	id_nota INT PRIMARY KEY AUTO_INCREMENT,
    titulo_nota VARCHAR(255) NOT NULL,
    texto_nota TEXT
);

CREATE TABLE usuario(
	id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    nome_usuario VARCHAR(45),
    senha VARCHAR(256),
    notas int,
    FOREIGN KEY usuario(notas) REFERENCES notas(id_nota)
);

SELECT * FROM notas;