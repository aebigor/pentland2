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
    rol INT,
    FOREIGN KEY (rol) REFERENCES Roles(id)
);
CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    cantidad INT NOT NULL,
    imagen VARCHAR(255) NOT NULL
);
