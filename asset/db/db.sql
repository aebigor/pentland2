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
    rol_id INT,
    FOREIGN KEY (rol_id) REFERENCES Roles(id)
);
CREATE TABLE Categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT,
    imagen VARCHAR(255), 
    precio DECIMAL(10, 2) 
);