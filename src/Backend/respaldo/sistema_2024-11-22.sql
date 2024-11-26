DROP TABLE IF EXISTS `asistencias`;
CREATE TABLE `asistencias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empleado_id` int(11) DEFAULT NULL,
  `fecha` date NOT NULL,
  `hora_entrada` time NOT NULL,
  `hora_salida` time NOT NULL,
  `estado` enum('A tiempo','Tardanza','Ausente') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `empleado_id` (`empleado_id`),
  CONSTRAINT `asistencias_ibfk_1` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `asistencias` VALUES ('8', '317', '2024-10-28', '08:00:00', '16:00:00', 'A tiempo');
INSERT INTO `asistencias` VALUES ('9', '320', '2024-10-27', '08:00:00', '16:00:00', 'A tiempo');


DROP TABLE IF EXISTS `empleados`;
CREATE TABLE `empleados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_completo` varchar(100) NOT NULL,
  `cedula_identidad` varchar(20) NOT NULL,
  `puesto` varchar(50) NOT NULL,
  `departamento` varchar(50) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `estado` enum('Activo','Inactivo') NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cedula_identidad` (`cedula_identidad`)
) ENGINE=InnoDB AUTO_INCREMENT=563 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `empleados` VALUES ('317', 'María López', '19403020', 'Gerente', 'Administración', '2016-09-08', 'Inactivo', '04144493440');
INSERT INTO `empleados` VALUES ('320', 'José Gómez', '37448918', 'Analista', 'Proyectos', '2019-07-13', 'Activo', '04149913126');
INSERT INTO `empleados` VALUES ('321', 'Ana Hernández', '39955180', 'Administrador', 'Proyectos', '2023-12-29', 'Activo', '04144753672');
INSERT INTO `empleados` VALUES ('341', 'Ana Hernández', '51049180', 'Soporte Técnico', 'Administración', '2022-11-19', 'Activo', '04147116768');
INSERT INTO `empleados` VALUES ('342', 'Laura Hernández', '66625010', 'Administrador', 'Administración', '2022-04-27', 'Activo', '04145771072');
INSERT INTO `empleados` VALUES ('350', 'Pedro López', '86221874', 'Analista', 'Dirección', '2017-01-05', 'Inactivo', '04147470989');
INSERT INTO `empleados` VALUES ('351', 'José López', '29215949', 'Desarrollador', 'Dirección', '2019-11-14', 'Inactivo', '04140172153');
INSERT INTO `empleados` VALUES ('355', 'Luis Torres', '42027857', 'Analista', 'Dirección', '2021-11-30', 'Inactivo', '04143524791');
INSERT INTO `empleados` VALUES ('360', 'Sofía López', '56878198', 'Administrador', 'Dirección', '2021-08-07', 'Inactivo', '04147856284');
INSERT INTO `empleados` VALUES ('363', 'Laura Pérez', '81477623', 'Supervisor', 'Proyectos', '2020-12-04', 'Inactivo', '04145617738');
INSERT INTO `empleados` VALUES ('366', 'Laura Hernández', '20598432', 'Desarrollador', 'Proyectos', '2023-05-17', 'Inactivo', '04140801219');
INSERT INTO `empleados` VALUES ('367', 'Sofía Ramírez', '43359442', 'Desarrollador', 'Administración', '2021-10-31', 'Inactivo', '04140158864');
INSERT INTO `empleados` VALUES ('369', 'Sofía Gómez', '44150473', 'Administrador', 'Proyectos', '2020-01-15', 'Activo', '04142555964');
INSERT INTO `empleados` VALUES ('370', 'Carla Martínez', '65150996', 'Desarrollador', 'Dirección', '2017-11-03', 'Inactivo', '04149963640');
INSERT INTO `empleados` VALUES ('372', 'Ana Gómez', '18756413', 'Analista', 'Tecnología', '2018-06-10', 'Activo', '04144730557');
INSERT INTO `empleados` VALUES ('373', 'Ricardo Martínez', '30187866', 'Supervisor', 'Tecnología', '2018-02-26', 'Inactivo', '04142817125');
INSERT INTO `empleados` VALUES ('378', 'Ricardo Pérez', '91333293', 'Gerente', 'Administración', '2019-01-13', 'Activo', '04141260467');
INSERT INTO `empleados` VALUES ('382', 'Ana López', '94485585', 'Desarrollador', 'Dirección', '2024-02-22', 'Inactivo', '04145332969');
INSERT INTO `empleados` VALUES ('384', 'Pedro Hernández', '15512631', 'Gerente', 'Dirección', '2022-01-20', 'Activo', '04143410160');
INSERT INTO `empleados` VALUES ('385', 'Ricardo Vargas', '99644095', 'Supervisor', 'Proyectos', '2016-03-31', 'Activo', '04146345039');
INSERT INTO `empleados` VALUES ('387', 'Sofía Vargas', '73082871', 'Administrador', 'Administración', '2024-02-24', 'Inactivo', '04145267296');
INSERT INTO `empleados` VALUES ('389', 'María Vargas', '64590309', 'Soporte Técnico', 'Dirección', '2019-08-25', 'Inactivo', '04143805158');
INSERT INTO `empleados` VALUES ('390', 'Luis Rodríguez', '96807688', 'Soporte Técnico', 'Dirección', '2016-07-30', 'Inactivo', '04144871158');
INSERT INTO `empleados` VALUES ('391', 'Carla Rodríguez', '11703115', 'Gerente', 'Dirección', '2021-05-07', 'Activo', '04144624430');
INSERT INTO `empleados` VALUES ('392', 'Laura Rodríguez', '00964869', 'Gerente', 'Tecnología', '2020-10-09', 'Activo', '04140207150');
INSERT INTO `empleados` VALUES ('394', 'Ana Hernández', '04617175', 'Supervisor', 'Proyectos', '2016-06-13', 'Activo', '04147342914');
INSERT INTO `empleados` VALUES ('395', 'Juan Hernández', '06213196', 'Gerente', 'Tecnología', '2020-03-18', 'Activo', '04144587044');
INSERT INTO `empleados` VALUES ('396', 'Juan Hernández', '76935135', 'Administrador', 'Tecnología', '2020-10-16', 'Activo', '04144833172');
INSERT INTO `empleados` VALUES ('398', 'Juan Rodríguez', '51420565', 'Desarrollador', 'Administración', '2024-02-11', 'Activo', '04145203141');
INSERT INTO `empleados` VALUES ('399', 'Laura Torres', '28559697', 'Analista', 'Proyectos', '2021-11-09', 'Inactivo', '04145849842');
INSERT INTO `empleados` VALUES ('403', 'Carla López', '51524786', 'Supervisor', 'Administración', '2018-05-05', 'Activo', '04147920861');
INSERT INTO `empleados` VALUES ('405', 'Laura García', '32673040', 'Administrador', 'Administración', '2024-02-21', 'Inactivo', '04143383206');
INSERT INTO `empleados` VALUES ('409', 'Ana Vargas', '37062229', 'Gerente', 'Proyectos', '2015-10-03', 'Inactivo', '04143074387');
INSERT INTO `empleados` VALUES ('410', 'Sofía Vargas', '04789196', 'Soporte Técnico', 'Administración', '2015-04-14', 'Activo', '04145789982');
INSERT INTO `empleados` VALUES ('411', 'José López', '87945825', 'Administrador', 'Proyectos', '2015-04-14', 'Inactivo', '04149213925');
INSERT INTO `empleados` VALUES ('412', 'Sofía Gómez', '73795461', 'Administrador', 'Dirección', '2017-07-06', 'Activo', '04146196338');
INSERT INTO `empleados` VALUES ('414', 'Luis Rodríguez', '12447283', 'Analista', 'Dirección', '2018-10-03', 'Activo', '04146854354');
INSERT INTO `empleados` VALUES ('415', 'Pedro Martínez', '64478815', 'Analista', 'Administración', '2017-05-08', 'Inactivo', '04147857894');
INSERT INTO `empleados` VALUES ('418', 'Luis Rodríguez', '81528303', 'Analista', 'Proyectos', '2016-01-02', 'Inactivo', '04146526850');
INSERT INTO `empleados` VALUES ('419', 'Juan Pérez', '90378776', 'Analista', 'Proyectos', '2021-05-22', 'Inactivo', '04147789993');
INSERT INTO `empleados` VALUES ('420', 'Luis López', '06279131', 'Analista', 'Tecnología', '2015-07-23', 'Inactivo', '04143583344');
INSERT INTO `empleados` VALUES ('421', 'Pedro Rodríguez', '09891078', 'Supervisor', 'Dirección', '2015-06-29', 'Activo', '04145244348');
INSERT INTO `empleados` VALUES ('426', 'Luis García', '11512190', 'Analista', 'Dirección', '2015-03-27', 'Activo', '04149544223');
INSERT INTO `empleados` VALUES ('431', 'Ricardo Pérez', '08510347', 'Desarrollador', 'Administración', '2022-04-19', 'Inactivo', '04141268045');
INSERT INTO `empleados` VALUES ('433', 'Carla Ramírez', '21840792', 'Analista', 'Proyectos', '2019-06-23', 'Inactivo', '04142118175');
INSERT INTO `empleados` VALUES ('434', 'Laura Rodríguez', '32317972', 'Analista', 'Tecnología', '2021-11-14', 'Activo', '04147159092');
INSERT INTO `empleados` VALUES ('436', 'Ana Torres', '95566731', 'Gerente', 'Tecnología', '2016-08-08', 'Activo', '04149096263');
INSERT INTO `empleados` VALUES ('440', 'Ricardo García', '03181914', 'Desarrollador', 'Proyectos', '2019-08-27', 'Inactivo', '04143088294');
INSERT INTO `empleados` VALUES ('443', 'Ricardo García', '87796936', 'Soporte Técnico', 'Administración', '2021-03-20', 'Inactivo', '04140883428');
INSERT INTO `empleados` VALUES ('444', 'María García', '90479177', 'Desarrollador', 'Tecnología', '2021-12-26', 'Inactivo', '04148368880');
INSERT INTO `empleados` VALUES ('445', 'Sofía Hernández', '31279226', 'Desarrollador', 'Administración', '2019-09-12', 'Inactivo', '04143204486');
INSERT INTO `empleados` VALUES ('453', 'Carla Vargas', '37947677', 'Desarrollador', 'Administración', '2016-11-21', 'Activo', '04142461779');
INSERT INTO `empleados` VALUES ('454', 'María Rodríguez', '67951544', 'Supervisor', 'Administración', '2021-08-03', 'Inactivo', '04142140299');
INSERT INTO `empleados` VALUES ('455', 'Laura Torres', '41732056', 'Soporte Técnico', 'Dirección', '2021-06-20', 'Inactivo', '04146397977');
INSERT INTO `empleados` VALUES ('458', 'Pedro García', '06717549', 'Desarrollador', 'Tecnología', '2024-11-18', 'Activo', '04143067329');
INSERT INTO `empleados` VALUES ('459', 'José López', '10147269', 'Desarrollador', 'Dirección', '2021-05-07', 'Inactivo', '04146813352');
INSERT INTO `empleados` VALUES ('461', 'Laura García', '90395423', 'Desarrollador', 'Dirección', '2022-12-27', 'Inactivo', '04146683236');
INSERT INTO `empleados` VALUES ('466', 'Pedro Vargas', '30740163', 'Analista', 'Administración', '2015-05-09', 'Inactivo', '04148181235');
INSERT INTO `empleados` VALUES ('470', 'Sofía García', '09549149', 'Supervisor', 'Dirección', '2019-08-20', 'Activo', '04147009470');
INSERT INTO `empleados` VALUES ('471', 'Juan Gómez', '93613230', 'Analista', 'Proyectos', '2023-12-04', 'Activo', '04148618812');
INSERT INTO `empleados` VALUES ('474', 'Juan Torres', '62707236', 'Supervisor', 'Proyectos', '2020-04-15', 'Inactivo', '04145310499');
INSERT INTO `empleados` VALUES ('476', 'Ana Martínez', '31569270', 'Soporte Técnico', 'Proyectos', '2016-03-01', 'Activo', '04143255049');
INSERT INTO `empleados` VALUES ('478', 'Luis Hernández', '49948842', 'Soporte Técnico', 'Proyectos', '2017-09-09', 'Inactivo', '04144313960');
INSERT INTO `empleados` VALUES ('479', 'Ana Martínez', '59377981', 'Desarrollador', 'Proyectos', '2020-05-13', 'Inactivo', '04141331362');
INSERT INTO `empleados` VALUES ('484', 'José Torres', '72089953', 'Administrador', 'Administración', '2017-04-06', 'Inactivo', '04144401623');
INSERT INTO `empleados` VALUES ('486', 'Ana Martínez', '93981005', 'Supervisor', 'Tecnología', '2023-01-14', 'Activo', '04147229723');
INSERT INTO `empleados` VALUES ('487', 'María Vargas', '10276231', 'Soporte Técnico', 'Administración', '2020-12-30', 'Inactivo', '04144094881');
INSERT INTO `empleados` VALUES ('491', 'Pedro Martínez', '16470540', 'Gerente', 'Tecnología', '2016-01-03', 'Activo', '04148379417');
INSERT INTO `empleados` VALUES ('495', 'Ana Torres', '27685477', 'Desarrollador', 'Dirección', '2021-02-03', 'Activo', '04143148039');
INSERT INTO `empleados` VALUES ('496', 'Sofía Martínez', '34908671', 'Gerente', 'Tecnología', '2019-12-15', 'Inactivo', '04146893644');
INSERT INTO `empleados` VALUES ('497', 'Luis Gómez', '28069621', 'Gerente', 'Administración', '2023-10-31', 'Inactivo', '04146525646');
INSERT INTO `empleados` VALUES ('500', 'Juan Pérez', '03889102', 'Desarrollador', 'Administración', '2024-03-08', 'Activo', '04142655296');
INSERT INTO `empleados` VALUES ('501', 'Luis Pérez', '10714991', 'Desarrollador', 'Tecnología', '2018-04-07', 'Activo', '04149148016');
INSERT INTO `empleados` VALUES ('502', 'Carla Torres', '18560392', 'Analista', 'Proyectos', '2015-07-01', 'Inactivo', '04146531080');
INSERT INTO `empleados` VALUES ('503', 'Juan Torres', '78903018', 'Supervisor', 'Proyectos', '2023-04-22', 'Activo', '04149904593');
INSERT INTO `empleados` VALUES ('505', 'Carla Torres', '50663865', 'Desarrollador', 'Proyectos', '2020-02-04', 'Inactivo', '04143016386');
INSERT INTO `empleados` VALUES ('508', 'Sofía Ramírez', '66545152', 'Analista', 'Proyectos', '2019-08-16', 'Activo', '04148656827');
INSERT INTO `empleados` VALUES ('509', 'Sofía Ramírez', '86510518', 'Soporte Técnico', 'Proyectos', '2024-07-27', 'Inactivo', '04145473049');
INSERT INTO `empleados` VALUES ('510', 'Ana Martínez', '61767094', 'Desarrollador', 'Administración', '2023-11-21', 'Activo', '04149110216');
INSERT INTO `empleados` VALUES ('512', 'Pedro Ramírez', '16344086', 'Analista', 'Dirección', '2019-07-31', 'Inactivo', '04146716706');
INSERT INTO `empleados` VALUES ('513', 'Pedro Rodríguez', '52318693', 'Supervisor', 'Administración', '2019-05-02', 'Activo', '04144341042');
INSERT INTO `empleados` VALUES ('514', 'Pedro Rodríguez', '47971705', 'Supervisor', 'Proyectos', '2022-09-05', 'Activo', '04146445419');
INSERT INTO `empleados` VALUES ('515', 'Luis Vargas', '28725181', 'Gerente', 'Tecnología', '2020-10-20', 'Activo', '04141406402');
INSERT INTO `empleados` VALUES ('522', 'Laura Hernández', '10496816', 'Soporte Técnico', 'Dirección', '2022-07-18', 'Inactivo', '04142505771');
INSERT INTO `empleados` VALUES ('526', 'Pedro Vargas', '29231828', 'Desarrollador', 'Proyectos', '2023-10-10', 'Activo', '04149784442');
INSERT INTO `empleados` VALUES ('527', 'Pedro Vargas', '55581243', 'Analista', 'Tecnología', '2024-05-16', 'Activo', '04147602094');
INSERT INTO `empleados` VALUES ('528', 'Ricardo Torres', '91105813', 'Analista', 'Tecnología', '2015-12-11', 'Inactivo', '04146183811');
INSERT INTO `empleados` VALUES ('529', 'Ana López', '25445579', 'Soporte Técnico', 'Tecnología', '2023-04-09', 'Activo', '04146496917');
INSERT INTO `empleados` VALUES ('531', 'Laura Gómez', '16769537', 'Soporte Técnico', 'Tecnología', '2017-07-07', 'Activo', '04142690408');
INSERT INTO `empleados` VALUES ('533', 'Laura Vargas', '84015066', 'Administrador', 'Proyectos', '2015-08-14', 'Activo', '04143491486');
INSERT INTO `empleados` VALUES ('537', 'José Gómez', '99891420', 'Supervisor', 'Administración', '2017-07-10', 'Activo', '04145729395');
INSERT INTO `empleados` VALUES ('538', 'Carla Martínez', '25665967', 'Analista', 'Proyectos', '2015-10-25', 'Activo', '04149965948');
INSERT INTO `empleados` VALUES ('539', 'Ricardo López', '61745033', 'Desarrollador', 'Dirección', '2023-07-06', 'Inactivo', '04144306536');
INSERT INTO `empleados` VALUES ('542', 'Carla López', '87256967', 'Supervisor', 'Administración', '2019-11-23', 'Inactivo', '04141656282');
INSERT INTO `empleados` VALUES ('545', 'José Pérez', '64723490', 'Administrador', 'Tecnología', '2015-06-23', 'Activo', '04140053177');
INSERT INTO `empleados` VALUES ('547', 'José Torres', '00566293', 'Supervisor', 'Administración', '2018-01-14', 'Inactivo', '04147497600');
INSERT INTO `empleados` VALUES ('548', 'Ana Hernández', '71399327', 'Gerente', 'Proyectos', '2020-02-08', 'Activo', '04143366290');
INSERT INTO `empleados` VALUES ('549', 'Ana Ramírez', '67676106', 'Desarrollador', 'Tecnología', '2016-09-30', 'Inactivo', '04149081167');
INSERT INTO `empleados` VALUES ('552', 'Carla Gómez', '65884336', 'Desarrollador', 'Tecnología', '2023-11-12', 'Activo', '04145611228');
INSERT INTO `empleados` VALUES ('555', 'María Rodríguez', '30401784', 'Desarrollador', 'Administración', '2023-12-06', 'Activo', '04144053194');
INSERT INTO `empleados` VALUES ('559', 'Juan Pérez', '42923850', 'Soporte Técnico', 'Administración', '2016-05-08', 'Inactivo', '04140328965');
INSERT INTO `empleados` VALUES ('562', 'José Rodríguez', '94755148', 'Soporte Técnico', 'Dirección', '2016-01-25', 'Activo', '04141386192');


DROP TABLE IF EXISTS `permisos`;
CREATE TABLE `permisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empleado_id` int(11) DEFAULT NULL,
  `tipo_permiso` text NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `estado` enum('Aprobado','Pendiente','Rechazado') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `empleado_id` (`empleado_id`),
  CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `rol` enum('Administrador','Empleado') NOT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `usuarios` VALUES ('1', 'fernando', 'herrera', 'josue547', 'henriquezjosue384@gmail.com', '$2y$10$dOOgrpHr298x5rs6Fq1bw.GLkUvUaY/C8wDwcYiIgzurESDNrqSKe', 'Administrador', '2024-11-04');
INSERT INTO `usuarios` VALUES ('2', 'josue', 'González', 'josue123', 'henriquezjosue384@gmail.com', '$2y$10$G0sYUdBOUjvF6Xqif3IiHO/D.ma7h/CzyzRZY0OWtLkUfQRq4v5dO', 'Empleado', '2024-11-10');


