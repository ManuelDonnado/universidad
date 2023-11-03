-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-11-2023 a las 09:38:37
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `universidad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE `clases` (
  `id_clase` int(10) NOT NULL,
  `id_materia` int(10) DEFAULT NULL,
  `id_maestro` int(10) DEFAULT NULL,
  `alumnos_inscritos` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clases`
--

INSERT INTO `clases` (`id_clase`, `id_materia`, `id_maestro`, `alumnos_inscritos`) VALUES
(1, 4, 15, 3),
(4, 7, 13, 2),
(5, 1, 2, 1),
(6, 2, 14, 1),
(7, 3, 16, 1),
(8, 10, 20, 1),
(9, 8, 27, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases_alumnos`
--

CREATE TABLE `clases_alumnos` (
  `id_clase_alumno` int(10) NOT NULL,
  `id_clase` int(10) DEFAULT NULL,
  `id_alumno` int(10) DEFAULT NULL,
  `calificacion` double(15,2) DEFAULT NULL,
  `comentarios` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clases_alumnos`
--

INSERT INTO `clases_alumnos` (`id_clase_alumno`, `id_clase`, `id_alumno`, `calificacion`, `comentarios`) VALUES
(3, 1, 3, NULL, NULL),
(4, 4, 3, NULL, NULL),
(5, 1, 17, NULL, NULL),
(6, 1, 26, NULL, NULL),
(7, 4, 26, NULL, NULL),
(8, 5, 26, NULL, NULL),
(9, 6, 26, NULL, NULL),
(10, 7, 26, NULL, NULL),
(11, 8, 26, NULL, NULL),
(12, 9, 26, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id_materia` int(11) NOT NULL,
  `nombre_materia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id_materia`, `nombre_materia`) VALUES
(1, 'Historia'),
(2, 'Fisica'),
(3, 'Quimica'),
(4, 'Biologia'),
(5, 'Ciencias Naturales'),
(6, 'Astronomia'),
(7, 'Formación Civica y Etica'),
(8, 'Ingles'),
(9, 'Calculo Integral'),
(10, 'Informatica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`) VALUES
(1, 'Administrador'),
(2, 'Maestro'),
(3, 'Alumno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(10) NOT NULL,
  `matricula` bigint(10) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `estatus` int(10) DEFAULT NULL,
  `id_rol` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `matricula`, `correo`, `password`, `nombre`, `apellido`, `direccion`, `fecha_nacimiento`, `estatus`, `id_rol`) VALUES
(1, 10230000, 'admin@admin', '$2y$10$iCtSajAznhHD.6LOu0opqestwd8Ilm7iMEZh4cing/4cpseUf6zKy', 'manuel', 'donado hernandez', '31 julio #66 col naciones unidas puebla pue.', '1991-12-19', 1, 1),
(2, 1025230001, 'maestro@maestro', '$2y$10$b98vqNnioXdb6d.GSVJ0suUbTf/1kWgnKx4F7zNs9OoOvOhc3.r7S', 'pedro', 'hernandez cruz', 'calle xalapa # 27 col manatiales puebla pue', '1980-01-31', 1, 2),
(3, 1025231101, 'alumno@alumno', '$2y$10$OM9Jv8dP904z/pHUQdbZN.Xzz.DR6d99xJ3Ootu0/Y4t5ptAJLbtO', 'omar', 'donado hernandez', 'calle veracruz #12 col chapultepect puebla pue', '1997-09-11', 1, 3),
(13, NULL, 'juan@juan', '$2y$10$5pWYJfGgriVzIVrnxiaj0ORPzBunUjedf3kMtx5FQua9U8YkHIhda', 'juan', 'galvan', 'calle huejotzingo  #26 col la paz', '2023-10-04', 1, 2),
(14, NULL, 'sergio@sergio', '$2y$10$BfSLDhctcs/ykLDffZPLOevYIMiTNx/Oucv5CQelHcQR/OxNg87hu', 'sergio', 'sanchez', 'la paz#26 ', '1986-06-01', 1, 2),
(15, NULL, 'issac@issac', '$2y$10$J53xbR9mnlR0vmK9TsUvFuHN5wEJOXSJ45.itnzg1MsPzeTNFozi6', 'issac', 'villanueva', 'Av Fuente de Pirámides', '1972-06-13', 1, 2),
(16, 0, 'leilani@leilani', '$2y$10$P/64dn7L6AF8FXq6n3Hzj.bkyZWJ3afa65mSQpgYKLN7HbdPHUK1m', 'leilani tabita', 'sanchez bravo', '31 de Julio #66 col. tepeyac', '1986-06-19', 1, 2),
(17, 1025231107, 'iris@iris', '$2y$10$l.0fxeRxhY5tZzvP5DomkOujzqnvAOU91pojXqC3B/7h2RPPkHw4K', 'melani iris', 'sanchez bravo', 'calle bugabilias #78', '2007-06-13', 1, 3),
(18, 1025231103, 'estefani@estefani', '$2y$10$gzJImmb0q5ryW/a17UXrIOMlGnVM/Q4NNYpD83r8ASyuzWaaEtjcW', 'estefani', 'hernandez', 'calle huejotzingo  #26 col la paz', '2004-06-24', 1, 3),
(19, 1025231104, 'saul@saul', '$2y$10$Z07BXWutuPUV6hNMBddVbeI6Ru7.6l4fNCLxf4Sjz3vyo8aKC6I8q', 'dilan saul', 'hernandez', '31 de Julio #66 col. Naciones Unidas', '2008-11-13', 1, 3),
(20, 1025231105, 'matias@matias', '$2y$10$x8jTgJWYzh1sLuP.C7/83.yq6FH4nbJFUlr1eo8.4iq2bOrOWIsTK', 'matias', 'montes lara', 'calzada zaragoza #1667', '1998-09-12', 1, 2),
(26, 102203040, 'manu@manu', '$2y$10$HYqfTklggtkSZqmchuUmOOe0wfgLH3dES2HHB4ZW.mkeQR.HPK6vq', 'emanuel ', 'hernandez lopez', 'olivos 1290 lpaz', '1990-02-12', 1, 3),
(27, 3434, 'dylan@dylan', '$2y$10$nTJ2L/5FbKdaTEJS8YTyO.pmLte0gxuXumabTiGO6icYKqWI1xyAy', 'dylan', 'hernandez', 'huejo', '2006-07-06', 1, 2),
(29, NULL, 'jose@jose', '$2y$10$nfArZ0JZFchDnS5Ol9X6fexKa4Da4QFiO6VFkTGBTfSOgfx74gTUq', 'jose', 'lara', 'rio de janeiro #45 ', '1995-12-08', 1, 2),
(30, NULL, 'leonardo@leonardo', '$2y$10$6U9AadVeETDP9vAK8f1q/uA9K/dy561Zu9afcrECRyfbdSBnsfiB6', 'leonardo', 'vargas', 'calle las palomitas col bosques de san sebastian', '2000-02-19', 1, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clases`
--
ALTER TABLE `clases`
  ADD PRIMARY KEY (`id_clase`),
  ADD KEY `id_materia` (`id_materia`),
  ADD KEY `id_maestro` (`id_maestro`);

--
-- Indices de la tabla `clases_alumnos`
--
ALTER TABLE `clases_alumnos`
  ADD PRIMARY KEY (`id_clase_alumno`),
  ADD KEY `id_clase` (`id_clase`),
  ADD KEY `id_alumno` (`id_alumno`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id_materia`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clases`
--
ALTER TABLE `clases`
  MODIFY `id_clase` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `clases_alumnos`
--
ALTER TABLE `clases_alumnos`
  MODIFY `id_clase_alumno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clases`
--
ALTER TABLE `clases`
  ADD CONSTRAINT `clases_ibfk_1` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`),
  ADD CONSTRAINT `clases_ibfk_2` FOREIGN KEY (`id_maestro`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `clases_alumnos`
--
ALTER TABLE `clases_alumnos`
  ADD CONSTRAINT `clases_alumnos_ibfk_1` FOREIGN KEY (`id_clase`) REFERENCES `clases` (`id_clase`),
  ADD CONSTRAINT `clases_alumnos_ibfk_2` FOREIGN KEY (`id_alumno`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
