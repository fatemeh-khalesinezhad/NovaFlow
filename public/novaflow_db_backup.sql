-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 14, 2026 at 12:09 AM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `novaflow_db1`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

DROP TABLE IF EXISTS `contact_messages`;
CREATE TABLE IF NOT EXISTS `contact_messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `subject` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `subject`, `message`, `created_at`) VALUES
(7, 'Jake Williams', 'jake.williams@novaflow.com', 'Question about Nova Pro 16\"', 'Hi, I’m interested in the Nova Pro 16\". Does it come with a dedicated GPU or just the integrated one? Thanks!', '2026-06-14 00:06:10'),
(8, 'Emily Johnson', 'emily.johnson@novaflow.com', 'Shipping to Europe', 'Do you offer express shipping to Germany? I need a laptop before my semester starts.', '2026-06-14 00:06:10'),
(9, 'Mike Chen', 'mike.chen@novaflow.com', 'Pulse Gaming restock', 'When will the Pulse Gaming phone be back in stock? I’ve been waiting for weeks!', '2026-06-14 00:06:10'),
(10, 'Sophia Martinez', 'sophia.martinez@novaflow.com', 'AeroBeats Max sound quality', 'I just received my AeroBeats Max – the sound is incredible! Just wanted to say thanks.', '2026-06-14 00:06:10'),
(11, 'Ryan Thompson', 'ryan.thompson@novaflow.com', 'Business discount inquiry', 'I’m ordering 10 Nova Air laptops for my startup. Do you offer bulk discounts?', '2026-06-14 00:06:10');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `status` enum('pending','shipped','delivered') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `status`, `created_at`) VALUES
(12, 21, 549.00, 'shipped', '2026-06-05 08:15:00'),
(11, 20, 1798.00, 'delivered', '2026-05-28 05:30:00'),
(10, 19, 1848.00, 'pending', '2026-06-03 10:45:00'),
(9, 18, 2499.00, 'shipped', '2026-06-01 07:00:00'),
(8, 17, 5246.00, 'delivered', '2026-06-13 23:58:38'),
(13, 22, 4797.00, 'pending', '2026-06-07 12:50:00'),
(14, 13, 1199.00, 'delivered', '2026-05-25 04:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(28, 14, 9, 1, 1199.00),
(27, 13, 2, 3, 1599.00),
(26, 12, 18, 1, 549.00),
(25, 11, 16, 2, 899.00),
(24, 10, 19, 1, 249.00),
(23, 10, 2, 1, 1599.00),
(22, 9, 1, 1, 2499.00),
(21, 8, 12, 1, 1499.00),
(20, 8, 22, 1, 449.00),
(19, 8, 27, 1, 799.00),
(18, 8, 1, 1, 2499.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `category` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `rating` decimal(2,1) DEFAULT '0.0',
  `reviews` int DEFAULT '0',
  `emoji` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `specs` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `stock` int DEFAULT '10',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `featured` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `price`, `rating`, `reviews`, `emoji`, `description`, `specs`, `image`, `stock`, `created_at`, `featured`) VALUES
(1, 'Nova Pro 16\"', 'laptops', 2499.00, 4.9, 342, '💻', 'Ultimate performance laptop with M3 chip', '{\"CPU\": \"M3 Ultra\", \"RAM\": \"64GB\", \"Display\": \"16\\\" Retina XDR\", \"Storage\": \"2TB SSD\"}', 'nova-pro-16.png', 6, '2026-05-14 15:28:38', 0),
(2, 'Nova Air 14\"', 'laptops', 1599.00, 4.7, 521, '💻', 'Thin & light with all-day battery', '{\"CPU\": \"M3 Pro\", \"RAM\": \"32GB\", \"Display\": \"14\\\" Liquid Retina\", \"Storage\": \"1TB SSD\"}', 'nova-air-14.png', 5, '2026-05-14 15:28:38', 0),
(3, 'Nova Book 13\"', 'laptops', 999.00, 4.5, 892, '💻', 'Perfect everyday laptop', '{\"CPU\": \"M3\", \"RAM\": \"16GB\", \"Display\": \"13.6\\\" Retina\", \"Storage\": \"512GB SSD\"}', 'nova-book-13.png', 9, '2026-05-14 15:28:38', 0),
(4, 'Nova Studio 15\"', 'laptops', 3299.00, 4.8, 156, '💻', 'Creative workstation powerhouse', '{\"CPU\": \"M3 Max\", \"RAM\": \"128GB\", \"Display\": \"15.3\\\" XDR\", \"Storage\": \"4TB SSD\"}', 'nova-studio-15.png', 10, '2026-05-14 15:28:38', 0),
(5, 'Nova Flex 360', 'laptops', 1299.00, 4.4, 267, '💻', 'Convertible 2-in-1 laptop', '{\"CPU\": \"Intel i7\", \"RAM\": \"16GB\", \"Display\": \"14\\\" Touch OLED\", \"Storage\": \"512GB\"}', 'nova-flex-360.png', 9, '2026-05-14 15:28:38', 0),
(6, 'Nova Edge', 'laptops', 1899.00, 4.6, 178, '💻', 'Gaming-ready thin laptop', '{\"CPU\": \"AMD R9\", \"RAM\": \"32GB\", \"Display\": \"15.6\\\" 240Hz\", \"Storage\": \"1TB\"}', 'nova-edge.png', 10, '2026-05-14 15:28:38', 0),
(7, 'Nova Chromebook', 'laptops', 449.00, 4.2, 1205, '💻', 'Cloud-first lightweight laptop', '{\"CPU\": \"MediaTek\", \"RAM\": \"8GB\", \"Display\": \"14\\\" FHD\", \"Storage\": \"128GB\"}', 'nova-chromebook.png', 10, '2026-05-14 15:28:38', 0),
(8, 'Nova Ultra 17\"', 'laptops', 3999.00, 5.0, 89, '💻', 'No-compromise desktop replacement', '{\"CPU\": \"M3 Ultra\", \"RAM\": \"192GB\", \"Display\": \"17\\\" XDR\", \"Storage\": \"8TB SSD\"}', 'nova-ultra-17.png', 10, '2026-05-14 15:28:38', 0),
(9, 'Pulse X Pro', 'smartphones', 1199.00, 4.8, 2341, '📱', 'Flagship with revolutionary camera', '{\"RAM\": \"12GB\", \"Chip\": \"A18 Pro\", \"Camera\": \"48MP Triple\", \"Storage\": \"256GB\"}', 'pulse-x-pro.png', 9, '2026-05-14 15:28:38', 0),
(10, 'Pulse X', 'smartphones', 999.00, 4.7, 3102, '📱', 'Premium experience for everyone', '{\"RAM\": \"8GB\", \"Chip\": \"A18\", \"Camera\": \"48MP Dual\", \"Storage\": \"128GB\"}', 'pulse-x.png', 8, '2026-05-14 15:28:38', 0),
(11, 'Pulse Lite', 'smartphones', 599.00, 4.5, 4521, '📱', 'Essential features, amazing value', '{\"RAM\": \"6GB\", \"Chip\": \"A17\", \"Camera\": \"12MP Dual\", \"Storage\": \"128GB\"}', 'pulse-lite.png', 10, '2026-05-14 15:28:38', 0),
(12, 'Pulse Ultra', 'smartphones', 1499.00, 4.9, 876, '📱', 'Titanium build, AI-powered', '{\"RAM\": \"16GB\", \"Chip\": \"A18 Ultra\", \"Camera\": \"200MP Quad\", \"Storage\": \"1TB\"}', 'pulse-ultra.png', 9, '2026-05-14 15:28:38', 0),
(13, 'Pulse Fold', 'smartphones', 1799.00, 4.6, 423, '📱', 'Foldable future in your pocket', '{\"RAM\": \"12GB\", \"Chip\": \"A18 Pro\", \"Display\": \"7.6\\\" Fold\", \"Storage\": \"512GB\"}', 'pulse-fold.png', 10, '2026-05-14 15:28:38', 0),
(14, 'Pulse Mini', 'smartphones', 799.00, 4.4, 1876, '📱', 'Compact powerhouse', '{\"RAM\": \"8GB\", \"Chip\": \"A18\", \"Display\": \"5.4\\\" OLED\", \"Storage\": \"256GB\"}', 'pulse-mini.png', 10, '2026-05-14 15:28:38', 0),
(15, 'Pulse SE', 'smartphones', 429.00, 4.3, 5621, '📱', 'Affordable flagship experience', '{\"RAM\": \"6GB\", \"Chip\": \"A16\", \"Camera\": \"12MP\", \"Storage\": \"64GB\"}', 'pulse-se.png', 10, '2026-05-14 15:28:38', 0),
(16, 'Pulse Gaming', 'smartphones', 899.00, 4.5, 982, '📱', 'Built for mobile gaming', '{\"RAM\": \"16GB\", \"Chip\": \"SD 8 Gen 3\", \"Display\": \"6.8\\\" 165Hz\", \"Storage\": \"512GB\"}', 'pulse-gaming.png', 8, '2026-05-14 15:28:38', 0),
(17, 'AeroBeats Pro', 'headphones', 349.00, 4.8, 4231, '🎧', 'Studio-quality noise cancellation', '{\"ANC\": \"Adaptive\", \"Driver\": \"40mm\", \"Battery\": \"30hrs\", \"Connectivity\": \"BT 5.3\"}', 'aerobeats-pro.png', 10, '2026-05-14 15:28:38', 0),
(18, 'AeroBeats Max', 'headphones', 549.00, 4.9, 1234, '🎧', 'Premium over-ear audiophile grade', '{\"ANC\": \"Ultra\", \"Driver\": \"50mm Planar\", \"Battery\": \"40hrs\", \"Material\": \"Titanium\"}', 'aerobeats-max.png', 9, '2026-05-14 15:28:38', 0),
(19, 'AeroBuds Pro', 'headphones', 249.00, 4.7, 6789, '🎧', 'Perfect fit wireless earbuds', '{\"ANC\": \"Active\", \"Water\": \"IPX5\", \"Driver\": \"11mm\", \"Battery\": \"8hrs+24\"}', 'aerobuds-pro.png', 9, '2026-05-14 15:28:38', 0),
(20, 'AeroBuds Lite', 'headphones', 129.00, 4.4, 9821, '🎧', 'Essential wireless audio', '{\"ANC\": \"None\", \"Water\": \"IPX4\", \"Driver\": \"8mm\", \"Battery\": \"6hrs+18\"}', 'aerobuds-lite.png', 10, '2026-05-14 15:28:38', 0),
(21, 'AeroBeats Sport', 'headphones', 199.00, 4.5, 3421, '🎧', 'Workout-ready secure fit', '{\"ANC\": \"Transparency\", \"Water\": \"IP68\", \"Driver\": \"12mm\", \"Battery\": \"10hrs\"}', 'aerobeats-sport.png', 10, '2026-05-14 15:28:38', 0),
(22, 'AeroBeats Studio', 'headphones', 449.00, 4.8, 876, '🎧', 'Reference monitor headphones', '{\"Cable\": \"Detachable\", \"Driver\": \"45mm\", \"Response\": \"5Hz-50kHz\", \"Impedance\": \"64Ω\"}', 'aerobeats-studio.png', 7, '2026-05-14 15:28:38', 0),
(23, 'AeroBuds Sleep', 'headphones', 179.00, 4.3, 2345, '🎧', 'Designed for sleep comfort', '{\"Driver\": \"6mm\", \"Battery\": \"10hrs\", \"Profile\": \"Ultra-low\", \"Features\": \"White noise\"}', 'aerobuds-sleep.png', 8, '2026-05-14 15:28:38', 0),
(24, 'AeroBeats Kids', 'headphones', 79.00, 4.6, 4567, '🎧', 'Volume-limited for young ears', '{\"Limit\": \"85dB\", \"Driver\": \"30mm\", \"Battery\": \"20hrs\", \"Material\": \"BPA-free\"}', 'aerobeats-kids.png', 10, '2026-05-14 15:28:38', 0),
(25, 'MagCharge Pad', 'accessories', 49.00, 4.5, 3456, '🔌', '15W fast wireless charger', '{\"LED\": \"Status ring\", \"Coil\": \"Triple\", \"Power\": \"15W\", \"Material\": \"Aluminum\"}', 'magcharge-pad.png', 10, '2026-05-14 15:28:38', 0),
(26, 'PowerVault 20K', 'accessories', 89.00, 4.7, 2341, '🔋', '20000mAh portable power', '{\"Ports\": \"USB-C x2\", \"Output\": \"100W PD\", \"Weight\": \"350g\", \"Capacity\": \"20000mAh\"}', 'powervault-20k.png', 10, '2026-05-14 15:28:38', 0),
(27, 'NovaWatch Ultra', 'accessories', 799.00, 4.8, 1234, '⌚', 'Titanium smartwatch', '{\"Water\": \"100m\", \"Battery\": \"72hrs\", \"Display\": \"49mm OLED\", \"Sensors\": \"SpO2, ECG\"}', 'novawatch-ultra.png', 9, '2026-05-14 15:28:38', 0),
(28, 'NovaWatch SE', 'accessories', 249.00, 4.4, 5678, '⌚', 'Essential health tracking', '{\"Water\": \"50m\", \"Battery\": \"18hrs\", \"Display\": \"41mm LCD\", \"Sensors\": \"Heart rate\"}', 'novawatch-se.png', 10, '2026-05-14 15:28:38', 0),
(29, 'ProStand Desk', 'accessories', 179.00, 4.6, 892, '🖥️', 'Adjustable laptop stand', '{\"Fits\": \"up to 17\\\"\", \"Adjust\": \"5 angles\", \"Weight\": \"1.2kg\", \"Material\": \"Aluminum\"}', 'prostand-desk.png', 10, '2026-05-14 15:28:38', 0),
(30, 'NovaPen Pro', 'accessories', 129.00, 4.7, 2341, '✏️', 'Precision stylus with pressure', '{\"Tips\": \"Replaceable\", \"Levels\": \"4096\", \"Battery\": \"12hrs\", \"Latency\": \"9ms\"}', 'novapen-pro.png', 10, '2026-05-14 15:28:38', 0),
(31, 'AirTag Ultra', 'accessories', 39.00, 4.3, 8901, '📍', 'Precision item finder', '{\"Range\": \"120m\", \"Water\": \"IP67\", \"Battery\": \"2yr\", \"Network\": \"UWB + BT\"}', 'airtag-ultra.png', 9, '2026-05-14 15:28:38', 0),
(32, 'NovaHub 7-in-1', 'accessories', 69.00, 4.5, 3421, '🔗', 'USB-C multiport hub', '{\"Build\": \"Aluminum\", \"Ports\": \"HDMI,SD,USB-A x3,USB-C\", \"Power\": \"100W pass\", \"Speed\": \"10Gbps\"}', 'novahub-7-in-1.png', 10, '2026-05-14 15:28:38', 0),
(33, 'ClearCase Pro', 'accessories', 59.00, 4.4, 6543, '📱', 'MagSafe clear armor case', '{\"Drop\": \"3m rated\", \"Weight\": \"28g\", \"MagSafe\": \"Yes\", \"Material\": \"Polycarbonate\"}', 'clearcase-pro.png', 10, '2026-05-14 15:28:38', 0),
(34, 'NovaKeys Mech', 'accessories', 199.00, 4.8, 1567, '⌨️', 'Wireless mechanical keyboard', '{\"Layout\": \"75%\", \"Battery\": \"200hrs\", \"Switches\": \"Gateron Pro\", \"Backlight\": \"RGB\"}', 'novakeys-mech.png', 10, '2026-05-14 15:28:38', 0),
(35, 'NovaMouse Pro', 'accessories', 99.00, 4.6, 2890, '🖱️', 'Ergonomic precision mouse', '{\"DPI\": \"25600\", \"Weight\": \"63g\", \"Battery\": \"70hrs\", \"Buttons\": 8}', 'novamouse-pro.png', 10, '2026-05-14 15:28:38', 0),
(36, 'NovaScreen 4K', 'accessories', 599.00, 4.7, 734, '🖥️', '27\" 4K USB-C monitor', '{\"HDR\": \"HDR600\", \"Panel\": \"IPS\", \"Refresh\": \"144Hz\", \"Resolution\": \"3840x2160\"}', 'novascreen-4k.png', 10, '2026-05-14 15:28:38', 0),
(37, 'PowerVault Mini', 'accessories', 39.00, 4.3, 7654, '🔋', '5000mAh pocket charger', '{\"Ports\": \"USB-C\", \"Output\": \"20W PD\", \"Weight\": \"110g\", \"Capacity\": \"5000mAh\"}', 'powervault-mini.png', 10, '2026-05-14 15:28:38', 0),
(38, 'NovaCam 360', 'accessories', 349.00, 4.5, 567, '📷', '360° action camera', '{\"Water\": \"10m\", \"Weight\": \"180g\", \"Resolution\": \"5.7K\", \"Stabilization\": \"FlowState\"}', 'novacam-360.png', 10, '2026-05-14 15:28:38', 0),
(39, 'SoundBar Nova', 'accessories', 299.00, 4.6, 1234, '🔊', 'Spatial audio soundbar', '{\"Sub\": \"Wireless\", \"Dolby\": \"Atmos\", \"Power\": \"250W\", \"Drivers\": \"9-speaker\"}', 'soundbar-nova.png', 9, '2026-05-14 15:28:38', 0),
(40, 'NovaTag Wallet', 'accessories', 29.00, 4.2, 4321, '💳', 'Card-thin tracker', '{\"Find\": \"Precision\", \"Battery\": \"3yr\", \"Speaker\": \"Built-in\", \"Thickness\": \"1.8mm\"}', 'novatag-wallet.png', 8, '2026-05-14 15:28:38', 0),
(41, 'Nova Dock Pro', 'accessories', 249.00, 4.7, 456, '🔌', 'Thunderbolt 4 dock station', '{\"Ports\": \"12 total\", \"Power\": \"96W PD\", \"Speed\": \"40Gbps\", \"Display\": \"Dual 4K\"}', 'nova-dock-pro.png', 9, '2026-05-14 15:28:38', 0),
(42, 'AeroBeats Open', 'headphones', 299.00, 4.6, 1023, '🎧', 'Open-ear spatial audio', '{\"Audio\": \"Spatial\", \"Design\": \"Open\", \"Driver\": \"14mm\", \"Battery\": \"8hrs\"}', 'aerobeats-open.png', 9, '2026-05-14 15:28:38', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `user_id` int NOT NULL,
  `rating` tinyint NOT NULL,
  `comment` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `one_review_per_user` (`product_id`,`user_id`),
  KEY `product_id` (`product_id`),
  KEY `user_id` (`user_id`)
) ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('admin','user') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `role`, `created_at`) VALUES
(16, 'VIP user', 'vipuser@novaflow.com', '89f016992997820bbdb2723fdd5468285bedc466438d1a14b1dce96dfd44cb1e', 'user', '2026-06-13 22:27:15'),
(17, 'User', 'user@novaflow.com', 'e606e38b0d8c19b24cf0ee3808183162ea7cd63ff7912dbb22b5e803286b4446', 'user', '2026-06-13 23:55:27'),
(15, 'Nazanin CIP', 'nazanincip@novaflow.com', 'f37f3f2b0dc57a86dee4ba6ff855283bb4d2f0dea1c5bd1b708853444c2ffcec', 'user', '2026-06-13 17:22:11'),
(13, 'Admin', 'admin@novaflow.com', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 'admin', '2026-06-13 17:16:05'),
(18, 'Jake Williams', 'jake.williams@novaflow.com', '831c237928e6212bedaa4451a514ace3174562f6761f6a157a2fe5082b36e2fb', 'user', '2026-06-14 00:00:52'),
(19, 'Emily Johnson', 'emily.johnson@novaflow.com', '831c237928e6212bedaa4451a514ace3174562f6761f6a157a2fe5082b36e2fb', 'user', '2026-06-14 00:00:52'),
(20, 'Mike Chen', 'mike.chen@novaflow.com', '831c237928e6212bedaa4451a514ace3174562f6761f6a157a2fe5082b36e2fb', 'user', '2026-06-14 00:00:52'),
(21, 'Sophia Martinez', 'sophia.martinez@novaflow.com', '831c237928e6212bedaa4451a514ace3174562f6761f6a157a2fe5082b36e2fb', 'user', '2026-06-14 00:00:52'),
(22, 'Ryan Thompson', 'ryan.thompson@novaflow.com', '831c237928e6212bedaa4451a514ace3174562f6761f6a157a2fe5082b36e2fb', 'user', '2026-06-14 00:00:52');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
