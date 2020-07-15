-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2020 at 06:51 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tienda_v`
--
CREATE DATABASE IF NOT EXISTS `tienda_v` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tienda_v`;

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(255) NOT NULL,
  `status_categoria` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `categorias`:
--

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`, `status_categoria`) VALUES
(1, 'interior', 1),
(2, 'deportiva', 1),
(3, 'formal', 1),
(4, 'informal', 1),
(5, 'calcetines y medias', 1),
(6, 'conjunto', 1),
(7, 'casual', 1);

-- --------------------------------------------------------

--
-- Table structure for table `colores`
--

DROP TABLE IF EXISTS `colores`;
CREATE TABLE `colores` (
  `id_color` int(11) NOT NULL,
  `color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `colores`:
--

--
-- Dumping data for table `colores`
--

INSERT INTO `colores` (`id_color`, `color`) VALUES
(1, 'gris'),
(2, 'Azul'),
(3, 'Amarillo'),
(4, 'Negro'),
(5, 'Blanco'),
(6, 'Cafe'),
(7, 'Rosa'),
(8, 'Morado'),
(9, 'multicolor');

-- --------------------------------------------------------

--
-- Table structure for table `compras`
--

DROP TABLE IF EXISTS `compras`;
CREATE TABLE `compras` (
  `id_compra` int(11) NOT NULL,
  `id_comprador` int(11) NOT NULL,
  `nombre_comprador` varchar(100) NOT NULL,
  `fecha_compra` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `producto_compra` varchar(100) NOT NULL,
  `cantidad_compra` int(100) NOT NULL,
  `color_compra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `compras`:
--

--
-- Dumping data for table `compras`
--

INSERT INTO `compras` (`id_compra`, `id_comprador`, `nombre_comprador`, `fecha_compra`, `producto_compra`, `cantidad_compra`, `color_compra`) VALUES
(20, 2, 'Liam', '2020-07-12 21:55:42', '9', 3, 4),
(21, 2, 'Liam', '2020-07-12 21:55:49', '6', 2, 7),
(56, 1, 'Marilu', '2020-07-15 16:47:28', '7', 2, 1);

--
-- Triggers `compras`
--
DROP TRIGGER IF EXISTS `deleteStock`;
DELIMITER $$
CREATE TRIGGER `deleteStock` AFTER INSERT ON `compras` FOR EACH ROW UPDATE productos INNER JOIN compras ON compras.producto_compra=productos.id_producto
    SET productos.stock_pr = productos.stock_pr - new.cantidad_compra WHERE id_producto = producto_compra
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `sumarStock`;
DELIMITER $$
CREATE TRIGGER `sumarStock` AFTER DELETE ON `compras` FOR EACH ROW UPDATE productos INNER JOIN compras ON compras.producto_compra=productos.id_producto
    SET productos.stock_pr = productos.stock_pr + old.cantidad_compra WHERE id_producto = producto_compra
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `descripcion_pr` varchar(255) NOT NULL,
  `categoria_pr` int(11) NOT NULL,
  `img_pr` varchar(255) NOT NULL,
  `color_pr` int(11) NOT NULL,
  `stock_pr` int(255) NOT NULL,
  `precio_pr` decimal(50,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `productos`:
--   `categoria_pr`
--       `categorias` -> `id_categoria`
--   `color_pr`
--       `colores` -> `id_color`
--

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id_producto`, `descripcion_pr`, `categoria_pr`, `img_pr`, `color_pr`, `stock_pr`, `precio_pr`) VALUES
(1, 'Top de tirante corte tejido de canalé', 7, 'producto1.jpg', 4, 127, '240'),
(2, 'Camisa unicolor de satén de botón', 7, 'producto2.jpg', 7, 100, '328'),
(3, 'Camisa túnica bajo curvo unicolor', 7, 'producto3.jpg', 2, 10, '120'),
(4, 'Sujetadores sin aros', 1, 'producto4.jpg', 4, 11, '120'),
(5, 'Sujetadores sin aros', 1, 'producto4.jpg', 5, 11, '120'),
(6, 'Lenceria sensual encaje rosa', 1, 'producto5.jpg', 7, 39, '142'),
(7, 'Leggins con costura', 2, 'producto6.jpg', 1, 9, '211'),
(9, 'Top deportivo', 2, 'producto7.jpg', 4, 51, '200'),
(10, 'Conjunto casual blusa blanca y falda azul', 7, 'producto8.jpg', 9, 11, '255');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id_usr` int(11) NOT NULL,
  `nombre_usr` varchar(100) NOT NULL,
  `apellido_usr` varchar(100) NOT NULL,
  `correo_usr` varchar(100) NOT NULL,
  `password_usr` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `usuarios`:
--

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usr`, `nombre_usr`, `apellido_usr`, `correo_usr`, `password_usr`) VALUES
(1, 'Marilu', 'Acosta', 'marilu@gmail.com', 'loquesea'),
(2, 'Liam', 'Guillen', 'liam@gmail.com', 'loquesea');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `colores`
--
ALTER TABLE `colores`
  ADD PRIMARY KEY (`id_color`);

--
-- Indexes for table `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `IdCategoria` (`categoria_pr`),
  ADD KEY `IdColor` (`color_pr`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usr`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `colores`
--
ALTER TABLE `colores`
  MODIFY `id_color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `IdCategoria` FOREIGN KEY (`categoria_pr`) REFERENCES `categorias` (`id_categoria`) ON UPDATE CASCADE,
  ADD CONSTRAINT `IdColor` FOREIGN KEY (`color_pr`) REFERENCES `colores` (`id_color`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
