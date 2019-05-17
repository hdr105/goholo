-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2018 at 06:05 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goholo`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `advert_id` int(11) NOT NULL,
  `advert_qb_id` int(11) NOT NULL,
  `advertiser_id` int(11) NOT NULL,
  `advert_number` varchar(50) NOT NULL,
  `start_date` varchar(20) NOT NULL,
  `end_date` varchar(20) NOT NULL,
  `hologram_type` int(11) NOT NULL,
  `hologram_description` longtext NOT NULL,
  `hologram_file` longtext NOT NULL,
  `location_id` int(11) NOT NULL,
  `commission_status` tinyint(1) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`advert_id`, `advert_qb_id`, `advertiser_id`, `advert_number`, `start_date`, `end_date`, `hologram_type`, `hologram_description`, `hologram_file`, `location_id`, `commission_status`, `status`, `created_by`, `created_at`) VALUES
(15, 155, 7, 'AD999735', '11/2018', '11/2018', 1, '', '1690722895aveune_nightclub.jpg', 38, 0, 1, 40, '2018-10-31 20:06:35'),
(17, 158, 7, 'AD199584', '12/2018', '12/2018', 1, '', '222016334WWW.YIFY-TORRENTS.COM.jpg', 38, 0, 1, 8, '2018-10-31 22:07:19'),
(18, 159, 7, 'AD777782', '11/2018', '11/2018', 2, '3d animation on my logo ', '1281418911GOHOLOBLUEGLOWWHITEBG.png', 38, 0, 1, 40, '2018-11-01 05:02:11'),
(19, 160, 7, 'AD802803', '12/2018', '12/2018', 2, 'test haider', '223893921WWW.YIFY-TORRENTS.COM.jpg', 40, 0, 1, 8, '2018-11-01 13:28:44'),
(20, 161, 7, 'AD758312', '12/2018', '12/2018', 2, 'QA testing. ', '2591435691531149398695_CV_2017-converted.pdf', 39, 0, 1, 43, '2018-11-01 13:47:04'),
(21, 162, 7, 'AD131602', '12/2018', '12/2018', 1, '', '864170662shefield-sons-tobacconists-storefront-1.jpg', 43, 0, 1, 40, '2018-11-02 00:58:34');

-- --------------------------------------------------------

--
-- Table structure for table `advertisers`
--

CREATE TABLE `advertisers` (
  `advertiser_id` int(11) NOT NULL,
  `advertiser_qb_id` int(11) NOT NULL,
  `advertiser_first_name` varchar(50) NOT NULL,
  `advertiser_last_name` varchar(50) NOT NULL,
  `advertiser_company_name` varchar(100) NOT NULL,
  `advertiser_website` varchar(100) NOT NULL,
  `advertiser_email` varchar(50) NOT NULL,
  `advertiser_phone_number` varchar(20) NOT NULL,
  `advertiser_street` longtext NOT NULL,
  `advertiser_city` varchar(20) NOT NULL,
  `advertiser_country` varchar(20) NOT NULL,
  `advertiser_post_code` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertisers`
--

