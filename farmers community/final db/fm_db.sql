-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2024 at 01:11 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fm_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'raj', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `bid` int(11) NOT NULL,
  `btitle` varchar(255) NOT NULL,
  `bdesc` longtext NOT NULL,
  `bimage` varchar(255) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `publish_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`bid`, `btitle`, `bdesc`, `bimage`, `admin_id`, `publish_date`) VALUES
(1, 'Farming Solution', '<h2>Cultivating Success: Innovative Solutions for Modern Farming</h2>\r\n\r\n<p>The agricultural landscape is undergoing a significant transformation. With a growing global population and a changing climate, farmers face unprecedented challenges. However, amidst these obstacles lies a wealth of opportunity. This blog explores innovative solutions that are empowering farmers to achieve greater efficiency, sustainability, and profitability.</p>\r\n\r\n<p><strong>Embracing Precision Agriculture:</strong></p>\r\n\r\n<p>Precision agriculture, also known as smart farming, utilizes technology to gather and analyze data about crops and soil conditions. Sensors monitor factors like moisture levels, nutrient content, and weather patterns. This data empowers farmers to make informed decisions about irrigation, fertilization, and pest control. Precision agriculture translates to:</p>\r\n\r\n<ul>\r\n	<li><strong>Reduced resource waste:</strong>&nbsp;By applying inputs only where and when needed, farmers can minimize water usage and fertilizer application, leading to cost savings and environmental benefits.</li>\r\n	<li><strong>Improved crop health:</strong>&nbsp;Precise monitoring allows for early detection of potential problems, enabling timely interventions to maintain optimal growing conditions.</li>\r\n	<li><strong>Increased yields:</strong>&nbsp;Through targeted resource allocation and proactive measures, farmers can achieve higher crop yields and maximize their production output.</li>\r\n</ul>\r\n\r\n<p><strong>The Rise of Agritech:</strong></p>\r\n\r\n<p>The rise of agritech, a fusion of agriculture and technology, is revolutionizing the farming industry. Innovative startups and established companies are developing a range of solutions that address various agricultural needs. These include:</p>\r\n\r\n<ul>\r\n	<li><strong>Automated farming equipment:</strong>&nbsp;Driverless tractors, drones for crop monitoring, and robotic systems for harvesting are streamlining farm operations and reducing reliance on manual labor.</li>\r\n	<li><strong>Vertical farming:</strong>&nbsp;This space-saving technique allows for the cultivation of crops in vertically stacked layers, ideal for urban environments or areas with limited land resources.</li>\r\n	<li><strong>Advanced irrigation systems:</strong>&nbsp;Drip irrigation and other efficient watering methods ensure that crops receive the precise amount of water they need, minimizing waste and maximizing water usage.</li>\r\n</ul>\r\n\r\n<p><strong>Investing in Sustainable Practices:</strong></p>\r\n\r\n<p>Sustainable farming practices that prioritize environmental well-being are not just beneficial for the planet, but also for long-term farm productivity. Here are some key approaches:</p>\r\n\r\n<ul>\r\n	<li><strong>Soil health management:</strong>&nbsp;Techniques like cover cropping and compost application improve soil structure, fertility, and water retention capacity, fostering healthy plant growth.</li>\r\n	<li><strong>Integrated pest management:</strong>&nbsp;Implementing natural pest control methods and promoting biodiversity helps maintain ecological balance and minimize reliance on harmful chemicals.</li>\r\n	<li><strong>Water conservation:</strong>&nbsp;Employing efficient irrigation methods, capturing rainwater, and utilizing recycled water can significantly reduce freshwater consumption.</li>\r\n</ul>\r\n\r\n<p><strong>The Future of Farming:</strong></p>\r\n\r\n<p>The future of farming is bright. By embracing innovation, technology, and sustainable practices, farmers can overcome challenges, enhance yields, and ensure the long-term viability of agriculture. This blog serves as a starting point for exploring the exciting solutions shaping the future of food production. Let&#39;s cultivate a future where agriculture thrives in harmony with the environment, providing sustenance for generations to come.</p>\r\n', 'India_Farming.jpg', 1, '2024-03-24 12:10:01');

-- --------------------------------------------------------

--
-- Table structure for table `expert`
--

CREATE TABLE `expert` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `education` varchar(10) NOT NULL,
  `address` varchar(30) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `cpass` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expert`
--

INSERT INTO `expert` (`id`, `full_name`, `email`, `mobile`, `education`, `address`, `pass`, `cpass`) VALUES
(1, 'Mahesh Mahajan', 'maheshm@gmail.com', '7877675644', 'Msc Agri', 'shirpur', '1234', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `expert_replies`
--

CREATE TABLE `expert_replies` (
  `id` int(11) NOT NULL,
  `problem_id` int(11) NOT NULL,
  `reply` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expert_replies`
--

INSERT INTO `expert_replies` (`id`, `problem_id`, `reply`) VALUES
(1, 1, 'Please Explain your problem i will solve it');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `cid` int(11) NOT NULL,
  `fname` varchar(55) NOT NULL,
  `chat` varchar(500) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`cid`, `fname`, `chat`, `time`) VALUES
(1, 'Krushna ', 'Hello Fellow farmers', '2024-03-24 17:32:42'),
(2, 'Jayesh ', 'hii Krushna', '2024-03-24 17:37:24');

-- --------------------------------------------------------

--
-- Table structure for table `userproblem`
--

CREATE TABLE `userproblem` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userproblem`
--

INSERT INTO `userproblem` (`id`, `user_id`, `name`, `email`, `phone`, `message`) VALUES
(1, 1, 'Krushna Patil', 'krushnapatil3302@gmail.com', '7972627961', 'Hello Expert i want solutions?');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `cpassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `mobile`, `address`, `city`, `state`, `password`, `cpassword`) VALUES
(1, 'Krushna ', 'Patil', 'krushnapatil3302@gmail.com', '7972627961', 'shirpur', 'shirpur', 'Maharashtra', '1234', '1234'),
(2, 'Jayesh ', 'Patil', 'jp1@gmail.com', '89999167402', 'shirpur', 'shirpur', 'Gujrat', '123', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `expert`
--
ALTER TABLE `expert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expert_replies`
--
ALTER TABLE `expert_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `userproblem`
--
ALTER TABLE `userproblem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expert`
--
ALTER TABLE `expert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expert_replies`
--
ALTER TABLE `expert_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `userproblem`
--
ALTER TABLE `userproblem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
