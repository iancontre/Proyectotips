-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-03-2024 a las 03:14:36
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tipsscan`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `cod_equip` int(11) NOT NULL,
  `nom_equip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`cod_equip`, `nom_equip`) VALUES
(1034, 'Celular'),
(1035, 'Computador de Escritorio'),
(1036, 'Portatil'),
(1037, 'Tableta'),
(1038, 'Televisior');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario`
--

CREATE TABLE `formulario` (
  `cod_form` int(11) NOT NULL,
  `presupuesto` double NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `profesion` varchar(50) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `documento` int(11) DEFAULT NULL,
  `cod_equip` int(11) DEFAULT NULL,
  `cod_pro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `formulario`
--

INSERT INTO `formulario` (`cod_form`, `presupuesto`, `descripcion`, `profesion`, `fecha`, `documento`, `cod_equip`, `cod_pro`) VALUES
(111, 950.45, 'Teléfono con full pantalla y cámara', 'Fotógrafo', '2023-11-14 20:30:00', 12345678, 1034, 1013),
(222, 2299.99, 'Tableta para ilustrar', 'Diseñadora gráfica', '2023-11-14 21:30:00', 1007450447, 1037, 1018),
(333, 1799.99, 'Televisor con fines familiares', 'Ninguna', '2023-11-15 01:30:00', 1040765345, 1038, 1019),
(444, 1299.99, 'Computador portatil con capacidad de carga', 'Contador', '2023-11-14 15:30:00', 12345678, 1036, 1017),
(555, 1799.99, 'Computador de mesa para juegos', 'Estudiante', '2023-11-14 15:30:00', 1007450447, 1035, 1016);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informe`
--

CREATE TABLE `informe` (
  `num_informe` int(11) NOT NULL,
  `concepto` varchar(50) NOT NULL,
  `servicio` varchar(50) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `cod_pro` int(11) DEFAULT NULL,
  `cod_equip` int(11) DEFAULT NULL,
  `documento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `informe`
--

INSERT INTO `informe` (`num_informe`, `concepto`, `servicio`, `fecha`, `precio`, `cod_pro`, `cod_equip`, `documento`) VALUES
(76, 'informe formulario ventas', 'Venta', '0223-11-23 00:00:00', 899.99, 1013, 1034, 51453789);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `cod_pro` int(11) NOT NULL,
  `pro_grantia` varchar(50) NOT NULL,
  `pro_referen` varchar(50) NOT NULL,
  `pro_marca` varchar(50) NOT NULL,
  `pro_descrip` varchar(50) DEFAULT NULL,
  `precio` float NOT NULL,
  `documento` int(11) DEFAULT NULL,
  `cod_equip` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`cod_pro`, `pro_grantia`, `pro_referen`, `pro_marca`, `pro_descrip`, `precio`, `documento`, `cod_equip`) VALUES