INSERT INTO `advertisers` (`advertiser_id`, `advertiser_qb_id`, `advertiser_first_name`, `advertiser_last_name`, `advertiser_company_name`, `advertiser_website`, `advertiser_email`, `advertiser_phone_number`, `advertiser_street`, `advertiser_city`, `advertiser_country`, `advertiser_post_code`, `status`, `created_by`) VALUES
(7, 96, 'Jamal', 'Alfarela', 'Gadget Cloud', '', 'Jamalalfarela@live.com', '7809772322', '', '', '', '', 0, 40);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `location_id` int(11) NOT NULL,
  `location_qb_id` int(11) NOT NULL,
  `location_number` varchar(50) NOT NULL,
  `location_name` varchar(50) NOT NULL,
  `displays` varchar(50) NOT NULL,
  `monthly_views` varchar(100) NOT NULL,
  `monthly_cost` varchar(50) NOT NULL,
  `owner_royalty` int(11) NOT NULL,
  `advert_royalty` int(11) NOT NULL,
  `advert_royalty_status` tinyint(1) NOT NULL DEFAULT '0',
  `owner_royalty_status` tinyint(1) NOT NULL DEFAULT '0',
  `main_demographic` varchar(255) NOT NULL,
  `industry` varchar(50) NOT NULL,
  `age_group` varchar(50) NOT NULL,
  `location_description` longtext NOT NULL,
  `other_notes` longtext NOT NULL,
  `location_image` longtext NOT NULL,
  `location_video` longtext NOT NULL,
  `location_address` longtext NOT NULL,
  `location_street` varchar(255) NOT NULL,
  `location_city` varchar(50) NOT NULL,
  `location_state` varchar(50) NOT NULL,
  `location_post_code` varchar(50) NOT NULL,
  `location_country` varchar(50) NOT NULL,
  `location_lat` varchar(50) NOT NULL,
  `location_lng` varchar(50) NOT NULL,
  `location_owner` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_id`, `location_qb_id`, `location_number`, `location_name`, `displays`, `monthly_views`, `monthly_cost`, `owner_royalty`, `advert_royalty`, `advert_royalty_status`, `owner_royalty_status`, `main_demographic`, `industry`, `age_group`, `location_description`, `other_notes`, `location_image`, `location_video`, `location_address`, `location_street`, `location_city`, `location_state`, `location_post_code`, `location_country`, `location_lat`, `location_lng`, `location_owner`, `status`, `created_by`, `created_at`) VALUES
(38, 33, 'LOC288305', 'Avenue Nightclub  ', '1', '4000 ', '200', 0, 0, 0, 0, 'Nightlife ', 'Nightlife / club ', '21+', 'Beverages / Liquor\\r\\nConsumer\\r\\ntest\\r\\nxyz', '', '922296741aveune_nightclub.jpg', '', '10888 Jasper Ave, Edmonton, AB T5K 0K9, Canada', '10888,Jasper Avenue', 'Edmonton', 'AB', 'T5K 0K9', 'Canada', '53.5412927', '-113.50810580000001', 0, 1, 40, '2018-10-31 20:03:23'),
(39, 34, 'LOC750895', 'Care It Urban Deli Crestwood ', '1', '4000 ', '200', 10, 0, 0, 0, 'Health conscious, Active people who tend to live a well balanced lifestyle   ', 'Food ', '21+', 'Beverages \\r\\nLocal Events \\r\\nTaxi / MADD ads \\r\\nSports\\r\\nConsumer Goods \\r\\nRestaurants \\r\\n', 'Owner is open to any ads ', '', '681134175Care_it_Urban_Deli_CRESTWOOD.MP4', '9672 142 St NW, Edmonton, AB, Canada', '9672,142 Street Northwest', 'Edmonton', 'AB', 'T5N 4B2', 'Canada', '53.5344023', '-113.56665229999999', 0, 1, 40, '2018-11-01 04:56:50'),
(40, 35, 'LOC538217', 'Care It Urban Deli Downtown ', '1', '4000 ', '200', 10, 0, 0, 0, 'Corporate, Office workers, Collage Students, Health conscious people   ', 'Food ', '21+', 'Beverages \\r\\nLocal Events \\r\\nTaxi / MADD ads \\r\\nSports\\r\\nConsumer Goods \\r\\nRestaurants \\r\\n', 'Owner is open to any type of ads ', '', '1169548166Care_it_Urban_Deli_DOWNTOWN.MP4', '10226 104 Street Northwest, Edmonton, AB, Canada', '10226,104 Street Northwest', 'Edmonton', 'AB', 'T5J 1B8', 'Canada', '53.5436629', '-113.49951620000002', 0, 1, 40, '2018-11-01 04:59:19'),
(42, 38, 'LOC874773', 'Shefield Express', '1', '200,000+', '950', 10, 0, 0, 0, '', '', '', '- Consumer Goods / Beverages\\r\\n- Kingsway Mall Advertising \\r\\n- Lottery \\r\\n', 'Some ads are restricted here, Please send request before getting payment to insure your ad can be displayed ', '459415305shefield-sons-tobacconists-storefront-1.jpg', '', 'Hudson\'s Bay Kingsway Mall, 109 Street, Edmonton, Alberta T5G 3A6, Canada', '109 Street Northwest', 'Edmonton', 'AB', 'T5G 3A6', 'Canada', '53.5606736', '-113.50490450000001', 0, 1, 40, '2018-11-02 00:52:37'),
(43, 39, 'LOC669791', 'Liquor House', '1', '3000 - 5000', '200', 10, 0, 0, 0, '', 'Beverages / Liquor', '18+', 'Beverages / Liquor \\r\\nTaxi / MADD ads \\r\\nRealtor / real estate \\r\\nEvents / Clubs \\r\\nRestaurants \\r\\n', '', '', '', '16510 59A ST, Edmonton, AB T5Y 3S9', '16510 59A ST, Edmonton', 'Edmonton', 'AB', 'T5Y 3S9', 'Canada', '53.6282928', '-113.34445490000002', 0, 1, 40, '2018-11-02 00:55:29'),
(44, 40, 'LOC112600', 'Seorak Restaurant ', '1', '750,000 +', '950', 10, 0, 0, 0, '', 'Food / Beverage', '', 'Beverages / liquor \\r\\nYoung Adults \\r\\nNightlife / Taxi / MADD ads \\r\\nLocal Events \\r\\nSports \\r\\n', 'The ad spot is on whyte ave which makes it a very busy area thats great for advertising events and parties ', '540609668rs=w_538,h_269,cg_true.jpeg', '', '10828 82 Ave NW, Edmonton, AB T6E 2B3, Canada', '10828,82 Avenue Northwest', 'Edmonton', 'AB', 'T6E 2B3', 'Canada', '53.5183542', '-113.51061820000001', 0, 1, 40, '2018-11-02 01:01:35'),
(45, 41, 'LOC573100', 'Liquor House (West)', '1', '3000 - 5000', '150', 10, 0, 0, 0, '', 'Beverages / Liquor', '', 'Beverages / liquor \\r\\nLocal Events \\r\\nTaxi / MADD ads \\r\\n', 'Owner is open to any ad', '', '', '15255 111 Ave NW, Edmonton, AB, Canada', '15255,111 Avenue Northwest', 'Edmonton', 'AB', 'T5M 2R1', 'Canada', '53.558521', '-113.58389', 0, 1, 40, '2018-11-02 01:04:38'),
(46, 42, 'LOC559949', 'Liquor Merchants ', '1', '3000 - 5000', '150', 10, 0, 0, 0, '', 'Beverages / Liquor', '18+', 'Beverages / liquor \\r\\nLocal Events \\r\\nTaxi / MADD ads \\r\\n', 'Owner is open to any ad ', '', '', '13132 82 Street Northwest, Edmonton, AB, Canada', '13132,82 Street Northwest', 'Edmonton', 'AB', 'T5E 2T5', 'Canada', '53.5917817', '-113.46790470000002', 0, 1, 40, '2018-11-02 01:10:17'),
(47, 43, 'LOC131926', 'Liquor Store', '1', '3000 - 5000', '150', 10, 0, 0, 0, '', '', '', 'Beverages / liquor \\r\\nLocal Events \\r\\nTaxi / MADD ads \\r\\n', 'Owner is open to any ad', '', '', '12965 97 Street Northwest, Edmonton, AB, Canada', '12965,97 Street Northwest', 'Edmonton', 'AB', 'T5E 4C4', 'Canada', '53.5894418', '-113.49137189999999', 0, 1, 40, '2018-11-02 01:11:25'),
(48, 44, 'LOC582500', '66 Bar & Grill ', '1', '8000', '395', 10, 0, 0, 0, '', 'Beverages / Food', '', 'Beverages / Liquor \\r\\nMall Ads \\r\\nLocal Events \\r\\nTaxi / MADD ads \\r\\nSports\\r\\nLondonderry Mall Ads ', 'Owner is open to any ad ', '1278491238file-10.jpeg', '10234975313DEFD7FE-4228-4ADC-B9BA-A316C240AFBC-1_(1).MP4', 'Londonderry Mall, Londonderry Square NW, Edmonton, AB, Canada', '1,Londonderry Square Northwest', 'Edmonton', 'AB', 'T5C 3C8', 'Canada', '53.6023306', '-113.44569639999997', 0, 1, 40, '2018-11-02 01:21:57'),
(49, 45, 'LOC983746', 'Poxys Convenience Store ', '1', '4000 ', '249', 10, -16, 0, 0, '', 'Convenience Store ', '', 'Beverages \\r\\nLocal Events \\r\\nTaxi / MADD ads \\r\\nSports\\r\\nConsumer Goods \\r\\nRestaurants\\r\\n', 'Owner is open to any ad ', '', '', '13204 82 St NW, Edmonton, AB T5E 2T7, Canada', '13204,82 Street Northwest', 'Edmonton', 'AB', 'T5E 2T7', 'Canada', '53.5926029', '-113.46779300000003', 0, 1, 40, '2018-11-02 01:26:25'),
(50, 46, 'LOC589423', 'Doodie Doos ', '1', '2000 - 3000', '150', 10, 0, 0, 0, '', 'Cannabis ', '', 'Beverages \\r\\nLocal Events \\r\\nTaxi / MADD ads \\r\\nCannabis Ads \\r\\nConsumer Goods \\r\\nRestaurants \\r\\n', 'Owner is open to any ad', '', '', '13104 82 Street Northwest, Edmonton, AB, Canada', '13104,82 Street Northwest', 'Edmonton', 'AB', 'T5E 2T5', 'Canada', '53.59132049999999', '-113.46764710000002', 0, 1, 40, '2018-11-02 01:29:27'),
(51, 47, 'LOC872445', 'Soup & Sandwich Co ', '1', '4000 ', '200', 10, 0, 0, 0, 'Health conscious, Active people who tend to live a well balanced lifestyle   ', 'Food ', '', 'Beverages \\r\\nLocal Events \\r\\nTaxi / MADD ads \\r\\nCannabis Ads \\r\\nConsumer Goo\\r\\n', 'Owner is open to any ad ', '435838977download.jpeg', '', '2833 Broadmoor Blvd, Sherwood Park, AB T8H 2H2, Canada', '2833,Broadmoor Boulevard', 'Sherwood Park', 'AB', 'T8H 2M8', 'Canada', '53.5639992', '-113.3190176', 0, 1, 40, '2018-11-02 01:32:02'),
(52, 48, 'LOC757729', 'Orbits Convenience Store', '1', '100,000 + ', '395', 10, 0, 0, 0, 'LRT Users ', 'Public Transit ', '', 'Owner is open to any ad ', 'Anyone coming in and out of the Edmonton Central LRT Station will see an ad displayed here ', '959545702ls_(1).jpg', '', '10020 Jasper Ave, Edmonton, AB T5J 1R2, Canada', '10020,Jasper Avenue', 'Edmonton', 'AB', 'T5J 1R2', 'Canada', '53.5413959', '-113.49153530000001', 0, 1, 40, '2018-11-02 01:40:04');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notify_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` longtext NOT NULL,
  `link` varchar(100) NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notify_id`, `receiver_id`, `message`, `link`, `read`, `created`) VALUES
(143, 35, 'test test added new location', 'locations/view_locations', 0, '2018-10-30 16:48:27'),
(144, 8, 'test test added new location', 'locations/view_locations', 0, '2018-10-30 16:48:27'),
(145, 36, 'test test added new location', 'locations/view_locations', 0, '2018-10-30 16:54:47'),
(146, 8, 'test test added new location', 'locations/view_locations', 0, '2018-10-30 16:54:47'),
(147, 37, 'test test added new location', 'locations/view_locations', 0, '2018-10-30 16:59:27'),
(148, 8, 'test test added new location', 'locations/view_locations', 0, '2018-10-30 16:59:28'),
(149, 39, 'test test added new location', 'locations/view_locations', 0, '2018-10-30 17:35:41'),
(150, 8, 'test test added new location', 'locations/view_locations', 0, '2018-10-30 17:35:41'),
(151, 39, 'test test added new location', 'locations/view_locations', 0, '2018-10-30 18:56:30'),
(152, 8, 'test test added new location', 'locations/view_locations', 0, '2018-10-30 18:56:30'),
(153, 41, 'test test added new location', 'locations/view_locations', 0, '2018-10-31 13:37:04'),
(154, 8, 'test test added new location', 'locations/view_locations', 0, '2018-10-31 13:37:04'),
(155, 40, 'test test added new location', 'locations/view_locations', 0, '2018-10-31 13:37:04'),
(156, 8, 'Jamal Alfarela added new location', 'locations/view_locations', 0, '2018-10-31 20:03:23'),
(157, 40, 'Jamal Alfarela added new location', 'locations/view_locations', 0, '2018-10-31 20:03:23'),
(158, 0, 'Jamal Alfarela added new advertisement', 'advertisers/view_advertisements', 0, '2018-10-31 20:06:35'),
(159, 8, 'Jamal Alfarela added new advertisement', 'advertisers/view_advertisements', 0, '2018-10-31 20:06:35'),
(160, 40, 'Jamal Alfarela added new advertisement', 'advertisers/view_advertisements', 0, '2018-10-31 20:06:35'),
(161, 8, 'New task created for location manager', 'location_manager', 0, '2018-10-31 20:06:35'),
(162, 40, 'New task created for location manager', 'location_manager', 0, '2018-10-31 20:06:35'),
(163, 8, 'New task created for location manager', 'location_manager', 0, '2018-10-31 20:06:35'),
(164, 40, 'New task created for location manager', 'location_manager', 0, '2018-10-31 20:06:35'),
(165, 0, 'test test added new advertisement', 'advertisers/view_advertisements', 0, '2018-10-31 20:08:57'),
(166, 8, 'test test added new advertisement', 'advertisers/view_advertisements', 0, '2018-10-31 20:08:57'),
(167, 40, 'test test added new advertisement', 'advertisers/view_advertisements', 0, '2018-10-31 20:08:57'),
(168, 8, 'New task created for location manager', 'location_manager', 0, '2018-10-31 20:08:57'),
(169, 40, 'New task created for location manager', 'location_manager', 0, '2018-10-31 20:08:57'),
(170, 8, 'New task created for location manager', 'location_manager', 0, '2018-10-31 20:08:57'),
(171, 40, 'New task created for location manager', 'location_manager', 0, '2018-10-31 20:08:57'),
(172, 8, 'test test added new advertisement', 'advertisers/view_advertisements', 0, '2018-10-31 22:07:19'),
(173, 40, 'test test added new advertisement', 'advertisers/view_advertisements', 0, '2018-10-31 22:07:19'),
(174, 8, 'New task created for location manager', 'location_manager', 0, '2018-10-31 22:07:19'),
(175, 40, 'New task created for location manager', 'location_manager', 0, '2018-10-31 22:07:19'),
(176, 8, 'New task created for location manager', 'location_manager', 0, '2018-10-31 22:07:19'),
(177, 40, 'New task created for location manager', 'location_manager', 0, '2018-10-31 22:07:19'),
(178, 8, 'Jamal Alfarela added new location', 'locations/view_locations', 0, '2018-11-01 04:56:50'),
(179, 40, 'Jamal Alfarela added new location', 'locations/view_locations', 0, '2018-11-01 04:56:50'),
(180, 8, 'Jamal Alfarela added new location', 'locations/view_locations', 0, '2018-11-01 04:59:19'),
(181, 40, 'Jamal Alfarela added new location', 'locations/view_locations', 0, '2018-11-01 04:59:19'),
(182, 8, 'Jamal Alfarela added new advertisement', 'advertisers/view_advertisements', 0, '2018-11-01 05:02:11'),
(183, 40, 'Jamal Alfarela added new advertisement', 'advertisers/view_advertisements', 0, '2018-11-01 05:02:11'),
(184, 8, 'New task created for location manager', 'location_manager', 0, '2018-11-01 05:02:11'),
(185, 40, 'New task created for location manager', 'location_manager', 0, '2018-11-01 05:02:11'),
(186, 8, 'New task created for location manager', 'location_manager', 0, '2018-11-01 05:02:11'),
(187, 40, 'New task created for location manager', 'location_manager', 0, '2018-11-01 05:02:11'),
(188, 8, 'New task created for designer', 'designer', 0, '2018-11-01 05:02:11'),
(189, 40, 'New task created for designer', 'designer', 0, '2018-11-01 05:02:11'),
(190, 8, 'Jamal Alfarela added comment on a task', 'designer/tasks_assigned/34', 0, '2018-11-01 05:02:57'),
(191, 40, 'Jamal Alfarela added comment on a task', 'designer/tasks_assigned/34', 0, '2018-11-01 05:02:57'),
(192, 8, 'test test added new advertisement', 'advertisers/view_advertisements', 0, '2018-11-01 13:28:44'),
(193, 40, 'test test added new advertisement', 'advertisers/view_advertisements', 0, '2018-11-01 13:28:44'),
(194, 8, 'New task created for location manager', 'location_manager', 0, '2018-11-01 13:28:44'),
(195, 40, 'New task created for location manager', 'location_manager', 0, '2018-11-01 13:28:44'),
(196, 8, 'New task created for location manager', 'location_manager', 0, '2018-11-01 13:28:44'),
(197, 40, 'New task created for location manager', 'location_manager', 0, '2018-11-01 13:28:44'),
(198, 8, 'New task created for designer', 'designer', 0, '2018-11-01 13:28:44'),
(199, 40, 'New task created for designer', 'designer', 0, '2018-11-01 13:28:44'),
(200, 8, 'Designer test7 added comment on a task', 'designer/tasks_assigned/37', 0, '2018-11-01 13:41:50'),
(201, 40, 'Designer test7 added comment on a task', 'designer/tasks_assigned/37', 0, '2018-11-01 13:41:50'),
(202, 42, 'test test added comment on a task', 'designer/tasks_assigned/37', 0, '2018-11-01 13:42:12'),
(203, 8, 'test test added comment on a task', 'designer/tasks_assigned/37', 0, '2018-11-01 13:42:12'),
(204, 40, 'test test added comment on a task', 'designer/tasks_assigned/37', 0, '2018-11-01 13:42:12'),
(205, 8, 'Marketing test7 added new advertisement', 'advertisers/view_advertisements', 0, '2018-11-01 13:47:04'),
(206, 40, 'Marketing test7 added new advertisement', 'advertisers/view_advertisements', 0, '2018-11-01 13:47:04'),
(207, 8, 'New task created for location manager', 'location_manager', 0, '2018-11-01 13:47:04'),
(208, 40, 'New task created for location manager', 'location_manager', 0, '2018-11-01 13:47:04'),
(209, 8, 'New task created for location manager', 'location_manager', 0, '2018-11-01 13:47:04'),
(210, 40, 'New task created for location manager', 'location_manager', 0, '2018-11-01 13:47:04'),
(211, 42, 'New task created for designer', 'designer', 0, '2018-11-01 13:47:04'),
(212, 8, 'New task created for designer', 'designer', 0, '2018-11-01 13:47:04'),
(213, 40, 'New task created for designer', 'designer', 0, '2018-11-01 13:47:04'),
(214, 0, 'test test has approved the advertisement', 'advertisers/view_advertisements', 0, '2018-11-01 13:47:24'),
(215, 43, 'test test has approved the advertisement', 'advertisers/view_advertisements', 0, '2018-11-01 13:47:24'),
(216, 8, 'test test has approved the advertisement', 'advertisers/view_advertisements', 0, '2018-11-01 13:47:24'),
(217, 40, 'test test has approved the advertisement', 'advertisers/view_advertisements', 0, '2018-11-01 13:47:24'),
(218, 42, 'Marketing test7 added comment on a task', 'designer/tasks_assigned/40', 0, '2018-11-01 13:47:50'),
(219, 8, 'Marketing test7 added comment on a task', 'designer/tasks_assigned/40', 0, '2018-11-01 13:47:50'),
(220, 40, 'Marketing test7 added comment on a task', 'designer/tasks_assigned/40', 0, '2018-11-01 13:47:50'),
(221, 42, 'test test added comment on a task', 'designer/tasks_assigned/40', 0, '2018-11-01 13:48:05'),
(222, 8, 'test test added comment on a task', 'designer/tasks_assigned/40', 0, '2018-11-01 13:48:05'),
(223, 40, 'test test added comment on a task', 'designer/tasks_assigned/40', 0, '2018-11-01 13:48:05'),
(224, 43, 'Designer test7 added comment on a task', 'designer/tasks_assigned/40', 0, '2018-11-01 13:48:44'),
(225, 8, 'Designer test7 added comment on a task', 'designer/tasks_assigned/40', 0, '2018-11-01 13:48:44'),
(226, 40, 'Designer test7 added comment on a task', 'designer/tasks_assigned/40', 0, '2018-11-01 13:48:44'),
(227, 8, 'test test added new location', 'locations/view_locations', 0, '2018-11-02 00:39:04'),
(228, 40, 'test test added new location', 'locations/view_locations', 0, '2018-11-02 00:39:04'),
(229, 8, 'Jamal Alfarela added new location', 'locations/view_locations', 0, '2018-11-02 00:52:37'),
(230, 40, 'Jamal Alfarela added new location', 'locations/view_locations', 0, '2018-11-02 00:52:37'),
(231, 8, 'Jamal Alfarela added new location', 'locations/view_locations', 0, '2018-11-02 00:55:29'),
(232, 40, 'Jamal Alfarela added new location', 'locations/view_locations', 0, '2018-11-02 00:55:29'),
(233, 8, 'Jamal Alfarela added new advertisement', 'advertisers/view_advertisements', 0, '2018-11-02 00:58:34'),
(234, 40, 'Jamal Alfarela added new advertisement', 'advertisers/view_advertisements', 0, '2018-11-02 00:58:34'),
(235, 8, 'New task created for location manager', 'location_manager', 0, '2018-11-02 00:58:34'),
(236, 40, 'New task created for location manager', 'location_manager', 0, '2018-11-02 00:58:34'),
(237, 8, 'New task created for location manager', 'location_manager', 0, '2018-11-02 00:58:34'),
(238, 40, 'New task created for location manager', 'location_manager', 0, '2018-11-02 00:58:34'),
(239, 8, 'Jamal Alfarela added new location', 'locations/view_locations', 0, '2018-11-02 01:01:35'),
(240, 40, 'Jamal Alfarela added new location', 'locations/view_locations', 0, '2018-11-02 01:01:35'),
(241, 8, 'Jamal Alfarela added new location', 'locations/view_locations', 0, '2018-11-02 01:04:38'),
(242, 40, 'Jamal Alfarela added new location', 'locations/view_locations', 0, '2018-11-02 01:04:38'),
(243, 8, 'Jamal Alfarela added new location', 'locations/view_locations', 0, '2018-11-02 01:10:17'),
(244, 40, 'Jamal Alfarela added new location', 'locations/view_locations', 0, '2018-11-02 01:10:17'),
(245, 8, 'Jamal Alfarela added new location', 'locations/view_locations', 0, '2018-11-02 01:11:25'),
(246, 40, 'Jamal Alfarela added new location', 'locations/view_locations', 0, '2018-11-02 01:11:25'),
(247, 8, 'Jamal Alfarela added new location', 'locations/view_locations', 0, '2018-11-02 01:21:58'),
(248, 40, 'Jamal Alfarela added new location', 'locations/view_locations', 0, '2018-11-02 01:21:58'),
(249, 8, 'Jamal Alfarela added new location', 'locations/view_locations', 0, '2018-11-02 01:26:25'),
(250, 40, 'Jamal Alfarela added new location', 'locations/view_locations', 0, '2018-11-02 01:26:25'),
(251, 8, 'Jamal Alfarela added new location', 'locations/view_locations', 0, '2018-11-02 01:29:27'),
(252, 40, 'Jamal Alfarela added new location', 'locations/view_locations', 0, '2018-11-02 01:29:27'),
(253, 8, 'Jamal Alfarela added new location', 'locations/view_locations', 0, '2018-11-02 01:32:02'),
(254, 40, 'Jamal Alfarela added new location', 'locations/view_locations', 0, '2018-11-02 01:32:02'),
(255, 8, 'Jamal Alfarela added new location', 'locations/view_locations', 0, '2018-11-02 01:40:04'),
(256, 40, 'Jamal Alfarela added new location', 'locations/view_locations', 0, '2018-11-02 01:40:04');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `permissionid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `shortname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`permissionid`, `name`, `shortname`) VALUES
(1, 'Locations', 'locations'),
(2, 'Advertisers', 'advertisers'),
(3, 'Location Manager', 'location_manager'),
(4, 'Designer', 'designer'),
(5, 'Payouts', 'payouts'),
(6, 'Resource Center', 'resource_center'),
(7, 'Admin', 'admin'),
(8, 'Recriutment', 'recriutment'),
(9, 'Add Location', 'add_location');

-- --------------------------------------------------------

--
-- Table structure for table `proofs`
--

CREATE TABLE `proofs` (
  `proof_id` int(11) NOT NULL,
  `advert_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `proof_file` longtext NOT NULL,
  `proof_type` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proofs`
--

INSERT INTO `proofs` (`proof_id`, `advert_id`, `user_id`, `proof_file`, `proof_type`, `status`, `created_at`) VALUES
(21, 9, 8, '391223364SIMPLE_FARES_APP_FLOW_.pdf', 'designer', 1, '2018-08-28 08:43:02');

-- --------------------------------------------------------

--
-- Table structure for table `resource_center`
--

CREATE TABLE `resource_center` (
  `resource_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `resource_type` int(11) NOT NULL DEFAULT '3',
  `description` longtext NOT NULL,
  `resource_file` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resource_center`
--

INSERT INTO `resource_center` (`resource_id`, `title`, `resource_type`, `description`, `resource_file`) VALUES
(6, 'Location Criteria ', 4, 'Please download PDF file to see all Criteria the location needs to match with in order to be added to The GoHOLO ads Network ', '752278402Location_Criteria_for_G0HOLO_ads_(2).pdf'),
(7, 'Proposal / Location Contract to add new Ad Locatio', 1, 'Please download PDF file and get Location owner to fill out below details and send the filled out form to GoHOLOads@gmail.com. The third page is used to upload location details to Website and make the location officially part of the GOHOLO ADS NETWORK ', '1282710255GOHOLO_ads_Proposal_(11).pdf'),
(8, 'Hologram Specs ', 3, '', '1575145097GoHOLO_specs.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `rolepermissions`
--

CREATE TABLE `rolepermissions` (
  `rolepermissionid` int(11) NOT NULL,
  `permissionid` int(11) NOT NULL,
  `roleid` int(11) NOT NULL,
  `permission` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rolepermissions`
