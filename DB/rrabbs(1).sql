-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2019 a las 21:21:13
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

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_30_dias` (IN `fecha` DATE)  NO SQL
INSERT into post(fecha_finaliza) VALUES (ADDDATE(fecha, INTERVAL 31 DAY))$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buscador` (IN `Busqueda` VARCHAR(45))  NO SQL
SELECT a.Id_post, b.Nombre, b.Descripcion, b.Precio, b.Imagen1, a.Fecha_publicacion
FROM post a
INNER join productos b on b.Id_producto=a.Producto_id
WHERE Nombre LIKE concat('%',Busqueda,'%')or Descripcion LIKE concat('%',Busqueda,'%')$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_categoria_post` (IN `cate` VARCHAR(45))  NO SQL
select a.Id_post, b.Nombre as Producto, b.Descripcion, b.Precio, b.Regate, c.Tipo_categoria,d.Nombre, d.Apellido, d.Nombre_usuario, d.Email, a.Fecha_publicacion
from post a

inner join productos b on b.Id_producto = a.Producto_id
inner join categorias c on c.Id_categoria = b.Categoria_id
inner join usuarios d on d.Id_usuario = b.Usuario_id
where Categoria_id = cate$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_fecha_finaliza` (IN `id` INT(45))  NO SQL
UPDATE `post` SET `Fecha_finaliza`=CURDATE() WHERE Id_post=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_post` ()  NO SQL
select a.Id_post, b.Nombre as Producto, b.Descripcion, b.Precio, b.Regate, c.Tipo_categoria,d.Nombre, d.Apellido, d.Nombre_usuario, d.Email, a.Fecha_publicacion, b.Imagen1
from post a

inner join productos b on b.Id_producto = a.Producto_id
inner join categorias c on c.Id_categoria = b.Categoria_id
inner join usuarios d on d.Id_usuario = b.Usuario_id
order by a.Id_post desc
limit 3$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_post_celular` ()  NO SQL
select a.Id_post, b.Nombre as Producto, b.Descripcion, b.Precio, b.Regate, c.Tipo_categoria,d.Nombre, d.Apellido, d.Nombre_usuario, d.Email, a.Fecha_publicacion, b.Imagen1
from post a

inner join productos b on b.Id_producto = a.Producto_id
inner join categorias c on c.Id_categoria = b.Categoria_id
inner join usuarios d on d.Id_usuario = b.Usuario_id
where c.Tipo_categoria like "%Telefono%"
order by a.Id_post desc
limit 3$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_post_Vehiculo` ()  NO SQL
select a.Id_post, b.Nombre as Producto, b.Descripcion, b.Precio, b.Regate, c.Tipo_categoria,d.Nombre, d.Apellido, d.Nombre_usuario, d.Email, a.Fecha_publicacion, b.Imagen1
from post a

inner join productos b on b.Id_producto = a.Producto_id
inner join categorias c on c.Id_categoria = b.Categoria_id
inner join usuarios d on d.Id_usuario = b.Usuario_id
where c.Tipo_categoria like "%Carros%"
order by a.Id_post desc
limit 3$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ver_post` ()  NO SQL
select a.Id_post, b.Nombre as Producto, b.Descripcion, b.Precio, b.Regate, c.Tipo_categoria,d.Nombre, d.Apellido, d.Nombre_usuario, d.Email, a.Fecha_publicacion, b.Imagen1
from post a

inner join productos b on b.Id_producto = a.Producto_id
inner join categorias c on c.Id_categoria = b.Categoria_id
inner join usuarios d on d.Id_usuario = b.Usuario_id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `Id_categoria` int(11) NOT NULL,
  `Tipo_categoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`Id_categoria`, `Tipo_categoria`) VALUES
(3, 'Telefonos Celulares'),
(4, 'Carros Nuevos'),
(5, 'Computadoras'),
(6, 'Laptos'),
(7, 'Tablets'),
(8, 'Accesorios Celular'),
(9, 'Carros usados'),
(10, 'Motocicletas'),
(11, 'Monitores'),
(12, 'Impresoras-Scanners'),
(13, 'Componentes de pc\'s'),
(14, 'Accesorios carros'),
(15, 'Accesorios Motos'),
(16, 'Otros Vehiculos'),
(17, 'Jardín'),
(18, 'Ropa'),
(19, 'Mascotas'),
(20, 'Casas'),
(21, 'Cocinas'),
(22, 'Neveras'),
(23, 'Aires acondicionados'),
(24, 'Lavadoras'),
(25, 'Secadoras'),
(26, 'Otros Electrodomesti');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles`
--

