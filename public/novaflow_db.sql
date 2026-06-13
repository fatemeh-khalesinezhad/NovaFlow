-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 31, 2026 at 07:23 PM
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
-- Database: `novaflow_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

DROP TABLE IF EXISTS `contact_messages`;
CREATE TABLE IF NOT EXISTS `contact_messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `subject` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `message` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `status` enum('pending','shipped','delivered') COLLATE utf8mb4_general_ci DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `status`, `created_at`) VALUES
(1, 2, 2567.00, 'pending', '2026-05-22 13:28:15'),
(2, 2, 4098.00, 'pending', '2026-05-22 20:00:05');

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 1, 1, 1, 2499.00),
(2, 1, 40, 1, 29.00),
(3, 1, 31, 1, 39.00),
(4, 2, 1, 1, 2499.00),
(5, 2, 2, 1, 1599.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `category` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `rating` decimal(2,1) DEFAULT '0.0',
  `reviews` int DEFAULT '0',
  `emoji` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `specs` text COLLATE utf8mb4_general_ci,
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `stock` int DEFAULT '10',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `price`, `rating`, `reviews`, `emoji`, `description`, `specs`, `image`, `stock`, `created_at`) VALUES
(1, 'Nova Pro 16\"', 'laptops', 2499.00, 4.9, 342, '💻', 'Ultimate performance laptop with M3 chip', '{\"CPU\":\"M3 Ultra\",\"RAM\":\"64GB\",\"Storage\":\"2TB SSD\",\"Display\":\"16\" Retina XDR\"}', NULL, 8, '2026-05-14 18:58:38'),
(2, 'Nova Air 14\"', 'laptops', 1599.00, 4.7, 521, '💻', 'Thin & light with all-day battery', '{\"CPU\":\"M3 Pro\",\"RAM\":\"32GB\",\"Storage\":\"1TB SSD\",\"Display\":\"14\" Liquid Retina\"}', NULL, 9, '2026-05-14 18:58:38'),
(3, 'Nova Book 13\"', 'laptops', 999.00, 4.5, 892, '💻', 'Perfect everyday laptop', '{\"CPU\":\"M3\",\"RAM\":\"16GB\",\"Storage\":\"512GB SSD\",\"Display\":\"13.6\" Retina\"}', NULL, 10, '2026-05-14 18:58:38'),
(4, 'Nova Studio 15\"', 'laptops', 3299.00, 4.8, 156, '💻', 'Creative workstation powerhouse', '{\"CPU\":\"M3 Max\",\"RAM\":\"128GB\",\"Storage\":\"4TB SSD\",\"Display\":\"15.3\" XDR\"}', NULL, 10, '2026-05-14 18:58:38'),
(5, 'Nova Flex 360', 'laptops', 1299.00, 4.4, 267, '💻', 'Convertible 2-in-1 laptop', '{\"CPU\":\"Intel i7\",\"RAM\":\"16GB\",\"Storage\":\"512GB\",\"Display\":\"14\" Touch OLED\"}', NULL, 10, '2026-05-14 18:58:38'),
(6, 'Nova Edge', 'laptops', 1899.00, 4.6, 178, '💻', 'Gaming-ready thin laptop', '{\"CPU\":\"AMD R9\",\"RAM\":\"32GB\",\"Storage\":\"1TB\",\"Display\":\"15.6\" 240Hz\"}', NULL, 10, '2026-05-14 18:58:38'),
(7, 'Nova Chromebook', 'laptops', 449.00, 4.2, 1205, '💻', 'Cloud-first lightweight laptop', '{\"CPU\":\"MediaTek\",\"RAM\":\"8GB\",\"Storage\":\"128GB\",\"Display\":\"14\" FHD\"}', NULL, 10, '2026-05-14 18:58:38'),
(8, 'Nova Ultra 17\"', 'laptops', 3999.00, 5.0, 89, '💻', 'No-compromise desktop replacement', '{\"CPU\":\"M3 Ultra\",\"RAM\":\"192GB\",\"Storage\":\"8TB SSD\",\"Display\":\"17\" XDR\"}', NULL, 10, '2026-05-14 18:58:38'),
(9, 'Pulse X Pro', 'smartphones', 1199.00, 4.8, 2341, '📱', 'Flagship with revolutionary camera', '{\"Chip\":\"A18 Pro\",\"RAM\":\"12GB\",\"Storage\":\"256GB\",\"Camera\":\"48MP Triple\"}', NULL, 10, '2026-05-14 18:58:38'),
(10, 'Pulse X', 'smartphones', 999.00, 4.7, 3102, '📱', 'Premium experience for everyone', '{\"Chip\":\"A18\",\"RAM\":\"8GB\",\"Storage\":\"128GB\",\"Camera\":\"48MP Dual\"}', NULL, 10, '2026-05-14 18:58:38'),
(11, 'Pulse Lite', 'smartphones', 599.00, 4.5, 4521, '📱', 'Essential features, amazing value', '{\"Chip\":\"A17\",\"RAM\":\"6GB\",\"Storage\":\"128GB\",\"Camera\":\"12MP Dual\"}', NULL, 10, '2026-05-14 18:58:38'),
(12, 'Pulse Ultra', 'smartphones', 1499.00, 4.9, 876, '📱', 'Titanium build, AI-powered', '{\"Chip\":\"A18 Ultra\",\"RAM\":\"16GB\",\"Storage\":\"1TB\",\"Camera\":\"200MP Quad\"}', NULL, 10, '2026-05-14 18:58:38'),
(13, 'Pulse Fold', 'smartphones', 1799.00, 4.6, 423, '📱', 'Foldable future in your pocket', '{\"Chip\":\"A18 Pro\",\"RAM\":\"12GB\",\"Storage\":\"512GB\",\"Display\":\"7.6\" Fold\"}', NULL, 10, '2026-05-14 18:58:38'),
(14, 'Pulse Mini', 'smartphones', 799.00, 4.4, 1876, '📱', 'Compact powerhouse', '{\"Chip\":\"A18\",\"RAM\":\"8GB\",\"Storage\":\"256GB\",\"Display\":\"5.4\" OLED\"}', NULL, 10, '2026-05-14 18:58:38'),
(15, 'Pulse SE', 'smartphones', 429.00, 4.3, 5621, '📱', 'Affordable flagship experience', '{\"Chip\":\"A16\",\"RAM\":\"6GB\",\"Storage\":\"64GB\",\"Camera\":\"12MP\"}', NULL, 10, '2026-05-14 18:58:38'),
(16, 'Pulse Gaming', 'smartphones', 899.00, 4.5, 982, '📱', 'Built for mobile gaming', '{\"Chip\":\"SD 8 Gen 3\",\"RAM\":\"16GB\",\"Storage\":\"512GB\",\"Display\":\"6.8\" 165Hz\"}', NULL, 10, '2026-05-14 18:58:38'),
(17, 'AeroBeats Pro', 'headphones', 349.00, 4.8, 4231, '🎧', 'Studio-quality noise cancellation', '{\"Driver\":\"40mm\",\"ANC\":\"Adaptive\",\"Battery\":\"30hrs\",\"Connectivity\":\"BT 5.3\"}', NULL, 10, '2026-05-14 18:58:38'),
(18, 'AeroBeats Max', 'headphones', 549.00, 4.9, 1234, '🎧', 'Premium over-ear audiophile grade', '{\"Driver\":\"50mm Planar\",\"ANC\":\"Ultra\",\"Battery\":\"40hrs\",\"Material\":\"Titanium\"}', NULL, 10, '2026-05-14 18:58:38'),
(19, 'AeroBuds Pro', 'headphones', 249.00, 4.7, 6789, '🎧', 'Perfect fit wireless earbuds', '{\"Driver\":\"11mm\",\"ANC\":\"Active\",\"Battery\":\"8hrs+24\",\"Water\":\"IPX5\"}', NULL, 10, '2026-05-14 18:58:38'),
(20, 'AeroBuds Lite', 'headphones', 129.00, 4.4, 9821, '🎧', 'Essential wireless audio', '{\"Driver\":\"8mm\",\"ANC\":\"None\",\"Battery\":\"6hrs+18\",\"Water\":\"IPX4\"}', NULL, 10, '2026-05-14 18:58:38'),
(21, 'AeroBeats Sport', 'headphones', 199.00, 4.5, 3421, '🎧', 'Workout-ready secure fit', '{\"Driver\":\"12mm\",\"ANC\":\"Transparency\",\"Battery\":\"10hrs\",\"Water\":\"IP68\"}', NULL, 10, '2026-05-14 18:58:38'),
(22, 'AeroBeats Studio', 'headphones', 449.00, 4.8, 876, '🎧', 'Reference monitor headphones', '{\"Driver\":\"45mm\",\"Response\":\"5Hz-50kHz\",\"Impedance\":\"64Ω\",\"Cable\":\"Detachable\"}', NULL, 10, '2026-05-14 18:58:38'),
(23, 'AeroBuds Sleep', 'headphones', 179.00, 4.3, 2345, '🎧', 'Designed for sleep comfort', '{\"Driver\":\"6mm\",\"Profile\":\"Ultra-low\",\"Battery\":\"10hrs\",\"Features\":\"White noise\"}', NULL, 10, '2026-05-14 18:58:38'),
(24, 'AeroBeats Kids', 'headphones', 79.00, 4.6, 4567, '🎧', 'Volume-limited for young ears', '{\"Driver\":\"30mm\",\"Limit\":\"85dB\",\"Battery\":\"20hrs\",\"Material\":\"BPA-free\"}', NULL, 10, '2026-05-14 18:58:38'),
(25, 'MagCharge Pad', 'accessories', 49.00, 4.5, 3456, '🔌', '15W fast wireless charger', '{\"Power\":\"15W\",\"Coil\":\"Triple\",\"Material\":\"Aluminum\",\"LED\":\"Status ring\"}', NULL, 10, '2026-05-14 18:58:38'),
(26, 'PowerVault 20K', 'accessories', 89.00, 4.7, 2341, '🔋', '20000mAh portable power', '{\"Capacity\":\"20000mAh\",\"Output\":\"100W PD\",\"Ports\":\"USB-C x2\",\"Weight\":\"350g\"}', NULL, 10, '2026-05-14 18:58:38'),
(27, 'NovaWatch Ultra', 'accessories', 799.00, 4.8, 1234, '⌚', 'Titanium smartwatch', '{\"Display\":\"49mm OLED\",\"Battery\":\"72hrs\",\"Water\":\"100m\",\"Sensors\":\"SpO2, ECG\"}', NULL, 10, '2026-05-14 18:58:38'),
(28, 'NovaWatch SE', 'accessories', 249.00, 4.4, 5678, '⌚', 'Essential health tracking', '{\"Display\":\"41mm LCD\",\"Battery\":\"18hrs\",\"Water\":\"50m\",\"Sensors\":\"Heart rate\"}', NULL, 10, '2026-05-14 18:58:38'),
(29, 'ProStand Desk', 'accessories', 179.00, 4.6, 892, '🖥️', 'Adjustable laptop stand', '{\"Material\":\"Aluminum\",\"Adjust\":\"5 angles\",\"Weight\":\"1.2kg\",\"Fits\":\"up to 17\"\"\"}', NULL, 10, '2026-05-14 18:58:38'),
(30, 'NovaPen Pro', 'accessories', 129.00, 4.7, 2341, '✏️', 'Precision stylus with pressure', '{\"Levels\":\"4096\",\"Latency\":\"9ms\",\"Battery\":\"12hrs\",\"Tips\":\"Replaceable\"}', NULL, 10, '2026-05-14 18:58:38'),
(31, 'AirTag Ultra', 'accessories', 39.00, 4.3, 8901, '📍', 'Precision item finder', '{\"Range\":\"120m\",\"Battery\":\"2yr\",\"Water\":\"IP67\",\"Network\":\"UWB + BT\"}', NULL, 9, '2026-05-14 18:58:38'),
(32, 'NovaHub 7-in-1', 'accessories', 69.00, 4.5, 3421, '🔗', 'USB-C multiport hub', '{\"Ports\":\"HDMI,SD,USB-A x3,USB-C\",\"Power\":\"100W pass\",\"Speed\":\"10Gbps\",\"Build\":\"Aluminum\"}', NULL, 10, '2026-05-14 18:58:38'),
(33, 'ClearCase Pro', 'accessories', 59.00, 4.4, 6543, '📱', 'MagSafe clear armor case', '{\"Material\":\"Polycarbonate\",\"Drop\":\"3m rated\",\"MagSafe\":\"Yes\",\"Weight\":\"28g\"}', NULL, 10, '2026-05-14 18:58:38'),
(34, 'NovaKeys Mech', 'accessories', 199.00, 4.8, 1567, '⌨️', 'Wireless mechanical keyboard', '{\"Switches\":\"Gateron Pro\",\"Layout\":\"75%\",\"Battery\":\"200hrs\",\"Backlight\":\"RGB\"}', NULL, 10, '2026-05-14 18:58:38'),
(35, 'NovaMouse Pro', 'accessories', 99.00, 4.6, 2890, '🖱️', 'Ergonomic precision mouse', '{\"DPI\":\"25600\",\"Buttons\":8,\"Battery\":\"70hrs\",\"Weight\":\"63g\"}', NULL, 10, '2026-05-14 18:58:38'),
(36, 'NovaScreen 4K', 'accessories', 599.00, 4.7, 734, '🖥️', '27\" 4K USB-C monitor', '{\"Panel\":\"IPS\",\"Resolution\":\"3840x2160\",\"Refresh\":\"144Hz\",\"HDR\":\"HDR600\"}', NULL, 10, '2026-05-14 18:58:38'),
(37, 'PowerVault Mini', 'accessories', 39.00, 4.3, 7654, '🔋', '5000mAh pocket charger', '{\"Capacity\":\"5000mAh\",\"Output\":\"20W PD\",\"Ports\":\"USB-C\",\"Weight\":\"110g\"}', NULL, 10, '2026-05-14 18:58:38'),
(38, 'NovaCam 360', 'accessories', 349.00, 4.5, 567, '📷', '360° action camera', '{\"Resolution\":\"5.7K\",\"Stabilization\":\"FlowState\",\"Water\":\"10m\",\"Weight\":\"180g\"}', NULL, 10, '2026-05-14 18:58:38'),
(39, 'SoundBar Nova', 'accessories', 299.00, 4.6, 1234, '🔊', 'Spatial audio soundbar', '{\"Drivers\":\"9-speaker\",\"Dolby\":\"Atmos\",\"Power\":\"250W\",\"Sub\":\"Wireless\"}', NULL, 10, '2026-05-14 18:58:38'),
(40, 'NovaTag Wallet', 'accessories', 29.00, 4.2, 4321, '💳', 'Card-thin tracker', '{\"Thickness\":\"1.8mm\",\"Battery\":\"3yr\",\"Speaker\":\"Built-in\",\"Find\":\"Precision\"}', NULL, 9, '2026-05-14 18:58:38'),
(41, 'Nova Dock Pro', 'accessories', 249.00, 4.7, 456, '🔌', 'Thunderbolt 4 dock station', '{\"Ports\":\"12 total\",\"Display\":\"Dual 4K\",\"Power\":\"96W PD\",\"Speed\":\"40Gbps\"}', NULL, 10, '2026-05-14 18:58:38'),
(42, 'AeroBeats Open', 'headphones', 299.00, 4.6, 1023, '🎧', 'Open-ear spatial audio', '{\"Driver\":\"14mm\",\"Design\":\"Open\",\"Battery\":\"8hrs\",\"Audio\":\"Spatial\"}', NULL, 10, '2026-05-14 18:58:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_general_ci DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Admin', 'admin@novaflow.com', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 'admin', '2026-05-13 16:25:58'),
(2, 'user', 'user_novafloe@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'user', '2026-05-20 19:35:21'),
(5, 'nazanin', 'nazanin@com.com', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'user', '2026-05-22 15:06:19');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
