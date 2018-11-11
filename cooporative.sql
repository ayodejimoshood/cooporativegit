-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Oct 13, 2016 at 11:45 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `cooporative`
--

-- --------------------------------------------------------

--
-- Table structure for table `approvals`
--

CREATE TABLE `approvals` (
  `approval_id` int(10) unsigned NOT NULL,
  `stage_id` int(20) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `approval_state` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `approvals`
--

INSERT INTO `approvals` (`approval_id`, `stage_id`, `loan_id`, `user_id`, `approval_state`, `created_at`, `updated_at`) VALUES
(1, 1, 6, '5', 1, '2016-09-13 12:00:01', '2016-09-15 06:52:46'),
(3, 2, 6, '1', 1, '2016-09-15 06:52:46', '2016-09-15 12:21:06'),
(4, 3, 6, '7', 1, '2016-09-15 12:21:06', '2016-09-15 12:24:56'),
(5, 4, 6, '7', 1, '2016-09-15 12:24:56', '2016-09-25 13:06:09'),
(6, 1, 7, '', 0, '2016-10-13 16:16:52', '2016-10-13 16:16:52');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(10) unsigned NOT NULL,
  `loan_id` int(11) NOT NULL,
  `stage_id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `loan_id`, `stage_id`, `user_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 5, 'test comment', '2016-09-15 05:02:36', '2016-09-15 05:02:36'),
(2, 6, 1, 5, 'Kindly Approve', '2016-09-15 05:05:26', '2016-09-15 05:05:26'),
(3, 6, 1, 5, 'I don''t think this candidate is suitable for a loan.', '2016-09-15 05:05:41', '2016-09-15 05:05:41');

-- --------------------------------------------------------

--
-- Table structure for table `contributions`
--