(1012, '2 años', 'TC-001', 'Samsung', ' Smartphone de gama alta con cámara triple y carga', 899.99, 1040765345, 1034),
(1013, '1 año', ' TC-002', 'Apple', 'Teléfono 5G con pantalla de alta frecuencia de act', 950.45, 1030688968, 1034),
(1014, '1 año', ' TC-003', 'Sony', 'Teléfono resistente al agua y polvo con potente ba', 749.99, 1030688968, 1034),
(1015, '2 años', 'DE-001', 'Alienware', 'PC de alto rendimiento para juegos con tarjeta grá', 1799.99, 1030688968, 1035),
(1016, '2 años', 'DE-002', 'HP', ' Computadora todo en uno con pantalla táctil y dis', 1799.99, 1030688968, 1035),
(1017, '2 años', 'LP-001', 'Dell', 'Ultrabook delgado y ligero con batería de larga du', 1299.99, 1030688968, 1036),
(1018, '2 años', 'TB-001', 'Wacom', 'Tableta profesional para diseño gráfico y ilustrac', 2299.99, 1030688968, 1037),
(1019, '2 años', ' TV-001', 'LG', ' Televisor 4K con tecnología OLED y sistema operat', 1799.99, 1030688968, 1038);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `Nom_rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `Nom_rol`) VALUES
(1, 'Administrador'),
(2, 'Vendedor'),
(3, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `documento` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `id_rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`documento`, `nombre`, `telefono`, `correo`, `contrasena`, `foto`, `id_rol`) VALUES
(0, 'Javier Moreno', '3192414075', 'javvargas@gmail.com', 'a8f170ab727d70827943edb4f499052a', '../../Uploads/', 1),
(44782, '', '', 'javvargas@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '../../Uploads/', 2),
(85555, '', '', 'javvargas@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '../../Uploads/clients-2.jpg', 2),
(117788, '', '', 'javvargas@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '../../Uploads/clients-2.jpg', 2),
(152442, 'lan prueba', '3192417075', 'lanprueba@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', 3),
(222215, '', '', 'javvargas@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '../../Uploads/clients-1.jpg', 2),
(708875, 'Javier', '123456', 'javvargas@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', 3),
(1245898, 'prueba link', '11459970', 'link@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '', 3),
(11885566, 'ian Admin', '5221', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', '../../Uploads/1080x900_andres-cepada_COLP_EXT_097205.webp', 1),
(12345678, 'Julian rojas', '3118160467', 'juli12@gmail.com', 'jul123wer', '', 3),
(12345779, 'Laura Medina', '31247851', 'lau@gmail.com', '202cb962ac59075b964b07152d234b70', '../../Uploads/clients-2.jpg', 1),
(12556688, 'IAN PRUEBA', '3278365', 'ian@gmail.com', '202cb962ac59075b964b07152d234b70', '', 3),
(12556690, 'prueba ruta', '3105677899', 'pruebaru@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', '', 3),
(51453789, 'Pepito perez', '3105785606', 'pepito@gmail.com', 'pepi3467', '', 2),
(100567890, 'NATALIA MORENO', '46742899', 'nat@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', 3),
(111122244, 'Prueba registro', '31247851', 'pruebaadmin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '../../Uploads/clients-3.jpg', 1),
(111444556, 'Michelle Mateus', '31025820', 'michi@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '../../Uploads/3d-business-young-woman-showing-a-heart-with-her-hands.png', 1),
(444444445, '', '', 'prueba44@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '../../Uploads/clients-1.jpg', 2),
(1007450447, 'Natalia Moreno', '3105708877', 'nataliamorenotobar21@gmail.com', 'tequiero2121', '', 3),
(1030688966, 'Ian Contreras', '329363648', 'iancontreras1610@gmail.com', 'bfcb9510c7dddfea1b28edc01cda0e17', '../Uploads/profileprueba.png', 3),
(1030688968, 'Ian Contreras', '3192414075', 'iancontreras@gmail.com', 'Jupi2323', '', 1),
(1040765345, 'Esteban Torres', '3108643521', 'torresgamer@gmail.com', 'gamruf12345', '', 3),
(1239998877, 'Prueba registro', '3192435678', 'prueba@gmail.com', '202cb962ac59075b964b07152d234b70', '', 3),
(1255669977, 'Nicolas mora', '3105677899', 'nico@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '', 3),
(2147483647, '', '', 'prueba44@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '../../Uploads/clients-1.jpg', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`cod_equip`);

--
-- Indices de la tabla `formulario`
--
ALTER TABLE `formulario`
  ADD PRIMARY KEY (`cod_form`),
  ADD KEY `documento` (`documento`),
  ADD KEY `cod_equip` (`cod_equip`),
  ADD KEY `cod_pro` (`cod_pro`);

--
-- Indices de la tabla `informe`
--
ALTER TABLE `informe`
  ADD PRIMARY KEY (`num_informe`),
  ADD KEY `cod_pro` (`cod_pro`),
  ADD KEY `cod_equip` (`cod_equip`),
  ADD KEY `documento` (`documento`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`cod_pro`),
  ADD KEY `documento` (`documento`),
  ADD KEY `cod_equip` (`cod_equip`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`documento`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `formulario`
--
ALTER TABLE `formulario`
  ADD CONSTRAINT `formulario_ibfk_1` FOREIGN KEY (`documento`) REFERENCES `usuario` (`documento`),
  ADD CONSTRAINT `formulario_ibfk_2` FOREIGN KEY (`cod_equip`) REFERENCES `equipos` (`cod_equip`),
  ADD CONSTRAINT `formulario_ibfk_3` FOREIGN KEY (`cod_pro`) REFERENCES `producto` (`cod_pro`);

--
-- Filtros para la tabla `informe`
--
ALTER TABLE `informe`
  ADD CONSTRAINT `informe_ibfk_1` FOREIGN KEY (`cod_pro`) REFERENCES `producto` (`cod_pro`),
  ADD CONSTRAINT `informe_ibfk_2` FOREIGN KEY (`cod_equip`) REFERENCES `equipos` (`cod_equip`),
  ADD CONSTRAINT `informe_ibfk_3` FOREIGN KEY (`documento`) REFERENCES `usuario` (`documento`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`documento`) REFERENCES `usuario` (`documento`),
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`cod_equip`) REFERENCES `equipos` (`cod_equip`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
