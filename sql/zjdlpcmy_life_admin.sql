-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 26, 2026 at 10:21 AM
-- Server version: 8.0.46-37
-- PHP Version: 8.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zjdlpcmy_life_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `category` varchar(100) DEFAULT 'General',
  `priority` enum('Low','Medium','High') DEFAULT 'Medium',
  `status` enum('To Do','In Progress','Waiting','Done') DEFAULT 'To Do',
  `due_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `attachment` varchar(255) DEFAULT NULL,
  `assigned_name` varchar(255) DEFAULT NULL,
  `assigned_email` varchar(255) DEFAULT NULL,
  `user_role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `category`, `priority`, `status`, `due_date`, `created_at`, `attachment`, `assigned_name`, `assigned_email`, `user_role`) VALUES
(4, 'Catalog/price list EMAILED YOU THE SPREADSHEET', 'Will send you excel sheet for catalog / price list. ', 'General', 'Medium', 'In Progress', '2026-06-24', '2026-06-24 01:48:14', '1782486605_Price_List.xlsx,1782486772_6a3e96f4605a1_Catalog.pdf,1782488659_6a3e9e5382406_Unik_3Month_Focus_Inventory__2___1_.xlsx', 'Asad', 'asad@unikinternational.com', 'Admin'),
(5, 'Closeout Flyer EMAILED', 'Will send spreadsheet ', 'General', 'Medium', 'In Progress', NULL, '2026-06-24 01:48:38', '1782423476_C.xlsx', NULL, NULL, NULL),
(13, 'Barcodes and images for new items ', 'whatever is missing send me list. \r\n\r\nAlso add in Usama\'s image if you have its better than Attahs ', 'General', 'Medium', 'To Do', '2026-06-25', '2026-06-25 17:10:43', NULL, NULL, NULL, NULL),
(15, 'New Arrivals Flyer ', 'Fix mispelling on cover Uniik', 'General', 'Medium', 'Waiting', NULL, '2026-06-25 17:44:18', '1782423351_New_250th_Arrivals.pdf', NULL, NULL, NULL),
(17, 'Make sure wholesale prices are on all of the products ', 'Especially new items on apparel magic ask me what is missing ill give you price. ', 'General', 'Medium', 'To Do', '2026-06-26', '2026-06-26 16:11:06', '', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