CREATE TABLE `detalles` (
  `Id_detalle` int(11) NOT NULL,
  `venta` int(11) NOT NULL,
  `Fecha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `Id_mensaje` int(11) NOT NULL,
  `Vendedor_id` int(11) NOT NULL,
  `Descripcion` int(11) NOT NULL,
  `Comprador_id` int(11) NOT NULL,
  `Post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE `post` (
  `Id_post` int(11) NOT NULL,
  `Producto_id` int(11) NOT NULL,
  `Fecha_publicacion` varchar(20) NOT NULL,
  `Fecha_finaliza` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `post`
--

INSERT INTO `post` (`Id_post`, `Producto_id`, `Fecha_publicacion`, `Fecha_finaliza`) VALUES
(29, 53, '2019-05-29', '2019-06-29'),
(30, 54, '2019-05-29', '2019-06-29'),
(31, 55, '2019-05-29', '2019-06-29'),
(32, 56, '2019-05-29', '2019-06-29'),
(33, 57, '2019-05-29', '2019-06-29'),
(34, 58, '2019-05-29', '2019-06-29'),
(35, 59, '2019-05-29', '2019-06-29'),
(36, 60, '2019-05-30', '2019-06-30'),
(37, 61, '2019-05-30', '2019-06-30'),
(38, 62, '2019-05-30', '2019-06-30'),
(39, 63, '2019-05-30', '2019-06-30'),
(40, 64, '2019-05-30', '2019-06-30'),
(41, 65, '2019-05-30', '2019-06-30'),
(42, 66, '2019-05-30', '2019-06-30'),
(43, 67, '2019-05-30', '2019-06-30'),
(44, 68, '2019-05-30', '2019-06-30'),
(45, 69, '2019-05-31', '2019-07-01'),
(46, 70, '2019-05-31', '2019-07-01'),
(47, 71, '2019-05-31', '2019-07-01'),
(48, 72, '2019-05-31', '2019-07-01'),
(49, 73, '2019-05-31', '2019-07-01'),
(50, 74, '2019-05-31', '2019-07-01'),
(51, 75, '2019-05-31', '2019-07-01'),
(52, 76, '2019-05-31', '2019-07-01'),
(53, 77, '2019-05-31', '2019-07-01'),
(54, 78, '2019-05-31', '2019-07-01'),
(55, 79, '2019-05-31', '2019-07-01'),
(56, 80, '2019-05-31', '2019-07-01'),
(57, 81, '2019-05-31', '2019-07-01'),
(58, 82, '2019-05-31', '2019-07-01'),
(59, 83, '2019-05-31', '2019-07-01'),
(60, 84, '2019-05-31', '2019-07-01'),
(61, 85, '2019-05-31', '2019-07-01'),
(62, 86, '2019-05-31', '2019-07-01'),
(63, 87, '2019-05-31', '2019-07-01'),
(64, 88, '2019-05-31', '2019-07-01'),
(65, 89, '2019-05-31', '2019-07-01'),
(66, 90, '2019-05-31', '2019-07-01'),
(67, 91, '2019-05-31', '2019-07-01'),
(68, 92, '2019-05-31', '2019-07-01'),
(69, 93, '2019-05-31', '2019-07-01'),
(70, 94, '2019-05-31', '2019-07-01'),
(71, 95, '2019-05-31', '2019-07-01'),
(72, 96, '2019-05-31', '2019-07-01'),
(73, 97, '2019-05-31', '2019-07-01'),
(74, 98, '2019-05-31', '2019-07-01'),
(75, 99, '2019-05-31', '2019-07-01'),
(76, 100, '2019-05-31', '2019-07-01'),
(77, 101, '2019-05-31', '2019-07-01'),
(78, 102, '2019-05-31', '2019-07-01'),
(79, 103, '2019-05-31', '2019-07-01'),
(80, 104, '2019-05-31', '2019-07-01'),
(81, 105, '2019-05-31', '2019-07-01'),
(82, 106, '2019-05-31', '2019-07-01'),
(83, 107, '2019-05-31', '2019-07-01'),
(84, 108, '2019-05-31', '2019-07-01'),
(85, 109, '2019-05-31', '2019-07-01'),
(86, 110, '2019-05-31', '2019-07-01'),
(87, 111, '2019-05-31', '2019-07-01'),
(88, 112, '2019-05-31', '2019-07-01'),
(89, 113, '2019-05-31', '2019-07-01'),
(90, 114, '2019-05-31', '2019-07-01'),
(91, 115, '2019-05-31', '2019-07-01'),
(92, 116, '2019-05-31', '2019-07-01'),
(93, 117, '2019-05-31', '2019-07-01');

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
  `Categoria_id` int(11) NOT NULL,
  `Usuario_id` int(11) NOT NULL,
  `Imagen1` text NOT NULL,
  `Imagen2` text,
  `Imagen3` text,
  `Imagen4` text,
  `Imagen5` text,
  `Imagen6` text,
  `Imagen7` text,
  `Imagen8` text,
  `Imagen9` text,
  `Imagen10` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Id_producto`, `Nombre`, `Descripcion`, `Precio`, `Regate`, `Categoria_id`, `Usuario_id`, `Imagen1`, `Imagen2`, `Imagen3`, `Imagen4`, `Imagen5`, `Imagen6`, `Imagen7`, `Imagen8`, `Imagen9`, `Imagen10`) VALUES
(114, 'Exitoso', 'Descrip', '250', '', 3, 4, '84859.webp', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL'),
(115, 'POCOPHONE F1', 'poco', '300', '', 3, 4, 'Xiaomi-Pocophone-F1-Poco.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(116, 'Lancer', 'Vehiculo lacen año 2014', '$12,000', '$11,500', 4, 5, 'Lanceer.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(117, 'Huawei P30', 'Huawei P30 de caja', '$500.00', '$400.00', 3, 5, 'huawei.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Disparadores `productos`
--
DELIMITER $$
CREATE TRIGGER `tr_insertar_post` AFTER INSERT ON `productos` FOR EACH ROW INSERT INTO post (Producto_id, Fecha_publicacion, Fecha_finaliza ) VALUES( new.Id_producto, CURDATE(), ADDDATE(Fecha_publicacion, INTERVAL 31 DAY))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `Id_rol` int(11) NOT NULL,
  `Tipo_rol` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`Id_rol`, `Tipo_rol`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id_usuario` int(11) NOT NULL,
  `Nombre` varchar(25) NOT NULL,
  `Apellido` varchar(25) NOT NULL,
  `Nombre_usuario` varchar(45) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Password` varchar(60) NOT NULL,
  `Rol_id` int(11) NOT NULL,
  `foto` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id_usuario`, `Nombre`, `Apellido`, `Nombre_usuario`, `Email`, `Password`, `Rol_id`, `foto`) VALUES
(2, 'Fernando', 'Trejo', 'Fer', 'ferjo.trejo@gmail.com', '123', 1, NULL),
(3, 'Jose', 'Guevara', 'Nacho', 'ferjo.trejo@hotmail.es', '123', 2, NULL),
(4, 'Kevin', 'Martinez', 'Keffo', 'dadad', '123', 2, NULL),
(5, 'Hector', 'Benitez', 'BENI', 'hb@gmail.com', '123', 2, 'upload/aparatos.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`Id_categoria`);

--
-- Indices de la tabla `detalles`
--
ALTER TABLE `detalles`
  ADD PRIMARY KEY (`Id_detalle`),
  ADD KEY `venta` (`venta`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`Id_mensaje`),
  ADD KEY `Post_id` (`Post_id`),
  ADD KEY `Comprador_id` (`Comprador_id`),
  ADD KEY `Vendedor_id` (`Vendedor_id`);

--
-- Indices de la tabla `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`Id_post`),
  ADD KEY `Producto_id` (`Producto_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`Id_producto`),
  ADD KEY `Categoria_id` (`Categoria_id`),
  ADD KEY `Usuario_id` (`Usuario_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`Id_rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id_usuario`),
  ADD KEY `Rol_id` (`Rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `Id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `detalles`
--
ALTER TABLE `detalles`
  MODIFY `Id_detalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `Id_mensaje` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `post`
--
ALTER TABLE `post`
  MODIFY `Id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `Id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `Id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalles`
--
ALTER TABLE `detalles`
  ADD CONSTRAINT `detalles_ibfk_1` FOREIGN KEY (`venta`) REFERENCES `mensajes` (`Id_mensaje`);

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `mensajes_ibfk_1` FOREIGN KEY (`Vendedor_id`) REFERENCES `usuarios` (`Id_usuario`),
  ADD CONSTRAINT `mensajes_ibfk_2` FOREIGN KEY (`Comprador_id`) REFERENCES `usuarios` (`Id_usuario`),
  ADD CONSTRAINT `mensajes_ibfk_3` FOREIGN KEY (`Post_id`) REFERENCES `post` (`Id_post`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`Rol_id`) REFERENCES `roles` (`Id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
