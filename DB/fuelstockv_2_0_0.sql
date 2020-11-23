-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 23, 2020 at 05:29 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fuelstock`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`) VALUES
(1, 'shell'),
(2, 'bababoey'),
(3, 'costco'),
(4, 'costco'),
(5, 'canadian Tire'),
(6, 'test'),
(8, 'no'),
(9, 'jo');

-- --------------------------------------------------------

--
-- Table structure for table `fueling_stations`
--

CREATE TABLE `fueling_stations` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fueling_stations`
--

INSERT INTO `fueling_stations` (`id`, `brand_id`, `name`) VALUES
(1, 1, '345 street m'),
(3, 3, 'rue de la rivière'),
(4, 3, 'rue de la rivière'),
(5, 5, '2345 polnarue'),
(6, 5, '2345 polnarue');

-- --------------------------------------------------------

--
-- Table structure for table `fuels`
--

CREATE TABLE `fuels` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `fueling_station_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fuels`
--

INSERT INTO `fuels` (`id`, `name`, `brand_id`, `fueling_station_id`) VALUES
(1, 'gasoline', 1, 1),
(2, 'gasoline', 1, 1),
(3, 'gasoline', 1, 1),
(4, 'propane', 1, 1),
(5, 'propane', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fuel_specifics`
--

