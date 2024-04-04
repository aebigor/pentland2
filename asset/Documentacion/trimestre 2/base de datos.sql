create database pentland;
use pentland;

CREATE TABLE Roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL
);

CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    apellido varchar(50) DEFAULT NULL,
    correo varchar(255) DEFAULT NULL,
    passCorreo varchar(255) DEFAULT NULL,
    rol varchar(255) DEFAULT NULL
    
);
CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombreP VARCHAR(100)  NULL,
    descripcion TEXT  NULL,
    precio DECIMAL(10, 2)  NULL,
    cantidad INT  NULL,
    categoria VARCHAR(200)  NULL,
    imagen VARCHAR(255)  NULL
);
