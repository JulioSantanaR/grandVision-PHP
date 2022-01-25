-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-01-2022 a las 20:36:46
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `grandvision`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogoalmacenes`
--

CREATE TABLE `catalogoalmacenes` (
  `idAlmacen` int(11) NOT NULL,
  `nombreAlmacen` varchar(50) NOT NULL,
  `localizacion` varchar(50) NOT NULL,
  `responsable` varchar(50) NOT NULL,
  `idTipoAlmacen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `catalogoalmacenes`
--

INSERT INTO `catalogoalmacenes` (`idAlmacen`, `nombreAlmacen`, `localizacion`, `responsable`, `idTipoAlmacen`) VALUES
(1, 'Jardines recuerdo', 'Tlalnepantla', 'JSantana', 1),
(2, 'Tepozotlán', 'Tlalnepantla', 'JSantana', 1),
(3, 'Amazon', 'Web', 'JSantana', 2),
(4, 'Linio', 'Web', 'JSantana', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogoproductos`
--

CREATE TABLE `catalogoproductos` (
  `idProducto` int(11) NOT NULL,
  `sku` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `catalogoproductos`
--

INSERT INTO `catalogoproductos` (`idProducto`, `sku`, `descripcion`, `marca`, `color`, `precio`) VALUES
(1, '1111', 'Producto uno', 'Pau-pau', 'Rosa', 20),
(2, '2222', 'Producto dos', 'Frutsi', 'Rojo', 10.5),
(3, '3333', 'Producto tres', 'Valle frut', 'Yellow', 30),
(4, '4444', 'Producto cuatro', 'Santa Clara', 'Naranja', 90),
(5, '5555', 'Producto cinco', 'Marca cinco', 'Verde', 66.66),
(6, '6666', 'Producto seis', 'Marca seis', 'Dorado', 69.69);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `existencias`
--

CREATE TABLE `existencias` (
  `idExistencias` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `idAlmacen` int(11) NOT NULL,
  `existencias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `existencias`
--

INSERT INTO `existencias` (`idExistencias`, `idProducto`, `idAlmacen`, `existencias`) VALUES
(1, 1, 1, 5),
(2, 1, 2, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoalmacenes`
--

CREATE TABLE `tipoalmacenes` (
  `idTipoAlmacen` int(11) NOT NULL,
  `tipoAlmacen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipoalmacenes`
--

INSERT INTO `tipoalmacenes` (`idTipoAlmacen`, `tipoAlmacen`) VALUES
(1, 'Fisico'),
(2, 'Virtual');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catalogoalmacenes`
--
ALTER TABLE `catalogoalmacenes`
  ADD PRIMARY KEY (`idAlmacen`),
  ADD KEY `fk_idTipoAlmacen` (`idTipoAlmacen`);

--
-- Indices de la tabla `catalogoproductos`
--
ALTER TABLE `catalogoproductos`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `existencias`
--
ALTER TABLE `existencias`
  ADD PRIMARY KEY (`idExistencias`),
  ADD KEY `fk_idProducto` (`idProducto`),
  ADD KEY `fk_idAlmacen` (`idAlmacen`);

--
-- Indices de la tabla `tipoalmacenes`
--
ALTER TABLE `tipoalmacenes`
  ADD PRIMARY KEY (`idTipoAlmacen`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `catalogoalmacenes`
--
ALTER TABLE `catalogoalmacenes`
  MODIFY `idAlmacen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `catalogoproductos`
--
ALTER TABLE `catalogoproductos`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `existencias`
--
ALTER TABLE `existencias`
  MODIFY `idExistencias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipoalmacenes`
--
ALTER TABLE `tipoalmacenes`
  MODIFY `idTipoAlmacen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `catalogoalmacenes`
--
ALTER TABLE `catalogoalmacenes`
  ADD CONSTRAINT `fk_idTipoAlmacen` FOREIGN KEY (`idTipoAlmacen`) REFERENCES `tipoalmacenes` (`idTipoAlmacen`);

--
-- Filtros para la tabla `existencias`
--
ALTER TABLE `existencias`
  ADD CONSTRAINT `fk_idAlmacen` FOREIGN KEY (`idAlmacen`) REFERENCES `catalogoalmacenes` (`idAlmacen`),
  ADD CONSTRAINT `fk_idProducto` FOREIGN KEY (`idProducto`) REFERENCES `catalogoproductos` (`idProducto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
