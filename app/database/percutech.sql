-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 28, 2021 at 10:47 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `percutech`
--

-- --------------------------------------------------------

--
-- Table structure for table `Adherents`
--

CREATE TABLE `Adherents` (
  `id` int(6) NOT NULL,
  `user_role` varchar(30) NOT NULL DEFAULT 'sportif',
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `coachname` varchar(30) NOT NULL,
  `pseudo` varchar(30) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `birthdate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Adherents`
--

INSERT INTO `Adherents` (`id`, `user_role`, `firstname`, `lastname`, `coachname`, `pseudo`, `mdp`, `email`, `birthdate`) VALUES
(1, 'sportif', 'Thomas', 'Gagnier', 'Bernard', 'toto', 'blabla75', 'thomas.gagnier0@gmail.com', '3 septembre 2000'),
(2, 'sportif', 'Ion', 'Panteleiciuc', 'Pascal', 'NaCl+', 'blablaParis', 'ion.panteleiciuc@gmail.com', '8 octobre 2000');

-- --------------------------------------------------------

--
-- Table structure for table `Questions`
--

CREATE TABLE `Questions` (
  `ID` int(11) NOT NULL,
  `Content` varchar(255) NOT NULL,
  `Date_question` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Questions`
--

INSERT INTO `Questions` (`ID`, `Content`, `Date_question`) VALUES
(1, 'Coucou c\'est un test', '2021-05-08 18:31:58'),
(2, 'Coucou c\'est un test', '2021-05-08 18:32:02');

-- --------------------------------------------------------

--
-- Table structure for table `Reponses`
--

CREATE TABLE `Reponses` (
  `ID` int(11) NOT NULL,
  `ID_Question` int(5) NOT NULL,
  `Content` text NOT NULL,
  `Date_answer` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Reponses`
--

INSERT INTO `Reponses` (`ID`, `ID_Question`, `Content`, `Date_answer`) VALUES
(1, 1, 'Je suis une réponse au test 1 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vulputate, dui nec fermentum ultricies, mi dui convallis lorem, sit amet volutpat urna nisi nec purus. Proin porta mattis ornare. Praesent pretium placerat laoreet. Vestibulum est velit, fringilla a fringilla a, congue ac massa. Mauris pretium ullamcorper elit id luctus. Donec id ex quis arcu auctor semper eu ut enim. Mauris tincidunt vitae justo et bibendum. Sed sed nisl enim. Sed quis mattis tellus, ac dapibus lacus. Etiam rhoncus tellus sagittis auctor tristique. Nullam id mollis sapien, at porttitor odio. Aenean efficitur nulla neque, suscipit bibendum enim viverra ac. Vivamus volutpat convallis facilisis. Maecenas luctus eleifend massa, vel lobortis metus tempus eget. Praesent justo odio, varius viverra finibus ut, dictum ac nisl.\r\n\r\nMorbi aliquet mollis purus, vitae dignissim dolor ultrices vel. Donec lorem dui, bibendum ut augue at, tristique finibus purus. In hac habitasse platea dictumst. Integer mollis erat vel pretium porta. Ut diam nisl, dapibus at ultrices nec, pharetra eget purus. Quisque aliquam massa arcu, sit amet eleifend felis malesuada sed. Pellentesque id arcu varius, viverra sapien ut, feugiat leo. Sed metus mauris, posuere nec ex eget, rutrum egestas ante. Duis at lectus vel elit tempus placerat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', '2021-05-28 12:46:14'),
(2, 1, 'Je suis une deuxième réponse au test 1 :\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vulputate, dui nec fermentum ultricies, mi dui convallis lorem, sit amet volutpat urna nisi nec purus. Proin porta mattis ornare. Praesent pretium placerat laoreet. Vestibulum est velit, fringilla a fringilla a, congue ac massa. Mauris pretium ullamcorper elit id luctus. Donec id ex quis arcu auctor semper eu ut enim. Mauris tincidunt vitae justo et bibendum. Sed sed nisl enim. Sed quis mattis tellus, ac dapibus lacus. Etiam rhoncus tellus sagittis auctor tristique. Nullam id mollis sapien, at porttitor odio. Aenean efficitur nulla neque, suscipit bibendum enim viverra ac. Vivamus volutpat convallis facilisis. Maecenas luctus eleifend massa, vel lobortis metus tempus eget. Praesent justo odio, varius viverra finibus ut, dictum ac nisl.\r\n\r\nMorbi aliquet mollis purus, vitae dignissim dolor ultrices vel. Donec lorem dui, bibendum ut augue at, tristique finibus purus. In hac habitasse platea dictumst. Integer mollis erat vel pretium porta. Ut diam nisl, dapibus at ultrices nec, pharetra eget purus. Quisque aliquam massa arcu, sit amet eleifend felis malesuada sed. Pellentesque id arcu varius, viverra sapien ut, feugiat leo. Sed metus mauris, posuere nec ex eget, rutrum egestas ante. Duis at lectus vel elit tempus placerat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', '2021-05-28 12:46:14'),
(3, 2, 'Réponse au test 2', '2021-05-28 12:46:37'),
(4, 2, 'Réponse au test 2 :Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vulputate, dui nec fermentum ultricies, mi dui convallis lorem, sit amet volutpat urna nisi nec purus. Proin porta mattis ornare. Praesent pretium placerat laoreet. Vestibulum est velit, fringilla a fringilla a, congue ac massa. Mauris pretium ullamcorper elit id luctus. Donec id ex quis arcu auctor semper eu ut enim. Mauris tincidunt vitae justo et bibendum. Sed sed nisl enim. Sed quis mattis tellus, ac dapibus lacus. Etiam rhoncus tellus sagittis auctor tristique. Nullam id mollis sapien, at porttitor odio. Aenean efficitur nulla neque, suscipit bibendum enim viverra ac. Vivamus volutpat convallis facilisis. Maecenas luctus eleifend massa, vel lobortis metus tempus eget. Praesent justo odio, varius viverra finibus ut, dictum ac nisl.\r\n\r\nMorbi aliquet mollis purus, vitae dignissim dolor ultrices vel. Donec lorem dui, bibendum ut augue at, tristique finibus purus. In hac habitasse platea dictumst. Integer mollis erat vel pretium porta. Ut diam nisl, dapibus at ultrices nec, pharetra eget purus. Quisque aliquam massa arcu, sit amet eleifend felis malesuada sed. Pellentesque id arcu varius, viverra sapien ut, feugiat leo. Sed metus mauris, posuere nec ex eget, rutrum egestas ante. Duis at lectus vel elit tempus placerat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', '2021-05-28 12:46:37');

-- --------------------------------------------------------

--
-- Table structure for table `Test`
--

CREATE TABLE `Test` (
  `ID` int(11) NOT NULL,
  `user_id` int(6) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Heart_rate` int(4) NOT NULL,
  `Temperature` int(4) NOT NULL,
  `Reaction_time` float NOT NULL,
  `Sound_recognition` int(5) NOT NULL,
  `Rythm_memorization` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Test`
--

INSERT INTO `Test` (`ID`, `user_id`, `date`, `Heart_rate`, `Temperature`, `Reaction_time`, `Sound_recognition`, `Rythm_memorization`) VALUES
(5, 1, '2021-05-28 12:41:17', 80, 39, 0.48, 8, 'oui'),
(6, 1, '2021-05-28 12:41:17', 79, 40, 0.53, 7, 'oui'),
(7, 2, '2021-05-28 12:42:04', 58, 32, 0.84, 9, 'oui'),
(8, 2, '2021-05-28 12:42:04', 61, 47, 0.15, 8, 'oui');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Adherents`
--
ALTER TABLE `Adherents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Questions`
--
ALTER TABLE `Questions`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Reponses`
--
ALTER TABLE `Reponses`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Question` (`ID_Question`);

--
-- Indexes for table `Test`
--
ALTER TABLE `Test`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Adherents`
--
ALTER TABLE `Adherents`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Questions`
--
ALTER TABLE `Questions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Reponses`
--
ALTER TABLE `Reponses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Test`
--
ALTER TABLE `Test`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Reponses`
--
ALTER TABLE `Reponses`
  ADD CONSTRAINT `question-id` FOREIGN KEY (`ID_Question`) REFERENCES `Questions` (`ID`);

--
-- Constraints for table `Test`
--
ALTER TABLE `Test`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `Adherents` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;