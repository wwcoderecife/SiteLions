-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07-Abr-2016 às 03:39
-- Versão do servidor: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wwc_lions`
--
CREATE DATABASE IF NOT EXISTS `wwc_lions` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `wwc_lions`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_membros`
--

CREATE TABLE IF NOT EXISTS `tb_membros` (
`id` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `nome_conjuge` varchar(40) NOT NULL,
  `naturalidade` varchar(40) NOT NULL,
  `funcao` varchar(40) NOT NULL,
  `estado` varchar(40) NOT NULL,
  `data_nascimento` date NOT NULL,
  `endereco` varchar(40) NOT NULL,
  `e-mail` varchar(40) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `matricula` varchar(40) NOT NULL,
  `nome_clube` varchar(40) NOT NULL,
  `distrito` varchar(40) NOT NULL,
  `delegado_suplente` tinyint(1) NOT NULL,
  `nato` tinyint(1) NOT NULL,
  `data_ingresso_lions` date NOT NULL,
  `cl_melvin_jones` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios`
--

CREATE TABLE IF NOT EXISTS `tb_usuarios` (
`id` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `login` varchar(40) NOT NULL,
  `senha` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_membros`
--
ALTER TABLE `tb_membros`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_membros`
--
ALTER TABLE `tb_membros`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
