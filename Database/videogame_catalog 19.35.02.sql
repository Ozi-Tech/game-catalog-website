-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 04, 2024 at 09:50 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `videogame_catalog`
--

-- --------------------------------------------------------

--
-- Table structure for table `franchises`
--

CREATE TABLE `franchises` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `franchises`
--

INSERT INTO `franchises` (`id`, `name`) VALUES
(2, 'Call of Duty'),
(9, 'Fifa'),
(8, 'Final Fantasy'),
(10, 'Forza'),
(14, 'God of War'),
(4, 'Grand Theft Auto'),
(5, 'Halo'),
(12, 'Madden'),
(1, 'Mario'),
(6, 'Mortal Combat'),
(13, 'Nba2K'),
(3, 'Need for Speed'),
(7, 'Street Fighter'),
(11, 'The Legend of Zelda');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `publisher_id` int(11) DEFAULT NULL,
  `franchise_id` int(11) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `platform_id` int(11) DEFAULT NULL,
  `genre_id` int(11) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `title`, `publisher_id`, `franchise_id`, `release_date`, `platform_id`, `genre_id`, `description`, `image_path`) VALUES
(1, 'Super Mario 64', 7, 1, '1996-01-01', 1, 7, 'The game begins with a letter from Princess Peach inviting Mario to come to her castle for a cake she has baked for him. When he arrives, Mario discovers that Bowser has invaded the castle and imprisoned the princess and her servants within its walls using the power of the castle\'s 120 Power Stars.', 'images/supermario64.jpeg'),
(2, 'Call of Duty: Modern Warfare', 2, 2, '2019-10-25', 2, 1, 'Captain Price and the SAS partner with the CIA and the Urzikstani Liberation Force to retrieve stolen chemical weapons. The fight takes you from London to the Middle East and beyond, as this joint task force battles to stop a global war.', 'images/COD.jpeg'),
(3, 'Grand Theft Auto V', 10, 4, '2013-09-17', 2, 10, 'The story is about three protagonists: retired bank robber Michael De Santa, street gangster Franklin Clinton, and drug dealer and gunrunner Trevor Philips. They attempts to commit robberies while under pressure from a corrupt government agency and powerful criminals.', 'images/GTAV.jpeg'),
(4, 'Mortal Kombat 11', 5, 6, '2019-04-23', 3, 8, 'When a time lord starts merging past with the present, versions of heroes from both Mortal Kombat timelines must unite to right past wrongs and save the world.', 'images/MK.jpeg'),
(5, 'Need for Speed: Undercover', 4, 3, '2008-11-18', 2, 4, 'The game sees players conducting illegal street races within the fictional Tri-City Area, with the main modes story focused on the player operating as an undercover police officer to investigate links between a criminal syndicate, stolen cars, and street racers.', 'images/NFS.jpeg'),
(6, 'God of War Ragnarok', 1, 14, '2022-11-09', 2, 7, 'This centers on Kratos, the God of War, and his now teenage son, Atreus, who are facing the conflict of the upcoming Ragnarök, due to the result of Kratos killing Norse God, Baldur, while setting on their to end tyranny reign of Odin, King of Asgard and while focusing off Atreus, who tries to uncover his origins.', 'images/godofwar.jpeg'),
(7, 'The Legend of Zelda: Tears of the Kingdom', 7, 11, '2023-05-12', 1, 7, 'The Legend of Zelda: Tears of the Kingdom is a 2023 action-adventure game developed and published by Nintendo for the Nintendo Switch. The player controls Link as he searches for Princess Zelda and fights to prevent Ganondorf from destroying Hyrule.', 'images/Zelda.jpeg'),
(8, 'Halo 2', 11, 5, '2004-11-09', 3, 1, 'In Halo 2\'s story mode, the player assumes the roles of the human Master Chief and alien Arbiter in a 26th-century conflict between the United Nations Space Command, the genocidal Covenant, and later, the parasitic Flood. After the success of Halo: Combat Evolved, a sequel was expected and highly anticipated.', 'images/Halo.jpeg'),
(9, 'Street Fighter 6', 12, 7, '2023-01-01', 3, 8, 'It\'s a full-fledged single-player story campaign where you build your own fighter and go on a quest to discover what strength is, or some such nonsense. You start out in Metro City — the New York-adjacent setting of Capcom\'s Final Fight series — under the tutelage of the lovable meathead Luke.', 'images/streetfighter.jpeg'),
(10, 'Nba 2K24', 13, 13, '2023-10-01', 2, 3, 'Packed with pure, authentic hoops action, NBA 2K24 boasts a variety of single-player and multiplayer game modes for you to immerse yourself in.', 'images/nba.jpeg'),
(11, 'Gran Turismo 7', 1, NULL, '2022-03-04', 2, 4, 'Gran Turismo 7 shines a spotlight on the long history of cars and their culture as the player embarks on a journey to collect the most historic examples. The game is designed to allow players to learn about the origins of each model and their place in history naturally as the game progresses.', 'images/granturismo7.jpeg'),
(12, 'Grand Theft Auto: San Andreas', 10, 4, '2004-10-26', 3, 10, 'The game is set within an open world environment that players can explore and interact with at their leisure. The story follows Carl \'CJ\' Johnson, who returns home following his mother\'s murder and is drawn back into his former gang and a life of crime while clashing with corrupt authorities and powerful criminals.', 'images/GTASA.jpeg'),
(13, 'Minecraft', 14, NULL, '2011-11-18', 4, 5, 'In Minecraft, players explore a blocky, pixelated procedurally generated, three-dimensional world with virtually infinite terrain. Players can discover and extract raw materials, craft tools and items, and build structures, earthworks, and machines.', 'images/minecraft.jpeg'),
(14, 'PokemonGo', 6, NULL, '2016-07-06', 4, 7, 'It uses mobile devices with GPS to locate, capture, train, and battle virtual Pokémon, which appear as if they are in the player\'s real-world location. The game is free-to-play; it uses a freemium business model combined with local advertising and supports in-app purchases for additional in-game items.', 'images/pokemon.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(7, 'Action-Adventure'),
(8, 'Fighting'),
(1, 'First Person Shooter'),
(10, 'Open World'),
(4, 'Racing'),
(2, 'Role Playing Game'),
(5, 'Simulation'),
(3, 'Sports'),
(6, 'Strategy'),
(9, 'Third Person Shooter');

-- --------------------------------------------------------

--
-- Table structure for table `platforms`
--

CREATE TABLE `platforms` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `platforms`
--

INSERT INTO `platforms` (`id`, `name`) VALUES
(1, 'Nintendo'),
(4, 'PC'),
(2, 'PlayStation'),
(3, 'Xbox');

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`id`, `name`) VALUES
(13, '2K Games'),
(2, 'Activision'),
(9, 'Bizarre Creations'),
(11, 'Bungie'),
(12, 'Capcom'),
(4, 'Electronic Arts'),
(6, 'Gameloft'),
(14, 'Mojack Studios'),
(5, 'NetherRealm Studios'),
(7, 'Nintendo'),
(8, 'Riot Games'),
(10, 'Rockstar Games'),
(1, 'Sony Interactive Entertainment'),
(3, 'Ubisoft');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_games`
--

CREATE TABLE `user_games` (
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `franchises`
--
ALTER TABLE `franchises`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `publisher_id` (`publisher_id`),
  ADD KEY `franchise_id` (`franchise_id`),
  ADD KEY `fk_games_platforms` (`platform_id`),
  ADD KEY `fk_games_genres` (`genre_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `platforms`
--
ALTER TABLE `platforms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_games`
--
ALTER TABLE `user_games`
  ADD PRIMARY KEY (`user_id`,`game_id`),
  ADD KEY `game_id` (`game_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `franchises`
--
ALTER TABLE `franchises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `platforms`
--
ALTER TABLE `platforms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `fk_games_genres` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`),
  ADD CONSTRAINT `fk_games_platforms` FOREIGN KEY (`platform_id`) REFERENCES `platforms` (`id`),
  ADD CONSTRAINT `games_ibfk_2` FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`id`),
  ADD CONSTRAINT `games_ibfk_3` FOREIGN KEY (`franchise_id`) REFERENCES `franchises` (`id`);

--
-- Constraints for table `user_games`
--
ALTER TABLE `user_games`
  ADD CONSTRAINT `user_games_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_games_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
