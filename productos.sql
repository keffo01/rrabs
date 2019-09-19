-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-05-2019 a las 22:03:14
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rrabbs`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `Id_producto` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Descripcion` text NOT NULL,
  `Precio` varchar(50) NOT NULL,
  `Regate` varchar(50) DEFAULT NULL,
  `Categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Id_producto`, `Nombre`, `Descripcion`, `Precio`, `Regate`, `Categoria_id`) VALUES
(1, 'Samsumg j5 prime', 'Almacenamiento masivo, Editor de fotografías, Editor de vídeo, OTA, Sincronización con PC, Tethering, Visor de documentos', '100.00', '95.00', 1),
(3, 'Samsumg j3', 'Año 2016', '75.00', '70.00', 1),
(6, 'Caminota Jeep', 'Color blanca año 2014', '8,000', '7,500', 2),
(20, 'Honda', 'Civic-año 2013', '$7,000', '$6,500', 2),
(21, 'Huawei p20', 'Año 2017', '$400.00', '$390.00', 1),
(22, 'Toyota corolla', 'Año 2014', '$9,000', '$8,800', 2),
(32, 'dghdfhgfdh', 'hfhgfd', 'fhgfh', 'fhfdh', 1),
(33, 'dgfdsfg', 'fdghfd', 'fdhgfd', 'fhgf', 1),
(34, 'dhgdfhg', 'hfh', 'fdhf', 'fhgdf', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`Id_producto`),
  ADD KEY `Categoria_id` (`Categoria_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `Id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`Categoria_id`) REFERENCES `categorias` (`Id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
