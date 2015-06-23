-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-06-2015 a las 17:35:51
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ccm_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almuerzo`
--

CREATE TABLE IF NOT EXISTS `almuerzo` (
`idAlmuerzo` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `persona_docPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ccm`
--

CREATE TABLE IF NOT EXISTS `ccm` (
`idCCM` int(11) NOT NULL,
  `ciudad` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ccm`
--

INSERT INTO `ccm` (`idCCM`, `ciudad`, `direccion`, `telefono`, `fecha_inicio`, `fecha_fin`) VALUES
(1, 'Manizales, Caldas - Colombia', 'Cra 23 # 65-70', '8747841', '2015-06-08', '2015-06-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
`idevento` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(1000) DEFAULT NULL,
  `tipo_evento_idtipo_evento` int(11) NOT NULL,
  `CCM_idCCM` int(11) NOT NULL,
  `tipo_area_idtipo_area` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`idevento`, `nombre`, `descripcion`, `tipo_evento_idtipo_evento`, `CCM_idCCM`, `tipo_area_idtipo_area`) VALUES
(1, 'Congreso de Matemáticas', 'Se realiza el primer congreso de mate en la UNAL sede Manizales Campus la Nubia', 1, 1, 1),
(2, 'TIC', 'Tecnologías de la Información y la Computación', 3, 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion`
--

CREATE TABLE IF NOT EXISTS `institucion` (
`idinstitucion` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `pais` varchar(45) NOT NULL,
  `ciudad` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `institucion`
--

INSERT INTO `institucion` (`idinstitucion`, `nombre`, `pais`, `ciudad`) VALUES
(1, 'Universidad Nacional de Colombia', 'Colombia', 'Manizales'),
(2, 'MIT', 'Estados Unidos', 'Cambridge, Massachusetts');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `memoria`
--

CREATE TABLE IF NOT EXISTS `memoria` (
`idmemoria` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(1000) DEFAULT NULL,
  `archivo` varchar(200) NOT NULL,
  `evento_idevento` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `memoria`
--

INSERT INTO `memoria` (`idmemoria`, `nombre`, `descripcion`, `archivo`, `evento_idevento`) VALUES
(8, 'EXPORta', 'ESTA ES LA MEMO', '8_Memoria CCM 1.pdf', 1),
(9, 'Ponencia 3', 'Se prensento...', '9_Memoria_Ponencia.pdf', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais_procedencia`
--

CREATE TABLE IF NOT EXISTS `pais_procedencia` (
`idpais_procedencia` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pais_procedencia`
--

INSERT INTO `pais_procedencia` (`idpais_procedencia`, `nombre`) VALUES
(1, 'Colombia'),
(2, 'Estados Unidos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
  `docPersona` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `genero` varchar(45) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `correo_electronico` varchar(45) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `codigo_qr` varchar(200) DEFAULT NULL,
  `tipo_doc_idtipo_doc` int(11) NOT NULL,
  `pais_procedencia_idpais_procedencia` int(11) NOT NULL,
  `institucion_idinstitucion` int(11) NOT NULL,
  `tipo_persona_idtipo_persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`docPersona`, `nombre`, `apellidos`, `genero`, `fecha_nacimiento`, `correo_electronico`, `telefono`, `codigo_qr`, `tipo_doc_idtipo_doc`, `pais_procedencia_idpais_procedencia`, `institucion_idinstitucion`, `tipo_persona_idtipo_persona`) VALUES
(35, 'OWEN', 'CA', 'Masculino', '2015-06-10', 'ad@g.com', '5432', 'uploads/35.png', 3, 1, 1, 1),
(2443, 'Deisy', 'Castaño', 'Femenino', '2015-06-06', 'desisy@gmail.com', '45256', NULL, 2, 2, 2, 2),
(4624, 'Herman', 'Alarcón', 'Masculino', '2015-06-17', 'herman@gmail.com', '3146257865', NULL, 1, 1, 1, 1),
(108936862, 'Viviana', 'Pelaez', 'Femenino', '1981-07-16', 'vivi43@gmail.com', '5678987', 'uploads/108936862.png', 3, 2, 2, 3),
(1053832644, 'Santiago', 'Cespedez', 'Masculino', '1994-02-15', 'santi@unal.edu.co', '3153770534', NULL, 1, 1, 1, 1),
(1089720010, 'John', 'Rendón', 'Masculino', '1992-09-13', 'joerendonro@unal.edu.co', '3113109222', 'uploads/1089720010.png', 1, 1, 1, 1),
(2147483647, 'Braian', 'Connor', 'Masculino', '2015-06-09', 'conor@gmail.com', '35753765', 'uploads/2147483647.jpg', 2, 2, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `per_evt`
--

CREATE TABLE IF NOT EXISTS `per_evt` (
  `evento_idevento` int(11) NOT NULL,
  `persona_idpersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `per_evt`
--

INSERT INTO `per_evt` (`evento_idevento`, `persona_idpersona`) VALUES
(1, 35),
(1, 1089720010),
(2, 1089720010);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_area`
--

CREATE TABLE IF NOT EXISTS `tipo_area` (
`idtipo_area` int(11) NOT NULL,
  `tipo_area` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_area`
--

INSERT INTO `tipo_area` (`idtipo_area`, `tipo_area`) VALUES
(1, 'Álgebra, Combinatoria, Teoría Números'),
(2, 'Análisis y Ecuaciones Diferenciales'),
(3, 'Educación, Hist, Filosofía de las Matemáticas'),
(4, 'Geometría y Topología'),
(5, 'Lógica'),
(6, 'Matemática Aplicada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_doc`
--

CREATE TABLE IF NOT EXISTS `tipo_doc` (
`idtipo_doc` int(11) NOT NULL,
  `tipo_documento` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_doc`
--

INSERT INTO `tipo_doc` (`idtipo_doc`, `tipo_documento`) VALUES
(1, 'Cédula de Ciudadanía'),
(2, 'Cédula de Extranjería'),
(3, 'Pasaporte'),
(4, 'Tarjeta de Identidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_evento`
--

CREATE TABLE IF NOT EXISTS `tipo_evento` (
`idtipo_evento` int(11) NOT NULL,
  `tipo_evento` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_evento`
--

INSERT INTO `tipo_evento` (`idtipo_evento`, `tipo_evento`) VALUES
(1, 'Plenaria'),
(2, 'Semiplenaria'),
(3, 'Cursillo'),
(4, 'Presentación Posters');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_persona`
--

CREATE TABLE IF NOT EXISTS `tipo_persona` (
`idtipo_persona` int(11) NOT NULL,
  `tipo_persona` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_persona`
--

INSERT INTO `tipo_persona` (`idtipo_persona`, `tipo_persona`) VALUES
(1, 'Conferencista'),
(2, 'Plenarista'),
(3, 'Semiplenarista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE IF NOT EXISTS `ubicacion` (
`idubicacion` int(11) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `lugar` varchar(45) NOT NULL,
  `fecha` date DEFAULT NULL,
  `evento_idevento` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ubicacion`
--

INSERT INTO `ubicacion` (`idubicacion`, `hora_inicio`, `hora_fin`, `lugar`, `fecha`, `evento_idevento`) VALUES
(1, '04:12:03', '07:00:00', 'Campus la Nubia', '2015-06-18', 1),
(2, '01:00:00', '05:30:00', 'Campus palogrande', '2015-06-11', 1),
(3, '14:00:00', '16:00:00', 'Campus palogrande', '2015-07-23', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almuerzo`
--
ALTER TABLE `almuerzo`
 ADD PRIMARY KEY (`idAlmuerzo`), ADD KEY `fk_Almuerzo_persona1_idx` (`persona_docPersona`);

--
-- Indices de la tabla `ccm`
--
ALTER TABLE `ccm`
 ADD PRIMARY KEY (`idCCM`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
 ADD PRIMARY KEY (`idevento`), ADD KEY `fk_evento_tipo_evento_idx` (`tipo_evento_idtipo_evento`), ADD KEY `fk_evento_CCM1_idx` (`CCM_idCCM`), ADD KEY `fk_evento_tipo_area1_idx` (`tipo_area_idtipo_area`);

--
-- Indices de la tabla `institucion`
--
ALTER TABLE `institucion`
 ADD PRIMARY KEY (`idinstitucion`);

--
-- Indices de la tabla `memoria`
--
ALTER TABLE `memoria`
 ADD PRIMARY KEY (`idmemoria`), ADD KEY `fk_memoria_evento1_idx` (`evento_idevento`);

--
-- Indices de la tabla `pais_procedencia`
--
ALTER TABLE `pais_procedencia`
 ADD PRIMARY KEY (`idpais_procedencia`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
 ADD PRIMARY KEY (`docPersona`), ADD KEY `fk_persona_tipo_doc1_idx` (`tipo_doc_idtipo_doc`), ADD KEY `fk_persona_institucion1_idx` (`institucion_idinstitucion`), ADD KEY `fk_persona_tipo_persona1_idx` (`tipo_persona_idtipo_persona`), ADD KEY `fk_persona_pais_procedencia1_idx` (`pais_procedencia_idpais_procedencia`);

--
-- Indices de la tabla `per_evt`
--
ALTER TABLE `per_evt`
 ADD PRIMARY KEY (`evento_idevento`,`persona_idpersona`), ADD KEY `fk_evento_has_persona_persona1_idx` (`persona_idpersona`), ADD KEY `fk_evento_has_persona_evento1_idx` (`evento_idevento`);

--
-- Indices de la tabla `tipo_area`
--
ALTER TABLE `tipo_area`
 ADD PRIMARY KEY (`idtipo_area`);

--
-- Indices de la tabla `tipo_doc`
--
ALTER TABLE `tipo_doc`
 ADD PRIMARY KEY (`idtipo_doc`);

--
-- Indices de la tabla `tipo_evento`
--
ALTER TABLE `tipo_evento`
 ADD PRIMARY KEY (`idtipo_evento`);

--
-- Indices de la tabla `tipo_persona`
--
ALTER TABLE `tipo_persona`
 ADD PRIMARY KEY (`idtipo_persona`);

--
-- Indices de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
 ADD PRIMARY KEY (`idubicacion`), ADD KEY `fk_ubicacion_evento1_idx` (`evento_idevento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almuerzo`
--
ALTER TABLE `almuerzo`
MODIFY `idAlmuerzo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ccm`
--
ALTER TABLE `ccm`
MODIFY `idCCM` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
MODIFY `idevento` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `institucion`
--
ALTER TABLE `institucion`
MODIFY `idinstitucion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `memoria`
--
ALTER TABLE `memoria`
MODIFY `idmemoria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `pais_procedencia`
--
ALTER TABLE `pais_procedencia`
MODIFY `idpais_procedencia` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_area`
--
ALTER TABLE `tipo_area`
MODIFY `idtipo_area` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tipo_doc`
--
ALTER TABLE `tipo_doc`
MODIFY `idtipo_doc` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tipo_evento`
--
ALTER TABLE `tipo_evento`
MODIFY `idtipo_evento` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tipo_persona`
--
ALTER TABLE `tipo_persona`
MODIFY `idtipo_persona` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
MODIFY `idubicacion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `almuerzo`
--
ALTER TABLE `almuerzo`
ADD CONSTRAINT `fk_Almuerzo_persona1` FOREIGN KEY (`persona_docPersona`) REFERENCES `persona` (`docPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
ADD CONSTRAINT `fk_evento_CCM1` FOREIGN KEY (`CCM_idCCM`) REFERENCES `ccm` (`idCCM`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_evento_tipo_area1` FOREIGN KEY (`tipo_area_idtipo_area`) REFERENCES `tipo_area` (`idtipo_area`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_evento_tipo_evento` FOREIGN KEY (`tipo_evento_idtipo_evento`) REFERENCES `tipo_evento` (`idtipo_evento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `memoria`
--
ALTER TABLE `memoria`
ADD CONSTRAINT `fk_memoria_evento1` FOREIGN KEY (`evento_idevento`) REFERENCES `evento` (`idevento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
ADD CONSTRAINT `fk_persona_institucion1` FOREIGN KEY (`institucion_idinstitucion`) REFERENCES `institucion` (`idinstitucion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_persona_pais_procedencia1` FOREIGN KEY (`pais_procedencia_idpais_procedencia`) REFERENCES `pais_procedencia` (`idpais_procedencia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_persona_tipo_doc1` FOREIGN KEY (`tipo_doc_idtipo_doc`) REFERENCES `tipo_doc` (`idtipo_doc`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_persona_tipo_persona1` FOREIGN KEY (`tipo_persona_idtipo_persona`) REFERENCES `tipo_persona` (`idtipo_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `per_evt`
--
ALTER TABLE `per_evt`
ADD CONSTRAINT `fk_evento_has_persona_evento1` FOREIGN KEY (`evento_idevento`) REFERENCES `evento` (`idevento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_evento_has_persona_persona1` FOREIGN KEY (`persona_idpersona`) REFERENCES `persona` (`docPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
ADD CONSTRAINT `fk_ubicacion_evento1` FOREIGN KEY (`evento_idevento`) REFERENCES `evento` (`idevento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
