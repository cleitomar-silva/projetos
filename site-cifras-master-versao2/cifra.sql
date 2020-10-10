-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 17/03/2020 às 20:16
-- Versão do servidor: 10.3.16-MariaDB
-- Versão do PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cifra`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `login`
--

INSERT INTO `login` (`id`, `nome`, `email`, `senha`) VALUES
(97, 'Cleitomar', 'cleitomar.rodrigues@hotmail.com', '$2y$10$2/iZvx.aJ4w/ztHcwiJojumJIDYykjptvGko5uQcIO81MIAGnUe9C'),
(98, 'Cleitomar', 'cleitomar.rodrigues@hotmppppppail.com', '$2y$10$6TZXd9Sni3dnSNzoVNmya.9z3yL44AAhIhgeHhLV/.jC1CvBFI9Hy');

-- --------------------------------------------------------

--
-- Estrutura para tabela `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `imagem` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `noticias`
--

INSERT INTO `noticias` (`id`, `imagem`) VALUES
(17, '1467622820-show.jpg.jpg'),
(19, '1959771142-show.jpg.jpg'),
(20, '573036305-show.jpg.jpg'),
(23, '1201116133-no-palco.jpg.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `top`
--

CREATE TABLE `top` (
  `id` int(11) NOT NULL,
  `musica` varchar(100) NOT NULL,
  `artista` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `top`
--

INSERT INTO `top` (`id`, `musica`, `artista`) VALUES
(4, 'Liberdade ProvisÃ³ria', 'Henrique e Juliano'),
(5, 'Girassol', 'Whindersson Nunes'),
(6, 'A Casa Ã‰ Sua', 'Casa Worship'),
(7, 'Meu Abrigo', 'Melim'),
(9, 'NÃ£o Pare', 'Midian Lima'),
(10, 'Liberdade ProvisÃ³ria', 'Henrique e Juliano'),
(11, 'Girassol', 'Whindersson Nunes'),
(12, 'A Casa Ã‰ Sua', 'Casa Worship'),
(13, 'Meu Abrigo', 'Melim'),
(14, 'NÃ£o Pare', 'Midian Lima'),
(15, 'Liberdade ProvisÃ³ria', 'Henrique e Juliano'),
(16, 'Girassol', 'Whindersson Nunes'),
(17, 'A Casa Ã‰ Sua', 'Casa Worship'),
(18, 'Meu Abrigo', 'Melim'),
(19, 'NÃ£o Pare', 'Midian Lima');

-- --------------------------------------------------------

--
-- Estrutura para tabela `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `video` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `videos`
--

INSERT INTO `videos` (`id`, `video`) VALUES
(3, 'TMatd2XK8WM'),
(4, 'TMatd2XK8WM'),
(5, '0XXE-H14LaQ');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `top`
--
ALTER TABLE `top`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT de tabela `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `top`
--
ALTER TABLE `top`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de tabela `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
