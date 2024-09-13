-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2024 at 07:59 AM
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
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_no` varchar(15) DEFAULT NULL,
  `dept` varchar(50) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'active',
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`user_id`, `fname`, `lname`, `email`, `phone_no`, `dept`, `status`, `createdAt`, `updatedAt`) VALUES
(1, 'Bipul', 'Sardar', 'bipulsardar421@gmail.com', '987654321', 'HR', 'active', '2024-08-27 10:25:47', '2024-08-27 10:25:47'),
(2, '', '', '', '', '', 'inactive', '2024-08-27 10:57:40', '2024-08-27 11:10:26'),
(3, '', '', '', '', '', 'inactive', '2024-08-27 11:00:10', '2024-08-27 11:01:03'),
(4, 'Bipul', 'Test', 'bipulsardar@tammina.org', '1234819238', 'HR', 'active', '2024-08-27 11:11:09', '2024-08-27 11:11:09'),
(5, 'Test', 'Test', 'bipul@test.com', '9238459234', 'HR', 'active', '2024-08-27 12:44:01', '2024-08-27 12:44:01'),
(6, 'sdgdf', 'Tests', 'bipul@gmafdfil.com', '1234567', 'HR', 'active', '2024-08-27 12:46:30', '2024-08-27 12:46:30'),
(7, 'Test 200', 'Test', 'bipul@gmail.com', '1234567', 'HR', 'active', '2024-08-27 12:46:55', '2024-08-27 12:46:55'),
(8, 'Bipul', 'Sardar', 'bipulsardar421@hotmail.com', '120384102', 'HR', 'active', '2024-08-27 12:55:51', '2024-08-27 12:55:51'),
(9, '', '', 'kajsd', '', '', 'inactive', '2024-08-28 04:26:51', '2024-08-28 04:29:15'),
(10, 'Test 200', 'Test', 'bipul@gmail.com', '1234567', 'HR', 'inactive', '2024-08-28 06:04:51', '2024-08-28 06:05:23'),
(11, 'test', 'test', 'test312@gmail.com', '1023948012', 'HR', 'inactive', '2024-08-28 06:48:03', '2024-08-28 06:53:56'),
(12, '', '', '', '', '', 'inactive', '2024-08-28 06:48:11', '2024-08-28 06:53:54'),
(13, '', '', '', '', '', 'inactive', '2024-08-28 06:48:12', '2024-08-28 06:53:52'),
(14, '', '', '', '', '', 'inactive', '2024-08-28 06:48:13', '2024-08-28 06:53:47'),
(15, '', '', '', '', '', 'inactive', '2024-08-28 06:48:13', '2024-08-28 06:53:49'),
(16, '', '', '', '', '', 'inactive', '2024-08-28 06:48:13', '2024-08-28 06:53:50'),
(17, 'Test', 'Test', 'test123@gmail.com', '235125154', 'HR', 'active', '2024-08-28 06:54:26', '2024-08-28 06:54:26'),
(18, 'Me', 'Me', 'me@me.com', '121212121', 'ME', 'active', '2024-08-28 11:29:18', '2024-08-28 11:29:18'),
(19, 'Test Recording', 'Record', 'testrecord@gmail.com', '981239983', 'IT', 'active', '2024-08-28 12:54:36', '2024-08-28 12:54:36'),
(20, '', '', '', '', '', 'active', '2024-09-03 05:10:18', '2024-09-03 05:10:18');

-- --------------------------------------------------------

--
-- Table structure for table `employees_address`
--

CREATE TABLE `employees_address` (
  `sl_no` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `post_code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees_address`
--

INSERT INTO `employees_address` (`sl_no`, `user_id`, `type`, `address`, `city`, `country`, `post_code`) VALUES
(1, 4, 'Permanent', 'XYZ', 'sf', 'asdfa', 1234123),
(2, 5, 'Permanent', 'XYZ', 'sf', 'asdfa', 1234123),
(3, 7, 'Permanent', 'XYZ', 'sf', 'asdfa', 1234123),
(4, 8, 'Permanent', 'XYZ', 'sf', 'asdfa', 1234123),
(5, 17, 'Permanent', 'XYZ', 'sf', 'asdfa', 1234123),
(6, 18, 'Permanent', 'XYZ', 'sf', 'asdfa', 1234123),
(7, 19, 'Permanent', 'VSKP', 'VSKP', 'India', 530018);

-- --------------------------------------------------------

--
-- Table structure for table `employees_details_extended`
--

CREATE TABLE `employees_details_extended` (
  `sl_no` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `gender` varchar(25) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `maritial_status` varchar(20) DEFAULT NULL,
  `physically_handicapped` varchar(3) DEFAULT NULL,
  `blood_group` varchar(5) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees_details_extended`
