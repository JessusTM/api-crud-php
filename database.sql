CREATE DATABASE UsuariosMantenedor;
USE UsuariosMantenedor;

CREATE TABLE usuarios (
	id              INT AUTO_INCREMENT PRIMARY KEY,
    nombreUsuario   VARCHAR (100)   NOT NULL,
    email           VARCHAR (50)    NOT NULL,
    fechaCreacion   TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);