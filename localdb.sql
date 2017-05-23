-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:50037
-- Generation Time: May 23, 2017 at 04:00 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `localdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `user_id` int(10) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`user_id`, `user_email`, `user_pass`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `photo_id` int(100) NOT NULL,
  `photo_title` varchar(255) NOT NULL,
  `photo_desc` text NOT NULL,
  `photo_image` text NOT NULL,
  `photo_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`photo_id`, `photo_title`, `photo_desc`, `photo_image`, `photo_keywords`) VALUES
(49, 'Tannheimer Mountains', '<p>An awesome photo of the Tannheimer Mountains.</p>', 'rough-horn-2146181_960_720.jpg', 'rough horn, alpine, tannheimer mountains, mountain,'),
(50, 'Tree Bark', '<p>A random photo of tree bark.</p>', 'tree-2106115_960_720.jpg', 'tree, tree bark, log, nature, tribe, wood, bark'),
(51, 'Cloudy Blue Sky ', '<p>A nice photo of a blue sky with clouds.</p>', 'hill-2165759_960_720.jpg', 'hill, blue sky, clouds, sky, blue, nature, green'),
(52, 'North Sea Sea Sunset', '<p>A late night sunset.</p>', 'beach-2179624_960_720.jpg', 'beach, north sea, sea, sunset, water'),
(53, 'Tianjin', '<p>Tianjin - the city of tourism.</p>', 'tianjin-2185510_960_720.jpg', 'tianjin, twilight, city, scenery, tourism, sunset'),
(54, 'Countryside Landscape', '<p>Nature, sky, sunlight - a the great countryside landscape.</p>', 'countryside-2175353_960_720.jpg', 'countryside, tree, landscape, sunlight, nature, sky'),
(55, 'The Stonehenge Monument', '<p>The Stonehenge Monument - a great place that one should definitely visit.</p>', 'stonehenge-2287980_960_720.jpg', 'stonehenge, monument, air, clouds, tourism, united kingdom '),
(56, 'Meadow', '<p>Very nicely looking flowers.</p>', 'meadow-2235625_960_720.jpg', 'meadow, cranesbill, spring, nature, meadow cranesbill'),
(57, 'Burj Khalifa', '<p>A photo of the famous skyscraper Burj Khalifa in Dubai, UAE.</p>', 'burj-khalifa-2212978_960_720.jpg', 'burj khalifa, emirates, dubai, uae, architecture, skyscraper,'),
(58, 'Field', '<p>A landscape of a spacious field.</p>', 'landscape-2211587_960_720.jpg', 'landscape, spacious, field, meadow, sunset'),
(59, 'Collared Lizard', '<p>A portrait photo of a lizard.</p>', 'collared-lizard-2275804_960_720.jpg', 'collared lizard, reptile, portrait, wildlife, nature');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `email`) VALUES
(2, 'admin', '$2y$10$WqXhQgexvFG5KvqrUA4Yu.k06j5nofpVZ6zElpHdKH2FIHHKlNi.m', 'admin@gmail.com'),
(3, 'asd', '$2y$10$QsYhzM7n4OX7hdSYekxSmuFeSShhu2bwtf.NJ1gV43K0P0AbUx48O', 'asd@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`photo_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `photo_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
