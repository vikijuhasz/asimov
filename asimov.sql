-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2020 at 10:09 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asimov`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `description` text,
  `rating` decimal(10,4) DEFAULT NULL,
  `image_url` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `inventory` int(11) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `created_at`, `updated_at`, `title`, `category`, `description`, `rating`, `image_url`, `price`, `inventory`, `deleted`) VALUES
(2, '2019-06-30 00:00:00', '2019-12-16 13:46:55', 'I, Robot', '2', 'I, Robot, the first and most widely read book in Asimov’s Robot series, forever changed the world’s perception of artificial intelligence. Here are stories of robots gone mad, of mind-reading robots, and robots with a sense of humor. Of robot politicians, and robots who secretly run the world—all told with the dramatic blend of science fact and science fiction that has become Asimov’s trademark. \r\n\r\nThe Three Laws of Robotics:\r\n1) A robot may not injure a human being or, through inaction, allow a human being to come to harm.\r\n2) A robot must obey orders given to it by human beings except where such orders would conflict with the First Law.\r\n3) A robot must protect its own existence as long as such protection does not conflict with the First or Second Law.\r\n\r\nWith these three, simple directives, Isaac Asimov formulated the laws governing robots’ behavior. In I, Robot, Asimov chronicles the development of the robot from its primitive origins in the present to its ultimate perfection in the not-so-distant future—a  future in which humanity itself may be rendered obsolete.', '0.0000', 'uploads\\books\\6b4d82ee2d4e1e50ab21cdad96fb4c60615dbab0.jpg', '15.00', 15, 0),
(20, '2019-09-09 14:25:37', '2019-12-16 13:52:52', 'The Caves of Steel (The Robot Series Book 1)', '2', 'Like most people left behind on an over-populated Earth, New York City police detective Elijah Baley had little love for either the arrogant Spacers or their robotic companions. But when a prominent Spacer is murdered under mysterious circumstances, Baley is ordered to the Outer Worlds to help track down the killer.  \r\n\r\nThe relationship between Life and his Spacer superiors, who distrusted all Earthmen, was strained from the start. Then he learned that they had assigned him a partner: R. Daneel Olivaw.  Worst of all was that the “R” stood for robot—and his positronic partner was made in the image and likeness of the murder victim!', '0.0000', 'uploads\\books\\145b6d5660b2b1716c2f819be88aad99a47c9669.jpg', '20.00', 7, 0),
(22, '2019-12-16 14:00:58', '2019-12-16 14:00:58', 'The Naked Sun (The Robot Series Book 2)', '2', 'A millennium into the future, two advancements have altered the course of human history:  the colonization of the Galaxy and the creation of the positronic brain.  On the beautiful Outer World planet of Solaria, a handful of human colonists lead a hermit-like existence, their every need attended to by their faithful robot servants.  To this strange and provocative planet comes Detective Elijah Baley, sent from the streets of New York with his positronic partner, the robot R. Daneel Olivaw, to solve an incredible murder that has rocked Solaria to its foundations.  The victim had been so reclusive that he appeared to his associates only through holographic projection.  Yet someone had gotten close enough to bludgeon him to death while robots looked on.  Now Baley and Olivaw are faced with two clear impossibilities:  Either the Solarian was killed by one of his robots--unthinkable under the laws of Robotics--or he was killed by the woman who loved him so much that she never came into his presence!', '0.0000', 'uploads\\books\\328bdaf52b2dda7d86395de43f92850181879fae.jpg', '20.00', 10, 0),
(23, '2019-12-16 14:02:37', '2019-12-16 14:02:37', 'The Robots of Dawn (The Robot Series Book 3)', '2', 'A millennium into the future two advances have altered the course of human history: the colonization of the Galaxy and the creation of the positronic brain. Isaac Asimov&#039;s Robot novels chronicle the unlikely partnership between a New York City detective and a humanoid robot who must learn to work together.\r\n\r\nDetective Elijah Baiey is called to the Spacer world Aurora to solve a bizarre case of roboticide. The prime suspect is a gifted roboticist who had the means, the motive, and the opportunity to commit the crime. There&#039;s only one catch: Baley and his positronic partner, R. Daneel Olivaw, must prove the man innocent. For in a case of political intrigue and love between woman and robot gone tragically wrong, there&#039;s more at stake than simple justice. This time Baley&#039;s career, his life, and Earth&#039;s right to pioneer the Galaxy lie in the delicate balance.', '0.0000', 'uploads\\books\\789723a5e895e01c0aa49a43187f11542b64b896.jpg', '20.00', 14, 0),
(24, '2019-12-17 12:23:12', '2019-12-17 12:23:45', 'The Stars, Like Dust (Galactic Empire Series Book 1)', '4', 'Biron Farrell was young and naïve, but he was growing up fast. A radiation bomb planted in his dorm room changed him from an innocent student at the University of Earth to a marked man, fleeing desperately from an unknown assassin.\r\nHe soon discovers that, many light-years away, his father, the highly respected Rancher of Widemos, has been murdered. Stunned, grief-stricken, and outraged, Biron is determined to uncover the reasons behind his father&#039;s death, and becomes entangled in an intricate saga of rebellion, political intrigue, and espionage.\r\nThe mystery takes him deep into space where he finds himself in a relentless struggle with the power-mad despots of Tyrann. Now it is not just a case of life or death for Biron, but a question of freedom for the galaxy.', '0.0000', 'uploads\\books\\d43988a7ec1e0f53c0267518c81f3960c80b5838.jpg', '15.00', 5, 0),
(25, '2019-12-17 12:27:43', '2019-12-17 12:27:57', 'The Currents of Space (Galactic Empire Series Book 2)', '4', 'High above planet Florinia, the Squires of Sark live in unimaginable wealth and comfort. Down in the eternal spring of the planet, however, the native Florinians labor ceaselessly to produce the precious kyrt that brings prosperity to their Sarkite masters.\r\nRebellion is unthinkable and impossible. Not only do the Florinians no longer have a concept of freedom, any disruption of the vital kyrt trade would cause other planets to rise in protest, resulting in a galactic war. So the Trantorian Empire, whose grand plan is to unite all humanity in peace, prosperity, and freedom, has allowed the oppression to continue.\r\nLiving among the workers of Florinia, Rik is a man without a memory or a past. He has been abducted and brainwashed. Barely able to speak or care for himself when he was found, Rik is widely regarded as a simpleton by the worker community where he lives. As his memories begin to return, however, Rik finds himself driven by a cryptic message he is determined to deliver: Everyone on Florinia is doomed…the Currents of Space are bringing destruction. But if the planet is evacuated, the power of Sark will end-so there are those who would kill the messenger. The fate of the Galaxy hangs in the balance.', '0.0000', 'uploads\\books\\fb3a264214e1e241a09a9277d9f2db7b623cb673.jpg', '15.00', 6, 0),
(26, '2019-12-17 12:29:21', '2019-12-17 12:29:21', 'Pebble in the Sky (Galactic Empire Series Book 3)', '4', 'One moment Joseph Schwartz is a happily retired tailor in Chicago, 1949. The next he&#039;s a helpless stranger on Earth during the heyday of the first Galactic Empire.\r\nEarth, as he soon learns, is a backwater, just a pebble in the sky, despised by all the other 200 million planets of the Empire because its people dare to claim it&#039;s the original home of man. And Earth is poor, with great areas of radioactivity ruining much of its soil--so poor that everyone is sentenced to death at the age of sixty.\r\nJoseph Schwartz is sixty-two.\r\nThis is young Isaac Asimov&#039;s first novel, full of wonders and ideas, the book that launched the novels of the Galactic Empire, culminating in the Foundation series. This is Golden Age SF at its finest.', '0.0000', 'uploads\\books\\11069774332a6afed49fb6b1706689b80f837f1b.jpg', '17.00', 10, 0),
(27, '2019-12-17 12:35:49', '2019-12-17 12:35:49', 'Foundation (The Foundation Series Book 1)', '1', 'For twelve thousand years the Galactic Empire has ruled supreme. Now it is dying. Only Hari Seldon, creator of the revolutionary science of psychohistory, can see into the future—a dark age of ignorance, barbarism, and warfare that will last thirty thousand years. To preserve knowledge and save humanity, Seldon gathers the best minds in the Empire—both scientists and scholars—and brings them to a bleak planet at the edge of the galaxy to serve as a beacon of hope for future generations. He calls this sanctuary the Foundation. \r\nBut soon the fledgling Foundation finds itself at the mercy of corrupt warlords rising in the wake of the receding Empire. And mankind’s last best hope is faced with an agonizing choice: submit to the barbarians and live as slaves—or take a stand for freedom and risk total destruction.', '0.0000', 'uploads\\books\\598702e65697887b20a2964d6f14a864aa472f4e.jpg', '14.00', 7, 0),
(28, '2019-12-17 12:37:59', '2019-12-17 12:37:59', 'Foundation and Empire (The Foundation Series Book 2)', '1', 'Led by its founding father, the great psychohistorian Hari Seldon, and taking advantage of its superior science and technology, the Foundation has survived the greed and barbarism of its neighboring warrior-planets. Yet now it must face the Empire—still the mightiest force in the Galaxy even in its death throes. When an ambitious general determined to restore the Empire’s glory turns the vast Imperial fleet toward the Foundation, the only hope for the small planet of scholars and scientists lies in the prophecies of Hari Seldon.\r\nBut not even Hari Seldon could have predicted the birth of the extraordinary creature called The Mule—a mutant intelligence with a power greater than a dozen battle fleets . . . a power that can turn the strongest-willed human into an obedient slave.', '0.0000', 'uploads\\books\\d030d25ba07c7f4322cebaa571bc72e522abf8ac.jpg', '16.00', 3, 0),
(29, '2019-12-17 12:39:10', '2019-12-17 12:39:10', 'Second Foundation (The Foundation Series Book 3)', '1', 'After years of struggle, the Foundation lies in ruins—destroyed by the mutant mind power of the Mule. But it is rumored that there is a Second Foundation hidden somewhere at the end of the Galaxy, established to preserve the knowledge of mankind through the long centuries of barbarism. The Mule failed to find it the first time—but now he is certain he knows where it lies.\r\nThe fate of the Foundation rests on young Arcadia Darell, only fourteen years old and burdened with a terrible secret. As its scientists gird for a final showdown with the Mule, the survivors of the First Foundation begin their desperate search. They too want the Second Foundation destroyed . . . before it destroys them.', '0.0000', 'uploads\\books\\d640779df6cd7432f39f7f8e39b199ae19496dfe.jpg', '14.00', 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `purchased` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `url` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `url`) VALUES
(1, 'Foundation Series', 'foundation_series'),
(2, 'The Robot Series', 'robot_series'),
(4, 'Galactic Empire Series', 'galactic_empire_series');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(11) NOT NULL,
  `migration` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`) VALUES