--

INSERT INTO `rolepermissions` (`rolepermissionid`, `permissionid`, `roleid`, `permission`) VALUES
(1, 1, 3, 1),
(2, 2, 3, 1),
(3, 3, 3, 1),
(4, 4, 3, 1),
(5, 5, 3, 1),
(6, 6, 3, 1),
(7, 7, 3, 0),
(8, 8, 3, 1),
(9, 1, 2, 1),
(10, 2, 2, 1),
(11, 3, 2, 0),
(12, 4, 2, 0),
(13, 5, 2, 1),
(14, 6, 2, 1),
(15, 7, 2, 0),
(16, 8, 2, 0),
(17, 9, 2, 0),
(18, 9, 3, 1),
(19, 1, 4, 0),
(20, 2, 4, 0),
(21, 3, 4, 0),
(22, 4, 4, 1),
(23, 5, 4, 0),
(24, 6, 4, 1),
(25, 7, 4, 0),
(26, 8, 4, 0),
(27, 9, 4, 0),
(28, 1, 5, 0),
(29, 2, 5, 0),
(30, 3, 5, 1),
(31, 4, 5, 0),
(32, 5, 5, 0),
(33, 6, 5, 1),
(34, 7, 5, 0),
(35, 8, 5, 0),
(36, 9, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `setting_id` int(11) NOT NULL,
  `setting_key` longtext NOT NULL,
  `setting_value` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`setting_id`, `setting_key`, `setting_value`) VALUES