CREATE TABLE `fuel_specifics` (
  `id` int(11) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL,
  `quantity_in_stock` int(20) NOT NULL,
  `unit_buying_price` double NOT NULL,
  `unit_sales_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fuel_specifics`
--

INSERT INTO `fuel_specifics` (`id`, `created`, `modified`, `quantity_in_stock`, `unit_buying_price`, `unit_sales_price`) VALUES
(1, '2020-10-12', '2020-10-15', 20, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `i18n`
--

CREATE TABLE `i18n` (
  `id` int(11) NOT NULL,
  `locale` varchar(6) COLLATE utf8mb4_general_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `i18n`
--

INSERT INTO `i18n` (`id`, `locale`, `model`, `foreign_key`, `field`, `content`) VALUES
(1, 'fr_CA', 'Transactions', 1, 'other_details', 'c\'était magnifique!'),
(2, 'fr_CA', 'Places', 1, 'name', 'Parc'),
(3, 'fr_CA', 'Places', 1, 'description', '146 rue de la rue'),
(4, 'ja_JP', 'Transactions', 1, 'other_details', 'それは驚くべきものだった'),
(5, 'ja_JP', 'Places', 1, 'name', '公園で'),
(6, 'ja_JP', 'Places', 1, 'description', '146通りの通り'),
(7, 'fr_CA', 'RefFuelTypes', 1, 'name', 'essence'),
(8, 'fr_CA', 'RefFuelTypes', 1, 'description', 'Utilisé pour faire fonctionner un véhicule'),
(9, 'ja_JP', 'RefFuelTypes', 1, 'name', 'ガソリン'),
(10, 'ja_JP', 'RefFuelTypes', 1, 'description', '車両の動力に使用される燃料。'),
(11, 'en_CA', 'Places', 1, 'name', 'Park'),
(12, 'en_CA', 'Places', 1, 'description', '146 Street of the street');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = Active, 0 = Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `name`, `path`, `created`, `modified`, `status`) VALUES
(2, '8b4b-High-Park-Maple-Leaf.jpg', 'photo/add', '2020-10-17 20:50:27', '2020-10-17 20:50:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `photo_id` int(11) DEFAULT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `name`, `description`, `details`, `photo_id`, `created`, `modified`) VALUES
(1, 'Park', '146 Street of the street', 'Give the code 1234 to enter', 2, '2020-10-15', '2020-10-17');

-- --------------------------------------------------------

--
-- Table structure for table `places_transactions`
--

CREATE TABLE `places_transactions` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `places_transactions`
--

INSERT INTO `places_transactions` (`id`, `transaction_id`, `place_id`) VALUES
(1, 1, 1),
(5, 3, 1),
(6, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ref_fuel_types`
--

CREATE TABLE `ref_fuel_types` (
  `id` int(11) NOT NULL,
  `fuel_id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `fuel_specific_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ref_fuel_types`
--

INSERT INTO `ref_fuel_types` (`id`, `fuel_id`, `description`, `fuel_specific_id`) VALUES
(1, 1, 'Fuel used to power up vehicles.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ref_transaction_types`
--

CREATE TABLE `ref_transaction_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ref_transaction_types`
--

INSERT INTO `ref_transaction_types` (`id`, `name`) VALUES
(1, 'Check');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created`, `modified`) VALUES
(1, 'admin', 'admin', '2020-10-15', '2020-10-15'),
(2, 'supervisor', 'He can see every transactions, create anything except roles and users, only delete/edit fields he made.', '2020-10-15', '2020-10-15'),
(3, 'visitor', 'No need to connect, he can only look but can\'t interact with any fields.', '2020-10-15', '2020-10-15');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `created` date NOT NULL,
  `amount` double NOT NULL,
  `other_details` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `modified` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `fuel_type_id` int(11) NOT NULL,
  `transaction_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `created`, `amount`, `other_details`, `modified`, `user_id`, `fuel_type_id`, `transaction_type_id`) VALUES
(1, '2020-10-12', 10, 'It was amazing', '2020-10-15', 1, 1, 1),
(3, '2020-10-13', 100, 'It was smooth', '2020-10-15', 2, 1, 1),
(4, '2020-10-15', 100, 'Perfect', '2020-10-15', 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `username`, `email`, `password`, `uuid`, `confirmed`, `created`, `modified`) VALUES
(1, 1, 'admin', 'admin@admin.com', '$2y$10$q0nydLLyrue/hhqOqYE34.8HZxnnjHom2gpxVaLjfyBb1RK7EgnlO', NULL, 0, '2020-10-12 00:00:00', '2020-10-13 16:46:22'),
(2, 2, 'George', 'George@fuel.com', '$2y$10$wbWFH8znVn8u9ZkHTCRA2O6Eurgofd5u/VbIGhFhQE1EbCE6L58i2', NULL, 1, '2020-10-12 00:00:00', '2020-10-14 15:32:15'),
(6, 3, 'clibeau', 'clibeau2010@hotmail.com', '$2y$10$saE7LfqIOEZ/bNDQJVqYP.CcWRG02GdpXa0d70doTnRFFGK2cS1rO', '7b279c18-68d0-4c26-abee-3a9dd139280f', 1, '2020-10-18 23:02:28', '2020-10-18 23:02:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fueling_stations`
--
ALTER TABLE `fueling_stations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ForeignKeyBrandIDtofuelStation` (`brand_id`);

--
-- Indexes for table `fuels`
--
ALTER TABLE `fuels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ForeignKeyFuelingStationId` (`fueling_station_id`),
  ADD KEY `ForeignKeyBrandId` (`brand_id`);

--
-- Indexes for table `fuel_specifics`
--
ALTER TABLE `fuel_specifics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `i18n`
--
ALTER TABLE `i18n`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `I18N_LOCALE_FIELD` (`locale`,`model`,`foreign_key`,`field`),
  ADD KEY `I18N_FIELD` (`model`,`foreign_key`,`field`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Foreign_key_photoId_de_photos_` (`photo_id`);

--
-- Indexes for table `places_transactions`
--
ALTER TABLE `places_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Foreign_key_placeId_de_places` (`place_id`),
  ADD KEY `Foreign_key_transactionId_de_transactions` (`transaction_id`);

--
-- Indexes for table `ref_fuel_types`
--
ALTER TABLE `ref_fuel_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Foreign_key_fuel_specific_id_de_fuel_specifics` (`fuel_specific_id`),
  ADD KEY `Foreign_key_fuelId_de_fuels` (`fuel_id`);

--
-- Indexes for table `ref_transaction_types`
--
ALTER TABLE `ref_transaction_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Foreign_key_fuelTypeCode_de_refFuelTypes_a_Transactions` (`fuel_type_id`),
  ADD KEY `Foreign_key_transactionTypeCode_de_reftranstypes_a_Transactions` (`transaction_type_id`),
  ADD KEY `Foreign_key_userId_a_Transactions` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Foreign_key_role_id_users_roles` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `fueling_stations`
--
ALTER TABLE `fueling_stations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fuels`
--
ALTER TABLE `fuels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fuel_specifics`
--
ALTER TABLE `fuel_specifics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `i18n`
--
ALTER TABLE `i18n`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `places_transactions`
--
ALTER TABLE `places_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ref_fuel_types`
--
ALTER TABLE `ref_fuel_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ref_transaction_types`
--
ALTER TABLE `ref_transaction_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fueling_stations`
--
ALTER TABLE `fueling_stations`
  ADD CONSTRAINT `ForeignKeyBrandIDtofuelStation` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `fuels`
--
ALTER TABLE `fuels`
  ADD CONSTRAINT `ForeignKeyBrandId` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `ForeignKeyFuelingStationId` FOREIGN KEY (`fueling_station_id`) REFERENCES `fueling_stations` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `Foreign_key_photoId_de_photos_` FOREIGN KEY (`photo_id`) REFERENCES `photos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `places_transactions`
--
ALTER TABLE `places_transactions`
  ADD CONSTRAINT `Foreign_key_placeId_de_places` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `Foreign_key_transactionId_de_transactions` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `ref_fuel_types`
--
ALTER TABLE `ref_fuel_types`
  ADD CONSTRAINT `Foreign_key_fuelId_de_fuels` FOREIGN KEY (`fuel_id`) REFERENCES `fuels` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `Foreign_key_fuel_specific_id_de_fuel_specifics` FOREIGN KEY (`fuel_specific_id`) REFERENCES `fuel_specifics` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `Foreign_key_fuelTypeCode_de_refFuelTypes_a_Transactions` FOREIGN KEY (`fuel_type_id`) REFERENCES `ref_fuel_types` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `Foreign_key_transactionTypeCode_de_reftranstypes_a_Transactions` FOREIGN KEY (`transaction_type_id`) REFERENCES `ref_transaction_types` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `Foreign_key_userId_a_Transactions` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `Foreign_key_role_id_users_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
