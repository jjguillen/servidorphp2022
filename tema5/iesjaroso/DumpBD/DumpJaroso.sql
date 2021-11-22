-- MariaDB dump 10.19  Distrib 10.5.12-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: iesjaroso
-- ------------------------------------------------------
-- Server version	10.5.12-MariaDB-1build1

--
-- Table structure for table alumnos
--

USE heroku_018a230b0806159;

--
-- Table structure for table cursos
--

DROP TABLE IF EXISTS cursos;
CREATE TABLE cursos (
  id int(11) NOT NULL AUTO_INCREMENT,
  nombre varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL,
  etapa varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL,
  anio smallint(4) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table cursos
--

LOCK TABLES cursos WRITE;
INSERT INTO cursos VALUES (2,"2DAW","CFGS",2021),(3,"1GA","CFGM",2021),(4,"1DAW","CFGS",2021),(5,"2GA","CFGM",2021),(6,"1LAB","CFGM",2021);
UNLOCK TABLES;


DROP TABLE IF EXISTS alumnos;
CREATE TABLE alumnos (
  id int(11) NOT NULL AUTO_INCREMENT,
  nombre varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL,
  apellidos varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL,
  edad smallint(2) NOT NULL,
  dni varchar(10) COLLATE utf8mb4_spanish2_ci NOT NULL,
  email varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL,
  localidad varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL,
  telefono varchar(9) COLLATE utf8mb4_spanish2_ci NOT NULL,
  curso int(11) NOT NULL,
  avatar varchar(45) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY dni_UNIQUE (dni),
  KEY fk_alumnos_1_idx (curso),
  CONSTRAINT fk_alumnos_1 FOREIGN KEY (curso) REFERENCES cursos (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table alumnos
--

LOCK TABLES alumnos WRITE;
INSERT INTO alumnos VALUES (4,"Manuel","Campos",20,"65255566A","manu@gmail.com","Vera","626332221",4,"vacío"),(5,"Sonia","Serrano",19,"45454545A","soniaX@gmail.com","Garrucha","666332331",5,"");
UNLOCK TABLES;

--
-- Table structure for table usuarios
--

DROP TABLE IF EXISTS usuarios;
CREATE TABLE usuarios (
  email varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  password varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  nombre varchar(120) COLLATE utf8mb4_spanish2_ci NOT NULL,
  ciudad varchar(45) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  situacion smallint(2) DEFAULT NULL,
  especialidad varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL,
  id int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (id),
  UNIQUE KEY email_UNIQUE (email)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table usuarios
--

LOCK TABLES usuarios WRITE;
INSERT INTO usuarios VALUES ("lorena@gmail.com","o5f6BT6yeY8K48IIQrsAZw==","Lorena","Cuevas",1,"lengua",1),("jose@gmail.com","o5f6BT6yeY8K48IIQrsAZw==","Jose Perez","Mojácar",1,"informatica",2);
UNLOCK TABLES;

--
-- Table structure for table partes
--

DROP TABLE IF EXISTS partes;
CREATE TABLE partes (
  id int(11) NOT NULL AUTO_INCREMENT,
  alumno_id int(11) DEFAULT NULL,
  usuario_id int(11) DEFAULT NULL,
  fecha date DEFAULT NULL,
  hora varchar(45) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  asignatura varchar(45) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  gravedad varchar(45) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  descripcion text COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  comunicado tinyint(4) DEFAULT NULL,
  PRIMARY KEY (id),
  KEY fk_partes_1_idx (usuario_id),
  KEY fk_partes_2_idx (alumno_id),
  CONSTRAINT fk_partes_1 FOREIGN KEY (usuario_id) REFERENCES usuarios (id) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT fk_partes_2 FOREIGN KEY (alumno_id) REFERENCES alumnos (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table partes
--

LOCK TABLES partes WRITE;
INSERT INTO partes VALUES (6,4,1,'2021-11-17',"","Religión","Alta","descripcion",0),(7,5,2,'2021-11-03',"","Religión","Alta","descripcion2",0);
UNLOCK TABLES;


--
-- Dumping routines for database iesjaroso
--


-- Dump completed on 2021-11-12 18:58:21