(1, 'qb_client_id', 'Q0PGBYwNj2MazWdKIo5gc4XelXDV6HI3LOmRJ8ITzNVY80VXho'),
(2, 'qb_client_secret', 'lGW17LAYBugXJw4g2lQCYhhjOAPtyyzwmpWSwJIL'),
(3, 'qb_access_token', 'eyJlbmMiOiJBMTI4Q0JDLUhTMjU2IiwiYWxnIjoiZGlyIn0..inHGk7Lpb7Sl_vQIEq8VMg.MjjBZqD_KZgXYvVXBoVICPSzT_SSRmIOcdOIvS_9zA8tmMCayrUDW5F0MwtP32lQBvXTUW6FoEIPGd0ZkHUmXJXYuGMixT31GonbpAdTSIjh7ZBQ_yMMH6VBmBc_i9Qk1NMklPNrQfS3RgXtp6Z_579p9yJXGuQqVa7gG6nUgE1oCZyWxDP09Am-o5c9nH4I7GlKZrSUqcGNi7P9pBk0KamgIT4kc1N0hfK8EPJYk5DarrRSWFwoP7ksUPEvcDpM8wFr85q_0m_vPvotU01Hx7BLi0k0Xny0abcTNRdIxVPz6GIocBxKbG0UcDKDExBZGjiidcEuLS21h2ImqvV1zlyokNo2ZzpvFJGqHHQhvtlN0PjCs9V45e-uMtF32oi5zrjLNh2f7DX6uEWe_G7sgk-kKy8DOJc2NTS3JwuKDX4ObCxI1OyF2idjG7HYJ9DXyf9_f2dIZ2f4Q_E5OoLKR_VsFBcYgpYIM9SSuB9hasE8JDqCEyLfAkEO5ynqL0rhXGGagSf7S2-WXvc3xLLvDCFwpxTddQ9zn0O_QXPIgOf4ZNb6rOyS5e5RHOncUWVlzM_3WK_Zsx11PZ4vf1j9D_4aYTKlt1HEsr-JmFB1wdw_rQN4p2fJIAajNcoApIWEyooEjrLPHPfFRET03gsH6W1L1gKUp8zKBcXySqJxAyp10mgXD-ZfvfJi86ShFcbh.7n_QJyPwXgMGIezW__8h_w'),
(4, 'qb_refresh_token', 'Q011549972783oxIiQGx9G6TXKwZysZGsnLQB6jiaofJ4Ry0BR'),
(5, 'qb_realmId', '123146090862619');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `advert_id` int(11) NOT NULL,
  `task_type` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `delivery_file` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `advert_id`, `task_type`, `date`, `delivery_file`, `status`) VALUES
