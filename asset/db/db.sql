    create database pentland;
    use pentland;

    CREATE TABLE usuario (
        
        Id int auto_increment primary key,
        Nombre varchar(253) DEFAULT NULL,
        Apellido varchar(50) DEFAULT NULL,
        Correo varchar(255) DEFAULT NULL,
        Contraseña varchar(255) DEFAULT NULL
        );
    CREATE TABLE categorias (
    codigo int auto_increment primary key,
    Id int (100) default null,
    Productos varchar (100) default null,
    descripcion varchar (250) default null, 
    Img blob (500) default null,
    Precio int (100) default null
    );

    create table administrador (
    Codigo int auto_increment primary key,
    Nombre varchar (100) default null,
    Apellido varchar (100) default null, 
    Correo varchar (100) default null, 
    contraseña varchar (100) default null
    );
    create table provedores (
    codigo int auto_increment primary key, 
    Nombre_Emppresa varchar (200) default null,
    Nombre varchar (100) default null, 
    Apellido varchar (100) default null,
    Correo varchar (100) default null,
    Contraseña varchar (100) default null
    );