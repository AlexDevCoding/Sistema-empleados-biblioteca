
CREATE DATABASE IF NOT EXISTS sistema;
USE sistema;


CREATE TABLE `asistencias` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `empleado_id` INT(11) DEFAULT NULL,
  `fecha` DATE NOT NULL,
  `hora_entrada` TIME NOT NULL,
  `hora_salida` TIME NOT NULL,
  `estado` ENUM('A tiempo', 'Tardanza', 'Ausente') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `empleado_id` (`empleado_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `empleados` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre_completo` VARCHAR(100) NOT NULL,
  `cedula_identidad` VARCHAR(20) NOT NULL UNIQUE,
  `puesto` VARCHAR(50) NOT NULL,
  `departamento` VARCHAR(50) NOT NULL,
  `fecha_ingreso` DATE NOT NULL,
  `estado` ENUM('Activo', 'Inactivo') NOT NULL,
  `telefono` VARCHAR(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `permisos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `empleado_id` INT(11) DEFAULT NULL,
  `tipo_permiso` ENUM('Vacaciones', 'Permiso médico') NOT NULL,
  `fecha_inicio` DATE NOT NULL,
  `fecha_fin` DATE NOT NULL,
  `estado` ENUM('Aprobado', 'Pendiente', 'Rechazado') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `empleado_id` (`empleado_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `usuarios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  `apellido` VARCHAR(50) NOT NULL,
  `usuario` VARCHAR(50) NOT NULL,
  `correo` VARCHAR(50) NOT NULL,
  `contrasena` VARCHAR(255) NOT NULL,
  `rol` ENUM('Administrador', 'Empleado') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


ALTER TABLE `asistencias`
  ADD CONSTRAINT `asistencias_ibfk_1` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`);

ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`);
