-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2023 a las 22:58:18
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
-- Base de datos: `bacaj`
--
CREATE DATABASE IF NOT EXISTS `bacaj` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bacaj`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacenes`
--

CREATE TABLE `almacenes` (
  `idAlmacenes` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `almacenes`
--

INSERT INTO `almacenes` (`idAlmacenes`, `nombre`) VALUES
(1, 'S1'),
(2, 'S2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familia`
--

CREATE TABLE `familia` (
  `idFamilia` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `familia`
--

INSERT INTO `familia` (`idFamilia`, `nombre`) VALUES
(1, 'Carnes, aves y pescados'),
(2, 'Frutas'),
(3, 'Verduras'),
(4, 'Abarrotes'),
(5, 'Congelados'),
(6, 'Panadería y pastelería'),
(7, 'Comidas preparadas'),
(8, 'Gaseosas'),
(9, 'Aguas'),
(10, 'Jugos y otras bebidas'),
(11, 'Programas BACAJ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `idHistorial` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `familia` int(11) DEFAULT NULL,
  `subfamilia` int(11) DEFAULT NULL,
  `ubicacion_paleta` int(11) DEFAULT NULL,
  `proveedor` int(11) DEFAULT NULL,
  `stock_kg` decimal(10,2) DEFAULT NULL,
  `stock_und` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`idHistorial`, `fecha`, `familia`, `subfamilia`, `ubicacion_paleta`, `proveedor`, `stock_kg`, `stock_und`) VALUES
(1, '2023-11-09 15:45:03', 1, 1, 4, 5, 10.00, 0),
(3, '2023-11-09 16:33:30', 1, 1, 4, 5, 4.00, 0),
(4, '2023-11-09 16:37:57', 1, 1, 4, 5, 2.00, 0),
(5, '2023-11-09 21:51:27', 1, 1, 3, 1, 2.00, 0),
(6, '2023-11-09 21:51:53', 1, 1, 3, 1, 1.00, 0);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `info_historial`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `info_historial` (
`ID` int(11)
,`Fecha` timestamp
,`Familia` varchar(50)
,`Subfamilia` varchar(50)
,`Ubicacion_Paleta` varchar(50)
,`Proveedor` varchar(50)
,`Stock_KG` decimal(10,2)
,`Stock_UND` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `info_stock`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `info_stock` (
`ID` int(11)
,`Familia` varchar(50)
,`Subfamilia` varchar(50)
,`Ubicacion_Paleta` varchar(50)
,`Proveedor` varchar(50)
,`Stock_KG` decimal(10,2)
,`Stock_UND` int(11)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paleta`
--

CREATE TABLE `paleta` (
  `idPaleta` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `ubicacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paleta`
--

INSERT INTO `paleta` (`idPaleta`, `nombre`, `ubicacion`) VALUES
(1, 'P1', 1),
(2, 'P2', 1),
(3, 'P3', 1),
(4, 'P4', 1),
(5, 'P5', 1),
(6, 'P6', 1),
(7, 'P7', 1),
(8, 'P8', 1),
(9, 'P9', 1),
(10, 'P10', 1),
(11, 'P11', 1),
(12, 'P12', 1),
(13, 'P13', 2),
(14, 'P14', 2),
(15, 'P15', 2),
(16, 'P16', 2),
(17, 'P17', 2),
(18, 'P18', 2),
(19, 'P19', 2),
(20, 'P20', 2),
(21, 'P21', 2),
(22, 'P22', 2),
(23, 'P23', 2),
(24, 'P24', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `idProveedor` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `procedencia` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idProveedor`, `nombre`, `procedencia`) VALUES
(1, 'Mercadillo', 'Cajamarca'),
(2, 'Mercado Central', 'Cajamarca'),
(3, 'Yanacocha: Comedor minero', 'Cajamarca'),
(4, 'Goldfields: Agroexportadoras', 'Cajamarca'),
(5, 'Pan American Silver', 'Cajamarca'),
(6, 'Yanacocha: Asociación de productores', 'Cajamarca'),
(7, 'Goldfields: Centro de abastos', 'Cajamarca'),
(8, 'Plaza Vea', 'Cajamarca'),
(9, 'KFC', 'Cajamarca'),
(10, 'Metro: MegaPlaza', 'Cajamarca'),
(11, 'Metro: Angamos', 'Cajamarca'),
(12, 'Tottus', 'Cajamarca'),
(13, 'Kuntur Wasi', 'Cajamarca'),
(14, 'Metro: San Eduardo', 'Piura'),
(15, 'Metro: Plaza del Sol', 'Piura'),
(16, 'Plaza Vea: Centro', 'Piura'),
(17, 'Plaza Vea: Real Plaza', 'Piura'),
(18, 'Makro azul', 'Piura'),
(19, 'Makro rojo', 'Piura'),
(20, 'Maxi Ahorro centro', 'Piura'),
(21, 'Maxi Ahorro centro Castilla', 'Piura'),
(22, 'Maxi Ahorro Grau', 'Piura'),
(23, 'Mercado Modelo', 'Piura'),
(24, 'Mercado Las Capullanas', 'Piura'),
(25, 'Terminal Pesquero', 'Piura'),
(26, 'Sol de Piura', 'Piura'),
(27, 'BACAJ', 'Cajamarca');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `idStock` int(11) NOT NULL,
  `familia` int(11) DEFAULT NULL,
  `subfamilia` int(11) DEFAULT NULL,
  `ubicacion_paleta` int(11) DEFAULT NULL,
  `proveedor` int(11) DEFAULT NULL,
  `stock_kg` decimal(10,2) DEFAULT NULL,
  `stock_und` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `stock`
--

INSERT INTO `stock` (`idStock`, `familia`, `subfamilia`, `ubicacion_paleta`, `proveedor`, `stock_kg`, `stock_und`) VALUES
(1, 1, 1, 2, 1, 1.00, 0),
(2, 3, 9, 15, 13, 2.00, 0),
(3, 2, 6, 17, 17, 18.00, 0);

--
-- Disparadores `stock`
--
DELIMITER $$
CREATE TRIGGER `tgr` BEFORE UPDATE ON `stock` FOR EACH ROW INSERT INTO historial(
        familia,
        subfamilia,
        ubicacion_paleta,
        proveedor,
        stock_kg,
        stock_und
)
VALUES(
    old.familia,
    old.subfamilia,
    old.ubicacion_paleta,
    old.proveedor,
    old.stock_kg,
    old.stock_und
   )
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subfamilia`
--

CREATE TABLE `subfamilia` (
  `idSubfamilia` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `familia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `subfamilia`
--

INSERT INTO `subfamilia` (`idSubfamilia`, `nombre`, `familia`) VALUES
(1, 'Carnes blancas', 1),
(2, 'Carnes rojas', 1),
(3, 'Embutidos', 1),
(4, 'Pescados y mariscos', 1),
(5, 'Hamburguesas, nuggets y apanados', 1),
(6, 'Frutas frescas', 2),
(7, 'Frutas picadas y preparadas', 2),
(8, 'Frutas congeladas', 2),
(9, 'Papa, camote, yuca y otros tubérculos', 3),
(10, 'Verduras frescas', 3),
(11, 'Verduras picadas y preparadas', 3),
(12, 'Verduras congeladas', 3),
(13, 'Arroz', 4),
(14, 'Azúcar', 4),
(15, 'Conserva salada', 4),
(16, 'Conserva dulce', 4),
(17, 'Aceituna', 4),
(18, 'Confitería', 4),
(19, 'Fideos, pastas', 4),
(20, 'Menestras', 4),
(21, 'Canchita Pop Corn', 4),
(22, 'Salsas, cremas y condimentos', 4),
(23, 'Frutos secos', 4),
(24, 'Café e infusiones', 4),
(25, 'Cereales', 4),
(26, 'Instantáneos y endulzantes', 4),
(27, 'Lácteos', 4),
(28, 'Huevos', 4),
(29, 'Hielo', 5),
(30, 'Helados y postres', 5),
(31, 'Pan', 6),
(32, 'Pasteles y postres', 6),
(33, 'Panetones', 6),
(34, 'Panes congelados', 6),
(35, 'Tamales y humitas', 7),
(36, 'Pollo rostizado', 7),
(37, 'Comidas listas(Puré, Sopa instantánea)', 7),
(38, 'Gaseosa familiar', 8),
(39, 'Gaseosa personal', 8),
(40, 'Agua familiar', 9),
(41, 'Agua personal', 9),
(42, 'Jugo familiar', 10),
(43, 'Jugo personal', 10),
(44, 'Té Bebible', 10),
(45, 'Bebidas rehidratantes y energizantes', 10),
(46, 'Loncheritas Saludables', 11),
(47, 'Packs Chakipá', 11),
(48, 'Huevos', 1);

-- --------------------------------------------------------

--
-- Estructura para la vista `info_historial`
--
DROP TABLE IF EXISTS `info_historial`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `info_historial`  AS SELECT `h`.`idHistorial` AS `ID`, `h`.`fecha` AS `Fecha`, `f`.`nombre` AS `Familia`, `s`.`nombre` AS `Subfamilia`, `p`.`nombre` AS `Ubicacion_Paleta`, `pr`.`nombre` AS `Proveedor`, `h`.`stock_kg` AS `Stock_KG`, `h`.`stock_und` AS `Stock_UND` FROM ((((`historial` `h` left join `familia` `f` on(`h`.`familia` = `f`.`idFamilia`)) left join `subfamilia` `s` on(`h`.`subfamilia` = `s`.`idSubfamilia`)) left join `paleta` `p` on(`h`.`ubicacion_paleta` = `p`.`idPaleta`)) left join `proveedor` `pr` on(`h`.`proveedor` = `pr`.`idProveedor`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `info_stock`
--
DROP TABLE IF EXISTS `info_stock`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `info_stock`  AS SELECT `s`.`idStock` AS `ID`, `f`.`nombre` AS `Familia`, `su`.`nombre` AS `Subfamilia`, `p`.`nombre` AS `Ubicacion_Paleta`, `pr`.`nombre` AS `Proveedor`, `s`.`stock_kg` AS `Stock_KG`, `s`.`stock_und` AS `Stock_UND` FROM ((((`stock` `s` left join `familia` `f` on(`s`.`familia` = `f`.`idFamilia`)) left join `subfamilia` `su` on(`s`.`subfamilia` = `su`.`idSubfamilia`)) left join `paleta` `p` on(`s`.`ubicacion_paleta` = `p`.`idPaleta`)) left join `proveedor` `pr` on(`s`.`proveedor` = `pr`.`idProveedor`)) WHERE `s`.`stock_kg` > 0 OR `s`.`stock_und` > 0 ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacenes`
--
ALTER TABLE `almacenes`
  ADD PRIMARY KEY (`idAlmacenes`);

--
-- Indices de la tabla `familia`
--
ALTER TABLE `familia`
  ADD PRIMARY KEY (`idFamilia`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`idHistorial`);

--
-- Indices de la tabla `paleta`
--
ALTER TABLE `paleta`
  ADD PRIMARY KEY (`idPaleta`),
  ADD KEY `ubicacion` (`ubicacion`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idProveedor`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`idStock`),
  ADD KEY `familia` (`familia`),
  ADD KEY `subfamilia` (`subfamilia`),
  ADD KEY `ubicacion_paleta` (`ubicacion_paleta`),
  ADD KEY `proveedor` (`proveedor`);

--
-- Indices de la tabla `subfamilia`
--
ALTER TABLE `subfamilia`
  ADD PRIMARY KEY (`idSubfamilia`),
  ADD KEY `familia` (`familia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacenes`
--
ALTER TABLE `almacenes`
  MODIFY `idAlmacenes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `familia`
--
ALTER TABLE `familia`
  MODIFY `idFamilia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `idHistorial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `paleta`
--
ALTER TABLE `paleta`
  MODIFY `idPaleta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `idProveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
  MODIFY `idStock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `subfamilia`
--
ALTER TABLE `subfamilia`
  MODIFY `idSubfamilia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `paleta`
--
ALTER TABLE `paleta`
  ADD CONSTRAINT `paleta_ibfk_1` FOREIGN KEY (`ubicacion`) REFERENCES `almacenes` (`idAlmacenes`);

--
-- Filtros para la tabla `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`familia`) REFERENCES `familia` (`idFamilia`),
  ADD CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`subfamilia`) REFERENCES `subfamilia` (`idSubfamilia`),
  ADD CONSTRAINT `stock_ibfk_3` FOREIGN KEY (`ubicacion_paleta`) REFERENCES `paleta` (`idPaleta`),
  ADD CONSTRAINT `stock_ibfk_4` FOREIGN KEY (`proveedor`) REFERENCES `proveedor` (`idProveedor`);

--
-- Filtros para la tabla `subfamilia`
--
ALTER TABLE `subfamilia`
  ADD CONSTRAINT `subfamilia_ibfk_1` FOREIGN KEY (`familia`) REFERENCES `familia` (`idFamilia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
