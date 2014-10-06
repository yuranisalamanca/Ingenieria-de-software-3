-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-10-2014 a las 04:43:41
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `colciencias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area_conocimiento`
--

CREATE TABLE IF NOT EXISTS `area_conocimiento` (
`idarea_conocimiento` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `area_conocimiento`
--

INSERT INTO `area_conocimiento` (`idarea_conocimiento`, `nombre`) VALUES
(1, 'Ingeniería Civil'),
(2, 'Ingeniería de Minas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE IF NOT EXISTS `ciudad` (
`idCiudad` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Pais_idPais` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`idCiudad`, `Nombre`, `Pais_idPais`) VALUES
(3, 'Armenia', 1),
(4, 'Lima', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convocatoria`
--

CREATE TABLE IF NOT EXISTS `convocatoria` (
`idConvocatoria` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `Tipo_convocatoria_idTipo_convocatoria` int(11) NOT NULL,
  `Estado_idEstado` int(11) NOT NULL,
  `Parametros_evaluacion_idParametros_evaluacion` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `convocatoria`
--

INSERT INTO `convocatoria` (`idConvocatoria`, `nombre`, `Tipo_convocatoria_idTipo_convocatoria`, `Estado_idEstado`, `Parametros_evaluacion_idParametros_evaluacion`) VALUES
(1, 'Tanque de pensamientos en TIC', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `criterio`
--

CREATE TABLE IF NOT EXISTS `criterio` (
`idCriterio` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `puntaje_maximo` varchar(45) DEFAULT NULL,
  `esRegistradoPorEvaluador` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
`idEstado` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`idEstado`, `Nombre`) VALUES
(1, 'Abierta'),
(2, 'Cerrada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_propuesta`
--

CREATE TABLE IF NOT EXISTS `estado_propuesta` (
`idEstado_propuesta` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `estado_propuesta`
--

INSERT INTO `estado_propuesta` (`idEstado_propuesta`, `Nombre`) VALUES
(1, 'Pendiente de evaluar'),
(2, 'En evaluacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion_final`
--

CREATE TABLE IF NOT EXISTS `evaluacion_final` (
`idevaluacion_final` int(11) NOT NULL,
  `calificacion_final` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion_propuesta`
--

CREATE TABLE IF NOT EXISTS `evaluacion_propuesta` (
`idevaluacion_propuesta` int(11) NOT NULL,
  `fecha_inicial` date DEFAULT NULL,
  `fecha_final` date DEFAULT NULL,
  `esAsignado` char(1) DEFAULT NULL,
  `esConfirmado` char(1) DEFAULT NULL,
  `Ciudad_idCiudad` int(11) NOT NULL,
  `Evaluacion_final_idevaluacion_final` int(11) DEFAULT NULL,
  `Evaluador_idEvaluador` int(11) NOT NULL,
  `Propuesta_idPropuesta` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `evaluacion_propuesta`
--

INSERT INTO `evaluacion_propuesta` (`idevaluacion_propuesta`, `fecha_inicial`, `fecha_final`, `esAsignado`, `esConfirmado`, `Ciudad_idCiudad`, `Evaluacion_final_idevaluacion_final`, `Evaluador_idEvaluador`, `Propuesta_idPropuesta`) VALUES
(13, NULL, NULL, NULL, NULL, 3, NULL, 4, 1),
(14, NULL, NULL, NULL, NULL, 3, NULL, 5, 1),
(15, NULL, NULL, NULL, '1', 3, NULL, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluador`
--

CREATE TABLE IF NOT EXISTS `evaluador` (
`idEvaluador` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `cedula` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `correo_electronico` varchar(45) DEFAULT NULL,
  `experiencia` varchar(45) DEFAULT NULL,
  `calificacion` varchar(45) DEFAULT NULL,
  `contraseña` varchar(45) DEFAULT NULL,
  `Ciudad_idCiudad` int(11) NOT NULL,
  `Nivel_Formacion_idNivel_Formacion` int(11) NOT NULL,
  `idioma_ididioma` int(11) NOT NULL,
  `area_conocimiento_idarea_conocimiento` int(11) NOT NULL,
  `Organizacion_idOrganizacion` int(11) NOT NULL,
  `Convocatoria_idConvocatoria` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `evaluador`
--

INSERT INTO `evaluador` (`idEvaluador`, `nombre`, `cedula`, `direccion`, `telefono`, `correo_electronico`, `experiencia`, `calificacion`, `contraseña`, `Ciudad_idCiudad`, `Nivel_Formacion_idNivel_Formacion`, `idioma_ididioma`, `area_conocimiento_idarea_conocimiento`, `Organizacion_idOrganizacion`, `Convocatoria_idConvocatoria`) VALUES
(1, 'Daniel Enciso Arias', '1094906613', 'calle 20', '3148234100', 'danielencisoarias@gmail.com', '5 meses', '8', 'danielenciso', 3, 1, 1, 2, 1, 1),
(2, 'Karen Ramirez Montoya', '1094945927', 'calle 30', '3135460941', 'karendarm12@gmail.com', '4 meses', '8', 'karenramirezmontoya', 3, 1, 1, 2, 1, 1),
(3, 'vladimir enciso arias', '9863538', 'calle 40', '3208347939', 'vladimirencisoarias@yahoo.com', '2 años', '8', 'vladimirencisoarias', 3, 1, 1, 2, 1, 1),
(4, 'diana ramirez montoya', '1094974873', 'calle 50', '3135839372', 'dianaramirezmontoya@yahoo.com', '1 mes', '8', 'dianaramirezmontoya', 3, 1, 1, 2, 1, 1),
(5, 'dora montoya', '41912772', 'calle 50', '3135483928', 'doramontoya@yahoo.com', '10 años', '7', 'doramontoya', 3, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluador_has_panel`
--

CREATE TABLE IF NOT EXISTS `evaluador_has_panel` (
  `Evaluador_idEvaluador` int(11) NOT NULL,
  `Panel_idPanel` int(11) NOT NULL,
  `Rol_idRol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario_evaluacion`
--

CREATE TABLE IF NOT EXISTS `formulario_evaluacion` (
`idFormulario_evaluacion` int(11) NOT NULL,
  `puntaje_maximo_evaluacion` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `tipo_calificacion_idtipo_calificacion` int(11) NOT NULL,
  `Convocatoria_idConvocatoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario_evaluacion_has_criterio`
--

CREATE TABLE IF NOT EXISTS `formulario_evaluacion_has_criterio` (
  `Formulario_evaluacion_idFormulario_evaluacion` int(11) NOT NULL,
  `Criterio_idCriterio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario_evaluacion_has_preguntas_orientadoras`
--

CREATE TABLE IF NOT EXISTS `formulario_evaluacion_has_preguntas_orientadoras` (
  `Formulario_evaluacion_idFormulario_evaluacion` int(11) NOT NULL,
  `Preguntas_orientadoras_idPreguntas_orientadoras` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idioma`
--

CREATE TABLE IF NOT EXISTS `idioma` (
`ididioma` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `idioma`
--

INSERT INTO `idioma` (`ididioma`, `nombre`) VALUES
(1, 'español'),
(2, 'ingles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion`
--

CREATE TABLE IF NOT EXISTS `institucion` (
`idInstitucion` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `institucion`
--

INSERT INTO `institucion` (`idInstitucion`, `Nombre`, `Descripcion`) VALUES
(1, 'Sinfoci', 'Dahhh');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea_tematica`
--

CREATE TABLE IF NOT EXISTS `linea_tematica` (
`idLinea_tematica` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `linea_tematica`
--

INSERT INTO `linea_tematica` (`idLinea_tematica`, `Nombre`) VALUES
(1, 'Biotecnología');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_formacion`
--

CREATE TABLE IF NOT EXISTS `nivel_formacion` (
`idNivel_Formacion` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `nivel_formacion`
--

INSERT INTO `nivel_formacion` (`idNivel_Formacion`, `Nombre`) VALUES
(1, 'Pregrado'),
(2, 'Maestría'),
(3, 'Especialización'),
(4, 'Doctorado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `organizacion`
--

CREATE TABLE IF NOT EXISTS `organizacion` (
`idOrganizacion` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `organizacion`
--

INSERT INTO `organizacion` (`idOrganizacion`, `Nombre`, `Descripcion`) VALUES
(1, 'Uniquindio', 'La U');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE IF NOT EXISTS `pais` (
`idPais` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`idPais`, `Nombre`) VALUES
(1, 'Colombia'),
(2, 'Peru');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `panel`
--

CREATE TABLE IF NOT EXISTS `panel` (
`idPanel` int(11) NOT NULL,
  `fecha_realizacion` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `Ciudad_idCiudad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametros_evaluacion`
--

CREATE TABLE IF NOT EXISTS `parametros_evaluacion` (
`idParametros_evaluacion` int(11) NOT NULL,
  `fecha_inicio_evaluacion` varchar(45) DEFAULT NULL,
  `fecha_final_evaluacion` varchar(45) DEFAULT NULL,
  `fecha_inicio_reclamacion` varchar(45) DEFAULT NULL,
  `fecha_fina_reclamacion` varchar(45) DEFAULT NULL,
  `nro_dias_evaluar` varchar(45) DEFAULT NULL,
  `puntaje_minimo_elegibles` varchar(45) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `parametros_evaluacion`
--

INSERT INTO `parametros_evaluacion` (`idParametros_evaluacion`, `fecha_inicio_evaluacion`, `fecha_final_evaluacion`, `fecha_inicio_reclamacion`, `fecha_fina_reclamacion`, `nro_dias_evaluar`, `puntaje_minimo_elegibles`) VALUES
(1, '04/10/14', '06/10/14', '07/10/14', '10/10/14', '5', '3.0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas_orientadoras`
--

CREATE TABLE IF NOT EXISTS `preguntas_orientadoras` (
`idPreguntas_orientadoras` int(11) NOT NULL,
  `pregunta` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proponente`
--

CREATE TABLE IF NOT EXISTS `proponente` (
`idProponente` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `correo_electronico` varchar(45) DEFAULT NULL,
  `cedula` varchar(45) DEFAULT NULL,
  `Ciudad_idCiudad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propuesta`
--

CREATE TABLE IF NOT EXISTS `propuesta` (
`idPropuesta` int(11) NOT NULL,
  `titulo` varchar(45) DEFAULT NULL,
  `resumen` varchar(45) DEFAULT NULL,
  `enlace_a_propuesta` varchar(45) DEFAULT NULL,
  `grupos_asociados` varchar(45) DEFAULT NULL,
  `enlace_terminos_referencia` varchar(45) DEFAULT NULL,
  `Organizacion_idOrganizacion` int(11) NOT NULL,
  `Institucion_idInstitucion` int(11) NOT NULL,
  `tipo_evaluacion_idtipo_evaluacion` int(11) NOT NULL,
  `Ciudad_idCiudad` int(11) NOT NULL,
  `Convocatoria_idConvocatoria` int(11) NOT NULL,
  `Estado_propuesta_idEstado_propuesta` int(11) NOT NULL,
  `area_conocimiento_idarea_conocimiento` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `propuesta`
--

INSERT INTO `propuesta` (`idPropuesta`, `titulo`, `resumen`, `enlace_a_propuesta`, `grupos_asociados`, `enlace_terminos_referencia`, `Organizacion_idOrganizacion`, `Institucion_idInstitucion`, `tipo_evaluacion_idtipo_evaluacion`, `Ciudad_idCiudad`, `Convocatoria_idConvocatoria`, `Estado_propuesta_idEstado_propuesta`, `area_conocimiento_idarea_conocimiento`) VALUES
(1, 'Tanque de pensamiento de TIC', 'Es un tanque que piensa en TIC', NULL, 'SINFOCI', NULL, 1, 1, 3, 3, 1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recomendacion`
--

CREATE TABLE IF NOT EXISTS `recomendacion` (
`idRecomendacion` int(11) NOT NULL,
  `justificacion` varchar(45) DEFAULT NULL,
  `Tipo_recomendacion_idTipo_recomendacion` int(11) NOT NULL,
  `Propuesta_idPropuesta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
`idRol` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcriterios`
--

CREATE TABLE IF NOT EXISTS `subcriterios` (
`idSubcriterios` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `esRegistradoPorEvaluador` char(1) DEFAULT NULL,
  `Criterio_idCriterio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_calificacion`
--

CREATE TABLE IF NOT EXISTS `tipo_calificacion` (
`idtipo_calificacion` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_convocatoria`
--

CREATE TABLE IF NOT EXISTS `tipo_convocatoria` (
`idTipo_convocatoria` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tipo_convocatoria`
--

INSERT INTO `tipo_convocatoria` (`idTipo_convocatoria`, `nombre`) VALUES
(1, 'Recuperacion contingente ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_evaluacion`
--

CREATE TABLE IF NOT EXISTS `tipo_evaluacion` (
`idtipo_evaluacion` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Parametros_evaluacion_idParametros_evaluacion` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tipo_evaluacion`
--

INSERT INTO `tipo_evaluacion` (`idtipo_evaluacion`, `Nombre`, `Parametros_evaluacion_idParametros_evaluacion`) VALUES
(3, 'Panel', 1),
(4, 'Par Evaluador', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_recomendacion`
--

CREATE TABLE IF NOT EXISTS `tipo_recomendacion` (
`idTipo_recomendacion` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area_conocimiento`
--
ALTER TABLE `area_conocimiento`
 ADD PRIMARY KEY (`idarea_conocimiento`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
 ADD PRIMARY KEY (`idCiudad`), ADD KEY `fk_Ciudad_Pais1` (`Pais_idPais`);

--
-- Indices de la tabla `convocatoria`
--
ALTER TABLE `convocatoria`
 ADD PRIMARY KEY (`idConvocatoria`), ADD KEY `fk_Convocatoria_Tipo_convocatoria1` (`Tipo_convocatoria_idTipo_convocatoria`), ADD KEY `fk_Convocatoria_Estado1` (`Estado_idEstado`), ADD KEY `fk_Convocatoria_Parametros_evaluacion1` (`Parametros_evaluacion_idParametros_evaluacion`);

--
-- Indices de la tabla `criterio`
--
ALTER TABLE `criterio`
 ADD PRIMARY KEY (`idCriterio`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
 ADD PRIMARY KEY (`idEstado`);

--
-- Indices de la tabla `estado_propuesta`
--
ALTER TABLE `estado_propuesta`
 ADD PRIMARY KEY (`idEstado_propuesta`);

--
-- Indices de la tabla `evaluacion_final`
--
ALTER TABLE `evaluacion_final`
 ADD PRIMARY KEY (`idevaluacion_final`);

--
-- Indices de la tabla `evaluacion_propuesta`
--
ALTER TABLE `evaluacion_propuesta`
 ADD PRIMARY KEY (`idevaluacion_propuesta`), ADD UNIQUE KEY `Evaluacion_final_idevaluacion_final_UNIQUE` (`Evaluacion_final_idevaluacion_final`), ADD KEY `fk_evaluacion_propuesta_Ciudad1` (`Ciudad_idCiudad`), ADD KEY `fk_Evaluacion_propuesta_Evaluacion_final1` (`Evaluacion_final_idevaluacion_final`), ADD KEY `fk_Evaluacion_propuesta_Evaluador1` (`Evaluador_idEvaluador`), ADD KEY `fk_Evaluacion_propuesta_Propuesta1` (`Propuesta_idPropuesta`);

--
-- Indices de la tabla `evaluador`
--
ALTER TABLE `evaluador`
 ADD PRIMARY KEY (`idEvaluador`), ADD KEY `fk_Evaluador_Ciudad1` (`Ciudad_idCiudad`), ADD KEY `fk_Evaluador_Nivel_Formacion1` (`Nivel_Formacion_idNivel_Formacion`), ADD KEY `fk_Evaluador_idioma1` (`idioma_ididioma`), ADD KEY `fk_Evaluador_area_conocimiento1` (`area_conocimiento_idarea_conocimiento`), ADD KEY `fk_Evaluador_Organizacion1` (`Organizacion_idOrganizacion`), ADD KEY `fk_Evaluador_Convocatoria1` (`Convocatoria_idConvocatoria`);

--
-- Indices de la tabla `evaluador_has_panel`
--
ALTER TABLE `evaluador_has_panel`
 ADD PRIMARY KEY (`Evaluador_idEvaluador`,`Panel_idPanel`), ADD KEY `fk_Evaluador_has_Panel_Panel1` (`Panel_idPanel`), ADD KEY `fk_Evaluador_has_Panel_Rol1` (`Rol_idRol`);

--
-- Indices de la tabla `formulario_evaluacion`
--
ALTER TABLE `formulario_evaluacion`
 ADD PRIMARY KEY (`idFormulario_evaluacion`), ADD KEY `fk_Formulario_evaluacion_tipo_calificacion1` (`tipo_calificacion_idtipo_calificacion`), ADD KEY `fk_Formulario_evaluacion_Convocatoria1` (`Convocatoria_idConvocatoria`);

--
-- Indices de la tabla `formulario_evaluacion_has_criterio`
--
ALTER TABLE `formulario_evaluacion_has_criterio`
 ADD PRIMARY KEY (`Formulario_evaluacion_idFormulario_evaluacion`,`Criterio_idCriterio`), ADD KEY `fk_Formulario_evaluacion_has_Criterio_Criterio1` (`Criterio_idCriterio`);

--
-- Indices de la tabla `formulario_evaluacion_has_preguntas_orientadoras`
--
ALTER TABLE `formulario_evaluacion_has_preguntas_orientadoras`
 ADD PRIMARY KEY (`Formulario_evaluacion_idFormulario_evaluacion`,`Preguntas_orientadoras_idPreguntas_orientadoras`), ADD KEY `fk_Formulario_evaluacion_has_Preguntas_orientadoras_Preguntas1` (`Preguntas_orientadoras_idPreguntas_orientadoras`);

--
-- Indices de la tabla `idioma`
--
ALTER TABLE `idioma`
 ADD PRIMARY KEY (`ididioma`);

--
-- Indices de la tabla `institucion`
--
ALTER TABLE `institucion`
 ADD PRIMARY KEY (`idInstitucion`);

--
-- Indices de la tabla `linea_tematica`
--
ALTER TABLE `linea_tematica`
 ADD PRIMARY KEY (`idLinea_tematica`);

--
-- Indices de la tabla `nivel_formacion`
--
ALTER TABLE `nivel_formacion`
 ADD PRIMARY KEY (`idNivel_Formacion`);

--
-- Indices de la tabla `organizacion`
--
ALTER TABLE `organizacion`
 ADD PRIMARY KEY (`idOrganizacion`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
 ADD PRIMARY KEY (`idPais`);

--
-- Indices de la tabla `panel`
--
ALTER TABLE `panel`
 ADD PRIMARY KEY (`idPanel`), ADD KEY `fk_Panel_Ciudad1` (`Ciudad_idCiudad`);

--
-- Indices de la tabla `parametros_evaluacion`
--
ALTER TABLE `parametros_evaluacion`
 ADD PRIMARY KEY (`idParametros_evaluacion`);

--
-- Indices de la tabla `preguntas_orientadoras`
--
ALTER TABLE `preguntas_orientadoras`
 ADD PRIMARY KEY (`idPreguntas_orientadoras`);

--
-- Indices de la tabla `proponente`
--
ALTER TABLE `proponente`
 ADD PRIMARY KEY (`idProponente`), ADD KEY `fk_Proponente_Ciudad1` (`Ciudad_idCiudad`);

--
-- Indices de la tabla `propuesta`
--
ALTER TABLE `propuesta`
 ADD PRIMARY KEY (`idPropuesta`), ADD KEY `fk_Propuesta_Organizacion1` (`Organizacion_idOrganizacion`), ADD KEY `fk_Propuesta_Institucion1` (`Institucion_idInstitucion`), ADD KEY `fk_Propuesta_tipo_evaluacion1` (`tipo_evaluacion_idtipo_evaluacion`), ADD KEY `fk_Propuesta_Ciudad1` (`Ciudad_idCiudad`), ADD KEY `fk_Propuesta_Convocatoria1` (`Convocatoria_idConvocatoria`), ADD KEY `fk_Propuesta_Estado_propuesta1` (`Estado_propuesta_idEstado_propuesta`), ADD KEY `fk_Propuesta_area_conocimiento1` (`area_conocimiento_idarea_conocimiento`);

--
-- Indices de la tabla `recomendacion`
--
ALTER TABLE `recomendacion`
 ADD PRIMARY KEY (`idRecomendacion`), ADD KEY `fk_Recomendacion_Tipo_recomendacion` (`Tipo_recomendacion_idTipo_recomendacion`), ADD KEY `fk_Recomendacion_Propuesta1` (`Propuesta_idPropuesta`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
 ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `subcriterios`
--
ALTER TABLE `subcriterios`
 ADD PRIMARY KEY (`idSubcriterios`), ADD KEY `fk_Subcriterios_Criterio1` (`Criterio_idCriterio`);

--
-- Indices de la tabla `tipo_calificacion`
--
ALTER TABLE `tipo_calificacion`
 ADD PRIMARY KEY (`idtipo_calificacion`);

--
-- Indices de la tabla `tipo_convocatoria`
--
ALTER TABLE `tipo_convocatoria`
 ADD PRIMARY KEY (`idTipo_convocatoria`);

--
-- Indices de la tabla `tipo_evaluacion`
--
ALTER TABLE `tipo_evaluacion`
 ADD PRIMARY KEY (`idtipo_evaluacion`), ADD KEY `fk_tipo_evaluacion_Parametros_evaluacion1` (`Parametros_evaluacion_idParametros_evaluacion`);

--
-- Indices de la tabla `tipo_recomendacion`
--
ALTER TABLE `tipo_recomendacion`
 ADD PRIMARY KEY (`idTipo_recomendacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area_conocimiento`
--
ALTER TABLE `area_conocimiento`
MODIFY `idarea_conocimiento` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
MODIFY `idCiudad` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `convocatoria`
--
ALTER TABLE `convocatoria`
MODIFY `idConvocatoria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `criterio`
--
ALTER TABLE `criterio`
MODIFY `idCriterio` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
MODIFY `idEstado` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `estado_propuesta`
--
ALTER TABLE `estado_propuesta`
MODIFY `idEstado_propuesta` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `evaluacion_final`
--
ALTER TABLE `evaluacion_final`
MODIFY `idevaluacion_final` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `evaluacion_propuesta`
--
ALTER TABLE `evaluacion_propuesta`
MODIFY `idevaluacion_propuesta` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `evaluador`
--
ALTER TABLE `evaluador`
MODIFY `idEvaluador` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `formulario_evaluacion`
--
ALTER TABLE `formulario_evaluacion`
MODIFY `idFormulario_evaluacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `idioma`
--
ALTER TABLE `idioma`
MODIFY `ididioma` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `institucion`
--
ALTER TABLE `institucion`
MODIFY `idInstitucion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `linea_tematica`
--
ALTER TABLE `linea_tematica`
MODIFY `idLinea_tematica` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `nivel_formacion`
--
ALTER TABLE `nivel_formacion`
MODIFY `idNivel_Formacion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `organizacion`
--
ALTER TABLE `organizacion`
MODIFY `idOrganizacion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
MODIFY `idPais` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `panel`
--
ALTER TABLE `panel`
MODIFY `idPanel` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `parametros_evaluacion`
--
ALTER TABLE `parametros_evaluacion`
MODIFY `idParametros_evaluacion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `preguntas_orientadoras`
--
ALTER TABLE `preguntas_orientadoras`
MODIFY `idPreguntas_orientadoras` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `proponente`
--
ALTER TABLE `proponente`
MODIFY `idProponente` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `propuesta`
--
ALTER TABLE `propuesta`
MODIFY `idPropuesta` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `recomendacion`
--
ALTER TABLE `recomendacion`
MODIFY `idRecomendacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `subcriterios`
--
ALTER TABLE `subcriterios`
MODIFY `idSubcriterios` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_calificacion`
--
ALTER TABLE `tipo_calificacion`
MODIFY `idtipo_calificacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_convocatoria`
--
ALTER TABLE `tipo_convocatoria`
MODIFY `idTipo_convocatoria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tipo_evaluacion`
--
ALTER TABLE `tipo_evaluacion`
MODIFY `idtipo_evaluacion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tipo_recomendacion`
--
ALTER TABLE `tipo_recomendacion`
MODIFY `idTipo_recomendacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
ADD CONSTRAINT `fk_Ciudad_Pais1` FOREIGN KEY (`Pais_idPais`) REFERENCES `pais` (`idPais`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `convocatoria`
--
ALTER TABLE `convocatoria`
ADD CONSTRAINT `fk_Convocatoria_Estado1` FOREIGN KEY (`Estado_idEstado`) REFERENCES `estado` (`idEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Convocatoria_Parametros_evaluacion1` FOREIGN KEY (`Parametros_evaluacion_idParametros_evaluacion`) REFERENCES `parametros_evaluacion` (`idParametros_evaluacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Convocatoria_Tipo_convocatoria1` FOREIGN KEY (`Tipo_convocatoria_idTipo_convocatoria`) REFERENCES `tipo_convocatoria` (`idTipo_convocatoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `evaluacion_propuesta`
--
ALTER TABLE `evaluacion_propuesta`
ADD CONSTRAINT `fk_Evaluacion_propuesta_Evaluacion_final1` FOREIGN KEY (`Evaluacion_final_idevaluacion_final`) REFERENCES `evaluacion_final` (`idevaluacion_final`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Evaluacion_propuesta_Evaluador1` FOREIGN KEY (`Evaluador_idEvaluador`) REFERENCES `evaluador` (`idEvaluador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Evaluacion_propuesta_Propuesta1` FOREIGN KEY (`Propuesta_idPropuesta`) REFERENCES `propuesta` (`idPropuesta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_evaluacion_propuesta_Ciudad1` FOREIGN KEY (`Ciudad_idCiudad`) REFERENCES `ciudad` (`idCiudad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `evaluador`
--
ALTER TABLE `evaluador`
ADD CONSTRAINT `fk_Evaluador_Ciudad1` FOREIGN KEY (`Ciudad_idCiudad`) REFERENCES `ciudad` (`idCiudad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Evaluador_Convocatoria1` FOREIGN KEY (`Convocatoria_idConvocatoria`) REFERENCES `convocatoria` (`idConvocatoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Evaluador_Nivel_Formacion1` FOREIGN KEY (`Nivel_Formacion_idNivel_Formacion`) REFERENCES `nivel_formacion` (`idNivel_Formacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Evaluador_Organizacion1` FOREIGN KEY (`Organizacion_idOrganizacion`) REFERENCES `organizacion` (`idOrganizacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Evaluador_area_conocimiento1` FOREIGN KEY (`area_conocimiento_idarea_conocimiento`) REFERENCES `area_conocimiento` (`idarea_conocimiento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Evaluador_idioma1` FOREIGN KEY (`idioma_ididioma`) REFERENCES `idioma` (`ididioma`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `evaluador_has_panel`
--
ALTER TABLE `evaluador_has_panel`
ADD CONSTRAINT `fk_Evaluador_has_Panel_Evaluador1` FOREIGN KEY (`Evaluador_idEvaluador`) REFERENCES `evaluador` (`idEvaluador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Evaluador_has_Panel_Panel1` FOREIGN KEY (`Panel_idPanel`) REFERENCES `panel` (`idPanel`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Evaluador_has_Panel_Rol1` FOREIGN KEY (`Rol_idRol`) REFERENCES `rol` (`idRol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `formulario_evaluacion`
--
ALTER TABLE `formulario_evaluacion`
ADD CONSTRAINT `fk_Formulario_evaluacion_Convocatoria1` FOREIGN KEY (`Convocatoria_idConvocatoria`) REFERENCES `convocatoria` (`idConvocatoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Formulario_evaluacion_tipo_calificacion1` FOREIGN KEY (`tipo_calificacion_idtipo_calificacion`) REFERENCES `tipo_calificacion` (`idtipo_calificacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `formulario_evaluacion_has_criterio`
--
ALTER TABLE `formulario_evaluacion_has_criterio`
ADD CONSTRAINT `fk_Formulario_evaluacion_has_Criterio_Criterio1` FOREIGN KEY (`Criterio_idCriterio`) REFERENCES `criterio` (`idCriterio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Formulario_evaluacion_has_Criterio_Formulario_evaluacion1` FOREIGN KEY (`Formulario_evaluacion_idFormulario_evaluacion`) REFERENCES `formulario_evaluacion` (`idFormulario_evaluacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `formulario_evaluacion_has_preguntas_orientadoras`
--
ALTER TABLE `formulario_evaluacion_has_preguntas_orientadoras`
ADD CONSTRAINT `fk_Formulario_evaluacion_has_Preguntas_orientadoras_Formulari1` FOREIGN KEY (`Formulario_evaluacion_idFormulario_evaluacion`) REFERENCES `formulario_evaluacion` (`idFormulario_evaluacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Formulario_evaluacion_has_Preguntas_orientadoras_Preguntas1` FOREIGN KEY (`Preguntas_orientadoras_idPreguntas_orientadoras`) REFERENCES `preguntas_orientadoras` (`idPreguntas_orientadoras`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `panel`
--
ALTER TABLE `panel`
ADD CONSTRAINT `fk_Panel_Ciudad1` FOREIGN KEY (`Ciudad_idCiudad`) REFERENCES `ciudad` (`idCiudad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proponente`
--
ALTER TABLE `proponente`
ADD CONSTRAINT `fk_Proponente_Ciudad1` FOREIGN KEY (`Ciudad_idCiudad`) REFERENCES `ciudad` (`idCiudad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `propuesta`
--
ALTER TABLE `propuesta`
ADD CONSTRAINT `fk_Propuesta_Ciudad1` FOREIGN KEY (`Ciudad_idCiudad`) REFERENCES `ciudad` (`idCiudad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Propuesta_Convocatoria1` FOREIGN KEY (`Convocatoria_idConvocatoria`) REFERENCES `convocatoria` (`idConvocatoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Propuesta_Estado_propuesta1` FOREIGN KEY (`Estado_propuesta_idEstado_propuesta`) REFERENCES `estado_propuesta` (`idEstado_propuesta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Propuesta_area_conocimiento1` FOREIGN KEY (`area_conocimiento_idarea_conocimiento`) REFERENCES `area_conocimiento` (`idarea_conocimiento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `recomendacion`
--
ALTER TABLE `recomendacion`
ADD CONSTRAINT `fk_Recomendacion_Propuesta1` FOREIGN KEY (`Propuesta_idPropuesta`) REFERENCES `propuesta` (`idPropuesta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Recomendacion_Tipo_recomendacion` FOREIGN KEY (`Tipo_recomendacion_idTipo_recomendacion`) REFERENCES `tipo_recomendacion` (`idTipo_recomendacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `subcriterios`
--
ALTER TABLE `subcriterios`
ADD CONSTRAINT `fk_Subcriterios_Criterio1` FOREIGN KEY (`Criterio_idCriterio`) REFERENCES `criterio` (`idCriterio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tipo_evaluacion`
--
ALTER TABLE `tipo_evaluacion`
ADD CONSTRAINT `fk_tipo_evaluacion_Parametros_evaluacion1` FOREIGN KEY (`Parametros_evaluacion_idParametros_evaluacion`) REFERENCES `parametros_evaluacion` (`idParametros_evaluacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