(26, 15, 'add_advert', '2018-01-12', '', 0),
(27, 15, 'remove_advert', '2019-01-01', '', 0),
(28, 16, 'add_advert', '2018-01-12', '', 0),
(29, 16, 'remove_advert', '2019-01-01', '', 0),
(30, 17, 'add_advert', '2018-01-12', '', 0),
(31, 17, 'remove_advert', '2019-01-01', '', 0),
(32, 18, 'add_advert', '2018-01-11', '', 0),
(33, 18, 'remove_advert', '2018-01-12', '', 0),
(34, 18, 'designer', '2018-01-11', '', 0),
(35, 19, 'add_advert', '2018-01-12', '', 0),
(36, 19, 'remove_advert', '2019-01-01', '', 0),
(37, 19, 'designer', '2018-01-12', '', 0),
(38, 20, 'add_advert', '2018-01-12', '', 0),
(39, 20, 'remove_advert', '2019-01-01', '', 0),
(40, 20, 'designer', '2018-01-12', '', 0),
(41, 21, 'add_advert', '2018-01-12', '', 0),
(42, 21, 'remove_advert', '2019-01-01', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `task_comments`
--

CREATE TABLE `task_comments` (
  `comment_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` longtext NOT NULL,
  `comment_file` longtext NOT NULL,
  `task_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_comments`
--

INSERT INTO `task_comments` (`comment_id`, `task_id`, `user_id`, `comment`, `comment_file`, `task_created`) VALUES
(12, 34, 40, 'test this is a test ', '1526588726GOHOLOBLUEGLOWBLACK.png', '2018-11-01 05:02:57'),
(13, 37, 42, 'designer', '', '2018-11-01 13:41:50'),
(14, 37, 8, 'admin', '', '2018-11-01 13:42:12'),
(15, 40, 43, 'Testing QA 1', '', '2018-11-01 13:47:50'),
(16, 40, 8, 'testing qa2', '', '2018-11-01 13:48:05'),
(17, 40, 42, 'testing qa3', '', '2018-11-01 13:48:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_qb_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `date_of_birth` date NOT NULL,
  `user_role` int(11) NOT NULL,
  `paypal_id` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `profile_image` longtext NOT NULL,
  `user_commission` int(11) NOT NULL,
  `transit_number` int(11) NOT NULL,
  `institution_number` int(11) NOT NULL,
  `account_number` int(11) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `post_code` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_qb_id`, `first_name`, `last_name`, `email`, `password`, `gender`, `date_of_birth`, `user_role`, `paypal_id`, `phone_number`, `profile_image`, `user_commission`, `transit_number`, `institution_number`, `account_number`, `street`, `city`, `state`, `post_code`, `status`, `created_by`, `created_at`) VALUES
(8, 0, 'test', 'test', 'admin@e.com', 'admin123', 1, '2016-05-01', 1, 'hg@gh.com', '', '119394679518342456_1401500969873052_5560180181826082461_n.jpg', 0, 0, 0, 0, 'jh', 'g', 'jgjh', 'jh', 1, 0, '2018-08-02 21:17:43'),
(40, 0, 'Jamal', 'Alfarela', 'Jamalalfarela@live.com', 'Jamal123', 1, '1993-12-24', 1, '', '7809772322', '', 30, 0, 0, 0, '8532 Jasper ave ', 'Edmonton', 'AB', 't5h 3s4', 1, 8, '2018-10-30 20:53:51'),
(41, 93, 'New', 'Owner7', 'owner@e.com', 'owner123', 1, '0000-00-00', 2, '', '', '', 0, 0, 0, 0, '', '', '', '', 1, 8, '2018-10-31 13:37:01'),
(42, 98, 'Designer', 'test7', 'designer@e.com', 'designer123', 1, '0000-00-00', 4, '', '', '', 15, 0, 0, 0, '', '', '', '', 1, 8, '2018-11-01 13:40:44'),
(43, 99, 'Marketing', 'test7', 'market@e.com', 'market123', 1, '0000-00-00', 3, '', '', '', 15, 0, 0, 0, '', '', '', '', 1, 8, '2018-11-01 13:43:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`advert_id`);

--
-- Indexes for table `advertisers`
--
ALTER TABLE `advertisers`
  ADD PRIMARY KEY (`advertiser_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`location_id`),
  ADD UNIQUE KEY `location_number` (`location_number`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notify_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`permissionid`);

--
-- Indexes for table `proofs`
--
ALTER TABLE `proofs`
  ADD PRIMARY KEY (`proof_id`);

--
-- Indexes for table `resource_center`
--
ALTER TABLE `resource_center`
  ADD PRIMARY KEY (`resource_id`);

--
-- Indexes for table `rolepermissions`
--
ALTER TABLE `rolepermissions`
  ADD PRIMARY KEY (`rolepermissionid`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `task_comments`
--
ALTER TABLE `task_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `advert_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `advertisers`
--
ALTER TABLE `advertisers`
  MODIFY `advertiser_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notify_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `permissionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `proofs`
--
ALTER TABLE `proofs`
  MODIFY `proof_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `resource_center`
--
ALTER TABLE `resource_center`
  MODIFY `resource_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rolepermissions`
--
ALTER TABLE `rolepermissions`
  MODIFY `rolepermissionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `task_comments`
--
ALTER TABLE `task_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
