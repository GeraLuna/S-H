-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-05-2018 a las 17:02:00
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `seguridadhigiene`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `id_articulo` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `articulo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `talla` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `abreviacion` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id_articulo`, `id_proveedor`, `id_categoria`, `articulo`, `tipo`, `talla`, `abreviacion`, `stock`, `id_usuario`) VALUES
(1, 1, 1, 'Botas', 'Z-28', '5', 'Z28 5', 20, 0),
(2, 1, 1, 'Botas', 'Z-28', '6', 'Z28 6', 16, 0),
(3, 2, 2, 'TapÃ³n Auditivo', 'N/A', 'N/A', 'Ta', 6, 0),
(4, 2, 2, 'Protector Auditivo Diadema', 'Sencillo', 'N/A', 'Pa', 20, 0),
(5, 2, 2, 'Protector Auditivo Diadema', '3 M Optime', 'N/A', 'Pa 3M', 19, 0),
(6, 3, 3, 'Lentes', 'Claro', 'N/A', 'Lc', 23, 0),
(7, 3, 3, 'Lentes', 'Gris', 'N/A', 'Lg', 32, 0),
(8, 3, 3, 'Lentes', 'Google', 'N/A', 'Goo', 9, 0),
(9, 1, 4, 'Manga Kevlar', 'N/A', 'Unitalla', 'MK', 66, 0),
(10, 1, 1, 'Botas', 'Hera', '2', 'Hera 2', 17, 0),
(11, 1, 1, 'Botas', 'Gorila', '5', 'Gorila 5', 14, 0),
(12, 2, 1, 'Bota ', 'Hera', '7', 'Hera 7', 43, 0),
(13, 2, 2, 'ProtecciÃ³n diadema', 'Diadema', 'N/A', 'PDia', 39, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `categoria`) VALUES
(1, 'Calzado'),
(2, 'ProtecciÃ³n Auditiva'),
(3, 'ProtecciÃ³n Visual'),
(4, 'Equipo de ProtecciÃ³n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concepto`
--

CREATE TABLE `concepto` (
  `id_concepto` int(11) NOT NULL,
  `id_tipo_concepto` int(11) NOT NULL,
  `concepto` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `concepto`
--

INSERT INTO `concepto` (`id_concepto`, `id_tipo_concepto`, `concepto`) VALUES
(1, 1, 'Pedido'),
(2, 1, 'DevoluciÃ³n'),
(3, 2, 'Primera Vez'),
(4, 2, 'Prestamo'),
(5, 2, 'ReposiciÃ³n'),
(6, 2, 'Descuento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id_depto` int(11) NOT NULL,
  `departamento` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id_depto`, `departamento`) VALUES
(1, 'Information Tecnologies'),
(2, 'Compras'),
(3, 'Ventas'),
(4, 'Finanzas'),
(5, 'Calidad'),
(6, 'Logistica'),
(7, 'RH');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada`
--

CREATE TABLE `entrada` (
  `id_entrada` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_entrada` date NOT NULL,
  `id_concepto` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `entrada`
--

INSERT INTO `entrada` (`id_entrada`, `id_categoria`, `id_articulo`, `cantidad`, `fecha_entrada`, `id_concepto`, `id_user`) VALUES
(2, 1, 1, 15, '2017-12-06', 1, 1),
(3, 4, 9, 20, '2017-12-07', 1, 1),
(4, 1, 11, 15, '2017-12-07', 1, 1),
(5, 3, 6, 20, '2017-12-07', 1, 1),
(6, 2, 4, 20, '2017-12-09', 1, 2),
(7, 3, 6, 15, '2017-12-09', 1, 2),
(8, 4, 6, 5, '2017-12-09', 1, 2),
(9, 3, 6, 4, '2017-12-09', 1, 3),
(10, 1, 1, 20, '2017-12-09', 1, 3),
(11, 3, 6, 10, '2017-12-09', 1, 4),
(12, 1, 11, 10, '2017-12-09', 1, 4),
(13, 1, 2, 10, '2017-12-09', 1, 4),
(14, 1, 10, 10, '2017-12-09', 1, 4),
(15, 2, 5, 10, '2017-12-12', 1, 2),
(16, 3, 6, 10, '2017-12-12', 1, 4),
(17, 3, 6, 1, '2017-12-23', 2, 1),
(18, 1, 12, 25, '2017-12-27', 1, 1),
(20, 4, 9, 1, '2018-01-08', 2, 3),
(21, 4, 9, 50, '2018-01-16', 1, 2),
(22, 2, 13, 20, '2018-01-29', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id_personal` int(11) NOT NULL,
  `no_emp` int(11) NOT NULL,
  `nombres` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pat_ape` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mat_ape` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `genero` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `id_depto` int(11) NOT NULL,
  `id_puesto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id_personal`, `no_emp`, `nombres`, `pat_ape`, `mat_ape`, `genero`, `fecha_ingreso`, `id_depto`, `id_puesto`) VALUES
(2, 948, 'Karla VerÃ³nica', 'PÃ©rez', 'PÃ©rez', 'Femenino', '2017-12-06', 1, 3),
(5, 51, 'Fernando', 'Piz', 'Vazquez', 'Masculino', '2013-01-07', 1, 3),
(14, 949, 'Gerardo ', 'Luna', 'Rios', 'Masculino', '2016-11-07', 1, 1),
(15, 947, 'VÃ­ctor', 'Mata', 'Mata', 'Masculino', '2016-11-07', 1, 4),
(16, 950, 'Jazmin', 'EstupiÃ±an', 'Rios', 'Femenino', '2018-01-08', 1, 3),
(17, 951, 'Petrita', 'NuÃ±ez', 'Prado', 'Femenino', '2018-01-08', 2, 8),
(18, 885, 'MArisela', 'Soto', 'Soria', 'Femenino', '2016-08-18', 7, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `empresa` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `contacto` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `celular` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `empresa`, `direccion`, `contacto`, `telefono`, `celular`, `correo`) VALUES
(1, 'Apicsa ArtÃ­culos', 'Calle 5 de Febrero #700 Zona Centro, 34000 Durango, Dgo.', 'Felipe Sanchez', '6188143030', '6188141516', 'felipe.sanchez@apicsa.com'),
(2, 'Sibsa', 'Blvd Fco. Villa No. 1098, Fracc. Guadalupe, 34220 Durango, Dgo', 'Jorge LÃ³pez', '6181502069', '6188345672', 'jorge.lopez@sibsa.com'),
(3, 'Jaguesa', 'Felipe Pescador #255, Zona Centro, 34000 Durango, Dgo.', 'Pedro AcuÃ±a', '6181345621', '6181236543', 'pedro.acuÃ±a@jaguesa.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puestos`
--

CREATE TABLE `puestos` (
  `id_puesto` int(11) NOT NULL,
  `id_depto` int(11) NOT NULL,
  `puesto` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `puestos`
--

INSERT INTO `puestos` (`id_puesto`, `id_depto`, `puesto`) VALUES
(1, 1, 'Programmer'),
(2, 4, 'Contador'),
(3, 1, 'Technical Support'),
(4, 1, 'Administrador de Redes'),
(5, 4, 'Administrador'),
(6, 5, 'Verificador'),
(8, 2, 'Purcashing'),
(9, 7, 'Enginer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salida`
--

CREATE TABLE `salida` (
  `id_salida` int(11) NOT NULL,
  `id_personal` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_salida` date NOT NULL,
  `id_concepto` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `salida`
--

INSERT INTO `salida` (`id_salida`, `id_personal`, `id_categoria`, `id_articulo`, `cantidad`, `fecha_salida`, `id_concepto`, `id_user`) VALUES
(1, 14, 2, 3, 1, '2016-11-07', 3, 1),
(2, 15, 2, 3, 1, '2016-11-07', 3, 1),
(3, 15, 1, 2, 1, '2016-11-07', 3, 1),
(4, 2, 2, 3, 1, '2016-11-07', 3, 1),
(5, 14, 1, 12, 1, '2016-11-07', 3, 1),
(6, 2, 1, 11, 1, '2016-11-07', 3, 1),
(7, 5, 2, 3, 1, '2017-12-01', 5, 1),
(8, 2, 2, 3, 1, '2017-12-01', 5, 1),
(9, 5, 1, 12, 1, '2017-12-01', 5, 1),
(10, 15, 2, 3, 1, '2017-12-11', 5, 1),
(13, 5, 3, 8, 1, '2018-01-08', 4, 3),
(14, 14, 2, 13, 1, '2018-01-29', 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_concepto`
--

CREATE TABLE `tipo_concepto` (
  `id_tipo_concepto` int(11) NOT NULL,
  `tipo_concepto` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `tipo_concepto`
--

INSERT INTO `tipo_concepto` (`id_tipo_concepto`, `tipo_concepto`) VALUES
(1, 'Entrada'),
(2, 'Salida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo_user` int(11) NOT NULL,
  `tipo_usuario` varchar(13) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_user`, `tipo_usuario`) VALUES
(1, 'Super Usuario'),
(2, 'Administrador'),
(3, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL,
  `nom_user` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_tipo_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `nom_user`, `user`, `pass`, `id_tipo_user`) VALUES
(1, 'Super Usuario', 'supuser', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(2, 'Administrador', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 2),
(3, 'Usuario', 'user', '827ccb0eea8a706c4c34a16891f84e7b', 3),
(4, 'Gerardo', 'gerardo.luna', 'ba8a48b0e34226a2992d871c65600a7c', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`id_articulo`),
  ADD KEY `id_proveedor` (`id_proveedor`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `concepto`
--
ALTER TABLE `concepto`
  ADD PRIMARY KEY (`id_concepto`),
  ADD KEY `id_tipo_concepto` (`id_tipo_concepto`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id_depto`);

--
-- Indices de la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD PRIMARY KEY (`id_entrada`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id_personal`),
  ADD KEY `id_depto` (`id_depto`),
  ADD KEY `id_puesto` (`id_puesto`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `puestos`
--
ALTER TABLE `puestos`
  ADD PRIMARY KEY (`id_puesto`),
  ADD KEY `id_depto` (`id_depto`),
  ADD KEY `id_depto_2` (`id_depto`);

--
-- Indices de la tabla `salida`
--
ALTER TABLE `salida`
  ADD PRIMARY KEY (`id_salida`);

--
-- Indices de la tabla `tipo_concepto`
--
ALTER TABLE `tipo_concepto`
  ADD PRIMARY KEY (`id_tipo_concepto`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_user`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_tipo_user` (`id_tipo_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `id_articulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `concepto`
--
ALTER TABLE `concepto`
  MODIFY `id_concepto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id_depto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `entrada`
--
ALTER TABLE `entrada`
  MODIFY `id_entrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id_personal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `puestos`
--
ALTER TABLE `puestos`
  MODIFY `id_puesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `salida`
--
ALTER TABLE `salida`
  MODIFY `id_salida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `tipo_concepto`
--
ALTER TABLE `tipo_concepto`
  MODIFY `id_tipo_concepto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `articulo_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`),
  ADD CONSTRAINT `articulo_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);

--
-- Filtros para la tabla `concepto`
--
ALTER TABLE `concepto`
  ADD CONSTRAINT `concepto_ibfk_1` FOREIGN KEY (`id_tipo_concepto`) REFERENCES `tipo_concepto` (`id_tipo_concepto`);

--
-- Filtros para la tabla `puestos`
--
ALTER TABLE `puestos`
  ADD CONSTRAINT `puestos_ibfk_1` FOREIGN KEY (`id_depto`) REFERENCES `departamentos` (`id_depto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_tipo_user`) REFERENCES `tipo_usuario` (`id_tipo_user`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
