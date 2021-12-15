CREATE DATABASE IF NOT EXISTS reservas_restaurante;
USE reservas_restaurante;

CREATE TABLE `mesas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `espacios` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
  
CREATE TABLE `reservas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `movil` varchar(45) NOT NULL,
  `fecha` date NOT NULL,
  `comida_cena` varchar(45) NOT NULL,
  `hora` time NOT NULL,
  `n_personas` int NOT NULL,
  `estado` varchar(45) NOT NULL,
  `idMesa` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idMesa_idx` (`idMesa`),
  CONSTRAINT `idMesa` FOREIGN KEY (`idMesa`) REFERENCES `mesas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

SELECT * FROM reservas_restaurante.mesas;
SELECT * FROM reservas_restaurante.reservas;