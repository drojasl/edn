-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2019 at 05:35 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laescuela_videocurso`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesos`
--

CREATE TABLE `accesos` (
  `id` int(11) NOT NULL,
  `empresario_id` int(11) NOT NULL,
  `codigo_acceso` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `activo` int(11) NOT NULL,
  `fecha_activo` date NOT NULL,
  `visitas` int(11) NOT NULL,
  `borrado` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `accesos`
--

INSERT INTO `accesos` (`id`, `empresario_id`, `codigo_acceso`, `activo`, `fecha_activo`, `visitas`, `borrado`) VALUES
(1, 7, 'DFRL1090', 1, '2019-03-15', 2, 0),
(6, 7, 'DFRL1090F', 1, '2019-03-28', 3, 0),
(7, 7, 'DFRL1090W', 1, '2019-03-28', 0, 0),
(8, 7, 'DFRL1090F07', 1, '2019-03-28', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `click`
--

CREATE TABLE `click` (
  `id` int(11) NOT NULL,
  `diamantes` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `platinos` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `departamento_ciudad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `click`
--

INSERT INTO `click` (`id`, `diamantes`, `platinos`, `departamento_ciudad`, `updated_at`) VALUES
(1, 'Paula Merino y Jorge Franco', 'Maria Andrea y Juan Pablo Bedoya', 'Antioquia - Medellin', '2019-03-04');

-- --------------------------------------------------------

--
-- Table structure for table `empresarios`
--

CREATE TABLE `empresarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `celular` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `whatsapp` tinyint(2) NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `codigo_amway` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `clave_autoregistro_empresario` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `clave_autoregistro_cliente` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `click_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `empresarios`
--

INSERT INTO `empresarios` (`id`, `nombres`, `apellidos`, `email`, `celular`, `whatsapp`, `password`, `codigo_amway`, `clave_autoregistro_empresario`, `clave_autoregistro_cliente`, `click_id`) VALUES
(7, 'Diego Fernando', 'Rojas Lopez', 'diegor1007@gmail.com', '+573004703932', 1, 'd4ff3fe2e962caa4ea05ccc33ddb6fec', '1906411090', '1906411090H1', '1906411090H4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prospectos`
--

CREATE TABLE `prospectos` (
  `id` int(11) NOT NULL,
  `empresario_id` int(11) NOT NULL,
  `codigo_acceso` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pais` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ciudad` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `celular` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_ingreso` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prospectos`
--

INSERT INTO `prospectos` (`id`, `empresario_id`, `codigo_acceso`, `nombre`, `pais`, `ciudad`, `correo`, `celular`, `fecha_ingreso`) VALUES
(4, 7, 'DFRL1090', 'Diego Rojas', 'Colombia', 'Medellin', 'diegor1007@gmail.com', '3004703932', '2019-03-14 08:35:04'),
(5, 7, 'DFRL1090F', 'Diego', 'Col', 'Med', 'diegor1007@gmail.com', '300', '2019-03-28 15:02:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesos`
--
ALTER TABLE `accesos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_acceso` (`codigo_acceso`);

--
-- Indexes for table `click`
--
ALTER TABLE `click`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empresarios`
--
ALTER TABLE `empresarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prospectos`
--
ALTER TABLE `prospectos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accesos`
--
ALTER TABLE `accesos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `click`
--
ALTER TABLE `click`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `empresarios`
--
ALTER TABLE `empresarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `prospectos`
--
ALTER TABLE `prospectos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