--

INSERT INTO `employees_details_extended` (`sl_no`, `user_id`, `gender`, `dob`, `maritial_status`, `physically_handicapped`, `blood_group`, `nationality`) VALUES
(1, 4, 'Male', '16/07/1999', 'Married', 'Yes', 'O+ve', 'xyz'),
(2, 5, 'Male', '16/07/1999', 'Married', 'Yes', 'O+ve', 'xyz'),
(3, 7, 'Male', '16/07/1999', 'Married', 'Yes', 'O+ve', 'xyz'),
(4, 8, 'Male', '16/07/1999', 'Unmarried', 'No', 'O+ve', 'xyz'),
(6, 17, 'Male', '16/07/1999', 'Married', 'Yes', 'O+ve', 'xyz'),
(7, 18, 'Male', '16/07/1999', 'Married', 'Yes', 'O+ve', 'xyz'),
(8, 19, 'Male', '16-07-1999', 'Unmarried', 'No', 'O+ve', 'Indian');

-- --------------------------------------------------------

--
-- Table structure for table `employees_education`
--

CREATE TABLE `employees_education` (
  `sl_no` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `cgpa` varchar(255) DEFAULT NULL,
  `yop` int(11) DEFAULT NULL,
  `yoj` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees_education`
--

INSERT INTO `employees_education` (`sl_no`, `user_id`, `type`, `branch`, `cgpa`, `yop`, `yoj`) VALUES
(1, 4, 'Full Time', 'Cse', '78', 2012, 2022),
(2, 5, 'Full Time', 'Cse', '78', 2012, 2022),
(3, 7, 'Full Time', 'Cse', '78', 2012, 2022),
(4, 8, 'Full Time', 'Cse', '78', 2012, 2022),
(5, 17, 'Full Time', 'Cse', '78', 2012, 2022),
(6, 18, 'Full Time', 'Cse', '78', 2012, 2022),
(7, 19, 'Full Time', 'CSE', '7.8', 2022, 2017);

-- --------------------------------------------------------

--
-- Table structure for table `employees_personal_contact_details`
--

CREATE TABLE `employees_personal_contact_details` (
  `sl_no` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `personal_mobile_number` varchar(20) DEFAULT NULL,
  `personal_email` varchar(100) DEFAULT NULL,
  `residence_number` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees_personal_contact_details`
--

INSERT INTO `employees_personal_contact_details` (`sl_no`, `user_id`, `personal_mobile_number`, `personal_email`, `residence_number`) VALUES
(1, 4, '7979876546', 'bipul@gmail.com', '23412341234'),
(2, 5, '7979876546', 'bipul@gmail.com', '23412341234'),
(3, 7, '7979876546', 'bipul@gmail.com', '23412341234'),
(4, 8, '7979876546', 'bipul@gmail.com', '23412341234'),
(5, 17, '7979876546', 'bipul@gmail.com', '23412341234'),
(6, 18, '7979876546', 'bipul@gmail.com', '23412341234'),
(7, 19, '789461321', 'bipul@gmail.com', '798765564');

-- --------------------------------------------------------

--
-- Table structure for table `emp_image`
--

CREATE TABLE `emp_image` (
  `sl_no` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emp_image`
--

INSERT INTO `emp_image` (`sl_no`, `user_id`, `url`) VALUES
(1, 4, '1000250063.jpg'),
(2, 5, 'IMG_20240523_144909.jpg'),
(3, 7, '20kib.jpeg'),
(4, 8, 'Homelander.png'),
(5, 17, 'sdddsd_pages-to-jpg-0001.jpg'),
(6, 18, '21kb.jpg'),
(7, 19, '21kb.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `otpvalidation`
--

CREATE TABLE `otpvalidation` (
  `sl_no` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `otp` varchar(250) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active',
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `otpvalidation`
--

INSERT INTO `otpvalidation` (`sl_no`, `email`, `otp`, `status`, `createdAt`, `updatedAt`) VALUES
(24, 'cigevac678@fuzitea.com', '$2y$10$X9d.ILFZ6F7oMYV9HEb/L.XexwSrmJHXLX3sHdhOh/LhYVVmtja8q', 'inactive', '2024-08-01 11:05:09', '2024-08-01 11:05:46'),
(25, 'yayov26838@alientex.com', '$2y$10$kzVSHm77B2cs.TpdvRnxDO/VWboMTpSKwPcP2R3L/Ze.zCuSZWeUi', 'inactive', '2024-08-02 12:58:20', '2024-08-02 12:58:32'),
(26, 'yayov26838@alientex.com', '$2y$10$t651ucFKs5/8TpPTGluna.vZWqyy/rOiy35byDw.UCvcpROo6328S', 'inactive', '2024-08-02 12:58:46', '2024-08-02 13:03:48'),
(27, 'koyabe1170@alientex.com', '$2y$10$uF0t5/GnGMmP5o9GjM9VS.3FF6rZvt1Fxnn/nZxe1XWJdQ0SYsJfe', 'inactive', '2024-08-02 13:00:21', '2024-08-02 13:03:48'),
(28, 'koyabe1170@alientex.com', '$2y$10$QIvnoZ0sXhnycDcpuJWwH.TbxHgzQnKBLE/3FK8bhyr3zZbN3FKxO', 'inactive', '2024-08-02 13:01:24', '2024-08-02 13:03:48'),
(29, 'koyabe1170@alientex.com', '$2y$10$SZCTIfNJuL7/sLEhZTBmGu5TpEapno7H8GKu4YSN5SwWa1Wbc1pOi', 'inactive', '2024-08-02 13:02:13', '2024-08-02 13:03:48'),
(30, 'giliver235@biowey.com', '$2y$10$bjc3BjZvNHGpgm01l2Lx0OOE7JaNZWvG8ybKjKsRCKTbXbMbB60IC', 'inactive', '2024-08-02 13:03:35', '2024-08-02 13:03:48'),
(31, 'yolegic762@biscoine.com', '$2y$10$hZw5sfCBb1FJcbz0E8gv9eHd.NNUmipRfZTHLtYAj35oPfEJbUKFi', 'inactive', '2024-08-02 13:05:15', '2024-08-02 13:05:28'),
(32, 'hawok45743@biowey.com', '$2y$10$lBC3QD.R4ktLaczQ1nufPu/3jSI9ofDLsCx5mEw15EEixMJUs.BD.', 'inactive', '2024-08-02 13:10:27', '2024-08-02 13:10:43'),
(33, 'hawok45743@biowey.com', '$2y$10$/rzoXbjyUY78s9RCW2ks1O5PRiYyru5LDc6bWnJVCUx6EO9.X3w2e', 'inactive', '2024-08-02 13:11:20', '2024-08-02 13:11:39'),
(34, 'bipulsardar421@gmail.com', '$2y$10$roxRmJPcc51nNQYNYVEGu.SvEHtpOtoWGg.uhPviNKV0gnZH1hcai', 'inactive', '2024-08-22 12:19:13', '2024-08-22 12:19:50'),
(60, 'bipulsardar091@gmail.com', '$2y$10$253XaRc2PGR0MQoTLRrtkeXlQsJVPnKGdC.OaPNitjjWaMoCzu.ze', 'inactive', '2024-08-29 12:42:21', '2024-08-29 12:45:00'),
(61, 'bipulsardar091@gmail.com', '$2y$10$6miHv94M810HHUt18PiYTe4ZCtEkI9bnzPyl0vZvEVkvaqwYx3Znm', 'inactive', '2024-08-29 12:47:47', '2024-08-29 12:47:58'),
(62, 'bipulsardar091@gmail.com', '$2y$10$Xmv3R0A8aeEz0fXRCFzjReHttsXf4Rh7vxt7dzWd4N4Kq2KGDBIhy', 'inactive', '2024-08-29 12:56:18', '2024-08-29 12:56:27'),
(63, 'bipulsardar091@gmail.com', '$2y$10$VKYHcB.EuZtyA6xoHoCWn.kWTiyhXYYB/icHiX1Bz4BiH6SfJwr5O', 'inactive', '2024-08-30 04:10:58', '2024-08-30 04:11:12');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `sl_no` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`sl_no`, `firstName`, `lastName`, `email`, `password`) VALUES
(1, 'test24', 'test24', 'test24@gmail.com', '$2y$10$iVLmrT9V2twzHBqWdVNZreLLP7VMjMvgwaAkVUixOlxomOHcU69g.'),
(4, 'bipul', 'sardar', 'test244@gmail.com', '$2y$10$q24wrJdDBM38SdnV0j9F2uGMVImehP7uql4BUGqG5dYaSEPyofg9i'),
(5, 'bipul', 'sardar', 'pocono8379@hisotyr.com', '$2y$10$oFYRzLq10kLxn1uBRatD3OZtft5o4u2mlL89Pd87sIDM3Mk6cdnVa'),
(6, 'bipul', 'sardar', 'pocono839@hisotyr.com', '$2y$10$xzpg5ArolNgReQAb2LoJ1O0DyviQltoxX9VaU1sY746Bfh51q3ql.'),
(7, 'bipul', 'sardar', 'pocono83@hisotyr.com', '$2y$10$I11L0AT2ay1eK1Rc8dKmh.9hOb7dqjnHm5MxgF7./hRy2q6l4sKD6'),
(8, 'bipul', 'sardar', 'pocono8@hisotyr.com', '$2y$10$d/v7cgqxiLdjSlEjT2icOescj5IEez8/2DihlByNpsAzBmWnVeoEa'),
(9, 'bipul', 'test2', 'bipul12@gmail.com', '$2y$10$mPHpjkeQe6kvRsQ611ReXuJLPEARRmHmuuQy5sLipYFbAlUyvaKte'),
(10, 'Bipul', 'Sardar', 'test243@gmail.com', '$2y$10$oopJEvyHRefrCZL17VaZwup8iKCuhAxS7Xk17uuYrFI0jEOCPRzV6'),
(11, 'test24', 'test24', 'bipulsardar421@gmail.com', '$2y$10$4KBfDRNjyLnnsZHyNEpt4eiaRSbYdbZZC6nLjd766lGad9yQZK4vy'),
(12, 'Bipul', 'Sardar', 'bipul@gmail.com', '$2y$10$fyag1aahN6mikaG..4sJ0e/PK6ul3VOwFmeHEUedrlBQ0DLdpyroK'),
(13, 'Trial', 'Demo', 'trial@gmail.com', '$2y$10$xz718UG0ozmEBgdhE15seOdCBIrLk6v8j1hIKNW5Lzl1y6MnYuhTO'),
(14, 'Admin1', 'Admin2', 'admin@gmail.com', '$2y$10$a.WQY48eWGUUbBCWw1f5heIYUwKqwfrlmTKRPuIAiCTlyuQB7CY9y'),
(15, 'bipul', 'sardar', 'test234@gmail.com', '$2y$10$IPS0wNW0ZgePZ85HbWdn5eUQTFaXP3MoxMvZ60fx51CcMr7SaVrVG'),
(16, 'xyz', 'abc', 'abc@abc.com', '$2y$10$VBrTRg5F49Wv7FmbT6JM0ucmkcVAKGZpSa0UaDA6/xtEuXRC3c3ka'),
(17, 'Bhargavi', 'B', 'bhargavi@gmail.com', '$2y$10$da244b8idrVpcy29wBTUfuTFR.dmQ6BC/IFq9Wt6wh9QGLXfRZ28y'),
(18, 'bipul_test', 'sardar_test', 'bipulsardar@gmail.com', '$2y$10$aghUaSJ/oZ74NuRusWa5Cu4LvyhS1c4KNCUR4IQDt0qlaI4hu9LtO'),
(20, 'asdfasdf', 'sardar', 'test254@gmail.com', '$2y$10$Ink.YkfHm4x8H6SkuaBhv.u94coruRkGW5NHPkwFHj3tDZNkR9joi'),
(21, 'bipul', 'sardar', 'trial333@gmail.com', '$2y$10$5GAlZasqytt30uuagrZ8vesl36RNoGH/MbsASa6hmfnpK3GzXTeiu'),
(22, 'bipul', 'sardar', 'trial3333@gmail.com', '$2y$10$gHV6NL0BE6qA.LYDT238E.PVn6o37/0q.f5y6zMfeVJ.whEgVkxti'),
(23, 'bipul', 'sardar', 'trial33333@gmail.com', '$2y$10$JirEsr47aS9cs..cYTFibOyt0DRRcDVkR5bgW8JBoJ/3qSC3aUSHu'),
(24, 'bipul', 'sardar', 'trial333233@gmail.com', '$2y$10$4fumG//9QJZBB15hszoBPujWVF5pylw0VB3rnS2hvuTYKNbJkrAJ6'),
(25, 'Bipul', 'Sardar', 'test2224@gmail.com', '$2y$10$Gj/D.nVzjGrmhr.zK3ItZO7SnnhaEM1o8PaDYj9sDzcY7kR1.aLH2'),
(26, 'tavemej395@digdy.com', 'tavemej395@digdy.com', 'tavemej395@digdy.com', '$2y$10$Du6tp8ks8Ta9k0QH73S4EuwQl..j1P2Yy639qYPvfW.L7FYixGP8y'),
(27, 'Bipul', 'Sardar', 'maleko1452@fuzitea.com', '$2y$10$NJOS1VR0Uj2A7gxowALtWOUBwaRe0h/R3kH32.L1YrUWmZseDFPEW'),
(28, 'cigevac678@fuzitea.com', 'cigevac678@fuzitea.com', 'cigevac678@fuzitea.com', '$2y$10$Vh6VA/0O1lHhK7JPnZkMmuM1QwLRxk935ZdIRiu34IRU7fndi.hIW'),
(29, 'yayov26838@alientex.com', 'yayov26838@alientex.com', 'yayov26838@alientex.com', '$2y$10$r3QZ8.0b3pR0m0MTI2jhJOtl60Pho4Hjn9Y02x1Bn901c1cS50sN.'),
(30, 'koyabe1170@alientex.com', 'koyabe1170@alientex.com', 'koyabe1170@alientex.com', '$2y$10$GzfaOpdZRfEkEhocx4fAFuPTRX9CkvNJz1uYaBFPuTpXUcrRZ3ls.'),
(31, 'giliver235@biowey.com', 'giliver235@biowey.com', 'giliver235@biowey.com', '$2y$10$Z1C9uuMLEdWGlTL5Gt6XWeF9PvI0wh3bJuL0xNLjWw1ZsLaNi64Q2'),
(32, 'yolegic762@biscoine.com', 'yolegic762@biscoine.com', 'yolegic762@biscoine.com', '$2y$10$.bU5.0aTZTcqbLmFYkulveaZgXK5FxFvT5zo.HmU2A5QxpGp8vzFm'),
(33, 'hawok45743@biowey.com', 'hawok45743@biowey.com', 'hawok45743@biowey.com', '$2y$10$WqtubcISaDTUIdyYYcOJR.wunPUQ2a3eHsemN77862FLIl6dICUG.'),
(34, 'Bipul', 'Sardar', 'gmail@trimail.com', '$2y$10$RTsJ0AnMoI8V.4UHCUXvmehhfLi2C3Qakaxho/pR5h203c4g107q6'),
(35, 'John', 'Doe', 'john@example.com', '$2y$10$HvRg6atQdhMCnHjx00z4D.moFy2aVsm1F3pBNuGExVRti0qFe.Tpi'),
(38, 'Bipul', 'Sardar', 'bipulsardar091@gmail.com', '$2y$10$bsUmNB6RF7rPoLfpeZ.y7uIwhlUbkFWujHui7BTGwKctFSXz2w.Du'),
(39, 'John', 'Doe', 'bipul2322@gmail.com', '$2y$10$UEi7Bn7tNOnEMrZM5IEIk.ypxWddnxtDgvWxX37NTXbfz16tarv.6'),
(44, 'Bipul', 'Sardar', 'bipulsardar0931@gmail.com', '$2y$10$ZH7Z2IX69OTjE84Hug4TZO.OgcLEAg7jwjmO/WHiQ371QQuttzG3S'),
(45, 'Bipul', 'Sardar', 'bipulsardar093s1@gmail.com', '$2y$10$8RDVlB2gBFrepwTXpHGWt.L2tjW1ik3HcrchpLXAWK2o3wCyuWo4u'),
(46, 'Bipul', 'Sardar', 'bipulsardar0912@gmail.com', '$2y$10$jy7WC8T8MuzUIMPlNUkDkOd0.3fUlJnaC1q9BZjnx/sk2SvXtMOYi'),
(47, 'Bipul', 'Sardar', 'bipulsardar0911@gmail.com', '$2y$10$cbUlQGqmTh6.xEOoloc6COscjUh4go6WrbNwr6ubxKZrd.yMDYyDq'),
(48, '', '', '', '$2y$10$39./t3mDMvo8O9NLt.0dKeH7EhtG01/8/8oq9FT7BKFEMx6C2nQ2C'),
(49, 'Bipul', 'Sardar', 'bipulsardar0913@gmail.com', '$2y$10$VZK3SfUzNj0HEo.c3PEG7emmjg5d/.2hC5oPCv86WEzBVUeS.MleO');

-- --------------------------------------------------------

--
-- Table structure for table `user_image`
--

CREATE TABLE `user_image` (
  `sl_no` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_image`
--

INSERT INTO `user_image` (`sl_no`, `user_id`, `url`) VALUES
(1, 1, 'http://example.com/dummy-image.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `employees_address`
--
ALTER TABLE `employees_address`
  ADD PRIMARY KEY (`sl_no`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `employees_details_extended`
--
ALTER TABLE `employees_details_extended`
  ADD PRIMARY KEY (`sl_no`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `employees_education`
--
ALTER TABLE `employees_education`
  ADD PRIMARY KEY (`sl_no`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `employees_personal_contact_details`
--
ALTER TABLE `employees_personal_contact_details`
  ADD PRIMARY KEY (`sl_no`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `emp_image`
--
ALTER TABLE `emp_image`
  ADD PRIMARY KEY (`sl_no`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `otpvalidation`
--
ALTER TABLE `otpvalidation`
  ADD PRIMARY KEY (`sl_no`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`sl_no`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_image`
--
ALTER TABLE `user_image`
  ADD PRIMARY KEY (`sl_no`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `employees_address`
--
ALTER TABLE `employees_address`
  MODIFY `sl_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employees_details_extended`
--
ALTER TABLE `employees_details_extended`
  MODIFY `sl_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employees_education`
--
ALTER TABLE `employees_education`
  MODIFY `sl_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employees_personal_contact_details`
--
ALTER TABLE `employees_personal_contact_details`
  MODIFY `sl_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `emp_image`
--
ALTER TABLE `emp_image`
  MODIFY `sl_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `otpvalidation`
--
ALTER TABLE `otpvalidation`
  MODIFY `sl_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `sl_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `user_image`
--
ALTER TABLE `user_image`
  MODIFY `sl_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees_address`
--
ALTER TABLE `employees_address`
  ADD CONSTRAINT `employees_address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `employees` (`user_id`);

--
-- Constraints for table `employees_details_extended`
--
ALTER TABLE `employees_details_extended`
  ADD CONSTRAINT `employees_details_extended_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `employees` (`user_id`);

--
-- Constraints for table `employees_education`
--
ALTER TABLE `employees_education`
  ADD CONSTRAINT `employees_education_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `employees` (`user_id`);

--
-- Constraints for table `employees_personal_contact_details`
--
ALTER TABLE `employees_personal_contact_details`
  ADD CONSTRAINT `employees_personal_contact_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `employees` (`user_id`);

--
-- Constraints for table `emp_image`
--
ALTER TABLE `emp_image`
  ADD CONSTRAINT `emp_image_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `employees` (`user_id`);

--
-- Constraints for table `user_image`
--
ALTER TABLE `user_image`
  ADD CONSTRAINT `user_image_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `userdetails` (`sl_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
