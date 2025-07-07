-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-02-2025 a las 13:03:11
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
-- Base de datos: `inmobiliaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprados`
--

CREATE TABLE `comprados` (
  `usuario_comprador` int(5) DEFAULT NULL,
  `Codigo_piso` int(11) DEFAULT NULL,
  `Precio_final` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comprados`
--

INSERT INTO `comprados` (`usuario_comprador`, `Codigo_piso`, `Precio_final`) VALUES
(42, 13, 475000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pisos`
--

CREATE TABLE `pisos` (
  `Codigo_piso` int(11) NOT NULL,
  `calle` varchar(40) NOT NULL,
  `numero` int(11) NOT NULL,
  `piso` int(11) NOT NULL,
  `puerta` varchar(5) NOT NULL,
  `cp` int(11) NOT NULL,
  `metros` int(11) NOT NULL,
  `zona` varchar(30) NOT NULL,
  `municipio` varchar(30) DEFAULT NULL,
  `precio` float NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `usuario_id` int(5) DEFAULT NULL,
  `estado` varchar(10) NOT NULL DEFAULT 'Disponible'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pisos`
--

INSERT INTO `pisos` (`Codigo_piso`, `calle`, `numero`, `piso`, `puerta`, `cp`, `metros`, `zona`, `municipio`, `precio`, `imagen`, `usuario_id`, `estado`) VALUES
(8, 'vergara', 6, 4, 'B', 28008, 110, 'Area Metropolitana', 'Madrid', 705000, 'Piso6.jpg', 17, 'Disponible'),
(11, 'Pescadores', 17, 3, 'D', 28888, 100, 'Cuenca del Henares', 'Alcala', 295000, 'Piso17.jpg', 17, 'Disponible'),
(12, 'Iker Casillas', 8, 4, 'A', 28888, 100, 'Area Metropolitana', 'Alcobendas', 650000, 'Piso7.jpg', 16, 'Disponible'),
(13, 'Avenida de Madrid', 23, 7, 'B', 28888, 110, 'Area Metropolitana', 'Alcobendas', 475000, 'Piso8.jpg', 42, 'Vendido'),
(14, 'Valleguado', 32, 6, 'A', 28820, 120, 'Cuenca del Henares', 'Coslada', 199000, 'Piso9.jpg', 17, 'Disponible'),
(15, 'El Puerto', 3, 3, 'F', 28888, 90, 'Cuenca del Henares', 'Coslada', 365000, 'Piso10.jpg', 20, 'Vendido'),
(16, 'Gómez Acebo', 12, 11, 'C', 28888, 105, 'Area Metropolitana', 'Villaverde', 295000, 'Piso11.jpg', 16, 'Disponible'),
(17, 'Claudio Coello', 21, 2, 'C', 28888, 150, 'Area Metropolitana', 'Madrid', 1050000, 'Piso12.jpg', 17, 'Disponible'),
(18, 'Fernández Gómez', 6, 3, 'A', 28888, 90, 'Area Metropolitana', 'Madrid', 876000, 'Piso13.jpg', 16, 'Diponible'),
(19, 'Buen Suceso', 11, 1, 'A', 28808, 100, 'Area Metropolitana', 'Madrid', 800000, 'Piso14.jpg', 16, 'Disponible'),
(20, 'Avenida Olímpica', 25, 4, 'A', 28888, 120, 'Comarca Sur', 'Mostoles', 205000, 'Piso15.jpg', 17, 'Disponible'),
(21, 'Río Manzanares', 9, 3, 'D', 28888, 110, 'Comarca Sur', 'Mostoles', 215000, 'Piso16.jpg', 16, 'Disponible'),
(22, 'rey', 3, 3, '3', 28822, 200, 'Comarca de las Vegas', 'Rivas-Vaciamadr', 400000, 'piso3.jpg', 16, 'Disponible'),
(24, 'Ronda de la Plazuela', 15, 3, 'A', 28100, 105, 'Sierra Oeste', 'San Martín de Valdeiglesias', 574000, 'Piso18.jpg', 17, 'Disponible'),
(29, 'Avenida del Valle', 6, 2, 'A', 28825, 95, 'Sierra Norte', 'Rascafría', 199000, 'Piso19.jpg', 16, 'Disponible'),
(30, 'Molino', 16, 3, 'B', 28009, 100, 'Sierra Norte', 'Cercedilla', 230000, 'Piso20.jpg', 17, 'Disponible'),
(31, 'Calle del Arco', 7, 1, 'E', 28888, 55, 'Cuenca del Medio Jarama', 'Talamanca del Jarama', 130000, 'Piso21.jpg', 17, 'Disponible'),
(32, 'Ciprés', 21, 7, 'C', 28821, 170, 'Comarca de las Vegas', 'Arganda del Rey', 250000, 'Piso22.jpg', 17, 'Disponible'),
(33, 'Calle de Extremadura', 22, 6, 'A', 28821, 88, 'Cuenca Alta del Manzanares', 'Colmenar Viejo', 189900, 'Piso23.jpg', 17, 'Disponible'),
(35, 'Eras', 2, 5, 'c', 21111, 84, 'Cuenca Alta del Manzanares', 'Guadalix de la Sierra', 148000, 'Piso24.jpg', 17, 'Disponible'),
(36, 'Juan de la Cierva', 19, 2, 'D', 28522, 65, 'Comarca Sur', 'Getafe', 205000, 'Piso25.jpg', 16, 'Disponible'),
(37, 'Calle Fuente', 3, 1, 'A', 28888, 116, 'Sierra Oeste', 'Pelayos de la Presa', 129000, 'Piso26.jpg', 17, 'Disponible'),
(38, 'Cantizal', 21, 3, 'C', 28880, 120, 'Cuenca del Guadarrama', 'Las Rozas', 565000, 'Piso27.jpg', 16, 'Disponible'),
(39, 'Calle doctor Fleming', 16, 5, 'D', 28888, 175, 'Cuenca del Guadarrama', 'Majadahonda', 620000, 'Piso28.jpg', 17, 'Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int(5) NOT NULL,
  `nombre` varchar(35) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `clave` varchar(80) NOT NULL,
  `tipo_usuario` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `nombre`, `correo`, `clave`, `tipo_usuario`) VALUES
(16, 'Juan', 'juan@gmail.com', '111', 'Vendedor'),
(17, 'administrador', 'administrador@gmail.com', '987', 'Administrador'),
(20, 'Maria', 'maria@gmail.com', '12345', 'Cliente'),
(42, 'Laura', 'laura@gmail.com', '111', 'Cliente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pisos`
--
ALTER TABLE `pisos`
  ADD PRIMARY KEY (`Codigo_piso`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pisos`
--
ALTER TABLE `pisos`
  MODIFY `Codigo_piso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
