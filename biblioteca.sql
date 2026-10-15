-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/10/2026 às 13:06
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluguel`
--

CREATE TABLE `aluguel` (
  `id_livro` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_final` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `livros`
--

CREATE TABLE `livros` (
  `ID_livro` int(11) NOT NULL,
  `Titulo` varchar(60) DEFAULT NULL,
  `Autor` varchar(50) DEFAULT NULL,
  `Quant` int(11) DEFAULT NULL,
  `imagem_capa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `livros`
--

INSERT INTO `livros` (`ID_livro`, `Titulo`, `Autor`, `Quant`, `imagem_capa`) VALUES
(1, 'Dom Casmurro', 'Machado de Assis', 5, 'Dom Casmurro.jpg'),
(2, 'Memórias Póstumas de Brás Cubas', 'Machado de Assis', 4, 'Memórias Póstumas de Brás Cubas.jpg'),
(3, 'O Cortiço', 'Aluísio Azevedo', 6, 'O Cortiço.jpg'),
(4, 'Grande Sertão: Veredas', 'João Guimarães Rosa', 3, 'Grande Sertão.jpg'),
(5, 'Vidas Secas', 'Graciliano Ramos', 5, 'Vidas Secas.jpg'),
(6, 'A Hora da Estrela', 'Clarice Lispector', 7, 'A Hora da Estrela.jpg'),
(7, 'Macunaíma', 'Mário de Andrade', 4, 'Macunaíma.jpg'),
(8, 'Capitães da Areia', 'Jorge Amado', 6, 'Capitães da Areia.jpg'),
(9, 'O Guarani', 'José de Alencar', 3, 'O Guarani.jpg'),
(10, 'Iracema', 'José de Alencar', 5, 'Iracema.jpg'),
(11, 'Triste Fim de Policarpo Quaresma', 'Lima Barreto', 4, 'Triste Fim de Policarpo Quaresma.jpg'),
(12, 'O Quinze', 'Rachel de Queiroz', 5, 'O Quinze.jpg'),
(13, 'A Falência', 'Júlia Lopes de Almeida', 3, 'A Falência.jpg'),
(14, 'O Alienista', 'Machado de Assis', 8, 'O Alienista.jpg'),
(15, 'Quincas Borba', 'Machado de Assis', 4, 'Quincas Borba.jpg'),
(16, 'Serafim Ponte Grande', 'Oswald de Andrade', 2, 'Serafim Ponte Grande.jpg'),
(17, 'Canto Geral', 'Carlos Drummond de Andrade', 3, 'Canto Geral.jpg'),
(18, 'A Paixão Segundo G.H.', 'Clarice Lispector', 4, 'A Paixão Segundo G.jpg'),
(19, 'Gabriela, Cravo e Canela', 'Jorge Amado', 5, 'Gabriela, Cravo e Canela.jpg'),
(20, 'Dona Flor e Seus Dois Maridos', 'Jorge Amado', 4, 'Dona Flor e Seus Dois Maridos.jpg'),
(21, 'São Bernardo', 'Graciliano Ramos', 3, 'São Bernardo.jpg'),
(22, 'Morte e Vida Severina', 'João Cabral de Melo Neto', 6, 'Morte e Vida Severina.jpg'),
(23, 'O Ateneu', 'Raul Pompeia', 4, 'O Ateneu.jpg'),
(24, 'O Tempo e o Vento: O Continente', 'Erico Verissimo', 3, 'O Tempo e o Vento.jpg'),
(25, 'Olhai os Lírios do Campo', 'Erico Verissimo', 5, 'Olhai os Lírios do Campo.jpg'),
(26, 'Incidente em Antares', 'Erico Verissimo', 3, 'Incidente em Antares.jpg'),
(27, 'Auto da Compadecida', 'Ariano Suassuna', 8, 'Auto da Compadecida.jpg'),
(28, 'O Feijão e o Sonho', 'Orígenes Lessa', 4, 'O Feijão e o Sonho.jpg'),
(29, 'Lucíola', 'José de Alencar', 3, 'Lucíola.jpg'),
(30, 'Noite na Taverna', 'Álvares de Azevedo', 5, 'Noite na Taverna.jpg'),
(31, 'O Meu Pé de Laranja Lima', 'José Mauro de Vasconcelos', 7, 'O Meu Pé de Laranja Lima.jpg'),
(32, 'Ciranda de Pedra', 'Lygia Fagundes Telles', 4, 'Ciranda de Pedra.jpg'),
(33, 'As Meninas', 'Lygia Fagundes Telles', 5, 'As Meninas.jpg'),
(34, 'Antes do Baile Verde', 'Lygia Fagundes Telles', 3, 'Antes do Baile Verde.jpg'),
(35, 'Laços de Família', 'Clarice Lispector', 6, 'Laços de Família.jpg'),
(36, 'Água Viva', 'Clarice Lispector', 3, 'Água Viva.jpg'),
(37, 'Sagarana', 'João Guimarães Rosa', 4, 'Sagarana.jpg'),
(38, 'Primeiras Estórias', 'João Guimarães Rosa', 5, 'Primeiras Estórias.jpg'),
(39, 'Lavoura Arcaica', 'Raduan Nassar', 3, 'Lavoura Arcaica.jpg'),
(40, 'Um Copo de Cólera', 'Raduan Nassar', 4, 'Um Copo de Cólera.jpg'),
(41, 'Zero', 'Ignácio de Loyola Brandão', 2, 'Zero.jpg'),
(42, 'Feliz Ano Novo', 'Rubem Fonseca', 4, 'Feliz Ano Novo.jpg'),
(43, 'Agosto', 'Rubem Fonseca', 3, 'Agosto.jpg'),
(44, 'A Veia Bailarina', 'Ignácio de Loyola Brandão', 3, 'A Veia Bailarina.jpg'),
(45, 'A Morte e a Morte de Quincas Berro d\'Água', 'Jorge Amado', 5, 'A Morte e a Morte de Quincas Berro d\'Água.jpg'),
(46, 'O Xangô de Baker Street', 'Jô Soares', 4, 'O Xangô de Baker Street.jpg'),
(47, 'Torto Arado', 'Itamar Vieira Junior', 8, 'Torto Arado.jpg'),
(48, 'O Avesso da Pele', 'Jeferson Tenório', 6, 'O Avesso da Pele.jpg'),
(49, 'Tudo É Rio', 'Carla Madeira', 7, 'Tudo É Rio.jpg'),
(50, 'Quarenta Dias', 'Maria Valéria Rezende', 3, 'Quarenta Dias.jpg'),
(51, 'Cosmos', 'Carl Sagan', 6, 'Cosmos.jpg'),
(52, 'Uma Breve História do Tempo', 'Stephen Hawking', 5, 'Uma Breve História do Tempo.jpg'),
(53, 'Sapiens: Uma Breve História da Humanidade', 'Yuval Noah Harari', 8, 'Sapiens Uma Breve História da Humanidade.jpg'),
(54, 'O Gene Egoísta', 'Richard Dawkins', 4, 'O Gene Egoísta.jpg'),
(55, 'O Mundo Assombrado pelos Demônios', 'Carl Sagan', 5, 'O Mundo Assombrado pelos Demônios.jpg'),
(57, 'O Ponto de Mutação', 'Fritjof Capra', 3, 'O Ponto de Mutação.jpg'),
(58, 'A Origem das Espécies', 'Charles Darwin', 4, 'A Origem das Espécies.jpg'),
(59, 'A Colher que Desaparece', 'Sam Kean', 4, 'A Colher que Desaparece.jpg'),
(60, 'Astrofísica para Apressados', 'Neil deGrasse Tyson', 7, 'Astrofísica para Apressados.jpg'),
(61, 'O Imperador de Todos os Males', 'Siddhartha Mukherjee', 3, 'O Imperador de Todos os Males.jpg'),
(62, 'A Vida Secreta das Plantas', 'Peter Tompkins', 2, 'A Vida Secreta das Plantas.jpg'),
(63, 'O Fim da Certeza', 'Ilya Prigogine', 3, 'O Fim da Certeza.jpg'),
(64, 'Pense de Novo', 'Adam Grant', 5, 'Pense de Novo.jpg'),
(65, 'Corpo Humano: O Guia do Usuário', 'Bill Bryson', 4, 'Corpo Humano.jpg'),
(66, 'História de Tudo', 'Ken Wilber', 3, 'História de Tudo.jpg'),
(68, 'O Iluminado', 'Stephen King', 6, 'O Iluminado.jpg'),
(69, 'Drácula', 'Bram Stoker', 7, 'Drácula.jpg'),
(70, 'Frankenstein', 'Mary Shelley', 8, 'Frankenstein.jpg'),
(71, 'It: A Coisa', 'Stephen King', 4, 'It.jpg'),
(72, 'O Exorcista', 'William Peter Blatty', 5, 'O Exorcista.jpg'),
(73, 'O Chamado de Cthulhu', 'H.P. Lovecraft', 6, 'O Chamado de Cthulhu.jpg'),
(74, 'O Bebê de Rosemary', 'Ira Levin', 4, 'O Bebê de Rosemary.jpg'),
(75, 'A Assombrações da Casa da Colina', 'Shirley Jackson', 5, 'A Assombrações da Casa da Colina.jpg'),
(76, 'Misery: Louca Obsessão', 'Stephen King', 5, 'Misery.jpg'),
(77, 'A Hora do Vampiro', 'Stephen King', 4, 'A Hora do Vampiro.jpg'),
(78, 'Dança da Morte', 'Stephen King', 3, 'Dança da Morte.jpg'),
(79, 'O Silêncio dos Inocentes', 'Thomas Harris', 6, 'O Silêncio dos Inocentes.jpg'),
(80, 'O Povo do Verão', 'Shirley Jackson', 3, 'O Povo do Verão.jpg'),
(81, 'Entrevista com o Vampiro', 'Anne Rice', 5, 'Entrevista com o Vampiro.jpg'),
(82, 'Cemitério Maldito', 'Stephen King', 6, 'Cemitério Maldito.jpg'),
(83, 'A Invocação', 'Clive Barker', 3, 'A Invocação.jpg'),
(85, 'Duna', 'Frank Herbert', 8, 'Duna.jpg'),
(86, '1984', 'George Orwell', 9, '1984.jpg'),
(87, 'Admirável Mundo Novo', 'Aldous Huxley', 7, 'Admirável Mundo Novo.jpg'),
(88, 'Fahrenheit 451', 'Ray Bradbury', 6, 'Fahrenheit 451.jpg'),
(90, 'Eu, Robô', 'Isaac Asimov', 6, 'Eu, Robô.jpg'),
(91, 'Neuromancer', 'William Gibson', 4, 'Neuromancer.jpg'),
(92, '2001: Uma Odisséia no Espaço', 'Arthur C. Clarke', 5, '2001.jpg'),
(93, 'O Guia do Mochileiro das Galáxias', 'Douglas Adams', 8, 'O Guia do Mochileiro das Galáxias.jpg'),
(94, 'Androides Sonham com Ovelhas Elétricas?', 'Philip K. Dick', 5, 'Androides Sonham com Ovelhas Eletricas.jpg'),
(95, 'O Problema dos Três Corpos', 'Cixin Liu', 6, 'O Problema dos Três Corpos.jpg'),
(96, 'O Fim da Infância', 'Arthur C. Clarke', 4, 'O Fim da Infância.jpg'),
(97, 'A Guerra dos Mundos', 'H.G. Wells', 6, 'A Guerra dos Mundos.jpg'),
(98, 'A Máquina do Tempo', 'H.G. Wells', 5, 'A Máquina do Tempo.jpg'),
(99, 'Flor para Algernon', 'Daniel Keyes', 5, 'Flor para Algernon.jpg'),
(100, 'Matéria Escura', 'Blake Crouch', 6, 'Matéria Escura.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `ID_usuario` int(11) NOT NULL,
  `Nome` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Senha` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`ID_usuario`, `Nome`, `Email`, `Senha`) VALUES
(1, 'matheus', 'msbastos006@f', '123'),
(2, 'matheus', 'msbastos006@f', '123');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `aluguel`
--
ALTER TABLE `aluguel`
  ADD KEY `fk_aluguel_livro` (`id_livro`),
  ADD KEY `fk_aluguel_usuario` (`id_usuario`);

--
-- Índices de tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`ID_livro`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `ID_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `aluguel`
--
ALTER TABLE `aluguel`
  ADD CONSTRAINT `fk_aluguel_livro` FOREIGN KEY (`id_livro`) REFERENCES `livros` (`id_livro`),
  ADD CONSTRAINT `fk_aluguel_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`ID_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
