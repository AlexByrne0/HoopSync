-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2025 at 02:35 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `submitted_at`) VALUES
(1, 'john', 'bjashvchsvcsd@cbuhc', 'test', '2025-04-29 17:49:08'),
(2, 'ben', 'sample@email.com', 'sample', '2025-04-29 18:03:23'),
(3, 'doritoz', 'luke@gmail.com', 'it is a brilliant sport web site', '2025-04-29 18:08:50'),
(4, 'john', 'luke@gmai', 'this web is exellent', '2025-04-30 10:36:37'),
(5, 'john', 'bjashvchsvcsd@cbuhc', 'good website', '2025-04-30 20:13:26'),
(6, 'john', 'ff@gmail.com', 'brilliant web site', '2025-05-02 20:25:14'),
(7, 'john', 'kcbdjcbd@cbdcjhdc.com', 'hi', '2025-05-04 22:27:18');

-- --------------------------------------------------------

--
-- Table structure for table `lakers_comments`
--

CREATE TABLE `lakers_comments` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lakers_comments`
--

INSERT INTO `lakers_comments` (`id`, `username`, `comment`, `created_at`) VALUES
(1, 'Alex Byrne', 'I am a Mavericks fan, but this trade was really stupid! Luka was our savior! cant believe they traded him for this bum :(', '2025-04-29 20:32:18'),
(8, 'Ben Cranley', 'Alex what are talking about! Luka was so overweight, he deserved to get traded. If he is not putting effort in, let him go!', '2025-04-29 20:36:56'),
(9, 'Ben Binoy', 'I agree with Alex, even though he is fat, he is still a very valuable players, in my opinion, he is better than Lebron.', '2025-04-29 20:39:35'),
(10, 'ben', 'wow it is interesting', '2025-05-02 19:51:29');

-- --------------------------------------------------------

--
-- Table structure for table `lugentez_comments`
--

CREATE TABLE `lugentez_comments` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lugentez_comments`
--

INSERT INTO `lugentez_comments` (`id`, `username`, `comment`, `created_at`) VALUES
(1, 'ben', 'test', '2025-04-30 22:24:59');

-- --------------------------------------------------------

--
-- Table structure for table `nuggets_comments`
--

CREATE TABLE `nuggets_comments` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nuggets_comments`
--

INSERT INTO `nuggets_comments` (`id`, `username`, `comment`, `created_at`) VALUES
(1, 'mat', 'he is a tough', '2025-04-30 22:40:27'),
(2, 'mat', 'he is a tough guy', '2025-04-30 22:41:04'),
(3, 'ben', 'he is a tough guy', '2025-04-30 22:41:37');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `firstname`, `lastname`, `email`, `age`, `location`, `order_date`, `total_amount`) VALUES
(1, NULL, 'ben', 'binoy', 'ff@gmail.com', 33, 'dublin', '2025-05-03 17:16:14', 20.99),
(2, NULL, 'ben', 'binoy', 'bjashvchsvcsd@cbuhc', 12, 'clare', '2025-05-03 17:19:33', 20.00),
(3, NULL, 'ben', 'g', 'bjashvchsvcsd@cbuhc', 45, 'wexford', '2025-05-03 17:29:16', 10.00),
(4, NULL, 'luka', 'ff', 'ff@gmail.com', 12, 'clare', '2025-05-03 17:31:08', 10.99),
(5, NULL, 'luka', 'g', 'ff@gmail.com', 50, 'wexford', '2025-05-03 18:03:23', 72.97),
(6, NULL, 'ben', 'binoy', 'kcbdjcbd@cbdcjhdc.com', 122, 'france', '2025-05-03 22:23:27', 41.98),
(7, NULL, 'luke', 'ff', 'ff@gmail.com', 33, 'wexford', '2025-05-03 23:17:59', 20.00),
(8, NULL, 'ben', 'binoy', 'kcbdjcbd@cbdcjhdc.com', 33, 'france', '2025-05-04 19:15:01', 21.98),
(9, NULL, 'ben', 'ff', 'kcbdjcbd@cbdcjhdc.com', 33, 'clare', '2025-05-04 22:19:42', 50.00),
(10, NULL, 'ben', 'g', 'bjashvchsvcsd@cbuhc', 12, 'wexford', '2025-05-04 22:22:41', 10.00),
(11, NULL, 'luke', 'binoy', 'bjashvchsvcsd@cbuhc', 33, 'wexford', '2025-05-04 23:50:15', 20.00);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_name`, `quantity`, `price`, `subtotal`) VALUES
(1, 1, 0, NULL, 0, 0.00, 0.00),
(2, 1, 3, 'lakers', 0, 10.00, 0.00),
(3, 1, 4, NULL, 2, 0.00, 0.00),
(4, 1, 1, 'chicagobulls', 1, 10.00, 10.00),
(5, 1, 5, 'hornets', 1, 10.99, 10.99),
(6, 1, 2, 'celtics', 0, 10.00, 0.00),
(7, 2, 2, 'celtics', 2, 10.00, 20.00),
(8, 3, 3, 'lakers', 1, 10.00, 10.00),
(9, 4, 5, 'hornets', 1, 10.99, 10.99),
(10, 5, 1, 'chicagobulls', 1, 10.00, 10.00),
(11, 5, 2, 'celtics', 1, 10.00, 10.00),
(12, 5, 3, 'lakers', 2, 10.00, 20.00),
(13, 5, 5, 'hornets', 3, 10.99, 32.97),
(14, 5, 0, NULL, NULL, 0.00, 0.00),
(15, 6, 5, 'hornets', 2, 10.99, 21.98),
(16, 6, 3, 'lakers', 2, 10.00, 20.00),
(17, 7, 2, 'celtics', 2, 10.00, 20.00),
(18, 8, 5, 'hornets', 2, 10.99, 21.98),
(19, 9, 3, 'lakers', 2, 10.00, 20.00),
(20, 9, 2, 'celtics', 3, 10.00, 30.00),
(21, 10, 3, 'lakers', 1, 10.00, 10.00),
(22, 11, 2, 'celtics', 2, 10.00, 20.00);

