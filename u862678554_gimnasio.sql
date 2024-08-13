-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 13-08-2024 a las 17:18:49
-- Versión del servidor: 10.11.8-MariaDB-cll-lve
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u862678554_gimnasio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `id_doc` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre_doc` varchar(255) NOT NULL,
  `url_doc` varchar(255) NOT NULL,
  `comentarios` text DEFAULT NULL,
  `status` enum('activo','inactivo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`id_doc`, `id_usuario`, `nombre_doc`, `url_doc`, `comentarios`, `status`) VALUES
(18, 46, 'sffdnhhf', 'descarga (4).jpeg', 'adfsggh', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `edad` int(11) NOT NULL,
  `rol` enum('administrador','cliente') NOT NULL,
  `status` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellidos`, `email`, `password`, `edad`, `rol`, `status`) VALUES
(39, 'jhgjh', 'jhgjhg', 'jjhgjhg@gmail.com', '1234', 15, 'cliente', ''),
(44, 'samuel', 'SOTELO MENDOZA', 'sam123@gmail.com', '12345', 21, 'administrador', ''),
(45, 'Benjamin', 'Manjarrez Brito', 'brito214@gmail.com', '123', 27, 'cliente', ''),
(46, 'fiorela', 'gomez', 'fiorelaochoa074@gmail.com', '123456', 18, 'cliente', ''),
(47, 'maria', 'lopez', 'adfdsnfsq@gmail.com', '123456', 22, 'administrador', ''),
(49, 'FRANCISCO', 'hernandez lopez', 'gonzaleztorresfrancisca959@gmail.com', '12345', 18, 'administrador', ''),
(53, 'francisca ', 'gonzalez', 'gonzaleztorresfrancisca@gmail.com', '12345', 20, 'cliente', ''),
(54, 'Natalí', 'Morales Martínez', 'dnamm028@gmail.com', '12345', 19, 'cliente', ''),
(55, 'SABINO', 'LOPEZ', 'mmmm@gmail.com', '123', 20, 'cliente', ''),
(56, 'kkk', ',,', 'kk@gg', 'jjjj', 0, 'cliente', ''),
(57, 'kkkk', 'hhhhh', 'jjjj@fff', 'jjjjjj', 1, 'cliente', ''),
(58, 'aaaa', 'aaaaa', 'aa@aa', '45465', 88, 'cliente', 'activo'),
(59, 'kkkkk', 'rrr', 'ttt@fff', 'rrrr', 9, 'cliente', 'activo'),
(60, '', '', '', '', 0, '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id_doc`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id_doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD CONSTRAINT `documentos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
