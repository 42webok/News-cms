-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2025 at 05:46 PM
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
-- Database: `news-cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `post` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(1, 'Sports', 4),
(2, 'Technology', 4);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `post_date` varchar(50) NOT NULL,
  `author` int(11) NOT NULL,
  `post_img` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES
(7, 'The Rise of Artificial Intelligence: Transforming Our Future', 'Artificial Intelligence (AI) is no longer just a concept in science fiction; it has become an integral part of our daily lives. From voice assistants like Siri and Alexa to advanced machine learning algorithms driving innovations in healthcare, transportation, and finance, AI is reshaping industries and creating new opportunities.\r\n\r\nAI-powered applications have enhanced productivity, improved decision-making, and provided solutions to complex problems. For example, self-driving cars are making transportation safer, while AI in medicine is helping doctors diagnose diseases with greater accuracy.\r\n\r\nHowever, the rapid rise of AI also comes with challenges. Issues such as data privacy, ethical concerns, and the potential impact on jobs require careful consideration. As we move forward, balancing innovation with responsibility will be key to ensuring that AI benefits society as a whole.\r\n\r\nThe future of AI is full of potential, from personalized learning to combating climate change. By embracing this technology, we can create a smarter, more connected, and efficient world.', '2', '18 Jan, 2025', 1, 'img_678b8aeab60eb9.72979756.jpg'),
(8, '5G Technology: Revolutionizing Connectivity Worldwide', 'The rollout of 5G technology is redefining the way we connect and communicate. Promising ultra-fast speeds, lower latency, and higher device capacity, 5G is set to revolutionize industries ranging from entertainment to healthcare.\r\n\r\nWith 5G, streaming high-definition videos, participating in real-time gaming, and enabling augmented reality (AR) experiences become seamless. Beyond consumer applications, 5G will also power advancements in smart cities, autonomous vehicles, and the Internet of Things (IoT).\r\n\r\nHowever, the journey to global 5G adoption isn’t without its challenges. Infrastructure development, cost concerns, and security issues need to be addressed. Despite these hurdles, 5G technology is poised to become the backbone of a fully connected, digital future.', '2', '18 Jan, 2025', 1, 'img_678b8b34789e59.56716840.png'),
(9, 'Blockchain Beyond Cryptocurrency: Transforming Industries', 'While blockchain is best known as the technology behind cryptocurrencies like Bitcoin, its potential goes far beyond digital currencies. Blockchain is a decentralized, secure, and transparent system that is revolutionizing industries such as finance, supply chain, and healthcare.\r\n\r\nIn the financial sector, blockchain enables faster and more secure transactions, eliminating intermediaries and reducing costs. In supply chain management, it ensures transparency and traceability, helping businesses and consumers track the journey of goods from origin to destination.\r\n\r\nHealthcare is another industry benefiting from blockchain technology. By providing a secure way to store and share patient data, blockchain enhances privacy and interoperability between healthcare providers.\r\n\r\nAs businesses explore innovative applications, blockchain is emerging as a game-changing technology that offers trust, transparency, and efficiency. It’s clear that the impact of blockchain will continue to grow far beyond cryptocurrency.', '2', '18 Jan, 2025', 1, 'img_678b8b704cfb14.16942548.jpg'),
(10, 'Epic Victory: Team USA Clinches Basketball World Cup Title', '                        In a thrilling finale, Team USA emerged victorious at the Basketball World Cup, defeating Spain in a nail-biting match with a score of 89-85. The game, held in Manila, showcased exceptional performances from both teams, keeping fans on the edge of their seats until the final buzzer.\r\n\r\nStar player Jason Tatum led Team USA with 28 points, 10 rebounds, and 5 assists, earning him the title of the tournament’s Most Valuable Player. Spain fought valiantly, with their captain Ricky Rubio contributing 22 points and showing incredible leadership throughout the game.\r\n\r\nThis victory marks Team USA’s sixth World Cup title and their first since 2014, re-establishing their dominance on the international basketball stage. Coach Steve Kerr praised the team’s resilience, stating, “The players gave it their all and showed the world what teamwork and determination can achieve.”\r\n\r\nFans across the globe celebrated the triumph, with social media buzzing about the memorable game. The victory cements Team USA’s status as a basketball powerhouse and sets the stage for an exciting lead-up to the Paris Olympics in 2028.                ', '1', '18 Jan, 2025', 2, 'img_678b8bc8f30a94.11481753.webp'),
(12, 'Elden Ring DLC: \'Shadow of the Erdtree\' Set to Release This Summer', 'The wait is almost over for Elden Ring fans! FromSoftware has officially announced that the highly anticipated DLC, Shadow of the Erdtree, will launch this summer. The expansion promises to delve deeper into the lore of the Lands Between, offering players new regions to explore, bosses to conquer, and mysteries to unravel.\r\n\r\nWhile the developers have kept most details under wraps, teaser images hint at a hauntingly beautiful landscape, possibly tied to the enigmatic character Miquella. Fans are speculating about new weapon types, abilities, and gameplay mechanics based on leaked files and cryptic social media posts from the studio.\r\n\r\nSince its release, Elden Ring has captured the hearts of millions, earning Game of the Year accolades for its stunning open-world design and challenging gameplay. The announcement of the DLC has reignited excitement among the community, with forums and fan pages buzzing with theories and wish lists.', '1', '18 Jan, 2025', 1, 'img_678b8c6fd40840.20363523.jpeg'),
(15, 'Recent post', 'abcd', '1', '19 Jan, 2025', 1, 'img_678c5ee13acc93.61681220.jpg'),
(14, 'Happy birthday ', 'Test', '2', '18 Jan, 2025', 2, 'img_678c06b4196058.48637307.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(1, 'Ahmad', 'Riaz', 'Ahmad', '61243c7b9a4022cb3f8dc3106767ed12', 1),
(2, 'Ali', 'khan', 'Ali Khan', 'd8578edf8458ce06fbc5bb76a58c5ca4', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
