-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2024 at 04:36 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shy_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(60) NOT NULL,
  `addedby` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `user_type`, `datetime`, `username`, `password`, `name`, `addedby`, `status`) VALUES
(1, 'shy', '', 'shy', 'shy', 'shy', 'shy', '');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_email` varchar(250) NOT NULL,
  `contact_subject` varchar(250) NOT NULL,
  `contact_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `contact_name`, `contact_email`, `contact_subject`, `contact_message`) VALUES
(6, 'kaidishan', 'sheesh', 'fafa', 'fafa'),
(7, 'cute', 'cute@gmail.com', 'cute', 'cute'),
(9, 'dgdfgsgfh', 'shyniemarh@gmail.com', 'sige', 'sdvrgdgddg'),
(10, 'wushyy', 'shyniemarh@gmail.com', 'nothinng', 'zxijasafjsjgjr');

-- --------------------------------------------------------

--
-- Table structure for table `cv`
--

CREATE TABLE `cv` (
  `id` int(11) NOT NULL,
  `cv_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cv`
--

INSERT INTO `cv` (`id`, `cv_file`) VALUES
(1, 'uploads/shycv.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `year_range` varchar(200) NOT NULL,
  `institution` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `year_range`, `institution`, `description`) VALUES
(1, '2019-2024', 'College', 'Western Mindanao State University '),
(4, '2016-2019', 'SHS', 'Pilar College of Zamboanga City'),
(5, '2012-2016', 'JHS', 'Zamboanga National High School West');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `gallery_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `gallery_image`) VALUES
(1, 'uploads/Animation - 1709560980517 (3).gif'),
(2, 'uploads/4.gif'),
(3, 'uploads/galaxy-space.gif'),
(6, 'uploads/Animation - 1709559927772.gif');

-- --------------------------------------------------------

--
-- Table structure for table `intro`
--

CREATE TABLE `intro` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `dialect` varchar(50) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `intro`
--

INSERT INTO `intro` (`id`, `name`, `description`, `dob`, `role`, `dialect`, `image`) VALUES
(2, 'Shy', 'I am Shyniemar Hassan, Working as Graphic Designer in DICT at the same time a freelancer earning  10  digits per day', '2001-07-17', 'UX Designer', 'Tausug', 'uploads/cute.png');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `project_image` varchar(255) NOT NULL,
  `category` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `project_image`, `category`, `description`) VALUES
(6, 'uploads/431319095_1172917950364746_7494624572625805913_n.jpg', 'photoshop', 'dffdfvfv'),
(7, 'uploads/3.png', 'photoshop', 'ddvfd'),
(8, 'uploads/423599727_1813133099168385_5930238952510555812_n.jpg', 'dvdfbvdf', 'dfdgdf'),
(9, 'uploads/431181213_779798230700880_4691253354113342997_n.jpg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `resume`
--

CREATE TABLE `resume` (
  `id` int(11) NOT NULL,
  `category` varchar(200) NOT NULL,
  `year_range` varchar(250) NOT NULL,
  `institution` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `hashtags` varchar(255) NOT NULL,
  `dialect` varchar(250) NOT NULL,
  `fluency` varchar(50) NOT NULL,
  `hobbies` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resume`
--

INSERT INTO `resume` (`id`, `category`, `year_range`, `institution`, `description`, `hashtags`, `dialect`, `fluency`, `hobbies`) VALUES
(16, 'Experiences', '2019-2024', 'System Engineering', 'Project', '', '', '', ''),
(17, 'Activities', '2019-2024', 'JHS', 'High', '', '', '', ''),
(18, 'Languages', '', '', '', '', 'English', 'Fluent', ''),
(19, 'Languages', '', '', '', '', 'Tagalog', 'Fluent', ''),
(20, 'Languages', '', '', '', '', 'Tausug', 'Fluent', ''),
(21, 'Hobbies', '', '', '', '', '', '', 'Canvas Paint'),
(22, 'Hobbies', '', '', '', '', '', '', 'Photo Editing'),
(23, 'Hobbies', '', '', '', '', '', '', 'Video Editing'),
(24, 'Experiences', '2024', 'DICT', 'Intern', '', '', '', ''),
(25, 'Hashtags', '', '', '', '#project', '', '', ''),
(26, 'Hashtags', '', '', '', '#creativity', '', '', ''),
(27, 'Hashtags', '', '', '', 'design', '', '', ''),
(28, 'Experiences', '2018-2019', 'NBI', 'Work Immersion', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` int(11) NOT NULL,
  `platform` varchar(200) NOT NULL,
  `link` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`id`, `platform`, `link`) VALUES
(1, 'linkedin', 'http://localhost/myportfolio/admin/add_header.php'),
(2, 'instagram', 'http://localhost/phpmyadmin/index.php?route=/sql&db=myportfolio&table=tbl_ads&pos=0');

-- --------------------------------------------------------

--
-- Table structure for table `technical`
--

CREATE TABLE `technical` (
  `id` int(11) NOT NULL,
  `category` varchar(200) NOT NULL,
  `skill_name` varchar(250) NOT NULL,
  `tech_skills` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `technical`
--

INSERT INTO `technical` (`id`, `category`, `skill_name`, `tech_skills`) VALUES
(1, 'Software Skills', 'ai', ''),
(3, 'Software Skills', 'mw', ''),
(4, 'Software Skills', 'ms', ''),
(5, 'Software Skills', 'ml', ''),
(6, 'Software Skills', 'pr', ''),
(8, 'Coding Skills', 'html', ''),
(9, 'Coding Skills', 'php', ''),
(10, 'Coding Skills', 'css', ''),
(11, 'Coding Skills', 'js', ''),
(16, 'tech Skills', 'VISUAL DESIGNING', ''),
(17, 'tech Skills', 'UX/UI DESIGNER', ''),
(18, 'Coding Skills', 'java', ''),
(21, 'Software Skills', 'ps', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intro`
--
ALTER TABLE `intro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resume`
--
ALTER TABLE `resume`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technical`
--
ALTER TABLE `technical`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cv`
--
ALTER TABLE `cv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `intro`
--
ALTER TABLE `intro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `resume`
--
ALTER TABLE `resume`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `technical`
--
ALTER TABLE `technical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
