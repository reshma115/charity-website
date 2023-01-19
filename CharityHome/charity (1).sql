-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2017 at 03:08 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `charity`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `causes`
--

CREATE TABLE `causes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `raised` int(11) NOT NULL,
  `goal` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `causes`
--

INSERT INTO `causes` (`id`, `title`, `raised`, `goal`, `description`, `image_path`) VALUES
(2, 'SPONSER A CHILD TODAY', 1890, 2500, ' Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.', 'uploads/5a0fd74b7f0d32.74204269.jpg'),
(3, 'SPONSER A CHILD TODAY', 3000, 5000, ' Hampden-Sydney College in Virginia, looked  going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from section going through the cites of the word.', 'uploads/5a0fdafe2ce460.50776407.jpg'),
(4, 'SPONSER A CHILD TODAY', 4678, 3456, 'written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'uploads/5a0fd7a3efc668.01292255.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(12) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `message`) VALUES
(1, 'pooja', 'pooja@gmail.com', 426352435, 'ghfghfghdfgshfg\r\nkhfjfhsjfh\r\nhhfjfhs');

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `id` int(11) NOT NULL,
  `other_amount` int(25) NOT NULL,
  `card_number` varchar(20) NOT NULL,
  `security_code` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(12) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`id`, `other_amount`, `card_number`, `security_code`, `name`, `email`, `phone`, `address`, `city`) VALUES
(1, 1236, '12364', '34651', 'sytdg', 'fdjg@hvm.vom', 13264921, 'fdsduyg hgiujb', 'Thane');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `area` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `title`, `time`, `date`, `area`, `description`, `image_path`) VALUES
(2, 'CHARITY FOR EDUCATION', '14:00:00', '2017-12-06', 'MUMBAI', 'This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'uploads/5a0fd911336322.52715185.jpg'),
(3, 'CHARITY FOR EDUCATION', '15:00:00', '2017-12-04', 'KERLA', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum', 'uploads/5a0fda2a3e1be0.57465258.jpg'),
(4, 'CHARITY FOR EDUCATION', '12:00:00', '2017-11-22', 'THANE', ' a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'uploads/5a0fda7b5e3864.74445535.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `image_path`) VALUES
(3, 'SPONSER A CHILD TODAY', 'uploads/5a0fdba117efe5.92614871.jpg'),
(4, 'VOLUNTEER', 'uploads/5a0fdbd4c6cd44.56406378.jpg'),
(5, 'EVENTS', 'uploads/5a0fdbecd82519.35763884.jpg'),
(6, 'CHARITY FOR EDUCATION', 'uploads/5a0fdeb39a3235.27455099.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

CREATE TABLE `volunteer` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` int(12) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `designation` varchar(55) NOT NULL,
  `hobby` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `training` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `volunteer`
--

INSERT INTO `volunteer` (`id`, `name`, `email`, `contact`, `qualification`, `designation`, `hobby`, `experience`, `training`, `description`, `image_path`) VALUES
(2, 'Muhibbur Rashid', 'muhibbur@gmail.com', 12345678, 'MBA', 'Businessman', 'Learning', 'Businessman', 'Lorem ipsum dolor sit amet, consectetur , sed do eiusmod tempor', 'Contrary to popular belief, Lorem Ipsum is not simply random text. ', 'uploads/5a0fdfe1817063.35876200.jpg'),
(3, 'Rashed Kabir', 'rashedkabir@gmail.com', 45465465, ' M.D. of Finance', 'Businessman', 'Gardening', '', '38 years of Experience', 'a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur', 'uploads/5a0fd422bfb9e6.12073047.jpg'),
(4, 'Jannatul Ferdous', 'Jannatul@gmail.com', 65486542, 'MBBS', 'doctor', 'playing', '10 years of experience', 'Lorem Ipsum has been the industry\'s standard', 'orem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.', 'uploads/5a0fdfb92a7289.83881797.jpg'),
(5, 'Ashikur Rahman', 'Ashikur@gmail.com', 6541548, 'MBA', 'MD', '', '', 'Lorem ipsum dolor sit amet, consectetur , sed do eiusmod tempor', ' Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.', 'uploads/5a0fdf8b47d0e8.53234544.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `causes`
--
ALTER TABLE `causes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `volunteer`
--
ALTER TABLE `volunteer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `causes`
--
ALTER TABLE `causes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `volunteer`
--
ALTER TABLE `volunteer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