(1, 'Migration1549756212'),
(2, 'Migration1549770647'),
(4, 'Migration1561871625'),
(5, 'Migration1561964855'),
(6, 'Migration1562139724'),
(7, 'Migration1571327801');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `rating` tinyint(1) NOT NULL,
  `body` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `username` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `fname` varchar(150) DEFAULT NULL,
  `lname` varchar(150) DEFAULT NULL,
  `acl` text,
  `deleted` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `created_at`, `updated_at`, `username`, `email`, `password`, `fname`, `lname`, `acl`, `deleted`) VALUES
(1, '2019-07-15 05:54:30', '2019-07-15 05:56:02', 'Viki11', 'viki@sharklasers.com', '$2y$10$Xo4QK/CU8Nq3ogwwTrLd9e5456BhK/l3FB8urrhvyn9tT0vV255Z2', 'Vikt&oacute;ria', 'Juh&aacute;sz', NULL, 0),
(2, '2019-07-16 15:55:30', '2019-07-16 15:55:30', 'AdminViki', 'viki@sharklasers.com', '$2y$10$dmLNu.zkM2VVA9Lki5gE7.3MsQlQMRLIDTk/OEXJfxjvMAd5ovSni', 'AdminViki', 'Juh&aacute;sz', '[\"Admin\"] 	', 0),
(4, '2019-10-10 10:04:38', '2019-10-10 10:04:38', '&lt;password&gt;', 'myemail@email.com', '$2y$10$XpGCmTAuLD8ihoYXBZ3wa.w5QxyQ0j.3hZgcBu59AAJmG5MFiHJ.O', '&lt;password&gt;', '&lt;password&gt;', NULL, 0),
(5, '2019-10-10 10:11:41', '2019-10-10 10:11:41', 'entity', 'myemail@email.com', '$2y$10$vGbY9DuPxYGlssN/69k.Y.bW1Ht.GDilODCGVFBw.DPMgeAstY.oS', 'less than sign', 'in password', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_sessions`
--

CREATE TABLE `user_sessions` (
  `id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `session` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deleted` (`deleted`),
  ADD KEY `title` (`title`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `migration` (`migration`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deleted` (`deleted`),
  ADD KEY `created_at` (`created_at`),
  ADD KEY `updated_at` (`updated_at`);

--
-- Indexes for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `session` (`session`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_sessions`
--
ALTER TABLE `user_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
