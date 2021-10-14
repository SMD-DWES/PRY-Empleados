CREATE DATABASE BDEmpleados;

USE bdempleados;

CREATE TABLE Empleados(
    IdEmpleado tinyint NOT NULL AUTO_INCREMENT PRIMARY KEY,
    DNI char(9) NOT NULL UNIQUE,
    Nombre varchar(100) NOT NULL,
    Correo varchar(150) NULL,
    Tlfno char(9) NOT NULL

);