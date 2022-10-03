-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 02, 2022 at 10:00 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce-website-php`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(0, 'Humor'),
(1, 'Mystery'),
(2, 'Horror'),
(3, 'Thriller'),
(4, 'action');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `subject` varchar(55) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `description` int(11) NOT NULL,
  `discount_percent` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`id`, `name`, `description`, `discount_percent`, `created_at`, `modified_at`) VALUES
(1, 187, 15, 18, '2012-10-12 15:16:41', '2014-10-01 15:16:41');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` varchar(55) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `SKU` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `discount_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp(),
  `author` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `SKU`, `price`, `discount_id`, `created_at`, `modified_at`, `author`, `image`, `category`) VALUES
(6, 'Legends & Lattes', 'This program is read by the author.\r\n\r\nThe much-beloved BookTok sensation, Travis Baldrees novel of high fantasy and low stakes.\r\n\r\nCome take a load off at Vivs cafe, the first and only coffee shop in Thune. Grand opening!\r\n\r\nWorn out after decades of packing steel and raising hell, Viv, the orc barbarian, cashes out of the warrior’s life with one final score. A forgotten legend, a fabled artifact, and an unreasonable amount of hope lead her to the streets of Thune, where she plans to open the first coffee shop the city has ever seen.\r\n\r\nHowever, her dreams of a fresh start filling mugs instead of swinging swords are hardly a sure bet. Old frenemies and Thune’s shady underbelly may just upset her plans. To finally build something that will last, Viv will need some new partners, and a different kind of resolve.', 692, '20', NULL, '2022-10-01 22:08:27', '2022-10-01 22:08:27', 'Travis Baldree', '1664651307-1.jpg', 0),
(7, 'Nona the Ninth', 'Her city is under siege.\r\n\r\nThe zombies are coming back.\r\n\r\nAnd all Nona wants is a birthday party.\r\n\r\nIn many ways, Nona is like other people. She lives with her family, has a job at her local school, and loves walks on the beach and meeting new dogs. But Nonas not like other people. Six months ago she woke up in a strangers body, and shes afraid she might have to give it back.\r\n\r\nThe whole city is falling to pieces. A monstrous blue sphere hangs on the horizon, ready to tear the planet apart. Blood of Eden forces have surrounded the last Cohort facility and wait for the Emperor Undying to come calling. Their leaders want Nona to be the weapon that will save them from the Nine Houses. Nona would prefer to live an ordinary life with the people she loves, with Pyrrha and Camilla and Palamedes, but she also knows that nothing lasts forever.\r\n\r\nAnd each night, Nona dreams of a woman with a skull-painted face...', 698, '24', NULL, '2022-10-01 22:10:40', '2022-10-01 22:10:40', 'Tamsyn Muir ', '1664651440-Tamsyn Muir.jpg', 0),
(8, 'Under the Whispering Door', 'A Man Called Ove meets The Good Place in Under the Whispering Door, a delightful queer love story from TJ Klune, author of the New York Times and USA Today bestseller The House in the Cerulean Sea.Welcome to Charons Crossing.The tea is hot, the scones are fresh, and the dead are just passing through.', 697, '61', NULL, '2022-10-01 22:12:26', '2022-10-01 22:12:26', 'TJ Klune', '1664651546-1250217342.01._SCLZZZZZZZ_SX500_.jpg', 0),
(9, ' A Ruin Of Roses', 'The beast.\r\n\r\nThe creature who stalks the forbidden wood.\r\n\r\nThe dragon prince.\r\n\r\n\r\n\r\nHe has suffered a fate worse than death. We all have. A curse put upon us by the mad king.\r\n\r\n\r\n\r\nWe are a kingdom locked in time. Shifters unable to feel our animals. Stuck here by a deal between the late king and a demon who seeks our destruction.', 694, '16', NULL, '2022-10-01 22:14:07', '2022-10-01 22:14:07', 'K F Breene', '1664651647-1955757097.01._SCLZZZZZZZ_SX500_.jpg', 0),
(10, 'The House in the Cerulean Sea', 'Linus Baker is a by-the-book case worker in the Department in Charge of Magical Youth. Hes tasked with determining whether six dangerous magical children are likely to bring about the end of the world.\r\n\r\nArthur Parnassus is the master of the orphanage. He would do anything to keep the children safe, even if it means the world will burn. And his secrets will come to light.\r\n', 694, '23', NULL, '2022-10-01 22:15:11', '2022-10-01 22:15:11', 'TJ Klune', '1664651711-1250217288.01._SCLZZZZZZZ_SX500_.jpg', 0),
(11, 'Fairy tale', 'Charlie Reade looks like a regular high school kid, great at baseball and football, a decent student. But he carries a heavy load. His mom was killed in a hit-and-run accident when he was seven, and grief drove his dad to drink. Charlie learned how to take care of himself—and his dad. When Charlie is seventeen, he meets a dog named Radar and her aging master, Howard Bowditch, a recluse in a big house at the top of a big hill, with a locked shed in the backyard. Sometimes strange sounds emerge from it.\r\n', 585, '32', NULL, '2022-10-01 22:16:32', '2022-10-01 22:16:32', 'Stephen King ', '1664651792-51mDSB+k7YL._SX327_BO1,204,203,200_.jpg', 1),
(12, 'The Atlas Six', 'Each decade, only the six most uniquely talented magicians are selected to earn a place in the Alexandrian Society, the foremost secret society in the world. The chosen will secure a life of power and prestige beyond their wildest dreams.\r\n\r\nBut at what cost?\r\n\r\nEach of the six newest recruits has their reasons for accepting the Societys elusive invitation. Even if it means growing closer than they could have imagined to their most dangerous enemies― or risking unforgivable betrayal from their most trusted allies― they will fight tooth and nail for the right to join the ranks of the Alexandrians.', 584, '23', NULL, '2022-10-01 22:17:31', '2022-10-01 22:17:31', '2', '1664651851-41EscppUr0L._SX327_BO1,204,203,200_.jpg', 1),
(13, 'Ordinary Monsters', '\r\n\"Ordinary Monsters is a towering achievement: a dazzling mountain of wild invention, Dickensian eccentrics, supernatural horrors, and gripping suspense. Be warned... once you step into this penny dreadful to end all penny dreadfuls, youll never want to leave.\" ―Joe Hill, #1 New York Times bestselling author of The Fireman and Heart-Shaped Box', 547, '26', NULL, '2022-10-01 22:18:18', '2022-10-01 22:18:18', 'J. M. Miro', '1664651898-51bX8w8OwmL.jpg', 1),
(14, 'The Raven Spell ', 'After a nearly fatal blow to the skull, traumatized private detective Ian Cameron is found dazed and confused on a muddy riverbank in Victorian London. Among his effects: a bloodstained business card bearing the name of a master wizard and a curious pocket watch that doesn’t seem to tell time. To retrieve his lost memories, Ian demands answers from Edwina and Mary Blackwood, sister witches with a murky past. But as their secret is slowly unveiled, a dangerous mystery emerges on the darkened streets of London.', 547, '52', NULL, '2022-10-01 22:19:12', '2022-10-01 22:19:12', 'Luanne G. Smith', '1664651952-1542034043.01._SCLZZZZZZZ_SX500_.jpg', 1),
(15, 'The Quarter Storm', 'Haitian-American Vodou priestess Mambo Reina Dumond runs a healing practice from her New Orleans home. Gifted with water magic since she was a child, Reina is devoted to the benevolent traditions of her ancestors.', 854, '89', NULL, '2022-10-01 22:20:24', '2022-10-01 22:20:24', 'Veronica G. Henrylength', '1664652024-1212.jpg', 1),
(16, 'The Silent Patient', '\"An unforgettable―and Hollywood-bound―new thriller... A mix of Hitchcockian suspense, Agatha Christie plotting, and Greek tragedy.', 447, '582', NULL, '2022-10-01 22:22:11', '2022-10-01 22:22:11', 'Alex Michaelides', '1664652131-91lslnZ-btL.jpg', 2),
(17, 'The Final Girl  Support Group', 'Like his bestselling novel The Southern Book Club’s Guide to Slaying Vampires, Grady Hendrix’s latest is a fast-paced, frightening, and wickedly humorous thriller. From chain saws to summer camp slayers, The Final Girl Support Group pays tribute to and slyly subverts our most popular horror films—movies like The Texas Chainsaw Massacre, A Nightmare on Elm Street, and Scream.\r\n', 574, '45', NULL, '2022-10-01 22:23:13', '2022-10-01 22:23:13', 'Grady Hendrix', '1664652193-71UpVyXhujL.jpg', 2),
(18, 'The Girl Next  Door', 'A teenagers dreams come true when a former dramatic star moves in next door and they fall in love.A teenagers dreams come true when a former porn star moves', 478, '54', NULL, '2022-10-01 22:26:39', '2022-10-01 22:26:39', 'jack melkson', '1664652399-22.jpg', 2),
(19, 'If It Bleeds ', 'Readers adore Stephen King’s novels, and his novellas are their own dark treat, briefer but just as impactful and enduring as his longer fiction. Many of his novellas have been made into iconic films, including The Body (Stand by Me) and Rita Hayworth and Shawshank Redemption (Shawshank Redemption).', 521, '65', NULL, '2022-10-01 22:27:29', '2022-10-01 22:27:29', 'Stephen King', '1664652449-aaaa.jpg', 2),
(20, 'Dont Look  Back', 'Undercover FBI agent Jenna Alton has been playing wife to dangerous criminal husband Michael Carlos for four years. Tonight she plans to make her escape. But as she gathers her belongings together, she hears something that stops her in her tracks – hes taken a young girl called Mandy, and shes being held somewhere close. Jenna knows what she must do – find the child and get her to safety – even if it means risking her own life.', 436, '23', NULL, '2022-10-01 22:28:42', '2022-10-01 22:28:42', ' D.K. Hood', '1664652522-61Si3XE3QyL.jpg', 2),
(21, 'The Starless Crown', 'A gifted student foretells an apocalypse. Her reward is a sentence of death.\r\n\r\nFleeing into the unknown she is drawn into a team of outcasts:\r\n\r\nA broken soldier, who once again takes up the weapons he forbidden to wield and carves a trail back home.\r\n\r\nA drunken prince, who steps out from his beloved brothers shadow and claims a purpose of his own.\r\n\r\nAn imprisoned thief, who escapes the crushing dark and discovers a gleaming artifact - one that will ignite a power struggle across the globe.', 211, '45', NULL, '2022-10-01 22:30:38', '2022-10-01 22:30:38', 'James Rollins', '1664652638-124.jpg', 3),
(22, 'The Cartographers', '“The Cartographers is one of those brilliant books you have to read twice.” — Washington Post\r\n\r\n“There are echoes of Borges and Bradbury, Pynchon and Finians Rainbow, but Ms. Shepherds exhilarating and enjoyable work casts a magical glow all its own.” — Wall Street Journal', 252, '12', NULL, '2022-10-01 22:31:35', '2022-10-01 22:31:35', 'Peng Shepherd', '1664652695-81vwEfsiozL.jpg', 3),
(23, 'Big Bad  ', 'Buffy the Vampire Slayer meets Suicide Squad in this adult dark, rompy novel in which the most beloved villains from Buffy must team up to stop the Slayer from ending their evil universe!\r\nDemondale, Callifornia, 1999...Like Sunnydale, but whole lot more evil.', 214, '54', NULL, '2022-10-01 22:32:19', '2022-10-01 22:32:19', 'Lily Anderson', '1664652739-81-EmS9XF8L.jpg', 3),
(24, 'Hate Machine', 'The eighth book of this dark urban fantasy series follows necromancer Eric Carter through a world of vengeful gods and goddesses, mysterious murders, and restless ghosts.\r\n', 214, '49', NULL, '2022-10-01 22:33:12', '2022-10-01 22:33:12', 'Stephen Blackmoore', '1664652792-81tg0munjuL.jpg', 3),
(25, 'Speak of Ashes', 'So I broke into this guy’s place to kill him.\r\n\r\nDon’t judge me. Dude ate peoples souls. I guess running a criminal empire didnt leave Daddy much time to teach him manners.\r\n\r\nBut this isnt really about him. Its not really about the picture on his shelf either.', 214, '12', NULL, '2022-10-01 22:34:18', '2022-10-01 22:34:18', ' Christine McGovern', '1664652858-71PQfmlENtS.jpg', 3),
(26, 'The Midnight Line: A Jack Reacher Novel Hardcover ', 'Reacher takes a stroll through a small Wisconsin town and sees a class ring in a pawn shop window: West Point 2005. A tough year to graduate: Iraq, then Afghanistan. The ring is tiny, for a woman, and it has her initials engraved on the inside. Reacher wonders what unlucky circumstance made her give up something she earned over four hard years. He decides to find out. And find the woman. And return her ring. Why not?', 124, '21', NULL, '2022-10-01 22:38:49', '2022-10-01 22:38:49', 'Lee Child ', '1664653129-1.jpg', 4),
(27, 'End Game: A Jack Noble Thriller', 'Marcus Hamilton Thanos is marked for death.\r\nAnd Jack Noble is the man for the job.\r\nBut when the high-profile target vanishes the day of the assassination attempt,\r\nJack is forced to team up with a female FBI agent who was poised to learn Thanoss secret that morning.', 25, '41', NULL, '2022-10-01 22:39:52', '2022-10-01 22:39:52', 'L.T. Ryan', '1664653192-223.jpg', 4),
(28, 'No Plan B: A Jack Reacher Novel ', 'In Gerrardsville, Colorado, a woman dies under the wheels of a moving bus. The death is ruled a suicide. But Jack Reacher saw what really happened: A man in a gray hoodie and jeans, moving stealthily, pushed the victim to her demise—before swiftly grabbing the dead woman’s purse and strolling away.', 141, '21', NULL, '2022-10-01 22:40:33', '2022-10-01 22:40:33', 'Lee Child ', '1664653233-77.jpg', 4),
(29, 'One Good Deed', 'Its 1949. When war veteran Aloysius Archer is released from Carderock Prison, he is sent to Poca City on parole with a short list of dos and a much longer list of donts: do report regularly to his parole officer, dont go to bars, certainly dont drink alcohol, do get a job -- and dont ever associate with loose women.', 215, '21', NULL, '2022-10-01 22:41:57', '2022-10-01 22:41:57', 'David Baldacci', '1664653317-96.jpg', 4),
(30, 'W. E. B. Griffin Rogue Asset by Andrews & Wilson', 'Secretary of State Frank Malone has been kidnapped from his Cairo hotel—his security detail wiped out. President Natalie Cohen is left with several unacceptable options. Its time to think outside the box, and that can only mean one thing: the revival of the Presidential Agent program.\r\n', 251, '51', NULL, '2022-10-01 22:42:53', '2022-10-01 22:42:53', 'Brian Andrews', '1664653373-1111.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(32) NOT NULL,
  `first_name` varchar(55) NOT NULL,
  `last_name` varchar(55) NOT NULL,
  `address` text NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(55) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `payment_id` (`payment_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_details_ibfk_1` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discount_id` (`discount_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`payment_id`) REFERENCES `payment_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD CONSTRAINT `payment_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`discount_id`) REFERENCES `discount` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
