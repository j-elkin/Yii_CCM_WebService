INSERT IGNORE INTO `ccm` (`idCCM`, `ciudad`, `direccion`, `telefono`, `fecha_inicio`, `fecha_fin`) VALUES
(1, 'Manizales, Caldas - Colombia', 'Cra 23 # 65-70', '8747841', '2015-06-08', '2015-06-25');







INSERT IGNORE INTO `institucion` (`idinstitucion`, `nombre`, `pais`, `ciudad`) VALUES
(1, 'Universidad Nacional de Colombia', 'Colombia', 'Manizales'),
(2, 'MIT', 'Estados Unidos', 'Cambridge, Massachusetts');





INSERT IGNORE INTO `tipo_area` (`idtipo_area`, `tipo_area`) VALUES
(1, 'Álgebra, Combinatoria, Teoría Números'),
(2, 'Análisis y Ecuaciones Diferenciales'),
(3, 'Educación, Hist, Filosofía de las Matemáticas'),
(4, 'Geometría y Topología'),
(5, 'Lógica'),
(6, 'Matemática Aplicada');



INSERT IGNORE INTO `tipo_doc` (`idtipo_doc`, `tipo_documento`) VALUES
(1, 'Cédula de Ciudadanía'),
(2, 'Cédula de Extranjería'),
(3, 'Pasaporte'),
(4, 'Tarjeta de Identidad');



INSERT IGNORE INTO `tipo_evento` (`idtipo_evento`, `tipo_evento`) VALUES
(1, 'Plenaria'),
(2, 'Semiplenaria'),
(3, 'Cursillo'),
(4, 'Presentación Posters');



INSERT IGNORE INTO `tipo_persona` (`idtipo_persona`, `tipo_persona`) VALUES
(1, 'Conferencista'),
(2, 'Plenarista'),
(3, 'Semiplenarista'),
(4, 'Asistente');


INSERT INTO `pais_procedencia`(`idpais_procedencia`, `nombre`) VALUES 
(1,'Colombia'), 
(2,'USA');



INSERT IGNORE INTO `evento` (`idevento`, `nombre`, `descripcion`, `tipo_evento_idtipo_evento`, `CCM_idCCM`, `tipo_area_idtipo_area`) VALUES
(6, 'Evento Lunes 20 Algebra P202', 'Evento Lunes 20 Algebra de prueba', 2, 1, 1),
(7, 'Evento Lunes 20 Algebra 10 AM P202', 'Evento Lunes 20 Algebra 10 AM PRUEBA', 2, 1, 1),
(8, 'Evento Lunes 20 Ecuaciones 8 AM', 'Evento Lunes 20 Ecuaciones 8 AM prueba', 1, 1, 2),
(9, 'Evento Martes 21 ALGEBRA 9:30 Salon x', 'Evento Martes 21 ALGEBRA 9:30 Salon x prueba', 3, 1, 1),
(10, 'Evento Martes 21 Ecuaciones 9:20 Audit', 'Evento Martes 21 Ecuaciones 9:20 Audit prueba', 1, 1, 2),
(11, 'Evento Martes 21 Ecuaciones 10:00 Audit', 'Evento Martes 21 Ecuaciones 10:00 Audit prueba', 1, 1, 2),
(12, 'Evento Miercoles 22 Algebra 8:00 P202', 'Evento Miercoles 22 Algebra 8:00 P202 prueba', 2, 1, 1);




INSERT IGNORE INTO `ubicacion` (`idubicacion`, `hora_inicio`, `hora_fin`, `lugar`, `limite_cupos`, `fecha`, `evento_idevento`) VALUES
(5, '08:00:00', '09:30:00', 'P202', 0, '2015-07-20', 6),
(6, '10:00:00', '11:00:00', 'P202', 0, '2015-07-20', 7),
(7, '08:00:00', '09:00:00', 'Auditorio', 0, '2015-07-20', 8),
(8, '09:30:00', '10:30:00', 'Salon X', 0, '2015-07-21', 9),
(9, '09:20:00', '10:20:00', 'Auditorio', 0, '2015-07-21', 10),
(10, '10:00:00', '11:00:00', 'Auditorio', 0, '2015-07-21', 11),
(11, '08:00:00', '09:00:00', 'P202', 0, '2015-07-22', 12);



INSERT IGNORE INTO `persona` (`docPersona`, `nombre`, `apellidos`, `genero`, `fecha_nacimiento`, `correo_electronico`, `telefono`, `codigo_qr`, `tipo_doc_idtipo_doc`, `pais_procedencia_idpais_procedencia`, `institucion_idinstitucion`) VALUES
(35, 'OWEN', 'CA', 'Masculino', '2015-06-10', 'ad@g.com', '5432', 'uploads/35.png', 3, 1, 1),
(2443, 'Deisy', 'CastaNo', 'Femenino', '2015-06-06', 'desisy@gmail.com', '45256', NULL, 2, 2, 2),
(4624, 'Herman', 'AlarcOn', 'Masculino', '2015-06-17', 'herman@gmail.com', '3146257865', NULL, 1, 1, 1),
(108936862, 'Viviana', 'Pelaez', 'Femenino', '1981-07-16', 'vivi43@gmail.com', '5678987', 'uploads/108936862.png', 3, 2, 2),
(1053832644, 'Santiago', 'Cespedez', 'Masculino', '1994-02-15', 'santi@unal.edu.co', '3153770534', NULL, 1, 1, 1),
(1089720010, 'John', 'RendOn', 'Masculino', '1992-09-13', 'joerendonro@unal.edu.co', '3113109222', 'uploads/1089720010.png', 1, 1, 1),
(2147483647, 'Braian', 'Connor', 'Masculino', '2015-06-09', 'conor@gmail.com', '35753765', 'uploads/2147483647.jpg', 2, 2, 2);