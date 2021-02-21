

CREATE TABLE `comentariocliente` (
  `idComentarioCliente` int(11) NOT NULL AUTO_INCREMENT,
  `Comentario` mediumtext NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Imagen` mediumblob DEFAULT NULL,
  `Proyecto_idProyecto` int(11) NOT NULL,
  `FK_Usuario` int(11) NOT NULL,
  PRIMARY KEY (`idComentarioCliente`,`Proyecto_idProyecto`,`FK_Usuario`),
  KEY `fk_ComentarioCliente_Proyecto1_idx` (`Proyecto_idProyecto`),
  KEY `fk_Usuario_proyecto_idx` (`FK_Usuario`),
  CONSTRAINT `fk_ComentarioCliente_Proyecto1` FOREIGN KEY (`Proyecto_idProyecto`) REFERENCES `proyecto` (`idProyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuario_proyecto` FOREIGN KEY (`FK_Usuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

INSERT INTO comentariocliente VALUES("20","hola","2020-11-25 22:47:14","","82","20");
INSERT INTO comentariocliente VALUES("21","bien tengo un problema con mi sistema ","2020-11-25 22:55:50","","82","20");
INSERT INTO comentariocliente VALUES("22","el sistema colapso  , me marcar un error de conexion en la base de datos ","2020-11-25 23:00:54","","82","20");
INSERT INTO comentariocliente VALUES("23","okey espero , su respuesta ","2020-11-25 23:06:44","","82","20");
INSERT INTO comentariocliente VALUES("24","muchas gracias , hasta luego ","2020-11-25 23:54:50","","82","20");
INSERT INTO comentariocliente VALUES("25","hola ","2020-11-26 00:09:36","","65","20");
INSERT INTO comentariocliente VALUES("26","gracias","2020-11-26 01:09:03","","82","20");
INSERT INTO comentariocliente VALUES("27","hola ","2020-11-26 09:30:32","","77","20");
INSERT INTO comentariocliente VALUES("28","hola necesito ayuda ","2020-11-26 10:01:11","","76","20");
INSERT INTO comentariocliente VALUES("29","hola","2020-11-30 01:25:53","","70","20");
INSERT INTO comentariocliente VALUES("30","tengo un problema.","2020-12-01 12:58:39","","65","20");
INSERT INTO comentariocliente VALUES("31","con mi sistema ","2020-12-01 13:00:43","","65","20");
INSERT INTO comentariocliente VALUES("32","no puedo abrir mi sistema ","2020-12-24 01:27:11","","65","20");
INSERT INTO comentariocliente VALUES("33","como esta tengo un problema ","2020-12-24 01:27:56","","70","20");
INSERT INTO comentariocliente VALUES("34","hola ","2021-01-03 01:07:30","","86","20");
INSERT INTO comentariocliente VALUES("35","hola","2021-01-07 12:40:19","","68","20");



CREATE TABLE `comentariosoporte` (
  `idComentarioSoporte` int(11) NOT NULL AUTO_INCREMENT,
  `FechaDos` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ComentarioDos` mediumtext NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idComentarioSoporte`,`Usuario_idUsuario`),
  KEY `fk_ComentarioSoporte_Usuario_idx` (`Usuario_idUsuario`),
  CONSTRAINT `fk_ComentarioSoporte_Usuario` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2147483648 DEFAULT CHARSET=utf8mb4;

INSERT INTO comentariosoporte VALUES("100","2020-11-25 23:07:44","no paso nada creo es por una actualización ya estamos trabajando nos tardaremos dos días ","34");
INSERT INTO comentariosoporte VALUES("123","2020-11-25 22:57:05","que problema tienes ? nos puedes describir el problema ","34");
INSERT INTO comentariosoporte VALUES("285","2021-01-03 01:10:30","que tiene","34");
INSERT INTO comentariosoporte VALUES("1224","2020-11-29 13:14:37","hola amigo","34");
INSERT INTO comentariosoporte VALUES("1245","2020-11-25 22:54:11","hola como estas","34");
INSERT INTO comentariosoporte VALUES("3435","2020-11-25 23:02:13","okey mira entraremos al sistema  para que se pueda  realizar de manera adecuada ","34");
INSERT INTO comentariosoporte VALUES("3535","2020-11-26 10:01:37","que problema tiene ? ","34");
INSERT INTO comentariosoporte VALUES("4345","2020-11-26 09:36:18","adios ","34");
INSERT INTO comentariosoporte VALUES("10078","2020-11-25 23:55:19","bye un gusto","34");
INSERT INTO comentariosoporte VALUES("58886","2020-12-01 01:03:35","como estas","34");
INSERT INTO comentariosoporte VALUES("79213","2020-12-02 00:39:41","que problema tiene ?","34");
INSERT INTO comentariosoporte VALUES("82191","2021-01-07 12:41:11","hola","34");
INSERT INTO comentariosoporte VALUES("85312","2020-12-01 01:02:34","hola","34");
INSERT INTO comentariosoporte VALUES("89157","2021-01-03 01:07:56","hola ","34");
INSERT INTO comentariosoporte VALUES("436346","2020-11-26 01:10:56","de nada hasta luego","34");



CREATE TABLE `cotizacion` (
  `idCotizacion` int(11) NOT NULL AUTO_INCREMENT,
  `TituloDelProyecto` varchar(45) NOT NULL,
  `Servicio` varchar(40) NOT NULL,
  `Explicacion` tinytext NOT NULL,
  `Comentario` mediumtext NOT NULL,
  `Archivos` varchar(65) DEFAULT NULL,
  `Empresa_idEmpresa` int(11) NOT NULL,
  PRIMARY KEY (`idCotizacion`,`Empresa_idEmpresa`),
  KEY `fk_Cotizacion_Empresa1_idx` (`Empresa_idEmpresa`),
  CONSTRAINT `fk_Cotizacion_Empresa1` FOREIGN KEY (`Empresa_idEmpresa`) REFERENCES `empresa` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;

INSERT INTO cotizacion VALUES("36","amd","3","Código de sistema de comercio electrónico (e-commerce) o tienda virtual.
","crear logo","crieterio.doc","1");
INSERT INTO cotizacion VALUES("37","Diseño de logo institucional  upemor ","4","asta principios de 2000, PEAR fue creciendo hasta ser un gran y significativo proyecto con un gran número de programadores trabajando en la implementación común, funcionalidad reutilizable para el beneficio de toda la comunidad PHP. ","adios ","satisfaccion.csv","1");
INSERT INTO cotizacion VALUES("38","Juego de starcraf","1","videojuego de estrategia en tiempo real de ciencia ficción militar","","ejemplo.xls","2");
INSERT INTO cotizacion VALUES("39","logo","4","rrgdf","gdfgdfg","0","1");



CREATE TABLE `empresa` (
  `idEmpresa` int(11) NOT NULL AUTO_INCREMENT,
  `NombreEmpresa` varchar(50) NOT NULL,
  `GiroEmpresa` varchar(45) NOT NULL,
  `ServiciosDeInteres` int(11) DEFAULT NULL,
  `ServicioDeInteres1` int(11) DEFAULT NULL,
  `ServicioDeInteres2` int(11) DEFAULT NULL,
  `ServicioDeInteres3` int(11) DEFAULT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idEmpresa`,`Usuario_idUsuario`),
  UNIQUE KEY `NombreEmpresa_UNIQUE` (`NombreEmpresa`),
  KEY `fk_Empresa_Usuario1_idx` (`Usuario_idUsuario`),
  CONSTRAINT `fk_Empresa_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4;

INSERT INTO empresa VALUES("1","Computer Recnology 2g","tecnologico","0","1","1","1","20");
INSERT INTO empresa VALUES("2","Upemor","escuela","1","0","0","0","35");
INSERT INTO empresa VALUES("19","Upemor dos rgd","tecnologico","1","1","0","0","31");
INSERT INTO empresa VALUES("39","Comex","tecnologico","1","1","1","1","23");
INSERT INTO empresa VALUES("43","Marco","tecnologico","1","1","1","1","23");
INSERT INTO empresa VALUES("62","Computer recnology 45","tecnologico","1","1","0","0","26");
INSERT INTO empresa VALUES("64","Computer recnology 2g	","tecnologico","1","1","0","0","23");
INSERT INTO empresa VALUES("66","Comex 45","tecnologico","1","1","0","0","26");



CREATE TABLE `ofertas` (
  `idOfertas` int(11) NOT NULL AUTO_INCREMENT,
  `NombreOferta` varchar(66) NOT NULL,
  `FechaExpiracion` date NOT NULL,
  `FechaInicio` date NOT NULL,
  `Imagen` varchar(70) DEFAULT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idOfertas`,`Usuario_idUsuario`),
  KEY `fk_Ofertas_Usuario1_idx` (`Usuario_idUsuario`),
  CONSTRAINT `fk_Ofertas_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8mb4;

INSERT INTO ofertas VALUES("110","OFERTA 4x1","2021-02-26","2021-02-12","arbol.webp","3");
INSERT INTO ofertas VALUES("111","diseño de logo y cartas de presentacion","2021-02-13","2021-02-19","protafolio.PNG","3");
INSERT INTO ofertas VALUES("113","OFERTA 2x1","2021-02-13","2021-02-12","Captura.PNG","3");
INSERT INTO ofertas VALUES("116","logos y pagina web","2021-02-13","2021-02-13","frozen.jpg","3");



CREATE TABLE `proyecto` (
  `idProyecto` int(11) NOT NULL AUTO_INCREMENT,
  `NombreProyecto` varchar(65) NOT NULL,
  `FechaEntrega` date NOT NULL,
  `Nota` mediumtext DEFAULT NULL,
  `Tipo` varchar(45) NOT NULL,
  `Eliminar` varchar(1) DEFAULT NULL,
  `Empresa_idEmpresa` int(11) DEFAULT NULL,
  PRIMARY KEY (`idProyecto`),
  KEY `fk_Proyecto_Empresa1_idx` (`Empresa_idEmpresa`),
  CONSTRAINT `fk_Proyecto_Empresa1` FOREIGN KEY (`Empresa_idEmpresa`) REFERENCES `empresa` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb4;

INSERT INTO proyecto VALUES("65","ventas","2020-09-09","crear una app de ventas","2","","1");
INSERT INTO proyecto VALUES("68","Logo coca-cola","2020-09-23","usar colores rojos","5","","1");
INSERT INTO proyecto VALUES("69","Plataforma Hosipital angeles","2020-09-23","tiene que ser para mas de 100 usuarios","3","1","43");
INSERT INTO proyecto VALUES("70","Angry birds 34","2020-09-26","juego dinamico","1","0","1");
INSERT INTO proyecto VALUES("71","red social 44","2020-09-23","3","3","0","2");
INSERT INTO proyecto VALUES("72","Fornite","2020-09-18","hffg","3","0","2");
INSERT INTO proyecto VALUES("73","lol","2020-09-23","llll","5","1","2");
INSERT INTO proyecto VALUES("74","amd","2020-11-27","2","ñkñkl","1","43");
INSERT INTO proyecto VALUES("76","game factor app","2020-11-25","ñljoiñl","3","0","");
INSERT INTO proyecto VALUES("77","cisco","2020-11-20",".k.k","2","0","1");
INSERT INTO proyecto VALUES("80","nvidia gaming","2020-11-28","3","5","0","2");
INSERT INTO proyecto VALUES("81","Plataforma dell","2020-11-20","nvbnvbnvbnvcnvcn","1","1","");
INSERT INTO proyecto VALUES("82","dell video game","2020-11-27","jjjjj","3","1","");
INSERT INTO proyecto VALUES("86","Facebook movil","2020-12-24","sfdsfd","3","0","");
INSERT INTO proyecto VALUES("87","Upemor","2021-02-05","hola","4","0","");



CREATE TABLE `satisfaccion` (
  `idSatisfaccion` int(11) NOT NULL AUTO_INCREMENT,
  `Pregunta1` int(11) DEFAULT NULL,
  `Pregunta2` int(11) DEFAULT NULL,
  `Pregunta3` int(11) DEFAULT NULL,
  `TicketSoporte_Ticket` int(11) NOT NULL,
  PRIMARY KEY (`idSatisfaccion`),
  KEY `fk_Satisfaccion_TicketSoporte1_idx` (`TicketSoporte_Ticket`),
  CONSTRAINT `fk_Satisfaccion_TicketSoporte1` FOREIGN KEY (`TicketSoporte_Ticket`) REFERENCES `ticketsoporte` (`Ticket`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;

INSERT INTO satisfaccion VALUES("30","1","1","2","19");
INSERT INTO satisfaccion VALUES("31","2","3","1","16");
INSERT INTO satisfaccion VALUES("32","2","1","3","16");
INSERT INTO satisfaccion VALUES("33","2","1","2","16");
INSERT INTO satisfaccion VALUES("34","1","1","3","21");
INSERT INTO satisfaccion VALUES("35","0","0","0","19");
INSERT INTO satisfaccion VALUES("36","0","0","0","19");



CREATE TABLE `ticketsoporte` (
  `Ticket` int(11) NOT NULL AUTO_INCREMENT,
  `Status` varchar(7) NOT NULL,
  `FechaTicket` date NOT NULL,
  `FK_ComentarioCliente` int(11) NOT NULL,
  `FK_ComentarioSoporte` int(11) NOT NULL,
  PRIMARY KEY (`Ticket`,`FK_ComentarioCliente`,`FK_ComentarioSoporte`),
  KEY `FK_ComentarioCliente_idx` (`FK_ComentarioCliente`),
  KEY `FK_ComentarioSoporte` (`FK_ComentarioSoporte`),
  CONSTRAINT `FK_ComentarioCliente` FOREIGN KEY (`FK_ComentarioCliente`) REFERENCES `comentariocliente` (`idComentarioCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ComentarioSoporte` FOREIGN KEY (`FK_ComentarioSoporte`) REFERENCES `comentariosoporte` (`idComentarioSoporte`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

INSERT INTO ticketsoporte VALUES("15","Abierto","2020-11-25","20","1245");
INSERT INTO ticketsoporte VALUES("16","Proceso","2020-11-25","21","123");
INSERT INTO ticketsoporte VALUES("17","Proceso","2020-11-25","22","3435");
INSERT INTO ticketsoporte VALUES("18","Proceso","2020-11-25","23","100");
INSERT INTO ticketsoporte VALUES("19","Cerrado","2020-11-25","24","10078");
INSERT INTO ticketsoporte VALUES("20","Abierto","2020-11-26","26","436346");
INSERT INTO ticketsoporte VALUES("21","Cerrado","2020-11-26","27","4345");
INSERT INTO ticketsoporte VALUES("22","Abierto","2020-11-26","28","3535");
INSERT INTO ticketsoporte VALUES("23","Abierto","2020-11-29","25","1224");
INSERT INTO ticketsoporte VALUES("24","Abierto","2020-12-01","29","85312");
INSERT INTO ticketsoporte VALUES("26","Abierto","2020-12-02","31","79213");
INSERT INTO ticketsoporte VALUES("27","Cerrado","2021-01-03","34","89157");
INSERT INTO ticketsoporte VALUES("28","Cerrado","2021-01-03","33","285");
INSERT INTO ticketsoporte VALUES("29","Proceso","2021-01-07","35","82191");



CREATE TABLE `tipousuario` (
  `idTipoUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo_usuario` varchar(45) NOT NULL,
  `Descripcion` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`idTipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;

INSERT INTO tipousuario VALUES("1","Administrador"," persona que tiene la responsabilidad de implementar, configurar, mant");
INSERT INTO tipousuario VALUES("2","Cliente"," persona o empresa receptora de un bien, servicio, producto o idea, a ");
INSERT INTO tipousuario VALUES("3","Soporte","holaaa");
INSERT INTO tipousuario VALUES("4","Marketing","");
INSERT INTO tipousuario VALUES("38","Maestros","prueba");



CREATE TABLE `ubicacion` (
  `idUbicacion` int(11) NOT NULL AUTO_INCREMENT,
  `Estado` varchar(25) NOT NULL,
  `Pais` varchar(25) NOT NULL,
  `Empresa_idEmpresa` int(11) NOT NULL,
  PRIMARY KEY (`idUbicacion`),
  KEY `fk_Ubicacion_Empresa1_idx` (`Empresa_idEmpresa`),
  CONSTRAINT `fk_Ubicacion_Empresa1` FOREIGN KEY (`Empresa_idEmpresa`) REFERENCES `empresa` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `ApellidoP` varchar(40) NOT NULL,
  `ApellidoM` varchar(40) NOT NULL,
  `Telefono` varchar(10) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Password` varchar(64) NOT NULL,
  `Fecha_registro` date NOT NULL,
  `Imagen` varchar(80) DEFAULT NULL,
  `Eliminar` varchar(1) DEFAULT NULL,
  `TipoUsuario_idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `Email_UNIQUE` (`Email`),
  KEY `fk_Usuario_TipoUsuario1_idx` (`TipoUsuario_idUsuario`),
  CONSTRAINT `fk_Usuario_TipoUsuario1` FOREIGN KEY (`TipoUsuario_idUsuario`) REFERENCES `tipousuario` (`idTipoUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO usuario VALUES("1","Marco","Ortega","Ariza","7774110709","jrof2a1995@gmail.com","5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5","2020-08-27","","0","1");
INSERT INTO usuario VALUES("3","Jesus Jordi","Carpio","Ariza","7774110707","gsonsolesx6@yopmail.com","5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5","2020-08-29","","0","4");
INSERT INTO usuario VALUES("5","Marco","Mena","Landa","7774110709","jro2a1995@gmail.com","03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4","2020-09-04","","0","2");
INSERT INTO usuario VALUES("18","bbb","bbbb","bbbb","7774110709","hdrleonelr3@yopmail.com","a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3","2020-09-12","","0","1");
INSERT INTO usuario VALUES("19","Alvaro","Ceron","Ferreriro","7774110709","codam6@keinmail.com","a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3","2020-09-12","","0","1");
INSERT INTO usuario VALUES("20","Antonio","Benjamin","Lopez","7774110709","antonio_mena70@gmail.com","5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5","2020-10-15","Captura.png","0","2");
INSERT INTO usuario VALUES("23","Israel","Campos","Ortega","7774110710","prueaba@gmail.com","5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5","2020-10-16","","0","2");
INSERT INTO usuario VALUES("26","jesus","rubio ","ariza","7774111415","hola@hotmail.com","03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4","2020-10-17","","0","2");
INSERT INTO usuario VALUES("29","Marco","Mena","Landa","7774110709","carpio@gmail.com","5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5","2020-10-17","","1","2");
INSERT INTO usuario VALUES("30","Jesus ","Rubio","Ariza","777123456","jesus20@gmail.com","5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5","2020-10-25","","0","2");
INSERT INTO usuario VALUES("31","Marco","Montaño","Ariza","7774110709","prueba@gmail.com","a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3","2020-10-25","","0","2");
INSERT INTO usuario VALUES("33","Areli","Ocampo","Ariza","7774110709","prueba2@gmail.com","5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5","2020-10-24","","0","3");
INSERT INTO usuario VALUES("34","Marco","Montaño","Lopez","7774110709","soporte@gmail.com","5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5","2020-11-03","","0","3");
INSERT INTO usuario VALUES("35","Nuevo","Gomez","Carvajal","7774110709","prueba34@gmail.com","5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5","2020-11-12","","0","2");
INSERT INTO usuario VALUES("36","Marco","Antonio ","Mena","7774110709","prueba48@gmail.com","5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5","2020-11-12","","0","3");
INSERT INTO usuario VALUES("39","erubiel","habila","camacho","7771655657","antoknio_mena70@gmail.com","5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5","2020-11-17","238082.jpg","0","2");
INSERT INTO usuario VALUES("41","kenji","luis","mena ","7771655657","ken@gmail.com","5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5","2020-11-21","67547.jpg","0","2");
INSERT INTO usuario VALUES("44","marco","mena","lana","7771655657","marco@gmail.com","5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5","2020-11-21","tree-736885__340.webp","0","2");