-- --------------------------------------------------------

--
-- Table structure for table `pacers_comments`
--

CREATE TABLE `pacers_comments` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`) VALUES
(1, 'chicagobulls', 10.00),
(2, 'celtics', 10.00),
(3, 'lakers', 10.00),
(5, 'hornets', 10.99),
(7, 'mavrick', 12.88);

-- --------------------------------------------------------

--
-- Table structure for table `recent_fixtures`
--

CREATE TABLE `recent_fixtures` (
  `id` int(11) NOT NULL,
  `team_home` varchar(100) NOT NULL,
  `team_away` varchar(100) NOT NULL,
  `game_date` date NOT NULL,
  `game_time` time NOT NULL,
  `venue` varchar(100) DEFAULT NULL,
  `home_score` int(11) NOT NULL,
  `away_score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recent_fixtures`
--

INSERT INTO `recent_fixtures` (`id`, `team_home`, `team_away`, `game_date`, `game_time`, `venue`, `home_score`, `away_score`) VALUES
(1, 'Atlanta Hawks', 'Charlotte Hornets', '2025-04-18', '19:30:00', 'State Farm Arena', 112, 97),
(2, 'LA Lakers', 'Minnesota Timberwolves', '2025-04-21', '20:00:00', 'Crypto.com Arena', 98, 109),
(3, 'Brooklyn Nets', 'Philadelphia 76ers', '2025-04-22', '18:00:00', 'Barclays Center', 122, 87),
(4, 'Chigaco Bulls', 'Boston Celtics', '2025-04-23', '17:30:00', 'United Center', 124, 119),
(5, 'Toronto Raptors', 'LA Clippers', '2025-04-24', '17:00:00', 'Scotiabank Arena', 88, 120);

-- --------------------------------------------------------

--
-- Table structure for table `tradenews`
--

CREATE TABLE `tradenews` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `published_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tradenews`
--

INSERT INTO `tradenews` (`id`, `title`, `content`, `image_url`, `published_date`) VALUES
(1, 'Lakers Trade Anthony Davis to the Dallas Mavericks!', 'In a blockbuster trade, the Lakers send Anthony Davis to Mark Cuban\'s Dallas Mavericks in exchange for Luka Doncic! ', 'https://www.latimes.com/sports/lakers/story/2025-02-01/lakers-luka-doncic-mavericks-anthony-davis-blockbuster-trade', '2025-04-15 12:03:00'),
(2, 'Oklahoma City Thunder guard Luguentz Dort makes his Defensive Player of the Year case', 'The Veteran stopper has yet to receive NBA All-Defensive Team recognition despite leading league’s top defense.\r\n\r\nThe Thunder guard has been nicknamed “The Dorture Chamber” for his suffocating defense, but his Thunder teammates have also been calling him “DPOY” of late to bring awareness to their belief that he should win the 2025 NBA Defensive Player of the Year award.', '', '2025-04-15 12:13:35'),
(3, 'Why the Nuggets fired their coach and GM with just days left in the season', 'FOR THE PAST 10 years, Michael Malone had been the lead narrator of the Denver Nuggets\' story. He played the tough guy when his team needed it during its championship run. He was the empathetic loyalist when Jamal Murray suffered a devastating knee injury in 2021. He became Nikola Jokic\'s hype man during each of his three MVP seasons, chiding anyone who didn\'t appreciate or vote for the Serbian superstar.', NULL, '2025-04-15 13:35:57'),
(4, 'Pacers erase 27-point deficit vs. Cavaliers to clinch 50 wins.', 'Indiana staged the biggest comeback in team history, erasing a 27-point deficit for a 126-118 victory in double overtime.\r\n\r\nIt also gave the Pacers 50 wins for the 10th time in franchise history, but first since the 2013-14 season.\r\n\r\n\"Certainly proud of the group that finished the game. They showed so much courage and fortitude, it was amazing,\" the Indiana coach said. \"Because of those guys, we have a 50-win season, which is something to really be proud of.\r\n\r\n\"Everyone kept saying to hang in and get a chance. These guys were inspirational.\"\r\n\r\nIndiana\'s previous biggest comeback was a 112-104 victory over Detroit on March 15, 2014, after it trailed by 25.', NULL, '2025-04-15 13:39:23');

-- --------------------------------------------------------

--
-- Table structure for table `upcoming_fixtures`
--

CREATE TABLE `upcoming_fixtures` (
  `id` int(11) NOT NULL,
  `game_date` date NOT NULL,
  `game_time` time NOT NULL,
  `team_home` varchar(100) NOT NULL,
  `team_away` varchar(100) NOT NULL,
  `venue` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `upcoming_fixtures`
--

INSERT INTO `upcoming_fixtures` (`id`, `game_date`, `game_time`, `team_home`, `team_away`, `venue`) VALUES
(1, '2025-05-14', '18:00:00', 'Los Angeles Lakers', 'Denver Nuggets', 'Crypto.com Arena'),
(2, '2025-05-15', '19:00:00', 'Golden State Warriors', 'Dallas Mavericks', 'Chase Center'),
(3, '2025-05-16', '19:30:00', 'Minnesota Timberwolves', 'LA Clippers', 'Target Center'),
(4, '2025-05-18', '17:30:00', 'Memphis Grizzlies', 'Boston Celtics', 'FedExForum Arena'),
(5, '2025-05-19', '18:00:00', 'Oklahoma City Thunder', 'Atlanta Hawks', 'Paycom Center');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `age` int(3) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `age`, `location`, `date`, `password`) VALUES
(1, 'ben', 'binoy', 'ff@gmail.com', 45, 'dublin', '2025-04-29 16:13:38', 'PASSWORD'),
(2, 'ben', 'binoy', 'ff@gmail.com', 45, 'dublin', '2025-04-29 16:14:24', 'PASSWORD'),
(3, 'ben', 'g', '123@gmail.com', 33, 'dublin', '2025-04-30 10:37:41', 'PASSWORD'),
(4, '', 'ff', 'kcbdjcbd@cbdcjhdc.com', 45, 'france', '2025-04-30 10:42:24', 'PASSWORD'),
(5, '22331', '', '', 0, '', '2025-04-30 10:57:43', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lakers_comments`
--
ALTER TABLE `lakers_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lugentez_comments`
--
ALTER TABLE `lugentez_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nuggets_comments`
--
ALTER TABLE `nuggets_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `pacers_comments`
--
ALTER TABLE `pacers_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recent_fixtures`
--
ALTER TABLE `recent_fixtures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tradenews`
--
ALTER TABLE `tradenews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upcoming_fixtures`
--
ALTER TABLE `upcoming_fixtures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lakers_comments`
--
ALTER TABLE `lakers_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `lugentez_comments`
--
ALTER TABLE `lugentez_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nuggets_comments`
--
ALTER TABLE `nuggets_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pacers_comments`
--
ALTER TABLE `pacers_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `recent_fixtures`
--
ALTER TABLE `recent_fixtures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tradenews`
--
ALTER TABLE `tradenews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `upcoming_fixtures`
--
ALTER TABLE `upcoming_fixtures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
