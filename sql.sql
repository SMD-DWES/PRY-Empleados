CREATE DATABASE BDEmpleados;

USE bdempleados;

CREATE TABLE Empleados(
    IdEmpleado tinyint NOT NULL AUTO_INCREMENT PRIMARY KEY,
    DNI char(9) NOT NULL UNIQUE,
    Nombre varchar(100) NOT NULL,
    Correo varchar(150) NULL,
    Tlfno char(9) NOT NULL

);

CREATE TABLE accounts (
  `idCuenta` smallint(6) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `pw` varchar(70) NOT NULL,
  PRIMARY KEY (`idCuenta`),
  UNIQUE KEY `nombre` (`nombre`)
)