CREATE TABLE `contributions` (
  `contribution_id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `cooporative_id` int(11) NOT NULL,
  `period_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contribution_amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_payment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `balance_payment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `evidence` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contributions`
--

INSERT INTO `contributions` (`contribution_id`, `user_id`, `cooporative_id`, `period_id`, `contribution_amount`, `total_payment`, `balance_payment`, `evidence`, `created_at`, `updated_at`) VALUES
(1, 1, 0, '', '50000', '', '', '', '2016-09-09 05:31:07', '2016-09-09 05:31:07'),
(2, 1, 0, '', '50000', '', '', '', '2016-09-09 05:39:38', '2016-09-09 05:39:38'),
(3, 6, 0, '', '100000', '', '', '', '2016-09-09 06:09:39', '2016-09-09 06:09:39');

-- --------------------------------------------------------

--
-- Table structure for table `cooporatives`
--

CREATE TABLE `cooporatives` (
  `cooporative_id` int(10) unsigned NOT NULL,
  `cooporative_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cooporative_desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lga_id` int(11) NOT NULL,
  `contact_name` int(11) NOT NULL,
  `contact_number` int(11) NOT NULL,
  `contact_email` int(11) NOT NULL,
  `cooporative_status` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cooporatives`
--

INSERT INTO `cooporatives` (`cooporative_id`, `cooporative_name`, `cooporative_desc`, `lga_id`, `contact_name`, `contact_number`, `contact_email`, `cooporative_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test Cooperative', '', 0, 0, 0, 0, 0, NULL, '2016-08-02 13:01:08', '2016-08-02 13:01:08'),
(2, 'Test', 'iwhe;roiewoirew', 0, 0, 0, 0, 0, NULL, '2016-08-02 13:18:39', '2016-08-02 13:18:39');

-- --------------------------------------------------------

--
-- Table structure for table `lgas`
--

CREATE TABLE `lgas` (
  `lga_id` int(10) unsigned NOT NULL,
  `state_id` int(11) NOT NULL,
  `lga_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lga_desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lga_status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `loan_id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `cooporative_id` int(11) NOT NULL,
  `loan_amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `monthly_payment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `interest` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_payment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `duration` int(10) NOT NULL,
  `payment_status` int(2) NOT NULL,
  `stage_id` int(10) NOT NULL,
  `start_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `end_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `disbursement_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`loan_id`, `user_id`, `cooporative_id`, `loan_amount`, `monthly_payment`, `interest`, `total_payment`, `duration`, `payment_status`, `stage_id`, `start_date`, `end_date`, `disbursement_date`, `created_at`, `updated_at`) VALUES
(6, 1, 0, '20000', '5250', '0.05', '21000', 4, 1, 1, '', '', '2025-09-18', '2016-09-13 12:00:00', '2016-09-25 13:17:04'),
(7, 3, 0, '70000', '6125', '0.05', '73500', 12, 1, 1, '', '', '0000-00-00', '2016-10-13 16:16:52', '2016-10-13 16:16:52');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cooporative_id` int(11) NOT NULL,
  `privilege_id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `next_of_kin_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `next_of_kin_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `next_of_kin_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `next_of_kin_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_status` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `title`, `firstname`, `lastname`, `telephone`, `address`, `gender`, `cooporative_id`, `privilege_id`, `email`, `password`, `next_of_kin_name`, `next_of_kin_email`, `next_of_kin_number`, `next_of_kin_address`, `user_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '', 'Andyson', 'Utomudo', '+2348068271558', '93 Allen Avenue Ikeja\r\nOpp. Ecobank, top floor', 'Male', 1, 0, 'sparkandyjunior@yahoo.co.uk', '', 'Andyson Utomudo', 'sparkandyjunior@yahoo.co.uk', '08068271558', '93 Allen Avenue Ikeja\r\nOpp. Ecobank, top floor', 0, NULL, '2016-08-02 14:17:19', '2016-08-02 14:17:19');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_07_13_194348_create_cooporatives_table', 1),
('2016_07_13_194544_create_states_table', 1),
('2016_07_13_194708_create_privileges_table', 1),
('2016_07_13_194934_create_lgas_table', 1),
('2016_07_23_130130_create_transactions_table', 1),
('2016_07_23_131505_create_transaction_type_table', 1),
('2016_08_02_111952_create_members_table', 2),
('2016_08_19_154306_create_loans_table', 3),
('2016_08_19_154330_create_contributions_table', 3),
('2016_08_19_154428_create_periods_table', 3),
('2016_08_19_154445_create_repayments_table', 3),
('2016_09_07_102829_create_cache_table', 4),
('2016_09_12_081928_create_approvals_table', 4),
('2016_09_12_082328_create_comments_table', 4),
('2016_09_13_124516_create_stages_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('fissycoolz@yahoo.com', '8f8adffb72c162792fa281f25a5fe7b1e8630589d2eb854852f44f914020e867', '2016-10-13 20:33:36');

-- --------------------------------------------------------

--
-- Table structure for table `periods`
--

CREATE TABLE `periods` (
  `period_id` int(10) unsigned NOT NULL,
  `period_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `period_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `privileges`
--

CREATE TABLE `privileges` (
  `privilege_id` int(10) unsigned NOT NULL,
  `privilege_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `privilege_status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `privileges`
--

INSERT INTO `privileges` (`privilege_id`, `privilege_name`, `privilege_status`, `created_at`, `updated_at`) VALUES
(1, 'Member', 1, '2016-09-11 23:00:00', '2016-09-11 23:00:00'),
(2, 'Loan Officer', 1, '2016-09-11 23:00:00', '2016-09-11 23:00:00'),
(3, 'Accountant', 1, '2016-09-11 23:00:00', '2016-09-11 23:00:00'),
(4, 'Managing Director', 1, '2016-09-11 23:00:00', '2016-09-11 23:00:00'),
(5, 'Super Admin', 1, '2016-09-14 23:00:00', '2016-09-14 23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `repayments`
--

CREATE TABLE `repayments` (
  `repayment_id` int(10) unsigned NOT NULL,
  `loan_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `repayment_amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_deadline` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `evidence` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` tinyint(1) NOT NULL,
  `loan_balance` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `repayments`
--

INSERT INTO `repayments` (`repayment_id`, `loan_id`, `repayment_amount`, `payment_deadline`, `evidence`, `payment_status`, `loan_balance`, `created_at`, `updated_at`) VALUES
(2, '6', '5250', '', 'payments/repayments/Change Admin_Utomudo_1475225067.jpg', 1, '15750', '2016-09-25 13:17:04', '2016-09-30 07:44:27'),
(3, '6', '5250', '', 'payments/repayments/Ayodeji_Moshood_1475267979.jpg', 1, '10500', '2016-09-25 13:17:04', '2016-09-30 19:39:39'),
(4, '6', '5250', '', '', 0, '5250', '2016-09-25 13:17:04', '2016-09-25 13:17:04'),
(5, '6', '5250', '', '', 0, '0', '2016-09-25 13:17:04', '2016-09-25 13:17:04');

-- --------------------------------------------------------

--
-- Table structure for table `stages`
--

CREATE TABLE `stages` (
  `stage_id` int(10) unsigned NOT NULL,
  `stage_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stage_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stages`
--

INSERT INTO `stages` (`stage_id`, `stage_name`, `stage_status`, `created_at`, `updated_at`) VALUES
(1, 'Loan Officer Approval', '1', '2016-09-12 23:00:00', '2016-09-12 23:00:00'),
(2, 'MD Approval ', '1', '2016-09-12 23:00:00', '2016-09-12 23:00:00'),
(3, 'Account Approval', '1', '2016-09-12 23:00:00', '2016-09-12 23:00:00'),
(4, 'Loan Disbursement', '1', '2016-09-14 23:00:00', '2016-09-14 23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `state_id` int(10) unsigned NOT NULL,
  `state_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state_short_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state_status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(10) unsigned NOT NULL,
  `member_id` int(11) NOT NULL,
  `transaction_type_id` int(11) NOT NULL,
  `narrative` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `transaction_status` tinyint(1) NOT NULL,
  `transaction_amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account_balance` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_type`
--

CREATE TABLE `transaction_type` (
  `transaction_type_id` int(10) unsigned NOT NULL,
  `transaction_type_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `transaction_type_desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transaction_type`
--

INSERT INTO `transaction_type` (`transaction_type_id`, `transaction_type_name`, `transaction_type_desc`, `created_at`, `updated_at`) VALUES
(1, 'Monthly Deposit', 'Monthly Contributions', '0000-00-00 00:00:00', NULL),
(2, 'Loan Borrow Cash', 'Loan collected', NULL, NULL),
(3, 'Loan Repayment', 'Loan Repayment', '0000-00-00 00:00:00', NULL),
(4, 'Loan Borrow Cash', 'Loan collected', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bank_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `account_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cooporative_id` int(11) NOT NULL,
  `privilege_id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `employment_category` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `grade_level_id` int(1) NOT NULL,
  `next_of_kin_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `next_of_kin_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `next_of_kin_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `next_of_kin_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_status` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `title`, `firstname`, `lastname`, `telephone`, `gender`, `address`, `bank_name`, `account_number`, `cooporative_id`, `privilege_id`, `email`, `password`, `employment_category`, `grade_level_id`, `next_of_kin_name`, `next_of_kin_email`, `next_of_kin_number`, `next_of_kin_address`, `user_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '', 'Ayodeji', 'Moshood', '07060460216', 'Male', 'Address', 'Diamond Bank', '894575473979384', 1, 5, 'amoshood@fczmedia.com', '$2y$10$frahAl8ighejIAAjX/nUBurUn0Q.ijksfY2ZR7j8Lwx5aiMx4ZCv.', 'Permanent', 4, 'Okiemute Utomudo', 'sparkokes@gmail.com', '080550000', 'address', 1, 'CILVqiv9zynJsFWYCmsA28VnXwKGk7NQystriwrJs42yw7iRW24JgRlwpF5E', '2016-07-27 04:19:20', '2016-10-13 20:21:54'),
(2, '', 'Oreoluwa', 'Freeman', '07066179185', 'Female', 'House 31a Adeyemo Akapo Street, Omole Phase 1, Ojodu, Lagos State', 'Diamond Bank', '0073361959', 0, 3, 'oreoluwafreeman@gmail.com', '$2y$10$0WDXv3Uy1WGxpsIPYKWx9.z1audEBlDP90PRl844NoW2ohL/MmsXK', 'Permanent', 3, 'Mrs D T Freeman', 'dtfreeman@gmail.com', '08025269000', 'House 31a Adeyemo Akapo Street, Omole Phase 1, Ojodu, Lagos State', 0, 'CbnlPWdaQmGXRHUIiwKBS2HnSefixxS47IjnkOepA5mkIpGIem1aubf6M88g', '2016-09-07 14:46:24', '2016-10-13 16:11:56'),
(3, '', 'Rasheed', 'Lukman', '08068271558', 'Male', 'whoiweew', 'Diamond Bank', '09876567899', 0, 1, 'fissycoolz@yahoo.com', '$2y$10$IP4bURmhmAOgHT2uk0D4pO2IXyEWjiSpdWaw87/Mtt1u66eMpAMeS', 'Contract', 3, 'Okiemute', 'okes@gmail.com', '080000000', 'qererqewre', 0, '9QRGCqBEYaLlvbXh7HwAk1nahR5YgwC2bxpDO51a0UZYucO8bNvvyR9eYOB6', '2016-09-09 06:01:03', '2016-10-13 16:17:26'),
(4, '', 'Femi', 'Kicker', '08068271558', 'Male', 'No. 8 Ovba Street, alapere Ketu', 'Diamond Bank', '09876567899', 0, 2, 'femikicker@gmail.com', '$2y$10$ZMcTyYheoS8qGNc6ybNzcOrgXr7.Ei5wjkKFsLsiwSiBJyy6pKOQe', 'Contract', 1, 'test', 'test@test.com', '080000000', 'addresss', 0, '22e8PwLXnILwRg3Ouy1H50ttFk2iZtQpEtpPCXDOxHoWR1cKMIY21JQgBxop', '2016-09-15 07:13:00', '2016-10-13 16:25:28'),
(5, '', 'Tunde', 'Moneney', '0703324556', 'Male', 'Oke Itunu Ologo, After Christian Church, Ilesha, Osun State', 'Diamond Bank', '09876567899', 0, 4, 'adelekand@yahoo.com', '$2y$10$OeXUx0fw8QnBPv5DLBLvBeiHUXLDFf18osXIXdSiIjb8tj4lchPMm', 'Contract', 3, 'Mrs D T Freeman', 'dtfreeman@gmail.com', '08025269000', 'House 31a Adeyemo Akapo Street, Omole Phase 1, Ojodu, Lagos State', 0, NULL, '2016-09-16 10:52:41', '2016-09-30 12:33:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approvals`
--
ALTER TABLE `approvals`
  ADD PRIMARY KEY (`approval_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD UNIQUE KEY `cache_key_unique` (`key`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contributions`
--
ALTER TABLE `contributions`
  ADD PRIMARY KEY (`contribution_id`);

--
-- Indexes for table `cooporatives`
--
ALTER TABLE `cooporatives`
  ADD PRIMARY KEY (`cooporative_id`);

--
-- Indexes for table `lgas`
--
ALTER TABLE `lgas`
  ADD PRIMARY KEY (`lga_id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`loan_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`),
  ADD UNIQUE KEY `members_email_unique` (`email`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `periods`
--
ALTER TABLE `periods`
  ADD PRIMARY KEY (`period_id`);

--
-- Indexes for table `privileges`
--
ALTER TABLE `privileges`
  ADD PRIMARY KEY (`privilege_id`);

--
-- Indexes for table `repayments`
--
ALTER TABLE `repayments`
  ADD PRIMARY KEY (`repayment_id`);

--
-- Indexes for table `stages`
--
ALTER TABLE `stages`
  ADD PRIMARY KEY (`stage_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `transaction_type`
--
ALTER TABLE `transaction_type`
  ADD PRIMARY KEY (`transaction_type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approvals`
--
ALTER TABLE `approvals`
  MODIFY `approval_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `contributions`
--
ALTER TABLE `contributions`
  MODIFY `contribution_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cooporatives`
--
ALTER TABLE `cooporatives`
  MODIFY `cooporative_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lgas`
--
ALTER TABLE `lgas`
  MODIFY `lga_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `loan_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `periods`
--
ALTER TABLE `periods`
  MODIFY `period_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `privileges`
--
ALTER TABLE `privileges`
  MODIFY `privilege_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `repayments`
--
ALTER TABLE `repayments`
  MODIFY `repayment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `stages`
--
ALTER TABLE `stages`
  MODIFY `stage_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `state_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaction_type`
--
ALTER TABLE `transaction_type`
  MODIFY `transaction_type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;